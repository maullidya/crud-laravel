<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masyarakat extends Model
{
    use HasFactory;
    protected $fillable = ['nik','nama','username','password','email','no_telp'];
    protected $table = 'masyarakat';
    public $timestamps =false;
}
