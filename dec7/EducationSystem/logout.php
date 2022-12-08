<?php
    include './data/config.php';
    session_unset();
    session_destroy();
    header("Location: ".$baseName.'index.php');
    exit();
?>