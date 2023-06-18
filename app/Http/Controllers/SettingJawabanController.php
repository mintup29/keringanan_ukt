<?php

namespace App\Http\Controllers;
use Input;
use App\Models\Jawaban;
use App\Models\Skor;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use DB;

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
    public function update(Request $request, Jawaban $id, Skor $idskor)
    {
        $request->validate([
            'jawaban' => 'required',
            'skor' => 'required',
        ]);

        $jawaban = Jawaban::find($id);
        $skor = Skor::find($id);

        $jawaban->toQuery()->update([
            'jawaban'=>$request->jawaban,
        ]);

        $skor->toQuery()->update([
            'skor'=>$request->skor,
        ]);

        // dd($skor);

        return redirect()->back()->with('success', 'Jawaban dan Skor berhasil diupdate!');
        // return View::make('admin.dashboard_admin_setting.blade');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jawaban $id)
    {
        Jawaban::where('id', $id->id)->first()->delete();

        return redirect()->back()->with('success', 'Jawaban dan Skor telah dihapus!');
    }
}
