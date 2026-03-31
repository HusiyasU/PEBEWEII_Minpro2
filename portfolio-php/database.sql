-- =====================================================
--  DATABASE SETUP — Portfolio Pebe Weiii
--  Jalankan file ini di phpMyAdmin (Laragon)
--  atau via terminal: mysql -u root < database.sql
-- =====================================================

CREATE DATABASE IF NOT EXISTS portfolio_db
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE portfolio_db;

-- ─────────────────────────────────────────
-- TABLE: profile  (Section Home & About Me)
-- ─────────────────────────────────────────
CREATE TABLE IF NOT EXISTS profile (
  id           INT AUTO_INCREMENT PRIMARY KEY,
  name         VARCHAR(100)  NOT NULL,
  role         VARCHAR(100)  NOT NULL,
  tagline      TEXT          NOT NULL,
  status_tag   VARCHAR(100)  NOT NULL DEFAULT 'Available for work',
  about_desc   TEXT          NOT NULL,
  location     VARCHAR(100)  NOT NULL,
  degree       VARCHAR(100)  NOT NULL,
  email        VARCHAR(150)  NOT NULL,
  freelance    VARCHAR(50)   NOT NULL DEFAULT 'Available',
  languages    VARCHAR(100)  NOT NULL DEFAULT 'ID, EN',
  years_exp    INT           NOT NULL DEFAULT 0,
  project_count INT          NOT NULL DEFAULT 0,
  profile_image VARCHAR(255) NOT NULL DEFAULT 'assets/foto.jpg',
  about_image  VARCHAR(255)  NOT NULL DEFAULT 'assets/foto.jpg',
  github_url   VARCHAR(255)  DEFAULT '#',
  linkedin_url VARCHAR(255)  DEFAULT '#',
  instagram_url VARCHAR(255) DEFAULT '#'
) ENGINE=InnoDB;

-- ─────────────────────────────────────────
-- TABLE: skills  (Section About Me)
-- ─────────────────────────────────────────
CREATE TABLE IF NOT EXISTS skills (
  id    INT AUTO_INCREMENT PRIMARY KEY,
  name  VARCHAR(100) NOT NULL,
  pct   INT          NOT NULL DEFAULT 0,
  color VARCHAR(255) NOT NULL DEFAULT 'linear-gradient(90deg,#4fffb0,#00b8ff)',
  sort_order INT     NOT NULL DEFAULT 0
) ENGINE=InnoDB;

-- ─────────────────────────────────────────
-- TABLE: experience  (Section About Me)
-- ─────────────────────────────────────────
CREATE TABLE IF NOT EXISTS experience (
  id         INT AUTO_INCREMENT PRIMARY KEY,
  period     VARCHAR(50)  NOT NULL,
  title      VARCHAR(150) NOT NULL,
  company    VARCHAR(150) NOT NULL,
  description TEXT         NOT NULL,
  sort_order INT           NOT NULL DEFAULT 0
) ENGINE=InnoDB;

-- ─────────────────────────────────────────
-- TABLE: certificates  (Section Certificates)
-- ─────────────────────────────────────────
CREATE TABLE IF NOT EXISTS certificates (
  id         INT AUTO_INCREMENT PRIMARY KEY,
  title      VARCHAR(255) NOT NULL,
  issuer     VARCHAR(150) NOT NULL,
  date       VARCHAR(50)  NOT NULL,
  category   VARCHAR(50)  NOT NULL,
  icon       VARCHAR(50)  NOT NULL DEFAULT 'award',
  gradient   VARCHAR(255) NOT NULL DEFAULT 'linear-gradient(135deg,#1a1a2e,#0f3460)',
  link       VARCHAR(255) NOT NULL DEFAULT '#',
  sort_order INT          NOT NULL DEFAULT 0
) ENGINE=InnoDB;

-- =====================================================
--  SAMPLE DATA
-- =====================================================

INSERT INTO profile (name, role, tagline, status_tag, about_desc, location, degree, email, freelance, languages, years_exp, project_count, profile_image, about_image, github_url, linkedin_url, instagram_url)
VALUES (
  'Pebe Weiii',
  'Frontend Developer',
  'I craft beautiful and performant web experiences using modern technologies like Vue JS, React, and cutting-edge CSS. Passionate about clean code and creative interfaces.',
  'Available for work',
  'I am a passionate Frontend Developer with 3+ years of experience building modern, responsive, and user-friendly web applications. I specialize in Vue JS, React, and enjoy bridging creative design with clean, maintainable code.',
  'Kalimantan, ID',
  'S1 Informatika',
  'pebe@example.com',
  'Available',
  'ID, EN',
  3,
  20,
  'assets/foto.jpg',
  'assets/foto.jpg',
  'https://github.com/',
  'https://linkedin.com/',
  'https://instagram.com/'
);

INSERT INTO skills (name, pct, color, sort_order) VALUES
  ('HTML & CSS',    92, 'linear-gradient(90deg,#ff6b6b,#feca57)', 1),
  ('Vue JS',        85, 'linear-gradient(90deg,#4fffb0,#00b8ff)', 2),
  ('JavaScript',    80, 'linear-gradient(90deg,#f7df1e,#ff9f43)', 3),
  ('Bootstrap 5',   88, 'linear-gradient(90deg,#7c3aed,#a78bfa)', 4),
  ('React',         72, 'linear-gradient(90deg,#00b8ff,#0984e3)', 5),
  ('Figma / UI/UX', 70, 'linear-gradient(90deg,#fd79a8,#e84393)', 6);

INSERT INTO experience (period, title, company, description, sort_order) VALUES
  ('2023 – Present', 'Frontend Developer',      'Tech Startup — Balikpapan',  'Building responsive web apps with Vue JS and Nuxt. Leading UI architecture decisions and conducting code reviews.',                                             1),
  ('2022 – 2023',    'Junior Web Developer',     'Digital Agency — Samarinda', 'Developed landing pages and e-commerce templates using Bootstrap 5. Collaborated closely with UI designers to implement pixel-perfect interfaces.',               2),
  ('2021 – 2022',    'Internship — Frontend Dev','PT. Kreasi Digital',          'Assisted in building internal dashboards using HTML, CSS, and vanilla JavaScript. Gained hands-on experience with Git workflow.', 3);

INSERT INTO certificates (title, issuer, date, category, icon, gradient, link, sort_order) VALUES
  ('Front-End Web Development Fundamentals', 'Dicoding Indonesia', 'Maret 2024',    'Web Dev', 'code-slash',    'linear-gradient(135deg,#1a1a2e,#0f3460)', '#', 1),
  ('Vue JS – The Complete Guide',            'Udemy',              'Januari 2024',  'Vue JS',  'layers',        'linear-gradient(135deg,#0d2137,#1a4a3a)', '#', 2),
  ('Bootstrap 5 Mastery Course',             'Coursera',           'November 2023', 'CSS',     'grid-1x2-fill', 'linear-gradient(135deg,#2d0a6b,#5a189a)', '#', 3),
  ('JavaScript Algorithms & Data Structures','freeCodeCamp',       'September 2023','Web Dev', 'braces',        'linear-gradient(135deg,#1a2600,#2d4a00)', '#', 4),
  ('UI/UX Design Essentials with Figma',     'Dicoding Indonesia', 'Juli 2023',     'Design',  'palette2',      'linear-gradient(135deg,#3d0030,#6d003a)', '#', 5),
  ('Responsive Web Design Certification',    'freeCodeCamp',       'Mei 2023',      'CSS',     'phone',         'linear-gradient(135deg,#001a3d,#003080)', '#', 6),
  ('Git & GitHub for Beginners',             'Udemy',              'April 2023',    'DevOps',  'git',           'linear-gradient(135deg,#1a0a00,#3d1c00)', '#', 7),
  ('Google Analytics Certification',         'Google',             'Februari 2023', 'Design',  'bar-chart-line','linear-gradient(135deg,#001a1a,#003d3d)', '#', 8),
  ('Node.js & Express Backend Basics',       'Coursera',           'Desember 2022', 'DevOps',  'server',        'linear-gradient(135deg,#0a1a00,#1a3300)', '#', 9);
