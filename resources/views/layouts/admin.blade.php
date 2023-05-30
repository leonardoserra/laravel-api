<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>@yield('page-title')</title>


      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

      <!-- Usando Vite -->
      @vite(['resources/js/app.js'])
</head>

<body>
      <div id="app">

            @include('partials.header')
            @include('partials.errors')

            <main class="">
                  <div class="container-fluid">
                        <div class="row">
                              @include('partials.sidebar')

                              @yield('content')
                              @include('partials.messages')

                        </div>
                  </div>
            </main>
      </div>
</body>

</html>
