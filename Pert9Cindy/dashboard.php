<?php
session_start();
if(!isset($_SESSION['login'])){
    header('location:index.php');
}else{
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Retail - Dashboard</title>
    </head>
    <body class="bg-secondary-subtle">
        <nav class="navbar navbar-expant-lg bg-body-tertiary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#">Retail Application</a>
                <class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavA1tMarkup" aria-controls="navbarNavA1tMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span> 
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                <a class="nav-link active" aria-current="page" href="? modul=home">home</a>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Barang</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="? modul=persedian">Persedian Barang</a></li>
                </ul>
                <a class="nav-link" href="?modul=penjualan">Penjualan</a>
                <a class="nav-link" href="?modul=pengguna">pengguna</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                        <?= $_SESSION['user'];?>               
                     </a>
                     <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="? modul=profile">Profile</a></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                     </ul>
                </li>
            </div>
        </nav>
        <main class="bg-white py-4 shadow-sm">
            <div class="container">
                <?php
                if(!isset($_GET['modul'])){
                    include "home.php";
                }else{
                    $modul = $_GET['modul'];
                    if($modul=="home"){
                        include "home.php";
                    }elseif($modul=="barang"){
                        include "modul/barang/index.php";
                    }elseif($modul=="persedian"){
                        include "modul/persediaan/index.php";
                    }elseif($modul=="penjualan"){
                        include "modul/penjualan/index.php";
                    }elseif($modul=="pengguna"){
                        include "modul/pengguna/index.php";
                    }elseif($modul=="profile"){
                        include "modul/profil/index.php";
                    }else{
                        include "home.php";
                    }
                    }
                    ?>
            </div>
        </main>
        </div>
    </body>
    </html>
    <?php
}
?>