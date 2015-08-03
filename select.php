<?php

require_once 'includes/parks_config.php';
require_once 'db_connect.php';

$stmt = $dbc->query('SELECT * FROM national_parks');

echo "Columns: " . $stmt->columnCount() . PHP_EOL;
echo "Rows: " . $stmt->rowCount() . PHP_EOL;

echo "Columns: " . $stmt->columnCount() . PHP_EOL;
while ($row = $stmt->fetch()) {
    print_r($row);
}