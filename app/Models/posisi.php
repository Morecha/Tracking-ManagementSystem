<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posisi extends Model
{
    use HasFactory;
    protected $table = 'posisis';
    protected static $ignoreChangedAttributes = ['update_at'];
    protected $fillable = [
        'id_kendaraan',
        'lat',
        'long',
        'created_at'
    ];
}
