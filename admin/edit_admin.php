<?php
session_start();
require_once('../system/db.php');

$id = $_GET['id'];

$sql = "SELECT * FROM menu WHERE id = ?";

$stmt = $db->prepare($sql);
$data = [$id];
$stmt->execute($data);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$_SESSION['foto_awal'] = $row['foto'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Nama Restoran | Admin Page</title>
</head>
<body>
<div class="edit-admin_container">
        <div class="navbar">
            <div><a href="home_admin.php">Logo</a></div>
            <button>Login/ logout</button>
        </div>
        <div>
            <?php if(isset($_GET['error'])){ ?>
                <p class="error"><?php echo $_GET['error'];?></p>
            <?php } ?>
            <form action="../system/crud.php" method="post" enctype="multipart/form-data">
                <label>Nama Menu</label>
                <input type="text" name="nama" value="<?= $row['nama'] ?>">
                <br>
                <label>Kategori</label>
                <select name="kategori">
                    <option value="" <?= $row['kategori'] == '' ? 'selected' : '' ?> disabled selected>Pilih Kategori</option>
                    <option value="Makanan" <?= $row['kategori'] == 'Makanan' ? 'selected' : '' ?> >Makanan</option>
                    <option value="Minuman" <?= $row['kategori'] == 'Minuman' ? 'selected' : '' ?> >Minuman</option>
                    <option value="Lainnya" <?= $row['kategori'] == 'Lainnya' ? 'selected' : '' ?> >Lainnya</option>
                </select>
                <br>
                <label>Deskripsi</label>
                <textarea name="deskripsi" cols="35" rows="5"><?= $row['detail'] ?></textarea>
                <br>
                <label>Harga</label>
                <input type="number" name="harga" value="<?= $row['harga'] ?>">
                <br>
                <label>Foto</label>
                <input type="file" name="foto">
                <input type="hidden" name="editData">
                <input type="hidden" name="id" value="<?= $row['id'] ?>" >
                <button type="submit">Simpan</button>
            </form>
        </div>
    </div>
</body>
</html>