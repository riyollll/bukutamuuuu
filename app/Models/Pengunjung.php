<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    protected $fillable = [
        'nama',
        'alamat',
        'keperluan',
        'pihak_yang_dituju',
    ];
}
