<?php
    session_start();
    session_destroy();
    echo("Logging out...");
    header('refresh:5;url=login.php');
?>