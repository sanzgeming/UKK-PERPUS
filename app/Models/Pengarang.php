<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengarang extends Model
{
    use HasFactory;

    protected $table = 'tbl_pengarang';
    protected $primaryKey = 'id_pengarang';
    public $timestamps = false; // Karena tabel tidak menggunakan timestamps
    protected $fillable = ['kode_pengarang', 'gelar_depan', 'nama_pengarang', 'gelar_belakang', 'no_telp', 'email', 'website', 'biografi', 'keterangan'];

    public function pustakas()
    {
        return $this->hasMany(Pustaka::class, 'id_pengarang');
    }
}
