<?php
    include('../connect.php');
    session_start();
    if(isset($_SESSION['Email'])){
        unset($_SESSION['Email']);
        echo "<script>document.location='../index.php';</script>";
    }
    ?>