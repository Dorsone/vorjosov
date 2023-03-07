@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4 mt-5">Objects List</h1>
        <table class="table table-striped mb-4">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Author</th>
                <th scope="col">Created</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($objects as $object)
                <tr>
                    <th>{{ $object->id }}</th>
                    <td>{{ $object->user->name }}</td>
                    <td>{{ $object->created_at }}</td>
                    <td>
                        <div class="row">
                            <div class="col-3">
                                <a href="{{ route('objects.show', $object->id) }}" type="button" class="btn btn-primary">More</a>
                            </div>
                            <div class="col-3">
                                <form action="{{ route('objects.delete', $object->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
