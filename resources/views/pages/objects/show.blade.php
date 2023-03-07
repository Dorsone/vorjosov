@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4 mt-5">Object ID {{ $object->id }}</h1>
        <div class="row">
            <div class="col">
                <label for="event-title" class="mb-1">Author</label>
                <input id="event-title" class="form-control" type="text" placeholder="{{ $object->user->name }}"
                       readonly>
            </div>
            <div class="col">
                <label for="event-created" class="mb-1">Created</label>
                <input id="event-created" class="form-control" type="text" placeholder="{{ $object->created_at }}"
                       readonly>
            </div>
        </div>
        <div class="row mt-4 mb-4">
            <div class="col" id="data-container">
                @dump($data)
            </div>
        </div>
        <div class="row float-end">
            <div class="col-3">
                <a href="{{ route('objects.index') }}" type="button" class="btn btn-primary float-end">Back</a>
            </div>
            <div class="col-3">
                <form action="{{ route('objects.delete', $object->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
