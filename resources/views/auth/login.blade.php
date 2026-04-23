<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MBG Lapor</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-[#D7EFF0] flex items-center justify-center min-h-screen m-0 p-4">

    <div class="bg-white p-8 rounded-[2rem] shadow-2xl w-full max-w-[400px] border border-[#93B8D0]/30 transition-all">

        <div class="w-20 h-20 bg-[#3F597A] rounded-2xl mx-auto mb-6 flex items-center justify-center shadow-lg text-white text-4xl font-bold">
            M
        </div>

        <h2 class="text-2xl font-black text-[#2C3341] text-center mb-1">Selamat Datang</h2>
        <p class="text-slate-500 text-sm mb-8 text-center leading-relaxed">Masuk ke Sistem Pengaduan <br> Makan Bergizi Gratis</p>
        @if(session('sukses'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-6 text-sm text-center">
                {{ session('sukses') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="bg-[#E4664E]/10 border border-[#E4664E] text-[#E4664E] p-3 rounded-xl mb-4 text-sm">
                {{ $errors->first('username') }}
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="text-xs font-bold uppercase tracking-wider text-[#3F597A] ml-1 mb-2 block">Username</label>
                <input type="text" name="username" placeholder="Masukkan username" value="{{ old('username') }}"
                    class="w-full p-4 rounded-2xl border border-slate-100 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#93B8D0] focus:border-[#93B8D0] outline-none transition-all" required>
            </div>

            <div>
                <label class="text-xs font-bold uppercase tracking-wider text-[#3F597A] ml-1 mb-2 block">Password</label>
                <input type="password" name="password" placeholder="••••••••"
                    class="w-full p-4 rounded-2xl border border-slate-100 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#93B8D0] focus:border-[#93B8D0] outline-none transition-all" required>
            </div>

            <button type="submit"
                class="w-full bg-[#3F597A] text-white py-4 rounded-2xl font-bold hover:bg-[#2C3341] transition-all shadow-lg shadow-[#3F597A]/20 active:scale-[0.98]">
                Masuk Sekarang
            </button>
        </form>

        <div class="mt-10 pt-6 border-t border-slate-100 text-center">
            <p class="text-sm text-slate-500">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-[#E4664E] font-bold hover:underline ml-1">Daftar Sekarang</a>
            </p>
        </div>
    </div>
</body>
</html>
