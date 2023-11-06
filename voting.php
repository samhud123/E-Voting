<?php

session_start();
if (!isset($_SESSION['saksi'])) {
    header("location: login.php");
    exit();
}

$title = 'E-Voting';

require_once 'database/function.php';

$id_saksi = $_SESSION['id_saksi'];

if (isset($_POST['vote'])) {
    $id_paslon = $_POST['id_paslon'];
    $saksi = $id_saksi;

    $queryVote = mysqli_query($con, "UPDATE voting SET jumlah = jumlah+1 WHERE id_paslon = $id_paslon AND id_saksi = $saksi");
    header("Location: voting.php");
}

if (isset($_POST['voteRusak'])) {
    $saksi = $id_saksi;

    $queryUpdate = mysqli_query($con, "UPDATE voting_rusak SET jumlah = jumlah+1 WHERE id_saksi = $saksi");
    header("Location: voting.php");
}

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
                <h3 class="text-themecolor m-b-0 m-t-0">Voting</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Voting</li>
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
        <!-- <div class="text-center mb-4">
            <h2>E-Voting</h2>
        </div> -->
        <div class="row">
            <?php
            $queryPaslon = mysqli_query($con, "SELECT calon.*, voting.* FROM calon, voting WHERE calon.id_paslon = voting.id_paslon AND id_saksi = $id_saksi");
            while ($data = mysqli_fetch_array($queryPaslon)) {
            ?>
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-block">
                            <center class="m-t-30"> <img src="assets/images/paslon/<?= $data['foto']; ?>" class="img-circle" width="150" />
                                <h4 class="card-title m-t-10">Paslon <?= $data['no_urut']; ?></h4>
                                <p><?= $data['nama']; ?></p>
                                <form action="" method="post">
                                    <input type="hidden" name="id_paslon" value="<?= $data['id_paslon']; ?>">
                                    <button type="submit" class="btn btn-success w-100" name="vote" style="font-size: 18px;">Vote +</button>
                                </form>
                                <h3 class="mt-3"><i class="icon-people"></i> <?= $data['jumlah']; ?></h3>
                            </center>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

        <div class="card">
            <form action="" method="post">
                <button type="submit" name="voteRusak" class="btn btn-danger w-100" style="font-size: 18px;">Suara Rusak <i class="mdi mdi-file"></i></button>
            </form>
            <center class="mt-3">
                <?php
                $queryVoteRusak = mysqli_query($con, "SELECT jumlah FROM voting_rusak WHERE id_saksi = $id_saksi");
                $dataVoteRusak = mysqli_fetch_array($queryVoteRusak);
                if ($dataVoteRusak['jumlah'] !== NULL) {
                ?>
                    <h3><i class="mdi mdi-file-excel-box"></i> <?= $dataVoteRusak['jumlah']; ?></h3>
                <?php
                }
                ?>
            </center>
        </div>


        <div class="row">
            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <canvas id="myChart1" style="height:38vh; width:40vw" class="p-4"></canvas>
                </div>
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="card">
                    <div>
                        <canvas id="myChart2" style="height:20vh; width:40vw" class="p-4"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
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