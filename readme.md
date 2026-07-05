# Lensa.Abad - Manajemen Pesanan Fotografi

Sistem manajemen pesanan untuk Lensa.Abad yang memudahkan admin mengelola antrian paket foto dan pelanggan memantau status pesanan mereka.

## Fitur Utama
* **Katalog Jasa:** Menampilkan daftar paket foto yang tersedia.
* **Sistem Pemesanan:** Form pemesanan yang mencatat nama, no WA, tanggal pengerjaan, dan detail paket.
* **Nota Digital:** Invoice otomatis setelah pelanggan melakukan pemesanan.
* **Admin Dashboard:**
    * Manajemen status pesanan (Menunggu, Proses, Selesai).
    * Integrasi WhatsApp untuk komunikasi cepat.
    * Rekap detail pesanan (Paket, Harga, Tanggal Kerja).
* **Antrian Pelanggan:** Halaman publik untuk memantau status pengerjaan pesanan.

## Persiapan & Instalasi
1.  **Clone/Copy** folder proyek ke direktori `htdocs` (jika menggunakan XAMPP/Laragon).
2.  **Database Setup:**
    * Buat database baru (misal: `db_lensaabad`).
    * Import struktur tabel yang diperlukan (pastikan tabel `pesanan` memiliki kolom `paket`, `harga`, `tgl_pengerjaan`, `status`, dsb).
3.  **Koneksi:** Sesuaikan file `koneksi.php` dengan database host, username, dan password lo.
4.  **Folder Upload:** Pastikan folder `uploads/` ada dan memiliki hak akses tulis (write permission) untuk menyimpan bukti bayar.


## Struktur File Penting
* `admin.php`: Pusat kendali manajemen pesanan.
* `pesan.php`: Halaman input form pemesanan pelanggan.
* `antrian.php`: Halaman publik untuk cek status.
* `nota.php`: Invoice setelah pemesanan.
* `koneksi.php`: Konfigurasi database.

## Struktur Project
lensaabad/
├── css/                 # Folder stylesheet (Bootstrap, custom style.css)
├── Font/                # Folder aset font
├── Images/              # Folder aset gambar & logo
├── js/                  # Folder javascript (Bootstrap bundle, script.js)
├── uploads/             # Folder penyimpanan bukti bayar
├── admin.php            # Dashboard admin (manajemen pesanan)
├── antrian.php          # Halaman publik antrian
├── confirmation.php     # Halaman nota/invoice pembayaran
├── faq.html             # Halaman FAQ
├── index.html           # Halaman utama (Landing page)
├── jasa.php             # Halaman daftar paket jasa
├── koneksi.php          # Konfigurasi koneksi database
├── kontak.html          # Halaman kontak
├── nota.php             # File nota pembayaran
├── ourworks.html        # Halaman galeri hasil karya
├── package.json         # File konfigurasi npm/node
├── package-lock.json    # Lock file dependensi
├── pesan.php            # Halaman form pemesanan
├── review.php           # Halaman testimoni/review
├── style.css            # File CSS utama
├── tentangkami.html     # Halaman profil
└── upload_bukti.php     # Halaman unggah bukti pembayaran

## Kontribusi
Proyek ini dikembangkan secara spesifik untuk kebutuhan internal Lensa.Abad.