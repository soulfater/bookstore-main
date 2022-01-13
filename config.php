<?php

//Csatlakozas az adatbazishoz

$server = "localhost";
$user = "root";
$pass = "";
$database = "bookstore";

$conn = mysqli_connect($server, $user, $pass, $database);

if(!$conn) {
    die("<script>alert('Failed to connect')</script>");
}