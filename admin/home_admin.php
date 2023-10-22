<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<?php
  session_start();
  require_once('../system/db.php');


if(isset($_GET['sort'])){

    if($_GET['sort'] == 'main-course'){
        $sql = "SELECT * FROM menu WHERE kategori = 'Main Course'";
    }else if($_GET['sort'] == 'dessert'){
        $sql = "SELECT * FROM menu WHERE kategori = 'Dessert'";
    }else if($_GET['sort'] == 'drinks'){
        $sql = "SELECT * FROM menu WHERE kategori = 'Drinks'";
    }
}else{
    $sql = "SELECT * FROM menu";
}

  $hasil = $db->query($sql);
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
    <div id="top"></div>
    <?php
            if(!isset($_SESSION['role']) || $_SESSION['role'] != 'Admin' || $_SESSION['role'] == ''){
                echo '
                <div class="announce container text-center">
                <h1 class="mt-5">Kamu Tidak Memiliki Akses Ke Page Ini</h1>
                <a href="../index.php"><button class="mt-3">Kembali</button></a>
                </div>
                <div class="home-admin_container d-none">
                ';
            }else if($_SESSION['role'] == 'Admin'){
                echo '<div class="home-admin_container">';
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
        <div class="list-menu">
            <div class="menu-greeting">
                <h3>Halo, <?php echo $_SESSION['username']?>! Selamat Datang di Halaman Admin</h3>
            </div>
            <div class="menu-buttons d-flex justify-content-lg-end justify-content-md-end justify-content-center mb-2">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sort
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="home_admin.php">Semua</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="home_admin.php?sort=main-course">Main Course</a></li>
                        <li><a class="dropdown-item" href="home_admin.php?sort=dessert">Dessert</a></li>
                        <li><a class="dropdown-item" href="home_admin.php?sort=drinks">Drinks</a></li>
                    </ul>
                </div>
                <a href="create_admin.php">
                    <button class="ms-2">Tambah</button>
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="table container table-striped border border-dark border-2">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Harga</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1; 
                        while($row = $hasil->fetch(PDO::FETCH_ASSOC)){ 
                        ?>
                        <tr class="table-list">
                        <th scope="row"><?php echo $count ?></th>
                        <td><img src="../_photos/<?= $row['foto'] ?>" alt="<?= $row['nama'] ?>"></td>
                        <td><h5><?= $row['nama'] ?></h5></td>
                        <td colspan="5"><p><?= $row['detail'] ?></p></td>
                        <td><p><?= $row['kategori'] ?></p></td>
                        <td><p>Rp.<?= number_format($row['harga'],0, ',', '.') ?></p></td>
                        <td>
                            <form action="edit_admin.php" method="get">
                                  <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                  <button type="submit">Edit</button>
                            </form>
                            <form action="../system/crud.php" method="post">
                                  <input type="hidden" name="deleteData">
                                  <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                  <input type="hidden" name="foto" value="<?= $row['foto'] ?>">
                                  <button type="submit" onclick="return  confirm('Apakah anda yakin ingin menghapus ini?')" >Delete</button>
                            </form>
                        </td>
                        </tr>
                    <?php $count += 1; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div><a class="go-top" href="#top"><img src="../_assets/arrow-up.webp" alt="arrow"></a></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
     crossorigin="anonymous"></script>
</body>
</html>