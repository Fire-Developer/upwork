<?php
session_start();
session_destroy();
header('location:Administrator_login.php');
?>