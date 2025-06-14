<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    protected $table = 'venues';

    protected $fillable = [
        'nama_tempat',
        'alamat',
        'fasilitas',
        'ketentuan',
        'gambar_venue'
    ];
}
