<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    use HasFactory;
    protected $fillable = ['id','nama_kasir','alamat', 'jenis_kelamin', 'kontrak', 'email', 'password'];
    public $timestamps = true;
}