<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\home;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function simpan(Request $request)
    {
        $home = new home();
        $home->nama = $request->nama;
        $home->deskripsi = $request->deskripsi;
        $home->gambar = $request->gambar;
        
        if ($request->hasFile('gambar')) {
            $gambar = new home();

            $file = $request->file('gambar');
            $path = public_path("img/home/");

            // Buat direktori jika belum ada
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }

            // Membuat nama file random
            $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();

            // Pindahkan file ke folder img/prestasi
            $file->move($path, $filename);

            $gambar->gambar = $filename;
            $gambar->save();

            return redirect()->back();
        }

        $home->save();
        return redirect()->back();
    }

    public function hapus($id)
    {
        $home = home::find($id);
        $home->delete();
        return redirect()->back();
    }
}

