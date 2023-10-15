<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nama Restoran | Dashboard</title>
</head>
<body>
    <div class="home-admin_container">
        <div class="navbar"></div>
        <form action="proses.php" method="post" enctype="multipart/form-data">
            <label>Nama Menu</label>
            <input type="text" name="nama">
            <br>
            <label>Kategori</label>
            <select name="kategori">
                <option value="Makanan">Makanan</option>
                <option value="Minuman">Minuman</option>
                <option value="Lainnya">Lainnya</option>
            </select>
            <br>
            <label>Deskripsi</label>
            <textarea name="deskripsi" cols="35" rows="5"></textarea>
            <br>
            <label>Harga</label>
            <input type="number" name="harga">
            <br>
            <label>Foto</label>
            <input type="file" name="foto">
        </form>
    </div>
</body>
</html>