<?php
$GLOBALS['SYSTEM_CONNECT_DB'] = true;
$GLOBALS['SYSTEM_USE_SESSION'] = true;
include('../boot.php');


$sector = isset($_POST['sector']) ? $_POST['sector'] : '';
$family = isset($_POST['family']) ? $_POST['family'] : '';
$reference = isset($_POST['reference']) ? $_POST['reference'] : '';
$serial_number = isset($_POST['serial_number']) ? $_POST['serial_number'] : '';
$location = isset($_POST['location']) ? $_POST['location'] : '';



$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$badge = isset($_POST['badge']) ? $_POST['badge'] : '';
$sesa = isset($_POST['sesa']) ? $_POST['sesa'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$hak_akses = isset($_POST['hak_akses']) ? $_POST['hak_akses'] : '';
$date = date('y-m-d');

$product_id = isset($_POST['product_id']) ? $_POST['product_id'] : '';
// $sector = isset($_POST['sector']) ? $_POST['sector'] : '';
// $family = isset($_POST['family']) ? $_POST['family'] : '';
// $reference = isset($_POST['reference']) ? $_POST['reference'] : '';
$kode = isset($_POST['kode']) ? $_POST['kode'] : '';

$scrap_date = date('y-m-d');
$sesa_scrap = $_SESSION['sesa'];

if (isset($_POST['type'])) {
    if ($_POST['type'] == 'quarantineInsert') CreateDataQuarantine($sector, $family, $reference, $serial_number, $location, $date, $sesa);
    elseif ($_POST['type'] == 'userInsert') createDataUser($nama, $badge, $sesa, $email, $password, $hak_akses, $level);
    elseif ($_POST['type'] == 'productInsert') CreateDataProduct($product_id, $sector, $family, $reference, $kode);
    elseif ($_POST['type'] == 'scrapInsert')
        $query = sprintf("SELECT * FROM data_gudang WHERE `serial_number`='%s' LIMIT 1", $serial_number);
    $result = $GLOBALS['mysqli']->query($query);
    while ($row = $result->fetch_assoc()) {
        $sector = $row['sector'];
        $family = $row['family'];
        $reference = $row['reference'];
        $loc = $row['loc'];
        $date_insert = $row['date_insert'];
        $due_date = $row['due_date'];
        $sesa_insert = $row['sesa'];
    }
    createDataScrap($sector, $family, $reference, $serial_number, $loc, $date, $due_date, $sesa_insert, $scrap_date, $sesa_scrap);
}

// PROCESS INSERT DATA TO QUARANTINE
    function CreateDataQuarantine($sector, $family, $reference, $serial_number, $location, $date_insert,  $sesa)
    {
        
        $due_date = date('y-m-d', strtotime('+3 month'));
        $sesa = $_SESSION['sesa'];
        // $reference = sprintf("SELECT reference  FROM product WHERE `product_id`='%s' LIMIT 1", substr($serial_number, 1, 5));
        $remark = "Sample RTA";
        $status = "Quarantine";

        $query = sprintf("SELECT * FROM data_quarantine WHERE `serial_number`='%s' LIMIT 1", $serial_number);
        $result = $GLOBALS['mysqli']->query($query);
        if ($result->num_rows > 0) {
            header("location: Insert.php?insertRTA=1 & failedinsertRTA=1");
        } else {
            $query = sprintf("INSERT INTO data_quarantine (sector, family, reference, serial_number, loc,remark, date_insert, due_date, sesa_insert, status) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", $sector, $family, $reference, $serial_number, $location, $remark, $date_insert, $due_date, $sesa, $status);
            if ($GLOBALS['mysqli']->query($query) === TRUE) {
                echo "New record created successfully";
                header("location: Insert.php?insertRTA=1&successinsertRTA=1");
            } else {
                echo "Error: " . $GLOBALS['mysqli']->error;
            }
        }
    }
// END OF PROCESS INSERT DATA TO QUARANTINE

function CreateDataProduct($product_id, $sector, $family, $reference, $kode)
{
    $query = sprintf("SELECT * FROM product WHERE `product_id`='%s' LIMIT 1", $product_id);
    $result = $GLOBALS['mysqli']->query($query);
    if ($result->num_rows > 0) {
        header("location: Insert.php?insertProduct=1&failedInsertProduct=1");
    } else {
        $query = sprintf("INSERT INTO product (sector, family, reference, product_id, kode) VALUES ('%s', '%s', '%s', '%s', '%s')", $sector, $family, $reference, $product_id, $kode);
        if ($GLOBALS['mysqli']->query($query) === TRUE) {
            echo "New user created successfully";
            header("location: Insert.php?insertProduct=1&successInsertProduct=1");
        } else {
            echo "Error: " . $GLOBALS['mysqli']->error;
        }
    }
}

function CreateDataUser($nama, $badge, $sesa, $email, $password, $hak_akses, $level)
{
    if ($_POST['hak_akses'] == 'user') {
        $level = 1;
    } else {
        $level = 2;
    }
    $query = sprintf("SELECT * FROM user WHERE `sesa`='%s' LIMIT 1", $sesa);
    $result = $GLOBALS['mysqli']->query($query);
    if ($result->num_rows > 0) {
        header("location: Insert.php?insertUser=1&failedinsertUser=1");
    } else {
        $query = sprintf("INSERT INTO user (nama, badge, sesa, email, password, hak_akses, level) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')", $nama, $badge, $sesa, $email, password_hash($password, PASSWORD_DEFAULT), $hak_akses, $level);
        if ($GLOBALS['mysqli']->query($query) === TRUE) {
            echo "New user created successfully";
            header("location: Insert.php?insertUser=1&successinsertUser=1");
        } else {
            echo "Error: " . $GLOBALS['mysqli']->error;
        }
    }
}

function CreateDataScrap($sector, $family, $reference, $serial_number, $loc, $date_insert, $due_date, $sesa_insert, $scrap_date, $sesa_scrap)
{
    $serial = substr($serial_number, 4, 10);
    $query = sprintf("SELECT * FROM data_gudang WHERE `serial_number` LIKE '%$serial'");
    $result = $GLOBALS['mysqli']->query($query);
    if ($result->num_rows > 0) {
        $query = sprintf("INSERT INTO scrap (sector, family, reference, serial_number, loc, date_insert, due_date, sesa_insert, scrap_date, sesa_scrap) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", $sector, $family, $reference, $serial_number, $loc, $date_insert, $due_date, $sesa_insert, $scrap_date, $sesa_scrap);
        if ($GLOBALS['mysqli']->query($query) === TRUE) {
            $query1 = sprintf("DELETE FROM data_gudang WHERE `serial_number` LIKE '%$serial'" );
            $GLOBALS['mysqli']->query($query1);
            echo "New record created successfully";
            header("location: Insert.php?insertScrap=1&successinsertScrap=1");
        } else {
            echo "Error: " . $GLOBALS['mysqli']->error;
        }
    } else {
        header("location: Insert.php?insertScrap=1 & failedinsertScrap=1");
    }
}
