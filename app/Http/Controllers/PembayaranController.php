<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class PembayaranController extends Controller
{
    /**
     * Menampilkan daftar resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $totalBayar = Pembayaran::sum('total');
        $user = User::all();
    
        // Mendapatkan tanggal mulai dan selesai dari request
        $tgl_mulai = $request->input('tgl_mulai');
        $tgl_selesai = $request->input('tgl_selesai');
    
        // Query untuk mengambil data pembayaran
        $pembayaran = Pembayaran::orderBy('id', 'desc');
    
        // Tambahkan kondisi jika tanggal mulai dan selesai ada
        if ($tgl_mulai && $tgl_selesai) {
            $pembayaran->whereBetween('created_at', [$tgl_mulai, $tgl_selesai]);
        }
    
        // Ambil data yang sudah difilter
        $pembayaran = $pembayaran->get();
    
        return view('pembayaran.index', compact('pembayaran', 'user', 'totalBayar'));
    }

    /**
     * Menampilkan form untuk membuat resource baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    $menu = Menu::all(); // Mengambil semua data menu dari database
    return view('pembayaran.create', compact('menu'));
}


    /**
     * Menyimpan resource baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $pembayaran = new pembayaran();
        $pembayaran->menu = $request->menu;
        $pembayaran->id_user = $request->id_user;
        $pembayaran->subtotal = $request->subtotal;
        $pembayaran->pajak = $request->pajak;
        $pembayaran->total = $request->total;
        $pembayaran->bayar = $request->bayar;
        $pembayaran->kembali = $request->kembali;
        $pembayaran->save();
        return redirect()->route('cetak-struk')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Menampilkan resource yang ditentukan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        // return view('admin.pembayaran.show', compact('pembayaran'));
    }

    /**
     * Menampilkan form untuk mengedit resource yang ditentukan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        return view('admin.pembayaran.edit', compact('pembayaran'));
    }

    /**
     * Memperbarui resource yang ditentukan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        
        $pembayaran->menu = $request->menu;
        $pembayaran->jumlah = $request->jumlah;
        $pembayaran->subtotal = $request->subtotal;
        $pembayaran->pajak = $request->pajak;
        $pembayaran->total = $request->total;
        $pembayaran->bayar = $request->bayar;
        $pembayaran->kembali = $request->kembali;
        $pembayaran->save();
        return redirect()->route('pembayaran.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Menghapus resource yang ditentukan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')->with('success', 'Data berhasil dihapus');
    }
}
