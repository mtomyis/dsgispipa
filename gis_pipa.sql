-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2020 at 03:59 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `broncap`
--

CREATE TABLE IF NOT EXISTS `broncap` (
  `id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `hippam_id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `keterangan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `latitude` double(10,6) NOT NULL,
  `longitude` double(10,6) NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  `crt` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `crt_date` timestamp NULL DEFAULT NULL,
  `upd` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `upd_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='mata pelajaran';

--
-- Dumping data for table `broncap`
--

INSERT INTO `broncap` (`id`, `hippam_id`, `nama`, `keterangan`, `latitude`, `longitude`, `aktif`, `crt`, `crt_date`, `upd`, `upd_date`) VALUES
('00001', '00000000029', 'Broncap 1', '', -8.259383, 114.300733, 1, 'admin', '2014-12-24 22:33:41', 'admin', '2014-12-24 22:54:07'),
('00002', '00000000030', 'Broncap 1', '', -8.280933, 114.266967, 1, 'admin', '2014-12-24 22:57:34', 'admin', '2014-12-24 22:58:26'),
('00003', '00000000024', 'Broncap 1', '', -8.178617, 114.286250, 1, 'admin', '2014-12-24 23:00:49', NULL, NULL),
('00004', '00000000025', 'Broncap 1', '', -8.206367, 114.316783, 1, 'admin', '2014-12-24 23:03:48', NULL, NULL),
('00005', '00000000049', 'Broncap 1', '', -8.229000, 114.328733, 1, 'admin', '2014-12-24 23:05:01', NULL, NULL),
('00006', '00000000022', 'Broncap 1', '', -8.182400, 114.317267, 1, 'admin', '2014-12-24 23:05:56', NULL, NULL),
('00007', '00000000023', 'Broncap 1', '', -8.181100, 114.306483, 1, 'admin', '2014-12-24 23:06:35', NULL, NULL),
('00008', '00000000020', 'Broncap 1', '', -8.023300, 114.352633, 1, 'admin', '2014-12-24 23:07:21', NULL, NULL),
('00009', '00000000026', 'Broncap 1', '', -8.024817, 114.414200, 1, 'admin', '2014-12-24 23:08:05', NULL, NULL),
('00010', '00000000043', 'Broncap 1', '', -8.257683, 114.118600, 1, 'admin', '2014-12-24 23:08:53', NULL, NULL),
('00011', '00000000034', 'Broncap 1', '', -8.138717, 114.381133, 1, 'admin', '2014-12-24 23:09:38', NULL, NULL),
('00012', '00000000035', 'Broncap 1', '', -8.176583, 114.340217, 1, 'admin', '2014-12-24 23:10:25', NULL, NULL),
('00013', '00000000036', 'Broncap 1', '', -8.157517, 114.321133, 1, 'admin', '2014-12-24 23:11:13', NULL, NULL),
('00014', '00000000044', 'Broncap 1', '', -8.555050, 114.109983, 1, 'admin', '2014-12-24 23:11:57', NULL, NULL),
('00015', '00000000045', 'Broncap 1', '', -8.434400, 114.089150, 1, 'admin', '2014-12-24 23:12:45', NULL, NULL),
('00016', '00000000037', 'Broncap 1', '', -8.175783, 114.251183, 1, 'admin', '2014-12-24 23:13:29', NULL, NULL),
('00017', '00000000038', 'Broncap 1', '', -8.195667, 114.236700, 1, 'admin', '2014-12-24 23:14:39', NULL, NULL),
('00018', '00000000039', 'Broncap 1', '', -8.192600, 114.262467, 1, 'admin', '2014-12-24 23:15:38', NULL, NULL);

--
-- Triggers `broncap`
--
DELIMITER //
CREATE TRIGGER `broncap_crt_date` BEFORE INSERT ON `broncap`
 FOR EACH ROW BEGIN
        SET NEW.crt_date = CURRENT_TIMESTAMP();
END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `broncap_upd_date` BEFORE UPDATE ON `broncap`
 FOR EACH ROW BEGIN
        SET NEW.upd_date = CURRENT_TIMESTAMP();
END
//
DELIMITER ;

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
  `aktif` tinyint(4) NOT NULL DEFAULT '1'
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
('3510011001', '35.10.22.04', '3510011', 'BULUAGUNG', '', 1),
('3510011002', '35.10.22.02', '3510011', 'SILIRAGUNG', '', 1),
('3510011003', '35.10.22.03', '3510011', 'SENEPOREJO', '', 1),
('3510011004', '35.10.22.01', '3510011', 'KESILIR', '', 1),
('3510011005', '35.10.22.05', '3510011', 'BARUREJO', '', 1),
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
('3510040008', '35.10.04.08', '3510040', 'PURWOAGUNG', '', 1),
('3510040009', '35.10.04.09', '3510040', 'KALIPAIT', '', 1),
('3510050001', NULL, '3510050', 'SUMBERBERAS', '', 1),
('3510050002', '35.10.05.04', '3510050', 'WRINGIN PUTIH', '', 1),
('3510050003', '35.10.05.05', '3510050', 'KEDUNGRINGIN', '', 1),
('3510050004', '35.10.05.10', '3510050', 'TAMBAKREJO', '', 1),
('3510050005', '35.10.05.06', '3510050', 'TAPANREJO', '', 1),
('3510050006', '35.10.05.07', '3510050', 'BLAMBANGAN', '', 1),
('3510050007', '35.10.05.02', '3510050', 'KEDUNGREJO', '', 1),
('3510050008', '35.10.05.01', '3510050', 'TEMBOKREJO', '', 1),
('3510050009', '35.10.05.08', '3510050', 'SUMBERSEWU', '', 1),
('3510050010', '35.10.05.09', '3510050', 'KUMENDUNG', '', 1),
('3510060001', '35.10.06.06', '3510060', 'SEMBULUNG', '', 1),
('3510060002', '35.10.06.07', '3510060', 'TAMPO', '', 1),
('3510060003', '35.10.06.03', '3510060', 'PLAMPANGREJO', '', 1),
('3510060004', '35.10.06.09', '3510060', 'KALIPLOSO', '', 1),
('3510060005', '35.10.06.01', '3510060', 'BENCULUK', '', 1),
('3510060006', '35.10.06.02', '3510060', 'CLURING', '', 1),
('3510060007', '35.10.06.04', '3510060', 'TAMANAGUNG', '', 1),
('3510060008', '35.10.06.05', '3510060', 'SRATEN', '', 1),
('3510060009', '35.10.06.08', '3510060', 'SARIMULYO', '', 1),
('3510070004', NULL, '3510070', 'PURWODADI', '', 1),
('3510070005', NULL, '3510070', 'JAJAG', '', 1),
('3510070006', NULL, '3510070', 'WRINGIN AGUNG', '', 1),
('3510070007', NULL, '3510070', 'WRINGINREJO', '', 1),
('3510070008', NULL, '3510070', 'YOSOMULYO', '', 1),
('3510070009', NULL, '3510070', 'GAMBIRAN', '', 1),
('3510071001', '35.10.23.06', '3510071', 'KARANGDORO', '', 1),
('3510071002', '35.10.23.07', '3510071', 'KARANGMULYO', '', 1),
('3510071003', '35.10.23.03', '3510071', 'TEGALSARI', '', 1),
('3510071004', '35.10.23.04', '3510071', 'DASRI', '', 1),
('3510071005', '35.10.23.05', '3510071', 'TAMANSARI', '', 1),
('3510071006', '35.10.23.01', '3510071', 'TEGALREJO', '', 1),
('3510080001', '35.10.10.02', '3510080', 'KARANGHARJO', '', 1),
('3510080002', '35.10.10.01', '3510080', 'TULUNGREJO', '', 1),
('3510080003', '35.10.10.06', '3510080', 'SUMBERGONDO', '', 1),
('3510080004', '35.10.10.05', '3510080', 'BUMIHARJO', '', 1),
('3510080005', '35.10.10.03', '3510080', 'SEPANJANG', '', 1),
('3510080006', '35.10.10.04', '3510080', 'TEGALHARJO', '', 1),
('3510080007', '35.10.10.07', '3510080', 'MARGOMULYO', '', 1),
('3510090001', '35.10.11.04', '3510090', 'KEBONREJO', '', 1),
('3510090002', '35.10.11.03', '3510090', 'KALIBARU MANIS', '', 1),
('3510090003', '35.10.11.06', '3510090', 'BANYUANYAR', '', 1),
('3510090004', '35.10.11.05', '3510090', 'KALIBARU KULON', '', 1),
('3510090005', '35.10.11.01', '3510090', 'KALIBARU WETAN', '', 1),
('3510090006', '35.10.11.02', '3510090', 'KAJARHARJO', '', 1),
('3510100001', '35.10.09.05', '3510100', 'KALIGONDO', '', 1),
('3510100002', '35.10.09.04', '3510100', 'SETAIL', '', 1),
('3510100003', '35.10.09.01', '3510100', 'GENTENG KULON', '', 1),
('3510100004', '35.10.09.02', '3510100', 'GENTENG WETAN', '', 1),
('3510100005', '35.10.09.03', '3510100', 'KEMBIRITAN', '', 1),
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
('3510130001', '35.10.14.16', '3510130', 'BARENG', '', 1),
('3510130002', '35.10.14.07', '3510130', 'BUNDER', '', 1),
('3510130003', '35.10.14.11', '3510130', 'GOMBOLIRANG', '', 1),
('3510130004', '35.10.14.13', '3510130', 'BENELAN LOR', '', 1),
('3510130005', '35.10.14.12', '3510130', 'LABANASEM', '', 1),
('3510130006', '35.10.14.03', '3510130', 'PAKISTAJI', '', 1),
('3510130007', '35.10.14.02', '3510130', 'BADEAN', '', 1),
('3510130008', '35.10.14.15', '3510130', 'SUKOJATI', '', 1),
('3510130009', '35.10.14.10', '3510130', 'PONDOKNONGKO', '', 1),
('3510130010', '35.10.14.04', '3510130', 'DADAPAN', '', 1),
('3510130011', '35.10.14.06', '3510130', 'KEDAYUNAN', '', 1),
('3510130012', '35.10.14.05', '3510130', 'KABAT', '', 1),
('3510130013', '35.10.14.01', '3510130', 'MACAN PUTIH', '', 1),
('3510130014', '35.10.14.14', '3510130', 'TAMBONG', '', 1),
('3510130015', '35.10.14.09', '3510130', 'PENDARUNGAN', '', 1),
('3510130016', '35.10.14.08', '3510130', 'KALIREJO', '', 1),
('3510140001', '35.10.12.11', '3510140', 'GAMBOR', '', 1),
('3510140002', '35.10.12.01', '3510140', 'SINGOJURUH', '', 1),
('3510140003', '35.10.12.03', '3510140', 'ALAS MALANG', '', 1),
('3510140004', '35.10.12.05', '3510140', 'BENELAN KIDUL', '', 1),
('3510140005', '35.10.12.10', '3510140', 'LEMAHBANG KULON', '', 1),
('3510140006', '35.10.12.09', '3510140', 'SINGOLATREN', '', 1),
('3510140007', '35.10.12.08', '3510140', 'PADANG', '', 1),
('3510140008', '35.10.12.04', '3510140', 'CANTUK', '', 1),
('3510140009', '35.10.12.06', '3510140', 'GUMIRIH', '', 1),
('3510140010', '35.10.12.02', '3510140', 'KEMIRI', '', 1),
('3510140011', '35.10.12.07', '3510140', 'SUMBER BARU', '', 1),
('3510150001', '35.10.20.03', '3510150', 'SEMPU', '', 1),
('3510150002', '35.10.20.07', '3510150', 'TEGALARUM', '', 1),
('3510150003', '35.10.20.01', '3510150', 'JAMBEWANGI', '', 1),
('3510150004', '35.10.20.05', '3510150', 'TEMUASRI', '', 1),
('3510150005', '35.10.20.04', '3510150', 'KARANGSARI', '', 1),
('3510150006', '35.10.20.02', '3510150', 'TEMUGURUH', '', 1),
('3510150007', '35.10.20.06', '3510150', 'GENDOH', '', 1),
('3510160001', NULL, '3510160', 'BEDEWANG', '', 1),
('3510160002', NULL, '3510160', 'BALAK', '', 1),
('3510160003', NULL, '3510160', 'BANGUNSARI', '', 1),
('3510160004', NULL, '3510160', 'SONGGON', '', 1),
('3510160005', NULL, '3510160', 'PARANGHARJO', '', 1),
('3510160006', NULL, '3510160', 'SRAGI', '', 1),
('3510160007', NULL, '3510160', 'SUMBER ARUM', '', 1),
('3510160008', NULL, '3510160', 'SUMBER BULU', '', 1),
('3510160009', NULL, '3510160', 'BAYU', '', 1),
('3510170006', '35.10.15.05', '3510170', 'PASPAN', '', 1),
('3510170007', '35.10.15.07', '3510170', 'GLAGAH', '', 1),
('3510170008', '35.10.15.08', '3510170', 'OLEHSARI', '', 1),
('3510170009', '35.10.15.09', '3510170', 'REJOSARI', '', 1),
('3510170010', '35.10.15.04', '3510170', 'BAKUNGAN', '', 1),
('3510170011', '35.10.15.01', '3510170', 'BANJARSARI', '', 1),
('3510170012', '35.10.15.06', '3510170', 'KEMIREN', '', 1),
('3510170013', '35.10.15.03', '3510170', 'TAMANSURUH', '', 1),
('3510170014', '35.10.15.10', '3510170', 'KENJO', '', 1),
('3510170018', '35.10.15.02', '3510170', 'KAMPUNGANYAR', '', 1),
('3510171001', '35.10.24.09', '3510171', 'PAKEL', '', 1),
('3510171002', '35.10.24.08', '3510171', 'KLUNCING', '', 1),
('3510171003', '35.10.24.06', '3510171', 'SEGOBANG', '', 1),
('3510171004', '35.10.24.04', '3510171', 'JELUN', '', 1),
('3510171005', '35.10.24.03', '3510171', 'GUMUK', '', 1),
('3510171006', '35.10.24.05', '3510171', 'BANJAR', '', 1),
('3510171007', '35.10.24.01', '3510171', 'LICIN', '', 1),
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
('3510190001', '35.10.17.06', '3510190', 'JAMBESARI', '', 1),
('3510190002', '35.10.17.04', '3510190', 'BOYOLANGU', '', 1),
('3510190003', '35.10.17.01', '3510190', 'MOJOPANGGUNG', '', 1),
('3510190004', '35.10.17.03', '3510190', 'PENATABAN', '', 1),
('3510190005', '35.10.17.05', '3510190', 'GIRI', '', 1),
('3510190006', '35.10.17.02', '3510190', 'GROGOL', '', 1),
('3510200001', '35.10.21.06', '3510200', 'BULUSARI', '', 1),
('3510200002', '35.10.21.07', '3510200', 'PESUCEN', '', 1),
('3510200003', '35.10.21.05', '3510200', 'TELEMUNG', '', 1),
('3510200004', '35.10.21.04', '3510200', 'KELIR', '', 1),
('3510200005', '35.10.21.01', '3510200', 'KALIPURO', '', 1),
('3510200006', '35.10.21.03', '3510200', 'KLATAK', '', 1),
('3510200007', '35.10.21.02', '3510200', 'KETAPANG', '', 1),
('3510200008', NULL, '3510200', 'GOMBENG SARI', '', 1),
('3510200009', NULL, '3510200', 'BULUSAN', '', 1),
('3510210001', '35.10.18.07', '3510210', 'BANGSRING', '', 1),
('3510210002', '35.10.18.06', '3510210', 'BENGKAK', '', 1),
('3510210003', '35.10.18.03', '3510210', 'ALASBULU', '', 1),
('3510210004', '35.10.18.02', '3510210', 'WONGSOREJO', '', 1),
('3510210005', '35.10.18.08', '3510210', 'ALASREJO', '', 1),
('3510210006', '35.10.18.05', '3510210', 'SUMBERKENCONO', '', 1),
('3510210007', '35.10.18.10', '3510210', 'SIDOWANGI', '', 1),
('3510210008', '35.10.18.09', '3510210', 'SIDODADI', '', 1),
('3510210009', '35.10.18.01', '3510210', 'BAJULMATI', '', 1),
('3510210010', '35.10.18.04', '3510210', 'WATUKEBO', '', 1),
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
  `sb_kap_sumber` double(7,2) NOT NULL COMMENT 'ltr/det',
  `sb_kap_terpasang` double(7,2) NOT NULL COMMENT 'ltr/det',
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
  `tarif` double(12,2) NOT NULL COMMENT '/m3',
  `iuran` double(12,2) NOT NULL COMMENT 'rp',
  `jml_sma` int(11) NOT NULL,
  `total_debit_sma` double(7,2) NOT NULL COMMENT 'ltr/det',
  `jarak_sma` varchar(20) COLLATE latin1_general_ci NOT NULL COMMENT 'm',
  `jml_sekolah` int(11) NOT NULL,
  `jml_t_ibadah` int(11) NOT NULL,
  `jml_rs_puskesmas` int(11) NOT NULL,
  `jml_kantor_pemda` int(11) NOT NULL,
  `jml_fasos_lain` int(11) NOT NULL,
  `crt` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `crt_date` timestamp NULL DEFAULT NULL,
  `upd` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `upd_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `hippam`
--

INSERT INTO `hippam` (`id`, `desa_kode`, `nama`, `alamat`, `no_sk`, `menetapkan`, `jml_pengurus`, `thn_berdiri`, `ketua_nama`, `ketua_alamat`, `ketua_telp`, `ketua_email`, `ma_kap_sumber`, `ma_kap_terpasang`, `ma_broncap_jml`, `ma_broncap_ukuran`, `ma_tandon_jml`, `ma_tandon_ukuran`, `ma_thn_buat`, `ma_sumber_dana`, `sb_kap_sumber`, `sb_kap_terpasang`, `sb_tandon_jml`, `sb_tandon_ukuran`, `sb_genset_jml`, `sb_genset_ukuran`, `sb_pln_jml`, `sb_pln_ukuran`, `sb_jml_panel_pompa`, `sb_thn_buat`, `sb_sumber_dana`, `kap_produksi`, `jml_air`, `sistem_reservoir`, `sistem_pelanggan`, `pipa_gl_6`, `pipa_gl_4`, `pipa_gl_3`, `pipa_gl_2`, `pipa_gl_15`, `pipa_gl_1`, `pipa_gl_34`, `pipa_pvc_6`, `pipa_pvc_4`, `pipa_pvc_3`, `pipa_pvc_2`, `pipa_pvc_15`, `pipa_pvc_1`, `pipa_pvc_34`, `sbg_rumah`, `sbg_masjid`, `sbg_gereja`, `sbg_pura`, `sbg_wihara`, `sbg_sekolah`, `sbg_umum`, `terlayani`, `belum_terlayani`, `tarif`, `iuran`, `jml_sma`, `total_debit_sma`, `jarak_sma`, `jml_sekolah`, `jml_t_ibadah`, `jml_rs_puskesmas`, `jml_kantor_pemda`, `jml_fasos_lain`, `crt`, `crt_date`, `upd`, `upd_date`) VALUES
('00000000006', '35.10.02.01', 'HIPPAM SENDANG MULYO', 'Dsn.Sendangrejo RT 01. RW.03 Ds.Kebondalem\r\n', '', 'Kepala Desa', 12, 2010, 'Pairin', 'Dsn.Sendangrejo RT 01. RW.03 Ds.Kebondalem\r\n', '', '', 0.00, 0.00, 0, '', 1, '2.2', 0000, 'sembada masarakat', 0.00, 0.00, 0, '', 0, '', 1, '1300', 1, 2010, 'Sawsembada Masyarakat', 1.50, 40.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2500.00, 0, 2, 0, 0, 0, 1, 0, 375, 1543, 0.00, 5000.00, 0, 0.00, '0.00', 0, 0, 0, 0, 0, NULL, '2014-10-12 18:54:33', 'admin', '2014-12-25 14:49:20'),
('00000000007', '35.10.01.01', 'HIPPAM TIRTA MANDIRI ', 'Dsn.Krajan RT.01,RW.02 Desa Pesanggaran\r\n', '188/25/Kep/429.5150/2012', 'Kepala Desa', 5, 2012, 'Sugitoto', 'Dsn.Krajan RT.01,RW.02 Desa Pesanggaran\r\n', '081358175208', '', 0.00, 0.00, 0, '', 1, '10 m3', 0000, '', 0.00, 0.00, 0, '', 1, '15 PK', 1, '6.600 VA', 1, 2012, 'APBN', 3.50, 40.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3250.00, 2681.00, 300.00, 0.00, 150.00, 0, 4, 1, 0, 1, 1, 0, 150, 0, 200.00, 3000.00, 0, 0.00, '0.00', 0, 0, 0, 0, 0, 'admin', '2014-12-09 17:00:57', 'admin', '2014-12-23 03:53:34'),
('00000000008', '35.10.01.02', 'HIPPAM SUMBERAGUNG', 'Ds.Sumberagung Kec.Pesanggaran\r\n', '181/04/429.515/2012', 'Kepala Desa', 5, 2011, 'Sarniyanto', 'Ds.Sumberagung Kec.Pesanggaran\r\n', '081252358580', '', 0.00, 0.00, 1, '22.5', 0, '', 0000, '', 0.00, 0.00, 0, '', 0, '', 1, '6.600 VA', 1, 2011, 'APBN', 2.50, 15.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1600.00, 2030.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 220, 500, 2000.00, 3000.00, 0, 0.00, '0.00', 19, 43, 3, 4, 0, 'admin', '2014-12-09 17:27:09', 'admin', '2014-12-23 05:49:13'),
('00000000009', '35.10.03.02', 'HIPPAM GLAGAHAGUNG', 'Dsn.Jati luhur Ds.Glagah Agung\r\n', '690/27//Kep/429.513.03/2011', 'Kepala Desa', 4, 2011, 'Dudy Iskandar ', 'Dsn.Jati luhur Ds.Glagah Agung\r\n', '081252647227', '', 0.00, 0.00, 0, '', 1, '5200 liter', 0000, '', 0.00, 0.00, 0, '', 0, '', 1, '5200 liter', 1, 2011, 'APBN', 1.50, 3.50, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 800.00, 2100.00, 1400.00, 0.00, 0.00, 0.00, 0, 3, 0, 0, 0, 0, 0, 272, 6937, 1500.00, 12000.00, 0, 0.00, '0.00', 0, 0, 0, 0, 0, 'admin', '2014-12-09 17:40:04', 'admin', '2014-12-23 06:29:04'),
('00000000010', '35.10.03.04', 'HIPPAM SUMBER SEHAT', 'Dsn Krajan RT.03 RW.04 Purwoharjo\r\n', '188/13/429,513,05/2011', 'Kepala Desa', 5, 2006, 'susianto', 'Dsn Krajan RT.03 RW.04 Purwoharjo\r\n', '085331289194', '', 0.00, 0.00, 0, '', 1, '8 m3', 0000, 'APBD', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 3.00, 520.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1500.00, 2500.00, 0.00, 0.00, 0.00, 0, 2, 0, 0, 0, 0, 0, 1300, 8414, 1500.00, 2500.00, 0, 0.00, '0.00', 0, 0, 0, 0, 0, 'admin', '2014-12-09 17:47:22', 'admin', '2014-12-23 06:49:34'),
('00000000011', '35.10.03.07', 'HIPPAM TIRTO ASRI', 'Dsn.Sumberrejeki Desa Sumberasri\r\n', '', 'Kepala Desa', 4, 2009, 'Edi Suwito', 'Dsn.Sumberrejeki Desa Sumberasri\r\n', '085236747714', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 1, '22.000 liter', 0, '0', 1, '5000 watt', 1, 2009, 'APBN', 2.70, 107.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 500.00, 400.00, 8500.00, 2000.00, 0.00, 0.00, 0, 3, 0, 0, 0, 2, 0, 845, 0, 1250.00, 15000.00, 0, 0.00, '0.00', 0, 0, 0, 0, 0, 'admin', '2014-12-09 17:52:31', 'admin', '2014-12-27 07:39:39'),
('00000000012', '35.10.04.08', 'HIPPAM PURWOAGUNG', 'Dsn.Asem Bagus , RT 11, RW 02 DS.Purwoagung\r\n', '-', 'Kepala Desa', 4, 2013, 'Meseri', 'Dsn.Asem Bagus , RT 11, RW 02 DS.Purwoagung\r\n', '', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 1, '21.00 liter', 0, '', 1, '10.600 Volt', 1, 2013, 'APBD', 1.50, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0, 0.00, '0.00', 0, 0, 0, 1, 0, 'admin', '2014-12-10 04:55:56', 'admin', '2014-12-23 07:22:20'),
('00000000014', '35.10.06.01', 'HIPPAM TIRTO SARI benculuk', 'Dsn.Kebonsari Ds.Benculuk Kec.Cluring\r\n', '', 'Kepala Desa', 6, 2012, 'Moh Amin', 'Dsn.Kebonsari Ds.Benculuk Kec.Cluring\r\n', '081335647536', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 0, '', 1, '18 m3', 1, '10600 KWH', 1, 2012, 'APBN', 3.50, 50.00, '', '', 0.00, 0.00, 6.00, 6.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1200.00, 1218.00, 100.00, 0.00, 400.00, 105, 8, 0, 0, 0, 3, 0, 420, 0, 1500.00, 3000.00, 0, 0.00, '0.00', 22, 91, 2, 6, 2, 'admin', '2014-12-11 02:54:06', 'admin', '2014-12-23 07:51:28'),
('00000000015', '35.10.06.03', 'HIPPAM TIRTO SUCI', 'Dsn.Krajan RT.02 RW.05 Plampangrejo\r\n', '', 'Kepala Desa', 7, 2010, 'Sugiyo', 'Dsn.Krajan RT.02 RW.05 Plampangrejo\r\n', '081336967167', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 1, '5200 liter', 0, '', 1, '3500 Volt', 1, 2010, 'APBD & Swasembada', 3.50, 35.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 84.00, 0.00, 450.00, 2052.00, 0.00, 0.00, 136.00, 199, 5, 0, 0, 0, 1, 0, 615, 0, 2000.00, 4000.00, 0, 0.00, '0.00', 13, 57, 0, 9, 0, 'admin', '2014-12-11 02:54:37', 'admin', '2014-12-23 07:57:25'),
('00000000016', '35.10.10.03', 'HIPPAM SEPANJANG', 'Jln.Raya Pasar No.62 Sepanjang Glenmore\r\n', '', 'Kepala Desa', 8, 1986, 'DARMINTO', 'Jln.Raya Pasar No.62 Sepanjang Glenmore\r\n', '', '', 25.00, 25.00, 3, '4,5  m3', 1, '', 0000, 'APBD', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 600.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 30.00, 2000.00, 2100.00, 6700.00, 4000.00, 0.00, 0.00, 1228, 25, 3, 0, 0, 4, 6, 3686, 5350, 0.00, 7000.00, 3, 25.00, '1.00', 11, 28, 1, 2, 0, 'admin', '2014-12-11 04:01:39', 'admin', '2014-12-23 08:45:11'),
('00000000017', '35.10.10.05', 'HIPPAM TIRTO MANUNGGAL', 'Dsn.Sugiwaras RT01/RW06 Bumi harjo\r\n', '', 'Kepala Desa', 4, 1979, 'Sukaryanto', 'Dsn.Sugiwaras RT01/RW06 Bumi harjo\r\n', '087857374877', '', 0.00, 0.00, 0, '', 0, '', 0000, 'APBD', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 12.00, 12.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 800.00, 200.00, 0.00, 0.00, 0.00, 167, 7, 0, 0, 0, 2, 1, 501, 200, 0.00, 3000.00, 2, 0.00, '500 m', 3, 8, 1, 0, 0, 'admin', '2014-12-11 04:14:24', 'admin', '2014-12-23 08:59:29'),
('00000000018', '35.10.10.06', 'HIPPAM TIRTO GONDO MANUNGGAL', 'Dsn.Gunungsari Ds.Sumbergondo\r\n', '', 'Kepala Desa', 4, 2008, 'H.Norman Iswandi', 'Dsn.Gunungsari Ds.Sumbergondo\r\n', '87755730371', '', 15.00, 15.00, 2, '4.5', 1, '', 0000, 'APBD', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 750.00, 2000.00, 3000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 450, 11, 0, 0, 0, 3, 0, 0, 0, 0.00, 0.00, 1, 0.00, '1', 3, 11, 2, 1, 0, 'admin', '2014-12-11 04:15:01', 'admin', '2014-12-23 09:05:14'),
('00000000019', '35.10.06.09', 'HIPPAM TIRTO LANGGENG', 'Dsn.Kalirejo RT.02 RW.08 Ds Kalirejo, Cluring\r\n', '188/2/429.512.09/2010', 'Kepala Desa', 5, 2006, 'H.Mashuri', 'Dsn.Kalirejo RT.02 RW.08 Ds Kalirejo, Cluring\r\n', '085331538310', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 0, '', 1, '18 m3', 1, '10600 KWH', 1, 2006, 'APBN', 3.00, 15.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 4600.00, 3127.00, 0.00, 0.00, 0.00, 187, 5, 0, 0, 0, 2, 0, 1667, 2055, 2000.00, 3500.00, 0, 0.00, '0.00', 22, 5, 1, 1, 0, 'admin', '2014-12-11 04:39:58', 'admin', '2014-12-23 08:07:29'),
('00000000020', '35.10.18.03', 'HIPPAM KARANG BARU ', 'Ds.Jambesari Kec.Giri\r\n', '-', 'Kepala Desa', 7, 2008, 'Katiyo', 'Dsn.Karang baru Ds.Alas Bulu Kab.Banyuwangi\r\n', '081336723526', '', 0.00, 0.00, 0, '0', 0, '', 0000, '', 4.10, 3.00, 1, '32 M3', 1, '', 1, '', 1, 2008, 'APBD', 4.10, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3000.00, 4000.00, 1500.00, 0.00, 0.00, 394, 19, 0, 0, 0, 0, 0, 394, 0, 0.00, 0.00, 0, 0.00, '0.00', 0, 0, 0, 0, 0, 'admin', '2014-12-11 04:40:00', 'admin', '2014-12-24 05:28:48'),
('00000000021', '35.10.09.03', 'HIPPAM GOTONG ROYONG', 'RT02 RW 01 Dsn Cendono Ds. Kembiritan\r\n', '005/429/,518,2001/2008', 'Kepala Desa', 18, 2008, 'Drs.Saiful Anam', 'RT02 RW 01 Dsn Cendono Ds. Kembiritan\r\n', '08113530577', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 1, '4 m3', 0, '', 1, '1300 Volt', 0, 2001, 'APBN', 6.00, 81.60, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1106.00, 805.00, 1614.00, 783.00, 0.00, 0.00, 132, 4, 0, 0, 0, 0, 0, 739, 9777, 0.00, 10000.00, 5, 0.00, '0.00', 26, 126, 3, 2, 0, 'admin', '2014-12-11 05:10:48', 'admin', '2014-12-23 08:37:04'),
('00000000022', '35.10.17.02', 'HIPPAM TIRTA BUMI', 'Ds.grogol Kel.Giri\r\n', '', 'Kepala Desa', 7, 1998, 'Moh.yayah', 'Ds.grogol Kel.Giri\r\n', '085257865366', '', 0.00, 0.00, 0, '', 0, '14 m3', 0000, 'APBD', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 800.00, 1600.00, 1600.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 240, 2, 0, 0, 0, 3, 1, 984, 0, 0.00, 3000.00, 2, 0.00, '4km', 3, 3, 1, 1, 0, 'admin', '2014-12-11 05:13:13', 'admin', '2014-12-24 05:17:46'),
('00000000023', '35.10.17.06', 'HIPPAM SUMBER SELADA', 'Ds.Jambesari Kec.Giri\r\n', '', 'Kepala Desa', 6, 2009, 'Moh Ihsan', 'Ds.Jambesari Kec.Giri\r\n', '', '', 3.50, 2.50, 2, '1.5 m3', 2, '30 m3', 0000, 'APBD', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 200.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 400.00, 1100.00, 2000.00, 1500.00, 0.00, 0.00, 413, 22, 0, 0, 0, 4, 0, 413, 927, 0.00, 0.00, 0, 0.00, '0', 4, 22, 3, 0, 0, 'admin', '2014-12-11 05:13:44', 'admin', '2014-12-24 05:23:40'),
('00000000024', '35.10.15.06', 'HIPPAM TOEYO ARUM', 'Ds.Kemiren Kec.Glagah banyuwangi', '-', 'Kepala Desa', 12, 1996, 'Eko Sawilin', '0', '081553848036', 'Ekosawilin@yahoo.co.id', 2.00, 0.00, 1, '9 m3', 1, '4 m3', 0000, 'APBD ', 0.00, 0.00, 0, '-', 0, '', 0, '-', 0, 0000, '-', 0.00, 0.00, '', '', 300.00, 300.00, 4700.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 5700.00, 400.00, 0.00, 0.00, 1000.00, 650, 6, 0, 0, 0, 1, 3, 0, 30, 4000.00, 0.00, 1, 13.00, '7 km', 1, 1, 1, 1, 1, 'admin', '2014-12-11 05:18:18', 'admin', '2014-12-24 04:08:56'),
('00000000025', '35.10.15.08', 'HIPPAM TIRTO SARI', 'Ds.Olehsari Kec.Glagah Kab.Banyuwangi\r\n', '188/08/Kep/429.503/2009', 'Kepala Desa', 6, 2011, 'Misari', 'Ds.Olehsari Kec.Glagah Kab.Banyuwangi\r\n', '082142184657', '', 4.00, 2.50, 1, '4 m3', 2, '12 m3', 0000, 'APBD', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 300.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1400.00, 3000.00, 0.00, 0.00, 0.00, 392, 6, 0, 0, 0, 2, 0, 1176, 1310, 800.00, 2000.00, 2, 6.00, '1,5 km', 2, 6, 1, 1, 0, 'admin', '2014-12-11 05:20:04', 'admin', '2014-12-24 04:15:55'),
('00000000026', '35.10.18.06', 'HIPPAM MIFTAHUL ULUM', 'DS.Bengkak Kec. Wongsorejo\r\n', '', 'Kepala Desa', 8, 2009, 'Mukshin', 'DS.Bengkak Kec. Wongsorejo\r\n', '', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 1, '22000 liter', 0, '', 1, '6600 volt', 1, 2009, 'APBD', 0.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1000.00, 2000.00, 0.00, 0.00, 0.00, 22, 2, 0, 0, 0, 6, 2, 226, 40, 500.00, 0.00, 1, 20.00, '1 km', 0, 0, 0, 0, 0, 'admin', '2014-12-11 05:21:17', 'admin', '2014-12-24 05:33:03'),
('00000000027', '35.10.23.03', 'HIPPAM TIRTA SARI', 'Dsn. Mojoroto Ds.Tegalsari', '', 'Kepala Desa', 6, 0000, 'boiman', 'Dsn. Mojoroto Ds.Tegalsari\r\n', '081234854522', '', 0.00, 0.00, 0, '', 0, '', 0000, 'APBN', 14.00, 2.00, 1, '20 m3', 0, '', 1, '', 1, 2012, 'APBN', 2.00, 14.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1900.00, 3000.00, 0.00, 0.00, 1.81, 112, 3, 0, 0, 0, 2, 0, 452, 2617, 2000.00, 3000.00, 0, 0.00, '', 3, 5, 0, 0, 0, 'admin', '2014-12-11 05:32:09', 'admin', '2014-12-27 07:32:50'),
('00000000028', '35.10.23.06', 'HIPPAM JAYA TIRTA', 'Dsn.Karangdoro RT.01 /RW 01 ', '', 'Kepala Desa', 5, 2008, 'Warito', 'Dsn.Karangdoro RT.01 /RW 01 \r\n', '081249887729', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 5.00, 5.00, 4, '5200 liter', 0, '', 1, '13000 watt', 1, 2008, 'APBN', 5.00, 2.80, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3000.00, 1500.00, 936.00, 0.00, 0.00, 236, 3, 0, 1, 0, 2, 0, 1434, 1953, 1000.00, 6000.00, 1, 2.00, '0.00', 3, 10, 0, 0, 0, 'admin', '2014-12-11 05:34:40', 'admin', '2014-12-23 07:17:12'),
('00000000029', '35.10.14.05', 'HIPPAM KALIREJO', 'Dsn Jurang Rejo.RT 02/RW01 Kalirejo\r\n', '520/07/429.406.16/2012', 'Kepala Desa', 5, 2012, 'AGUS NANANG, SPd', 'Dsn Jurang Rejo.RT 02/RW01 Kalirejo\r\n', '081336151433', '', 1.00, 15.00, 1, '16 m3', 5, ' 8 m3', 0000, 'APBD', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 200.00, 600.00, 0.00, 0.00, 0.00, 0.00, 145, 4, 0, 0, 0, 1, 0, 300, 300, 0.00, 500.00, 1, 35.00, '800 M', 1, 4, 0, 0, 0, 'admin', '2014-12-11 05:39:28', 'admin', '2014-12-24 03:48:56'),
('00000000030', '35.10.14.07', 'HIPPAM MANGGIS KUNING', 'Ds.Bunder RT01 / RT02\r\n', '', 'Kepala Desa', 4, 2011, 'SAIFUL', 'Ds.Bunder RT01 / RT02\r\n', '085258491510', '', 0.00, 0.00, 1, '6 m3', 1, '8 m3', 0000, 'PNPM', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 153, 0, 1, 0, 0, 2, 11, 0, 0, 0.00, 5000.00, 1, 0.00, '1,5 km', 2, 1, 0, 0, 0, 'admin', '2014-12-11 05:39:51', 'admin', '2014-12-24 04:01:35'),
('00000000031', '35.10.11.01', 'HIPPAM WONOREJO', 'Tegal Pakis RT.01 RW03 Kalibaruwetan\r\n', '', 'Kepala Desa', 5, 1991, 'Supriyanto', 'Tegal Pakis RT.01 RW03 Kalibaruwetan\r\n', '085258750888', '', 5.00, 5.00, 1, '18 m3', 1, '8 m3', 0000, 'APBD 1', 15.00, 5.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, 'Grafitasi', '', 0.00, 0.00, 90.00, 0.00, 0.00, 0.00, 0.00, 0.00, 4000.00, 2500.00, 2000.00, 1000.00, 0.00, 200.00, 0, 0, 2, 0, 0, 6, 3, 11005, 11005, 400.00, 0.00, 4, 33.00, '1,5 km', 6, 4, 0, 2, 9, 'admin', '2014-12-11 05:53:28', 'admin', '2014-12-24 02:59:21'),
('00000000032', '35.10.11.05', 'HIPPAM MOYA ZAM ZAM', 'Ds. Kalibaru Kulon \r\n', '001/SKB.kk.yah/03/2010', 'Kepala Desa', 8, 2007, 'Njunaidi Hasan', 'Ds. Kalibaru Kulon \r\n', '087755768045', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 1, '5200 liter', 0, '', 1, '6000 Watt', 1, 2007, 'APBN', 6.00, 284.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1600.00, 300.00, 400.00, 500.00, 0.00, 0.00, 162, 4, 0, 0, 0, 2, 0, 700, 1500, 400.00, 5000.00, 0, 0.00, '0.00', 0, 0, 0, 0, 0, 'admin', '2014-12-11 05:56:27', 'admin', '2014-12-24 03:18:56'),
('00000000033', '35.10.11.06', 'HIPPAM TIRTO REDI', 'Ds. Banyuanyar Kec. Kalibaru\r\n', '', 'Kepala Desa', 6, 1995, 'Surahman', 'Ds.Banyu anyar\r\n', '081234614934', '', 0.00, 5.00, 0, '18 m3', 0, '', 0000, 'APBD', 15.00, 5.00, 0, '', 0, '', 0, '', 0, 1995, 'APBN', 0.00, 0.00, 'Grafitasi', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1000.00, 2500.00, 6500.00, 3000.00, 1000.00, 0.00, 3000.00, 684, 31, 0, 1, 0, 7, 1, 0, 0, 0.00, 5000.00, 2, 33.00, '3 KM', 7, 32, 2, 4, 0, 'admin', '2014-12-11 06:03:26', 'admin', '2014-12-24 03:24:40'),
('00000000034', '35.10.21.02', 'HIPPAM KETAPANG', 'Dsn.Krajan Desa Ketapang RT.01 RW. 12 Kec. Kalipuro\r\n', '', 'Kepala Desa', 5, 1988, 'Samsul Arifin', 'Dsn.Krajan Desa Ketapang RT.01 RW. 12 Kec. Kalipuro\r\n', '081217479163', '', 50.00, 5.00, 1, '20 m3', 0, '', 0000, 'APBD', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, 'APBD', 0.00, 0.00, '', '', 500.00, 1000.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 262, 4, 0, 0, 0, 1, 1, 1350, 13822, 0.00, 0.00, 3, 150.00, '1 km', 0, 0, 0, 0, 0, 'admin', '2014-12-11 06:11:15', 'admin', '2014-12-24 06:29:59'),
('00000000035', '35.10.21.03', 'HIPPAM TIRTA BAROKAH', 'Perum Griya Giri mulya Blok S 17', '188/24/429.620/2012', 'Kepala Desa', 2012, 0000, 'Moch. Herwanto', 'Perum Griya Giri mulya Blok S -17\r\n', '085257727373', '', 0.00, 0.00, 1, '1,5 m3', 0, '', 0000, 'APBD ', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, 'APBD', 0.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 60.00, 180.00, 360.00, 0.00, 0.00, 58, 3, 0, 0, 0, 0, 1, 180, 600, 0.00, 10000.00, 1, 0.00, '5430', 0, 3, 0, 0, 1, 'admin', '2014-12-11 06:11:49', 'admin', '2014-12-27 07:25:12'),
('00000000036', '35.10.21.04', 'HIPPAM TIRTA AGUNG', 'Ds.Krajan Ds.Kelir Kalipuro', '', 'Kepala Desa', 4, 0000, 'Nahwawi', 'Ds.Krajan Ds.Kelir Kalipuro\r\n', '085235426907', '', 0.00, 0.00, 1, '', 0, '', 0000, 'APBD ', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, 'APBD', 0.00, 0.00, '', '', 1500.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1000.00, 2000.00, 250.00, 0.00, 1800.00, 500.00, 275.00, 300, 11, 0, 0, 0, 3, 0, 1005, 0, 0.00, 4000.00, 0, 0.00, '3000', 3, 11, 1, 0, 0, 'admin', '2014-12-11 06:12:06', 'admin', '2014-12-27 07:26:49'),
('00000000037', '35.10.24.01', 'HIPPAM SEDYO UTOMO', 'Dsn.Krajan Ds.licin Kec.Licin', '3510240405750000', 'Kepala Desa', 6, 1975, 'Ahmad Holidin', 'Dsn.Krajan Ds.licin Kec.Licin', '085257763484', '', 6.00, 6.00, 1, '6 m3', 2, '12 m3', 0000, 'APBD', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 200.00, 2800.00, 300.00, 1700.00, 300.00, 0.00, 125.00, 440, 18, 0, 0, 0, 0, 5, 1956, 0, 0.00, 4000.00, 2, 6.00, '6.00', 6, 18, 0, 1, 4, 'admin', '2014-12-11 06:28:40', 'admin', '2014-12-23 07:11:00'),
('00000000038', '35.10.24.03', 'HIPPAM SUMBER BENING', 'Ds.Gumuk Kec.Licin\r\n', '', 'Kepala Desa', 7, 1986, 'H.dindhi gunardi', 'Ds.Gumuk Kec.Licin\r\n', '081358876792', '', 5.00, 5.00, 1, '', 0, '', 0000, 'PNPM', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1500.00, 0.00, 0.00, 297, 1, 0, 0, 0, 1, 6, 1188, 0, 250.00, 0.00, 2, 0.00, '5.00', 4, 6, 1, 1, 0, 'admin', '2014-12-11 06:29:05', 'admin', '2014-12-23 06:49:12'),
('00000000039', '35.10.24.04', 'HIPPAM TIRTO MULYO', 'Desa Jelun RT 02/ RW 03 Kec.Jelun', '', 'Kepala Desa', 7, 2008, 'Sandiyok', 'Desa Jelun RT 02/ RW 03 Kec.Jelun', '082337601243', '', 2.00, 2.00, 1, '', 0, '', 0000, 'APBD', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 0.00, 5000.00, 400.00, 500.00, 0.00, 250.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 300, 1, 0, 0, 0, 1, 4, 1156, 712, 200.00, 4000.00, 3, 0.00, '5.00', 3, 4, 0, 1, 0, 'admin', '2014-12-11 06:29:39', 'admin', '2014-12-23 06:42:38'),
('00000000040', '35.10.05.06', 'HIPPAM KUDUNG MAKMUR', 'Dsn.Kedungdandang Ds.Tapanrejo\r\n', '', 'Kepala Desa', 8, 2008, 'Mustofa', 'Dsn.Kedungdandang Ds.Tapanrejo\r\n', '081234606980', '', 0.00, 0.00, 0, '', 1, '4 M3', 0000, '', 0.00, 0.00, 0, '', 0, '', 1, '16500 Volt', 1, 2008, 'APBN', 1.50, 20.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1750.00, 2100.00, 4345.00, 1900.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 3154, 4154, 2000.00, 15000.00, 0, 0.00, '0.00', 3, 10, 1, 3, 5, 'admin', '2014-12-11 06:48:29', 'admin', '2014-12-23 07:36:33'),
('00000000041', '35.10.05.10', 'HIPPAM TIRTO ARUM', 'Dsn.Curah Pacul RT 04 RW 02 Tambak Rejo \r\n', '188/05/429.411.08/2008', 'Kepala Desa', 7, 2008, 'Siswoyo', 'Dsn.Curah Pacul RT 04 RW 02 Tambak Rejo \r\n', '081336973968', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 1, '12 m3', 0, '', 1, '23 KVA', 1, 2008, 'APBD', 5.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2000.00, 1300.00, 8000.00, 2024.00, 3180.00, 0.00, 0.00, 0, 29, 1, 0, 0, 5, 0, 0, 21417, 2000.00, 3000.00, 0, 0.00, '0.00', 8, 35, 1, 1, 1, 'admin', '2014-12-11 06:48:55', 'admin', '2014-12-23 07:46:12'),
('00000000042', '35.10.05.05', 'HIPPAM TIRTA ABADI', 'Dsn Kedungringin Ds.Kedungringin \r\n\r\n', '', 'Kepala Desa', 5, 2012, 'Moh.Roji', 'Dsn Kedungringin Ds.Kedungringin \r\n', '081336411643', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 1, '8 M3', 0, '', 1, '6.600 Volt', 1, 2012, 'APBN', 1.50, 20.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 4700.00, 0.00, 0.00, 479.00, 0, 3, 0, 0, 0, 1, 0, 130, 0, 1500.00, 3000.00, 0, 0.00, '0.00', 0, 0, 2, 1, 0, 'admin', '2014-12-11 07:24:35', 'admin', '2014-12-23 07:31:08'),
('00000000043', '35.10.20.01', 'HIPPAM TIRTO ARUM sempu', 'Dsn. Krajan RT 01 /RW 04 Jambewangi\r\n', '690113/429.599.02/2010', 'Kepala Desa', 5, 2004, 'Maksum', 'Dsn. Krajan RT 01 /RW 04 Jambewangi\r\n', '081336333643', '', 6.00, 3.00, 2, '15 m3', 2, '30 m3', 0000, 'APBD', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 24.00, 50.00, 18.00, 12.00, 0.00, 0.00, 0.00, 0.00, 950.00, 1500.00, 450.00, 1000.00, 0.00, 500.00, 581, 6, 1, 0, 0, 4, 12, 2324, 2143, 0.00, 5000.00, 1, 6.00, '1 km', 6, 0, 1, 0, 0, 'admin', '2014-12-11 07:45:33', 'admin', '2014-12-24 06:14:27'),
('00000000044', '35.10.22.02', 'HIPPAM SAS(SILIRAGUNG AIR SEGAR', 'Dsn.Krajan RT.02 RW 02 Siliragung ', '18/7/Kep/42.524.02/2012', 'Kepala Desa', 5, 0000, 'Ir.Gatut Indra Sukoco', 'Dsn.Krajan RT.02 RW 02 Siliragung \r\n', '085646814145', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 2.00, 2.00, 1, '22,5 m3', 0, '', 1, '', 1, 2011, 'APBD', 2.00, 45.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1600.00, 2030.00, 0.00, 0.00, 0.00, 66, 1, 0, 0, 0, 1, 2, 264, 7405, 2000.00, 3000.00, 0, 0.00, '', 16, 57, 1, 4, 1, 'admin', '2014-12-11 07:49:23', 'admin', '2014-12-27 07:29:27'),
('00000000045', '35.10.22.05', 'HIPPAM TIRTA MANDIRI', 'Dsn.Sumber Manggis Ds.Barurejo', '470/14/429,524,005/2012', 'Kepala Desa', 8, 0000, 'Hartoni', 'Dsn.Sumber Manggis Ds.Barurejo\r\n', '085349814044', '', 2.00, 0.00, 2, '', 0, '5200 liter', 0000, 'APBD ', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1000.00, 5800.00, 1000.00, 200.00, 159, 4, 1, 1, 0, 0, 0, 954, 2721, 1500.00, 3000.00, 1, 30.00, '8000', 3, 7, 1, 0, 0, 'admin', '2014-12-11 07:49:55', 'admin', '2014-12-27 07:31:08'),
('00000000046', '35.10.12.09', 'HIPPAM SUMBER LUNGGUN', 'Jln.Songgon No.113 Singo latren\r\n', '', 'Kepala Desa', 11, 1985, 'ARSO, S.Pd', 'Jln.Songgon No.113 Singo latren\r\n', '081249840117', '', 0.00, 0.00, 2, '16 m3', 6, '4 m3', 0000, 'APBD', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 1985, '', 0.00, 0.00, '', '', 300.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 4500.00, 1500.00, 300.00, 0.00, 160.00, 446, 6, 0, 0, 0, 4, 7, 3200, 1160, 0.00, 4000.00, 1, 0.00, '4,5 km', 3, 6, 1, 1, 1, 'admin', '2014-12-11 08:02:48', 'admin', '2014-12-24 03:43:55'),
('00000000047', '35.10.12.01', 'HIPPAM SUMBER ARUM', 'Dsn. Krajan Barat Singo juruh\r\n', '', 'Kepala Desa', 15, 2012, 'Taufik Hidayat', 'Dsn. Krajan Barat Singo juruh\r\n', '081330259979', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 0.00, 0.00, 1, '18 m3', 0, '', 1, '10.600 Volt', 1, 2012, 'APBN', 3.00, 90.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 654, 1280, 1000.00, 2000.00, 0, 0.00, '0.00', 6, 40, 1, 7, 0, 'admin', '2014-12-11 08:05:31', 'admin', '2014-12-24 03:34:43'),
('00000000048', '35.10.12.06', 'HIPPAM SARI TIRTO', 'Dsn. Kumbo Ds. Gumirih\r\n', '', 'Kepala Desa', 10, 2008, 'Suwito', 'Dsn. Kumbo Ds. Gumirih\r\n', '082145103594', '', 0.00, 0.00, 0, '', 0, '', 0000, '', 999.99, 0.00, 0, '', 0, '', 1, '6500 Volt', 1, 2008, 'APBN', 3.00, 0.00, '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0, 0.00, '0.00', 0, 0, 0, 0, 0, 'admin', '2014-12-11 08:08:49', 'admin', '2014-12-24 03:37:02'),
('00000000049', '35.10.15.09', 'HIPPAM TIRTO WANGI', 'Ds.Rejosari Kec.Glagah Kab.Banyuwangi\r\n', '188/  /Kep/429/2011', 'Kepala Desa', 6, 2010, '2,5', 'Ds.Rejosari Kec.Glagah Kab.Banyuwangi\r\n', '085236477448', '', 2.00, 1.50, 1, '4 m3', 2, '12 m3', 0000, 'APBD', 0.00, 0.00, 0, '', 0, '', 0, '', 0, 0000, '', 0.00, 0.00, '', '', 0.00, 0.00, 1500.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1500.00, 0.00, 0.00, 0.00, 0.00, 450, 15, 0, 0, 0, 3, 4, 1900, 707, 0.00, 4000.00, 1, 2.00, '1.5', 3, 5, 1, 1, 0, 'admin', '2014-12-24 05:12:10', NULL, NULL);

--
-- Triggers `hippam`
--
DELIMITER //
CREATE TRIGGER `hippam_crt_date` BEFORE INSERT ON `hippam`
 FOR EACH ROW BEGIN
        SET NEW.crt_date = CURRENT_TIMESTAMP();
END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `hippam_upd_date` BEFORE UPDATE ON `hippam`
 FOR EACH ROW BEGIN
        SET NEW.upd_date = CURRENT_TIMESTAMP();
END
//
DELIMITER ;

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
  `upd_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `hippam_desa`
--

INSERT INTO `hippam_desa` (`id`, `uraian`, `rw`, `rt`, `terlayani_kk`, `terlayani_jiwa`, `belum_terlayani_kk`, `belum_terlayani_jiwa`, `hippam_id`, `crt`, `crt_date`, `upd`, `upd_date`) VALUES
('00000000002', '', 0, 0, 0, 0, 0, 0, '00000000008', 'admin', '2014-12-09 17:27:09', NULL, NULL),
('00000000004', '', 0, 0, 0, 0, 0, 0, '00000000010', 'admin', '2014-12-09 17:47:22', NULL, NULL),
('00000000009', 'Krajan ', 8, 27, 0, 0, 0, 0, '00000000015', 'admin', '2014-12-11 02:54:37', 'admin', '2014-12-23 07:56:51'),
('00000000010', 'Sepanjang Wetan', 7, 18, 0, 0, 0, 0, '00000000016', 'admin', '2014-12-11 04:01:39', 'admin', '2014-12-23 08:50:06'),
('00000000011', 'sugih Waras', 3, 4, 269, 1507, 105, 350, '00000000017', 'admin', '2014-12-11 04:14:24', 'admin', '2014-12-23 08:58:24'),
('00000000012', 'Gunung Asri', 6, 19, 175, 525, 1017, 3044, '00000000018', 'admin', '2014-12-11 04:15:01', 'admin', '2014-12-23 09:03:36'),
('00000000013', 'Plosoejo', 6, 15, 0, 0, 0, 0, '00000000019', 'admin', '2014-12-11 04:39:58', 'admin', '2014-12-23 08:06:35'),
('00000000014', '', 0, 0, 0, 0, 0, 0, '00000000020', 'admin', '2014-12-11 04:40:00', NULL, NULL),
('00000000015', 'Kaliputih', 6, 15, 0, 0, 966, 2870, '00000000021', 'admin', '2014-12-11 05:10:48', 'admin', '2014-12-23 08:35:16'),
('00000000016', 'Krayak 2', 5, 0, 0, 0, 0, 0, '00000000022', 'admin', '2014-12-11 05:13:13', 'admin', '2014-12-24 05:17:32'),
('00000000018', 'Kedaleman', 4, 15, 0, 0, 0, 0, '00000000024', 'admin', '2014-12-11 05:18:18', 'admin', '2014-12-24 04:08:40'),
('00000000019', 'Krajan', 3, 12, 189, 567, 273, 699, '00000000025', 'admin', '2014-12-11 05:20:04', 'admin', '2014-12-24 04:15:05'),
('00000000021', 'Mojoroto', 0, 0, 0, 0, 0, 0, '00000000027', 'admin', '2014-12-11 05:32:09', 'admin', '2014-12-27 07:32:28'),
('00000000023', 'Jurang jero', 2, 4, 147, 300, 100, 250, '00000000029', 'admin', '2014-12-11 05:39:28', 'admin', '2014-12-24 03:47:51'),
('00000000024', 'Krajan', 4, 9, 67, 200, 153, 370, '00000000030', 'admin', '2014-12-11 05:39:51', 'admin', '2014-12-24 04:00:40'),
('00000000025', 'Sumber Baru', 3, 10, 2, 6, 348, 1392, '00000000031', 'admin', '2014-12-11 05:53:28', 'admin', '2014-12-24 02:55:51'),
('00000000026', 'Krajan I', 5, 21, 0, 0, 0, 0, '00000000032', 'admin', '2014-12-11 05:56:27', 'admin', '2014-12-24 03:18:41'),
('00000000027', 'Curah Leduk', 4, 14, 3426, 852, 1282, 5275, '00000000033', 'admin', '2014-12-11 06:03:26', 'admin', '2014-12-24 03:24:08'),
('00000000028', '', 0, 0, 0, 0, 0, 0, '00000000034', 'admin', '2014-12-11 06:11:15', NULL, NULL),
('00000000029', 'Klatakan', 2, 8, 60, 240, 340, 1360, '00000000035', 'admin', '2014-12-11 06:11:49', 'admin', '2014-12-27 07:25:08'),
('00000000030', '', 0, 0, 0, 0, 0, 0, '00000000036', 'admin', '2014-12-11 06:12:06', NULL, NULL),
('00000000034', 'Kedungdandang', 6, 25, 903, 3154, 150, 635, '00000000040', 'admin', '2014-12-11 06:48:29', 'admin', '2014-12-23 07:35:47'),
('00000000035', 'Curah Pacul', 5, 21, 0, 0, 0, 0, '00000000041', 'admin', '2014-12-11 06:48:55', 'admin', '2014-12-23 07:45:43'),
('00000000036', 'Krajan', 2, 10, 0, 0, 0, 0, '00000000042', 'admin', '2014-12-11 07:24:35', 'admin', '2014-12-23 07:30:27'),
('00000000037', 'Krajan', 5, 29, 0, 0, 0, 0, '00000000043', 'admin', '2014-12-11 07:45:33', 'admin', '2014-12-24 06:14:16'),
('00000000038', 'Krajan', 4, 18, 0, 0, 0, 0, '00000000044', 'admin', '2014-12-11 07:49:23', 'admin', '2014-12-27 07:28:51'),
('00000000039', 'Sumber manggis', 3, 13, 0, 0, 0, 0, '00000000045', 'admin', '2014-12-11 07:49:55', 'admin', '2014-12-27 07:30:36'),
('00000000040', 'Krajan ', 2, 4, 0, 0, 0, 0, '00000000046', 'admin', '2014-12-11 08:02:48', 'admin', '2014-12-24 03:42:29'),
('00000000041', 'Krajan Barat', 2, 7, 0, 0, 0, 0, '00000000047', 'admin', '2014-12-11 08:05:31', 'admin', '2014-12-24 03:34:18'),
('00000000042', '', 0, 0, 0, 0, 0, 0, '00000000048', 'admin', '2014-12-11 08:08:49', NULL, NULL),
('00000000043', 'Jatimulyo', 2, 21, 0, 0, 0, 0, '00000000009', 'admin', '2014-12-23 06:25:26', NULL, NULL),
('00000000044', 'Jatiroto', 2, 20, 0, 0, 0, 0, '00000000009', 'admin', '2014-12-23 06:28:48', NULL, NULL),
('00000000045', 'Krajan', 4, 18, 400, 1156, 296, 712, '00000000039', 'admin', '2014-12-23 06:41:40', NULL, NULL),
('00000000046', 'Cebok', 2, 5, 0, 0, 313, 146, '00000000039', 'admin', '2014-12-23 06:42:12', NULL, NULL),
('00000000047', 'Krajan', 3, 14, 297, 118, 994, 3976, '00000000038', 'admin', '2014-12-23 06:48:20', NULL, NULL),
('00000000048', 'Krajan ', 6, 24, 0, 0, 0, 0, '00000000010', 'admin', '2014-12-23 06:48:40', NULL, NULL),
('00000000049', 'Kampung Anyar', 2, 5, 0, 0, 0, 0, '00000000038', 'admin', '2014-12-23 06:48:45', NULL, NULL),
('00000000050', 'Curah Pecak', 6, 23, 0, 0, 0, 0, '00000000010', 'admin', '2014-12-23 06:48:54', NULL, NULL),
('00000000051', 'Taman Sari', 2, 6, 0, 0, 0, 0, '00000000038', 'admin', '2014-12-23 06:49:08', NULL, NULL),
('00000000052', 'Gumuk Rejo ', 8, 30, 0, 0, 0, 0, '00000000010', 'admin', '2014-12-23 06:49:09', NULL, NULL),
('00000000053', 'Krajan', 6, 11, 0, 0, 0, 0, '00000000037', 'admin', '2014-12-23 07:10:22', NULL, NULL),
('00000000054', 'Karangan', 6, 10, 0, 0, 0, 0, '00000000037', 'admin', '2014-12-23 07:10:56', NULL, NULL),
('00000000055', 'Sumberejeki', 3, 11, 472, 0, 0, 0, '00000000011', 'admin', '2014-12-23 07:12:34', NULL, NULL),
('00000000056', 'Kebang Kandel', 5, 17, 675, 2147, 0, 0, '00000000011', 'admin', '2014-12-23 07:13:01', NULL, NULL),
('00000000057', 'Krajan', 3, 10, 369, 1204, 0, 0, '00000000011', 'admin', '2014-12-23 07:13:37', NULL, NULL),
('00000000058', 'Blok Solo ', 4124, 12, 499, 1471, 0, 0, '00000000011', 'admin', '2014-12-23 07:14:46', NULL, NULL),
('00000000059', 'karangdoro', 2, 11, 0, 0, 0, 0, '00000000028', 'admin', '2014-12-23 07:16:46', NULL, NULL),
('00000000060', 'karangdoro', 2, 11, 0, 0, 0, 0, '00000000028', 'admin', '2014-12-23 07:17:08', NULL, NULL),
('00000000061', 'Asem Bagus', 3, 16, 32, 128, 828, 2522, '00000000012', 'admin', '2014-12-23 07:19:51', NULL, NULL),
('00000000062', 'Gumuk Kembar', 2, 12, 6, 0, 647, 1868, '00000000012', 'admin', '2014-12-23 07:21:40', NULL, NULL),
('00000000063', 'Kedungringin', 5, 13, 0, 0, 0, 0, '00000000042', 'admin', '2014-12-23 07:30:47', NULL, NULL),
('00000000064', 'Tratas', 5, 13, 0, 0, 0, 0, '00000000042', 'admin', '2014-12-23 07:30:59', NULL, NULL),
('00000000065', 'Krajan', 9, 35, 1520, 4151, 1520, 4151, '00000000040', 'admin', '2014-12-23 07:36:22', NULL, NULL),
('00000000066', 'Curah Krakal', 6, 24, 0, 0, 0, 0, '00000000041', 'admin', '2014-12-23 07:46:00', NULL, NULL),
('00000000067', 'Rumping', 7, 21, 0, 0, 0, 0, '00000000015', 'admin', '2014-12-23 07:57:05', NULL, NULL),
('00000000068', 'Wringinpitu', 7, 20, 0, 0, 0, 0, '00000000015', 'admin', '2014-12-23 07:57:13', NULL, NULL),
('00000000069', 'Kalirejo', 2, 6, 0, 0, 0, 0, '00000000019', 'admin', '2014-12-23 08:06:58', NULL, NULL),
('00000000070', 'Temurejo', 7, 21, 0, 0, 1119, 2950, '00000000021', 'admin', '2014-12-23 08:35:42', NULL, NULL),
('00000000071', 'Pandan', 9, 23, 1, 0, 120, 3424, '00000000021', 'admin', '2014-12-23 08:36:14', NULL, NULL),
('00000000072', 'Ringinsari', 3, 7, 132, 739, 320, 633, '00000000021', 'admin', '2014-12-23 08:36:43', NULL, NULL),
('00000000073', 'Sepanjang kulon', 8, 17, 0, 0, 0, 0, '00000000016', 'admin', '2014-12-23 08:50:45', NULL, NULL),
('00000000074', 'Sidomulyo', 7, 16, 0, 0, 0, 0, '00000000016', 'admin', '2014-12-23 08:51:02', NULL, NULL),
('00000000075', 'Sidoluhur', 5, 12, 0, 0, 0, 0, '00000000016', 'admin', '2014-12-23 08:51:10', NULL, NULL),
('00000000076', 'Wono Asih', 1, 1, 53, 150, 12, 38, '00000000017', 'admin', '2014-12-23 08:58:44', NULL, NULL),
('00000000077', 'Kampung baru', 1, 1, 150, 400, 50, 150, '00000000017', 'admin', '2014-12-23 08:59:07', NULL, NULL),
('00000000078', 'salamrejo', 6, 15, 275, 825, 708, 2093, '00000000018', 'admin', '2014-12-23 09:04:35', 'admin', '2014-12-23 09:05:04'),
('00000000079', 'wonorejo', 2, 8, 6, 24, 314, 1256, '00000000031', 'admin', '2014-12-24 02:55:26', NULL, NULL),
('00000000080', 'Tegal Pakis', 24, 103, 790, 3160, 3138, 10, '00000000031', 'admin', '2014-12-24 02:59:17', NULL, NULL),
('00000000081', 'Krajan Selatan', 2, 4, 0, 0, 0, 0, '00000000047', 'admin', '2014-12-24 03:34:25', NULL, NULL),
('00000000082', 'Krajan Timur', 2, 5, 0, 0, 0, 0, '00000000047', 'admin', '2014-12-24 03:34:36', NULL, NULL),
('00000000083', 'Wijenan Lor', 2, 6, 0, 0, 0, 0, '00000000046', 'admin', '2014-12-24 03:42:35', NULL, NULL),
('00000000084', 'Pengastulan', 2, 4, 0, 0, 0, 0, '00000000046', 'admin', '2014-12-24 03:42:48', NULL, NULL),
('00000000085', 'Cermean ', 2, 4, 0, 0, 0, 0, '00000000046', 'admin', '2014-12-24 03:43:02', NULL, NULL),
('00000000086', 'Krajan', 0, 0, 0, 0, 0, 0, '00000000029', 'admin', '2014-12-24 03:48:01', NULL, NULL),
('00000000087', 'Krajan', 0, 0, 0, 0, 0, 0, '00000000029', 'admin', '2014-12-24 03:48:14', NULL, NULL),
('00000000088', 'Kepuh Wetan', 0, 0, 0, 0, 0, 0, '00000000029', 'admin', '2014-12-24 03:48:43', NULL, NULL),
('00000000089', 'Mulyosari', 5, 10, 0, 0, 0, 0, '00000000030', 'admin', '2014-12-24 04:00:55', NULL, NULL),
('00000000090', 'Kelir', 2, 4, 0, 0, 0, 0, '00000000030', 'admin', '2014-12-24 04:01:04', NULL, NULL),
('00000000091', 'Sangkur', 2, 4, 0, 0, 0, 0, '00000000030', 'admin', '2014-12-24 04:01:14', NULL, NULL),
('00000000092', 'Seruni', 2, 3, 0, 0, 0, 0, '00000000030', 'admin', '2014-12-24 04:01:25', NULL, NULL),
('00000000093', 'Krajan', 3, 13, 0, 0, 0, 0, '00000000024', 'admin', '2014-12-24 04:08:28', NULL, NULL),
('00000000094', 'Joyosari', 2, 12, 203, 203, 276, 728, '00000000025', 'admin', '2014-12-24 04:15:45', NULL, NULL),
('00000000095', 'Krajan ', 3, 10, 0, 0, 0, 0, '00000000049', 'admin', '2014-12-24 05:12:10', NULL, NULL),
('00000000096', 'Watu Ulo', 2, 6, 0, 0, 0, 0, '00000000049', 'admin', '2014-12-24 05:12:10', NULL, NULL),
('00000000097', 'Krajan bengkak', 1, 2, 22, 226, 40, 120, '00000000026', 'admin', '2014-12-24 05:32:50', NULL, NULL),
('00000000098', 'Seloagung', 3, 14, 0, 0, 0, 0, '00000000044', 'admin', '2014-12-27 07:29:02', NULL, NULL),
('00000000099', 'Tegalwagah', 2, 8, 0, 0, 0, 0, '00000000044', 'admin', '2014-12-27 07:29:16', NULL, NULL),
('00000000100', 'Sumber Urip', 3, 17, 0, 0, 0, 0, '00000000045', 'admin', '2014-12-27 07:30:46', NULL, NULL);

--
-- Triggers `hippam_desa`
--
DELIMITER //
CREATE TRIGGER `hippam_desa_crt_date` BEFORE INSERT ON `hippam_desa`
 FOR EACH ROW BEGIN
        SET NEW.crt_date = CURRENT_TIMESTAMP();
END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `hippam_desa_upd_date` BEFORE UPDATE ON `hippam_desa`
 FOR EACH ROW BEGIN
        SET NEW.upd_date = CURRENT_TIMESTAMP();
END
//
DELIMITER ;

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
  `upd_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `hippam_desa_sekitar`
--

INSERT INTO `hippam_desa_sekitar` (`id`, `uraian`, `rw`, `rt`, `terlayani_kk`, `terlayani_jiwa`, `belum_terlayani_kk`, `belum_terlayani_jiwa`, `hippam_id`, `crt`, `crt_date`, `upd`, `upd_date`) VALUES
('00000000001', 'Blumbang', 1, 2, 0, 0, 0, 0, '00000000046', 'admin', '2014-12-24 03:43:19', NULL, NULL);

--
-- Triggers `hippam_desa_sekitar`
--
DELIMITER //
CREATE TRIGGER `hippam_desa_sekitar_crt_date` BEFORE INSERT ON `hippam_desa_sekitar`
 FOR EACH ROW BEGIN
        SET NEW.crt_date = CURRENT_TIMESTAMP();
END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `hippam_desa_sekitar_upd_date` BEFORE UPDATE ON `hippam_desa_sekitar`
 FOR EACH ROW BEGIN
        SET NEW.upd_date = CURRENT_TIMESTAMP();
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE IF NOT EXISTS `kabupaten` (
  `id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `propinsi_id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `keterangan` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `aktif` tinyint(4) NOT NULL DEFAULT '1'
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
  `aktif` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `kode`, `kabupaten_id`, `nama`, `keterangan`, `aktif`) VALUES
('3510010', '35.10.01', '3510', 'PESANGGARAN', '', 1),
('3510011', '35.10.22', '3510', 'SILIRAGUNG', '', 1),
('3510020', '35.10.02', '3510', 'BANGOREJO', '', 1),
('3510030', '35.10.03', '3510', 'PURWOHARJO', '', 1),
('3510040', '35.10.04', '3510', 'TEGALDLIMO', '', 1),
('3510050', '35.10.05\n', '3510', 'MUNCAR', '', 1),
('3510060', '35.10.06\n', '3510', 'CLURING', '', 1),
('3510070', NULL, '3510', 'GAMBIRAN', '', 1),
('3510071', '35.10.23', '3510', 'TEGALSARI', '', 1),
('3510080', '35.10.10', '3510', 'GLENMORE', '', 1),
('3510090', '35.10.11', '3510', 'KALIBARU', '', 1),
('3510100', '35.10.09', '3510', 'GENTENG', '', 1),
('3510110', NULL, '3510', 'SRONO', '', 1),
('3510120', NULL, '3510', 'ROGOJAMPI', '', 1),
('3510130', '35.10.14', '3510', 'KABAT', '', 1),
('3510140', '35.10.12', '3510', 'SINGOJURUH', '', 1),
('3510150', '35.10.20', '3510', 'SEMPU', '', 1),
('3510160', NULL, '3510', 'SONGGON', '', 1),
('3510170', '35.10.15', '3510', 'GLAGAH', '', 1),
('3510171', '35.10.24', '3510', 'LICIN', '', 1),
('3510180', NULL, '3510', 'BANYUWANGI', '', 1),
('3510190', '35.10.17', '3510', 'GIRI', '', 1),
('3510200', '35.10.21', '3510', 'KALIPURO', '', 1),
('3510210', '35.10.18', '3510', 'WONGSOREJO', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_grp`
--

CREATE TABLE IF NOT EXISTS `login_grp` (
  `id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `keterangan` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  `crt` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `crt_date` timestamp NULL DEFAULT NULL,
  `upd` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `upd_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `login_grp`
--

INSERT INTO `login_grp` (`id`, `nama`, `keterangan`, `aktif`, `crt`, `crt_date`, `upd`, `upd_date`) VALUES
('ADM', 'Administrasi', 'Administrasi', 1, NULL, '2014-09-09 04:34:38', NULL, '2013-12-16 08:07:23');

--
-- Triggers `login_grp`
--
DELIMITER //
CREATE TRIGGER `login_grp_crt_date` BEFORE INSERT ON `login_grp`
 FOR EACH ROW BEGIN
        SET NEW.crt_date = CURRENT_TIMESTAMP();
END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `login_grp_upd_date` BEFORE UPDATE ON `login_grp`
 FOR EACH ROW BEGIN
        SET NEW.upd_date = CURRENT_TIMESTAMP();
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `login_grp_acl`
--

CREATE TABLE IF NOT EXISTS `login_grp_acl` (
`id` int(11) NOT NULL,
  `login_grp_id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `menu_id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `enable` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'enable',
  `level` varchar(10) COLLATE latin1_general_ci NOT NULL DEFAULT '1111' COMMENT 'CRUD'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_log`
--

CREATE TABLE IF NOT EXISTS `login_log` (
`id` bigint(20) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `login_usr_id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `menu_id` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `menu_nama` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `status` enum('Li','Lo','C','R','U','D','Det') COLLATE latin1_general_ci NOT NULL,
  `tabel_relasi` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `id_relasi` varchar(20) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `login_log`
--

INSERT INTO `login_log` (`id`, `date_time`, `login_usr_id`, `menu_id`, `menu_nama`, `status`, `tabel_relasi`, `id_relasi`) VALUES
(1, '2014-11-03 05:05:27', '001', NULL, 'Login', 'Li', '', ''),
(2, '2014-11-03 07:45:03', '001', NULL, 'Login', 'Li', '', ''),
(3, '2014-11-03 11:11:33', '001', NULL, 'Login', 'Li', '', ''),
(4, '2014-11-04 01:28:04', '001', NULL, 'Login', 'Li', '', ''),
(5, '2014-11-04 02:52:35', '001', NULL, 'Login', 'Li', '', ''),
(6, '2014-11-04 02:52:54', '001', NULL, 'Logout', 'Lo', '', ''),
(7, '2014-11-04 02:54:19', '001', NULL, 'Login', 'Li', '', ''),
(8, '2014-11-05 02:17:01', '001', NULL, 'Login', 'Li', '', ''),
(9, '2014-11-20 04:18:51', '001', NULL, 'Login', 'Li', '', ''),
(10, '2014-11-20 05:55:09', '001', NULL, 'Login', 'Li', '', ''),
(11, '2014-11-22 04:46:29', '001', NULL, 'Login', 'Li', '', ''),
(12, '2014-12-01 21:44:18', '001', NULL, 'Login', 'Li', '', ''),
(13, '2014-12-01 22:18:58', '001', NULL, 'Login', 'Li', '', ''),
(14, '2014-12-02 02:09:48', '001', NULL, 'Login', 'Li', '', ''),
(15, '2014-12-02 05:04:29', '001', NULL, 'Login', 'Li', '', ''),
(16, '2014-12-02 05:06:58', '001', NULL, 'Login', 'Li', '', ''),
(17, '2014-12-02 07:13:50', '001', NULL, 'Login', 'Li', '', ''),
(18, '2014-12-02 07:29:02', '001', NULL, 'Login', 'Li', '', ''),
(19, '2014-12-02 13:53:19', '001', NULL, 'Login', 'Li', '', ''),
(20, '2014-12-02 14:27:25', '001', NULL, 'Logout', 'Lo', '', ''),
(21, '2014-12-03 15:39:55', '001', NULL, 'Login', 'Li', '', ''),
(22, '2014-12-04 03:37:40', '001', NULL, 'Login', 'Li', '', ''),
(23, '2014-12-04 03:38:28', '001', NULL, 'Logout', 'Lo', '', ''),
(24, '2014-12-09 12:35:38', '001', NULL, 'Login', 'Li', '', ''),
(25, '2014-12-09 16:48:30', '001', NULL, 'Login', 'Li', '', ''),
(26, '2014-12-09 23:03:59', '001', NULL, 'Login', 'Li', '', ''),
(27, '2014-12-10 01:59:20', '001', NULL, 'Login', 'Li', '', ''),
(28, '2014-12-10 02:16:21', '001', NULL, 'Login', 'Li', '', ''),
(29, '2014-12-10 02:41:15', '001', NULL, 'Login', 'Li', '', ''),
(30, '2014-12-10 03:11:38', '001', NULL, 'Login', 'Li', '', ''),
(31, '2014-12-10 03:14:26', '001', NULL, 'Logout', 'Lo', '', ''),
(32, '2014-12-10 04:24:13', '001', NULL, 'Login', 'Li', '', ''),
(33, '2014-12-10 04:32:47', '001', NULL, 'Login', 'Li', '', ''),
(34, '2014-12-10 05:53:32', '001', NULL, 'Login', 'Li', '', ''),
(35, '2014-12-10 05:54:40', '001', NULL, 'Login', 'Li', '', ''),
(36, '2014-12-10 06:27:50', '001', NULL, 'Login', 'Li', '', ''),
(37, '2014-12-10 06:39:47', '001', NULL, 'Logout', 'Lo', '', ''),
(38, '2014-12-10 07:02:25', '001', NULL, 'Login', 'Li', '', ''),
(39, '2014-12-10 11:53:04', '001', NULL, 'Login', 'Li', '', ''),
(40, '2014-12-10 11:57:28', '001', NULL, 'Login', 'Li', '', ''),
(41, '2014-12-11 02:06:38', '001', NULL, 'Login', 'Li', '', ''),
(42, '2014-12-11 03:59:07', '001', NULL, 'Login', 'Li', '', ''),
(43, '2014-12-11 04:09:17', '001', NULL, 'Login', 'Li', '', ''),
(44, '2014-12-11 04:37:51', '001', NULL, 'Login', 'Li', '', ''),
(45, '2014-12-11 05:16:26', '001', NULL, 'Login', 'Li', '', ''),
(46, '2014-12-11 05:30:44', '001', NULL, 'Login', 'Li', '', ''),
(47, '2014-12-11 08:14:46', '001', NULL, 'Logout', 'Lo', '', ''),
(48, '2014-12-11 09:04:40', '001', NULL, 'Login', 'Li', '', ''),
(49, '2014-12-11 14:26:38', '001', NULL, 'Login', 'Li', '', ''),
(50, '2014-12-20 13:17:40', '001', NULL, 'Login', 'Li', '', ''),
(51, '2014-12-22 15:14:26', '001', NULL, 'Login', 'Li', '', ''),
(52, '2014-12-22 15:57:38', '001', NULL, 'Login', 'Li', '', ''),
(53, '2014-12-22 15:57:57', '001', NULL, 'Logout', 'Lo', '', ''),
(54, '2014-12-23 03:17:22', '001', NULL, 'Login', 'Li', '', ''),
(55, '2014-12-23 05:41:43', '001', NULL, 'Login', 'Li', '', ''),
(56, '2014-12-23 06:28:03', '001', NULL, 'Login', 'Li', '', ''),
(57, '2014-12-23 07:14:04', '001', NULL, 'Login', 'Li', '', ''),
(58, '2014-12-23 07:21:04', '001', NULL, 'Login', 'Li', '', ''),
(59, '2014-12-23 14:44:43', '001', NULL, 'Login', 'Li', '', ''),
(60, '2014-12-24 02:25:50', '001', NULL, 'Login', 'Li', '', ''),
(61, '2014-12-24 05:07:06', '001', NULL, 'Login', 'Li', '', ''),
(62, '2014-12-24 06:05:49', '001', NULL, 'Login', 'Li', '', ''),
(63, '2014-12-24 13:50:47', '001', NULL, 'Login', 'Li', '', ''),
(64, '2014-12-24 20:50:15', '001', NULL, 'Login', 'Li', '', ''),
(65, '2014-12-25 10:36:54', '001', NULL, 'Login', 'Li', '', ''),
(66, '2014-12-25 14:21:29', '001', NULL, 'Login', 'Li', '', ''),
(67, '2014-12-25 14:48:02', '001', NULL, 'Login', 'Li', '', ''),
(68, '2014-12-25 17:10:56', '001', NULL, 'Login', 'Li', '', ''),
(69, '2014-12-25 17:12:47', '001', NULL, 'Login', 'Li', '', ''),
(70, '2014-12-26 01:02:32', '001', NULL, 'Login', 'Li', '', ''),
(71, '2014-12-27 07:19:10', '001', NULL, 'Login', 'Li', '', ''),
(72, '2014-12-27 07:44:26', '001', NULL, 'Login', 'Li', '', ''),
(73, '2020-10-13 08:40:36', '001', NULL, 'Login', 'Li', '', ''),
(74, '2020-10-13 08:42:30', '001', NULL, 'Login', 'Li', '', ''),
(75, '2020-10-15 02:00:17', '001', NULL, 'Login', 'Li', '', ''),
(76, '2020-10-15 03:23:26', '001', NULL, 'Logout', 'Lo', '', ''),
(77, '2020-10-15 04:39:32', '001', NULL, 'Login', 'Li', '', ''),
(78, '2020-10-16 02:07:44', '001', NULL, 'Login', 'Li', '', ''),
(79, '2020-10-28 09:33:22', '001', NULL, 'Login', 'Li', '', ''),
(80, '2020-11-02 08:56:34', '001', NULL, 'Login', 'Li', '', ''),
(81, '2020-11-02 08:57:06', '001', NULL, 'Login', 'Li', '', ''),
(82, '2020-11-02 08:59:11', '001', NULL, 'Login', 'Li', '', ''),
(83, '2020-11-02 09:02:21', '001', NULL, 'Login', 'Li', '', ''),
(84, '2020-11-02 09:03:15', '001', NULL, 'Login', 'Li', '', ''),
(85, '2020-11-02 09:04:20', '001', NULL, 'Login', 'Li', '', ''),
(86, '2020-11-03 01:54:45', '001', NULL, 'Login', 'Li', '', ''),
(87, '2020-11-03 04:14:14', '001', NULL, 'Login', 'Li', '', ''),
(88, '2020-11-03 04:17:05', '001', NULL, 'Logout', 'Lo', '', ''),
(89, '2020-11-03 04:17:11', '001', NULL, 'Login', 'Li', '', ''),
(90, '2020-11-03 07:35:12', '001', NULL, 'Login', 'Li', '', ''),
(91, '2020-11-03 07:48:54', '001', NULL, 'Login', 'Li', '', ''),
(92, '2020-11-03 08:08:36', '001', NULL, 'Login', 'Li', '', ''),
(93, '2020-11-03 08:20:57', '001', NULL, 'Login', 'Li', '', ''),
(94, '2020-11-03 08:21:14', '001', NULL, 'Logout', 'Lo', '', ''),
(95, '2020-11-03 08:21:24', '001', NULL, 'Login', 'Li', '', ''),
(96, '2020-11-03 08:25:41', '001', NULL, 'Logout', 'Lo', '', ''),
(97, '2020-11-03 08:25:48', '001', NULL, 'Login', 'Li', '', ''),
(98, '2020-11-04 05:21:16', '001', NULL, 'Login', 'Li', '', ''),
(99, '2020-11-04 05:22:49', '001', NULL, 'Login', 'Li', '', ''),
(100, '2020-11-05 03:03:05', '001', NULL, 'Login', 'Li', '', ''),
(101, '2020-11-05 08:59:32', '001', NULL, 'Login', 'Li', '', ''),
(102, '2020-11-09 01:53:19', '001', NULL, 'Login', 'Li', '', ''),
(103, '2020-11-09 07:32:21', '001', NULL, 'Logout', 'Lo', '', ''),
(104, '2020-11-09 07:32:30', '001', NULL, 'Login', 'Li', '', ''),
(105, '2020-11-19 02:53:07', '001', NULL, 'Login', 'Li', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `login_usr`
--

CREATE TABLE IF NOT EXISTS `login_usr` (
  `id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `jenis` enum('guru','siswa','pegawai') COLLATE latin1_general_ci NOT NULL,
  `id_relasi` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tabel_relasi` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `passwd` varchar(225) COLLATE latin1_general_ci NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  `tgl_1` date NOT NULL,
  `tgl_2` date NOT NULL,
  `crt` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `crt_date` timestamp NULL DEFAULT NULL,
  `upd` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `upd_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `login_usr`
--

INSERT INTO `login_usr` (`id`, `jenis`, `id_relasi`, `tabel_relasi`, `username`, `passwd`, `aktif`, `tgl_1`, `tgl_2`, `crt`, `crt_date`, `upd`, `upd_date`) VALUES
('001', 'guru', '', '', 'admin', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441', 1, '2012-12-20', '2050-12-20', NULL, '2014-09-09 04:35:01', NULL, '2020-11-09 07:48:11');

--
-- Triggers `login_usr`
--
DELIMITER //
CREATE TRIGGER `login_usr_crt_date` BEFORE INSERT ON `login_usr`
 FOR EACH ROW BEGIN
        SET NEW.crt_date = CURRENT_TIMESTAMP();
END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `login_usr_upd_date` BEFORE UPDATE ON `login_usr`
 FOR EACH ROW BEGIN
        SET NEW.upd_date = CURRENT_TIMESTAMP();
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `login_usr_grp`
--

CREATE TABLE IF NOT EXISTS `login_usr_grp` (
`id` int(11) NOT NULL,
  `login_usr_id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `login_grp_id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  `crt` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `crt_date` timestamp NULL DEFAULT NULL,
  `upd` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `upd_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `login_usr_grp`
--

INSERT INTO `login_usr_grp` (`id`, `login_usr_id`, `login_grp_id`, `aktif`, `crt`, `crt_date`, `upd`, `upd_date`) VALUES
(1, '001', 'SA', 1, NULL, '2014-09-09 04:35:10', NULL, '2013-10-12 23:48:53');

--
-- Triggers `login_usr_grp`
--
DELIMITER //
CREATE TRIGGER `login_usr_grp_crt_date` BEFORE INSERT ON `login_usr_grp`
 FOR EACH ROW BEGIN
        SET NEW.crt_date = CURRENT_TIMESTAMP();
END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `login_usr_grp_upd_date` BEFORE UPDATE ON `login_usr_grp`
 FOR EACH ROW BEGIN
        SET NEW.upd_date = CURRENT_TIMESTAMP();
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `upline` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `urut` tinyint(4) NOT NULL,
  `nama` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `tipe` enum('Header','Detail') COLLATE latin1_general_ci NOT NULL DEFAULT 'Header',
  `level` tinyint(4) NOT NULL COMMENT '1, 2, 3, 4',
  `link` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '#',
  `icon` varchar(40) COLLATE latin1_general_ci NOT NULL DEFAULT 'glyphicon glyphicon-file',
  `aktif` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `upline`, `urut`, `nama`, `tipe`, `level`, `link`, `icon`, `aktif`) VALUES
('01', '0', 0, 'File & Setup', 'Header', 1, 'home.php', 'glyphicon glyphicon-wrench', 1),
('0101', '01', 1, 'Setup', 'Header', 2, '#', 'glyphicon glyphicon-cog', 1),
('010101', '0101', 1, 'Menu', 'Detail', 3, 'setup_sistem/menu/setup_menu.php', 'glyphicon glyphicon-th', 1),
('010102', '0101', 2, 'Login', 'Header', 3, 'home.php', 'glyphicon glyphicon-file', 1),
('01010201', '010102', 1, 'Login Group', 'Detail', 4, 'login/login_grp/login_grp.php', 'glyphicon glyphicon-file', 1),
('01010202', '010102', 2, 'Login User', 'Detail', 4, 'login/login_usr/login_usr.php', 'glyphicon glyphicon-user', 1),
('0190', '01', 2, 'User Account', 'Detail', 2, 'user_account.php', 'glyphicon glyphicon-user', 1),
('0191', '01', 9, 'Logout', 'Detail', 2, 'logout.php', 'glyphicon glyphicon-off', 1),
('02', '0', 0, 'Master', 'Header', 1, 'home.php', 'glyphicon glyphicon-list-alt', 1),
('0201', '02', 1, 'Pipa', 'Header', 2, '', 'glyphicon glyphicon-file', 1),
('020101', '0201', 1, 'Pipa Hippam', 'Detail', 3, 'appl/master/pipa/pipa.php', 'glyphicon glyphicon-transfer', 1),
('020102', '0201', 2, 'Koordinat Pipa', 'Detail', 3, 'appl/master/pipa_koordinat/pipa_koordinat.php', 'glyphicon glyphicon-transfer', 1),
('0202', '02', 2, 'Broncap', 'Detail', 2, 'appl/master/broncap/broncap.php', 'glyphicon glyphicon-tree-deciduous', 1),
('0203', '02', 3, 'Tandon', 'Detail', 2, 'appl/master/tandon/tandon.php', 'glyphicon glyphicon-user', 1),
('0204', '02', 4, 'Hippam', 'Detail', 2, 'appl/master/hippam/hippam.php', 'glyphicon glyphicon-user', 1),
('0299', '02', 99, 'Laporan', 'Header', 2, '#', 'glyphicon glyphicon-file', 0),
('03', '0', 0, 'Akademik', 'Header', 1, 'home.php', 'glyphicon glyphicon-file', 0),
('04', '0', 0, 'Nilai', 'Header', 1, 'home.php', 'glyphicon glyphicon-file', 0),
('06', '0', 0, 'Keuangan', 'Header', 1, '#', 'glyphicon glyphicon-file', 0),
('07', '0', 0, '-----', 'Header', 1, '#', 'glyphicon glyphicon-file', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pipa`
--

CREATE TABLE IF NOT EXISTS `pipa` (
  `id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `hippam_id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `pipa_jenis_id` varchar(4) COLLATE latin1_general_ci NOT NULL,
  `keterangan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  `crt` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `crt_date` timestamp NULL DEFAULT NULL,
  `upd` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `upd_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `pipa`
--

INSERT INTO `pipa` (`id`, `hippam_id`, `nama`, `pipa_jenis_id`, `keterangan`, `aktif`, `crt`, `crt_date`, `upd`, `upd_date`) VALUES
('00001', '00000000006', 'pipa 1', '0200', '', 1, 'admin', '2014-12-09 12:37:10', NULL, '2014-12-25 17:44:31'),
('00002', '00000000006', 'pipa 2', '0200', '', 1, 'admin', '2014-12-09 12:38:08', NULL, '2014-12-25 17:44:31'),
('00003', '00000000006', 'pipa 3', '0200', '', 1, 'admin', '2014-12-09 12:38:27', NULL, '2014-12-25 17:44:31'),
('00004', '00000000006', 'pipa 4', '0200', '', 1, 'admin', '2014-12-09 12:38:42', NULL, '2014-12-25 17:44:31'),
('00005', '00000000006', 'pipa 5', '0200', '', 1, 'admin', '2014-12-09 12:38:55', NULL, '2014-12-25 17:44:31'),
('00006', '00000000007', 'pipa 2.1', '0200', '', 1, 'admin', '2014-12-09 17:05:25', 'admin', '2020-11-09 06:57:23'),
('00007', '00000000007', 'pipa 2.2', '0200', '', 1, 'admin', '2014-12-09 17:06:44', 'admin', '2020-11-09 06:57:47'),
('00008', '00000000007', 'pipa 2.3', '0200', '', 1, 'admin', '2014-12-09 17:07:01', NULL, '2014-12-25 17:44:31'),
('00009', '00000000007', 'pipa 2.4', '0200', '', 1, 'admin', '2014-12-09 17:07:44', 'admin', '2014-12-25 17:44:31'),
('00010', '00000000007', 'pipa 2.5', '0200', '', 1, 'admin', '2014-12-09 17:07:58', NULL, '2014-12-25 17:44:31'),
('00011', '00000000007', 'pipa 2.6', '0200', '', 1, 'admin', '2014-12-09 17:08:14', NULL, '2014-12-25 17:44:31'),
('00012', '00000000007', 'pipa 2.7', '0200', '', 1, 'admin', '2014-12-09 17:08:32', NULL, '2014-12-25 17:44:31'),
('00013', '00000000007', 'pipa 2.8', '0200', '', 1, 'admin', '2014-12-09 17:08:46', NULL, '2014-12-25 17:44:31'),
('00014', '00000000007', 'pipa 2.9', '0200', '', 1, 'admin', '2014-12-09 17:09:00', NULL, '2014-12-25 17:44:31'),
('00015', '00000000007', 'pipa 2.10', '0200', '', 1, 'admin', '2014-12-09 17:09:18', 'admin', '2014-12-25 17:44:31'),
('00016', '00000000007', 'pipa 3.1', '1300', '', 1, 'admin', '2014-12-09 17:16:11', NULL, NULL),
('00017', '00000000007', 'pipa 3.2', '1300', '', 1, 'admin', '2014-12-09 17:16:22', NULL, NULL),
('00018', '00000000008', 'SUMBERAGUNG 2.1', '0200', '', 1, 'admin', '2014-12-09 17:29:31', 'admin', '2014-12-25 17:44:31'),
('00019', '00000000008', 'SUMBERAGUNG 2.2', '0200', '', 1, 'admin', '2014-12-09 17:29:47', 'admin', '2014-12-25 17:44:31'),
('00020', '00000000008', 'SUMBERAGUNG 3.1', '1300', '', 1, 'admin', '2014-12-09 17:31:10', 'admin', '2014-12-25 15:08:08'),
('00021', '00000000008', 'SUMBERAGUNG 3.2', '1300', '', 1, 'admin', '2014-12-09 17:31:21', 'admin', '2014-12-25 15:08:01'),
('00022', '00000000009', 'GLAGAHAGUNG 2.3', '0200', '', 1, 'admin', '2014-12-09 17:41:05', 'admin', '2014-12-25 17:44:31'),
('00023', '00000000009', 'GLAGAHAGUNG 2.2', '0200', '', 1, 'admin', '2014-12-09 17:41:36', 'admin', '2014-12-25 17:44:31'),
('00024', '00000000006', 'pipa 2.3 glagahagung', '0200', '', 1, 'admin', '2014-12-09 17:42:01', NULL, '2014-12-25 17:44:31'),
('00025', '00000000009', 'GLAGAHAGUNG 2.1', '0200', '', 1, 'admin', '2014-12-09 17:42:24', 'admin', '2014-12-25 17:44:31'),
('00026', '00000000009', 'GLAGAHAGUNG 2.4', '0200', '', 1, 'admin', '2014-12-09 17:44:50', 'admin', '2014-12-25 17:44:31'),
('00027', '00000000010', 'sumber sehat pipa 2.1', '0200', '', 1, 'admin', '2014-12-09 17:48:11', NULL, '2014-12-25 17:44:31'),
('00028', '00000000010', 'sumber sehat pipa 2.2', '0200', '', 1, 'admin', '2014-12-09 17:48:25', NULL, '2014-12-25 17:44:31'),
('00029', '00000000010', 'sumber sehat pipa 2.3', '0200', '', 1, 'admin', '2014-12-09 17:48:43', NULL, '2014-12-25 17:44:31'),
('00030', '00000000010', 'sumber sehat pipa 2.4', '0200', '', 1, 'admin', '2014-12-09 17:48:54', NULL, '2014-12-25 17:44:31'),
('00031', '00000000010', 'sumber sehat pipa 2.5', '0200', '', 1, 'admin', '2014-12-09 17:49:36', NULL, '2014-12-25 17:44:31'),
('00032', '00000000010', 'sumber sehat pipa 2.6', '0200', '', 1, 'admin', '2014-12-09 17:49:48', NULL, '2014-12-25 17:44:31'),
('00033', '00000000010', 'sumber sehat pipa 2.7', '0200', '', 1, 'admin', '2014-12-09 17:50:00', NULL, '2014-12-25 17:44:31'),
('00034', '00000000011', 'tirto asri pipa 2.1', '0200', '', 1, 'admin', '2014-12-09 17:53:18', NULL, '2014-12-25 17:44:31'),
('00035', '00000000011', 'tirto asri pipa 2.2', '0200', '', 1, 'admin', '2014-12-09 17:53:32', NULL, '2014-12-25 17:44:31'),
('00036', '00000000011', 'tirto asri pipa 2.3', '0200', '', 1, 'admin', '2014-12-09 17:53:45', NULL, '2014-12-25 17:44:31'),
('00037', '00000000011', 'tirto asri pipa 2.4', '0200', '', 1, 'admin', '2014-12-09 17:53:57', NULL, '2014-12-25 17:44:31'),
('00038', '00000000011', 'tirto asri pipa 2.5', '0200', '', 1, 'admin', '2014-12-09 17:54:18', NULL, '2014-12-25 17:44:31'),
('00039', '00000000011', 'tirto asri pipa 2.6', '0200', '', 1, 'admin', '2014-12-09 17:54:31', NULL, '2014-12-25 17:44:31'),
('00040', '00000000011', 'tirto asri pipa 3.1', '1300', '', 1, 'admin', '2014-12-09 17:56:52', NULL, NULL),
('00041', '00000000011', 'tirto asri pipa 3.2', '1300', '', 1, 'admin', '2014-12-09 17:57:04', NULL, NULL),
('00042', '00000000011', 'tirto asri pipa 3.3', '1300', '', 1, 'admin', '2014-12-09 17:57:18', NULL, NULL),
('00043', '00000000016', 'sepanjang 2.1', '0200', '', 1, 'admin', '2014-12-11 04:05:58', NULL, '2014-12-25 17:44:31'),
('00044', '00000000016', 'sepanjang 2.2', '0200', '', 1, 'admin', '2014-12-11 04:06:26', NULL, '2014-12-25 17:44:31'),
('00045', '00000000016', 'sepanjang 2.3', '0200', '', 1, 'admin', '2014-12-11 04:06:47', NULL, '2014-12-25 17:44:31'),
('00046', '00000000017', 'tirto manunggal 3.1', '1300', '', 1, 'admin', '2014-12-11 04:17:20', NULL, NULL),
('00047', '00000000017', 'tirto manunggal 3.2', '1300', '', 1, 'admin', '2014-12-11 04:17:41', NULL, NULL),
('00048', '00000000018', 'TIRTO GONDO MANUNGGAL 2.1', '0200', '', 1, 'admin', '2014-12-11 04:27:52', NULL, '2014-12-25 17:44:31'),
('00049', '00000000018', 'TIRTO GONDO MANUNGGAL 2.2', '0200', '', 1, 'admin', '2014-12-11 04:29:28', 'admin', '2014-12-25 17:44:31'),
('00050', '00000000018', 'TIRTO GONDO MANUNGGAL 3.1', '1300', '', 1, 'admin', '2014-12-11 04:30:02', 'admin', '2014-12-11 04:31:11'),
('00051', '00000000015', 'TIRTO SUCI 2.1', '0200', '', 1, 'admin', '2014-12-11 04:45:16', NULL, '2014-12-25 17:44:31'),
('00052', '00000000015', 'TIRTO SUCI 3.1', '1300', '', 1, 'admin', '2014-12-11 04:45:42', NULL, NULL),
('00053', '00000000021', 'GOTONG ROYONG 3.1', '1300', '', 1, 'admin', '2014-12-11 05:11:39', NULL, NULL),
('00054', '00000000023', 'SUMBER SELADA 2.1', '0200', '', 1, 'admin', '2014-12-11 05:14:37', NULL, '2014-12-25 17:44:31'),
('00055', '00000000023', 'SUMBER SELADA 3.1', '1300', '', 1, 'admin', '2014-12-11 05:14:52', 'admin', '2014-12-24 14:05:23'),
('00056', '00000000020', 'karang baru 2.1', '0200', '', 1, 'admin', '2014-12-11 05:18:09', NULL, '2014-12-25 17:44:31'),
('00057', '00000000024', 'TOEYO ARUM 3.1', '1300', '', 1, 'admin', '2014-12-11 05:18:59', NULL, NULL),
('00059', '00000000026', 'MIFTAHUL ULUM 2.1', '0200', '', 1, 'admin', '2014-12-11 05:22:05', NULL, '2014-12-25 17:44:31'),
('00060', '00000000025', 'TIRTO SARI 1.1', '0100', '', 1, 'admin', '2014-12-11 05:27:20', NULL, '2014-12-25 17:44:55'),
('00061', '00000000025', 'TIRTO SARI 1.2', '0100', '', 1, 'admin', '2014-12-11 05:27:28', 'admin', '2014-12-25 17:44:55'),
('00062', '00000000025', 'TIRTO SARI 1.3', '0100', '', 1, 'admin', '2014-12-11 05:27:45', NULL, '2014-12-25 17:44:55'),
('00063', '00000000026', 'MIFTAHUL ULUM 3.1', '1300', '', 1, 'admin', '2014-12-11 05:27:59', NULL, NULL),
('00064', '00000000027', 'TIRTA SARI 3.1', '1300', '', 1, 'admin', '2014-12-11 05:33:03', NULL, NULL),
('00065', '00000000028', 'JAYA TIRTA 2.1', '0200', '', 1, 'admin', '2014-12-11 05:35:21', NULL, '2014-12-25 17:44:31'),
('00066', '00000000028', 'JAYA TIRTA 2.2', '0200', '', 1, 'admin', '2014-12-11 05:35:40', NULL, '2014-12-25 17:44:31'),
('00067', '00000000028', 'JAYA TIRTA 2.3', '0200', '', 1, 'admin', '2014-12-11 05:35:59', NULL, '2014-12-25 17:44:31'),
('00068', '00000000028', 'JAYA TIRTA 2.4', '0200', '', 1, 'admin', '2014-12-11 05:36:15', NULL, '2014-12-25 17:44:31'),
('00069', '00000000025', 'TIRTO SARI 2.1', '0200', '', 1, 'admin', '2014-12-11 05:36:22', NULL, '2014-12-25 17:44:31'),
('00070', '00000000025', 'TIRTO SARI 1.4', '0100', '', 1, 'admin', '2014-12-11 05:37:21', 'admin', '2014-12-25 17:44:55'),
('00071', '00000000028', 'JAYA TIRTA 3.1', '1300', '', 1, 'admin', '2014-12-11 05:38:38', NULL, NULL),
('00072', '00000000028', 'JAYA TIRTA 3.2', '1300', '', 1, 'admin', '2014-12-11 05:39:01', NULL, NULL),
('00073', '00000000028', 'JAYA TIRTA 4.1', '0400', '', 1, 'admin', '2014-12-11 05:39:30', NULL, '2014-12-25 17:44:11'),
('00074', '00000000028', 'JAYA TIRTA 4.2', '0400', '', 1, 'admin', '2014-12-11 05:39:45', NULL, '2014-12-25 17:44:11'),
('00075', '00000000030', 'MANGGIS KUNING 3.1', '1300', '', 1, 'admin', '2014-12-11 05:40:35', NULL, NULL),
('00076', '00000000029', 'KALIREJO 3.1', '1300', '', 1, 'admin', '2014-12-11 05:42:51', 'admin', '2014-12-11 05:43:21'),
('00077', '00000000012', 'PURWOAGUNG 2.1', '0200', '', 1, 'admin', '2014-12-11 05:45:47', NULL, NULL),
('00078', '00000000012', 'PURWOAGUNG 2.2', '0200', '', 1, 'admin', '2014-12-11 05:46:00', NULL, '2014-12-25 17:44:31'),
('00079', '00000000012', 'PURWOAGUNG 2.3', '0200', '', 1, 'admin', '2014-12-11 05:46:14', NULL, '2014-12-25 17:44:31'),
('00080', '00000000012', 'PURWOAGUNG 2.4', '0200', '', 1, 'admin', '2014-12-11 05:46:33', NULL, '2014-12-25 17:44:31'),
('00081', '00000000012', 'PURWOAGUNG 3.1', '1300', '', 1, 'admin', '2014-12-11 05:46:55', NULL, NULL),
('00082', '00000000012', 'PURWOAGUNG 3.2', '1300', '', 1, 'admin', '2014-12-11 05:47:10', NULL, NULL),
('00083', '00000000012', 'PURWOAGUNG 3.3', '1300', '', 1, 'admin', '2014-12-11 05:47:23', NULL, NULL),
('00084', '00000000012', 'PURWOAGUNG 3.4', '1300', '', 1, 'admin', '2014-12-11 05:47:38', NULL, NULL),
('00085', '00000000012', 'PURWOAGUNG 3.5', '1300', '', 1, 'admin', '2014-12-11 05:47:55', NULL, NULL),
('00086', '00000000033', 'TIRTO REDI 2.1', '0200', '', 1, 'admin', '2014-12-11 06:03:56', NULL, '2014-12-25 17:44:31'),
('00087', '00000000033', 'TIRTO REDI 2.2', '0200', '', 1, 'admin', '2014-12-11 06:04:10', NULL, '2014-12-25 17:44:31'),
('00088', '00000000033', 'TIRTO REDI 3.1', '1300', '', 1, 'admin', '2014-12-11 06:04:33', NULL, NULL),
('00089', '00000000032', 'MOYA ZAM ZAM 3.1', '1300', '', 1, 'admin', '2014-12-11 06:06:44', NULL, NULL),
('00090', '00000000032', 'MOYA ZAM ZAM 3.2', '0300', '', 1, 'admin', '2014-12-11 06:07:00', NULL, NULL),
('00091', '00000000032', 'MOYA ZAM ZAM 3.3', '1300', '', 1, 'admin', '2014-12-11 06:07:09', NULL, NULL),
('00092', '00000000032', 'MOYA ZAM ZAM 3.4', '1300', '', 1, 'admin', '2014-12-11 06:07:24', NULL, NULL),
('00093', '00000000032', 'MOYA ZAM ZAM 3.5', '1300', '', 1, 'admin', '2014-12-11 06:07:39', NULL, NULL),
('00094', '00000000032', 'MOYA ZAM ZAM 4.1', '0400', '', 1, 'admin', '2014-12-11 06:07:51', NULL, '2014-12-25 17:44:11'),
('00095', '00000000031', 'WONOREJO 3.1', '1300', '', 1, 'admin', '2014-12-11 06:09:59', NULL, NULL),
('00096', '00000000036', 'TIRTA AGUNG 6.1', '0600', '', 1, 'admin', '2014-12-11 06:12:45', NULL, '2014-12-25 17:43:46'),
('00097', '00000000034', 'KETAPANG 2.1', '0200', '', 1, 'admin', '2014-12-11 06:14:00', NULL, '2014-12-25 17:44:31'),
('00098', '00000000034', 'KETAPANG 2.2', '0200', '', 1, 'admin', '2014-12-11 06:14:10', NULL, '2014-12-25 17:44:31'),
('00099', '00000000034', 'KETAPANG 2.3', '0200', '', 1, 'admin', '2014-12-11 06:14:20', NULL, '2014-12-25 17:44:31'),
('00100', '00000000034', 'KETAPANG 4.1', '0400', '', 1, 'admin', '2014-12-11 06:14:39', NULL, '2014-12-25 17:44:11'),
('00101', '00000000034', 'KETAPANG 4.2', '0400', '', 1, 'admin', '2014-12-11 06:14:50', NULL, '2014-12-25 17:44:11'),
('00102', '00000000034', 'KETAPANG 5.1', '0400', '', 1, 'admin', '2014-12-11 06:21:05', NULL, '2014-12-25 17:44:11'),
('00103', '00000000034', 'KETAPANG 6.1', '0600', '', 1, 'admin', '2014-12-11 06:22:11', NULL, '2014-12-25 17:43:46'),
('00104', '00000000035', 'TIRTA BAROKAH 2.1', '0200', '', 1, 'admin', '2014-12-11 06:25:59', NULL, '2014-12-25 17:44:31'),
('00105', '00000000035', 'TIRTA BAROKAH 3.1', '1300', '', 1, 'admin', '2014-12-11 06:26:14', NULL, NULL),
('00106', '00000000038', 'SUMBER BENING 2.1', '0200', '', 1, 'admin', '2014-12-11 06:30:40', NULL, '2014-12-25 17:44:31'),
('00107', '00000000039', 'TIRTO MULYO 2.1', '0200', '', 1, 'admin', '2014-12-11 06:34:28', NULL, '2014-12-25 17:44:31'),
('00108', '00000000037', 'SEDYO UTOMO 3.1', '0300', '', 1, 'admin', '2014-12-11 06:36:06', NULL, NULL),
('00109', '00000000040', 'KUDUNG MAKMUR 2.1', '0200', '', 1, 'admin', '2014-12-11 06:51:56', NULL, '2014-12-25 17:44:31'),
('00110', '00000000040', 'KUDUNG MAKMUR 2.2', '0200', '', 1, 'admin', '2014-12-11 06:53:02', 'admin', '2014-12-25 17:44:31'),
('00111', '00000000041', 'TIRTO ARUM 4.1', '0400', '', 1, 'admin', '2014-12-11 06:54:08', 'admin', '2014-12-25 17:44:11'),
('00112', '00000000042', 'TIRTA ABADI 2.1', '0200', '', 1, 'admin', '2014-12-11 07:25:40', NULL, '2014-12-25 17:44:31'),
('00113', '00000000042', 'TIRTA ABADI 2.2', '0200', '', 1, 'admin', '2014-12-11 07:26:00', NULL, '2014-12-25 17:44:31'),
('00114', '00000000042', 'TIRTA ABADI 2.3', '0200', '', 1, 'admin', '2014-12-11 07:26:34', NULL, '2014-12-25 17:44:31'),
('00115', '00000000042', 'TIRTA ABADI 2.4', '0200', '', 1, 'admin', '2014-12-11 07:26:42', NULL, '2014-12-25 17:44:31'),
('00116', '00000000042', 'TIRTA ABADI 2.5', '0200', '', 1, 'admin', '2014-12-11 07:26:51', NULL, '2014-12-25 17:44:31'),
('00117', '00000000042', 'TIRTA ABADI 1.1', '0100', '', 1, 'admin', '2014-12-11 07:27:07', NULL, '2014-12-25 17:44:55'),
('00118', '00000000043', 'TIRTO ARUM 3.1', '1300', '', 1, 'admin', '2014-12-11 07:47:42', NULL, NULL),
('00119', '00000000044', 'SAS(SILIRAGUNG AIR SEGAR 2.1', '0200', '', 1, 'admin', '2014-12-11 07:51:14', NULL, '2014-12-25 17:44:31'),
('00120', '00000000044', 'SAS(SILIRAGUNG AIR SEGA 2.2', '0200', '', 1, 'admin', '2014-12-11 07:51:26', 'admin', '2014-12-25 17:44:31'),
('00121', '00000000044', 'SAS(SILIRAGUNG AIR SEGA 2.3', '0200', '', 1, 'admin', '2014-12-11 07:51:39', 'admin', '2014-12-25 17:44:31'),
('00122', '00000000044', 'SAS(SILIRAGUNG AIR SEGA 3.1', '1300', '', 1, 'admin', '2014-12-11 07:51:54', 'admin', '2014-12-11 08:01:58'),
('00123', '00000000044', 'SAS(SILIRAGUNG AIR SEGA 3.2', '1300', '', 1, 'admin', '2014-12-11 07:52:20', 'admin', '2014-12-11 08:02:05'),
('00124', '00000000044', 'SAS(SILIRAGUNG AIR SEGA 3.3', '1300', '', 1, 'admin', '2014-12-11 07:52:32', 'admin', '2014-12-11 08:02:14'),
('00125', '00000000044', 'SAS(SILIRAGUNG AIR SEGA 3.4', '1300', '', 1, 'admin', '2014-12-11 07:52:46', 'admin', '2014-12-11 08:02:20'),
('00126', '00000000044', 'SAS(SILIRAGUNG AIR SEGA 3.5', '1300', '', 1, 'admin', '2014-12-11 07:52:56', 'admin', '2014-12-11 08:02:27'),
('00127', '00000000046', 'SUMBER LUNGGUN 3.1', '1300', '', 1, 'admin', '2014-12-11 08:04:09', NULL, NULL),
('00128', '00000000047', 'SUMBER ARUM 3.1', '1300', '', 1, 'admin', '2014-12-11 08:05:54', NULL, NULL),
('00129', '00000000047', 'SUMBER ARUM 3.2', '1300', '', 1, 'admin', '2014-12-11 08:06:06', NULL, NULL),
('00130', '00000000047', 'SUMBER ARUM 3.3', '1300', '', 1, 'admin', '2014-12-11 08:06:18', NULL, NULL),
('00131', '00000000048', 'SARI TIRTO 3.1', '1300', '', 1, 'admin', '2014-12-11 08:09:19', NULL, NULL),
('00132', '00000000048', 'SARI TIRTO 3.2', '1300', '', 1, 'admin', '2014-12-11 08:09:32', NULL, NULL),
('00133', '00000000048', 'SARI TIRTO 3.3', '1300', '', 1, 'admin', '2014-12-11 08:10:08', NULL, NULL),
('00134', '00000000048', 'SARI TIRTO 3.4', '1300', '', 1, 'admin', '2014-12-11 08:11:15', NULL, NULL),
('00135', '00000000045', 'TIRTA MANDIRI siliragung 2.1', '0200', '', 1, 'admin', '2014-12-11 08:12:34', NULL, '2014-12-25 17:44:31'),
('00136', '00000000045', 'TIRTA MANDIRI siliragung 2.2', '0200', '', 1, 'admin', '2014-12-11 08:12:44', NULL, '2014-12-25 17:44:31'),
('00137', '00000000045', 'TIRTA MANDIRI siliragung 2.3', '0200', '', 1, 'admin', '2014-12-11 08:12:57', NULL, '2014-12-25 17:44:31'),
('00138', '00000000045', 'TIRTA MANDIRI siliragung 2.4', '0200', '', 1, 'admin', '2014-12-11 08:13:12', NULL, '2014-12-25 17:44:31'),
('00139', '00000000045', 'TIRTA MANDIRI siliragung 2.5', '0200', '', 1, 'admin', '2014-12-11 08:13:22', 'admin', '2014-12-25 17:44:31'),
('00140', '00000000045', 'TIRTA MANDIRI siliragung 2.6', '0200', '', 1, 'admin', '2014-12-11 08:13:33', NULL, '2014-12-25 17:44:31'),
('00141', '00000000045', 'TIRTA MANDIRI siliragung 2.7', '0200', '', 1, 'admin', '2014-12-11 08:13:47', NULL, '2014-12-25 17:44:31'),
('00142', '00000000045', 'TIRTA MANDIRI siliragung 2.8', '0200', '', 1, 'admin', '2014-12-11 08:14:00', NULL, '2014-12-25 17:44:31'),
('00143', '00000000045', 'TIRTA MANDIRI siliragung 2.9', '0200', '', 1, 'admin', '2014-12-11 08:14:19', NULL, '2014-12-25 17:44:31'),
('00144', '00000000045', 'TIRTA MANDIRI siliragung 2.10', '0200', '', 1, 'admin', '2014-12-11 08:14:32', NULL, '2014-12-25 17:44:31'),
('00145', '00000000045', 'TIRTA MANDIRI siliragung 2.11', '0200', '', 1, 'admin', '2014-12-11 08:14:40', NULL, '2014-12-25 17:44:31'),
('00146', '00000000007', 'pipa 3.3', '1300', '', 1, 'admin', '2014-12-22 15:57:12', NULL, NULL),
('00147', '00000000007', 'pipa 3.4', '0100', '', 1, 'admin', '2014-12-22 15:57:32', 'admin', '2020-10-16 03:32:40'),
('00148', '00000000026', 'MIFTAHUL ULUM 2.2', '0200', '-', 1, 'admin', '2014-12-23 14:48:23', 'admin', '2014-12-25 17:44:31'),
('00149', '00000000019', 'HIPPAM TIRTO LANGGENG 2.1', '0200', '', 1, 'admin', '2014-12-24 13:52:22', NULL, '2014-12-25 17:44:31'),
('00150', '00000000019', 'HIPPAM TIRTO LANGGENG 2.2', '0200', '', 1, 'admin', '2014-12-24 13:52:34', NULL, '2014-12-25 17:44:31'),
('00151', '00000000019', 'HIPPAM TIRTO LANGGENG 2.3', '0200', '', 1, 'admin', '2014-12-24 13:52:47', NULL, '2014-12-25 17:44:31'),
('00152', '00000000014', 'HIPPAM TIRTO SARI benculuk 3.1', '1300', '', 1, 'admin', '2014-12-24 13:56:51', NULL, NULL),
('00153', '00000000014', 'HIPPAM TIRTO SARI benculuk 3.2', '1300', '', 1, 'admin', '2014-12-24 13:57:05', NULL, NULL),
('00154', '00000000014', 'HIPPAM TIRTO SARI benculuk 3.3', '1300', '', 1, 'admin', '2014-12-24 13:57:14', NULL, NULL),
('00155', '00000000014', 'HIPPAM TIRTO SARI benculuk 3.4', '1300', '', 1, 'admin', '2014-12-24 13:57:28', NULL, NULL),
('00156', '00000000014', 'HIPPAM TIRTO SARI benculuk 3.5', '1300', '', 1, 'admin', '2014-12-24 13:57:39', NULL, NULL),
('00157', '00000000014', 'HIPPAM TIRTO SARI benculuk 3.6', '1300', '', 1, 'admin', '2014-12-24 13:57:53', NULL, NULL),
('00158', '00000000015', 'TIRTO SUCI 2.2', '0200', '', 1, 'admin', '2014-12-24 14:01:20', NULL, '2014-12-25 17:44:31'),
('00159', '00000000022', 'TIRTA BUMI 3.1', '1300', '', 1, 'admin', '2014-12-24 20:50:50', NULL, NULL),
('00160', '00000000041', 'TIRTO ARUM 4.2', '0400', '', 1, 'admin', '2014-12-24 21:53:18', NULL, '2014-12-25 17:44:11'),
('00161', '00000000041', 'TIRTO ARUM 4.3', '0400', '', 1, 'admin', '2014-12-24 21:53:34', NULL, '2014-12-25 17:44:11'),
('00162', '00000000041', 'TIRTO ARUM 4.4', '0400', '', 1, 'admin', '2014-12-24 21:53:41', NULL, '2014-12-25 17:44:11'),
('00163', '00000000032', 'MOYA ZAM ZAM 3.6', '1300', '', 1, 'admin', '2014-12-24 22:06:43', NULL, NULL),
('00164', '00000000032', 'MOYA ZAM ZAM 4.2', '0400', '', 1, 'admin', '2014-12-24 22:08:02', NULL, '2014-12-25 17:44:11'),
('00165', '00000000009', 'GLAGAHAGUNG 3.1', '1300', '', 1, 'admin', '2014-12-24 22:14:15', NULL, NULL),
('00166', '00000000010', 'sumber sehat pipa 2.8', '0200', '', 1, 'admin', '2014-12-24 22:15:45', NULL, '2014-12-25 17:44:31'),
('00167', '00000000010', 'sumber sehat pipa 2.9', '0200', '', 1, 'admin', '2014-12-24 22:15:53', NULL, '2014-12-25 17:44:31'),
('00168', '00000000016', 'sepanjang 2.4', '0200', '', 1, 'admin', '2014-12-24 22:29:27', NULL, '2014-12-25 17:44:31'),
('00169', '00000000015', 'TIRTO SUCI 2.3', '0200', '', 1, 'admin', '2014-12-25 14:59:27', NULL, '2014-12-25 17:44:31'),
('00170', '00000000015', 'TIRTO SUCI 2.4', '0200', '', 1, 'admin', '2014-12-25 14:59:36', NULL, '2014-12-25 17:44:31'),
('00171', '00000000015', 'TIRTO SUCI 2.5', '0200', '', 1, 'admin', '2014-12-25 14:59:44', NULL, '2014-12-25 17:44:31'),
('00172', '00000000015', 'TIRTO SUCI 2.6', '0200', '', 1, 'admin', '2014-12-25 14:59:55', NULL, '2014-12-25 17:44:31'),
('00173', '00000000015', 'TIRTO SUCI 2.7', '0200', '', 1, 'admin', '2014-12-25 15:00:03', NULL, '2014-12-25 17:44:31'),
('00174', '00000000015', 'TIRTO SUCI 2.8', '0200', '', 1, 'admin', '2014-12-25 15:00:12', NULL, '2014-12-25 17:44:31'),
('00175', '00000000008', 'SUMBERAGUNG 3.3', '1300', '', 1, 'admin', '2014-12-25 15:07:26', NULL, NULL),
('00176', '00000000012', 'PURWOAGUNG 2.5', '0200', '', 1, 'admin', '2014-12-25 15:16:20', NULL, '2014-12-25 17:44:31'),
('00177', '00000000012', 'PURWOAGUNG 3.6', '1300', '', 1, 'admin', '2014-12-25 15:17:43', NULL, NULL),
('00178', '00000000007', 'pipa 3.4', '0100', '', 1, 'admin', '2020-10-24 05:05:48', NULL, NULL),
('00179', '00000000007', 'pipa 3.4', '0100', '', 1, 'admin', '2020-10-24 08:07:18', NULL, NULL),
('00180', '00000000007', 'pipa 3.4', '0100', '', 1, 'admin', '2020-10-26 04:21:14', NULL, NULL),
('00181', '00000000007', 'pipa 3.4', '0100', '', 1, 'admin', '2020-11-03 03:54:38', NULL, NULL),
('00182', '00000000007', 'pipa 3.4', '0100', '', 1, 'admin', '2020-11-03 03:55:16', NULL, NULL),
('00183', '00000000007', 'pipa 3.4', '0100', '', 1, 'admin', '2020-11-03 03:55:27', NULL, NULL),
('00184', '00000000007', 'pipa 3.4', '0100', '', 1, 'admin', '2020-11-03 03:55:48', NULL, NULL),
('00185', '00000000007', 'pipa 3.4', '0100', '', 1, 'admin', '2020-11-03 04:10:03', NULL, NULL),
('00186', '00000000007', 'pipa 3.4', '0100', '', 1, 'admin', '2020-11-03 04:10:31', NULL, NULL),
('00187', '00000000007', 'pipa 3.4', '0100', '', 1, 'admin', '2020-11-03 04:29:35', NULL, NULL),
('00188', '00000000007', 'ds', '1100', '', 1, 'admin', '2020-11-09 07:19:59', 'admin', '2020-11-09 07:20:52');

--
-- Triggers `pipa`
--
DELIMITER //
CREATE TRIGGER `pipa_crt_date` BEFORE INSERT ON `pipa`
 FOR EACH ROW BEGIN
        SET NEW.crt_date = CURRENT_TIMESTAMP();
END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `pipa_upd_date` BEFORE UPDATE ON `pipa`
 FOR EACH ROW BEGIN
        SET NEW.upd_date = CURRENT_TIMESTAMP();
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pipa_jenis`
--

CREATE TABLE IF NOT EXISTS `pipa_jenis` (
  `id` varchar(4) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `bahan` enum('GI','PVC') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `ukuran` varchar(5) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pipa_jenis`
--

INSERT INTO `pipa_jenis` (`id`, `bahan`, `ukuran`) VALUES
('0075', 'PVC', '3/4'),
('0100', 'PVC', '1'),
('0150', 'PVC', '1.5'),
('0200', 'PVC', '2'),
('0300', 'PVC', '3'),
('0400', 'PVC', '4'),
('0600', 'PVC', '6'),
('1075', 'GI', '3/4'),
('1100', 'GI', '1'),
('1150', 'GI', '1.5'),
('1200', 'GI', '2'),
('1300', 'GI', '3'),
('1400', 'GI', '4'),
('1600', 'GI', '6');

-- --------------------------------------------------------

--
-- Table structure for table `pipa_koordinat`
--

CREATE TABLE IF NOT EXISTS `pipa_koordinat` (
  `id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `pipa_id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `latitude` double(10,6) NOT NULL,
  `longitude` double(10,6) NOT NULL,
  `crt` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `crt_date` timestamp NULL DEFAULT NULL,
  `upd` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `upd_date` timestamp NULL DEFAULT NULL,
  `id_urut` varchar(20) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `pipa_koordinat`
--

INSERT INTO `pipa_koordinat` (`id`, `pipa_id`, `latitude`, `longitude`, `crt`, `crt_date`, `upd`, `upd_date`, `id_urut`) VALUES
('00000000191', '00046', -8.257652, 114.072661, 'admin', NULL, NULL, NULL, '00000000191'),
('00000000192', '00046', -8.258727, 114.071958, 'admin', NULL, NULL, NULL, '00000000192'),
('00000000193', '00046', -8.261950, 114.072019, 'admin', NULL, NULL, NULL, '00000000193'),
('00000000194', '00046', -8.265722, 114.071300, 'admin', NULL, NULL, NULL, '00000000194'),
('00000000195', '00046', -8.266734, 114.071120, 'admin', NULL, NULL, NULL, '00000000195'),
('00000000196', '00046', -8.268572, 114.070752, 'admin', NULL, NULL, NULL, '00000000196'),
('00000000197', '00047', -8.265722, 114.071300, 'admin', NULL, NULL, NULL, '00000000197'),
('00000000198', '00047', -8.266598, 114.070128, 'admin', NULL, NULL, NULL, '00000000198'),
('00000000199', '00047', -8.268930, 114.067887, 'admin', NULL, NULL, NULL, '00000000199'),
('00000000255', '00053', -8.380774, 114.195878, 'admin', NULL, NULL, NULL, '00000000255'),
('00000000256', '00053', -8.382316, 114.196367, 'admin', NULL, NULL, NULL, '00000000256'),
('00000000257', '00053', -8.382071, 114.201777, 'admin', NULL, NULL, NULL, '00000000257'),
('00000000258', '00053', -8.383797, 114.201935, 'admin', NULL, NULL, NULL, '00000000258'),
('00000000259', '00053', -8.383403, 114.207371, 'admin', NULL, NULL, NULL, '00000000259'),
('00000000260', '00053', -8.383866, 114.209028, 'admin', NULL, NULL, NULL, '00000000260'),
('00000000261', '00053', -8.384069, 114.209480, 'admin', NULL, NULL, NULL, '00000000261'),
('00000000325', '00056', -8.023296, 114.352632, 'admin', NULL, NULL, NULL, '00000000325'),
('00000000326', '00056', -8.023113, 114.353065, 'admin', NULL, NULL, NULL, '00000000326'),
('00000000327', '00056', -8.022909, 114.353723, 'admin', NULL, NULL, NULL, '00000000327'),
('00000000328', '00056', -8.022487, 114.354824, 'admin', NULL, NULL, NULL, '00000000328'),
('00000000329', '00056', -8.021982, 114.355731, 'admin', NULL, NULL, NULL, '00000000329'),
('00000000330', '00056', -8.021871, 114.355921, 'admin', NULL, NULL, NULL, '00000000330'),
('00000000331', '00056', -8.021695, 114.356452, 'admin', NULL, NULL, NULL, '00000000331'),
('00000000332', '00056', -8.021348, 114.357926, 'admin', NULL, NULL, NULL, '00000000332'),
('00000000333', '00056', -8.020153, 114.359541, 'admin', NULL, NULL, NULL, '00000000333'),
('00000000334', '00056', -8.019652, 114.360436, 'admin', NULL, NULL, NULL, '00000000334'),
('00000000335', '00056', -8.019376, 114.361064, 'admin', NULL, NULL, NULL, '00000000335'),
('00000000336', '00056', -8.018685, 114.362225, 'admin', NULL, NULL, NULL, '00000000336'),
('00000000337', '00056', -8.018322, 114.363012, 'admin', NULL, NULL, NULL, '00000000337'),
('00000000338', '00056', -8.018231, 114.363601, 'admin', NULL, NULL, NULL, '00000000338'),
('00000000339', '00056', -8.018037, 114.364359, 'admin', NULL, NULL, NULL, '00000000339'),
('00000000340', '00056', -8.017704, 114.365632, 'admin', NULL, NULL, NULL, '00000000340'),
('00000000341', '00056', -8.017477, 114.366175, 'admin', NULL, NULL, NULL, '00000000341'),
('00000000342', '00056', -8.016715, 114.368437, 'admin', NULL, NULL, NULL, '00000000342'),
('00000000343', '00056', -8.016082, 114.369388, 'admin', NULL, NULL, NULL, '00000000343'),
('00000000344', '00056', -8.014746, 114.372564, 'admin', NULL, NULL, NULL, '00000000344'),
('00000000639', '00095', -8.247527, 113.982206, 'admin', NULL, NULL, NULL, '00000000639'),
('00000000640', '00095', -8.246820, 113.982728, 'admin', NULL, NULL, NULL, '00000000640'),
('00000000641', '00095', -8.250159, 113.981161, 'admin', NULL, NULL, NULL, '00000000641'),
('00000000642', '00095', -8.250631, 113.981511, 'admin', NULL, NULL, NULL, '00000000642'),
('00000000643', '00095', -8.250799, 113.982418, 'admin', NULL, NULL, NULL, '00000000643'),
('00000000644', '00095', -8.252802, 113.982214, 'admin', NULL, NULL, NULL, '00000000644'),
('00000000645', '00095', -8.253906, 113.982361, 'admin', NULL, NULL, NULL, '00000000645'),
('00000000646', '00095', -8.268448, 113.982197, 'admin', NULL, NULL, NULL, '00000000646'),
('00000000647', '00095', -8.268627, 113.987287, 'admin', NULL, NULL, NULL, '00000000647'),
('00000000648', '00095', -8.283160, 113.987771, 'admin', NULL, NULL, NULL, '00000000648'),
('00000000649', '00095', -8.284803, 113.987027, 'admin', NULL, NULL, NULL, '00000000649'),
('00000000650', '00095', -8.284743, 113.986574, 'admin', NULL, NULL, NULL, '00000000650'),
('00000000651', '00095', -8.284789, 113.985989, 'admin', NULL, NULL, NULL, '00000000651'),
('00000000652', '00095', -8.288710, 113.985679, 'admin', NULL, NULL, NULL, '00000000652'),
('00000000653', '00096', -8.157509, 114.321129, 'admin', NULL, NULL, NULL, '00000000653'),
('00000000654', '00096', -8.157538, 114.321418, 'admin', NULL, NULL, NULL, '00000000654'),
('00000000655', '00096', -8.157965, 114.321956, 'admin', NULL, NULL, NULL, '00000000655'),
('00000000656', '00096', -8.158292, 114.322425, 'admin', NULL, NULL, NULL, '00000000656'),
('00000000657', '00096', -8.158323, 114.322580, 'admin', NULL, NULL, NULL, '00000000657'),
('00000000658', '00096', -8.158309, 114.322961, 'admin', NULL, NULL, NULL, '00000000658'),
('00000000659', '00096', -8.158411, 114.323241, 'admin', NULL, NULL, NULL, '00000000659'),
('00000000660', '00096', -8.158413, 114.323416, 'admin', NULL, NULL, NULL, '00000000660'),
('00000000661', '00096', -8.158382, 114.323551, 'admin', NULL, NULL, NULL, '00000000661'),
('00000000662', '00096', -8.158274, 114.323680, 'admin', NULL, NULL, NULL, '00000000662'),
('00000000663', '00096', -8.158643, 114.323895, 'admin', NULL, NULL, NULL, '00000000663'),
('00000000664', '00096', -8.158954, 114.324149, 'admin', NULL, NULL, NULL, '00000000664'),
('00000000665', '00096', -8.159036, 114.324163, 'admin', NULL, NULL, NULL, '00000000665'),
('00000000666', '00096', -8.159133, 114.324223, 'admin', NULL, NULL, NULL, '00000000666'),
('00000000667', '00096', -8.159385, 114.324507, 'admin', NULL, NULL, NULL, '00000000667'),
('00000000668', '00096', -8.159439, 114.324650, 'admin', NULL, NULL, NULL, '00000000668'),
('00000000669', '00096', -8.159489, 114.324705, 'admin', NULL, NULL, NULL, '00000000669'),
('00000000670', '00096', -8.159812, 114.324823, 'admin', NULL, NULL, NULL, '00000000670'),
('00000000671', '00096', -8.160035, 114.324785, 'admin', NULL, NULL, NULL, '00000000671'),
('00000000672', '00096', -8.160167, 114.324773, 'admin', NULL, NULL, NULL, '00000000672'),
('00000000673', '00096', -8.160203, 114.324769, 'admin', NULL, NULL, NULL, '00000000673'),
('00000000674', '00096', -8.160357, 114.324902, 'admin', NULL, NULL, NULL, '00000000674'),
('00000000675', '00096', -8.162622, 114.328458, 'admin', NULL, NULL, NULL, '00000000675'),
('00000001292', '00059', -8.026743, 114.408840, 'admin', NULL, NULL, NULL, '00000001292'),
('00000001293', '00059', -8.026970, 114.410951, 'admin', NULL, NULL, NULL, '00000001293'),
('00000001294', '00148', -8.025591, 114.413896, 'admin', NULL, NULL, NULL, '00000001294'),
('00000001295', '00148', -8.025878, 114.412606, 'admin', NULL, NULL, NULL, '00000001295'),
('00000001296', '00148', -8.027177, 114.413177, 'admin', NULL, NULL, NULL, '00000001296'),
('00000001297', '00063', -8.024816, 114.414199, 'admin', NULL, NULL, NULL, '00000001297'),
('00000001298', '00063', -8.025591, 114.413896, 'admin', NULL, NULL, NULL, '00000001298'),
('00000001299', '00063', -8.026606, 114.414715, 'admin', NULL, NULL, NULL, '00000001299'),
('00000001300', '00063', -8.026861, 114.414054, 'admin', NULL, NULL, NULL, '00000001300'),
('00000001301', '00063', -8.027105, 114.414028, 'admin', NULL, NULL, NULL, '00000001301'),
('00000001302', '00063', -8.027177, 114.413177, 'admin', NULL, NULL, NULL, '00000001302'),
('00000001303', '00063', -8.027249, 114.412321, 'admin', NULL, NULL, NULL, '00000001303'),
('00000001304', '00063', -8.027222, 114.412059, 'admin', NULL, NULL, NULL, '00000001304'),
('00000001305', '00063', -8.026970, 114.410951, 'admin', NULL, NULL, NULL, '00000001305'),
('00000001306', '00149', -8.447284, 114.263592, 'admin', NULL, NULL, NULL, '00000001306'),
('00000001307', '00149', -8.446383, 114.267745, 'admin', NULL, NULL, NULL, '00000001307'),
('00000001308', '00149', -8.445907, 114.271565, 'admin', NULL, NULL, NULL, '00000001308'),
('00000001309', '00149', -8.446154, 114.275280, 'admin', NULL, NULL, NULL, '00000001309'),
('00000001310', '00150', -8.445192, 114.269615, 'admin', NULL, NULL, NULL, '00000001310'),
('00000001311', '00150', -8.444982, 114.271682, 'admin', NULL, NULL, NULL, '00000001311'),
('00000001312', '00150', -8.445907, 114.271565, 'admin', NULL, NULL, NULL, '00000001312'),
('00000001313', '00150', -8.447201, 114.271622, 'admin', NULL, NULL, NULL, '00000001313'),
('00000001314', '00150', -8.447797, 114.271692, 'admin', NULL, NULL, NULL, '00000001314'),
('00000001315', '00150', -8.448987, 114.265839, 'admin', NULL, NULL, NULL, '00000001315'),
('00000001316', '00150', -8.453028, 114.264279, 'admin', NULL, NULL, NULL, '00000001316'),
('00000001317', '00150', -8.455489, 114.263336, 'admin', NULL, NULL, NULL, '00000001317'),
('00000001318', '00150', -8.456442, 114.265386, 'admin', NULL, NULL, NULL, '00000001318'),
('00000001319', '00151', -8.453028, 114.264279, 'admin', NULL, NULL, NULL, '00000001319'),
('00000001320', '00151', -8.454037, 114.268003, 'admin', NULL, NULL, NULL, '00000001320'),
('00000001321', '00151', -8.454976, 114.267798, 'admin', NULL, NULL, NULL, '00000001321'),
('00000001322', '00152', -8.424974, 114.232159, 'admin', NULL, NULL, NULL, '00000001322'),
('00000001323', '00152', -8.425467, 114.232484, 'admin', NULL, NULL, NULL, '00000001323'),
('00000001324', '00153', -8.425046, 114.233510, 'admin', NULL, NULL, NULL, '00000001324'),
('00000001325', '00153', -8.425390, 114.233707, 'admin', NULL, NULL, NULL, '00000001325'),
('00000001326', '00153', -8.424754, 114.235705, 'admin', NULL, NULL, NULL, '00000001326'),
('00000001327', '00153', -8.426321, 114.236748, 'admin', NULL, NULL, NULL, '00000001327'),
('00000001328', '00153', -8.425787, 114.237451, 'admin', NULL, NULL, NULL, '00000001328'),
('00000001329', '00153', -8.425883, 114.237716, 'admin', NULL, NULL, NULL, '00000001329'),
('00000001330', '00154', -8.426321, 114.236748, 'admin', NULL, NULL, NULL, '00000001330'),
('00000001331', '00154', -8.427365, 114.237482, 'admin', NULL, NULL, NULL, '00000001331'),
('00000001332', '00154', -8.426800, 114.237816, 'admin', NULL, NULL, NULL, '00000001332'),
('00000001333', '00155', -8.426752, 114.231442, 'admin', NULL, NULL, NULL, '00000001333'),
('00000001334', '00155', -8.425580, 114.232199, 'admin', NULL, NULL, NULL, '00000001334'),
('00000001335', '00155', -8.425467, 114.232484, 'admin', NULL, NULL, NULL, '00000001335'),
('00000001336', '00155', -8.424525, 114.234683, 'admin', NULL, NULL, NULL, '00000001336'),
('00000001337', '00156', -8.427107, 114.232055, 'admin', NULL, NULL, NULL, '00000001337'),
('00000001338', '00156', -8.427400, 114.232608, 'admin', NULL, NULL, NULL, '00000001338'),
('00000001339', '00156', -8.427576, 114.232533, 'admin', NULL, NULL, NULL, '00000001339'),
('00000001340', '00156', -8.427980, 114.233067, 'admin', NULL, NULL, NULL, '00000001340'),
('00000001341', '00156', -8.427552, 114.233480, 'admin', NULL, NULL, NULL, '00000001341'),
('00000001342', '00157', -8.427552, 114.233480, 'admin', NULL, NULL, NULL, '00000001342'),
('00000001343', '00157', -8.428590, 114.234598, 'admin', NULL, NULL, NULL, '00000001343'),
('00000001344', '00157', -8.427639, 114.235597, 'admin', NULL, NULL, NULL, '00000001344'),
('00000001355', '00054', -8.187284, 114.320301, 'admin', NULL, NULL, NULL, '00000001355'),
('00000001356', '00054', -8.187939, 114.320852, 'admin', NULL, NULL, NULL, '00000001356'),
('00000001357', '00054', -8.188260, 114.321185, 'admin', NULL, NULL, NULL, '00000001357'),
('00000001358', '00054', -8.188644, 114.321543, 'admin', NULL, NULL, NULL, '00000001358'),
('00000001359', '00054', -8.188853, 114.321883, 'admin', NULL, NULL, NULL, '00000001359'),
('00000001360', '00054', -8.189091, 114.322332, 'admin', NULL, NULL, NULL, '00000001360'),
('00000001361', '00054', -8.189380, 114.322771, 'admin', NULL, NULL, NULL, '00000001361'),
('00000001362', '00054', -8.189409, 114.322915, 'admin', NULL, NULL, NULL, '00000001362'),
('00000001363', '00054', -8.189442, 114.323337, 'admin', NULL, NULL, NULL, '00000001363'),
('00000001364', '00054', -8.189716, 114.324360, 'admin', NULL, NULL, NULL, '00000001364'),
('00000001365', '00054', -8.189887, 114.324503, 'admin', NULL, NULL, NULL, '00000001365'),
('00000001366', '00054', -8.189985, 114.324530, 'admin', NULL, NULL, NULL, '00000001366'),
('00000001367', '00054', -8.190361, 114.324554, 'admin', NULL, NULL, NULL, '00000001367'),
('00000001368', '00054', -8.190484, 114.324622, 'admin', NULL, NULL, NULL, '00000001368'),
('00000001369', '00054', -8.190680, 114.324869, 'admin', NULL, NULL, NULL, '00000001369'),
('00000001370', '00054', -8.191368, 114.324461, 'admin', NULL, NULL, NULL, '00000001370'),
('00000001371', '00054', -8.191758, 114.324378, 'admin', NULL, NULL, NULL, '00000001371'),
('00000001372', '00054', -8.192247, 114.324161, 'admin', NULL, NULL, NULL, '00000001372'),
('00000001373', '00054', -8.192497, 114.324010, 'admin', NULL, NULL, NULL, '00000001373'),
('00000001374', '00054', -8.192731, 114.323932, 'admin', NULL, NULL, NULL, '00000001374'),
('00000001375', '00054', -8.192914, 114.323868, 'admin', NULL, NULL, NULL, '00000001375'),
('00000001376', '00054', -8.193650, 114.323474, 'admin', NULL, NULL, NULL, '00000001376'),
('00000001377', '00055', -8.181099, 114.306483, 'admin', NULL, NULL, NULL, '00000001377'),
('00000001378', '00055', -8.181154, 114.307262, 'admin', NULL, NULL, NULL, '00000001378'),
('00000001379', '00055', -8.180573, 114.307499, 'admin', NULL, NULL, NULL, '00000001379'),
('00000001380', '00055', -8.180400, 114.307655, 'admin', NULL, NULL, NULL, '00000001380'),
('00000001381', '00055', -8.179938, 114.307864, 'admin', NULL, NULL, NULL, '00000001381'),
('00000001382', '00055', -8.180328, 114.308889, 'admin', NULL, NULL, NULL, '00000001382'),
('00000001383', '00055', -8.180585, 114.309536, 'admin', NULL, NULL, NULL, '00000001383'),
('00000001384', '00055', -8.180704, 114.309820, 'admin', NULL, NULL, NULL, '00000001384'),
('00000001385', '00055', -8.180835, 114.310216, 'admin', NULL, NULL, NULL, '00000001385'),
('00000001386', '00055', -8.180938, 114.310416, 'admin', NULL, NULL, NULL, '00000001386'),
('00000001387', '00055', -8.180994, 114.310608, 'admin', NULL, NULL, NULL, '00000001387'),
('00000001388', '00055', -8.181189, 114.311926, 'admin', NULL, NULL, NULL, '00000001388'),
('00000001389', '00055', -8.181691, 114.312621, 'admin', NULL, NULL, NULL, '00000001389'),
('00000001390', '00055', -8.182055, 114.313025, 'admin', NULL, NULL, NULL, '00000001390'),
('00000001391', '00055', -8.182124, 114.313231, 'admin', NULL, NULL, NULL, '00000001391'),
('00000001392', '00055', -8.182406, 114.313778, 'admin', NULL, NULL, NULL, '00000001392'),
('00000001393', '00055', -8.182496, 114.314022, 'admin', NULL, NULL, NULL, '00000001393'),
('00000001394', '00055', -8.182536, 114.314209, 'admin', NULL, NULL, NULL, '00000001394'),
('00000001395', '00055', -8.182649, 114.314450, 'admin', NULL, NULL, NULL, '00000001395'),
('00000001396', '00055', -8.182806, 114.315001, 'admin', NULL, NULL, NULL, '00000001396'),
('00000001397', '00055', -8.182908, 114.315399, 'admin', NULL, NULL, NULL, '00000001397'),
('00000001398', '00055', -8.182918, 114.315812, 'admin', NULL, NULL, NULL, '00000001398'),
('00000001399', '00055', -8.183066, 114.316181, 'admin', NULL, NULL, NULL, '00000001399'),
('00000001400', '00055', -8.183348, 114.316611, 'admin', NULL, NULL, NULL, '00000001400'),
('00000001401', '00055', -8.183425, 114.316766, 'admin', NULL, NULL, NULL, '00000001401'),
('00000001402', '00055', -8.183579, 114.316962, 'admin', NULL, NULL, NULL, '00000001402'),
('00000001403', '00055', -8.183712, 114.317329, 'admin', NULL, NULL, NULL, '00000001403'),
('00000001404', '00055', -8.183890, 114.317480, 'admin', NULL, NULL, NULL, '00000001404'),
('00000001405', '00055', -8.184064, 114.317588, 'admin', NULL, NULL, NULL, '00000001405'),
('00000001406', '00055', -8.184383, 114.318105, 'admin', NULL, NULL, NULL, '00000001406'),
('00000001407', '00055', -8.185026, 114.319235, 'admin', NULL, NULL, NULL, '00000001407'),
('00000001408', '00055', -8.185112, 114.319302, 'admin', NULL, NULL, NULL, '00000001408'),
('00000001409', '00055', -8.185545, 114.319349, 'admin', NULL, NULL, NULL, '00000001409'),
('00000001410', '00055', -8.186083, 114.319503, 'admin', NULL, NULL, NULL, '00000001410'),
('00000001411', '00055', -8.186396, 114.319417, 'admin', NULL, NULL, NULL, '00000001411'),
('00000001412', '00055', -8.186705, 114.319517, 'admin', NULL, NULL, NULL, '00000001412'),
('00000001413', '00055', -8.186887, 114.319514, 'admin', NULL, NULL, NULL, '00000001413'),
('00000001414', '00055', -8.186973, 114.319636, 'admin', NULL, NULL, NULL, '00000001414'),
('00000001415', '00055', -8.187118, 114.319972, 'admin', NULL, NULL, NULL, '00000001415'),
('00000001416', '00055', -8.187284, 114.320301, 'admin', NULL, NULL, NULL, '00000001416'),
('00000001417', '00159', -8.182407, 114.317260, 'admin', NULL, NULL, NULL, '00000001417'),
('00000001418', '00159', -8.182778, 114.318024, 'admin', NULL, NULL, NULL, '00000001418'),
('00000001419', '00159', -8.182444, 114.318736, 'admin', NULL, NULL, NULL, '00000001419'),
('00000001420', '00159', -8.182156, 114.319197, 'admin', NULL, NULL, NULL, '00000001420'),
('00000001421', '00159', -8.182064, 114.319464, 'admin', NULL, NULL, NULL, '00000001421'),
('00000001422', '00159', -8.182388, 114.320104, 'admin', NULL, NULL, NULL, '00000001422'),
('00000001423', '00159', -8.182826, 114.320871, 'admin', NULL, NULL, NULL, '00000001423'),
('00000001424', '00159', -8.183218, 114.321133, 'admin', NULL, NULL, NULL, '00000001424'),
('00000001425', '00159', -8.184101, 114.321716, 'admin', NULL, NULL, NULL, '00000001425'),
('00000001426', '00159', -8.184479, 114.322082, 'admin', NULL, NULL, NULL, '00000001426'),
('00000001427', '00159', -8.184730, 114.322306, 'admin', NULL, NULL, NULL, '00000001427'),
('00000001428', '00159', -8.185136, 114.322748, 'admin', NULL, NULL, NULL, '00000001428'),
('00000001429', '00159', -8.185460, 114.322993, 'admin', NULL, NULL, NULL, '00000001429'),
('00000001430', '00159', -8.185731, 114.323155, 'admin', NULL, NULL, NULL, '00000001430'),
('00000001431', '00159', -8.185863, 114.323346, 'admin', NULL, NULL, NULL, '00000001431'),
('00000001432', '00159', -8.185889, 114.323585, 'admin', NULL, NULL, NULL, '00000001432'),
('00000001433', '00159', -8.185892, 114.323980, 'admin', NULL, NULL, NULL, '00000001433'),
('00000001434', '00159', -8.185956, 114.324233, 'admin', NULL, NULL, NULL, '00000001434'),
('00000001435', '00159', -8.185778, 114.324371, 'admin', NULL, NULL, NULL, '00000001435'),
('00000001436', '00159', -8.185001, 114.324640, 'admin', NULL, NULL, NULL, '00000001436'),
('00000001437', '00159', -8.184256, 114.324930, 'admin', NULL, NULL, NULL, '00000001437'),
('00000001438', '00159', -8.184624, 114.326175, 'admin', NULL, NULL, NULL, '00000001438'),
('00000001439', '00159', -8.185192, 114.327024, 'admin', NULL, NULL, NULL, '00000001439'),
('00000001440', '00159', -8.185738, 114.328555, 'admin', NULL, NULL, NULL, '00000001440'),
('00000001441', '00159', -8.186440, 114.330600, 'admin', NULL, NULL, NULL, '00000001441'),
('00000001442', '00159', -8.186883, 114.331682, 'admin', NULL, NULL, NULL, '00000001442'),
('00000001443', '00159', -8.187115, 114.332401, 'admin', NULL, NULL, NULL, '00000001443'),
('00000001444', '00159', -8.187423, 114.333097, 'admin', NULL, NULL, NULL, '00000001444'),
('00000001445', '00159', -8.187712, 114.333773, 'admin', NULL, NULL, NULL, '00000001445'),
('00000001446', '00159', -8.187790, 114.333868, 'admin', NULL, NULL, NULL, '00000001446'),
('00000001501', '00057', -8.178608, 114.286252, 'admin', NULL, NULL, NULL, '00000001501'),
('00000001502', '00057', -8.178982, 114.286427, 'admin', NULL, NULL, NULL, '00000001502'),
('00000001503', '00057', -8.179477, 114.286641, 'admin', NULL, NULL, NULL, '00000001503'),
('00000001504', '00057', -8.180204, 114.287104, 'admin', NULL, NULL, NULL, '00000001504'),
('00000001505', '00057', -8.180299, 114.287359, 'admin', NULL, NULL, NULL, '00000001505'),
('00000001506', '00057', -8.180327, 114.287819, 'admin', NULL, NULL, NULL, '00000001506'),
('00000001507', '00057', -8.180834, 114.288304, 'admin', NULL, NULL, NULL, '00000001507'),
('00000001508', '00057', -8.181219, 114.288411, 'admin', NULL, NULL, NULL, '00000001508'),
('00000001509', '00057', -8.181616, 114.288526, 'admin', NULL, NULL, NULL, '00000001509'),
('00000001510', '00057', -8.182334, 114.288647, 'admin', NULL, NULL, NULL, '00000001510'),
('00000001511', '00057', -8.182807, 114.288959, 'admin', NULL, NULL, NULL, '00000001511'),
('00000001512', '00057', -8.183617, 114.289428, 'admin', NULL, NULL, NULL, '00000001512'),
('00000001513', '00057', -8.184149, 114.289643, 'admin', NULL, NULL, NULL, '00000001513'),
('00000001514', '00057', -8.185197, 114.290498, 'admin', NULL, NULL, NULL, '00000001514'),
('00000001515', '00057', -8.185663, 114.290818, 'admin', NULL, NULL, NULL, '00000001515'),
('00000001516', '00057', -8.186184, 114.291027, 'admin', NULL, NULL, NULL, '00000001516'),
('00000001517', '00057', -8.187028, 114.291169, 'admin', NULL, NULL, NULL, '00000001517'),
('00000001518', '00057', -8.187452, 114.291243, 'admin', NULL, NULL, NULL, '00000001518'),
('00000001519', '00057', -8.187612, 114.291323, 'admin', NULL, NULL, NULL, '00000001519'),
('00000001520', '00057', -8.187765, 114.291473, 'admin', NULL, NULL, NULL, '00000001520'),
('00000001521', '00057', -8.188407, 114.292402, 'admin', NULL, NULL, NULL, '00000001521'),
('00000001522', '00057', -8.188637, 114.292828, 'admin', NULL, NULL, NULL, '00000001522'),
('00000001523', '00057', -8.189032, 114.293641, 'admin', NULL, NULL, NULL, '00000001523'),
('00000001524', '00057', -8.189593, 114.295107, 'admin', NULL, NULL, NULL, '00000001524'),
('00000001525', '00057', -8.190009, 114.296227, 'admin', NULL, NULL, NULL, '00000001525'),
('00000001526', '00057', -8.190245, 114.296939, 'admin', NULL, NULL, NULL, '00000001526'),
('00000001527', '00057', -8.190428, 114.297676, 'admin', NULL, NULL, NULL, '00000001527'),
('00000001528', '00057', -8.190457, 114.297948, 'admin', NULL, NULL, NULL, '00000001528'),
('00000001529', '00057', -8.190407, 114.298933, 'admin', NULL, NULL, NULL, '00000001529'),
('00000001530', '00057', -8.190357, 114.299475, 'admin', NULL, NULL, NULL, '00000001530'),
('00000001531', '00057', -8.190325, 114.299800, 'admin', NULL, NULL, NULL, '00000001531'),
('00000001532', '00057', -8.190332, 114.300111, 'admin', NULL, NULL, NULL, '00000001532'),
('00000001533', '00057', -8.190420, 114.300492, 'admin', NULL, NULL, NULL, '00000001533'),
('00000001534', '00057', -8.190771, 114.301367, 'admin', NULL, NULL, NULL, '00000001534'),
('00000001535', '00057', -8.190870, 114.301618, 'admin', NULL, NULL, NULL, '00000001535'),
('00000001536', '00057', -8.191103, 114.302103, 'admin', NULL, NULL, NULL, '00000001536'),
('00000001537', '00057', -8.191242, 114.302486, 'admin', NULL, NULL, NULL, '00000001537'),
('00000001538', '00057', -8.191330, 114.302737, 'admin', NULL, NULL, NULL, '00000001538'),
('00000001539', '00057', -8.191554, 114.303269, 'admin', NULL, NULL, NULL, '00000001539'),
('00000001540', '00057', -8.191785, 114.303662, 'admin', NULL, NULL, NULL, '00000001540'),
('00000001541', '00057', -8.191998, 114.304014, 'admin', NULL, NULL, NULL, '00000001541'),
('00000001542', '00057', -8.192664, 114.305196, 'admin', NULL, NULL, NULL, '00000001542'),
('00000001543', '00057', -8.192957, 114.305730, 'admin', NULL, NULL, NULL, '00000001543'),
('00000001544', '00057', -8.193241, 114.306331, 'admin', NULL, NULL, NULL, '00000001544'),
('00000001545', '00057', -8.193769, 114.307230, 'admin', NULL, NULL, NULL, '00000001545'),
('00000001546', '00057', -8.193946, 114.307440, 'admin', NULL, NULL, NULL, '00000001546'),
('00000001547', '00057', -8.194236, 114.307632, 'admin', NULL, NULL, NULL, '00000001547'),
('00000001548', '00057', -8.194480, 114.308001, 'admin', NULL, NULL, NULL, '00000001548'),
('00000001549', '00057', -8.194652, 114.308164, 'admin', NULL, NULL, NULL, '00000001549'),
('00000001550', '00057', -8.194979, 114.308327, 'admin', NULL, NULL, NULL, '00000001550'),
('00000001551', '00057', -8.195343, 114.308552, 'admin', NULL, NULL, NULL, '00000001551'),
('00000001552', '00057', -8.195550, 114.308731, 'admin', NULL, NULL, NULL, '00000001552'),
('00000001553', '00057', -8.195810, 114.309026, 'admin', NULL, NULL, NULL, '00000001553'),
('00000001554', '00057', -8.196300, 114.309607, 'admin', NULL, NULL, NULL, '00000001554'),
('00000001555', '00057', -8.196626, 114.310001, 'admin', NULL, NULL, NULL, '00000001555'),
('00000001556', '00057', -8.196810, 114.310348, 'admin', NULL, NULL, NULL, '00000001556'),
('00000001557', '00057', -8.197016, 114.310747, 'admin', NULL, NULL, NULL, '00000001557'),
('00000001558', '00057', -8.197291, 114.311247, 'admin', NULL, NULL, NULL, '00000001558'),
('00000001559', '00057', -8.197590, 114.311469, 'admin', NULL, NULL, NULL, '00000001559'),
('00000001560', '00057', -8.197972, 114.311766, 'admin', NULL, NULL, NULL, '00000001560'),
('00000001561', '00057', -8.198756, 114.312333, 'admin', NULL, NULL, NULL, '00000001561'),
('00000001562', '00057', -8.198981, 114.312509, 'admin', NULL, NULL, NULL, '00000001562'),
('00000001563', '00057', -8.199235, 114.312688, 'admin', NULL, NULL, NULL, '00000001563'),
('00000001564', '00057', -8.199450, 114.312938, 'admin', NULL, NULL, NULL, '00000001564'),
('00000001565', '00057', -8.199713, 114.313355, 'admin', NULL, NULL, NULL, '00000001565'),
('00000001566', '00057', -8.199813, 114.313512, 'admin', NULL, NULL, NULL, '00000001566'),
('00000001567', '00076', -8.259385, 114.300732, 'admin', NULL, NULL, NULL, '00000001567'),
('00000001568', '00076', -8.259602, 114.300585, 'admin', NULL, NULL, NULL, '00000001568'),
('00000001569', '00076', -8.260127, 114.300591, 'admin', NULL, NULL, NULL, '00000001569'),
('00000001570', '00076', -8.260845, 114.300404, 'admin', NULL, NULL, NULL, '00000001570'),
('00000001571', '00076', -8.261775, 114.300616, 'admin', NULL, NULL, NULL, '00000001571'),
('00000001572', '00076', -8.261721, 114.300933, 'admin', NULL, NULL, NULL, '00000001572'),
('00000001573', '00076', -8.261818, 114.301243, 'admin', NULL, NULL, NULL, '00000001573'),
('00000001574', '00076', -8.261889, 114.301307, 'admin', NULL, NULL, NULL, '00000001574'),
('00000001575', '00076', -8.262020, 114.301346, 'admin', NULL, NULL, NULL, '00000001575'),
('00000001576', '00076', -8.262093, 114.301437, 'admin', NULL, NULL, NULL, '00000001576'),
('00000001577', '00076', -8.262208, 114.301433, 'admin', NULL, NULL, NULL, '00000001577'),
('00000001578', '00076', -8.262391, 114.301433, 'admin', NULL, NULL, NULL, '00000001578'),
('00000001579', '00076', -8.262640, 114.301506, 'admin', NULL, NULL, NULL, '00000001579'),
('00000001580', '00076', -8.263291, 114.301291, 'admin', NULL, NULL, NULL, '00000001580'),
('00000001581', '00076', -8.263693, 114.301154, 'admin', NULL, NULL, NULL, '00000001581'),
('00000001582', '00076', -8.263976, 114.301247, 'admin', NULL, NULL, NULL, '00000001582'),
('00000001583', '00076', -8.264143, 114.301886, 'admin', NULL, NULL, NULL, '00000001583'),
('00000001584', '00076', -8.264422, 114.302409, 'admin', NULL, NULL, NULL, '00000001584'),
('00000001585', '00076', -8.264812, 114.302599, 'admin', NULL, NULL, NULL, '00000001585'),
('00000001586', '00076', -8.265129, 114.302621, 'admin', NULL, NULL, NULL, '00000001586'),
('00000001587', '00076', -8.265395, 114.302911, 'admin', NULL, NULL, NULL, '00000001587'),
('00000001588', '00076', -8.266575, 114.303665, 'admin', NULL, NULL, NULL, '00000001588'),
('00000001589', '00076', -8.267097, 114.304240, 'admin', NULL, NULL, NULL, '00000001589'),
('00000001590', '00076', -8.267328, 114.304592, 'admin', NULL, NULL, NULL, '00000001590'),
('00000001591', '00076', -8.267747, 114.304915, 'admin', NULL, NULL, NULL, '00000001591'),
('00000001592', '00076', -8.268077, 114.304855, 'admin', NULL, NULL, NULL, '00000001592'),
('00000001593', '00076', -8.268299, 114.304904, 'admin', NULL, NULL, NULL, '00000001593'),
('00000001594', '00076', -8.268623, 114.304804, 'admin', NULL, NULL, NULL, '00000001594'),
('00000001595', '00076', -8.269431, 114.304957, 'admin', NULL, NULL, NULL, '00000001595'),
('00000001596', '00076', -8.269601, 114.304926, 'admin', NULL, NULL, NULL, '00000001596'),
('00000001597', '00076', -8.269979, 114.305093, 'admin', NULL, NULL, NULL, '00000001597'),
('00000001598', '00076', -8.270197, 114.305344, 'admin', NULL, NULL, NULL, '00000001598'),
('00000001599', '00076', -8.270845, 114.305239, 'admin', NULL, NULL, NULL, '00000001599'),
('00000001600', '00076', -8.270386, 114.306149, 'admin', NULL, NULL, NULL, '00000001600'),
('00000001601', '00075', -8.280940, 114.266967, 'admin', NULL, NULL, NULL, '00000001601'),
('00000001602', '00075', -8.283790, 114.271365, 'admin', NULL, NULL, NULL, '00000001602'),
('00000001603', '00075', -8.285984, 114.273815, 'admin', NULL, NULL, NULL, '00000001603'),
('00000001604', '00075', -8.286738, 114.274676, 'admin', NULL, NULL, NULL, '00000001604'),
('00000001605', '00075', -8.287274, 114.274001, 'admin', NULL, NULL, NULL, '00000001605'),
('00000001606', '00104', -8.180672, 114.356735, 'admin', NULL, NULL, NULL, '00000001606'),
('00000001607', '00104', -8.181567, 114.357612, 'admin', NULL, NULL, NULL, '00000001607'),
('00000001608', '00104', -8.184505, 114.362553, 'admin', NULL, NULL, NULL, '00000001608'),
('00000001609', '00104', -8.184503, 114.362712, 'admin', NULL, NULL, NULL, '00000001609'),
('00000001610', '00104', -8.182336, 114.364289, 'admin', NULL, NULL, NULL, '00000001610'),
('00000001611', '00104', -8.182269, 114.363974, 'admin', NULL, NULL, NULL, '00000001611'),
('00000001612', '00104', -8.176949, 114.365844, 'admin', NULL, NULL, NULL, '00000001612'),
('00000001613', '00104', -8.176861, 114.366039, 'admin', NULL, NULL, NULL, '00000001613'),
('00000001614', '00104', -8.175001, 114.367073, 'admin', NULL, NULL, NULL, '00000001614'),
('00000001615', '00104', -8.175016, 114.367178, 'admin', NULL, NULL, NULL, '00000001615'),
('00000001616', '00104', -8.173167, 114.368165, 'admin', NULL, NULL, NULL, '00000001616'),
('00000001617', '00104', -8.173422, 114.368426, 'admin', NULL, NULL, NULL, '00000001617'),
('00000001618', '00104', -8.173821, 114.369067, 'admin', NULL, NULL, NULL, '00000001618'),
('00000001619', '00104', -8.173889, 114.369245, 'admin', NULL, NULL, NULL, '00000001619'),
('00000001620', '00104', -8.173886, 114.369490, 'admin', NULL, NULL, NULL, '00000001620'),
('00000001621', '00104', -8.173790, 114.369818, 'admin', NULL, NULL, NULL, '00000001621'),
('00000001622', '00104', -8.173900, 114.370372, 'admin', NULL, NULL, NULL, '00000001622'),
('00000001623', '00104', -8.174379, 114.371596, 'admin', NULL, NULL, NULL, '00000001623'),
('00000001624', '00104', -8.174605, 114.372016, 'admin', NULL, NULL, NULL, '00000001624'),
('00000001625', '00104', -8.174828, 114.372723, 'admin', NULL, NULL, NULL, '00000001625'),
('00000001626', '00104', -8.174818, 114.372846, 'admin', NULL, NULL, NULL, '00000001626'),
('00000001627', '00104', -8.174675, 114.372980, 'admin', NULL, NULL, NULL, '00000001627'),
('00000001628', '00104', -8.174090, 114.373196, 'admin', NULL, NULL, NULL, '00000001628'),
('00000001629', '00104', -8.174009, 114.373329, 'admin', NULL, NULL, NULL, '00000001629'),
('00000001630', '00104', -8.174042, 114.373803, 'admin', NULL, NULL, NULL, '00000001630'),
('00000001631', '00104', -8.174235, 114.374643, 'admin', NULL, NULL, NULL, '00000001631'),
('00000001632', '00104', -8.174543, 114.375432, 'admin', NULL, NULL, NULL, '00000001632'),
('00000001633', '00105', -8.176586, 114.340219, 'admin', NULL, NULL, NULL, '00000001633'),
('00000001634', '00105', -8.182026, 114.356064, 'admin', NULL, NULL, NULL, '00000001634'),
('00000001635', '00097', -8.141756, 114.399271, 'admin', NULL, NULL, NULL, '00000001635'),
('00000001636', '00097', -8.143729, 114.399752, 'admin', NULL, NULL, NULL, '00000001636'),
('00000001637', '00097', -8.144983, 114.399946, 'admin', NULL, NULL, NULL, '00000001637'),
('00000001638', '00097', -8.145600, 114.400032, 'admin', NULL, NULL, NULL, '00000001638'),
('00000001639', '00097', -8.146487, 114.399615, 'admin', NULL, NULL, NULL, '00000001639'),
('00000001640', '00097', -8.147615, 114.399643, 'admin', NULL, NULL, NULL, '00000001640'),
('00000001641', '00098', -8.143675, 114.399195, 'admin', NULL, NULL, NULL, '00000001641'),
('00000001642', '00098', -8.144936, 114.398953, 'admin', NULL, NULL, NULL, '00000001642'),
('00000001643', '00099', -8.142370, 114.398640, 'admin', NULL, NULL, NULL, '00000001643'),
('00000001644', '00099', -8.144664, 114.398321, 'admin', NULL, NULL, NULL, '00000001644'),
('00000001658', '00100', -8.142974, 114.391071, 'admin', NULL, NULL, NULL, '00000001658'),
('00000001659', '00100', -8.143813, 114.394950, 'admin', NULL, NULL, NULL, '00000001659'),
('00000001660', '00100', -8.144067, 114.396477, 'admin', NULL, NULL, NULL, '00000001660'),
('00000001661', '00100', -8.144421, 114.397209, 'admin', NULL, NULL, NULL, '00000001661'),
('00000001662', '00100', -8.144596, 114.397385, 'admin', NULL, NULL, NULL, '00000001662'),
('00000001663', '00100', -8.144664, 114.398321, 'admin', NULL, NULL, NULL, '00000001663'),
('00000001664', '00100', -8.144865, 114.398677, 'admin', NULL, NULL, NULL, '00000001664'),
('00000001665', '00100', -8.145363, 114.398953, 'admin', NULL, NULL, NULL, '00000001665'),
('00000001666', '00100', -8.145523, 114.399178, 'admin', NULL, NULL, NULL, '00000001666'),
('00000001667', '00100', -8.145600, 114.400032, 'admin', NULL, NULL, NULL, '00000001667'),
('00000001668', '00101', -8.144865, 114.398677, 'admin', NULL, NULL, NULL, '00000001668'),
('00000001669', '00101', -8.144936, 114.398953, 'admin', NULL, NULL, NULL, '00000001669'),
('00000001670', '00101', -8.144983, 114.399946, 'admin', NULL, NULL, NULL, '00000001670'),
('00000001671', '00102', -8.138378, 114.383558, 'admin', NULL, NULL, NULL, '00000001671'),
('00000001672', '00102', -8.140724, 114.386449, 'admin', NULL, NULL, NULL, '00000001672'),
('00000001673', '00102', -8.141336, 114.387927, 'admin', NULL, NULL, NULL, '00000001673'),
('00000001674', '00102', -8.142082, 114.389284, 'admin', NULL, NULL, NULL, '00000001674'),
('00000001675', '00102', -8.142612, 114.390654, 'admin', NULL, NULL, NULL, '00000001675'),
('00000001676', '00103', -8.138721, 114.381141, 'admin', NULL, NULL, NULL, '00000001676'),
('00000001677', '00103', -8.138471, 114.381434, 'admin', NULL, NULL, NULL, '00000001677'),
('00000001678', '00103', -8.138469, 114.383292, 'admin', NULL, NULL, NULL, '00000001678'),
('00000001679', '00103', -8.138378, 114.383558, 'admin', NULL, NULL, NULL, '00000001679'),
('00000001680', '00109', -8.435183, 114.288931, 'admin', NULL, NULL, NULL, '00000001680'),
('00000001681', '00109', -8.435901, 114.291827, 'admin', NULL, NULL, NULL, '00000001681'),
('00000001682', '00109', -8.436358, 114.293181, 'admin', NULL, NULL, NULL, '00000001682'),
('00000001683', '00109', -8.437608, 114.297926, 'admin', NULL, NULL, NULL, '00000001683'),
('00000001684', '00109', -8.438141, 114.298782, 'admin', NULL, NULL, NULL, '00000001684'),
('00000001685', '00109', -8.438442, 114.299629, 'admin', NULL, NULL, NULL, '00000001685'),
('00000001686', '00109', -8.438719, 114.300562, 'admin', NULL, NULL, NULL, '00000001686'),
('00000001687', '00109', -8.439284, 114.302250, 'admin', NULL, NULL, NULL, '00000001687'),
('00000001688', '00109', -8.439418, 114.302777, 'admin', NULL, NULL, NULL, '00000001688'),
('00000001689', '00109', -8.439457, 114.303231, 'admin', NULL, NULL, NULL, '00000001689'),
('00000001690', '00109', -8.439493, 114.304090, 'admin', NULL, NULL, NULL, '00000001690'),
('00000001691', '00109', -8.439616, 114.304684, 'admin', NULL, NULL, NULL, '00000001691'),
('00000001692', '00109', -8.439983, 114.305478, 'admin', NULL, NULL, NULL, '00000001692'),
('00000001693', '00109', -8.440229, 114.306024, 'admin', NULL, NULL, NULL, '00000001693'),
('00000001694', '00109', -8.440896, 114.308493, 'admin', NULL, NULL, NULL, '00000001694'),
('00000001695', '00109', -8.441758, 114.312220, 'admin', NULL, NULL, NULL, '00000001695'),
('00000001696', '00109', -8.443095, 114.311648, 'admin', NULL, NULL, NULL, '00000001696'),
('00000001697', '00110', -8.440922, 114.304613, 'admin', NULL, NULL, NULL, '00000001697'),
('00000001698', '00110', -8.439983, 114.305478, 'admin', NULL, NULL, NULL, '00000001698'),
('00000001699', '00117', -8.453078, 114.321363, 'admin', NULL, NULL, NULL, '00000001699'),
('00000001700', '00117', -8.453678, 114.321227, 'admin', NULL, NULL, NULL, '00000001700'),
('00000001701', '00117', -8.453339, 114.319924, 'admin', NULL, NULL, NULL, '00000001701'),
('00000001702', '00117', -8.452643, 114.319958, 'admin', NULL, NULL, NULL, '00000001702'),
('00000001703', '00117', -8.452556, 114.318989, 'admin', NULL, NULL, NULL, '00000001703'),
('00000001704', '00112', -8.452643, 114.319958, 'admin', NULL, NULL, NULL, '00000001704'),
('00000001705', '00112', -8.450304, 114.320217, 'admin', NULL, NULL, NULL, '00000001705'),
('00000001706', '00112', -8.450880, 114.321788, 'admin', NULL, NULL, NULL, '00000001706'),
('00000001707', '00112', -8.451325, 114.323503, 'admin', NULL, NULL, NULL, '00000001707'),
('00000001708', '00112', -8.451989, 114.323450, 'admin', NULL, NULL, NULL, '00000001708'),
('00000001709', '00112', -8.452943, 114.325585, 'admin', NULL, NULL, NULL, '00000001709'),
('00000001710', '00112', -8.453877, 114.325415, 'admin', NULL, NULL, NULL, '00000001710'),
('00000001711', '00112', -8.454809, 114.325177, 'admin', NULL, NULL, NULL, '00000001711'),
('00000001712', '00112', -8.456453, 114.324949, 'admin', NULL, NULL, NULL, '00000001712'),
('00000001713', '00112', -8.458906, 114.324310, 'admin', NULL, NULL, NULL, '00000001713'),
('00000001714', '00112', -8.459548, 114.324118, 'admin', NULL, NULL, NULL, '00000001714'),
('00000001715', '00112', -8.460299, 114.324081, 'admin', NULL, NULL, NULL, '00000001715'),
('00000001716', '00113', -8.454809, 114.325177, 'admin', NULL, NULL, NULL, '00000001716'),
('00000001717', '00113', -8.454860, 114.326565, 'admin', NULL, NULL, NULL, '00000001717'),
('00000001718', '00113', -8.455034, 114.327210, 'admin', NULL, NULL, NULL, '00000001718'),
('00000001719', '00113', -8.455162, 114.328212, 'admin', NULL, NULL, NULL, '00000001719'),
('00000001720', '00113', -8.455285, 114.328985, 'admin', NULL, NULL, NULL, '00000001720'),
('00000001721', '00113', -8.455839, 114.331497, 'admin', NULL, NULL, NULL, '00000001721'),
('00000001722', '00114', -8.455782, 114.323147, 'admin', NULL, NULL, NULL, '00000001722'),
('00000001723', '00114', -8.456453, 114.324949, 'admin', NULL, NULL, NULL, '00000001723'),
('00000001724', '00115', -8.458768, 114.323433, 'admin', NULL, NULL, NULL, '00000001724'),
('00000001725', '00115', -8.458906, 114.324310, 'admin', NULL, NULL, NULL, '00000001725'),
('00000001726', '00116', -8.460113, 114.322828, 'admin', NULL, NULL, NULL, '00000001726'),
('00000001727', '00116', -8.460299, 114.324081, 'admin', NULL, NULL, NULL, '00000001727'),
('00000001728', '00111', -8.442291, 114.288168, 'admin', NULL, NULL, NULL, '00000001728'),
('00000001729', '00111', -8.444690, 114.288376, 'admin', NULL, NULL, NULL, '00000001729'),
('00000001730', '00111', -8.447669, 114.288778, 'admin', NULL, NULL, NULL, '00000001730'),
('00000001731', '00111', -8.448896, 114.289214, 'admin', NULL, NULL, NULL, '00000001731'),
('00000001732', '00111', -8.452927, 114.290058, 'admin', NULL, NULL, NULL, '00000001732'),
('00000001733', '00111', -8.455347, 114.290317, 'admin', NULL, NULL, NULL, '00000001733'),
('00000001734', '00111', -8.456206, 114.290484, 'admin', NULL, NULL, NULL, '00000001734'),
('00000001735', '00111', -8.458974, 114.290210, 'admin', NULL, NULL, NULL, '00000001735'),
('00000001736', '00160', -8.458974, 114.290210, 'admin', NULL, NULL, NULL, '00000001736'),
('00000001737', '00160', -8.458236, 114.288097, 'admin', NULL, NULL, NULL, '00000001737'),
('00000001738', '00160', -8.458073, 114.287420, 'admin', NULL, NULL, NULL, '00000001738'),
('00000001739', '00160', -8.458012, 114.286926, 'admin', NULL, NULL, NULL, '00000001739'),
('00000001740', '00160', -8.457988, 114.284375, 'admin', NULL, NULL, NULL, '00000001740'),
('00000001741', '00160', -8.457992, 114.282394, 'admin', NULL, NULL, NULL, '00000001741'),
('00000001742', '00160', -8.457919, 114.281231, 'admin', NULL, NULL, NULL, '00000001742'),
('00000001743', '00161', -8.444690, 114.288376, 'admin', NULL, NULL, NULL, '00000001743'),
('00000001744', '00161', -8.444649, 114.288989, 'admin', NULL, NULL, NULL, '00000001744'),
('00000001745', '00118', -8.257684, 114.118594, 'admin', NULL, NULL, NULL, '00000001745'),
('00000001746', '00118', -8.258818, 114.120839, 'admin', NULL, NULL, NULL, '00000001746'),
('00000001747', '00118', -8.258755, 114.121654, 'admin', NULL, NULL, NULL, '00000001747'),
('00000001748', '00118', -8.259564, 114.122592, 'admin', NULL, NULL, NULL, '00000001748'),
('00000001749', '00118', -8.259679, 114.123166, 'admin', NULL, NULL, NULL, '00000001749'),
('00000001750', '00118', -8.260801, 114.124879, 'admin', NULL, NULL, NULL, '00000001750'),
('00000001751', '00118', -8.260573, 114.125622, 'admin', NULL, NULL, NULL, '00000001751'),
('00000001752', '00118', -8.264623, 114.124660, 'admin', NULL, NULL, NULL, '00000001752'),
('00000001753', '00118', -8.270754, 114.123972, 'admin', NULL, NULL, NULL, '00000001753'),
('00000001754', '00118', -8.279030, 114.124076, 'admin', NULL, NULL, NULL, '00000001754'),
('00000001755', '00119', -8.553582, 114.110045, 'admin', NULL, NULL, NULL, '00000001755'),
('00000001756', '00119', -8.553669, 114.109969, 'admin', NULL, NULL, NULL, '00000001756'),
('00000001757', '00119', -8.553594, 114.109742, 'admin', NULL, NULL, NULL, '00000001757'),
('00000001758', '00119', -8.553921, 114.109466, 'admin', NULL, NULL, NULL, '00000001758'),
('00000001759', '00119', -8.554546, 114.108900, 'admin', NULL, NULL, NULL, '00000001759'),
('00000001760', '00119', -8.555522, 114.108018, 'admin', NULL, NULL, NULL, '00000001760'),
('00000001761', '00121', -8.553921, 114.109466, 'admin', NULL, NULL, NULL, '00000001761'),
('00000001762', '00121', -8.553996, 114.109554, 'admin', NULL, NULL, NULL, '00000001762'),
('00000001763', '00121', -8.554130, 114.109632, 'admin', NULL, NULL, NULL, '00000001763'),
('00000001764', '00121', -8.554207, 114.110175, 'admin', NULL, NULL, NULL, '00000001764'),
('00000001765', '00121', -8.554972, 114.110121, 'admin', NULL, NULL, NULL, '00000001765'),
('00000001766', '00121', -8.554930, 114.110872, 'admin', NULL, NULL, NULL, '00000001766'),
('00000001767', '00121', -8.555351, 114.110833, 'admin', NULL, NULL, NULL, '00000001767'),
('00000001768', '00120', -8.553921, 114.109466, 'admin', NULL, NULL, NULL, '00000001768'),
('00000001769', '00120', -8.553544, 114.109106, 'admin', NULL, NULL, NULL, '00000001769'),
('00000001770', '00120', -8.553519, 114.108374, 'admin', NULL, NULL, NULL, '00000001770'),
('00000001771', '00120', -8.554574, 114.108148, 'admin', NULL, NULL, NULL, '00000001771'),
('00000001772', '00120', -8.554546, 114.108900, 'admin', NULL, NULL, NULL, '00000001772'),
('00000001773', '00122', -8.552217, 114.111171, 'admin', NULL, NULL, NULL, '00000001773'),
('00000001774', '00122', -8.553582, 114.110045, 'admin', NULL, NULL, NULL, '00000001774'),
('00000001775', '00122', -8.553669, 114.109969, 'admin', NULL, NULL, NULL, '00000001775'),
('00000001776', '00122', -8.554130, 114.109632, 'admin', NULL, NULL, NULL, '00000001776'),
('00000001777', '00122', -8.554306, 114.109412, 'admin', NULL, NULL, NULL, '00000001777'),
('00000001778', '00122', -8.555310, 114.109274, 'admin', NULL, NULL, NULL, '00000001778'),
('00000001779', '00122', -8.557186, 114.109218, 'admin', NULL, NULL, NULL, '00000001779'),
('00000001780', '00123', -8.555310, 114.109274, 'admin', NULL, NULL, NULL, '00000001780'),
('00000001781', '00123', -8.555329, 114.110018, 'admin', NULL, NULL, NULL, '00000001781'),
('00000001782', '00123', -8.555339, 114.110175, 'admin', NULL, NULL, NULL, '00000001782'),
('00000001783', '00123', -8.555349, 114.110479, 'admin', NULL, NULL, NULL, '00000001783'),
('00000001784', '00123', -8.555351, 114.110833, 'admin', NULL, NULL, NULL, '00000001784'),
('00000001785', '00123', -8.555397, 114.111940, 'admin', NULL, NULL, NULL, '00000001785'),
('00000001786', '00123', -8.557340, 114.111889, 'admin', NULL, NULL, NULL, '00000001786'),
('00000001787', '00123', -8.559082, 114.111881, 'admin', NULL, NULL, NULL, '00000001787'),
('00000001788', '00123', -8.559088, 114.109109, 'admin', NULL, NULL, NULL, '00000001788'),
('00000001789', '00123', -8.560855, 114.109147, 'admin', NULL, NULL, NULL, '00000001789'),
('00000001790', '00123', -8.562661, 114.109169, 'admin', NULL, NULL, NULL, '00000001790'),
('00000001791', '00124', -8.555045, 114.109985, 'admin', NULL, NULL, NULL, '00000001791'),
('00000001792', '00124', -8.555329, 114.110018, 'admin', NULL, NULL, NULL, '00000001792'),
('00000001793', '00125', -8.555339, 114.110175, 'admin', NULL, NULL, NULL, '00000001793'),
('00000001794', '00125', -8.556193, 114.110073, 'admin', NULL, NULL, NULL, '00000001794'),
('00000001795', '00126', -8.555349, 114.110479, 'admin', NULL, NULL, NULL, '00000001795'),
('00000001796', '00126', -8.556401, 114.110420, 'admin', NULL, NULL, NULL, '00000001796'),
('00000001797', '00135', -8.430856, 114.086130, 'admin', NULL, NULL, NULL, '00000001797'),
('00000001798', '00135', -8.430932, 114.087776, 'admin', NULL, NULL, NULL, '00000001798'),
('00000001799', '00135', -8.431010, 114.089442, 'admin', NULL, NULL, NULL, '00000001799'),
('00000001800', '00136', -8.431010, 114.089442, 'admin', NULL, NULL, NULL, '00000001800'),
('00000001801', '00136', -8.432724, 114.089472, 'admin', NULL, NULL, NULL, '00000001801'),
('00000001802', '00136', -8.434407, 114.089457, 'admin', NULL, NULL, NULL, '00000001802'),
('00000001803', '00137', -8.430932, 114.087776, 'admin', NULL, NULL, NULL, '00000001803'),
('00000001804', '00137', -8.432627, 114.087781, 'admin', NULL, NULL, NULL, '00000001804'),
('00000001805', '00138', -8.430856, 114.086130, 'admin', NULL, NULL, NULL, '00000001805'),
('00000001806', '00138', -8.432596, 114.086022, 'admin', NULL, NULL, NULL, '00000001806'),
('00000001807', '00139', -8.432575, 114.085262, 'admin', NULL, NULL, NULL, '00000001807'),
('00000001808', '00139', -8.432596, 114.086022, 'admin', NULL, NULL, NULL, '00000001808'),
('00000001809', '00139', -8.432627, 114.087781, 'admin', NULL, NULL, NULL, '00000001809'),
('00000001810', '00139', -8.432724, 114.089472, 'admin', NULL, NULL, NULL, '00000001810'),
('00000001811', '00139', -8.432714, 114.090523, 'admin', NULL, NULL, NULL, '00000001811'),
('00000001812', '00140', -8.434338, 114.084286, 'admin', NULL, NULL, NULL, '00000001812'),
('00000001813', '00140', -8.434361, 114.085962, 'admin', NULL, NULL, NULL, '00000001813'),
('00000001814', '00140', -8.434396, 114.089156, 'admin', NULL, NULL, NULL, '00000001814'),
('00000001815', '00140', -8.434407, 114.089457, 'admin', NULL, NULL, NULL, '00000001815'),
('00000001816', '00140', -8.434525, 114.092729, 'admin', NULL, NULL, NULL, '00000001816'),
('00000001817', '00141', -8.434525, 114.092729, 'admin', NULL, NULL, NULL, '00000001817'),
('00000001818', '00141', -8.436156, 114.092690, 'admin', NULL, NULL, NULL, '00000001818'),
('00000001819', '00141', -8.441389, 114.092679, 'admin', NULL, NULL, NULL, '00000001819'),
('00000001820', '00141', -8.441370, 114.093569, 'admin', NULL, NULL, NULL, '00000001820'),
('00000001821', '00141', -8.441372, 114.095624, 'admin', NULL, NULL, NULL, '00000001821'),
('00000001822', '00141', -8.442025, 114.095892, 'admin', NULL, NULL, NULL, '00000001822'),
('00000001823', '00142', -8.434361, 114.085962, 'admin', NULL, NULL, NULL, '00000001823'),
('00000001824', '00142', -8.436060, 114.085916, 'admin', NULL, NULL, NULL, '00000001824'),
('00000001825', '00143', -8.435994, 114.082077, 'admin', NULL, NULL, NULL, '00000001825'),
('00000001826', '00143', -8.436060, 114.085916, 'admin', NULL, NULL, NULL, '00000001826'),
('00000001827', '00143', -8.436156, 114.092690, 'admin', NULL, NULL, NULL, '00000001827'),
('00000001828', '00144', -8.437903, 114.092374, 'admin', NULL, NULL, NULL, '00000001828'),
('00000001829', '00144', -8.437902, 114.093560, 'admin', NULL, NULL, NULL, '00000001829'),
('00000001830', '00145', -8.439648, 114.092284, 'admin', NULL, NULL, NULL, '00000001830'),
('00000001831', '00145', -8.439650, 114.093534, 'admin', NULL, NULL, NULL, '00000001831'),
('00000001832', '00145', -8.439652, 114.094349, 'admin', NULL, NULL, NULL, '00000001832'),
('00000001833', '00131', -8.312241, 114.219949, 'admin', NULL, NULL, NULL, '00000001833'),
('00000001834', '00131', -8.315114, 114.222502, 'admin', NULL, NULL, NULL, '00000001834'),
('00000001835', '00131', -8.315956, 114.223331, 'admin', NULL, NULL, NULL, '00000001835'),
('00000001836', '00131', -8.316970, 114.223888, 'admin', NULL, NULL, NULL, '00000001836'),
('00000001837', '00131', -8.317846, 114.225026, 'admin', NULL, NULL, NULL, '00000001837'),
('00000001838', '00131', -8.318976, 114.226176, 'admin', NULL, NULL, NULL, '00000001838'),
('00000001839', '00131', -8.319201, 114.226522, 'admin', NULL, NULL, NULL, '00000001839'),
('00000001840', '00131', -8.320482, 114.225601, 'admin', NULL, NULL, NULL, '00000001840'),
('00000001841', '00131', -8.323492, 114.224087, 'admin', NULL, NULL, NULL, '00000001841'),
('00000001842', '00131', -8.324074, 114.223655, 'admin', NULL, NULL, NULL, '00000001842'),
('00000001843', '00131', -8.325022, 114.224531, 'admin', NULL, NULL, NULL, '00000001843'),
('00000001844', '00131', -8.325534, 114.225262, 'admin', NULL, NULL, NULL, '00000001844'),
('00000001845', '00131', -8.325671, 114.225849, 'admin', NULL, NULL, NULL, '00000001845'),
('00000001846', '00131', -8.325763, 114.226076, 'admin', NULL, NULL, NULL, '00000001846'),
('00000001847', '00131', -8.325872, 114.226232, 'admin', NULL, NULL, NULL, '00000001847'),
('00000001848', '00131', -8.326194, 114.226496, 'admin', NULL, NULL, NULL, '00000001848'),
('00000001849', '00132', -8.315019, 114.222418, 'admin', NULL, NULL, NULL, '00000001849'),
('00000001850', '00132', -8.314689, 114.223445, 'admin', NULL, NULL, NULL, '00000001850'),
('00000001851', '00133', -8.315114, 114.222502, 'admin', NULL, NULL, NULL, '00000001851'),
('00000001852', '00133', -8.315685, 114.222055, 'admin', NULL, NULL, NULL, '00000001852'),
('00000001853', '00133', -8.316262, 114.222709, 'admin', NULL, NULL, NULL, '00000001853'),
('00000001854', '00133', -8.315956, 114.223331, 'admin', NULL, NULL, NULL, '00000001854'),
('00000001855', '00134', -8.316262, 114.222709, 'admin', NULL, NULL, NULL, '00000001855');
INSERT INTO `pipa_koordinat` (`id`, `pipa_id`, `latitude`, `longitude`, `crt`, `crt_date`, `upd`, `upd_date`, `id_urut`) VALUES
('00000001856', '00134', -8.316421, 114.222551, 'admin', NULL, NULL, NULL, '00000001856'),
('00000001857', '00134', -8.318290, 114.224731, 'admin', NULL, NULL, NULL, '00000001857'),
('00000001858', '00134', -8.317846, 114.225026, 'admin', NULL, NULL, NULL, '00000001858'),
('00000001859', '00128', -8.305417, 114.238122, 'admin', NULL, NULL, NULL, '00000001859'),
('00000001860', '00128', -8.305430, 114.238393, 'admin', NULL, NULL, NULL, '00000001860'),
('00000001861', '00128', -8.305462, 114.238908, 'admin', NULL, NULL, NULL, '00000001861'),
('00000001862', '00128', -8.305366, 114.239355, 'admin', NULL, NULL, NULL, '00000001862'),
('00000001863', '00128', -8.305578, 114.240323, 'admin', NULL, NULL, NULL, '00000001863'),
('00000001864', '00128', -8.305687, 114.240624, 'admin', NULL, NULL, NULL, '00000001864'),
('00000001865', '00128', -8.306128, 114.241275, 'admin', NULL, NULL, NULL, '00000001865'),
('00000001866', '00128', -8.306359, 114.241461, 'admin', NULL, NULL, NULL, '00000001866'),
('00000001867', '00128', -8.306398, 114.241760, 'admin', NULL, NULL, NULL, '00000001867'),
('00000001868', '00128', -8.304963, 114.242715, 'admin', NULL, NULL, NULL, '00000001868'),
('00000001869', '00129', -8.306398, 114.241760, 'admin', NULL, NULL, NULL, '00000001869'),
('00000001870', '00129', -8.306657, 114.241705, 'admin', NULL, NULL, NULL, '00000001870'),
('00000001871', '00129', -8.306979, 114.241352, 'admin', NULL, NULL, NULL, '00000001871'),
('00000001872', '00130', -8.305430, 114.238393, 'admin', NULL, NULL, NULL, '00000001872'),
('00000001873', '00130', -8.306452, 114.238860, 'admin', NULL, NULL, NULL, '00000001873'),
('00000001874', '00130', -8.307036, 114.239697, 'admin', NULL, NULL, NULL, '00000001874'),
('00000001875', '00130', -8.307410, 114.241045, 'admin', NULL, NULL, NULL, '00000001875'),
('00000001876', '00127', -8.268890, 114.246460, 'admin', NULL, NULL, NULL, '00000001876'),
('00000001877', '00127', -8.270357, 114.247732, 'admin', NULL, NULL, NULL, '00000001877'),
('00000001878', '00127', -8.271515, 114.249465, 'admin', NULL, NULL, NULL, '00000001878'),
('00000001879', '00127', -8.273923, 114.251070, 'admin', NULL, NULL, NULL, '00000001879'),
('00000001880', '00127', -8.274652, 114.251503, 'admin', NULL, NULL, NULL, '00000001880'),
('00000001881', '00127', -8.274856, 114.251552, 'admin', NULL, NULL, NULL, '00000001881'),
('00000001882', '00127', -8.280817, 114.249552, 'admin', NULL, NULL, NULL, '00000001882'),
('00000001883', '00127', -8.281210, 114.249322, 'admin', NULL, NULL, NULL, '00000001883'),
('00000001884', '00089', -8.285694, 113.969816, 'admin', NULL, NULL, NULL, '00000001884'),
('00000001885', '00089', -8.287013, 113.972105, 'admin', NULL, NULL, NULL, '00000001885'),
('00000001886', '00090', -8.287216, 113.971963, 'admin', NULL, NULL, NULL, '00000001886'),
('00000001887', '00090', -8.288846, 113.974260, 'admin', NULL, NULL, NULL, '00000001887'),
('00000001888', '00090', -8.289792, 113.973543, 'admin', NULL, NULL, NULL, '00000001888'),
('00000001889', '00091', -8.287375, 113.968767, 'admin', NULL, NULL, NULL, '00000001889'),
('00000001890', '00091', -8.288719, 113.970665, 'admin', NULL, NULL, NULL, '00000001890'),
('00000001891', '00091', -8.289039, 113.971486, 'admin', NULL, NULL, NULL, '00000001891'),
('00000001892', '00092', -8.289167, 113.968538, 'admin', NULL, NULL, NULL, '00000001892'),
('00000001893', '00092', -8.289706, 113.970020, 'admin', NULL, NULL, NULL, '00000001893'),
('00000001894', '00093', -8.289870, 113.969915, 'admin', NULL, NULL, NULL, '00000001894'),
('00000001895', '00093', -8.290342, 113.971455, 'admin', NULL, NULL, NULL, '00000001895'),
('00000001896', '00163', -8.294323, 113.967304, 'admin', NULL, NULL, NULL, '00000001896'),
('00000001897', '00163', -8.295191, 113.971594, 'admin', NULL, NULL, NULL, '00000001897'),
('00000001898', '00163', -8.298261, 113.971296, 'admin', NULL, NULL, NULL, '00000001898'),
('00000001899', '00094', -8.284346, 113.974356, 'admin', NULL, NULL, NULL, '00000001899'),
('00000001900', '00094', -8.287013, 113.972105, 'admin', NULL, NULL, NULL, '00000001900'),
('00000001901', '00094', -8.287216, 113.971963, 'admin', NULL, NULL, NULL, '00000001901'),
('00000001902', '00094', -8.287268, 113.971927, 'admin', NULL, NULL, NULL, '00000001902'),
('00000001903', '00094', -8.286978, 113.971227, 'admin', NULL, NULL, NULL, '00000001903'),
('00000001904', '00164', -8.287268, 113.971927, 'admin', NULL, NULL, NULL, '00000001904'),
('00000001905', '00164', -8.288719, 113.970665, 'admin', NULL, NULL, NULL, '00000001905'),
('00000001906', '00164', -8.289706, 113.970020, 'admin', NULL, NULL, NULL, '00000001906'),
('00000001907', '00164', -8.289870, 113.969915, 'admin', NULL, NULL, NULL, '00000001907'),
('00000001908', '00164', -8.294323, 113.967304, 'admin', NULL, NULL, NULL, '00000001908'),
('00000001909', '00164', -8.299586, 113.964653, 'admin', NULL, NULL, NULL, '00000001909'),
('00000001910', '00086', -8.269434, 113.962067, 'admin', NULL, NULL, NULL, '00000001910'),
('00000001911', '00086', -8.266279, 113.970129, 'admin', NULL, NULL, NULL, '00000001911'),
('00000001912', '00086', -8.265752, 113.978103, 'admin', NULL, NULL, NULL, '00000001912'),
('00000001913', '00087', -8.273982, 113.969558, 'admin', NULL, NULL, NULL, '00000001913'),
('00000001914', '00087', -8.269885, 113.977895, 'admin', NULL, NULL, NULL, '00000001914'),
('00000001915', '00088', -8.246820, 113.982728, 'admin', NULL, NULL, NULL, '00000001915'),
('00000001916', '00088', -8.253217, 113.978124, 'admin', NULL, NULL, NULL, '00000001916'),
('00000001917', '00088', -8.253229, 113.977891, 'admin', NULL, NULL, NULL, '00000001917'),
('00000001918', '00088', -8.254556, 113.977011, 'admin', NULL, NULL, NULL, '00000001918'),
('00000001919', '00088', -8.254814, 113.977259, 'admin', NULL, NULL, NULL, '00000001919'),
('00000001920', '00088', -8.255276, 113.976932, 'admin', NULL, NULL, NULL, '00000001920'),
('00000001921', '00088', -8.255917, 113.976978, 'admin', NULL, NULL, NULL, '00000001921'),
('00000001922', '00088', -8.256107, 113.977078, 'admin', NULL, NULL, NULL, '00000001922'),
('00000001923', '00088', -8.256390, 113.977138, 'admin', NULL, NULL, NULL, '00000001923'),
('00000001924', '00088', -8.257241, 113.977765, 'admin', NULL, NULL, NULL, '00000001924'),
('00000001925', '00088', -8.259401, 113.977689, 'admin', NULL, NULL, NULL, '00000001925'),
('00000001926', '00088', -8.262328, 113.978115, 'admin', NULL, NULL, NULL, '00000001926'),
('00000001927', '00088', -8.263699, 113.978316, 'admin', NULL, NULL, NULL, '00000001927'),
('00000001928', '00088', -8.265752, 113.978103, 'admin', NULL, NULL, NULL, '00000001928'),
('00000001929', '00088', -8.265832, 113.978143, 'admin', NULL, NULL, NULL, '00000001929'),
('00000001930', '00088', -8.267475, 113.978141, 'admin', NULL, NULL, NULL, '00000001930'),
('00000001931', '00088', -8.268043, 113.977896, 'admin', NULL, NULL, NULL, '00000001931'),
('00000001932', '00088', -8.269885, 113.977895, 'admin', NULL, NULL, NULL, '00000001932'),
('00000001933', '00025', -8.512305, 114.256288, 'admin', NULL, NULL, NULL, '00000001933'),
('00000001934', '00025', -8.512033, 114.256248, 'admin', NULL, NULL, NULL, '00000001934'),
('00000001935', '00025', -8.512036, 114.252287, 'admin', NULL, NULL, NULL, '00000001935'),
('00000001936', '00025', -8.513764, 114.252262, 'admin', NULL, NULL, NULL, '00000001936'),
('00000001937', '00025', -8.514710, 114.252227, 'admin', NULL, NULL, NULL, '00000001937'),
('00000001938', '00025', -8.514830, 114.256516, 'admin', NULL, NULL, NULL, '00000001938'),
('00000001939', '00023', -8.514710, 114.252227, 'admin', NULL, NULL, NULL, '00000001939'),
('00000001940', '00023', -8.514830, 114.256516, 'admin', NULL, NULL, NULL, '00000001940'),
('00000001941', '00022', -8.513764, 114.252262, 'admin', NULL, NULL, NULL, '00000001941'),
('00000001942', '00022', -8.513869, 114.256753, 'admin', NULL, NULL, NULL, '00000001942'),
('00000001943', '00026', -8.511142, 114.256577, 'admin', NULL, NULL, NULL, '00000001943'),
('00000001944', '00026', -8.511104, 114.252322, 'admin', NULL, NULL, NULL, '00000001944'),
('00000001945', '00026', -8.511881, 114.252307, 'admin', NULL, NULL, NULL, '00000001945'),
('00000001946', '00165', -8.514710, 114.252227, 'admin', NULL, NULL, NULL, '00000001946'),
('00000001947', '00165', -8.519161, 114.252144, 'admin', NULL, NULL, NULL, '00000001947'),
('00000001948', '00165', -8.519172, 114.252342, 'admin', NULL, NULL, NULL, '00000001948'),
('00000001949', '00165', -8.517697, 114.253089, 'admin', NULL, NULL, NULL, '00000001949'),
('00000001950', '00165', -8.516797, 114.253967, 'admin', NULL, NULL, NULL, '00000001950'),
('00000001951', '00165', -8.514610, 114.256804, 'admin', NULL, NULL, NULL, '00000001951'),
('00000001952', '00165', -8.512975, 114.256663, 'admin', NULL, NULL, NULL, '00000001952'),
('00000001953', '00165', -8.512993, 114.258873, 'admin', NULL, NULL, NULL, '00000001953'),
('00000001954', '00165', -8.512112, 114.259657, 'admin', NULL, NULL, NULL, '00000001954'),
('00000001955', '00027', -8.476035, 114.222264, 'admin', NULL, NULL, NULL, '00000001955'),
('00000001956', '00027', -8.477210, 114.222053, 'admin', NULL, NULL, NULL, '00000001956'),
('00000001957', '00027', -8.478579, 114.221889, 'admin', NULL, NULL, NULL, '00000001957'),
('00000001958', '00027', -8.479001, 114.224089, 'admin', NULL, NULL, NULL, '00000001958'),
('00000001959', '00028', -8.477210, 114.220764, 'admin', NULL, NULL, NULL, '00000001959'),
('00000001960', '00028', -8.477647, 114.224940, 'admin', NULL, NULL, NULL, '00000001960'),
('00000001961', '00029', -8.474469, 114.222572, 'admin', NULL, NULL, NULL, '00000001961'),
('00000001962', '00029', -8.475318, 114.225488, 'admin', NULL, NULL, NULL, '00000001962'),
('00000001963', '00029', -8.475801, 114.225438, 'admin', NULL, NULL, NULL, '00000001963'),
('00000001964', '00029', -8.477284, 114.229799, 'admin', NULL, NULL, NULL, '00000001964'),
('00000001965', '00029', -8.479901, 114.228653, 'admin', NULL, NULL, NULL, '00000001965'),
('00000001966', '00030', -8.478628, 114.226692, 'admin', NULL, NULL, NULL, '00000001966'),
('00000001967', '00030', -8.476497, 114.227502, 'admin', NULL, NULL, NULL, '00000001967'),
('00000001968', '00030', -8.473984, 114.228839, 'admin', NULL, NULL, NULL, '00000001968'),
('00000001969', '00031', -8.473858, 114.222621, 'admin', NULL, NULL, NULL, '00000001969'),
('00000001970', '00031', -8.474210, 114.225666, 'admin', NULL, NULL, NULL, '00000001970'),
('00000001971', '00032', -8.472583, 114.223659, 'admin', NULL, NULL, NULL, '00000001971'),
('00000001972', '00032', -8.472122, 114.223760, 'admin', NULL, NULL, NULL, '00000001972'),
('00000001973', '00032', -8.472277, 114.224834, 'admin', NULL, NULL, NULL, '00000001973'),
('00000001974', '00032', -8.472462, 114.226037, 'admin', NULL, NULL, NULL, '00000001974'),
('00000001975', '00033', -8.472438, 114.222712, 'admin', NULL, NULL, NULL, '00000001975'),
('00000001976', '00033', -8.472583, 114.223659, 'admin', NULL, NULL, NULL, '00000001976'),
('00000001977', '00033', -8.472762, 114.224780, 'admin', NULL, NULL, NULL, '00000001977'),
('00000001978', '00033', -8.472934, 114.225943, 'admin', NULL, NULL, NULL, '00000001978'),
('00000001979', '00033', -8.473428, 114.225846, 'admin', NULL, NULL, NULL, '00000001979'),
('00000001980', '00166', -8.472934, 114.225943, 'admin', NULL, NULL, NULL, '00000001980'),
('00000001981', '00166', -8.473428, 114.225846, 'admin', NULL, NULL, NULL, '00000001981'),
('00000001982', '00166', -8.472943, 114.222643, 'admin', NULL, NULL, NULL, '00000001982'),
('00000001983', '00166', -8.473858, 114.222621, 'admin', NULL, NULL, NULL, '00000001983'),
('00000001984', '00167', -8.478628, 114.226692, 'admin', NULL, NULL, NULL, '00000001984'),
('00000001985', '00167', -8.479901, 114.228653, 'admin', NULL, NULL, NULL, '00000001985'),
('00000002063', '00065', -8.412384, 114.102161, 'admin', NULL, NULL, NULL, '00000002063'),
('00000002064', '00065', -8.412645, 114.102999, 'admin', NULL, NULL, NULL, '00000002064'),
('00000002065', '00065', -8.413068, 114.105239, 'admin', NULL, NULL, NULL, '00000002065'),
('00000002066', '00071', -8.408912, 114.107222, 'admin', NULL, NULL, NULL, '00000002066'),
('00000002067', '00071', -8.408932, 114.108421, 'admin', NULL, NULL, NULL, '00000002067'),
('00000002068', '00072', -8.422867, 114.101903, 'admin', NULL, NULL, NULL, '00000002068'),
('00000002069', '00072', -8.426552, 114.101958, 'admin', NULL, NULL, NULL, '00000002069'),
('00000002070', '00072', -8.428839, 114.101025, 'admin', NULL, NULL, NULL, '00000002070'),
('00000002071', '00073', -8.407312, 114.107610, 'admin', NULL, NULL, NULL, '00000002071'),
('00000002072', '00073', -8.408912, 114.107222, 'admin', NULL, NULL, NULL, '00000002072'),
('00000002073', '00073', -8.410584, 114.106851, 'admin', NULL, NULL, NULL, '00000002073'),
('00000002074', '00073', -8.410427, 114.105591, 'admin', NULL, NULL, NULL, '00000002074'),
('00000002075', '00073', -8.410125, 114.103823, 'admin', NULL, NULL, NULL, '00000002075'),
('00000002076', '00073', -8.411778, 114.103076, 'admin', NULL, NULL, NULL, '00000002076'),
('00000002077', '00073', -8.412187, 114.105285, 'admin', NULL, NULL, NULL, '00000002077'),
('00000002078', '00074', -8.410427, 114.105591, 'admin', NULL, NULL, NULL, '00000002078'),
('00000002079', '00074', -8.412187, 114.105285, 'admin', NULL, NULL, NULL, '00000002079'),
('00000002080', '00074', -8.413096, 114.105150, 'admin', NULL, NULL, NULL, '00000002080'),
('00000002081', '00074', -8.415751, 114.104905, 'admin', NULL, NULL, NULL, '00000002081'),
('00000002082', '00074', -8.416327, 114.104853, 'admin', NULL, NULL, NULL, '00000002082'),
('00000002083', '00074', -8.416100, 114.102589, 'admin', NULL, NULL, NULL, '00000002083'),
('00000002084', '00074', -8.422867, 114.101903, 'admin', NULL, NULL, NULL, '00000002084'),
('00000002085', '00064', -8.454728, 114.157963, 'admin', NULL, NULL, NULL, '00000002085'),
('00000002086', '00064', -8.455510, 114.158575, 'admin', NULL, NULL, NULL, '00000002086'),
('00000002087', '00064', -8.458359, 114.158684, 'admin', NULL, NULL, NULL, '00000002087'),
('00000002088', '00048', -8.281208, 114.103181, 'admin', NULL, NULL, NULL, '00000002088'),
('00000002089', '00048', -8.289035, 114.104153, 'admin', NULL, NULL, NULL, '00000002089'),
('00000002090', '00048', -8.290389, 114.104229, 'admin', NULL, NULL, NULL, '00000002090'),
('00000002091', '00048', -8.292884, 114.104507, 'admin', NULL, NULL, NULL, '00000002091'),
('00000002092', '00048', -8.295302, 114.104555, 'admin', NULL, NULL, NULL, '00000002092'),
('00000002093', '00048', -8.296193, 114.104586, 'admin', NULL, NULL, NULL, '00000002093'),
('00000002094', '00048', -8.297834, 114.104225, 'admin', NULL, NULL, NULL, '00000002094'),
('00000002095', '00048', -8.298092, 114.104171, 'admin', NULL, NULL, NULL, '00000002095'),
('00000002096', '00049', -8.297334, 114.102048, 'admin', NULL, NULL, NULL, '00000002096'),
('00000002097', '00049', -8.295584, 114.102420, 'admin', NULL, NULL, NULL, '00000002097'),
('00000002098', '00049', -8.295302, 114.104555, 'admin', NULL, NULL, NULL, '00000002098'),
('00000002099', '00049', -8.295145, 114.105569, 'admin', NULL, NULL, NULL, '00000002099'),
('00000002100', '00049', -8.296027, 114.105806, 'admin', NULL, NULL, NULL, '00000002100'),
('00000002101', '00050', -8.262883, 114.097815, 'admin', NULL, NULL, NULL, '00000002101'),
('00000002102', '00050', -8.262925, 114.097761, 'admin', NULL, NULL, NULL, '00000002102'),
('00000002103', '00050', -8.263808, 114.097396, 'admin', NULL, NULL, NULL, '00000002103'),
('00000002104', '00050', -8.264597, 114.096365, 'admin', NULL, NULL, NULL, '00000002104'),
('00000002105', '00050', -8.265249, 114.095940, 'admin', NULL, NULL, NULL, '00000002105'),
('00000002106', '00050', -8.265456, 114.096004, 'admin', NULL, NULL, NULL, '00000002106'),
('00000002107', '00050', -8.265858, 114.095911, 'admin', NULL, NULL, NULL, '00000002107'),
('00000002108', '00050', -8.266761, 114.095978, 'admin', NULL, NULL, NULL, '00000002108'),
('00000002109', '00050', -8.266941, 114.095944, 'admin', NULL, NULL, NULL, '00000002109'),
('00000002110', '00050', -8.267724, 114.095508, 'admin', NULL, NULL, NULL, '00000002110'),
('00000002111', '00050', -8.269713, 114.096665, 'admin', NULL, NULL, NULL, '00000002111'),
('00000002112', '00050', -8.270983, 114.097645, 'admin', NULL, NULL, NULL, '00000002112'),
('00000002113', '00050', -8.271390, 114.097639, 'admin', NULL, NULL, NULL, '00000002113'),
('00000002114', '00050', -8.271565, 114.101170, 'admin', NULL, NULL, NULL, '00000002114'),
('00000002115', '00050', -8.275227, 114.103199, 'admin', NULL, NULL, NULL, '00000002115'),
('00000002116', '00050', -8.276334, 114.103742, 'admin', NULL, NULL, NULL, '00000002116'),
('00000002117', '00050', -8.277990, 114.103757, 'admin', NULL, NULL, NULL, '00000002117'),
('00000002118', '00050', -8.281208, 114.103181, 'admin', NULL, NULL, NULL, '00000002118'),
('00000002135', '00108', -8.175786, 114.251176, 'admin', NULL, NULL, NULL, '00000002135'),
('00000002136', '00108', -8.176199, 114.250857, 'admin', NULL, NULL, NULL, '00000002136'),
('00000002137', '00108', -8.176476, 114.250724, 'admin', NULL, NULL, NULL, '00000002137'),
('00000002138', '00108', -8.176535, 114.250744, 'admin', NULL, NULL, NULL, '00000002138'),
('00000002139', '00108', -8.176792, 114.250833, 'admin', NULL, NULL, NULL, '00000002139'),
('00000002140', '00108', -8.177071, 114.250797, 'admin', NULL, NULL, NULL, '00000002140'),
('00000002141', '00108', -8.177187, 114.250820, 'admin', NULL, NULL, NULL, '00000002141'),
('00000002142', '00108', -8.177297, 114.250915, 'admin', NULL, NULL, NULL, '00000002142'),
('00000002143', '00108', -8.177472, 114.251108, 'admin', NULL, NULL, NULL, '00000002143'),
('00000002144', '00108', -8.177596, 114.251195, 'admin', NULL, NULL, NULL, '00000002144'),
('00000002145', '00108', -8.177823, 114.251244, 'admin', NULL, NULL, NULL, '00000002145'),
('00000002146', '00108', -8.177920, 114.251341, 'admin', NULL, NULL, NULL, '00000002146'),
('00000002147', '00108', -8.178099, 114.251547, 'admin', NULL, NULL, NULL, '00000002147'),
('00000002148', '00108', -8.178426, 114.251766, 'admin', NULL, NULL, NULL, '00000002148'),
('00000002149', '00108', -8.179256, 114.252362, 'admin', NULL, NULL, NULL, '00000002149'),
('00000002150', '00108', -8.179892, 114.252768, 'admin', NULL, NULL, NULL, '00000002150'),
('00000002151', '00108', -8.179985, 114.252802, 'admin', NULL, NULL, NULL, '00000002151'),
('00000002152', '00108', -8.180527, 114.252906, 'admin', NULL, NULL, NULL, '00000002152'),
('00000002153', '00108', -8.180979, 114.253236, 'admin', NULL, NULL, NULL, '00000002153'),
('00000002154', '00108', -8.181018, 114.253290, 'admin', NULL, NULL, NULL, '00000002154'),
('00000002155', '00108', -8.181123, 114.253491, 'admin', NULL, NULL, NULL, '00000002155'),
('00000002156', '00108', -8.181177, 114.253558, 'admin', NULL, NULL, NULL, '00000002156'),
('00000002157', '00108', -8.181520, 114.253588, 'admin', NULL, NULL, NULL, '00000002157'),
('00000002158', '00108', -8.181723, 114.253748, 'admin', NULL, NULL, NULL, '00000002158'),
('00000002159', '00108', -8.182040, 114.254014, 'admin', NULL, NULL, NULL, '00000002159'),
('00000002160', '00108', -8.182689, 114.254333, 'admin', NULL, NULL, NULL, '00000002160'),
('00000002161', '00108', -8.183854, 114.255305, 'admin', NULL, NULL, NULL, '00000002161'),
('00000002162', '00108', -8.184398, 114.255704, 'admin', NULL, NULL, NULL, '00000002162'),
('00000002163', '00108', -8.185451, 114.256340, 'admin', NULL, NULL, NULL, '00000002163'),
('00000002164', '00108', -8.185549, 114.256555, 'admin', NULL, NULL, NULL, '00000002164'),
('00000002165', '00108', -8.186767, 114.259601, 'admin', NULL, NULL, NULL, '00000002165'),
('00000002166', '00108', -8.187002, 114.260087, 'admin', NULL, NULL, NULL, '00000002166'),
('00000002167', '00108', -8.187113, 114.260226, 'admin', NULL, NULL, NULL, '00000002167'),
('00000002168', '00108', -8.187182, 114.260246, 'admin', NULL, NULL, NULL, '00000002168'),
('00000002169', '00108', -8.187270, 114.260253, 'admin', NULL, NULL, NULL, '00000002169'),
('00000002170', '00108', -8.187971, 114.260137, 'admin', NULL, NULL, NULL, '00000002170'),
('00000002171', '00108', -8.188038, 114.260147, 'admin', NULL, NULL, NULL, '00000002171'),
('00000002172', '00108', -8.188394, 114.260400, 'admin', NULL, NULL, NULL, '00000002172'),
('00000002173', '00108', -8.188686, 114.261018, 'admin', NULL, NULL, NULL, '00000002173'),
('00000002174', '00106', -8.195666, 114.236696, 'admin', NULL, NULL, NULL, '00000002174'),
('00000002175', '00106', -8.195819, 114.236650, 'admin', NULL, NULL, NULL, '00000002175'),
('00000002176', '00106', -8.196039, 114.236667, 'admin', NULL, NULL, NULL, '00000002176'),
('00000002177', '00106', -8.196227, 114.236699, 'admin', NULL, NULL, NULL, '00000002177'),
('00000002178', '00106', -8.196675, 114.236977, 'admin', NULL, NULL, NULL, '00000002178'),
('00000002179', '00106', -8.196900, 114.237087, 'admin', NULL, NULL, NULL, '00000002179'),
('00000002180', '00106', -8.197092, 114.237189, 'admin', NULL, NULL, NULL, '00000002180'),
('00000002181', '00106', -8.197090, 114.237291, 'admin', NULL, NULL, NULL, '00000002181'),
('00000002182', '00106', -8.197087, 114.237406, 'admin', NULL, NULL, NULL, '00000002182'),
('00000002183', '00106', -8.197203, 114.237595, 'admin', NULL, NULL, NULL, '00000002183'),
('00000002184', '00106', -8.197573, 114.237765, 'admin', NULL, NULL, NULL, '00000002184'),
('00000002185', '00106', -8.198014, 114.237776, 'admin', NULL, NULL, NULL, '00000002185'),
('00000002186', '00106', -8.198061, 114.237797, 'admin', NULL, NULL, NULL, '00000002186'),
('00000002187', '00106', -8.198350, 114.237883, 'admin', NULL, NULL, NULL, '00000002187'),
('00000002188', '00106', -8.198618, 114.238298, 'admin', NULL, NULL, NULL, '00000002188'),
('00000002189', '00106', -8.198929, 114.238622, 'admin', NULL, NULL, NULL, '00000002189'),
('00000002190', '00106', -8.199145, 114.239024, 'admin', NULL, NULL, NULL, '00000002190'),
('00000002191', '00106', -8.199268, 114.239427, 'admin', NULL, NULL, NULL, '00000002191'),
('00000002192', '00106', -8.199341, 114.239536, 'admin', NULL, NULL, NULL, '00000002192'),
('00000002193', '00106', -8.199768, 114.239669, 'admin', NULL, NULL, NULL, '00000002193'),
('00000002194', '00106', -8.200072, 114.239830, 'admin', NULL, NULL, NULL, '00000002194'),
('00000002195', '00106', -8.200194, 114.240257, 'admin', NULL, NULL, NULL, '00000002195'),
('00000002196', '00106', -8.200216, 114.240386, 'admin', NULL, NULL, NULL, '00000002196'),
('00000002197', '00106', -8.200211, 114.240658, 'admin', NULL, NULL, NULL, '00000002197'),
('00000002198', '00106', -8.200443, 114.240920, 'admin', NULL, NULL, NULL, '00000002198'),
('00000002199', '00106', -8.200713, 114.241306, 'admin', NULL, NULL, NULL, '00000002199'),
('00000002200', '00106', -8.200981, 114.241631, 'admin', NULL, NULL, NULL, '00000002200'),
('00000002201', '00106', -8.201239, 114.242006, 'admin', NULL, NULL, NULL, '00000002201'),
('00000002202', '00106', -8.201323, 114.242448, 'admin', NULL, NULL, NULL, '00000002202'),
('00000002203', '00106', -8.201359, 114.242900, 'admin', NULL, NULL, NULL, '00000002203'),
('00000002204', '00106', -8.201439, 114.243360, 'admin', NULL, NULL, NULL, '00000002204'),
('00000002205', '00106', -8.201438, 114.243570, 'admin', NULL, NULL, NULL, '00000002205'),
('00000002206', '00106', -8.201323, 114.243770, 'admin', NULL, NULL, NULL, '00000002206'),
('00000002207', '00106', -8.201042, 114.244127, 'admin', NULL, NULL, NULL, '00000002207'),
('00000002208', '00106', -8.200748, 114.244460, 'admin', NULL, NULL, NULL, '00000002208'),
('00000002209', '00106', -8.200464, 114.244824, 'admin', NULL, NULL, NULL, '00000002209'),
('00000002210', '00106', -8.200170, 114.245292, 'admin', NULL, NULL, NULL, '00000002210'),
('00000002211', '00106', -8.200319, 114.245574, 'admin', NULL, NULL, NULL, '00000002211'),
('00000002212', '00106', -8.200516, 114.245968, 'admin', NULL, NULL, NULL, '00000002212'),
('00000002213', '00106', -8.200575, 114.246105, 'admin', NULL, NULL, NULL, '00000002213'),
('00000002214', '00106', -8.200852, 114.246734, 'admin', NULL, NULL, NULL, '00000002214'),
('00000002215', '00106', -8.201072, 114.247126, 'admin', NULL, NULL, NULL, '00000002215'),
('00000002216', '00106', -8.201411, 114.247405, 'admin', NULL, NULL, NULL, '00000002216'),
('00000002217', '00106', -8.201467, 114.247376, 'admin', NULL, NULL, NULL, '00000002217'),
('00000002218', '00106', -8.201873, 114.247399, 'admin', NULL, NULL, NULL, '00000002218'),
('00000002219', '00106', -8.202264, 114.247524, 'admin', NULL, NULL, NULL, '00000002219'),
('00000002220', '00106', -8.202599, 114.247457, 'admin', NULL, NULL, NULL, '00000002220'),
('00000002221', '00106', -8.202670, 114.247544, 'admin', NULL, NULL, NULL, '00000002221'),
('00000002222', '00106', -8.202855, 114.247749, 'admin', NULL, NULL, NULL, '00000002222'),
('00000002223', '00106', -8.203028, 114.247805, 'admin', NULL, NULL, NULL, '00000002223'),
('00000002224', '00106', -8.203219, 114.247783, 'admin', NULL, NULL, NULL, '00000002224'),
('00000002225', '00106', -8.203237, 114.247908, 'admin', NULL, NULL, NULL, '00000002225'),
('00000002226', '00106', -8.203087, 114.248189, 'admin', NULL, NULL, NULL, '00000002226'),
('00000002227', '00106', -8.203129, 114.248649, 'admin', NULL, NULL, NULL, '00000002227'),
('00000002228', '00106', -8.203345, 114.249015, 'admin', NULL, NULL, NULL, '00000002228'),
('00000002229', '00106', -8.203325, 114.249180, 'admin', NULL, NULL, NULL, '00000002229'),
('00000002230', '00106', -8.203398, 114.249207, 'admin', NULL, NULL, NULL, '00000002230'),
('00000002231', '00106', -8.203588, 114.249426, 'admin', NULL, NULL, NULL, '00000002231'),
('00000002232', '00106', -8.203560, 114.249605, 'admin', NULL, NULL, NULL, '00000002232'),
('00000002233', '00106', -8.203505, 114.249663, 'admin', NULL, NULL, NULL, '00000002233'),
('00000002234', '00106', -8.203248, 114.249898, 'admin', NULL, NULL, NULL, '00000002234'),
('00000002235', '00106', -8.203181, 114.250116, 'admin', NULL, NULL, NULL, '00000002235'),
('00000002236', '00106', -8.203132, 114.250240, 'admin', NULL, NULL, NULL, '00000002236'),
('00000002237', '00106', -8.203474, 114.250465, 'admin', NULL, NULL, NULL, '00000002237'),
('00000002238', '00106', -8.203918, 114.250628, 'admin', NULL, NULL, NULL, '00000002238'),
('00000002239', '00106', -8.204303, 114.250852, 'admin', NULL, NULL, NULL, '00000002239'),
('00000002240', '00106', -8.204526, 114.251078, 'admin', NULL, NULL, NULL, '00000002240'),
('00000002241', '00106', -8.204991, 114.251427, 'admin', NULL, NULL, NULL, '00000002241'),
('00000002242', '00106', -8.205017, 114.251560, 'admin', NULL, NULL, NULL, '00000002242'),
('00000002243', '00106', -8.205226, 114.251809, 'admin', NULL, NULL, NULL, '00000002243'),
('00000002244', '00106', -8.205427, 114.252176, 'admin', NULL, NULL, NULL, '00000002244'),
('00000002245', '00106', -8.205749, 114.252492, 'admin', NULL, NULL, NULL, '00000002245'),
('00000002246', '00106', -8.206069, 114.252791, 'admin', NULL, NULL, NULL, '00000002246'),
('00000002247', '00106', -8.206260, 114.252877, 'admin', NULL, NULL, NULL, '00000002247'),
('00000002248', '00106', -8.206147, 114.253080, 'admin', NULL, NULL, NULL, '00000002248'),
('00000002249', '00106', -8.205909, 114.253476, 'admin', NULL, NULL, NULL, '00000002249'),
('00000002250', '00106', -8.205974, 114.253543, 'admin', NULL, NULL, NULL, '00000002250'),
('00000002251', '00106', -8.206034, 114.253577, 'admin', NULL, NULL, NULL, '00000002251'),
('00000002300', '00043', -8.292363, 114.053514, 'admin', NULL, NULL, NULL, '00000002300'),
('00000002301', '00043', -8.295952, 114.052733, 'admin', NULL, NULL, NULL, '00000002301'),
('00000002302', '00043', -8.299963, 114.052166, 'admin', NULL, NULL, NULL, '00000002302'),
('00000002303', '00043', -8.308412, 114.051955, 'admin', NULL, NULL, NULL, '00000002303'),
('00000002304', '00043', -8.313673, 114.051824, 'admin', NULL, NULL, NULL, '00000002304'),
('00000002305', '00044', -8.299963, 114.052166, 'admin', NULL, NULL, NULL, '00000002305'),
('00000002306', '00044', -8.300184, 114.054151, 'admin', NULL, NULL, NULL, '00000002306'),
('00000002307', '00044', -8.300411, 114.055576, 'admin', NULL, NULL, NULL, '00000002307'),
('00000002308', '00044', -8.313660, 114.055521, 'admin', NULL, NULL, NULL, '00000002308'),
('00000002309', '00045', -8.299963, 114.052166, 'admin', NULL, NULL, NULL, '00000002309'),
('00000002310', '00045', -8.299403, 114.045701, 'admin', NULL, NULL, NULL, '00000002310'),
('00000002311', '00045', -8.308260, 114.045032, 'admin', NULL, NULL, NULL, '00000002311'),
('00000002312', '00045', -8.308412, 114.051955, 'admin', NULL, NULL, NULL, '00000002312'),
('00000002333', '00051', -8.457163, 114.261621, 'admin', NULL, NULL, NULL, '00000002333'),
('00000002334', '00051', -8.461063, 114.263119, 'admin', NULL, NULL, NULL, '00000002334'),
('00000002335', '00051', -8.463158, 114.263912, 'admin', NULL, NULL, NULL, '00000002335'),
('00000002336', '00158', -8.457163, 114.261621, 'admin', NULL, NULL, NULL, '00000002336'),
('00000002337', '00158', -8.459733, 114.260337, 'admin', NULL, NULL, NULL, '00000002337'),
('00000002338', '00169', -8.460294, 114.261085, 'admin', NULL, NULL, NULL, '00000002338'),
('00000002339', '00169', -8.459503, 114.261508, 'admin', NULL, NULL, NULL, '00000002339'),
('00000002340', '00170', -8.458740, 114.258522, 'admin', NULL, NULL, NULL, '00000002340'),
('00000002341', '00170', -8.459733, 114.260337, 'admin', NULL, NULL, NULL, '00000002341'),
('00000002342', '00170', -8.460294, 114.261085, 'admin', NULL, NULL, NULL, '00000002342'),
('00000002343', '00170', -8.460617, 114.261608, 'admin', NULL, NULL, NULL, '00000002343'),
('00000002344', '00170', -8.461030, 114.262435, 'admin', NULL, NULL, NULL, '00000002344'),
('00000002345', '00170', -8.461093, 114.262688, 'admin', NULL, NULL, NULL, '00000002345'),
('00000002346', '00170', -8.461063, 114.263119, 'admin', NULL, NULL, NULL, '00000002346'),
('00000002347', '00171', -8.461538, 114.260566, 'admin', NULL, NULL, NULL, '00000002347'),
('00000002348', '00171', -8.460617, 114.261608, 'admin', NULL, NULL, NULL, '00000002348'),
('00000002349', '00172', -8.461381, 114.257208, 'admin', NULL, NULL, NULL, '00000002349'),
('00000002350', '00172', -8.463350, 114.256717, 'admin', NULL, NULL, NULL, '00000002350'),
('00000002351', '00172', -8.463673, 114.258645, 'admin', NULL, NULL, NULL, '00000002351'),
('00000002352', '00172', -8.463604, 114.259098, 'admin', NULL, NULL, NULL, '00000002352'),
('00000002353', '00172', -8.463638, 114.259256, 'admin', NULL, NULL, NULL, '00000002353'),
('00000002354', '00172', -8.463158, 114.263912, 'admin', NULL, NULL, NULL, '00000002354'),
('00000002355', '00173', -8.463638, 114.259256, 'admin', NULL, NULL, NULL, '00000002355'),
('00000002356', '00173', -8.465964, 114.259123, 'admin', NULL, NULL, NULL, '00000002356'),
('00000002357', '00174', -8.466046, 114.258148, 'admin', NULL, NULL, NULL, '00000002357'),
('00000002358', '00174', -8.465964, 114.259123, 'admin', NULL, NULL, NULL, '00000002358'),
('00000002359', '00174', -8.465998, 114.260392, 'admin', NULL, NULL, NULL, '00000002359'),
('00000002360', '00052', -8.459733, 114.260337, 'admin', NULL, NULL, NULL, '00000002360'),
('00000002361', '00052', -8.461896, 114.259196, 'admin', NULL, NULL, NULL, '00000002361'),
('00000002362', '00052', -8.462371, 114.259078, 'admin', NULL, NULL, NULL, '00000002362'),
('00000002363', '00052', -8.462661, 114.259021, 'admin', NULL, NULL, NULL, '00000002363'),
('00000002364', '00052', -8.463604, 114.259098, 'admin', NULL, NULL, NULL, '00000002364'),
('00000002365', '00060', -8.213286, 114.319458, 'admin', NULL, NULL, NULL, '00000002365'),
('00000002366', '00060', -8.214234, 114.321426, 'admin', NULL, NULL, NULL, '00000002366'),
('00000002367', '00060', -8.214515, 114.322414, 'admin', NULL, NULL, NULL, '00000002367'),
('00000002368', '00060', -8.214714, 114.323424, 'admin', NULL, NULL, NULL, '00000002368'),
('00000002369', '00061', -8.215942, 114.320855, 'admin', NULL, NULL, NULL, '00000002369'),
('00000002370', '00061', -8.214857, 114.321168, 'admin', NULL, NULL, NULL, '00000002370'),
('00000002371', '00061', -8.214384, 114.321327, 'admin', NULL, NULL, NULL, '00000002371'),
('00000002372', '00061', -8.214234, 114.321426, 'admin', NULL, NULL, NULL, '00000002372'),
('00000002373', '00061', -8.213864, 114.321519, 'admin', NULL, NULL, NULL, '00000002373'),
('00000002374', '00061', -8.213702, 114.321609, 'admin', NULL, NULL, NULL, '00000002374'),
('00000002375', '00061', -8.213710, 114.322193, 'admin', NULL, NULL, NULL, '00000002375'),
('00000002376', '00061', -8.213595, 114.322724, 'admin', NULL, NULL, NULL, '00000002376'),
('00000002377', '00061', -8.213566, 114.323142, 'admin', NULL, NULL, NULL, '00000002377'),
('00000002378', '00062', -8.213269, 114.322271, 'admin', NULL, NULL, NULL, '00000002378'),
('00000002379', '00062', -8.213158, 114.322571, 'admin', NULL, NULL, NULL, '00000002379'),
('00000002380', '00062', -8.213186, 114.322905, 'admin', NULL, NULL, NULL, '00000002380'),
('00000002381', '00062', -8.213566, 114.323142, 'admin', NULL, NULL, NULL, '00000002381'),
('00000002382', '00062', -8.214092, 114.323471, 'admin', NULL, NULL, NULL, '00000002382'),
('00000002383', '00062', -8.214714, 114.323424, 'admin', NULL, NULL, NULL, '00000002383'),
('00000002384', '00062', -8.215138, 114.323344, 'admin', NULL, NULL, NULL, '00000002384'),
('00000002385', '00062', -8.216244, 114.323213, 'admin', NULL, NULL, NULL, '00000002385'),
('00000002386', '00070', -8.216105, 114.322075, 'admin', NULL, NULL, NULL, '00000002386'),
('00000002387', '00070', -8.215222, 114.322237, 'admin', NULL, NULL, NULL, '00000002387'),
('00000002388', '00070', -8.214802, 114.322328, 'admin', NULL, NULL, NULL, '00000002388'),
('00000002389', '00070', -8.214515, 114.322414, 'admin', NULL, NULL, NULL, '00000002389'),
('00000002390', '00070', -8.214035, 114.322538, 'admin', NULL, NULL, NULL, '00000002390'),
('00000002391', '00070', -8.213595, 114.322724, 'admin', NULL, NULL, NULL, '00000002391'),
('00000002392', '00069', -8.206371, 114.316788, 'admin', NULL, NULL, NULL, '00000002392'),
('00000002393', '00069', -8.206515, 114.317227, 'admin', NULL, NULL, NULL, '00000002393'),
('00000002394', '00069', -8.206624, 114.317693, 'admin', NULL, NULL, NULL, '00000002394'),
('00000002395', '00069', -8.207278, 114.318020, 'admin', NULL, NULL, NULL, '00000002395'),
('00000002396', '00069', -8.207462, 114.318079, 'admin', NULL, NULL, NULL, '00000002396'),
('00000002397', '00069', -8.207765, 114.318267, 'admin', NULL, NULL, NULL, '00000002397'),
('00000002398', '00069', -8.208024, 114.318520, 'admin', NULL, NULL, NULL, '00000002398'),
('00000002399', '00069', -8.208151, 114.318672, 'admin', NULL, NULL, NULL, '00000002399'),
('00000002400', '00069', -8.208346, 114.318960, 'admin', NULL, NULL, NULL, '00000002400'),
('00000002401', '00069', -8.208704, 114.319102, 'admin', NULL, NULL, NULL, '00000002401'),
('00000002402', '00069', -8.209072, 114.319267, 'admin', NULL, NULL, NULL, '00000002402'),
('00000002403', '00069', -8.209392, 114.319376, 'admin', NULL, NULL, NULL, '00000002403'),
('00000002404', '00069', -8.209741, 114.319408, 'admin', NULL, NULL, NULL, '00000002404'),
('00000002405', '00069', -8.210078, 114.319413, 'admin', NULL, NULL, NULL, '00000002405'),
('00000002406', '00069', -8.210404, 114.319370, 'admin', NULL, NULL, NULL, '00000002406'),
('00000002407', '00069', -8.210998, 114.319236, 'admin', NULL, NULL, NULL, '00000002407'),
('00000002408', '00069', -8.211358, 114.319201, 'admin', NULL, NULL, NULL, '00000002408'),
('00000002409', '00069', -8.211586, 114.319269, 'admin', NULL, NULL, NULL, '00000002409'),
('00000002410', '00069', -8.211941, 114.319354, 'admin', NULL, NULL, NULL, '00000002410'),
('00000002411', '00069', -8.212603, 114.319499, 'admin', NULL, NULL, NULL, '00000002411'),
('00000002412', '00069', -8.212946, 114.319497, 'admin', NULL, NULL, NULL, '00000002412'),
('00000002413', '00069', -8.213286, 114.319458, 'admin', NULL, NULL, NULL, '00000002413'),
('00000002414', '00069', -8.213949, 114.319346, 'admin', NULL, NULL, NULL, '00000002414'),
('00000002415', '00069', -8.214304, 114.319338, 'admin', NULL, NULL, NULL, '00000002415'),
('00000002416', '00069', -8.214760, 114.319343, 'admin', NULL, NULL, NULL, '00000002416'),
('00000002417', '00069', -8.215921, 114.319070, 'admin', NULL, NULL, NULL, '00000002417'),
('00000002418', '00069', -8.215942, 114.320855, 'admin', NULL, NULL, NULL, '00000002418'),
('00000002419', '00018', -8.560889, 114.060798, 'admin', NULL, NULL, NULL, '00000002419'),
('00000002420', '00018', -8.562388, 114.063122, 'admin', NULL, NULL, NULL, '00000002420'),
('00000002421', '00018', -8.562725, 114.063938, 'admin', NULL, NULL, NULL, '00000002421'),
('00000002422', '00018', -8.562674, 114.064422, 'admin', NULL, NULL, NULL, '00000002422'),
('00000002423', '00019', -8.561688, 114.060331, 'admin', NULL, NULL, NULL, '00000002423'),
('00000002424', '00019', -8.563207, 114.062663, 'admin', NULL, NULL, NULL, '00000002424'),
('00000002425', '00019', -8.563523, 114.064278, 'admin', NULL, NULL, NULL, '00000002425'),
('00000002426', '00020', -8.564036, 114.062204, 'admin', NULL, NULL, NULL, '00000002426'),
('00000002427', '00020', -8.563207, 114.062663, 'admin', NULL, NULL, NULL, '00000002427'),
('00000002428', '00020', -8.562388, 114.063122, 'admin', NULL, NULL, NULL, '00000002428'),
('00000002429', '00021', -8.572194, 114.059023, 'admin', NULL, NULL, NULL, '00000002429'),
('00000002430', '00021', -8.567250, 114.059584, 'admin', NULL, NULL, NULL, '00000002430'),
('00000002431', '00021', -8.563984, 114.059970, 'admin', NULL, NULL, NULL, '00000002431'),
('00000002432', '00021', -8.563067, 114.060566, 'admin', NULL, NULL, NULL, '00000002432'),
('00000002433', '00021', -8.564036, 114.062204, 'admin', NULL, NULL, NULL, '00000002433'),
('00000002434', '00021', -8.564313, 114.065327, 'admin', NULL, NULL, NULL, '00000002434'),
('00000002435', '00021', -8.566420, 114.065307, 'admin', NULL, NULL, NULL, '00000002435'),
('00000002436', '00175', -8.568045, 114.053761, 'admin', NULL, NULL, NULL, '00000002436'),
('00000002437', '00175', -8.568063, 114.053961, 'admin', NULL, NULL, NULL, '00000002437'),
('00000002438', '00175', -8.567042, 114.054073, 'admin', NULL, NULL, NULL, '00000002438'),
('00000002439', '00175', -8.567250, 114.059584, 'admin', NULL, NULL, NULL, '00000002439'),
('00000002440', '00006', -8.562437, 114.099032, 'admin', NULL, NULL, NULL, '00000002440'),
('00000002441', '00006', -8.562435, 114.098649, 'admin', NULL, NULL, NULL, '00000002441'),
('00000002442', '00006', -8.565840, 114.098524, 'admin', NULL, NULL, NULL, '00000002444'),
('00000002443', '00007', -8.566663, 114.096156, 'admin', NULL, NULL, NULL, '00000002445'),
('00000002444', '00007', -8.566776, 114.098390, 'admin', NULL, NULL, NULL, '00000002446'),
('00000002445', '00008', -8.567585, 114.096145, 'admin', NULL, NULL, NULL, '00000002447'),
('00000002446', '00008', -8.567718, 114.098314, 'admin', NULL, NULL, NULL, '00000002448'),
('00000002447', '00009', -8.568575, 114.096439, 'admin', NULL, NULL, NULL, '00000002449'),
('00000002448', '00009', -8.568672, 114.098293, 'admin', NULL, NULL, NULL, '00000002450'),
('00000002449', '00010', -8.569446, 114.096155, 'admin', NULL, NULL, NULL, '00000002451'),
('00000002450', '00010', -8.569585, 114.098238, 'admin', NULL, NULL, NULL, '00000002452'),
('00000002451', '00011', -8.570397, 114.095797, 'admin', NULL, NULL, NULL, '00000002453'),
('00000002452', '00011', -8.570525, 114.098202, 'admin', NULL, NULL, NULL, '00000002454'),
('00000002453', '00012', -8.571322, 114.095495, 'admin', NULL, NULL, NULL, '00000002455'),
('00000002454', '00012', -8.571465, 114.098165, 'admin', NULL, NULL, NULL, '00000002456'),
('00000002455', '00013', -8.572272, 114.095317, 'admin', NULL, NULL, NULL, '00000002457'),
('00000002456', '00013', -8.572419, 114.098142, 'admin', NULL, NULL, NULL, '00000002458'),
('00000002457', '00014', -8.573198, 114.095192, 'admin', NULL, NULL, NULL, '00000002459'),
('00000002458', '00014', -8.573313, 114.098080, 'admin', NULL, NULL, NULL, '00000002460'),
('00000002459', '00015', -8.574119, 114.095120, 'admin', NULL, NULL, NULL, '00000002461'),
('00000002460', '00015', -8.574213, 114.098043, 'admin', NULL, NULL, NULL, '00000002462'),
('00000002461', '00016', -8.565711, 114.096216, 'admin', NULL, NULL, NULL, '00000002463'),
('00000002462', '00016', -8.566663, 114.096156, 'admin', NULL, NULL, NULL, '00000002464'),
('00000002463', '00016', -8.567585, 114.096145, 'admin', NULL, NULL, NULL, '00000002465'),
('00000002464', '00016', -8.568575, 114.096439, 'admin', NULL, NULL, NULL, '00000002466'),
('00000002465', '00016', -8.569446, 114.096155, 'admin', NULL, NULL, NULL, '00000002467'),
('00000002466', '00016', -8.570397, 114.095797, 'admin', NULL, NULL, NULL, '00000002468'),
('00000002467', '00016', -8.571322, 114.095495, 'admin', NULL, NULL, NULL, '00000002469'),
('00000002468', '00016', -8.572272, 114.095317, 'admin', NULL, NULL, NULL, '00000002470'),
('00000002469', '00016', -8.573198, 114.095192, 'admin', NULL, NULL, NULL, '00000002471'),
('00000002470', '00016', -8.574119, 114.095120, 'admin', NULL, NULL, NULL, '00000002472'),
('00000002471', '00017', -8.565711, 114.096216, 'admin', NULL, NULL, NULL, '00000002473'),
('00000002472', '00017', -8.565842, 114.098510, 'admin', NULL, NULL, NULL, '00000002474'),
('00000002473', '00017', -8.566776, 114.098390, 'admin', NULL, NULL, NULL, '00000002475'),
('00000002474', '00017', -8.567718, 114.098314, 'admin', NULL, NULL, NULL, '00000002476'),
('00000002475', '00017', -8.568672, 114.098293, 'admin', NULL, NULL, NULL, '00000002477'),
('00000002476', '00017', -8.569585, 114.098238, 'admin', NULL, NULL, NULL, '00000002478'),
('00000002477', '00017', -8.570525, 114.098202, 'admin', NULL, NULL, NULL, '00000002479'),
('00000002478', '00017', -8.571465, 114.098165, 'admin', NULL, NULL, NULL, '00000002480'),
('00000002479', '00017', -8.572419, 114.098142, 'admin', NULL, NULL, NULL, '00000002481'),
('00000002480', '00017', -8.573313, 114.098080, 'admin', NULL, NULL, NULL, '00000002482'),
('00000002481', '00017', -8.574213, 114.098043, 'admin', NULL, NULL, NULL, '00000002483'),
('00000002482', '00017', -8.583635, 114.103469, 'admin', NULL, NULL, NULL, '00000002484'),
('00000002483', '00017', -8.584704, 114.104456, 'admin', NULL, NULL, NULL, '00000002485'),
('00000002484', '00017', -8.583708, 114.104394, 'admin', NULL, NULL, NULL, '00000002486'),
('00000002485', '00017', -8.583700, 114.105759, 'admin', NULL, NULL, NULL, '00000002487'),
('00000002486', '00034', -8.547916, 114.261010, 'admin', NULL, NULL, NULL, '00000002488'),
('00000002487', '00034', -8.547074, 114.261008, 'admin', NULL, NULL, NULL, '00000002489'),
('00000002488', '00034', -8.546213, 114.261031, 'admin', NULL, NULL, NULL, '00000002490'),
('00000002489', '00034', -8.546269, 114.262237, 'admin', NULL, NULL, NULL, '00000002491'),
('00000002490', '00035', -8.548070, 114.263436, 'admin', NULL, NULL, NULL, '00000002492'),
('00000002491', '00035', -8.547227, 114.263428, 'admin', NULL, NULL, NULL, '00000002493'),
('00000002492', '00036', -8.548088, 114.263324, 'admin', NULL, NULL, NULL, '00000002494'),
('00000002493', '00036', -8.548104, 114.263584, 'admin', NULL, NULL, NULL, '00000002495'),
('00000002494', '00036', -8.548151, 114.264322, 'admin', NULL, NULL, NULL, '00000002496'),
('00000002495', '00037', -8.548088, 114.263324, 'admin', NULL, NULL, NULL, '00000002497'),
('00000002496', '00037', -8.548104, 114.263584, 'admin', NULL, NULL, NULL, '00000002498'),
('00000002497', '00037', -8.548151, 114.264322, 'admin', NULL, NULL, NULL, '00000002499'),
('00000002498', '00038', -8.548088, 114.263324, 'admin', NULL, NULL, NULL, '00000002500'),
('00000002499', '00038', -8.549712, 114.263381, 'admin', NULL, NULL, NULL, '00000002501'),
('00000002500', '00039', -8.548104, 114.263584, 'admin', NULL, NULL, NULL, '00000002502'),
('00000002501', '00039', -8.549689, 114.263627, 'admin', NULL, NULL, NULL, '00000002503'),
('00000002502', '00040', -8.547243, 114.263851, 'admin', NULL, NULL, NULL, '00000002504'),
('00000002503', '00040', -8.548151, 114.264322, 'admin', NULL, NULL, NULL, '00000002505'),
('00000002504', '00040', -8.549816, 114.264359, 'admin', NULL, NULL, NULL, '00000002506'),
('00000002505', '00040', -8.551566, 114.264415, 'admin', NULL, NULL, NULL, '00000002507'),
('00000002506', '00040', -8.552447, 114.264454, 'admin', NULL, NULL, NULL, '00000002508'),
('00000002507', '00040', -8.552796, 114.268897, 'admin', NULL, NULL, NULL, '00000002509'),
('00000002508', '00040', -8.553711, 114.268961, 'admin', NULL, NULL, NULL, '00000002510'),
('00000002509', '00040', -8.554524, 114.268946, 'admin', NULL, NULL, NULL, '00000002511'),
('00000002510', '00040', -8.555319, 114.268917, 'admin', NULL, NULL, NULL, '00000002512'),
('00000002511', '00040', -8.560427, 114.268937, 'admin', NULL, NULL, NULL, '00000002513'),
('00000002512', '00040', -8.560218, 114.267338, 'admin', NULL, NULL, NULL, '00000002514'),
('00000002513', '00040', -8.569894, 114.267390, 'admin', NULL, NULL, NULL, '00000002515'),
('00000002514', '00041', -8.544535, 114.262017, 'admin', NULL, NULL, NULL, '00000002516'),
('00000002515', '00041', -8.544411, 114.259769, 'admin', NULL, NULL, NULL, '00000002517'),
('00000002516', '00041', -8.546953, 114.259897, 'admin', NULL, NULL, NULL, '00000002518'),
('00000002517', '00041', -8.547886, 114.259928, 'admin', NULL, NULL, NULL, '00000002519'),
('00000002518', '00041', -8.549566, 114.259984, 'admin', NULL, NULL, NULL, '00000002520'),
('00000002519', '00041', -8.551288, 114.260048, 'admin', NULL, NULL, NULL, '00000002521'),
('00000002520', '00041', -8.551480, 114.262914, 'admin', NULL, NULL, NULL, '00000002522'),
('00000002521', '00041', -8.551566, 114.264415, 'admin', NULL, NULL, NULL, '00000002523'),
('00000002528', '00077', -8.551372, 114.280529, 'admin', NULL, NULL, NULL, '00000002530'),
('00000002529', '00077', -8.553300, 114.285130, 'admin', NULL, NULL, NULL, '00000002531'),
('00000002530', '00078', -8.553300, 114.285130, 'admin', NULL, NULL, NULL, '00000002532'),
('00000002531', '00078', -8.552500, 114.285351, 'admin', NULL, NULL, NULL, '00000002533'),
('00000002532', '00078', -8.552098, 114.285399, 'admin', NULL, NULL, NULL, '00000002534'),
('00000002533', '00079', -8.552500, 114.285351, 'admin', NULL, NULL, NULL, '00000002535'),
('00000002534', '00079', -8.553170, 114.286572, 'admin', NULL, NULL, NULL, '00000002536'),
('00000002535', '00079', -8.556737, 114.290958, 'admin', NULL, NULL, NULL, '00000002537'),
('00000002536', '00079', -8.557298, 114.290930, 'admin', NULL, NULL, NULL, '00000002538'),
('00000002537', '00079', -8.558160, 114.293171, 'admin', NULL, NULL, NULL, '00000002539'),
('00000002538', '00079', -8.559350, 114.295021, 'admin', NULL, NULL, NULL, '00000002540'),
('00000002539', '00079', -8.559988, 114.295390, 'admin', NULL, NULL, NULL, '00000002541'),
('00000002540', '00080', -8.554548, 114.287511, 'admin', NULL, NULL, NULL, '00000002542'),
('00000002541', '00080', -8.555919, 114.287204, 'admin', NULL, NULL, NULL, '00000002543'),
('00000002542', '00080', -8.558956, 114.286523, 'admin', NULL, NULL, NULL, '00000002544'),
('00000002543', '00176', -8.555919, 114.287204, 'admin', NULL, NULL, NULL, '00000002545'),
('00000002544', '00176', -8.555885, 114.286958, 'admin', NULL, NULL, NULL, '00000002546'),
('00000002545', '00176', -8.555708, 114.286008, 'admin', NULL, NULL, NULL, '00000002547'),
('00000002546', '00176', -8.555658, 114.285692, 'admin', NULL, NULL, NULL, '00000002548'),
('00000002547', '00176', -8.557848, 114.285366, 'admin', NULL, NULL, NULL, '00000002549'),
('00000002548', '00081', -8.553300, 114.285130, 'admin', NULL, NULL, NULL, '00000002550'),
('00000002549', '00081', -8.554408, 114.285006, 'admin', NULL, NULL, NULL, '00000002551'),
('00000002550', '00081', -8.554560, 114.284932, 'admin', NULL, NULL, NULL, '00000002552'),
('00000002551', '00081', -8.555495, 114.284835, 'admin', NULL, NULL, NULL, '00000002553'),
('00000002552', '00081', -8.556831, 114.284621, 'admin', NULL, NULL, NULL, '00000002554'),
('00000002553', '00081', -8.558332, 114.284450, 'admin', NULL, NULL, NULL, '00000002555'),
('00000002554', '00081', -8.558251, 114.283565, 'admin', NULL, NULL, NULL, '00000002556'),
('00000002555', '00082', -8.554408, 114.285006, 'admin', NULL, NULL, NULL, '00000002557'),
('00000002556', '00082', -8.554548, 114.287511, 'admin', NULL, NULL, NULL, '00000002558'),
('00000002557', '00083', -8.554485, 114.282533, 'admin', NULL, NULL, NULL, '00000002559'),
('00000002558', '00083', -8.554560, 114.284932, 'admin', NULL, NULL, NULL, '00000002560'),
('00000002559', '00084', -8.555402, 114.282838, 'admin', NULL, NULL, NULL, '00000002561'),
('00000002560', '00084', -8.555439, 114.283958, 'admin', NULL, NULL, NULL, '00000002562'),
('00000002561', '00084', -8.555495, 114.284835, 'admin', NULL, NULL, NULL, '00000002563'),
('00000002562', '00084', -8.555658, 114.285692, 'admin', NULL, NULL, NULL, '00000002564'),
('00000002563', '00085', -8.555439, 114.283958, 'admin', NULL, NULL, NULL, '00000002565'),
('00000002564', '00085', -8.556956, 114.283736, 'admin', NULL, NULL, NULL, '00000002566'),
('00000002565', '00177', -8.555495, 114.284835, 'admin', NULL, NULL, NULL, '00000002567'),
('00000002566', '00177', -8.556831, 114.284621, 'admin', NULL, NULL, NULL, '00000002568'),
('00000002567', '00177', -8.558332, 114.284450, 'admin', NULL, NULL, NULL, '00000002569'),
('00000002568', '00177', -8.558251, 114.283565, 'admin', NULL, NULL, NULL, '00000002570'),
('00000002569', '00107', -8.192595, 114.262470, 'admin', NULL, NULL, NULL, '00000002571'),
('00000002570', '00107', -8.193748, 114.263175, 'admin', NULL, NULL, NULL, '00000002572'),
('00000002571', '00107', -8.194057, 114.263171, 'admin', NULL, NULL, NULL, '00000002573'),
('00000002572', '00107', -8.194142, 114.263294, 'admin', NULL, NULL, NULL, '00000002574'),
('00000002573', '00107', -8.194863, 114.264069, 'admin', NULL, NULL, NULL, '00000002575'),
('00000002574', '00107', -8.195582, 114.264371, 'admin', NULL, NULL, NULL, '00000002576'),
('00000002575', '00107', -8.196099, 114.264513, 'admin', NULL, NULL, NULL, '00000002577'),
('00000002576', '00107', -8.196452, 114.264826, 'admin', NULL, NULL, NULL, '00000002578'),
('00000002577', '00107', -8.196847, 114.265356, 'admin', NULL, NULL, NULL, '00000002579'),
('00000002578', '00107', -8.197274, 114.265724, 'admin', NULL, NULL, NULL, '00000002580'),
('00000002579', '00107', -8.197775, 114.266090, 'admin', NULL, NULL, NULL, '00000002581'),
('00000002580', '00107', -8.197808, 114.266152, 'admin', NULL, NULL, NULL, '00000002582'),
('00000002581', '00107', -8.197837, 114.266344, 'admin', NULL, NULL, NULL, '00000002583'),
('00000002582', '00107', -8.197903, 114.266488, 'admin', NULL, NULL, NULL, '00000002584');
INSERT INTO `pipa_koordinat` (`id`, `pipa_id`, `latitude`, `longitude`, `crt`, `crt_date`, `upd`, `upd_date`, `id_urut`) VALUES
('00000002583', '00107', -8.198154, 114.266632, 'admin', NULL, NULL, NULL, '00000002585'),
('00000002584', '00107', -8.198323, 114.266710, 'admin', NULL, NULL, NULL, '00000002586'),
('00000002585', '00107', -8.198451, 114.266884, 'admin', NULL, NULL, NULL, '00000002587'),
('00000002586', '00107', -8.198724, 114.267125, 'admin', NULL, NULL, NULL, '00000002588'),
('00000002587', '00107', -8.198751, 114.267188, 'admin', NULL, NULL, NULL, '00000002589'),
('00000002588', '00107', -8.198737, 114.267321, 'admin', NULL, NULL, NULL, '00000002590'),
('00000002589', '00107', -8.198781, 114.267360, 'admin', NULL, NULL, NULL, '00000002591'),
('00000002590', '00107', -8.199170, 114.267621, 'admin', NULL, NULL, NULL, '00000002592'),
('00000002591', '00107', -8.199327, 114.267742, 'admin', NULL, NULL, NULL, '00000002593'),
('00000002592', '00107', -8.199588, 114.268174, 'admin', NULL, NULL, NULL, '00000002594'),
('00000002593', '00107', -8.199674, 114.268268, 'admin', NULL, NULL, NULL, '00000002595'),
('00000002594', '00107', -8.199958, 114.268232, 'admin', NULL, NULL, NULL, '00000002596'),
('00000002595', '00107', -8.200607, 114.267992, 'admin', NULL, NULL, NULL, '00000002597'),
('00000002596', '00107', -8.200752, 114.267988, 'admin', NULL, NULL, NULL, '00000002598'),
('00000002597', '00107', -8.200888, 114.268021, 'admin', NULL, NULL, NULL, '00000002599'),
('00000002598', '00107', -8.201069, 114.268109, 'admin', NULL, NULL, NULL, '00000002600'),
('00000002599', '00107', -8.201226, 114.268224, 'admin', NULL, NULL, NULL, '00000002601'),
('00000002600', '00107', -8.201618, 114.268601, 'admin', NULL, NULL, NULL, '00000002602'),
('00000002601', '00107', -8.201819, 114.268749, 'admin', NULL, NULL, NULL, '00000002603'),
('00000002602', '00107', -8.202505, 114.269066, 'admin', NULL, NULL, NULL, '00000002604'),
('00000002603', '00107', -8.203420, 114.269539, 'admin', NULL, NULL, NULL, '00000002605'),
('00000002604', '00107', -8.203766, 114.269481, 'admin', NULL, NULL, NULL, '00000002606'),
('00000002605', '00107', -8.204388, 114.269583, 'admin', NULL, NULL, NULL, '00000002607'),
('00000002606', '00107', -8.205561, 114.269673, 'admin', NULL, NULL, NULL, '00000002608'),
('00000002607', '00107', -8.206487, 114.269788, 'admin', NULL, NULL, NULL, '00000002609'),
('00000002608', '00107', -8.207164, 114.269716, 'admin', NULL, NULL, NULL, '00000002610'),
('00000002609', '00107', -8.207647, 114.269625, 'admin', NULL, NULL, NULL, '00000002611'),
('00000002610', '00107', -8.207947, 114.269680, 'admin', NULL, NULL, NULL, '00000002612'),
('00000002611', '00107', -8.209881, 114.270375, 'admin', NULL, NULL, NULL, '00000002613'),
('00000002612', '00107', -8.210212, 114.270448, 'admin', NULL, NULL, NULL, '00000002614'),
('00000002613', '00107', -8.210608, 114.270742, 'admin', NULL, NULL, NULL, '00000002615'),
('00000002614', '00107', -8.210895, 114.271076, 'admin', NULL, NULL, NULL, '00000002616'),
('00000002615', '00107', -8.211774, 114.271868, 'admin', NULL, NULL, NULL, '00000002617'),
('00000002616', '00107', -8.212005, 114.272070, 'admin', NULL, NULL, NULL, '00000002618'),
('00000002617', '00042', -8.547886, 114.259928, 'admin', NULL, NULL, NULL, '00000002619'),
('00000002618', '00042', -8.547916, 114.261010, 'admin', NULL, NULL, NULL, '00000002620'),
('00000002619', '00042', -8.547964, 114.261647, 'admin', NULL, NULL, NULL, '00000002621'),
('00000002620', '00042', -8.548151, 114.264322, 'admin', NULL, NULL, NULL, '00000002622'),
('00000002621', '00042', -8.547243, 114.263851, 'admin', NULL, NULL, NULL, '00000002623'),
('00000002642', '00001', -8.465606, 114.153308, 'admin', NULL, NULL, NULL, '00000002644'),
('00000002643', '00001', -8.466253, 114.154291, 'admin', NULL, NULL, NULL, '00000002645'),
('00000002644', '00001', -8.466873, 114.155357, 'admin', NULL, NULL, NULL, '00000002646'),
('00000002645', '00001', -8.468076, 114.154518, 'admin', NULL, NULL, NULL, '00000002647'),
('00000002646', '00001', -8.468339, 114.155212, 'admin', NULL, NULL, NULL, '00000002648'),
('00000002647', '00001', -8.468782, 114.154837, 'admin', NULL, NULL, NULL, '00000002649'),
('00000002648', '00001', -8.469262, 114.154717, 'admin', NULL, NULL, NULL, '00000002650'),
('00000002649', '00001', -8.468488, 114.155812, 'admin', NULL, NULL, NULL, '00000002651'),
('00000002650', '00002', -8.466253, 114.154291, 'admin', NULL, NULL, NULL, '00000002652'),
('00000002651', '00002', -8.467064, 114.153797, 'admin', NULL, NULL, NULL, '00000002653'),
('00000002652', '00003', -8.465507, 114.154859, 'admin', NULL, NULL, NULL, '00000002654'),
('00000002653', '00003', -8.465913, 114.154542, 'admin', NULL, NULL, NULL, '00000002655'),
('00000002654', '00003', -8.466253, 114.154291, 'admin', NULL, NULL, NULL, '00000002656'),
('00000002655', '00004', -8.465913, 114.154542, 'admin', NULL, NULL, NULL, '00000002657'),
('00000002656', '00004', -8.466299, 114.155052, 'admin', NULL, NULL, NULL, '00000002658'),
('00000002657', '00005', -8.465317, 114.154578, 'admin', NULL, NULL, NULL, '00000002659'),
('00000002658', '00005', -8.465507, 114.154859, 'admin', NULL, NULL, NULL, '00000002660'),
('00000002659', '00005', -8.465680, 114.155268, 'admin', NULL, NULL, NULL, '00000002661'),
('00000002660', '00005', -8.466363, 114.155865, 'admin', NULL, NULL, NULL, '00000002662'),
('00000002661', '00005', -8.466626, 114.156333, 'admin', NULL, NULL, NULL, '00000002663'),
('00000002662', '00147', -8.087950, 114.215470, 'admin', NULL, NULL, NULL, '00000002664'),
('00000002663', '00182', -8.092123, 114.246989, 'admin', NULL, NULL, NULL, '00000002665'),
('00000002664', '00184', -8.092856, 114.343249, 'admin', NULL, NULL, NULL, '00000002666'),
('00000002665', '00184', -8.090270, 114.343239, 'admin', NULL, NULL, NULL, '00000002667'),
('00000002666', '00187', -8.093915, 114.352529, 'admin', NULL, NULL, NULL, '00000002668'),
('00000002667', '00187', -8.093002, 114.352260, 'admin', NULL, NULL, NULL, '00000002669'),
('00000002668', '00187', -8.091773, 114.354288, 'admin', NULL, NULL, NULL, '00000002670'),
('00000002669', '00187', -8.092025, 114.354959, 'admin', NULL, NULL, NULL, '00000002671'),
('00000002670', '00187', -8.093766, 114.357193, 'admin', NULL, NULL, NULL, '00000002672'),
('00000002671', '00186', -8.094329, 114.359097, 'admin', NULL, NULL, NULL, '00000002673'),
('00000002672', '00186', -8.094175, 114.361289, 'admin', NULL, NULL, NULL, '00000002674'),
('00000002673', '00183', -8.084837, 114.363901, 'admin', NULL, NULL, NULL, '00000002677'),
('00000002674', '00183', -8.084229, 114.367756, 'admin', NULL, NULL, NULL, '00000002679'),
('00000002675', '00183', -8.084540, 114.370853, 'admin', NULL, NULL, NULL, '00000002680'),
('00000002676', '00183', -8.084343, 114.366365, 'admin', NULL, NULL, NULL, '00000002678'),
('00000002677', '00185', -8.088916, 114.362643, 'admin', NULL, NULL, NULL, '00000002676'),
('00000002678', '00185', -8.090459, 114.361957, 'admin', NULL, NULL, NULL, '00000002675');

-- --------------------------------------------------------

--
-- Table structure for table `tandon`
--

CREATE TABLE IF NOT EXISTS `tandon` (
  `id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `hippam_id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `keterangan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `latitude` double(10,6) NOT NULL,
  `longitude` double(10,6) NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  `crt` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `crt_date` timestamp NULL DEFAULT NULL,
  `upd` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `upd_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='mata pelajaran';

--
-- Dumping data for table `tandon`
--

INSERT INTO `tandon` (`id`, `hippam_id`, `nama`, `keterangan`, `latitude`, `longitude`, `aktif`, `crt`, `crt_date`, `upd`, `upd_date`) VALUES
('00001', '00000000007', 'Tandon 1', '', -8.583700, 114.105767, 1, 'admin', '2014-12-24 23:17:03', NULL, NULL),
('00002', '00000000008', 'Tandon 1', '', -8.568050, 114.053767, 1, 'admin', '2014-12-24 23:17:46', NULL, NULL),
('00003', '00000000009', 'Tandon 1', '', -8.512300, 114.256283, 1, 'admin', '2014-12-24 23:19:39', NULL, NULL),
('00004', '00000000010', 'Tandon 1', '', -8.476033, 114.222267, 1, 'admin', '2014-12-24 23:20:16', NULL, NULL),
('00005', '00000000012', 'Tandon 1', '', -8.555650, 114.285700, 1, 'admin', '2014-12-24 23:21:06', NULL, NULL),
('00006', '00000000042', 'Tandon 1', '', -8.452950, 114.325583, 1, 'admin', '2014-12-24 23:54:06', NULL, NULL),
('00007', '00000000040', 'Tandon 1', '', -8.440917, 114.304617, 1, 'admin', '2014-12-24 23:54:59', NULL, NULL),
('00008', '00000000041', 'Tandon 1', '', -8.442283, 114.288167, 1, 'admin', '2014-12-24 23:56:29', NULL, NULL),
('00009', '00000000016', 'Tandon 1', '', -8.292367, 114.053517, 1, 'admin', '2014-12-24 23:57:07', NULL, NULL),
('00010', '00000000017', 'Tandon 1', '', -8.257650, 114.072667, 1, 'admin', '2014-12-24 23:58:01', NULL, NULL),
('00011', '00000000018', 'Tandon 1', '', -8.262883, 114.097817, 1, 'admin', '2014-12-24 23:58:35', NULL, NULL),
('00012', '00000000031', 'Tandon 1', '', -8.246817, 113.982733, 1, 'admin', '2014-12-24 23:59:18', NULL, NULL),
('00013', '00000000032', 'Tandon 1', '', -8.286983, 113.971233, 1, 'admin', '2014-12-25 00:00:03', NULL, NULL),
('00014', '00000000033', 'Tandon 1', '', -8.246817, 113.982733, 1, 'admin', '2014-12-25 00:00:37', NULL, NULL),
('00015', '00000000047', 'Tandon 1', '', -8.305433, 114.238400, 1, 'admin', '2014-12-25 00:01:16', NULL, NULL),
('00016', '00000000048', 'Tandon 1', '', -8.314683, 114.223450, 1, 'admin', '2014-12-25 00:02:02', NULL, NULL),
('00017', '00000000046', 'Tandon 1', '', -8.268883, 114.246467, 1, 'admin', '2014-12-25 00:02:38', NULL, NULL),
('00018', '00000000006', 'Tandon 1', '', -8.467067, 114.153800, 1, 'admin', '2014-12-25 15:43:41', NULL, NULL),
('00019', '00000000014', 'Tandon 1', '', -8.424967, 114.232167, 1, 'admin', '2014-12-25 15:44:31', NULL, NULL),
('00020', '00000000015', 'Tandon 1', '', -8.461900, 114.259200, 1, 'admin', '2014-12-25 15:45:08', NULL, NULL),
('00021', '00000000019', 'Tandon 1', '', -8.447200, 114.271617, 1, 'admin', '2014-12-25 15:45:54', NULL, NULL),
('00022', '00000000027', 'Tandon 1', '', -8.455517, 114.158583, 1, 'admin', '2014-12-25 15:46:38', NULL, NULL),
('00023', '00000000028', 'Tandon 1', '', -8.411783, 114.103083, 1, 'admin', '2014-12-25 15:47:25', NULL, NULL),
('00024', '00000000021', 'Tandon 1', '', -8.380767, 114.195883, 1, 'admin', '2014-12-25 15:48:04', NULL, NULL);

--
-- Triggers `tandon`
--
DELIMITER //
CREATE TRIGGER `tandon_crt_date` BEFORE INSERT ON `tandon`
 FOR EACH ROW BEGIN
        SET NEW.crt_date = CURRENT_TIMESTAMP();
END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `tandon_upd_date` BEFORE UPDATE ON `tandon`
 FOR EACH ROW BEGIN
        SET NEW.upd_date = CURRENT_TIMESTAMP();
END
//
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `broncap`
--
ALTER TABLE `broncap`
 ADD PRIMARY KEY (`id`), ADD KEY `unit_id` (`hippam_id`);

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `kode` (`kode`), ADD KEY `kecamatan_id` (`kecamatan_id`);

--
-- Indexes for table `hippam`
--
ALTER TABLE `hippam`
 ADD PRIMARY KEY (`id`), ADD KEY `desa_kode` (`desa_kode`);

--
-- Indexes for table `hippam_desa`
--
ALTER TABLE `hippam_desa`
 ADD PRIMARY KEY (`id`), ADD KEY `hippam_id` (`hippam_id`);

--
-- Indexes for table `hippam_desa_sekitar`
--
ALTER TABLE `hippam_desa_sekitar`
 ADD PRIMARY KEY (`id`), ADD KEY `hippam_id` (`hippam_id`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
 ADD PRIMARY KEY (`id`), ADD KEY `kabupaten__propinsi_id` (`propinsi_id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `kode` (`kode`), ADD KEY `kabupaten_id` (`kabupaten_id`);

--
-- Indexes for table `login_grp`
--
ALTER TABLE `login_grp`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `login_grp_acl`
--
ALTER TABLE `login_grp_acl`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_login_grp_acl_login_grp1_idx` (`login_grp_id`), ADD KEY `fk_login_grp_acl_menu1_idx` (`menu_id`);

--
-- Indexes for table `login_log`
--
ALTER TABLE `login_log`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_login_log__login_usr_id` (`login_usr_id`), ADD KEY `fk_login_log__menu_id` (`menu_id`);

--
-- Indexes for table `login_usr`
--
ALTER TABLE `login_usr`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `login_usr_grp`
--
ALTER TABLE `login_usr_grp`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pipa`
--
ALTER TABLE `pipa`
 ADD PRIMARY KEY (`id`), ADD KEY `unit_id` (`hippam_id`), ADD KEY `pipa_jenis_id` (`pipa_jenis_id`);

--
-- Indexes for table `pipa_jenis`
--
ALTER TABLE `pipa_jenis`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pipa_koordinat`
--
ALTER TABLE `pipa_koordinat`
 ADD PRIMARY KEY (`id`), ADD KEY `pipa_id` (`pipa_id`);

--
-- Indexes for table `tandon`
--
ALTER TABLE `tandon`
 ADD PRIMARY KEY (`id`), ADD KEY `unit_id` (`hippam_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_grp_acl`
--
ALTER TABLE `login_grp_acl`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login_log`
--
ALTER TABLE `login_log`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT for table `login_usr_grp`
--
ALTER TABLE `login_usr_grp`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `broncap`
--
ALTER TABLE `broncap`
ADD CONSTRAINT `broncap_ibfk_1` FOREIGN KEY (`hippam_id`) REFERENCES `hippam` (`id`) ON UPDATE CASCADE;

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

--
-- Constraints for table `login_grp_acl`
--
ALTER TABLE `login_grp_acl`
ADD CONSTRAINT `login_grp_acl_ibfk_1` FOREIGN KEY (`login_grp_id`) REFERENCES `login_grp` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `login_grp_acl_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `pipa`
--
ALTER TABLE `pipa`
ADD CONSTRAINT `pipa_ibfk_1` FOREIGN KEY (`hippam_id`) REFERENCES `hippam` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `pipa_ibfk_2` FOREIGN KEY (`pipa_jenis_id`) REFERENCES `pipa_jenis` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `pipa_koordinat`
--
ALTER TABLE `pipa_koordinat`
ADD CONSTRAINT `pipa_koordinat_ibfk_1` FOREIGN KEY (`pipa_id`) REFERENCES `pipa` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tandon`
--
ALTER TABLE `tandon`
ADD CONSTRAINT `tandon_ibfk_1` FOREIGN KEY (`hippam_id`) REFERENCES `hippam` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
