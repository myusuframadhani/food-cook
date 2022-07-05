<?php

require_once("./db.php");

$id  = $_POST["id_resep"];
$judul = $_POST["judul"];
$tipemakanan = $_POST["id_tipe_makanan"];
$bahan_baku = $_POST["id_bahan_baku"];
$komposisi = $_POST["komposisi"];
$tutorial = $_POST["cara_masak"];
$gambar = $_POST["thumbnail"];
$video = $_POST["link_video"];

$query = "UPDATE resep_makanan SET judul = '" . $judul . "'
    ,id_tipe_makanan = '" . $tipemakanan . "'
    ,id_bahan_baku = '" . $bahan_baku . "'
    ,komposisi = '" . $komposisi . "'
    ,cara_masak = '" . $tutorial . "'
    ,thumbnail = '" . $gambar . "'
    ,link_video = '" . $video . "'
    WHERE id_resep = '" . $id . "'";

mysqli_query($conn, $query);
