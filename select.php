<?php
require_once("db.php");

if (isset($_POST["sort"])) {
    $query = '';
    if ($_POST["sort"] == "asc") {
        $query = "SELECT * FROM resep_makanan AS rm JOIN bahan_baku AS bb ON rm.id_bahan_baku = bb.id_bahan_baku JOIN tipe_makanan AS tm ON rm.id_tipe_makanan = tm.id_tipe_makanan ORDER BY judul ASC";
    } elseif($_POST["sort"] == "dsc") {
        $query = "SELECT * FROM resep_makanan AS rm JOIN bahan_baku AS bb ON rm.id_bahan_baku = bb.id_bahan_baku JOIN tipe_makanan AS tm ON rm.id_tipe_makanan = tm.id_tipe_makanan ORDER BY judul DESC";
    } elseif($_POST["sort"] == "bahanasc") {
        $query = "SELECT * FROM resep_makanan AS rm JOIN bahan_baku AS bb ON rm.id_bahan_baku = bb.id_bahan_baku JOIN tipe_makanan AS tm ON rm.id_tipe_makanan = tm.id_tipe_makanan ORDER BY bahan_baku ASC";
    } elseif($_POST["sort"] == "bahandsc") {
        $query = "SELECT * FROM resep_makanan AS rm JOIN bahan_baku AS bb ON rm.id_bahan_baku = bb.id_bahan_baku JOIN tipe_makanan AS tm ON rm.id_tipe_makanan = tm.id_tipe_makanan ORDER BY bahan_baku DESC";
    } elseif($_POST["sort"] == "tipeasc") {
        $query = "SELECT * FROM resep_makanan AS rm JOIN bahan_baku AS bb ON rm.id_bahan_baku = bb.id_bahan_baku JOIN tipe_makanan AS tm ON rm.id_tipe_makanan = tm.id_tipe_makanan ORDER BY tipe_makanan ASC";
    } elseif($_POST["sort"] == "tipedsc") {
        $query = "SELECT * FROM resep_makanan AS rm JOIN bahan_baku AS bb ON rm.id_bahan_baku = bb.id_bahan_baku JOIN tipe_makanan AS tm ON rm.id_tipe_makanan = tm.id_tipe_makanan ORDER BY tipe_makanan DESC";
    }
    $result = mysqli_query($conn, $query);
    while ($data = mysqli_fetch_array($result)) {
        echo '
        <div class="col-md-4 col-xxl-3">
            <div class="card my-3 zoom border-0" style="background-color: #E0AA3E;">
                <img src="' . $data['thumbnail'] . '" class="card-img-top" alt="..." height= "250" width= "150";>
                <div class="card-body text-white" style="text-transform: capitalize;">
                    <h5 class="card-title fw-bold">' . $data["judul"] . '</h5>
                    <p class="card-text">Bahan Baku : ' . $data["bahan_baku"] . '</p>
                    <p class="card-text">Tipe : ' . $data["tipe_makanan"] . '</p>
                    <div class="row">
                        <div class="col-2">
                            <a href="detail.php?id=' . $data['id_resep'] . '" class="btn btn-dark">Detail</a>
                        </div>
                        <div class="col-4"></div>
                        <div class="col-6 text-end">
                            <button 
                            id-resep="' . $data['id_resep'] . '" 
                            judul="' . $data['judul'] . '" 
                            tipe-makanan="' . $data['id_tipe_makanan'] . '" 
                            bahan-baku="' . $data['id_bahan_baku'] . '"
                            komposisi="' . $data['komposisi'] . '"
                            tutorial="' . $data['cara_masak'] . '"
                            gambar="' . $data['thumbnail'] . '"
                            video="' . $data['link_video'] . '"
                            data-bs-toggle="modal" data-backdrop="static" data-bs-target="#updatedata" id="editbutton" class="btn btn-success"><i class="bi bi-pencil"></i></i></button>
                            <a href="#" class="btn btn-danger" id="' . $data["id_resep"] . '" onclick="hapus(' . $data["id_resep"] . ')"><i class="bi bi-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    }
} else {

    //!! >>> SEARCH <<<
    $output = '';
    if (isset($_POST["query"])) {
        $search = mysqli_real_escape_string($conn, $_POST["query"]);

        $limit = 6;

        $query = "SELECT * FROM resep_makanan AS rm JOIN bahan_baku AS bb ON rm.id_bahan_baku = bb.id_bahan_baku JOIN tipe_makanan AS tm ON rm.id_tipe_makanan = tm.id_tipe_makanan WHERE judul LIKE '%" . $search . "%' ORDER BY judul ASC LIMIT 0, $limit";

    } elseif (isset($_POST["load"])) {
        $count = "SELECT count(*) AS jumlah FROM resep_makanan";
        $hasil = $conn->prepare($count);
        $hasil->execute();
        $res1 = $hasil->get_result();
        $row = $res1->fetch_assoc();
        $total_records = $row['jumlah'];
        $total_records -= 6;
        $jumlah_page = ceil($total_records / $_POST["load"]);
        $limit = 6;
        $limit += $_POST["load"];

        $query = "SELECT * FROM resep_makanan AS rm JOIN bahan_baku AS bb ON rm.id_bahan_baku = bb.id_bahan_baku JOIN tipe_makanan AS tm ON rm.id_tipe_makanan = tm.id_tipe_makanan ORDER BY judul ASC LIMIT 0, $limit";
    } else {
        $limit = 6;

        $query = "SELECT * FROM resep_makanan AS rm JOIN bahan_baku AS bb ON rm.id_bahan_baku = bb.id_bahan_baku JOIN tipe_makanan AS tm ON rm.id_tipe_makanan = tm.id_tipe_makanan ORDER BY judul ASC LIMIT 0, $limit";
    }

    $result = mysqli_query($conn, $query);
    while ($data = mysqli_fetch_array($result)) {
        $output .= '
        <div class="col-md-4 col-xxl-3">
            <div class="card my-3 zoom border-0" style="background-color: #E0AA3E;">
                <img src="' . $data['thumbnail'] . '" class="card-img-top" alt="..." height= "250" width= "150";>
                <div class="card-body text-white" style="text-transform: capitalize;">
                    <h5 class="card-title fw-bold">' . $data["judul"] . '</h5>
                    <p class="card-text">Bahan Baku : ' . $data["bahan_baku"] . '</p>
                    <p class="card-text">Tipe : ' . $data["tipe_makanan"] . '</p>
                    <div class="row">
                        <div class="col-2">
                            <a href="detail.php?id=' . $data['id_resep'] . '" class="btn btn-dark">Detail</a>
                        </div>
                        <div class="col-4"></div>
                        <div class="col-6 text-end">
                            <button 
                            id-resep="' . $data['id_resep'] . '" 
                            judul="' . $data['judul'] . '" 
                            tipe-makanan="' . $data['id_tipe_makanan'] . '" 
                            bahan-baku="' . $data['id_bahan_baku'] . '"
                            komposisi="' . $data['komposisi'] . '"
                            tutorial="' . $data['cara_masak'] . '"
                            gambar="' . $data['thumbnail'] . '"
                            video="' . $data['link_video'] . '"
                            data-bs-toggle="modal" data-backdrop="static" data-bs-target="#updatedata" id="editbutton" class="btn btn-success"><i class="bi bi-pencil"></i></button>
                            <a href="#" class="btn btn-danger" id="' . $data["id_resep"] . '" onclick="hapus(' . $data["id_resep"] . ')"><i class="bi bi-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    }
    echo $output;
}

?>

<script>
    //!! >>> HAPUS DATA <<<
    function hapus(id) {
        if (confirm("Apakah anda yakin?")) {
            $.ajax({
                url: "delete.php",
                method: "POST",
                data: {
                    id_resep: id
                },
                success: function(data) {
                    console.log("Data berhasil dihapus")
                    $.ajax({
                        url: "select.php",
                        method: "POST",
                        data: {
                            query: ''
                        },
                        success: function(data) {
                            $('#content').html(data);
                        }
                    });
                }
            });
        }
    }
</script>
