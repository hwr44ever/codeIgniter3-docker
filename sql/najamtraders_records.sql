-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 27, 2025 at 04:59 PM
-- Server version: 8.0.41-cll-lve
-- PHP Version: 8.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `najamtraders_records`
--

-- --------------------------------------------------------

--
-- Table structure for table `cash_entry`
--

CREATE TABLE `cash_entry` (
  `cash_book_id` int NOT NULL,
  `date` date NOT NULL,
  `vendor_id` int NOT NULL,
  `amount` double NOT NULL,
  `entry_type` int NOT NULL COMMENT '1 for Debit and 2 for credit',
  `detail` varchar(50000) NOT NULL,
  `entry_hashval` varchar(1000) NOT NULL,
  `modified_by` int NOT NULL,
  `invoice_entry` int NOT NULL COMMENT '1= Entry by invoice',
  `entry_status` int NOT NULL COMMENT '1 means active, 0 mean inactive',
  `entry_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cash_entry`
--

INSERT INTO `cash_entry` (`cash_book_id`, `date`, `vendor_id`, `amount`, `entry_type`, `detail`, `entry_hashval`, `modified_by`, `invoice_entry`, `entry_status`, `entry_date`) VALUES
(1, '2023-08-01', 20, 0, 1, 'Adv chkm', 'acba7ad50803fb49ee9b457d6296da9c', 1, 1, 0, '2023-08-08 02:02:05'),
(2, '2023-08-01', 21, 0, 1, 'Adv chkm', '13e35e9040ce5004c736b146ce6ad15f', 1, 1, 0, '2023-08-08 02:02:56'),
(3, '2023-08-01', 22, 0, 1, 'Adv chkm', 'f4e7c13e0af83b6dbae105efbc54b13c', 1, 1, 0, '2023-08-08 02:03:28'),
(4, '2023-08-01', 3, 0, 1, 'Adv chkm', '59b0420f04eb7219de4d9dc9683dd998', 1, 1, 0, '2023-08-08 02:04:11'),
(5, '2023-08-01', 3, 0, 1, 'Adv chkm', '872e28572eb59dc51731d76e832a78c1', 1, 1, 0, '2023-08-08 02:05:32'),
(6, '2023-08-01', 3, 0, 1, 'Adv chkm', '06c93ba356e2228da5451d9bc6e2deaa', 1, 1, 0, '2023-08-08 02:05:32'),
(7, '2023-08-01', 3, 0, 1, 'Adv chkm', 'ca0afdfb265429ecf96d4d1d81b7e212', 1, 1, 0, '2023-08-08 02:06:08'),
(8, '2023-08-01', 11, 0, 1, 'Adv chkm', 'fc2106fec806e53b61eee5fa91ddffb4', 1, 1, 0, '2023-08-08 02:06:39'),
(9, '2023-08-01', 11, 0, 1, 'Adv chkm', '123f353ead853d1f4baf2241b72317c5', 1, 1, 0, '2023-08-08 02:07:15'),
(10, '2023-08-01', 17, 0, 1, 'Adv chkm hawala qadir trader', 'f84ab96c4285c2e224332db632ca809b', 1, 1, 0, '2023-08-08 02:07:51'),
(11, '2023-08-01', 20, 0, 1, 'Adv chkm hawala Bhai Mustafa ', '5835ad70ba748b64b1b8125a73ba9e5a', 1, 1, 0, '2023-08-08 02:08:47'),
(12, '2023-08-01', 17, 0, 1, 'Adv chkm', 'b22e088264f262d3f883e99813e7efc1', 1, 1, 0, '2023-08-08 02:09:11'),
(13, '2023-08-01', 6, 0, 1, 'Adv chkm', '7db6d2e8a83e015724e7b1cc59bdf546', 1, 1, 0, '2023-08-08 02:09:45'),
(14, '2023-08-03', 23, 0, 1, '3 Aug payment chkm', 'a74271b85b8edd97998cb39e6bc93737', 1, 1, 0, '2023-08-08 02:49:05'),
(15, '2023-08-03', 23, 0, 1, '3 Aug payment chkm ', '8e622f1edc94d31c83e39eee623e90f4', 1, 1, 0, '2023-08-08 02:49:37'),
(16, '2023-08-05', 21, 0, 1, 'Adv chkm half Sami niazi ', 'a6584c7911eb882db5fbfc0a272a56cb', 1, 1, 0, '2023-08-08 02:50:48'),
(17, '2023-08-05', 17, 0, 1, 'Adv chkm Half hamza Bhola ', 'f2a1ea34f8f049be4f2b59eb53576115', 1, 1, 0, '2023-08-08 02:51:26'),
(18, '2023-08-02', 17, 0, 1, '10 Aug payment chkm ', '261dae20067fee62b73e18182c298571', 1, 1, 0, '2023-08-08 02:52:03'),
(19, '2023-08-02', 24, 0, 1, '10 Aug payment chkm ', '5fc5b3b23b3a6632f6ab57d343b40c24', 1, 1, 0, '2023-08-08 02:52:59'),
(20, '2023-08-02', 23, 0, 1, '01 Aug payment chkm ', '133f38a18612a675ab7bafa5784ac3e7', 1, 1, 0, '2023-08-08 02:53:27'),
(21, '2023-08-02', 6, 0, 1, '10 Aug payment chkm ', 'c9b255d5c53069dc7137d0d2f691c781', 1, 1, 0, '2023-08-08 02:53:56'),
(22, '2023-08-03', 25, 0, 1, '10 Aug payment chkm ', '12f298c1858329acf89269322308b961', 1, 1, 0, '2023-08-08 02:54:39'),
(23, '2023-08-06', 26, 0, 1, 'Thal chna 6700 \nRent 18600', '88ab6ecc959bbb9e9e745cbdb0e61c2d', 1, 1, 0, '2023-08-08 02:59:03'),
(24, '2023-08-02', 27, 0, 2, 'Adv chkm', '692369ba9ed84a8236155e9ddd016b1e', 1, 1, 0, '2023-08-08 03:02:16'),
(25, '2023-08-01', 28, 0, 2, 'Adv chkm ', '97936773f74a9fc3b056e15f2612671a', 1, 1, 0, '2023-08-08 03:05:27'),
(26, '2023-08-01', 2, 0, 2, 'Adv Chkm ', '10a78f9d781aec146ca275f057e73cfa', 1, 1, 0, '2023-08-08 03:06:07'),
(27, '2023-08-01', 2, 0, 2, 'Adv chkm', '35aca1f7552524613110fd3d8247b553', 1, 1, 0, '2023-08-08 03:06:37'),
(28, '2023-08-01', 29, 0, 2, 'Adv Chkm', 'e677f1c6de8d1167440e64543c4ad5ba', 1, 1, 0, '2023-08-08 03:07:22'),
(29, '2023-08-02', 30, 0, 2, 'Half payment Najam\n adv Chkm ', '3edbc4e3c7ba5578c006e5b7d2aafc36', 1, 1, 0, '2023-08-08 03:08:37'),
(30, '2023-08-02', 12, 0, 2, 'Chkm adv', '7dfd7cf37ab03344acf90e7528d1f2e6', 1, 1, 0, '2023-08-08 03:09:30'),
(31, '2023-08-03', 11, 0, 2, 'Adv Chkm ', 'de029d6c6a472c9865eccc317a6c3e7c', 1, 1, 0, '2023-08-08 03:10:10'),
(32, '2023-08-03', 13, 0, 2, 'Adv Chkm', '00b7d2cb402866a920ee6106ab1fea9a', 1, 1, 0, '2023-08-08 03:11:00'),
(33, '2023-08-03', 31, 0, 2, 'Adv Chkm', '5c96dcb3059f42b521692d8e9cc84686', 1, 1, 0, '2023-08-08 03:11:52'),
(34, '2023-09-10', 30, 0, 2, '10 September payment chkm ', 'be0cc384d2bd7f517a98a232aa301db3', 1, 1, 0, '2023-08-08 03:12:39'),
(35, '2023-08-15', 13, 0, 2, 'Chkm 15 Aug payment ', '81cc71018b0a4249d3885882f3d79470', 1, 1, 0, '2023-08-08 03:13:59'),
(36, '2023-08-15', 13, 0, 2, '15 Aug payment chkm ', '114e1de981165c4a7e15c9ba793242c1', 1, 1, 0, '2023-08-08 03:14:32'),
(37, '2023-08-05', 28, 0, 2, 'Adv chkm', '46e602932fc13e6bed25e8beb5d6fa45', 1, 1, 0, '2023-08-08 03:16:29'),
(38, '2023-08-05', 16, 0, 2, '5 Aug payment ', 'cbe3e35b14b0d4420e915eeaa37dc3d0', 1, 1, 0, '2023-08-08 03:17:14'),
(39, '2023-08-10', 15, 0, 2, '10 Aug payment chkm ', 'f47f21c0d31c2abb1bdd543fe86f0185', 1, 1, 0, '2023-08-08 03:17:50'),
(40, '2023-08-08', 16, 0, 2, 'Adv Chkm ', '9bcb40c016352d4568ab7da25abeb264', 1, 1, 0, '2023-08-08 03:18:44'),
(41, '2023-08-08', 30, 0, 2, 'Adv Chkm', 'd18e2d0f6ee8a528037541f868830a92', 1, 1, 0, '2023-08-08 03:19:15'),
(42, '2023-08-10', 32, 0, 2, '10 Aug payment ', '93c894eb5f06a162b3ab63c2ff74dc8b', 1, 1, 0, '2023-08-08 03:20:16'),
(43, '2023-08-12', 17, 0, 2, '12 Aug payment chkm ', 'b6fdaff0323d2315e8afabc6732215ab', 1, 1, 0, '2023-08-08 03:20:45'),
(44, '2023-08-10', 13, 0, 2, '10 August payment Chkm ', 'ddd016bf02f056658783d09b596eedd0', 1, 1, 0, '2023-08-08 03:21:26'),
(45, '2023-08-10', 33, 0, 2, '10 Aug payment chkm\nHalf Hamza bhola ', 'e0c67ac11ae419990a04b8c104e9ce4a', 1, 1, 0, '2023-08-08 03:23:20'),
(46, '2023-08-10', 11, 0, 2, '10 Aug payment chkm \nHalf Hamza bhola ', '43c9d54d46cc6c66306180cd004fa047', 1, 1, 0, '2023-08-08 03:27:54'),
(47, '2023-08-10', 34, 0, 2, 'Adv Chkm \nHalf hamza Bhola ', '9a7949f4e857c314dff379eb92ae9726', 1, 1, 0, '2023-08-08 03:29:05'),
(48, '2023-08-20', 35, 0, 2, 'Adv Chkm \n20 August payment ', 'c55a8fc494055d09d1b79ca14ca19740', 1, 1, 0, '2023-08-08 03:32:13'),
(49, '2023-08-10', 30, 0, 2, '10 August payment chkm ', '2f897624144f6ca0d1dcb27623f7ba77', 1, 1, 0, '2023-08-08 03:32:55'),
(50, '2023-08-31', 26, 0, 2, 'Thal chana dew \nRent18600\n31 Aug payment ', '3f7012ab37b396ae038d2570731ce51a', 1, 1, 0, '2023-08-08 03:34:37'),
(51, '2023-09-07', 14, 0, 2, '7 September payment chkm ', '54f71fbe95d95deb749a3cc1b6a9a7b9', 1, 1, 0, '2023-08-08 03:37:18'),
(52, '2023-08-20', 36, 0, 1, '20 August payment chkm ', '232191f11122b37e1f973345af706bf9', 1, 1, 0, '2023-08-08 03:38:29'),
(54, '2024-03-19', 20, 0, 1, 'CHKM', '9e73d1c2bbae6cd25305cac2bc6ccfb7', 1, 1, 0, '2024-03-19 02:01:19'),
(55, '2024-05-21', 37, 0, 2, '181 chkm  15 april adv', '9de06e4e5027555def87b8d81571915c', 1, 1, 1, '2024-03-21 02:45:33'),
(56, '2024-03-24', 38, 0, 1, '1 trala CHKM 26 March advance', 'ee47ffc9b554c02abc335c9cb8de1f18', 1, 1, 1, '2024-03-25 03:40:17'),
(57, '2024-03-21', 13, 0, 1, '1 trala CHKM 20 April', 'fe180a458f7d48eb2e0cdeb19175d1ad', 1, 1, 1, '2024-03-25 03:42:00'),
(58, '2024-03-21', 34, 0, 1, '1 trala CHKM 15 April', 'e0ac203ee9ee853f169ac6399039a62f', 1, 1, 1, '2024-03-25 03:43:27'),
(59, '2024-03-18', 34, 0, 1, '1 trala CHKM 15 April', 'c9210656533e831cc2d1955a3ab933f0', 1, 1, 1, '2024-03-25 03:44:15'),
(60, '2024-03-17', 34, 0, 1, '1 trala CHKM 15 April', 'f39bcb4e8d9ffeab26da1812517f0694', 1, 1, 1, '2024-03-25 03:44:59'),
(61, '2024-03-14', 30, 0, 1, '1 trala CHKM 15 April', '6d9aa892beedac97e1f1b51d71fadd58', 1, 1, 1, '2024-03-25 03:45:36'),
(62, '2024-03-14', 39, 0, 1, '1 trala CHKM 15 April', '09fbafba10f533134cf07dd2ebaa2132', 1, 1, 1, '2024-03-25 03:46:35'),
(63, '2024-03-05', 8, 0, 1, '1 trala CHKM 25 March Advance', 'dccae1656d82374b069f46472d631c2d', 1, 1, 1, '2024-03-25 03:48:06'),
(64, '2024-03-16', 11, 0, 1, '1 trala CHKM 25 March Advance', 'c064b1b1c00ab65cc73c88690ea07a8a', 1, 1, 1, '2024-03-25 03:49:07'),
(65, '2024-03-25', 2, 0, 1, '1 trala CHKM Advance', '48256bfee3abbbe97043dc370538d759', 1, 1, 1, '2024-03-25 03:50:34'),
(66, '2024-03-25', 2, 0, 1, '1 trala CHKM Advance', 'b405bb3aac3fd3c2db55997a8c531974', 1, 1, 1, '2024-03-25 03:51:20'),
(67, '2024-03-25', 2, 0, 1, '1 trala CHKM Advance', 'bd659632c3e35c64921d06b2eb376c48', 1, 1, 1, '2024-03-25 03:51:44'),
(68, '2024-03-25', 40, 0, 1, '1 trala CHKM Advance', '1267671e4133c04124025ac9501aff5d', 1, 1, 1, '2024-03-25 03:55:23'),
(69, '2024-03-25', 40, 0, 1, '1 trala CHKM Advance', 'b518b040ae11c23f232ef671914d02df', 1, 1, 1, '2024-03-25 03:55:46'),
(70, '2024-03-25', 41, 0, 1, '1 trala CHKM Advance', 'a3304cfeda6f4ddd341dcb18dab4f85b', 1, 1, 1, '2024-03-25 03:56:29'),
(71, '2024-03-25', 39, 5875120, 1, '1 trala CHKM Advance', '3b251873ba82adad35750d28d1276490', 1, 1, 1, '2024-03-25 03:56:59'),
(72, '2024-03-25', 17, 0, 2, '1 trala CHKM Advance', '9d7c2376dc0f2ba69934477b6ba6c0eb', 1, 1, 1, '2024-03-25 03:57:35'),
(73, '2024-03-25', 21, 0, 2, '1 trala CHKM Advance', 'ef2d0daafb268e8d6d175f8c33392d9b', 1, 1, 1, '2024-03-25 03:58:02'),
(74, '2024-03-25', 40, 0, 2, '1 trala CHKM Advance', '1fcc2866b95994c482e7b627b8356b94', 1, 1, 1, '2024-03-25 03:58:37'),
(75, '2024-03-25', 36, 5763365, 2, '1 trala CHKM Advance', 'f068ed2aa6f74f758173e4a17f305f8d', 1, 1, 1, '2024-03-25 03:59:08'),
(76, '2024-03-25', 42, 0, 2, '1 trala CHKM Advance', '3c03b951de9c6e2176021f2878ea47b1', 1, 1, 1, '2024-03-25 04:00:08'),
(77, '2024-03-25', 30, 5776000, 2, '1 trala CHKM Advance', '99a13883290c391e12ec9a33f0328392', 1, 1, 1, '2024-03-25 04:00:33'),
(78, '2024-03-25', 43, 0, 2, '1 trala CHKM Advance', '300624b19126df8213732652eb84bf0c', 1, 1, 1, '2024-03-25 04:01:08'),
(79, '2024-03-21', 17, 0, 2, '1 trala CHKM 26 March Advance', 'b922d7a9f65769b1201d72523ef00941', 1, 1, 1, '2024-03-25 04:02:35'),
(80, '2024-03-21', 17, 0, 2, '1 trala CHKM 26 March Advance', 'e3e1a511488f1f83d76b38cbadd2f39f', 1, 1, 1, '2024-03-25 04:03:04'),
(81, '2024-03-19', 2, 0, 2, '1 trala CHKM 15 April', '013988a463aeea7233a6854d3d58b045', 1, 1, 1, '2024-03-25 04:03:47'),
(82, '2024-03-25', 42, 0, 2, '1 trala CHKM 26 March Advance', '5528ecd9dba663afffc0e7b3ffb77e97', 1, 1, 1, '2024-03-26 11:44:59'),
(83, '2024-03-20', 30, 5025165, 1, '3600000 meezan, 700000 BAHL, 225265 HBL, 500000 HMB', '891111cb27a111fc3465493d91e01266', 1, 0, 1, '2024-03-26 12:50:05'),
(84, '2024-03-26', 10, 88000, 2, 'hAWALA aLFATEH DAAL MILL', '613168c6129517d511c041eb9f9ef5e0', 1, 0, 1, '2024-03-26 02:53:45'),
(85, '2024-03-26', 1, 88000, 1, 'HAWALA WITH SHEIKH ZIA', '8ceda47ae5c87a7ff4a0aaecbbd69705', 1, 0, 1, '2024-03-26 02:54:43'),
(86, '2024-03-26', 38, 4800000, 2, 'ABL GAM', '9a0198ea71bc5525342274ec3b913900', 1, 0, 1, '2024-03-26 02:56:21'),
(87, '2024-03-26', 45, 4800000, 1, 'CID', '06ff27cb52e428fdb6448cfb047a3636', 1, 0, 1, '2024-03-26 03:06:19'),
(88, '2024-03-26', 11, 4787300, 2, '4500000 Alfalah\n287300 UBL', '08b9d977ba3af3886dea4244cedea94a', 1, 0, 1, '2024-03-26 03:10:06'),
(89, '2024-03-26', 44, 4500000, 1, 'Murshad Traders', '6db3382677dcfd285f901911880c67a8', 1, 0, 1, '2024-03-26 03:10:50'),
(90, '2024-03-26', 51, 287300, 1, 'Murshad Traders', 'f448b716a258e2d362b90e2058bcef81', 1, 0, 1, '2024-03-26 03:11:40'),
(91, '2024-03-26', 20, 2500000, 2, 'Habib metroo', 'ecb062ff7e6a2dd235f1756d7c9cb295', 1, 0, 1, '2024-03-26 03:14:12'),
(92, '2024-03-26', 47, 0, 1, '', '6a02dae60330d2ca93b40647740b7a21', 1, 0, 1, '2024-03-26 03:15:20'),
(93, '2024-03-26', 45, 4000000, 2, 'Faisal Broker rate 176.50 Advance payment', 'e9591967e20c257562de0b8ab2453cb4', 1, 0, 1, '2024-03-27 11:52:55');

-- --------------------------------------------------------

--
-- Stand-in structure for view `entry_list_view`
-- (See below for the actual view)
--
CREATE TABLE `entry_list_view` (
`amount` double
,`cash_book_id` int
,`date` date
,`detail` varchar(50000)
,`entry_date` datetime
,`entry_hashval` varchar(1000)
,`entry_status` int
,`entry_type` int
,`first_name` varchar(255)
,`from_invoice` int
,`last_name` varchar(255)
,`modified_by` int
,`vendor_company` varchar(1000)
,`vendor_hashval` varchar(1000)
,`vendor_id` int
);

-- --------------------------------------------------------

--
-- Table structure for table `invoices_entry`
--

CREATE TABLE `invoices_entry` (
  `id` int NOT NULL,
  `date` date NOT NULL,
  `vendor_id` bigint NOT NULL,
  `weight` varchar(1000) NOT NULL,
  `rate` varchar(1000) NOT NULL,
  `total_invoice` varchar(1000) NOT NULL,
  `detail_box` varchar(10000) NOT NULL,
  `invoice_type` int NOT NULL,
  `invoice_hashval` varchar(1000) NOT NULL,
  `pending_value` int NOT NULL,
  `invoice_status` int NOT NULL,
  `entry_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices_entry`
--

INSERT INTO `invoices_entry` (`id`, `date`, `vendor_id`, `weight`, `rate`, `total_invoice`, `detail_box`, `invoice_type`, `invoice_hashval`, `pending_value`, `invoice_status`, `entry_date`) VALUES
(1, '2023-08-01', 20, '', '168.75', '0', 'Adv chkm', 1, 'acba7ad50803fb49ee9b457d6296da9c', 0, 0, '2023-08-08 02:02:05'),
(2, '2023-08-01', 21, '', '167.50', '0', 'Adv chkm', 1, '13e35e9040ce5004c736b146ce6ad15f', 1, 0, '2023-08-08 02:02:56'),
(3, '2023-08-01', 22, '', '166.50', '0', 'Adv chkm', 1, 'f4e7c13e0af83b6dbae105efbc54b13c', 0, 0, '2023-08-08 03:02:28'),
(4, '2023-08-01', 3, '', '163.50', '0', 'Adv chkm', 1, '59b0420f04eb7219de4d9dc9683dd998', 1, 0, '2023-08-08 04:02:11'),
(5, '2023-08-01', 3, '', '166', '0', 'Adv chkm', 1, '872e28572eb59dc51731d76e832a78c1', 1, 0, '2023-08-08 05:02:32'),
(6, '2023-08-01', 3, '', '166', '0', 'Adv chkm', 1, '06c93ba356e2228da5451d9bc6e2deaa', 1, 0, '2023-08-08 05:02:32'),
(7, '2023-08-01', 3, '', '166.25', '0', 'Adv chkm', 1, 'ca0afdfb265429ecf96d4d1d81b7e212', 1, 0, '2023-08-08 06:02:08'),
(8, '2023-08-01', 11, '', '166', '0', 'Adv chkm', 1, 'fc2106fec806e53b61eee5fa91ddffb4', 1, 0, '2023-08-08 06:02:39'),
(9, '2023-08-01', 11, '', '167.90', '0', 'Adv chkm', 1, '123f353ead853d1f4baf2241b72317c5', 1, 0, '2023-08-08 07:02:15'),
(10, '2023-08-01', 17, '', '167.50', '0', 'Adv chkm hawala qadir trader', 1, 'f84ab96c4285c2e224332db632ca809b', 1, 0, '2023-08-08 07:02:51'),
(11, '2023-08-01', 20, '', '169.25', '0', 'Adv chkm hawala Bhai Mustafa ', 1, '5835ad70ba748b64b1b8125a73ba9e5a', 1, 0, '2023-08-08 08:02:47'),
(12, '2023-08-01', 17, '', '166.50', '0', 'Adv chkm', 1, 'b22e088264f262d3f883e99813e7efc1', 1, 0, '2023-08-08 09:02:11'),
(13, '2023-08-01', 6, '', '167.50', '0', 'Adv chkm', 1, '7db6d2e8a83e015724e7b1cc59bdf546', 1, 0, '2023-08-08 09:02:45'),
(14, '2023-08-03', 23, '', '160', '0', '3 Aug payment chkm', 1, 'a74271b85b8edd97998cb39e6bc93737', 0, 0, '0000-00-00 00:00:00'),
(15, '2023-08-03', 23, '', '160', '0', '3 Aug payment chkm ', 1, '8e622f1edc94d31c83e39eee623e90f4', 1, 0, '0000-00-00 00:00:00'),
(16, '2023-08-05', 21, '', '169.50', '0', 'Adv chkm half Sami niazi ', 1, 'a6584c7911eb882db5fbfc0a272a56cb', 1, 0, '0000-00-00 00:00:00'),
(17, '2023-08-05', 17, '', '167.75', '0', 'Adv chkm Half hamza Bhola ', 1, 'f2a1ea34f8f049be4f2b59eb53576115', 1, 0, '0000-00-00 00:00:00'),
(18, '2023-08-02', 17, '', '166.50', '0', '10 Aug payment chkm ', 1, '261dae20067fee62b73e18182c298571', 1, 0, '0000-00-00 00:00:00'),
(19, '2023-08-02', 24, '', '167', '0', '10 Aug payment chkm ', 1, '5fc5b3b23b3a6632f6ab57d343b40c24', 0, 0, '0000-00-00 00:00:00'),
(20, '2023-08-02', 23, '', '167.50', '0', '01 Aug payment chkm ', 1, '133f38a18612a675ab7bafa5784ac3e7', 1, 0, '0000-00-00 00:00:00'),
(21, '2023-08-02', 6, '', '166.50', '0', '10 Aug payment chkm ', 1, 'c9b255d5c53069dc7137d0d2f691c781', 1, 0, '0000-00-00 00:00:00'),
(22, '2023-08-03', 25, '', '170', '0', '10 Aug payment chkm ', 1, '12f298c1858329acf89269322308b961', 0, 0, '0000-00-00 00:00:00'),
(23, '2023-08-06', 26, '', '', '0', 'Thal chna 6700 \nRent 18600', 1, '88ab6ecc959bbb9e9e745cbdb0e61c2d', 0, 0, '0000-00-00 00:00:00'),
(24, '2023-08-02', 27, '', '167.35', '0', 'Adv chkm', 2, '692369ba9ed84a8236155e9ddd016b1e', 1, 0, '2023-08-08 02:03:16'),
(25, '2023-08-01', 28, '', '164.30', '0', 'Adv chkm ', 2, '97936773f74a9fc3b056e15f2612671a', 0, 0, '2023-08-08 05:03:27'),
(26, '2023-08-01', 2, '', '162.75', '0', 'Adv Chkm ', 2, '10a78f9d781aec146ca275f057e73cfa', 1, 0, '2023-08-08 06:03:07'),
(27, '2023-08-01', 2, '', '162.75', '0', 'Adv chkm', 2, '35aca1f7552524613110fd3d8247b553', 1, 0, '2023-08-08 06:03:37'),
(28, '2023-08-01', 29, '', '167.50', '0', 'Adv Chkm', 2, 'e677f1c6de8d1167440e64543c4ad5ba', 0, 0, '2023-08-08 07:03:22'),
(29, '2023-08-02', 30, '', '175.50', '0', 'Half payment Najam\n adv Chkm ', 2, '3edbc4e3c7ba5578c006e5b7d2aafc36', 0, 0, '2023-08-08 08:03:37'),
(30, '2023-08-02', 12, '', '167', '0', 'Chkm adv', 2, '7dfd7cf37ab03344acf90e7528d1f2e6', 1, 0, '2023-08-08 09:03:30'),
(31, '2023-08-03', 11, '', '168', '0', 'Adv Chkm ', 2, 'de029d6c6a472c9865eccc317a6c3e7c', 1, 0, '2023-08-08 10:03:10'),
(32, '2023-08-03', 13, '', '167.75', '0', 'Adv Chkm', 2, '00b7d2cb402866a920ee6106ab1fea9a', 1, 0, '2023-08-08 11:03:00'),
(33, '2023-08-03', 31, '', '168.50', '0', 'Adv Chkm', 2, '5c96dcb3059f42b521692d8e9cc84686', 0, 0, '2023-08-08 11:03:52'),
(34, '2023-09-10', 30, '', '170', '0', '10 September payment chkm ', 2, 'be0cc384d2bd7f517a98a232aa301db3', 1, 0, '2023-08-08 12:03:39'),
(35, '2023-08-15', 13, '', '163', '0', 'Chkm 15 Aug payment ', 2, '81cc71018b0a4249d3885882f3d79470', 1, 0, '2023-08-08 13:03:59'),
(36, '2023-08-15', 13, '', '162.50', '0', '15 Aug payment chkm ', 2, '114e1de981165c4a7e15c9ba793242c1', 1, 0, '2023-08-08 14:03:32'),
(37, '2023-08-05', 28, '', '161', '0', 'Adv chkm', 2, '46e602932fc13e6bed25e8beb5d6fa45', 1, 0, '2023-08-08 16:03:29'),
(38, '2023-08-05', 16, '', '163.75', '0', '5 Aug payment ', 2, 'cbe3e35b14b0d4420e915eeaa37dc3d0', 1, 0, '2023-08-08 17:03:14'),
(39, '2023-08-10', 15, '', '169', '0', '10 Aug payment chkm ', 2, 'f47f21c0d31c2abb1bdd543fe86f0185', 1, 0, '2023-08-08 17:03:50'),
(40, '2023-08-08', 16, '', '166', '0', 'Adv Chkm ', 2, '9bcb40c016352d4568ab7da25abeb264', 1, 0, '2023-08-08 18:03:44'),
(41, '2023-08-08', 30, '', '166', '0', 'Adv Chkm', 2, 'd18e2d0f6ee8a528037541f868830a92', 1, 0, '2023-08-08 19:03:15'),
(42, '2023-08-10', 32, '', '169.75', '0', '10 Aug payment ', 2, '93c894eb5f06a162b3ab63c2ff74dc8b', 0, 0, '2023-08-08 20:03:16'),
(43, '2023-08-12', 17, '', '170', '0', '12 Aug payment chkm ', 2, 'b6fdaff0323d2315e8afabc6732215ab', 1, 0, '2023-08-08 20:03:45'),
(44, '2023-08-10', 13, '', '169.50', '0', '10 August payment Chkm ', 2, 'ddd016bf02f056658783d09b596eedd0', 1, 0, '2023-08-08 21:03:26'),
(45, '2023-08-10', 33, '', '171.50', '0', '10 Aug payment chkm\nHalf Hamza bhola ', 2, 'e0c67ac11ae419990a04b8c104e9ce4a', 0, 0, '2023-08-08 23:03:20'),
(46, '2023-08-10', 11, '', '169', '0', '10 Aug payment chkm \nHalf Hamza bhola ', 2, '43c9d54d46cc6c66306180cd004fa047', 1, 0, '0000-00-00 00:00:00'),
(47, '2023-08-10', 34, '', '168.75', '0', 'Adv Chkm \nHalf hamza Bhola ', 2, '9a7949f4e857c314dff379eb92ae9726', 0, 0, '0000-00-00 00:00:00'),
(48, '2023-08-20', 35, '', '168.50', '0', 'Adv Chkm \n20 August payment ', 2, 'c55a8fc494055d09d1b79ca14ca19740', 0, 0, '0000-00-00 00:00:00'),
(49, '2023-08-10', 30, '', '168', '0', '10 August payment chkm ', 2, '2f897624144f6ca0d1dcb27623f7ba77', 1, 0, '0000-00-00 00:00:00'),
(50, '2023-08-31', 26, '', '', '0', 'Thal chana dew \nRent18600\n31 Aug payment ', 2, '3f7012ab37b396ae038d2570731ce51a', 0, 0, '0000-00-00 00:00:00'),
(51, '2023-09-07', 14, '', '169', '0', '7 September payment chkm ', 2, '54f71fbe95d95deb749a3cc1b6a9a7b9', 1, 0, '0000-00-00 00:00:00'),
(52, '2023-08-20', 36, '', '167', '0', '20 August payment chkm ', 1, '232191f11122b37e1f973345af706bf9', 0, 0, '0000-00-00 00:00:00'),
(53, '2024-03-19', 20, '', '', '0', 'CHKM', 1, '9e73d1c2bbae6cd25305cac2bc6ccfb7', 0, 0, '2024-03-19 01:02:19'),
(54, '2024-05-21', 37, '', '', '0', '181 chkm  15 april adv', 2, '9de06e4e5027555def87b8d81571915c', 1, 1, '0000-00-00 00:00:00'),
(55, '2024-03-24', 38, '', '177', '0', '1 trala CHKM 26 March advance', 1, 'ee47ffc9b554c02abc335c9cb8de1f18', 0, 1, '0000-00-00 00:00:00'),
(56, '2024-03-21', 13, '', '179.50', '0', '1 trala CHKM 20 April', 1, 'fe180a458f7d48eb2e0cdeb19175d1ad', 1, 1, '0000-00-00 00:00:00'),
(57, '2024-03-21', 34, '', '181', '0', '1 trala CHKM 15 April', 1, 'e0ac203ee9ee853f169ac6399039a62f', 1, 1, '0000-00-00 00:00:00'),
(58, '2024-03-18', 34, '', '182', '0', '1 trala CHKM 15 April', 1, 'c9210656533e831cc2d1955a3ab933f0', 1, 1, '0000-00-00 00:00:00'),
(59, '2024-03-17', 34, '', '182.50', '0', '1 trala CHKM 15 April', 1, 'f39bcb4e8d9ffeab26da1812517f0694', 1, 1, '0000-00-00 00:00:00'),
(60, '2024-03-14', 30, '', '182', '0', '1 trala CHKM 15 April', 1, '6d9aa892beedac97e1f1b51d71fadd58', 1, 1, '0000-00-00 00:00:00'),
(61, '2024-03-14', 39, '', '182.25', '0', '1 trala CHKM 15 April', 1, '09fbafba10f533134cf07dd2ebaa2132', 1, 1, '0000-00-00 00:00:00'),
(62, '2024-03-05', 8, '', '181', '0', '1 trala CHKM 25 March Advance', 1, 'dccae1656d82374b069f46472d631c2d', 0, 1, '0000-00-00 00:00:00'),
(63, '2024-03-16', 11, '', '181', '0', '1 trala CHKM 25 March Advance', 1, 'c064b1b1c00ab65cc73c88690ea07a8a', 0, 1, '0000-00-00 00:00:00'),
(64, '2024-03-25', 2, '', '145', '0', '1 trala CHKM Advance', 1, '48256bfee3abbbe97043dc370538d759', 0, 1, '0000-00-00 00:00:00'),
(65, '2024-03-25', 2, '', '176.50', '0', '1 trala CHKM Advance', 1, 'b405bb3aac3fd3c2db55997a8c531974', 0, 1, '0000-00-00 00:00:00'),
(66, '2024-03-25', 2, '', '182', '0', '1 trala CHKM Advance', 1, 'bd659632c3e35c64921d06b2eb376c48', 0, 1, '0000-00-00 00:00:00'),
(67, '2024-03-25', 40, '', '182.40', '0', '1 trala CHKM Advance', 1, '1267671e4133c04124025ac9501aff5d', 0, 1, '0000-00-00 00:00:00'),
(68, '2024-03-25', 40, '', '180', '0', '1 trala CHKM Advance', 1, 'b518b040ae11c23f232ef671914d02df', 0, 1, '0000-00-00 00:00:00'),
(69, '2024-03-25', 41, '', '180.50', '0', '1 trala CHKM Advance', 1, 'a3304cfeda6f4ddd341dcb18dab4f85b', 0, 1, '0000-00-00 00:00:00'),
(70, '2024-03-25', 39, '31930', '184', '5875120', '1 trala CHKM Advance', 1, '3b251873ba82adad35750d28d1276490', 0, 1, '0000-00-00 00:00:00'),
(71, '2024-03-25', 17, '', '183.25', '0', '1 trala CHKM Advance', 2, '9d7c2376dc0f2ba69934477b6ba6c0eb', 0, 1, '0000-00-00 00:00:00'),
(72, '2024-03-25', 21, '', '178.50', '0', '1 trala CHKM Advance', 2, 'ef2d0daafb268e8d6d175f8c33392d9b', 0, 1, '0000-00-00 00:00:00'),
(73, '2024-03-25', 40, '', '185.50', '0', '1 trala CHKM Advance', 2, '1fcc2866b95994c482e7b627b8356b94', 0, 1, '0000-00-00 00:00:00'),
(74, '2024-03-25', 36, '31930', '180.50', '5763365', '1 trala CHKM Advance', 2, 'f068ed2aa6f74f758173e4a17f305f8d', 0, 1, '0000-00-00 00:00:00'),
(75, '2024-03-25', 42, '', '180', '0', '1 trala CHKM Advance', 2, '3c03b951de9c6e2176021f2878ea47b1', 0, 1, '2024-03-25 00:04:08'),
(76, '2024-03-25', 30, '32000', '180.50', '5776000', '1 trala CHKM Advance', 2, '99a13883290c391e12ec9a33f0328392', 0, 1, '2024-03-25 00:04:33'),
(77, '2024-03-25', 43, '', '179.50', '0', '1 trala CHKM Advance', 2, '300624b19126df8213732652eb84bf0c', 0, 1, '2024-03-25 01:04:08'),
(78, '2024-03-21', 17, '', '176.50', '0', '1 trala CHKM 26 March Advance', 2, 'b922d7a9f65769b1201d72523ef00941', 1, 1, '2024-03-25 02:04:35'),
(79, '2024-03-21', 17, '', '176.50', '0', '1 trala CHKM 26 March Advance', 2, 'e3e1a511488f1f83d76b38cbadd2f39f', 1, 1, '2024-03-25 03:04:04'),
(80, '2024-03-19', 2, '', '181', '0', '1 trala CHKM 15 April', 2, '013988a463aeea7233a6854d3d58b045', 1, 1, '2024-03-25 03:04:47'),
(81, '2024-03-25', 42, '', '176.5', '0', '1 trala CHKM 26 March Advance', 2, '5528ecd9dba663afffc0e7b3ffb77e97', 1, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `invoice_view`
-- (See below for the actual view)
--
CREATE TABLE `invoice_view` (
`date` date
,`detail_box` varchar(10000)
,`entry_date` datetime
,`id` int
,`invoice_hashval` varchar(1000)
,`invoice_status` int
,`invoice_type` int
,`modified_by` int
,`pending_value` int
,`rate` varchar(1000)
,`status` int
,`total_amount` varchar(1000)
,`vendor_address` varchar(255)
,`vendor_email` varchar(255)
,`vendor_fname` varchar(255)
,`vendor_hashval` varchar(1000)
,`vendor_id` int
,`vendor_lname` varchar(255)
,`vendor_name` varchar(1000)
,`vendor_phone` varchar(255)
,`weight` varchar(1000)
);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_hashval` varchar(1000) NOT NULL,
  `added_by` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `profile_pic` varchar(10000) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_hashval` varchar(1000) DEFAULT NULL,
  `user_type` int NOT NULL COMMENT '1 for Admin and 2 for normal user',
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `profile_pic`, `email`, `contact`, `address`, `password`, `user_hashval`, `user_type`, `status`) VALUES
(1, 'Najam', 'ul Hassan', 'profilepic/najam.jpg', 'najam@gmail.com', '03366006366', 'House 836', '10f2d9e85f3a6ba35d18fadc227af707', 'asdfhskdiuekjuikhklhkau7845adkjfhad', 1, 1),
(2, 'Muhammad', 'Waqas', 'profilepic/waqas.jpg', 'waqas@abc.com', '03125578160', 'House 35', '202cb962ac59075b964b07152d234b70', '6687668c91a8a87c2f20d5d8f490d007', 1, 1),
(3, 'Ghulam', 'Mustapha', NULL, 'gmustafa456@gmail.com', '03206622150', 'Sargodha ', '0571e8fde3ae5a8817b8ec75a3bb1ca7', 'b14f42204ef8e0ee0c0b84e35dd0023a', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `vendor_id` int NOT NULL,
  `vendor_company` varchar(1000) NOT NULL,
  `vendor_fname` varchar(255) NOT NULL,
  `vendor_lname` varchar(255) NOT NULL,
  `vendor_phone` varchar(255) NOT NULL,
  `vendor_email` varchar(255) DEFAULT NULL,
  `vendor_address` varchar(255) NOT NULL,
  `vendor_hashval` varchar(1000) DEFAULT NULL,
  `modified_by` int NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`vendor_id`, `vendor_company`, `vendor_fname`, `vendor_lname`, `vendor_phone`, `vendor_email`, `vendor_address`, `vendor_hashval`, `modified_by`, `status`) VALUES
(1, 'Alfateh Dall mills ', 'Al ', 'Fateh', '', '', '', '661d4baf32ae093d7ebb8bdf6fc41198', 1, 1),
(2, 'Imtiaz Hussain', 'Imtiaz ', 'Hussain ', '03137666000', '', 'Sargodha ', '36b731b2a242a3b3d37e0b99562ea53d', 2, 1),
(3, 'Shokat ', '', '', '', '', 'Multan', 'd881c8407e7cf262f07be3214186d0ec', 2, 1),
(4, 'Saim Abdullah traders', 'Saim', 'Abdullah ', '03036001216', '', 'Sargodha ', 'c55aed785a33d22a269274fc57e41857', 2, 1),
(5, 'Khurram Bhattra karachi', '', '', '', NULL, '', '8e03d6b12837d4fcfe502e0634b24741', 3, 0),
(6, 'Qasim Traders ', '', '', '', '', 'Sargodha', '924f02be4d2e34dfdbcb1529b0c30478', 2, 1),
(7, 'Intezar Broker Multan', '', '', '', NULL, '', 'f6ebcdfc25b5f8ee6552957f7b6cb5e3', 3, 0),
(8, 'Zubair Madni ', '', '', '', '', 'Karachi', '2c34ebc7f695eab5693552a079982e8e', 2, 1),
(9, 'Ehsan Younas and Co.', '', '', '', '', ' Sargodha', '904dda61ba6c5a3f91a2bfa8fc2f58a5', 2, 1),
(10, 'Sheikh Zia ', '', '', '', '', 'Sargodha', 'a15222ab73c3ebe660f0bc107691c1f6', 2, 1),
(11, 'Mrushad Traders ', '', '', '', '', 'Karachi', '275e9a9cdd84706408156b434e1c85b6', 2, 1),
(12, 'Khalid Paracha ', '', '', '', '', 'Faisalabad ', '0acac888bbe16c556df09c6fbcbdf230', 2, 1),
(13, 'Haji Yasin ', '', '', '', '', 'Jandanwala', '0078595f0c44ffb893c4b42c5c95827c', 2, 1),
(14, 'Rabnawaz ', '', '', '', '', 'Joharabad', '3d4b0d9da6751ca35dd7c8143d8ba64b', 2, 1),
(15, 'Imran Qasim Hunza Traders ', '', '', '', '', 'Karachi ', 'b121dd63b60e3c25ea5ff4e5c0499d99', 2, 1),
(16, 'Haji Ikramullah', '', '', '', '', 'Sargodha ', '94bd72c8e8724ef995863791d8906b8b', 2, 1),
(17, 'Faisal Broker ', '', '', '', '', 'sargodha ', 'f2dff7bf78e023e983fcfd6abbd8ab67', 2, 1),
(18, 'Samiullah', '', '', '', '', ' Faisalabad', 'abee03906813a90bb4d1becbfbdb3509', 2, 1),
(19, 'Rana waqar piplan', '', '', '', NULL, '', '947d753b1c9616eb5c61d6b22c0832e6', 3, 0),
(20, 'Khurram Bhtraa ', '', '', '', NULL, '', '1772b8bd53c36c84916aee4a6ab88da3', 1, 1),
(21, 'Intizar Broker ', '', '', '', '', 'Multan', 'cda804892efb2c9bde94d3a03d4d762c', 2, 1),
(22, 'Shokat', '', '', '', '', ' Multan', '58972526096b21ae015bd7f2adefbb47', 2, 1),
(23, 'Qadir trader ', '', '', '', '', 'sargodha', '9c269a2daa6e6b387fd07b719155af77', 2, 1),
(24, 'Sami Ullah ', '', '', '', '', 'Faislabad', 'bc832cce38e3dca5032f52288e8e2af2', 2, 1),
(25, 'Abdullah traders ', '', '', '', '', 'Sargodha ', '7867c6d5fd6d295d9290b741e70a06e6', 2, 1),
(26, 'Hanif Khan ', '', '', '', '', 'Multan', 'e685466c0cbad628ea455ae73d79493d', 2, 1),
(27, 'Haji Asif Bijaar ', '', '', '', NULL, '', '276dc1371cf6ae933aa5bfd30a951198', 1, 1),
(28, 'Uzair Niazi ', '', '', '', '', 'Sargodha ', '8e6028a3528ebd8dce83425e53f66f5d', 2, 1),
(29, 'Sheikh Imran ', '', '', '', '', 'Sargodha ', '71a64a7b6f255f36a373175d36af2fa9', 2, 1),
(30, 'Gulmeri traders ', '', '', '', '', 'Sargodha ', 'e548061d38daab5abc8dff03bc55b5fe', 2, 1),
(31, 'Rana Qaiser ', '', '', '', '', 'Kaloor koot', '06da4f0265b56bfe9295eaa6422bba15', 2, 1),
(32, 'Nasir ', '', '', '', '', 'Panja Sharif ', 'af1f42cb58d2e66c8cbf06d8eddc089d', 2, 1),
(33, 'Hunain trader ', '', '', '', '', 'Karachi ', 'eee2f4b0db2076c459f9380b6020a660', 2, 1),
(34, 'Sher Baz ', '', '', '', '', 'Harnoli', 'ca924fb2e38a3c660a95bb634067eb1f', 2, 1),
(35, 'RAna Waqar ', '', '', '', '', 'piplan', '5eeeaf5ebe64afd9cd88207ea8884137', 2, 1),
(36, 'Dilleep ', '', '', '', '', 'Hyderabad', '2fcf246adb5742f3444288d49735aea7', 2, 1),
(37, 'Sher Baz ', '', '', '', '', 'Harnoli', 'ca924fb2e38a3c660a95bb634067eb1f', 2, 1),
(38, 'Sakhi International', '', '', '', NULL, '', '9511af513354910924b29ce7b259793e', 1, 1),
(39, 'Shahzaib RS ', '', '', '', '', 'Karachi', 'd03344f6806c14814d04a7a067c1640e', 2, 1),
(40, 'Masoom Commodities Nank ', '', '', '', '', 'Karachi', '0ffe88db7662977dd1c153c7f3fbc6f9', 2, 1),
(41, 'Asif Bijar', '', '', '', NULL, '', '3bf4fee21fa9874f43d25cf9a8a5d8ee', 1, 1),
(42, 'Qaisar', '', '', '', '', ' Kaloor Kot', '29ac6da1b99fa6b73b7e3bc944fefb39', 2, 1),
(43, 'Sami Ullah Niazi', '', '', '', NULL, '', 'a31065190f11b6a5aa6d1623fa543368', 1, 1),
(44, 'Al Falah bank', 'Najam', 'Hassan', '03366006366', '', '', '944f59c824176asdfasdac4c720190ce0216a12', 1, 1),
(45, 'Allied Bank', 'Ghulam ', 'Mustafa', '03206622150', '', '', 'b82db97d396300bfe9f9f06a0e41d1fe', 1, 1),
(46, 'Faisal Bank', 'Ghulam', 'Mustafa', '03206622150', '', '', 'dc4dc2db2d3f90b6b8e8178b3a518900', 1, 1),
(47, 'Habib Metroo Bank', 'Ghulam ', 'Mustafa', '03206622150', '', '', 'b82db97dcvbf396300bfe9f9f06a0e41d1fe', 1, 1),
(48, 'Habib Bank ', 'Ghulam', 'Mustafa', '03206622150', '', '', 'dc4dc2db2asdfwd3f90b6b8e8178b3a518900', 1, 1),
(49, 'Meezan Bank', 'Najam', 'Hassan', '03366006366', '', '', '944f59c824176acafaewrq4c720190ce0216a12', 1, 1),
(50, 'Al Habib Bank', 'Najam', 'Hassan', '03366006366', '', '', '944f59c824176aczcvwer4c720190ce0216a12', 1, 1),
(51, 'United Bank', 'Najam', 'Hassan', '03366006366', '', '', '944f59c824176ac4c7asdfasdf20190ce0216a12', 1, 1),
(52, 'Soneri Bank', 'Najam', 'Hassan', '03366006366', '', '', '944f59c824176ac4c720ZXa190ce0216a12', 1, 1),
(53, 'Askari Bank', 'Askari', 'Bank', '', '', 'Club Road Sargodha', '946369a02a6129b9d73d247a0edbf25d', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cash_entry`
--
ALTER TABLE `cash_entry`
  ADD PRIMARY KEY (`cash_book_id`);

--
-- Indexes for table `invoices_entry`
--
ALTER TABLE `invoices_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cash_entry`
--
ALTER TABLE `cash_entry`
  MODIFY `cash_book_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `invoices_entry`
--
ALTER TABLE `invoices_entry`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `vendor_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

-- --------------------------------------------------------

--
-- Structure for view `entry_list_view`
--
DROP TABLE IF EXISTS `entry_list_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`najamtraders`@`localhost` SQL SECURITY DEFINER VIEW `entry_list_view`  AS SELECT `cash_entry`.`cash_book_id` AS `cash_book_id`, `cash_entry`.`date` AS `date`, `cash_entry`.`vendor_id` AS `vendor_id`, `cash_entry`.`amount` AS `amount`, `cash_entry`.`entry_type` AS `entry_type`, `cash_entry`.`detail` AS `detail`, `cash_entry`.`entry_hashval` AS `entry_hashval`, `cash_entry`.`modified_by` AS `modified_by`, `cash_entry`.`invoice_entry` AS `from_invoice`, `cash_entry`.`entry_date` AS `entry_date`, `cash_entry`.`entry_status` AS `entry_status`, `users`.`first_name` AS `first_name`, `users`.`last_name` AS `last_name`, `vendors`.`vendor_company` AS `vendor_company`, `vendors`.`vendor_hashval` AS `vendor_hashval` FROM ((`cash_entry` join `users`) join `vendors`) WHERE ((`cash_entry`.`vendor_id` = `vendors`.`vendor_id`) AND (`cash_entry`.`modified_by` = `users`.`user_id`) AND (`cash_entry`.`entry_status` = 1)) ;

-- --------------------------------------------------------

--
-- Structure for view `invoice_view`
--
DROP TABLE IF EXISTS `invoice_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`najamtraders`@`localhost` SQL SECURITY DEFINER VIEW `invoice_view`  AS SELECT `invoices_entry`.`id` AS `id`, `invoices_entry`.`date` AS `date`, `invoices_entry`.`weight` AS `weight`, `invoices_entry`.`rate` AS `rate`, `invoices_entry`.`total_invoice` AS `total_amount`, `invoices_entry`.`detail_box` AS `detail_box`, `invoices_entry`.`invoice_type` AS `invoice_type`, `invoices_entry`.`invoice_hashval` AS `invoice_hashval`, `invoices_entry`.`pending_value` AS `pending_value`, `invoices_entry`.`invoice_status` AS `invoice_status`, `invoices_entry`.`entry_date` AS `entry_date`, `vendors`.`vendor_id` AS `vendor_id`, `vendors`.`vendor_company` AS `vendor_name`, `vendors`.`vendor_fname` AS `vendor_fname`, `vendors`.`vendor_lname` AS `vendor_lname`, `vendors`.`vendor_phone` AS `vendor_phone`, `vendors`.`vendor_email` AS `vendor_email`, `vendors`.`vendor_address` AS `vendor_address`, `vendors`.`vendor_hashval` AS `vendor_hashval`, `vendors`.`modified_by` AS `modified_by`, `vendors`.`status` AS `status` FROM (`invoices_entry` join `vendors`) WHERE ((`invoices_entry`.`vendor_id` = `vendors`.`vendor_id`) AND (`invoices_entry`.`invoice_status` = 1)) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
