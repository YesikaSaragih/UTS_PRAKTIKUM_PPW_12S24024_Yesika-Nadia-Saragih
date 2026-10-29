const content = document.getElementById('content');
const list = load(localStorage, 'travel_bookings');
if (!list.length) {
  content.className = 'card empty';
  content.append('Belum ada booking. ', el('a', { href: URL_BOOKING, text: 'Pesan tiket sekarang' }));
} else {
  content.append(table(['#', 'Nama', 'Tujuan', 'Berangkat', 'Penumpang', 'Total'],
    list.map((b, i) => [i + 1, b.nama, b.tujuan, fmtDate(b.tanggal), b.jumlah, rupiah(b.total)])));
}
