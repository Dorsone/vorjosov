@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4 mt-5">Event ID {{ $event->id }}</h1>
        <div class="row">
            <div class="col">
                <label for="event-title" class="mb-1">Title</label>
                <input id="event-title" class="form-control" type="text" placeholder="{{ $event->title }}" readonly>
            </div>
            <div class="col">
                <label for="event-created" class="mb-1">Created</label>
                <input id="event-created" class="form-control" type="text" placeholder="{{ $event->created_at }}" readonly>
            </div>
            <span class="mt-4"><b>Author:</b> {{ $event->user->name }}</span>
        </div>
        <div class="row float-end">
            <div class="col-3">
                <a href="{{ route('events.index') }}" type="button" class="btn btn-primary float-end">Back</a>
            </div>
            <div class="col-3">
                <form action="{{ route('events.delete', $event->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
