<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin';

    protected $fillable = [
        'nama',
        'email',
        'no_hp',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function koordinator()
    {
        return $this->hasMany(Koordinator::class, 'id_admin');
    }
    public function dudi()
    {
        return $this->hasMany(Dudi::class, 'id_admin');
    }

}
