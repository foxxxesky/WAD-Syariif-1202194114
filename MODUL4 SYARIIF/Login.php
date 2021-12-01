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
    <title>EAD Travel | Login</title>
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
    // alert registrasi sukses
    if (isset($_GET['id'])) {
        echo "
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                Registrasi Berhasil Silahkan Login
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
    }

    if (isset($_POST["login"])) {
        // Get Data
        $email = $_POST["email"];
        $pwd = $_POST["password"];
    
        $user = mysqli_query($connect, "SELECT * FROM user WHERE email = '$email'");
    
        //Cek Email
        if (mysqli_num_rows($user) === 1) {
            
            // Cek Password
            $data = mysqli_fetch_assoc($user);
            if (password_verify($pwd, $data["pwd"])) {
                // Set Session
                $_SESSION["login"] = $email;
                setcookie('notif', true, time() + 60);
    
                // Cek Remember ME
                if (isset($_POST["rememberme"])) {
                    // create cookie
                    setcookie('email', $email, time() + 1200);
                    setcookie('password', $pwd, time() + 1200);
                    setcookie('notif', true, time() + 60);
                }
    
                header("location: index.php");
                exit;
    
            } else {
                echo "
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                Gagal Login Password Salah!
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
            }
        } else {
            echo "
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                Gagal Login Email Tidak Terdaftar!
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
    
    }
    ?>
    <!-- PHP -->

    <!-- Content -->
    <div class="row justify-content-center">
        <div class="col-4 m-5">
            <div class="card-body bg-white" style="border-radius: 10px;">
                <h5 class="card-title text-center pb-2">Login</h5>
                <hr>
                <?php
                if (isset($_COOKIE["email"]) && (isset($_COOKIE["password"]))) {
                    // Get Data
                    $email = $_COOKIE["email"];
                    $pwd = $_COOKIE["password"];
                    ?>
                <form action="" method="POST">
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="Email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="<?= $email ?>" required>
                    </div>

                    <!-- Kata Sandi -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input type="password" class="form-control" name="password" value="<?= $pwd ?>" required>
                    </div>

                    <!-- Remember Me -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="rememberme" name="rememberme">
                        <label class="form-check-label" for="rememberme">
                            Remember Me
                        </label>
                    </div>

                    <!-- Button -->
                    <div class="text-center pt-4">
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                    </div>
                </form>
                <?php } else {
                    ?>
                <form action="" method="POST">
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="Email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukkan Alamat Email"
                            required>
                    </div>

                    <!-- Kata Sandi -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input type="password" class="form-control" name="password" placeholder="Kata Sandi Anda"
                            required>
                    </div>

                    <!-- Remember Me -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="rememberme" name="rememberme">
                        <label class="form-check-label" for="rememberme">
                            Remember Me
                        </label>
                    </div>

                    <!-- Button -->
                    <div class="text-center pt-4">
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                    </div>
                </form>
                <?php } ?>

                <!-- Registrasi -->
                <p class="text-center pt-3">Anda Belum Punya Akun? <a href="Register.php">Register</a></p>
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