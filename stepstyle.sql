-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-11-24 23:09:02
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `stepstyle`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `updated_at`, `created_at`) VALUES
(4, 2, 4, '2023-11-13 04:34:02', '2023-11-13 04:34:02'),
(5, 2, 6, '2023-11-14 05:33:13', '2023-11-14 05:33:13'),
(16, 4, 24, '2023-11-21 05:32:19', '2023-11-21 05:32:19'),
(17, 1, 24, '2023-11-22 04:40:30', '2023-11-22 04:40:30');

-- --------------------------------------------------------

--
-- テーブルの構造 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(3, 1, 6, '2023-11-12 04:05:05', '2023-11-12 04:05:05'),
(6, 4, 10, '2023-11-19 08:10:24', '2023-11-19 08:10:24'),
(8, 1, 10, '2023-11-21 04:20:09', '2023-11-21 04:20:09');

-- --------------------------------------------------------

--
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(7, '2019_08_19_000000_create_failed_jobs_table', 2),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(9, '2023_11_05_124104_add_updated_at_to_products_table', 2);

-- --------------------------------------------------------

--
-- テーブルの構造 `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `products`
--

CREATE TABLE `products` (
  `id` int(32) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `imageFileName` varchar(255) NOT NULL,
  `Price` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp(),
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `products`
--

INSERT INTO `products` (`id`, `name`, `Description`, `imageFileName`, `Price`, `updated_at`, `created_at`) VALUES
(3, '商品サンプル６', '商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト', '靴③.jpg', '10000', '2023-11-21 14:30:49', NULL),
(4, '商品サンプル５', '商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト', 'kutu .jpg', '999999', '2023-11-17 14:22:05', NULL),
(5, '商品サンプル４', '商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト', '靴③.jpg', '999999', '2023-11-17 14:21:52', NULL),
(6, '商品サンプル３', '商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト', '靴7.jpg', '5900', '2023-11-17 14:20:53', '2023-11-08 16:53:49'),
(7, '商品サンプル２', '商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト', '商品サンプル１.jpg', '1900', '2023-11-17 14:20:21', '2023-11-14 15:30:20'),
(8, '商品サンプル１', '商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト', '靴5.jpg', '5900', '2023-11-17 14:20:09', '2023-11-14 15:36:42'),
(9, '靴サンプル01', '商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト', '1700412808.jpg', '10000', '2023-11-19 16:53:28', '2023-11-19 16:53:28'),
(10, '靴サンプル03', '商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト', '1700413558.jpg', '20000', '2023-11-19 17:05:58', '2023-11-19 17:05:58'),
(11, 'サンプル05', '商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト商品説明テスト', '1700572993.jpg', '2000', '2023-11-21 13:23:13', '2023-11-21 13:23:13'),
(12, '商品サンプル６', '商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト', '靴③.jpg', '1000', '2023-11-21 13:22:06', NULL),
(13, '商品サンプル６', '商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト', '靴③.jpg', '1000', '2023-11-21 13:22:06', NULL),
(14, '商品サンプル６', '商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト', '靴③.jpg', '1000', '2023-11-21 13:22:06', NULL),
(15, '商品サンプル６', '商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト', '靴③.jpg', '1000', '2023-11-21 13:22:06', NULL),
(16, '商品サンプル６', '商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト', '靴③.jpg', '1000', '2023-11-21 13:22:06', NULL),
(17, '商品サンプル６', '商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト', '靴③.jpg', '1000', '2023-11-21 13:22:06', NULL),
(18, '商品サンプル６', '商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト', '靴③.jpg', '1000', '2023-11-21 13:22:06', NULL),
(19, '商品サンプル６', '商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト', '靴③.jpg', '1000', '2023-11-21 13:22:06', NULL),
(20, '商品サンプル６', '商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト', '靴③.jpg', '1000', '2023-11-21 13:22:06', NULL),
(21, '商品サンプル６', '商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト', '靴③.jpg', '1000', '2023-11-21 13:22:06', NULL),
(22, '商品サンプル６', '商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト', '靴③.jpg', '1000', '2023-11-21 13:22:06', NULL),
(23, '商品サンプル６', '商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト', '靴③.jpg', '1000', '2023-11-21 13:22:06', NULL),
(24, '商品サンプル６', '商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト商品詳細テスト', '靴③.jpg', '1000', '2023-11-21 13:22:06', NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `content`, `updated_at`, `created_at`) VALUES
(1, 6, 1, 'ああああ', '2023-11-09 13:52:05', '2023-11-09 13:52:05'),
(2, 6, 1, 'ああああ', '2023-11-09 13:52:21', '2023-11-09 13:52:21'),
(3, 6, 1, 'ああああ', '2023-11-09 13:54:17', '2023-11-09 13:54:17'),
(4, 6, 1, 'あああ', '2023-11-09 14:14:51', '2023-11-09 14:14:51'),
(5, 6, 1, '感謝感激いっこうにかまわん', '2023-11-09 15:15:44', '2023-11-09 15:15:44'),
(6, 6, 1, '水素の音', '2023-11-09 15:18:12', '2023-11-09 15:18:12'),
(7, 6, 2, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2023-11-14 15:24:17', '2023-11-14 15:24:17'),
(8, 10, 4, 'レビューテストレビューテストレビューテストレビューテストレビューテストレビューテストレビューテストレビューテストレビューテストレビューテストレビューテストレビューテスト', '2023-11-19 17:09:36', '2023-11-19 17:09:36'),
(9, 10, 1, 'aaaaaaaaaaaaaa', '2023-11-21 13:19:45', '2023-11-21 13:19:45'),
(10, 10, 4, 'ああああああああ', '2023-11-21 13:30:45', '2023-11-21 13:30:45');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, '烈海王', 'user01@gmail.com', '$2y$10$FGVMuP1U/Fr9r10YJliaaOb11mqu7EktO5MypGfrYm/LPmsDg63IC', '2023-11-08 07:49:38', '2023-11-21 04:19:31'),
(2, 'ジャック・ハンマ', 'user02@gmail.com', '$2y$10$jlvANKckTaYU/PdIjN//h.cdaVdo/FQ.A7807xZKRaYWtfDqq4n86', '2023-11-13 04:33:15', '2023-11-13 04:33:15'),
(3, '山田', 'user03@gmail.com', '$2y$10$XB43/fs5qVt9IJViEa2z0ei7rwPuE5p5KXDlkeRfCZgNPeHYkImS2', '2023-11-19 06:28:34', '2023-11-20 05:01:10'),
(4, '管理者権限', 'kannrisya@gmail.com', '$2y$10$TjkLYh/h1R/6NyYFvW/fGOU8mH7ei/OgGSM0ipNAzRvAXST1yL3Vy', '2023-11-19 07:13:18', '2023-11-19 07:13:18');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- テーブルのインデックス `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_user_id_foreign` (`user_id`);

--
-- テーブルのインデックス `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- テーブルのインデックス `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- テーブルのインデックス `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- テーブルの AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- テーブルの AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- テーブルの AUTO_INCREMENT `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- テーブルの AUTO_INCREMENT `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
