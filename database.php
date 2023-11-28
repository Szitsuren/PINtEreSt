<?php

$conn = mysqli_connect("localhost", "root", "", "users");

if(!$conn){
    die('Database connection failed!'. mysqli_connect_error());
}

?>