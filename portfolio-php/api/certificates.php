<?php
// =====================================================
//  api/certificates.php
//  Endpoint  : GET /api/certificates.php
//              GET /api/certificates.php?category=Vue+JS
//  Response  : JSON { certificates, categories }
//  Diakses   : Vue JS via fetch()
// =====================================================

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

require_once __DIR__ . '/../config/database.php';

try {
    $pdo = getConnection();

    $category = isset($_GET['category']) ? trim($_GET['category']) : '';

    if ($category && $category !== 'All') {
        $stmt = $pdo->prepare(
            'SELECT * FROM certificates WHERE category = :cat ORDER BY sort_order ASC'
        );
        $stmt->execute([':cat' => $category]);
    } else {
        $stmt = $pdo->query('SELECT * FROM certificates ORDER BY sort_order ASC');
    }

    $certificates = $stmt->fetchAll();

    $cats = $pdo
        ->query('SELECT DISTINCT category FROM certificates ORDER BY category ASC')
        ->fetchAll(PDO::FETCH_COLUMN);

    array_unshift($cats, 'All');

    echo json_encode([
        'success'      => true,
        'certificates' => $certificates,
        'categories'   => $cats,
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
