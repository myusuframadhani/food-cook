<?php

require_once("db.php");


if (isset($_POST["id_resep"])) {
    $id = $_POST["id_resep"];
    $query = "DELETE FROM resep_makanan WHERE id_resep = $id";

    mysqli_query($conn, $query);
}
