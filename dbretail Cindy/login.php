<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include "koneksi.php";

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $mysqli->query($query);

    session_start();
    $row = $result->fetch_assoc();
    $check = $result->num_rows;

    if ($check > 0) {   
        $_SESSION['login'] = true;
        $_SESSION['nama_lengkap'] = $row['nama_lengkap'];
        header('location: dashboard.php');
    } else {
        $_SESSION['pesan'] = "Your username or password is incorrect!!!";
        header('location: index.php');
    }
} else {
    header('location: index.php');
}

?>