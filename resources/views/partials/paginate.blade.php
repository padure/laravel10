@if($paginator->hasPages())
    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
        <div class="justify-content-center btn-group" role="group" aria-label="Basic example">
            <a class="btn btn-dark btn-sm" href="{{$paginator->previousPageUrl()}}">Previous</a>
            <a class="btn btn-dark btn-sm" href="{{$paginator->nextPageUrl()}}">Next</a>
        </div>
    </nav>
@endif
