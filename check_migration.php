<?php
$dbConfig = require __DIR__ . '/config/database.php';

// Read .env to get DB details
$envFile = file_get_contents(__DIR__ . '/.env');
preg_match('/DB_DATABASE=(.+)/', $envFile, $db);
preg_match('/DB_USERNAME=(.+)/', $envFile, $user);
preg_match('/DB_PASSWORD=(.*)/', $envFile, $pass);
preg_match('/DB_HOST=(.+)/', $envFile, $host);

$database = trim($db[1] ?? 'motoshop_web');
$username = trim($user[1] ?? 'root');
$password = trim($pass[1] ?? '');
$dbHost   = trim($host[1] ?? 'localhost');

echo "Connecting to: $dbHost / $database as $username\n";

$pdo = new PDO("mysql:host=$dbHost;dbname=$database", $username, $password);
$stmt = $pdo->query('DESCRIBE invoice_items');
echo "invoice_items columns:\n";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "  " . $row['Field'] . " (" . $row['Type'] . ")" . ($row['Null'] === 'YES' ? ' NULL' : ' NOT NULL') . "\n";
}
