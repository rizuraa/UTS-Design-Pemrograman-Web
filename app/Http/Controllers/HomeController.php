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
            // $gambar = new home();

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

            $home->gambar = $filename;
        }

        $home->save();
        return redirect()->back();
    }

    public function getId($id){
        $data = home::find($id);
        return $data;        
    }
    
    public function update(Request $request, $id){
        $home = new home();
        $home = home::find($id);
        $home->nama = $request->nama;
        $home->deskripsi = $request->deskripsi;
        $home->gambar = $request->gambar;
        
        if ($request->hasFile('gambar')) {
            // $gambar = new home();

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

            $home->gambar = $filename;
        }

        return redirect()->back();
    }

    public function hapus($id)
    {
        $home = home::find($id);
        $home->delete();
        return redirect()->back();
    }
}

