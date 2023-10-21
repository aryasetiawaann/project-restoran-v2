
<?php
    session_start();
    require_once('./system/db.php');
    
    $sql = "SELECT * FROM menu";
    $hasil = $db->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>DeLouvre</title>
</head>
<body>
    <div class="container-fluid p-0">
        <div class="header" id="top">
            <nav class="navbar navbar-expand-lg d-flex justify-content-evenly">
                <div class="container-lg mx-md-5">
                    <a class="navbar-brand" href="./index.php">DeLouvre</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <div class="mx-auto"></div>
                        <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link me-3" aria-current="page" href="#menu">Menu</a>
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
                            <a class="nav-link" href="#">Kontak</a>
                        </li>
                        </ul>
                        <div class="position-relative d-none d-lg-block d-xl-block" style="width:min-content;">
                            <a href="keranjang.php" class="keranjang me-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M9 22C9.55228 22 10 21.5523 10 21C10 20.4477 9.55228 20 9 20C8.44772 20 8 20.4477 8 21C8 21.5523 8.44772 22 9 22Z" stroke="#B37A64" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M20 22C20.5523 22 21 21.5523 21 21C21 20.4477 20.5523 20 20 20C19.4477 20 19 20.4477 19 21C19 21.5523 19.4477 22 20 22Z" stroke="#B37A64" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M1 1H5L7.68 14.39C7.77144 14.8504 8.02191 15.264 8.38755 15.5583C8.75318 15.8526 9.2107 16.009 9.68 16H19.4C19.8693 16.009 20.3268 15.8526 20.6925 15.5583C21.0581 15.264 21.3086 14.8504 21.4 14.39L23 6H6" stroke="#B37A64" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            </a>
                            <div class="notif position-absolute d-none text-center"><p>1</p></div>
                        </div>
                        <span class="divider d-none d-lg-block d-xl-block ">|</span>
                        <a href="#" class="login-button ms-lg-3">Masuk</a>
                        <button class="register-button ms-3">Daftar</button>
                    </div>
                </div>
            </nav>
            <div class="shape"></div>
            <div class="header-body d-flex justify-content-center">
                <div class="d-flex-column">
                    <h1 class="mb-4">Epicurean French Delights</h1>
                    <p class="pe-3">Welcome to our French haven, where harmonious flavors and passion shape indulgent memories in every bite.</p>
                </div>
                <img class="croissant" src="./_assets/croissant_home.webp" alt="Croissant Home">
                <img class="bg-roti" src="./_assets/bg-roti.webp" alt="Croissant Home">
                <img class="eiffel" src="./_assets/eiffel.webp" alt="Croissant Home">
            </div>
        </div>
        <div id="top-menu" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
            <button type="button" data-bs-target="#top-menu" data-bs-slide-to="0" class="active " aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#top-menu" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#top-menu" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active c-item" data-bs-interval="3000">
                <img src="./_assets/croissant-background.webp" class="d-block w-100 c-img" alt="Slide 1">
                <div class="carousel-caption d-none d-md-block c-caption">
                <h1>Quiche with filling beef and cheese</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere perspiciatis quae cumque iusto quibusdam eligendi odio et delectus officia in quod consequatur vero voluptate, nulla velit praesentium laboriosam hic beatae.</p>
                </div>
                </div>
                <div class="carousel-item c-item" data-bs-interval="3000">
                <img src="./_assets/home_gede.webp" class="d-block w-100 c-img" alt="Slide 2">
                <div class="carousel-caption d-none d-md-block c-caption">
                <h1>Quiche with filling beef and cheese</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere perspiciatis quae cumque iusto quibusdam eligendi odio et delectus officia in quod consequatur vero voluptate, nulla velit praesentium laboriosam hic beatae.</p>
                </div>
                </div>
                <div class="carousel-item c-item" data-bs-interval="3000">
                <img src="./_assets/Salad_Jumbo.webp" class="d-block w-100 c-img" alt="Slide 3">
                <div class="carousel-caption d-none d-md-block c-caption">
                <h1>Quiche with filling beef and cheese</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere perspiciatis quae cumque iusto quibusdam eligendi odio et delectus officia in quod consequatur vero voluptate, nulla velit praesentium laboriosam hic beatae.</p>
                </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#top-menu" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#top-menu" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="menu pt-5" id="menu">
            <h3 class="menu-title">MENU</h3>
            <div class="cards-container">
                <?php while($row = $hasil->fetch(PDO::FETCH_ASSOC)) {?>
                <div class="card">
                    <a href="detail.php">
                        <img src="./_photos/<?= $row['foto']?>" alt="<?= $row['foto']?>">
                    </a>
                    <div class="card-desc">
                        <h3><?= $row['nama']?></h3>
                        <p><?= $row['detail']?></p>
                    </div>
                    <a href="keranjang.php"><button>Pesan</button></a>
                </div>
                <?php }?>
            </div>
            <div class="lihat-semua">
                <a href="./menu.php">
                    <button>Lihat Semua Menu</button>
                </a>
            </div>
        </div>
    <div><a class="go-top" href="#top"><img src="./_assets/arrow-up.webp" alt="arrow"></a></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
<footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>DeLouvre</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime enim, soluta atque ipsum non laboriosam minus? Cupiditate saepe delectus perspiciatis ullam ducimus porro nisi officiis consequuntur nulla facere, non quidem.</p>
                    <p>Informatika 2022 | Universitas Multimedia Nusantara</p>
                </div>
                <div class="col-md-3 col-6">
                    <ul class="footer-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Kategori</a></li>
                        <li><a href="#">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-6">
                    <ul class="footer-m">
                        <li><a href="#" target="_blank" rel="noopener noreferrer"><img src="./_assets/whatsapp.png" alt="Whatsapp" /></a></li>
                        <li><a href="#" target="_blank" rel="noopener noreferrer"><img src="./_assets/instagram.png" alt="Instagram" /></a></li>
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