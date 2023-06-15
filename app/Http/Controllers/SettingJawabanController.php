<?php

namespace App\Http\Controllers;

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
    public function store(Request $request, Pertanyaan $id)
    {
        
            
        // $request->validate([
        //     'pertanyaan_id'=>'required',
        //     'jawaban'=>'required|min:3',
        //     'skor'=>'required',]);

        // // $pertanyaan = Pertanyaan::find($id);
        // $jawaban = new Jawaban;
        // $skor = new Skor;

        // $jawaban->pertanyaan()->associate($pertanyaan);
        // $skor->pertanyaan()->associate($pertanyaan);

        // //objek->namakolom = request->input('nama_input')
        // // $jawaban->pertanyaan_id = $id;
        // // $jawaban->jawaban = $request->input('jawaban');
        // // $skor->skor = $request->input('skor');

        // // $pertanyaan->save();
        // $jawaban->save();
        // // $skor->save();
        // // dd($request);

        // return View::make('admin.setting_jawaban_admin'); //return the view with posts
        return redirect()->back()->with('success', 'Pertanyaan berhasil ditambahkan');
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
    public function destroy(Pertanyaan $pertanyaan)
    {
        //
    }
}
