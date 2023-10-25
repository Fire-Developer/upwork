<?php
session_start();
if(isset($_SESSION['id'])){
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    session_destroy();
    echo "<script>window.location.href='index.php';</script>";
    
}

?>