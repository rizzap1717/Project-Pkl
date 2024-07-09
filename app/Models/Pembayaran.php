<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $fillable = ['id','id_menu','jumlah', 'subtotal', 'pajak', 'total', 'kembali'];
    public $timestamps = true;
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }
}