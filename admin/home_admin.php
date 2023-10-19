<?php
  
  require_once('../system/db.php');

  $sql = "SELECT * FROM menu";

  $hasil = $db->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
     crossorigin="anonymous">
    <title>Nama Restoran | Admin Page</title>
</head>
<body>
    <div class="home-admin_container">
        <div class="navbar">
            <div><a href="home_admin.php">Logo</a></div>
            <button>Logout</button> 
        </div>
        <button><a href="create_admin.php">Tambah+</a></button>
        <div class="admin_card-container">
            <?php while($row = $hasil->fetch(PDO::FETCH_ASSOC)){ ?>
            <div class="card">
                <img src="../_photos/<?= $row['foto'] ?>" alt="<?= $row['nama'] ?>">
                <div class="card-body">
                    <h3><?= $row['nama'] ?></h3>
                    <p>Rp.<?= number_format($row['harga'],0, ',', '.') ?></p>
                    <p><?= $row['detail'] ?></p>
                </div>
                <div class="card-buttons">
                    <form action="edit_admin.php" method="get">
                          <input type="hidden" name="id" value="<?= $row['id'] ?>">
                          <button type="submit">Edit</button>
                    </form>
                    <form action="../system/crud.php" method="post">
                          <input type="hidden" name="deleteData">
                          <input type="hidden" name="id" value="<?= $row['id'] ?>">
                          <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus ini?')">Delete</button>
                    </form>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
     crossorigin="anonymous"></script>
</body>
</html>