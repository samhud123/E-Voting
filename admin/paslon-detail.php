<?php

session_start();
if (!isset($_SESSION['admin'])) {
    header("location: login.php");
    exit();
}

$title = 'Edit-Paslon';

require_once '../database/function.php';

$id_paslon = $_GET['p'];
$detailPaslon = mysqli_query($con, "SELECT * FROM calon WHERE id_paslon = $id_paslon");
$data = mysqli_fetch_array($detailPaslon);

if (isset($_POST['btnSimpan'])) {
    if (tambahPaslon($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    }
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
                <h3 class="text-themecolor">Tambah Paslon</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Tambah Paslon</li>
                </ol>
            </div>
        </div>

        <div>
            <div class="card p-3">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Paslon</label>
                        <input type="text" class="form-control" name="nama" id="nama" required value="<?= $data['nama']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="no_urut" class="form-label">No Urut</label>
                        <input type="number" name="no_urut" class="form-control" required value="<?= $data['no_urut']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="visi" class="form-label">Visi</label>
                        <textarea class="form-control" id="visi" rows="3" name="visi" required><?= $data['visi']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="misi" class="form-label">Misi</label>
                        <textarea class="form-control" id="misi" rows="5" name="misi" required><?= $data['misi']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Foto</label><br>
                        <img src="../assets/images/paslon/<?= $data['foto']; ?>" alt="" width="150px">
                    </div>
                    <div class="mb-3">
                        <label for="fotoBaru" class="form-label">Ganti Foto</label><br>
                        <input type="file" name="fotoBaru" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-info" name="btnSimpan">Simpan</button>
                        <a href="index.php" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once 'template/footer.php' ?>