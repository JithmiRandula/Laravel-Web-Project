<!DOCTYPE html>
<html lang=" {{ str_replace('_' , '-' , app()->getLocale()) }}" >
<head>
   <meta charset="utf-8">
   <meta name="viewport" content ="width=device-width, initial-scale=1">
   <meta name="csrf-token" content ="{{ csrf_token() }}">

   <title>{{ config('app.name', 'StudyMate') }}</title>

   <link rel="preconnect" href="http://font.bunny.net">
   <link href="http://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>

<body>

<div class="my-5">
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
