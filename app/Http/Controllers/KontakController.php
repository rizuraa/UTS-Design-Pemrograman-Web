<?php

namespace App\Http\Controllers;

use App\Models\kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function simpan(Request $request)
    {
        $kontak = new kontak();
        $kontak->alamat = $request->alamat;
        $kontak->email = $request->email;
        $kontak->telp = $request->telp;
        $kontak->social = $request->social;
        $kontak->maps = $request->maps;
        
        $kontak->save();
        return redirect()->back();
    }

    public function hapus($id)
    {
        $gambar = kontak::find($id);
        $gambar->delete();
        return redirect()->back();
    }
}
