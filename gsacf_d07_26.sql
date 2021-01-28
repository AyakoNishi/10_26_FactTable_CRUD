-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021 年 1 朁E28 日 14:57
-- サーバのバージョン： 10.4.17-MariaDB
-- PHP のバージョン: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacf_d07_26`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `brend_table`
--

CREATE TABLE `brend_table` (
  `brend_cd` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `brend_nm` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `brend_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `brend_table`
--

INSERT INTO `brend_table` (`brend_cd`, `brend_nm`, `brend_price`) VALUES
('D1001', 'ブレンド', 350),
('D1002', 'アイスコーヒー', 400),
('D1003', 'エスプレッソ', 500),
('D1004', 'カプチーノ', 500),
('D1005', 'カフェラテ', 480),
('D1006', 'ヘーゼルナッツラテ', 660),
('D1007', 'キャラメルラテ', 500),
('D1008', 'カフェモカ', 500),
('D1009', 'バニララテ', 500),
('D2001', 'ダージリン', 350),
('D2002', 'アッサム', 360),
('D2003', 'イングリッシュブレックファスト', 400),
('D2004', 'カモミール', 300),
('D2005', 'ロイヤルミルクティー', 400),
('D3001', 'オレンジ', 400),
('D3002', 'バナナ', 300),
('D3003', 'ミックス', 400),
('D4001', 'メロン', 350),
('D4002', 'コーラ', 400),
('D5001', 'ウーロン茶', 300),
('D5002', 'ジンジャーエール', 300),
('F1001', 'バタートースト', 200),
('F1002', 'ハニートースト', 250),
('F2001', 'タマゴ', 300),
('F2002', 'クラブサンド', 400),
('F3001', 'カレー', 500),
('F3002', 'カツカレー', 600),
('F4001', 'ミートソース', 550),
('F4002', 'ナポリタン', 550),
('F5001', 'オムレツ', 700),
('F5002', 'お子様', 650),
('Z1001', 'ショートケーキ', 400),
('Z1002', 'チーズケーキ', 400),
('Z2001', 'フルーツパフェ', 500),
('Z2002', 'チョコバナナパフェ', 600),
('Z3001', 'バニラ', 300),
('Z3002', 'チョコ', 300),
('Z4001', 'プレーン', 500),
('Z4002', 'ワッフル', 600);

-- --------------------------------------------------------

--
-- テーブルの構造 `cafe_table`
--

CREATE TABLE `cafe_table` (
  `id` int(3) NOT NULL,
  `kind_cd` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `kind_nm` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `coffee_cd` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `coffee_nm` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `brend_cd` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `brend_nm` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `hot_cd` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `unit_price` int(6) NOT NULL,
  `count_c` int(3) NOT NULL,
  `price` int(8) NOT NULL,
  `memo` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `cafe_table`
--

INSERT INTO `cafe_table` (`id`, `kind_cd`, `kind_nm`, `coffee_cd`, `coffee_nm`, `brend_cd`, `brend_nm`, `hot_cd`, `unit_price`, `count_c`, `price`, `memo`) VALUES
(1, '1', '', 'D1', '', 'D1001', '', '1', 0, 2, 0, ''),
(2, '3', '0', 'Z3', '0', 'Z3002', '0', '3', 0, 3, 0, ''),
(3, '1', '0', 'D2', '0', 'D2003', '0', '1', 0, 4, 0, ''),
(5, '1', '0', 'D1', '0', 'D1004', '0', '2', 0, 1, 0, ''),
(8, '2', '0', 'F1', '0', 'F1001', '0', '3', 0, 3, 0, ''),
(9, '1', '0', 'D3', '0', 'D3003', '0', '1', 0, 2, 0, ''),
(10, '1', '0', 'D2', '0', 'D2005', '0', '1', 0, 6, 0, '');

-- --------------------------------------------------------

--
-- テーブルの構造 `coffee_table`
--

CREATE TABLE `coffee_table` (
  `coffee_cd` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `coffee_nm` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `coffee_table`
--

INSERT INTO `coffee_table` (`coffee_cd`, `coffee_nm`) VALUES
('D1', '珈琲'),
('D2', '紅茶'),
('D3', 'フレッシュジュース'),
('D4', 'フロート'),
('D5', 'ソフトドリンク'),
('F1', 'トースト'),
('F2', 'サンドウィッチ'),
('F3', 'カレー'),
('F4', 'パスタ'),
('F5', 'プレート'),
('Z1', 'ケーキ'),
('Z2', 'パフェ'),
('Z3', 'アイス'),
('Z4', 'ホットケーキ');

-- --------------------------------------------------------

--
-- テーブルの構造 `hot_table`
--

CREATE TABLE `hot_table` (
  `hot_cd` int(1) NOT NULL,
  `hot_nm` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `hot_table`
--

INSERT INTO `hot_table` (`hot_cd`, `hot_nm`) VALUES
(1, 'hot'),
(2, 'ice'),
(3, 'ー');

-- --------------------------------------------------------

--
-- テーブルの構造 `kind_table`
--

CREATE TABLE `kind_table` (
  `kind_cd` int(3) NOT NULL,
  `kind_nm` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `kind_table`
--

INSERT INTO `kind_table` (`kind_cd`, `kind_nm`) VALUES
(1, 'ドリンク'),
(2, 'フード'),
(3, 'デザート');

-- --------------------------------------------------------

--
-- テーブルの構造 `likes_table`
--

CREATE TABLE `likes_table` (
  `id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `todo_id` int(12) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `likes_table`
--

INSERT INTO `likes_table` (`id`, `user_id`, `todo_id`, `created_at`) VALUES
(5, 1, 4, '2021-01-16 16:55:28'),
(8, 1, 6, '2021-01-16 17:04:54'),
(12, 1, 7, '2021-01-16 17:19:20'),
(14, 0, 1, '2021-01-16 23:53:28'),
(15, 0, 11, '2021-01-16 23:53:30');

-- --------------------------------------------------------

--
-- テーブルの構造 `todo_table`
--

CREATE TABLE `todo_table` (
  `id` int(12) NOT NULL,
  `todo` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `todo_table`
--

INSERT INTO `todo_table` (`id`, `todo`, `deadline`, `created_at`, `updated_at`) VALUES
(1, '課題１', '2020-12-19', '2020-12-19 15:51:31', '0000-00-00 00:00:00'),
(2, '課題２', '2020-12-20', '2020-12-19 15:57:12', '2020-12-19 15:57:12'),
(3, '課題２', '2020-12-21', '2020-12-19 16:00:22', '2020-12-19 16:00:22'),
(4, '課題３１１', '2020-12-31', '2020-12-19 16:02:30', '2020-12-26 16:07:21'),
(5, '課題４', '2020-12-24', '2020-12-19 16:02:31', '2020-12-19 16:02:31'),
(6, '課題５', '2020-12-25', '2020-12-19 16:02:31', '2020-12-19 16:02:31'),
(7, '課題６', '2020-12-26', '2020-12-19 16:02:31', '2020-12-19 16:02:31'),
(8, '課題７', '2020-12-27', '2020-12-19 16:02:31', '2020-12-19 16:02:31'),
(9, '課題８', '2020-12-28', '2020-12-19 16:02:31', '2020-12-19 16:02:31'),
(10, '課題９', '2020-12-29', '2020-12-19 16:02:31', '2020-12-19 16:02:31'),
(11, '課題１０', '2020-12-30', '2020-12-19 16:02:31', '2020-12-19 16:02:31'),
(12, 'test1', '2020-12-17', '2020-12-19 16:42:57', '2020-12-19 16:42:57'),
(14, '課題１３', '2020-12-01', '2020-12-19 16:47:27', '2020-12-19 16:47:27'),
(15, 'test2', '2020-12-04', '2020-12-26 15:02:39', '2020-12-26 15:02:39'),
(16, 'test3', '2020-12-29', '2020-12-26 15:02:54', '2020-12-26 15:02:54');

-- --------------------------------------------------------

--
-- テーブルの構造 `users_table`
--

CREATE TABLE `users_table` (
  `id` int(12) NOT NULL,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `users_table`
--

INSERT INTO `users_table` (`id`, `username`, `password`, `is_admin`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'hoge1', 'pass1', 0, 0, '2021-01-14 22:33:34', '0000-00-00 00:00:00'),
(2, 'hoge2', 'pass2', 0, 0, '2021-01-14 22:33:34', '0000-00-00 00:00:00'),
(3, 'hoge3', 'pass3', 0, 0, '2021-01-14 22:36:23', '2021-01-14 22:36:23'),
(4, 'kanri', 'kanri999', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `brend_table`
--
ALTER TABLE `brend_table`
  ADD PRIMARY KEY (`brend_cd`);

--
-- テーブルのインデックス `cafe_table`
--
ALTER TABLE `cafe_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `coffee_table`
--
ALTER TABLE `coffee_table`
  ADD PRIMARY KEY (`coffee_cd`);

--
-- テーブルのインデックス `kind_table`
--
ALTER TABLE `kind_table`
  ADD PRIMARY KEY (`kind_cd`);

--
-- テーブルのインデックス `likes_table`
--
ALTER TABLE `likes_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `todo_table`
--
ALTER TABLE `todo_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `cafe_table`
--
ALTER TABLE `cafe_table`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- テーブルの AUTO_INCREMENT `likes_table`
--
ALTER TABLE `likes_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- テーブルの AUTO_INCREMENT `todo_table`
--
ALTER TABLE `todo_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- テーブルの AUTO_INCREMENT `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
