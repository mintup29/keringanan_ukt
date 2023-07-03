<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use App\Models\Jawaban;
use App\Models\PertanyaanHistory;
use Illuminate\Http\Request;
use View;
use Redirect;
use DB;

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
        $request->validate(['pertanyaan' => 'required|min:3',]);
        $pertanyaan = $request->input('pertanyaan');

        Pertanyaan::create([
            'pertanyaan' => $pertanyaan,
        ]);

        return redirect()->back()->with('success', 'Pertanyaan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pertanyaan $id)
    {
        $idpertanyaan = $id->id;
        // dd($id->id);
        $pertanyaan = Pertanyaan::with('jawaban', 'skor')->find($id);
        // //return view('admin.setting_jawaban_admin')->with($pertanyaan);
        // // return View::make('admin.setting_jawaban_admin')->with('pertanyaan', $pertanyaan); //return the view with posts

        $jawabanskor = DB::table('jawabans')
            ->join('skors', 'jawabans.id', '=', 'skors.jawaban_id')
            ->where('jawabans.pertanyaan_id', '=', $idpertanyaan)
            ->select('*')
            ->groupBy('jawabans.id')
            ->get();

        // return View::make('admin.setting_jawaban_admin'); //return the view with posts

        return View::make('admin.setting_jawaban_admin')->with('jawabanskor', $jawabanskor)->with('pertanyaan', $pertanyaan); //return the view with posts
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
    public function update(Request $request, Pertanyaan $id)
    {
        $request->validate([
            'pertanyaan' => 'required',
        ]);

        // $pertanyaan = Pertanyaan::with('jawaban', 'skor')->find($id);
        $pertanyaan = Pertanyaan::find($id);

        // dd($pertanyaan);

        $pertanyaan->toQuery()->update([
            'pertanyaan' => $request->pertanyaan,
        ]);

        return redirect('/admin-setting')->with('success', 'Pertanyaan berhasil diupdate!');
        // return View::make('admin.dashboard_admin_setting.blade');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pertanyaan $id)
    {
        Pertanyaan::where('id', $id->id)->delete();
        $id->delete();

        return redirect('/admin-setting')->with('success', 'Pertanyaan telah dihapus!');
        // $pertanyaan = Pertanyaan::find($id);
        // $pertanyaan->delete();
        // return redirect()->route('pertanyaan.destroy')->with('success', 'Pertanyaan berhasil dihapus');
    }
}