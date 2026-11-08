<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_adminlte";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("koneksi databse gagal: " . mysqli_connect_error());
}
?>