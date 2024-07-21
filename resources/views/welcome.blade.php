<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>nancho</title>

        <link rel="stylesheet" href="{{ asset('css/css@3.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
        <link href="{{ asset('css/custom.min.css') }}" rel="stylesheet">
        <style>
        
        pre code {
            display: block;
            padding: 10px;
            background-color: #f4f4f4;
            border: 1px solid #ddd;
            border-radius: 5px;
            user-select: all; /* Permite la selección del texto */
        }
        </style>

        
        <!-- Custom styles for this template -->
        <link href="{{asset('css/bootstrap-icons.min.css')}}" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">

        <link href="{{asset('fontawesome/css/font-awesome.min.css')}}" rel="stylesheet">
       
    </head>
    <body class="login">
       
            @include('auth.login')       
    
        
        <!-- INICIO SCRIPTS -->
<script src="{{asset('jquery/dist/jquery.js')}}"></script>
<script src="{{asset('bootstrap/dist/js/bootstrap.js')}}"></script>
<script src="{{asset('js/chart.umd.js') }}" ></script>
<script src="{{asset('js/custom.js') }}"></script>
<script src="{{asset('bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{asset('js/custom.min.js')}}"></script>

</body>
@stack('js')
    </body>
</html>
