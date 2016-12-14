<?php

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$allTypes = "SELECT id, name FROM type";
$resultTypes = $conn->query($allTypes);

$allBrands = "SELECT id, name FROM brand";
$resultBrands = $conn->query($allBrands);

$allColours = "SELECT id, name FROM colour";
$resultColours = $conn->query($allColours);

$conn->close();

?>
