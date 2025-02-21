@extends('layouts.app')

@section('content')
<!-- Simple Datatable start -->
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">Berita Duka Cita</h4>
        <a href="{{ url('berita/dukacita/tambah_berita') }}" class="btn btn-primary pull-right" style="float: right; margin-top: -5px; margin-bottom:8px;"> Buat Baru</a>
    </div>
    <form class="row" method="GET" action="{{ url('berita/dukacita/list_berita') }}">
        <div class="col-md-1" style="margin-bottom: 10px;">
            <label for="inputNanme4" class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control">
        </div>
        <div class="col-md-2" style="margin-bottom: 10px;">
            <label for="inputNanme4" class="form-label">Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control">
        </div>
        <div class="col-md-2" style="margin-bottom: 10px;">
            <label for="inputNanme4" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control">
        </div>
        <div class="col-md-1" style="display:flex; justify-content:space-between; gap:2px; width:4%; height:4%; margin-top:2.7%;">
            <button type="submit" class="btn btn-primary">Search</button>
            <a href="{{ url('berita/dukacita/list_berita') }}" class="btn btn-secondary">Reset</a>
        </div>
    </form><!-- Vertical Form -->

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort">Judul</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>Detail Berita</th>
                    <th>Gambar</th>
                    <th class="datatable-nosort">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($duka_cita as $dukacita)
                <tr>
                    <td>{{ $dukacita->judul }}</td>
                    <td>{{ $dukacita->deskripsi }}</td>
                    <td>{{ $dukacita->created_at }}</td>
                    <td>{{ $dukacita->detail_berita }}</td>
                    <td>
                        <img src="{{ asset($dukacita->image_file) }}" alt="Gambar Berita" style="max-width: 100px;">
                    </td>
                    <td>
                        <a href="{{ url('berita/dukacita/edit_berita', $dukacita->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ url('berita/dukacita/destroy_berita', $dukacita->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Simple Datatable End -->
@endsection