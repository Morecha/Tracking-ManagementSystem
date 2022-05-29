<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kendaraan extends Model
{
    use HasFactory;
    protected $table = 'kendaraans';
    protected static $ignoreChangedAttributes = ['update_at'];
    protected $fillable = [
        'id_jalur',
        'no_kendaraan',
        'no_plat',
        'jenis_kendaraan',
        'jumlah_penumpang',
        'jumlah_penumpang_now',
        'api'
    ];
}
