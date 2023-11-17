<?php

$GLOBALS['SYSTEM_CONNECT_DB'] = true;
$GLOBALS['SYSTEM_USE_SESSION'] = true;
include('../boot.php');

$sesa = isset($_POST['sesa']) ? $_POST['sesa'] : '';
$badge = isset($_POST['badge']) ? $_POST['badge'] : '';
$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$hak_akses = 'user';
$level = 1;


if (isset($_POST['type'])) {
    if ($_POST['type'] == 'login') loginUser($sesa, $password);
    else createUser($sesa, $badge, $nama, $email, $password, $hak_akses, $level);
}

function authorizeSession($data)
{
    $_SESSION = array_merge($_SESSION, $data);
    header("location: ../contents/index.php");
}

function createUser($sesa, $badge, $nama, $email, $password, $hak_akses, $level)
{

    $query = sprintf("SELECT * FROM user WHERE `sesa`='%s' OR `email`='%s' LIMIT 1", $sesa, $email);
    $result = $GLOBALS['mysqli']->query($query);
    if ($result->num_rows > 0) {
        echo "Data gagal direcord, mohon coba kembali";
        header("location: register.php?failed=1");
    } else {
        $query = sprintf("INSERT INTO user (sesa, badge, nama, email, password, hak_akses, level) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')", $sesa, $badge, $nama, $email, password_hash($password, PASSWORD_DEFAULT), $hak_akses, $level);
        if ($GLOBALS['mysqli']->query($query) === TRUE) {
            echo "New record created successfully";
            header("location: register.php?success=1");
        } else {
            echo "Error: " . $GLOBALS['mysqli']->error;
        }
    }
}

function loginUser($sesa, $password)
{
    $query = sprintf("SELECT * FROM user WHERE `sesa`='%s' LIMIT 1", $sesa);
    $result = $GLOBALS['mysqli']->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            authorizeSession($row);
        } else {
            header("location: login.php?failed=1");
        }
    } else {
        header("location: login.php?failed=1");
    }
}
