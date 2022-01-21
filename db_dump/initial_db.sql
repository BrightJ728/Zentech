-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 06, 2021 at 11:15 AM
-- Server version: 8.0.22
-- PHP Version: 7.3.23-4+ubuntu18.04.1+deb.sury.org+1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

START TRANSACTION;
--
-- Database: `student_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_years`
--



CREATE TABLE `academic_years` (
  `id` smallint UNSIGNED NOT NULL,
  `description` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `school_id` smallint UNSIGNED DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ;


-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `unique_identifier` varchar(255) NOT NULL,
  `version` varchar(255) DEFAULT NULL,
  `status` int NOT NULL,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255)  DEFAULT NULL,
  `author` varchar(255)  DEFAULT NULL,
  `copies` int DEFAULT NULL,
  `school_id` int DEFAULT NULL,
  `session` varchar(255)  DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `book_issues`
--

CREATE TABLE `book_issues` (
  `id` int UNSIGNED NOT NULL,
  `book_id` int DEFAULT NULL,
  `class_id` int DEFAULT NULL,
  `student_id` int DEFAULT NULL,
  `issue_date` varchar(255)  DEFAULT NULL,
  `status` int DEFAULT '0',
  `school_id` int DEFAULT NULL,
  `session` varchar(255)  DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40)  DEFAULT NULL,
  `ip_address` varchar(45)  DEFAULT NULL,
  `timestamp` int NOT NULL DEFAULT '0',
  `data` blob
) ;

--
-- Dumping data for table `ci_sessions`
--


--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255)  DEFAULT NULL,
  `school_id` int DEFAULT NULL
) ;


-- --------------------------------------------------------

--
-- Table structure for table `class_rooms`
--

CREATE TABLE `class_rooms` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255)  DEFAULT NULL,
  `school_id` int DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int UNSIGNED NOT NULL,
  `department_id` int UNSIGNED NOT NULL,
  `school_id` mediumint UNSIGNED NOT NULL,
  `code` varchar(10) NOT NULL,
  `title` varchar(500) NOT NULL,
  `level_id` smallint UNSIGNED NOT NULL,
  `semester` varchar(100) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `symbol` varchar(255) DEFAULT NULL,
  `paypal_supported` int DEFAULT NULL,
  `stripe_supported` int DEFAULT NULL,
  `paystack_supported` int DEFAULT '0',
  `payumoney_supported` int NOT NULL DEFAULT '0'
)  ROW_FORMAT=COMPACT;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `code`, `symbol`, `paypal_supported`, `stripe_supported`, `paystack_supported`, `payumoney_supported`) VALUES
(1, 'Leke', 'ALL', 'Lek', 0, 1, 0, 1),
(2, 'Dollars', 'USD', '$', 1, 1, 0, 1),
(3, 'Afghanis', 'AFN', '؋', 0, 1, 0, 1),
(4, 'Pesos', 'ARS', '$', 0, 1, 0, 1),
(5, 'Guilders', 'AWG', 'ƒ', 0, 1, 0, 1),
(6, 'Dollars', 'AUD', '$', 1, 1, 0, 1),
(7, 'New Manats', 'AZN', 'ман', 0, 1, 0, 1),
(8, 'Dollars', 'BSD', '$', 0, 1, 0, 1),
(9, 'Dollars', 'BBD', '$', 0, 1, 0, 1),
(10, 'Rubles', 'BYR', 'p.', 0, 0, 0, 1),
(11, 'Euro', 'EUR', '€', 1, 1, 0, 1),
(12, 'Dollars', 'BZD', 'BZ$', 0, 1, 0, 1),
(13, 'Dollars', 'BMD', '$', 0, 1, 0, 1),
(14, 'Bolivianos', 'BOB', '$b', 0, 1, 0, 1),
(15, 'Convertible Marka', 'BAM', 'KM', 0, 1, 0, 1),
(16, 'Pula', 'BWP', 'P', 0, 1, 0, 1),
(17, 'Leva', 'BGN', 'лв', 0, 1, 0, 1),
(18, 'Reais', 'BRL', 'R$', 1, 1, 0, 1),
(19, 'Pounds', 'GBP', '£', 1, 1, 0, 1),
(20, 'Dollars', 'BND', '$', 0, 1, 0, 1),
(21, 'Riels', 'KHR', '៛', 0, 1, 0, 1),
(22, 'Dollars', 'CAD', '$', 1, 1, 0, 1),
(23, 'Dollars', 'KYD', '$', 0, 1, 0, 1),
(24, 'Pesos', 'CLP', '$', 0, 1, 0, 1),
(25, 'Yuan Renminbi', 'CNY', '¥', 0, 1, 0, 1),
(26, 'Pesos', 'COP', '$', 0, 1, 0, 1),
(27, 'Colón', 'CRC', '₡', 0, 1, 0, 1),
(28, 'Kuna', 'HRK', 'kn', 0, 1, 0, 1),
(29, 'Pesos', 'CUP', '₱', 0, 0, 0, 1),
(30, 'Koruny', 'CZK', 'Kč', 1, 1, 0, 1),
(31, 'Kroner', 'DKK', 'kr', 1, 1, 0, 1),
(32, 'Pesos', 'DOP ', 'RD$', 0, 1, 0, 1),
(33, 'Dollars', 'XCD', '$', 0, 1, 0, 1),
(34, 'Pounds', 'EGP', '£', 0, 1, 0, 1),
(35, 'Colones', 'SVC', '$', 0, 0, 0, 1),
(36, 'Pounds', 'FKP', '£', 0, 1, 0, 1),
(37, 'Dollars', 'FJD', '$', 0, 1, 0, 1),
(38, 'Cedis', 'GHC', '¢', 0, 0, 0, 1),
(39, 'Pounds', 'GIP', '£', 0, 1, 0, 1),
(40, 'Quetzales', 'GTQ', 'Q', 0, 1, 0, 1),
(41, 'Pounds', 'GGP', '£', 0, 0, 0, 1),
(42, 'Dollars', 'GYD', '$', 0, 1, 0, 1),
(43, 'Lempiras', 'HNL', 'L', 0, 1, 0, 1),
(44, 'Dollars', 'HKD', '$', 1, 1, 0, 1),
(45, 'Forint', 'HUF', 'Ft', 1, 1, 0, 1),
(46, 'Kronur', 'ISK', 'kr', 0, 1, 0, 1),
(47, 'Rupees', 'INR', 'Rp', 1, 1, 0, 1),
(48, 'Rupiahs', 'IDR', 'Rp', 0, 1, 0, 1),
(49, 'Rials', 'IRR', '﷼', 0, 0, 0, 1),
(50, 'Pounds', 'IMP', '£', 0, 0, 0, 1),
(51, 'New Shekels', 'ILS', '₪', 1, 1, 0, 1),
(52, 'Dollars', 'JMD', 'J$', 0, 1, 0, 1),
(53, 'Yen', 'JPY', '¥', 1, 1, 0, 1),
(54, 'Pounds', 'JEP', '£', 0, 0, 0, 1),
(55, 'Tenge', 'KZT', 'лв', 0, 1, 0, 1),
(56, 'Won', 'KPW', '₩', 0, 0, 0, 1),
(57, 'Won', 'KRW', '₩', 0, 1, 0, 1),
(58, 'Soms', 'KGS', 'лв', 0, 1, 0, 1),
(59, 'Kips', 'LAK', '₭', 0, 1, 0, 1),
(60, 'Lati', 'LVL', 'Ls', 0, 0, 0, 1),
(61, 'Pounds', 'LBP', '£', 0, 1, 0, 1),
(62, 'Dollars', 'LRD', '$', 0, 1, 0, 1),
(63, 'Switzerland Francs', 'CHF', 'CHF', 1, 1, 0, 1),
(64, 'Litai', 'LTL', 'Lt', 0, 0, 0, 1),
(65, 'Denars', 'MKD', 'ден', 0, 1, 0, 1),
(66, 'Ringgits', 'MYR', 'RM', 1, 1, 0, 1),
(67, 'Rupees', 'MUR', '₨', 0, 1, 0, 1),
(68, 'Pesos', 'MXN', '$', 1, 1, 0, 1),
(69, 'Tugriks', 'MNT', '₮', 0, 1, 0, 1),
(70, 'Meticais', 'MZN', 'MT', 0, 1, 0, 1),
(71, 'Dollars', 'NAD', '$', 0, 1, 0, 1),
(72, 'Rupees', 'NPR', '₨', 0, 1, 0, 1),
(73, 'Guilders', 'ANG', 'ƒ', 0, 1, 0, 1),
(74, 'Dollars', 'NZD', '$', 1, 1, 0, 1),
(75, 'Cordobas', 'NIO', 'C$', 0, 1, 0, 1),
(76, 'Nairas', 'NGN', '₦', 0, 1, 1, 1),
(77, 'Krone', 'NOK', 'kr', 1, 1, 0, 1),
(78, 'Rials', 'OMR', '﷼', 0, 0, 0, 1),
(79, 'Rupees', 'PKR', '₨', 0, 1, 0, 1),
(80, 'Balboa', 'PAB', 'B/.', 0, 1, 0, 1),
(81, 'Guarani', 'PYG', 'Gs', 0, 1, 0, 1),
(82, 'Nuevos Soles', 'PEN', 'S/.', 0, 1, 0, 1),
(83, 'Pesos', 'PHP', 'Php', 1, 1, 0, 1),
(84, 'Zlotych', 'PLN', 'zł', 1, 1, 0, 1),
(85, 'Rials', 'QAR', '﷼', 0, 1, 0, 1),
(86, 'New Lei', 'RON', 'lei', 0, 1, 0, 1),
(87, 'Rubles', 'RUB', 'руб', 1, 1, 0, 1),
(88, 'Pounds', 'SHP', '£', 0, 1, 0, 1),
(89, 'Riyals', 'SAR', '﷼', 0, 1, 0, 1),
(90, 'Dinars', 'RSD', 'Дин.', 0, 1, 0, 1),
(91, 'Rupees', 'SCR', '₨', 0, 1, 0, 1),
(92, 'Dollars', 'SGD', '$', 1, 1, 0, 1),
(93, 'Dollars', 'SBD', '$', 0, 1, 0, 1),
(94, 'Shillings', 'SOS', 'S', 0, 1, 0, 1),
(95, 'Rand', 'ZAR', 'R', 0, 1, 0, 1),
(96, 'Rupees', 'LKR', '₨', 0, 1, 0, 1),
(97, 'Kronor', 'SEK', 'kr', 1, 1, 0, 1),
(98, 'Dollars', 'SRD', '$', 0, 1, 0, 1),
(99, 'Pounds', 'SYP', '£', 0, 0, 0, 1),
(100, 'New Dollars', 'TWD', 'NT$', 1, 1, 0, 1),
(101, 'Baht', 'THB', '฿', 1, 1, 0, 1),
(102, 'Dollars', 'TTD', 'TT$', 0, 1, 0, 1),
(103, 'Lira', 'TRY', 'TL', 0, 1, 0, 1),
(104, 'Liras', 'TRL', '£', 0, 0, 0, 1),
(105, 'Dollars', 'TVD', '$', 0, 0, 0, 1),
(106, 'Hryvnia', 'UAH', '₴', 0, 1, 0, 1),
(107, 'Pesos', 'UYU', '$U', 0, 1, 0, 1),
(108, 'Sums', 'UZS', 'лв', 0, 1, 0, 1),
(109, 'Bolivares Fuertes', 'VEF', 'Bs', 0, 0, 0, 1),
(110, 'Dong', 'VND', '₫', 0, 1, 0, 1),
(111, 'Rials', 'YER', '﷼', 0, 1, 0, 1),
(112, 'Zimbabwe Dollars', 'ZWD', 'Z$', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `daily_attendances`
--

CREATE TABLE `daily_attendances` (
  `id` int NOT NULL,
  `timestamp` varchar(255)  DEFAULT NULL,
  `class_id` int DEFAULT NULL,
  `section_id` int DEFAULT NULL,
  `student_id` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `session_id` varchar(255)  DEFAULT NULL,
  `school_id` int NOT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255)  DEFAULT NULL,
  `school_id` int NOT NULL
) ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `school_id`) VALUES
(1, 'Pharmacy', 1),
(2, 'Nursing', 1);

-- --------------------------------------------------------

--
-- Table structure for table `enrols`
--

CREATE TABLE `enrols` (
  `id` int UNSIGNED NOT NULL,
  `student_id` int DEFAULT NULL,
  `class_id` int DEFAULT NULL,
  `section_id` int DEFAULT NULL,
  `school_id` int DEFAULT NULL,
  `session` varchar(255)  DEFAULT NULL
)  ROW_FORMAT=COMPACT;


-- --------------------------------------------------------

--
-- Table structure for table `event_calendars`
--

CREATE TABLE `event_calendars` (
  `id` int NOT NULL,
  `title` longtext ,
  `starting_date` varchar(255)  DEFAULT NULL,
  `ending_date` varchar(255)  DEFAULT NULL,
  `school_id` int DEFAULT NULL,
  `session` int DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255)  DEFAULT NULL,
  `starting_date` varchar(255)  DEFAULT NULL,
  `ending_date` varchar(255)  DEFAULT NULL,
  `school_id` int DEFAULT NULL,
  `session` varchar(255)  DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int UNSIGNED NOT NULL,
  `expense_category_id` int DEFAULT NULL,
  `date` int DEFAULT NULL,
  `amount` varchar(255)  DEFAULT NULL,
  `school_id` int DEFAULT NULL,
  `session` varchar(255)  DEFAULT '',
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255)  DEFAULT NULL,
  `school_id` int DEFAULT NULL,
  `session` varchar(255)  DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `frontend_events`
--

CREATE TABLE `frontend_events` (
  `frontend_events_id` int NOT NULL,
  `title` text ,
  `timestamp` int NOT NULL,
  `status` int NOT NULL DEFAULT '0' COMMENT '0-inactive, 1-active',
  `school_id` int NOT NULL,
  `created_by` int NOT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `frontend_gallery`
--

CREATE TABLE `frontend_gallery` (
  `frontend_gallery_id` int NOT NULL,
  `title` text ,
  `description` longtext ,
  `date_added` int DEFAULT NULL,
  `image` text ,
  `show_on_website` int NOT NULL DEFAULT '0' COMMENT '0-no 1-yes',
  `school_id` int DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `frontend_gallery_image`
--

CREATE TABLE `frontend_gallery_image` (
  `frontend_gallery_image_id` int NOT NULL,
  `frontend_gallery_id` int DEFAULT NULL,
  `title` text ,
  `image` text 
) ;

-- --------------------------------------------------------

--
-- Table structure for table `frontend_settings`
--

CREATE TABLE `frontend_settings` (
  `id` int NOT NULL,
  `about_us` longtext ,
  `terms_conditions` longtext ,
  `privacy_policy` longtext ,
  `social_links` longtext ,
  `copyright_text` longtext ,
  `about_us_image` longtext ,
  `slider_images` longtext ,
  `theme` longtext ,
  `homepage_note_title` longtext ,
  `homepage_note_description` longtext ,
  `website_title` varchar(255)  DEFAULT NULL
) ;

--
-- Dumping data for table `frontend_settings`
--

INSERT INTO `frontend_settings` (`id`, `about_us`, `terms_conditions`, `privacy_policy`, `social_links`, `copyright_text`, `about_us_image`, `slider_images`, `theme`, `homepage_note_title`, `homepage_note_description`, `website_title`) VALUES
(1, '&lt;h1&gt;About Our Schools&lt;/h1&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English.&amp;nbsp;&lt;span&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English.&lt;br&gt;&lt;/span&gt;&lt;h3&gt;Our school historys&lt;/h3&gt;&lt;span&gt;Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.&lt;br&gt;&lt;/span&gt;&lt;h3&gt;Something interesting about our schools&lt;/h3&gt;&lt;span&gt;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#039;t look even slightly believable. If you are going to use a passage&lt;br&gt;&lt;/span&gt;&lt;br&gt;&lt;ul&gt;&lt;li&gt;making this the first true generator&lt;/li&gt;&lt;li&gt;to generate Lorem Ipsum which&lt;/li&gt;&lt;li&gt;but the majority have suffered alteratio&lt;/li&gt;&lt;li&gt;is that it has a more-or-less&lt;/li&gt;&lt;/ul&gt;All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.&lt;br&gt;&lt;br&gt;&lt;br&gt;', '&lt;h1&gt;Terms of our school&lt;/h1&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English.&amp;nbsp;&lt;span&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English.&lt;br&gt;&lt;/span&gt;&lt;h3&gt;Our school history&lt;/h3&gt;&lt;span&gt;Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.&lt;br&gt;&lt;/span&gt;&lt;h3&gt;Something interesting about our school&lt;/h3&gt;&lt;span&gt;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#039;t look even slightly believable. If you are going to use a passage&lt;br&gt;&lt;/span&gt;&lt;br&gt;&lt;ul&gt;&lt;li&gt;making this the first true generator&lt;/li&gt;&lt;li&gt;to generate Lorem Ipsum which&lt;/li&gt;&lt;li&gt;but the majority have suffered alteratio&lt;/li&gt;&lt;li&gt;is that it has a more-or-less&lt;/li&gt;&lt;/ul&gt;All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.&lt;br&gt;&lt;br&gt;&lt;br&gt;', '&lt;h1&gt;Privacy policy of our school&lt;/h1&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English.&amp;nbsp;&lt;span&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English.&lt;br&gt;&lt;/span&gt;&lt;h3&gt;Our school history&lt;/h3&gt;&lt;span&gt;Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.&lt;br&gt;&lt;/span&gt;&lt;h3&gt;Something interesting about our school&lt;/h3&gt;&lt;span&gt;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#039;t look even slightly believable. If you are going to use a passage&lt;br&gt;&lt;/span&gt;&lt;br&gt;&lt;ul&gt;&lt;li&gt;making this the first true generator&lt;/li&gt;&lt;li&gt;to generate Lorem Ipsum which&lt;/li&gt;&lt;li&gt;but the majority have suffered alteratio&lt;/li&gt;&lt;li&gt;is that it has a more-or-less&lt;/li&gt;&lt;/ul&gt;All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.&lt;br&gt;&lt;br&gt;&lt;br&gt;', '[{\"facebook\":\"http:\\/\\/www.facebook.com\\/zentechgh\",\"twitter\":\"http:\\/\\/www.twitter.com\\/zentechgh\",\"linkedin\":\"http:\\/\\/www.linkedin.com\\/zentechgh\",\"google\":\"http:\\/\\/www.google.com\\/zentechgh\",\"youtube\":\"http:\\/\\/www.youtube.com\\/zentechgh\",\"instagram\":\"http:\\/\\/www.instagram.com\\/zentechgh\"}]', 'All the rights reserved | Powered By Zentech IT Solutions', NULL, '[{\"title\":\"Education is the most powerful weapon\",\"description\":\"&quot;You can use education to change the world&quot; - &lt;i&gt;Nelson Mandela&lt;\\/i&gt;\",\"image\":\"6.png\"},{\"title\":\"Knowledge is power\",\"description\":\"&quot;Education is the premise of progress, in every society, in every family&quot; - &lt;i&gt;Kofi Annan&lt;\\/i&gt;\",\"image\":\"0.jpg\"},{\"title\":\"Have an aim in life, continuously acquire knowledge\",\"description\":\"&quot;Never stop fighting until you arrive at your destined place&quot; - &lt;i&gt;A.P.J. Abdul Kalam&lt;\\/i&gt;\",\"image\":\"1.png\"}]', 'ultimate', 'Welcome to Entrance University College', 'The Entrance University College of Health Sciences (EUCHS) is a private institution established by Dr Samuel Amo Tobin, the Chancellor of the University College.\r\n\r\nCurrently in full swing is the School of Pharmacy (ESOP), with the following in the preparation stage: School of Nursing (ESON) and School Physical Therapy (ESOPT).', 'Entrance University College');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255)  DEFAULT NULL,
  `grade_point` varchar(255)  DEFAULT NULL,
  `mark_from` varchar(255)  DEFAULT NULL,
  `mark_upto` varchar(255)  DEFAULT NULL,
  `comment` longtext ,
  `school_id` int DEFAULT NULL,
  `session` varchar(255)  DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int NOT NULL,
  `title` varchar(255)  DEFAULT NULL,
  `total_amount` int DEFAULT NULL,
  `class_id` int DEFAULT NULL,
  `student_id` int DEFAULT NULL,
  `payment_method` longtext ,
  `paid_amount` int DEFAULT NULL,
  `status` longtext ,
  `school_id` int DEFAULT NULL,
  `session` varchar(255)  DEFAULT NULL,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL COMMENT 'This column is all about payment taking date'
) ;

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `department_id` int DEFAULT NULL,
  `designation` varchar(255)  DEFAULT NULL,
  `school_id` int DEFAULT NULL,
  `social_links` longtext ,
  `about` longtext ,
  `show_on_website` int NOT NULL
) ;


-- --------------------------------------------------------

--
-- Table structure for table `lecturer_permissions`
--

CREATE TABLE `lecturer_permissions` (
  `id` int UNSIGNED NOT NULL,
  `class_id` int DEFAULT NULL,
  `section_id` int DEFAULT NULL,
  `lecturer_id` int DEFAULT NULL,
  `marks` int DEFAULT '0',

  
  `assignment` int DEFAULT '0',
  `attendance` int DEFAULT '0',
  `online_exam` int DEFAULT '0'
) ;



-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int UNSIGNED NOT NULL,
  `student_id` int DEFAULT NULL,
  `subject_id` int DEFAULT NULL,
  `class_id` int DEFAULT NULL,
  `section_id` int DEFAULT NULL,
  `exam_id` int DEFAULT NULL,
  `mark_obtained` int DEFAULT '0',
  `comment` longtext ,
  `session` int DEFAULT NULL,
  `school_id` int DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int UNSIGNED NOT NULL,
  `displayed_name` varchar(255)  DEFAULT NULL,
  `route_name` varchar(255)  DEFAULT NULL,
  `parent` int DEFAULT NULL,
  `icon` varchar(255)  DEFAULT NULL,
  `status` int DEFAULT '1',
  `superadmin_access` int NOT NULL DEFAULT '0',
  `admin_access` int NOT NULL DEFAULT '0',
  `lecturer_access` int NOT NULL DEFAULT '0',
  `parent_access` int NOT NULL DEFAULT '0',
  `student_access` int NOT NULL DEFAULT '0',
  `accountant_access` int NOT NULL DEFAULT '0',
  `librarian_access` int NOT NULL DEFAULT '0',
  `sort_order` int NOT NULL,
  `is_addon` int NOT NULL DEFAULT '0' COMMENT 'If the value is 1 that means its an addon.',
  `unique_identifier` varchar(255)  DEFAULT NULL COMMENT 'It is mandatory for addons'
)  ROW_FORMAT=COMPACT;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `displayed_name`, `route_name`, `parent`, `icon`, `status`, `superadmin_access`, `admin_access`, `lecturer_access`, `parent_access`, `student_access`, `accountant_access`, `librarian_access`, `sort_order`, `is_addon`, `unique_identifier`) VALUES
(1, 'users', NULL, 0, 'dripicons-user', 1, 1, 1, 1, 1, 1, 0, 0, 10, 0, 'users'),
(2, 'admin', 'admin', 1, NULL, 1, 1, 0, 0, 0, 0, 0, 0, 9, 0, 'admin'),
(3, 'student', 'student', 1, NULL, 1, 1, 1, 1, 0, 0, 0, 0, 10, 0, 'student'),
(4, 'lecturer', 'lecturer', 1, NULL, 1, 1, 1, 1, 1, 1, 0, 0, 30, 0, 'teacher'),
(7, 'accountant', 'accountant', 1, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 60, 0, 'accountant'),
(8, 'driver', NULL, 1, NULL, 0, 1, 0, 0, 0, 0, 0, 0, 80, 0, 'driver'),
(9, 'academic', NULL, 0, 'dripicons-store', 1, 1, 1, 1, 1, 1, 0, 0, 20, 0, 'academic'),
(10, 'class', 'manage_class', 9, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 40, 0, 'class'),
(11, 'section', NULL, 9, NULL, 0, 1, 1, 0, 0, 0, 0, 0, 50, 0, 'section'),
(12, 'class_room', 'class_room', 9, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 60, 0, 'class-room'),
(13, 'syllabus', 'syllabus', 9, NULL, 1, 1, 1, 1, 1, 1, 0, 0, 30, 0, 'syllabus'),
(14, 'subject', 'subject', 9, NULL, 1, 1, 1, 1, 0, 1, 0, 0, 29, 0, 'subject'),
(15, 'class_routine', 'routine', 9, NULL, 1, 1, 1, 1, 1, 1, 0, 0, 20, 0, 'class-routine'),
(16, 'daily_attendance', 'attendance', 9, NULL, 1, 1, 1, 1, 1, 1, 0, 0, 10, 0, 'daily-attendance'),
(17, 'noticeboard', NULL, 9, NULL, 0, 1, 0, 0, 0, 0, 0, 0, 110, 0, 'noticeboard'),
(18, 'promotion', 'promotion', 19, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 50, 0, 'promotion'),
(19, 'assessments', NULL, 0, 'dripicons-to-do', 1, 1, 1, 1, 1, 1, 0, 0, 30, 0, 'assessments'),
(20, 'exam', 'exam', 19, NULL, 1, 1, 1, 1, 0, 0, 0, 0, 20, 0, 'exam'),
(21, 'grades', 'grade', 19, NULL, 1, 1, 1, 0, 1, 1, 0, 0, 30, 0, 'grades'),
(22, 'marks', 'mark', 19, NULL, 1, 1, 1, 1, 1, 1, 0, 0, 10, 0, 'marks'),
(23, 'tabulation_sheet', NULL, 19, NULL, 0, 1, 0, 0, 0, 0, 0, 0, 40, 0, 'tabulation-sheet'),
(24, 'accounting', NULL, 0, 'dripicons-suitcase', 1, 1, 1, 0, 1, 1, 1, 0, 40, 0, 'accounting'),
(25, 'school_fees_manager', 'school_fees', 24, NULL, 1, 1, 1, 0, 1, 1, 1, 0, 10, 0, 'school-fees-manager'),
(26, 'student_fee_report', NULL, 24, NULL, 0, 1, 0, 0, 0, 0, 1, 0, 20, 0, 'student-fee-report'),
(27, 'expense_manager', 'expense', 24, NULL, 1, 1, 1, 0, 0, 0, 1, 0, 40, 0, 'expense-manager'),
(28, 'back_office', NULL, 0, 'dripicons-archive', 1, 1, 1, 1, 1, 1, 0, 1, 50, 0, 'back-office'),
(29, 'library', NULL, 28, NULL, 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, 'library'),
(30, 'transport', NULL, 28, NULL, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 'transport'),
(31, 'hostel', NULL, 28, NULL, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 'hostel'),
(32, 'school_website', NULL, 28, NULL, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 'school-website'),
(33, 'settings', NULL, 0, 'dripicons-cutlery', 1, 1, 1, 0, 0, 0, 0, 0, 60, 0, 'settings'),
(34, 'system', 'system_settings', 33, NULL, 1, 1, 0, 0, 0, 0, 0, 0, 10, 0, 'system-settings'),
(36, 'payment', 'payment_settings', 33, NULL, 1, 1, 0, 0, 0, 0, 0, 0, 20, 0, 'payment-settings'),
(37, 'language_settings', 'language', 33, NULL, 1, 1, 0, 0, 0, 0, 0, 0, 30, 0, 'language-settings'),
(38, 'session_manager', 'session_manager', 28, NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 'session-manager'),
(39, 'department', 'department', 9, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 70, 0, 'department'),
(40, 'admission', 'student/create', 1, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 20, 0, 'admission'),
(41, 'addon_manager', 'addon_manager', 28, NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 'addon-manager'),
(42, 'assignment', NULL, 9, NULL, 0, 1, 0, 0, 0, 0, 0, 0, 90, 0, 'assignment'),
(43, 'event_calender', 'event_calendar', 9, NULL, 1, 1, 1, 1, 1, 1, 0, 0, 100, 0, 'event-calender'),
(44, 'online_exam', NULL, 20, NULL, 0, 1, 0, 0, 0, 0, 0, 0, 50, 0, 'online-exam'),
(45, 'certificate', NULL, 20, NULL, 0, 1, 0, 0, 0, 0, 0, 0, 60, 0, 'certificate'),
(46, 'lecturer_permission', 'permission', 1, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 40, 0, 'teacher-permission'),
(47, 'messaging', NULL, 1, NULL, 0, 1, 0, 0, 0, 0, 0, 0, 110, 0, 'messaging'),
(48, 'role_permission', 'role.index', 1, NULL, 0, 1, 0, 0, 0, 0, 0, 0, 100, 0, 'role-permission'),
(49, 'form_builder', NULL, 32, NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 'form-builder'),
(50, 'book_list_manager', 'book', 29, NULL, 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, 'book-list-manager'),
(51, 'book_issue_report', 'book_issue', 29, NULL, 1, 1, 1, 0, 0, 1, 0, 1, 0, 0, 'book-issue-report'),
(52, 'room_manager', NULL, 31, NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 'room-manager'),
(53, 'student_report', NULL, 31, NULL, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 'student-report'),
(55, 'expense_category', 'expense_category', 24, NULL, 1, 1, 1, 0, 0, 0, 1, 0, 30, 0, 'expense-category'),
(56, 'SMTP_settings', 'smtp_settings', 33, NULL, 1, 1, 0, 0, 0, 0, 0, 0, 50, 0, 'smtp-settings'),
(57, 'school_settings', 'school_settings', 33, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 12, 0, 'school-settings'),
(58, 'about', 'about', 33, NULL, 1, 1, 0, 0, 0, 0, 0, 0, 51, 0, 'about'),
(59, 'website_settings', 'website_settings', 33, NULL, 1, 1, 0, 0, 0, 0, 0, 0, 11, 0, 'website-settings'),
(60, 'noticeboard', 'noticeboard', 28, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 'noticeboard'),
(61, 'courses', 'course', 9, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 28, 0, 'courses'),
(62, 'variables', 'academic_settings', 33, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 10, 0, 'academic-settings'),
(63, 'academic_years', 'academic_years', 62, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 1, 0, 'academic-years'),
(64, 'programs', 'program', 62, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 2, 0, 'programs'),
(65, 'fees_currencies', 'fees_currencies', 62, NULL, '1', '1', '1', '0', '0', '0', '0', '0', '3', '0', 'fees-currencies'),
(66, 'relationships', 'relationship', 62, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 3, 0, 'relationships');

-- --------------------------------------------------------

--
-- Table structure for table `noticeboard`
--

CREATE TABLE `noticeboard` (
  `id` int NOT NULL,
  `notice_title` longtext ,
  `notice` longtext ,
  `date` varchar(255)  DEFAULT NULL,
  `status` int DEFAULT '1',
  `show_on_website` int DEFAULT '0',
  `image` text ,
  `school_id` int NOT NULL,
  `session` int NOT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `payment_settings`
--

CREATE TABLE `payment_settings` (
  `id` int NOT NULL,
  `key` varchar(500)  DEFAULT NULL,
  `value` longtext 
) ;

--
-- Dumping data for table `payment_settings`
--

INSERT INTO `payment_settings` (`id`, `key`, `value`) VALUES
(12, 'stripe_settings', '[{\"stripe_active\":\"yes\",\"stripe_mode\":\"on\",\"stripe_test_secret_key\":\"1234\",\"stripe_test_public_key\":\"1234\",\"stripe_live_secret_key\":\"1234\",\"stripe_live_public_key\":\"1234\",\"stripe_currency\":\"USD\"}]'),
(17, 'paypal_settings', '[{\"paypal_active\":\"yes\",\"paypal_mode\":\"sandbox\",\"paypal_client_id_sandbox\":\"1234\",\"paypal_client_id_production\":\"1234\",\"paypal_currency\":\"USD\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int NOT NULL,
  `description` varchar(255) NOT NULL,
  `department_id` int UNSIGNED NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ;


-- --------------------------------------------------------

--
-- Table structure for table `relationships`
--

CREATE TABLE `relationships` (
  `id` tinyint UNSIGNED NOT NULL,
  `description` varchar(30) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `relationships`
--

INSERT INTO `relationships` (`id`, `description`) VALUES
(1, 'Father'),
(2, 'Mother'),
(3, 'Brother'),
(5, 'Uncle'),
(6, 'Sister'),
(7, 'Nephew'),
(8, 'Niece'),
(9, 'Grand Mother'),
(10, 'Grand Father'),
(11, 'Aunt');

-- --------------------------------------------------------

--
-- Table structure for table `routines`
--

CREATE TABLE `routines` (
  `id` int NOT NULL,
  `class_id` varchar(255)  DEFAULT NULL,
  `section_id` varchar(255)  DEFAULT NULL,
  `subject_id` varchar(255)  DEFAULT NULL,
  `starting_hour` varchar(255)  DEFAULT NULL,
  `ending_hour` varchar(255)  DEFAULT NULL,
  `starting_minute` varchar(255)  DEFAULT NULL,
  `ending_minute` varchar(255)  DEFAULT NULL,
  `day` varchar(255)  DEFAULT '',
  `teacher_id` int DEFAULT NULL,
  `room_id` int DEFAULT NULL,
  `school_id` int DEFAULT NULL,
  `session_id` varchar(255)  DEFAULT ''
) ;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255)  DEFAULT NULL,
  `number_of_semesters` tinyint UNSIGNED NOT NULL DEFAULT '2',
  `address` longtext ,
  `phone` longtext 
) ;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `number_of_semesters`, `address`, `phone`) VALUES
(1, 'EUCHS', 2, 'Spintex Road', '+2333021524454');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255)  DEFAULT NULL,
  `class_id` int DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255)  DEFAULT NULL,
  `status` int DEFAULT '0'
) ;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `name`, `status`) VALUES
(1, '2015', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int UNSIGNED NOT NULL,
  `school_id` int DEFAULT NULL,
  `system_name` varchar(255) DEFAULT NULL,
  `system_title` varchar(255) DEFAULT NULL,
  `system_email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` longtext,
  `purchase_code` varchar(255) DEFAULT NULL,
  `system_currency` varchar(255) DEFAULT NULL,
  `currency_position` varchar(255) DEFAULT NULL,
  `running_session` varchar(255) DEFAULT '',
  `language` varchar(255) DEFAULT NULL,
  `student_email_verification` varchar(255) DEFAULT NULL,
  `footer_text` varchar(255) DEFAULT NULL,
  `footer_link` varchar(255) DEFAULT NULL,
  `version` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `date_of_last_updated_attendance` varchar(255) DEFAULT NULL,
  `timezone` varchar(255) DEFAULT NULL,
  `youtube_api_key` varchar(255) DEFAULT NULL,
  `vimeo_api_key` varchar(255) DEFAULT NULL,
  `nationalities` TEXT NOT NULL
) ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `school_id`, `system_name`, `system_title`, `system_email`, `phone`, `address`, `purchase_code`, `system_currency`, `currency_position`, `running_session`, `language`, `student_email_verification`, `footer_text`, `footer_link`, `version`, `fax`, `date_of_last_updated_attendance`, `timezone`, `youtube_api_key`, `vimeo_api_key`) VALUES
(1, 1, 'Student Portal', 'ZenCollege', 'info@zentechgh.com', '+233550080890', 'North Kaneshie', '1234', 'GHC', 'left', '1', 'english', NULL, 'By Zentech IT Solutions', 'http://zentechgh.com/', '7.1', '1234567890', '1577017315', 'Africa/Accra', NULL, NULL);

UPDATE `settings` SET `nationalities` = '[{\"afghan\":\"Afghan\"},{\"albanian\":\"Albanian\"},{\"algerian\":\"Algerian\"},{\"american\":\"American\"},{\"andorran\":\"Andorran\"},{\"angolan\":\"Angolan\"},{\"antiguans\":\"Antiguans\"},{\"argentinean\":\"Argentinean\"},{\"armenian\":\"Armenian\"},{\"australian\":\"Australian\"},{\"austrian\":\"Austrian\"},{\"azerbaijani\":\"Azerbaijani\"},{\"bahamian\":\"Bahamian\"},{\"bahraini\":\"Bahraini\"},{\"bangladeshi\":\"Bangladeshi\"},{\"barbadian\":\"Barbadian\"},{\"barbudans\":\"Barbudans\"},{\"batswana\":\"Batswana\"},{\"belarusian\":\"Belarusian\"},{\"belgian\":\"Belgian\"},{\"belizean\":\"Belizean\"},{\"beninese\":\"Beninese\"},{\"bhutanese\":\"Bhutanese\"},{\"bolivian\":\"Bolivian\"},{\"bosnian\":\"Bosnian\"},{\"brazilian\":\"Brazilian\"},{\"british\":\"British\"},{\"bruneian\":\"Bruneian\"},{\"bulgarian\":\"Bulgarian\"},{\"burkinabe\":\"Burkinabe\"},{\"burmese\":\"Burmese\"},{\"burundian\":\"Burundian\"},{\"cambodian\":\"Cambodian\"},{\"cameroonian\":\"Cameroonian\"},{\"canadian\":\"Canadian\"},{\"cape verdean\":\"Cape Verdean\"},{\"central african\":\"Central African\"},{\"chadian\":\"Chadian\"},{\"chilean\":\"Chilean\"},{\"chinese\":\"Chinese\"},{\"colombian\":\"Colombian\"},{\"comoran\":\"Comoran\"},{\"congolese\":\"Congolese\"},{\"costa rican\":\"Costa Rican\"},{\"croatian\":\"Croatian\"},{\"cuban\":\"Cuban\"},{\"cypriot\":\"Cypriot\"},{\"czech\":\"Czech\"},{\"danish\":\"Danish\"},{\"djibouti\":\"Djibouti\"},{\"dominican\":\"Dominican\"},{\"dutch\":\"Dutch\"},{\"east timorese\":\"East Timorese\"},{\"ecuadorean\":\"Ecuadorean\"},{\"egyptian\":\"Egyptian\"},{\"emirian\":\"Emirian\"},{\"equatorial guinean\":\"Equatorial Guinean\"},{\"eritrean\":\"Eritrean\"},{\"estonian\":\"Estonian\"},{\"ethiopian\":\"Ethiopian\"},{\"fijian\":\"Fijian\"},{\"filipino\":\"Filipino\"},{\"finnish\":\"Finnish\"},{\"french\":\"French\"},{\"gabonese\":\"Gabonese\"},{\"gambian\":\"Gambian\"},{\"georgian\":\"Georgian\"},{\"german\":\"German\"},{\"ghanaian\":\"Ghanaian\"},{\"greek\":\"Greek\"},{\"grenadian\":\"Grenadian\"},{\"guatemalan\":\"Guatemalan\"},{\"guinea-bissauan\":\"Guinea-Bissauan\"},{\"guinean\":\"Guinean\"},{\"guyanese\":\"Guyanese\"},{\"haitian\":\"Haitian\"},{\"herzegovinian\":\"Herzegovinian\"},{\"honduran\":\"Honduran\"},{\"hungarian\":\"Hungarian\"},{\"icelander\":\"Icelander\"},{\"indian\":\"Indian\"},{\"indonesian\":\"Indonesian\"},{\"iranian\":\"Iranian\"},{\"iraqi\":\"Iraqi\"},{\"irish\":\"Irish\"},{\"israeli\":\"Israeli\"},{\"italian\":\"Italian\"},{\"ivorian\":\"Ivorian\"},{\"jamaican\":\"Jamaican\"},{\"japanese\":\"Japanese\"},{\"jordanian\":\"Jordanian\"},{\"kazakhstani\":\"Kazakhstani\"},{\"kenyan\":\"Kenyan\"},{\"kittian and nevisian\":\"Kittian and Nevisian\"},{\"kuwaiti\":\"Kuwaiti\"},{\"kyrgyz\":\"Kyrgyz\"},{\"laotian\":\"Laotian\"},{\"latvian\":\"Latvian\"},{\"lebanese\":\"Lebanese\"},{\"liberian\":\"Liberian\"},{\"libyan\":\"Libyan\"},{\"liechtensteiner\":\"Liechtensteiner\"},{\"lithuanian\":\"Lithuanian\"},{\"luxembourger\":\"Luxembourger\"},{\"macedonian\":\"Macedonian\"},{\"malagasy\":\"Malagasy\"},{\"malawian\":\"Malawian\"},{\"malaysian\":\"Malaysian\"},{\"maldivan\":\"Maldivan\"},{\"malian\":\"Malian\"},{\"maltese\":\"Maltese\"},{\"marshallese\":\"Marshallese\"},{\"mauritanian\":\"Mauritanian\"},{\"mauritian\":\"Mauritian\"},{\"mexican\":\"Mexican\"},{\"micronesian\":\"Micronesian\"},{\"moldovan\":\"Moldovan\"},{\"monacan\":\"Monacan\"},{\"mongolian\":\"Mongolian\"},{\"moroccan\":\"Moroccan\"},{\"mosotho\":\"Mosotho\"},{\"motswana\":\"Motswana\"},{\"mozambican\":\"Mozambican\"},{\"namibian\":\"Namibian\"},{\"nauruan\":\"Nauruan\"},{\"nepalese\":\"Nepalese\"},{\"new zealander\":\"New Zealander\"},{\"ni-vanuatu\":\"Ni-Vanuatu\"},{\"nicaraguan\":\"Nicaraguan\"},{\"nigerien\":\"Nigerien\"},{\"nigerian\":\"Nigerian\"},{\"north korean\":\"North Korean\"},{\"northern irish\":\"Northern Irish\"},{\"norwegian\":\"Norwegian\"},{\"omani\":\"Omani\"},{\"pakistani\":\"Pakistani\"},{\"palauan\":\"Palauan\"},{\"panamanian\":\"Panamanian\"},{\"papua new guinean\":\"Papua New Guinean\"},{\"paraguayan\":\"Paraguayan\"},{\"peruvian\":\"Peruvian\"},{\"polish\":\"Polish\"},{\"portuguese\":\"Portuguese\"},{\"qatari\":\"Qatari\"},{\"romanian\":\"Romanian\"},{\"russian\":\"Russian\"},{\"rwandan\":\"Rwandan\"},{\"saint lucian\":\"Saint Lucian\"},{\"salvadoran\":\"Salvadoran\"},{\"samoan\":\"Samoan\"},{\"san marinese\":\"San Marinese\"},{\"sao tomean\":\"Sao Tomean\"},{\"saudi\":\"Saudi\"},{\"scottish\":\"Scottish\"},{\"senegalese\":\"Senegalese\"},{\"serbian\":\"Serbian\"},{\"seychellois\":\"Seychellois\"},{\"sierra leonean\":\"Sierra Leonean\"},{\"singaporean\":\"Singaporean\"},{\"slovakian\":\"Slovakian\"},{\"slovenian\":\"Slovenian\"},{\"solomon islander\":\"Solomon Islander\"},{\"somali\":\"Somali\"},{\"south african\":\"South African\"},{\"south korean\":\"South Korean\"},{\"spanish\":\"Spanish\"},{\"sri lankan\":\"Sri Lankan\"},{\"sudanese\":\"Sudanese\"},{\"surinamer\":\"Surinamer\"},{\"swazi\":\"Swazi\"},{\"swedish\":\"Swedish\"},{\"swiss\":\"Swiss\"},{\"syrian\":\"Syrian\"},{\"taiwanese\":\"Taiwanese\"},{\"tajik\":\"Tajik\"},{\"tanzanian\":\"Tanzanian\"},{\"thai\":\"Thai\"},{\"togolese\":\"Togolese\"},{\"tongan\":\"Tongan\"},{\"trinidadian or tobagonian\":\"Trinidadian or Tobagonian\"},{\"tunisian\":\"Tunisian\"},{\"turkish\":\"Turkish\"},{\"tuvaluan\":\"Tuvaluan\"},{\"ugandan\":\"Ugandan\"},{\"ukrainian\":\"Ukrainian\"},{\"uruguayan\":\"Uruguayan\"},{\"uzbekistani\":\"Uzbekistani\"},{\"venezuelan\":\"Venezuelan\"},{\"vietnamese\":\"Vietnamese\"},{\"welsh\":\"Welsh\"},{\"yemenite\":\"Yemenite\"},{\"zambian\":\"Zambian\"},{\"zimbabwean\":\"Zimbabwean\"}]' WHERE `settings`.`id` = 1;
-- --------------------------------------------------------

--
-- Table structure for table `smtp_settings`
--

CREATE TABLE `smtp_settings` (
  `id` int NOT NULL,
  `mail_sender` varchar(255)  DEFAULT NULL,
  `smtp_protocol` varchar(255)  DEFAULT NULL,
  `smtp_host` varchar(255)  DEFAULT NULL,
  `smtp_username` varchar(255)  DEFAULT NULL,
  `smtp_password` varchar(255)  DEFAULT NULL,
  `smtp_port` varchar(255)  DEFAULT NULL,
  `smtp_secure` varchar(255)  DEFAULT NULL,
  `smtp_set_from` varchar(255)  DEFAULT NULL,
  `smtp_debug` varchar(255)  DEFAULT NULL,
  `smtp_show_error` varchar(255)  DEFAULT NULL
) ;

INSERT INTO `smtp_settings` (`id`, `mail_sender`, `smtp_protocol`, `smtp_host`, `smtp_username`, `smtp_password`, `smtp_port`, `smtp_secure`, `smtp_set_from`, `smtp_debug`, `smtp_show_error`) VALUES
(1, 'php_mailer', 'SMTP', 'smtp-relay.sendinblue.com', 'lawal@zentechgh.com', 'vsUhBEqy9jY5LDpO', '587', 'tls', 'lawal@zentechgh.com', NULL, 'yes');
-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `code` varchar(255)  DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `first_name` varchar(100)  NOT NULL,
  `last_name` varchar(100)  NOT NULL,
  `middle_name` varchar(100)  NOT NULL,
  `student_type` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `year_group` varchar(10)  NOT NULL,
  `marital_status` varchar(30)  NOT NULL,
  `no_of_children` tinyint UNSIGNED NOT NULL,
  `place_of_birth` varchar(500)  NOT NULL,
  `nationality` varchar(100)  NOT NULL,
  `emergency_contact1` text  NOT NULL,
  `emergency_contact2` text  NOT NULL,
  `first_language` varchar(100)  NOT NULL,
  `occupation` varchar(255)  NOT NULL,
  `disability` varchar(255)  NOT NULL,
  `program_id` int UNSIGNED NOT NULL,
  `certificates` text  NOT NULL,
  `school_id` int DEFAULT NULL,
  `created_by` int UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255)  DEFAULT NULL,
  `class_id` int DEFAULT NULL,
  `school_id` int DEFAULT NULL,
  `session` int DEFAULT NULL
) ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `class_id`, `school_id`, `session`) VALUES
(1, 'Intro 101', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `syllabuses`
--

CREATE TABLE `syllabuses` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `class_id` int DEFAULT NULL,
  `section_id` int DEFAULT NULL,
  `subject_id` int DEFAULT NULL,
  `file` varchar(255)  DEFAULT NULL,
  `session_id` int DEFAULT NULL,
  `school_id` int DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255)  NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255)  NOT NULL,
  `role` varchar(255)  DEFAULT NULL,
  `address` longtext ,
  `phone` varchar(255)  DEFAULT NULL,
  `remember_token` varchar(255)  DEFAULT NULL,
  `gender` varchar(255)  DEFAULT NULL,
  `school_id` int DEFAULT NULL,
  `authentication_key` varchar(255)  DEFAULT NULL,
  `watch_history` longtext 
) ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `address`, `phone`, `remember_token`, `gender`, `school_id`, `authentication_key`, `watch_history`) VALUES
(1, 'Lawal', 'admin@zentechgh.com', '$2y$10$S1hb.vE5g3EhS.NqrQfR.uSEAz1XKOIddLbr70TDKpBFw/sxNorWe', 'superadmin', NULL, NULL, NULL, NULL, 1, NULL, '[]');

-- --------------------------------------------------------

--
-- Table structure for table `year_levels`
--

CREATE TABLE `year_levels` (
  `id` smallint UNSIGNED NOT NULL,
  `name` varchar(10) NOT NULL,
  `description` varchar(30) NOT NULL
) ;

--
-- Dumping data for table `year_levels`
--

INSERT INTO `year_levels` (`id`, `name`, `description`) VALUES
(1, '100', 'Level 100'),
(2, '200', 'Level 200'),
(3, '300', 'Level 300'),
(4, '400', 'Level 400');

-- --------------------------------------------------------

--
-- Structure for view `courses_view`
--
DROP TABLE IF EXISTS `courses_view`;

CREATE VIEW `courses_view`  AS  
select `courses`.`id` AS `id`,`courses`.`department_id` AS `department_id`,`courses`.`school_id` AS `school_id`,`courses`.`code` 
AS `code`,`courses`.`title` AS `title`,`courses`.`level_id` AS `level_id`,`courses`.`semester` AS `semester`,`departments`.`name` 
AS `department`,`year_levels`.`name` AS `level` from ((`courses` join `year_levels` on((`courses`.`level_id` = `year_levels`.`id`))) 
join `departments` on((`courses`.`department_id` = `departments`.`id`))) ;

COMMIT;
