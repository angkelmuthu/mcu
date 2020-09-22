-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for mcu
CREATE DATABASE IF NOT EXISTS `mcu` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `mcu`;

-- Dumping structure for table mcu.m_bayar
CREATE TABLE IF NOT EXISTS `m_bayar` (
  `kdbayar` int(11) NOT NULL AUTO_INCREMENT,
  `bayar` varchar(50) NOT NULL,
  `kdmetodebayar` int(11) NOT NULL,
  `piutang` enum('Y','N') NOT NULL,
  `aktif` enum('Y','N') NOT NULL,
  `tglinput` datetime NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`kdbayar`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table mcu.m_bayar_metode
CREATE TABLE IF NOT EXISTS `m_bayar_metode` (
  `kdmetodebayar` int(11) NOT NULL AUTO_INCREMENT,
  `metode` varchar(50) NOT NULL,
  `keterangan` tinytext NOT NULL,
  `aktif` enum('Y','N') NOT NULL,
  PRIMARY KEY (`kdmetodebayar`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table mcu.m_dokter
CREATE TABLE IF NOT EXISTS `m_dokter` (
  `kddokter` int(11) NOT NULL AUTO_INCREMENT,
  `NIP` int(20) NOT NULL,
  `dokter` varchar(100) NOT NULL,
  `aktif` enum('Y','N') NOT NULL,
  PRIMARY KEY (`kddokter`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table mcu.m_dokterjadwal
CREATE TABLE IF NOT EXISTS `m_dokterjadwal` (
  `kdjadwal` int(11) NOT NULL AUTO_INCREMENT,
  `kddokter` int(11) NOT NULL,
  `kdunit` varchar(5) NOT NULL,
  `kode` int(11) NOT NULL,
  `hari` int(11) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `tglinput` datetime NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`kdjadwal`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table mcu.m_icd10
CREATE TABLE IF NOT EXISTS `m_icd10` (
  `chapter` int(2) DEFAULT NULL,
  `s1` varchar(3) DEFAULT NULL,
  `code` varchar(5) NOT NULL DEFAULT '',
  `code2` varchar(6) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `severity` int(1) DEFAULT NULL,
  `Inpatient` text DEFAULT NULL,
  `Outpatient` text DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table mcu.m_kawin
CREATE TABLE IF NOT EXISTS `m_kawin` (
  `kdkawin` int(11) NOT NULL AUTO_INCREMENT,
  `kawin` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kdkawin`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table mcu.m_kelamin
CREATE TABLE IF NOT EXISTS `m_kelamin` (
  `kdklmn` int(11) NOT NULL AUTO_INCREMENT,
  `kelamin` varchar(50) NOT NULL,
  PRIMARY KEY (`kdklmn`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table mcu.m_kelas
CREATE TABLE IF NOT EXISTS `m_kelas` (
  `kdkelas` int(11) NOT NULL AUTO_INCREMENT,
  `kelas` varchar(50) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`kdkelas`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table mcu.m_keringanan
CREATE TABLE IF NOT EXISTS `m_keringanan` (
  `kdkeringanan` int(11) NOT NULL AUTO_INCREMENT,
  `keringanan` varchar(50) NOT NULL DEFAULT '',
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`kdkeringanan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table mcu.m_lab
CREATE TABLE IF NOT EXISTS `m_lab` (
  `kdlab` int(11) NOT NULL AUTO_INCREMENT,
  `nmlab` varchar(70) NOT NULL,
  `deskripsi` varchar(150) NOT NULL DEFAULT '',
  `nilai_min` float NOT NULL DEFAULT 0,
  `nilai_max` float NOT NULL DEFAULT 0,
  `nilai_normal` varchar(50) NOT NULL,
  `nilai_tidak_normal` varchar(50) NOT NULL,
  `tglinput` datetime NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`kdlab`)
) ENGINE=InnoDB AUTO_INCREMENT=409 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table mcu.m_labgroup
CREATE TABLE IF NOT EXISTS `m_labgroup` (
  `kdlabgroup` int(11) NOT NULL AUTO_INCREMENT,
  `kdtarif` int(11) NOT NULL,
  `kdlab` int(11) NOT NULL,
  `tglinput` datetime NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`kdlabgroup`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table mcu.m_obat
CREATE TABLE IF NOT EXISTS `m_obat` (
  `kdobat` int(11) NOT NULL AUTO_INCREMENT,
  `kdkatalog` int(11) NOT NULL,
  `kdfornas` int(11) NOT NULL,
  `generik` enum('Y','N') NOT NULL DEFAULT 'N',
  `kdpoli` int(11) NOT NULL,
  `nmobat` varchar(100) NOT NULL,
  `kdobatjenis` int(11) NOT NULL,
  `dosis` int(11) NOT NULL,
  `kdobatsatuan` int(11) NOT NULL,
  `kdobatcara` int(11) NOT NULL,
  `kdobatpakai` int(11) NOT NULL,
  `hargaobat` int(11) NOT NULL,
  `hashtag` text DEFAULT NULL,
  `tglinput` datetime NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`kdobat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table mcu.m_obatcara
CREATE TABLE IF NOT EXISTS `m_obatcara` (
  `kdobatcara` int(11) NOT NULL AUTO_INCREMENT,
  `obatcara` varchar(50) NOT NULL,
  PRIMARY KEY (`kdobatcara`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table mcu.m_obatjenis
CREATE TABLE IF NOT EXISTS `m_obatjenis` (
  `kdobatjenis` int(11) NOT NULL AUTO_INCREMENT,
  `obatjenis` varchar(50) NOT NULL,
  PRIMARY KEY (`kdobatjenis`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table mcu.m_obatpakai
CREATE TABLE IF NOT EXISTS `m_obatpakai` (
  `kdobatpakai` int(11) NOT NULL AUTO_INCREMENT,
  `obatpakai` varchar(50) NOT NULL,
  `waktu` varchar(50) NOT NULL,
  `makan` varchar(50) NOT NULL,
  PRIMARY KEY (`kdobatpakai`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table mcu.m_obatsatuan
CREATE TABLE IF NOT EXISTS `m_obatsatuan` (
  `kdobatsatuan` int(11) NOT NULL AUTO_INCREMENT,
  `obatsatuan` varchar(50) NOT NULL,
  PRIMARY KEY (`kdobatsatuan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table mcu.m_obatstok
CREATE TABLE IF NOT EXISTS `m_obatstok` (
  `idstok` int(11) NOT NULL AUTO_INCREMENT,
  `nobatch` varchar(50) NOT NULL,
  `kdobat` int(11) NOT NULL,
  `expired` date NOT NULL,
  `stok` int(11) NOT NULL,
  `tglinput` datetime NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`idstok`),
  UNIQUE KEY `nobatch` (`nobatch`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table mcu.m_pasien
CREATE TABLE IF NOT EXISTS `m_pasien` (
  `nomr` char(50) NOT NULL,
  `nik` bigint(20) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `tgllhr` date NOT NULL,
  `alamat` tinytext NOT NULL,
  `kodepos` int(11) NOT NULL,
  `kdklmn` int(1) NOT NULL,
  `kdkawin` int(1) DEFAULT NULL,
  `hp` char(12) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `tglinput` date NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`nomr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table mcu.m_poli
CREATE TABLE IF NOT EXISTS `m_poli` (
  `kdpoli` int(11) NOT NULL AUTO_INCREMENT,
  `poli` varchar(50) NOT NULL,
  `kdunit` varchar(5) NOT NULL,
  PRIMARY KEY (`kdpoli`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table mcu.m_ruang
CREATE TABLE IF NOT EXISTS `m_ruang` (
  `kdruang` int(11) NOT NULL AUTO_INCREMENT,
  `ruang` varchar(50) NOT NULL,
  `kdunit` varchar(5) NOT NULL,
  `iskelas` enum('Y','N') NOT NULL,
  `kdkelas` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `aktif` enum('Y','N') NOT NULL,
  PRIMARY KEY (`kdruang`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table mcu.m_ruangbed
CREATE TABLE IF NOT EXISTS `m_ruangbed` (
  `kdbed` int(11) NOT NULL AUTO_INCREMENT,
  `nobed` char(10) NOT NULL,
  `kdruang` int(11) NOT NULL,
  `aktif` enum('Y','N') NOT NULL,
  PRIMARY KEY (`kdbed`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table mcu.m_tarif
CREATE TABLE IF NOT EXISTS `m_tarif` (
  `kdtarif` int(11) NOT NULL AUTO_INCREMENT,
  `nmtarif` varchar(150) NOT NULL DEFAULT '',
  `kdpoli` int(11) NOT NULL,
  `paket` enum('Y','N') NOT NULL DEFAULT 'N',
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  `tglinput` datetime NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`kdtarif`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table mcu.m_tarifgroup
CREATE TABLE IF NOT EXISTS `m_tarifgroup` (
  `kdtarifgroup` int(11) NOT NULL AUTO_INCREMENT,
  `tarifgroup` varchar(50) NOT NULL,
  `kdpoli` int(11) NOT NULL,
  PRIMARY KEY (`kdtarifgroup`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table mcu.m_tarifkelas
CREATE TABLE IF NOT EXISTS `m_tarifkelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kdkelas` int(11) NOT NULL,
  `kdtarif` int(11) NOT NULL,
  `harga` int(20) NOT NULL,
  `tglinput` datetime NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kdkelas` (`kdtarif`,`kdkelas`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table mcu.m_tarifpaket
CREATE TABLE IF NOT EXISTS `m_tarifpaket` (
  `kdtarifpaket` int(11) NOT NULL AUTO_INCREMENT,
  `kdtarif` int(11) NOT NULL,
  `kdsubtarif` int(11) NOT NULL,
  `tglinput` datetime NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`kdtarifpaket`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table mcu.m_tarifpaketdetail
CREATE TABLE IF NOT EXISTS `m_tarifpaketdetail` (
  `kdpaketdetail` int(11) NOT NULL AUTO_INCREMENT,
  `kdtarifpaket` int(11) NOT NULL,
  `kdtarif` int(11) NOT NULL,
  `tglinput` datetime NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`kdpaketdetail`),
  KEY `kdtarif` (`kdtarif`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table mcu.m_tarifpaketx
CREATE TABLE IF NOT EXISTS `m_tarifpaketx` (
  `kdtarifpaket` int(11) NOT NULL AUTO_INCREMENT,
  `nmpaket` varchar(70) NOT NULL,
  `potongan` int(11) NOT NULL DEFAULT 0,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  `tglinput` datetime NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`kdtarifpaket`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table mcu.m_unit
CREATE TABLE IF NOT EXISTS `m_unit` (
  `idunit` int(11) NOT NULL AUTO_INCREMENT,
  `kdunit` varchar(5) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `inap` enum('Y','N') NOT NULL,
  PRIMARY KEY (`idunit`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table mcu.tbl_hak_akses
CREATE TABLE IF NOT EXISTS `tbl_hak_akses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table mcu.tbl_kodepos
CREATE TABLE IF NOT EXISTS `tbl_kodepos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kodepos` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ixkodepos` (`kodepos`)
) ENGINE=InnoDB AUTO_INCREMENT=28457 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table mcu.tbl_menu
CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no',
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table mcu.tbl_setting
CREATE TABLE IF NOT EXISTS `tbl_setting` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(40) NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table mcu.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table mcu.tbl_user_level
CREATE TABLE IF NOT EXISTS `tbl_user_level` (
  `id_user_level` int(11) NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(30) NOT NULL,
  PRIMARY KEY (`id_user_level`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table mcu.t_asessment
CREATE TABLE IF NOT EXISTS `t_asessment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `noreg` char(11) NOT NULL,
  `nobill` varchar(50) NOT NULL,
  `alergi` text DEFAULT NULL,
  `keluhan` text DEFAULT NULL,
  `r_penyakit` text DEFAULT NULL,
  `instruksi` text DEFAULT NULL,
  `kddokter` int(11) NOT NULL,
  `tglinput` datetime NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table mcu.t_billbayar
CREATE TABLE IF NOT EXISTS `t_billbayar` (
  `idbayar` int(11) NOT NULL AUTO_INCREMENT,
  `nobayar` bigint(20) NOT NULL,
  `nobill` varchar(50) NOT NULL,
  `noreg` char(11) NOT NULL,
  `jmlbayar` int(11) NOT NULL,
  `status` set('BL','L','BT') NOT NULL DEFAULT 'BL',
  `tglinput` datetime NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`idbayar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table mcu.t_billobat
CREATE TABLE IF NOT EXISTS `t_billobat` (
  `idbill` int(11) NOT NULL AUTO_INCREMENT,
  `nobill` varchar(50) NOT NULL,
  `noreg` char(11) NOT NULL,
  `kdpoli` int(11) NOT NULL,
  `kddokter` int(11) NOT NULL,
  `kdobat` int(11) NOT NULL,
  `hargaobat` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `kdbayar` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `nobayar` bigint(20) DEFAULT NULL,
  `tglinput` datetime NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`idbill`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table mcu.t_billrajal
CREATE TABLE IF NOT EXISTS `t_billrajal` (
  `idbill` int(11) NOT NULL AUTO_INCREMENT,
  `nobill` varchar(50) NOT NULL,
  `noreg` char(11) NOT NULL,
  `kdpoli` int(11) NOT NULL,
  `kddokter` int(11) NOT NULL,
  `paket` enum('Y','N') NOT NULL,
  `kdtarif` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(3) NOT NULL,
  `kdbayar` int(11) NOT NULL,
  `status` set('BL','L','BT') NOT NULL DEFAULT 'BL',
  `nobayar` bigint(20) DEFAULT NULL,
  `tglinput` datetime NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`idbill`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table mcu.t_daftar
CREATE TABLE IF NOT EXISTS `t_daftar` (
  `idreg` int(11) NOT NULL AUTO_INCREMENT,
  `noreg` char(11) NOT NULL,
  `nobill` varchar(50) NOT NULL,
  `nomr` char(6) NOT NULL,
  `baru` enum('Y','N') NOT NULL,
  `kddokter` int(11) NOT NULL,
  `kdpoli` int(11) NOT NULL,
  `kdbayar` int(11) NOT NULL,
  `rujukan` enum('Y','N') NOT NULL,
  `kdrujuk` int(11) NOT NULL,
  `tglreg` datetime NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`idreg`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table mcu.t_icd
CREATE TABLE IF NOT EXISTS `t_icd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `noreg` char(50) NOT NULL,
  `nobill` varchar(50) NOT NULL,
  `flag` varchar(50) NOT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `code` varchar(50) NOT NULL,
  `kddokter` int(11) NOT NULL,
  `tglinput` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table mcu.t_keringanan
CREATE TABLE IF NOT EXISTS `t_keringanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `noreg` char(50) NOT NULL DEFAULT '',
  `kdkeringanan` int(11) NOT NULL,
  `alasan` text NOT NULL,
  `jml` int(11) NOT NULL,
  `nobayar` bigint(20) DEFAULT NULL,
  `tglinput` datetime NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table mcu.t_labhasil
CREATE TABLE IF NOT EXISTS `t_labhasil` (
  `idlab` int(11) NOT NULL AUTO_INCREMENT,
  `noreg` char(11) NOT NULL,
  `nobill` varchar(50) NOT NULL,
  `kdlab` int(11) NOT NULL,
  `nilai` float NOT NULL,
  `tglinput` datetime NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`idlab`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table mcu.t_radhasil
CREATE TABLE IF NOT EXISTS `t_radhasil` (
  `idrad` int(11) NOT NULL AUTO_INCREMENT,
  `nobill` varchar(50) NOT NULL DEFAULT '',
  `noreg` char(11) NOT NULL,
  `kdtarif` int(11) NOT NULL,
  `hasil` text NOT NULL,
  `tglinput` datetime NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`idrad`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table mcu.t_rad_file
CREATE TABLE IF NOT EXISTS `t_rad_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nobill` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `noreg` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `kdtarif` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table mcu.t_vital
CREATE TABLE IF NOT EXISTS `t_vital` (
  `noreg` char(50) NOT NULL,
  `nomr` char(50) NOT NULL,
  `bb` int(11) DEFAULT NULL COMMENT 'berat badan',
  `tb` int(11) DEFAULT NULL COMMENT 'tinggi badan',
  `sb` int(11) DEFAULT NULL,
  `sistole` int(11) DEFAULT NULL,
  `diastole` int(11) DEFAULT NULL,
  `nadi` int(11) DEFAULT NULL,
  `napas` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `tglinput` datetime NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`noreg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for view mcu.v_bill
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_bill` (
	`resep` VARCHAR(1) NOT NULL COLLATE 'utf8mb4_general_ci',
	`poli` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`dokter` VARCHAR(100) NULL COLLATE 'utf8_general_ci',
	`nobill` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`nomr` CHAR(6) NULL COLLATE 'utf8_general_ci',
	`noreg` CHAR(11) NOT NULL COLLATE 'utf8_general_ci',
	`kode` INT(11) NOT NULL,
	`nama` VARCHAR(150) NULL COLLATE 'utf8_general_ci',
	`harga` INT(11) NOT NULL,
	`qty` INT(11) NOT NULL,
	`kdbayar` INT(11) NOT NULL,
	`bayar` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`kdmetodebayar` INT(11) NULL,
	`metode` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`status` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`nobayar` BIGINT(20) NULL,
	`ttl` BIGINT(21) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view mcu.v_billtotal
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_billtotal` (
	`nobill` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`noreg` CHAR(11) NULL COLLATE 'utf8_general_ci',
	`kdbayar` INT(11) NULL,
	`bayar` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`kdmetodebayar` INT(11) NULL,
	`metode` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`status` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`ttl` DECIMAL(42,0) NULL
) ENGINE=MyISAM;

-- Dumping structure for view mcu.v_billtotal_head
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_billtotal_head` (
	`nobill` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`noreg` CHAR(11) NULL COLLATE 'utf8_general_ci',
	`kdbayar` INT(11) NULL,
	`bayar` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`kdmetodebayar` INT(11) NULL,
	`metode` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`status` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`ttl` DECIMAL(42,0) NULL
) ENGINE=MyISAM;

-- Dumping structure for view mcu.v_obatdetail
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_obatdetail` (
	`kdpoli` INT(11) NOT NULL,
	`kdobat` INT(11) NOT NULL,
	`generik` VARCHAR(11) NOT NULL COLLATE 'utf8mb4_general_ci',
	`obat` VARCHAR(264) NULL COLLATE 'utf8_general_ci',
	`rute` VARCHAR(101) NULL COLLATE 'utf8_general_ci',
	`stok` DECIMAL(32,0) NOT NULL,
	`hargaobat` INT(11) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view mcu.v_pasien
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_pasien` (
	`nomr` CHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`nik` BIGINT(20) NULL,
	`nama` VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
	`tgllhr` DATE NOT NULL,
	`alamat` TINYTEXT NOT NULL COLLATE 'utf8_general_ci',
	`kodepos` INT(11) NOT NULL,
	`kdklmn` INT(1) NOT NULL,
	`kdkawin` INT(1) NULL,
	`hp` CHAR(12) NULL COLLATE 'utf8_general_ci',
	`foto` VARCHAR(100) NULL COLLATE 'utf8_general_ci',
	`tglinput` DATE NOT NULL,
	`id_users` INT(11) NOT NULL,
	`kelamin` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`kawin` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`full_name` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view mcu.v_pendaftaran
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_pendaftaran` (
	`idreg` INT(11) NOT NULL,
	`noreg` CHAR(11) NOT NULL COLLATE 'utf8_general_ci',
	`nobill` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`baru` ENUM('Y','N') NOT NULL COLLATE 'utf8_general_ci',
	`kdpoli` INT(11) NOT NULL,
	`kddokter` INT(11) NOT NULL,
	`kdbayar` INT(11) NOT NULL,
	`rujukan` ENUM('Y','N') NOT NULL COLLATE 'utf8_general_ci',
	`kdrujuk` INT(11) NOT NULL,
	`tglreg` DATETIME NOT NULL,
	`petugas` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nomr` CHAR(50) NULL COLLATE 'utf8_general_ci',
	`nik` BIGINT(20) NULL,
	`nama` VARCHAR(100) NULL COLLATE 'utf8_general_ci',
	`tgllhr` DATE NULL,
	`alamat` TINYTEXT NULL COLLATE 'utf8_general_ci',
	`kodepos` INT(11) NULL,
	`kdklmn` INT(1) NULL,
	`kdkawin` INT(1) NULL,
	`hp` CHAR(12) NULL COLLATE 'utf8_general_ci',
	`foto` VARCHAR(100) NULL COLLATE 'utf8_general_ci',
	`tglinput` DATE NULL,
	`id_users` INT(11) NULL,
	`kelamin` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`kawin` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`full_name` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`poli` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`kdunit` VARCHAR(5) NULL COLLATE 'utf8_general_ci',
	`unit` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`dokter` VARCHAR(100) NULL COLLATE 'utf8_general_ci',
	`bayar` VARCHAR(50) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view mcu.v_penunjang
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_penunjang` (
	`nobill` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`noreg` CHAR(11) NOT NULL COLLATE 'utf8_general_ci',
	`kdunit` VARCHAR(5) NULL COLLATE 'utf8_general_ci',
	`unit` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`kdpoli` INT(11) NULL,
	`poli` VARCHAR(50) NULL COLLATE 'utf8_general_ci',
	`kdtarif` INT(11) NOT NULL,
	`nmtarif` VARCHAR(150) NULL COLLATE 'utf8_general_ci',
	`status` SET('BL','L','BT') NOT NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view mcu.v_bill
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_bill`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_bill` AS SELECT 'N' as resep,c.poli,d.dokter,x.nobill,e.nomr,x.noreg,x.kdtarif as kode,xx.nmtarif as nama,x.harga,x.qty,x.kdbayar,a.bayar,b.kdmetodebayar,b.metode,x.status,x.nobayar, x.harga*x.qty AS ttl
FROM t_billrajal x
LEFT JOIN m_tarif xx ON x.kdtarif=xx.kdtarif
LEFT JOIN m_bayar a ON x.kdbayar=a.kdbayar
LEFT JOIN m_bayar_metode b ON a.kdmetodebayar=b.kdmetodebayar
LEFT JOIN m_poli c ON xx.kdpoli=c.kdpoli
LEFT JOIN m_dokter d ON x.kddokter=d.kddokter
LEFT JOIN t_daftar e ON x.noreg=e.noreg
#GROUP BY x.kdbayar
UNION ALL
SELECT 'Y' as resep,c.poli,d.dokter,x.nobill,e.nomr,x.noreg,x.kdobat as kode,xx.nmobat as nama,x.hargaobat AS harga,x.qty,x.kdbayar,a.bayar,b.kdmetodebayar,b.metode,x.status,x.nobayar, x.hargaobat*x.qty AS ttl
FROM t_billobat x
LEFT JOIN m_obat xx ON x.kdobat=xx.kdobat
LEFT JOIN m_bayar a ON x.kdbayar=a.kdbayar
LEFT JOIN m_bayar_metode b ON a.kdmetodebayar=b.kdmetodebayar
LEFT JOIN m_poli c ON xx.kdpoli=c.kdpoli
LEFT JOIN m_dokter d ON x.kddokter=d.kddokter
LEFT JOIN t_daftar e ON x.noreg=e.noreg ;

-- Dumping structure for view mcu.v_billtotal
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_billtotal`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_billtotal` AS SELECT x.nobill,x.noreg,x.kdbayar,a.bayar,b.kdmetodebayar,b.metode,x.status, SUM(x.harga*x.qty) AS ttl
FROM t_billrajal x
LEFT JOIN m_bayar a ON x.kdbayar=a.kdbayar
LEFT JOIN m_bayar_metode b ON a.kdmetodebayar=b.kdmetodebayar
UNION ALL
SELECT x.nobill,x.noreg,x.kdbayar,a.bayar,b.kdmetodebayar,b.metode,x.status, SUM(x.hargaobat*x.qty) AS ttl
FROM t_billobat x
LEFT JOIN m_bayar a ON x.kdbayar=a.kdbayar
LEFT JOIN m_bayar_metode b ON a.kdmetodebayar=b.kdmetodebayar ;

-- Dumping structure for view mcu.v_billtotal_head
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_billtotal_head`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_billtotal_head` AS SELECT x.nobill,x.noreg,x.kdbayar,a.bayar,b.kdmetodebayar,b.metode,x.status, SUM(x.harga*x.qty) AS ttl
FROM t_billrajal x
LEFT JOIN m_bayar a ON x.kdbayar=a.kdbayar
LEFT JOIN m_bayar_metode b ON a.kdmetodebayar=b.kdmetodebayar
UNION ALL
SELECT x.nobill,x.noreg,x.kdbayar,a.bayar,b.kdmetodebayar,b.metode,x.status, SUM(x.hargaobat*x.qty) AS ttl
FROM t_billobat x
LEFT JOIN m_bayar a ON x.kdbayar=a.kdbayar
LEFT JOIN m_bayar_metode b ON a.kdmetodebayar=b.kdmetodebayar ;

-- Dumping structure for view mcu.v_obatdetail
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_obatdetail`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_obatdetail` AS SELECT a.kdpoli,a.kdobat,if(a.generik='Y','GENERIK','Non GENERIK') AS generik,concat(a.nmobat,' ',c.obatjenis,' ',a.dosis,d.obatsatuan,' ',e.obatcara) AS obat,concat(f.obatpakai,' ',f.waktu) AS rute,ifnull(SUM(stok),0) AS stok,a.hargaobat FROM m_obat a
LEFT JOIN m_obatstok b ON a.kdobat=b.kdobat
LEFT JOIN m_obatjenis c ON a.kdobatjenis=c.kdobatjenis
LEFT JOIN m_obatsatuan d ON a.kdobatsatuan=d.kdobatsatuan
LEFT JOIN m_obatcara e ON a.kdobatcara=e.kdobatcara
LEFT JOIN m_obatpakai f ON a.kdobatpakai=f.kdobatpakai
GROUP BY a.kdobat ;

-- Dumping structure for view mcu.v_pasien
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_pasien`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_pasien` AS SELECT a.*,b.kelamin,c.kawin,d.full_name FROM m_pasien a
LEFT JOIN m_kelamin b ON a.kdklmn = b.kdklmn
LEFT JOIN m_kawin c ON a.kdkawin = c.kdkawin
LEFT JOIN tbl_user d ON a.id_users = d.id_users ;

-- Dumping structure for view mcu.v_pendaftaran
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_pendaftaran`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_pendaftaran` AS SELECT a.idreg,a.noreg,a.nobill,a.baru,a.kdpoli,a.kddokter,a.kdbayar,a.rujukan,a.kdrujuk,a.tglreg,e.full_name as petugas,b.*,c.poli,d.kdunit,d.unit,f.dokter,g.bayar FROM t_daftar a
LEFT JOIN v_pasien b ON a.nomr=b.nomr
LEFT JOIN m_poli c ON a.kdpoli=c.kdpoli
LEFT JOIN m_unit d ON c.kdunit=d.kdunit
LEFT JOIN tbl_user e ON a.id_users=e.id_users
LEFT JOIN m_dokter f ON a.kddokter=f.kddokter
LEFT JOIN m_bayar g ON a.kdbayar=g.kdbayar ;

-- Dumping structure for view mcu.v_penunjang
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `v_penunjang`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_penunjang` AS SELECT a.nobill,a.noreg,d.kdunit,d.unit,c.kdpoli,c.poli,a.kdtarif,b.nmtarif,a.status FROM t_billrajal a
LEFT JOIN m_tarif b ON a.kdtarif=b.kdtarif
LEFT JOIN m_poli c ON b.kdpoli=c.kdpoli
LEFT JOIN m_unit d ON c.kdunit=d.kdunit
WHERE d.kdunit=4 ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
