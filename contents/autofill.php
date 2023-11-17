<?php
include('../library/config.php');

$serial_number = $_GET['serial_number'];
$product_id = substr($serial_number, 0, 5);

$query = mysqli_query(initConnection(), "SELECT * FROM product where product_id= '$product_id'");
$sql = mysqli_fetch_array($query);

$data = array(
    'sector' => $sql['sector'],
    'family' => $sql['family'],
    'reference' => $sql['reference'],
);
echo json_encode($data);
