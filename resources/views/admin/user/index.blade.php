@extends('layouts.app')

@section('title', 'Manajemen User')

@section('content')
{{-- Bagian Alert Success --}}
@if(session('success'))
    <div id="alert-success" class="flex items-center p-4 mb-4 text-emerald-800 rounded-2xl bg-emerald-50 border border-emerald-100 transition-opacity duration-500">
        <i class="fa-solid fa-circle-check mr-2"></i>
        <span class="text-sm font-medium">{{ session('success') }}</span>
        <button onclick="this.parentElement.remove()" class="ml-auto text-emerald-500">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
@endif

{{-- Bagian Alert Error --}}
@if ($errors->any())
    <div class="bg-red-100 text-red-600 p-4 rounded-xl mb-4 border border-red-200">
        <ul class="text-sm font-medium">
            @foreach ($errors->all() as $error)
                <li><i class="fa-solid fa-circle-exclamation mr-1"></i> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="bg-white rounded-3xl shadow-sm p-6 border border-slate-100">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-lg font-bold text-[#2C3341]">Daftar Pengguna</h3>
        <button onclick="document.getElementById('modalTambah').classList.remove('hidden')" class="bg-[#3F597A] text-white px-5 py-2.5 rounded-xl font-bold flex items-center gap-2 text-sm shadow-lg shadow-[#3F597A]/20 hover:bg-[#2c425c] transition">
            <i class="fa-solid fa-plus"></i> Tambah User
        </button>
    </div>

    <table id="tabelUser" class="w-full text-left">
        <thead>
            <tr class="text-[#3F597A] text-xs uppercase bg-slate-50">
                <th class="p-4">No</th>
                <th class="p-4">Nama</th>
                <th class="p-4">Jenis Kelamin</th>
                <th class="p-4">Alamat</th>
                <th class="p-4">Username</th>
                <th class="p-4">Role</th>
                <th class="p-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="border-b text-sm hover:bg-slate-50 transition">
                <td class="p-4">{{ $loop->iteration }}</td>
                <td class="p-4">{{ $user->name }}</td>
                <td class="p-4">{{ $user->jenis_kelamin }}</td>
                <td class="p-4">{{ Str::limit($user->alamat, 30) }}</td>
                <td class="p-4">{{ $user->username }}</td>
                <td class="p-4">
                    <span class="px-3 py-1 rounded-full text-[10px] font-bold {{ $user->role == 'admin' ? 'bg-purple-100 text-purple-600' : 'bg-blue-100 text-blue-600' }}">
                        {{ strtoupper($user->role) }}
                    </span>
                </td>
                <td class="p-4">
                    <div class="flex items-center justify-center gap-3">
                        {{-- Gunakan @json agar data aman dari karakter aneh --}}
                        <button onclick='editUser(@json($user))' class="text-blue-400 hover:text-blue-600 transition">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>

                        <form id="delete-form-{{ $user->id }}" action="{{ route('user.destroy', $user->id) }}" method="POST" class="hidden">
                            @csrf
                            @method('DELETE')
                        </form>

                        <button type="button" onclick="confirmDelete('{{ $user->id }}', '{{ $user->name }}')" class="text-red-400 hover:text-red-600 transition">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('admin.user.tambah')
@include('admin.user.edit')

@endsection

@push('scripts')
<script type="module">
    $(document).ready(function() {
        $('#tabelUser').DataTable({
            responsive: true,
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                paginate: {
                    next: "Lanjut",
                    previous: "Kembali"
                }
            }
        });

        // Auto-hide alert success setelah 3 detik
        setTimeout(function() {
            const alert = document.getElementById('alert-success');
            if (alert) {
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }
        }, 3000);
    });

    // Tempelkan ke window agar bisa dipanggil onclick
    window.editUser = function(user) {
        const form = document.getElementById('formEdit');
        // Pastikan URL mengarah ke route update Anda
        form.action = `/manajemen-user/${user.id}`;

        // Isi field input di modal edit
        document.getElementById('edit_name').value = user.name;
        document.getElementById('edit_username').value = user.username;
        document.getElementById('edit_alamat').value = user.alamat;
        document.getElementById('edit_role').value = user.role;

        // Logika Radio Button Gender
        if (user.jenis_kelamin === 'Laki-laki') {
            document.getElementById('edit_lk').checked = true;
        } else if (user.jenis_kelamin === 'Perempuan') {
            document.getElementById('edit_pr').checked = true;
        }

        // Tampilkan Modal
        document.getElementById('modalEdit').classList.remove('hidden');
    }

    window.togglePassword = function(inputId, iconId) {
        const passwordInput = document.getElementById(inputId);
        const icon = document.getElementById(iconId);

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }

    window.confirmDelete = function(id, name) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan menghapus user " + name + ". Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#E4664E', // Warna oranye sesuai tema Anda
            cancelButtonColor: '#94a3b8',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            reverseButtons: true,
            borderRadius: '20px' // Agar senada dengan desain rounded Anda
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika user klik Oke, jalankan submit form
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }

    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
    @endif
</script>
@endpush
