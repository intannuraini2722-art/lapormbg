@extends('layouts.app')

@section('title', 'Dashboard Utama')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-4">
        <div class="p-3 bg-slate-100 rounded-xl text-slate-500">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
        </div>
        <div>
            <p class="text-slate-500 text-sm">Total Laporan</p>
            <h3 class="text-3xl font-bold text-[#2C3341]">124</h3>
        </div>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-4">
        <div class="p-3 bg-[#E4664E]/10 rounded-xl text-[#E4664E]">
             <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div>
            <p class="text-slate-500 text-sm">Menunggu Proses</p>
            <h3 class="text-3xl font-bold text-[#E4664E]">12</h3>
        </div>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-4">
        <div class="p-3 bg-green-50 rounded-xl text-green-600">
             <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div>
            <p class="text-slate-500 text-sm">Selesai</p>
            <h3 class="text-3xl font-bold text-green-600">112</h3>
        </div>
    </div>
</div>

<div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100">
    <div class="flex justify-between items-center mb-6">
        <h4 class="text-lg font-bold">Statistik Kategori Kualitas</h4>
        @if(auth()->user()->role == 'masyarakat')
            <button onclick="document.getElementById('modalLapor').showModal()" class="bg-[#3F597A] hover:bg-[#3F597A]/90 text-white px-6 py-2 rounded-xl transition">
                + Buat Laporan
            </button>
        @endif
    </div>

    <div class="h-64 flex items-center justify-center bg-[#D7EFF0]/50 rounded-xl border-2 border-dashed border-[#93B8D0]/50">
        <p class="text-[#2C3341]/60 text-sm">[ Tempat Grafik Chart.js ]</p>
    </div>
</div>

<dialog id="modalLapor" class="rounded-2xl shadow-2xl p-0 w-full max-w-lg backdrop:bg-[#2C3341]/50">
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-[#2C3341]">Form Pengaduan MBG</h3>
            <button onclick="document.getElementById('modalLapor').close()" class="text-slate-400 hover:text-slate-600 text-2xl">&times;</button>
        </div>
        <form action="#" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-[#2C3341] mb-1">Pilih Kategori Kualitas</label>
                <select class="w-full border-slate-200 rounded-lg focus:ring-2 focus:ring-[#93B8D0] focus:border-[#93B8D0]">
                    <option>Kualitas Makanan (Rasa, Kesegaran)</option>
                    <option>Kebersihan Peralatan</option>
                    <option>Keterlambatan Pengiriman</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-[#2C3341] mb-1">Deskripsi Kejadian</label>
                <textarea class="w-full border-slate-200 rounded-lg h-32 focus:ring-2 focus:ring-[#93B8D0] focus:border-[#93B8D0]"></textarea>
            </div>
            <button class="w-full bg-[#E4664E] text-white py-3 rounded-xl font-bold hover:bg-[#E4664E]/90 transition">Kirim Laporan Resmi</button>
        </form>
    </div>
</dialog>
@endsection
