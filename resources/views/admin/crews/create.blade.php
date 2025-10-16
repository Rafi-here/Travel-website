@extends('layouts.app')

@section('content')
    <div class="container">
        <h4>Tambah Crew</h4>
        <form action="{{ route('admin.crews.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Posisi</label>
                <input type="text" name="position" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Foto</label>
                <input type="file" name="photo" class="form-control-file">
            </div>

            <button class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
