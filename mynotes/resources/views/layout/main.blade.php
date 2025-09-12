<!doctype html>
<html lang="{{app()->getLocale()}}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Le mie Note - @yield('head-title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>
<body class="d-flex align-items-center justify-content-center">
<main class="container fix-container shadow bg-dark p-5">

    @session('success')
    <div id="flash-message">{{$value}}</div>
    @endsession
    <section class="row mb-4">
        <h1 class="text-center mb-5">@yield('header-title')</h1>
        <div class="col-sm-12">
            <div class="col-md-12">
                @yield('header-content')
            </div>
        </div>
    </section>
    <section class="notes overflow-auto">
        @yield('main-content')
    </section>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

<script>
    setTimeout(() => {
        let flash_message = document.querySelector('#flash-message');
        flash_message.style.display = 'none';
    }, 3000)
</script>
</body>
</html>
