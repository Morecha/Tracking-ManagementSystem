<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hari extends Model
{
    use HasFactory;
    protected $table = 'haris';
    protected static $ignoreChangedAttributes = ['update_at'];
    protected $fillable = [
        'nama_hari'
    ];
}
