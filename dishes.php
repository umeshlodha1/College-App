<?php

// Create a connection to the MySQL database
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "college";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT dname, dprice, dimg, dtype FROM dishes");
$stmt->execute();
$stmt->bind_result($title, $price, $image, $type);
$products = array();
while($stmt->fetch()){
    $temp = array();
    $temp['title'] = $title;
    $temp['price'] = $price;
    $temp['image'] = $image;
    $temp['type'] = $type;
    array_push($products, $temp); }
    echo json_encode($products);

?>
