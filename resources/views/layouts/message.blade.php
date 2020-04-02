
@if(Session::has('success'))

    <div class="alert alert-dark text-center" role="alert">
        <i class="fas fa-check-circle"></i> <strong>{{Session::get('success')}}</strong>
    </div>
@endif

@if(Session::has('alert'))

    <div class="alert alert-danger text-center" role="alert">
        <i class="fas fa-times"></i> <strong style="color: red">Sorry ! {{Session::get('alert')}}</strong>
    </div>
@endif
