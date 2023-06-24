<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\JawabanMahasiswa;
=======
use App\Models\Jawaban;
use App\Models\JawabanMahasiswa;
use App\Models\Mahasiswa;
use App\Models\PengajuanMahasiswa;
>>>>>>> e53249a1fc5b8fb8b76eb1d894b41761ad38c379
use App\Models\Pertanyaan;
use App\Models\Skor;
use App\Models\User;
use App\Models\Cek;
use View;
use Illuminate\Http\Request;
use App\Post;
<<<<<<< HEAD
=======
use DB;
use Auth;
>>>>>>> e53249a1fc5b8fb8b76eb1d894b41761ad38c379

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
        $pertanyaanid = Pertanyaan::select('id') 
        ->get();

        $pertanyaanId = $pertanyaanid->toArray();

        foreach($pertanyaanId as $idpertanyaan){
            $jawabanskor[] = DB::table('jawabans')
            ->join('skors', 'jawabans.id', '=', 'skors.jawaban_id')
            ->where('jawabans.pertanyaan_id', '=', $idpertanyaan)
            ->select('*')
            // ->groupBy('jawabans.id')
            ->get();
        }

        $jawabanskors = (object)$jawabanskor;

        // dd($jawabanskor);
        // return View::make('user.kuesioner');
        return View::make('user.kuesioner')->with('pertanyaan', $pertanyaans)->with('jawabanskors', $jawabanskors)->with('user',$user); //return the view with posts
    }
<<<<<<< HEAD
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
=======
    
    public function store(Request $request, $id){
        
        // $request->validate([
            
        //     'id_jawaban'=>'required',
        //     'id_pertanyaan'=>'required',
        //     'id_skor'=>'required'
        // ]);

        // dd($request);

        // Assuming you have established a database connection and retrieved the request object

        $userId = $request->input('user_id');
        $idPertanyaan = $request->input('id_pertanyaan');
        $idJawaban = $request->input('id_jawaban');
        $idSkor = $request->input('id_skor');

        PengajuanMahasiswa::create([
            'id_mahasiswa' => $userId,
            'status' => 'Need Action',
            'skor_total' => '0',
            'potongan' => '0',
            'semester' => '1',
            'tahun' => '2021',
        ]);

        $idPengajuan = PengajuanMahasiswa::latest('id')->first();
        $idSubmission = $idPengajuan->id;

        $scoreTotal = 0;

        foreach ($idPertanyaan as $key => $questionId) {
            $question = $questionId;
            $answer = $idJawaban[$key];
            $score = $idSkor[$key];

            $scoreTotal += $score;
            			
            JawabanMahasiswa::create([
                'id_pengajuan_mahasiswa' => $idPengajuan->id, 
                'id_mahasiswa' => $userId,
                'id_pertanyaan' => $question,
                'id_jawaban' => $answer,
                'id_skor' => $score,
            ]);
        }

        PengajuanMahasiswa::where('id', $idSubmission)->update(['skor_total' => $scoreTotal]);

        $percentage = '';
        if ($scoreTotal >= 40 && $scoreTotal <= 54) {
            $percentage = '30%';
        } elseif ($scoreTotal >= 31 && $scoreTotal < 40) {
            $percentage = '20%';
        } elseif ($scoreTotal >= 26 && $scoreTotal < 31) {
            $percentage = '10%';
        }

        PengajuanMahasiswa::where('id', $idSubmission)->update(['potongan' => $percentage]);



        // return redirect()->route('user.profil')->with('success','Kuesioner berhasil diisi');


        // $pertanyaan = Pertanyaan::count();

        // for($i=1; $i <= $pertanyaan; $i++) {
        //     $id_jawaban = $request->input('id_jawaban.$i');
        //     $id_pertanyaan = $request->input('id_pertanyaan.$i');
        //     $id_skor = $request->input('id_skor.$i');
        //     $id_mahasiswa = $request->input('user_id');

        //     $jawaban = new JawabanMahasiswa;
        //     $user = User::where('id', $id)->get('name');
        //     $mahasiswa = Mahasiswa::where('nama', $user)->get('id');
        //     // $pengajuan_mahasiswa = PengajuanMahasiswa::where('id_mahasiswa', $mahasiswa)->get();
            
        //     $jawaban->id_mahasiswa = $id_mahasiswa;
        //     $jawaban->id_pengajuan_mahasiswa = 0;
        //     $jawaban->id_pertanyaan = $id_pertanyaan;
        //     $jawaban->id_jawaban = $id_jawaban;
        //     $jawaban->id_skor = $id_skor;
    
        //     $jawaban->save();
        // }

        // dd($request);
        // return redirect()->back();
        // return View::make('user.profil');
    }
}
>>>>>>> e53249a1fc5b8fb8b76eb1d894b41761ad38c379
