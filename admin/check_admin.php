<?php
session_start();

// Check if user is logged in and is an admin
if (!isset($_SESSION['admin_id']) || $_SESSION['is_admin'] !== true) {
    header("Location: ../login.php");
    exit();
}
?> 