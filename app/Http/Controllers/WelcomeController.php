<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pustaka;
use App\Models\Anggota;
use App\Models\Transaksi;
use App\Models\Perpustakaan;

class WelcomeController extends Controller
{
    public function index()
    {
        // Menghitung total buku, anggota, transaksi, dan perpustakaan
        $totalBuku = Pustaka::count();
        $totalAnggota = Anggota::count();
        $totalTransaksi = Transaksi::count();
        $totalPerpustakaan = Perpustakaan::count();

        // Mengambil transaksi terbaru dengan relasi pustaka dan anggota
        $recentTransactions = Transaksi::with(['pustaka', 'anggota'])
                                        ->orderBy('tgl_pinjam', 'desc')
                                        ->limit(5)  // Ambil 5 transaksi terbaru
                                        ->get();

        // Mengirim data ke view
        return view('welcome', compact('totalBuku', 'totalAnggota', 'totalTransaksi', 'totalPerpustakaan', 'recentTransactions'));
    }
}
