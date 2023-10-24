-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Okt 2023 pada 08.59
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `detail` varchar(500) DEFAULT NULL,
  `harga` int(10) UNSIGNED NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `kategori` enum('Main Course','Dessert','Drinks') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `nama`, `detail`, `harga`, `foto`, `kategori`) VALUES
(12, 'Ratatouille', 'Sup sayuran dari Perancis Selatan yang biasanya dimakan sebagai sayuran musim panas di puncak musim matang mereka, secara tradisional dibuat dengan tomat, zucchini, paprika, bawang, dan terong. Nikmati apa adanya atau dengan protein apa pun; sajikan hangat atau pada suhu kamar di atas pasta atau polenta, disendok di atas roti, atau apa pun yang Anda inginkan.', 50000, 'Rataouille.png', 'Main Course'),
(13, 'Salade Niçoise', 'Hidangan salad yang berasal dari kota Nice di wilayah Côte d\'Azur di Perancis. Hidangan ini terkenal karena menggabungkan berbagai bahan segar, seperti sayuran, ikan tuna, telur, kentang, dan bahan lainnya dalam satu hidangan yang lezat.', 60000, 'Salade_Niçoise.png', 'Main Course'),
(14, 'Bouillabaisse', 'Hidangan sup ikan yang berasal dari wilayah pesisir Provence, Perancis, khususnya dari kota Marseille. Hidangan ini terkenal akan rasa yang kaya dan berasa laut, dan umumnya terdiri dari berbagai jenis ikan dan seafood yang dimasak bersama-sama dalam kaldu ikan yang kaya rasa. Bouillabaisse biasanya disajikan dengan saus tomat dan bumbu yang kaya.\r\n', 80000, 'Bouillabaisse.png', 'Main Course'),
(15, 'Escargot', 'Hidangan Perancis yang terkenal dan khas, terbuat dari siput darat yang dimasak dan disajikan dalam cangkir atau cangkir keramik khusus. Hidangan ini biasanya dihidangkan sebagai hidangan pembuka (appetizer) di restoran Perancis. Siput darat yang paling sering digunakan dalam hidangan ini adalah siput darat yang dikenal dengan nama \"Helix pomatia.\"', 40000, 'escargot.png', 'Main Course'),
(16, 'Cassoulet', 'Hidangan tradisional Perancis yang merupakan jenis dari hidangan berbahan dasar kacang putih yang dimasak bersama dengan daging dan sosis. Hidangan ini berasal dari wilayah Languedoc di selatan Perancis dan terkenal akan rasa yang kaya dan gurih.', 50000, 'Cassoulet.png', 'Main Course'),
(17, 'Sole Meunière', 'hidangan Perancis yang sederhana dan klasik yang terdiri dari ikan sole (biasanya ikan sole khusus yang disebut \"Dover sole\") yang digoreng dengan mentega dan lemon. Hidangan ini dikenal dengan rasa yang lezat dan sederhana, serta merupakan hidangan yang sering dijumpai di restoran-restoran Perancis.', 80000, 'Sole.png', 'Main Course'),
(18, 'Blanquette de Veau', 'Hidangan klasik Perancis yang terbuat dari daging sapi muda (biasanya dari daging sapi muda jantan) yang dimasak dengan saus putih yang kaya dan krim. Hidangan ini berasal dari Perancis dan merupakan hidangan yang cocok untuk musim dingin, dengan rasa gurih dan kaya yang sangat memanjakan.', 70000, 'Blanquette_de_Veau.png', 'Main Course'),
(19, 'Chateaubriand', 'Hidangan daging yang sangat mewah yang terbuat dari filet mignon, yaitu potongan paling lembut dan berharga dari daging sapi. Hidangan ini dinamai dari François-René de Chateaubriand, seorang penulis terkenal dan politikus Perancis yang hidup pada abad ke-18 dan abad ke-19.', 70000, 'Chateaubriand.png', 'Main Course'),
(20, 'Crème Brûlée', 'Hidangan penutup Perancis yang terkenal dengan tekstur lembut dan manisnya, serta kerak karamel yang renyah di atasnya. Nama \"Crème Brûlée\" sendiri berasal dari bahasa Perancis, yang artinya \"krim yang dibakar\" atau \"krim gosong.\"', 20000, 'Crème_brûlée.png', 'Dessert'),
(21, 'Tarte Tatin', 'Hidangan penutup klasik Perancis yang terkenal dengan rasa manisnya. Hidangan ini terdiri dari apel yang telah dikaramelkan dan dipanggang di atas lapisan adonan pastry yang renyah. Tarte Tatin sering disajikan terbalik, dengan apel yang berada di bagian atas saat disajikan.', 25000, 'Tarte_Tatin.png', 'Dessert'),
(22, 'Crêpes', 'Hidangan tipis berbentuk dadar gulung yang berasal dari Perancis, meskipun sekarang ditemukan dan populer di seluruh dunia. Hidangan ini sering disajikan sebagai makanan penutup atau makanan ringan. Crepes biasanya terbuat dari adonan tipis yang terbuat dari tepung terigu, telur, susu, dan sedikit mentega. Adonan ini memiliki konsistensi yang mirip dengan adonan panekuk, tetapi lebih encer sehingga dapat dibuat tipis.', 35000, 'Crepes.png', 'Dessert'),
(23, 'Croissant', 'Roti ini dikenal dengan bentuknya yang melengkung dan lapisan-lapisan yang ringan dan renyah. Croissant adalah salah satu ikon kuliner Perancis dan populer di seluruh dunia.\r\nCroissant biasanya terbuat dari adonan yang mengandung tepung terigu, ragi, air, susu, gula, garam, dan mentega.', 27000, 'Croissant_Home.png', 'Dessert'),
(24, 'Profiteroles', 'Hidangan penutup Perancis yang terdiri dari adonan kecil yang diberi isian krim, seringkali krim pastry (crème pâtissière) atau krim Chantilly, dan kemudian disajikan dengan saus cokelat, karamel, atau saus lainnya.', 22000, 'profiteroles.png', 'Dessert'),
(25, 'Clafoutis', 'Hidangan penutup klasik Perancis yang berasal dari wilayah Auvergne. Hidangan ini umumnya terbuat dari ceri (meskipun varian lain seperti buah persik atau buah ara juga digunakan) yang disusun dalam adonan pancake kental dan kemudian dipanggang hingga matang.', 30000, 'Clafoutis.png', 'Dessert'),
(26, 'Canelé', 'Hidangan penutup khas Perancis yang berasal dari wilayah Bordeaux. Hidangan ini memiliki bentuk yang khas, yaitu kecil dan berbentuk silinder dengan lapisan luar yang renyah dan lapisan dalam yang lembut. Canelé sering kali memiliki rasa karamel dan vanili yang khas.', 35000, 'Canele.webp', 'Dessert'),
(27, 'Macarons', 'Hidangan penutup klasik Perancis yang terkenal dengan lapisan luar yang renyah dan lembut serta berbagai rasa dan warna yang menarik. Macarons terbuat dari tepung almond, gula, dan putih telur yang diolah menjadi adonan pasta yang ringan. Adonan ini kemudian dipanggang hingga mengembang dan membentuk lapisan luar yang kering, dan diisi dengan berbagai isian yang sering kali manis seperti selai, ganache, atau krim.', 20000, 'Macarons.png', 'Dessert'),
(28, 'Café au lait', 'Kopi Prancis yang terbuat dari pencampuran susu hangat ini sebagian besar dibuat dengan menyeduh kopi secara tradisional menggunakan mesin pres khusus. Rasio bahan-bahannya juga berbeda. Café au lait biasanya memiliki rasio kopi dan susu yang sama dan sebagian besar tidak memiliki busa di atasnya.', 25000, 'Café-au-lait.png', 'Drinks'),
(29, 'Absinthe', 'Absinthe menjadi salah satu minuman khas Perancis yang paling difavoritkan masyarakat disana. Absinthe adalah minuman beralkohol yang terbuat dari kayu apsintus dan beberapa herbal lainnya seperti adas manis, lemon, hisop, daun mint dan ketumbar. Absinthe mengandung kadar alkohol mencapai 68-72%. Tak hanya menjadi minuman beralkohol paling favorit, absinthe juga terkenal sebagai obat tradisional yang mujarab pada abad ke-18.', 50000, 'Absinthe.png', 'Drinks'),
(30, 'Pastis', 'Pastis adalah minuman khas Perancis yang biasanya dihidangkan sebagai minuman pembuka di restoran-restoran. Alasannya karena minuman berwarna kuning ini dapat merangsang nafsu makan. Pastis sangat segar dengan sedikit es batu dan dinikmati dengan kudapan ringan seperti biskuit atau buah zaitun. Minuman ini punya aroma adas manis yang khas, karena terbuat dari campuran licorice, adas bintang dan beberapa ramuan herbal.', 65000, 'Pastis.png', 'Drinks'),
(31, 'Benedictine', 'Minuman yang dibuat menggunakan 27 jenis tanaman rempah-rempah yang berkhasiat untuk kesehatan tubuh. Benedictine bisa berguna sebagai obat dan membantu melancarkan pecernaan. Sayangnya, meski tergolong minuman herbal, Benedictine tidak cocok dikonsumsi oleh orang-orang penderita lemah hati.', 72000, 'Benedictine-1.png', 'Drinks'),
(32, 'Grand Marnier', 'Grand marnier adalah minuman beralkohol khas Perancis yang dikenal karena perpaduan unik dari brandy cognac, esensi jeruk pahit Haiti dan gula. Minuman ini sangat populer di Perancis dan bisa disajikan dalam berbagai bentuk seperti ditambahkan es batu, cocktail maupun minuman penutup yang bisa melancarkan pencernaan setelah menyantap hidangan.', 75000, 'Grand-Marnier.png', 'Drinks'),
(33, 'Calvados', 'Calvados merupakan minuman beralkohol kebanggaan Perancis. Calvados mengandung alkohol yang cukup kuat dimana kadarnya mencapai 40-50%. Minuman ini terbuat dari penyulingan sari buah apel atau pir. Menurut sejarahnya, nama calvados sendiri diambil dari nama sebuah kapal Spanyol yakni El Calvador yang karam di dekat tepi sungai di Calvados, Normandia, Perancis. Maka dari itu, proses produksi minuman ini pun mayoritas dibuat di kota asalnya Calvados.', 55000, 'Calvados.png', 'Drinks'),
(34, 'Kir', 'Campuran anggur putih yang dikombinasikan dengan liqueur blackcurrant circant. Kir juga memiliki beberapa variasi seperti peach liqueur. Kir merupakan minuman favorit masyarakat Prancis dan pertama kali muncul sekitar tahun 1950, yakni pada masa pemerintahan Walikota Dijon, Felix Kir.', 25000, 'Kir.png', 'Drinks'),
(35, 'Chocolat L\'ancienne', 'Chocolat L\'ancienne merupakan minuman khas Prancis yang terbuat dari dark chocolate yang dilelehkan. Minuman yang satu ini biasanya diminum untuk merayakan kemenangan tim sepak bola. Minuman ini biasanya disajikan dengan whipped cream sehingga membuatnya semakin kental dan kaya rasa.', 27000, 'Chocolat-L\'ancienne.png', 'Drinks');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `gender` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `role` enum('Customer','Admin') DEFAULT 'Customer',
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `password`, `tgl_lahir`, `gender`, `role`, `email`) VALUES
(4, 'Arya', 'Setiawan', 'Aryaa', '$2y$10$Uwb1fFU3BvfkVWQfQ6kLzui9zt1F.V/gB.nCv3EUMHgEXDAiL8n36', '2005-09-25', 'Laki-laki', 'Customer', 'arya@gmail.com'),
(5, 'Admin', 'Super', 'AdminSuper', '$2y$10$eqUxe7BhTEfDnP5BTCJQIuBMd5XfIj02pWRi4YuHvtyC0/ELiIBlK', '2023-10-22', 'Laki-laki', 'Admin', 'admin123@gmail.com'),
(6, 'User', 'Baru', 'userbaru', '$2y$10$8UTIH435AmsBroIlZvyQ7.u/exNbdrn0RLnrdgJDGlO3ojt9X1uMu', '3322-02-12', 'Laki-laki', 'Customer', 'user@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
