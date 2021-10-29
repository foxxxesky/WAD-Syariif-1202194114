<?php

$pictures = array(
    "nusantara" => "img/nusantara_hall.jpg",
    "garuda" => "img/garuda_hall.jpg",
    "gsg" => "img/gsg_hall.jpg"
);

$reservations = array("Nusantara Hall", "Garuda Hall", "Gedung Serba Guna");

$price = array("nusantara" => 2000, "garuda" => 1000, "gsg" => 500);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
            <a class="nav-link text-secondary" id="hover" href="#">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-secondary" id="hover" href="pages/booking.php">Booking</a>
        </li>
    </ul>

    <!-- Nav -->

    <!-- Text -->

    <div class="pt-2 pb-2">
        <h3 class="text-center">WELCOME TO ESD VENUE RESERVATION</h3>
    </div>

    <div class="row justify-content-center">
        <div class="bg-dark col-9 pt-2">
            <p class="text-light text-center">Find your best deal for your event, here!</p>
        </div>
    </div>

    <!-- Text -->

    <!-- Reservation -->

    <div class="row justify-content-center pt-3 pb-5">
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <img src="<?= $pictures['nusantara'] ?>" class="card-img-top" alt="nusantara">
                <div class="card-body">
                    <h5 class="card-title"><?= $reservations[0] ?></h5>
                    <p class="card-text text-secondary"><?= "$" . $price['nusantara'] . " / Hour" ?></p>
                    <p class="card-text text-secondary">5000 Capacity</p>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item text-success">Free Parking</li>
                    <li class="list-group-item text-success">Full AC</li>
                    <li class="list-group-item text-success">Cleaning Service</li>
                    <li class="list-group-item text-success">Covid-19 Health Protocol</li>
                </ul>
                <div class="card-body text-center">
                    <a href="pages/booking.php?pictures=<?= $pictures['nusantara'] ?>&reservations=<?= $reservations[0] ?>"
                        class="btn btn-primary">Book now</a>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <img src="<?= $pictures['garuda'] ?>" class="card-img-top" alt="garuda">
                <div class="card-body">
                    <h5 class="card-title"><?= $reservations[1] ?></h5>
                    <p class="card-text text-secondary"><?= "$" . $price['garuda'] . " / Hour" ?></p>
                    <p class="card-text text-secondary">2000 Capacity</p>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item text-success">Free Parking</li>
                    <li class="list-group-item text-success">Full AC</li>
                    <li class="list-group-item text-danger">No Cleaning Service</li>
                    <li class="list-group-item text-success">Covid-19 Health Protocol</li>
                </ul>
                <div class="card-body text-center">
                    <a href="pages/booking.php?pictures=<?= $pictures['garuda'] ?>&reservations<?= $reservations[1] ?>"
                        class="btn btn-primary">Book now</a>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <img src="<?= $pictures['gsg'] ?>" class="card-img-top" alt="gsg">
                <div class="card-body">
                    <h5 class="card-title"><?= $reservations[2] ?></h5>
                    <p class="card-text text-secondary"><?= "$" . $price['gsg'] . " / Hour" ?></p>
                    <p class="card-text text-secondary">500 Capacity</p>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item text-danger">No Free Parking</li>
                    <li class="list-group-item text-danger">No Full AC</li>
                    <li class="list-group-item text-danger">No Cleaning Service</li>
                    <li class="list-group-item text-success">Covid-19 Health Protocol</li>
                </ul>
                <div class="card-body text-center">
                    <a href="pages/booking.php?pictures=<?= $pictures['gsg'] ?>&reservations<?= $reservations[2] ?>"
                        class="btn btn-primary">Book now</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Reservation -->

</body>
<footer>
    <p class="text-center">Dibuat oleh Syariif Abdurrahman Bathik_1202194114</p>
</footer>

</html>