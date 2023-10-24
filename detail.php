<?php
    session_start();
    require_once('./system/db.php');

    $id = $_GET['id'];
    $sql = "SELECT * FROM menu WHERE id = $id";
    
    $hasil = $db->query($sql);
    $hasil = $hasil->fetch(PDO::FETCH_ASSOC);

    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];

        $sql2 = "SELECT COUNT(*) AS 'jumlah' FROM cart WHERE id_user = ?;";

        $stmt = $db->prepare($sql2);
        $data = [$user_id];
        $stmt->execute($data);
        $count = $stmt->fetch(PDO::FETCH_ASSOC);
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
    <title>Restoran IF330 - DeLouvre</title>
</head>
<body>
<div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg d-flex shadow-sm justify-content-evenly">
                <div class="container-lg mx-md-5">
                    <a class="navbar-brand" href="./index.php">DeLouvre</a>
                    <div class="keranjang-hp position-relative d-block d-lg-none">
                            <a href="keranjang.php" class="keranjang me-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M9 22C9.55228 22 10 21.5523 10 21C10 20.4477 9.55228 20 9 20C8.44772 20 8 20.4477 8 21C8 21.5523 8.44772 22 9 22Z" stroke="#B37A64" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M20 22C20.5523 22 21 21.5523 21 21C21 20.4477 20.5523 20 20 20C19.4477 20 19 20.4477 19 21C19 21.5523 19.4477 22 20 22Z" stroke="#B37A64" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M1 1H5L7.68 14.39C7.77144 14.8504 8.02191 15.264 8.38755 15.5583C8.75318 15.8526 9.2107 16.009 9.68 16H19.4C19.8693 16.009 20.3268 15.8526 20.6925 15.5583C21.0581 15.264 21.3086 14.8504 21.4 14.39L23 6H6" stroke="#B37A64" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            </a>
                            <div class="notif position-absolute <?php if(!isset($count['jumlah']) || $count['jumlah'] == 0) echo 'd-none';?> text-center"><p><?= $count['jumlah']?></p></div>
                        </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <div class="mx-auto"></div>
                        <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link me-3" aria-current="page" href="./menu.php">Menu</a>
                        </li>
                        <li class="nav-item dropdown me-3">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Kategori</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="./menu.php">Semua</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="./menu.php?sort=main-course">Main Course</a></li>
                                <li><a class="dropdown-item" href="./menu.php?sort=dessert">Dessert</a></li>
                                <li><a class="dropdown-item" href="./menu.php?sort=drinks">Drinks</a></li>
                            </ul>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link" href="mailto:makabahagia@gmail.com">Kontak</a>
                        </li>
                        </ul>
                        <div class="position-relative d-none d-lg-block d-xl-block" style="width:min-content;">
                            <a href="keranjang.php" class="keranjang me-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M9 22C9.55228 22 10 21.5523 10 21C10 20.4477 9.55228 20 9 20C8.44772 20 8 20.4477 8 21C8 21.5523 8.44772 22 9 22Z" stroke="#B37A64" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M20 22C20.5523 22 21 21.5523 21 21C21 20.4477 20.5523 20 20 20C19.4477 20 19 20.4477 19 21C19 21.5523 19.4477 22 20 22Z" stroke="#B37A64" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M1 1H5L7.68 14.39C7.77144 14.8504 8.02191 15.264 8.38755 15.5583C8.75318 15.8526 9.2107 16.009 9.68 16H19.4C19.8693 16.009 20.3268 15.8526 20.6925 15.5583C21.0581 15.264 21.3086 14.8504 21.4 14.39L23 6H6" stroke="#B37A64" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            </a>
                            <div class="notif position-absolute <?php if(!isset($count['jumlah']) || $count['jumlah'] == 0) echo 'd-none';?> text-center"><p><?= $count['jumlah']?></p></div>
                        </div>
                        <span class="divider d-none d-lg-block d-xl-block ">|</span>
                        <?php if(isset($_SESSION['user_id'])){
                            echo '<a href="./logout.php"><button class="register-button ms-3">Logout</button></a>
                            <u class="nav-greet ms-2 my-auto">Hallo, ' . $_SESSION['username'] . '!</u>';
                        }else{
                            echo '<a href="#" class="login-button ms-lg-3">Masuk</a>
                            <a href="./register.php"><button class="register-button ms-3">Daftar</button></a>';
                        }?>
                    </div>
                </div>
            </nav>
        <div class="detail-container d-flex flex-column flex-lg-row flex-xl-row flex-xxl-row 
        align-items-center align-items-lg-start justify-lg-content-evenly">
            <div class=" detail-left">
                <img src="./_photos/<?= $hasil['foto']?>" alt="<?= $hasil['foto']?>">
                <a <?php echo 'href="./system/crud.php?add-id=' . $hasil['id'] . '"';?>><button>Pesan</button></a>
            </div>
            <div class=" detail-right text-center text-lg-start">
                <h1><?= $hasil['nama']?></h1>
                <div>
                    <p><b>Harga:</b> Rp.<?= number_format($hasil['harga'],0, ',', '.') ?></p>
                    <p><b>Kategori:</b> <?= $hasil['kategori'] ?></p>
                    <p><b>Deskripsi:</b><br><?= $hasil['detail']?></p>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>DeLouvre</h3>
                    <p>DeLouvre, sebuah website yang menawarkan kuliner khas Prancis terbaik. Menu kami mencakup hidangan-hidangan ikonik Prancis, dari escargot hingga crème brûlée, cocok untuk penikmat kuliner Prancis atau yang ingin menjelajahi citarasa Prancis. Selamat datang di dunia kuliner Prancis.</p>
                    <p>Informatika 2022 | Universitas Multimedia Nusantara</p>
                </div>
                <div class="col-md-3 col-6">
                    <ul class="footer-links">
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="./menu.php">Kategori</a></li>
                        <li><a href="mailto:makabahagia@gmail.com">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-6">
                    <ul class="footer-m">
                        <li><a href="#" target="_blank" rel="noopener noreferrer"><img src="./_assets/whatsapp.png" alt="Whatsapp" /></a></li>
                        <li><a href="https://instagram.com/makabahagia.23?igshid=OGQ5ZDc2ODk2ZA==" target="_blank" rel="noopener noreferrer"><img src="./_assets/instagram.png" alt="Instagram" /></a></li>
                        <li><a href="#" target="_blank" rel="noopener noreferrer"><img src="./_assets/twitter.png" alt="twitter" /></a></li>
                    </ul>
                </div>
                <hr>
                <div class="copyright">
                    <p>Copyright &copy; 2023 MAKA Bahagia. Hak Cipta Dilindungi | IF330.</p>
                </div>
            </div>
        </div>
    </footer>
</html>