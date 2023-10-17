<?php
  
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
    <div class="create-admin_container">
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
                <input type="text" name="nama">
                <br>
                <label>Kategori</label>
                <select name="kategori">
                    <option value="" disabled selected>Pilih Kategori</option>
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
                <input type="hidden" name="addData">
                <button type="submit">Simpan</button>
            </form>
        </div>
    </div>
</body>
</html>