@extends('layouts.app')

@section('content')
    <div class="container">
        <h4>Edit Crew</h4>
        <form action="{{ route('admin.crews.update', $crew->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label>Nama</label>
                <input type="text" name="name" value="{{ $crew->name }}" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Posisi</label>
                <input type="text" name="position" value="{{ $crew->position }}" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Foto</label><br>
                @if ($crew->photo)
                    <img src="{{ asset('storage/' . $crew->photo) }}" width="80" class="rounded-circle mb-2"><br>
                @endif
                <input type="file" name="photo" class="form-control-file">
            </div>

            <button class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
