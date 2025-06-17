<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'nama_pelaksana',
        'nim_nip',
        'nama_kegiatan',
        'jenis_kegiatan',
        'narasumber_pemateri',
        'tanggal_pelaksanaan',
        'tempat_kegiatan',
        'link_zoom',
        'biaya_pendaftaran',
        'tenggat_pendaftaran',
        'link_form',
        'kuota',
        'deskripsi',
        'poster',
        'contact',
    ];
}
