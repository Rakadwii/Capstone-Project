<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Zero Waste Kitchen</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">

<div class="w-full max-w-sm">

    {{-- BRAND --}}
    <div class="flex items-center justify-center gap-2 mb-6">
        <div class="w-8 h-8 rounded-xl flex items-center justify-center flex-shrink-0">
            <img src="{{ asset('analisa/img/logo.png') }}" alt="Logo">
        </div>
        <span class="text-sm font-semibold" style="color:#2d7a30">Zero Waste Kitchen</span>
    </div>

    {{-- CARD --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

        <div class="px-6 pt-6 pb-4 border-b border-gray-100">
            <h2 class="text-lg font-semibold text-gray-900 mb-0.5">Selamat datang kembali</h2>
            <p class="text-xs text-gray-400">Masuk ke akun Zero Waste Kitchen kamu</p>
        </div>

        <div class="px-6 py-5">

            {{-- ERROR --}}
            @if($errors->any())
                <div class="flex items-start gap-2 text-xs px-3 py-2.5 rounded-xl mb-4 border"
                     style="background:#fef2f2; border-color:#fecaca; color:#b91c1c">
                    <i class="ti ti-alert-circle text-sm flex-shrink-0 mt-px"></i>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-medium text-gray-500 mb-1.5">Email</label>
                    <div class="relative">
                        <i class="ti ti-mail absolute left-2.5 top-1/2 -translate-y-1/2 text-gray-400 text-sm pointer-events-none"></i>
                        <input type="email" name="email" value="{{ old('email') }}" required
                               class="w-full pl-8 pr-3 py-2.5 text-sm border border-gray-200 rounded-xl bg-gray-50 focus:outline-none focus:border-green-400 focus:ring-1 focus:ring-green-400 transition"
                               placeholder="nama@email.com">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="text-xs font-medium text-gray-500">Password</label>
                        <a href="{{ route('password.request') }}" class="text-xs font-medium transition" style="color:#4CAF4F">
                            Lupa password?
                        </a>
                    </div>
                    <div class="relative">
                        <i class="ti ti-lock absolute left-2.5 top-1/2 -translate-y-1/2 text-gray-400 text-sm pointer-events-none"></i>
                        <input type="password" name="password" required
                               class="w-full pl-8 pr-3 py-2.5 text-sm border border-gray-200 rounded-xl bg-gray-50 focus:outline-none focus:border-green-400 focus:ring-1 focus:ring-green-400 transition"
                               placeholder="••••••••">
                    </div>
                </div>

                <button type="submit"
                        class="w-full flex items-center justify-center gap-2 py-2.5 text-sm font-semibold text-white rounded-xl transition mt-1"
                        style="background:#4CAF4F">
                    <i class="ti ti-login text-sm"></i> Masuk
                </button>
            </form>

            <p class="text-center text-xs text-gray-400 mt-5">
                Belum punya akun?
                <a href="{{ route('register') }}" class="font-semibold transition" style="color:#4CAF4F">Daftar sekarang</a>
            </p>
        </div>
    </div>
</div>

</body>
</html>