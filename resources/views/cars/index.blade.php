@extends('layouts.app')

@section('title', 'Cars')

@section('content')
    <div class="row">
        <h4 class="mt-3">Cars</h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('cars.create') }}" class="btn btn-sm btn-dark mb-3">Add</a>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Model</th>
                    <th>Mechanic</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody>
                @forelse($cars as $car)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->mechanic()->first()->name }}</td>
                        <td>
                            <a href="{{ route('cars.edit', ['car' => $car->id]) }}"
                               class="btn btn-sm btn-outline-warning">
                                Edit
                            </a>
                            <button class="btn btn-outline-danger btn-sm delete-car"
                                    data-id="{{$car->id}}">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No cars</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {!! $cars->links('partials.paginate') !!}
        </div>
    </div>
@endsection

@push('scripts')
    <script type="module">
        document.addEventListener('DOMContentLoaded', function () {
            const successMessage = "{{ session('success') }}";
            const deleteButtons = document.querySelectorAll('.delete-car');
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
                                axios.delete(`/cars/${id}`)
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
