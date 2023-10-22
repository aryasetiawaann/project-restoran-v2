<?php
session_start();
require_once('../system/db.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM menu WHERE id = ?";
    
    $stmt = $db->prepare($sql);
    $data = [$id];
    $stmt->execute($data);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $_SESSION['foto_awal'] = $row['foto'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>DeLouvre | Admin Page</title>
</head>
<body>
<?php
            if(!isset($_SESSION['role']) || $_SESSION['role'] != 'Admin' || $_SESSION['role'] == ''){
                echo '
                <div class="announce container text-center">
                <h1 class="mt-5">Kamu Tidak Memiliki Akses Ke Page Ini</h1>
                <a href="../index.php"><button class="mt-3">Kembali</button></a>
                </div>
                <div class="edit-admin_container d-none">
                ';
            }else if($_SESSION['role'] == 'Admin'){
                echo '<div class="edit-admin_container">';
            }
    ?>

<nav class="navbar navbar-expand-lg sticky-top shadow-sm d-flex justify-content-evenly">
            <div class="container-lg mx-md-5">
                <a class="navbar-brand" href="home_admin.php">DeLouvre <span>| Admin Page</span></a>
                <a href="../logout.php">
                    <button class="logout-button ms-3">Logout</button>
                </a>
            </div>
        </nav>
        <div class="greeting">
            <h3>Edit Menu</h3>
        </div>
        <div class="shadow admin-form">
            <?php if(isset($_GET['error'])){ ?>
                <div class="error alert alert-danger text-center" role="alert">
                    <?php echo $_GET['error'];?>
                </div>
            <?php } ?>
            <form action="../system/crud.php" method="post" enctype="multipart/form-data">
                <div class="mb-3 d-lg-flex justify-content-center">
                    <div>
                        <label for="nama-menu" class="form-label">Nama Menu</label>
                        <input name="nama" type="text" class="form-control" id="nama-menu" value="<?= $row['nama'] ?>">
                    </div>
                    <div class="ms-lg-3">
                        <label for="kategori-menu" class="form-label">Kategori</label>
                        <select name="kategori" class="form-select" id="kategori-menu" aria-label="Default select example">
                            <option <?= $row['kategori'] == '' ? 'selected' : '' ?>>Pilih Kategori</option>
                            <option value="Main Course" <?= $row['kategori'] == 'Main Course' ? 'selected' : '' ?>>Main Course</option>
                            <option value="Dessert" <?= $row['kategori'] == 'Dessert' ? 'selected' : '' ?>>Dessert</option>
                            <option value="Drinks" <?= $row['kategori'] == 'Drinks' ? 'selected' : '' ?>>Drinks</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="deskripsi-menu" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi-menu" rows="5"><?= $row['detail'] ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="harga-menu" class="form-label">Harga</label>
                    <input name="harga" type="number" class="form-control" id="harga-menu" value="<?= $row['harga'] ?>">
                </div>
                <div class="mb-3">
                    <label for="foto-menu" class="form-label">Gambar</label>
                    <input name="foto" type="file" class="form-control" id="foto-menu">
                </div>
                <div class="text-center">
                    <input type="hidden" name="editData">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>" >
                    <button class="text-center" type="submit">Simpan</button>
                </div>
            
                
            </form>
        </div>
    </div>
</body>
</html>