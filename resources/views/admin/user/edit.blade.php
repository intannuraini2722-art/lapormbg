<div id="modalEdit" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl p-8 w-full max-w-md shadow-2xl">
        <h3 class="text-xl font-bold mb-6 text-[#2C3341]">Edit Data User</h3>
        <form id="formEdit" method="POST" class="space-y-4">
            @csrf @method('PUT')
            <input type="text" name="name" id="edit_name" class="w-full p-3 bg-slate-50 rounded-xl border-none focus:ring-2 focus:ring-[#93B8D0]" required>

            <div class="flex gap-4 p-1">
                <label class="flex items-center gap-2 text-sm text-slate-600">
                    <input type="radio" name="jenis_kelamin" id="edit_lk" value="Laki-laki"> Laki-laki
                </label>
                <label class="flex items-center gap-2 text-sm text-slate-600">
                    <input type="radio" name="jenis_kelamin" id="edit_pr" value="Perempuan"> Perempuan
                </label>
            </div>

            <textarea name="alamat" id="edit_alamat" rows="3" class="w-full p-3 bg-slate-50 rounded-xl border-none focus:ring-2 focus:ring-[#93B8D0]" required></textarea>

            <input type="text" name="username" id="edit_username" class="w-full p-3 bg-slate-50 rounded-xl border-none focus:ring-2 focus:ring-[#93B8D0]" required>

            <p class="text-[10px] text-slate-400 leading-tight">*Kosongkan password jika tidak ingin diubah</p>
            <input type="password" name="password" placeholder="Password Baru (Opsional)" class="w-full p-3 bg-slate-50 rounded-xl border-none focus:ring-2 focus:ring-[#93B8D0]">

            <select name="role" id="edit_role" class="w-full p-3 bg-slate-50 rounded-xl border-none">
                <option value="masyarakat">Masyarakat</option>
                <option value="admin">Admin</option>
            </select>

            <div class="flex gap-3 pt-4">
                <button type="button" onclick="document.getElementById('modalEdit').classList.add('hidden')" class="flex-1 p-3 bg-slate-100 rounded-xl font-bold text-slate-500">Batal</button>
                <button type="submit" class="flex-1 p-3 bg-[#3F597A] text-white rounded-xl font-bold shadow-lg shadow-[#3F597A]/20">Update Data</button>
            </div>
        </form>
    </div>
</div>
