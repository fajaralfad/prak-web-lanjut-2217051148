<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    // Nama tabel yang terkait dengan model ini
    protected $table = 'user'; // Mengacu ke tabel 'user'

    // Lindungi kolom 'id' dari mass-assignment
    protected $guarded = ['id'];

    // Izinkan mass-assignment untuk kolom berikut
    protected $fillable = ['nama', 'npm', 'kelas_id'];

    /**
     * Relasi ke model Kelas
     * Setiap user berada di dalam satu kelas
     */
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    /**
     * Metode untuk mendapatkan seluruh data pengguna dengan join ke tabel kelas
     * Mengembalikan query builder untuk bisa digunakan dengan pagination
     */
    public function getUserQuery()
    {
        return $this->join('kelas', 'kelas.id', '=', 'user.kelas_id')
            ->select('user.*', 'kelas.nama_kelas as nama_kelas'); // Kembalikan query builder
    }
}
