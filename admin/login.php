<?php
    session_start();
    require '_config.php';

    if (isset($_SESSION["login"])) {
        header("Location: index.php");
        exit;
    }

    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($con, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");

        // cek username
        if (mysqli_num_rows($result) === 1) {
            // cek password
            $row = mysqli_fetch_assoc($result);
            // set session
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id_user"];
            $_SESSION["nama"] = $row["nama_user"];
            echo "<script> alert ('Berhasil Login!');
                    window.location.href='index.php'
                  </script>";
            exit;
        }
    $error = true;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Bangkitkan Semangat Indonesia</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Impact - v1.0.0
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <style>
        .btn-loginn {
            width: 100%;
            height: 40px;
            border-radius: 10px;
            border: none;
            background-color: #446CB3;
            font: 16px Nunito Sans, sans-serif;
        }

        .glitch {
            position: relative;
            cursor: pointer;
        }

        .glitch::before, .glitch::after {
            content: 'Bangkitkan Semangat Indonesia';
            display: block;
            position: absolute;
            top: 0px;
            left: 0px;
        } 

        .glitch:hover::before {
            animation: glitch 0.3s linear 6;
            color: black;
            z-index: -2;
        }

        .glitch:hover::after {
            animation: glitch 0.3s linear 6 reverse;
            color: #2196f3;
            z-index: -1;
        }

        @keyframes glitch {
            0% {
                top: 0;
                left: 0;
            }
            20% {
                top: -5px;
                left: -5px;
            }
            40% {
                top: 5px;
                left: 5px;
            }
            60% {
                top: -5px;
                left: 5px;
            }
            80% {
                top: 5px;
                left: -5px;
            }
            100% {
                top: 0;
                left: 0;
            }
        }
    </style>
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">
        <div class="container position-relative">
            <div class="row gy-5" data-aos="fade-in">
                <div class="col-lg-6 order-1 order-lg-1">
                    <a href="../index.php">
                        <img src="../assets/img/bela-negara.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
                    </a>
                </div>
                <div class="col-lg-6 order-2 order-lg-2 d-flex flex-column justify-content-center text-center text-lg-start">
                    <div>
                        <h2 class="glitch">Bangkitkan Semangat Indonesia</h2><br>
                    </div>
                    
                    <?php if (isset($error)) : ?>
                        <p style="color: white; font-style: italic;">Maaf, Username / Password Anda salah. Harap periksa kembali.</p>
                    <?php endif; ?>

                    <form action="" method="POST" style="padding-right: 230px;">
                        <label class="username text-white" for="username">Username</label><br>
                        <input class="form-control my-1" type="text" id="username" name="username" autocomplete="off" placeholder="Username">
                        <label class="password text-white" for="password">Password</label><br>
                        <input class="form-control my-1" type="password" id="password" name="password" autocomplete="off" placeholder="Password">
                        <button class="btn-loginn mt-2 text-white" type="submit" name="login">Login</button>
                    </form>
                </div>
            </div>
            <br><br><br><br><br><br>
        </div>
    </section>
    <!-- End Hero Section -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
</body>
</html>