<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengaduan MBG</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-[#D7EFF0] font-sans text-[#2C3341]">

    <div class="flex h-screen overflow-hidden">
        <aside class="w-72 bg-[#3F597A] text-white flex-shrink-0 hidden md:flex flex-col shadow-xl">
            <div class="p-6 text-2xl font-black border-b border-[#93B8D0]/20 flex items-center gap-3">
                <div class="w-8 h-8 bg-[#E4664E] rounded-lg flex items-center justify-center text-sm">
                    <i class="fa-solid fa-bowl-food"></i>
                </div>
                <span class="tracking-tight">MBG Lapor</span>
            </div>

            <nav class="flex-1 p-4 overflow-y-auto space-y-1">
                <p class="text-[10px] font-bold uppercase tracking-widest text-[#93B8D0] px-3 mb-2 mt-2">Menu Utama</p>

                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-[#93B8D0]/20 transition group {{ request()->routeIs('dashboard') ? 'bg-[#93B8D0]/30 border-l-4 border-[#E4664E]' : '' }}">
                    <i class="fa-solid fa-house w-5 text-[#93B8D0] group-hover:text-white"></i>
                    <span class="font-medium">Dashboard</span>
                </a>

                <a href="#" class="flex items-center gap-3 p-3 rounded-xl hover:bg-[#93B8D0]/20 transition group">
                    <i class="fa-solid fa-circle-info w-5 text-[#93B8D0] group-hover:text-white"></i>
                    <span class="font-medium">Tata Cara</span>
                </a>

                @if(auth()->user()->role == 'admin')
                    <p class="text-[10px] font-bold uppercase tracking-widest text-[#93B8D0] px-3 mb-2 mt-6">Manajemen Data</p>

                    <a href="#" class="flex items-center gap-3 p-3 rounded-xl hover:bg-[#93B8D0]/20 transition group">
                        <i class="fa-solid fa-list-check w-5 text-[#93B8D0] group-hover:text-white"></i>
                        <span class="font-medium">Kelola Pengaduan</span>
                    </a>

                    <a href="#" class="flex items-center gap-3 p-3 rounded-xl hover:bg-[#93B8D0]/20 transition group">
                        <i class="fa-solid fa-tags w-5 text-[#93B8D0] group-hover:text-white"></i>
                        <span class="font-medium">Kategori</span>
                    </a>

                    <a href="#" class="flex items-center gap-3 p-3 rounded-xl hover:bg-[#93B8D0]/20 transition group">
                        <i class="fa-solid fa-location-dot w-5 text-[#93B8D0] group-hover:text-white"></i>
                        <span class="font-medium">Lokasi Distribusi</span>
                    </a>

                    <a href="{{ route('user.index') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-[#93B8D0]/20 transition group {{ request()->routeIs('user.index') ? 'bg-[#93B8D0]/30 border-l-4 border-[#E4664E]' : '' }}">
                        <i class="fa-solid fa-users-gear w-5 text-[#93B8D0] group-hover:text-white"></i>
                        <span class="font-medium">Manajemen User</span>
                    </a>

                    <a href="#" class="flex items-center gap-3 p-3 rounded-xl hover:bg-[#93B8D0]/20 transition group text-[#D7EFF0]">
                        <i class="fa-solid fa-file-export w-5"></i>
                        <span class="font-medium">Laporan</span>
                    </a>

                @else
                    <p class="text-[10px] font-bold uppercase tracking-widest text-[#93B8D0] px-3 mb-2 mt-6">Aktivitas</p>
                    <a href="#" class="flex items-center gap-3 p-3 rounded-xl hover:bg-[#93B8D0]/20 transition group">
                        <i class="fa-solid fa-clock-rotate-left w-5 text-[#93B8D0] group-hover:text-white"></i>
                        <span class="font-medium">Riwayat Pengaduan</span>
                    </a>
                @endif
            </nav>

            <div class="p-4 border-t border-[#93B8D0]/20">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 p-3 text-[#E4664E] font-bold hover:bg-white/5 rounded-xl transition">
                        <i class="fa-solid fa-right-from-bracket w-5"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden bg-[#F8FAFC]">
            <header class="bg-white border-b border-slate-200 h-20 flex items-center justify-between px-8 shadow-sm z-10">
                <div>
                    <h2 class="text-xl font-black text-[#2C3341] tracking-tight">@yield('title')</h2>
                    <p class="text-[11px] text-slate-400 font-medium">Sistem Pengaduan Makan Bergizi Gratis</p>
                </div>

                <div class="flex items-center gap-4">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-bold text-[#2C3341] leading-none">{{ auth()->user()->name }}</p>
                        <p class="text-[10px] font-semibold text-[#3F597A] uppercase tracking-tighter">{{ auth()->user()->role }}</p>
                    </div>
                    <div class="w-12 h-12 bg-gradient-to-br from-[#93B8D0] to-[#3F597A] rounded-2xl flex items-center justify-center text-white shadow-lg border-2 border-white">
                        <i class="fa-solid fa-user text-lg"></i>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-8">
                @yield('content')
            </main>
        </div>
    </div>
@stack('scripts')
</body>
</html>
