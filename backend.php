<?php
// Koneksi Database
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "komponen_elektronik";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Tidak bisa terkoneksi ke database");
}

$id_komponen   = "";
$nama_komponen = "";
$jenis         = "";
$jumlah_stok   = "";
$sukses        = "";
$error         = "";

$op = isset($_GET['op']) ? $_GET['op'] : "";

// Hapus data
if ($op == 'delete') {
    $id   = $_GET['id'];
    $sql1 = "DELETE FROM data_komponen WHERE id_komponen = '$id'";
    $q1   = mysqli_query($koneksi, $sql1);
    $sukses = $q1 ? "Berhasil hapus data" : "Gagal melakukan delete data";
}

// Edit data
if ($op == 'edit') {
    $id   = $_GET['id'];
    $sql1 = "SELECT * FROM data_komponen WHERE id_komponen = '$id'";
    $q1   = mysqli_query($koneksi, $sql1);
    $r1   = mysqli_fetch_array($q1);
    $nama_komponen = $r1['nama_komponen'];
    $jenis         = $r1['jenis'];
    $jumlah_stok   = $r1['jumlah_stok'];

    if ($nama_komponen == '') {
        $error = "Data tidak ditemukan";
    }
}

// Simpan data (Create/Update)
if (isset($_POST['simpan'])) {
    $nama_komponen = $_POST['nama_komponen'];
    $jenis         = $_POST['jenis'];
    $jumlah_stok   = $_POST['jumlah_stok'];

    if ($nama_komponen && $jenis && $jumlah_stok) {
        if ($op == 'edit') {
            $sql1 = "UPDATE data_komponen SET 
                        nama_komponen='$nama_komponen',
                        jenis='$jenis',
                        jumlah_stok='$jumlah_stok' 
                        WHERE id_komponen='$id'";
            $q1   = mysqli_query($koneksi, $sql1);
            $sukses = $q1 ? "Data berhasil diupdate" : "Data gagal diupdate";
        } else {
            $sql1 = "INSERT INTO data_komponen(nama_komponen, jenis, jumlah_stok) 
                     VALUES ('$nama_komponen','$jenis','$jumlah_stok')";
            $q1   = mysqli_query($koneksi, $sql1);
            $sukses = $q1 ? "Berhasil memasukkan data baru" : "Gagal memasukkan data";
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}
?>
