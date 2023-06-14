<?php

namespace App\Http\Controllers;

use App\Models\JawabanMahasiswa;
use App\Models\Pertanyaan;
use View;
use Illuminate\Http\Request;
use App\Post;

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
        $pertanyaans = Pertanyaan::with('jawaban','skor')->get();
        return View::make('user.kuesioner')->with('pertanyaan', $pertanyaans); //return the view with posts
    }
    public function store(Request $request){
        $jawaban = new JawabanMahasiswa();
        $input = $request->input('pertanyaan{{ $item->id }}');
        $jawaban->id_pertanyaan = $input;
        $jawaban->id_jawaban = $input;
        $jawaban->id_jawaban = $input;
        $jawaban->id_mahasiswa = $input;
        $jawaban->id_pengajuan_mahasiswa = $input;
        $jawaban->id_skor = $input;
        $jawaban->save();
        return redirect()->back()->with('success', 'Pertanyaan berhasil ditambahkan');
    }
}
