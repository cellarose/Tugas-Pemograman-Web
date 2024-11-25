<?php
include "koneksi.php";
$query = "SELECT * FROM users";
$result = $koneksi->query($query);
if ($result->num_rows <= 0){
    $username = "admin";
    $nama_lengkap = "administrator";
    $password = "123";
    $level = "admin";
    $query = "INSERT INTO users (username,nama_lengkap,password,level) VALUES('$username','$nama_lengkap','$password','$level')";
    $koneksi->query($query);
    header('location:index.php');
}else{
    header('location:index.php');
}
