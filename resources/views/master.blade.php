<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}">
    <title>{{ config('app.name') }}</title>
</head>
<body>
<div class="container" id="app">
    @yield('content')
</div>
<script src="{{ mix('/js/app.js') }}"></script>
@include('modal.visit-form')
</body>
</html>
