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

<body id="page-top" style="background-color: #010203;">

    <!-- Page Wrapper -->
    <div id="wrapper"  style="background-color: #010203;">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-white accordion text-white" id="accordionSidebar" style="background-color: #202020;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center my-2" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                
                <div class="sidebar-brand-text my-2" style="color: #E0AA3E;"><i><img src="img/logo.png" class="me-3" alt="Logo" style="max-width: 20%"></i>Food & Cook<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0 bg-white">

            <li class="nav-item active mx-2">
                <a class="nav-link" href="index.php" style="color: #E0AA3E;">
                    <i class="bi bi-receipt me-2" style="color: #E0AA3E;"></i>
                    <span class="fs-6">Resep</span></a>
            </li>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="background-color: #010203;">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background-color: #010203;">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="bi bi-arrow-left-right text-black"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto" style="background-color: #010203;">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                            aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Search for..." aria-label="Search"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow me-4" >
                        <div class="nav-link dropdown-toggle">
                            <span class="mr-2 d-none d-lg-inline text-white small"><i class="bi bi-cloud-sun-fill me-2"></i> Pagi, Alifta</span>
                            <img class="img-profile rounded-circle border"
                                src="img/girl.png">
                        </div>
                        
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid text-white" style="background-color: #010203;">

                <!-- Header -->
                <div class="d-sm-flex align-items-center text-white justify-content-between mb-4">
                    <h1 class="h3 mb-0 fw-bolder mx-2">Dashboard</h1>
                </div>
                    
                <!-- Sorting Judul-->
                <div class="row my-3">
                    <div class="col-3">
                        <h4 class="me-2 mt-2 fs-6 text-white">Urut berdasarkan judul</h4>
                    </div>
                    <div class="col-7" style="margin-left: -70px;">
                        <button class="btn btn-outline-dark me-1 text-white" type="submit" id="AZ">A - Z</button>
                        <button class="btn btn-outline-dark mx-1 text-white" type="submit" id="ZA">Z - A</button>
                    </div>
                    <div class="col-2" style="margin-left: 70px;">
                        <a href="#" class="d-none d-sm-inline-block btn btn-dark btn-sm shadow-sm p-2 text-white rounded me-4" style="background-color: #E0AA3E;" data-bs-toggle="modal" data-bs-target="#insertModal">
                        <i class="bi bi-clipboard2-plus-fill me-2"></i> Tambah Resep</a>
                    </div>
                </div>

                <div class="row my-3">
                    <!-- Sorting Bahan Baku -->
                    <div class="col-3">
                        <h4 class="me-2 mt-2 fs-6 text-white">Urut berdasarkan bahan baku</h4>
                    </div>
                    <div class="col-5" style="margin-left: -70px;">
                        <button class="btn btn-outline-dark me-1 text-white" type="submit" id="bahanAZ">A - Z</button>
                        <button class="btn btn-outline-dark mx-1 text-white" type="submit" id="bahanZA">Z - A</button>
                    </div>

                    <!-- Search -->
                    <form class="col-4" method="POST" style="margin-left: 20px;">
                        <input class="form-control me-2 " type="search" placeholder="Cari ..." aria-label="Search" name="search_text" id="search_text">
                    </form>
                </div>
                
                <div class="row my-3">
                    <!-- Sorting Tipe Makanan -->
                    <div class="col-3">
                        <h4 class="me-2 mt-2 fs-6 text-white">Urut berdasarkan tipe</h4>
                    </div>
                    <div class="col-5" style="margin-left: -70px;">
                        <button class="btn btn-outline-dark me-1 text-white" type="submit" id="tipeAZ">A - Z</button>
                        <button class="btn btn-outline-dark mx-1 text-white" type="submit" id="tipeZA">Z - A</button>
                    </div>
                </div>



                <!-- Insert -->
                <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-black" id="exampleModalLabel">Tambah Resep</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="text-black">
                                    <!-- Judul -->
                                    <div class="mb-3">
                                        <label for="judul" class="form-label">Judul</label>
                                        <input type="text" class="form-control text-black" id="judul" maxlength="33">
                                    </div>

                                    <!-- Tipe Makanan -->
                                    <div class="mb-3">
                                        <label for="id_tipe_makanan" class="form-label">Asal Makanan</label>
                                        <select class="form-select" aria-label="Default select example" id="id_tipe_makanan">
                                            <option value="1">Japanese</option>
                                            <option value="2">Korean</option>
                                            <option value="3">Indonesian</option>
                                            <option value="4">Western</option>
                                        </select>
                                    </div>

                                    <!-- Bahan Baku -->
                                    <div class="mb-3">
                                        <label for="id_bahan_baku" class="form-label">Bahan Baku Utama</label>
                                        <select class="form-select" aria-label="Default select example" id="id_bahan_baku">
                                            <option value="1">Ayam</option>
                                            <option value="2">Ikan</option>
                                            <option value="3">Kambing</option>
                                            <option value="4">Sapi</option>
                                            <option value="5">Tahu</option>
                                            <option value="6">Telur</option>
                                            <option value="7">Tempe</option>
                                            <option value="8">Udang</option>
                                        </select>
                                    </div>

                                    <!-- Komposisi -->
                                    <div class="mb-3">
                                        <label for="komposisi" class="form-label">Bahan yang dibutuhkan</label>
                                        <input type="text" class="form-control" id="komposisi">
                                    </div>

                                    <!-- Tutorial -->
                                    <div class="mb-3">
                                        <label for="cara_masak" class="form-label">Cara Pembuatan</label>
                                        <input type="text" class="form-control" id="cara_masak">
                                    </div>

                                    <!-- Bahan Baku -->
                                    <div class="mb-3">
                                        <label for="thumbnail" class="form-label">Link Gambar</label>
                                        <input type="text" class="form-control" id="thumbnail">
                                    </div>

                                    <!-- Video -->
                                    <div class="mb-3">
                                        <label for="link_video" class="form-label">Link Video</label>
                                        <input type="text" class="form-control" id="link_video">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn text-white" id="save" style="background-color: #E0AA3E;">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit -->
                <div class="modal fade" id="updatedata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-black" id="exampleModalLabel">Edit Resep</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="text-black">

                                    <div hidden class="mb-3">
                                        <label for="id_resep_up" class="form-label"></label>
                                        <input type="text" class="form-control" id="id_resep_up" name="id_resep">
                                    </div>

                                    <!-- Judul -->
                                    <div class="mb-3">
                                        <label for="judul_up" class="form-label">Judul</label>
                                        <input type="text" class="form-control text-black" id="judul_up" name="judul" maxlength="33">
                                    </div>

                                    <!-- Tipe Makanan -->
                                    <div class="mb-3">
                                        <label for="id_tipe_makanan_up" class="form-label">Asal Makanan</label>
                                        <select class="form-select text-black" aria-label="Default select example" id="id_tipe_makanan_up" name="id_tipe_makanan">
                                            <option value="1">Japanese</option>
                                            <option value="2">Korean</option>
                                            <option value="3">Indonesian</option>
                                            <option value="4">Western</option>
                                        </select>
                                    </div>

                                    <!-- Bahan Baku -->
                                    <div class="mb-3">
                                        <label for="id_bahan_baku_up" class="form-label">Bahan Baku Utama</label>
                                        <select class="form-select text-black" aria-label="Default select example" id="id_bahan_baku_up" name="id_bahan_baku">
                                            <option value="1">Ayam</option>
                                            <option value="2">Ikan</option>
                                            <option value="3">Kambing</option>
                                            <option value="4">Sapi</option>
                                            <option value="5">Tahu</option>
                                            <option value="6">Telur</option>
                                            <option value="7">Tempe</option>
                                            <option value="8">Udang</option>
                                        </select>
                                    </div>

                                    <!-- Komposisi -->
                                    <div class="mb-3">
                                        <label for="komposisi_up" class="form-label">Bahan yang dibutuhkan</label>
                                        <input type="text" class="form-control text-black" id="komposisi_up" name="komposisi">
                                    </div>

                                    <!-- Tutorial -->
                                    <div class="mb-3">
                                        <label for="cara_masak_up" class="form-label">Cara Pembuatan</label>
                                        <input type="text" class="form-control text-black" id="cara_masak_up" name="cara_masak">
                                    </div>

                                    <!-- Bahan Baku -->
                                    <div class="mb-3">
                                        <label for="thumbnail_up" class="form-label">Link Gambar</label>
                                        <input type="text" class="form-control text-black" id="thumbnail_up" name="thumbnail">
                                    </div>

                                    <!-- Video -->
                                    <div class="mb-3">
                                        <label for="link_video_up" class="form-label">Link Video</label>
                                        <input type="text" class="form-control text-black" id="link_video_up" name="link_video">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn text-white" id="update" style="background-color: #E0AA3E;">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main Content -->
            <div class="row my-3 mx-5" id="content" style="background-color: #010203;"></div>

            <div class="d-grid gap-2 mt-4 mx-5">
                <button class="btn btn-primary shadow fw-bold my-auto halaman mx-3" type="submit" id="load-menu"><i class="bi bi-arrow-down-circle mx-2 fw-bold fs-5"></i>Load More</button>
            </div>

            <!-- <button class="btn btn-primary shadow fw-bold my-auto mx-3 halaman" type="submit" id="load-menu">
                <i class="bi bi-arrow-down-circle mx-2 fw-bold fs-5"></i>Load More
            </button> -->
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer" style="background-color: #010203;">
                <div class="container my-auto">
                    <div class="copyright text-center text-white my-auto">
                        <span>Copyright &copy; Food & Cook 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="ajax.js"></script>

</body>


</html>