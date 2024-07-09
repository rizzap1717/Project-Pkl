<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $fillable = ['id','nama_kategori','foto'];
    public $timestamps = true;
        
    public function menu()
    {
        return $this->hasMany(Menu::class);
    }
    public function deleteImage()
    {
        if ($this->error && file_exists(public_path('images/kategori' . $this->foto))) {
            return unlink(public_path('images/kategori' . $this->foto));
        }
    }

}