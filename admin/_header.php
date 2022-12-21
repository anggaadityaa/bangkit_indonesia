<?php 
    include '_config.php';
    include 'authentication.php';
    $id = $_SESSION["id"];
    $user = $_SESSION["nama"];

    $data = mysqli_query($con, "SELECT * FROM user");
    $row = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Native</title>
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Bangkitkan Semangat Indonesia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav d-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page_kategori.php">Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page_artikel.php">Artikel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page_galeri.php?id_user=<?= $row['id_user'] ?>">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page_user.php">User</a>
                </li>
            </ul>
        </div>

        <div class="navbar-nav d-flex align-items-center">
            <li>
                <span style="cursor: pointer;"><b><i><?= $user; ?></b></i></span>
            </li>
            <li>
                <a class="nav-link logout" href="logout.php" onclick="return confirm('Yakin ingin keluar?')"><img class="mr-2" src="../assets/img/avatar.png">Logout</a>
            </li>
        </div>
    </nav>
    <!-- ./navbar -->