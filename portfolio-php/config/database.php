<?php
// =====================================================
//  config/database.php
//  Koneksi PDO ke MySQL (Laragon)
//  Ubah DB_NAME, DB_USER, DB_PASS sesuai Laragon kamu
// =====================================================

define('DB_HOST', 'localhost');
define('DB_NAME', 'portfolio_db');
define('DB_USER', 'root');       // default Laragon
define('DB_PASS', '');           // default Laragon kosong

function getConnection(): PDO {
    static $pdo = null;          // singleton — buat koneksi 1x saja

    if ($pdo === null) {
        try {
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';

            $pdo = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
        } catch (PDOException $e) {
            // Kirim error sebagai JSON supaya Vue bisa handle
            http_response_code(500);
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Database connection failed: ' . $e->getMessage()]);
            exit;
        }
    }

    return $pdo;
}
