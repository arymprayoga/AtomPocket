@extends('layouts.app-new')

@section('content')
    <div class="row">
        <div class="col-12 text-right">
            <a href="{{ route('data-dompet') }}" class="btn btn-primary pull-right">Kelola Dompet</a>
        </div>
    </div>

    <div class="modal-body">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="nama">Nama : *</label>
                    <input type="text" class="form-control" readonly name="nama" id="nama" value={{ $dompet->nama }}>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="referensi">Referensi</label>
                    <input type="referensi" class="form-control" readonly name="referensi" id="referensi"
                        value={{ $dompet->referensi }}>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" readonly name="deskripsi" id="deskripsi" cols="10"
                        rows="3">{{ $dompet->deskripsi }}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="status_id">Status</label>
                    <input type="status_id" readonly class="form-control" name="status_id" id="status_id"
                        value={{ $dompet->dompet_status->nama }}>
                </div>
            </div>
        </div>
    </div>
@endsection
