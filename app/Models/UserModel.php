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

    // Izinkan mass-assignment untuk kolom berikut, termasuk 'foto'
    protected $fillable = ['nama', 'npm', 'kelas_id', 'foto']; // Menambahkan 'foto' ke dalam fillable

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
    public function getUser($id = null)
    {
        $query = $this->select('user.id', 'user.nama', 'user.npm', 'user.foto')
            ->join('kelas', 'kelas.id', '=', 'user.kelas_id')
            ->addSelect('kelas.nama_kelas');
            
        if ($id !== null) {
            $query->where('user.id', $id);
        }
        
        return $query;
    }

}