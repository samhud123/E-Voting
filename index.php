<?php

session_start();
if (!isset($_SESSION['saksi'])) {
    header("location: login.php");
    exit();
}

$title = 'Dashboard';

require_once 'database/function.php';
?>

<?php require_once 'template/header.php' ?>
<?php require_once 'template/sidebar.php' ?>

<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <!-- Row -->
        <!-- Row -->
        <div class="text-center mb-4">
            <h2>Daftar Paslon</h2>
        </div>
        <div class="row">
            <!-- Column -->
            <?php
            $queryPaslon = mysqli_query($con, "SELECT * FROM calon");
            while ($data = mysqli_fetch_array($queryPaslon)) {
            ?>
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <!-- Column -->
                    <div class="card">
                        <img class="card-img-top" src="assets/images/background/bendera.png" alt="Card image cap">
                        <div class="card-block little-profile text-center">
                            <div class="pro-img"><img src="assets/images/paslon/<?= $data['foto']; ?>" alt="user" /></div>
                            <h3 class="m-b-0">Paslon <?= $data['no_urut']; ?></h3>
                            <p><?= $data['nama']; ?></p>
                            <!-- <a href="javascript:void(0)" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded">Follow</a> -->
                            <div class="row text-center m-t-20">
                                <div class="text-center">
                                    <h4>Visi : </h4>
                                    <p class="px-3"><?= $data['visi']; ?></p>
                                </div>
                            </div>
                            <div class="row text-center m-t-20">
                                <div class="text-center">
                                    <h4>Misi : </h4>
                                    <p class="px-3"><?= $data['misi']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
            <?php
            }
            ?>

        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<?php require_once 'template/footer.php' ?>