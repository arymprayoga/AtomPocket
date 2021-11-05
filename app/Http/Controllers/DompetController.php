<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Dompet;
use App\Models\DompetStatus;

class DompetController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dompet.dompet');
    }

    public function ajax(Request $request)
    {
        if ($request->ajax()) {
            $data = Dompet::with('dompet_status')->get();
            return Datatables::of($data)->addColumn('status', function ($data) {
                return $data->dompet_status->nama;
            })->addColumn('action', function ($data) {
                if ($data->dompet_status->id == 1) {
                    $simbol = 'times';
                    $tooltip = 'Tidak Aktif';
                } else if ($data->dompet_status->id == 2) {
                    $simbol = 'check';
                    $tooltip = 'Aktif';
                }
                return '<a href="data-dompet-detail/' . $data->id . '" class="btn btn-xs btn-primary mr-2" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fas fa-search"></i></a>
                <a href="data-dompet-edit/' . $data->id . '" class="btn btn-xs btn-primary mr-2" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a>
                <a href="ubah-status-dompet/'.$data->id.'" class="btn btn-xs btn-primary mr-2" data-toggle="tooltip" data-placement="top" title="' . $tooltip . '"><i class="fas fa-' . $simbol . '"></i></a>';
            })->make(true);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = DompetStatus::orderBy('nama')->get();
        return view('dompet.dompet-add', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|min:5',
            'deskripsi' => 'max:100',
        ]);
        Dompet::create([
            'nama' => $request->nama,
            'referensi' => $request->referensi,
            'deskripsi' => $request->deskripsi,
            'status_id' => $request->status_id
        ]);
        return redirect('master/data-dompet');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dompet = Dompet::findOrFail($id);
        return view('dompet.dompet-detail', compact('dompet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dompet = Dompet::findOrFail($id);
        $status = DompetStatus::orderBy('nama')->get();
        return view('dompet.dompet-edit', compact('dompet', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|min:5',
            'deskripsi' => 'max:100',
        ]);
        $dompet = Dompet::findOrFail($id);
        $dompet->update($request->all());
        return redirect('master/data-dompet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ubah($id)
    {
        $dompet = Dompet::findOrFail($id);
        if($dompet->status_id == 1){
            $dompet->status_id = 2;
            $dompet->save();
        } else if ($dompet->status_id == 2){
            $dompet->status_id = 1;
            $dompet->save();
        }

        return back();
    }
}
