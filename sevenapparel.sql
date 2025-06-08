-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2025 at 10:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sevenapparel`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `product_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(7, 9, 1, 'Keren', '2024-02-24 12:21:01', '2024-02-24 12:21:01'),
(11, 3, 1, 'Murah Banget', '2024-02-26 12:46:15', '2024-02-26 12:46:15'),
(20, 15, 1, 'cek', '2024-03-04 11:31:51', '2024-03-04 11:31:51'),
(21, 6, 1, 'cek', '2024-03-12 02:37:33', '2024-03-12 02:37:33'),
(22, 14, 1, 'Cakep', '2024-03-14 02:39:07', '2024-03-14 02:39:07'),
(23, 4, 2, 'comment tes', '2024-03-14 03:33:04', '2024-03-14 03:33:04'),
(24, 10, 1, 'comment tes', '2024-03-21 04:04:16', '2024-03-21 04:04:16'),
(25, 23, 1, 'ts', '2024-04-02 07:41:11', '2024-04-02 07:41:11'),
(26, 24, 1, 'Cakep', '2024-04-08 13:57:40', '2024-04-08 13:57:40'),
(29, 5, 1, 'Jaket Ini Mantap !!', '2024-04-19 15:13:04', '2024-04-19 15:13:04'),
(30, 5, 12, 'KEREN!!', '2024-06-25 15:14:22', '2024-06-25 15:14:22');

-- --------------------------------------------------------

--
-- Table structure for table `commentlike`
--

CREATE TABLE `commentlike` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commentlike`
--

INSERT INTO `commentlike` (`id`, `comment_id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(42, 11, 1, 3, '2024-03-02 15:07:48', '2024-03-02 15:07:48'),
(45, 20, 1, 15, '2024-03-06 08:22:39', '2024-03-06 08:22:39'),
(46, 20, 1, 15, '2024-03-06 08:22:40', '2024-03-06 08:22:40'),
(48, 23, 1, 4, '2024-03-14 03:44:22', '2024-03-14 03:44:22'),
(49, 23, 2, 4, '2024-03-14 03:45:04', '2024-03-14 03:45:04'),
(50, 25, 1, 23, '2024-04-02 07:41:16', '2024-04-02 07:41:16'),
(52, 29, 1, 5, '2024-04-19 15:20:39', '2024-04-19 15:20:39'),
(53, 29, 12, 5, '2024-06-25 15:14:28', '2024-06-25 15:14:28'),
(54, 30, 12, 5, '2024-06-25 15:14:33', '2024-06-25 15:14:33');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kritikdansaran`
--

CREATE TABLE `kritikdansaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kritik` text NOT NULL,
  `saran` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kritikdansaran`
--

INSERT INTO `kritikdansaran` (`id`, `user_id`, `nama`, `kritik`, `saran`, `created_at`, `updated_at`) VALUES
(7, 1, 'Admin Rizky 2', 'Website ini kurang bagus dalam performa nya, dan bukan website yang responsive', 'Saran saya kembangkan lagi webnya agar lebih menarik dimata customer', '2024-03-16 06:08:36', '2024-03-16 06:08:36'),
(8, 1, 'Admin Rizky 2', 'Desain situs memukau namun navigasi membingungkan. Lebih banyak kategori dan filter diperlukan untuk pencarian yang efisien. Tambahkan opsi pengiriman cepat untuk pengalaman belanja yang lebih baik.', 'Perbaiki navigasi untuk memudahkan pengguna menemukan produk. Tambahkan fitur filter yang lebih lengkap. Tingkatkan pengalaman belanja dengan opsi pengiriman cepat dan pilihan pembayaran yang beragam.', '2024-03-16 08:35:42', '2024-03-16 08:35:42'),
(9, 1, 'Admin Rizky 2', 'Antarmuka situs terlalu kompleks dan membingungkan bagi pengguna baru. Tampilan produk kurang menarik dan kurangnya deskripsi menyebabkan kebingungan. Pembaruan gambar dan informasi produk lebih sering diperlukan.', 'Sederhanakan antarmuka untuk meningkatkan navigasi pengguna. Perbarui tampilan produk dengan gambar berkualitas tinggi dan deskripsi yang jelas. Berikan opsi pengguna untuk memberikan umpan balik produk untuk meningkatkan pengalaman belanja.', '2024-03-16 08:37:21', '2024-03-16 08:37:21'),
(10, 1, 'Admin Rizky 2', 'Navigasi situs yang rumit menyulitkan pengguna menemukan produk yang diinginkan. Keterangan produk yang minim membuat keputusan pembelian menjadi sulit. Waktu muat halaman yang lambat juga mengurangi pengalaman pengguna.', 'Perbaiki navigasi situs dengan memperbaiki kategori produk dan menambahkan fitur pencarian yang lebih canggih. Tambahkan deskripsi produk yang lebih rinci dan gambar yang menarik untuk membantu pengguna membuat keputusan pembelian yang lebih baik.', '2024-03-16 08:44:37', '2024-03-16 08:44:37'),
(11, 1, 'Admin Rizky 2', 'Ketersediaan stok yang tidak konsisten sering kali mengecewakan pelanggan saat produk yang diinginkan tidak tersedia. Selain itu, kurangnya fitur perbandingan produk membuat pengguna kesulitan dalam memilih produk yang tepat.', 'Perbarui sistem manajemen inventaris untuk memastikan ketersediaan stok yang konsisten. Sediakan fitur perbandingan produk sehingga pelanggan dapat dengan mudah membandingkan fitur, harga, dan ulasan produk.', '2024-03-16 08:45:08', '2024-03-16 08:45:08'),
(12, 1, 'Admin Rizky 2', 'Antarmuka checkout yang kompleks dan kurangnya opsi pembayaran yang fleksibel menjadi hambatan bagi pengguna untuk menyelesaikan pembelian. Ketidakjelasan kebijakan pengembalian juga menimbulkan ketidakpastian bagi pelanggan.', 'Sederhanakan antarmuka checkout dengan mengurangi jumlah langkah dan menyediakan opsi pembayaran yang beragam, seperti pembayaran tunai, transfer bank, dan pembayaran dengan dompet digital. Jelaskan kebijakan pengembalian dengan jelas dan tampilkan secara terpisah di setiap halaman produk.', '2024-03-16 08:45:22', '2024-03-16 08:45:22'),
(13, 12, 'Rizky New Update', 'BARANG TIDAK SAMPAI', 'PENGIRIMAN HARUS LEBIH DIPERCEPAT', '2024-06-25 15:18:12', '2024-06-25 15:18:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_08_074233_create_product_table', 1),
(6, '2024_02_09_140958_create_comment_table', 1),
(7, '2024_02_21_182155_create_productlikes_table', 2),
(8, '2024_02_24_192644_create_commentlike_table', 3),
(9, '2024_02_28_194110_create_replycomment_table', 4),
(10, '2024_03_06_165335_create_transaction_table', 5),
(11, '2024_03_06_171104_create_transactiondetails_table', 6),
(12, '2024_03_14_082511_create_kritikdansaran_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `desc` text NOT NULL DEFAULT 'Belum Ada Deskripsi.',
  `stock` int(11) NOT NULL DEFAULT 0,
  `harga` bigint(20) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_image`, `desc`, `stock`, `harga`, `kategori`, `created_at`, `updated_at`) VALUES
(3, 'Breazt', 'productimg/QDj3lxPoiIIyd3YFISkgyumrbghomP75mSotb2Mq.png', 'Sepatu Breazt adalah salah satu merek sepatu yang telah menarik perhatian penggemar fesyen dengan desainnya yang stylish dan kualitasnya yang handal. Dibuat dengan menggunakan bahan-bahan berkualitas tinggi, Sepatu Breazt menawarkan kombinasi yang sempurna antara gaya, kenyamanan, dan daya tahan.', 97, 499999, 'sepatu', '2024-02-22 06:45:29', '2024-04-08 13:58:05'),
(4, 'BYW Select', 'productimg/XyJzoXrbdHmQhnSR2VlaouVowMAi3PWNa7wzl1XW.png', 'Sepatu BYW Select (Boost You Wear) adalah salah satu produk unggulan yang menampilkan perpaduan yang unik antara gaya dan kenyamanan. Dirancang dengan teknologi terkini dan inspirasi dari sepatu lari, BYW Select menawarkan kombinasi yang luar biasa antara desain kontemporer dan kinerja yang optimal.', 10, 1999999, 'sepatu', '2024-02-22 06:47:45', '2024-04-08 13:58:17'),
(5, 'Vintage Salvio', 'productimg/6ZANi9IR5hODP3x2nwZf1MMYlmrT4IK3hVIQWUW4.png', 'Jaket Vintage Salvio adalah pilihan yang sempurna bagi pecinta gaya retro yang ingin menambahkan sentuhan klasik ke dalam koleksi pakaian mereka. Didesain dengan inspirasi dari era-era sebelumnya, jaket ini menghadirkan nuansa nostalgia yang timeless dengan sentuhan modern yang segar.', 23, 399999, 'jaket', '2024-02-22 06:55:38', '2024-06-25 15:17:09'),
(6, 'Wankbay', 'productimg/H5b1w5nQb5vS7hv3w6XdgwZHmoCRg6IULIfQWCoQ.png', 'Topi Wankbay adalah simbol gaya yang unik dan ekspresif bagi mereka yang menghargai desain yang berani dan inovatif. Dibuat dengan perpaduan kualitas terbaik dan estetika yang menarik, topi ini menghadirkan sentuhan yang segar dan berbeda dalam dunia mode.', 51, 99999, 'topi', '2024-02-22 06:58:25', '2024-04-01 02:29:21'),
(7, 'Kalung Titanium', 'productimg/PGvxmFWmZWeMSkhVuSuLJKmGNgr4nXEidZI9EJNH.png', 'Kalung yang terbuat dari titanium adalah pilihan yang menawan bagi mereka yang menghargai kombinasi antara keindahan dan kekuatan. Dibuat dari logam titanium yang ringan namun sangat tahan terhadap korosi, kalung ini tidak hanya menawarkan estetika yang elegan, tetapi juga daya tahan yang luar biasa.', 48, 149999, 'aksesoris', '2024-02-22 06:59:55', '2024-04-04 12:42:34'),
(8, 'Kalung Rantai Tipis', 'productimg/Ee82tumGrIuA6Mf5mBgwBE6mwbdbbXL6a6l613lk.jpg', 'Kalung rantai tipis adalah aksesori yang menampilkan kesederhanaan yang elegan namun tetap memukau. Didesain dengan desain yang minimalis, kalung ini menampilkan keindahan dalam kemurnian bentuknya.', 49, 49999, 'aksesoris', '2024-02-22 07:01:08', '2024-04-04 12:34:45'),
(9, 'Kalung Liontin', 'productimg/3V483NAOaM9PlkQlMtwkEz0U1fHWRcsN4e4oqP1w.jpg', 'Kalung dengan liontin adalah perhiasan yang menghadirkan pesona dan keanggunan yang abadi. Dengan liontin yang dipilih dengan cermat, kalung ini adalah penambahan yang sempurna untuk setiap koleksi perhiasan.', 9, 139999, 'aksesoris', '2024-02-22 07:02:30', '2024-03-25 02:01:53'),
(10, 'Gelang Kullit Stainless Steel', 'productimg/SFhd3kvkMp3GZ6HzpkJqjjVBm0BmEsnFwfZRRZDR.jpg', 'Gelang kulit dengan stainless steel adalah perpaduan yang sempurna antara gaya klasik dan kekuatan modern. Dibuat dengan bahan-bahan berkualitas tinggi, gelang ini menampilkan kemewahan dalam kekuatan dan keanggunan dalam desainnya.', 40, 19999, 'aksesoris', '2024-02-22 07:04:08', '2024-03-25 02:02:15'),
(11, 'Gelang Kulit Multilayer', 'productimg/8wjZoNFBSQeEMX1Au1ZAMRYtsfJjcWwyzZLsdN0K.png', 'Gelang kulit multilayer adalah aksesori yang memancarkan gaya dan keanggunan yang unik. Didesain dengan lapisan-lapisan kulit yang berkumpul secara harmonis, gelang ini menghadirkan sentuhan yang hangat dan alami pada pergelangan tangan Anda.', 20, 14999, 'aksesoris', '2024-02-22 07:05:20', '2024-04-01 02:31:37'),
(12, 'Fortklass Makoto', 'productimg/oFxjX5lAZEBbujXdDIeM63qOwYKGi1T2z4UhRtaM.png', 'Jaket Fortklass Makoto adalah simbol dari gaya yang tangguh dan fungsionalitas yang luar biasa. Didesain untuk menemani Anda dalam berbagai aktivitas, jaket ini menggabungkan estetika modern dengan ketangguhan yang tak tertandingi.', 14, 129999, 'jaket', '2024-02-22 07:06:38', '2024-04-08 13:51:32'),
(13, 'Bucket Hat Hoi Polloy', 'productimg/i1XisT5ob03MPJfpFgnVxG4ROGVWgvfkn1D8fvh8.png', 'Topi bucket hat Hoi Polloy adalah simbol dari gaya santai yang tetap modis. Didesain untuk memberikan perlindungan dari sinar matahari dan memberikan sentuhan fashion yang keren, topi ini menjadi aksesori yang sempurna untuk melengkapi gaya kasual Anda.', 30, 89999, 'topi', '2024-02-22 07:08:24', '2024-04-04 12:43:06'),
(14, 'Polocaps', 'productimg/PkSHSGc8TVgZeR5EBD8TTXIgR3loJ9gwvYmUSNab.png', 'Topi PoloCaps adalah kombinasi yang sempurna antara gaya yang klasik dan kesederhanaan yang elegan. Didesain dengan presisi untuk memenuhi kebutuhan gaya pria dan wanita yang ingin tampil trendi namun tetap santai, topi ini menjadi aksesori yang tak tergantikan dalam lemari pakaian Anda.', 20, 29999, 'topi', '2024-02-22 07:10:10', '2024-04-01 02:03:05'),
(15, 'Daring Ocean', 'productimg/NClSjZ2GYWT0vqBS6UaqOYhy8e6fTWpr6Hx8C2Ks.png', 'Jaket Daring Ocean adalah simbol dari petualangan yang tak terbatas dan semangat eksplorasi yang menggetarkan jiwa. Dirancang untuk menghadapi elemen-elemen alam yang keras, jaket ini adalah kumpulan keanggunan dan ketahanan yang luar biasa.', 14, 599999, 'jaket', '2024-02-22 07:11:11', '2024-04-19 06:19:52'),
(23, 'Jordan Trunner LX Retro', 'productimg/D7oN2lc1nYHEYgiQMhRNkjv20WOfuiuDBClgLFoZ.png', 'Jordan Trunner LX Retro adalah sneaker yang menggabungkan gaya retro dengan teknologi modern untuk memberikan kenyamanan dan performa yang optimal. Sneaker ini merupakan bagian dari koleksi Jordan yang legendaris, menampilkan desain yang ikonik dan inovatif.', 10, 2999999, 'sepatu', '2024-03-07 01:24:09', '2024-04-01 01:57:25'),
(24, 'Air Jordan 11 Concord', 'productimg/hRpypLiqj6A2SfVYpwNuS5qSEcJgzgt5Qg5iJEqm.png', 'Air Jordan 11 Concord adalah sneaker yang menjadi salah satu ikon dalam dunia sepatu olahraga dan gaya hidup. Dikenal karena desainnya yang elegan dan teknologi inovatif, Air Jordan 11 Concord menawarkan kombinasi yang sempurna antara gaya dan performa.', 13, 6999999, 'sepatu', '2024-03-07 01:26:31', '2024-04-01 02:01:26'),
(25, 'Varsity Salvio Hexla', 'productimg/YxCQ3i0yD210kvEZ01ZeAMI1bvYZHX8i5pYcAelz.png', 'Varsity Salvio Hexla dalam warna hijau cream adalah jaket yang memadukan gaya yang trendi dengan kepraktisan dalam penggunaan sehari-hari.', 30, 299999, 'jaket', '2024-03-07 01:30:59', '2024-04-01 01:42:32'),
(27, 'Corduroy cargo jacket', 'productimg/YUF0WhgeUZnsEXQtEsKcL7Jb7Wbr9RNbjtoZxX1M.png', 'Corduroy Cargo Jacket adalah jaket yang menawarkan kombinasi antara gaya klasik dan fungsionalitas yang praktis. Dibuat dari bahan corduroy berkualitas tinggi, jaket ini tidak hanya memberikan tampilan yang stylish, tetapi juga memberikan perlindungan yang nyaman dari cuaca sejuk.', 25, 199999, 'jaket', '2024-03-07 01:34:44', '2024-04-01 02:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `productlikes`
--

CREATE TABLE `productlikes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `total_likes` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productlikes`
--

INSERT INTO `productlikes` (`id`, `productId`, `userId`, `total_likes`, `created_at`, `updated_at`) VALUES
(70, 4, 2, 0, '2024-03-14 03:33:21', '2024-03-14 03:33:21'),
(71, 4, 2, 0, '2024-03-14 03:33:24', '2024-03-14 03:33:24'),
(72, 4, 2, 0, '2024-03-14 03:33:25', '2024-03-14 03:33:25'),
(73, 4, 2, 0, '2024-03-14 03:33:26', '2024-03-14 03:33:26'),
(76, 8, 7, 0, '2024-04-04 12:33:39', '2024-04-04 12:33:39'),
(78, 5, 1, 0, '2024-04-19 15:12:53', '2024-04-19 15:12:53'),
(79, 5, 12, 0, '2024-06-25 15:14:06', '2024-06-25 15:14:06'),
(80, 5, 12, 0, '2024-06-25 15:14:08', '2024-06-25 15:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `replycomment`
--

CREATE TABLE `replycomment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `replycomment`
--

INSERT INTO `replycomment` (`id`, `product_id`, `comment_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(15, 3, 11, 1, 'iy kah mint', '2024-03-02 15:08:02', '2024-03-02 15:08:02'),
(20, 15, 20, 2, 'cek mint', '2024-03-04 11:39:28', '2024-03-04 11:39:28'),
(22, 4, 23, 2, 'kontol', '2024-03-14 03:33:40', '2024-03-14 03:33:40'),
(23, 23, 25, 1, 'kocak', '2024-04-02 07:41:25', '2024-04-02 07:41:25'),
(26, 5, 29, 1, 'Iya Sih !!', '2024-04-19 15:20:28', '2024-04-19 15:20:28'),
(27, 5, 29, 12, 'MANTAP MIN ANJASSS', '2024-06-25 15:14:49', '2024-06-25 15:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` enum('pending','success') NOT NULL DEFAULT 'pending',
  `snap_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `product_id`, `user_id`, `harga`, `status`, `snap_token`, `created_at`, `updated_at`) VALUES
(36, 6, 1, 99999, 'success', '7cbea2c0-7630-4d1b-aa19-373db30613c3', '2024-03-07 05:21:53', '2024-03-07 05:22:42'),
(37, 6, 1, 99999, 'success', '670cce0c-b727-448d-b208-46a3971b11a4', '2024-03-07 06:13:22', '2024-03-07 06:14:12'),
(38, 5, 1, 399999, 'success', '84044968-4fb6-4ffa-931c-f3cf5aa508de', '2024-03-07 06:47:45', '2024-03-07 06:48:28'),
(39, 5, 1, 399999, 'success', '7319c9ef-f32a-4b19-9e30-261e004b098a', '2024-03-07 06:50:51', '2024-03-07 06:51:44'),
(41, 6, 1, 99999, 'pending', '99c09eb6-234d-4bd2-9a45-4ebc05ff5050', '2024-03-12 02:13:31', '2024-03-12 02:13:31'),
(42, 6, 1, 99999, 'pending', '27075e9c-20e9-4003-b62f-477c239948bf', '2024-03-12 02:22:53', '2024-03-12 02:22:53'),
(43, 6, 1, 99999, 'pending', 'a3bec107-429a-4f59-90ec-5f76008c2b78', '2024-03-12 02:37:00', '2024-03-12 02:37:00'),
(44, 6, 1, 99999, 'pending', 'b8a4caa6-5566-4bfd-a86d-0782f235433a', '2024-03-12 02:44:00', '2024-03-12 02:44:00'),
(45, 6, 1, 99999, 'pending', '1877062f-2321-4ab1-8917-80bc51240a46', '2024-03-12 02:44:25', '2024-03-12 02:44:25'),
(46, 3, 1, 500000, 'success', '996606ce-52a8-4261-8828-d9c8ed35dd0c', '2024-03-12 02:45:56', '2024-03-12 02:46:40'),
(47, 6, 1, 99999, 'success', '61dbe4cc-c191-48af-b438-4112f201052a', '2024-03-14 00:40:51', '2024-03-14 00:41:44'),
(48, 3, 1, 500000, 'success', 'aad0b1c1-c8df-4b74-b5ae-e997b3ba807c', '2024-03-23 13:22:46', '2024-03-23 13:49:03'),
(49, 24, 1, 6999999, 'success', 'e771f26c-f02b-4c88-9bc0-78ad520bcdb2', '2024-03-23 13:51:00', '2024-03-23 13:51:43'),
(50, 3, 1, 500000, 'success', 'c9b6dc80-1852-4179-a124-a7700972c8a4', '2024-03-23 13:52:05', '2024-03-23 13:53:06'),
(51, 3, 4, 500000, 'success', '302e62f1-631b-443e-a00d-54d325eae788', '2024-03-23 14:03:33', '2024-03-23 14:05:42'),
(52, 6, 1, 99999, 'success', '39a12eb1-c56e-4ac2-a621-8a122aab3342', '2024-03-25 01:16:54', '2024-03-25 01:19:17'),
(53, 5, 1, 399999, 'success', '45646818-9f1f-4e6b-9df1-ef0e73a2b85b', '2024-04-01 01:19:40', '2024-04-01 01:20:28'),
(54, 23, 6, 2999999, 'pending', '0118150c-328b-4d78-a882-a9399d9bd3e1', '2024-04-04 10:29:27', '2024-04-04 10:29:27'),
(55, 8, 7, 49999, 'success', '11ac2e03-7df9-4f64-9e1d-7deac8fdac3a', '2024-04-04 12:33:46', '2024-04-04 12:34:45'),
(56, 12, 1, 129999, 'success', 'a5c82d92-c60e-453f-8843-1d70d420113e', '2024-04-08 13:50:41', '2024-04-08 13:51:32'),
(57, 15, 1, 599999, 'success', '0e3497dc-e288-4141-ad2e-a0769b9b75f5', '2024-04-19 06:19:05', '2024-04-19 06:19:52'),
(58, 5, 10, 399999, 'success', 'b2c8f35e-8f9a-4481-83d0-6ea903f08cb3', '2024-04-19 13:00:54', '2024-04-19 13:01:57'),
(59, 5, 1, 399999, 'pending', '9247b246-4836-41d5-95a7-5aba5646f549', '2024-04-19 15:21:41', '2024-04-19 15:21:41'),
(60, 5, 1, 399999, 'success', 'ba1d2e45-c7c3-4f1f-8896-e41bfc23a2a8', '2024-04-22 07:53:09', '2024-04-22 07:54:03'),
(61, 5, 12, 399999, 'success', 'a4ee428d-131b-43bc-a29d-6e46644902e4', '2024-06-25 15:15:25', '2024-06-25 15:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `transactiondetails`
--

CREATE TABLE `transactiondetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactiondetails`
--

INSERT INTO `transactiondetails` (`id`, `transaction_id`, `alamat`, `no_telp`, `email`, `created_at`, `updated_at`) VALUES
(32, 36, 'JL Karang tineung indah no 35', '087811045350', 'admin123@gmail.com', '2024-03-07 05:24:39', '2024-03-07 05:24:39'),
(56, 37, 'JL Karang tineung indah no 35', '087811045350', 'admin123@gmail.com', '2024-03-07 06:14:12', '2024-03-07 06:14:12'),
(57, 38, 'JL Karang tineung indah no 35', '087811045350', 'admin123@gmail.com', '2024-03-07 06:48:28', '2024-03-07 06:48:28'),
(58, 39, 'JL karang asem gianyar subarja, Kota Afrika, Jawa Selatan, Indonesia. 401667, Eiffel beach', '087811045350', 'admin123@gmail.com', '2024-03-07 06:51:44', '2024-03-07 06:51:44'),
(60, 41, 'JL karang asem gianyar subarja, Kota Afrika, Jawa Selatan, Indonesia. 401667, Eiffel beach', '087811045350', 'admin123@gmail.com', '2024-03-12 02:13:32', '2024-03-12 02:13:32'),
(61, 42, 'JL karang asem gianyar subarja, Kota Afrika, Jawa Selatan, Indonesia. 401667, Eiffel beach', '087811045350', 'admin123@gmail.com', '2024-03-12 02:22:53', '2024-03-12 02:22:53'),
(62, 42, 'JL karang asem gianyar subarja, Kota Afrika, Jawa Selatan, Indonesia. 401667, Eiffel beach', '087811045350', 'admin123@gmail.com', '2024-03-12 02:23:12', '2024-03-12 02:23:12'),
(63, 42, 'JL karang asem gianyar subarja, Kota Afrika, Jawa Selatan, Indonesia. 401667, Eiffel beach', '087811045350', 'admin123@gmail.com', '2024-03-12 02:23:28', '2024-03-12 02:23:28'),
(64, 42, 'JL karang asem gianyar subarja, Kota Afrika, Jawa Selatan, Indonesia. 401667, Eiffel beach', '087811045350', 'admin123@gmail.com', '2024-03-12 02:23:32', '2024-03-12 02:23:32'),
(65, 42, 'JL karang asem gianyar subarja, Kota Afrika, Jawa Selatan, Indonesia. 401667, Eiffel beach', '087811045350', 'admin123@gmail.com', '2024-03-12 02:24:54', '2024-03-12 02:24:54'),
(66, 42, 'JL karang asem gianyar subarja, Kota Afrika, Jawa Selatan, Indonesia. 401667, Eiffel beach', '087811045350', 'admin123@gmail.com', '2024-03-12 02:25:29', '2024-03-12 02:25:29'),
(67, 42, 'JL karang asem gianyar subarja, Kota Afrika, Jawa Selatan, Indonesia. 401667, Eiffel beach', '087811045350', 'admin123@gmail.com', '2024-03-12 02:25:52', '2024-03-12 02:25:52'),
(68, 42, 'JL karang asem gianyar subarja, Kota Afrika, Jawa Selatan, Indonesia. 401667, Eiffel beach', '087811045350', 'admin123@gmail.com', '2024-03-12 02:26:55', '2024-03-12 02:26:55'),
(69, 43, 'JL karang asem gianyar subarja, Kota Afrika, Jawa Selatan, Indonesia. 401667, Eiffel beach', '087811045350', 'admin123@gmail.com', '2024-03-12 02:37:01', '2024-03-12 02:37:01'),
(70, 44, 'JL karang asem gianyar subarja, Kota Afrika, Jawa Selatan, Indonesia. 401667, Eiffel beach', '087811045350', 'admin123@gmail.com', '2024-03-12 02:44:01', '2024-03-12 02:44:01'),
(71, 45, 'JL karang asem gianyar subarja, Kota Afrika, Jawa Selatan, Indonesia. 401667, Eiffel beach', '087811045350', 'admin123@gmail.com', '2024-03-12 02:44:26', '2024-03-12 02:44:26'),
(72, 45, 'JL karang asem gianyar subarja, Kota Afrika, Jawa Selatan, Indonesia. 401667, Eiffel beach', '087811045350', 'admin123@gmail.com', '2024-03-12 02:44:30', '2024-03-12 02:44:30'),
(73, 46, 'JL karang asem gianyar subarja, Kota Afrika, Jawa Selatan, Indonesia. 401667, Eiffel beach', '087811045350', 'admin123@gmail.com', '2024-03-12 02:45:58', '2024-03-12 02:45:58'),
(74, 47, 'JL karang asem gianyar subarja, Kota Afrika, Jawa Selatan, Indonesia. 401667, Eiffel beach', '087811045350', 'admin123@gmail.com', '2024-03-14 00:40:52', '2024-03-14 00:40:52'),
(75, 48, 'JL karang asem Gianyar subarja, Kota Afrika, Jawa Selatan, Indonesia. 401667, Eiffel beach', '087811045350', 'admin123@gmail.com', '2024-03-23 13:22:47', '2024-03-23 13:22:47'),
(76, 48, 'JL karang asem Gianyar subarja, Kota Afrika, Jawa Selatan, Indonesia. 401667, Eiffel beach', '087811045350', 'admin123@gmail.com', '2024-03-23 13:28:53', '2024-03-23 13:28:53'),
(77, 48, 'JL karang asem Gianyar subarja, Kota Afrika, Jawa Selatan, Indonesia. 401667, Eiffel beach', '087811045350', 'admin123@gmail.com', '2024-03-23 13:34:19', '2024-03-23 13:34:19'),
(78, 48, 'JL karang asem Gianyar subarja, Kota Afrika, Jawa Selatan, Indonesia. 401667, Eiffel beach', '087811045350', 'admin123@gmail.com', '2024-03-23 13:35:30', '2024-03-23 13:35:30'),
(79, 49, 'JL karang asem Gianyar subarja, Kota Afrika, Jawa Selatan, Indonesia. 401667, Eiffel beach', '087811045350', 'admin123@gmail.com', '2024-03-23 13:51:01', '2024-03-23 13:51:01'),
(80, 50, 'JL karang asem Gianyar subarja, Kota Afrika, Jawa Selatan, Indonesia. 401667, Eiffel beach', '087811045350', 'admin123@gmail.com', '2024-03-23 13:52:05', '2024-03-23 13:52:05'),
(81, 51, 'Belum Diketahui', 'Belum Diketahui', 'user1@gmail.com', '2024-03-23 14:03:33', '2024-03-23 14:03:33'),
(82, 51, 'JL Abdurahman wahid no.66 Jakarta, Indonesia', '098777865421', 'user1@gmail.com', '2024-03-23 14:04:50', '2024-03-23 14:04:50'),
(83, 52, 'JL karang asem Gianyar subarja, Kota Afrika, Jawa Selatan, Indonesia. 401667, Eiffel beach', '087811045350', 'admin123@gmail.com', '2024-03-25 01:16:55', '2024-03-25 01:16:55'),
(84, 53, 'JL karang asem Gianyar subarja, Kota Afrika, Jawa Selatan, Indonesia. 401667, Eiffel beach', '087811045350', 'admin123@gmail.com', '2024-04-01 01:19:41', '2024-04-01 01:19:41'),
(85, 54, 'Belum Diketahui', 'Belum Diketahui', 'rizkyyanuarirawan@gmail.com', '2024-04-04 10:29:28', '2024-04-04 10:29:28'),
(86, 55, 'Belum Diketahui', 'Belum Diketahui', 'rizkyyanuarirawan@gmail.com', '2024-04-04 12:33:46', '2024-04-04 12:33:46'),
(87, 56, 'JL karang asem Gianyar subarja, Kota Afrika, Jawa Selatan, Indonesia. 401667, Eiffel beach', '087811045350', 'admin123@gmail.com', '2024-04-08 13:50:41', '2024-04-08 13:50:41'),
(88, 57, 'JL karang asem Gianyar subarja, Kota Afrika, Jawa Selatan, Indonesia. 401667, Eiffel beach', '087811045350', 'admin123@gmail.com', '2024-04-19 06:19:06', '2024-04-19 06:19:06'),
(89, 58, 'Belum Diketahui', 'Belum Diketahui', 'sevenapparlco@gmail.com', '2024-04-19 13:00:55', '2024-04-19 13:00:55'),
(90, 59, 'JL karang asem Gianyar subarja, Kota Afrika, Jawa Selatan, Indonesia. 401667, Eiffel beach', '087811045350', 'admin123@gmail.com', '2024-04-19 15:21:41', '2024-04-19 15:21:41'),
(91, 60, 'JL karang asem Gianyar subarja, Kota Afrika, Jawa Selatan, Indonesia. 401667, Eiffel beach', '087811045350', 'admin123@gmail.com', '2024-04-22 07:53:12', '2024-04-22 07:53:12'),
(92, 61, 'Belum Diketahui', 'Belum Diketahui', 'lundbot2@gmail.com', '2024-06-25 15:15:26', '2024-06-25 15:15:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `roles` varchar(255) NOT NULL DEFAULT 'guest',
  `no_telp` varchar(255) NOT NULL DEFAULT 'Belum Diketahui',
  `jenis_kelamin` varchar(255) NOT NULL DEFAULT 'Belum Diketahui',
  `alamat` text DEFAULT 'Belum Diketahui',
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_image`, `roles`, `no_telp`, `jenis_kelamin`, `alamat`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Rizky 2', 'admin123@gmail.com', NULL, '$2y$12$KsdSVLCnZ7iNvk7Z0pDUcu6j7LS1o8Xwjxw570Bj3pJD7MczFdI1K', 'userimg/6gqzkloVpr3g3yfvHRXN2wsnPUAy7jEjh24LsnKw.jpg', 'admin', '087811045350', 'Laki Laki', 'JL karang asem Gianyar subarja, Kota Afrika, Jawa Selatan, Indonesia. 401667, Eiffel beach', 'Pending', NULL, '2024-02-21 07:43:00', '2024-03-23 13:13:15'),
(2, 'Raihan', 'raihan@gmail.com', NULL, '$2y$12$sR4yS69gJi80xn9oH200tuIyh1kInA72yMNTWlPQgVWJT4noIneA6', NULL, 'user', 'Belum Diketahui', 'Belum Diketahui', 'Belum Diketahui', 'Aktif', NULL, '2024-02-21 15:33:01', '2024-02-21 15:47:08'),
(3, 'Rizky', 'rizkyyanuar@gmail.com', NULL, '$2y$12$0e8nkLfaL/Ya6SWATKXLz.Ze.ZLZ6fYtCq3W9cIDmqLDEkJ7NI87i', NULL, 'guest', 'Belum Diketahui', 'Belum Diketahui', 'Belum Diketahui', 'Pending', NULL, '2024-03-07 06:37:35', '2024-03-07 06:37:35'),
(4, 'User 1', 'user1@gmail.com', NULL, '$2y$12$nDZAvmwpcKJPpBW0SHKhCe4m/EyMXaYWITGq.n41T/pTMHqrG.hvq', 'userimg/defaultuser.png', 'user', '098777865421', 'Laki Laki', 'JL Abdurahman wahid no.66 Jakarta, Indonesia', 'Aktif', NULL, '2024-03-12 02:27:24', '2024-03-23 14:04:37'),
(5, 'Alter Rizky', 'mscpremkyy4@gmail.com', NULL, '$2y$12$zAPNnixdXlyowIxvqJD1G.SSdEQv7WtrwNSz969ssaX.fBv9xfDbi', NULL, 'guest', 'Belum Diketahui', 'Belum Diketahui', 'Belum Diketahui', 'Pending', NULL, '2024-04-04 09:35:58', '2024-04-04 09:35:58'),
(9, 'Rizky Yanuar Irawan', 'rizkyyanuarirawan@gmail.com', '2024-04-04 13:34:27', '$2y$12$6bFQ3hVmToQE6LDLk6UJI.06HOgLvGD6Mx2ku2TzXUFjv.EEyYne.', 'userimg/defaultuser.png', 'user', 'Belum Diketahui', 'Laki Laki', 'Belum Diketahui', 'Aktif', NULL, '2024-04-04 13:33:43', '2024-04-04 13:41:54'),
(11, 'Seven Apparel', 'sevenapparlco@gmail.com', '2024-04-19 13:22:42', '$2y$12$jefE6JQR/bgkJcpqdx3Z2upd2PTqQfPEbmmHvswI0Ih5iWmN7Oppe', NULL, 'user', 'Belum Diketahui', 'Belum Diketahui', 'Belum Diketahui', 'Aktif', NULL, '2024-04-19 13:05:04', '2024-04-19 13:22:42'),
(12, 'Rizky New Update', 'lundbot2@gmail.com', '2024-06-25 15:13:07', '$2y$12$arK1R10zbP8lNOtzv7UrMO.nY9bcRS4BaycVHWzQZDsowCiTS7nc2', 'userimg/defaultuser.png', 'user', '082126367502', 'Laki Laki', 'JL. Karang Tineung', 'Aktif', NULL, '2024-06-25 15:12:22', '2024-06-25 15:16:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commentlike`
--
ALTER TABLE `commentlike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kritikdansaran`
--
ALTER TABLE `kritikdansaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productlikes`
--
ALTER TABLE `productlikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replycomment`
--
ALTER TABLE `replycomment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactiondetails`
--
ALTER TABLE `transactiondetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `commentlike`
--
ALTER TABLE `commentlike`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kritikdansaran`
--
ALTER TABLE `kritikdansaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `productlikes`
--
ALTER TABLE `productlikes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `replycomment`
--
ALTER TABLE `replycomment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `transactiondetails`
--
ALTER TABLE `transactiondetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
