<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function simpan(Request $request)
    {
        $produk = new produk();
        $produk->judul = $request->judul;
        $produk->deskripsi = $request->deskripsi;
        $produk->gambar = $request->gambar;

        if ($request->hasFile('gambar')) {

            $file = $request->file('gambar');
            $path = public_path("img/product/");

            // Buat direktori jika belum ada
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }

            // Membuat nama file random
            $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();

            // Pindahkan file ke folder img/prestasi
            $file->move($path, $filename);

            $produk->gambar = $filename;
        }

        $produk->save();
        return redirect()->back();
    }

    public function getId($id)
    {
        $data = produk::find($id);
        return $data;
    }

    public function update(Request $request, $id)
    {
        $produk = new produk();
        $produk = produk::find($id);
        $produk->judul = $request->judul;
        $produk->deskripsi = $request->deskripsi;
        $produk->gambar = $request->gambar;

        if ($request->hasFile('gambar')) {

            $file = $request->file('gambar');
            $path = public_path("img/product/");

            // Buat direktori jika belum ada
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }

            // Membuat nama file random
            $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();

            // Pindahkan file ke folder img/prestasi
            $file->move($path, $filename);

            $produk->gambar = $filename;
        }

        $produk->save();
        return redirect()->back();
    }

    public function hapus($id)
    {
        $produk = produk::find($id);
        $produk->delete();
        return redirect()->back();
    }
}
