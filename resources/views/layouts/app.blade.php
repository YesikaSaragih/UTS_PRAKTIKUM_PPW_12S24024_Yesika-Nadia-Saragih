<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title') - ✈️ Travel Booking</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@stack('styles')
</head>
<body>
<header><div class="container"><nav><a class="brand" href="{{ url('/') }}">✈️ Travel Booking</a><ul>
<li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Pesan Tiket</a></li>
<li><a href="{{ url('/daftar') }}" class="{{ request()->is('daftar*') ? 'active' : '' }}">Daftar Booking</a></li>
</ul></nav></div></header>
@yield('content')
<script src="{{ asset('js/common.js') }}"></script>
@stack('scripts')
</body>
</html>
