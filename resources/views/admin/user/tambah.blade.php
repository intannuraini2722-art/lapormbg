<div id="modalTambah" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl p-8 w-full max-w-md shadow-2xl">
        <h3 class="text-xl font-bold mb-6 text-[#2C3341]">Tambah User Baru</h3>
        <form action="{{ route('user.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="text" name="name" placeholder="Nama Lengkap" class="w-full p-3 bg-slate-50 rounded-xl border-none focus:ring-2 focus:ring-[#93B8D0]" required>
            @error('name')<p class="text-red-500 text-xs mt-1 ml-1">{{ $message }}</p>@enderror
            <div class="flex gap-4 p-1">
                <label class="flex items-center gap-2 text-sm text-slate-600">
                    <input type="radio" name="jenis_kelamin" value="Laki-laki" class="text-[#E4664E] focus:ring-[#E4664E]" required> Laki-laki
                    @error('jenis_kelamin')<p class="text-red-500 text-xs mt-1 ml-1">{{ $message }}</p>@enderror
                </label>
                <label class="flex items-center gap-2 text-sm text-slate-600">
                    <input type="radio" name="jenis_kelamin" value="Perempuan" class="text-[#E4664E] focus:ring-[#E4664E]"> Perempuan
                    @error('jenis_kelamin')<p class="text-red-500 text-xs mt-1 ml-1">{{ $message }}</p>@enderror
                </label>
            </div>

            <textarea name="alamat" placeholder="Alamat Lengkap" rows="3" class="w-full p-3 bg-slate-50 rounded-xl border-none focus:ring-2 focus:ring-[#93B8D0]" required></textarea>
            @error('alamat')<p class="text-red-500 text-xs mt-1 ml-1">{{ $message }}</p>@enderror
            <input type="text" name="username" placeholder="Username" class="w-full p-3 bg-slate-50 rounded-xl border-none focus:ring-2 focus:ring-[#93B8D0]" required>
            @error('username')<p class="text-red-500 text-xs mt-1 ml-1">{{ $message }}</p>@enderror
            <div class="relative">
                <input type="password" name="password" id="password_tambah" placeholder="Password"
                    class="w-full p-3 bg-slate-50 rounded-xl border-none focus:ring-2 focus:ring-[#93B8D0]" required>
                    @error('password')<p class="text-red-500 text-xs mt-1 ml-1">{{ $message }}</p>@enderror
                <button type="button" onclick="togglePassword('password_tambah', 'icon_tambah')"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-[#3F597A]">
                    <i id="icon_tambah" class="fa-solid fa-eye"></i>
                </button>
            </div>
            <select name="role" class="w-full p-3 bg-slate-50 rounded-xl border-none focus:ring-2 focus:ring-[#93B8D0]">
                <option value="masyarakat">Masyarakat</option>
                <option value="admin">Admin</option>
            </select>

            <div class="flex gap-3 pt-4">
                <button type="button" onclick="document.getElementById('modalTambah').classList.add('hidden')" class="flex-1 p-3 bg-slate-100 rounded-xl font-bold text-slate-500">Batal</button>
                <button type="submit" class="flex-1 p-3 bg-[#E4664E] text-white rounded-xl font-bold shadow-lg shadow-[#E4664E]/20">Simpan User</button>
            </div>
        </form>
    </div>
</div>
