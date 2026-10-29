const KEY = 'travel_bookings';
const form = document.getElementById('form');
const tujuanEl = document.getElementById('tujuan');
const tanggalEl = document.getElementById('tanggal');
const jumlahEl = document.getElementById('jumlah');
const v = id => document.getElementById(id).value.trim();
const findDest = nama => DESTINASI.find(d => d.nama === nama);

tanggalEl.min = todayStr();

function updateTotal() {
  const dest = findDest(tujuanEl.value);
  const pax = parseInt(jumlahEl.value, 10);
  const ok = Number.isInteger(pax) && pax >= 1 && pax <= 9;
  document.getElementById('harga').textContent = dest ? rupiah(dest.harga) : '-';
  document.getElementById('pax').textContent = ok ? pax : '-';
  document.getElementById('total').textContent = dest && ok ? rupiah(dest.harga * pax) : 'Rp 0';
}
tujuanEl.addEventListener('change', updateTotal);
jumlahEl.addEventListener('input', updateTotal);

form.addEventListener('submit', e => {
  e.preventDefault();
  const nama = v('nama'), tujuan = tujuanEl.value, tanggal = tanggalEl.value;
  const jumlah = parseInt(jumlahEl.value, 10);
  const dest = findDest(tujuan);
  const errs = {};
  if (!nama) errs.nama = 'Nama wajib diisi.';
  if (!dest) errs.tujuan = 'Pilih tujuan.';
  if (!tanggal) errs.tanggal = 'Tanggal berangkat wajib diisi.';
  else if (tanggal < todayStr()) errs.tanggal = 'Tanggal tidak boleh sebelum hari ini.';
  if (!Number.isInteger(jumlah) || jumlah < 1 || jumlah > 9) errs.jumlah = 'Jumlah penumpang 1 - 9.';
  if (!showErrors(errs, ['nama', 'tujuan', 'tanggal', 'jumlah'])) return;

  const list = load(localStorage, KEY);
  list.push({ id: genId(), nama, tujuan, tanggal, jumlah, harga: dest.harga, total: dest.harga * jumlah, dibuat: new Date().toISOString() });
  save(localStorage, KEY, list);
  window.location.href = URL_DAFTAR;
});
