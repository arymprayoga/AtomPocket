<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\KategoriStatus;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class KategoriController extends Controller
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
        return view('kategori.kategori');
        // $data = Kategori::with('kategori_status')->get();
        // return $data[0]->kategori_status->nama;
    }

    public function ajax(Request $request)
    {
        if ($request->ajax()) {
            $data = Kategori::with('kategori_status')->get();
            return Datatables::of($data)->addColumn('status', function ($data) {
                return $data->kategori_status->nama;
            })->addColumn('action', function ($data) {
                if ($data->kategori_status->id == 1) {
                    $simbol = 'times';
                    $tooltip = 'Tidak Aktif';
                } else if ($data->kategori_status->id == 2) {
                    $simbol = 'check';
                    $tooltip = 'Aktif';
                }
                return '<a href="data-kategori-detail/' . $data->id . '" class="btn btn-xs btn-primary mr-2" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fas fa-search"></i></a>
                <a href="data-kategori-edit/' . $data->id . '" class="btn btn-xs btn-primary mr-2" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fas fa-edit"></i></a>
                <a href="ubah-status-kategori/'.$data->id.'" class="btn btn-xs btn-primary mr-2" data-toggle="tooltip" data-placement="top" title="' . $tooltip . '"><i class="fas fa-' . $simbol . '"></i></a>';
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
        $status = KategoriStatus::orderBy('nama')->get();
        return view('kategori.kategori-add', compact('status'));
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
        Kategori::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'status_id' => $request->status_id
        ]);
        return redirect('master/data-kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.kategori-detail', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        $status = KategoriStatus::orderBy('nama')->get();
        return view('kategori.kategori-edit', compact('kategori', 'status'));
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
        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->all());
        return redirect('master/data-kategori');
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
        $kategori = Kategori::findOrFail($id);
        if($kategori->status_id == 1){
            $kategori->status_id = 2;
            $kategori->save();
        } else if ($kategori->status_id == 2){
            $kategori->status_id = 1;
            $kategori->save();
        }

        return back();
    }
}
