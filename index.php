<?php include("backend.php"); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Komponen Elektronik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="mx-auto">
    <!-- Form input data -->
    <div class="card">
        <div class="card-header">Create / Edit Data Komponen</div>
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
                <div class="mb-3 row">
                    <label for="nama_komponen" class="col-sm-3 col-form-label">Nama Komponen</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama_komponen" name="nama_komponen" value="<?php echo $nama_komponen ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jenis" class="col-sm-3 col-form-label">Jenis</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="jenis" name="jenis" value="<?php echo $jenis ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jumlah_stok" class="col-sm-3 col-form-label">Jumlah Stok</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="jumlah_stok" name="jumlah_stok" value="<?php echo $jumlah_stok ?>">
                    </div>
                </div>
                <div class="col-12">
                    <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>

    <!-- Menampilkan data -->
    <div class="card">
        <div class="card-header bg-secondary text-white">Data Komponen Elektronik</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Komponen</th>
                        <th>Jenis</th>
                        <th>Jumlah Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql2   = "SELECT * FROM data_komponen ORDER BY id_komponen DESC";
                    $q2     = mysqli_query($koneksi, $sql2);
                    $urut   = 1;
                    while ($r2 = mysqli_fetch_array($q2)) {
                        $id_komponen   = $r2['id_komponen'];
                        $nama_komponen = $r2['nama_komponen'];
                        $jenis         = $r2['jenis'];
                        $jumlah_stok   = $r2['jumlah_stok'];
                    ?>
                    <tr>
                        <th><?php echo $urut++ ?></th>
                        <td><?php echo $nama_komponen ?></td>
                        <td><?php echo $jenis ?></td>
                        <td><?php echo $jumlah_stok ?></td>
                        <td>
                            <a href="index.php?op=edit&id=<?php echo $id_komponen ?>"><button class="btn btn-warning btn-sm">Edit</button></a>
                            <a href="index.php?op=delete&id=<?php echo $id_komponen ?>" onclick="return confirm('Yakin hapus data ini?')"><button class="btn btn-danger btn-sm">Delete</button></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
