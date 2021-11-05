<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

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
    }

    public function ajax(Request $request)
    {
        if ($request->ajax()) {
            $data = Kategori::with('kategori_status')->get();
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
