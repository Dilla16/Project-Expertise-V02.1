<?php

function initConnection()
{
    $conn = new mysqli("localhost", "root", "", "gudang_expertise");
    // Check connection
    if ($conn->connect_errno) {
        echo "Failed to connect to MySQL: " . $conn->connect_error;
        exit();
    }
    return $conn;
}
