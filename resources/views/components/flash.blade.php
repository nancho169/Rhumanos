@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(Session::has('mensaje'))
<div class="alert alert-{{ Session::get('css')}}
alert-dismissible fade show" role="alert">

{{ Session::get('mensaje')}}
<button type="button" class="btn-close"
data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
</div>
@endif