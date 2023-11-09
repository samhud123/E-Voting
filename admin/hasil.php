<?php

session_start();
if (!isset($_SESSION['admin'])) {
    header("location: login.php");
    exit();
}

$title = 'Hasil';

require_once '../database/function.php';

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
                <h3 class="text-themecolor m-b-0 m-t-0">Hasil Voting</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Hasil Voting</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <!-- column -->
            <div class="col-lg-12">
                <?php
                $getSaksi = mysqli_query($con, "SELECT * FROM saksi");
                while ($dataSaksi = mysqli_fetch_array($getSaksi)) {
                    $idSaksi = $dataSaksi['id_saksi'];
                ?>
                    <div class="card">
                        <div class="card-block">
                            <h3 class="card-title"><?= $dataSaksi['nama']; ?></h3>
                            <!-- <button class="btn btn-info mb-3">Cetak Hasil</button> -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No Urut</th>
                                            <th>Foto</th>
                                            <th>Nama Paslon</th>
                                            <th>Jumlah Suara</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $getPaslon = mysqli_query($con, "SELECT calon.no_urut, calon.nama, calon.foto, voting.jumlah FROM calon, voting WHERE calon.id_paslon = voting.id_paslon AND voting.id_saksi = $idSaksi");
                                        while ($data = mysqli_fetch_array($getPaslon)) {
                                        ?>
                                            <tr>
                                                <td><?= $data['no_urut']; ?></td>
                                                <td>
                                                    <img src="../assets/images/paslon/<?= $data['foto']; ?>" alt="" width="80px">
                                                </td>
                                                <td><?= $data['nama']; ?></td>
                                                <td><?= $data['jumlah']; ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-block">
                                    <?php
                                    $getDataRusak = mysqli_query($con, "SELECT jumlah FROM voting_rusak WHERE id_saksi = $idSaksi");
                                    $dataRusak = mysqli_fetch_array($getDataRusak);
                                    ?>
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <h4 class="card-title">Suara Rusak</h4>
                                        </div>
                                        <div class="col-lg-1">
                                            =
                                        </div>
                                        <div class="col-lg-4 text-center">
                                            <h4 class="card-title"><?= $dataRusak['jumlah']; ?></h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php
                                        $getDataVoting = mysqli_query($con, "SELECT SUM(jumlah) as 'jumlah' FROM voting WHERE id_saksi = $idSaksi");
                                        $dataVoting = mysqli_fetch_array($getDataVoting);
                                        ?>
                                        <div class="col-lg-7">
                                            <h4 class="card-title">Total Suara</h4>
                                        </div>
                                        <div class="col-lg-1">
                                            =
                                        </div>
                                        <div class="col-lg-4 text-center">
                                            <h4 class="card-title"><?= $dataVoting['jumlah'] + $dataRusak['jumlah']; ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                <?php
                }
                ?>
            </div>

        </div>
    </div>
</div>
<?php require_once 'template/footer.php' ?>