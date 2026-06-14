<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori Pencarian - Zero Waste Kitchen</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
</head>
<body class="bg-gray-50 min-h-screen text-gray-800">

<div class="max-w-4xl mx-auto py-10 px-4">

    {{-- CARD UTAMA --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

        {{-- HEADER --}}
        <div class="flex flex-wrap items-center justify-between gap-4 px-6 py-4 border-b border-gray-100">
            <div>
                <h1 class="text-base font-semibold text-gray-900 mb-0.5">Histori Pencarian AI</h1>
                <p class="text-xs text-gray-400">Daftar bahan makanan sisa yang pernah dikonsultasikan ke sistem AI.</p>
            </div>
            <a href="{{ route('rekomendasi.cari') }}"
               class="flex items-center gap-1.5 text-sm text-gray-600 hover:text-gray-900 px-3 py-2 rounded-xl border border-gray-200 bg-gray-50 hover:bg-gray-100 transition">
                <i class="ti ti-arrow-left text-sm"></i> Beranda
            </a>
        </div>

        {{-- KONTEN --}}
        @if($daftarHistori->isEmpty())
            <div class="flex flex-col items-center justify-center py-16 px-4 text-center">
                <i class="ti ti-history text-4xl text-gray-200 mb-3 block"></i>
                <p class="text-sm text-gray-400">Belum ada riwayat pencarian.</p>
                <p class="text-xs text-gray-300 mt-1">Ayo mulai cari rekomendasi resep dari bahan sisamu!</p>
                <a href="{{ route('rekomendasi.cari') }}"
                   class="mt-4 flex items-center gap-2 text-sm font-semibold text-white px-4 py-2 rounded-xl transition"
                   style="background:#4CAF4F">
                    <i class="ti ti-search text-sm"></i> Cari Sekarang
                </a>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-5 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider whitespace-nowrap">Waktu</th>
                            <th class="px-5 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Bahan Sisa</th>
                            <th class="px-5 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Rekomendasi AI</th>
                            <th class="px-5 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($daftarHistori as $item)
                            <tr class="hover:bg-gray-50/60 transition">

                                {{-- WAKTU --}}
                                <td class="px-5 py-3.5 text-xs text-gray-400 whitespace-nowrap align-middle">
                                    {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                </td>

                                {{-- BAHAN --}}
                                <td class="px-5 py-3.5 align-middle">
                                    <span class="text-xs font-medium px-2.5 py-1 rounded-full"
                                          style="background:#f0faf0; color:#2d7a30; border:0.5px solid #a8e0a8">
                                        {{ $item->input_bahan }}
                                    </span>
                                </td>

                                {{-- REKOMENDASI --}}
                                <td class="px-5 py-3.5 align-middle">
                                    <div class="text-sm font-medium text-gray-800">{{ $item->rekomendasi_resep }}</div>
                                    <div class="text-xs font-medium mt-0.5" style="color:#4CAF4F">Akurasi: {{ $item->similarity_score }}%</div>
                                </td>

                                {{-- AKSI --}}
                                <td class="px-5 py-3.5 text-center align-middle">
                                    <form action="{{ route('rekomendasi.cari') }}" method="GET" class="inline">
                                        @csrf
                                        <input type="hidden" name="bahan_sisa" value="{{ $item->input_bahan }}">
                                        <button type="submit"
                                                class="flex items-center gap-1.5 text-xs font-semibold text-white px-3 py-1.5 rounded-lg transition cursor-pointer mx-auto"
                                                style="background:#4CAF4F">
                                            <i class="ti ti-search text-xs"></i> Cari Ulang
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <p class="text-center text-xs text-gray-400 mt-6 flex items-center justify-center gap-1.5">
        <i class="ti ti-leaf text-sm" style="color:#4CAF4F"></i>
        Kurangi limbah makanan, mulai dari dapur kita
    </p>
</div>

</body>
</html>