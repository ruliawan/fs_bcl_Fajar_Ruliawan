# 🚚 Sistem Manajemen Pengiriman & Armada  
Project uji kompetensi Fullstack Developer dengan **Laravel 12 + Filament 4 + MySQL**.  


## 📌 Deskripsi  
Aplikasi ini digunakan untuk mengelola armada, pengiriman, pemesanan, pelacakan, lokasi check-in, serta laporan statistik pengiriman.  
Dibangun dengan **Laravel Filament** agar admin mudah melakukan CRUD dan monitoring. 

## ⚙️ Cara Menjalankan Aplikasi  

1. **Clone Repository**
   ```bash
   git clone https://github.com/username/fs_bcl_nama_lengkap_anda.git
   cd fs_bcl_nama_lengkap_anda

2. **Install Dependency**
   ```bash
    composer install

3. **Install Dependency**
    - Copy .env.example → .env
    - Konfigurasi database MySQL sesuai environment lokal.

4. **Migrasi Seeder**
    ```bash
    php artisan migrate --seed

5. **Set Username & Password**
    ```bash
    php artisan make:filament-user

5. **Jalakan**
    ```bash
    php artisan serve

🗄️ Struktur Basis Data
armada
| Kolom         | Tipe   | Keterangan                       |
| ------------- | ------ | -------------------------------- |
| id            | bigint | Primary Key                      |
| fleet\_number | string | Nomor Armada (unik)              |
| vehicle\_type | string | Jenis Kendaraan (Truck/Van/etc.) |
| availability  | enum   | tersedia / tidak tersedia        |
| capacity      | int    | Kapasitas muatan (kg)            |

Pengiriman
| Kolom            | Tipe   | Keterangan                               |
| ---------------- | ------ | ---------------------------------------- |
| id               | bigint | Primary Key                              |
| tracking\_number | string | Nomor Pengiriman (unik)                  |
| shipping\_date   | date   | Tanggal Pengiriman                       |
| origin           | string | Lokasi Asal                              |
| destination      | string | Lokasi Tujuan                            |
| status           | enum   | tertunda / dalam perjalanan / telah tiba |
| item\_details    | text   | Detail barang                            |
| fleet\_id        | bigint | Relasi ke armada (nullable)              |

Booking
| Kolom         | Tipe   | Keterangan           |
| ------------- | ------ | -------------------- |
| id            | bigint | Primary Key          |
| fleet\_id     | bigint | Relasi ke armada     |
| shipment\_id  | bigint | Relasi ke pengiriman |
| booking\_date | date   | Tanggal pemesanan    |
| item\_details | text   | Detail barang        |

Lokasi Armada
| Kolom       | Tipe     | Keterangan              |
| ----------- | -------- | ----------------------- |
| id          | bigint   | Primary Key             |
| fleet\_id   | bigint   | Relasi ke armada        |
| latitude    | decimal  | Koordinat Latitude      |
| longitude   | decimal  | Koordinat Longitude     |
| updated\_at | datetime | Waktu check-in terakhir |

📂 Struktur Proyek
app/
 ├─ Models/           # Fleet, Shipment, Booking, FleetLocation
 ├─ Filament/
 │   ├─ Resources/    # FleetResource, ShipmentResource, BookingResource, FleetLocationResource
 │   └─ Widgets/      # ShipmentReportChart
database/
 ├─ migrations/       # Skema database
 └─ seeders/          # Data awal (fleet, shipment)
resources/views/
 └─ filament/resources/fleet-location-resource/pages/fleet-map.blade.php

✨ Fitur Utama

Manajemen Armada

CRUD armada

Filter ketersediaan & jenis kendaraan

Manajemen Pengiriman

CRUD pengiriman

Cari berdasarkan nomor resi / tujuan

Filter status pengiriman

Pemesanan Armada

Validasi tanggal pemesanan ≥ hari ini

Armada otomatis menjadi tidak tersedia setelah dipesan

Hindari double booking

Pelacakan Pengiriman

Cari status pengiriman berdasarkan nomor resi

Lokasi Armada

Armada check-in lokasi (lat/long)

Admin lihat titik armada di peta Leaflet.js

Laporan Pengiriman

Statistik jumlah pengiriman dalam perjalanan per armada

Ditampilkan sebagai grafik batang (ChartWidget)
