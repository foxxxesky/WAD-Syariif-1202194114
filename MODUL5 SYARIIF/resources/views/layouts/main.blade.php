<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>EAD Public Health Center | {{ $title }}</title>

    <style>
    body {
        overflow-x: hidden;
    }

    footer {
        text-decoration: none;
    }
    </style>
</head>

<body>
    <!-- Nav Bar -->
    <ul class=" nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link {{ ($title === 'Home') ? 'text-black' : 'text-black-50' }}" href="/"><i
                    class="bi bi-house pe-1"></i>HOME</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ ($title === 'Vaccine') ? 'text-black' : 'text-black-50' }}" href="/Vaccine"><i
                    class="bi bi-shield-plus"></i>VACCINE</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ ($title === 'Patient') ? 'text-black' : 'text-black-50' }}" href="/Patient"><i
                    class="bi bi-file-medical"></i>PATIENT</a>
        </li>
    </ul>
    <!-- Nav Bar -->

    <!-- Content -->
    @yield('Content')
    <!-- Content -->

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- Script -->

</body>

<footer>
    <!-- Button to Open the Modal -->
    <div class="text-center fixed-bottom pb-2">
        <a type="button" class="text-secondary" data-bs-toggle="modal" data-bs-target="#myModal"
            style="text-decoration: none;">
            Made With <i class="bi bi-heart-fill" style="color: red;"></i> Syariif Abdurrahman Bathik - 1202194114
        </a>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Kesan Pesan Praktikum</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <table>
                        <tr>
                            <td class="pe-4">Kesan</td>
                            <td>:</td>
                            <td>Praktikumnya berkesan dan saya senang dapat belajar banyak</td>
                        </tr>
                        <br>
                        <tr>
                            <td class="pe-4">Pesan</td>
                            <td>:</td>
                            <td>Terimakasih Sudah Menemani Weekendku!</td>
                        </tr>
                    </table>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

</footer>

</html>