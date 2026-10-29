@extends('layouts.app')
@section('title', 'Daftar Booking')
@section('content')
<main class="container">
  <h1>Daftar Booking</h1>
  <div id="content" class="card"></div>
</main>
@endsection
@push('scripts')
<script>window.URL_BOOKING = "{{ url('/') }}";</script>
<script src="{{ asset('js/daftar.js') }}"></script>
@endpush
