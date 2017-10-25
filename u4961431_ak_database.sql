-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2017 at 07:41 PM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u4961431_ak_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `ak_admin`
--

CREATE TABLE `ak_admin` (
  `ak_admin_id` int(11) NOT NULL,
  `ak_admin_username` varchar(45) NOT NULL,
  `ak_admin_password` varchar(255) NOT NULL,
  `ak_admin_last_activity` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ak_course`
--

CREATE TABLE `ak_course` (
  `ak_course_id` int(11) NOT NULL,
  `ak_course_name` varchar(45) NOT NULL,
  `ak_course_cat_id` int(11) NOT NULL,
  `ak_course_prov_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ak_course`
--

INSERT INTO `ak_course` (`ak_course_id`, `ak_course_name`, `ak_course_cat_id`, `ak_course_prov_id`) VALUES
(1, 'Persiapan TOEFL', 2, 2),
(2, 'yourcourse2', 6, 1),
(3, 'theircourse3', 6, 1),
(4, 'ourcourse4', 8, 2),
(5, 'itscourse5', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ak_course_age`
--

CREATE TABLE `ak_course_age` (
  `ak_course_age_id` int(11) NOT NULL,
  `ak_course_age_name_id` tinytext NOT NULL,
  `ak_course_age_name_eng` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ak_course_age`
--

INSERT INTO `ak_course_age` (`ak_course_age_id`, `ak_course_age_name_id`, `ak_course_age_name_eng`) VALUES
(1, 'ANAK-ANAK', 'KIDS'),
(2, 'REMAJA', 'TEENS'),
(3, 'DEWASA', 'ADULT');

-- --------------------------------------------------------

--
-- Table structure for table `ak_course_detail`
--

CREATE TABLE `ak_course_detail` (
  `ak_course_detail_id` int(11) NOT NULL,
  `ak_course_id` int(11) NOT NULL,
  `ak_course_detail_name` varchar(45) NOT NULL,
  `ak_course_detail_price` int(11) NOT NULL,
  `ak_course_detail_level` int(11) NOT NULL,
  `ak_course_detail_age` int(11) NOT NULL,
  `ak_course_detail_size` smallint(3) NOT NULL,
  `ak_course_detail_desc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ak_course_detail`
--

INSERT INTO `ak_course_detail` (`ak_course_detail_id`, `ak_course_id`, `ak_course_detail_name`, `ak_course_detail_price`, `ak_course_detail_level`, `ak_course_detail_age`, `ak_course_detail_size`, `ak_course_detail_desc`) VALUES
(1, 1, 'full TOEFL ITP', 100000, 2, 2, 10, 'TOEFL ITP Preparation Course'),
(2, 2, 'yourcourse2 detail', 200000, 3, 3, 15, 'this description is useful'),
(3, 3, 'Course Detail', 300000, 3, 3, 10, 'Course Detail'),
(4, 4, 'ourcourse4 detail', 400000, 1, 2, 13, 'this description is utterly despicable'),
(5, 5, 'itscourse5 detail', 500000, 2, 3, 25, 'this description is awfully useful');

-- --------------------------------------------------------

--
-- Table structure for table `ak_course_facility`
--

CREATE TABLE `ak_course_facility` (
  `ak_course_facility_id` int(11) NOT NULL,
  `ak_course_facility_detid` int(11) NOT NULL,
  `ak_facility_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ak_course_facility`
--

INSERT INTO `ak_course_facility` (`ak_course_facility_id`, `ak_course_facility_detid`, `ak_facility_type_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ak_course_level`
--

CREATE TABLE `ak_course_level` (
  `ak_course_level_id` int(11) NOT NULL,
  `ak_course_level_name` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ak_course_level`
--

INSERT INTO `ak_course_level` (`ak_course_level_id`, `ak_course_level_name`) VALUES
(1, 'PEMULA'),
(2, 'MENENGAH'),
(3, 'MAHIR');

-- --------------------------------------------------------

--
-- Table structure for table `ak_course_schedule`
--

CREATE TABLE `ak_course_schedule` (
  `ak_course_schedule_id` int(11) NOT NULL,
  `ak_course_schedule_detid` int(11) NOT NULL,
  `ak_course_schedule_day` tinytext NOT NULL,
  `ak_course_schedule_time` time(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ak_course_schedule`
--

INSERT INTO `ak_course_schedule` (`ak_course_schedule_id`, `ak_course_schedule_detid`, `ak_course_schedule_day`, `ak_course_schedule_time`) VALUES
(1, 1, 'senin', '08:16:24.0000'),
(2, 1, 'selasa', '13:00:00.0000'),
(3, 2, 'rabu', '14:00:00.0000'),
(4, 2, 'kamis', '14:00:00.0000'),
(5, 3, 'jumat', '15:00:00.0000'),
(6, 3, 'sabtu', '15:00:00.0000'),
(7, 4, 'senin', '10:00:00.0000'),
(8, 4, 'senin', '11:00:00.0000'),
(9, 5, 'selasa', '10:00:00.0000'),
(10, 5, 'selasa', '11:00:00.0000');

-- --------------------------------------------------------

--
-- Table structure for table `ak_facility_type`
--

CREATE TABLE `ak_facility_type` (
  `ak_facility_type_id` int(11) NOT NULL,
  `ak_facility_type_name_idn` text NOT NULL,
  `ak_facility_type_name_eng` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ak_facility_type`
--

INSERT INTO `ak_facility_type` (`ak_facility_type_id`, `ak_facility_type_name_idn`, `ak_facility_type_name_eng`) VALUES
(1, 'tes', 'test'),
(2, 'djakarta', 'jakarta'),
(3, 'matamu', 'myass');

-- --------------------------------------------------------

--
-- Table structure for table `ak_main_category`
--

CREATE TABLE `ak_main_category` (
  `ak_maincat_id` int(11) NOT NULL,
  `ak_maincat_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ak_main_category`
--

INSERT INTO `ak_main_category` (`ak_maincat_id`, `ak_maincat_name`) VALUES
(1, 'Bahasa'),
(2, 'biology'),
(3, 'math'),
(4, 'chemistry');

-- --------------------------------------------------------

--
-- Table structure for table `ak_pay_ment`
--

CREATE TABLE `ak_pay_ment` (
  `ak_pay_ment_id` int(11) NOT NULL,
  `ak_pay_ment_tran_id` int(11) NOT NULL,
  `ak_pay_ment_price` varchar(45) NOT NULL,
  `ak_pay_ment_paid` varchar(45) NOT NULL,
  `ak_pay_ment_cc` varchar(45) NOT NULL,
  `ak_pay_ment_dc` varchar(45) NOT NULL,
  `ak_pay_ment_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ak_provider`
--

CREATE TABLE `ak_provider` (
  `ak_provider_id` int(11) NOT NULL,
  `ak_provider_firstname` varchar(45) NOT NULL,
  `ak_provider_lastname` varchar(45) NOT NULL,
  `ak_provider_email` varchar(45) NOT NULL,
  `ak_provider_password` varchar(255) NOT NULL,
  `ak_provider_region` int(11) NOT NULL,
  `ak_provider_address` longtext NOT NULL,
  `ak_provider_zipcode` smallint(5) NOT NULL,
  `ak_provider_description` longtext NOT NULL,
  `ak_provider_telephone` varchar(13) NOT NULL,
  `ak_provider_last_activity` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ak_provider`
--

INSERT INTO `ak_provider` (`ak_provider_id`, `ak_provider_firstname`, `ak_provider_lastname`, `ak_provider_email`, `ak_provider_password`, `ak_provider_region`, `ak_provider_address`, `ak_provider_zipcode`, `ak_provider_description`, `ak_provider_telephone`, `ak_provider_last_activity`, `remember_token`) VALUES
(1, 'FFE', '(First For English)', 'fe@co.id', 'admin', 3171, 'Pejaten Village Mall\r\nLt3. Kav 31', 15432, 'FFE is the leading English provider, with WORLD CLASS teacher ready to meet you. ', '(021)897767', '0000-00-00 00:00:00', NULL),
(2, 'my', 'provider', 'asd@asd.asd', 'asdasd', 1101, 'mwahahahaha', 12323, 'mwahahahaha', '1234567890', '2017-04-12 00:00:00', NULL),
(3, 'your', 'unprovider', 'aaa@aaa.aaa', 'aaaaaa', 1102, 'kwihihihihihi', 18283, 'kwihihihihihi', '987654321', '2017-04-02 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ak_provider_img`
--

CREATE TABLE `ak_provider_img` (
  `ak_provider_img_id` int(11) NOT NULL,
  `ak_provider_id` int(11) NOT NULL,
  `ak_provider_img_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ak_provider_img`
--

INSERT INTO `ak_provider_img` (`ak_provider_img_id`, `ak_provider_id`, `ak_provider_img_path`) VALUES
(1, 1, 'https://gallery101.files.wordpress.com/2014/12/tempat-kursus-bahasa-inggris-lia.jpg'),
(2, 2, 'http://cdn2.tstatic.net/jogja/foto/bank/images/belajar-mengajar-di-englishopedia_20160813_082339.jpg'),
(3, 3, 'http://4.bp.blogspot.com/--0UNWjiAqXs/UU8SWSgmIuI/AAAAAAAAAcI/9hxZ5Ys1glQ/s1600/kampung+inggris.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `ak_province`
--

CREATE TABLE `ak_province` (
  `ak_province_id` int(11) NOT NULL,
  `ak_province_name` text NOT NULL,
  `ak_province_name_abbr` text NOT NULL,
  `ak_province_name_idn` text NOT NULL,
  `ak_province_name_eng` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ak_province`
--

INSERT INTO `ak_province` (`ak_province_id`, `ak_province_name`, `ak_province_name_abbr`, `ak_province_name_idn`, `ak_province_name_eng`) VALUES
(11, 'Aceh', 'NAD', 'Nanggroe Aceh Darussalam', 0),
(12, 'Sumatera Utara', 'Sumut', 'Sumatera Utara', 0),
(13, 'Sumatera Barat', 'Sumbar', 'Sumatera Barat', 0),
(14, 'Riau', 'Riau', 'Riau', 0),
(15, 'Jambi', 'Jambi', 'Jambi', 0),
(16, 'Sumatera Selatan', 'Sumsel', 'Sumatera Selatan', 0),
(17, 'Bengkulu', 'Bengkulu', 'Bengkulu', 0),
(18, 'Lampung', 'Lampung', 'Lampung', 0),
(19, 'Kepulauan Bangka Belitung', 'Babel', 'Kepulauan Bangka Belitung', 0),
(21, 'Kepulauan Riau', 'Kepri', 'Kepulauan Riau', 0),
(31, 'DKI Jakarta', 'DKI', 'DKI Jakarta', 0),
(32, 'Jawa Barat', 'Jabar', 'Jawa Barat', 0),
(33, 'Jawa Tengah', 'Jateng', 'Jawa Tengah', 0),
(34, 'DI Yogyakarta', 'DIY', 'DI Yogyakarta', 0),
(35, 'Jawa Timur', 'Jatim', 'Jawa Timur', 0),
(36, 'Banten', 'Banten', 'Banten', 0),
(51, 'Bali', 'Bali', 'Bali', 0),
(52, 'Nusa Tenggara Barat', 'NTB', 'Nusa Tenggara Barat', 0),
(53, 'Nusa Tenggara Timur', 'NTT', 'Nusa Tenggara Timur', 0),
(61, 'Kalimantan Barat', 'Kalbar', 'Kalimantan Barat', 0),
(62, 'Kalimantan Tengah', 'Kalteng', 'Kalimantan Tengah', 0),
(63, 'Kalimantan Selatan', 'Kalsel', 'Kalimantan Selatan', 0),
(64, 'Kalimantan Timur', 'Kaltim', 'Kalimantan Timur', 0),
(65, 'Kalimantan Utara', 'Kaltara', 'Kalimantan Utara', 0),
(71, 'Sulawesi Utara', 'Sulut', 'Sulawesi Utara', 0),
(72, 'Sulawesi Tengah', 'Sulteng', 'Sulawesi Tengah', 0),
(73, 'Sulawesi Selatan', 'Sulsel', 'Sulawesi Selatan', 0),
(74, 'Sulawesi Tenggara', 'Sultra', 'Sulawesi Tenggara', 0),
(75, 'Gorontalo', 'Gorontalo', 'Gorontalo', 0),
(76, 'Sulawesi Barat', 'Sulbar', 'Sulawesi Barat', 0),
(81, 'Maluku', 'Maluku', 'Maluku', 0),
(82, 'Maluku Utara', 'Malut', 'Maluku Utara', 0),
(91, 'Papua Barat', 'Papua Barat', 'Papua Barat', 0),
(94, 'Papua', 'Papua', 'Papua', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ak_region`
--

CREATE TABLE `ak_region` (
  `ak_region_id` int(11) NOT NULL,
  `ak_region_prov_id` int(11) NOT NULL,
  `ak_region_cityname` text NOT NULL,
  `ak_region_name` text NOT NULL,
  `ak_region_namefull` text NOT NULL,
  `ak_region_parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ak_region`
--

INSERT INTO `ak_region` (`ak_region_id`, `ak_region_prov_id`, `ak_region_cityname`, `ak_region_name`, `ak_region_namefull`, `ak_region_parent_id`) VALUES
(1101, 11, 'Simeulue', '', 'Kabupaten Simeulue', NULL),
(1102, 11, 'Aceh Singkil', '', 'Kabupaten Aceh Singkil', NULL),
(1103, 11, 'Aceh Selatan', '', 'Kabupaten Aceh Selatan', NULL),
(1104, 11, 'Aceh Tenggara', '', 'Kabupaten Aceh Tenggara', NULL),
(1105, 11, 'Aceh Timur', '', 'Kabupaten Aceh Timur', NULL),
(1106, 11, 'Aceh Tengah', '', 'Kabupaten Aceh Tengah', NULL),
(1107, 11, 'Aceh Barat', '', 'Kabupaten Aceh Barat', NULL),
(1108, 11, 'Aceh Besar', '', 'Kabupaten Aceh Besar', NULL),
(1109, 11, 'Pidie', '', 'Kabupaten Pidie', NULL),
(1110, 11, 'Bireuen', '', 'Kabupaten Bireuen', NULL),
(1111, 11, 'Aceh Utara', '', 'Kabupaten Aceh Utara', NULL),
(1112, 11, 'Aceh Barat Daya', '', 'Kabupaten Aceh Barat Daya', NULL),
(1113, 11, 'Gayo Lues', '', 'Kabupaten Gayo Lues', NULL),
(1114, 11, 'Aceh Tamiang', '', 'Kabupaten Aceh Tamiang', NULL),
(1115, 11, 'Nagan Raya', '', 'Kabupaten Nagan Raya', NULL),
(1116, 11, 'Aceh Jaya', '', 'Kabupaten Aceh Jaya', NULL),
(1117, 11, 'Bener Meriah', '', 'Kabupaten Bener Meriah', NULL),
(1118, 11, 'Pidie Jaya', '', 'Kabupaten Pidie Jaya', NULL),
(1171, 11, 'Banda Aceh', '', 'Kota Banda Aceh', NULL),
(1172, 11, 'Sabang', '', 'Kota Sabang', NULL),
(1173, 11, 'Langsa', '', 'Kota Langsa', NULL),
(1174, 11, 'Lhokseumawe', '', 'Kota Lhokseumawe', NULL),
(1175, 11, 'Subulussalam', '', 'Kota Subulussalam', NULL),
(1201, 12, 'Nias', '', 'Kabupaten Nias', NULL),
(1202, 12, 'Mandailing Natal', '', 'Kabupaten Mandailing Natal', NULL),
(1203, 12, 'Tapanuli Selatan', '', 'Kabupaten Tapanuli Selatan', NULL),
(1204, 12, 'Tapanuli Tengah', '', 'Kabupaten Tapanuli Tengah', NULL),
(1205, 12, 'Tapanuli Utara', '', 'Kabupaten Tapanuli Utara', NULL),
(1206, 12, 'Toba Samosir', '', 'Kabupaten Toba Samosir', NULL),
(1207, 12, 'Labuhan Batu', '', 'Kabupaten Labuhan Batu', NULL),
(1208, 12, 'Asahan', '', 'Kabupaten Asahan', NULL),
(1209, 12, 'Simalungun', '', 'Kabupaten Simalungun', NULL),
(1210, 12, 'Dairi', '', 'Kabupaten Dairi', NULL),
(1211, 12, 'Karo', '', 'Kabupaten Karo', NULL),
(1212, 12, 'Deli Serdang', '', 'Kabupaten Deli Serdang', NULL),
(1213, 12, 'Langkat', '', 'Kabupaten Langkat', NULL),
(1214, 12, 'Nias Selatan', '', 'Kabupaten Nias Selatan', NULL),
(1215, 12, 'Humbang Hasundutan', '', 'Kabupaten Humbang Hasundutan', NULL),
(1216, 12, 'Pakpak Bharat', '', 'Kabupaten Pakpak Bharat', NULL),
(1217, 12, 'Samosir', '', 'Kabupaten Samosir', NULL),
(1218, 12, 'Serdang Bedagai', '', 'Kabupaten Serdang Bedagai', NULL),
(1219, 12, 'Batu Bara', '', 'Kabupaten Batu Bara', NULL),
(1220, 12, 'Padang Lawas Utara', '', 'Kabupaten Padang Lawas Utara', NULL),
(1221, 12, 'Padang Lawas', '', 'Kabupaten Padang Lawas', NULL),
(1222, 12, 'Labuhan Batu Selatan', '', 'Kabupaten Labuhan Batu Selatan', NULL),
(1223, 12, 'Labuhan Batu Utara', '', 'Kabupaten Labuhan Batu Utara', NULL),
(1224, 12, 'Nias Utara', '', 'Kabupaten Nias Utara', NULL),
(1225, 12, 'Nias Barat', '', 'Kabupaten Nias Barat', NULL),
(1271, 12, 'Sibolga', '', 'Kota Sibolga', NULL),
(1272, 12, 'Tanjung Balai', '', 'Kota Tanjung Balai', NULL),
(1273, 12, 'Pematang Siantar', '', 'Kota Pematang Siantar', NULL),
(1274, 12, 'Tebing Tinggi', '', 'Kota Tebing Tinggi', NULL),
(1275, 12, 'Medan', '', 'Kota Medan', NULL),
(1276, 12, 'Binjai', '', 'Kota Binjai', NULL),
(1277, 12, 'Padangsidimpuan', '', 'Kota Padangsidimpuan', NULL),
(1278, 12, 'Gunungsitoli', '', 'Kota Gunungsitoli', NULL),
(1301, 13, 'Kepulauan Mentawai', '', 'Kabupaten Kepulauan Mentawai', NULL),
(1302, 13, 'Pesisir Selatan', '', 'Kabupaten Pesisir Selatan', NULL),
(1303, 13, 'Solok', '', 'Kabupaten Solok', NULL),
(1304, 13, 'Sijunjung', '', 'Kabupaten Sijunjung', NULL),
(1305, 13, 'Tanah Datar', '', 'Kabupaten Tanah Datar', NULL),
(1306, 13, 'Padang Pariaman', '', 'Kabupaten Padang Pariaman', NULL),
(1307, 13, 'Agam', '', 'Kabupaten Agam', NULL),
(1308, 13, 'Lima Puluh Kota', '', 'Kabupaten Lima Puluh Kota', NULL),
(1309, 13, 'Pasaman', '', 'Kabupaten Pasaman', NULL),
(1310, 13, 'Solok Selatan', '', 'Kabupaten Solok Selatan', NULL),
(1311, 13, 'Dharmasraya', '', 'Kabupaten Dharmasraya', NULL),
(1312, 13, 'Pasaman Barat', '', 'Kabupaten Pasaman Barat', NULL),
(1371, 13, 'Padang', '', 'Kota Padang', NULL),
(1372, 13, 'Solok', '', 'Kota Solok', NULL),
(1373, 13, 'Sawah Lunto', '', 'Kota Sawah Lunto', NULL),
(1374, 13, 'Padang Panjang', '', 'Kota Padang Panjang', NULL),
(1375, 13, 'Bukittinggi', '', 'Kota Bukittinggi', NULL),
(1376, 13, 'Payakumbuh', '', 'Kota Payakumbuh', NULL),
(1377, 13, 'Pariaman', '', 'Kota Pariaman', NULL),
(1401, 14, 'Kuantan Singingi', '', 'Kabupaten Kuantan Singingi', NULL),
(1402, 14, 'Indragiri Hulu', '', 'Kabupaten Indragiri Hulu', NULL),
(1403, 14, 'Indragiri Hilir', '', 'Kabupaten Indragiri Hilir', NULL),
(1404, 14, 'Pelalawan', '', 'Kabupaten Pelalawan', NULL),
(1405, 14, 'Siak', '', 'Kabupaten Siak', NULL),
(1406, 14, 'Kampar', '', 'Kabupaten Kampar', NULL),
(1407, 14, 'Rokan Hulu', '', 'Kabupaten Rokan Hulu', NULL),
(1408, 14, 'Bengkalis', '', 'Kabupaten Bengkalis', NULL),
(1409, 14, 'Rokan Hilir', '', 'Kabupaten Rokan Hilir', NULL),
(1410, 14, 'Kepulauan Meranti', '', 'Kabupaten Kepulauan Meranti', NULL),
(1471, 14, 'Pekanbaru', '', 'Kota Pekanbaru', NULL),
(1473, 14, 'Dumai', '', 'Kota Dumai', NULL),
(1501, 15, 'Kerinci', '', 'Kabupaten Kerinci', NULL),
(1502, 15, 'Merangin', '', 'Kabupaten Merangin', NULL),
(1503, 15, 'Sarolangun', '', 'Kabupaten Sarolangun', NULL),
(1504, 15, 'Batang Hari', '', 'Kabupaten Batang Hari', NULL),
(1505, 15, 'Muaro Jambi', '', 'Kabupaten Muaro Jambi', NULL),
(1506, 15, 'Tanjung Jabung Timur', '', 'Kabupaten Tanjung Jabung Timur', NULL),
(1507, 15, 'Tanjung Jabung Barat', '', 'Kabupaten Tanjung Jabung Barat', NULL),
(1508, 15, 'Tebo', '', 'Kabupaten Tebo', NULL),
(1509, 15, 'Bungo', '', 'Kabupaten Bungo', NULL),
(1571, 15, 'Jambi', '', 'Kota Jambi', NULL),
(1572, 15, 'Sungai Penuh', '', 'Kota Sungai Penuh', NULL),
(1601, 16, 'Ogan Komering Ulu', '', 'Kabupaten Ogan Komering Ulu', NULL),
(1602, 16, 'Ogan Komering Ilir', '', 'Kabupaten Ogan Komering Ilir', NULL),
(1603, 16, 'Muara Enim', '', 'Kabupaten Muara Enim', NULL),
(1604, 16, 'Lahat', '', 'Kabupaten Lahat', NULL),
(1605, 16, 'Musi Rawas', '', 'Kabupaten Musi Rawas', NULL),
(1606, 16, 'Musi Banyuasin', '', 'Kabupaten Musi Banyuasin', NULL),
(1607, 16, 'Banyu Asin', '', 'Kabupaten Banyu Asin', NULL),
(1608, 16, 'Ogan Komering Ulu Selatan', '', 'Kabupaten Ogan Komering Ulu Selatan', NULL),
(1609, 16, 'Ogan Komering Ulu Timur', '', 'Kabupaten Ogan Komering Ulu Timur', NULL),
(1610, 16, 'Ogan Ilir', '', 'Kabupaten Ogan Ilir', NULL),
(1611, 16, 'Empat Lawang', '', 'Kabupaten Empat Lawang', NULL),
(1671, 16, 'Palembang', '', 'Kota Palembang', NULL),
(1672, 16, 'Prabumulih', '', 'Kota Prabumulih', NULL),
(1673, 16, 'Pagar Alam', '', 'Kota Pagar Alam', NULL),
(1674, 16, 'Lubuklinggau', '', 'Kota Lubuklinggau', NULL),
(1701, 17, 'Bengkulu Selatan', '', 'Kabupaten Bengkulu Selatan', NULL),
(1702, 17, 'Rejang Lebong', '', 'Kabupaten Rejang Lebong', NULL),
(1703, 17, 'Bengkulu Utara', '', 'Kabupaten Bengkulu Utara', NULL),
(1704, 17, 'Kaur', '', 'Kabupaten Kaur', NULL),
(1705, 17, 'Seluma', '', 'Kabupaten Seluma', NULL),
(1706, 17, 'Mukomuko', '', 'Kabupaten Mukomuko', NULL),
(1707, 17, 'Lebong', '', 'Kabupaten Lebong', NULL),
(1708, 17, 'Kepahiang', '', 'Kabupaten Kepahiang', NULL),
(1709, 17, 'Bengkulu Tengah', '', 'Kabupaten Bengkulu Tengah', NULL),
(1771, 17, 'Bengkulu', '', 'Kota Bengkulu', NULL),
(1801, 18, 'Lampung Barat', '', 'Kabupaten Lampung Barat', NULL),
(1802, 18, 'Tanggamus', '', 'Kabupaten Tanggamus', NULL),
(1803, 18, 'Lampung Selatan', '', 'Kabupaten Lampung Selatan', NULL),
(1804, 18, 'Lampung Timur', '', 'Kabupaten Lampung Timur', NULL),
(1805, 18, 'Lampung Tengah', '', 'Kabupaten Lampung Tengah', NULL),
(1806, 18, 'Lampung Utara', '', 'Kabupaten Lampung Utara', NULL),
(1807, 18, 'Way Kanan', '', 'Kabupaten Way Kanan', NULL),
(1808, 18, 'Tulangbawang', '', 'Kabupaten Tulangbawang', NULL),
(1809, 18, 'Pesawaran', '', 'Kabupaten Pesawaran', NULL),
(1810, 18, 'Pringsewu', '', 'Kabupaten Pringsewu', NULL),
(1811, 18, 'Mesuji', '', 'Kabupaten Mesuji', NULL),
(1812, 18, 'Tulang Bawang Barat', '', 'Kabupaten Tulang Bawang Barat', NULL),
(1813, 18, 'Pesisir Barat', '', 'Kabupaten Pesisir Barat', NULL),
(1871, 18, 'Bandar Lampung', '', 'Kota Bandar Lampung', NULL),
(1872, 18, 'Metro', '', 'Kota Metro', NULL),
(1901, 19, 'Bangka', '', 'Kabupaten Bangka', NULL),
(1902, 19, 'Belitung', '', 'Kabupaten Belitung', NULL),
(1903, 19, 'Bangka Barat', '', 'Kabupaten Bangka Barat', NULL),
(1904, 19, 'Bangka Tengah', '', 'Kabupaten Bangka Tengah', NULL),
(1905, 19, 'Bangka Selatan', '', 'Kabupaten Bangka Selatan', NULL),
(1906, 19, 'Belitung Timur', '', 'Kabupaten Belitung Timur', NULL),
(1971, 19, 'Pangkal Pinang', '', 'Kota Pangkal Pinang', NULL),
(2101, 21, 'Karimun', '', 'Kabupaten Karimun', NULL),
(2102, 21, 'Bintan', '', 'Kabupaten Bintan', NULL),
(2103, 21, 'Natuna', '', 'Kabupaten Natuna', NULL),
(2104, 21, 'Lingga', '', 'Kabupaten Lingga', NULL),
(2105, 21, 'Kepulauan Anambas', '', 'Kabupaten Kepulauan Anambas', NULL),
(2171, 21, 'Batam', '', 'Kota Batam', NULL),
(2172, 21, 'Tanjung Pinang', '', 'Kota Tanjung Pinang', NULL),
(3101, 31, 'Kepulauan Seribu', '', 'Kabupaten Kepulauan Seribu', NULL),
(3171, 31, 'Jakarta Selatan', '', 'Kota Jakarta Selatan', NULL),
(3172, 31, 'Jakarta Timur', '', 'Kota Jakarta Timur', NULL),
(3173, 31, 'Jakarta Pusat', '', 'Kota Jakarta Pusat', NULL),
(3174, 31, 'Jakarta Barat', '', 'Kota Jakarta Barat', NULL),
(3175, 31, 'Jakarta Utara', '', 'Kota Jakarta Utara', NULL),
(3201, 32, 'Bogor', '', 'Kabupaten Bogor', NULL),
(3202, 32, 'Sukabumi', '', 'Kabupaten Sukabumi', NULL),
(3203, 32, 'Cianjur', '', 'Kabupaten Cianjur', NULL),
(3204, 32, 'Bandung', '', 'Kabupaten Bandung', NULL),
(3205, 32, 'Garut', '', 'Kabupaten Garut', NULL),
(3206, 32, 'Tasikmalaya', '', 'Kabupaten Tasikmalaya', NULL),
(3207, 32, 'Ciamis', '', 'Kabupaten Ciamis', NULL),
(3208, 32, 'Kuningan', '', 'Kabupaten Kuningan', NULL),
(3209, 32, 'Cirebon', '', 'Kabupaten Cirebon', NULL),
(3210, 32, 'Majalengka', '', 'Kabupaten Majalengka', NULL),
(3211, 32, 'Sumedang', '', 'Kabupaten Sumedang', NULL),
(3212, 32, 'Indramayu', '', 'Kabupaten Indramayu', NULL),
(3213, 32, 'Subang', '', 'Kabupaten Subang', NULL),
(3214, 32, 'Purwakarta', '', 'Kabupaten Purwakarta', NULL),
(3215, 32, 'Karawang', '', 'Kabupaten Karawang', NULL),
(3216, 32, 'Bekasi', '', 'Kabupaten Bekasi', NULL),
(3217, 32, 'Bandung Barat', '', 'Kabupaten Bandung Barat', NULL),
(3218, 32, 'Pangandaran', '', 'Kabupaten Pangandaran', NULL),
(3271, 32, 'Bogor', '', 'Kota Bogor', NULL),
(3272, 32, 'Sukabumi', '', 'Kota Sukabumi', NULL),
(3273, 32, 'Bandung', '', 'Kota Bandung', NULL),
(3274, 32, 'Cirebon', '', 'Kota Cirebon', NULL),
(3275, 32, 'Bekasi', '', 'Kota Bekasi', NULL),
(3276, 32, 'Depok', '', 'Kota Depok', NULL),
(3277, 32, 'Cimahi', '', 'Kota Cimahi', NULL),
(3278, 32, 'Tasikmalaya', '', 'Kota Tasikmalaya', NULL),
(3279, 32, 'Banjar', '', 'Kota Banjar', NULL),
(3301, 33, 'Cilacap', '', 'Kabupaten Cilacap', NULL),
(3302, 33, 'Banyumas', '', 'Kabupaten Banyumas', NULL),
(3303, 33, 'Purbalingga', '', 'Kabupaten Purbalingga', NULL),
(3304, 33, 'Banjarnegara', '', 'Kabupaten Banjarnegara', NULL),
(3305, 33, 'Kebumen', '', 'Kabupaten Kebumen', NULL),
(3306, 33, 'Purworejo', '', 'Kabupaten Purworejo', NULL),
(3307, 33, 'Wonosobo', '', 'Kabupaten Wonosobo', NULL),
(3308, 33, 'Magelang', '', 'Kabupaten Magelang', NULL),
(3309, 33, 'Boyolali', '', 'Kabupaten Boyolali', NULL),
(3310, 33, 'Klaten', '', 'Kabupaten Klaten', NULL),
(3311, 33, 'Sukoharjo', '', 'Kabupaten Sukoharjo', NULL),
(3312, 33, 'Wonogiri', '', 'Kabupaten Wonogiri', NULL),
(3313, 33, 'Karanganyar', '', 'Kabupaten Karanganyar', NULL),
(3314, 33, 'Sragen', '', 'Kabupaten Sragen', NULL),
(3315, 33, 'Grobogan', '', 'Kabupaten Grobogan', NULL),
(3316, 33, 'Blora', '', 'Kabupaten Blora', NULL),
(3317, 33, 'Rembang', '', 'Kabupaten Rembang', NULL),
(3318, 33, 'Pati', '', 'Kabupaten Pati', NULL),
(3319, 33, 'Kudus', '', 'Kabupaten Kudus', NULL),
(3320, 33, 'Jepara', '', 'Kabupaten Jepara', NULL),
(3321, 33, 'Demak', '', 'Kabupaten Demak', NULL),
(3322, 33, 'Semarang', '', 'Kabupaten Semarang', NULL),
(3323, 33, 'Temanggung', '', 'Kabupaten Temanggung', NULL),
(3324, 33, 'Kendal', '', 'Kabupaten Kendal', NULL),
(3325, 33, 'Batang', '', 'Kabupaten Batang', NULL),
(3326, 33, 'Pekalongan', '', 'Kabupaten Pekalongan', NULL),
(3327, 33, 'Pemalang', '', 'Kabupaten Pemalang', NULL),
(3328, 33, 'Tegal', '', 'Kabupaten Tegal', NULL),
(3329, 33, 'Brebes', '', 'Kabupaten Brebes', NULL),
(3371, 33, 'Magelang', '', 'Kota Magelang', NULL),
(3372, 33, 'Surakarta', '', 'Kota Surakarta', NULL),
(3373, 33, 'Salatiga', '', 'Kota Salatiga', NULL),
(3374, 33, 'Semarang', '', 'Kota Semarang', NULL),
(3375, 33, 'Pekalongan', '', 'Kota Pekalongan', NULL),
(3376, 33, 'Tegal', '', 'Kota Tegal', NULL),
(3401, 34, 'Kulon Progo', '', 'Kabupaten Kulon Progo', NULL),
(3402, 34, 'Bantul', '', 'Kabupaten Bantul', NULL),
(3403, 34, 'Gunung Kidul', '', 'Kabupaten Gunung Kidul', NULL),
(3404, 34, 'Sleman', '', 'Kabupaten Sleman', NULL),
(3471, 34, 'Yogyakarta', '', 'Kota Yogyakarta', NULL),
(3501, 35, 'Pacitan', '', 'Kabupaten Pacitan', NULL),
(3502, 35, 'Ponorogo', '', 'Kabupaten Ponorogo', NULL),
(3503, 35, 'Trenggalek', '', 'Kabupaten Trenggalek', NULL),
(3504, 35, 'Tulungagung', '', 'Kabupaten Tulungagung', NULL),
(3505, 35, 'Blitar', '', 'Kabupaten Blitar', NULL),
(3506, 35, 'Kediri', '', 'Kabupaten Kediri', NULL),
(3507, 35, 'Malang', '', 'Kabupaten Malang', NULL),
(3508, 35, 'Lumajang', '', 'Kabupaten Lumajang', NULL),
(3509, 35, 'Jember', '', 'Kabupaten Jember', NULL),
(3510, 35, 'Banyuwangi', '', 'Kabupaten Banyuwangi', NULL),
(3511, 35, 'Bondowoso', '', 'Kabupaten Bondowoso', NULL),
(3512, 35, 'Situbondo', '', 'Kabupaten Situbondo', NULL),
(3513, 35, 'Probolinggo', '', 'Kabupaten Probolinggo', NULL),
(3514, 35, 'Pasuruan', '', 'Kabupaten Pasuruan', NULL),
(3515, 35, 'Sidoarjo', '', 'Kabupaten Sidoarjo', NULL),
(3516, 35, 'Mojokerto', '', 'Kabupaten Mojokerto', NULL),
(3517, 35, 'Jombang', '', 'Kabupaten Jombang', NULL),
(3518, 35, 'Nganjuk', '', 'Kabupaten Nganjuk', NULL),
(3519, 35, 'Madiun', '', 'Kabupaten Madiun', NULL),
(3520, 35, 'Magetan', '', 'Kabupaten Magetan', NULL),
(3521, 35, 'Ngawi', '', 'Kabupaten Ngawi', NULL),
(3522, 35, 'Bojonegoro', '', 'Kabupaten Bojonegoro', NULL),
(3523, 35, 'Tuban', '', 'Kabupaten Tuban', NULL),
(3524, 35, 'Lamongan', '', 'Kabupaten Lamongan', NULL),
(3525, 35, 'Gresik', '', 'Kabupaten Gresik', NULL),
(3526, 35, 'Bangkalan', '', 'Kabupaten Bangkalan', NULL),
(3527, 35, 'Sampang', '', 'Kabupaten Sampang', NULL),
(3528, 35, 'Pamekasan', '', 'Kabupaten Pamekasan', NULL),
(3529, 35, 'Sumenep', '', 'Kabupaten Sumenep', NULL),
(3571, 35, 'Kediri', '', 'Kota Kediri', NULL),
(3572, 35, 'Blitar', '', 'Kota Blitar', NULL),
(3573, 35, 'Malang', '', 'Kota Malang', NULL),
(3574, 35, 'Probolinggo', '', 'Kota Probolinggo', NULL),
(3575, 35, 'Pasuruan', '', 'Kota Pasuruan', NULL),
(3576, 35, 'Mojokerto', '', 'Kota Mojokerto', NULL),
(3577, 35, 'Madiun', '', 'Kota Madiun', NULL),
(3578, 35, 'Surabaya', '', 'Kota Surabaya', NULL),
(3579, 35, 'Batu', '', 'Kota Batu', NULL),
(3601, 36, 'Pandeglang', '', 'Kabupaten Pandeglang', NULL),
(3602, 36, 'Lebak', '', 'Kabupaten Lebak', NULL),
(3603, 36, 'Tangerang', '', 'Kabupaten Tangerang', NULL),
(3604, 36, 'Serang', '', 'Kabupaten Serang', NULL),
(3671, 36, 'Tangerang', '', 'Kota Tangerang', NULL),
(3672, 36, 'Cilegon', '', 'Kota Cilegon', NULL),
(3673, 36, 'Serang', '', 'Kota Serang', NULL),
(3674, 36, 'Tangerang Selatan', '', 'Kota Tangerang Selatan', NULL),
(5101, 51, 'Jembrana', '', 'Kabupaten Jembrana', NULL),
(5102, 51, 'Tabanan', '', 'Kabupaten Tabanan', NULL),
(5103, 51, 'Badung', '', 'Kabupaten Badung', NULL),
(5104, 51, 'Gianyar', '', 'Kabupaten Gianyar', NULL),
(5105, 51, 'Klungkung', '', 'Kabupaten Klungkung', NULL),
(5106, 51, 'Bangli', '', 'Kabupaten Bangli', NULL),
(5107, 51, 'Karang Asem', '', 'Kabupaten Karang Asem', NULL),
(5108, 51, 'Buleleng', '', 'Kabupaten Buleleng', NULL),
(5171, 51, 'Denpasar', '', 'Kota Denpasar', NULL),
(5201, 52, 'Lombok Barat', '', 'Kabupaten Lombok Barat', NULL),
(5202, 52, 'Lombok Tengah', '', 'Kabupaten Lombok Tengah', NULL),
(5203, 52, 'Lombok Timur', '', 'Kabupaten Lombok Timur', NULL),
(5204, 52, 'Sumbawa', '', 'Kabupaten Sumbawa', NULL),
(5205, 52, 'Dompu', '', 'Kabupaten Dompu', NULL),
(5206, 52, 'Bima', '', 'Kabupaten Bima', NULL),
(5207, 52, 'Sumbawa Barat', '', 'Kabupaten Sumbawa Barat', NULL),
(5208, 52, 'Lombok Utara', '', 'Kabupaten Lombok Utara', NULL),
(5271, 52, 'Mataram', '', 'Kota Mataram', NULL),
(5272, 52, 'Bima', '', 'Kota Bima', NULL),
(5301, 53, 'Sumba Barat', '', 'Kabupaten Sumba Barat', NULL),
(5302, 53, 'Sumba Timur', '', 'Kabupaten Sumba Timur', NULL),
(5303, 53, 'Kupang', '', 'Kabupaten Kupang', NULL),
(5304, 53, 'Timor Tengah Selatan', '', 'Kabupaten Timor Tengah Selatan', NULL),
(5305, 53, 'Timor Tengah Utara', '', 'Kabupaten Timor Tengah Utara', NULL),
(5306, 53, 'Belu', '', 'Kabupaten Belu', NULL),
(5307, 53, 'Alor', '', 'Kabupaten Alor', NULL),
(5308, 53, 'Lembata', '', 'Kabupaten Lembata', NULL),
(5309, 53, 'Flores Timur', '', 'Kabupaten Flores Timur', NULL),
(5310, 53, 'Sikka', '', 'Kabupaten Sikka', NULL),
(5311, 53, 'Ende', '', 'Kabupaten Ende', NULL),
(5312, 53, 'Ngada', '', 'Kabupaten Ngada', NULL),
(5313, 53, 'Manggarai', '', 'Kabupaten Manggarai', NULL),
(5314, 53, 'Rote Ndao', '', 'Kabupaten Rote Ndao', NULL),
(5315, 53, 'Manggarai Barat', '', 'Kabupaten Manggarai Barat', NULL),
(5316, 53, 'Sumba Tengah', '', 'Kabupaten Sumba Tengah', NULL),
(5317, 53, 'Sumba Barat Daya', '', 'Kabupaten Sumba Barat Daya', NULL),
(5318, 53, 'Nagekeo', '', 'Kabupaten Nagekeo', NULL),
(5319, 53, 'Manggarai Timur', '', 'Kabupaten Manggarai Timur', NULL),
(5320, 53, 'Sabu Raijua', '', 'Kabupaten Sabu Raijua', NULL),
(5371, 53, 'Kupang', '', 'Kota Kupang', NULL),
(6101, 61, 'Sambas', '', 'Kabupaten Sambas', NULL),
(6102, 61, 'Bengkayang', '', 'Kabupaten Bengkayang', NULL),
(6103, 61, 'Landak', '', 'Kabupaten Landak', NULL),
(6104, 61, 'Pontianak', '', 'Kabupaten Pontianak', NULL),
(6105, 61, 'Sanggau', '', 'Kabupaten Sanggau', NULL),
(6106, 61, 'Ketapang', '', 'Kabupaten Ketapang', NULL),
(6107, 61, 'Sintang', '', 'Kabupaten Sintang', NULL),
(6108, 61, 'Kapuas Hulu', '', 'Kabupaten Kapuas Hulu', NULL),
(6109, 61, 'Sekadau', '', 'Kabupaten Sekadau', NULL),
(6110, 61, 'Melawi', '', 'Kabupaten Melawi', NULL),
(6111, 61, 'Kayong Utara', '', 'Kabupaten Kayong Utara', NULL),
(6112, 61, 'Kubu Raya', '', 'Kabupaten Kubu Raya', NULL),
(6171, 61, 'Pontianak', '', 'Kota Pontianak', NULL),
(6172, 61, 'Singkawang', '', 'Kota Singkawang', NULL),
(6201, 62, 'Kotawaringin Barat', '', 'Kabupaten Kotawaringin Barat', NULL),
(6202, 62, 'Kotawaringin Timur', '', 'Kabupaten Kotawaringin Timur', NULL),
(6203, 62, 'Kapuas', '', 'Kabupaten Kapuas', NULL),
(6204, 62, 'Barito Selatan', '', 'Kabupaten Barito Selatan', NULL),
(6205, 62, 'Barito Utara', '', 'Kabupaten Barito Utara', NULL),
(6206, 62, 'Sukamara', '', 'Kabupaten Sukamara', NULL),
(6207, 62, 'Lamandau', '', 'Kabupaten Lamandau', NULL),
(6208, 62, 'Seruyan', '', 'Kabupaten Seruyan', NULL),
(6209, 62, 'Katingan', '', 'Kabupaten Katingan', NULL),
(6210, 62, 'Pulang Pisau', '', 'Kabupaten Pulang Pisau', NULL),
(6211, 62, 'Gunung Mas', '', 'Kabupaten Gunung Mas', NULL),
(6212, 62, 'Barito Timur', '', 'Kabupaten Barito Timur', NULL),
(6213, 62, 'Murung Raya', '', 'Kabupaten Murung Raya', NULL),
(6271, 62, 'Palangka Raya', '', 'Kota Palangka Raya', NULL),
(6301, 63, 'Tanah Laut', '', 'Kabupaten Tanah Laut', NULL),
(6302, 63, 'Baru', '', 'Kabupaten Kota Baru', NULL),
(6303, 63, 'Banjar', '', 'Kabupaten Banjar', NULL),
(6304, 63, 'Barito Kuala', '', 'Kabupaten Barito Kuala', NULL),
(6305, 63, 'Tapin', '', 'Kabupaten Tapin', NULL),
(6306, 63, 'Hulu Sungai Selatan', '', 'Kabupaten Hulu Sungai Selatan', NULL),
(6307, 63, 'Hulu Sungai Tengah', '', 'Kabupaten Hulu Sungai Tengah', NULL),
(6308, 63, 'Hulu Sungai Utara', '', 'Kabupaten Hulu Sungai Utara', NULL),
(6309, 63, 'Tabalong', '', 'Kabupaten Tabalong', NULL),
(6310, 63, 'Tanah Bumbu', '', 'Kabupaten Tanah Bumbu', NULL),
(6311, 63, 'Balangan', '', 'Kabupaten Balangan', NULL),
(6371, 63, 'Banjarmasin', '', 'Kota Banjarmasin', NULL),
(6372, 63, 'Banjar Baru', '', 'Kota Banjar Baru', NULL),
(6401, 64, 'Paser', '', 'Kabupaten Paser', NULL),
(6402, 64, 'Kutai Barat', '', 'Kabupaten Kutai Barat', NULL),
(6403, 64, 'Kutai Kartanegara', '', 'Kabupaten Kutai Kartanegara', NULL),
(6404, 64, 'Kutai Timur', '', 'Kabupaten Kutai Timur', NULL),
(6405, 64, 'Berau', '', 'Kabupaten Berau', NULL),
(6409, 64, 'Penajam Paser Utara', '', 'Kabupaten Penajam Paser Utara', NULL),
(6471, 64, 'Balikpapan', '', 'Kota Balikpapan', NULL),
(6472, 64, 'Samarinda', '', 'Kota Samarinda', NULL),
(6474, 64, 'Bontang', '', 'Kota Bontang', NULL),
(6501, 65, 'Malinau', '', 'Kabupaten Malinau', NULL),
(6502, 65, 'Bulungan', '', 'Kabupaten Bulungan', NULL),
(6503, 65, 'Tana Tidung', '', 'Kabupaten Tana Tidung', NULL),
(6504, 65, 'Nunukan', '', 'Kabupaten Nunukan', NULL),
(6571, 65, 'Tarakan', '', 'Kota Tarakan', NULL),
(7101, 71, 'Bolaang Mongondow', '', 'Kabupaten Bolaang Mongondow', NULL),
(7102, 71, 'Minahasa', '', 'Kabupaten Minahasa', NULL),
(7103, 71, 'Kepulauan Sangihe', '', 'Kabupaten Kepulauan Sangihe', NULL),
(7104, 71, 'Kepulauan Talaud', '', 'Kabupaten Kepulauan Talaud', NULL),
(7105, 71, 'Minahasa Selatan', '', 'Kabupaten Minahasa Selatan', NULL),
(7106, 71, 'Minahasa Utara', '', 'Kabupaten Minahasa Utara', NULL),
(7107, 71, 'Bolaang Mongondow Utara', '', 'Kabupaten Bolaang Mongondow Utara', NULL),
(7108, 71, 'Siau Tagulandang Biaro', '', 'Kabupaten Siau Tagulandang Biaro', NULL),
(7109, 71, 'Minahasa Tenggara', '', 'Kabupaten Minahasa Tenggara', NULL),
(7110, 71, 'Bolaang Mongondow Selatan', '', 'Kabupaten Bolaang Mongondow Selatan', NULL),
(7111, 71, 'Bolaang Mongondow Timur', '', 'Kabupaten Bolaang Mongondow Timur', NULL),
(7171, 71, 'Manado', '', 'Kota Manado', NULL),
(7172, 71, 'Bitung', '', 'Kota Bitung', NULL),
(7173, 71, 'Tomohon', '', 'Kota Tomohon', NULL),
(7174, 71, 'Kotamobagu', '', 'Kota Kotamobagu', NULL),
(7201, 72, 'Banggai Kepulauan', '', 'Kabupaten Banggai Kepulauan', NULL),
(7202, 72, 'Banggai', '', 'Kabupaten Banggai', NULL),
(7203, 72, 'Morowali', '', 'Kabupaten Morowali', NULL),
(7204, 72, 'Poso', '', 'Kabupaten Poso', NULL),
(7205, 72, 'Donggala', '', 'Kabupaten Donggala', NULL),
(7206, 72, 'Toli-toli', '', 'Kabupaten Toli-toli', NULL),
(7207, 72, 'Buol', '', 'Kabupaten Buol', NULL),
(7208, 72, 'Parigi Moutong', '', 'Kabupaten Parigi Moutong', NULL),
(7209, 72, 'Tojo Una-una', '', 'Kabupaten Tojo Una-una', NULL),
(7210, 72, 'Sigi', '', 'Kabupaten Sigi', NULL),
(7271, 72, 'Palu', '', 'Kota Palu', NULL),
(7301, 73, 'Kepulauan Selayar', '', 'Kabupaten Kepulauan Selayar', NULL),
(7302, 73, 'Bulukumba', '', 'Kabupaten Bulukumba', NULL),
(7303, 73, 'Bantaeng', '', 'Kabupaten Bantaeng', NULL),
(7304, 73, 'Jeneponto', '', 'Kabupaten Jeneponto', NULL),
(7305, 73, 'Takalar', '', 'Kabupaten Takalar', NULL),
(7306, 73, 'Gowa', '', 'Kabupaten Gowa', NULL),
(7307, 73, 'Sinjai', '', 'Kabupaten Sinjai', NULL),
(7308, 73, 'Maros', '', 'Kabupaten Maros', NULL),
(7309, 73, 'Pangkajene Dan Kepulauan', '', 'Kabupaten Pangkajene Dan Kepulauan', NULL),
(7310, 73, 'Barru', '', 'Kabupaten Barru', NULL),
(7311, 73, 'Bone', '', 'Kabupaten Bone', NULL),
(7312, 73, 'Soppeng', '', 'Kabupaten Soppeng', NULL),
(7313, 73, 'Wajo', '', 'Kabupaten Wajo', NULL),
(7314, 73, 'Sidenreng Rappang', '', 'Kabupaten Sidenreng Rappang', NULL),
(7315, 73, 'Pinrang', '', 'Kabupaten Pinrang', NULL),
(7316, 73, 'Enrekang', '', 'Kabupaten Enrekang', NULL),
(7317, 73, 'Luwu', '', 'Kabupaten Luwu', NULL),
(7318, 73, 'Tana Toraja', '', 'Kabupaten Tana Toraja', NULL),
(7322, 73, 'Luwu Utara', '', 'Kabupaten Luwu Utara', NULL),
(7325, 73, 'Luwu Timur', '', 'Kabupaten Luwu Timur', NULL),
(7326, 73, 'Toraja Utara', '', 'Kabupaten Toraja Utara', NULL),
(7371, 73, 'Makassar', '', 'Kota Makassar', NULL),
(7372, 73, 'Parepare', '', 'Kota Parepare', NULL),
(7373, 73, 'Palopo', '', 'Kota Palopo', NULL),
(7401, 74, 'Buton', '', 'Kabupaten Buton', NULL),
(7402, 74, 'Muna', '', 'Kabupaten Muna', NULL),
(7403, 74, 'Konawe', '', 'Kabupaten Konawe', NULL),
(7404, 74, 'Kolaka', '', 'Kabupaten Kolaka', NULL),
(7405, 74, 'Konawe Selatan', '', 'Kabupaten Konawe Selatan', NULL),
(7406, 74, 'Bombana', '', 'Kabupaten Bombana', NULL),
(7407, 74, 'Wakatobi', '', 'Kabupaten Wakatobi', NULL),
(7408, 74, 'Kolaka Utara', '', 'Kabupaten Kolaka Utara', NULL),
(7409, 74, 'Buton Utara', '', 'Kabupaten Buton Utara', NULL),
(7410, 74, 'Konawe Utara', '', 'Kabupaten Konawe Utara', NULL),
(7471, 74, 'Kendari', '', 'Kota Kendari', NULL),
(7472, 74, 'Baubau', '', 'Kota Baubau', NULL),
(7501, 75, 'Boalemo', '', 'Kabupaten Boalemo', NULL),
(7502, 75, 'Gorontalo', '', 'Kabupaten Gorontalo', NULL),
(7503, 75, 'Pohuwato', '', 'Kabupaten Pohuwato', NULL),
(7504, 75, 'Bone Bolango', '', 'Kabupaten Bone Bolango', NULL),
(7505, 75, 'Gorontalo Utara', '', 'Kabupaten Gorontalo Utara', NULL),
(7571, 75, 'Gorontalo', '', 'Kota Gorontalo', NULL),
(7601, 76, 'Majene', '', 'Kabupaten Majene', NULL),
(7602, 76, 'Polewali Mandar', '', 'Kabupaten Polewali Mandar', NULL),
(7603, 76, 'Mamasa', '', 'Kabupaten Mamasa', NULL),
(7604, 76, 'Mamuju', '', 'Kabupaten Mamuju', NULL),
(7605, 76, 'Mamuju Utara', '', 'Kabupaten Mamuju Utara', NULL),
(8101, 81, 'Maluku Tenggara Barat', '', 'Kabupaten Maluku Tenggara Barat', NULL),
(8102, 81, 'Maluku Tenggara', '', 'Kabupaten Maluku Tenggara', NULL),
(8103, 81, 'Maluku Tengah', '', 'Kabupaten Maluku Tengah', NULL),
(8104, 81, 'Buru', '', 'Kabupaten Buru', NULL),
(8105, 81, 'Kepulauan Aru', '', 'Kabupaten Kepulauan Aru', NULL),
(8106, 81, 'Seram Bagian Barat', '', 'Kabupaten Seram Bagian Barat', NULL),
(8107, 81, 'Seram Bagian Timur', '', 'Kabupaten Seram Bagian Timur', NULL),
(8108, 81, 'Maluku Barat Daya', '', 'Kabupaten Maluku Barat Daya', NULL),
(8109, 81, 'Buru Selatan', '', 'Kabupaten Buru Selatan', NULL),
(8171, 81, 'Ambon', '', 'Kota Ambon', NULL),
(8172, 81, 'Tual', '', 'Kota Tual', NULL),
(8201, 82, 'Halmahera Barat', '', 'Kabupaten Halmahera Barat', NULL),
(8202, 82, 'Halmahera Tengah', '', 'Kabupaten Halmahera Tengah', NULL),
(8203, 82, 'Kepulauan Sula', '', 'Kabupaten Kepulauan Sula', NULL),
(8204, 82, 'Halmahera Selatan', '', 'Kabupaten Halmahera Selatan', NULL),
(8205, 82, 'Halmahera Utara', '', 'Kabupaten Halmahera Utara', NULL),
(8206, 82, 'Halmahera Timur', '', 'Kabupaten Halmahera Timur', NULL),
(8207, 82, 'Pulau Morotai', '', 'Kabupaten Pulau Morotai', NULL),
(8271, 82, 'Ternate', '', 'Kota Ternate', NULL),
(8272, 82, 'Tidore Kepulauan', '', 'Kota Tidore Kepulauan', NULL),
(9101, 91, 'Fakfak', '', 'Kabupaten Fakfak', NULL),
(9102, 91, 'Kaimana', '', 'Kabupaten Kaimana', NULL),
(9103, 91, 'Teluk Wondama', '', 'Kabupaten Teluk Wondama', NULL),
(9104, 91, 'Teluk Bintuni', '', 'Kabupaten Teluk Bintuni', NULL),
(9105, 91, 'Manokwari', '', 'Kabupaten Manokwari', NULL),
(9106, 91, 'Sorong Selatan', '', 'Kabupaten Sorong Selatan', NULL),
(9107, 91, 'Sorong', '', 'Kabupaten Sorong', NULL),
(9108, 91, 'Raja Ampat', '', 'Kabupaten Raja Ampat', NULL),
(9109, 91, 'Tambrauw', '', 'Kabupaten Tambrauw', NULL),
(9110, 91, 'Maybrat', '', 'Kabupaten Maybrat', NULL),
(9171, 91, 'Sorong', '', 'Kota Sorong', NULL),
(9401, 94, 'Merauke', '', 'Kabupaten Merauke', NULL),
(9402, 94, 'Jayawijaya', '', 'Kabupaten Jayawijaya', NULL),
(9403, 94, 'Jayapura', '', 'Kabupaten Jayapura', NULL),
(9404, 94, 'Nabire', '', 'Kabupaten Nabire', NULL),
(9408, 94, 'Kepulauan Yapen', '', 'Kabupaten Kepulauan Yapen', NULL),
(9409, 94, 'Biak Numfor', '', 'Kabupaten Biak Numfor', NULL),
(9410, 94, 'Paniai', '', 'Kabupaten Paniai', NULL),
(9411, 94, 'Puncak Jaya', '', 'Kabupaten Puncak Jaya', NULL),
(9412, 94, 'Mimika', '', 'Kabupaten Mimika', NULL),
(9413, 94, 'Boven Digoel', '', 'Kabupaten Boven Digoel', NULL),
(9414, 94, 'Mappi', '', 'Kabupaten Mappi', NULL),
(9415, 94, 'Asmat', '', 'Kabupaten Asmat', NULL),
(9416, 94, 'Yahukimo', '', 'Kabupaten Yahukimo', NULL),
(9417, 94, 'Pegunungan Bintang', '', 'Kabupaten Pegunungan Bintang', NULL),
(9418, 94, 'Tolikara', '', 'Kabupaten Tolikara', NULL),
(9419, 94, 'Sarmi', '', 'Kabupaten Sarmi', NULL),
(9420, 94, 'Keerom', '', 'Kabupaten Keerom', NULL),
(9426, 94, 'Waropen', '', 'Kabupaten Waropen', NULL),
(9427, 94, 'Supiori', '', 'Kabupaten Supiori', NULL),
(9428, 94, 'Mamberamo Raya', '', 'Kabupaten Mamberamo Raya', NULL),
(9429, 94, 'Nduga', '', 'Kabupaten Nduga', NULL),
(9430, 94, 'Lanny Jaya', '', 'Kabupaten Lanny Jaya', NULL),
(9431, 94, 'Mamberamo Tengah', '', 'Kabupaten Mamberamo Tengah', NULL),
(9432, 94, 'Yalimo', '', 'Kabupaten Yalimo', NULL),
(9433, 94, 'Puncak', '', 'Kabupaten Puncak', NULL),
(9434, 94, 'Dogiyai', '', 'Kabupaten Dogiyai', NULL),
(9435, 94, 'Intan Jaya', '', 'Kabupaten Intan Jaya', NULL),
(9436, 94, 'Deiyai', '', 'Kabupaten Deiyai', NULL),
(9471, 94, 'Jayapura ', '', 'Kota Jayapura ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ak_sub_category`
--

CREATE TABLE `ak_sub_category` (
  `ak_subcat_id` int(11) NOT NULL,
  `ak_subcat_parent` int(11) NOT NULL,
  `ak_subcat_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ak_sub_category`
--

INSERT INTO `ak_sub_category` (`ak_subcat_id`, `ak_subcat_parent`, `ak_subcat_name`) VALUES
(1, 1, 'Bahasa Inggris'),
(2, 1, 'Bahasa Jepang'),
(3, 2, 'microbiology'),
(4, 2, 'entomology'),
(5, 2, 'physiology'),
(6, 3, 'geometry'),
(7, 3, 'numbertheory'),
(8, 3, 'differentialequations'),
(9, 4, 'organicchemistry'),
(10, 4, 'inorganicchemistry');

-- --------------------------------------------------------

--
-- Table structure for table `ak_tran_saction`
--

CREATE TABLE `ak_tran_saction` (
  `ak_tran_saction_id` int(11) NOT NULL,
  `ak_tran_saction_type` text NOT NULL,
  `ak_tran_saction_user` int(11) NOT NULL,
  `ak_tran_saction_course` text NOT NULL,
  `ak_tran_saction_status` int(11) NOT NULL,
  `ak_tran_saction_midtrans_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ak_tran_saction`
--

INSERT INTO `ak_tran_saction` (`ak_tran_saction_id`, `ak_tran_saction_type`, `ak_tran_saction_user`, `ak_tran_saction_course`, `ak_tran_saction_status`, `ak_tran_saction_midtrans_id`) VALUES
(1, 'echannel', 1, '[\"5\"]', 3, 'ab3889af-1698-429b-a465-8b7082d90b16'),
(2, 'bank_transfer', 1, '[\"1\"]', 3, '29c52d2d-44a0-40ac-9fbe-b3dbb97dc84c'),
(3, 'echannel', 1, '[\"2\"]', 3, '3b68b795-4f98-4e2a-88d4-526a035d774a'),
(4, 'echannel', 2, '[\"1\"]', 3, '084848ce-80ab-44a0-b065-368d31e8d20f');

-- --------------------------------------------------------

--
-- Table structure for table `ak_tran_status`
--

CREATE TABLE `ak_tran_status` (
  `id_ak_tran_status_id` int(11) NOT NULL,
  `ak_tran_status_name` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ak_tran_status`
--

INSERT INTO `ak_tran_status` (`id_ak_tran_status_id`, `ak_tran_status_name`) VALUES
(1, 'SUCCESS'),
(2, 'ERROR'),
(3, 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `ak_user`
--

CREATE TABLE `ak_user` (
  `ak_user_id` int(11) NOT NULL,
  `ak_user_firstname` varchar(45) NOT NULL,
  `ak_user_lastname` varchar(45) NOT NULL,
  `ak_user_email` varchar(45) NOT NULL,
  `ak_user_password` varchar(255) NOT NULL,
  `ak_user_dob` date NOT NULL,
  `ak_user_phone` varchar(13) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ak_user`
--

INSERT INTO `ak_user` (`ak_user_id`, `ak_user_firstname`, `ak_user_lastname`, `ak_user_email`, `ak_user_password`, `ak_user_dob`, `ak_user_phone`, `remember_token`) VALUES
(1, 'Ahmad', 'Elang', 'sayaelang@gmail.com', '$2y$10$5RJ9eYZ8RKHMcG3WEC/8OupW7lkgrl5.EAnZVw.oVfkubbGnb/m0O', '1996-09-09', '081297451092', 'lEAFMZ8PU4ARkZDQJa2WIsgmcrDC2gMCQFOgslwDgYUocqEH0gg8so1QNc87'),
(2, 'retno', 'larasati', 'wilsongay12@yahoo.com', '$2y$10$fYmZv8UZYPuzPnTSqrnK9eE8tgiBRD8Ga8/f0nP7IHmTd71/BBBD2', '2017-06-09', '85718489781', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ak_admin`
--
ALTER TABLE `ak_admin`
  ADD PRIMARY KEY (`ak_admin_id`);

--
-- Indexes for table `ak_course`
--
ALTER TABLE `ak_course`
  ADD PRIMARY KEY (`ak_course_id`),
  ADD KEY `fk_ak_course_ak_provider1_idx` (`ak_course_prov_id`),
  ADD KEY `fk_ak_course_ak_sub_category1_idx` (`ak_course_cat_id`);

--
-- Indexes for table `ak_course_age`
--
ALTER TABLE `ak_course_age`
  ADD PRIMARY KEY (`ak_course_age_id`);

--
-- Indexes for table `ak_course_detail`
--
ALTER TABLE `ak_course_detail`
  ADD PRIMARY KEY (`ak_course_detail_id`),
  ADD KEY `fk_ak_course_detail_ak_course_idx` (`ak_course_id`),
  ADD KEY `fk_ak_course_detail_ak_course_level1_idx` (`ak_course_detail_level`),
  ADD KEY `fk_ak_course_detail_ak_course_age1_idx` (`ak_course_detail_age`);

--
-- Indexes for table `ak_course_facility`
--
ALTER TABLE `ak_course_facility`
  ADD PRIMARY KEY (`ak_course_facility_id`),
  ADD KEY `ak_course_facility_detid` (`ak_course_facility_detid`),
  ADD KEY `ak_course_facility_detid_2` (`ak_course_facility_detid`),
  ADD KEY `ak_facility_type_id` (`ak_facility_type_id`);

--
-- Indexes for table `ak_course_level`
--
ALTER TABLE `ak_course_level`
  ADD PRIMARY KEY (`ak_course_level_id`);

--
-- Indexes for table `ak_course_schedule`
--
ALTER TABLE `ak_course_schedule`
  ADD PRIMARY KEY (`ak_course_schedule_id`),
  ADD KEY `fk_ak_course_schedule_ak_course_detail1_idx` (`ak_course_schedule_detid`);

--
-- Indexes for table `ak_facility_type`
--
ALTER TABLE `ak_facility_type`
  ADD PRIMARY KEY (`ak_facility_type_id`);

--
-- Indexes for table `ak_main_category`
--
ALTER TABLE `ak_main_category`
  ADD PRIMARY KEY (`ak_maincat_id`);

--
-- Indexes for table `ak_pay_ment`
--
ALTER TABLE `ak_pay_ment`
  ADD PRIMARY KEY (`ak_pay_ment_id`),
  ADD KEY `fk_ak_pay_ment_ak_tran_saction1_idx` (`ak_pay_ment_tran_id`);

--
-- Indexes for table `ak_provider`
--
ALTER TABLE `ak_provider`
  ADD PRIMARY KEY (`ak_provider_id`),
  ADD KEY `fk_ak_provider_ak_region1_idx` (`ak_provider_region`);

--
-- Indexes for table `ak_provider_img`
--
ALTER TABLE `ak_provider_img`
  ADD PRIMARY KEY (`ak_provider_img_id`),
  ADD KEY `ak_provider_id` (`ak_provider_id`);

--
-- Indexes for table `ak_province`
--
ALTER TABLE `ak_province`
  ADD PRIMARY KEY (`ak_province_id`);

--
-- Indexes for table `ak_region`
--
ALTER TABLE `ak_region`
  ADD PRIMARY KEY (`ak_region_id`),
  ADD KEY `fk_ak_region_ak_province1_idx` (`ak_region_prov_id`);

--
-- Indexes for table `ak_sub_category`
--
ALTER TABLE `ak_sub_category`
  ADD PRIMARY KEY (`ak_subcat_id`),
  ADD KEY `fk_ak_sub_category_ak_main_category1_idx` (`ak_subcat_parent`);

--
-- Indexes for table `ak_tran_saction`
--
ALTER TABLE `ak_tran_saction`
  ADD PRIMARY KEY (`ak_tran_saction_id`),
  ADD KEY `fk_ak_tran_saction_ak_user1_idx` (`ak_tran_saction_user`),
  ADD KEY `fk_ak_tran_saction_ak_tran_status1_idx` (`ak_tran_saction_status`);

--
-- Indexes for table `ak_tran_status`
--
ALTER TABLE `ak_tran_status`
  ADD PRIMARY KEY (`id_ak_tran_status_id`);

--
-- Indexes for table `ak_user`
--
ALTER TABLE `ak_user`
  ADD PRIMARY KEY (`ak_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ak_admin`
--
ALTER TABLE `ak_admin`
  MODIFY `ak_admin_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ak_course`
--
ALTER TABLE `ak_course`
  MODIFY `ak_course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ak_course_age`
--
ALTER TABLE `ak_course_age`
  MODIFY `ak_course_age_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ak_course_detail`
--
ALTER TABLE `ak_course_detail`
  MODIFY `ak_course_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ak_course_facility`
--
ALTER TABLE `ak_course_facility`
  MODIFY `ak_course_facility_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ak_course_level`
--
ALTER TABLE `ak_course_level`
  MODIFY `ak_course_level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ak_facility_type`
--
ALTER TABLE `ak_facility_type`
  MODIFY `ak_facility_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ak_main_category`
--
ALTER TABLE `ak_main_category`
  MODIFY `ak_maincat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ak_pay_ment`
--
ALTER TABLE `ak_pay_ment`
  MODIFY `ak_pay_ment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ak_provider`
--
ALTER TABLE `ak_provider`
  MODIFY `ak_provider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ak_provider_img`
--
ALTER TABLE `ak_provider_img`
  MODIFY `ak_provider_img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ak_province`
--
ALTER TABLE `ak_province`
  MODIFY `ak_province_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `ak_region`
--
ALTER TABLE `ak_region`
  MODIFY `ak_region_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9472;
--
-- AUTO_INCREMENT for table `ak_sub_category`
--
ALTER TABLE `ak_sub_category`
  MODIFY `ak_subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `ak_tran_saction`
--
ALTER TABLE `ak_tran_saction`
  MODIFY `ak_tran_saction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ak_tran_status`
--
ALTER TABLE `ak_tran_status`
  MODIFY `id_ak_tran_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ak_user`
--
ALTER TABLE `ak_user`
  MODIFY `ak_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ak_course`
--
ALTER TABLE `ak_course`
  ADD CONSTRAINT `fk_ak_course_ak_provider1` FOREIGN KEY (`ak_course_prov_id`) REFERENCES `ak_provider` (`ak_provider_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ak_course_ak_sub_category1` FOREIGN KEY (`ak_course_cat_id`) REFERENCES `ak_sub_category` (`ak_subcat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ak_course_detail`
--
ALTER TABLE `ak_course_detail`
  ADD CONSTRAINT `fk_ak_course_detail_ak_course` FOREIGN KEY (`ak_course_id`) REFERENCES `ak_course` (`ak_course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ak_course_detail_ak_course_age1` FOREIGN KEY (`ak_course_detail_age`) REFERENCES `ak_course_age` (`ak_course_age_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ak_course_detail_ak_course_level1` FOREIGN KEY (`ak_course_detail_level`) REFERENCES `ak_course_level` (`ak_course_level_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ak_course_facility`
--
ALTER TABLE `ak_course_facility`
  ADD CONSTRAINT `ak_course_facility_ibfk_1` FOREIGN KEY (`ak_course_facility_detid`) REFERENCES `ak_course_detail` (`ak_course_detail_id`),
  ADD CONSTRAINT `ak_course_facility_ibfk_2` FOREIGN KEY (`ak_facility_type_id`) REFERENCES `ak_facility_type` (`ak_facility_type_id`);

--
-- Constraints for table `ak_course_schedule`
--
ALTER TABLE `ak_course_schedule`
  ADD CONSTRAINT `fk_ak_course_schedule_ak_course_detail1` FOREIGN KEY (`ak_course_schedule_detid`) REFERENCES `ak_course_detail` (`ak_course_detail_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ak_pay_ment`
--
ALTER TABLE `ak_pay_ment`
  ADD CONSTRAINT `fk_ak_pay_ment_ak_tran_saction1` FOREIGN KEY (`ak_pay_ment_tran_id`) REFERENCES `ak_tran_saction` (`ak_tran_saction_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ak_provider`
--
ALTER TABLE `ak_provider`
  ADD CONSTRAINT `fk_ak_provider_ak_region1` FOREIGN KEY (`ak_provider_region`) REFERENCES `ak_region` (`ak_region_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ak_provider_img`
--
ALTER TABLE `ak_provider_img`
  ADD CONSTRAINT `ak_provider_img_ibfk_1` FOREIGN KEY (`ak_provider_id`) REFERENCES `ak_provider` (`ak_provider_id`);

--
-- Constraints for table `ak_region`
--
ALTER TABLE `ak_region`
  ADD CONSTRAINT `fk_ak_region_ak_province1` FOREIGN KEY (`ak_region_prov_id`) REFERENCES `ak_province` (`ak_province_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ak_sub_category`
--
ALTER TABLE `ak_sub_category`
  ADD CONSTRAINT `fk_ak_sub_category_ak_main_category1` FOREIGN KEY (`ak_subcat_parent`) REFERENCES `ak_main_category` (`ak_maincat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ak_tran_saction`
--
ALTER TABLE `ak_tran_saction`
  ADD CONSTRAINT `fk_ak_tran_saction_ak_tran_status1` FOREIGN KEY (`ak_tran_saction_status`) REFERENCES `ak_tran_status` (`id_ak_tran_status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ak_tran_saction_ak_user1` FOREIGN KEY (`ak_tran_saction_user`) REFERENCES `ak_user` (`ak_user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
