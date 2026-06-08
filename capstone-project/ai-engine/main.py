import os
import pandas as pd
from fastapi import FastAPI, HTTPException
from pydantic import BaseModel
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.neighbors import NearestNeighbors

app = FastAPI(title="Zero Waste Kitchen - AI Engine Indonesian CSV Fixed")

# 1. Mendapatkan jalur file absolut agar tidak salah lokasi pembacaan
BASE_DIR = os.path.dirname(os.path.abspath(__file__))
PATH_DATASET = os.path.join(BASE_DIR, 'all_cleaned_data.csv')

# Inisialisasi variabel global sebagai cadangan agar tidak memicu NameError jika gagal load
vectorizer = None
model_knn = None
df = pd.DataFrame()

try:
    if os.path.exists(PATH_DATASET):
        # PERBAIKAN: Menggunakan sep=',' (koma biasa) sesuai isi asli file CSV kamu
        df = pd.read_csv(PATH_DATASET, sep=',', on_bad_lines='skip')
        # Membersihkan spasi tak terlihat pada nama kolom
        df.columns = df.columns.str.strip()
        print("✓ Dataset CSV Berhasil Dimuat dengan Pemisah Koma.")
    else:
        print(f"❌ File tidak ditemukan di jalur: {PATH_DATASET}")
except Exception as e:
    print(f"❌ Gagal membaca file CSV: {e}")
    df = pd.DataFrame()

# Fungsi membersihkan dan menyatukan bahan untuk proses TF-IDF
def join_ingredients(ingredients_raw):
    if pd.isna(ingredients_raw):
        return ""
    return str(ingredients_raw).replace('--', ' ').lower().strip()

# 2. Inisialisasi Model NLP (TF-IDF & KNN)
if not df.empty and 'Ingredients' in df.columns:
    df['bahan_bersih'] = df['Ingredients'].apply(join_ingredients)
    vectorizer = TfidfVectorizer()
    X = vectorizer.fit_transform(df['bahan_bersih'])
    model_knn = NearestNeighbors(metric='cosine', algorithm='brute')
    model_knn.fit(X)
    print("✓ Model AI Engine Siap Digunakan.")
else:
    print("❌ Kolom 'Ingredients' tidak ditemukan atau DataFrame kosong. Model AI gagal dibuat.")

class RecommendationRequest(BaseModel):
    bahan_sisa: str
    jumlah_rekomendasi: int = 3

@app.post("/rekomendasi")
def get_recommendation(payload: RecommendationRequest):
    # Proteksi berlapis agar tidak terjadi NameError jika model gagal di-load di awal
    if df.empty or vectorizer is None or model_knn is None:
        raise HTTPException(
            status_code=500, 
            detail="Dataset atau Model AI gagal dimuat di server. Pastikan file 'all_cleaned_data.csv' berada di dalam folder 'ai_engine'."
        )

    # 1. Ambil input user
    input_user = payload.bahan_sisa.lower()

    # 2. Hitung KNN Kemiripan
    input_vektor = vectorizer.transform([input_user])
    k_neighbors = min(payload.jumlah_rekomendasi, len(df))
    distances, indices = model_knn.kneighbors(input_vektor, n_neighbors=k_neighbors)

    # 3. Menyusun Output Response untuk Laravel
    json_response = []

    for i in range(len(indices[0])):
        idx = indices[0][i]
        kemiripan = 1 - distances[0][i]
        id_database_mysql = int(idx) + 1 
        
        # Ambil data sesuai dengan kolom di CSV asli
        raw_name = str(df['Title'].iloc[idx]) if 'Title' in df.columns else "Resep Tanpa Nama"
        raw_ingredients = str(df['Ingredients'].iloc[idx]) if 'Ingredients' in df.columns else ""
        raw_steps = str(df['Steps'].iloc[idx]) if 'Steps' in df.columns else ""
        raw_url = str(df['URL'].iloc[idx]) if 'URL' in df.columns else "#"

        # Pecah string bahan berdasarkan pemisah '--' menjadi Array/List
        ingredients_list = [b.strip() for b in raw_ingredients.split('--') if b.strip()] if raw_ingredients else []
        
        # Pecah string langkah berdasarkan pemisah '--' menjadi Array/List
        steps_list = [s.strip() for s in raw_steps.split('--') if s.strip()] if raw_steps else []

        # Sempurnakan URL domain Cookpad jika data hanya berisi path relatif
        full_url = raw_url
        if raw_url.startswith('/'):
            full_url = f"https://cookpad.com{raw_url}"

        json_response.append({
            "id": id_database_mysql,
            "recipe_id_json": str(idx),
            "recipe_name_en": raw_name, # Menggunakan key ini agar serasi dengan kode Laravel-mu
            "similarity_score": round(float(kemiripan) * 100, 2),
            "ingredients": ingredients_list,
            "steps": steps_list,
            "url": full_url
        })

    return {
        "status": "success",
        "data": json_response
    }