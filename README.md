<p align="center">
  <h1 align="center">🌌 MY Portfolio Website GW — PHP Version</h1>
  <p align="center">
    Built with Vue 3 CDN + Bootstrap 5 + PHP + MySQL <br/>
    Dynamic • Database-Driven • Animated • Responsive • Professional
  </p>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Vue-3.x-42b883?style=for-the-badge&logo=vue.js&logoColor=white"/>
  <img src="https://img.shields.io/badge/Bootstrap-5.3.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white"/>
  <img src="https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white"/>
  <img src="https://img.shields.io/badge/MySQL-Laragon-4479A1?style=for-the-badge&logo=mysql&logoColor=white"/>
  <img src="https://img.shields.io/badge/Status-Completed-00ff99?style=for-the-badge"/>
</p>

---

## ✨ About This Project

Versi dinamis dari portfolio website yang dibangun menggunakan **Vue JS 3 CDN**, **Bootstrap 5**, **PHP**, dan **MySQL (Laragon)**.  
Data yang ditampilkan diambil langsung dari database melalui **PHP PDO API**, bukan hardcode di kode.

This project demonstrates:
- Dynamic data from MySQL database via PHP API
- Vue JS `fetch()` untuk consume REST API
- PDO prepared statements (aman dari SQL injection)
- Component-based thinking dalam single-file PHP
- Modern UI/UX styling dengan dark theme

---

## 🖼️ Live Preview

<!-- Ganti dengan screenshot kamu sendiri -->
<img width="1917" alt="preview-home" src="https://github.com/user-attachments/assets/ef8dd368-e1b5-4795-9bec-c74befecd860" />
<img width="1918" alt="preview-about" src="https://github.com/user-attachments/assets/341b7421-df1a-4cf3-9d48-4245bfe9f434" />
<img width="1920" alt="preview-certificates" src="https://github.com/user-attachments/assets/772f289a-2243-4321-97ee-bd90eda864a4" />

---

## 🚀 Core Features

### 🧭 Smart Navbar
- Sticky & backdrop blur
- Responsive hamburger menu
- Smooth hover animations
- Gradient CTA button
- Nama brand dari database

### 🌟 Hero Section
- Animated glowing background
- Gradient typography
- **Nama, role, tagline dari database**
- Floating badges (years_exp & project_count dari database)
- Social links dari database
- Scroll indicator animation

### 👨‍💻 About Me
- **Foto, deskripsi, info personal dari database**
- Dynamic progress bars (skills dari database)
- Experience timeline dari database
- Clean responsive layout

### 📜 Certificates
- **Data sertifikat dari database**
- Category filtering (fetch ulang ke API saat filter)
- Responsive 3-column grid
- Empty state handling
- Interactive cards

### ⏳ Loading & Error State
- Spinner saat data sedang dimuat
- Pesan error jika koneksi database gagal
- Tombol retry

---

## 🔄 Alur Data (Flow)

```
MySQL Database (Laragon)
        ↓
config/database.php  (PDO koneksi)
        ↓
api/profile.php      → JSON Response
api/certificates.php → JSON Response
        ↓
index.php  (Vue 3 CDN)
  mounted() → fetch() → data()
        ↓
Tampilan HTML dinamis via {{ interpolation }} + v-for
```

---

## 🧠 Vue Concepts Implemented

```js
{{ interpolation }}   // render data dari API
v-for                 // skills, experience, certificates, filter tabs
v-if / v-else-if      // loading state, error state, konten utama
:class binding        // active state pada filter button
:style binding        // width & warna progress bar dari database
@click event          // filter kategori sertifikat
data()                // profile, skills, certificates, loading, error
mounted()             // trigger fetch saat Vue siap
methods               // loadAll(), fetchCertificates(), filterCerts()
.mount('#app')        // hubungkan Vue ke DOM
```

---

## 🛠️ Tech Stack

| Technology | Purpose |
|------------|---------|
| Vue JS 3 CDN | Reactive UI, fetch API, render data |
| Bootstrap 5 | Layout & UI Utilities |
| Bootstrap Icons | Icon Library |
| PHP 8 | Backend API, query database |
| PDO | Koneksi aman ke MySQL |
| MySQL (Laragon) | Database penyimpanan data |
| CSS3 | Custom Styling & Animations |
| Google Fonts | Typography |

---

## 🗄️ Struktur Database

```
portfolio_db
├── profile        ← nama, role, tagline, foto, sosmed, dll
├── skills         ← nama skill + persentase + warna bar
├── experience     ← periode, posisi, perusahaan, deskripsi
└── certificates   ← judul, issuer, tanggal, kategori, ikon
```

---

## 🔌 PHP API Endpoints

| Endpoint | Method | Response |
|---|---|---|
| `api/profile.php` | GET | profile + skills + experience |
| `api/certificates.php` | GET | semua sertifikat + kategori |
| `api/certificates.php?category=Vue+JS` | GET | sertifikat terfilter |

---

## 📁 Project Structure

```
PEBEWEIII_MINPRO2/
├── index.php               # Halaman utama (Vue JS + PHP)
├── database.sql            # Script setup database & sample data
├── config/
│   └── database.php        # Koneksi PDO ke MySQL
├── api/
│   ├── profile.php         # Endpoint: profile + skills + experience
│   └── certificates.php    # Endpoint: certificates + filter
└── assets/
    ├── style.css           # Global CSS styles
    └── foto.jpg            # Foto profil
```

---

## ⚙️ Cara Menjalankan

### Setup Database (Laragon):
1. Buka **phpMyAdmin** di Laragon
2. Import file `database.sql`
3. Database `portfolio_db` otomatis terbuat

### Jalankan Project:
```
Taruh folder di: C:\laragon\www\portfolio-php\
Buka di browser: http://localhost/portfolio-php/
```

### Taruh Foto:
```
C:\laragon\www\portfolio-php\assets\foto.jpg
```

---

## ✨ Fitur Vue JS yang Digunakan

| Fitur | Contoh Penggunaan |
|---|---|
| `{{ interpolation }}` | `{{ profile.name }}`, `{{ profile.role }}`, `{{ cert.title }}` |
| `v-for` | Render skills, experience, certificates, filter tabs |
| `v-if / v-else-if / v-else` | Loading state, error state, konten utama |
| `:class` (v-bind) | Active state pada filter button |
| `:style` (v-bind) | Dynamic width & color progress bar dari DB |
| `:src`, `:href` | URL foto & link dari database |
| `@click` (v-on) | Filter kategori sertifikat |
| `data()` | State: profile, skills, certificates, loading, error |
| `mounted()` | Trigger `loadAll()` saat Vue siap |
| `methods` | `loadAll()`, `fetchCertificates()`, `filterCerts()` |
| `.mount('#app')` | Menghubungkan Vue ke DOM element |

---

## ✨ Fitur Bootstrap 5 yang Digunakan

- `navbar`, `navbar-expand-lg`, `navbar-brand`, `navbar-toggler`, `collapse`
- `container`, `row`, `col-*`, `col-sm-*`, `col-lg-*` (Grid System)
- `d-flex`, `gap-*`, `justify-content-*`, `align-items-*`
- `progress`, `progress-bar` (Skills — width dari database)
- `btn`, `btn-*` (CTA buttons, filter tabs)
- `h-100`, `mt-*`, `mb-*`, `py-*`, `ms-auto` (Spacing utilities)
- Responsive breakpoints: `sm`, `lg`, `md`
