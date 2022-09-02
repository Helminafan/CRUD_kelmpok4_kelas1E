-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Sep 2022 pada 13.36
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tugas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `acc_ujian`
--

CREATE TABLE `acc_ujian` (
  `id` int(11) NOT NULL,
  `dosen_penguji` varchar(45) DEFAULT NULL,
  `jadwal_ujian` datetime NOT NULL,
  `acc_ujiancol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `acc_ujian`
--

INSERT INTO `acc_ujian` (`id`, `dosen_penguji`, `jadwal_ujian`, `acc_ujiancol`) VALUES
(1, 'Herman Yuliandoko,S.T M.T', '2022-10-07 12:00:00', 'Diterima'),
(2, 'Lutfi Hakim, S.Pd, M.T', '2022-10-12 10:00:00', 'Diterima'),
(3, 'Arum Andary Ratri,S.Si, M.Si', '2022-10-11 09:00:00', 'Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota_kelompok`
--

CREATE TABLE `anggota_kelompok` (
  `id` int(12) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `nim` char(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota_kelompok`
--

INSERT INTO `anggota_kelompok` (`id`, `nama_anggota`, `nim`) VALUES
(12, 'Wahyu Rizqi. A.', '362155401144');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` int(50) NOT NULL,
  `nama_dosen` varchar(45) DEFAULT NULL,
  `nik` varchar(45) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `nama_dosen`, `nik`, `user_id`) VALUES
(1, 'Lutfi Hakim, S.Pd, M.T', '199203302019031012', 2),
(2, 'Arum Andary Ratri,S.Si, M.Si', '199209212020122021', 2),
(3, 'Herman Yuliandoko,S.T M.T', '2013.36.106', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lembar_kerja`
--

CREATE TABLE `lembar_kerja` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL,
  `anggota_kelompok_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lembar_kerja`
--

INSERT INTO `lembar_kerja` (`id`, `tanggal`, `file`, `anggota_kelompok_id`) VALUES
(8, '2022-09-09', 'surat.pdf', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(50) NOT NULL,
  `nama_mahasiswa` varchar(45) DEFAULT NULL,
  `nim` varchar(45) DEFAULT NULL,
  `kelas` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `id_user` int(50) DEFAULT NULL,
  `anggota_kelompok_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama_mahasiswa`, `nim`, `kelas`, `email`, `alamat`, `id_user`, `anggota_kelompok_id`) VALUES
(20, 'Wahyu Rizki Amalia', '362155401144', '1E', 'riris@gmail.com', 'Banyuwangi', 6, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `nilai_pembimbing_lapangan` varchar(45) DEFAULT NULL,
  `nilai_pembimbing_kp` varchar(45) DEFAULT NULL,
  `nilai_penguji` varchar(45) DEFAULT NULL,
  `bukti_nilai_pembimbing_lapangan` varchar(45) DEFAULT NULL,
  `pendaftaran_ujian_kp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran_kp`
--

CREATE TABLE `pendaftaran_kp` (
  `id` int(50) NOT NULL,
  `tempat_kp` varchar(45) DEFAULT NULL,
  `alamat_kp` varchar(45) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `proposal` varchar(200) DEFAULT NULL,
  `anggota_kelompok_id` int(11) DEFAULT NULL,
  `dosen_id` int(11) DEFAULT NULL,
  `perusahaan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaftaran_kp`
--

INSERT INTO `pendaftaran_kp` (`id`, `tempat_kp`, `alamat_kp`, `tanggal_mulai`, `tanggal_selesai`, `proposal`, `anggota_kelompok_id`, `dosen_id`, `perusahaan_id`) VALUES
(6, 'PT. Aksata Global Solusi', 'Ruko Symphony HX 01-10 Lantai 3,Bekasi, Jawa ', '2022-08-21', '2022-09-09', 'Doc1.pdf', 12, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran_ujian_kp`
--

CREATE TABLE `pendaftaran_ujian_kp` (
  `id` int(11) NOT NULL,
  `laporan_kp` varchar(45) DEFAULT NULL,
  `jadwal_ujian` datetime NOT NULL,
  `pendaftaran_kp_id` int(11) DEFAULT NULL,
  `acc_ujian_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaftaran_ujian_kp`
--

INSERT INTO `pendaftaran_ujian_kp` (`id`, `laporan_kp`, `jadwal_ujian`, `pendaftaran_kp_id`, `acc_ujian_id`) VALUES
(7, 'Doc1.pdf', '2022-10-11 09:00:00', 6, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telephone` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama_perusahaan`, `alamat`, `email`, `telephone`) VALUES
(1, 'PT. Aksata Global Solusi', 'Ruko Symphony HX 01-10 Lantai 3,Bekasi, Jawa ', 'Aksata@gmail.com', '081212369592'),
(3, ' Karya Mandiri Instrument Indonesia', 'Jl.Cilangkap Baru, No 2A  Jakarta Timur', 'karyamandiri@gmail.com', '081294124885'),
(4, 'PT. Arya Pancarindo Perkasa', 'Jl. Warung Jati Timur Raya no. 69 Jakarta Sel', ' Arya@gmail.com', '081219450524');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `id_role` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `id_role`) VALUES
(2, 'dosen', '$2y$10$eGL8x9VWAJQnj9NlLe7YWuLiwCxTIknL19EfK7XhDn5zfOZ8Q/puu', 2),
(3, '362155401149', '$2y$10$Eiw7ltXzyiquyvO76RVDluTMn0CvZD3b/ta/6.34GwyC6DWZg3UPK', 1),
(4, 'alif', '123311', 1),
(6, '362155401144', '$2y$10$ljQ2LtlIdU9eOSDvlxqRmum6SxU9jAZ72n/t6UD1wXoyPjJCwHkQq', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id_user` int(11) NOT NULL,
  `role` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id_user`, `role`) VALUES
(1, 'mahasiswa'),
(2, 'Dosen'),
(3, 'Koordinator_KP'),
(4, 'Admin_prodi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `acc_ujian`
--
ALTER TABLE `acc_ujian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `anggota_kelompok`
--
ALTER TABLE `anggota_kelompok`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dosen_ibfk_1` (`user_id`);

--
-- Indeks untuk tabel `lembar_kerja`
--
ALTER TABLE `lembar_kerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anggota_kelompok_id` (`anggota_kelompok_id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anggota_kelompok_id` (`anggota_kelompok_id`),
  ADD KEY `mahasiswa_ibfk` (`id_user`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_ibfk_1` (`pendaftaran_ujian_kp_id`);

--
-- Indeks untuk tabel `pendaftaran_kp`
--
ALTER TABLE `pendaftaran_kp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perusahaan_id` (`perusahaan_id`),
  ADD KEY `anggota_kelompok_id` (`anggota_kelompok_id`),
  ADD KEY `dosen_id` (`dosen_id`);

--
-- Indeks untuk tabel `pendaftaran_ujian_kp`
--
ALTER TABLE `pendaftaran_ujian_kp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acc_ujian_id` (`acc_ujian_id`),
  ADD KEY `pendaftaran_ujian_kp_ibfk_1` (`pendaftaran_kp_id`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ibfk_1` (`id_role`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota_kelompok`
--
ALTER TABLE `anggota_kelompok`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `lembar_kerja`
--
ALTER TABLE `lembar_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran_kp`
--
ALTER TABLE `pendaftaran_kp`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran_ujian_kp`
--
ALTER TABLE `pendaftaran_ujian_kp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lembar_kerja`
--
ALTER TABLE `lembar_kerja`
  ADD CONSTRAINT `lembar_kerja_ibfk_1` FOREIGN KEY (`anggota_kelompok_id`) REFERENCES `anggota_kelompok` (`id`);

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`anggota_kelompok_id`) REFERENCES `anggota_kelompok` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`pendaftaran_ujian_kp_id`) REFERENCES `pendaftaran_ujian_kp` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pendaftaran_kp`
--
ALTER TABLE `pendaftaran_kp`
  ADD CONSTRAINT `pendaftaran_kp_ibfk_2` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_kp_ibfk_3` FOREIGN KEY (`anggota_kelompok_id`) REFERENCES `anggota_kelompok` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_kp_ibfk_4` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pendaftaran_ujian_kp`
--
ALTER TABLE `pendaftaran_ujian_kp`
  ADD CONSTRAINT `pendaftaran_ujian_kp_ibfk_1` FOREIGN KEY (`pendaftaran_kp_id`) REFERENCES `pendaftaran_kp` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_ujian_kp_ibfk_2` FOREIGN KEY (`acc_ujian_id`) REFERENCES `acc_ujian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
