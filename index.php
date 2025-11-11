<?php include("backend.php"); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Komponen Elektronik</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">📦 Data Komponen Elektronik</a>
  </div>
</nav>

<div class="container">
  <div class="row">
    <!-- Form Input -->
    <div class="col-md-4">
      <div class="card shadow-sm mb-4">
        <div class="card-header bg-info text-white">Tambah / Edit Komponen</div>
        <div class="card-body">
          <?php if ($error) { ?>
            <div class="alert alert-danger"><?php echo $error ?></div>
            <?php header("refresh:3;url=index.php"); ?>
          <?php } ?>
          <?php if ($sukses) { ?>
            <div class="alert alert-success"><?php echo $sukses ?></div>
            <?php header("refresh:3;url=index.php"); ?>
          <?php } ?>

          <form action="" method="POST">
            <div class="mb-3">
              <label class="form-label">Nama Komponen</label>
              <input type="text" class="form-control" name="nama_komponen" value="<?php echo $nama_komponen ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Jenis</label>
              <input type="text" class="form-control" name="jenis" value="<?php echo $jenis ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Jumlah Stok</label>
              <input type="number" class="form-control" name="jumlah_stok" value="<?php echo $jumlah_stok ?>">
            </div>
            <button type="submit" name="simpan" class="btn btn-primary w-100">💾 Simpan</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Data Tabel -->
    <div class="col-md-8">
      <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white">Daftar Komponen</div>
        <div class="card-body">
          <table class="table table-striped table-hover">
            <thead class="table-dark">
              <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Stok</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql2 = "SELECT * FROM data_komponen ORDER BY id_komponen DESC";
              $q2   = mysqli_query($koneksi, $sql2);
              $urut = 1;
              while ($r2 = mysqli_fetch_array($q2)) {
                $id_komponen   = $r2['id_komponen'];
                $nama_komponen = $r2['nama_komponen'];
                $jenis         = $r2['jenis'];
                $jumlah_stok   = $r2['jumlah_stok'];
              ?>
              <tr>
                <td><?php echo $urut++ ?></td>
                <td><?php echo $nama_komponen ?></td>
                <td><?php echo $jenis ?></td>
                <td><?php echo $jumlah_stok ?></td>
                <td>
                  <a href="index.php?op=edit&id=<?php echo $id_komponen ?>" class="btn btn-warning btn-sm">✏️ Edit</a>
                  <a href="index.php?op=delete&id=<?php echo $id_komponen ?>" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">🗑️ Delete</a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
