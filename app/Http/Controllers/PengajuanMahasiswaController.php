<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use App\Models\PengajuanMahasiswa;
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
            $data = PengajuanMahasiswa::join('mahasiswa', 'pengajuan_mahasiswa.id_mahasiswa', '=', 'mahasiswa.id')
                // ->join('jawaban_mahasiswa', 'jawaban_mahasiswa.id_mahasiswa', '=', 'pengajuan_mahasiswa.id_mahasiswa')
                ->select('*');
            // $data = PengajuanMahasiswa::select('*');
            // $data = PengajuanMahasiswa::with('mahasiswa')->get();
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
                    ->filter(function ($instance) use ($request) {
                        if ($request->get('status') == 'Need Action' || $request->get('status') == 'Accepted' || $request->get('status') == 'Rejected') {
                            $instance->where('status', $request->get('status'));
                        }
                        if (!empty($request->get('search'))) {
                             $instance->where(function($w) use($request){
                                $search = $request->get('search');
                                $w->orWhere('nama', 'LIKE', "%$search%")
                                ->orWhere('nim', 'LIKE', "%$search%");
                            });
                        }
                    })
                    // ->rawColumns(['action', 'nim','nama'])
                    ->rawColumns(['action'])
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
        $item = PengajuanMahasiswa::findOrFail($id);

        return view('admin.detail', compact('item'));
    }

}
