@extends('layouts.app-new')

@section('content')
    <div class="card mt-2">
        <div class="card-header">
            <h2 class="card-title">Kategori</h2>
            <a href="data-kategori-add"><button type="button" class="btn btn-info btn-sm" style="float: right;">Buat
                    Baru</button></a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="kategori-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Perusahaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>


@endsection
