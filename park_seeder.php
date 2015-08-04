<?php
define("DB_HOST", '127.0.0.1');
define("DB_NAME", 'parks_db');
define("DB_USER", 'parks_user');
define("DB_PASS", '');

require_once 'db_connect.php';

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$truncate = 'TRUNCATE national_parks';

$dbc->exec($truncate);

$parks = [
    ['name' => 'Acadia', 'location' => 'ME', 'date_established' => '1919-02-26', 'area_in_acres' => 47389.67, 'description' => 'Awesome State Park'],
    ['name' => 'Arches', 'location' => 'UT', 'date_established' => '1988-10-31', 'area_in_acres' => 9000.00, 'description' => 'Awesome State Park'],
    ['name' => 'Badlands', 'location' => 'SD', 'date_established' => '1978-11-10', 'area_in_acres' => 242755.94, 'description' => 'Awesome State Park'],
    ['name' => 'Big Bend', 'location' => 'TX', 'date_established' => '1944-06-12', 'area_in_acres' => 801163.21, 'description' => 'Awesome State Park'],
    ['name' => 'Carlsbad Caverns', 'location' => 'NM', 'date_established' => '1930-05-14', 'area_in_acres' => 46766.45, 'description' => 'Awesome State Park'],
    ['name' => 'Crater Lake', 'location' => 'OR', 'date_established' => '1902-05-22', 'area_in_acres' => 183224.05, 'description' => 'Awesome State Park'],
    ['name' => 'Denali', 'location' => 'AL', 'date_established' => '1917-02-26', 'area_in_acres' => 4740911.72, 'description' => 'Awesome State Park'],
    ['name' => 'Everglades', 'location' => 'FL', 'date_established' => '1934-05-30', 'area_in_acres' => 1508537.90, 'description' => 'Awesome State Park'],
    ['name' => 'Glacier', 'location' => 'MT', 'date_established' => '1910-05-11', 'area_in_acres' => 1013572.41, 'description' => 'Awesome State Park'],
    ['name' => 'Olympic', 'location' => 'WA', 'date_established' => '1938-06-29', 'area_in_acres' => 922650.86, 'description' => 'Awesome State Park']
];

    $stmt = $dbc->prepare("INSERT INTO national_parks(name, location, date_established, area_in_acres, description) VALUES(:name,:location,:date_established,:area_in_acres,:description)");
foreach ($parks as $park) {
     $stmt ->bindValue(':name', $park['name'], PDO::PARAM_STR);
     $stmt ->bindValue(':location', $park['location'], PDO::PARAM_STR);
     $stmt ->bindValue(':date_established', $park['date_established'], PDO::PARAM_STR);
     $stmt ->bindValue(':area_in_acres', $park['area_in_acres'], PDO::PARAM_STR);
     $stmt ->bindValue(':description', $park['description'], PDO::PARAM_STR);

    $stmt->execute();
}
    echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
    
}