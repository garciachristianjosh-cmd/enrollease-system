<?php
$DB_HOST = 'localhost';
$DB_NAME = 'enrollease_system';
$DB_USER = 'root';
$DB_PASS = '';

try {
    $pdo = new PDO(
        "mysql:host={$DB_HOST};dbname={$DB_NAME};charset=utf8mb4",
        $DB_USER,
        $DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false, // forces REAL prepared statements (stronger SQLi protection)
        ]
    );
} catch (PDOException $e) {
    // Never leak raw DB errors to the user/browser
    error_log('DB connection failed: ' . $e->getMessage());
    die('A system error occurred. Please try again later.');
}
