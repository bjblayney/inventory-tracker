<?php
include 'db.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    // ----- do something on the front end here
    die("Connection failed: " . $conn->connect_error);
}

$insertId = null;
$insertBrand = null;

if ($_POST['shirtType'] < 0) {
    $sqlNewType = "INSERT INTO type(name) VALUES ('" . $_POST['newShirtType'] . "')";
    $conn->query($sqlNewType);
    $insertId = $conn->insert_id;
}

if ($_POST['brand'] < 0) {
    $sqlNewBrand = "INSERT INTO brand(name) VALUES ('" . $_POST['newShirtBrand'] . "')";
    $conn->query($sqlNewBrand);
    $insertBrand = $conn->insert_id;
}

$shirtType = (!empty($insertId)) ? $insertId : $_POST['shirtType'];
$brand = (!empty($insertBrand)) ? $insertBrand : $_POST['brand'];

// prepare and bind
$addInventory = $conn->prepare("INSERT INTO inventory(type,brand,gender,quantity,size,cost,date) VALUES (?, ?, ?, ?, ?, ?, ?)");
$addInventory->bind_param("iisisis", $theType, $theBrand, $gender, $quantity, $size, $cost, $date);

// set parameters
$theType = $shirtType;
$theBrand = $brand;
$gender = $_POST['gender'];
$quantity = $_POST['quantity'];
$size = $_POST['size'];
$cost = $_POST['totalCost'];
$date = $_POST['date'];

// and execute
$addInventory->execute();

if ($conn->query($addInventory) === TRUE) {
    //echo "New record created successfully";
    $response_array['status'] = 'success';
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
    // ----- do something on the front end here
    $response_array['status'] = 'error';
}

$addInventory->close();
$conn->close();

?>
