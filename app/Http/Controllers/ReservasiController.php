<?php

namespace App\Http\Controllers;

use App\Models\Pustaka;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReservasiController extends Controller
{
    public function create(Request $request, $id)
    {
        $buku = Pustaka::where('id_pustaka', $id)->first();
        // dd(1);
        return view('user.buku.formReservasi', compact('buku'));
    }

    public function reservasi(Request $request, $id)
    {
        $pustaka = Pustaka::where('id_pustaka', $id)->first();
        $id_anggota = Auth::id(); // Mengambil ID anggota yang sedang login

        // Cek apakah anggota sudah memiliki transaksi dengan status fp = 0 (belum dikembalikan)
        $transaksiAktif = Transaksi::where('id_anggota', $id_anggota)
            ->where('fp', '0') // status fp = 0 berarti belum dikembalikan
            ->exists();

        if ($transaksiAktif) {
            // Jika ada transaksi yang belum dikembalikan
            return redirect()->back()->with('error', 'Anda masih memiliki buku yang belum dikembalikan.');
        }

        // Buat transaksi baru jika tidak ada transaksi yang aktif
        Transaksi::create([
            'id_pustaka' => $request->id,
            'id_anggota' => $id_anggota,
            'tgl_pinjam' => now(),
            'tgl_kembali' => now()->addDays(7), // Atur tanggal kembali 7 hari dari sekarang
            'fp' => '0', // Flag pinjam
            'keterangan' => 'Reservasi buku',
        ]);

        return redirect()->back()->with('success', 'Reservasi buku berhasil dilakukan.');
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_anggota' => 'required',
            'id_pustaka' => 'required',
            // 'tgl_pinjam' => 'required|date',
            // 'tgl_kembali' => 'required|date|after_or_equagl:tgl_pinjam|before_or_equal:' . now()->addDays(7)->toDateString(),
            'keterangan' => 'required|max:50',
        ], [
            'tgl_kembali.after_or_equal' => 'Tanggal kembali tidak boleh lebih kecil dari tanggal pinjam.',
            'tgl_kembali.before_or_equal' => 'Tanggal kembali tidak boleh lebih dari 7 hari setelah tanggal pinjam.',
        ]);

        // Menyimpan data transaksi
        $transaksi = new Transaksi();
        $transaksi->id_pustaka = $request->input('id_pustaka');
        $transaksi->id_anggota = $request->input('id_anggota');
        $transaksi->tgl_pinjam = $request->input('tgl_pinjam');
        $transaksi->tgl_kembali = $request->input('tgl_kembali');
        $transaksi->keterangan = $request->input('keterangan');
        // $transaksi->status = 'pending';
        $transaksi->save();

        return redirect()->route('user.buku.index');
    }

    public function transaksi()
    {
        $id_anggota = Auth::id(); // Mengambil ID anggota yang sedang login

        $transaksi = Transaksi::where('id_anggota', $id_anggota)->get();
        return view('user.buku.transaksi', compact('transaksi'));
    }
}