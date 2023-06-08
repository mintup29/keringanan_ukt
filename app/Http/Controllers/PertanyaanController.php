<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use View;
use Redirect;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pertanyaans = Pertanyaan::with('jawaban', 'skor')->get();
        
        return View::make('admin.dashboard_admin_setting')->with('pertanyaan', $pertanyaans); //return the view with posts
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
        $request->validate(['pertanyaan'=>'required|min:3',]);

        $pertanyaan = new Pertanyaan;

        //objek->namakolom = request->input('nama_input')
        $pertanyaan->pertanyaan = $request->input('pertanyaan');

        $pertanyaan->save();

        return redirect()->back()->with('success', 'Pertanyaan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pertanyaan $pertanyaan)
    {
        return view('admin.setting_jawaban_admin',[
            'pertanyaan'=>$pertanyaan,
        ]);
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
