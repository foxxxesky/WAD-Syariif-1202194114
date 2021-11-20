<?php

// Connect Database
$connect = mysqli_connect("localhost","root","","modul3");

// Get id
$id = $_GET["id"];

// Delete
$querry = "DELETE FROM buku_table WHERE id_buku = $id";

mysqli_query($connect, $querry);

header('location:../index.php');

?>