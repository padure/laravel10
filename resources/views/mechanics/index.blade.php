@extends('layouts.app')

@section('title', 'Mechanics')

@section('content')
    <div class="row">
        <h4 class="mt-3">Mechanics</h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('mechanics.create') }}" class="btn btn-sm btn-dark mb-3">Add</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Cars</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mechanics as $mechanic)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $mechanic->name }}</td>
                            <td>{{ $mechanic->cars()->count()?$mechanic->cars()->count():"No cars" }}</td>
                            <td>
                                <a href="{{ route('mechanics.edit', ['mechanic' => $mechanic->id]) }}"
                                   class="btn btn-sm btn-outline-warning">
                                    Edit
                                </a>
                                <button class="btn btn-outline-danger btn-sm delete-mechanic"
                                        data-id="{{$mechanic->id}}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No mechanics</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {!! $mechanics->links('partials.paginate') !!}
        </div>
    </div>
@endsection

@push('scripts')
    <script type="module">
        document.addEventListener('DOMContentLoaded', function () {
            const successMessage = "{{ session('success') }}";
            const deleteButtons = document.querySelectorAll('.delete-mechanic');
            if(deleteButtons){
                [...deleteButtons].map( btn => {
                   btn.addEventListener('click', () => {
                        const id = btn.dataset.id;
                        Swal.fire({
                            title: 'Sunteti sigur?',
                            text: "Doriti sa stergeti inregistrarea?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#000',
                            confirmButtonText: 'Da, sterge',
                            cancelButtonText: 'Nu, anuleaza'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                axios.delete(`/mechanics/${id}`)
                                .then(function (response) {
                                    if (response.data.success) {
                                        Swal.fire({
                                            title: 'Succes!',
                                            text: response.data.message,
                                            icon: 'success',
                                            confirmButtonText: 'OK',
                                            confirmButtonColor: '#d33'
                                        }).then(function () {
                                            location.reload();
                                        });
                                    }
                                })
                                .catch(function (error) {
                                    console.log(error);
                                    Swal.fire({
                                        title: 'Eroare!',
                                        text: 'A aparut o eroare la stergerea inregistrarii.',
                                        icon: 'error',
                                        confirmButtonText: 'OK'
                                    });
                                });
                            }
                        });
                   });
                });
            }
            if (successMessage) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: successMessage,
                });
            }
        });
    </script>
@endpush

@push('styles')

@endpush
