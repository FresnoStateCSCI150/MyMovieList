@if (isset($successMessage))
    <div class="alert alert-success alert-dismissible fade show p-1 pl-2 pr-3 m-0 ml-2 mb-1">
        {{ $successMessage }}
        <button type="button" class="close p-0 m-0 mr-2 mt-1" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (isset($failureMessage))
    <div class="alert alert-danger alert-dismissible fade show p-1 pl-2 pr-3 m-0 ml-2 mb-1">
        {{ $failureMessage }}
        <button type="button" class="close p-0 m-0 mr-2 mt-1" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
