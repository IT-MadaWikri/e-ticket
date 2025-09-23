# E-Ticket System - Absensi Karyawan

Sistem absensi karyawan berbasis web untuk PT Mada Wikri Tunggal dengan fitur presensi real-time, dashboard admin, dan laporan kehadiran.

## 📋 Deskripsi Proyek

E-Ticket System adalah aplikasi web untuk mengelola absensi karyawan dengan fitur:
- **Presensi Real-time** dengan scan barcode/NIK
- **Dashboard Admin** untuk monitoring kehadiran
- **Laporan Absensi** harian, mingguan, dan bulanan
- **Manajemen Karyawan** (CRUD)
- **Sistem Ijin** dan cuti karyawan
- **Export Data** ke Excel

## 🛠️ Teknologi yang Digunakan

- **Backend**: PHP 5.6.40
- **Database**: MySQL 5.7+
- **Frontend**: HTML5, CSS3, JavaScript, Bootstrap
- **Server**: Apache 2.4+ (XAMPP)
- **Library**: jQuery, Chart.js, Materialize CSS

## ⚠️ Keterbatasan & Requirements

### **Keterbatasan Sistem:**
1. **PHP Version**: Hanya kompatibel dengan PHP 5.6.40
   - Tidak support PHP 7.x atau 8.x
   - Menggunakan syntax dan function yang deprecated
   - Tidak menggunakan OOP (Object-Oriented Programming)

2. **Database**: 
   - Menggunakan MySQLi extension (bukan PDO)
   - Tidak menggunakan prepared statements (rentan SQL injection)
   - Database schema sederhana tanpa foreign key constraints

3. **Security**:
   - Password tidak di-hash (plain text)
   - Tidak ada CSRF protection
   - Input validation minimal
   - Session management sederhana

4. **Performance**:
   - Tidak ada caching mechanism
   - Query database tidak dioptimasi
   - Tidak ada pagination untuk data besar

5. **Browser Support**:
   - Optimized untuk browser lama
   - Tidak responsive untuk mobile
   - Menggunakan jQuery versi lama

## 🚀 Cara Instalasi

### **Prerequisites:**
- XAMPP 3.2.4 atau versi yang kompatibel
- PHP 5.6.40 (included dalam XAMPP)
- MySQL 5.7+
- Web browser (Chrome, Firefox, Edge)

### **Langkah Instalasi:**

1. **Download XAMPP**
   ```
   https://www.apachefriends.org/download.html
   Pilih versi yang include PHP 5.6.40
   ```

2. **Install XAMPP**
   - Install XAMPP di C:\xampp\
   - Start Apache dan MySQL dari XAMPP Control Panel

3. **Clone Repository**
   ```bash
   git clone https://github.com/IT-MadaWikri/e-ticket.git
   ```

4. **Setup Database**
   - Buka phpMyAdmin: http://localhost/phpmyadmin
   - Buat database baru: `absen`
   - Import file `absen.sql`

5. **Konfigurasi Database**
   Edit file `include/koneksi.php`:
   ```php
   $srvr="localhost";
   $db="absen";
   $usr="root";
   $pwd="";
   ```

6. **Akses Aplikasi**
   - **Halaman Utama**: http://localhost/e-ticket/
   - **Login Admin**: http://localhost/e-ticket/login.php

## 📁 Struktur Proyek

```
e-ticket/
├── app/                    # Admin Dashboard
│   ├── content/           # Halaman konten
│   ├── controller/        # Controller PHP
│   ├── css/              # Stylesheet
│   ├── js/               # JavaScript
│   └── plugins/          # Plugin & Library
├── controllers/           # Controller utama
├── css/                  # CSS utama
├── images/               # Gambar & assets
├── include/              # File include
│   ├── koneksi.php       # Database connection
│   └── app.php           # App configuration
├── js/                   # JavaScript utama
├── index.php             # Halaman utama
├── login.php             # Login admin
└── absen.sql            # Database schema
```

## 🔧 Konfigurasi

### **Database Configuration**
File: `include/koneksi.php`
```php
$srvr="localhost";     // Server database
$db="absen";          // Nama database
$usr="root";          // Username database
$pwd="";              // Password database
```

### **App Configuration**
File: `include/app.php`
- Mengambil konfigurasi dari tabel `aplikasi`
- Nama aplikasi dan perusahaan

## 👥 Default Login

**Admin Login:**
- Username: `admin`
- Password: `admin`

*⚠️ Segera ubah password default setelah instalasi!*

## 📊 Fitur Utama

### **1. Presensi Karyawan**
- Scan barcode/NIK untuk presensi masuk
- Real-time monitoring kehadiran
- Validasi data karyawan

### **2. Dashboard Admin**
- Statistik kehadiran harian
- Grafik presensi real-time
- Monitoring karyawan yang belum presensi

### **3. Manajemen Data**
- CRUD karyawan
- Manajemen area dan lokasi
- Pengaturan job title
- Sistem ijin dan cuti

### **4. Laporan**
- Laporan absensi harian
- Export data ke Excel
- Filter berdasarkan periode

## 🐛 Troubleshooting

### **Error: "No php-cgi.exe"**
- Pastikan XAMPP menggunakan PHP 5.6.40
- Restart Apache dari XAMPP Control Panel

### **Error: "Database connection failed"**
- Pastikan MySQL berjalan
- Cek konfigurasi di `include/koneksi.php`
- Pastikan database `absen` sudah dibuat

### **Error: "Page not found"**
- Pastikan mod_rewrite aktif di Apache
- Cek file `.htaccess` ada di root folder

### **Error: "Permission denied"**
- Pastikan folder `images/` dan `app/images/` writable
- Set permission 755 untuk folder upload

## 🔄 Upgrade Path

Untuk mengupgrade ke versi modern:

1. **PHP 7.4+**: Update syntax dan deprecated functions
2. **Security**: Implement password hashing, CSRF protection
3. **Database**: Migrate ke PDO dengan prepared statements
4. **Frontend**: Update ke framework modern (React/Vue)
5. **Architecture**: Implement MVC pattern

## 📝 Changelog

### **v1.0.0** (2024)
- Initial release
- Basic presensi system
- Admin dashboard
- MySQL database integration

## 👨‍💻 Developer

**IT Department - PT Mada Wikri Tunggal**
- Repository: https://github.com/IT-MadaWikri/e-ticket
- Email: it@madawikri.com

## 📄 License

Proprietary software - PT Mada Wikri Tunggal
All rights reserved.

---

**⚠️ PENTING**: Sistem ini dirancang khusus untuk XAMPP dengan PHP 5.6.40. Tidak disarankan untuk production environment tanpa security hardening terlebih dahulu.
