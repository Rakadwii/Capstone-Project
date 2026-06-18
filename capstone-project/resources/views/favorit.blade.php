<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Favorit Saya - Zero Waste Kitchen</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
</head>
<body class="bg-gray-50 min-h-screen text-gray-800">

<div class="max-w-4xl mx-auto py-10 px-4">

    {{-- ALERT SUKSES / ERROR --}}
    @if(session('success'))
        <div class="mb-4 flex items-center gap-2 text-sm text-green-700 bg-green-50 border border-green-200 rounded-xl px-4 py-3">
            <i class="ti ti-circle-check text-base"></i> {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="mb-4 flex items-center gap-2 text-sm text-red-700 bg-red-50 border border-red-200 rounded-xl px-4 py-3">
            <i class="ti ti-alert-circle text-base"></i> {{ session('error') }}
        </div>
    @endif

    {{-- CARD UTAMA --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

        {{-- HEADER --}}
        <div class="flex flex-wrap items-center justify-between gap-4 px-6 py-4 border-b border-gray-100">
            <div>
                <h1 class="text-base font-semibold text-gray-900 mb-0.5">Menu Favorit Saya</h1>
                <p class="text-xs text-gray-400">Daftar resep pilihan yang disimpan untuk mengurangi food waste.</p>
            </div>
            <div class="flex gap-2 flex-wrap">
                <a href="{{ route('rekomendasi.cari') }}"
                   class="flex items-center gap-1.5 text-sm text-gray-600 hover:text-gray-900 px-3 py-2 rounded-xl border border-gray-200 bg-gray-50 hover:bg-gray-100 transition">
                    <i class="ti ti-home text-sm"></i> Beranda
                </a>
                <a href="{{ route('rekomendasi.cari') }}"
                   class="flex items-center gap-1.5 text-sm font-semibold text-white px-4 py-2 rounded-xl transition"
                   style="background:#4CAF4F">
                    <i class="ti ti-search text-sm"></i> Cari Resep
                </a>
            </div>
        </div>

        {{-- KONTEN --}}
        @if($daftarFavorit->isEmpty())
            <div class="flex flex-col items-center justify-center py-16 px-4 text-center">
                <i class="ti ti-heart text-4xl text-gray-200 mb-3 block"></i>
                <p class="text-sm text-gray-400">Kamu belum memiliki resep favorit.</p>
                <p class="text-xs text-gray-300 mt-1">Yuk, cari rekomendasi resep dulu!</p>
                <a href="{{ route('rekomendasi.cari') }}"
                   class="mt-4 flex items-center gap-2 text-sm font-semibold text-white px-4 py-2 rounded-xl transition"
                   style="background:#4CAF4F">
                    <i class="ti ti-search text-sm"></i> Cari Sekarang
                </a>
            </div>
        @else
            <div class="p-5 grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($daftarFavorit as $fav)
                    <div class="border border-gray-100 rounded-xl overflow-hidden flex flex-col relative">

                        {{-- ILUSTRASI HEADER --}}
                        <div class="h-24 flex items-center justify-center relative"
                             style="background: linear-gradient(135deg, #d4f0d4, #4CAF4F)">
                            <i class="ti ti-bowl-chopsticks text-4xl" style="color:rgba(255,255,255,0.45)"></i>

                            {{-- TOMBOL HAPUS (ikon X di pojok kanan atas) --}}
                            <button type="button"
                                    onclick="bukaModalHapus({{ $fav->favorit_id }}, '{{ addslashes($fav->recipe_name) }}')"
                                    class="absolute top-2 right-2 w-7 h-7 flex items-center justify-center rounded-full bg-white/80 hover:bg-white text-red-500 hover:text-red-600 transition shadow-sm"
                                    title="Hapus dari favorit">
                                <i class="ti ti-trash text-sm"></i>
                            </button>
                        </div>

                        <div class="p-4 flex flex-col flex-1 gap-2">
                            <h3 class="text-sm font-semibold text-gray-900">{{ $fav->recipe_name }}</h3>

                            @if($fav->description)
                                <p class="text-xs text-gray-500 leading-relaxed flex-1">{{ $fav->description }}</p>
                            @endif

                            <div class="pt-3 border-t border-gray-100 flex items-center justify-between">
                                {{-- <button type="button"
                                        onclick="bukaModalHapus({{ $fav->favorit_id }}, '{{ addslashes($fav->recipe_name) }}')"
                                        class="flex items-center gap-1.5 text-xs font-semibold text-gray-400 hover:text-red-500 transition">
                                    <i class="ti ti-trash text-xs"></i>
                                    Hapus
                                </button> --}}

                                <a href="{{ route('resep.detail', $fav->recipe_id) }}"
                                   class="flex items-center gap-1.5 text-xs font-semibold transition"
                                   style="color:#2d7a30">
                                    Lihat Detail
                                    <i class="ti ti-arrow-right text-xs"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <p class="text-center text-xs text-gray-400 mt-6 flex items-center justify-center gap-1.5">
        <i class="ti ti-leaf text-sm" style="color:#4CAF4F"></i>
        Kurangi limbah makanan, mulai dari dapur kita
    </p>
</div>

{{-- MODAL KONFIRMASI HAPUS --}}
<div id="modalHapus" class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50 px-4">
    <div class="bg-white rounded-2xl shadow-lg max-w-sm w-full p-6">
        <div class="flex items-center gap-3 mb-3">
            <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center">
                <i class="ti ti-alert-triangle text-red-500 text-lg"></i>
            </div>
            <h2 class="text-sm font-semibold text-gray-900">Hapus dari Favorit?</h2>
        </div>
        <p class="text-sm text-gray-500 mb-5">
            Resep <span id="namaResepHapus" class="font-semibold text-gray-700"></span> akan dihapus dari daftar favorit kamu. Tindakan ini tidak dapat dibatalkan.
        </p>

        <form id="formHapusFavorit" method="POST" action="">
            @csrf
            @method('DELETE')
            <div class="flex justify-end gap-2">
                <button type="button" onclick="tutupModalHapus()"
                        class="px-4 py-2 rounded-xl text-sm font-medium text-gray-600 bg-gray-100 hover:bg-gray-200 transition">
                    Batal
                </button>
                <button type="submit"
                        class="px-4 py-2 rounded-xl text-sm font-semibold text-white bg-red-500 hover:bg-red-600 transition">
                    Ya, Hapus
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function bukaModalHapus(favoritId, namaResep) {
        const modal = document.getElementById('modalHapus');
        const form = document.getElementById('formHapusFavorit');
        const nama = document.getElementById('namaResepHapus');

        form.action = '/favorit/' + favoritId;
        nama.textContent = '"' + namaResep + '"';

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function tutupModalHapus() {
        const modal = document.getElementById('modalHapus');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    // tutup modal jika klik di luar area card
    document.getElementById('modalHapus').addEventListener('click', function (e) {
        if (e.target === this) tutupModalHapus();
    });
</script>

</body>
</html>