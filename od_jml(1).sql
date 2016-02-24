-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21 Jan 2016 pada 07.36
-- Versi Server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `od_jml`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL,
  `key_area` varchar(250) NOT NULL,
  `image` text NOT NULL,
  `image_dir` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `banners`
--

INSERT INTO `banners` (`id`, `key_area`, `image`, `image_dir`, `created`, `modified`) VALUES
(2, 'image_top', 'Cranes-at-Dawn-Picture.jpg', '2', '2015-12-30 09:46:04', '2015-12-30 09:46:04'),
(3, 'mimika_image', '1.jpg', '3', '2015-12-30 09:48:22', '2015-12-30 09:48:22'),
(4, 'javasindo_image', '3.jpg', '4', '2015-12-30 09:48:56', '2015-12-30 09:48:56'),
(5, 'mitra_image', '4.jpg', '5', '2015-12-30 09:49:40', '2015-12-30 09:49:40'),
(6, 'machindo_image', '2.jpg', '6', '2015-12-30 09:50:14', '2015-12-30 09:50:14'),
(7, 'youtube_background', 'about-video.jpg', '7', '2016-01-19 05:12:38', '2016-01-19 05:12:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `brand_name` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `brands`
--

INSERT INTO `brands` (`id`, `product_category_id`, `brand_name`, `created`, `modified`) VALUES
(2, 1, 'Airman', '2015-12-07 08:27:55', '2015-12-14 08:56:50'),
(3, 2, 'Caterpilar', '2015-12-14 09:01:15', '2015-12-14 09:01:15'),
(4, 5, 'Terra Motorcycle', '2015-12-15 11:14:26', '2015-12-15 11:14:26'),
(5, 6, 'Tower Crane', '2015-12-22 07:46:31', '2015-12-22 07:46:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `image_dir` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `clients`
--

INSERT INTO `clients` (`id`, `image`, `image_dir`, `created`, `modified`) VALUES
(1, '1.jpg', '1', '2015-12-23 05:55:15', '2015-12-23 05:55:15'),
(2, '2.jpg', '2', '2016-01-11 06:41:22', '2016-01-11 06:41:22'),
(3, '3.jpg', '3', '2016-01-11 06:42:18', '2016-01-11 06:42:18'),
(4, '4.jpg', '4', '2016-01-11 06:43:28', '2016-01-11 06:43:28'),
(5, '5.jpg', '5', '2016-01-11 06:44:16', '2016-01-11 06:44:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_contacts`
--

CREATE TABLE IF NOT EXISTS `data_contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `holding` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `subject` int(1) NOT NULL DEFAULT '1',
  `message` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_contacts`
--

INSERT INTO `data_contacts` (`id`, `name`, `holding`, `email`, `subject`, `message`, `created`, `modified`) VALUES
(1, 'abdulah wahdi', 0, 'abdulah.wahdi@gmail.com', 1, 'test bro', '2015-12-10 04:05:31', '2015-12-10 04:05:31'),
(2, 'abdulah wahdi', 1, 'abdulah.wahdi@gmail.com', 1, 'test', '2016-01-05 04:10:13', '2016-01-05 04:10:13'),
(3, 'abdulah wahdi', 1, 'abdulah.wahdi@gmail.com', 1, 'test', '2016-01-05 04:10:57', '2016-01-05 04:10:57'),
(4, 'abdulah wahdi', 1, 'abdulah.wahdi@gmail.com', 1, 'test', '2016-01-05 04:11:44', '2016-01-05 04:11:44'),
(5, 'abdulah wahdi', 1, 'abdulah.wahdi@gmail.com', 1, 'test', '2016-01-05 04:13:15', '2016-01-05 04:13:15'),
(6, 'abdulah wahdi', 1, 'abdulah.wahdi@gmail.com', 1, 'test', '2016-01-05 04:19:46', '2016-01-05 04:19:46'),
(7, 'abdulah wahdi', 1, 'abdulah.wahdi@gmail.com', 1, 'test', '2016-01-05 04:20:30', '2016-01-05 04:20:30'),
(8, 'abdulah wahdi', 1, 'abdulah.wahdi@gmail.com', 1, 'test', '2016-01-05 04:20:52', '2016-01-05 04:20:52'),
(9, 'abdulah wahdi', 1, 'abdulah.wahdi@gmail.com', 1, 'tanya mengenai informasi jml', '2016-01-11 06:10:58', '2016-01-11 06:10:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pages`
--

CREATE TABLE IF NOT EXISTS `data_pages` (
  `id` int(11) NOT NULL,
  `page_key` varchar(16) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pages`
--

INSERT INTO `data_pages` (`id`, `page_key`, `content`, `created`, `modified`) VALUES
(1, 'about', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi finibus aliquam nisi. Fusce dictum ante nec nunc semper condimentum. Curabitur urna elit, tempor et nunc quis, sagittis fringilla ipsum. Praesent aliquet est ac orci aliquet, ut mattis diam imperdiet. Vivamus volutpat, lorem id laoreet dignissim, turpis ipsum porttitor elit, sed posuere metus quam et felis. Donec sit amet quam in nisi auctor malesuada. Phasellus rhoncus, felis id finibus fermentum, elit sem mollis enim, quis eleifend metus magna ut arcu. Quisque tincidunt dolor risus, in mollis neque sagittis quis. Morbi enim odio, sodales sodales finibus quis, ultrices ut purus. Sed tincidunt, magna sed auctor porttitor, purus urna congue mauris, id dictum ligula elit ut urna. Praesent velit nisl, laoreet non felis vitae, ullamcorper commodo nunc. Ut tristique tincidunt viverra. Ut nec aliquam purus. Praesent congue ante odio, sit amet aliquet ante commodo id.</p>\r\n\r\n<p>Nullam viverra sapien quis leo bibendum facilisis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed tempus tempor dui, in posuere lectus porta in. Maecenas dictum sodales nibh quis vestibulum. Integer non auctor enim. Donec ut feugiat augue. Nam non enim lacinia, placerat nunc at, placerat neque. Morbi fringilla orci eu magna placerat, a semper enim vehicula. In viverra cursus libero, in accumsan nunc auctor sit amet. In hac habitasse platea dictumst. Mauris ac orci non arcu imperdiet fringilla ac ac magna.</p>\r\n\r\n<p>Praesent ligula magna, sollicitudin vel luctus quis, porta non nisl. Nunc in est eget augue tempus condimentum ut ac mauris. Quisque vehicula euismod molestie. Fusce dictum sodales nulla at pellentesque. Sed quam dui, sollicitudin sed nisi eu, elementum lacinia tellus. Sed nec semper elit. Vestibulum eget porttitor leo, id imperdiet libero. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam dolor velit, tincidunt at nulla ac, ultricies pharetra quam. Vestibulum non porta sapien, vel convallis magna. Suspendisse sodales ante nisl, facilisis commodo est ullamcorper eget. Mauris sollicitudin, tellus at semper tincidunt, lectus lorem pharetra lorem, quis dictum tortor risus at turpis.</p>\r\n\r\n<p>Nam interdum erat nisl, id interdum ligula commodo sit amet. Morbi ut lorem vitae leo luctus volutpat sed quis erat. Etiam tellus ex, tristique nec arcu cursus, fermentum vulputate sapien. Etiam pharetra dignissim porttitor. Duis sed libero ultrices, auctor sapien vitae, varius enim. Proin ac dictum nibh. Sed commodo nisi in mauris commodo, eu egestas augue maximus. Maecenas libero lectus, dictum eu scelerisque non, iaculis sit amet magna. Quisque sit amet mi et tellus finibus fringilla nec a justo. Donec finibus scelerisque diam id scelerisque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin scelerisque turpis et purus tempor, ut viverra ante molestie. Morbi mattis fringilla purus in iaculis. Quisque consectetur tempor tortor ac feugiat. Morbi congue maximus libero, eu vulputate sem aliquam vel.</p>\r\n\r\n<p>Nunc rhoncus arcu facilisis ante pretium ultrices. Ut egestas libero quis sapien aliquet, sed blandit elit porta. Phasellus mollis cursus suscipit. Phasellus a vulputate magna, ac porttitor quam. Nullam posuere, nisi eget dapibus fringilla, sapien libero rutrum risus, nec tincidunt est odio vitae dolor. Sed suscipit efficitur nunc eu tempus. Aliquam maximus aliquet pretium.</p>\r\n', '2015-12-07 09:32:16', '2015-12-07 09:32:16'),
(2, 'about_ev', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin varius metus ante, non gravida justo malesuada convallis. Fusce in magna eu nibh scelerisque sollicitudin vitae quis diam. Ut ut tristique mi. Sed ac ornare ipsum. Vivamus semper, neque in sagittis mattis, dolor eros tempus magna, sit amet finibus quam lacus a felis. Nulla eu mattis ante. Morbi nec libero mauris. Nullam eget lectus quis urna vulputate pretium. Etiam cursus tincidunt neque, vitae fermentum elit suscipit in. Pellentesque egestas mollis justo, eu laoreet diam luctus a. Praesent quis venenatis nibh. Sed sagittis ligula ipsum, a interdum nisi dignissim iaculis.</p>\r\n\r\n<p>Etiam eros mi, sodales vitae tristique quis, aliquet eu urna. Morbi id facilisis est. Quisque nisl tortor, volutpat congue blandit a, sollicitudin et lacus. Nulla non fermentum velit. Maecenas quam libero, venenatis sit amet dolor ac, sodales eleifend sem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla vel ante feugiat sapien pharetra luctus sed nec tortor. Ut semper scelerisque purus vel aliquam. Duis placerat, lectus in facilisis tristique, mi tortor rhoncus diam, sed sollicitudin metus erat a arcu.</p>\r\n\r\n<p>Nullam vel dolor massa. Suspendisse non nisi sit amet nulla mattis molestie. Suspendisse imperdiet lacus vel sapien convallis, quis tristique libero gravida. Aenean sed suscipit tortor, eget vulputate elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi vulputate nunc at pharetra congue. Praesent porttitor velit feugiat nibh pulvinar vulputate. Fusce suscipit neque at tempus dapibus.</p>\r\n\r\n<p>Sed ultrices diam ante, vitae aliquam leo faucibus vitae. Nam et malesuada libero. Integer convallis porttitor tortor, ac consequat libero volutpat ac. Mauris euismod, elit vitae sagittis condimentum, quam sem pulvinar mi, sed tempor neque eros vitae quam. Quisque semper ante non lacinia ultricies. Donec imperdiet, sapien vitae iaculis suscipit, massa metus porttitor elit, at fringilla mauris odio sit amet est. Curabitur sit amet luctus libero, eget sollicitudin nulla. In a pellentesque lorem. In accumsan lectus diam, sit amet interdum tortor tincidunt et. Duis sit amet iaculis mi, vel mattis enim. Ut gravida urna nec leo faucibus tempor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas pellentesque elit id tellus dignissim ultricies. Morbi nec dolor in leo euismod accumsan vel sit amet metus.</p>\r\n\r\n<p>Maecenas ut est vel ipsum mattis sagittis. Mauris quis neque ligula. Proin turpis enim, vehicula ac blandit in, ullamcorper sit amet metus. Ut semper tempus diam nec convallis. Ut pretium, dolor non lacinia viverra, augue odio tempus nunc, eu ullamcorper lectus diam vitae erat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas a mi et tortor tincidunt ullamcorper. Curabitur sed neque semper, fringilla justo quis, sollicitudin sem. In placerat fringilla diam, sed bibendum tellus congue euismod. Suspendisse vulputate lorem quam. Ut elementum, est ut ullamcorper tristique, velit lectus gravida neque, in accumsan eros enim in dui. Curabitur non congue metus, id ultrices diam.</p>\r\n', '2015-12-22 04:13:52', '2015-12-22 04:13:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(250) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `created`, `modified`) VALUES
(1, 'Administrator', '2015-12-07 08:47:17', '2015-12-07 08:49:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `image_rolls`
--

CREATE TABLE IF NOT EXISTS `image_rolls` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `image_dir` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `image_rolls`
--

INSERT INTO `image_rolls` (`id`, `image`, `image_dir`, `created`, `modified`) VALUES
(2, '1.jpg', '2', '2015-12-23 05:54:25', '2015-12-23 05:54:25'),
(3, '2.jpg', '3', '2016-01-11 06:13:20', '2016-01-11 06:13:20'),
(4, '3.jpg', '4', '2016-01-11 06:15:00', '2016-01-11 06:15:00'),
(5, '4.jpg', '5', '2016-01-11 06:15:42', '2016-01-11 06:15:42'),
(6, '5.jpg', '6', '2016-01-11 06:23:55', '2016-01-11 06:23:55'),
(7, '6.jpg', '7', '2016-01-11 06:24:31', '2016-01-11 06:24:31'),
(8, '7.jpg', '8', '2016-01-11 06:39:20', '2016-01-11 06:39:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `product_group_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_type_id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `origin_product` varchar(260) DEFAULT NULL,
  `serial_number` text NOT NULL,
  `price` int(11) NOT NULL,
  `product_condition` int(1) NOT NULL DEFAULT '1',
  `status` int(1) NOT NULL DEFAULT '1',
  `status_baru` int(1) NOT NULL DEFAULT '1' COMMENT '1 :lama 2: baru',
  `other_info` text NOT NULL,
  `cover` text NOT NULL,
  `cover_dir` text NOT NULL,
  `position` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `product_group_id`, `product_category_id`, `brand_id`, `product_type_id`, `product_name`, `origin_product`, `serial_number`, `price`, `product_condition`, `status`, `status_baru`, `other_info`, `cover`, `cover_dir`, `position`, `created`, `modified`) VALUES
(1, 2, 5, 4, 2, 'A4000i', 'Sweden', '2109571209579012', 0, 1, 2, 1, '<p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.</p>\r\n\r\n<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec ullamcorper nulla non metus auctor fringilla.</p>\r\n\r\n<p>Maecenas sed diam eget risus varius blandit sit amet non magna. Donec id elit non mi porta gravida at eget metus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>\r\n', '1.jpg', '1', NULL, '2015-12-21 03:26:01', '2015-12-21 03:34:02'),
(2, 2, 5, 4, 3, 'R6 ', 'Jepang', '1234567890', 0, 1, 2, 1, '<p>With full charge, R6 can go as far as 100km Terra Motors has developed the electronic components especially battery, controller, charger and motor to achieve this performance.</p>\r\n\r\n<h3>Compact, Light and Spacious</h3>\r\n\r\n<p>We design the experience for drivers and passengers.</p>\r\n\r\n<h3>Japanese Standard</h3>\r\n\r\n<p>Terra Motors carefully inspected and selected components with Japanese quality standard to provide the best lectric three-wheeler in the world.<br />\r\nR6 has been tested in India many times for the durability.</p>\r\n\r\n<h3>Saving Your Money</h3>\r\n\r\n<p>One of the benefits of &ldquo;Electric Three wheeler&rdquo; is its superb energy efficiency. Drivers can save their daily expenses and take more income to their homes. Try the cost comparison table below. You will be surprised.</p>\r\n\r\n<h3>Reverse running function</h3>\r\n\r\n<p>Easy to return, easy to park.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '1.png', '2', NULL, '2015-12-21 05:23:33', '2015-12-21 05:23:33'),
(3, 2, 5, 4, 2, 'A2000', 'Jepang', '1234567890', 0, 1, 2, 1, '<h3>Enjoy color in your e-scooter life</h3>\r\n\r\n<p>We prepared 3 different colors for A2000.<br />\r\nIn addition to White of A4000i, you can choose Dark-blue or red as your favorite.</p>\r\n\r\n<h3>The best e-scooter with high-grade but reasonable price in the world</h3>\r\n\r\n<h3>This is Authentic</h3>\r\n\r\n<p>A powerful motor allows rapid acceleration up steep inclines.<br />\r\nA strength of the e-scooter is our focus on developing quick acceleration.<br />\r\nWe promise a fantastic and unique user experience.</p>\r\n\r\n<h3>Japanese Quality</h3>\r\n\r\n<p>Top tier engineers have invested many years in the design and development of the EV. The e-scooter will be manufactured to the highest Japanese standards of quality.</p>\r\n\r\n<p><br />\r\nWe promise you an exciting, unique and comfortable driving experience on the highest quality e-scooter available.</p>\r\n\r\n<h3>Saving Your Money</h3>\r\n\r\n<p>One of the benefits of using an e-scooter is reducing your expenses.<br />\r\nE-scooters are not only environmental friendly but also financially friendly.<br />\r\nTry the calculation convertor below and compare your expense using an e-scooter vs a traditional gasoline scooter.<br />\r\nYou will be surprised at the result!</p>\r\n', '2.png', '3', NULL, '2015-12-21 05:40:36', '2015-12-21 05:40:36'),
(4, 2, 5, 4, 2, 'S750', 'Jepang', '1234567890', 0, 1, 2, 1, '<h3>Enjoy color in your e-bike life</h3>\r\n\r\n<p>We prepared 3 colors same as A2000, White, Dark-Blue and Red.<br />\r\nLet&#39;s make difference with your friends.</p>\r\n\r\n<h3>This is the real e-bike</h3>\r\n\r\n<p>A powerful motor allows rapid acceleration up steep inclines. A strength of the e-bike is our focus on developing quick acceleration. We promise a fantastic and unique user experience.</p>\r\n\r\n<h3>This is why E-bike not E-scooter</h3>\r\n\r\n<p>Don&#39;t worry out of battery. You can use pedal and it allows you to go anywhere.</p>\r\n\r\n<h3>Fashionable and High Technology</h3>\r\n\r\n<p>Put the fashionable digital meter. Very clear to see the speed and distance at one sight.</p>\r\n\r\n<h3>Remove and Charge your Battery</h3>\r\n\r\n<p>You can easily remove and carry the Terra Battery for charging.<br />\r\nThis is useful for users with no electrical outlet in their residential parking area.</p>\r\n', '2.png', '4', NULL, '2015-12-21 05:43:27', '2015-12-21 05:43:27'),
(5, 2, 5, 4, 2, 'BIZMO II', 'Jepang', '1234567890', 0, 1, 2, 1, '<h2>The best two wheeler design for cargo application</h2>\r\n\r\n<p><img alt="bizmo base model" src="http://www.terra-motors.com/top/wp-content/themes/com%3Aen/images/bizmo/bizmo-basemodel01.jpg" style="height:313px; width:455px" /></p>\r\n\r\n<p>The motorcycle for business use requires a different frame design from general vehicle because it stacks a lot of luggage. We realized tough mainframe durability by taking advantage of the steel pipe. Rear deck is located in the low position, it will hold the fluctuation at the time of loading. You can equip with a career or the large basket and BOX as option parts. Also, it&#39;s side stand is able to endure heavy burden. For electric vehicle it is important where the battery is mounted, because it greatly affects the body balance. The battery is located in on the rear swing arm pivot, we have to optimize the mass balance of the vertical and the front and rear left and right. Basic design of the frame to configure the core of all the performance elements. It is BIZMOâ…¡ that was to achieve an optimal design of a small two-wheeled vehicles in cargo applications.</p>\r\n\r\n<p><img alt="" src="http://www.terra-motors.com/top/wp-content/themes/com%3Aen/images/bizmo/bizmo-basemodel01option.jpg" style="height:135px; width:431px" /></p>\r\n\r\n<h2>We realized the cruising distance 150km by 1 charge<br />\r\nNewly developed three elements lithium-ion high-capacity battery</h2>\r\n\r\n<p><img alt="bizmo base model" src="http://www.terra-motors.com/top/wp-content/themes/com%3Aen/images/bizmo/bizmo-battery01.jpg" style="height:307px; width:388px" /></p>\r\n\r\n<p>Battery is the most important factor for good performance of electric vehicle. For good performance it requires High-output, large-capacity and stability. Then we choose Lithium battery that is to become the current state-of-the-art &quot;three elements lithium-ion battery&quot;. A nickel-cobalt-manganese is mixed in optimum composition, output, capacity, and stability is the ideal form of automotive lithium-ion cathode material, which was achieved at a high level. BIZMOâ…¡is loaded this amazing sophisticated battery that 72V44Ah (3168Wh). This is a typical 3.3-fold capacity compared to 48V20Ah. The practical application of this large capacity battery, it was realized mileage comparable to gasoline vehicles of one charge = 150km. Dedicated charger large type that outputs the 72V5A from 100V power supply, the charging time is 5-9 hours and a short period of time.<br />\r\nâ€»30km/h</p>\r\n\r\n<p><img alt="" src="http://www.terra-motors.com/top/wp-content/themes/com%3Aen/images/bizmo/bizmo-basemodel01option2.jpg" style="height:135px; width:431px" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>You can save plenty of money by riding on BIZMOâ…¡</h2>\r\n\r\n<p><img alt="" src="http://www.terra-motors.com/top/wp-content/themes/com%3Aen/images/bizmo/bizmo-nenpi01.gif" style="height:633px; width:910px" /></p>\r\n\r\n<p>Fuel of electric bike is only &quot;electricity&quot;. You can easily charge in your home. You need not to take trouble to go to the gas station. Battery of BIZMOâ…¡ completed charging in about a maximum of eight hours, once fully charged you can run 150km. In common, the distance people drive in a day is said to 50km or less. BIZMOâ…¡ it will be referred to as possible on a single charge in three days, saving fuel costs (electric bill) significantly.</p>\r\n\r\n<p>In addition, it comes from very simple parts so you need not to change oil and plague. The durability of Motor and Controller secured more than 30 000 km, as long as it is a common use, there is no need for exchange in less than three years. BIZMOâ…¡ I an electric bike that can significantly reduce the running cost.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Laminated type display electric fuel gauge</h2>\r\n\r\n<p><img alt="" src="http://www.terra-motors.com/top/wp-content/themes/com%3Aen/images/bizmo/bizmo-meter01.jpg" style="height:164px; width:199px" /></p>\r\n\r\n<p>Many of the electric bike until now, it had to display the electricity remaining in the voltmeter. It is hard to grasp exact amount of remaining charge. The BIZMOâ…¡ have adopted an electric fuel gauge on-board power management system of the battery linked was realized &quot;current amount integrated expressions&quot;. Making it possible to grasp the exact remaining. In addition, the display is the new high-intensity type of visibility is ensured high even under direct sunlight in digital.</p>\r\n\r\n<h2>Traveling mode is freely from energy saving in three types to high-speed driving</h2>\r\n\r\n<p><img alt="" src="http://www.terra-motors.com/top/wp-content/themes/com%3Aen/images/bizmo/bizmo-motor01.jpg" style="height:164px; width:167px" /></p>\r\n\r\n<p>72V power is to achieve a high torque, the running of the hill does not bother in the loading state. In addition, the motor is added to the regeneration function, by returning the electrical energy during wheel rotation into a battery with no load, providing distraction mileage.</p>\r\n', '2.jpg', '5', NULL, '2015-12-21 05:45:36', '2015-12-21 05:45:36'),
(8, 6, 6, 5, 4, 'Q6015 Potain Tower Crane', 'Indonesia', '1234567890', 0, 1, 2, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In fringilla ullamcorper tellus at dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eget tempor ante. Donec non tristique magna, nec interdum tellus. In non metus at urna sollicitudin ultrices. Nullam porttitor, velit nec congue accumsan, est purus faucibus est, in egestas augue dui varius nisi. Nunc cursus nisl ut risus feugiat blandit. Sed ac dapibus nisi. Donec convallis lacus eget nulla lacinia, a convallis ex mattis.</p>\r\n\r\n<p>Ut volutpat libero vitae laoreet consequat. Phasellus malesuada non erat non ornare. Mauris eu consectetur neque, at hendrerit mauris. Sed ultrices nulla rutrum, posuere mauris eu, tincidunt mi. Etiam eu dictum ante. Proin ultricies ex vel quam sodales, congue interdum quam convallis. Cras hendrerit vulputate felis. Phasellus dignissim arcu urna, quis placerat neque hendrerit eget. Aliquam commodo mattis aliquet.</p>\r\n\r\n<p>Praesent convallis convallis felis, id sollicitudin sapien efficitur eget. Pellentesque urna risus, posuere sit amet semper a, maximus eu augue. Donec mi odio, rutrum vitae quam sagittis, posuere eleifend dui. Suspendisse potenti. Proin ex lorem, consectetur et interdum sit amet, bibendum ut nulla. Phasellus ac dapibus sem. Maecenas arcu odio, iaculis ut elit eu, maximus condimentum lectus.</p>\r\n\r\n<p>Sed gravida accumsan dapibus. Phasellus iaculis pulvinar quam, at eleifend dolor blandit quis. Morbi aliquam et magna quis faucibus. Vivamus eu metus vitae est viverra faucibus. Donec imperdiet, velit eu tempus pellentesque, lorem mauris dignissim quam, a rhoncus est dui vitae lacus. Vivamus ipsum tortor, malesuada id viverra sed, convallis ut quam. In faucibus interdum tortor vitae scelerisque. Curabitur mollis erat in orci porttitor, nec pulvinar sapien efficitur.</p>\r\n\r\n<p>Pellentesque lacinia eros ut ornare consectetur. Nulla erat nibh, congue ultrices magna eu, consectetur laoreet tortor. Proin eget convallis tortor. Sed augue lorem, vulputate eget lectus sit amet, semper mollis massa. Nunc mollis nisi ut elit convallis consequat. Donec consequat viverra sapien sed aliquet. Aliquam eget finibus sapien. Aenean magna tellus, tristique vitae enim eu, lobortis iaculis felis. Nam luctus tempor elit vitae cursus. Vestibulum tincidunt porttitor malesuada. Donec pulvinar tincidunt magna non rhoncus. Vivamus dignissim tortor in pellentesque luctus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus egestas a nisi efficitur porttitor.</p>\r\n', 'Q6015-A-1-500x506.jpg', '8', NULL, '2015-12-22 07:59:39', '2015-12-22 07:59:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_categories`
--

CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` int(11) NOT NULL,
  `product_group_id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product_categories`
--

INSERT INTO `product_categories` (`id`, `product_group_id`, `category_name`, `created`, `modified`) VALUES
(1, 1, 'Compressor/Generator', '2015-12-07 08:09:10', '2015-12-07 08:09:27'),
(2, 1, 'Buldozer', '2015-12-14 08:53:37', '2015-12-14 08:53:37'),
(3, 1, 'Crawler Dumper', '2015-12-14 08:54:05', '2015-12-14 08:54:05'),
(4, 1, 'Trailers', '2015-12-14 08:54:34', '2015-12-14 08:54:43'),
(5, 2, 'Electric Motorcycle', '2015-12-14 08:54:59', '2015-12-14 08:54:59'),
(6, 6, 'Crane', '2015-12-22 06:00:47', '2015-12-22 06:00:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_groups`
--

CREATE TABLE IF NOT EXISTS `product_groups` (
  `id` int(11) NOT NULL,
  `group_name` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product_groups`
--

INSERT INTO `product_groups` (`id`, `group_name`, `created`, `modified`) VALUES
(1, 'JML Rent', '2015-12-10 08:46:37', '2015-12-14 08:51:09'),
(2, 'JML EV', '2015-12-14 08:51:20', '2015-12-14 08:51:20'),
(3, 'JML Trans', '2015-12-14 08:51:29', '2015-12-14 08:51:29'),
(4, 'JML Equip', '2015-12-14 08:51:44', '2015-12-14 08:51:44'),
(5, 'JML Parts', '2015-12-14 08:52:02', '2015-12-14 08:52:18'),
(6, 'JML Crane', '2015-12-22 05:50:27', '2015-12-22 05:50:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_images`
--

CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `image_dir` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `image_dir`, `created`, `modified`) VALUES
(1, 1, '2.jpg', '1', '2015-12-21 03:35:40', '2015-12-21 03:35:40'),
(2, 1, '3.jpg', '2', '2015-12-21 05:49:20', '2015-12-21 05:49:20'),
(3, 1, '4.png', '3', '2015-12-21 05:49:33', '2015-12-21 05:49:33'),
(4, 1, '5.jpg', '4', '2015-12-21 05:49:47', '2015-12-21 05:49:47'),
(5, 2, '2.png', '5', '2015-12-21 05:57:11', '2015-12-21 05:57:11'),
(6, 2, '3.png', '6', '2015-12-21 05:57:22', '2015-12-21 05:57:22'),
(7, 2, '4.png', '7', '2015-12-21 05:57:37', '2015-12-21 05:57:37'),
(8, 2, '5.png', '8', '2015-12-21 05:57:49', '2015-12-21 05:57:49'),
(9, 2, '6.png', '9', '2015-12-21 05:58:19', '2015-12-21 05:58:19'),
(10, 2, '7.png', '10', '2015-12-21 05:58:34', '2015-12-21 05:58:34'),
(11, 2, '8.png', '11', '2015-12-21 05:58:49', '2015-12-21 05:58:49'),
(16, 4, '1.png', '16', '2015-12-21 06:40:17', '2015-12-21 06:40:17'),
(17, 4, '3.png', '17', '2015-12-21 06:40:34', '2015-12-21 06:40:34'),
(18, 4, '4.png', '18', '2015-12-21 06:42:25', '2015-12-21 06:42:25'),
(19, 4, '5.png', '19', '2015-12-21 06:42:36', '2015-12-21 06:42:36'),
(20, 5, '1.jpg', '20', '2015-12-21 06:43:21', '2015-12-21 06:43:21'),
(21, 5, '3.jpg', '21', '2015-12-21 06:43:33', '2015-12-21 06:43:33'),
(22, 5, '4.jpg', '22', '2015-12-21 06:43:46', '2015-12-21 06:43:46'),
(23, 5, '5.jpg', '23', '2015-12-21 06:44:01', '2015-12-21 06:44:01'),
(24, 5, '6.jpg', '24', '2015-12-21 06:44:12', '2015-12-21 06:44:12'),
(25, 5, '7.jpg', '25', '2015-12-21 06:44:23', '2015-12-21 06:44:23'),
(27, 3, '1.png', '27', '2015-12-21 07:13:33', '2015-12-21 07:13:33'),
(28, 3, '3.png', '28', '2015-12-21 07:13:45', '2015-12-21 07:13:45'),
(29, 3, '4.png', '29', '2015-12-21 07:14:02', '2015-12-21 07:14:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_types`
--

CREATE TABLE IF NOT EXISTS `product_types` (
  `id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `type_name` varchar(250) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product_types`
--

INSERT INTO `product_types` (`id`, `product_category_id`, `brand_id`, `type_name`, `created`, `modified`) VALUES
(1, 1, 2, 'Test aja', '2015-12-07 08:34:23', '2015-12-07 08:37:00'),
(2, 5, 4, 'E Scooter', '2015-12-15 11:16:16', '2015-12-15 11:16:34'),
(3, 5, 4, 'E-3 Wheels', '2015-12-21 05:17:43', '2015-12-21 05:17:43'),
(4, 6, 5, ' Potain Tower Crane ', '2015-12-22 07:47:14', '2015-12-22 07:47:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `fullname` varchar(26) NOT NULL,
  `last_login` datetime NOT NULL,
  `status_active` int(1) NOT NULL DEFAULT '1' COMMENT '1 : Non-Active 2 : Active',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `group_id`, `username`, `password`, `fullname`, `last_login`, `status_active`, `created`, `modified`) VALUES
(2, 1, 'abdulahwahdi', 'ccc167a5cf66ac55bec6c55ffeb715e0a234c3e36c61b5e9dc7ec27c9dfd8bfd', 'abdulahwahdi', '2015-12-08 17:13:50', 2, '2015-12-08 11:13:50', '2015-12-08 11:13:50'),
(3, 1, 'admin', 'ccc167a5cf66ac55bec6c55ffeb715e0a234c3e36c61b5e9dc7ec27c9dfd8bfd', 'Administrator', '2016-01-19 14:37:21', 2, '2016-01-19 08:37:21', '2016-01-19 08:37:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `web_settings`
--

CREATE TABLE IF NOT EXISTS `web_settings` (
  `id` int(11) NOT NULL,
  `key_setting` varchar(250) NOT NULL,
  `value_setting` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `web_settings`
--

INSERT INTO `web_settings` (`id`, `key_setting`, `value_setting`, `created`, `modified`) VALUES
(36, 'localisation.address', '<p>PT. JAYA MIMIKA LESTARI</p>\r\n\r\n<p>Head Office :JML-graha Komplek Gading Bukit Indah Blok U18-U19.<br />\r\nKelapa Gading, Jakarta 14240 - Indonesia.<br />\r\nPhone: +62-21-45844453 / 54, +62-21-29574215 / 16<br />\r\nFax: +62-21-45846856; +62-21-45850958<br />\r\nEmail : mimika@cbn.net.id</p>\r\n\r\n<p>Workshop : Jalan Raya Pantai Makmur No.41,Marunda<br />\r\nPhone : +62-21-70934453; Fax: +62-21-88991111</p>\r\n\r\n<p>Show-room@Jurumudi : Jl. Husein Sastranegara no.44. Jakarta.<br />\r\nPhone : +62-21-44202404; +62-21-29405950<br />\r\nFax: +62-21-29405951<br />\r\n(Close to Airport Soekarno-Hatta - Jakarta)</p>\r\n', '2015-12-30 07:39:33', '2016-01-19 05:12:58'),
(37, 'meta.keyword', 'jaya mimika lestari, jml, mimika, jaya, lestari', '2015-12-30 07:39:33', '2016-01-19 05:12:58'),
(38, 'meta.description', 'Website resmi PT Jaya Mimika Lestari', '2015-12-30 07:39:33', '2016-01-19 05:12:58'),
(39, 'Medsos.facebook', 'http://facebook.com/jmlgroup', '2015-12-30 07:39:33', '2016-01-19 05:12:58'),
(40, 'Medsos.twitter', 'http://twitter.com/jmlgroup', '2015-12-30 07:39:33', '2016-01-19 05:12:58'),
(41, 'Medsos.ig', 'http://insagram.com/jmlgroup', '2015-12-30 07:39:33', '2016-01-19 05:12:58'),
(42, 'Medsos.gplus', 'http://google.com/+jmlgroup', '2015-12-30 07:39:33', '2016-01-19 05:12:58'),
(43, 'Site.logo', '', '2015-12-30 07:39:33', '2016-01-19 05:12:58'),
(44, 'email.mimika', 'awahdi@global-tech.co.id', '2016-01-04 08:17:25', '2016-01-19 05:12:58'),
(45, 'email.group', 'awahdi@global-tech.co.id', '2016-01-05 03:32:18', '2016-01-19 05:12:58'),
(46, 'email.javasindo', 'awahdi@global-tech.co.id', '2016-01-05 03:32:18', '2016-01-19 05:12:58'),
(47, 'email.langgeng', 'awahdi@global-tech.co.id', '2016-01-05 03:32:18', '2016-01-19 05:12:58'),
(48, 'email.machindo', 'awahdi@global-tech.co.id', '2016-01-05 03:32:18', '2016-01-19 05:12:58'),
(49, 'youtube.link', 'https://www.youtube.com/embed/reb-aOJrGOY?feature=oembed', '2016-01-19 05:12:58', '2016-01-19 05:12:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_contacts`
--
ALTER TABLE `data_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pages`
--
ALTER TABLE `data_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_rolls`
--
ALTER TABLE `image_rolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_groups`
--
ALTER TABLE `product_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_settings`
--
ALTER TABLE `web_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `data_contacts`
--
ALTER TABLE `data_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `data_pages`
--
ALTER TABLE `data_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `image_rolls`
--
ALTER TABLE `image_rolls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product_groups`
--
ALTER TABLE `product_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `web_settings`
--
ALTER TABLE `web_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
