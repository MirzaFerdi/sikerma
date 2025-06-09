<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dudi extends Model
{
    use HasFactory;

    protected $table = 'dudi';

    protected $fillable = [
        'id_admin',
        'id_koordinator',
        'nama_dudi',
        'alamat',
        'email',
        'no_telp',
        'status',
        'nama_contact_person',
        'jabatan_contact_person',
        'no_telp_contact_person',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin');
    }
    public function koordinator()
    {
        return $this->belongsTo(Koordinator::class, 'id_koordinator');
    }
}
