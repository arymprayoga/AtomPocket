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
            <a href="data-keluar" class="btn btn-primary pull-right">Kelola Dompet Keluar</a>
        </div>
    </div>

    <form action="{{ route('add-master-keluar-process') }}" method="post">
        {{ csrf_field() }}
        <div class="modal-body">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="kode">Kode:</label>
                        <input type="text" class="form-control" name="kode" id="kode" readonly value="{{ $kode }}">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="tanggal">Tanggal:</label>
                        <input type="text" class="form-control" name="tanggal" id="tanggal" readonly
                            value="{{ $tanggal }}">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="kategori_id">Kategori:</label>
                        <select class="select2 form-control" name="kategori_id" id="kategori_id">
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="dompet_id">Dompet:*</label>
                        <select class="select2 form-control" name="dompet_id" id="dompet_id">
                            @foreach ($dompet as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="nilai">Nilai: *</label>
                        <input type="number" class="form-control" name="nilai" id="nilai" min="1" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi:</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" cols="10" rows="3"
                            maxlength="100"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection
