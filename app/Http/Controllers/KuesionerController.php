<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\JawabanMahasiswa;
use App\Models\Mahasiswa;
use App\Models\PengajuanMahasiswa;
use App\Models\Pertanyaan;
use App\Models\Skor;
use View;
use Illuminate\Http\Request;
use App\Post;
use DB;
use Auth;

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
        $user = Auth::user();
        $user_id = $user->id;

        // $pertanyaanid = Pertanyaan::select('id') 
        // ->get();

        // $pertanyaanId = $pertanyaanid->toArray();

        // foreach($pertanyaanId as $idpertanyaan){
        //     $jawabanskor[] = DB::table('jawabans')
        //     ->join('skors', 'jawabans.id', '=', 'skors.jawaban_id')
        //     ->where('jawabans.pertanyaan_id', '=', $idpertanyaan)
        //     ->select('*')
        //     ->groupBy('jawabans.id')
        //     ->get();
        // }

        // $jawabanskors = (object)$jawabanskor;

        // dd($user_id);
        // return View::make('user.kuesioner');
        return View::make('user.kuesioner')->with('pertanyaan', $pertanyaans)->with('user', $user);
        // ->with('jawabanskor', $jawabanskor); //return the view with posts
    }

    // public function store(Request $request){
    //     // $jawaban = new JawabanMahasiswa();
    //     // $pengajuan = new PengajuanMahasiswa();
    //     // $skor = new Skor();
    //     // $mahasiswa = new Mahasiswa();
    //     // $jawabans = new Jawaban();
    //     // // $input = $request->input('pertanyaan{{ $item->id }}');
    //     // $input = $request->all();
    //     // // $input_pertanyaan = implode($input);
    //     // // $input_jawaban = implode(array_keys($input));

    //     // $jawaban->id_mahasiswa = JawabanMahasiswa::with('mahasiswa')->get('id');
    //     // $jawaban->id_pengajuan_mahasiswa = 1;
    //     // // $jawaban->id_pertanyaan = $input_pertanyaan;
    //     // // $jawaban->id_jawaban = $input_jawaban;
    //     // $jawaban->id_skor = Jawaban::with('skor')->get('id');
    //     // // $jawaban->save();

    //     dd($request);
    //     // return redirect()->back();
    //     return View::make('user.kuesioner');
    // }

    public function store(Request $request){
        $userId = $request->input('user_id');
        $idPertanyaan = $request->input('id_pertanyaan');
        $idJawaban = $request->input('id_jawaban');
        $idSkor = $request->input('id_skor');

        foreach ($idPertanyaan as $key => $questionId) {
            $questionIdea = $questionId;
            $answerIdea = $idJawaban[$key];
            $scoreIdea = $idSkor[$key];
            			
            JawabanMahasiswa::create([
                'id' => $userId,
                'id_mahasiswa' => $userId,
                'id_pertanyaan' => $questionIdea,
                'id_jawaban' => $answerIdea,
                'id_skor' => $scoreIdea,
            ]);
        }
    }
        
}