<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- IMPORT CSS --}}
    <link rel="stylesheet" href="{{ asset('asset/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    {{-- IMPORT JS --}}
    <script src="{{ asset('asset/js/jquery.js') }}"></script>
    <script src="{{ asset('asset/bootstrap/js/bootstrap.min.js') }}"></script>
</head>
<body>
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ implode(', ', $errors->all(':message')) }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    
    @include('sweetalert::alert')
    @yield('content')
</body>
</html>
