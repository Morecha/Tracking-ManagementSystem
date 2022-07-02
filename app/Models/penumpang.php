<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penumpang extends Model
{
    use HasFactory;
    protected $table = 'penumpangs';
    protected static $ignoreChangedAttributes = ['update_at'];
    protected $fillable = [
        'id_jalur',
        'kode_penumpang',
        'atas_nama',
        'keberangkatan'
    ];
}
