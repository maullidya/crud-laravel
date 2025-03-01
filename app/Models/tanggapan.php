<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tanggapan extends Model
{
    use HasFactory;
    protected $fillable = ['id_pengaduan','id_tanggapan','tgl_tanggapan','tanggapan','id_petugas'];
    protected $table = 'tanggapan';
    public $timestamps =false;
}
