<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - MBG Lapor</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-[#D7EFF0] flex items-center justify-center min-h-screen m-0 p-6">

    <div class="bg-white p-8 rounded-[2rem] shadow-2xl w-full max-w-[450px] border border-[#93B8D0]/30 my-10">

        <div class="text-center mb-8">
            <h2 class="text-2xl font-black text-[#2C3341]">Buat Akun Baru</h2>
            <p class="text-slate-500 text-sm mt-1">Lengkapi data untuk mulai melaporkan</p>
        </div>
        @if ($errors->any())
            <div class="bg-[#E4664E]/10 border border-[#E4664E]/20 text-[#E4664E] px-4 py-3 rounded-2xl mb-6 text-sm">
                <div class="font-bold mb-1">Terjadi kesalahan:</div>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="text-xs font-bold uppercase tracking-wider text-[#3F597A] ml-1 mb-1 block">Nama Lengkap</label>
                <input type="text" name="name" placeholder="Contoh: Budi Santoso"
                    class="w-full p-3.5 rounded-2xl border border-slate-100 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#93B8D0] outline-none transition-all" required>
            </div>

            <div>
                <label class="text-xs font-bold uppercase tracking-wider text-[#3F597A] ml-1 mb-2 block">Jenis Kelamin</label>
                <div class="flex gap-4 px-2">
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="radio" name="jenis_kelamin" value="Laki-laki" class="w-4 h-4 text-[#3F597A] focus:ring-[#3F597A]" required>
                        <span class="text-sm text-slate-600 group-hover:text-[#3F597A]">Laki-laki</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="radio" name="jenis_kelamin" value="Perempuan" class="w-4 h-4 text-[#3F597A] focus:ring-[#3F597A]" required>
                        <span class="text-sm text-slate-600 group-hover:text-[#3F597A]">Perempuan</span>
                    </label>
                </div>
            </div>

            <div>
                <label class="text-xs font-bold uppercase tracking-wider text-[#3F597A] ml-1 mb-1 block">Alamat Lengkap</label>
                <textarea name="alamat" rows="2" placeholder="Alamat rumah atau domisili"
                    class="w-full p-3.5 rounded-2xl border border-slate-100 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#93B8D0] outline-none transition-all resize-none" required></textarea>
            </div>

            <div>
                <label class="text-xs font-bold uppercase tracking-wider text-[#3F597A] ml-1 mb-1 block">Username</label>
                <input type="text" name="username" placeholder="budisantoso123" value="{{ old('username') }}"
                    class="w-full p-3.5 rounded-2xl border border-slate-100 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#93B8D0] outline-none transition-all" required>
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="text-xs font-bold uppercase tracking-wider text-[#3F597A] ml-1 mb-1 block">Password</label>
                    <input type="password" name="password" placeholder="••••••••"
                        class="w-full p-3.5 rounded-2xl border border-slate-100 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#93B8D0] outline-none transition-all" required>
                </div>
                <div>
                    <label class="text-xs font-bold uppercase tracking-wider text-[#3F597A] ml-1 mb-1 block">Konfirmasi</label>
                    <input type="password" name="password_confirmation" placeholder="••••••••"
                        class="w-full p-3.5 rounded-2xl border border-slate-100 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#93B8D0] outline-none transition-all" required>
                </div>
            </div>

            <button type="submit"
                class="w-full bg-[#E4664E] text-white py-4 rounded-2xl font-bold hover:bg-[#d1563f] transition-all shadow-lg shadow-[#E4664E]/20 mt-4">
                Daftar Akun
            </button>
        </form>

        <div class="mt-8 pt-6 border-t border-slate-100 text-center">
            <p class="text-sm text-slate-500">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-[#3F597A] font-bold hover:underline ml-1">Login di sini</a>
            </p>
        </div>
    </div>

</body>
</html>
