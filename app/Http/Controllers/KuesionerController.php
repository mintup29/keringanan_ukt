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
        $pertanyaans = Pertanyaan::with('jawaban')->get();
        return View::make('user.kuesioner')->with('pertanyaan', $pertanyaans); //return the view with posts
    }
}
