<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\User;

class FilterController extends Controller
{
    public function index()
    {
        $user = User::all();
        $rekapan = pembayaran::orderBy('id', 'desc')->get();
        return view('layouts.rekapan', compact('rekapan','user'));
    }
    public function filter(request $request)
    {
        $mulai_tanggal =$request->mulai_tanggal;
        $akhir_tanggal = $request->akhir_tanggal;

        $filter = Pembayaran::whereDate('created_at','>=',$mulai_tanggal)->whereTime('created_at','<=',$mulai_tanggal)
                                ->whereDate('created_at','<=',$akhir_tanggal)->whereTime('created_at','<=',$akhir_tanggal)
                                ->get();

        return view('layouts.rekapan',compact('filter'));
    }
}