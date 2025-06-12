<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mou extends Model
{
    use HasFactory;

    protected $table = 'mou';

    protected $timezone = 'Asia/Jakarta';

    protected $fillable = [
        'id_dudi',
        'no_mou',
        'judul_dokumen',
        'tanggal_mulai',
        'tanggal_selesai',
        'file_mou',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date:d-m-Y',
        'tanggal_selesai' => 'date:d-m-Y',
        'created_at' => 'datetime:d-m-Y H:i',
        'updated_at' => 'datetime:d-m-Y H:i',
    ];

    public function dudi()
    {
        return $this->belongsTo(Dudi::class, 'id_dudi');
    }

}
