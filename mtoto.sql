-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2017 at 01:44 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mtoto`
--

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL,
  `dob` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `length` double NOT NULL,
  `weight` double NOT NULL,
  `mother_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`id`, `firstName`, `lastName`, `gender`, `dob`, `length`, `weight`, `mother_id`, `created_at`, `updated_at`) VALUES
(8, 'Gotham', 'mutinda', 1, '2017-08-23', 25, 2.5, 16, '2017-08-23 14:53:00', '2017-08-23 14:53:00'),
(9, 'betty', 'joy', 1, '2017-08-09', 20, 3, 17, '2017-08-23 14:58:21', '2017-08-23 14:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `child_developments`
--

CREATE TABLE `child_developments` (
  `id` int(10) UNSIGNED NOT NULL,
  `development_id` int(10) UNSIGNED NOT NULL,
  `child_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `child_immunizations`
--

CREATE TABLE `child_immunizations` (
  `id` int(10) UNSIGNED NOT NULL,
  `immunization_id` int(10) UNSIGNED NOT NULL,
  `child_id` int(10) UNSIGNED NOT NULL,
  `given_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `next_visit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `child_immunizations`
--

INSERT INTO `child_immunizations` (`id`, `immunization_id`, `child_id`, `given_at`, `next_visit`, `created_at`, `updated_at`) VALUES
(13, 1, 8, '2017-08-23', '09/20/2017', '2017-08-23 14:55:19', '2017-08-23 14:55:19'),
(14, 2, 8, '2017-08-23', '09/20/2017', '2017-08-23 14:55:30', '2017-08-23 14:55:30'),
(15, 2, 9, '2017-08-23', '09/20/2017', '2017-08-23 15:45:46', '2017-08-23 15:45:46'),
(16, 1, 9, '2017-08-24', '09/21/2017', '2017-08-24 05:24:11', '2017-08-24 05:24:11');

-- --------------------------------------------------------

--
-- Table structure for table `developments`
--

CREATE TABLE `developments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fathers`
--

CREATE TABLE `fathers` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` int(10) UNSIGNED NOT NULL,
  `mother_id` int(10) UNSIGNED NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`id`, `mother_id`, `message`, `date`, `created_at`, `updated_at`) VALUES
(13, 16, 'Hello mothers', '2017-08-23', '2017-08-23 15:02:55', '2017-08-23 15:02:55'),
(14, 16, 'interested in child training feeding forum??\ncall 0723567', '2017-08-23', '2017-08-23 15:03:33', '2017-08-23 15:03:33'),
(15, 17, 'Hello, joshua how can I get to you?', '2017-08-25', '2017-08-25 00:08:23', '2017-08-25 00:08:23'),
(16, 17, 'Afternoon', '2017-09-13', '2017-09-13 10:16:08', '2017-09-13 10:16:08');

-- --------------------------------------------------------

--
-- Table structure for table `guardians`
--

CREATE TABLE `guardians` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `heights`
--

CREATE TABLE `heights` (
  `id` int(10) UNSIGNED NOT NULL,
  `height` double NOT NULL,
  `child_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `heights`
--

INSERT INTO `heights` (`id`, `height`, `child_id`, `created_at`, `updated_at`) VALUES
(10, 50, 8, '2017-08-23 14:55:41', '2017-08-23 14:55:41'),
(11, 52, 8, '2017-08-23 14:55:48', '2017-08-23 14:55:48'),
(12, 55, 8, '2017-08-23 14:55:53', '2017-08-23 14:55:53'),
(13, 60, 8, '2017-08-23 14:55:57', '2017-08-23 14:55:57'),
(14, 65, 8, '2017-08-23 14:56:01', '2017-08-23 14:56:01'),
(15, 68, 8, '2017-08-23 14:56:08', '2017-08-23 14:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `immunizations`
--

CREATE TABLE `immunizations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `immunizations`
--

INSERT INTO `immunizations` (`id`, `name`, `age`, `created_at`, `updated_at`) VALUES
(1, 'BCG VACCINE ', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'OPV 0', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'OPV 1', 6, '2017-05-18 03:19:29', '2017-05-18 03:19:29'),
(4, 'TETANUS 1ST DOSE', 6, '2017-05-18 03:19:29', '2017-05-18 03:19:29'),
(5, 'PNEUMOCOCCAL VACCINE 1ST DOSE', 6, '2017-05-18 03:19:29', '2017-05-18 03:19:29'),
(6, 'ROTARIX 1ST DOSE', 6, '2017-05-18 03:19:29', '2017-05-18 03:19:29'),
(7, 'OPV 2', 10, '2017-05-18 03:19:29', '2017-05-18 03:19:29'),
(8, 'TETANUS 2ND DOSE', 10, '2017-05-18 03:19:29', '2017-05-18 03:19:29'),
(9, 'PNEUMOCOCCAL 2ND DOSE', 10, '2017-05-18 03:19:29', '2017-05-18 03:19:29'),
(10, 'ROTARIX 2ND DOSE', 10, '2017-05-18 03:19:29', '2017-05-18 03:19:29'),
(11, 'OPV 3', 14, '2017-05-18 03:19:29', '2017-05-18 03:19:29'),
(12, 'TETANUS 3RD DOSE', 14, '2017-05-18 03:19:29', '2017-05-18 03:19:29'),
(13, 'PNEUMOCOCCAL 3RD DOSE', 14, '2017-05-18 03:19:29', '2017-05-18 03:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_04_29_093624_create_fathers_table', 1),
(4, '2017_04_29_093659_create_mothers_table', 1),
(5, '2017_04_29_093722_create_guardians_table', 1),
(6, '2017_05_06_035226_create_children_table', 1),
(7, '2017_05_06_050527_create_developments_table', 1),
(8, '2017_05_06_051024_create_child_developments_table', 1),
(9, '2017_05_06_051942_create_weights_table', 1),
(10, '2017_05_06_051953_create_heights_table', 1),
(11, '2017_05_06_053351_create_immunizations_table', 1),
(12, '2017_05_06_053511_create_child_immunizations_table', 1),
(13, '2017_05_06_054105_create_other_immunizations_table', 1),
(14, '2017_05_25_013024_create_people_table', 2),
(15, '2017_07_25_174541_create_forums_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mothers`
--

CREATE TABLE `mothers` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_No` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `county` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `division` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `town` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `village` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `person_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mothers`
--

INSERT INTO `mothers` (`id`, `firstName`, `lastName`, `phone_No`, `county`, `district`, `division`, `location`, `town`, `village`, `person_id`, `created_at`, `updated_at`) VALUES
(16, 'Joshua', 'Kisee', '0705118708', 'Kirinyaga', 'makueni', 'kibwezi', 'makindu', 'makindu', 'mbooni', '5', '2017-08-23 14:50:44', '2017-08-23 14:50:44'),
(17, 'stella', 'karis', '0715756016', 'Muranga', 'kiri', 'math', 'kiru', 'kiri', 'kair', '6', '2017-08-23 14:57:04', '2017-08-23 14:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `other_immunizations`
--

CREATE TABLE `other_immunizations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `given_at` date NOT NULL,
  `child_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `phone`, `firstName`, `lastName`, `role`, `status`, `password`, `created_at`, `updated_at`) VALUES
(4, '0726222593', 'Wambugu', 'Nurse', 2, 0, '$2y$10$DWPE5bXyNzFizcQsX/KFZerWFcl2uAXk0./lGdSatfr3kbx7lbyNS', '2017-08-23 04:13:13', '2017-08-23 04:15:15'),
(5, '0705118708', 'Joshua', 'Kisee', 1, 0, '$2y$10$q6owZuFYeECnxLyLTavW7OII3MYJu26RutD.ozd9DSsKnunI.l.G.', '2017-08-23 14:50:44', '2017-08-23 14:50:44'),
(6, '0715756016', 'stella', 'karis', 1, 0, '$2y$10$Qm5glDPSsAi7teMBmSzIuuPeS/xyGmgtykYRggilU2T2E.Jp.hLzO', '2017-08-23 14:57:04', '2017-08-23 14:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Patrick Kaburu', 'patrickaburu1@gmail.com', '2', '$2y$10$YmLE29GO3JAJRMD8v3eGk.lq7p1WusDs1G0VvU/gXqg6UnyC6enha', NULL, '2017-05-10 05:03:04', '2017-05-10 05:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `weights`
--

CREATE TABLE `weights` (
  `id` int(10) UNSIGNED NOT NULL,
  `weight` double NOT NULL,
  `child_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `weights`
--

INSERT INTO `weights` (`id`, `weight`, `child_id`, `created_at`, `updated_at`) VALUES
(33, 4.5, 8, '2017-08-23 14:54:53', '2017-08-23 14:54:53'),
(34, 5, 8, '2017-08-23 14:54:57', '2017-08-23 14:54:57'),
(35, 5.5, 8, '2017-08-23 14:55:02', '2017-08-23 14:55:02'),
(36, 6.5, 8, '2017-08-23 15:45:04', '2017-08-23 15:45:04'),
(37, 4.5, 9, '2017-08-24 05:22:35', '2017-08-24 05:22:35'),
(38, 5, 9, '2017-08-24 05:22:40', '2017-08-24 05:22:40'),
(39, 6, 9, '2017-08-24 05:22:49', '2017-08-24 05:22:49'),
(40, 6, 9, '2017-08-24 05:23:14', '2017-08-24 05:23:14'),
(41, 7, 9, '2017-08-24 05:26:21', '2017-08-24 05:26:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`),
  ADD KEY `children_mother_id_foreign` (`mother_id`);

--
-- Indexes for table `child_developments`
--
ALTER TABLE `child_developments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `child_developments_development_id_foreign` (`development_id`),
  ADD KEY `child_developments_child_id_foreign` (`child_id`);

--
-- Indexes for table `child_immunizations`
--
ALTER TABLE `child_immunizations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `child_immunizations_child_id_foreign` (`child_id`),
  ADD KEY `child_immunizations_immunization_id_foreign` (`immunization_id`);

--
-- Indexes for table `developments`
--
ALTER TABLE `developments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fathers`
--
ALTER TABLE `fathers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forums_mother_id_foreign` (`mother_id`);

--
-- Indexes for table `guardians`
--
ALTER TABLE `guardians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `heights`
--
ALTER TABLE `heights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `heights_child_id_foreign` (`child_id`);

--
-- Indexes for table `immunizations`
--
ALTER TABLE `immunizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mothers`
--
ALTER TABLE `mothers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_immunizations`
--
ALTER TABLE `other_immunizations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `other_immunizations_child_id_foreign` (`child_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `people_phone_unique` (`phone`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `weights`
--
ALTER TABLE `weights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `weights_child_id_foreign` (`child_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `child_developments`
--
ALTER TABLE `child_developments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `child_immunizations`
--
ALTER TABLE `child_immunizations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `developments`
--
ALTER TABLE `developments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fathers`
--
ALTER TABLE `fathers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `guardians`
--
ALTER TABLE `guardians`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `heights`
--
ALTER TABLE `heights`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `immunizations`
--
ALTER TABLE `immunizations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `mothers`
--
ALTER TABLE `mothers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `other_immunizations`
--
ALTER TABLE `other_immunizations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `weights`
--
ALTER TABLE `weights`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `children`
--
ALTER TABLE `children`
  ADD CONSTRAINT `children_mother_id_foreign` FOREIGN KEY (`mother_id`) REFERENCES `mothers` (`id`);

--
-- Constraints for table `child_developments`
--
ALTER TABLE `child_developments`
  ADD CONSTRAINT `child_developments_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `children` (`id`),
  ADD CONSTRAINT `child_developments_development_id_foreign` FOREIGN KEY (`development_id`) REFERENCES `developments` (`id`);

--
-- Constraints for table `child_immunizations`
--
ALTER TABLE `child_immunizations`
  ADD CONSTRAINT `child_immunizations_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `children` (`id`),
  ADD CONSTRAINT `child_immunizations_immunization_id_foreign` FOREIGN KEY (`immunization_id`) REFERENCES `immunizations` (`id`);

--
-- Constraints for table `forums`
--
ALTER TABLE `forums`
  ADD CONSTRAINT `forums_mother_id_foreign` FOREIGN KEY (`mother_id`) REFERENCES `mothers` (`id`);

--
-- Constraints for table `heights`
--
ALTER TABLE `heights`
  ADD CONSTRAINT `heights_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `children` (`id`);

--
-- Constraints for table `other_immunizations`
--
ALTER TABLE `other_immunizations`
  ADD CONSTRAINT `other_immunizations_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `children` (`id`);

--
-- Constraints for table `weights`
--
ALTER TABLE `weights`
  ADD CONSTRAINT `weights_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `children` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
