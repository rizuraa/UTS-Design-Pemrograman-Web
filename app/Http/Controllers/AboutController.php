<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

use function PHPUnit\Framework\returnSelf;

class AboutController extends Controller
{
    public function simpan(Request $request){
        $about = new about();
        $about->judul = $request->judul;
        $about->deskripsi = $request->deskripsi;

        $about->save();
        return redirect()->back();
    }

    public function hapus($id){
        $about = about::find($id);
        $about->delete();
        return redirect()->back();
    }    

    public function getId($id){
        $about['about'] = About::find($id);        
    }

    public function update(Request $request, $id){
        $about = new about();
        $about = about::find($id);
        $about->judul = $request->judul;
        $about->judul = $request->judul;
        $about->save();

        return redirect()->back();
    }
}
