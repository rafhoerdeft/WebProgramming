-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2018 at 04:44 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_puskom`
--

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE IF NOT EXISTS `fakultas` (
  `fk_id` int(11) NOT NULL,
  `fk_kode` varchar(10) NOT NULL,
  `fk_nama` varchar(50) NOT NULL,
  `fk_singkatan` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`fk_id`, `fk_kode`, `fk_nama`, `fk_singkatan`) VALUES
(1, '.01', 'Fakultas Ekonomi', 'FE'),
(2, '.02', 'Fakultas Hukum', 'FH'),
(3, '.03', 'Fakultas Keguruan dan Ilmu Pendidikan', 'FKIP'),
(4, '.04', 'Fakultas Agama Islam', 'FAI'),
(5, '.05', 'Fakultas Teknik', 'FT'),
(6, '.06', 'Fakultas Ilmu Kesehatan', 'FIKES'),
(8, '.08', 'Fakultas Psikologi dan Humaniora', 'FPH'),
(13, '.09', 'Fakultas Ilmu Hitam', 'FIH'),
(14, '.10', 'Fakultas Anak Keren', 'FAK');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `jd_id` int(11) NOT NULL,
  `jd_nama` varchar(50) NOT NULL,
  `jd_tanggal` date NOT NULL,
  `jd_waktu` time NOT NULL,
  `jd_ruang` varchar(8) NOT NULL,
  `jd_keterangan` varchar(50) NOT NULL,
  `penguji_1` int(2) NOT NULL,
  `penguji_2` int(2) NOT NULL,
  `stg_id` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`jd_id`, `jd_nama`, `jd_tanggal`, `jd_waktu`, `jd_ruang`, `jd_keterangan`, `penguji_1`, `penguji_2`, `stg_id`) VALUES
(1, 'senin', '2018-05-01', '09:00:00', '201', 'masuk', 1, 2, 0),
(2, 'selasa', '2018-05-01', '10:00:00', '201', 'masuk', 2, 3, 0),
(4, 'Rabu', '1900-12-01', '09:30:00', '212', '231', 2, 3, 0),
(5, 'Kamis', '2018-06-01', '12:00:00', '333', '333', 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jeniskelas`
--

CREATE TABLE IF NOT EXISTS `jeniskelas` (
  `jk_id` int(4) NOT NULL,
  `jk_nama` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jeniskelas`
--

INSERT INTO `jeniskelas` (`jk_id`, `jk_nama`) VALUES
(1, 'Reguler'),
(2, 'Paralel');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `mhs_id` int(11) NOT NULL,
  `mhs_nama` varchar(50) NOT NULL,
  `mhs_nim` varchar(20) NOT NULL,
  `mhs_tahunmasuk` varchar(4) NOT NULL,
  `mhs_jeniskelamin` enum('Laki-laki','Perempuan','','') NOT NULL,
  `pst_id` int(11) NOT NULL,
  `jk_id` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16354 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`mhs_id`, `mhs_nama`, `mhs_nim`, `mhs_tahunmasuk`, `mhs_jeniskelamin`, `pst_id`, `jk_id`) VALUES
(1446, 'ARDIAN TANTRA PATRIA', '14.0101.0107', '2014', 'Laki-laki', 1, 1),
(1459, 'HENDRIK SANTOSO', '14.0101.0072', '2014', 'Laki-laki', 1, 1),
(1494, 'AKHMAD MUNDZIR', '14.0101.0058', '2014', 'Laki-laki', 1, 2),
(12737, 'SARIYANTO HIDAYAT', '14.0101.0042', '2014', 'Laki-laki', 1, 2),
(14035, 'ARDIAN EKO SAPUTRA', '14.0101.0047', '2014', 'Laki-laki', 1, 2),
(14142, 'RARA VISTY PARAMITA', '14.0101.0062', '2014', 'Perempuan', 1, 2),
(14151, 'BAYU DWI PANGESTU', '14.0101.0061', '2014', 'Laki-laki', 1, 2),
(14788, 'SLAMET PRAMUJI', '14.0101.0066', '2014', 'Laki-laki', 1, 2),
(15036, 'LINA WIGIYANTI', '14.0101.0040', '2014', 'Perempuan', 1, 2),
(15101, 'HERDIANI CIPTOMURTI', '14.0101.0069', '2014', 'Perempuan', 1, 2),
(15293, 'ADINNURI SEPTIYANI', '14.0101.0001', '2014', 'Perempuan', 1, 2),
(15307, 'FRISKA AMANDA PUTRI', '14.0101.0002', '2014', 'Perempuan', 1, 1),
(15309, 'DESTIANA FARITA PUTRI', '14.0101.0003', '2014', 'Perempuan', 1, 1),
(15317, 'SUPARTI', '14.0603.0001', '2014', 'Perempuan', 19, 1),
(15319, 'IMROATUL LATIFAH', '14.0603.0002', '2014', 'Perempuan', 19, 1),
(15324, 'HIMMATUL FAIDAH', '14.0603.0003', '2014', 'Perempuan', 19, 1),
(15330, 'MUHAMMAD ZAKIYUDDIEN ZULFA', '14.0101.0004', '2014', 'Laki-laki', 1, 2),
(15333, 'SEPTIAN EKO PUTRO', '14.0101.0005', '2014', 'Laki-laki', 1, 2),
(15334, 'FIRNADHI BAKHTIAR', '14.0101.0006', '2014', 'Laki-laki', 1, 1),
(15349, 'FIFI ARIYANI WINARNO', '14.0603.0004', '2014', 'Perempuan', 19, 1),
(15356, 'MIFTAHUL ALBA PRAMANA', '14.0101.0007', '2014', 'Laki-laki', 1, 1),
(15358, 'FEBRI MUGI HARTANTO', '14.0603.0005', '2014', 'Laki-laki', 19, 1),
(15373, 'NOVI ARIYANI', '14.0603.0007', '2014', 'Perempuan', 19, 1),
(15380, 'SITI ZULIANIKA', '14.0101.0008', '2014', 'Perempuan', 1, 1),
(15383, 'ARUM KUNTHI NINGSIH', '14.0101.0009', '2014', 'Perempuan', 1, 2),
(15389, 'NANDA ZULFA NAFI''AH', '14.0603.0008', '2014', 'Perempuan', 19, 1),
(15406, 'MAHARANI LINDA OKTAVIANI', '14.0101.0010', '2014', 'Perempuan', 1, 2),
(15407, 'MUHAMMAD ZAENAL ALAM', '14.0101.0011', '2014', 'Laki-laki', 1, 1),
(15410, 'DEDI CANDRA TRIWIBOWO', '14.0101.0012', '2014', 'Laki-laki', 1, 1),
(15413, 'NADIA SEKARTINI HAPSARI', '14.0603.0009', '2014', 'Perempuan', 19, 1),
(15419, 'SISILIA CINTA NILA ROSA', '14.0603.0010', '2014', 'Perempuan', 19, 1),
(15422, 'RAHAYU SHINTIAWATI', '14.0101.0013', '2014', 'Perempuan', 1, 1),
(15425, 'RETNO SETYOWATI', '14.0603.0011', '2014', 'Perempuan', 19, 1),
(15428, 'SULISTIANI', '14.0603.0012', '2014', 'Perempuan', 19, 1),
(15442, 'ADE CANDRA SETIAWAN', '14.0603.0013', '2014', 'Laki-laki', 19, 1),
(15443, 'IDAM PRAMODHA ZAID', '14.0101.0014', '2014', 'Laki-laki', 1, 1),
(15448, 'ZUANA DEWI MURNISELA', '14.0603.0014', '2014', 'Perempuan', 19, 1),
(15449, 'ACHMAD NUR SHODIQ', '14.0101.0015', '2014', 'Laki-laki', 1, 2),
(15453, 'MILKA NURCAHYANINGRUM', '14.0101.0016', '2014', 'Perempuan', 1, 2),
(15458, 'ARISKA SARASWATI', '14.0101.0017', '2014', 'Perempuan', 1, 1),
(15463, 'AYU PUTRI ASMITA', '14.0603.0015', '2014', 'Perempuan', 19, 1),
(15471, 'DINI RISTANTI DAMAYANTI', '14.0101.0018', '2014', 'Perempuan', 1, 2),
(15483, 'EKA YULI ISMIYANTI', '14.0101.0019', '2014', 'Perempuan', 1, 1),
(15486, 'INDRA WAHYU WIBOWO', '14.0101.0020', '2014', 'Laki-laki', 1, 2),
(15504, 'QIDIDA SELA DATI', '14.0101.0021', '2014', 'Perempuan', 1, 1),
(15507, 'KATON YUDHO PRAKOSO', '14.0101.0022', '2014', 'Laki-laki', 1, 2),
(15509, 'KARNELIS ADI WIJAYA', '14.0101.0023', '2014', 'Laki-laki', 1, 1),
(15511, 'ARIFATUN NISAA WUNI AQHFA', '14.0101.0024', '2014', 'Perempuan', 1, 1),
(15518, 'ALFIAN DENI FAUZAN', '14.0101.0025', '2014', 'Laki-laki', 1, 1),
(15520, 'DAVID RUDIANTO', '14.0101.0026', '2014', 'Laki-laki', 1, 1),
(15529, 'LINTANG WITA SETIANA', '14.0101.0027', '2014', 'Perempuan', 1, 1),
(15532, 'AGUS SUWANDANI', '14.0101.0028', '2014', 'Laki-laki', 1, 1),
(15537, 'METY RIYASA', '14.0101.0029', '2014', 'Perempuan', 1, 1),
(15538, 'M. ARIF SETYAWAN', '14.0101.0030', '2014', 'Laki-laki', 1, 2),
(15539, 'AFRIZAL DIMAS ARIGHI', '14.0101.0031', '2014', 'Laki-laki', 1, 1),
(15540, 'AGUNG PRASTIYO', '14.0101.0032', '2014', 'Laki-laki', 1, 1),
(15547, 'GUNTUR HERRY DWI JAYANTO', '14.0101.0033', '2014', 'Laki-laki', 1, 2),
(15548, 'SUHAIMI', '14.0101.0034', '2014', 'Laki-laki', 1, 1),
(15560, 'DESI PUTRI WULANDARI', '14.0101.0035', '2014', 'Perempuan', 1, 2),
(15578, 'VIGOR SALASA MAULANA', '14.0101.0036', '2014', 'Laki-laki', 1, 1),
(15580, 'REDIKA TITIANA PUTRI', '14.0101.0037', '2014', 'Perempuan', 1, 2),
(15584, 'DOMINICUS BAGAS WIDYA PRATAMA', '14.0101.0038', '2014', 'Laki-laki', 1, 1),
(15589, 'MUSLIMAH NUR HAYATI ', '14.0101.0039', '2014', 'Perempuan', 1, 1),
(15602, 'SEPTYA UTAMI', '14.0101.0041', '2014', 'Perempuan', 1, 1),
(15609, 'DANANG LISTIYANTO', '14.0101.0043', '2014', 'Laki-laki', 1, 1),
(15611, 'UNU ALEXMI ARUMAWATI', '14.0101.0044', '2014', 'Perempuan', 1, 2),
(15619, 'PULUNG AJI PAMUNGKAS', '14.0101.0045', '2014', 'Laki-laki', 1, 1),
(15623, 'SUKIRMAN', '14.0101.0046', '2014', 'Laki-laki', 1, 2),
(15634, 'EKA DYAH RATRI UTAMI', '14.0101.0048', '2014', 'Perempuan', 1, 1),
(15641, 'ARINDA VELA MAGFIROH', '14.0101.0049', '2014', 'Perempuan', 1, 2),
(15644, 'DESI WULANDARI', '14.0101.0050', '2014', 'Perempuan', 1, 1),
(15658, 'KHOLISA MIRZAYATI', '14.0101.0051', '2014', 'Perempuan', 1, 1),
(15661, 'AKMILIA AYU SETIYOWATI', '14.0101.0052', '2014', 'Perempuan', 1, 1),
(15662, 'SEKAR KURNIASARI', '14.0101.0053', '2014', 'Perempuan', 1, 1),
(15677, 'RESA ERMA VIANI', '14.0101.0054', '2014', 'Perempuan', 1, 2),
(15680, 'FAUZI AKHSANI PUTRA', '14.0101.0055', '2014', 'Laki-laki', 1, 1),
(15689, 'RIZKYANA SETYA ADHANI', '14.0101.0056', '2014', 'Perempuan', 1, 1),
(15691, 'AFAN CHAIRUL UMAM', '14.0101.0057', '2014', 'Laki-laki', 1, 1),
(15692, 'DYAN RETNO LESTARI', '14.0603.0016', '2014', 'Perempuan', 19, 1),
(15694, 'FADIL ASSHOFFAT', '14.0101.0059', '2014', 'Laki-laki', 1, 1),
(15697, 'WAHYU AISYATUL RAFIAH', '14.0101.0060', '2014', 'Perempuan', 1, 1),
(15700, 'PIJAR LUXFIANA', '14.0101.0063', '2014', 'Perempuan', 1, 1),
(15705, 'SINTA HANA PRADITA', '14.0603.0017', '2014', 'Perempuan', 19, 1),
(15719, 'AMIN NGALIMUDIN', '14.0101.0064', '2014', 'Laki-laki', 1, 2),
(15722, 'RISTA WENING SAPUTRI', '14.0101.0065', '2014', 'Perempuan', 1, 2),
(15729, 'RIMA CHINTIYA', '14.0603.0018', '2014', 'Perempuan', 19, 1),
(15733, 'TASYA SITI MURBARANI', '14.0603.0019', '2014', 'Perempuan', 19, 1),
(15743, 'ADJUN NURCAHYA HUTAMA ', '14.0101.0067', '2014', 'Laki-laki', 1, 1),
(15754, 'HENRI SETIAJI', '14.0101.0068', '2014', 'Laki-laki', 1, 1),
(15761, 'TEGAR PRIBADI', '14.0101.0070', '2014', 'Laki-laki', 1, 1),
(15763, 'DYAH EKA AYUNINGTIYAS', '14.0603.0020', '2014', 'Perempuan', 19, 1),
(15768, 'WULANDARI', '14.0101.0071', '2014', 'Perempuan', 1, 2),
(15769, 'WAHISAH', '14.0603.0021', '2014', 'Perempuan', 19, 1),
(15799, 'DEWI SITI N.U.', '14.0603.0022', '2014', 'Perempuan', 19, 1),
(15811, 'FITA ARUMNINGSIH', '14.0101.0073', '2014', 'Perempuan', 1, 1),
(15821, 'SITI HALIFAH', '14.0603.0023', '2014', 'Perempuan', 19, 1),
(15830, 'RIA SARITA', '14.0101.0074', '2014', 'Perempuan', 1, 1),
(15836, 'RYAN OCTA PRATAMA', '14.0101.0075', '2014', 'Laki-laki', 1, 2),
(15837, 'FAJAR WAHYUDIN', '14.0101.0076', '2014', 'Laki-laki', 1, 2),
(15845, 'ISTA KUSUMA DINA', '14.0101.0077', '2014', 'Laki-laki', 1, 1),
(15858, 'DENI DAMAYANTI', '14.0101.0078', '2014', 'Perempuan', 1, 1),
(15864, 'BONNY PAMUNGKAS AL AMIN', '14.0101.0079', '2014', 'Laki-laki', 1, 1),
(15865, 'MELY YUNIATI', '14.0603.0024', '2014', 'Perempuan', 19, 1),
(15870, 'ROMI ISMIATI', '14.0101.0080', '2014', 'Perempuan', 1, 2),
(15875, 'ANNA WIDYA KHOTIMATUL KHUSNA', '14.0603.0025', '2014', 'Perempuan', 19, 1),
(15883, 'RUDI HERMAWAN', '14.0101.0081', '2014', 'Laki-laki', 1, 2),
(15908, 'WAHYU ATIK SULISTYANINGSIH', '14.0603.0026', '2014', 'Perempuan', 19, 1),
(15913, 'EKA WIDYA ASTUTIK', '14.0603.0027', '2014', 'Perempuan', 19, 1),
(15914, 'HUSNI MAHIN MEDIA', '14.0101.0082', '2014', 'Laki-laki', 1, 1),
(15915, 'ANITA FITRIANINGRUM', '14.0603.0028', '2014', 'Perempuan', 19, 1),
(15924, 'LULUK OKTAVIANINGRUM NUGRAHENI', '14.0101.0083', '2014', 'Perempuan', 1, 2),
(15926, 'SITI MASRUROH', '14.0101.0084', '2014', 'Perempuan', 1, 2),
(15931, 'RIMA DHANTI RUKMANA', '14.0603.0029', '2014', 'Perempuan', 19, 1),
(15953, 'AGNERIA WULANDARI', '14.0603.0030', '2014', 'Perempuan', 19, 1),
(15961, 'AMIFTA TITI DAMARASIH', '14.0603.0031', '2014', 'Perempuan', 19, 1),
(15963, 'NURUL ICHSAN', '14.0101.0085', '2014', 'Laki-laki', 1, 1),
(15964, 'ARWAN DWI SEPTIANTO ', '14.0101.0086', '2014', 'Laki-laki', 1, 1),
(15988, 'DWI RENI WAHYU PRATIWI', '14.0101.0087', '2014', 'Perempuan', 1, 1),
(15999, 'AYUK YUNIA', '14.0603.0032', '2014', 'Perempuan', 19, 1),
(16001, 'ANGGER CAHYO WIBOWO', '14.0101.0088', '2014', 'Laki-laki', 1, 1),
(16012, 'KHANSA NIBRAS INDRAYANI', '14.0603.0033', '2014', 'Perempuan', 19, 1),
(16017, 'SOHIROTUL FIRDA TRIASTUTI', '14.0603.0034', '2014', 'Perempuan', 19, 1),
(16020, 'HERU FARIS SHOLIKHIN', '14.0603.0035', '2014', 'Laki-laki', 19, 1),
(16021, 'MUHAMAD WAHID IBRAHIM', '14.0101.0090', '2014', 'Laki-laki', 1, 1),
(16026, 'IDA SUPANTI', '14.0603.0036', '2014', 'Perempuan', 19, 1),
(16029, 'INDAH SULISTYOWATI', '14.0101.0091', '2014', 'Perempuan', 1, 2),
(16030, 'OKTAVIANA PRATIWI', '14.0101.0092', '2014', 'Perempuan', 1, 1),
(16033, 'ROMA FAISAL ANAS', '14.0101.0093', '2014', 'Laki-laki', 1, 2),
(16039, 'PUNITA DWI PRATIWI', '14.0603.0037', '2014', 'Perempuan', 19, 1),
(16053, 'MUHAMAD WAHID AFIUDIN', '14.0101.0094', '2014', 'Laki-laki', 1, 2),
(16063, 'RENEE AYUSHINTA BIMANTARI', '14.0101.0095', '2014', 'Perempuan', 1, 1),
(16081, 'HANIFUL MAS UDA', '14.0603.0038', '2014', 'Perempuan', 19, 1),
(16084, 'AFFAN FAUZI', '14.0101.0097', '2014', 'Laki-laki', 1, 2),
(16085, 'ANDHI SETIAWAN', '14.0101.0096', '2014', 'Laki-laki', 1, 2),
(16095, 'ANWAR FAHRUR', '14.0101.0098', '2014', 'Laki-laki', 1, 2),
(16096, 'IKE NUR KHASANAH', '14.0603.0039', '2014', 'Perempuan', 19, 1),
(16102, 'RESTU ELMA HAKIKI', '14.0603.0040', '2014', 'Perempuan', 19, 1),
(16107, 'MIFTAKHUL HUDA', '14.0101.0099', '2014', 'Laki-laki', 1, 1),
(16114, 'AFFAN LUTHFI ALDY', '14.0603.0041', '2014', 'Laki-laki', 19, 1),
(16115, 'ARDIAN MAHARDIKA', '14.0101.0100', '2014', 'Laki-laki', 1, 1),
(16118, 'ADI PRIAWAN', '14.0101.0101', '2014', 'Laki-laki', 1, 1),
(16125, 'NIMAS ASTRID DIASARI', '14.0101.0102', '2014', 'Perempuan', 1, 1),
(16134, 'SIWI ADITYA RAHAYU', '14.0101.0103', '2014', 'Perempuan', 1, 2),
(16142, 'JOKO SUSILO', '14.0101.0104', '2014', 'Laki-laki', 1, 1),
(16143, 'VITA DEWI PURWATI', '14.0101.0105', '2014', 'Perempuan', 1, 1),
(16144, 'AMELIA RISKI FEBRY RAHMADANI', '14.0101.0106', '2014', 'Perempuan', 1, 1),
(16148, 'WAHYUDI', '14.0101.0108', '2014', 'Laki-laki', 1, 2),
(16151, 'HANAFI FEBRI WICAKSONO', '14.0101.0109', '2014', 'Laki-laki', 1, 1),
(16161, 'MA''MUN ASNGARI', '14.0101.0110', '2014', 'Laki-laki', 1, 1),
(16167, 'INDRI CHRISVIANTI', '14.0603.0042', '2014', 'Perempuan', 19, 1),
(16181, 'MUHAMMAD SHODDAM ALGHOZI', '14.0101.0111', '2014', 'Laki-laki', 1, 2),
(16184, 'VARA SEPTIA DEWI', '14.0603.0043', '2014', 'Perempuan', 19, 1),
(16185, 'MYAN BHAKTI PRATAMA', '14.0101.0112', '2014', 'Laki-laki', 1, 2),
(16186, 'HELMI HELMAWAN', '14.0101.0113', '2014', 'Laki-laki', 1, 1),
(16192, 'PUTRI', '14.0603.0044', '2014', 'Perempuan', 19, 1),
(16197, 'SETYO WIDI ATMOKO', '14.0101.0114', '2014', 'Laki-laki', 1, 1),
(16213, 'ALVIAN TANJUNG', '14.0603.0045', '2014', 'Laki-laki', 19, 1),
(16217, 'RIZKA HIDAYATI', '14.0101.0115', '2014', 'Perempuan', 1, 2),
(16218, 'RIZKI RAHMAWATI', '14.0101.0116', '2014', 'Perempuan', 1, 2),
(16221, 'HERI WANTORO', '14.0101.0117', '2014', 'Laki-laki', 1, 2),
(16222, 'AJI DWI PRIYANTO', '14.0101.0118', '2014', 'Laki-laki', 1, 1),
(16226, 'ESA DANAN WIHAKSO', '14.0101.0119', '2014', 'Laki-laki', 1, 1),
(16227, 'WAHYU KURNIAWAN', '14.0101.0120', '2014', 'Laki-laki', 1, 2),
(16240, 'BINTANG FAUZIA MUFLIKHA', '14.0603.0046', '2014', 'Perempuan', 19, 1),
(16247, 'DWI SUSAPTO', '14.0603.0047', '2014', 'Laki-laki', 19, 1),
(16286, 'MAFTUKHANUL KARIM', '14.0101.0121', '2014', 'Laki-laki', 1, 2),
(16293, 'NABELLA HAYYU LEODITASARI ', '14.0101.0122', '2014', 'Perempuan', 1, 2),
(16329, 'SUHENI', '14.0101.0123', '2014', 'Perempuan', 1, 1),
(16331, 'HANY NIRMAWATI', '14.0101.0124', '2014', 'Perempuan', 1, 2),
(16336, 'SHEILLA DIAN ASTUTI', '14.0101.0125', '2014', 'Perempuan', 1, 2),
(16352, 'TEGUH SUBAGIO UTOMO', '14.0101.0126', '2014', 'Laki-laki', 1, 2),
(16353, 'HIMAWAN HARJITO', '14.0101.0127', '2014', 'Laki-laki', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE IF NOT EXISTS `peserta` (
  `pstr_id` int(11) NOT NULL,
  `jd_id` int(11) NOT NULL,
  `mhs_id` int(11) NOT NULL,
  `pstr_tanggalambil` varchar(4) NOT NULL,
  `pstr_nilai` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`pstr_id`, `jd_id`, `mhs_id`, `pstr_tanggalambil`, `pstr_nilai`) VALUES
(1, 1, 15307, '2018', 0),
(2, 1, 15309, '2018', 0),
(3, 1, 15334, '2018', 0),
(4, 1, 15356, '2018', 0),
(5, 1, 1446, '2018', 0),
(6, 1, 1459, '2018', 0),
(7, 1, 15307, '2018', 0),
(8, 1, 15309, '2018', 0),
(9, 1, 15334, '2018', 0),
(10, 1, 15356, '2018', 0),
(11, 1, 15380, '2018', 0),
(12, 1, 15407, '2018', 0),
(13, 1, 15410, '2018', 0),
(14, 1, 15422, '2018', 0),
(15, 1, 1446, '2018', 0),
(16, 1, 1459, '2018', 0),
(17, 1, 15307, '2018', 0),
(18, 1, 15309, '2018', 0),
(19, 1, 15334, '2018', 0),
(20, 1, 15356, '2018', 0),
(21, 1, 15380, '2018', 0),
(22, 1, 15407, '2018', 0),
(23, 1, 15410, '2018', 0),
(24, 1, 15422, '2018', 0);

-- --------------------------------------------------------

--
-- Table structure for table `programstudi`
--

CREATE TABLE IF NOT EXISTS `programstudi` (
  `pst_id` int(11) NOT NULL,
  `pst_nama` varchar(50) NOT NULL,
  `pst_jenjangpendidikan` varchar(20) NOT NULL,
  `fk_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programstudi`
--

INSERT INTO `programstudi` (`pst_id`, `pst_nama`, `pst_jenjangpendidikan`, `fk_id`) VALUES
(1, 'Manajemen (S-1)', 'S1', 1),
(2, 'Akuntansi (S-1)', 'S1', 1),
(3, 'Ilmu Hukum (S1)', 'S1', 2),
(4, 'Bimbingan Konseling (S-1)', 'S1', 3),
(7, 'Pendidikan Agama Islam (S-1)', 'S1', 4),
(10, 'Hukum Ekonomi Syariah (S-1)', 'S1', 4),
(11, 'Pendidikan Guru Madrasah Ibtidaiyah (S1)', 'S1', 4),
(12, 'Teknik Industri (S-1)', 'S1', 5),
(13, 'Teknik Informatika (D-3)', 'D3', 5),
(14, 'Mesin Otomotif (D-3)', 'D3', 5),
(15, 'Teknik Informatika (S-1)', 'S1', 5),
(16, 'Keperawatan (D-3)', 'D3', 6),
(17, 'Farmasi (D-3)', 'D3', 6),
(19, 'Ilmu Keperawatan (S-1)', 'S1', 6),
(20, 'Pendidikan Anak Usia Dini (S-1)', 'S1', 3),
(21, 'Pendidikan Guru SD (S1)', 'S1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `rumus`
--

CREATE TABLE IF NOT EXISTS `rumus` (
  `rms_id` int(2) NOT NULL,
  `rms_nilaiangka` int(1) NOT NULL,
  `rms_nilaihuruf` varchar(25) NOT NULL,
  `rms_keterangan` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL,
  `fk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
  `smt_id` int(11) NOT NULL,
  `smt_nama` varchar(20) NOT NULL,
  `sss_status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`smt_id`, `smt_nama`, `sss_status`) VALUES
(1, 'Gasal-2001/2002', 0),
(2, 'Genap-2001/2002', 0),
(3, 'Gasal-2002/2003', 0),
(4, 'Genap-2002/2003', 0),
(5, 'Gasal-2003/2004', 0),
(6, 'Genap-2003/2004', 0),
(7, 'Gasal-2004/2005', 0),
(8, 'Genap-2004/2005', 0),
(9, 'Gasal-2005/2006', 0),
(10, 'Genap-2005/2006', 0),
(11, 'Gasal-2006/2007', 0),
(12, 'Genap-2006/2007', 0),
(13, 'Gasal-2007/2008', 0),
(14, 'Genap-2007/2008', 0),
(15, 'Gasal-2008/2009', 0),
(16, 'Genap-2008/2009', 0),
(27, 'Gasal-2009/2010', 0),
(28, 'Genap-2009/2010', 0),
(32, 'Gasal-2010/2011', 0),
(40, 'Genap-2010/2011', 0),
(42, 'Gasal-2011/2012', 0),
(47, 'Genap-2011/2012', 0),
(48, 'Gasal-2012/2013', 0),
(53, 'Genap-2012/2013', 0),
(54, 'Gasal-2013/2014', 0),
(58, 'Genap-2013/2014', 0),
(59, 'Gasal-2014/2015', 0),
(68, 'Genap-2014/2015', 0),
(69, 'Gasal-2015/2016', 0),
(72, 'Genap-2015/2016', 0),
(73, 'Gasal-2016/2017', 0),
(78, 'Genap-2016/2017', 0),
(79, 'Gasal-2017/2018', 0),
(81, 'Genap-2017/2018', 1),
(82, 'Gasal- 2018/2019', 0);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `stg_id` int(2) NOT NULL,
  `stg_ttd` varchar(35) NOT NULL,
  `stg_nomorsurat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `stf_id` int(11) NOT NULL,
  `stf_nama` varchar(50) NOT NULL,
  `stf_nik` varchar(25) NOT NULL,
  `stf_nidn` varchar(25) NOT NULL,
  `stf_hp` varchar(13) NOT NULL,
  `foto` text NOT NULL,
  `sst_id` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`stf_id`, `stf_nama`, `stf_nik`, `stf_nidn`, `stf_hp`, `foto`, `sst_id`) VALUES
(1, 'rafiq', '111', '111', '111', '', 1),
(2, 'nanang', '222', '222', '222', '', 2),
(3, 'ghandos', '333', '333', '333', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `staffstatus`
--

CREATE TABLE IF NOT EXISTS `staffstatus` (
  `sst_id` int(2) NOT NULL,
  `sst_nama` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffstatus`
--

INSERT INTO `staffstatus` (`sst_id`, `sst_nama`) VALUES
(1, 'Admin'),
(2, 'Kepala Staff'),
(3, 'Staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`fk_id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`jd_id`),
  ADD KEY `penguji_1` (`penguji_1`,`penguji_2`,`stg_id`);

--
-- Indexes for table `jeniskelas`
--
ALTER TABLE `jeniskelas`
  ADD PRIMARY KEY (`jk_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`mhs_id`),
  ADD KEY `pst_id` (`pst_id`,`jk_id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`pstr_id`),
  ADD KEY `jd_id` (`jd_id`,`mhs_id`);

--
-- Indexes for table `programstudi`
--
ALTER TABLE `programstudi`
  ADD PRIMARY KEY (`pst_id`),
  ADD KEY `fk_id` (`fk_id`);

--
-- Indexes for table `rumus`
--
ALTER TABLE `rumus`
  ADD PRIMARY KEY (`rms_id`),
  ADD KEY `fk_id` (`fk_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`smt_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`stg_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`stf_id`),
  ADD KEY `sst_id` (`sst_id`);

--
-- Indexes for table `staffstatus`
--
ALTER TABLE `staffstatus`
  ADD PRIMARY KEY (`sst_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `fk_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `jd_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jeniskelas`
--
ALTER TABLE `jeniskelas`
  MODIFY `jk_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `mhs_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16354;
--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `pstr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `programstudi`
--
ALTER TABLE `programstudi`
  MODIFY `pst_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `rumus`
--
ALTER TABLE `rumus`
  MODIFY `rms_id` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `smt_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `stg_id` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `stf_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `staffstatus`
--
ALTER TABLE `staffstatus`
  MODIFY `sst_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
