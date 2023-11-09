<?php

session_start();
if (!isset($_SESSION['admin'])) {
    header("location: login.php");
    exit();
}

$title = 'Profile';

require_once '../database/function.php';

$idAdmin = $_SESSION['id_admin'];
$getDataAdmin = mysqli_query($con, "SELECT * FROM admin WHERE id_admin = $idAdmin");
$dataAdmin = mysqli_fetch_array($getDataAdmin);

if (isset($_POST['update'])) {
    updateAdmin($_POST);
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
                <h3 class="text-themecolor m-b-0 m-t-0">Profile</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-block">
                        <center class="m-t-30"> <img src="../assets/images/users/photo.png" class="img-circle mb-3" width="150" />
                            <h4 class="card-title m-t-10"><?= $dataAdmin['nama']; ?></h4>
                        </center>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-block">
                        <form class="form-horizontal form-material" action="" method="post">
                            <input type="hidden" name="id_admin" id="id_admin" value="<?= $idAdmin; ?>">
                            <div class="form-group">
                                <label class="col-md-12">Nama</label>
                                <div class="col-md-12">
                                    <input type="text" name="nama" class="form-control form-control-line" value="<?= $dataAdmin['nama']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Password Lama</label>
                                <div class="col-md-12">
                                    <input type="password" class="form-control form-control-line" name="password_lama" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Password Baru</label>
                                <div class="col-md-12">
                                    <input type="password" class="form-control form-control-line" name="password_baru" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success" type="submit" name="update">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
    </div>
</div>
<?php require_once 'template/footer.php' ?>