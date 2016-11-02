<?php

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$allShirts = "SELECT t.name AS shirt_type,b.name AS brand_name,i.gender,i.quantity,i.size FROM inventory i JOIN brand b ON i.brand=b.id JOIN type t ON i.type=t.id";
$allShirtsResults = $conn->query($allShirts);

$conn->close();

?>
