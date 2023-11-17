<?php
$GLOBALS['SYSTEM_CONNECT_DB'] = true;
$GLOBALS['SYSTEM_USE_SESSION'] = true;
include('../boot.php');




if (isset($_GET['quarantineEdit'])) {
    $sector = isset($_POST['sector']) ? $_POST['sector'] : '';
    $family = isset($_POST['family']) ? $_POST['family'] : '';
    $reference = isset($_POST['reference']) ? $_POST['reference'] : '';
    $loc = isset($_POST['loc']) ? $_POST['loc'] : '';
    $date_insert = isset($_POST['date_insert']) ? $_POST['date_insert'] : '';
    $due_date = date('y-m-d', strtotime('+3 month', strtotime($_POST['date_insert'])));
    $sesa = $_SESSION['sesa'];

    $query = sprintf("UPDATE data_gudang SET sector='%s', family='%s', reference='%s', loc='%s', date_insert='%s', due_date='%s', sesa='%s' WHERE `serial_number`='%s'", $sector, $family, $reference, $loc, $date_insert, $due_date, $sesa, $_GET['serial_number']);
    if ($GLOBALS['mysqli']->query($query) === TRUE) {
        echo "Record edited successfully";
        header("location: edit.php?quarantineEdit=1&quarantineSuccess=1&serial_number=" . $_GET['serial_number']);
    } else {
        echo "Error: " . $GLOBALS['mysqli']->error;
    }
} elseif (isset($_GET['userEdit'])) {
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $badge = isset($_POST['badge']) ? $_POST['badge'] : '';
    $sesa = isset($_POST['sesa']) ? $_POST['sesa'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $hak_akses = isset($_POST['hak_akses']) ? $_POST['hak_akses'] : '';
    if ($_POST['hak_akses'] == 'user') {
        $level = 1;
    } else {
        $level = 2;
    }
    $query = sprintf("UPDATE user SET nama= '%s', badge='%s', email='%s', password='%s', hak_akses='%s', level='%s'  WHERE `sesa`='%s'", $nama, $badge, $email, $password, $hak_akses, $level, $_GET['sesa']);
    if ($GLOBALS['mysqli']->query($query) === TRUE) {
        echo "Record edited successfully";
        header("location: edit.php?userEdit=1&userSuccess=1&sesa=" . $_GET['sesa']);
    } else {
        echo "Error: " . $GLOBALS['mysqli']->error;
    }
}
