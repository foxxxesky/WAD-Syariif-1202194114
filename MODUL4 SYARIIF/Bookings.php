<?php

require 'function.php';

if (!isset($_SESSION["login"])) {
    header("location: index.php");
    exit;
}

if (isset($_SESSION['login'])) {
    // get email
    $email = $_SESSION['login'];
    $user = mysqli_query($connect, "SELECT id, nama FROM user WHERE email = '$email'");
    $user_data = mysqli_fetch_assoc($user);

    // get id
    $id = $user_data['id'];
    $booking = mysqli_query($connect, "SELECT * FROM booking WHERE user_id = $id");
    $datas = mysqli_fetch_all($booking);
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
    <title>EAD Travel | Booking</title>

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
        // delete
        if (isset($_POST["delete"])) {
            if (delete($_POST) > 0) {
                echo "
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    Berhasil Dihapus
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
                $booking = mysqli_query($connect, "SELECT * FROM booking WHERE user_id = $id");
                $datas = mysqli_fetch_all($booking);
                
            } else {
                echo mysqli_error($connect);
            }
        }
    }
    ?>
    <!-- PHP -->

    <!-- Content -->
    <div class="row justify-content-center">
        <div class="col-10 m-5">
            <div class="card-body bg-white" style="border-radius: 10px;">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Tempat</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Tanggal Perjalanan</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($datas as $data) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $data[2] ?></td>
                            <td><?= $data[3] ?></td>
                            <td><?= $data[5] ?></td>
                            <td><?= 'Rp '. number_format($data[4]) ?></td>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?= $data[0] ?>">
                                <td>
                                    <button type="submit" name="delete" class="btn btn-danger">Hapus</button>
                                </td>
                            </form>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                        <tr>
                            <th scope="row" colspan="4">Total</th>
                            <?php
                            $total = 0;
                            foreach ($datas as $data) {
                                $total += $data[4];
                            } ?>
                            <th scope="row"><?= 'Rp '. number_format($total) ?></th>

                        </tr>

                    </tbody>
                </table>
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