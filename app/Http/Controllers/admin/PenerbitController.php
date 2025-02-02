<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PenerbitController extends Controller
{
    public function index()
    {
        $penerbit = Penerbit::all();
        return view('admin.penerbit.index', compact('penerbit'));
    }

    public function show($id)
    {
        $penerbit = Penerbit::findOrFail($id);  // Menampilkan penerbit berdasarkan ID
        return view('admin.penerbit.show', compact('penerbit'));
    }

    public function create()
    {
        return view('admin.penerbit.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_penerbit' => ['nullable', 'regex:/^PN[0-9]+$/', 'unique:tbl_penerbit,kode_penerbit'],
            'nama_penerbit' => 'required|string|max:50|unique:tbl_penerbit,nama_penerbit',
            'alamat_penerbit' => 'required|string|max:150',
            'no_telp' => 'required|string|max:15',
            'email' => 'required|email|max:30|unique:tbl_penerbit,email',
            'fax' => 'nullable|string|max:15',
            'website' => 'nullable|string|max:50',
            'kontak' => 'nullable|string|max:50',
        ]);

        // Generate kode_penerbit otomatis jika kosong
        if (!$request->kode_penerbit) {
            $lastKode = DB::table('tbl_penerbit')->latest('id_penerbit')->first()->kode_penerbit ?? 'PN0';
            $number = (int) str_replace('PN', '', $lastKode) + 1;
            $validated['kode_penerbit'] = 'PN' . $number;
        }

        Penerbit::create($validated);

        return redirect()->route('penerbit.index')->with('success', 'Penerbit berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $penerbit = Penerbit::findOrFail($id);
        return view('admin.penerbit.edit', compact('penerbit'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode_penerbit' => ['required', 'regex:/^PN[0-9]+$/', 'unique:tbl_penerbit,kode_penerbit,' . $id . ',id_penerbit'],
            'nama_penerbit' => 'required|string|max:50|unique:tbl_penerbit,nama_penerbit,' . $id . ',id_penerbit',
            'alamat_penerbit' => 'required|string|max:150',
            'no_telp' => 'required|string|max:15',
            'email' => 'required|email|max:30|unique:tbl_penerbit,email,' . $id . ',id_penerbit',
            'fax' => 'nullable|string|max:15',
            'website' => 'nullable|string|max:50',
            'kontak' => 'nullable|string|max:50',
        ]);

        $penerbit = Penerbit::findOrFail($id);
        $penerbit->update($validated);

        return redirect()->route('penerbit.index')->with('success', 'Penerbit berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->delete();

        return redirect()->route('penerbit.index')->with('success', 'Penerbit berhasil dihapus.');
    }
}