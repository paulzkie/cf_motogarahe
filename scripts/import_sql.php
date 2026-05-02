<?php
// Simple SQL import script for local dev (Windows WAMP)
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'cf_motogarahe';
$sqlFile = isset($argv[1]) && !empty($argv[1]) ? $argv[1] : __DIR__ . '/../db/create_homepage_merchant.sql';

if (!file_exists($sqlFile)) {
    echo "SQL file not found: $sqlFile\n";
    exit(1);
}

$sql = file_get_contents($sqlFile);
if ($sql === false) {
    echo "Failed to read SQL file\n";
    exit(1);
}

$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_errno) {
    echo "Connect failed: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error . "\n";
    exit(1);
}

// Split by delimiter; allow multi statements
if ($mysqli->multi_query($sql)) {
    do {
        if ($result = $mysqli->store_result()) {
            $result->free();
        }
    } while ($mysqli->more_results() && $mysqli->next_result());

    if ($mysqli->errno) {
        echo "SQL error: (" . $mysqli->errno . ") " . $mysqli->error . "\n";
        exit(1);
    }

    echo "Import completed successfully.\n";
} else {
    echo "Failed to execute SQL: (" . $mysqli->errno . ") " . $mysqli->error . "\n";
    exit(1);
}

$mysqli->close();
