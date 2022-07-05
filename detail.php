<?php
require_once("db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Food & Cook</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="css/style.min.css" rel="stylesheet">
    <link href="css/indexstyle.css" rel="stylesheet">

</head>

<body id="page-top" style="background-color: #202020;">

<div class="py-5">
    <div class="container pt-5 px-5" style="height: 100vh;" >
        <div class="row gy-5" id="data">
            <?php
                require_once("./db.php");
                $id = $_GET['id'];
                $sql = "SELECT * FROM resep_makanan AS rm JOIN bahan_baku AS bb ON rm.id_bahan_baku = bb.id_bahan_baku JOIN tipe_makanan AS tm ON rm.id_tipe_makanan = tm.id_tipe_makanan WHERE id_resep = $id";
                
                $result = mysqli_query($conn, $sql);
                while ($row = $result->fetch_assoc()) :
            ?>
            <div class="col-12 my-4">
                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <img src="<?= $row['thumbnail'] ?>" class="card-img-top rounded">
                        </div>
                        <div class="col-sm-8 mt-3 mt-sm-0">
                            <!-- Nama Makanan -->
                            <div class="row">
                                <div class="col-3">
                                    <h5 class="fw-bold text-white my-2">Nama</h5>
                                </div>
                                <div class="col-1">
                                    <h5 class="text-end fw-bold text-white my-2">:</h5>
                                </div>
                                <div class="col-8">
                                    <h5 class="fw-semibold text-white my-2"><?= $row['judul'] ?></h5>
                                </div>
                            </div>

                            <!-- Asal Makanan -->
                            <div class="row">
                                <div class="col-3">
                                    <h5 class="fw-bold text-white my-2">Asal</h5>
                                </div>
                                <div class="col-1">
                                    <h5 class="text-end fw-bold text-white my-2">:</h5>
                                </div>
                                <div class="col-8">
                                    <h5 class="fw-semibold text-white my-2 text-capitalize"><?= $row['tipe_makanan'] ?></h5>
                                </div>
                            </div>
                            
                            <!-- Bahan Baku Makanan -->
                            <div class="row">
                                <div class="col-3">
                                    <h5 class="fw-bold text-white my-2">Bahan Baku</h5>
                                </div>
                                <div class="col-1">
                                    <h5 class="text-end fw-bold text-white my-2">:</h5>
                                </div>
                                <div class="col-8">
                                    <h5 class="fw-semibold text-white my-2 text-capitalize"><?= $row['bahan_baku'] ?></h5>
                                </div>
                            </div>
                            
                            <!-- Komposisi -->
                            <div class="row">
                                <div class="col-3">
                                    <h5 class="fw-bold text-white my-2">Komposisi</h5>
                                </div>
                                <div class="col-1">
                                    <h5 class="text-end fw-bold text-white my-2">:</h5>
                                </div>
                                <div class="col-8">
                                    <h5 class="fw-semibold text-white my-2"><?= $row['komposisi'] ?></h5>
                                </div>
                            </div>
                            
                            <!-- Cara Pembuatan -->
                            <div class="row">
                                <div class="col-3">
                                    <h5 class="fw-bold text-white my-2">Cara Pembuatan</h5>
                                </div>
                                <div class="col-1">
                                    <h5 class="text-end fw-bold text-white my-2">:</h5>
                                </div>
                                <div class="col-8">
                                    <h5 class="fw-semibold text-white my-2"><?= $row['cara_masak'] ?></h5>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2">
                    <a href="index.php" class="btn btn-primary rounded-3 text-white"><span><i class="bi bi-arrow-left me-2"></i></span> Back</a>
                </div>
            <?php endwhile ; ?>
        </div>
    </div>
</div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="ajax.js"></script>
    
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
</body>

</html>