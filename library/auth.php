<?php
session_start();

const LEVEL_USER = 1;
const LEVEL_ADMIN = 2;

function checkAuth($requiredLevel)
{
    if (!isset($_SESSION['sesa'])) header("location: " . base('../auth/login.php'));
    else if ($requiredLevel < $_SESSION['level']) {
        header("location: " . base('401.php'), true, 401);
    }
}
