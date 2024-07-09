<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Kategori;


use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function menampilkan(){
        $kategori = Kategori::all();
        $menu = Menu::all();
        return view('layouts.frontend', compact('menu','kategori'));
    }
    public function showModal($id)
{
    // Contoh pengambilan data dari model
    $kategori = Kategori::find($id);
    $menu = Menu::find($id); // Mengambil data produk berdasarkan ID

    return view('modal', ['data' => $kategori,$menu]);
}


}
