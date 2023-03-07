@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mt-4 row" style="margin: 0 auto">
            <div class="col-3"></div>
            <div class="col-6">
                <form action="{{ route('send-request') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="select">Request Method</label>
                        <select class="form-control" id="select" name="method">
                            <option selected value="get">GET</option>
                            <option value="post">POST</option>
                        </select>
                    </div>

                    <div class="form-group mt-4">
                        <label for="select">Request to</label>
                        <select class="form-control" id="select" name="url">
                            <option selected value="/api/v1/events">/api/v1/events</option>
                            <option value="/api/v1/my-objects">/api/v1/my-objects</option>
                        </select>
                    </div>

                    <div class="form-group mt-4">
                        <label for="token">Token</label>
                        <input type="password" name="token" class="form-control" id="token">
                    </div>
                    <div class="form-group mt-4">
                        <label for="editor">Request Body</label>
                        <textarea name="body" class="form-control" id="editor"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
@endsection
