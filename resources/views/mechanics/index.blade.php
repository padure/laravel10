@extends('layouts.app')

@section('title', 'Mechanics')

@section('content')
    <div class="row">
        <h4>Mechanics</h4>
    </div>
    <div class="row">
        <div class="col-md-10">
            <a href="{{ route('mechanics.create') }}" class="btn btn-sm btn-dark mb-3">Add</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mechanics as $mechanic)
                        <tr>
                            <td>{{ $loop->iterate }}</td>
                            <td>{{ $mechanic->name }}</td>
                            <td>
                                <a href="" class="bt btn-sm btn-warning">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No mechanics</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
