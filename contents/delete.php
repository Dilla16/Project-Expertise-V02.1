<?php
$GLOBALS['SYSTEM_CONNECT_DB'] = true;
$GLOBALS['SYSTEM_USE_SESSION'] = true;
include('../boot.php');

// DELETE USER
if (isset($_GET['userDelete'])) {
    $query = sprintf("DELETE FROM user WHERE `sesa`='%s'", $_GET['sesa']);
    if ($GLOBALS['mysqli']->query($query) === TRUE) {
        header("location: View.php?viewUser=1&successDeleted=1");
    } else {
        echo "Error: " . $GLOBALS['mysqli']->error;
    }

// DELETE DATA QUARANTINE
} elseif (isset($_GET['quarantineDelete'])) {
    $query = sprintf("DELETE FROM data_quarantine WHERE `serial_number`='%s'", $_GET['serial_number']);
    if ($GLOBALS['mysqli']->query($query) === TRUE) {
        header("location: View.php?viewRTA=1&successDeleted=1");
    } else {
        echo "Error: " . $GLOBALS['mysqli']->error;
    }

// DELETE SCRAP
} elseif (isset($_GET['scrapDelete'])) {
    $query = sprintf("DELETE FROM scrap WHERE `serial_number`='%s'", $_GET['serial_number']);
    if ($GLOBALS['mysqli']->query($query) === TRUE) {
        header("location: View.php?viewScrap=1&successDeleted=1");
    } else {
        echo "Error: " . $GLOBALS['mysqli']->error;
    }

// DELETE PRODUCT
} elseif (isset($_GET['productDelete'])) {
    $query = sprintf("DELETE FROM product WHERE `product_id`='%s'", $_GET['product_id']);
    if ($GLOBALS['mysqli']->query($query) === TRUE) {
        header("location: View.php?viewProduct=1&successDeleted=1");
    } else {
        echo "Error: " . $GLOBALS['mysqli']->error;
    }
}
