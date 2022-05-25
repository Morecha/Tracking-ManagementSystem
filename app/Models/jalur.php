<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jalur extends Model
{
    use HasFactory;
    protected $table = 'jalurs';
    protected static $ignoreChangedAttributes = ['update_at'];
    protected $fillable = [
        'id',
        'kota_asal',
        'kota_tujuan',
        'harga',
        'keberangkatan',
        'hari'
    ];
}
