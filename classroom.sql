-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Nov 2022 pada 14.37
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classroom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(123) NOT NULL,
  `email` varchar(123) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `tanggal_lahir`, `alamat`, `foto`, `id_user`) VALUES
(2, 'admin', 'aasas@gmaul.com', '2022-08-25', 'xsx', 'default.png', 45);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `level`) VALUES
(1, 'admin'),
(2, 'siswa'),
(3, 'guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_buku_absen`
--

CREATE TABLE `tbl_buku_absen` (
  `id_buku_absen` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `jam_toleransi` time NOT NULL,
  `id_kls` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_buku_absen`
--

INSERT INTO `tbl_buku_absen` (`id_buku_absen`, `tanggal`, `jam_mulai`, `jam_akhir`, `jam_toleransi`, `id_kls`, `id_materi`) VALUES
(30, '2022-09-30', '13:46:00', '13:48:00', '13:50:00', 2, 38),
(31, '2022-10-14', '08:29:00', '08:32:00', '08:33:00', 1, 39),
(32, '2022-11-03', '16:25:00', '16:36:00', '16:38:00', 2, 38),
(33, '2022-11-18', '07:46:00', '09:48:00', '10:50:00', 2, 40),
(34, '2022-11-18', '07:50:00', '07:51:00', '07:55:00', 2, 40),
(35, '2022-11-25', '06:33:00', '06:34:00', '06:40:00', 2, 41);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_buku_tugas`
--

CREATE TABLE `tbl_buku_tugas` (
  `id_buku_tugas` int(11) NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_akhir` datetime NOT NULL,
  `waktu_toleransi` datetime NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `penjelasan` text NOT NULL,
  `file` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_buku_tugas`
--

INSERT INTO `tbl_buku_tugas` (`id_buku_tugas`, `waktu_mulai`, `waktu_akhir`, `waktu_toleransi`, `id_kelas`, `judul`, `penjelasan`, `file`) VALUES
(6, '2022-09-29 14:31:00', '2022-09-29 14:34:00', '2022-09-29 14:35:00', 2, 'pertemuan 1', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">ply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popu</span><br></p>', 'zxzxzxz1.docx'),
(7, '2022-09-29 15:16:00', '2022-09-29 15:40:00', '2022-09-29 15:46:00', 2, 'pertemuan 2', '<p>dssfsf</p>', 'tidak ada file'),
(8, '2022-09-30 13:43:00', '2022-09-30 13:46:00', '2022-09-30 13:50:00', 2, 'tugas tiga', '<p>silahkan dijawab</p>', 'android1.pdf'),
(9, '2022-10-14 08:33:00', '2022-10-14 08:34:00', '2022-10-14 08:35:00', 1, 'tugas 1', '<p>sdfdsfsdfsdfsdf</p>', 'tidak ada file');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `id_dosen` int(11) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `nama` varchar(123) NOT NULL,
  `email` varchar(123) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(123) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `foto` varchar(123) NOT NULL,
  `alamat` varchar(123) NOT NULL,
  `password` varchar(111) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `kelas`) VALUES
(1, 'a'),
(2, 'b'),
(4, 'c');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_komentar_materi`
--

CREATE TABLE `tbl_komentar_materi` (
  `id_km` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal_waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `id_materi` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `nama_user` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_komentar_materi`
--

INSERT INTO `tbl_komentar_materi` (`id_km`, `komentar`, `tanggal_waktu`, `id_materi`, `status`, `nama_user`) VALUES
(11, 'paham pak', '2022-09-29 14:24:10', 37, 0, 'muhammad nor khalis najibi'),
(12, 'oke bagus', '2022-09-29 14:24:41', 37, 11, 'admin'),
(13, 'ini gimana ya pak saya kurng paham', '2022-09-30 13:42:59', 38, 0, 'muhammad nor khalis najibi'),
(14, 'paaham pak', '2022-10-14 08:28:18', 39, 0, 'adit'),
(15, 'salah ketik', '2022-10-14 08:28:35', 39, 14, 'adit'),
(16, 'izin bertanya bu', '2022-11-18 07:44:04', 40, 0, 'muhammad nor khalis najibi'),
(17, 'maaf salah', '2022-11-18 07:44:21', 40, 16, 'muhammad nor khalis najibi'),
(18, 'silahkan bertanya', '2022-11-18 07:44:49', 40, 16, 'admin'),
(19, 'paham bu', '2022-11-25 06:31:08', 41, 0, 'muhammad nor khalis najibi'),
(20, 'maaf salah ketik', '2022-11-25 06:31:22', 41, 19, 'muhammad nor khalis najibi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_komentar_tugas`
--

CREATE TABLE `tbl_komentar_tugas` (
  `id_kt` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal_waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `id_buku_tugas` int(11) NOT NULL,
  `nama_user` varchar(123) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_materi`
--

CREATE TABLE `tbl_materi` (
  `id_materi` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tanggal_waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `isi` text NOT NULL,
  `file` text NOT NULL,
  `status_materi` text NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_materi`
--

INSERT INTO `tbl_materi` (`id_materi`, `judul`, `tanggal_waktu`, `isi`, `file`, `status_materi`, `id_kelas`, `id_user`) VALUES
(37, 'pertemuan 1', '2022-09-29 06:23:05', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">ply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popu</span><br></p>', 'android.pdf', '', 2, 45),
(38, 'pertemuan 3', '2022-09-30 05:42:05', '<p>ini materi pertemuan tiga</p>', 'muhammad_nor_khalis_najibi.pdf', '', 2, 45),
(39, 'pertemuan 1', '2022-10-14 00:27:42', '<p><b>dhsadhjsadasdjasdasdasdad</b></p><p><b><br></b></p><p><b><br></b></p><p><b>dsdasdasda</b></p>', 'multimedia_muhammad_nor_khalis_najibi.pdf', '', 1, 45),
(40, 'pertemuan rpl 1', '2022-11-17 23:41:01', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\"><b>ever since the 1500s, when an unknown printer took a galley of type and </b>scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unc<i>hanged. It was pop</i>ul</span><br></p>', 'RPL_2_Pengenalan_Rekayasa_Perangkat_Lunak_(1).ppt', '', 2, 45),
(41, 'pertemuan rpl 10', '2022-11-24 22:25:01', '<p>qwqwqwqw</p>', 'uts_muhammad_nor_khalis_najibi_2010010224.pdf', '', 2, 45);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `npm` varchar(50) NOT NULL,
  `nama` varchar(123) NOT NULL,
  `email` varchar(123) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(123) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `id_kls` int(11) NOT NULL,
  `foto` varchar(123) NOT NULL,
  `alamat` varchar(123) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `npm`, `nama`, `email`, `tanggal_lahir`, `tempat_lahir`, `jk`, `id_kls`, `foto`, `alamat`, `id_user`) VALUES
(38, '2010010224', 'muhammad nor khalis najibi', 'najib@man2hss.sch.id', '2022-08-16', 'kandangan', 'laki-laki', 2, 'default.png', '', 54),
(39, '123456', 'adit', 'dasda@gmail.com', '2022-10-19', 'hss', 'laki-laki', 1, 'default.png', '', 55),
(40, '123', 'haliz najibi', 'najib@man2hss.sch.id', '2002-02-03', 'hss', 'laki-laki', 2, 'default.png', '', 56);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa_absen`
--

CREATE TABLE `tbl_siswa_absen` (
  `id_absen_siswa` int(11) NOT NULL,
  `status_absen` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `waktu_absen` time NOT NULL,
  `id_buku_absen` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_siswa_absen`
--

INSERT INTO `tbl_siswa_absen` (`id_absen_siswa`, `status_absen`, `keterangan`, `waktu_absen`, `id_buku_absen`, `id_user`) VALUES
(27, 'hadir', 'sukses', '01:46:54', 30, 54),
(28, 'hadir', 'sukses', '08:30:10', 31, 55),
(29, 'hadir', 'sukses', '04:33:07', 32, 56),
(30, 'hadir', 'sukses', '07:47:50', 33, 54),
(31, 'izin', 'telat 1menit', '07:52:00', 34, 54),
(32, 'hadir', 'telat 0menit', '06:34:35', 35, 54);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa_tugas`
--

CREATE TABLE `tbl_siswa_tugas` (
  `id_siswa_tugas` int(11) NOT NULL,
  `waktu_kirim` datetime NOT NULL,
  `status` varchar(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `file` text NOT NULL,
  `id_buku_tugas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_siswa_tugas`
--

INSERT INTO `tbl_siswa_tugas` (`id_siswa_tugas`, `waktu_kirim`, `status`, `keterangan`, `file`, `id_buku_tugas`, `id_user`) VALUES
(28, '2022-09-29 14:31:52', 'terkirim', 'sukses', '337313942.pdf', 6, 54),
(29, '2022-09-29 15:45:56', 'terkirim', 'telat 5menit', '<p>dfdfdfd</p>', 7, 54),
(30, '2022-09-30 13:45:08', 'terkirim', 'sukses', 'zxzxzxz1_(1).docx', 8, 54),
(31, '2022-10-14 08:31:56', 'terkirim', 'sukses', 'sdsfdfref', 9, 55);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(123) NOT NULL,
  `password` varchar(123) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(45, 'admin', '$2y$10$PHjhx.epka9D9T2cuytCueYE.40ZgG6YdOMbc/4jj1YgWiBrHJjUG', 1),
(54, '2010010224', '$2y$10$H67SDEGno.adLrlM0DBlueMysjxqDWzKRx1.ja3pKtwsCfmTaK4mm', 2),
(55, '123456', '$2y$10$gE3tktyAFC3zKYR5a0WkDuIaDDOlbtkhnAZjsvPx.dKtv23YzWOiC', 2),
(56, '123', '$2y$10$WJAksy7jv9Fhw1f4ivqY5.mBX/Jjp3Th3ikp6AJpxjKDlMQCPr01S', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `tbl_buku_absen`
--
ALTER TABLE `tbl_buku_absen`
  ADD PRIMARY KEY (`id_buku_absen`),
  ADD KEY `id_kls` (`id_kls`),
  ADD KEY `id_materi` (`id_materi`);

--
-- Indeks untuk tabel `tbl_buku_tugas`
--
ALTER TABLE `tbl_buku_tugas`
  ADD PRIMARY KEY (`id_buku_tugas`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `tbl_dosen_ibfk_1` (`id_user`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tbl_komentar_materi`
--
ALTER TABLE `tbl_komentar_materi`
  ADD PRIMARY KEY (`id_km`),
  ADD KEY `id_materi` (`id_materi`);

--
-- Indeks untuk tabel `tbl_komentar_tugas`
--
ALTER TABLE `tbl_komentar_tugas`
  ADD PRIMARY KEY (`id_kt`),
  ADD KEY `id_buku_tugas` (`id_buku_tugas`);

--
-- Indeks untuk tabel `tbl_materi`
--
ALTER TABLE `tbl_materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_kls` (`id_kls`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tbl_siswa_absen`
--
ALTER TABLE `tbl_siswa_absen`
  ADD PRIMARY KEY (`id_absen_siswa`),
  ADD KEY `id_buku_absen` (`id_buku_absen`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tbl_siswa_tugas`
--
ALTER TABLE `tbl_siswa_tugas`
  ADD PRIMARY KEY (`id_siswa_tugas`),
  ADD KEY `id_buku_tugas` (`id_buku_tugas`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level` (`level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_buku_absen`
--
ALTER TABLE `tbl_buku_absen`
  MODIFY `id_buku_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `tbl_buku_tugas`
--
ALTER TABLE `tbl_buku_tugas`
  MODIFY `id_buku_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_komentar_materi`
--
ALTER TABLE `tbl_komentar_materi`
  MODIFY `id_km` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tbl_komentar_tugas`
--
ALTER TABLE `tbl_komentar_tugas`
  MODIFY `id_kt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_materi`
--
ALTER TABLE `tbl_materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa_absen`
--
ALTER TABLE `tbl_siswa_absen`
  MODIFY `id_absen_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa_tugas`
--
ALTER TABLE `tbl_siswa_tugas`
  MODIFY `id_siswa_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_buku_absen`
--
ALTER TABLE `tbl_buku_absen`
  ADD CONSTRAINT `tbl_buku_absen_ibfk_1` FOREIGN KEY (`id_kls`) REFERENCES `tbl_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_buku_absen_ibfk_2` FOREIGN KEY (`id_materi`) REFERENCES `tbl_materi` (`id_materi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_buku_tugas`
--
ALTER TABLE `tbl_buku_tugas`
  ADD CONSTRAINT `tbl_buku_tugas_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD CONSTRAINT `tbl_dosen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_komentar_materi`
--
ALTER TABLE `tbl_komentar_materi`
  ADD CONSTRAINT `tbl_komentar_materi_ibfk_2` FOREIGN KEY (`id_materi`) REFERENCES `tbl_materi` (`id_materi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_komentar_tugas`
--
ALTER TABLE `tbl_komentar_tugas`
  ADD CONSTRAINT `tbl_komentar_tugas_ibfk_2` FOREIGN KEY (`id_buku_tugas`) REFERENCES `tbl_buku_tugas` (`id_buku_tugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_materi`
--
ALTER TABLE `tbl_materi`
  ADD CONSTRAINT `tbl_materi_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_materi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD CONSTRAINT `tbl_siswa_ibfk_2` FOREIGN KEY (`id_kls`) REFERENCES `tbl_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_siswa_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_siswa_absen`
--
ALTER TABLE `tbl_siswa_absen`
  ADD CONSTRAINT `tbl_siswa_absen_ibfk_1` FOREIGN KEY (`id_buku_absen`) REFERENCES `tbl_buku_absen` (`id_buku_absen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_siswa_absen_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_siswa_tugas`
--
ALTER TABLE `tbl_siswa_tugas`
  ADD CONSTRAINT `tbl_siswa_tugas_ibfk_1` FOREIGN KEY (`id_buku_tugas`) REFERENCES `tbl_buku_tugas` (`id_buku_tugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_siswa_tugas_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`level`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
