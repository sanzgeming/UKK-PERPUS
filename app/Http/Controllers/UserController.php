<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Pustaka;

class UserController extends Controller
{
    public function indexBuku()
    {
        // Ambil semua data pustaka yang tidak memiliki transaksi dengan fp = 0 (buku belum dikembalikan)
        $buku = Pustaka::whereDoesntHave('transaksi', function ($query) {
            $query->where('fp', '0');  // Cek transaksi dengan fp = 0
        })->with(['ddc', 'format', 'penerbit', 'pengarang'])->get();

        // Kirim data ke view
        return view('user.buku.index', compact('buku'));
    }
}