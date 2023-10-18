<?php
    session_start();
    $con = mysqli_connect("localhost", "root", "", "market");
    if (!$con) die("Cannot connect to server");
?>