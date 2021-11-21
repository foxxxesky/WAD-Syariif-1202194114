<?php
// Connect Database
$connect = mysqli_connect("localhost","root","","modul3");

// Take data from table
function query($query) {
    global $connect;    
    $result = mysqli_query($connect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Select data from querry (fetch)
$id = $_GET["id"];
$books = query("SELECT * FROM buku_table WHERE id_buku= $id");

// Check Tombol SaveChanges
if (isset($_POST["submit"])) {
    // Ambil Data
    $judul = $_POST["judul_buku"];
    $penulis = $_POST["penulis"];
    $tahun = $_POST["tahun_terbit"];
    $deskripsi = $_POST["deskripsi"];
    $bahasa = implode(', ', $_POST['bahasa']);
    $tag = implode(', ', $_POST['tag']);

    move_uploaded_file($source_gbr, $folder.$gambar);

    // query insert
    $query = "UPDATE buku_table SET
            judul_buku = '$judul',
            tahun_terbit = $tahun,
            deskripsi = '$deskripsi',
            tag = '$tag',
            bahasa = '$bahasa'
            WHERE id_buku = $id
    ";
    mysqli_query($connect, $query);

    //cek insert
    if (mysqli_affected_rows($connect) > 0) {
        echo "
        <script>
            alert('Book Update successfully!!!');
        </script>";
        header('location:../index.php?id=<?= $book["id_buku"] ?>');
} else {
echo "
<script>
alert('Failed!!!')
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
</head>

<body>
    <!-- Nav -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <img src="../img/logo-ead.png" alt="logo-ead" width="170px" height="45px" />
            <div class="nav justify-content-end" id="nav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="../pages/Syariif_TambahBuku.php" class="btn btn-primary btn-lg">Tambah Buku</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Nav -->

    <!-- Content -->
    <div class="row justify-content-center mt-5">
        <div class="col-5">
            <?php
            foreach ($books as $book) {
                ?>
            <div class="card p-3">
                <img src="../img/uploads_img/<?= $book["gambar"] ?>" class="card-img-top">
                <div class="card-body">
                    <hr style="color: aquamarine; height: 3px">
                    <!-- Judul -->
                    <p class="fw-bold mb-2">Judul:</p>
                    <p class="card-title mb-4"><?= $book["judul_buku"] ?></p>

                    <!-- Penulis -->
                    <p class="fw-bold mb-2">Penulis:</p>
                    <p class="card-title mb-4"><?= $book["penulis_buku"] ?></p>

                    <!-- Tahun -->
                    <p class="fw-bold mb-2">Tahun Terbit:</p>
                    <p class="card-title mb-4"><?= $book["tahun_terbit"] ?></p>

                    <!-- Deskripsi -->
                    <p class="fw-bold mb-2">Deskripsi:</p>
                    <p class="card-title mb-4"><?= $book["deskripsi"] ?></p>

                    <!-- Bahasa -->
                    <p class="fw-bold mb-2">Bahasa:</p>
                    <p class="card-title mb-4"><?= $book["bahasa"] ?></p>

                    <!-- Tag -->
                    <p class="fw-bold mb-2">Tag:</p>
                    <p class="card-title mb-4"><?= $book["tag"] ?></p>

                    <!-- Button -->
                    <div class="row justify-content-around text-center">
                        <div class="col-6">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#sunting" style="width: 100%;">
                                Sunting
                            </button>
                        </div>
                        <div class="col-6">
                            <a href="Syariif_delete.php?id=<?= $book["id_buku"] ?>" class="btn btn-danger"
                                style="width: 100%;">Hapus</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <!-- Content -->

        <!-- Sunting -->
        <div class="modal fade" tabindex="-1" id="sunting">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Header -->
                    <div class="modal-header">
                        <h5 class="modal-title">Sunting</h5>
                        <!-- Close -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Sunting Form -->
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="<?= $book['id_buku'] ?>">
                            <!-- Judul -->
                            <div class="mb-3">
                                <label for="judul_buku" class="form-label fw-bold">Judul Buku</label>
                                <input type="text" class="form-control" name="judul_buku" id="judul_buku"
                                    value="<?= $book['judul_buku']; ?>">
                            </div>
                            <!-- Judul -->

                            <!-- Penulis -->
                            <div class="mb-3">
                                <label for="penulis" class="form-label fw-bold">Penulis</label>
                                <input type="text" class="form-control" value="<?= $book['penulis_buku']; ?>"
                                    id="penulis" name="penulis" readonly>
                            </div>
                            <!-- Penulis -->

                            <!-- Tahun Terbit -->
                            <div class="mb-3">
                                <label for="tahun_terbit" class="form-label fw-bold">Tahun Terbit</label>
                                <input type="text" class="form-control" name="tahun_terbit" id="tahun_terbit"
                                    value="<?= $book['tahun_terbit']; ?>">
                            </div>
                            <!-- Tahun Terbit -->

                            <!-- Desc -->
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi"
                                    rows="5"><?= $book['deskripsi'] ?></textarea>
                            </div>
                            <!-- Desc -->

                            <!-- Bahasa -->
                            <div class="mb-3">
                                <!-- Indo -->
                                <label for="bahasa" class="form-label fw-bold pe-3">Bahasa</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="bahasa[]" id="bahasa"
                                        value="Indonesia" <?= ($book['bahasa'] == 'Indonesia' ? "checked" : '');  ?>>
                                    <label class="form-check-label" for="Indonesia">Indonesia</label>
                                </div>
                                <!-- Lainnya -->
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="bahasa[]" id="bahasa"
                                        value="Lainnnya" <?= ($book['bahasa'] == 'Lainnya' ? "checked" : '');  ?>>
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
                                        value="Pemrograman" <?= ($book['tag'] == 'Pemrograman' ? "checked" : '');  ?>>
                                    <label class="form-check-label" for="Pemrograman">Pemrograman</label>
                                </div>
                                <!-- Website -->
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="tag"
                                        value="Website" <?= ($book['tag'] == 'Website' ? "checked" : '');  ?>>
                                    <label class="form-check-label" for="Website">Website</label>
                                </div>
                                <!-- Java -->
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="tag" value="Java"
                                        <?= ($book['tag'] == 'Java' ? "checked" : '');  ?>>
                                    <label class="form-check-label" for="Java">Java</label>
                                </div>
                                <!-- OOP -->
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="tag" value="OOP"
                                        <?= ($book['tag'] == 'OOP' ? "checked" : '');  ?>>
                                    <label class="form-check-label" for="OOP">OOP</label>
                                </div>
                                <!-- MVC -->
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="tag" value="MVC"
                                        <?= ($book['tag'] == 'MVC' ? "checked" : '');  ?>>
                                    <label class="form-check-label" for="MVC">MVC</label>
                                </div>
                                <!-- Kalkulus -->
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="tag"
                                        value="Kalkulus" <?= ($book['tag'] == 'Kalkulus' ? "checked" : '');  ?>>
                                    <label class="form-check-label" for="Kalkulus">Kalkulus</label>
                                </div>
                                <!-- Lainnya -->
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="tag"
                                        value="Lainnya" <?= ($book['tag'] == 'Lainnya' ? "checked" : '');  ?>>
                                    <label class="form-check-label" for="Lainnya">Lainnya</label>
                                </div>
                            </div>
                            <!-- Tag -->
                            <!-- Footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
        <!-- Sunting -->

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