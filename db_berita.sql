-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jun 2025 pada 11.53
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_berita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `slug` text DEFAULT NULL,
  `author` varchar(250) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `judul`, `description`, `kategori`, `image`, `slug`, `author`, `created_at`, `updated_at`) VALUES
(9, 'Anggota DPR Fraksi PKB Angkat Suara Wacana Legalisasi Kasino', 'Anggota Komisi III DPR Fraksi Partai Kebangkitan Bangsa (PKB) Hasbiallah Ilyas ...', 'politik', '68448b509d2af.jpg', 'anggota-dpr-fraksi-pkb-angkat-suara-wacana-legalisasi-kasino', 'Rassid Risda Sulpa', '2025-06-08 01:56:16', NULL),
(10, 'Kebaikan Iduladha 1446 H:Ratusan kurban BPKH jangkau Plosok Negeri', 'Badan Pengelola Keuangan Haji (BPKH) kembali menggelar program Sedekah Kurban 1446 Hijriah ...', 'ekonomi', '684491e26375a.jpeg', 'kebaikan-iduladha-1446-hratusan-kurban-bpkh-jangkau-plosok-negeri', 'Rassid Risda Sulpa', '2025-06-08 02:24:18', NULL),
(11, 'Media Malaysia: Timnas indonesia bikin iri fans Malaysia', 'Media Malaysia menilai sukses Timnas Indonesia di Kualifikasi Piala Dunia 2026 ...', 'olahraga', '684585c047106.jpeg', 'media-malaysia-timnas-indonesia-bikin-iri-fans-malaysia', 'Rassid Risda Sulpa', '2025-06-08 19:44:48', NULL),
(12, 'Titiek Puspa Meninggal, Dunia Hiburan Indonesia Meninggal', 'Kabar Titiek Puspa meninggal dunia dalam usia 87 tahun pada Kamis (10/4) ...', 'hiburan', '6845868b6fa8b.jpeg', 'titiek-puspa-meninggal-dunia-hiburan-indonesia-meninggal', 'Rassid Risda Sulpa', '2025-06-08 19:48:11', NULL),
(13, 'HP Android RedMagic 10S Pro Meluncur Global, Using Chip SnapDragon 8 Elite Khusus', 'Nubia resmi meluncurkan ponsel gaming terbarunya, RedMagic 10S Pro ...', 'teknologi', '68459349e0038.jpg', 'hp-android-redmagic-10s-pro-meluncur-global-using-chip-snapdragon-8-elite-khusus', 'Rassid Risda Sulpa', '2025-06-08 20:42:33', NULL),
(14, 'Trump Tegaskan Hubungannya Dengan Elon Musk Berakhir, Tak Mau Damai', 'Presiden AS Donald Trump akhirnya menegaskan hubungan dirinya dengan miliardernya Elon Musk ...', 'politik', '684598502f232.jpeg', 'trump-tegaskan-hubungannya-dengan-elon-musk-berakhir-tak-mau-damai', 'Hadijah Alaydrus', '2025-06-08 21:04:00', NULL),
(15, 'Ini Raja Debt Collector Paling Ditakuti di RI, Bangun Bisnis dari Nol', 'Debt collector menjadi profesi yang tak asing di telinga masyarakat Indonesia ...', 'politik', '684599a8937d3.png', 'ini-raja-debt-collector-paling-ditakuti-di-ri-bangun-bisnis-dari-nol', 'Khoirul Anam', '2025-06-08 21:09:44', NULL),
(17, 'Save Raja Ampat', 'Raja Ampat, Papua Barat Daya – Seruan untuk melindungi salah satu surga bawah laut paling menakjubkan di dunia, Raja Ampat, semakin menguat seiring dengan meningkatnya ancaman terhadap ekosistemnya yang rapuh. Berbagai organisasi lingkungan, komunitas lokal, dan individu kini bersatu di bawah bendera gerakan \"Save Raja Ampat\" untuk mendesak tindakan nyata dalam menjaga keberlanjutan wilayah ini.\r\n\r\nRaja Ampat, yang terletak di Provinsi Papua Barat Daya, Indonesia, dikenal sebagai episentrum keanekaragaman hayati laut global. Wilayah ini adalah rumah bagi ribuan spesies ikan, karang, dan makhluk laut lainnya, menjadikannya destinasi impian bagi penyelam dan peneliti dari seluruh dunia. Namun, keindahan dan kekayaan alam ini terancam oleh berbagai faktor, termasuk perubahan iklim, praktik penangkapan ikan yang tidak bertanggung jawab, pariwisata yang tidak berkelanjutan, dan potensi pengembangan yang merusak.\r\n\r\nJuru bicara gerakan \"Save Raja Ampat\" dalam sebuah pernyataan baru-baru ini menekankan urgensi situasi. \"Kita tidak bisa lagi berdiam diri melihat aset berharga ini tergerus. Raja Ampat bukan hanya kebanggaan Indonesia, tetapi juga warisan global yang harus kita jaga bersama,\" ujarnya.\r\n\r\nBeberapa poin utama yang diserukan oleh gerakan \"Save Raja Ampat\" meliputi:\r\n\r\n    Penguatan Penegakan Hukum: Mendesak pemerintah untuk lebih tegas dalam menindak praktik penangkapan ikan ilegal, pengeboman ikan, dan penggunaan bahan kimia berbahaya yang merusak terumbu karang.\r\n    Pengelolaan Pariwisata Berkelanjutan: Mendorong pengembangan pariwisata yang bertanggung jawab, dengan membatasi jumlah pengunjung, meningkatkan kesadaran ekowisata, dan memastikan pendapatan dari pariwisata benar-benar bermanfaat bagi konservasi dan kesejahteraan masyarakat lokal.\r\n    Edukasi dan Pemberdayaan Masyarakat Lokal: Melibatkan aktif masyarakat adat dan lokal dalam upaya konservasi, memberikan edukasi mengenai pentingnya menjaga lingkungan laut, dan mendukung mata pencaharian alternatif yang ramah lingkungan.\r\n    Riset dan Pemantauan Berkelanjutan: Mendukung penelitian ilmiah untuk memahami lebih dalam dinamika ekosistem Raja Ampat dan memantau dampak perubahan iklim serta aktivitas manusia.\r\n    Kolaborasi Multistakeholder: Mengajak pemerintah, sektor swasta, LSM, akademisi, dan masyarakat internasional untuk bekerja sama dalam merumuskan dan melaksanakan strategi konservasi yang efektif.\r\n\r\nKampanye \"Save Raja Ampat\" juga aktif di media sosial, menyebarkan informasi tentang keindahan dan kerentanan Raja Ampat, serta mengajak masyarakat luas untuk turut serta dalam gerakan ini melalui petisi online, donasi, dan penyebaran kesadaran.\r\n\r\nPara pegiat berharap, dengan bersatunya berbagai elemen ini, tekanan terhadap pihak berwenang akan semakin besar untuk mengambil langkah-langkah konkret dan segera demi masa depan Raja Ampat. Masa depan surga bawah laut ini bergantung pada tindakan kita hari ini.', 'politik', '684a931220430.jpg', 'save-raja-ampat', 'Bramwell', '2025-06-12 15:42:58', NULL),
(18, 'Diduga Karena Telat Ngabarin Ayang', 'Telat Ngabarin Ayang Seorang Mahasiswa Depresi ', 'hiburan', '684aa1d92abb8.jpg', 'diduga-karena-telat-ngabarin-ayang', 'Rizky', '2025-06-12 16:46:01', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `namalengkap` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id`, `namalengkap`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'indah', 'indahsyafitri558@gmail.com', '$2y$12$ueHQx3Uk2rm/UbSXtmsav.CAaPY8U/3YZaS5W4APp2oP6sPh2XTSK', '2025-06-12 08:05:32', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
