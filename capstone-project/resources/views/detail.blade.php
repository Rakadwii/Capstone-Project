<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Resep - Zero Waste Kitchen</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
</head>
<body class="bg-gray-50 min-h-screen text-gray-800">

<div class="max-w-2xl mx-auto py-10 px-4">

    {{-- BACK LINK --}}
    <a href="{{ route('favorit.index') }}"
       class="inline-flex items-center gap-1.5 text-xs font-semibold mb-5 transition"
       style="color:#2d7a30">
        <i class="ti ti-arrow-left text-xs"></i> Kembali ke Favorit
    </a>

    {{-- MAIN CARD --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

        {{-- HERO --}}
        <div class="h-40 relative flex items-center justify-center"
             style="background: linear-gradient(135deg, #d4f0d4, #4CAF4F)">
            <i class="ti ti-bowl-chopsticks text-6xl" style="color:rgba(255,255,255,0.35)"></i>
            <div class="absolute bottom-0 inset-x-0 h-12"
                 style="background: linear-gradient(to top, white, transparent)"></div>
        </div>

        <div class="px-6 pb-6">

            {{-- JUDUL --}}
            <div class="mb-5">
                <h1 class="text-xl font-semibold text-gray-900 mb-1">{{ $resep->recipe_name }}</h1>
                @if($resep->description)
                    <p class="text-sm text-gray-500 leading-relaxed">{{ $resep->description }}</p>
                @endif
            </div>

            <hr class="border-gray-100 mb-5">

            {{-- BAHAN-BAHAN --}}
            <div class="mb-5">
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0"
                         style="background:#f0faf0">
                        <i class="ti ti-basket text-sm" style="color:#4CAF4F"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-gray-800">Bahan-bahan</h2>
                </div>

                @php
                    $ingredients = json_decode($resep->ingredients);
                    $ingredientList = is_array($ingredients) ? $ingredients : explode("\n", $resep->ingredients);
                @endphp

                <div class="bg-gray-50 border border-gray-100 rounded-xl p-4 flex flex-wrap gap-1.5">
                    @foreach(array_filter($ingredientList) as $bahan)
                        <span class="text-xs px-2.5 py-1 rounded-full font-medium"
                              style="background:#f0faf0; color:#2d7a30; border:0.5px solid #a8e0a8">
                            {{ trim($bahan) }}
                        </span>
                    @endforeach
                </div>
            </div>

            {{-- LANGKAH MEMASAK --}}
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0"
                         style="background:#f0faf0">
                        <i class="ti ti-list-numbers text-sm" style="color:#4CAF4F"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-gray-800">Langkah Memasak</h2>
                </div>

                @php
                    $steps = json_decode($resep->steps);
                    $stepList = is_array($steps) ? $steps : explode("\n", $resep->steps);
                    $stepList = array_values(array_filter($stepList));
                @endphp

                <div class="flex flex-col gap-2">
                    @foreach($stepList as $i => $langkah)
                        @if($loop->last)
                            {{-- Langkah terakhir: highlight hijau --}}
                            <div class="flex gap-3 items-start">
                                <div class="w-6 h-6 rounded-full flex-shrink-0 flex items-center justify-center mt-0.5"
                                     style="background:#3d9940">
                                    <i class="ti ti-check text-xs text-white"></i>
                                </div>
                                <div class="flex-1 text-xs leading-relaxed px-3 py-2.5 rounded-xl font-medium"
                                     style="background:#f0faf0; border:0.5px solid #a8e0a8; color:#2d7a30">
                                    {{ trim($langkah) }}
                                </div>
                            </div>
                        @else
                            <div class="flex gap-3 items-start">
                                <div class="w-6 h-6 rounded-full flex-shrink-0 flex items-center justify-center mt-0.5"
                                     style="background:#4CAF4F">
                                    <span class="text-xs font-semibold text-white">{{ $i + 1 }}</span>
                                </div>
                                <div class="flex-1 text-xs leading-relaxed text-gray-700 px-3 py-2.5 rounded-xl bg-gray-50 border border-gray-100">
                                    {{ trim($langkah) }}
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

        </div>
    </div>

    <p class="text-center text-xs text-gray-400 mt-6 flex items-center justify-center gap-1.5">
        <i class="ti ti-leaf text-sm" style="color:#4CAF4F"></i>
        Kurangi limbah makanan, mulai dari dapur kita
    </p>
</div>

</body>
</html>