<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container">

    @if (session('my_status'))
    <div class="container mt-2">
        <div class="alert alert-success">
        {{ session('my_status') }}
        </div>
    </div>
    @endif

    @if (session('error'))
    <div class="container mt-2">
        <div class="alert alert-danger">
      {{ session('error') }}
        </div>
    </div>
    @endif

    @yield('content')
    </div>
</body>
</html>