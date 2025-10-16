@extends('layouts.app')

@section('content')
    <div class="content-header">
        <h1 class="m-0">Crew List</h1>
    </div>

    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.crews.create') }}" class="btn btn-primary">Add Crew</a>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($crews as $crew)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if ($crew->photo)
                                    <img src="{{ asset('storage/' . $crew->photo) }}" width="60" height="60"
                                        class="rounded-circle">
                                @else
                                    <span class="text-muted">No photo</span>
                                @endif
                            </td>
                            <td>{{ $crew->name }}</td>
                            <td>{{ $crew->position }}</td>
                            <td>
                                <a href="{{ route('admin.crews.edit', $crew->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('admin.crews.destroy', $crew->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this crew?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
