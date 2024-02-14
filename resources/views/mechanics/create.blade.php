@extends('layouts.app')

@section('title', 'Mechanics')

@section('content')
    <div class="row">
        <h4>Mechanics</h4>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('mechanics.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                </div>
                <button class="btn btn-sm btn-dark">Save</button>
            </form>
        </div>
    </div>
@endsection
