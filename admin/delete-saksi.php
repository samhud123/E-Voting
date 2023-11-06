<?php 

session_start();

if (!isset($_SESSION['admin'])) {
    header("location: login.php");
    exit();
}

require_once '../database/function.php';

$id_paslon = $_GET['p'];

if ( hapusSaksi($id_paslon) > 0 ) {
    echo "
        <script>
            alert('data berhasil dihapus!');
            document.location.href = 'index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('data gagal dihapus!');
            document.location.href = 'index.php';
        </script>
    ";
}
