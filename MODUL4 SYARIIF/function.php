<?php
session_start();

// Connections
$connect = mysqli_connect("localhost","root","","wad_modul4");

// Register
function register($data){
    global $connect;

    // Get Data
    $nama = $data["nama"];
    $email = $data["email"];
    $nohp = $data["nohp"];
    $pwd = $data["password"];
    $confirm = $data["confirm"];

    // cek email
    $email_check = mysqli_query($connect, "SELECT email FROM user WHERE email = '$email'");

    if (mysqli_fetch_assoc($email_check)) {
        echo "
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            Email Sudah Pernah Terdaftar!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        ";
        return false;
    }

    // cek confirm pass
    if ($pwd !== $confirm) {
        echo "
        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Password Konfirmasi Tidak Sesuai!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        ";
        return false;
    }

    // encryption
    $pwd = password_hash($pwd, PASSWORD_DEFAULT);

    // insert to database
    mysqli_query($connect, "INSERT INTO user VALUES
        (NULL, '$nama', '$email', '$pwd', $nohp)
    ");

    return mysqli_affected_rows($connect);
}

// Insert Danau
function book_danau($data) {
    global $connect;
    $email = $_SESSION['login'];

    // set data
    $nama_tempat = "Danau Kelimutu";
    $lokasi = "Ende";
    $harga = 4500000;

    // get data
    $user = mysqli_query($connect, "SELECT * FROM user WHERE email = '$email'");
    $pull_id = mysqli_fetch_assoc($user);
    $user_id = $pull_id["id"];
    $tanggal = $data["date"];

    // insert to database
    mysqli_query($connect, "INSERT INTO booking VALUES
        (NULL, $user_id, '$nama_tempat', '$lokasi', $harga, '$tanggal')
    ");

    return mysqli_affected_rows($connect);
}

// Insert Pulau
function book_pulau($data) {
    global $connect;
    $email = $_SESSION['login'];

    // set data
    $nama_tempat = "Pulau Komodo";
    $lokasi = "Labuan Bajo";
    $harga = 7500000;

    // get data
    $user = mysqli_query($connect, "SELECT * FROM user WHERE email = '$email'");
    $pull_id = mysqli_fetch_assoc($user);
    $user_id = $pull_id["id"];
    $tanggal = $data["date"];

    // insert to database
    mysqli_query($connect, "INSERT INTO booking VALUES
        (NULL, $user_id, '$nama_tempat', '$lokasi', $harga, '$tanggal')
    ");

    return mysqli_affected_rows($connect);
}

// Insert Cave
function book_cave($data) {
    global $connect;
    $email = $_SESSION['login'];

    // set data
    $nama_tempat = "Rangko Cave";
    $lokasi = "Labuan Bajo";
    $harga = 3500000;

    // get data
    $user = mysqli_query($connect, "SELECT * FROM user WHERE email = '$email'");
    $pull_id = mysqli_fetch_assoc($user);
    $user_id = $pull_id["id"];
    $tanggal = $data["date"];

    // insert to database
    mysqli_query($connect, "INSERT INTO booking VALUES
        (NULL, $user_id, '$nama_tempat', '$lokasi', $harga, '$tanggal')
    ");

    return mysqli_affected_rows($connect);
}

// Update Profile
function update($data) {
    global $connect;

    // Get Data
    $email = $data['email'];
    $nama = $data["nama"];
    $nohp = $data["nohp"];

    // cek field navbar
    if (isset($data['navbar'])) {
        $navbar = $data['navbar'];
        setcookie('color', $navbar, time() + 1200);
    }

    // cek field password (GAK BISAA WHY?)
    if (isset($data["password"])) {
        $pwd = $data["password"];
        $confirm = $data["confirm"];
        setcookie('color', $navbar, time() + 1200);

        // cek confirm pass
        if ($pwd !== $confirm) {
            echo "
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                Password Konfirmasi Tidak Sesuai!
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
            return false;
        }

        // encryption
        $pwd = password_hash($pwd, PASSWORD_DEFAULT);

        // update data
        mysqli_query($connect, "UPDATE user SET
        nama = '$nama',
        pwd = '$pwd',
        no_hp = $nohp
        WHERE email = '$email'");

        return mysqli_affected_rows($connect);

    } else {
        // update data
        mysqli_query($connect, "UPDATE user SET
        nama = '$nama',
        no_hp = $nohp
        WHERE email = '$email'");

        return mysqli_affected_rows($connect);
    }

    
}

// Delete
function delete($data){
    global $connect;
    // Get id
    $id = $_POST['id'];

    mysqli_query($connect, "DELETE FROM booking WHERE id = $id");
    return mysqli_affected_rows($connect);
}

?>