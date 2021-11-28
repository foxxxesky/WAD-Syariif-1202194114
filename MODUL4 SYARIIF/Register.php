<?php

require 'function.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>EAD Travel | Register</title>

    <style>
    body {
        background-color: #CDF2CA;
        overflow-x: hidden;
    }

    nav {
        background-color: #79B4B7;
    }
    </style>
</head>

<body>
    <!-- Nav -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid col-10 pb-2 pt-2">
            <a href="index.php" style="text-decoration: none;">
                <h4 class="fw-bold text-light">EAD Travel</h4>
            </a>
            <div class="nav justify-content-end" id="nav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item pe-3">
                        <a href="Register.php" class="btn btn-light btn-md">Register</a>
                    </li>
                    <li class="nav-item">
                        <a href="Login.php" class="btn btn-light btn-md">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Nav -->

    <!-- PHP -->
    <?php
    if (isset($_POST["register"])) {
        if (register($_POST) > 0) {
            header("location: Login.php?id='berhasil'");
        } else {
            echo mysqli_error($connect);
        }
    }
    ?>
    <!-- PHP -->

    <!-- Content -->
    <div class="row justify-content-center">
        <div class="col-4 m-3">
            <div class="card-body bg-white" style="border-radius: 10px;">
                <h5 class="card-title text-center pb-2">Register</h5>
                <hr>
                <form action="" method="POST">
                    <!-- Nama -->
                    <div class="mb-3">
                        <label for="Nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap"
                            required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="Email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukkan Alamat Email"
                            required>
                    </div>

                    <!-- Nomor HP -->
                    <div class="mb-3">
                        <label for="No_HP" class="form-label">Nomor Handphone</label>
                        <input type="text" class="form-control" name="nohp" placeholder="Masukkan Nomor Handphone"
                            required>
                    </div>

                    <!-- Kata Sandi -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input type="password" class="form-control" name="password" placeholder="Kata Sandi Anda"
                            required>
                    </div>

                    <!-- Konfirm Kata Sandi -->
                    <div class="mb-3">
                        <label for="confirmPasssword" class="form-label">Konfirmasi Kata Sandi</label>
                        <input type="password" class="form-control" name="confirm"
                            placeholder="Konfirmasi Kata Sandi Anda" required>
                    </div>
                    <div class="text-center pt-4">
                        <button type="submit" name="register" class="btn btn-primary">Daftar</button>
                    </div>
                </form>

                <!-- Login -->
                <p class="text-center pt-3">Anda Sudah Punya Akun? <a href="Login.php">Login</a></p>
            </div>
        </div>
    </div>
    <!-- Content -->



    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- Script -->
</body>
<footer>
    <div class="row justify-content-center">
        <div class="text-center pt-2 fixed-bottom bottom-0" style="background-color: #79B4B7;">
            <p class="text-center text-light">&copy; Copyright <a class="text-light" href="" data-bs-toggle="modal"
                    data-bs-target="#myModal">Syariif_1202194114</a></p>
        </div>

        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Dibuat Oleh</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <table>
                            <tr>
                                <td class="pe-4">Nama</td>
                                <td>:</td>
                                <td>Syariif Abdurrahman Bathik</td>
                            </tr>
                            <br>
                            <tr>
                                <td class="pe-4">NIM</td>
                                <td>:</td>
                                <td>1202194114</td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>
</footer>

</html>