<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use View;
use Illuminate\Http\Request;

class KuesionerController extends Controller
{
    // public function index(){
    //     $pertanyaan
    //     $pertanyaan = $this->getPertanyaan();
    //     $jawaban = $this->getJawaban();
    //     return view('user.kuesioner',compact('pertanyaan','jawaban'));
    // }
    // private function getPertanyaan(){
    //     return Pertanyaan::all();
    // }
    // private function getJawaban(){
    //     return Jawaban::all();
    // }
    public function index(){
        $pertanyaan = Pertanyaan::with('jawaban','skor')->get();
        return View::make('user.kuesioner')->with('pertanyaan', $pertanyaan); //return the view with posts
    }

    public function store(Request $request)
    {
        $request->validate(['id_jawaban'=>'required']);

        $pertanyaan = new JawabanMahasiswa;

        //objek->namakolom = request->input('nama_input')
        $pertanyaan->pertanyaan = $request->input('pertanyaan');

        $pertanyaan->save();

        return redirect()->back()->with('success', 'Pertanyaan berhasil ditambahkan');
    }
}
