-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.20-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for dpsi
CREATE DATABASE IF NOT EXISTS `dpsi` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `dpsi`;

-- Dumping structure for table dpsi.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dpsi.admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
REPLACE INTO `admin` (`username`, `password`, `nama`) VALUES
	('root', '123', 'Admin');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table dpsi.aplikasi
CREATE TABLE IF NOT EXISTS `aplikasi` (
  `no` int(11) NOT NULL,
  `layanan` varchar(50) NOT NULL,
  `fungsi` varchar(50) NOT NULL,
  `dns` varchar(50) NOT NULL,
  `akses` varchar(50) NOT NULL,
  `sistemOperasi` varchar(50) NOT NULL,
  `framework` varchar(50) NOT NULL,
  `database` varchar(50) NOT NULL,
  PRIMARY KEY (`layanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dpsi.aplikasi: ~3 rows (approximately)
/*!40000 ALTER TABLE `aplikasi` DISABLE KEYS */;
REPLACE INTO `aplikasi` (`no`, `layanan`, `fungsi`, `dns`, `akses`, `sistemOperasi`, `framework`, `database`) VALUES
	(1, 'Absensi', 'Absensi Pusjatan', 'absensi.pusjatan.po.go.id', 'Internal', 'Windows Server 2008 R2', 'Dot Net', 'MS SQL 2008'),
	(2, 'APIK', 'APIK', 'apik.pusjatan.pu.go.id', 'Internal + Eksternal', 'Windows Server 2008 R2', 'PHP Native', 'MS SQL 2008'),
	(3, 'Aplikasi Pemilihan Tipe Pengadaan', 'Aplikasi Pemilihan Tipe Pengadaan', 'tipepengadaan.pusjatan.pu.go.id', 'Internal', 'Windows Server 2008 R2', 'Dot Net', 'MS SQL 2008'),
	(4, 'Aplikasi Pengujian Bahan dan Perkerasan Jalan', 'Aplikasi Pengujian Bahan dan Perkerasan Jalan', 'ujibbpj.pusjatan.pu.go.id', 'Internal', 'Windows Server 2008 R2', 'Dot Net', 'MS SQL 2008');
/*!40000 ALTER TABLE `aplikasi` ENABLE KEYS */;

-- Dumping structure for table dpsi.aset
CREATE TABLE IF NOT EXISTS `aset` (
  `no` int(11) NOT NULL,
  `ikmn` varchar(50) NOT NULL,
  `idRuang` varchar(20) NOT NULL,
  `serialNumber` varchar(12) NOT NULL,
  `kondisi` varchar(10) NOT NULL,
  `status` varchar(12) NOT NULL,
  `pengadaan` date NOT NULL,
  `dipasang` date NOT NULL,
  `keterangan1` varchar(255) NOT NULL,
  KEY `FK_aset_ruangan` (`idRuang`),
  KEY `FK_aset_perangkat` (`serialNumber`),
  CONSTRAINT `FK_aset_perangkat` FOREIGN KEY (`serialNumber`) REFERENCES `perangkat` (`serialNumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_aset_ruangan` FOREIGN KEY (`idRuang`) REFERENCES `ruangan` (`idRuang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dpsi.aset: ~4 rows (approximately)
/*!40000 ALTER TABLE `aset` DISABLE KEYS */;
REPLACE INTO `aset` (`no`, `ikmn`, `idRuang`, `serialNumber`, `kondisi`, `status`, `pengadaan`, `dipasang`, `keterangan1`) VALUES
	(1, '', 'Exp - 1 - H', '802aa806e68a', 'Baik', 'Digunakan', '2016-01-01', '2016-01-01', ''),
	(2, '', 'Exp - 1 - LPB', '802aa806ee23', 'Baik', 'Digunakan', '2016-01-01', '2016-01-01', ''),
	(5, '1', 'Sek - 1 - 1', '802aa806ed3d', '1', '2', '2021-12-17', '2021-12-09', '1'),
	(5, '1', 'Sek - 1 - 1', '802aa806ed3d', '1', '2', '2021-12-17', '2021-12-09', '1');
/*!40000 ALTER TABLE `aset` ENABLE KEYS */;

-- Dumping structure for table dpsi.berita
CREATE TABLE IF NOT EXISTS `berita` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `kegiatan` varchar(255) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `bulan` varchar(40) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `FK_berita_bulan` (`bulan`),
  CONSTRAINT `FK_berita_bulan` FOREIGN KEY (`bulan`) REFERENCES `bulan` (`idBulan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dpsi.berita: ~8 rows (approximately)
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
REPLACE INTO `berita` (`no`, `kegiatan`, `keterangan`, `bulan`) VALUES
	(1, 'Pembuatan Rencana Kegiatan IT 2021 secara detail dan disandingkan juga dengan Anggaran IT', 'Selesai', 'sep'),
	(2, 'Migrasi link Indosat IM2 X1 menjadi link Indosat Ooredoo X4', 'Selesai', 'sep'),
	(3, 'Penyesuaian konfigurasi wan to dmz dan NAT ip public sebelumnya menjadi ip public indosat Ooredoo', 'Selesai', 'sep'),
	(4, 'Konfigurasi DNS public server menyesuaikan dengan ip public baru indosat Ooredoo', 'Selesai', 'sep'),
	(5, 'Upgrade storage aplikasi cloud pusjatan dari 1.5Tb menjadi 2Tb', 'Selesai', 'sep'),
	(6, 'Penggantian access point area lantai 2 gedung carro', 'Selesai', 'sep'),
	(7, 'Pembuatan Topologi Terbaru Bintekjatan', 'Progress', 'sep'),
	(8, 'Rencana Pembagian Bandwidth Setiap Gedung berdasarkan kebutuhan dan priotitas', 'Progress Penyesuaian', 'sep');
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;

-- Dumping structure for table dpsi.bulan
CREATE TABLE IF NOT EXISTS `bulan` (
  `no` int(11) NOT NULL,
  `idBulan` varchar(4) NOT NULL,
  `namaBulan` varchar(12) NOT NULL,
  PRIMARY KEY (`idBulan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dpsi.bulan: ~12 rows (approximately)
/*!40000 ALTER TABLE `bulan` DISABLE KEYS */;
REPLACE INTO `bulan` (`no`, `idBulan`, `namaBulan`) VALUES
	(1, 'agu', 'Agustus'),
	(2, 'apr', 'April'),
	(3, 'des', 'Desember'),
	(4, 'feb', 'Februari'),
	(5, 'jan', 'Januari'),
	(6, 'jul', 'Juli'),
	(7, 'jun', 'Juni'),
	(8, 'mar', 'Maret'),
	(9, 'mei', 'Mei'),
	(10, 'nov', 'November'),
	(11, 'okt', 'Oktober'),
	(12, 'sep', 'September');
/*!40000 ALTER TABLE `bulan` ENABLE KEYS */;

-- Dumping structure for table dpsi.daftar_aplikasi
CREATE TABLE IF NOT EXISTS `daftar_aplikasi` (
  `no` int(11) NOT NULL,
  `layanan` varchar(50) NOT NULL,
  `ipAddress` varchar(15) NOT NULL,
  `dbServer` varchar(50) NOT NULL,
  `jenisServer` varchar(50) NOT NULL,
  `namaVM` varchar(50) NOT NULL,
  `jenisLayanan` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `FK_daftar_aplikasi_aplikasi` (`layanan`),
  CONSTRAINT `FK_daftar_aplikasi_aplikasi` FOREIGN KEY (`layanan`) REFERENCES `aplikasi` (`layanan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dpsi.daftar_aplikasi: ~3 rows (approximately)
/*!40000 ALTER TABLE `daftar_aplikasi` DISABLE KEYS */;
REPLACE INTO `daftar_aplikasi` (`no`, `layanan`, `ipAddress`, `dbServer`, `jenisServer`, `namaVM`, `jenisLayanan`, `status`) VALUES
	(1, 'APIK', '192.168.255.98', '192.168.255.11', 'Virtual', 'app34', 'Web Apps', 'Production'),
	(2, 'Absensi', '192.168.255.67', 'localhost', 'Virtual', 'app10', 'Web Apps', 'Production'),
	(3, 'Aplikasi Pemilihan Tipe Pengadaan', '192.168.255.17', '192.168.255.11', 'Virtual', 'Pengadaan', 'Web Apps', 'Production');
/*!40000 ALTER TABLE `daftar_aplikasi` ENABLE KEYS */;

-- Dumping structure for table dpsi.dokumen
CREATE TABLE IF NOT EXISTS `dokumen` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `namaFile` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dpsi.dokumen: ~0 rows (approximately)
/*!40000 ALTER TABLE `dokumen` DISABLE KEYS */;
/*!40000 ALTER TABLE `dokumen` ENABLE KEYS */;

-- Dumping structure for table dpsi.gedung
CREATE TABLE IF NOT EXISTS `gedung` (
  `idGedung` varchar(30) NOT NULL DEFAULT '',
  `namaGedung` varchar(30) NOT NULL DEFAULT '',
  `jumlahLantai` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`idGedung`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dpsi.gedung: ~17 rows (approximately)
/*!40000 ALTER TABLE `gedung` DISABLE KEYS */;
REPLACE INTO `gedung` (`idGedung`, `namaGedung`, `jumlahLantai`, `keterangan`) VALUES
	('Alusan', 'Alusan', 2, ''),
	('BLGJ', 'BLGJ', 2, ''),
	('BLPJ', 'BLPJ', 2, ''),
	('BLSJ', 'BLSJ', 2, ''),
	('BLSTL', 'BLSTL', 2, ''),
	('BLSTL Lab', 'BLSTL - Lab', 2, ''),
	('BLSTL M', 'BLSTL M', 1, ''),
	('Carro', 'Carro', 3, ''),
	('Expert', 'Expert', 2, ''),
	('Geositetik', 'Geositetik', 2, ''),
	('Koperasi', 'Koperasi', 1, ''),
	('Lab Alusan', 'Lab Alusan', 2, ''),
	('Lab Aspal', 'Lab Aspal', 2, ''),
	('Lab Uji Tiang', 'Lab Uji Tiang', 2, ''),
	('Pengembangan', 'Pengembangan', 1, ''),
	('Perpustakaan', 'Perpustakaan', 2, ''),
	('Sekretariat', 'Sekretariat', 2, '');
/*!40000 ALTER TABLE `gedung` ENABLE KEYS */;

-- Dumping structure for table dpsi.keluhan
CREATE TABLE IF NOT EXISTS `keluhan` (
  `bulan` varchar(30) NOT NULL,
  `klasifikasi` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `persentase` decimal(5,2) NOT NULL,
  `tahun` int(11) NOT NULL,
  KEY `FK_keluhan_bulan` (`bulan`),
  CONSTRAINT `FK_keluhan_bulan` FOREIGN KEY (`bulan`) REFERENCES `bulan` (`idBulan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dpsi.keluhan: ~6 rows (approximately)
/*!40000 ALTER TABLE `keluhan` DISABLE KEYS */;
REPLACE INTO `keluhan` (`bulan`, `klasifikasi`, `jumlah`, `persentase`, `tahun`) VALUES
	('nov', 'Firewall', 7, 12.00, 2020),
	('nov', 'Server', 3, 5.00, 2020),
	('nov', 'Mail', 4, 7.00, 2020),
	('nov', 'Vpn Server', 0, 0.00, 2020),
	('nov', 'Jaringan', 30, 53.00, 2020),
	('nov', 'Aplikasi', 11, 19.00, 2020),
	('nov', 'Hardware', 1, 1.97, 2020);
/*!40000 ALTER TABLE `keluhan` ENABLE KEYS */;

-- Dumping structure for table dpsi.lantai
CREATE TABLE IF NOT EXISTS `lantai` (
  `idLantai` varchar(30) NOT NULL,
  `idGedung` varchar(30) NOT NULL,
  `namaLantai` varchar(30) NOT NULL,
  PRIMARY KEY (`idLantai`),
  KEY `FK_lantai_gedung` (`idGedung`),
  CONSTRAINT `FK_lantai_gedung` FOREIGN KEY (`idGedung`) REFERENCES `gedung` (`idGedung`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dpsi.lantai: ~30 rows (approximately)
/*!40000 ALTER TABLE `lantai` DISABLE KEYS */;
REPLACE INTO `lantai` (`idLantai`, `idGedung`, `namaLantai`) VALUES
	('Alusan - 1', 'Alusan', '1'),
	('BLGJ - 1', 'BLGJ', '1'),
	('BLGJ - 2', 'BLGJ', '2'),
	('BLPJ - 1', 'BLPJ', '1'),
	('BLPJ - 2', 'BLSJ', '2'),
	('BLSJ - 1', 'BLSJ', '1'),
	('BLSTL - 1', 'BLSTL', '1'),
	('BLSTL - 2', 'BLSTL', '2'),
	('BLSTL Lab - 1', 'BLSTL Lab', '1'),
	('BLSTL Lab - 2', 'BLSTL Lab', '2'),
	('BLSTL M - 1', 'BLSTL M', '1'),
	('Carro - 1', 'Carro', '1'),
	('Carro - 2', 'Carro', '2'),
	('Carro - 3', 'Carro', '3'),
	('Exp - 1', 'Expert', '1'),
	('Exp - 2', 'Expert', '2'),
	('Geo - 1', 'Geositetik', '1'),
	('Geo - 2', 'Geositetik', '2'),
	('Koperasi - 1', 'Koperasi', '1'),
	('Lab Alu - 1', 'Lab Alusan', '1'),
	('Lab Alu - 2', 'Lab Alusan', '2'),
	('Lab Asp - 1', 'Lab Aspal', '1'),
	('Lab Uji T - 1', 'Lab Uji Tiang', '1'),
	('Lab Uji T - 2', 'Lab Uji Tiang', '2'),
	('Pen - 1', 'Pengembangan', '1'),
	('Pen - 2', 'Pengembangan', '2'),
	('Perpus - 1', 'Perpustakaan', '1'),
	('Perpus - 2', 'Perpustakaan', '2'),
	('Sek - 1', 'Sekretariat', '1'),
	('Sek - 2', 'Sekretariat', '2');
/*!40000 ALTER TABLE `lantai` ENABLE KEYS */;

-- Dumping structure for table dpsi.perangkat
CREATE TABLE IF NOT EXISTS `perangkat` (
  `serialNumber` varchar(12) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `garansi` int(11) NOT NULL,
  `lifeTime` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`serialNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dpsi.perangkat: ~6 rows (approximately)
/*!40000 ALTER TABLE `perangkat` DISABLE KEYS */;
REPLACE INTO `perangkat` (`serialNumber`, `kategori`, `merk`, `garansi`, `lifeTime`) VALUES
	('802aa806e61e', 'Access Point', 'Unifi AP-LR', 1, 4),
	('802aa806e68a', 'Access Point', 'Unifi AP-LR', 1, 4),
	('802aa806ed3d', 'Access Point', 'Unifi AP-LR', 1, 4),
	('802aa806ee23', 'Access Point', 'Unifi AP-LR', 1, 4),
	('802aa806eea7', 'Access Point', 'Unifi AP-LR', 1, 5);
/*!40000 ALTER TABLE `perangkat` ENABLE KEYS */;

-- Dumping structure for table dpsi.permintaan
CREATE TABLE IF NOT EXISTS `permintaan` (
  `bulan` varchar(30) NOT NULL,
  `klasifikasi` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `persentase` decimal(5,2) NOT NULL,
  `tahun` int(11) NOT NULL,
  KEY `FK_request_bulan` (`bulan`),
  CONSTRAINT `FK_request_bulan` FOREIGN KEY (`bulan`) REFERENCES `bulan` (`idBulan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dpsi.permintaan: ~8 rows (approximately)
/*!40000 ALTER TABLE `permintaan` DISABLE KEYS */;
REPLACE INTO `permintaan` (`bulan`, `klasifikasi`, `jumlah`, `persentase`, `tahun`) VALUES
	('nov', 'Firewall', 28, 10.00, 2020),
	('nov', 'Server', 25, 9.00, 2020),
	('nov', 'Mail', 31, 11.00, 2020),
	('nov', 'VPN Server', 89, 33.00, 2020),
	('nov', 'Jaringan', 21, 8.00, 2020),
	('nov', 'Aplikasi', 44, 16.00, 2020),
	('nov', 'Hardware', 0, 0.00, 2020),
	('nov', 'Report', 24, 9.00, 2020);
/*!40000 ALTER TABLE `permintaan` ENABLE KEYS */;

-- Dumping structure for table dpsi.ruangan
CREATE TABLE IF NOT EXISTS `ruangan` (
  `idRuang` varchar(50) NOT NULL,
  `idLantai` varchar(30) NOT NULL,
  `idGedung` varchar(30) NOT NULL,
  `namaRuang` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`idRuang`),
  KEY `FK_ruangan_lantai` (`idLantai`),
  KEY `FK_ruangan_gedung` (`idGedung`),
  CONSTRAINT `FK_ruangan_gedung` FOREIGN KEY (`idGedung`) REFERENCES `gedung` (`idGedung`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_ruangan_lantai` FOREIGN KEY (`idLantai`) REFERENCES `lantai` (`idLantai`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dpsi.ruangan: ~8 rows (approximately)
/*!40000 ALTER TABLE `ruangan` DISABLE KEYS */;
REPLACE INTO `ruangan` (`idRuang`, `idLantai`, `idGedung`, `namaRuang`, `keterangan`) VALUES
	('Exp - 1 - H', 'Exp - 1', 'Expert', 'Humas', ''),
	('Exp - 1 - LPB', 'Exp - 1', 'Expert', 'Lorong Pintu Belakang', ''),
	('Exp - 2 - G', 'Exp - 2', 'Expert', 'Gym', ''),
	('Exp - 2 - LTB', 'Exp - 2', 'Expert', 'Lorong Tangga Belakang', ''),
	('Exp - 2 - LTD', 'Exp - 2', 'Expert', 'Lorong Tangga Depan', ''),
	('Sek - 1 - 1', 'Sek - 1', 'Sekretariat', '1', ''),
	('Sek - 2 - 1', 'Sek - 2', 'Sekretariat', '1', ''),
	('Sek - 2 - 2', 'Sek - 2', 'Sekretariat', '2', '');
/*!40000 ALTER TABLE `ruangan` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
