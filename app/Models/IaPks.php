<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IaPks extends Model
{
    use HasFactory;

    protected $timezone = 'Asia/Jakarta';

    protected $table = 'ia_pks';

    protected $fillable = [
        'id_dudi',
        'no_dokumen',
        'judul_dokumen',
        'jenis_dokumen',
        'jenis_kategori',
        'file_pks',
        'tanggal_mulai',
        'tanggal_selesai',
    ];
    protected $casts = [
        'tanggal_mulai' => 'date:d-m-Y',
        'tanggal_selesai' => 'date:d-m-Y',
    ];


    public function dudi()
    {
        return $this->belongsTo(Dudi::class, 'id_dudi');
    }

}
