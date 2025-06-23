<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Venue;

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
        'status',
        'catatan_admin',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class, 'tempat_kegiatan', 'nama_tempat');
    }
}
