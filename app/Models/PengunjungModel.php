<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengunjungModel extends Model
{
    use HasFactory;
    protected $table = 'pengunjungs';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    protected $fillable = [
        'nik',
        'nama',
        'jk',
        'hp',
        'alamat',
        'tgl_datang',
        'jam_datang',
        'jam_keluar',
    ];
}
