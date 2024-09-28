<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    // Nama tabel yang terkait dengan model ini
    protected $table = 'user';

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
}
