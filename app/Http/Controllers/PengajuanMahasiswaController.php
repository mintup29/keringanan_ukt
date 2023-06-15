<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use App\Models\PengajuanMahasiswa;
use App\Models\Mahasiswa;
use App\Models\JawabanMahasiswa;
use DataTables;
use Illuminate\Http\Request;

class PengajuanMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // $data = PengajuanMahasiswa::select('*');
            // $data = PengajuanMahasiswa::with('mahasiswa', 'jawaban_mahasiswa')->select('*');
            $data = PengajuanMahasiswa::with('mahasiswa');
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($item) {
                        return view('admin.actions', compact('item'));
                    })
                    ->addColumn('nim', function ($nim) {
                        return $nim->mahasiswa->nim;
                    })
                    ->addColumn('nama', function ($nama) {
                        return $nama->mahasiswa->nama;
                    })
                    // ->orderColumn('semester', 'asc')
                    // ->addColumn('semester', function ($semester) {
                    //     return $semester->semester;
                    // })
                    ->filter(function ($instance) use ($request) {
                        if ($request->get('status') == 'Need Action' || $request->get('status') == 'Accepted' || $request->get('status') == 'Rejected') {
                            $instance->where('status', $request->get('status'));
                        }
                        // if (!empty($request->get('search'))) {
                        //      $instance->where(function($w) use($request){
                        //         $search = $request->get('search');
                        //         $w->orWhere('nama', 'LIKE', "%$search%")
                        //         ->orWhere('nim', 'LIKE', "%$search%");
                        //     });
                        // }
                        if ($request->filled('search')) {
                            $search = $request->input('search');
                            $instance->whereHas('mahasiswa', function ($subquery) use ($search) {
                                $subquery->where('nama', 'LIKE', "%$search%")
                                        ->orWhere('nim', 'LIKE', "%$search%");
                            });
                        }

                    })
                    ->rawColumns(['action', 'nim','nama'])
                    // ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.dashboard_admin');
   
    }

    public function updateAction(Request $request, PengajuanMahasiswa $item)
    {
        $item->update(['status' => $request->input('status')]);

        return response()->json(['message' => 'Action updated successfully.']);
    }
    
    public function show($id)
    {
        // $item = PengajuanMahasiswa::find($id);
        // $item = Mahasiswa::with('jawaban_mahasiswa', 'pengajuan_mahasiswa')->findOrFail($id);
        // $item = PengajuanMahasiswa::with('mahasiswa', 'jawaban_mahasiswa', 'mahasiswa.jawaban_mahasiswa', 'mahasiswa.jawaban_mahasiswa.pertanyaan', 'mahasiswa.jawaban_mahasiswa.jawaban')->findOrFail($id);
        $item = PengajuanMahasiswa::with('mahasiswa', 'jawaban_mahasiswa',  'jawaban_mahasiswa.pertanyaan', 'jawaban_mahasiswa.jawaban')->findOrFail($id);
        // $jawaban = JawabanMahasiswa::with('jawaban.jawaban_mahasiswa')->findOrFail($id);

        return view('admin.detail', compact('item'));
    }

}
