<?php
    session_start();
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    if (isset($_SESSION['giohang'][$id])) {
        unset($_SESSION['giohang'][$id]);
    }
    header("Location: giohang.php");
    exit(); 
?>