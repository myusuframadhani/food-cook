<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "resep";

$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
    die(mysqli_connect_error());
}
