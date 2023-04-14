@if (Session::has('message'))
    <div class="alert 
    @if (Session::has('type')) @if (Session::get('type') == 'success')
        alert-success
    @elseif(Session::get('type') == 'warning')
        alert-warning
        @else
        alert-danger @endif
    @endif
    alert-dismissible fade show"
        role="alert">
        <strong>{{ Session::get('type') == 'success' ? 'Success' : 'Wrong' }} !!!</strong>
        {{ Session::get('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
