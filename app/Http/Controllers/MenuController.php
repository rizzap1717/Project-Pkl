<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class menuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::orderBy('id', 'desc')->get();
        $menu = Menu::with('kategori')->get();
        return view('menu.index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = kategori::all();
        return view('menu.create',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'menu' => 'required|unique:menus,menu'
        ],
    
        [
            'menu.required' => 'Nama harus diisi',
            'menu.unique' => 'Menu dengan nama tersebut sudah ada sebelumnya.',
        ]
    );

        $menu = new menu();
        $menu->menu = $request->menu;
        $menu->id_kategori = $request->id_kategori;
        $menu->harga = $request->harga;
        $menu->gambar = $request->gambar;

        // update img
         if ($request->hasFile('gambar')) {
            $img = $request->file('gambar');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/menu', $name);
            $menu->gambar = $name;
        }

        $menu->save();

        return redirect()->route('menu.index')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return view('menu.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    $menu = Menu::find($id);
    $kategori = Kategori::all(); // Ambil semua data kategori

    return view('menu.edit', compact('menu', 'kategori'));
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
{
    $request->validate([
        'menu' => 'required|unique:menus,menu,' . $menu->id,
        'id_kategori' => 'required',
        'harga' => 'required|numeric',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ],
    [
        'menu.required' => 'Nama harus diisi',
        'menu.unique' => 'Menu dengan nama tersebut sudah ada sebelumnya.',
        'id_kategori.required' => 'Kategori harus diisi',
        'harga.required' => 'Harga harus diisi',
        'harga.numeric' => 'Harga harus berupa angka',
        'gambar.image' => 'File harus berupa gambar',
        'gambar.mimes' => 'Gambar harus berupa file dengan tipe: jpeg, png, jpg, gif, svg',
        'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
    ]);

    $menu->menu = $request->menu;
    $menu->id_kategori = $request->id_kategori;
    $menu->harga = $request->harga;

    if ($request->hasFile('gambar')) {
        // Hapus gambar lama
        if ($menu->gambar && file_exists(public_path('images/menu/' . $menu->gambar))) {
            unlink(public_path('images/menu/' . $menu->gambar));
        }

        // Unggah gambar baru
        $img = $request->file('gambar');
        $name = rand(1000, 9999) . '_' . $img->getClientOriginalName();
        $img->move(public_path('images/menu'), $name);
        $menu->gambar = $name;
    }

    $menu->save();

    return redirect()->route('menu.index')->with('success', 'Data berhasil diubah');
}


    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    // Cari menu berdasarkan ID yang diberikan
    $menu = Menu::findOrFail($id);

    // Hapus gambar jika ada
    if ($menu->gambar && file_exists(public_path('images/menu/' . $menu->gambar))) {
        unlink(public_path('images/menu/' . $menu->gambar));
    }

    // Hapus menu dari database
    $menu->delete();

    return redirect()->route('menu.index')->with('success', 'Data berhasil dihapus');
}
    

}