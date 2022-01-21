<?php

namespace App\Http\Controllers;

use App\Models\kontak;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

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

    public function getId($id){
        $data = kontak::find($id);
        return $data;
    }

    public function update(Request $request, $id){
        $kontak = new kontak();
        $kontak = kontak::find($id);        
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
