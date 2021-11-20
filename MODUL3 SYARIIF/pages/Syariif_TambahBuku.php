<?php

$user = "Syariif_1202194114";

// Connect
$connect = mysqli_connect("localhost","root","","modul3");

// Check Tombol
if (isset($_POST["submit"])) {
    // Ambil Data
    $judul = $_POST["judul_buku"];
    $penulis = $_POST["penulis"];
    $tahun = $_POST["tahun_terbit"];
    $deskripsi = $_POST["deskripsi"];
    $bahasa = implode(', ', $_POST['bahasa']);
    $tag = implode(', ', $_POST['tag']);
    $gambar = $_FILES['gambar']['name'];
    $source_gbr = $_FILES['gambar']['tmp_name'];
    $folder = '../img/uploads_img/';

    move_uploaded_file($source_gbr, $folder.$gambar);

    // query insert
    $query = "INSERT INTO buku_table VALUES
                ('', '$judul', '$penulis', $tahun, '$deskripsi', '$gambar', '$tag', '$bahasa')
            ";
    mysqli_query($connect, $query);

    //cek insert
    if (mysqli_affected_rows($connect) > 0) {
        echo "
        <script>
            alert('Book Added successfully :)');
            document.location.href = '../index.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Failed Added Books!')
        </script>";
}

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
    <title>EAD Library</title>
    <style>
    html,
    body {
        max-width: 100%;
        overflow-x: hidden;
    }
    </style>
</head>

<body>
    <!-- Nav -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <img src="../img/logo-ead.png" alt="logo-ead" width="170px" height="45px" />

            <div class="nav justify-content-end" id="nav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="./Syariif_TambahBuku.php" class="btn btn-primary btn-lg">Tambah Buku</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Nav -->

    <!-- Form -->
    <div class="row justify-content-center mt-5">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center fw-bold">Tambah Data Buku</h3>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <!-- Judul -->
                        <div class="mb-3">
                            <label for="judul_buku" class="form-label fw-bold">Judul Buku</label>
                            <input type="text" class="form-control" name="judul_buku" id="judul_buku"
                                placeholder="Contoh: Pemrograman Web Bersama EAD" required>
                        </div>
                        <!-- Judul -->

                        <!-- Penulis -->
                        <div class="mb-3">
                            <label for="penulis" class="form-label fw-bold">Penulis</label>
                            <input type="text" class="form-control" value="<?= $user ?>" id="penulis" name="penulis"
                                readonly>
                        </div>
                        <!-- Penulis -->

                        <!-- Tahun Terbit -->
                        <div class="mb-3">
                            <label for="tahun_terbit" class="form-label fw-bold">Tahun Terbit</label>
                            <input type="text" class="form-control" name="tahun_terbit" id="tahun_terbit"
                                placeholder="Contoh: 1990" required>
                        </div>
                        <!-- Tahun Terbit -->

                        <!-- Desc -->
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"
                                placeholder="Contoh: Buku ini menjelaskan tentang ..." required></textarea>
                        </div>
                        <!-- Desc -->

                        <!-- Bahasa -->
                        <div class="mb-3">
                            <!-- Indo -->
                            <label for="bahasa" class="form-label fw-bold pe-3">Bahasa</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="bahasa[]" id="bahasa"
                                    value="Indonesia">
                                <label class="form-check-label" for="Indonesia">Indonesia</label>
                            </div>
                            <!-- Lainnya -->
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="bahasa[]" id="bahasa"
                                    value="Lainnnya">
                                <label class="form-check-label" for="Lainnnya">Lainnnya</label>
                            </div>
                        </div>
                        <!-- Bahasa -->

                        <!-- Tag -->
                        <div class="mb-3">
                            <label for="tag" class="form-label fw-bold pe-3">Tag</label>
                            <!-- Pemrograman -->
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tag[]" id="tag"
                                    value="Pemrograman">
                                <label class="form-check-label" for="Pemrograman">Pemrograman</label>
                            </div>
                            <!-- Website -->
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tag[]" id="tag" value="Website">
                                <label class="form-check-label" for="Website">Website</label>
                            </div>
                            <!-- Java -->
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tag[]" id="tag" value="Java">
                                <label class="form-check-label" for="Java">Java</label>
                            </div>
                            <!-- OOP -->
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tag[]" id="tag" value="OOP">
                                <label class="form-check-label" for="OOP">OOP</label>
                            </div>
                            <!-- MVC -->
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tag[]" id="tag" value="MVC">
                                <label class="form-check-label" for="MVC">MVC</label>
                            </div>
                            <!-- Kalkulus -->
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tag[]" id="tag" value="Kalkulus">
                                <label class="form-check-label" for="Kalkulus">Kalkulus</label>
                            </div>
                            <!-- Lainnya -->
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tag[]" id="tag" value="Lainnya">
                                <label class="form-check-label" for="Lainnya">Lainnya</label>
                            </div>
                        </div>
                        <!-- Tag -->

                        <!-- Gambar -->
                        <div class="mb-3">
                            <label for="gambar" class="form-label fw-bold">Gambar</label>
                            <input class="form-control" type="file" name="gambar" id="gambar">
                        </div>
                        <!-- Gambar -->

                        <!-- Button -->
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary" style="width: 20rem;">+
                                TAMBAH</button>
                        </div>
                        <!-- Button -->
                    </form>

                </div>
            </div>
        </div>
    </div>




    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- Script -->

</body>

<footer>
    <div class="row justify-content-center m-5">
        <div class="col-10 text-center">
            <img class="mb-4" src="../img/logo-ead.png" alt="logo-ead" width="170px" height="45px" />
            <h4 class="text-center fw-bold mb-3">Perpustakaan EAD</h4>
            <p class="text-center">&copy; Syariif_1202194114</p>
        </div>
</footer>

</html>