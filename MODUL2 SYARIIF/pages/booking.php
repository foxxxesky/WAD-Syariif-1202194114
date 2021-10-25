<?php

$user = "Syariif_1202194114";

$pictures = array(
    "nusantara" => "img/nusantara_hall.jpg",
    "garuda" => "img/garuda_hall.jpg",
    "gsg" => "img/gsg_hall.jpg"
);

$reservations = array("Nusantara Hall", "Garuda Hall", "Gedung Serba Guna");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>ESD Venue</title>
    <style>
        #hover:hover {
            background-color: white;
        }
    </style>
</head>
<body>
    <!-- Nav -->

    <ul class="nav justify-content-center bg-dark">
        <li class="nav-item">
        <a class="nav-link text-secondary" id="hover" href="../index.php">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-secondary" id="hover" href="#">Booking</a>
    </li>
    </ul>

    <!-- Nav -->

    <!-- Text -->

    <div class="row justify-content-center pt-2">
        <div class="bg-dark col-9 pt-2">
            <p class="text-light text-center">Reserve your venue now!</p>
        </div>
    </div>

    <!-- Text -->

    <!-- left pict -->
    
    <div class="row justify-content-center pt-3">
        <div class="col-5 pt-5">
            <div class="pt-5">
                <div class="pt-5">
                    <?php
                        if ($_GET != NULL) {
                            ?><img src="../<?= $_GET['pictures'] ?>" width="400px"><?php
                        } else {
                            ?><img src="../img/nusantara_hall.jpg" width="400px"><?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-4">
            <form action="mybooking.php" method="post">
                <div class="mb-3">
                    <label for="InputNama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?= $user?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="InputDate" class="form-label">Event Date</label>
                    <input type="date" class="form-control" name="date">
                </div>
                <div class="mb-3">
                    <label for="InputTime" class="form-label">Start Time</label>
                    <input type="time" class="form-control" name="time">
                </div>
                <div class="mb-3">
                    <label for="InputDuration" class="form-label">Duration (Hours)</label>
                    <input type="number" class="form-control" name="duration">
                </div>
                <div class="mb-3">
                    <label for="InputType" class="form-label">Building Type</label>
                    <select class="form-select" name="reservation" id="reservation">
                        <option value="" disable selected>--- Select Type ---</option>
                        <?php
                            if (isset($_GET['reservations'])) {            
                                if ($_GET['reservations'] == $reservations[0]) {
                                    ?><option selected="selected" value="Nusantara Hall" name="nusantara">Nusantara Hall</option><?php
                                } elseif ($_GET['reservations'] == $reservations[1]) {
                                    ?><option selected="selected" value="Garuda Hall" name="garuda">Garuda Hall</option><?php
                                } elseif ($_GET['reservations'] == $reservations[2]) {
                                    ?><option selected="selected" value="Gedung Serba Guna" name="gsg">Gedung Serba Guna</option><?php
                                } 
                            } else {
                                ?><option value="Nusantara Hall" name="nusantara">Nusantara Hall</option><?php
                                ?><option value="Garuda Hall" name="garuda">Garuda Hall</option><?php
                                ?><option value="Gedung Serba Guna" name="gsg">Gedung Serba Guna</option><?php
                            }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="Inputnohp" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="nohp">
                </div>
                <div class="mb-3 form-check">
                    <label for="addservice">Add Service(s)</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Catering" name="service[]">
                        <label class="form-check-label" for="flexCheckDefault">Catering / $700</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Decoration" name="service[]">
                        <label class="form-check-label" for="flexCheckDefault">Decoration / $450</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Sound System" name="service[]">
                        <label class="form-check-label" for="flexCheckDefault">Sound System / $250</label>
                    </div>
                </div>
                <div class="row text-center">
                    <button type="submit" class="btn btn-primary">Book</button>
                </div>
            </form>
        </div>
    </div>

    <!-- left pict -->
    
</body>

<footer>
    <div class="pt-5">
        <p class="text-center">Dibuat oleh Syariif Abdurrahman Bathik_1202194114</p>
    </div>
</footer>
</html>
    </div>
</footer>
</html>
