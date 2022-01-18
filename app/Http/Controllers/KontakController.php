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
        // if ($request->hasFile('gambar')) {
        //     $gambar = new galery();

        //     $file = $request->file('gambar');
        //     $path = public_path("img/galery/");

        //     // Buat direktori jika belum ada
        //     if (!is_dir($path)) {
        //         mkdir($path, 0777, true);
        //     }

        //     // Membuat nama file random
        //     $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();

        //     // Pindahkan file ke folder img/prestasi
        //     $file->move($path, $filename);

        //     $gambar->gambar = $filename;
        //     $gambar->save();

        //     return redirect()->back();
        // }
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
