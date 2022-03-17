-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 13, 2014 at 04:53 AM
-- Server version: 5.1.69
-- PHP Version: 5.3.6-13ubuntu3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gis_pipa`
--

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE IF NOT EXISTS `desa` (
  `id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `kode` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `kecamatan_id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `keterangan` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `aktif` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode` (`kode`),
  KEY `kecamatan_id` (`kecamatan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`id`, `kode`, `kecamatan_id`, `nama`, `keterangan`, `aktif`) VALUES
('3510010001', '35.10.01.04', '3510010', 'SARONGAN', '', 1),
('3510010002', '35.10.01.03', '3510010', 'KANDANGAN', '', 1),
('3510010003', '35.10.01.02', '3510010', 'SUMBERAGUNG', '', 1),
('3510010004', '35.10.01.01', '3510010', 'PESANGGARAN', '', 1),
('3510010009', '35.10.01.05', '3510010', 'SUMBERMULYO', '', 1),
('3510011001', NULL, '3510011', 'BULUAGUNG', '', 1),
('3510011002', NULL, '3510011', 'SILIRAGUNG', '', 1),
('3510011003', NULL, '3510011', 'SENEPOREJO', '', 1),
('3510011004', NULL, '3510011', 'KESILIR', '', 1),
('3510011005', NULL, '3510011', 'BARUREJO', '', 1),
('3510020001', '35.10.02.06', '3510020', 'SUKOREJO', '', 1),
('3510020002', '35.10.02.05', '3510020', 'RINGINTELU', '', 1),
('3510020003', '35.10.02.03', '3510020', 'SAMBIREJO', '', 1),
('3510020004', '35.10.02.04', '3510020', 'SAMBIMULYO', '', 1),
('3510020006', '35.10.02.07', '3510020', 'TEMUREJO', '', 1),
('3510020007', '35.10.02.02', '3510020', 'BANGOREJO', '', 1),
('3510020008', '35.10.02.01', '3510020', 'KEBONDALEM', '', 1),
('3510030001', '35.10.03.01', '3510030', 'GRAJAGAN', '', 1),
('3510030002', '35.10.03.07', '3510030', 'SUMBERASRI', '', 1),
('3510030003', '35.10.03.02', '3510030', 'GLAGAHAGUNG', '', 1),
('3510030004', NULL, '3510030', 'KARETAN', '', 1),
('3510030005', '35.10.03.05', '3510030', 'BULUREJO', '', 1),
('3510030006', '35.10.03.04', '3510030', 'PURWOHARJO', '', 1),
('3510030007', '35.10.03.06', '3510030', 'SIDOREJO', '', 1),
('3510030008', '35.10.03.03', '3510030', 'KRADENAN', '', 1),
('3510040001', '35.10.04.03', '3510040', 'PURWOASRI', '', 1),
('3510040002', '35.10.04.01', '3510040', 'KENDALREJO', '', 1),
('3510040003', '35.10.04.07', '3510040', 'KEDUNGASRI', '', 1),
('3510040004', '35.10.04.04', '3510040', 'KEDUNGWUNGU', '', 1),
('3510040005', '35.10.04.05', '3510040', 'TEGALDLIMO', '', 1),
('3510040006', '35.10.04.06', '3510040', 'WRINGINPITU', '', 1),
('3510040007', '35.10.04.02', '3510040', 'KEDUNGGEBANG', '', 1),
('3510040008', NULL, '3510040', 'PURWOAGUNG', '', 1),
('3510040009', NULL, '3510040', 'KALIPAIT', '', 1),
('3510050001', NULL, '3510050', 'SUMBERBERAS', '', 1),
('3510050002', NULL, '3510050', 'WRINGIN PUTIH', '', 1),
('3510050003', NULL, '3510050', 'KEDUNGRINGIN', '', 1),
('3510050004', NULL, '3510050', 'TAMBAKREJO', '', 1),
('3510050005', NULL, '3510050', 'TAPANREJO', '', 1),
('3510050006', NULL, '3510050', 'BLAMBANGAN', '', 1),
('3510050007', NULL, '3510050', 'KEDUNGREJO', '', 1),
('3510050008', NULL, '3510050', 'TEMBOKREJO', '', 1),
('3510050009', NULL, '3510050', 'SUMBERSEWU', '', 1),
('3510050010', NULL, '3510050', 'KUMENDUNG', '', 1),
('3510060001', NULL, '3510060', 'SEMBULUNG', '', 1),
('3510060002', NULL, '3510060', 'TAMPO', '', 1),
('3510060003', NULL, '3510060', 'PLAMPANGREJO', '', 1),
('3510060004', NULL, '3510060', 'KALIPLOSO', '', 1),
('3510060005', NULL, '3510060', 'BENCULUK', '', 1),
('3510060006', NULL, '3510060', 'CLURING', '', 1),
('3510060007', NULL, '3510060', 'TAMANAGUNG', '', 1),
('3510060008', NULL, '3510060', 'SRATEN', '', 1),
('3510060009', NULL, '3510060', 'SARIMULYO', '', 1),
('3510070004', NULL, '3510070', 'PURWODADI', '', 1),
('3510070005', NULL, '3510070', 'JAJAG', '', 1),
('3510070006', NULL, '3510070', 'WRINGIN AGUNG', '', 1),
('3510070007', NULL, '3510070', 'WRINGINREJO', '', 1),
('3510070008', NULL, '3510070', 'YOSOMULYO', '', 1),
('3510070009', NULL, '3510070', 'GAMBIRAN', '', 1),
('3510071001', NULL, '3510071', 'KARANGDORO', '', 1),
('3510071002', NULL, '3510071', 'KARANGMULYO', '', 1),
('3510071003', NULL, '3510071', 'TEGALSARI', '', 1),
('3510071004', NULL, '3510071', 'DASRI', '', 1),
('3510071005', NULL, '3510071', 'TAMANSARI', '', 1),
('3510071006', NULL, '3510071', 'TEGALREJO', '', 1),
('3510080001', NULL, '3510080', 'KARANGHARJO', '', 1),
('3510080002', NULL, '3510080', 'TULUNGREJO', '', 1),
('3510080003', NULL, '3510080', 'SUMBERGONDO', '', 1),
('3510080004', NULL, '3510080', 'BUMIHARJO', '', 1),
('3510080005', NULL, '3510080', 'SEPANJANG', '', 1),
('3510080006', NULL, '3510080', 'TEGALHARJO', '', 1),
('3510080007', NULL, '3510080', 'MARGOMULYO', '', 1),
('3510090001', NULL, '3510090', 'KEBONREJO', '', 1),
('3510090002', NULL, '3510090', 'KALIBARU MANIS', '', 1),
('3510090003', NULL, '3510090', 'BANYUANYAR', '', 1),
('3510090004', NULL, '3510090', 'KALIBARU KULON', '', 1),
('3510090005', NULL, '3510090', 'KALIBARU WETAN', '', 1),
('3510090006', NULL, '3510090', 'KAJARHARJO', '', 1),
('3510100001', NULL, '3510100', 'KALIGONDO', '', 1),
('3510100002', NULL, '3510100', 'SETAIL', '', 1),
('3510100003', NULL, '3510100', 'GENTENG KULON', '', 1),
('3510100004', NULL, '3510100', 'GENTENG WETAN', '', 1),
('3510100005', NULL, '3510100', 'KEMBIRITAN', '', 1),
('3510110001', NULL, '3510110', 'SUMBERSARI', '', 1),
('3510110002', NULL, '3510110', 'KEPUNDUNGAN', '', 1),
('3510110003', NULL, '3510110', 'KEBAMAN', '', 1),
('3510110004', NULL, '3510110', 'SUKONATAR', '', 1),
('3510110005', NULL, '3510110', 'BAGOREJO', '', 1),
('3510110006', NULL, '3510110', 'REJOAGUNG', '', 1),
('3510110007', NULL, '3510110', 'WONOSOBO', '', 1),
('3510110008', NULL, '3510110', 'SUKOMAJU', '', 1),
('3510110009', NULL, '3510110', 'PARIJATAH WETAN', '', 1),
('3510110010', NULL, '3510110', 'PARIJATAH KULON', '', 1),
('3510120001', NULL, '3510120', 'ALIYAN', '', 1),
('3510120002', NULL, '3510120', 'MANGIR', '', 1),
('3510120003', NULL, '3510120', 'KALIGUNG', '', 1),
('3510120004', NULL, '3510120', 'KARANGREJO', '', 1),
('3510120005', NULL, '3510120', 'BOMO', '', 1),
('3510120006', NULL, '3510120', 'GINTANGAN', '', 1),
('3510120007', NULL, '3510120', 'GLADAG', '', 1),
('3510120008', NULL, '3510120', 'BUBUK', '', 1),
('3510120009', NULL, '3510120', 'KEDALEMAN', '', 1),
('3510120010', NULL, '3510120', 'LEMAHBANG DEWO', '', 1),
('3510120011', NULL, '3510120', 'ROGOJAMPI', '', 1),
('3510120012', NULL, '3510120', 'KAOTAN', '', 1),
('3510120013', NULL, '3510120', 'WATU KEBO', '', 1),
('3510120014', NULL, '3510120', 'PATOMAN', '', 1),
('3510120015', NULL, '3510120', 'BLIMBING SARI', '', 1),
('3510120016', NULL, '3510120', 'KARANG BENDO', '', 1),
('3510120017', NULL, '3510120', 'GITIK', '', 1),
('3510120018', NULL, '3510120', 'PENGANTIGAN', '', 1),
('3510130001', NULL, '3510130', 'BARENG', '', 1),
('3510130002', NULL, '3510130', 'BUNDER', '', 1),
('3510130003', NULL, '3510130', 'GOMBOLIRANG', '', 1),
('3510130004', NULL, '3510130', 'BENELAN LOR', '', 1),
('3510130005', NULL, '3510130', 'LABANASEM', '', 1),
('3510130006', NULL, '3510130', 'PAKISTAJI', '', 1),
('3510130007', NULL, '3510130', 'BADEAN', '', 1),
('3510130008', NULL, '3510130', 'SUKOJATI', '', 1),
('3510130009', NULL, '3510130', 'PONDOKNONGKO', '', 1),
('3510130010', NULL, '3510130', 'DADAPAN', '', 1),
('3510130011', NULL, '3510130', 'KEDAYUNAN', '', 1),
('3510130012', NULL, '3510130', 'KABAT', '', 1),
('3510130013', NULL, '3510130', 'MACAN PUTIH', '', 1),
('3510130014', NULL, '3510130', 'TAMBONG', '', 1),
('3510130015', NULL, '3510130', 'PENDARUNGAN', '', 1),
('3510130016', NULL, '3510130', 'KALIREJO', '', 1),
('3510140001', NULL, '3510140', 'GAMBOR', '', 1),
('3510140002', NULL, '3510140', 'SINGOJURUH', '', 1),
('3510140003', NULL, '3510140', 'ALAS MALANG', '', 1),
('3510140004', NULL, '3510140', 'BENELAN KIDUL', '', 1),
('3510140005', NULL, '3510140', 'LEMAHBANG KULON', '', 1),
('3510140006', NULL, '3510140', 'SINGOLATREN', '', 1),
('3510140007', NULL, '3510140', 'PADANG', '', 1),
('3510140008', NULL, '3510140', 'CANTUK', '', 1),
('3510140009', NULL, '3510140', 'GUMIRIH', '', 1),
('3510140010', NULL, '3510140', 'KEMIRI', '', 1),
('3510140011', NULL, '3510140', 'SUMBER BARU', '', 1),
('3510150001', NULL, '3510150', 'SEMPU', '', 1),
('3510150002', NULL, '3510150', 'TEGALARUM', '', 1),
('3510150003', NULL, '3510150', 'JAMBEWANGI', '', 1),
('3510150004', NULL, '3510150', 'TEMUASRI', '', 1),
('3510150005', NULL, '3510150', 'KARANGSARI', '', 1),
('3510150006', NULL, '3510150', 'TEMUGURUH', '', 1),
('3510150007', NULL, '3510150', 'GENDOH', '', 1),
('3510160001', NULL, '3510160', 'BEDEWANG', '', 1),
('3510160002', NULL, '3510160', 'BALAK', '', 1),
('3510160003', NULL, '3510160', 'BANGUNSARI', '', 1),
('3510160004', NULL, '3510160', 'SONGGON', '', 1),
('3510160005', NULL, '3510160', 'PARANGHARJO', '', 1),
('3510160006', NULL, '3510160', 'SRAGI', '', 1),
('3510160007', NULL, '3510160', 'SUMBER ARUM', '', 1),
('3510160008', NULL, '3510160', 'SUMBER BULU', '', 1),
('3510160009', NULL, '3510160', 'BAYU', '', 1),
('3510170006', NULL, '3510170', 'PASPAN', '', 1),
('3510170007', NULL, '3510170', 'GLAGAH', '', 1),
('3510170008', NULL, '3510170', 'OLEHSARI', '', 1),
('3510170009', NULL, '3510170', 'REJOSARI', '', 1),
('3510170010', NULL, '3510170', 'BAKUNGAN', '', 1),
('3510170011', NULL, '3510170', 'BANJARSARI', '', 1),
('3510170012', NULL, '3510170', 'KEMIREN', '', 1),
('3510170013', NULL, '3510170', 'TAMANSURUH', '', 1),
('3510170014', NULL, '3510170', 'KENJO', '', 1),
('3510170018', NULL, '3510170', 'KAMPUNGANYAR', '', 1),
('3510171001', NULL, '3510171', 'PAKEL', '', 1),
('3510171002', NULL, '3510171', 'KLUNCING', '', 1),
('3510171003', NULL, '3510171', 'SEGOBANG', '', 1),
('3510171004', NULL, '3510171', 'JELUN', '', 1),
('3510171005', NULL, '3510171', 'GUMUK', '', 1),
('3510171006', NULL, '3510171', 'BANJAR', '', 1),
('3510171007', NULL, '3510171', 'LICIN', '', 1),
('3510171008', NULL, '3510171', 'TAMANSARI', '', 1),
('3510180001', NULL, '3510180', 'PAKIS', '', 1),
('3510180002', NULL, '3510180', 'SOBO', '', 1),
('3510180003', NULL, '3510180', 'KEBALENAN', '', 1),
('3510180004', NULL, '3510180', 'PENGANJURAN', '', 1),
('3510180005', NULL, '3510180', 'TUKANGKAYU', '', 1),
('3510180006', NULL, '3510180', 'KERTOSARI', '', 1),
('3510180007', NULL, '3510180', 'KARANGREJO', '', 1),
('3510180008', NULL, '3510180', 'KEPATIHAN', '', 1),
('3510180009', NULL, '3510180', 'PANDEREJO', '', 1),
('3510180010', NULL, '3510180', 'SINGONEGARAN', '', 1),
('3510180011', NULL, '3510180', 'TEMENGGUNGAN', '', 1),
('3510180012', NULL, '3510180', 'KAMPUNG MELAYU', '', 1),
('3510180013', NULL, '3510180', 'KAMPUNGMANDAR', '', 1),
('3510180014', NULL, '3510180', 'LATENG', '', 1),
('3510180015', NULL, '3510180', 'SINGOTRUNAN', '', 1),
('3510180016', NULL, '3510180', 'PENGANTIGAN', '', 1),
('3510180017', NULL, '3510180', 'SUMBERREJO', '', 1),
('3510180018', NULL, '3510180', 'TAMAN BARU', '', 1),
('3510190001', NULL, '3510190', 'JAMBESARI', '', 1),
('3510190002', NULL, '3510190', 'BOYOLANGU', '', 1),
('3510190003', NULL, '3510190', 'MOJOPANGGUNG', '', 1),
('3510190004', NULL, '3510190', 'PENATABAN', '', 1),
('3510190005', NULL, '3510190', 'GIRI', '', 1),
('3510190006', NULL, '3510190', 'GROGOL', '', 1),
('3510200001', NULL, '3510200', 'BULUSARI', '', 1),
('3510200002', NULL, '3510200', 'PESUCEN', '', 1),
('3510200003', NULL, '3510200', 'TELEMUNG', '', 1),
('3510200004', NULL, '3510200', 'KELIR', '', 1),
('3510200005', NULL, '3510200', 'KALIPURO', '', 1),
('3510200006', NULL, '3510200', 'KLATAK', '', 1),
('3510200007', NULL, '3510200', 'KETAPANG', '', 1),
('3510200008', NULL, '3510200', 'GOMBENG SARI', '', 1),
('3510200009', NULL, '3510200', 'BULUSAN', '', 1),
('3510210001', NULL, '3510210', 'BANGSRING', '', 1),
('3510210002', NULL, '3510210', 'BENGKAK', '', 1),
('3510210003', NULL, '3510210', 'ALASBULU', '', 1),
('3510210004', NULL, '3510210', 'WONGSOREJO', '', 1),
('3510210005', NULL, '3510210', 'ALASREJO', '', 1),
('3510210006', NULL, '3510210', 'SUMBERKENCONO', '', 1),
('3510210007', NULL, '3510210', 'SIDOWANGI', '', 1),
('3510210008', NULL, '3510210', 'SIDODADI', '', 1),
('3510210009', NULL, '3510210', 'BAJULMATI', '', 1),
('3510210010', NULL, '3510210', 'WATUKEBO', '', 1),
('3510210011', NULL, '3510210', 'SUMBERANYAR', '', 1),
('3510210012', NULL, '3510210', 'BIMOREJO', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hippam`
--

CREATE TABLE IF NOT EXISTS `hippam` (
  `id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `desa_kode` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `no_sk` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `menetapkan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `jml_pengurus` int(11) NOT NULL,
  `thn_berdiri` year(4) NOT NULL,
  `ketua_nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `ketua_alamat` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `ketua_telp` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `ketua_email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `ma_kap_sumber` double(7,2) NOT NULL,
  `ma_kap_terpasang` double(7,2) NOT NULL,
  `ma_broncap_jml` int(11) NOT NULL,
  `ma_broncap_ukuran` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `ma_tandon_jml` int(11) NOT NULL,
  `ma_tandon_ukuran` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `ma_thn_buat` year(4) NOT NULL,
  `ma_sumber_dana` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `sb_kap_sumber` double(5,2) NOT NULL COMMENT 'ltr/det',
  `sb_kap_terpasang` double(5,2) NOT NULL COMMENT 'ltr/det',
  `sb_tandon_jml` int(11) NOT NULL,
  `sb_tandon_ukuran` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `sb_genset_jml` int(11) NOT NULL,
  `sb_genset_ukuran` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `sb_pln_jml` int(11) NOT NULL,
  `sb_pln_ukuran` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `sb_jml_panel_pompa` int(11) NOT NULL,
  `sb_thn_buat` year(4) NOT NULL,
  `sb_sumber_dana` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `kap_produksi` double(7,2) NOT NULL COMMENT 'ltr/det',
  `jml_air` double(7,2) NOT NULL COMMENT 'm3',
  `sistem_reservoir` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `sistem_pelanggan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pipa_gl_6` double(7,2) NOT NULL COMMENT 'm',
  `pipa_gl_4` double(7,2) NOT NULL COMMENT 'm',
  `pipa_gl_3` double(7,2) NOT NULL COMMENT 'm',
  `pipa_gl_2` double(7,2) NOT NULL COMMENT 'm',
  `pipa_gl_15` double(7,2) NOT NULL COMMENT 'm',
  `pipa_gl_1` double(7,2) NOT NULL COMMENT 'm',
  `pipa_gl_34` double(7,2) NOT NULL COMMENT 'm',
  `pipa_pvc_6` double(7,2) NOT NULL COMMENT 'm',
  `pipa_pvc_4` double(7,2) NOT NULL COMMENT 'm',
  `pipa_pvc_3` double(7,2) NOT NULL COMMENT 'm',
  `pipa_pvc_2` double(7,2) NOT NULL COMMENT 'm',
  `pipa_pvc_15` double(7,2) NOT NULL COMMENT 'm',
  `pipa_pvc_1` double(7,2) NOT NULL COMMENT 'm',
  `pipa_pvc_34` double(7,2) NOT NULL COMMENT 'm',
  `sbg_rumah` int(11) NOT NULL,
  `sbg_masjid` int(11) NOT NULL,
  `sbg_gereja` int(11) NOT NULL,
  `sbg_pura` int(11) NOT NULL,
  `sbg_wihara` int(11) NOT NULL,
  `sbg_sekolah` int(11) NOT NULL,
  `sbg_umum` int(11) NOT NULL,
  `terlayani` int(11) NOT NULL,
  `belum_terlayani` int(11) NOT NULL,
  `tarif` int(11) NOT NULL COMMENT '/m3',
  `iuran` int(11) NOT NULL COMMENT '/bln',
  `jml_sma` int(11) NOT NULL,
  `total_debit_sma` double(7,2) NOT NULL COMMENT 'ltr/det',
  `jarak_sma` double(7,2) NOT NULL COMMENT 'km',
  `jml_sekolah` int(11) NOT NULL,
  `jml_t_ibadah` int(11) NOT NULL,
  `jml_rs_puskesmas` int(11) NOT NULL,
  `jml_kantor_pemda` int(11) NOT NULL,
  `jml_fasos_lain` int(11) NOT NULL,
  `crt` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `crt_date` timestamp NULL DEFAULT NULL,
  `upd` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `upd_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `desa_kode` (`desa_kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `hippam`
--

INSERT INTO `hippam` (`id`, `desa_kode`, `nama`, `alamat`, `no_sk`, `menetapkan`, `jml_pengurus`, `thn_berdiri`, `ketua_nama`, `ketua_alamat`, `ketua_telp`, `ketua_email`, `ma_kap_sumber`, `ma_kap_terpasang`, `ma_broncap_jml`, `ma_broncap_ukuran`, `ma_tandon_jml`, `ma_tandon_ukuran`, `ma_thn_buat`, `ma_sumber_dana`, `sb_kap_sumber`, `sb_kap_terpasang`, `sb_tandon_jml`, `sb_tandon_ukuran`, `sb_genset_jml`, `sb_genset_ukuran`, `sb_pln_jml`, `sb_pln_ukuran`, `sb_jml_panel_pompa`, `sb_thn_buat`, `sb_sumber_dana`, `kap_produksi`, `jml_air`, `sistem_reservoir`, `sistem_pelanggan`, `pipa_gl_6`, `pipa_gl_4`, `pipa_gl_3`, `pipa_gl_2`, `pipa_gl_15`, `pipa_gl_1`, `pipa_gl_34`, `pipa_pvc_6`, `pipa_pvc_4`, `pipa_pvc_3`, `pipa_pvc_2`, `pipa_pvc_15`, `pipa_pvc_1`, `pipa_pvc_34`, `sbg_rumah`, `sbg_masjid`, `sbg_gereja`, `sbg_pura`, `sbg_wihara`, `sbg_sekolah`, `sbg_umum`, `terlayani`, `belum_terlayani`, `tarif`, `iuran`, `jml_sma`, `total_debit_sma`, `jarak_sma`, `jml_sekolah`, `jml_t_ibadah`, `jml_rs_puskesmas`, `jml_kantor_pemda`, `jml_fasos_lain`, `crt`, `crt_date`, `upd`, `upd_date`) VALUES
('00000000001', '35.10.01.01', 'HIPPAM PESANGGARAN', '', '', '', 0, 0000, '', '', '', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0, 0, 0, 0, 0, NULL, '2014-10-12 18:51:00', NULL, '2014-10-12 18:51:00'),
('00000000002', '35.10.01.02', 'HIPPAM SUMBERAGUNG', '', '', '', 0, 0000, '', '', '', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0, 0, 0, 0, 0, NULL, '2014-10-12 18:52:14', NULL, '2014-10-12 18:52:14'),
('00000000003', '35.10.01.03', 'HIPPAM KANDANGAN', '', '', '', 0, 0000, '', '', '', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0, 0, 0, 0, 0, NULL, '2014-10-12 18:52:50', NULL, '2014-10-12 18:52:50'),
('00000000004', '35.10.01.04', 'HIPPAM SARONGAN', '', '', '', 0, 0000, '', '', '', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0, 0, 0, 0, 0, NULL, '2014-10-12 18:53:27', NULL, '2014-10-12 18:53:27'),
('00000000005', '35.10.01.05', 'HIPPAM SUMBERMULYO', '', '', '', 0, 0000, '', '', '', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0, 0, 0, 0, 0, NULL, '2014-10-12 18:54:04', NULL, '2014-10-12 18:54:04'),
('00000000006', '35.10.02.01', 'HIPPAM KEBONDALEM', '', '', '', 0, 0000, '', '', '', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0, 0, 0, 0, 0, NULL, '2014-10-12 18:54:33', NULL, '2014-10-12 18:54:33'),
('00000000007', '35.10.02.02', 'HIPPAM BANGOREJO', '', '', '', 0, 0000, '', '', '', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0, 0, 0, 0, 0, NULL, '2014-10-12 18:55:04', NULL, '2014-10-12 18:55:04'),
('00000000008', '35.10.02.03', 'HIPPAM SAMBIREJO', '', '', '', 0, 0000, '', '', '', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0, 0, 0, 0, 0, NULL, '2014-10-12 18:55:39', NULL, '2014-10-12 18:55:39'),
('00000000009', '35.10.02.04', 'HIPPAM SAMBIMULYO', '', '', '', 0, 0000, '', '', '', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0, 0, 0, 0, 0, NULL, '2014-10-12 18:56:06', NULL, '2014-10-12 18:56:06'),
('00000000010', '35.10.02.05', 'HIPPAM RINGINTELU', '', '', '', 0, 0000, '', '', '', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0, 0, 0, 0, 0, NULL, '2014-10-12 18:56:42', NULL, '2014-10-12 18:56:42'),
('00000000011', '35.10.02.06', 'HIPPAM SUKOREJO', '', '', '', 0, 0000, '', '', '', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0, 0, 0, 0, 0, NULL, '2014-10-12 18:57:20', NULL, '2014-10-12 18:57:20'),
('00000000012', '35.10.02.07', 'HIPPAM TEMUREJO', '', '', '', 0, 0000, '', '', '', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0, 0, 0, 0, 0, NULL, '2014-10-12 18:57:45', NULL, '2014-10-12 18:57:45'),
('00000000013', '35.10.03.01', 'HIPPAM GRAJAGAN', '', '', '', 0, 0000, '', '', '', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0, 0, 0, 0, 0, NULL, '2014-10-12 18:58:31', NULL, '2014-10-12 18:58:31'),
('00000000014', '35.10.03.02', 'HIPPAM GLAGAHGUNG', 'Dsn. Jatirejo, Ds. Glagahagung', '690/27/Kep/429,513,03/2011', 'KEPALA DESA', 4, 2011, 'DUDI ISKANDAR', 'Dsn. Jatirejo, Ds. Glagahagung', '081252947227', '', 0.00, 0.00, 0, '', 1, '22,000 liter', 0000, 'APBN', 5.00, 1.50, 4, '5.200 liter x4', 0, '', 1, '10.600 volt', 2, 2011, 'APBN', 1.50, 3500.00, '', 'Produksi reservoar ke pelanggan', 0.00, 0.00, 70.00, 0.00, 0.00, 0.00, 0.00, 0.00, 800.00, 2100.00, 1400.00, 0.00, 0.00, 0.00, 68, 3, 0, 0, 0, 0, 0, 6937, 272, 1300, 12000, 1, 1.50, 0.00, 0, 3, 0, 0, 0, NULL, '2014-10-12 18:58:59', NULL, '2014-10-12 18:58:59'),
('00000000015', '35.10.03.03', 'HIPPAM KRADENAN', '', '', '', 0, 0000, '', '', '', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0, 0, 0, 0, 0, NULL, '2014-10-12 18:59:22', NULL, '2014-10-12 18:59:22'),
('00000000016', '35.10.03.04', 'HIPPAM SUMBERSEHAT', 'Dsn. Krajan, Ds. Purwoharjo', '188/13/429.513.05', 'KEPALA DESA', 5, 2006, 'RUDI MEI SUSANTO', 'Dsn. Krajan, Ds. Purwoharjo', '085259110259', '', 0.00, 0.00, 0, '', 1, '8 M3', 0000, 'APBD', 5.00, 3.00, 1, '8 M3', 0, '', 1, '3.600 watt', 2, 2006, 'APBD ', 3.00, 520.00, '', 'Produksi reservoar ke pelanggan', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1500.00, 2500.00, 0.00, 4000.00, 0.00, 260, 2, 0, 0, 0, 0, 0, 1300, 8414, 1500, 25000, 0, 0.00, 0.00, 0, 2, 0, 0, 0, NULL, '2014-10-12 18:59:44', NULL, '2014-10-12 18:59:44'),
('00000000017', '35.10.03.05', 'HIPPAM TIRTA SARI', 'Dsn. Tambakrejo, Ds. Bulurejo', '', 'KEPALA DESA', 5, 2012, 'BUAS SURYANTORO', 'Dsn. Tambakrejo, Ds. Bulurejo', '', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 2.50, 2.50, 1, '3,00m x 3,00m x 3,00m', 1, '30 Pk - 15.000 watt', 0, '', 2, 2011, 'SWADAYA / APBN', 2.50, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 200.00, 0.00, 0.00, 0.00, 0.00, 350, 0, 0, 0, 0, 0, 0, 0, 1400, 0, 0, 0, 0.00, 0.00, 1, 0, 0, 0, 0, NULL, '2014-10-12 19:00:06', NULL, '2014-10-12 19:00:06'),
('00000000018', '35.10.03.06', 'HIPPAM SIDOREJO', '', '', '', 0, 0000, '', '', '', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0, 0, 0, 0, 0, NULL, '2014-10-12 19:00:36', NULL, '2014-10-12 19:00:36'),
('00000000019', '35.10.03.07', 'HIPPAM TIRTO ASRI', 'Dsn.Sumberrejeki, Ds. Sumber Asri', '', 'KEPALA DESA', 4, 2009, 'EDI SUWITO', 'Dsn.Sumberrejeki, Ds. Sumber Asri', '08233148727', '', 0.00, 0.00, 0, '', 2, '', 0000, 'APBD Tingkat Satu', 4.00, 4.00, 2, '', 1, '500 watt', 1, '2.200 watt', 1, 2008, 'APBD Tingkat Satu', 4.00, 107.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 500.00, 4000.00, 8500.00, 2000.00, 440.00, 1300.00, 3, 0, 0, 0, 0, 2, 0, 845, 0, 1250, 15000, 0, 0.00, 0.00, 2, 3, 0, 0, 0, NULL, '2014-10-12 19:01:05', NULL, '2014-10-12 19:01:05'),
('00000000020', '35.10.04.01', 'HIPPAM KENDALREJO', '', '', '', 0, 0000, '', '', '', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0, 0, 0, 0, 0, NULL, '2014-10-12 19:01:35', NULL, '2014-10-12 19:01:35'),
('00000000021', '35.10.04.02', 'HIPPAM KEDUNGGEBANG', '', '', '', 0, 0000, '', '', '', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0, 0, 0, 0, 0, NULL, '2014-10-12 19:01:57', NULL, '2014-10-12 19:01:57'),
('00000000022', '35.10.04.03', 'HIPPAM PURWOASRI', '', '', '', 0, 0000, '', '', '', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0, 0, 0, 0, 0, NULL, '2014-10-12 19:02:35', NULL, '2014-10-12 19:02:35'),
('00000000023', '35.10.04.04', 'HIPPAM KEDUNGWUNGU', '', '', '', 0, 0000, '', '', '', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0, 0, 0, 0, 0, NULL, '2014-10-12 19:02:57', NULL, '2014-10-12 19:02:57'),
('00000000024', '35.10.04.05', 'HIPPAM TEGALDLIMO', '', '', '', 0, 0000, '', '', '', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0, 0, 0, 0, 0, NULL, '2014-10-12 19:03:26', NULL, '2014-10-12 19:03:26'),
('00000000025', '35.10.04.06', 'HIPPAM WRINGINPITU', '', '', '', 0, 0000, '', '', '', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0, 0, 0, 0, 0, NULL, '2014-10-12 19:03:48', NULL, '2014-10-12 19:03:48'),
('00000000026', '35.10.04.07', 'HIPPAM KEDUNGASRI', '', '', '', 0, 0000, '', '', '', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0, 0, 0, 0, 0, NULL, '2014-10-12 19:04:19', NULL, '2014-10-12 19:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `hippam_desa`
--

CREATE TABLE IF NOT EXISTS `hippam_desa` (
  `id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `uraian` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `rw` int(11) NOT NULL,
  `rt` int(11) NOT NULL,
  `terlayani_kk` int(11) NOT NULL,
  `terlayani_jiwa` int(11) NOT NULL,
  `belum_terlayani_kk` int(11) NOT NULL,
  `belum_terlayani_jiwa` int(11) NOT NULL,
  `hippam_id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `crt` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `crt_date` timestamp NULL DEFAULT NULL,
  `upd` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `upd_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hippam_id` (`hippam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `hippam_desa`
--

INSERT INTO `hippam_desa` (`id`, `uraian`, `rw`, `rt`, `terlayani_kk`, `terlayani_jiwa`, `belum_terlayani_kk`, `belum_terlayani_jiwa`, `hippam_id`, `crt`, `crt_date`, `upd`, `upd_date`) VALUES
('00000000001', 'Dusun Jatimulyo', 2, 21, 743, 2425, 0, 0, '00000000014', NULL, '2014-10-12 19:14:30', NULL, '2014-10-12 19:14:30'),
('00000000002', 'Dusun Jatirejo', 2, 20, 7053, 2399, 0, 0, '00000000014', NULL, '2014-10-12 19:14:30', NULL, '2014-10-12 19:14:30'),
('00000000003', 'Dusun Krajan', 6, 24, 1044, 3230, 0, 0, '00000000016', NULL, '2014-10-12 19:23:29', NULL, '2014-10-12 19:23:29'),
('00000000004', 'Dusun Curah Pecak', 6, 23, 1009, 3269, 0, 0, '00000000016', NULL, '2014-10-12 19:23:29', NULL, '2014-10-12 19:23:29'),
('00000000005', 'Dusun Gumukrejo', 6, 30, 1144, 3215, 0, 0, '00000000016', NULL, '2014-10-12 19:24:56', NULL, '2014-10-12 19:24:56'),
('00000000006', 'Dusun Tambakrejo', 1, 7, 0, 0, 350, 1400, '00000000017', NULL, '2014-10-12 19:33:10', NULL, '2014-10-12 19:33:10'),
('00000000007', 'Dusun Sumberrejeki', 3, 11, 472, 1548, 0, 0, '00000000019', NULL, '2014-10-12 19:39:42', NULL, '2014-10-12 19:39:42'),
('00000000008', 'Dusun Kebang Kandel', 5, 17, 675, 2147, 0, 0, '00000000019', NULL, '2014-10-12 19:39:42', NULL, '2014-10-12 19:39:42'),
('00000000009', 'Dusun Krajan', 3, 10, 369, 1204, 0, 0, '00000000019', NULL, '2014-10-12 19:41:08', NULL, '2014-10-12 19:41:08'),
('00000000010', 'Dusun Blok Solo', 4, 12, 499, 1471, 0, 0, '00000000019', NULL, '2014-10-12 19:41:08', NULL, '2014-10-12 19:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `hippam_desa_sekitar`
--

CREATE TABLE IF NOT EXISTS `hippam_desa_sekitar` (
  `id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `uraian` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `rw` int(11) NOT NULL,
  `rt` int(11) NOT NULL,
  `terlayani_kk` int(11) NOT NULL,
  `terlayani_jiwa` int(11) NOT NULL,
  `belum_terlayani_kk` int(11) NOT NULL,
  `belum_terlayani_jiwa` int(11) NOT NULL,
  `hippam_id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `crt` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `crt_date` timestamp NULL DEFAULT NULL,
  `upd` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `upd_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hippam_id` (`hippam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE IF NOT EXISTS `kabupaten` (
  `id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `propinsi_id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `keterangan` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `aktif` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `kabupaten__propinsi_id` (`propinsi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id`, `propinsi_id`, `nama`, `keterangan`, `aktif`) VALUES
('3510', '35', 'BANYUWANGI', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE IF NOT EXISTS `kecamatan` (
  `id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `kode` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `kabupaten_id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `keterangan` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `aktif` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode` (`kode`),
  KEY `kabupaten_id` (`kabupaten_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `kode`, `kabupaten_id`, `nama`, `keterangan`, `aktif`) VALUES
('3510010', '35.10.01', '3510', 'PESANGGARAN', '', 1),
('3510011', NULL, '3510', 'SILIRAGUNG', '', 1),
('3510020', '35.10.02', '3510', 'BANGOREJO', '', 1),
('3510030', '35.10.03', '3510', 'PURWOHARJO', '', 1),
('3510040', '35.10.04', '3510', 'TEGALDLIMO', '', 1),
('3510050', NULL, '3510', 'MUNCAR', '', 1),
('3510060', NULL, '3510', 'CLURING', '', 1),
('3510070', NULL, '3510', 'GAMBIRAN', '', 1),
('3510071', NULL, '3510', 'TEGALSARI', '', 1),
('3510080', NULL, '3510', 'GLENMORE', '', 1),
('3510090', NULL, '3510', 'KALIBARU', '', 1),
('3510100', NULL, '3510', 'GENTENG', '', 1),
('3510110', NULL, '3510', 'SRONO', '', 1),
('3510120', NULL, '3510', 'ROGOJAMPI', '', 1),
('3510130', NULL, '3510', 'KABAT', '', 1),
('3510140', NULL, '3510', 'SINGOJURUH', '', 1),
('3510150', NULL, '3510', 'SEMPU', '', 1),
('3510160', NULL, '3510', 'SONGGON', '', 1),
('3510170', NULL, '3510', 'GLAGAH', '', 1),
('3510171', NULL, '3510', 'LICIN', '', 1),
('3510180', NULL, '3510', 'BANYUWANGI', '', 1),
('3510190', NULL, '3510', 'GIRI', '', 1),
('3510200', NULL, '3510', 'KALIPURO', '', 1),
('3510210', NULL, '3510', 'WONGSOREJO', '', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `desa`
--
ALTER TABLE `desa`
  ADD CONSTRAINT `desa_ibfk_1` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `hippam`
--
ALTER TABLE `hippam`
  ADD CONSTRAINT `hippam_ibfk_1` FOREIGN KEY (`desa_kode`) REFERENCES `desa` (`kode`) ON UPDATE CASCADE;

--
-- Constraints for table `hippam_desa`
--
ALTER TABLE `hippam_desa`
  ADD CONSTRAINT `hippam_desa_ibfk_1` FOREIGN KEY (`hippam_id`) REFERENCES `hippam` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_ibfk_1` FOREIGN KEY (`kabupaten_id`) REFERENCES `kabupaten` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
