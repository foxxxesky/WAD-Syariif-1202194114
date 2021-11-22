<?php
// Connect Database
$connect = mysqld_connect("localhost","root","","modul3");

// take data from table
function query($query) {
    global $connect;    
    $result = mysqld_query($connect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;

}

// select data from querry (fetch)
$books = query("SELECT * FROM buku_tabel");

// Cek
$cek = mysqli_query($connect, "SELECT * FROM buku_tabel");

$count = mysqli_num_rows($cek);

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
</head>

<body>
    <!-- Nav -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <img src="img/logo-ead.png" alt="logo-ead" width="170px" height="45px" />
            <div class="nav justify-content-end" id="nav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="pages/Syariif_TambahBuku.php" class="btn btn-primary btn-lg">Tambah Buku</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Nav -->

    <!-- Konten -->
    <?php
    if ($count == 0) {
        ?>
    <div class="row justify-content-center mt-5">
        <div class="text-center col-10">
            <h3 class="fw-normal">Belum ada Buku</h3>
            <hr style="color: aquamarine; height: 3px">
            <h5 class="fw-normal">Silahkan Menambahkan Buku</h5>
        </div>
    </div>

    <?php
    } else {
        ?>
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-10">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
        foreach ($books as $book) {
            ?>
                <div class="col">
                    <div class="card">
                        <img src="img/uploads_img/<?= $book["gambar"] ?>" class="card-img-top" width="120px"
                            height="550px">
                        <div class="card-body">
                            <h5 class="card-title"><?= $book["judul_buku"] ?></h5>
                            <p class="card-text"><?= $book["deskripsi"] ?></p>
                            <a href="pages/Syariif_DetailBuku.php?id=<?= $book["id_buku"] ?>"
                                class="btn btn-primary">Tampilkan Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php } ?>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- Script -->

</body>

<footer>
    <div class="row justify-content-center m-5">
        <div class="col-10 text-center">
            <img class="mb-4" src="img/logo-ead.png" alt="logo-ead" width="170px" height="45px" />
            <h4 class="text-center fw-bold mb-3">Perpustakaan EAD</h4>
            <p class="text-center">&copy; Syariif_1202194114</p>
        </div>
</footer>

</html>
