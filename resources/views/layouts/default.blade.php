<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rese</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  <script src="{{ asset('js/main.js') }}"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @yield('css')
</head>
<body>
    @yield('content')
</body>
</html>