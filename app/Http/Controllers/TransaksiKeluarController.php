<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Dompet;
use App\Models\Transaksi;
use App\Models\TransaksiStatus;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class TransaksiKeluarController extends Controller
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
        return view('transaksi.keluar');
    }

    public function ajax(Request $request)
    {
        if ($request->ajax()) {
            $data = Transaksi::with('dompet', 'kategori')->where('status_id', '2')->get();
            return Datatables::of($data)->addColumn('kategori', function ($data) {
                return $data->kategori->nama;
            })->addColumn('dompet', function ($data) {
                return $data->dompet->nama;
            })->addColumn('nilai', function ($data) {
                return '(-) '.$data->nilai;
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
        $status = TransaksiStatus::orderBy('nama')->get();
        $kategori = Kategori::orderBy('nama')->get();
        $dompet = Dompet::orderBy('nama')->get();        
        $lastId = Transaksi::select('kode')->where('status_id', '2')->orderBy('id','desc')->first();
        $lastId = (int)substr($lastId->kode , 4);
        $kode = 'WOUT'.str_pad($lastId+1,6,'0',STR_PAD_LEFT);
        $tanggal = date('Y-m-d');
        return view('transaksi.keluar-add', compact('status', 'kategori', 'dompet', 'kode', 'tanggal'));
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
            'nilai' => 'required|numeric|min:1',
            'deskripsi' => 'max:100',
        ]);
        Transaksi::create([
            'kode' => $request->kode,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'nilai' => $request->nilai,
            'kategori_id' => $request->kategori_id,
            'dompet_id' => $request->dompet_id,
            'status_id' => 2
        ]);
        return redirect('transaksi/data-keluar');
        // return $request;
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
