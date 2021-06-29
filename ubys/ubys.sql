-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 19 May 2021, 11:24:28
-- Sunucu sürümü: 10.4.17-MariaDB
-- PHP Sürümü: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ubys`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ders`
--

CREATE TABLE `ders` (
  `ders_id` int(11) NOT NULL,
  `hoca_id` int(11) NOT NULL,
  `ders_adi` varchar(50) NOT NULL,
  `ders_kodu` varchar(50) NOT NULL,
  `kredi` float NOT NULL,
  `resim` varchar(255) NOT NULL DEFAULT 'assets/img/nature/flat-education-reading-open-book-circle-icon-vector-5531374.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `ders`
--

INSERT INTO `ders` (`ders_id`, `hoca_id`, `ders_adi`, `ders_kodu`, `kredi`, `resim`) VALUES
(1, 4, 'İnternet Programcılığı ||', 'BPR-1004', 4, 'assets/img/nature/flat-education-reading-open-book-circle-icon-vector-5531374.jpg'),
(2, 3, 'Türk Dili', 'TDİ-1002', 1, 'assets/img/nature/4064.12-studying-on-laptop-icon-iconbunny.jpg'),
(3, 2, 'Veri Tabanı', 'BPR-2012', 4, 'assets/img/nature/flat-open-book-with-bookmark-circle-icon-with-long-vector-5312838.jpg'),
(4, 1, 'Mesleki İngilizce', 'BPR-2016', 2, 'assets/img/nature/flat-design-icon-open-book-with-bookmark-in-ui-vector-9247432.jpg'),
(5, 5, 'Matematik', ' BPR-1012', 6, 'assets/img/nature/flat-books-with-bookmarks-circle-icon-with-long-vector-5531191.jpg'),
(6, 1, 'Görsel Programlama', ' BPR-2001', 4, 'assets/img/nature/164-1646260_child-reading-png-literary-devices-png.png'),
(7, 1, 'Ofis Yazılımları', 'BPR-1007', 4, 'assets/img/nature/flat-education-reading-open-book-circle-icon-vector-5531374.jpg'),
(8, 6, 'Beden Eğitimi', 'BED-1001', 0, 'assets/img/nature/flat-education-reading-open-book-circle-icon-vector-5531374.jpg'),
(9, 7, 'Sayısal Elektronik', 'BPR-2009', 4, 'assets/img/nature/flat-education-reading-open-book-circle-icon-vector-5531374.jpg'),
(10, 2, 'Yazılım Mimarileri', 'BPR-2013', 2, 'assets/img/nature/flat-education-reading-open-book-circle-icon-vector-5531374.jpg'),
(11, 8, 'Güzel Sanatlar', 'GUS-1001', 0, 'assets/img/nature/flat-education-reading-open-book-circle-icon-vector-5531374.jpg'),
(14, 1, 'Deneme', 'DNM-0000', 3, 'assets/img/nature/flat-education-reading-open-book-circle-icon-vector-5531374.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ders_not`
--

CREATE TABLE `ders_not` (
  `not_id` int(11) NOT NULL,
  `ogrenci_id` int(11) NOT NULL,
  `ders_id` int(50) NOT NULL,
  `vize` int(50) NOT NULL,
  `final` int(11) NOT NULL,
  `harf_notu` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `ders_not`
--

INSERT INTO `ders_not` (`not_id`, `ogrenci_id`, `ders_id`, `vize`, `final`, `harf_notu`) VALUES
(3, 1, 6, 66, 77, ''),
(4, 1, 4, 70, 40, ''),
(6, 1, 2, 60, 85, ''),
(7, 3, 3, 70, 90, ''),
(8, 3, 4, 55, 65, ''),
(9, 2, 6, 12, 21, ''),
(10, 2, 7, 99, 99, ''),
(11, 3, 7, 33, 44, ''),
(14, 1, 7, 5, 55, ''),
(15, 2, 4, 17, 21, '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ders_secim`
--

CREATE TABLE `ders_secim` (
  `secim_id` int(11) NOT NULL,
  `ders_id` int(11) NOT NULL,
  `ogrenci_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `ders_secim`
--

INSERT INTO `ders_secim` (`secim_id`, `ders_id`, `ogrenci_id`) VALUES
(2, 4, 1),
(3, 5, 1),
(4, 6, 1),
(5, 2, 1),
(6, 3, 3),
(7, 7, 3),
(8, 4, 3),
(9, 6, 2),
(10, 7, 2),
(11, 4, 2),
(14, 7, 1),
(16, 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duyuru`
--

CREATE TABLE `duyuru` (
  `duyuru_id` int(11) NOT NULL,
  `duyuru_durum` int(11) NOT NULL DEFAULT 0,
  `hoca_isim` varchar(50) NOT NULL,
  `baslik` varchar(50) NOT NULL,
  `icerik` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `duyuru`
--

INSERT INTO `duyuru` (`duyuru_id`, `duyuru_durum`, `hoca_isim`, `baslik`, `icerik`) VALUES
(1, 0, 'Ümit Demir', 'Deneme', 'bu açıklamayı düzenledim mi? evet.'),
(2, 1, 'Ümit Demir', 'Yenilikçi', 'yeni mantıklı bir açıklamayı açıklayınız...'),
(5, 1, 'Yelda Fırat', 'sonuncusu', 'merhaba sonuncu duyuru!!'),
(6, 0, 'Varol Güven', 'İlk Duyurum', 'Çok yeni bir duyuru denemesi...');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hoca`
--

CREATE TABLE `hoca` (
  `hoca_id` int(11) NOT NULL,
  `hoca_isim` varchar(50) NOT NULL,
  `hoca_mail` varchar(50) NOT NULL,
  `hoca_sifre` varchar(50) NOT NULL,
  `hoca_tarih` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `hoca`
--

INSERT INTO `hoca` (`hoca_id`, `hoca_isim`, `hoca_mail`, `hoca_sifre`, `hoca_tarih`, `created_at`, `updated_at`) VALUES
(1, 'Ümit Demir', 'umit@comu.edu.tr', '12345', '1990-06-07', '2021-04-13 11:41:15', '2021-05-04 13:15:51'),
(2, 'Yelda Fırat', 'yelda@comu.edu.tr', '123456', '1988-04-01', '2021-04-13 11:41:15', '2021-04-17 13:38:05'),
(3, 'Emre Parlak', 'emre@comu.edu.tr', '5656666', '2021-04-26', '2021-05-07 11:35:40', '2021-05-07 11:35:40'),
(4, 'Varol Güven', 'varol@comu.edu.tr', '12345', '1984-02-01', '2021-05-04 13:17:31', '2021-05-04 13:17:31'),
(5, 'Emine Canan Demirel', 'canan@comu.edu.tr', '111111', '2021-05-12', '2021-05-07 11:34:10', '2021-05-07 11:34:10'),
(6, 'Serhat Çetin', 'serhat@comu.edu.tr', '212121', '2021-05-26', '2021-05-07 11:34:10', '2021-05-07 11:34:10'),
(7, 'Kamil Akgün', 'kamil@comu.edu.tr', '434343', '2021-05-22', '2021-05-07 11:34:56', '2021-05-07 11:34:56'),
(8, 'Gülhan Apak', 'gülhan@comu.edu.tr', '55566', '2021-04-06', '2021-05-07 11:34:56', '2021-05-07 11:34:56');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenci`
--

CREATE TABLE `ogrenci` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dtarih` date NOT NULL,
  `durum` tinyint(1) NOT NULL DEFAULT 0,
  `bolum` varchar(50) NOT NULL,
  `sinif` varchar(50) NOT NULL,
  `donem` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `ogrenci`
--

INSERT INTO `ogrenci` (`id`, `username`, `mail`, `password`, `dtarih`, `durum`, `bolum`, `sinif`, `donem`, `created_at`, `updated`) VALUES
(1, 'özge ', '190928111@comu.tr', '12345', '1995-11-09', 1, 'Bilgisayar Programcılıgı', '2.Sınıf 4.Dönem', 'Bahar', '2021-03-23 10:29:49', '2021-05-04 13:13:18'),
(2, 'ahmet', '190928099@comu.tr', '1234', '1987-10-22', 1, 'Bilgisayar Programcılıgı', '2.Sınıf 4.Dönem', 'Bahar', '2021-04-08 12:39:37', '2021-05-04 13:13:17'),
(3, 'ali', '190928002@comu.tr', '22222', '2021-01-27', 1, 'Bilgisayar Programcılıgı', '2.Sınıf 3.Dönem', 'Güz', '2021-04-13 10:34:34', '2021-05-04 13:13:19');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uye_log`
--

CREATE TABLE `uye_log` (
  `islem_id` int(11) NOT NULL,
  `islem_tipi` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `islem_kisi` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `islem_zaman` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `islem_ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `uye_log`
--

INSERT INTO `uye_log` (`islem_id`, `islem_tipi`, `islem_kisi`, `islem_zaman`, `islem_ip`) VALUES
(1, 'Giriş yapıldı.', 'özge', '23.03.2021 15:58:09', '127.0.0.1'),
(2, 'Çıkış yapıldı.', 'özge', '23.03.2021 15:58:14', '127.0.0.1'),
(3, 'Giriş yapıldı.', 'özge', '23.03.2021 16:00:29', '127.0.0.1'),
(4, 'Giriş yapıldı.', 'özge', '24.03.2021 17:20:19', '127.0.0.1'),
(5, 'Çıkış yapıldı.', 'özge', '24.03.2021 17:20:32', '127.0.0.1'),
(6, 'Giriş yapıldı.', 'özge', '24.03.2021 17:25:49', '127.0.0.1'),
(7, 'Giriş yapıldı.', 'özge', '28.03.2021 16:45:13', '127.0.0.1'),
(8, 'Çıkış yapıldı.', 'özge', '28.03.2021 16:46:27', '127.0.0.1'),
(9, 'Giriş yapıldı.', 'özge', '28.03.2021 16:47:37', '127.0.0.1'),
(10, 'Çıkış yapıldı.', 'özge', '28.03.2021 20:04:46', '127.0.0.1'),
(11, 'Giriş yapıldı.', 'özge', '02.04.2021 17:13:36', '127.0.0.1'),
(12, 'Çıkış yapıldı.', 'özge', '08.04.2021 15:47:33', '127.0.0.1'),
(13, 'Giriş yapıldı.', 'ahmet', '08.04.2021 15:48:56', '127.0.0.1'),
(14, 'Çıkış yapıldı.', 'ahmet', '08.04.2021 15:49:00', '127.0.0.1'),
(15, 'Giriş yapıldı.', 'ahmet', '08.04.2021 15:49:26', '127.0.0.1'),
(16, 'Çıkış yapıldı.', 'ahmet', '08.04.2021 15:49:34', '127.0.0.1'),
(17, 'Giriş yapıldı.', 'ahmet', '08.04.2021 15:51:52', '127.0.0.1'),
(18, 'Çıkış yapıldı.', 'ahmet', '08.04.2021 15:54:52', '127.0.0.1'),
(19, 'Giriş yapıldı.', 'ahmet', '08.04.2021 15:59:12', '127.0.0.1'),
(20, 'Çıkış yapıldı.', 'ahmet', '08.04.2021 16:03:22', '127.0.0.1'),
(21, 'Giriş yapıldı.', 'ahmet', '08.04.2021 16:03:31', '127.0.0.1'),
(22, 'Çıkış yapıldı.', 'ahmet', '08.04.2021 16:03:35', '127.0.0.1'),
(23, 'Giriş yapıldı.', 'ahmet', '08.04.2021 16:11:11', '127.0.0.1'),
(24, 'Çıkış yapıldı.', 'ahmet', '08.04.2021 16:11:17', '127.0.0.1'),
(25, 'Giriş yapıldı.', 'ahmet', '08.04.2021 16:11:56', '127.0.0.1'),
(26, 'Giriş yapıldı.', 'ahmet', '08.04.2021 16:13:17', '127.0.0.1'),
(27, 'Giriş yapıldı.', 'özge', '08.04.2021 16:53:07', '127.0.0.1'),
(28, 'Giriş yapıldı.', 'özge', '08.04.2021 16:53:22', '127.0.0.1'),
(29, 'Giriş yapıldı.', 'özge', '08.04.2021 16:54:00', '127.0.0.1'),
(30, 'Çıkış yapıldı.', 'özge', '08.04.2021 16:58:27', '127.0.0.1'),
(31, 'Çıkış yapıldı.', 'ahmet', '08.04.2021 17:04:33', '127.0.0.1'),
(32, 'Çıkış yapıldı.', 'ahmet', '08.04.2021 17:07:41', '127.0.0.1'),
(33, 'Çıkış yapıldı.', 'ahmet', '08.04.2021 17:21:46', '127.0.0.1'),
(34, 'Giriş yapıldı.', 'özge', '08.04.2021 17:50:02', '127.0.0.1'),
(35, 'Çıkış yapıldı.', 'özge', '08.04.2021 17:50:06', '127.0.0.1'),
(36, 'Giriş yapıldı.', 'özge', '08.04.2021 17:55:40', '127.0.0.1'),
(37, 'Çıkış yapıldı.', 'özge', '08.04.2021 17:55:44', '127.0.0.1'),
(38, 'Giriş yapıldı.', 'özge', '08.04.2021 17:56:38', '127.0.0.1'),
(39, 'Çıkış yapıldı.', 'özge', '08.04.2021 17:57:12', '127.0.0.1'),
(40, 'Çıkış yapıldı.', 'ahmet', '08.04.2021 18:21:29', '127.0.0.1'),
(41, 'Giriş yapıldı.', 'özge', '08.04.2021 18:21:36', '127.0.0.1'),
(42, 'Çıkış yapıldı.', 'özge', '09.04.2021 12:31:02', '127.0.0.1'),
(43, 'Çıkış yapıldı.', 'ahmet', '09.04.2021 12:40:16', '127.0.0.1'),
(44, 'Giriş yapıldı.', 'özge', '09.04.2021 12:40:25', '127.0.0.1'),
(45, 'Çıkış yapıldı.', 'özge', '09.04.2021 13:06:19', '127.0.0.1'),
(46, 'Giriş yapıldı.', 'özge', '09.04.2021 13:06:25', '127.0.0.1'),
(47, 'Çıkış yapıldı.', 'özge', '09.04.2021 13:07:37', '127.0.0.1'),
(48, 'Giriş yapıldı.', 'özge', '09.04.2021 13:08:22', '127.0.0.1'),
(49, 'Çıkış yapıldı.', 'özge', '09.04.2021 13:08:27', '127.0.0.1'),
(50, 'Giriş yapıldı.', 'özge', '09.04.2021 13:08:33', '127.0.0.1'),
(51, 'Çıkış yapıldı.', 'özge', '09.04.2021 18:58:12', '127.0.0.1'),
(52, 'Giriş yapıldı.', 'özge', '10.04.2021 14:12:11', '127.0.0.1'),
(53, 'Çıkış yapıldı.', 'özge', '10.04.2021 14:37:58', '127.0.0.1'),
(54, 'Giriş yapıldı.', 'özge', '10.04.2021 14:38:04', '127.0.0.1'),
(55, 'Çıkış yapıldı.', 'özge', '10.04.2021 14:39:55', '127.0.0.1'),
(56, 'Giriş yapıldı.', 'özge', '10.04.2021 14:40:01', '127.0.0.1'),
(57, 'Profil Bilgileri Düzenlendi.', 'özge', '10.04.2021 14:43:11', '127.0.0.1'),
(58, 'Profil Bilgileri Düzenlendi.', 'özge', '10.04.2021 15:29:25', '127.0.0.1'),
(59, 'Giriş yapıldı.', 'özge', '12.04.2021 16:06:06', '127.0.0.1'),
(60, 'Çıkış yapıldı.', 'özge', '12.04.2021 16:11:41', '127.0.0.1'),
(61, 'Giriş yapıldı.', 'özge', '12.04.2021 16:35:30', '127.0.0.1'),
(62, 'Çıkış yapıldı.', 'özge', '12.04.2021 17:19:02', '127.0.0.1'),
(63, 'Çıkış yapıldı.', 'ahmet', '13.04.2021 10:00:25', '127.0.0.1'),
(64, 'Giriş yapıldı.', 'özge', '13.04.2021 11:12:15', '127.0.0.1'),
(65, 'Profil Bilgileri Düzenlendi.', 'özge', '13.04.2021 11:13:44', '127.0.0.1'),
(66, 'Çıkış yapıldı.', 'özge', '13.04.2021 11:14:02', '127.0.0.1'),
(67, 'Çıkış yapıldı.', 'ahmet', '13.04.2021 11:16:17', '127.0.0.1'),
(68, 'Giriş yapıldı.', 'özge', '13.04.2021 12:46:31', '127.0.0.1'),
(69, 'Profil Bilgileri Düzenlendi.', 'özge', '13.04.2021 12:50:28', '127.0.0.1'),
(70, 'Çıkış yapıldı.', 'özge', '13.04.2021 12:50:47', '127.0.0.1'),
(71, 'Çıkış yapıldı.', 'ahmet', '13.04.2021 14:52:43', '127.0.0.1'),
(72, 'Giriş yapıldı.', 'özge', '22.04.2021 20:12:09', '127.0.0.1'),
(73, 'Çıkış yapıldı.', 'özge', '22.04.2021 20:12:27', '127.0.0.1'),
(74, 'Giriş yapıldı.', 'özge', '27.04.2021 09:33:02', '127.0.0.1'),
(75, 'Giriş yapıldı.', 'özge', '04.05.2021 16:24:50', '127.0.0.1'),
(76, 'Giriş yapıldı.', 'özge', '04.05.2021 16:47:37', '127.0.0.1'),
(77, 'Çıkış yapıldı.', 'özge', '04.05.2021 16:48:34', '127.0.0.1'),
(78, 'Giriş yapıldı.', 'özge', '07.05.2021 12:46:54', '127.0.0.1'),
(79, 'Çıkış yapıldı.', 'özge', '07.05.2021 13:31:54', '127.0.0.1'),
(80, 'Giriş yapıldı.', 'özge', '19.05.2021 12:13:54', '127.0.0.1'),
(81, 'Çıkış yapıldı.', 'özge', '19.05.2021 12:17:49', '127.0.0.1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ders`
--
ALTER TABLE `ders`
  ADD PRIMARY KEY (`ders_id`);

--
-- Tablo için indeksler `ders_not`
--
ALTER TABLE `ders_not`
  ADD PRIMARY KEY (`not_id`);

--
-- Tablo için indeksler `ders_secim`
--
ALTER TABLE `ders_secim`
  ADD PRIMARY KEY (`secim_id`);

--
-- Tablo için indeksler `duyuru`
--
ALTER TABLE `duyuru`
  ADD PRIMARY KEY (`duyuru_id`);

--
-- Tablo için indeksler `hoca`
--
ALTER TABLE `hoca`
  ADD PRIMARY KEY (`hoca_id`);

--
-- Tablo için indeksler `ogrenci`
--
ALTER TABLE `ogrenci`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uye_log`
--
ALTER TABLE `uye_log`
  ADD PRIMARY KEY (`islem_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ders`
--
ALTER TABLE `ders`
  MODIFY `ders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `ders_not`
--
ALTER TABLE `ders_not`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `ders_secim`
--
ALTER TABLE `ders_secim`
  MODIFY `secim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `duyuru`
--
ALTER TABLE `duyuru`
  MODIFY `duyuru_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `hoca`
--
ALTER TABLE `hoca`
  MODIFY `hoca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `ogrenci`
--
ALTER TABLE `ogrenci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `uye_log`
--
ALTER TABLE `uye_log`
  MODIFY `islem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
