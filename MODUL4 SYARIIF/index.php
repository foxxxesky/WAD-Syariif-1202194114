<?php

require 'function.php';

if (isset($_SESSION['login'])) {
    $email = $_SESSION['login'];
    $user = mysqli_query($connect, "SELECT * FROM user WHERE email = '$email'");
    $data = mysqli_fetch_assoc($user);
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
    <title>EAD Travel</title>

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
    <?php
    if (isset($_SESSION["login"])) { 
        ?>
    <!-- Nav -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid col-10 pb-2 pt-2">
            <h4 class="fw-bold text-light">EAD Travel</h4>
            <div class="nav justify-content-end" id="nav">
                <div class="d-flex">
                    <a href="Bookings.php"><img src="img/cart.png" alt="" height="25px"></a>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdown" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <?= $data['nama'] ?> </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="Profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <?php
    if (isset($_COOKIE["notif"])) {
        echo "
        <div class='alert alert-success alert-dismissible fade show' role='alert' id='loginsuccess'>
        Berhasil Login
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        ";
        setcookie('notif', true, time() - 3200);
    }
    ?>
    <!-- alert -->


    <!-- Nav -->
    <?php } else { ?>
    <!-- Nav -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid col-10 pb-2 pt-2">
            <h4 class="fw-bold text-light">EAD Travel</h4>
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
    <?php } ?>
    <!-- Nav -->

    <!-- PHP -->
    <?php
    if (isset($_GET['id'])) {
        echo "
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                Berhasil Logout
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
    }
    
    
    // Danau
    if (isset($_POST["danau"])) {
        if (isset($_SESSION["login"])) {
            if (book_danau($_POST) > 0) {
                echo "
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    Berhasil Memesan Tiket
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
            } else {
                echo mysqli_error($connect);
            }
        } else {
            header('location: Login.php');
        }
    }
    
    // Pulau
    if (isset($_POST["pulau"])) {
        if (isset($_SESSION["login"])) {
            if (book_pulau($_POST) > 0) {
                echo "
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    Berhasil Memesan Tiket
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
            } else {
                echo mysqli_error($connect);
            }
        } else {
            header('location: Login.php');
        }
    }
    
    // Cave
    if (isset($_POST["cave"])) {
        if (isset($_SESSION["login"])) {
            if (book_cave($_POST) > 0) {
                echo "
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    Berhasil Memesan Tiket
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
            } else {
                echo mysqli_error($connect);
            }
        } else {
            header('location: Login.php');
        }
        
    }
    ?>
    <!-- PHP -->

    <!-- Content -->
    <div class="m-5 p-5 bg-success text-white rounded">
        <h3 class="fw-bold text-center">EAD Travel</h3>
    </div>

    <div class="ps-5 row row justify-content-evenly m-5">
        <!-- 1 -->
        <div class="col-4">
            <div class="card" style="width: 30rem;">
                <img src="img/danau.jpg" class="card-img-top" alt="" height="200px">
                <div class="card-body">
                    <h5 class="card-title">Danau Kelimutu</h5>
                    <p class="card-text pb-2">Danau Kelimutu sangat dikenal dengan danau tiga warna, merah, biru dan
                        putih,
                        yang bisa berubah-ubah warnanya tergantung gas, suhu dan mikroba yang ada di dalam danau.</p>
                    <br>
                    <hr>
                    <p><b>Rp. 4.500.000</b></p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#danau"
                        style="width: 100%;">Pesan
                        Tiket</button>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="danau">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Tanggal Perjalanan</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="" method="post">
                                <div class="mb-3">
                                    <input type="date" class="form-control" name="date">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="danau" class="btn btn-primary">Tambahkan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
        </div>

        <!-- 2 -->
        <div class="col-4">
            <div class="card" style="width: 30rem;">
                <img src="img/pulau.jpg" class="card-img-top" alt="" height="200px">
                <div class="card-body">
                    <h5 class="card-title">Pulau Komodo</h5>
                    <p class="card-text">Pulau Komodo adalah pulau utama di mana satwa Komodo - kadal terbesar di dunia
                        - hidup. Biasanya, kamu akan turun di sini untuk melihat langsung Komodo di habitat aslinya -
                        tentu saja ditemani seorang ranger yang akan memandumu sepanjang perjalanan.</p>
                    <hr>
                    <p><b>Rp. 7.500.000</b></p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pulau"
                        style="width: 100%;">Pesan
                        Tiket</button>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="pulau">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Tanggal Perjalanan</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="" method="post">
                                <div class="mb-3">
                                    <input type="date" class="form-control" name="date">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="pulau" class="btn btn-primary">Tambahkan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
        </div>

        <!-- 3 -->
        <div class="col-4">
            <div class="card" style="width: 30rem;">
                <img src="img/cave.jpg" class="card-img-top" alt="" height="200px">
                <div class="card-body">
                    <h5 class="card-title">Rangko Cave</h5>
                    <p class="card-text">Arsitektur karya alam pada goa bisa menjadi pemandangan yang tentunya
                        menyejukkan mata. Goa Rangko Labuan Bajo menjadi destinasi yang harus anda kunjungi untuk bisa
                        merasakan sendiri berenang di kolam alam layaknya kolam pribadi.</p>
                    <hr>
                    <p><b>Rp. 3.500.000</b></p>
                    <div class="text-center">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cave"
                            style="width: 100%;">Pesan
                            Tiket</button>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="cave">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Tanggal Perjalanan</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="" method="post">
                                <div class="mb-3">
                                    <input type="date" class="form-control" name="date">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="cave" class="btn btn-primary">Tambahkan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
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
        <div class="text-center pt-2 bottom-0" style="background-color: purple;">
            <?php }

        if ($color=="Blue") {
            ?>
            <div class="text-center pt-2 bottom-0" style="background-color: #79B4B7;">
                <?php }
    } else {
        ?>
                <div class="text-center pt-2 bottom-0" style="background-color: #79B4B7;">
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