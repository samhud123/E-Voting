<?php

// Connect Database
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'evoting2';

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// function tambah paslon
function tambahPaslon($data)
{
    global $con;

    $nama = htmlspecialchars($data['nama']);
    $no_urut = $data['no_urut'];
    $visi = htmlspecialchars($data['visi']);
    $misi = htmlspecialchars($data['misi']);

    // upload foto
    $foto = upload();

    if (!$foto) {
        return false;
    }

    // query insert data
    $query = mysqli_query($con, "INSERT INTO calon VALUES ('', '$nama', '$no_urut', '$visi', '$misi', '$foto', 0)");

    return mysqli_affected_rows($con);
}

// function upload gambar
function upload()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "
            <script>
                alert('Pilih gambar terlebih dahulu');
            </script>
        ";
        return false;
    }

    // cek apakah yang diupload adalah gambar 
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
            <script>
                alert('Yang anda upload bukan gambar');
            </script>
        ";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "
            <script>
                alert('ukuran gambar terlalu besar');
            </script>
        ";
        return false;
    }

    // lolos pengecekan gambar siap di upload
    // Generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../assets/images/paslon/' . $namaFileBaru);

    return $namaFileBaru;
}

// function tambah saksi
function tambahSaksi($data)
{
    global $con;

    $nama = strtolower(stripslashes($data["nama"]));
    $password1 = mysqli_real_escape_string($con, $data["password1"]);
    $password2 = mysqli_real_escape_string($con, $data["password2"]);

    // cek ketersediaan username 
    $result = mysqli_query($con, "SELECT nama FROM saksi WHERE nama = '$nama'");

    if (mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('nama saksi sudah terdaftar!');
                window.location.href = 'saksi.php';
            </script>
        ";
        die();
    }

    // cek konfirmasi password
    if ($password1 !== $password2) {
        echo "
            <script>
                alert('Konfirmasi password tidak sesuai!');
                window.location.href = 'saksi.php';
            </script>
        ";
        die();
    }

    // tambah saksi ke database
    $insertSaksi = mysqli_query($con, "INSERT INTO saksi VALUES ('', '$nama', '$password1')");
    
    // insert vote
    $saksi = mysqli_query($con, "SELECT * FROM saksi WHERE id_saksi IN (SELECT MAX(id_saksi) FROM saksi);");
    $idSaksi = mysqli_fetch_assoc($saksi);
    $id_saksi = $idSaksi['id_saksi'];

    $getPaslon = mysqli_query($con, "SELECT * FROM calon");
    while ($idPaslon = mysqli_fetch_array($getPaslon)) {
        $id_paslon = $idPaslon['id_paslon'];
        $insertData = mysqli_query($con, "INSERT INTO voting VALUES ('', '$id_saksi', '$id_paslon', 0)");
    }

    // insert vote rusak
    $voteRusak = mysqli_query($con, "INSERT INTO voting_rusak VALUES ('', '$id_saksi', 0)");

    return mysqli_affected_rows($con);
}
