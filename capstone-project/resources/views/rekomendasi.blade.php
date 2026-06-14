<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zero Waste Kitchen - Rekomendasi AI</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
</head>
<body class="bg-gray-50 min-h-screen text-gray-800">

<div class="max-w-4xl mx-auto py-10 px-4">

    {{-- TOP NAV --}}
    <nav class="flex items-center justify-between mb-8 px-5 py-3 bg-white rounded-2xl border border-gray-100 shadow-sm flex-wrap gap-3">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl flex items-center justify-center">
                <img src="{{ asset('analisa/img/logo.png') }}" alt="Logo">
            </div>
            <div>
                <p class="text-sm font-semibold leading-tight" style="color:#2d7a30">Zero Waste Kitchen</p>
                <p class="text-xs text-gray-400 leading-tight">Rekomendasi resep berbasis AI</p>
            </div>
        </div>
        <div class="flex items-center gap-2 flex-wrap">
            <a href="{{ route('index') }}" class="flex items-center gap-1.5 text-sm text-gray-600 hover:text-gray-900 px-3 py-2 rounded-xl border border-gray-200 bg-gray-50 hover:bg-gray-100 transition">
                <i class="ti ti-home text-sm"></i> Beranda
            </a>
            @auth
                <a href="{{ route('histori.index') }}" class="flex items-center gap-1.5 text-sm px-3 py-2 rounded-xl border border-gray-200 bg-gray-50 hover:bg-gray-100 transition" style="color:#2d7a30">
                    <i class="ti ti-history text-sm"></i> Histori
                </a>
                <a href="{{ route('favorit.index') }}" class="flex items-center gap-1.5 text-sm text-red-500 px-3 py-2 rounded-xl border border-gray-200 bg-gray-50 hover:bg-red-50 transition">
                    <i class="ti ti-heart text-sm"></i> Favorit
                </a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="flex items-center gap-1.5 text-sm text-red-600 bg-red-50 hover:bg-red-100 border border-red-200 px-3 py-2 rounded-xl transition cursor-pointer">
                        <i class="ti ti-logout text-sm"></i> Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="flex items-center gap-1.5 text-sm text-white px-4 py-2 rounded-xl font-semibold transition" style="background:#4CAF4F">
                    <i class="ti ti-key text-sm"></i> Login
                </a>
            @endauth
        </div>
    </nav>

    {{-- HERO --}}
    <div class="rounded-2xl p-8 mb-7 relative overflow-hidden" style="background: linear-gradient(135deg, #2d7a30 0%, #4CAF4F 100%);">
        <div class="absolute -right-5 -top-5 w-32 h-32 rounded-full" style="background:rgba(255,255,255,0.07)"></div>
        <div class="absolute right-10 -bottom-8 w-20 h-20 rounded-full" style="background:rgba(255,255,255,0.05)"></div>
        <div class="relative z-10">
            
            <h1 class="text-2xl font-bold text-white mb-2">Ubah sisa bahan jadi hidangan lezat</h1>
            <p class="text-sm max-w-lg" style="color:rgba(255,255,255,0.82)">Masukkan bahan makanan yang kamu punya, dan AI kami akan merekomendasikan resep terbaik untukmu.</p>
        </div>
    </div>

    {{-- SEARCH FORM --}}
    <form action="{{ route('rekomendasi.cari') }}" method="GET" class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 mb-7">
        <label for="bahan_sisa" class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">
            <i class="ti ti-basket text-xs"></i> Bahan makananmu
        </label>
        <div class="flex gap-3 flex-wrap">
            <input type="text" id="bahan_sisa" name="bahan_sisa" value="{{ $bahanSisa }}"
                placeholder="Contoh: ayam, bawang putih, cabai, telur..."
                class="flex-1 min-w-52 px-4 py-2.5 text-sm border border-gray-200 rounded-xl bg-gray-50 focus:outline-none focus:ring-2 focus:border-transparent transition"
                style="--tw-ring-color:#4CAF4F" required>
            <button type="submit" class="flex items-center gap-2 px-5 py-2.5 text-sm font-semibold text-white rounded-xl transition whitespace-nowrap" style="background:#4CAF4F">
                <i class="ti ti-search"></i> Cari Resep
            </button>
        </div>
        <div class="flex items-center gap-2 mt-3 flex-wrap">
            <span class="text-xs text-gray-400">Cepat pilih:</span>
            <a href="{{ route('rekomendasi.cari') }}?bahan_sisa=ayam,sayur" class="text-xs px-3 py-1 rounded-full border transition" style="background:#f0faf0; color:#2d7a30; border-color:#a8e0a8">ayam & sayur</a>
            <a href="{{ route('rekomendasi.cari') }}?bahan_sisa=telur,tahu" class="text-xs px-3 py-1 rounded-full border transition" style="background:#f0faf0; color:#2d7a30; border-color:#a8e0a8">telur & tahu</a>
            <a href="{{ route('rekomendasi.cari') }}?bahan_sisa=tempe,cabai" class="text-xs px-3 py-1 rounded-full border transition" style="background:#f0faf0; color:#2d7a30; border-color:#a8e0a8">tempe & cabai</a>
        </div>
    </form>

    {{-- ERROR --}}
    @if(session('error'))
        <div class="flex items-center gap-2 bg-red-50 text-red-700 border border-red-200 text-sm px-4 py-3 rounded-xl mb-6">
            <i class="ti ti-alert-circle"></i> {{ session('error') }}
        </div>
    @endif

    {{-- RESULTS --}}
    @if($daftarResep)
        <div class="flex items-center justify-between mb-4 flex-wrap gap-2">
            <div class="text-sm text-gray-500">
                Hasil untuk: <span class="font-semibold" style="color:#2d7a30">"{{ $bahanSisa }}"</span>
            </div>
            @if(!$daftarResep->isEmpty())
                <span class="text-xs px-3 py-1 rounded-full font-medium" style="background:#f0faf0; color:#2d7a30; border:1px solid #a8e0a8">
                    {{ $daftarResep->count() }} resep ditemukan
                </span>
            @endif
        </div>

        @if($daftarResep->isEmpty())
            <div class="bg-white border border-gray-100 rounded-2xl p-10 text-center shadow-sm">
                <i class="ti ti-mood-empty text-4xl text-gray-300 block mb-3"></i>
                <p class="text-sm text-gray-400">Maaf, tidak ada resep yang cocok dengan bahan tersebut.</p>
            </div>
        @else
            {{-- SUCCESS / INFO FLASH --}}
            @if(session('success'))
                <div class="flex items-center gap-2 text-sm px-4 py-3 rounded-xl mb-4 border" style="background:#f0faf0; color:#2d7a30; border-color:#a8e0a8">
                    <i class="ti ti-circle-check"></i> {{ session('success') }}
                </div>
            @endif
            @if(session('info'))
                <div class="flex items-center gap-2 text-sm px-4 py-3 rounded-xl mb-4 border border-blue-200 bg-blue-50 text-blue-700">
                    <i class="ti ti-info-circle"></i> {{ session('info') }}
                </div>
            @endif

            <div class="grid md:grid-cols-3 gap-5">
                @foreach($daftarResep as $resep)
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden flex flex-col">

                    {{-- CARD IMAGE --}}
                    <div class="h-36 relative flex items-center justify-center overflow-hidden" style="background: linear-gradient(135deg, #d4f0d4, #4CAF4F)">
                        @if(isset($resep['image']))
                            <img src="{{ $resep['image'] }}" alt="{{ $resep['recipe_name_en'] ?? $resep['name'] ?? 'Resep' }}" class="w-full h-full object-cover absolute inset-0">
                        @else
                            <i class="ti ti-bowl-chopsticks text-5xl" style="color:rgba(255,255,255,0.4)"></i>
                        @endif
                        <div class="absolute top-2.5 right-2.5 flex items-center gap-1 text-xs font-semibold px-2.5 py-1 rounded-full" style="background:rgba(255,255,255,0.92); color:#2d7a30">
                            <i class="ti ti-target text-xs"></i> {{ $resep['similarity_score'] ?? '0' }}%
                        </div>
                    </div>

                    <div class="p-4 flex flex-col gap-3 flex-1">
                        {{-- TITLE --}}
                        <div>
                            <h3 class="text-sm font-semibold text-gray-900 leading-snug">
                                {{ $resep['recipe_name_en'] ?? $resep['name'] ?? 'Judul Tidak Tersedia' }}
                            </h3>
                        </div>

                        {{-- INGREDIENTS --}}
                        <div>
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1.5">Bahan-bahan</p>
                            <div class="flex flex-wrap gap-1">
                                @if(isset($resep['ingredients']) && is_array($resep['ingredients']))
                                    @foreach($resep['ingredients'] as $bahan)
                                        <span class="text-xs px-2 py-0.5 rounded-full" style="background:#f0faf0; color:#2d7a30; border:0.5px solid #a8e0a8">{{ $bahan }}</span>
                                    @endforeach
                                @elseif(isset($resep['ingredients']))
                                    <span class="text-xs px-2 py-0.5 rounded-full" style="background:#f0faf0; color:#2d7a30; border:0.5px solid #a8e0a8">{{ $resep['ingredients'] }}</span>
                                @else
                                    <span class="text-xs text-gray-400 italic">Bahan tidak tersedia</span>
                                @endif
                            </div>
                        </div>

                        {{-- STEPS --}}
                        <div class="flex-1">
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1.5">Langkah memasak</p>
                            <ol class="text-xs text-gray-500 space-y-1 list-decimal list-inside leading-relaxed">
                                @if(isset($resep['steps']) && is_array($resep['steps']))
                                    @foreach($resep['steps'] as $langkah)
                                        <li>{{ $langkah }}</li>
                                    @endforeach
                                @elseif(isset($resep['instructions']) && is_array($resep['instructions']))
                                    @foreach($resep['instructions'] as $langkah)
                                        <li>{{ $langkah }}</li>
                                    @endforeach
                                @else
                                    <li class="italic text-gray-300">Langkah memasak tidak tersedia</li>
                                @endif
                            </ol>
                        </div>

                        {{-- FAVORITE ACTION --}}
                        <div class="mt-auto pt-2 border-t border-gray-100">
                            @auth
                                <form action="{{ route('favorit.tambah') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="recipe_id" value="{{ $resep['id'] ?? $resep['recipe_id'] }}">
                                    <input type="hidden" name="recipe_name" value="{{ $resep['recipe_name_en'] ?? $resep['name'] ?? $resep['recipe_name'] ?? 'Resep Rekomendasi AI' }}">
                                    <input type="hidden" name="ingredients" value="{{ isset($resep['ingredients']) ? (is_array($resep['ingredients']) ? json_encode($resep['ingredients']) : $resep['ingredients']) : '' }}">
                                    <input type="hidden" name="steps" value="{{ isset($resep['steps']) ? (is_array($resep['steps']) ? json_encode($resep['steps']) : $resep['steps']) : (isset($resep['instructions']) ? (is_array($resep['instructions']) ? json_encode($resep['instructions']) : $resep['instructions']) : '') }}">
                                    <button type="submit" class="w-full flex items-center justify-center gap-2 py-2.5 text-sm font-semibold text-white rounded-xl transition cursor-pointer" style="background:#4CAF4F">
                                        <i class="ti ti-heart text-sm"></i> Simpan ke Favorit
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="w-full flex items-center justify-center gap-2 py-2.5 text-sm font-medium text-gray-400 bg-gray-50 hover:bg-gray-100 rounded-xl border border-gray-200 transition">
                                    <i class="ti ti-lock text-sm"></i> Login untuk Simpan Favorit
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    @endif

    {{-- FOOTER --}}
    <p class="text-center text-xs text-gray-400 mt-8 flex items-center justify-center gap-1.5">
        <i class="ti ti-leaf text-sm" style="color:#4CAF4F"></i>
        Kurangi limbah makanan, mulai dari dapur kita
    </p>

</div>
</body>
</html>