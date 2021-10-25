<?php

$orgdate = $_POST['date'] . " " . $_POST['time'];

$checkin = date("d-m-Y H:i:s", strtotime($orgdate));
$checkout = date("d-m-Y H:i:s", (strtotime($orgdate) + 60 * 60 * $_POST['duration']));

$hallprice = array("nusantara" => 2000, "garuda" => 1000, "gsg" => 500);

$reservations = $_POST["reservation"];

$addprice = 0;
if (isset($_POST['service'])) {
    foreach ($_POST['service'] as $service) {
        if ($service == "Catering") {
            $addprice += 700;
        } elseif ($service = "Decorotaion") {
            $addprice += 450;
        } else {
            $addprice += 250;
        }
    }
} else {
    $addprice = 0;
}

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
<body class="pb-5 mb-5">
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

    <div class="pt-2 pb-2">
        <h4 class="text-center fw-normal">Thank you <?= $_POST["nama"] ?> for serving</h4>
        <h4 class="text-center fw-normal">Please double check your reservation details</h4>
    </div>

    <!-- Text -->

    <!-- content -->
    <div class="row justify-content-center">
        <div class="col-10">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Booking Number</th>
                        <th scope="col">Name</th>
                        <th scope="col">Check-in</th>
                        <th scope="col">Check-out</th>
                        <th scope="col">Building Type</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Service</th>
                        <th scope="col">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><?= rand() ?></th>
                        <td><?= $_POST["nama"] ?></td>
                        <td><?= $checkin ?></td>
                        <td><?= $checkout ?></td>
                        <td><?= $_POST["reservation"] ?></td>
                        <td><?= $_POST["nohp"] ?></td>
                        <td>
                            <ul>
                                <?php
                                    if (isset($_POST["service"])) {
                                        foreach ($_POST["service"] as $services) {
                                            echo "<li>$services</li>";
                                        }
                                    } else {
                                        echo "-";
                                    }
                                ?>
                            </ul>
                        </td>
                        <td>
                            <?php
                                if ($reservations == "Garuda Hall") {
                                    $price1 = $hallprice['garuda']*$_POST["duration"];
                                    echo $price1 + $addprice;
                                } elseif ($reservations == "Nusantara Hall") {
                                    $price1 = $hallprice['nusantara']*$_POST["duration"];
                                    echo $price1 + $addprice;
                                } elseif ($reservations == "Gedung Serba Guna") {
                                    $price1 = $hallprice['gsg']*$_POST["duration"];
                                    echo $price1 + $addprice;
                                }

                            ?>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- content -->
    
</body>

<footer class="pt-5 mt-5">
    <div class="pt-5 mt-5">
        <div class="pt-5 mt-5">
            <p class="text-center">Dibuat oleh Syariif Abdurrahman Bathik_1202194114</p>
        </div>
    </div>
</footer>

</html>
