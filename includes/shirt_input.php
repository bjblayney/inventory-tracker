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

if ($_POST['colour'] < 0) {
    $sqlNewColour = "INSERT INTO colour(name) VALUES ('" . $_POST['newShirtColour'] . "')";
    $conn->query($sqlNewColour);
    $insertColour = $conn->insert_id;
}

$shirtType = (!empty($insertId)) ? $insertId : $_POST['shirtType'];
$brand = (!empty($insertBrand)) ? $insertBrand : $_POST['brand'];
$colour = (!empty($insertColour)) ? $insertColour : $_POST['colour'];

// set parameters
$theType = $shirtType;
$theBrand = $brand;
$gender = $_POST['gender'];
$quantity = $_POST['quantity'];
$size = $_POST['size'];
$theColour = $colour;
$cost = $_POST['totalCost'];
$date = $_POST['date'];

// prepare, bind, execute
$addInventory = $conn->prepare("INSERT INTO inventory(type,brand,gender,quantity,size,colour,cost,date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$addInventory->bind_param("iisisiis", $theType, $theBrand, $gender, $quantity, $size, $theColour, $cost, $date);
$response = $addInventory->execute();//returns true/false

if ($response) {
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
