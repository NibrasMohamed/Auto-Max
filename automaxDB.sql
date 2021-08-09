/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `file_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `folder_id` int(11) NOT NULL DEFAULT 0,
  `category` varchar(150) NOT NULL,
  `file_path` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=153 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `file_master` DISABLE KEYS */;
INSERT INTO `file_master` (`id`, `folder_id`, `category`, `file_path`) VALUES
	(137, 3, 'project-activuty', '/public/project_acticivity_images/3/nishran60f33d68a3e2c.png'),
	(138, 3, 'project-activuty', '/public/project_acticivity_images/3/nishran60f33d68a8e96.jpg'),
	(139, 3, 'project-activuty', '/public/project_acticivity_images/3/nishran60f33d68aa604.jpg'),
	(140, 4, 'project-activuty', '/public/project_acticivity_images/4/nishran60f34273ea6f4.jpg'),
	(141, 4, 'project-activuty', '/public/project_acticivity_images/4/nishran60f34273ed056.jpg'),
	(142, 4, 'project-activuty', '/public/project_acticivity_images/4/nishran60f34273efb05.png'),
	(143, 5, 'project-activuty', '/public/project_acticivity_images/5/nishran60f342a3c0b58.jpg'),
	(144, 5, 'project-activuty', '/public/project_acticivity_images/5/nishran60f342a3c3f88.jpg'),
	(145, 6, 'project-activuty', '/public/project_acticivity_images/6/nishran60f3507c93267.jpg'),
	(146, 7, 'project-activuty', '/public/project_acticivity_images/7/nishran60f3557f1b8e8.jpg'),
	(147, 8, 'project-activuty', '/public/project_acticivity_images/8/nishran60f356d40b731.jpg'),
	(148, 9, 'project-activuty', '/public/project_acticivity_images/9/nishran60f357c11dbd4.jpg'),
	(149, 10, 'project-activuty', '/public/project_acticivity_images/10/nishran60f3581e77787.jpg'),
	(150, 11, 'project-activuty', '/public/project_acticivity_images/11/nishran60f35ae896266.jpg'),
	(151, 12, 'project-activuty', '/public/project_acticivity_images/12/nishran60f366027e520.jpg'),
	(152, 13, 'project-activuty', '/public/project_acticivity_images/13/nishran60f36617d4222.jpg');
/*!40000 ALTER TABLE `file_master` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(8, '2021_06_26_055826_add_type_to_users', 2),
	(9, '2021_07_04_090846_add_phone-no_to_users', 2),
	(10, '2021_07_09_083302_create_projects_table', 2),
	(11, '2021_07_04_090846_add_phone_no_to_users', 3),
	(12, '2021_07_10_084039_add_user_id_to_projects', 3),
	(13, '2021_07_10_093027_alter_column_img1_in_projects', 4),
	(14, '2021_07_10_092038_alter_column_img1_projects_table', 5),
	(15, '2021_07_10_144339_add_profile_pic_to_users', 5),
	(16, '2021_07_15_121525_add_status_to_projects', 6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `vehicle_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `make` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_touch_up` tinyint(4) NOT NULL DEFAULT 0,
  `is_fullpaint` tinyint(4) NOT NULL DEFAULT 0,
  `is_cut_and_polish` tinyint(4) NOT NULL DEFAULT 0,
  `is_maintenance` tinyint(4) NOT NULL DEFAULT 0,
  `is_minor_accident` tinyint(4) NOT NULL DEFAULT 0,
  `is_major_accident` tinyint(4) NOT NULL DEFAULT 0,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('approval_pending','aproved','in_progress','completed') COLLATE utf8mb4_unicode_ci DEFAULT 'approval_pending',
  `progress` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` (`id`, `vehicle_type`, `make`, `model`, `is_touch_up`, `is_fullpaint`, `is_cut_and_polish`, `is_maintenance`, `is_minor_accident`, `is_major_accident`, `details`, `img`, `user_id`, `status`, `progress`, `created_at`, `updated_at`) VALUES
	(6, 'Car', 'Toyota', 'Aqua', 0, 0, 0, 0, 1, 0, 'Minor damages side doors.\r\nfront Bumper damaged.\r\nedited', '/public/project_images/Mohomed60e9c904944ff.jpg', 25, 'approval_pending', '0', '2021-07-10 16:21:24', '2021-07-17 06:15:54'),
	(7, 'Cab', 'Toyota', 'Land Cruiser', 0, 0, 0, 0, 0, 0, 'Some damages\r\nNeeded a good paint-job', '/public/project_images/Mohomed60e9d86cb6afa.jpg', 25, 'approval_pending', '0', '2021-07-10 17:27:08', '2021-07-10 17:27:08'),
	(8, 'Car', 'Toyota', 'supra', 0, 0, 0, 0, 0, 0, 'i want to change white color in to black', '/public/project_images/Mohomed60e9e04f1842a.jpg', 25, 'approval_pending', '0', '2021-07-10 18:00:47', '2021-07-10 18:00:47'),
	(10, 'Car', 'Mitsubichi', 'lancer', 0, 0, 0, 0, 0, 0, 'little damaged', '/public/project_images/mohamed niflan60e9e2b828285.jpg', 26, 'approval_pending', '0', '2021-07-10 18:11:04', '2021-07-10 18:11:04'),
	(11, 'Car', 'Nissan', 'gtr R-34', 0, 0, 0, 0, 0, 0, 'blue color', '/public/project_images/mohamed niflan60e9e3c58e626.jpg', 26, 'approval_pending', '0', '2021-07-10 18:15:33', '2021-07-10 18:15:33'),
	(12, 'Van', 'Suzuki', 'omini', 0, 0, 0, 0, 0, 0, 'fully accident', '/public/project_images/mohamed niflan60e9e3f47f623.jpg', 26, 'approval_pending', '0', '2021-07-10 18:16:20', '2021-07-10 18:16:20'),
	(13, 'Cab', 'Toyota', 'hilux', 0, 0, 0, 0, 0, 0, 'no more works', '/public/project_images/mohamed niflan60e9e4b6959ad.jpg', 26, 'approval_pending', '0', '2021-07-10 18:19:34', '2021-07-10 18:19:34'),
	(14, 'Cab', 'Mitsubichi', 'suv', 0, 0, 0, 0, 0, 0, 'interior wash', '/public/project_images/mohamed niflan60e9e58fa2e4d.jpg', 26, 'approval_pending', '0', '2021-07-10 18:23:11', '2021-07-10 18:23:11'),
	(15, 'Van', 'Toyota', 'lh-113', 0, 0, 0, 0, 0, 0, 'new paint(blue)', '/public/project_images/mohamed niflan60e9e5fe25490.jpg', 26, 'approval_pending', '0', '2021-07-10 18:25:02', '2021-07-10 18:25:02'),
	(16, 'Car', 'Toyota', 'yaaris', 0, 0, 0, 0, 0, 0, 'paint had been faded', '/public/project_images/mohamed niflan60e9e73d43daf.jpg', 26, 'approval_pending', '0', '2021-07-10 18:30:21', '2021-07-10 18:30:21'),
	(17, 'Bike', 'Suzuki', 'gixxer', 0, 0, 0, 0, 0, 0, 'little damaged.', '/public/project_images/mohamed niflan60e9e850b18f7.jpg', 26, 'aproved', '0', '2021-07-10 18:34:56', '2021-07-18 04:48:37'),
	(18, 'Truck', 'Toyota', 'hiluxd2', 0, 0, 0, 0, 0, 0, 'full restoration.', '/public/project_images/Nishran60e9e9eaaf8b3.jpg', 27, 'approval_pending', '0', '2021-07-10 18:41:46', '2021-07-10 18:41:46'),
	(23, 'Bike', 'Honda', 'VTR-250', 1, 1, 1, 0, 0, 1, 'Eleifend nostrum, autem arcu, earum rerum tempora, adipisci do vulputate nobis nisl minima orci similique.\r\n\r\nMontes lobortis nibh sollicitudin blanditiis, sociosqu! Curae! Voluptatum, magnam, pariatur voluptatibus fuga ut facilis felis.\r\n\r\nIncididunt pretium proident potenti dictum venenatis, mauris? Minima fugiat. Debitis, numquam fames, quae molestias? Platea.', '/public/project_images/Mohomed60e9e1024e461.jpg', 25, 'in_progress', '75', '2021-07-17 05:32:45', '2021-07-18 04:09:47'),
	(24, 'Bike', 'Honda', 'Hornet', 1, 1, 1, 0, 0, 0, 'Consequat lacinia consectetuer vehicula eum anim. Fugiat maiores quos. Gravida dis eleifend. Nec inceptos? Adipisci.\r\n\r\nA nihil mattis leo iste taciti? Euismod placeat elit, donec quis? Labore egestas augue error.\r\n\r\nVivamus tincidunt soluta habitant magnis diamlorem, at optio, sociosqu, ea porttitor occaecat, autem urna luctus.', '/public/project_images/Mohomed60f32a5987cda.jpg', 25, 'aproved', '0', '2021-07-17 18:43:59', '2021-07-17 19:07:05'),
	(25, 'Bike', 'Suzuki', 'SB Tracker', 1, 1, 1, 0, 0, 0, 'Do all, make it like brand new', '/public/project_images/Mohomed60f365b6717f9.jpg', 25, 'completed', '100', '2021-07-18 04:50:22', '2021-07-18 04:52:09');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `project_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `project_activity` DISABLE KEYS */;
INSERT INTO `project_activity` (`id`, `project_id`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
	(2, 23, '<p>Tinkering&nbsp;</p>', 30, '2021-07-18 03:49:52', '2021-07-17 20:27:43'),
	(6, 23, '<p>Added<b> mudguard and visor from india</b></p>', 30, '2021-07-18 03:49:51', '2021-07-17 21:49:48'),
	(7, 23, '<p>Today 18th we fixing crank week EFI</p>', 30, '2021-07-18 03:49:53', '2021-07-17 22:11:11'),
	(8, 23, '<p>Test crank weel</p>', 30, '2021-07-18 03:49:49', '2021-07-17 22:16:52'),
	(3, 23, '<p>Added Mudguard Vistoers&nbsp;</p>', 30, '2021-07-18 03:49:48', '2021-07-17 20:28:24'),
	(4, 23, '<p>Added Mudguard&nbsp;</p>', 30, '2021-07-17 20:49:55', '2021-07-17 20:49:55'),
	(5, 23, '<p>Added handler bars tinkering <b>easyed</b></p>', 30, '2021-07-16 20:50:43', '2027-07-16 20:45:20'),
	(9, 24, '<p>Added Visor</p>', 30, '2021-07-17 22:20:49', '2021-07-17 22:20:49'),
	(10, 24, '<p>adde mudguard</p>', 30, '2021-07-17 22:22:22', '2021-07-17 22:22:22'),
	(11, 24, '<p>Added heat grip on handle</p>', 30, '2021-07-18 04:04:16', '2021-07-18 04:04:16'),
	(12, 25, '<p>Paint DOne</p>', 30, '2021-07-18 04:51:38', '2021-07-18 04:51:38'),
	(13, 25, '<p>Engine buffed</p>', 30, '2021-07-18 04:51:59', '2021-07-18 04:51:59');
/*!40000 ALTER TABLE `project_activity` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` int(11) DEFAULT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `type`, `phone_no`, `profile_pic`) VALUES
	(1, 'Nibras', 'Nibras@gmail.com', NULL, '$2y$10$zOun0tXPBkkApoipH1/9OedDKIfIGWFn2uztiRDlsFjJyCB3OhsFC', NULL, '2021-06-24 06:23:40', '2021-06-24 06:23:40', 'admin', NULL, ''),
	(5, 'testtt', 'testtt@gmail.com', NULL, '$2y$10$pA3oJYldxN8/1T/KAeYa2udFzaNnT9FjOqUPCL41sjJGVw3UfOynO', NULL, '2021-07-04 10:00:42', '2021-07-04 10:00:42', NULL, NULL, ''),
	(7, 'Azam', 'Azam@gmail.com', NULL, '$2y$10$eUNuwuBiuM336PPLVUATP./CB5.9W0OMNNP1.GGg3HEV7sPj.rc0K', NULL, '2021-07-04 13:16:25', '2021-07-04 13:16:25', 'worker', 776399939, ''),
	(8, 'hakeem', 'hakeem@gmail.com', NULL, '$2y$10$oI0fqH5SxlU2csq4ITgGruGo1cW78YVR/HWGyEj/0tbfe.0/CH.fK', NULL, '2021-07-05 14:34:51', '2021-07-05 14:34:51', 'worker', 923472342, ''),
	(17, 'hasdd', 'asidjaio@gmial.capsm', NULL, '$2y$10$yTDHJd1mG6UAYQ/0igwAeeyY22NUcYAFVFvBvPfrr5z.VyqOJPX6u', NULL, '2021-07-05 15:40:11', '2021-07-05 15:40:11', NULL, 1234123455, ''),
	(22, 'Staff', 'staff@gmail.com', NULL, '$2y$10$gcDTq6xCOoW1eOLcD4vzdONxV0GiwBYIvsE/FQEjgo46TRYBSMmEm', NULL, '2021-07-08 13:30:44', '2021-07-08 13:30:44', 'worker', 1234123455, ''),
	(25, 'Mohomed', 'Mohamed@gmail.com', NULL, '$2y$10$SJlmPeaSetChpgx7UbbRROHhwizF.QJ80h6Cu5oFJ.J1ciQPMvjt2', NULL, '2021-07-10 16:09:40', '2021-07-10 16:09:40', 'customer', 772987292, '/storage/profile_pic/60e9c643d9f9d.jpg'),
	(26, 'mohamed niflan', 'niflan@gmail.com', NULL, '$2y$10$T3O5q3kHPU3YiFklTK/nAOmpzsGVCcd9oz4fatLvkn4fxz/PZJKPS', NULL, '2021-07-10 18:07:09', '2021-07-10 18:07:09', 'customer', 767402207, '/storage/profile_pic/60e9e1cd44ca8.jpg'),
	(28, 'Customer1', 'Customer1@gmail.com', NULL, '$2y$10$arM8rSnmCSLkmypqK97dzu9reD9hUmYUuLURdTISkT1f0ky9/J/t2', NULL, '2021-07-11 04:16:35', '2021-07-11 04:16:35', 'customer', 772987292, '/storage/profile_pic/60ea70a3557e2.jpg'),
	(30, 'nishran', 'nishran@gmail.com', NULL, '$2y$10$2uhmkkTsKJPfZytpm9fLeucU8vHQRzm3iWLnsVaK6SCuDMtXPJcsC', NULL, '2021-07-14 14:23:13', '2021-07-14 14:23:13', 'worker', 767061267, '/storage/profile_pic/60eef35057ab4.png');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
