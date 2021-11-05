@extends('layouts.app-new')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-12 text-right">
            <a href="{{ route('data-dompet') }}" class="btn btn-primary pull-right">Kelola Dompet</a>
        </div>
    </div>

    <form action="{{ route('edit-master-dompet-process', $dompet->id) }}" method="post">
        {{ csrf_field() }}
        <div class="modal-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="nama">Nama : *</label>
                        <input type="text" class="form-control" required name="nama" id="nama" minlength="5"
                            value="{{ $dompet->nama }}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="referensi">Referensi</label>
                        <input type="referensi" class="form-control" name="referensi" id="referensi"
                            value="{{ $dompet->referensi }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" cols="10" rows="3"
                            maxlength="100">{{ $dompet->deskripsi }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="status_id">Status</label>
                        <select class="select2 form-control" name="status_id" id="status_id">
                            @foreach ($status as $item)
                                <option value="{{ $item->id }}" @if ($item->id == $dompet->dompet_status->id) selected @endif>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection
