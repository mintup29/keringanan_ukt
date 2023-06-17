<?php

namespace App\Http\Controllers;
use Input;
use App\Models\Jawaban;
use App\Models\Skor;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

class SettingJawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'pertanyaan_id'=>'required',
            'jawaban'=>'required',
            'skor'=>'required',
            ]);
        
        $id = $request->pertanyaan_id;
        $jawaban = $request->jawaban;
        $skor = $request->skor;

        $isiJawaban = Jawaban::create([
            'pertanyaan_id' => $id,
            'jawaban' => $jawaban,
        ]);

        $idjawaban = Jawaban::latest('id')->first();
        $idjawabanlatest = $idjawaban -> id;

        $isiSkor = Skor::create([
            'pertanyaan_id' => $id,
            'jawaban_id' => $idjawabanlatest,
            'skor' => $skor,
        ]);

        // dd($request);

        // dd($idjawaban);
        // return View::make('admin.setting_jawaban_admin'); //return the view with posts
        return redirect()->back()->with('success', 'Jawaban dan Skor berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pertanyaan $pertanyaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pertanyaan $pertanyaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pertanyaan $pertanyaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jawaban $id)
    {
        // $jawaban = Jawaban::find($id);
        Jawaban::where('id', $id->id)->first()->delete();
        // $jawaban->delete();

        return redirect()->back()->with('success', 'Jawaban dan Skor telah dihapus!');
    }
}