<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\JawabanMahasiswa;
use App\Models\Mahasiswa;
use App\Models\PengajuanMahasiswa;
use App\Models\Pertanyaan;
use App\Models\Foto;
use App\Models\Skor;
use App\Models\User;
use View;
use Illuminate\Http\Request;
use App\Post;
use DB;
use Auth;
use Illuminate\Support\Facades\Storage;

class KuesionerController extends Controller
{

    public function index()
    {
        $pertanyaans = Pertanyaan::with('jawaban', 'skor')->get();
        $user = Auth::user();
        $user_id = $user->id;
        $pertanyaanid = Pertanyaan::select('id')
            ->get();
        $mahasiswa = User::find($user_id)->Mahasiswa->first();

        if ($mahasiswa) {
            $id_user = $mahasiswa->id;
            // Make use of the $id_user variable as needed
        }

        // dd($pertanyaan);

        $pertanyaanId = $pertanyaanid->toArray();
        // dd($pertanyaanId);

        foreach ($pertanyaanId as $idpertanyaan) {
            $jawabanskor[] = DB::table('jawabans')
                ->join('pertanyaans', 'pertanyaans.id', '=', 'jawabans.pertanyaan_id')
                ->join('skors', 'jawabans.id', '=', 'skors.jawaban_id')
                ->where('jawabans.pertanyaan_id', '=', $idpertanyaan)
                ->select('*')
                // ->groupBy('jawabans.id')
                ->get();
        }

        $jawabanskors = (object) $jawabanskor;


        // foreach ($jawabanskor as $collection) {
        //     foreach ($collection as $item) {
        //         $skor = $item->skor;
        //         dd($skor);
        //         // Make use of the $skor variable as needed
        //     }
        // }

        // dd($jawabanskors);
        // dd($skor);
        // dd($pertanyaans);
        // return View::make('user.kuesioner');
        return View::make('user.kuesioner')->with('pertanyaan', $pertanyaans)->with('jawabanskors', $jawabanskors)->with('mahasiswa', $id_user); //return the view with posts
    }

    public function store(Request $request, $id)
    {

        $request->validate([
            'foto' => 'required|file|image',
            'tahun' => 'required|integer',
        ]);

        $path = Storage::disk('public')->putFile('foto', $request->file('foto'));

        // $pertanyaan = Pertanyaan::count();

        // for($i=1; $i <= $pertanyaan; $i++) {
        //     $id_jawaban = $request->input('id_jawaban.$i');
        //     $id_pertanyaan = $request->input('id_pertanyaan.$i');
        //     $id_skor = $request->input('id_skor.$i');
        //     $id_mahasiswa = $request->input('user_id');

        //     $jawaban = new JawabanMahasiswa;
        //     // $user = User::where('id', $id)->get('name');
        //     // $mahasiswa = Mahasiswa::where('nama', $user)->get('id');
        //     // $pengajuan_mahasiswa = PengajuanMahasiswa::where('id_mahasiswa', $mahasiswa)->get();

        //     $jawaban->id_mahasiswa = $id_mahasiswa;
        //     $jawaban->id_pengajuan_mahasiswa = 0;
        //     $jawaban->id_pertanyaan = $id_pertanyaan;
        //     $jawaban->id_jawaban = $id_jawaban;
        //     $jawaban->id_skor = $id_skor;
        //     $jawaban->save();
        // }
        // dd($request);
        // dd($request);
        // dd($request);

        //Assuming you have established a database connection and retrieved the request object

        $userId = $request->input('user_id');
        $idPertanyaan = $request->input('id_pertanyaan');
        $idJawaban = $request->input('id_jawaban');
        $idSkor = $request->input('id_jawaban');
        $semester = $request->input('semester');
        $tahun = $request->input('tahun');

        // Initialize an empty array to store the updated skor values
        $skor = [];

        // Iterate over the id_jawaban array and update the skor values
        foreach ($idJawaban as $key => $value) {
            // Split the value to extract the skor after the comma
            $skor_parts = explode(',', $value);
            $skor_value = $skor_parts[1];

            // Store the updated skor value in the array
            $skor[$key] = $skor_value;
        }
        // dd($skor);

        // $selectedSkor = [];
        // foreach ($idJawaban as $jawabanId => $selectedJawaban) {
        //     $selectedSkor = $idSkor[$jawabanId];

        //     // Perform database saving logic here using $jawabanId, $selectedJawaban, and $selectedSkor
        // }

        // dd($selectedSkor);

        PengajuanMahasiswa::create([
            'id_mahasiswa' => $userId,
            'status' => 'Need Action',
            'skor_total' => '0',
            'potongan' => '0',
            'semester' => $semester,
            'tahun' => $tahun,
        ]);

        $idPengajuan = PengajuanMahasiswa::latest('id')->first();
        $idSubmission = $idPengajuan->id;

        $scoreTotal = 0;

        foreach ($idPertanyaan as $key => $questionId) {
            $question = $questionId;
            $answer = $idJawaban[$key];
            $score = $skor[$key];

            $scoreTotal += $score;

            JawabanMahasiswa::create([
                'id_pengajuan_mahasiswa' => $idPengajuan->id,
                'id_mahasiswa' => $userId,
                'id_pertanyaan' => $question,
                'id_jawaban' => $answer,
                'id_skor' => $score,
            ]);
        }

        $foto = Foto::create([
            'id_pengajuan' => $idSubmission,
            'foto' => $path
        ]);
        // foreach ($idJawaban as $jawabanId => $selectedJawaban) {
        //     $selectedSkor = $idSkor[$jawabanId];
        //     JawabanMahasiswa::where('id_jawaban', $jawabanId)->update(['id_skor' => $selectedSkor]);

        //     // Perform database saving logic here using $jawabanId, $selectedJawaban, and $selectedSkor
        // }

        PengajuanMahasiswa::where('id', $idSubmission)->update(['skor_total' => $scoreTotal]);

        $percentage = '';
        if ($scoreTotal >= 40 && $scoreTotal <= 54) {
            $percentage = '30%';
        } elseif ($scoreTotal >= 31 && $scoreTotal < 40) {
            $percentage = '20%';
        } elseif ($scoreTotal >= 26 && $scoreTotal < 31) {
            $percentage = '10%';
        } else {
            $percentage = '0%';
        }

        PengajuanMahasiswa::where('id', $idSubmission)->update(['potongan' => $percentage]);
        // return view('user.kuesioner');



        // return redirect()->route('user.profil')->with('success','Kuesioner berhasil diisi');
        return redirect()->route('pengajuan')->with('success', 'Kuesioner berhasil diisi');
        // $email = Auth::user()->email;
        // $pengajuan = DB::select('select p.* from pengajuan_mahasiswa as p left join mahasiswa as m on m.id = p.id_mahasiswa where m.email ="'.$email.'"');
        // $profile = DB::table('mahasiswa')->where('email', $email)->get();
        // return view('user.profil', array('pengajuan' => $pengajuan, 'profile' => $profile)); 
    }
}