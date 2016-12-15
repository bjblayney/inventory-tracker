<?php

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$allShirts = "SELECT t.name AS shirt_type,
                b.name AS brand_name,
                i.gender,
                i.quantity,
                i.size,
                c.name AS colour
                FROM inventory i
                JOIN brand b ON i.brand=b.id
                JOIN type t ON i.type=t.id
                JOIN colour c ON i.colour=c.id";
$allShirtsResults = $conn->query($allShirts);

$dashboardNumbers = [
    'all_qty' => 0,
    'small_qty' => 0,
    'medium_qty' => 0,
    'large_qty' => 0,
    'xlarge_qty' => 0
];

if ($allShirtsResults) {
    if ($allShirtsResults->num_rows > 0) {
        while($row = $allShirtsResults->fetch_assoc()) {
            $dashboardNumbers['all_qty'] += $row['quantity'];

            if(strtolower($row['size']) == 'small') {
                $dashboardNumbers['small_qty'] += $row['quantity'];
            }

            if(strtolower($row['size']) == 'medium') {
                $dashboardNumbers['medium_qty'] += $row['quantity'];
            }

            if(strtolower($row['size']) == 'large') {
                $dashboardNumbers['large_qty'] += $row['quantity'];
            }

            if(strtolower($row['size']) == 'extra large') {
                $dashboardNumbers['xlarge_qty'] += $row['quantity'];
            }
        }
    }
}

$conn->close();

?>
