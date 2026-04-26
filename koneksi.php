<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "velnorajogja_db";

$konek = mysqli_connect($hostname, $username, $password, $database);

if(!$konek){
    die("Koneksi gagal : ". mysqli_connect());
}
?>
