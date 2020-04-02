@if ($errors->any())

    <div class="alert alert-danger text-center" role="alert">
        @foreach ($errors->all() as $error)
        <i class="fas fa-times"></i> <strong style="color: red;text-align: left">{{ $error }}</strong>
            <br>
        @endforeach
    </div>


{{--    <div class="alert alert-danger alert-dismissible">--}}
{{--        <ul>--}}
{{--            @foreach ($errors->all() as $error)--}}
{{--                <li style="list-style-type: none">{{ $error }}</li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}
@endif
