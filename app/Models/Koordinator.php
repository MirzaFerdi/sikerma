<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koordinator extends Model
{

    use HasFactory;

    protected $table = 'koordinator';

    protected $fillable = [
        'id_admin',
        'nama',
        'email',
        'no_hp',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin');
    }
    public function dudi()
    {
        return $this->hasMany(Dudi::class, 'id_koordinator');
    }
}
