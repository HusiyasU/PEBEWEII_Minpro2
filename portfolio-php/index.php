<?php
// =====================================================
//  index.php  — Entry point portfolio
//  Data dimuat dinamis dari database via PHP API
//  Stack: PHP + PDO + MySQL + Vue 3 CDN + Bootstrap 5
// =====================================================
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Portfolio | Pebe Weiii</title>

  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- Bootstrap Icons CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet"/>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet"/>

  <link rel="stylesheet" href="assets/style.css"/>
</head>
<body>

<div id="app">

  <!-- ========================================
       NAVBAR
  ========================================= -->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#home">
        <span class="brand-dot"></span>
        <!-- Nama dari database -->
        <span v-if="profile">{{ profile.name.split(' ')[0].toUpperCase() }}</span>
        <span v-else>PEBE</span><span class="brand-accent">.</span>
      </a>
      <button class="navbar-toggler" type="button"
              data-bs-toggle="collapse" data-bs-target="#navMenu">
        <i class="bi bi-list" style="color:var(--clr-text);font-size:1.4rem"></i>
      </button>
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav ms-auto gap-lg-1 align-items-lg-center">
          <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#about">About Me</a></li>
          <li class="nav-item"><a class="nav-link" href="#certificates">Certificates</a></li>
          <li class="nav-item ms-lg-2">
            <a class="btn btn-hire"
               :href="profile ? 'mailto:' + profile.email : '#'">Hire Me</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- ========================================
       LOADING STATE
  ========================================= -->
  <div v-if="loading" class="loading-screen">
    <div class="loading-spinner"></div>
    <p class="loading-text mt-3">Loading portfolio...</p>
  </div>

  <!-- ========================================
       ERROR STATE
  ========================================= -->
  <div v-else-if="error" class="error-screen">
    <i class="bi bi-exclamation-triangle-fill fs-1 mb-3 d-block"
       style="color:#ff6b6b"></i>
    <h4>Gagal memuat data</h4>
    <p class="text-muted">{{ error }}</p>
    <button class="btn btn-primary-custom mt-3" @click="loadAll">
      <i class="bi bi-arrow-clockwise me-2"></i>Coba Lagi
    </button>
  </div>

  <!-- ========================================
       MAIN CONTENT (setelah data loaded)
  ========================================= -->
  <template v-else-if="profile">

    <!-- ── SECTION HOME (HERO) ── -->
    <section id="home" class="hero-section">
      <div class="hero-bg-grid"></div>
      <div class="hero-orb hero-orb-1"></div>
      <div class="hero-orb hero-orb-2"></div>

      <div class="container">
        <div class="row align-items-center min-vh-100 py-5">

          <!-- Left: Text -->
          <div class="col-lg-7">
            <div class="hero-tag mb-3">
              <span class="dot-blink"></span>
              <!-- status_tag dari database -->
              {{ profile.status_tag }}
            </div>

            <h1 class="hero-title">
              Hi, I'm <span class="highlight">{{ profile.name }}</span><br/>
              <!-- role dari database -->
              <span class="hero-role">{{ profile.role }}</span>
            </h1>

            <!-- tagline dari database -->
            <p class="hero-desc mt-4">{{ profile.tagline }}</p>

            <div class="hero-cta mt-5 d-flex gap-3 flex-wrap">
              <a href="#certificates" class="btn btn-primary-custom">
                View My Work <i class="bi bi-arrow-right ms-1"></i>
              </a>
              <a href="#about" class="btn btn-ghost-custom">About Me</a>
            </div>

            <!-- Social links dari database -->
            <div class="mt-5 d-flex gap-3">
              <a :href="profile.github_url"    class="social-link" target="_blank" title="GitHub">
                <i class="bi bi-github"></i>
              </a>
              <a :href="profile.linkedin_url"  class="social-link" target="_blank" title="LinkedIn">
                <i class="bi bi-linkedin"></i>
              </a>
              <a :href="profile.instagram_url" class="social-link" target="_blank" title="Instagram">
                <i class="bi bi-instagram"></i>
              </a>
              <a :href="'mailto:' + profile.email" class="social-link" title="Email">
                <i class="bi bi-envelope"></i>
              </a>
            </div>
          </div>

          <!-- Right: Image + Badges -->
          <div class="col-lg-5 mt-5 mt-lg-0 text-center">
            <div class="hero-card-wrap">
              <div class="hero-img-ring">
                <!-- profile_image dari database -->
                <img :src="profile.profile_image"
                     :alt="'Photo of ' + profile.name"
                     class="hero-profile-img"/>
              </div>
              <!-- years_exp & project_count dari database -->
              <div class="float-badge badge-exp">
                <i class="bi bi-star-fill me-2"></i>{{ profile.years_exp }}+ Yrs Exp
              </div>
              <div class="float-badge badge-proj">
                <i class="bi bi-folder2-open me-2"></i>{{ profile.project_count }} Projects
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="scroll-indicator">
        <span>Scroll Down</span>
        <div class="scroll-line"></div>
      </div>
    </section>

    <!-- ── SECTION ABOUT ME ── -->
    <section id="about" class="about-section">
      <div class="container py-5">

        <div class="section-header mb-5">
          <span class="section-tag">Get to know me</span>
          <h2 class="section-title">About <span class="highlight">Me</span></h2>
        </div>

        <div class="row g-5 align-items-start">

          <!-- Left: Image + Info -->
          <div class="col-lg-5">
            <div class="about-img-wrapper mb-4">
              <!-- about_image dari database -->
              <img :src="profile.about_image"
                   :alt="'About ' + profile.name"
                   class="about-img"/>
              <div class="about-img-decoration"></div>
            </div>

            <!-- Personal info dari database -->
            <div class="info-grid">
              <div class="info-item">
                <span class="info-label">Name</span>
                <span class="info-value">{{ profile.name }}</span>
              </div>
              <div class="info-item">
                <span class="info-label">Location</span>
                <span class="info-value">{{ profile.location }}</span>
              </div>
              <div class="info-item">
                <span class="info-label">Degree</span>
                <span class="info-value">{{ profile.degree }}</span>
              </div>
              <div class="info-item">
                <span class="info-label">Email</span>
                <span class="info-value">{{ profile.email }}</span>
              </div>
              <div class="info-item">
                <span class="info-label">Freelance</span>
                <span class="info-value">{{ profile.freelance }}</span>
              </div>
              <div class="info-item">
                <span class="info-label">Languages</span>
                <span class="info-value">{{ profile.languages }}</span>
              </div>
            </div>
          </div>

          <!-- Right: Bio + Skills + Experience -->
          <div class="col-lg-7">

            <!-- about_desc dari database -->
            <p class="about-desc">{{ profile.about_desc }}</p>

            <!-- Skills dari database (Bootstrap Progress Bar) -->
            <h4 class="skills-heading mt-5 mb-4">Technical Skills</h4>
            <div v-for="skill in skills" :key="skill.id" class="mb-3">
              <div class="d-flex justify-content-between mb-1">
                <span class="skill-name">{{ skill.name }}</span>
                <span class="skill-pct">{{ skill.pct }}%</span>
              </div>
              <div class="progress skill-progress"
                   role="progressbar"
                   :aria-valuenow="skill.pct"
                   aria-valuemin="0"
                   aria-valuemax="100">
                <div class="progress-bar"
                     :style="{ width: skill.pct + '%', background: skill.color }">
                </div>
              </div>
            </div>

            <!-- Experience dari database -->
            <h4 class="skills-heading mt-5 mb-4">Experience</h4>
            <div class="experience-timeline">
              <div v-for="exp in experience" :key="exp.id" class="exp-item">
                <div class="exp-dot"></div>
                <div class="exp-body">
                  <span class="exp-period">{{ exp.period }}</span>
                  <h5 class="exp-title">{{ exp.title }}</h5>
                  <p class="exp-company">
                    <i class="bi bi-building me-1"></i>{{ exp.company }}
                  </p>
                  <p class="exp-desc">{{ exp.description }}</p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

    <!-- ── SECTION CERTIFICATES ── -->
    <section id="certificates" class="cert-section">
      <div class="container py-5">

        <div class="section-header mb-5">
          <span class="section-tag">Achievements</span>
          <h2 class="section-title">My <span class="highlight">Certificates</span></h2>
        </div>

        <!-- Filter tabs — kategori dari database -->
        <div class="d-flex gap-2 flex-wrap justify-content-center mb-5">
          <button
            v-for="cat in certCategories"
            :key="cat"
            class="btn btn-filter"
            :class="{ active: activeCategory === cat }"
            @click="filterCerts(cat)"
          >{{ cat }}</button>
        </div>

        <!-- Loading sertifikat saat filter -->
        <div v-if="certLoading" class="text-center py-4">
          <div class="loading-spinner mx-auto"></div>
        </div>

        <!-- Grid sertifikat -->
        <div v-else class="row g-4">
          <div v-for="cert in certificates"
               :key="cert.id"
               class="col-sm-6 col-lg-4">
            <div class="cert-card h-100">
              <div class="cert-card-top" :style="{ background: cert.gradient }">
                <i :class="'bi bi-' + cert.icon + ' cert-icon'"></i>
                <span class="cert-category-badge">{{ cert.category }}</span>
              </div>
              <div class="cert-card-body">
                <h5 class="cert-title">{{ cert.title }}</h5>
                <p class="cert-issuer">
                  <i class="bi bi-award me-1"></i>{{ cert.issuer }}
                </p>
                <p class="cert-date">
                  <i class="bi bi-calendar3 me-1"></i>{{ cert.date }}
                </p>
                <a :href="cert.link" target="_blank" class="btn btn-cert-view mt-2">
                  View Certificate <i class="bi bi-box-arrow-up-right ms-1"></i>
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Empty state -->
        <div v-if="!certLoading && certificates.length === 0"
             class="text-center py-5">
          <i class="bi bi-emoji-frown fs-1 mb-3 d-block"
             style="color:var(--clr-muted)"></i>
          <p style="color:var(--clr-muted)">
            No certificates in this category yet.
          </p>
        </div>

      </div>
    </section>

  </template><!-- end v-else-if="profile" -->

  <!-- ── FOOTER ── -->
  <footer class="site-footer" v-if="profile && !loading">
    <div class="container">
      <div class="row align-items-center py-4">
        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
          <span class="footer-brand">
            {{ profile.name.split(' ')[0].toUpperCase() }}<span class="brand-accent">.</span>
          </span>
          <p class="footer-copy mt-1 mb-0">
            © {{ currentYear }} {{ profile.name }}. All rights reserved.
          </p>
        </div>
        <div class="col-md-6 text-center text-md-end">
          <div class="footer-links d-flex gap-3 justify-content-center justify-content-md-end">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#certificates">Certificates</a>
          </div>
        </div>
      </div>
    </div>
  </footer>

</div><!-- #app -->

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Vue 3 CDN -->
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

<script>
const { createApp } = Vue

createApp({
  data() {
    return {
      // ── State data dari API ──
      profile:     null,
      skills:      [],
      experience:  [],
      certificates:[],
      certCategories: [],

      // ── UI state ──
      loading:         true,   // loading awal
      certLoading:     false,  // loading saat filter
      error:           null,
      activeCategory:  'All',
      currentYear:     new Date().getFullYear(),
    }
  },

  // ── Jalankan fetch saat Vue siap ──
  mounted() {
    this.loadAll()
  },

  methods: {
    // ─────────────────────────────────────────────
    // Ambil profile + skills + experience dari API
    // ─────────────────────────────────────────────
    async loadAll() {
      this.loading = true
      this.error   = null

      try {
        // Fetch profile API (PHP)
        const res  = await fetch('api/profile.php')
        const data = await res.json()

        if (!res.ok || data.error) {
          throw new Error(data.error || 'Gagal mengambil data profile')
        }

        this.profile    = data.profile
        this.skills     = data.skills
        this.experience = data.experience

        // Setelah profile loaded, fetch sertifikat
        await this.fetchCertificates('All')

      } catch (err) {
        this.error = err.message
      } finally {
        this.loading = false
      }
    },

    // ─────────────────────────────────────────────
    // Ambil certificates dari API (support filter)
    // ─────────────────────────────────────────────
    async fetchCertificates(category = 'All') {
      this.certLoading = true

      try {
        // Tambahkan query string kalau ada filter
        const url = category === 'All'
          ? 'api/certificates.php'
          : `api/certificates.php?category=${encodeURIComponent(category)}`

        const res  = await fetch(url)
        const data = await res.json()

        if (!res.ok || data.error) {
          throw new Error(data.error || 'Gagal mengambil sertifikat')
        }

        this.certificates   = data.certificates
        this.certCategories = data.categories

      } catch (err) {
        console.error('Cert fetch error:', err.message)
      } finally {
        this.certLoading = false
      }
    },

    // ─────────────────────────────────────────────
    // Handler klik filter tab
    // ─────────────────────────────────────────────
    filterCerts(category) {
      this.activeCategory = category
      this.fetchCertificates(category)
    },
  },

}).mount('#app')
</script>

</body>
</html>
