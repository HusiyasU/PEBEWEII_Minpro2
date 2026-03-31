<?php
// =====================================================
//  api/profile.php
//  Endpoint  : GET /api/profile.php
//  Response  : JSON { profile, skills, experience }
//  Diakses   : Vue JS via fetch()
// =====================================================

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

require_once __DIR__ . '/../config/database.php';

try {
    $pdo = getConnection();

    $profile = $pdo
        ->query('SELECT * FROM profile ORDER BY id ASC LIMIT 1')
        ->fetch();

    if (!$profile) {
        http_response_code(404);
        echo json_encode(['error' => 'Profile not found']);
        exit;
    }

    $skills = $pdo
        ->query('SELECT * FROM skills ORDER BY sort_order ASC')
        ->fetchAll();

    $experience = $pdo
        ->query('SELECT * FROM experience ORDER BY sort_order ASC')
        ->fetchAll();

    echo json_encode([
        'success'    => true,
        'profile'    => $profile,
        'skills'     => $skills,
        'experience' => $experience,
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
