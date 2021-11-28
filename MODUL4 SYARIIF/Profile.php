<?php

require 'function.php';

if (!isset($_SESSION["login"])) {
    header("location: index.php");
    exit;
}

if (isset($_SESSION['login'])) {
    // get email
    $email = $_SESSION['login'];
    $user = mysqli_query($connect, "SELECT * FROM user WHERE email = '$email'");
    $user_data = mysqli_fetch_assoc($user);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>EAD Travel | Profile</title>

    <style>
    <?php if (isset($_COOKIE["color"])) {
        // get data
        $color=$_COOKIE["color"];

        if ($color=="Purple") {
            ?>body {
                background-color: #CDF2CA;
                overflow-x: hidden;
            }

            nav {
                background-color: purple;
            }

            <?php
        }

        if ($color=="Blue") {
            ?>body {
                background-color: #CDF2CA;
                overflow-x: hidden;
            }

            nav {
                background-color: #79B4B7;
            }

            <?php
        }

    }

    else {
        ?>body {
            background-color: #CDF2CA;
            overflow-x: hidden;
        }

        nav {
            background-color: #79B4B7;
        }

        <?php
    }

    ?>
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
                <div class="d-flex">
                    <a href="Bookings.php"><img src="img/cart.png" alt="" height="25px"></a>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdown" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <?= $user_data['nama'] ?> </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="Profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Nav -->

    <!-- PHP -->
    <?php
    
    if (isset($_SESSION['login'])) {
        if (isset($_POST["ubah"])) {
            if (update($_POST) > 0) {
                echo "
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    Berhasil Update Profile
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
    
                $user = mysqli_query($connect, "SELECT * FROM user WHERE email = '$email'");
                $user_data = mysqli_fetch_assoc($user);
    
            } else {
                echo mysqli_error($connect);
            }
        }
    }
    ?>
    <!-- PHP -->

    <!-- Content -->
    <div class="row justify-content-center">
        <div class="col-5 m-5">
            <div class="card-body bg-white" style="border-radius: 10px;">
                <h5 class="card-title text-center pb-3">Login</h5>
                <form action="" method="POST">
                    <table>
                        <!-- Email -->
                        <tr>
                            <td><label for="Email" class="form-label">Email</label></td>
                            <td style="width: 100%;"><input type="email" class="form-control" name="email"
                                    value="<?= $user_data['email'] ?>" readonly>
                            </td>
                        </tr>

                        <!-- Nama -->
                        <tr>
                            <td><label for="Nama" class="form-label">Nama</label></td>
                            <td style="width: 100%;"><input type="text" class="form-control" name="nama"
                                    value="<?= $user_data['nama'] ?>">
                            </td>
                        </tr>

                        <!-- Nomor HP -->
                        <tr>
                            <td style="padding-right: 5rem;"><label for="No_HP" class="form-label">Nomor
                                    Handphone</label></td>
                            <td style="width: 100%;"><input type="text" class="form-control" name="nohp"
                                    value="<?= $user_data['no_hp'] ?>"></td>
                        </tr>
                        <tr>
                            <td>
                                <hr>
                            </td>
                            <td>
                                <hr>
                            </td>
                        </tr>

                        <!-- Password -->
                        <tr>
                            <td><label for="password" class="form-label">Kata Sandi</label></td>
                            <td><input type="password" class="form-control" name="password"></td>
                        </tr>

                        <!-- Konfirmasi Password -->
                        <tr>
                            <td><label for="confirmPasssword" class="form-label">Konfirmasi Kata Sandi</label></td>
                            <td><input type="password" class="form-control" name="confirm"></td>
                        </tr>

                        <!-- Nav Bar -->
                        <tr>
                            <td><label for="navbar" class="form-label">Warna Navbar</label></td>
                            <td><select class="form-select" name="navbar" id="navbar">
                                    <option value="Blue" name="blue">Blue</option>
                                    <option value="Purple" name="purple">Purple</option>
                                </select></td>
                        </tr>
                    </table>

                    <!-- Button -->
                    <div class="text-end pt-4">
                        <a href="index.php" class="btn btn-warning">Cancel</a>
                        <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
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
        <?php
    if (isset($_COOKIE["color"])) {
        // get data
        $color = $_COOKIE["color"];

        if ($color=="Purple") {
            ?>
        <div class="text-center pt-2 fixed-bottom bottom-0" style="background-color: purple;">
            <?php }

        if ($color=="Blue") {
            ?>
            <div class="text-center pt-2 fixed-bottom bottom-0" style="background-color: #79B4B7;">
                <?php }
    } else {
        ?>
                <div class="text-center pt-2 fixed-bottom bottom-0" style="background-color: #79B4B7;">
                    <?php }
    ?>
                    <p class="text-center text-light">&copy; Copyright <a class="text-light" href=""
                            data-bs-toggle="modal" data-bs-target="#myModal">Syariif_1202194114</a></p>
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