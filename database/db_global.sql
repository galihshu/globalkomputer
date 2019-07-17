-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jul 2019 pada 05.37
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_global`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `instruktur`
--

CREATE TABLE `instruktur` (
  `kdinstruktur` varchar(10) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `jekel` varchar(10) NOT NULL,
  `tplhr` varchar(100) NOT NULL,
  `tglhr` date NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `spesialmengajar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `instruktur`
--

INSERT INTO `instruktur` (`kdinstruktur`, `nama`, `email`, `password`, `alamat`, `notelp`, `jekel`, `tplhr`, `tglhr`, `pendidikan`, `jabatan`, `agama`, `foto`, `status`, `spesialmengajar`) VALUES
('001', 'Rokayah', 'aya@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Bandar Lampung', '0823XXXXXX', 'Wanita', 'Lampung Barat', '1991-03-02', 'Strata 1 (S1)', 'Akademik', 'Islam', '', 'Instruktur Tetap', 'Desain Grafis, Office'),
('002', 'Aan Sori', 'aansori@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Kedaton Bandar Lampung', '0721077786', 'Pria', 'Ogan', '1982-08-01', 'Strata 1 (S1)', 'Akademik', 'Islam', '5018.jpg', 'Instruktur Tetap', 'Programming, Autocad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` varchar(10) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `ruang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `nama_kelas`, `ruang`) VALUES
('AP-10-I', 'Aplikasi Perkantoran 3 Bulan | Angkatan I Jam 10', 'R1'),
('AP-10-II', 'Aplikasi Perkantoran 3 Bulan | Angkatan II Jam 10', 'R2'),
('DG-10-I', 'Desain Grafis 3 Bulan | Angkatan I Jam 10', 'R2'),
('DG-10-II', 'Desain Grafis 3 Bulan | Angkatan II Jam 10', 'R1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kode_mk` varchar(10) NOT NULL,
  `nama_mk` varchar(150) NOT NULL,
  `sks` int(1) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `jumlah_pertemuan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`kode_mk`, `nama_mk`, `sks`, `jenis`, `jumlah_pertemuan`) VALUES
('MWD', 'Web Design', 2, 'Praktek', 10),
('MWF', 'Web Framework', 3, 'Praktek', 15),
('MWP', 'Web Programming', 3, 'Praktek', 15),
('MWS', 'Web CMS', 2, 'Praktek', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_studi`
--

CREATE TABLE `program_studi` (
  `kode_program` varchar(10) NOT NULL,
  `nama_program` varchar(100) NOT NULL,
  `ketua_program` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `program_studi`
--

INSERT INTO `program_studi` (`kode_program`, `nama_program`, `ketua_program`) VALUES
('AM', 'Aplikasi Mobile', 'Aan Sori'),
('AP', 'Aplikasi Perkantoran', 'Rokayah'),
('DA', 'Digital Ads', 'Sugono Galih Aprianto'),
('DG', 'Desain Grafis', 'Rokayah'),
('WD', 'Web Design', 'Sugono Galih Aprianto'),
('WF', 'Web Framework', 'Sugono Galih Aprianto'),
('WP', 'Web Programming', 'Sugono Galih Aprianto'),
('WS', 'Web CMS', 'Sugono Galih Aprianto');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nokwi` varchar(25) NOT NULL,
  `tgldaftar` date NOT NULL,
  `nama_siswa` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `kode_program` varchar(10) NOT NULL,
  `angkatan` int(4) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `tplhr` varchar(100) NOT NULL,
  `tglhr` date NOT NULL,
  `jekel` enum('Pria','Wanita') NOT NULL DEFAULT 'Pria',
  `agama` varchar(50) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `asalsekolah` varchar(100) NOT NULL,
  `thnlulus` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `password`, `nokwi`, `tgldaftar`, `nama_siswa`, `email`, `kode_program`, `angkatan`, `foto`, `alamat`, `tplhr`, `tglhr`, `jekel`, `agama`, `notelp`, `asalsekolah`, `thnlulus`) VALUES
('GKAP-001', '88645016ea3d15a6657b95c8b1fe97bc9e77715ecd775bf6c09fd82360d06dfb', 'KW-001', '2019-06-07', 'Novita Sari', 'novita@gmail.com', 'AP', 2019, '56Hydrangeas.jpg', 'Pulau Buton Raya Street No. 60 Bandar Lampung', 'Bandar Lampung', '1991-11-20', 'Wanita', 'Islam', '0821 7754 7770', 'SMK Muhammadiyah Metro', 2013),
('GKAP-002', '9b2a3c62de66c2bd851b24f383bddcbcf3a1efe738ec5494a96b3fd4ccfe3ecb', 'KW-002', '2019-06-29', 'Galih Aprianto', 'aprianto@gmail.com', 'AP', 2019, '64true-agency-974117-unsplash.jpg', 'Pulau Buton Raya Street No. 60 Bandar Lampung', 'Bandar Lampung', '1991-04-28', 'Pria', 'Islam', '0821 7754 9990', 'SMK Metro Update', 2018),
('GKAP-003', '9b2a3c62de66c2bd851b24f383bddcbcf3a1efe738ec5494a96b3fd4ccfe3ecb', 'KW-003', '2019-02-07', 'Koala Update', 'koala@gmail.com', 'AP', 2019, '97Koala.jpg', 'Pulau Buton Raya Street No. 60 Bandar Lampung', 'Bandar Lampung', '1999-12-02', 'Wanita', 'Kristen Protestan', '0821 7754 6660', 'SMK Muhammadiyah Metro', 2017);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `level` enum('admin','user') NOT NULL DEFAULT 'user',
  `block` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`username`, `password`, `full_name`, `email`, `level`, `block`) VALUES
('admin', '88b3340abaa6acbf87abe45f68fa8960224c1e36f6a96433bcbc490c84c9c6d2', 'Administrator', 'admin@cmsblog.com', 'admin', 'No'),
('aldy', '960556fcdc05b33232c44b5343f246713fd57b9b04b4b903f47a7c742eeccf39', 'Aldy', 'aldy@gmail.com', 'user', 'No'),
('galih', '4fc650d13fc920f78236746c2a2dc6cb1126f9cc446cb727273c13428e19401b', 'Sugono Galih', 'indosmartdg@gmail.com', 'user', 'No'),
('user', '9e75aa32de6fb60e9fe97e8753de0122d32f62eeb638626de8f3f77dfbd78f05', 'Adiva Yasna Umaiza', 'adiva@cmsblog.com', 'user', 'No');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `instruktur`
--
ALTER TABLE `instruktur`
  ADD PRIMARY KEY (`kdinstruktur`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kode_mk`);

--
-- Indeks untuk tabel `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`kode_program`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
