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
use App\Http\Controllers\AuthController;
use View;
use Illuminate\Http\Request;
use App\Post;
use DB;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

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
        }

        $pertanyaanId = $pertanyaanid->toArray();
        foreach ($pertanyaanId as $idpertanyaan) {
            $jawabanskor[] = DB::table('jawabans')
                ->join('pertanyaans', 'pertanyaans.id', '=', 'jawabans.pertanyaan_id')
                ->join('skors', 'jawabans.id', '=', 'skors.jawaban_id')
                ->where('jawabans.pertanyaan_id', '=', $idpertanyaan)
                ->select('*')
        $validation = (new AuthController)->validation(Auth::id());
        if($validation == "False"){
            return redirect()->route('pengajuan');
        }else{
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

        $jawabanskors = (object) $jawabanskor;
        return View::make('user.kuesioner')->with('pertanyaan', $pertanyaans)->with('jawabanskors', $jawabanskors)->with('mahasiswa', $id_user); //return the view with posts
    }

    public function store(Request $request, $id)
    {

        $request->validate([
            'foto' => 'required|file|image',
            'tahun' => 'required|integer',
            'semester' => 'required',
            'user_id' => 'required',
            'id_pertanyaan' => 'required',
            'id_jawaban' => 'required'
        ]);

        $path = Storage::disk('public')->putFile('foto', $request->file('foto'));
        $userId = $request->input('user_id');
        $idPertanyaan = $request->input('id_pertanyaan');
        $idJawaban = $request->input('id_jawaban');
        $idSkor = $request->input('id_jawaban');
        $semester = $request->input('semester');
        $tahun = $request->input('tahun');
        $skor = [];

        foreach ($idJawaban as $key => $value) {
            $skor_parts = explode(',', $value);
            $skor_value = $skor_parts[1];
            $skor[$key] = $skor_value;
        }

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
        Session::flash('success', 'Data berhasil disimpan.');
        return redirect()->route('pengajuan');
    }
}