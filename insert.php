<?php

require_once("db.php");

$judul = $_POST["judul"];
$tipemakanan = $_POST["id_tipe_makanan"];
$bahan_baku = $_POST["id_bahan_baku"];
$komposisi = $_POST["komposisi"];
$tutorial = $_POST["cara_masak"];
$gambar = $_POST["thumbnail"];
$video = $_POST["link_video"];


$query = "INSERT INTO resep_makanan (id_bahan_baku, id_tipe_makanan, thumbnail, judul, komposisi, cara_masak, link_video) 
          VALUES ('" . $bahan_baku . "', '" . $tipemakanan . "', '" . $gambar . "', '" . $judul . "', '" . $komposisi . "', '" . $tutorial . "',  '" . $video . "')";

mysqli_query($conn, $query);