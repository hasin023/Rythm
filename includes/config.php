<?php

ob_start();

$timeZone = date_default_timezone_set("Asia/Dhaka");

$con = mysqli_connect("localhost", "root", "", "rythm");

if(mysqli_connect_errno()){
    echo "Failed to connect: " . mysqli_connect_errno();
}


?>