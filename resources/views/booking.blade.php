@extends('layouts.app')
@section('title', 'Pesan Tiket')
@section('content')
<main class="container">
  <h1>Pesan Tiket Pesawat</h1>
  <div class="layout">
    <form id="form" class="card" novalidate>
      <h2>Data Pemesanan</h2>
      <label for="nama">Nama Penumpang</label>
      <input type="text" id="nama" maxlength="100" autocomplete="name">
      <p class="error" id="err-nama"></p>

      <label for="tujuan">Tujuan</label>
      <select id="tujuan">
        <option value="">-- Pilih tujuan --</option>
        @foreach ($destinasi as $d)
          <option value="{{ $d['nama'] }}">{{ $d['nama'] }} (Rp {{ number_format($d['harga'], 0, ',', '.') }})</option>
        @endforeach
      </select>
      <p class="error" id="err-tujuan"></p>

      <label for="tanggal">Tanggal Berangkat</label>
      <input type="date" id="tanggal">
      <p class="error" id="err-tanggal"></p>

      <label for="jumlah">Jumlah Penumpang</label>
      <input type="number" id="jumlah" min="1" max="9" value="1">
      <p class="error" id="err-jumlah"></p>

      <button type="submit" class="btn">Pesan Sekarang</button>
    </form>

    <aside class="card info">
      <h2>Ringkasan Harga</h2>
      <div class="price-box">
        <div class="muted">Total Harga</div>
        <div class="big" id="total">Rp 0</div>
        <dl>
          <dt>Harga tiket</dt><dd id="harga">-</dd>
          <dt>Penumpang</dt><dd id="pax">-</dd>
        </dl>
      </div>
      <h2 style="margin-top:1.5rem">Informasi</h2>
      <ul>
        <li>Total = jumlah penumpang × harga tiket.</li>
        <li>Maksimal 9 penumpang per pemesanan.</li>
        <li>Data booking tersimpan di browser (localStorage).</li>
      </ul>
    </aside>
  </div>
</main>
@endsection
@push('scripts')
<script>
window.DESTINASI = @json($destinasi);
window.URL_DAFTAR = "{{ url('/daftar') }}";
</script>
<script src="{{ asset('js/booking.js') }}"></script>
@endpush
