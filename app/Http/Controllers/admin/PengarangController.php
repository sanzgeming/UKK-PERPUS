<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pengarang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengarangController extends Controller
{
    // Menampilkan daftar pengarang
    public function index()
    {
        $pengarangs = Pengarang::all(); // Ambil semua data pengarang
        return view('admin.pengarang.index', compact('pengarangs'));
    }

    public function show($id)
    {
        $pengarang = Pengarang::findOrFail($id);
        return view('admin.pengarang.show', compact('pengarang'));
    }

    // Menampilkan form untuk menambah pengarang
    public function create()
    {
        return view('admin.pengarang.create');
    }

    // Menyimpan data pengarang baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_pengarang' => [
                'required',
                'string',
                'max:10',
                'unique:tbl_pengarang',
                'regex:/^PG/',  // Ensure it starts with PG
            ],
            'gelar_depan' => 'nullable|string|max:10',
            'nama_pengarang' => 'required|string|max:50|unique:tbl_pengarang',
            'gelar_belakang' => 'nullable|string|max:10',
            'no_telp' => 'required|string|max:15',
            'email' => 'required|email|max:30|unique:tbl_pengarang',
            'website' => 'nullable|url|max:50',
            'biografi' => 'required|string',
            'keterangan' => 'nullable|string|max:50',
        ], [
            'kode_pengarang.regex' => 'Kode Pengarang harus diawali dengan "PG".', // Custom error message
        ]);

        // Tambahkan PG jika tidak ada
        $kode_pengarang = strtoupper($request->kode_pengarang);
        if (!str_starts_with($kode_pengarang, 'PG')) {
            $kode_pengarang = 'PG' . $kode_pengarang;
        }

        Pengarang::create(array_merge($request->except('kode_pengarang'), [
            'kode_pengarang' => $kode_pengarang,
        ]));

        return redirect()->route('pengarang.index')->with('success', 'Pengarang berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit pengarang
    public function edit($id)
    {
        $pengarang = Pengarang::findOrFail($id);
        return view('admin.pengarang.edit', compact('pengarang'));
    }

    // Menyimpan perubahan pengarang
    public function update(Request $request, $id)
    {
        $pengarang = Pengarang::findOrFail($id);

        $request->validate([
            'kode_pengarang' => [
                'required',
                'string',
                'max:10',
                'regex:/^PG/', // Ensure it starts with PG
                'unique:tbl_pengarang,kode_pengarang,' . $id . ',id_pengarang',
            ],
            'gelar_depan' => 'nullable|string|max:10',
            'nama_pengarang' => 'required|string|max:50|unique:tbl_pengarang,nama_pengarang,' . $id . ',id_pengarang',
            'gelar_belakang' => 'nullable|string|max:10',
            'no_telp' => 'required|string|max:15',
            'email' => 'required|email|max:30|unique:tbl_pengarang,email,' . $id . ',id_pengarang',
            'website' => 'nullable|url|max:50',
            'biografi' => 'required|string',
            'keterangan' => 'nullable|string|max:50',
        ], [
            'kode_pengarang.regex' => 'Kode Pengarang harus diawali dengan "PG".', // Custom error message
        ]);

        // Tambahkan PG jika tidak ada
        $kode_pengarang = strtoupper($request->kode_pengarang);
        if (!str_starts_with($kode_pengarang, 'PG')) {
            $kode_pengarang = 'PG' . $kode_pengarang;
        }

        $pengarang->update(array_merge($request->except('kode_pengarang'), [
            'kode_pengarang' => $kode_pengarang,
        ]));

        return redirect()->route('pengarang.index')->with('success', 'Pengarang berhasil diperbarui.');
    }

    // Menghapus pengarang
    public function destroy($id)
    {
        $pengarang = Pengarang::findOrFail($id);
        $pengarang->delete();

        return redirect()->route('pengarang.index')->with('success', 'Pengarang berhasil dihapus.');
    }
}
