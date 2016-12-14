<?php
include 'db.php';

$jsonResponse = ['status' => false];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die($jsonResponse['msg'] = 'Connection Error');
}

$sql = [];
$a_bind_params = [];
$a_param_type = [];

// set parameters
if ($_GET['type']) {
    $sql[] = " i.type = ? ";
    $a_bind_params[] = $_GET['type'];
    $a_param_type[] = 'i';
}
if ($_GET['brand']) {
    $sql[] = " i.brand = ? ";
    $a_bind_params[] = $_GET['brand'];
    $a_param_type[] = 'i';
}
if ($_GET['colour']) {
    $theColour = $_GET['colour'];
    $sql[] = " colour = $theColour ";
}
if ($_GET['gender']) {
    $theGender = $_GET['gender'];
    $sql[] = " gender = $theGender ";
}
if ($_GET['size']) {
    $theSize = $_GET['size'];
    $sql[] = " size = $theSize ";
}

$query = "SELECT t.name AS shirt_type,
                b.name AS brand_name,
                i.gender,
                i.quantity,
                i.size,
                c.name AS colour
                FROM inventory i
                JOIN brand b ON i.brand=b.id
                JOIN type t ON i.type=t.id
                JOIN colour c ON i.colour=c.id";

if (!empty($sql)) {
     $query .= ' WHERE ' . implode(' AND ', $sql);
}

$stmt = $conn->prepare($query);
$param_type = implode('', $a_param_type);
$a_params = [];
$a_params[] = &$param_type;

foreach ($sql as $i => $sqlPart) {
    $a_params[] = &$a_bind_params[$i];
}

call_user_func_array(array($stmt, 'bind_param'), $a_params);

$filterResult = $stmt->execute();//returns true/false

if ($filterResult) {
    $json = [];
    $result = $stmt->get_result();

    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $json[] = $row;
    }

    if (!empty($json)) {
        $jsonResponse['status'] = true;
        $jsonResponse['payload'] = $json;
    }

    else {
        $jsonResponse['msg'] = 'No results found';
    }
} else {
    $jsonResponse['msg'] = 'SQL parse failed';
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($jsonResponse);

?>
