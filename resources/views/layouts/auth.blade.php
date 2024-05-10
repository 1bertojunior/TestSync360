<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'App') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        html, body, .full-screen {
            height: 100%;
        }
    </style>
</head>

<body>

    <section class="bg-primary full-screen py-3 py-md-2 py-xl-8 container-fluid">
      <div class="row gy-2 justify-content-center align-items-center">
        <div class="col-12 col-md-12 col-xl-6">
            <div class="card border-0 rounded-4">
              
              <div class="container-fluid h-100">
                  @yield('content')
              </div>

            </div>
          </div>
      </div>
    </section>


</body>
</html>
