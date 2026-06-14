<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Zero Waste Kitchen</title>
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
            <h2 class="text-lg font-semibold text-gray-900 mb-0.5">Buat akun baru</h2>
            <p class="text-xs text-gray-400">Bergabung menjaga bumi dari food waste</p>
        </div>

        <div class="px-6 py-5">
            <form action="{{ route('register.proses') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-medium text-gray-500 mb-1.5">Nama lengkap</label>
                    <div class="relative">
                        <i class="ti ti-user absolute left-2.5 top-1/2 -translate-y-1/2 text-gray-400 text-sm pointer-events-none"></i>
                        <input type="text" name="name" value="{{ old('name') }}" required
                               class="w-full pl-8 pr-3 py-2.5 text-sm border border-gray-200 rounded-xl bg-gray-50 focus:outline-none focus:border-green-400 focus:ring-1 focus:ring-green-400 transition"
                               placeholder="Nama kamu">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-medium text-gray-500 mb-1.5">Email</label>
                    <div class="relative">
                        <i class="ti ti-mail absolute left-2.5 top-1/2 -translate-y-1/2 text-gray-400 text-sm pointer-events-none"></i>
                        <input type="email" name="email" value="{{ old('email') }}" required
                               class="w-full pl-8 pr-3 py-2.5 text-sm border border-gray-200 rounded-xl bg-gray-50 focus:outline-none focus:border-green-400 focus:ring-1 focus:ring-green-400 transition"
                               placeholder="nama@email.com">
                    </div>
                    @error('email')
                        <div class="flex items-center gap-1.5 mt-1.5">
                            <i class="ti ti-alert-circle text-xs" style="color:#e24b4a"></i>
                            <span class="text-xs" style="color:#e24b4a">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-medium text-gray-500 mb-1.5">Password</label>
                    <div class="relative">
                        <i class="ti ti-lock absolute left-2.5 top-1/2 -translate-y-1/2 text-gray-400 text-sm pointer-events-none"></i>
                        <input type="password" name="password" required
                               class="w-full pl-8 pr-3 py-2.5 text-sm border border-gray-200 rounded-xl bg-gray-50 focus:outline-none focus:border-green-400 focus:ring-1 focus:ring-green-400 transition"
                               placeholder="Min. 8 karakter">
                    </div>
                    @error('password')
                        <div class="flex items-center gap-1.5 mt-1.5">
                            <i class="ti ti-alert-circle text-xs" style="color:#e24b4a"></i>
                            <span class="text-xs" style="color:#e24b4a">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-medium text-gray-500 mb-1.5">Konfirmasi password</label>
                    <div class="relative">
                        <i class="ti ti-lock-check absolute left-2.5 top-1/2 -translate-y-1/2 text-gray-400 text-sm pointer-events-none"></i>
                        <input type="password" name="password_confirmation" required
                               class="w-full pl-8 pr-3 py-2.5 text-sm border border-gray-200 rounded-xl bg-gray-50 focus:outline-none focus:border-green-400 focus:ring-1 focus:ring-green-400 transition"
                               placeholder="Ulangi password">
                    </div>
                </div>

                <button type="submit"
                        class="w-full flex items-center justify-center gap-2 py-2.5 text-sm font-semibold text-white rounded-xl transition mt-1 cursor-pointer"
                        style="background:#4CAF4F">
                    <i class="ti ti-user-plus text-sm"></i> Daftar Akun
                </button>
            </form>

            <p class="text-center text-xs text-gray-400 mt-5">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="font-semibold transition" style="color:#4CAF4F">Masuk disini</a>
            </p>
        </div>
    </div>
</div>

</body>
</html>