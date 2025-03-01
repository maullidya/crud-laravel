<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengaduan extends Model
{
    use HasFactory;
    protected $fillable = ['tgl_pengaduan','nik','isi_laporan','foto','status'];
    protected $table = 'pengaduan';
    public $timestamps =false;
}
