@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4 mt-5">Events List</h1>
        <table class="table table-striped mb-4">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Created</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <th>{{ $event->id }}</th>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->created_at }}</td>
                        <td>
                            <div class="row">
                                <div class="col-3">
                                    <a href="{{ route('events.show', $event->id) }}" type="button" class="btn btn-primary">More</a>
                                </div>
                                <div class="col-3">
                                    <form action="{{ route('events.delete', $event->id) }}" method="post">
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
