-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 13, 2021 at 05:42 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `customer_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`customer_id`, `product_id`, `quantity`) VALUES
(24, 28, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(128) DEFAULT NULL,
  `last_name` varchar(128) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone_number` varchar(128) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `currency` text,
  `card_number` text,
  `orders` int(11) NOT NULL,
  `search_history` text,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `type` enum('seller','customer') NOT NULL,
  `problem` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `address`, `phone_number`, `city`, `currency`, `card_number`, `orders`, `search_history`, `email`, `password`, `type`, `problem`) VALUES
(22, 'Salma', 'Sherif', 'glem', '12345678910', 'alex', 'egp', '', 10, '12,,18,10', 'csev@umich.edu', '4f743434baf96bd084e47b6d52fcb927', 'customer', NULL),
(23, 'Ahmed', 'Mohamed', NULL, NULL, NULL, NULL, NULL, 0, NULL, 'ah@gmail.com', '6eb434d73be05fd8d282ad6934feeb0b', 'customer', NULL),
(24, 'mohamed', 'Ahmed', 'misr el gedida', '01234567890', 'cairo', 'egp', '1234567899874511', 9, ',67', 'mohamed@gmail.com', 'b4eeadeb2b059eea0081cf8b7848a0b0', 'customer', NULL),
(25, 'Nadin', 'ww', NULL, NULL, NULL, NULL, NULL, 0, NULL, 'vdv@gm.com', '4f743434baf96bd084e47b6d52fcb927', 'customer', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE `problems` (
  `id` int(11) NOT NULL,
  `email` varchar(225) DEFAULT NULL,
  `problems` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`id`, `email`, `problems`) VALUES
(4, 'vdv@gm.com', 'efefe'),
(5, 'vdv@gm.com', 'ddw'),
(6, 'vdv@gm.com', 'xadd'),
(7, 'vdv@gm.com', 'sfwf'),
(8, 'vdv@gm.com', 'dwd'),
(9, 'vdv@gm.com', 'xaxax'),
(10, 'vdv@gm.com', 'khk'),
(11, 'vdv@gm.com', 'dwd'),
(12, 'vdv@gm.com', 'I have a problem!!');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `name` char(225) NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `category` varchar(225) NOT NULL,
  `count` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` mediumblob NOT NULL,
  `checked` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `seller_id`, `name`, `description`, `keywords`, `category`, `count`, `price`, `image`, `checked`) VALUES
(9, 3, 'black jeans', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'black jeans', 'women-clothes', 5, 200, 0x626c61636b206a65616e732e706e67, 0),
(10, 3, 'mint green vist', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'mint green vist', 'women-clothes', 5, 150, 0x6d696e7420677265656e20766973742e706e67, 0),
(11, 3, 'black skirt', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'black skirts', 'women-clothes', 4, 150, 0x626c61636b2d736b6972742e706e67, 1),
(12, 3, 'Marron pullover', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Marron pullover', 'women-clothes', 5, 100, 0x6d6172726f6e2070756c6c6f7665722e706e67, 0),
(13, 3, 'grey jacket', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'grey jacket', 'women-clothes', 5, 300, 0x677265792d6a61636b65742e706e67, 0),
(14, 3, 'Mom-fit jeans', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Mom-fit jeans', 'women-clothes', 5, 200, 0x6d6f6d6669742e706e67, 0),
(15, 3, 'Orange chemise', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Orange chemise', 'women-clothes', 4, 250, 0x4f72616e67652d6368656d6973652e706e67, 1),
(16, 3, 'Neck Dress - Grey', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Neck Dress - Grey ', 'women-clothes', 5, 350, 0x3133373430343630395f3331343337323238333239313534345f383233373530323733383534313932363438395f6e2e706e67, 0),
(17, 3, 'sport racing wheel', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'sport racing wheel', 'toys', 5, 1000, 0x3133313033313034325f313830363432303736363138333933395f383630333531373031323036373732313037325f6e2e706e67, 0),
(18, 3, 'Controller play Station4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Controller play Station4', 'toys', 5, 600, 0x3133313034383034325f3430343237373835303931343830355f3839323534373439383839323238333931365f6e2e706e67, 0),
(19, 3, 'Nintendo Joy', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Nintendo Joy', 'toys', 5, 2000, 0x3133303839353037315f3435393933303334323037303834395f313031343734383833323437313436353332305f6e2e706e67, 0),
(20, 4, 'Wii Gaming console', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Wii Gaming console', 'toys', 5, 1300, 0x3133303930373638395f3330333836303131373536323937315f323539333937363234333636353633343739375f6e2e706e67, 0),
(21, 3, 'Sony Play Station 4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Sony Play Station 4', 'toys', 5, 6000, 0x3133313032393133375f3133303331323238383734393534325f343232393533323430363839363337353231345f6e2e706e67, 0),
(22, 3, 'Sony Play Station 5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Sony Play Station 5', 'toys', 5, 20000, 0x3133313137313136365f3339353138383830383537333130315f383637393738393533383636303331393635355f6e2e706e67, 0),
(23, 3, 'Sup 400', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Sup 400', 'toys', 5, 250, 0x3133303930303537355f333436343132343739333730343235375f343032303133313330363735313637333835335f6e2e706e67, 0),
(24, 3, 'Microsoft X-box', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Microsoft X-box', 'toys', 5, 3300, 0x3133313033323331385f3434373332303832363634393033395f383238343534333533353838363338323830325f6e2e706e67, 0),
(25, 3, 'Basket Tray', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Basket Tray', 'home and office', 5, 200, 0x3133313038363934345f3639343935333037313136373936395f353138333733313332343936343532393437335f6e2e706e67, 0),
(26, 3, 'Compact high security motorized- black', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Compact high security motorized- black', 'home and office', 5, 2000, 0x3133313332363032395f3139393031323035353139343931355f313338303139363032373231383230393838315f6e2e706e67, 0),
(27, 3, 'Coffee Maker', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'coffee maker', 'home and office', 5, 500, 0x3133313135353632335f3432393137333432313434393230325f353931313536363238383233393835373937385f6e2e706e67, 0),
(28, 3, 'Wall Shelf', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Wall Shelf', 'home and office', 5, 100, 0x3133303931333133375f3134323335363831373339363137325f333333373037393836333932323437353139375f6e2e706e67, 0),
(29, 3, 'Office Chair', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'office chair', 'home and office', 7, 1000, 0x3133303839383839375f3138353430373839333331323136345f3930323836383031353335363131393237395f6e2e706e67, 0),
(30, 3, 'Gallery modern tableau', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'gallery modern tableau', 'home and office', 8, 70, 0x3133303933303131395f3330313335303037343533323633375f343233393139343633323330383932373532385f6e2e706e67, 0),
(31, 3, 'Desk Lamp', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Desk Lamp', 'home and office', 3, 110, 0x3133313234333637345f3134343536383234333739363037345f37323032373831393532383137393338365f6e2e706e67, 0),
(32, 3, 'Wooden Key Rack', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Wooden Key Rack', 'home and office', 6, 150, 0x3133313239343139355f313031393634313033353231323430335f383039323030363935343538353431383039365f6e2e706e67, 0),
(33, 3, 'Baby Bed', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Baby Bed', 'baby-care', 4, 1000, 0x3133313131373238335f3735363938393936383439373036355f313737363232373433363136373139343637395f6e2e706e67, 0),
(34, 3, 'Baby Car Seat', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Baby Car Seat', 'baby-care', 7, 2200, 0x3133313331303037305f323531373338373336353232313134315f323034383538353537323336343433363337365f6e2e706e67, 0),
(35, 3, 'Foam corner guards', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Foam corner guards', 'baby-care', 5, 90, 0x3133303932373631325f323834363339353832353638323630305f363935383237303531353630373135313336305f6e2e706e67, 0),
(36, 3, 'Baby Food Chair', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Baby Food Chair', 'baby-care', 5, 1800, 0x3133313032323839355f3834383636393736323538313537355f383039323938313939383134393732373733355f6e2e706e67, 0),
(37, 3, 'Anti-Lost Bracelet', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Anti-Lost Bracelet', 'baby-care', 1, 60, 0x3133313133313632395f3230373932313632303836353932325f373333373533323637393637373738393731325f6e2e706e67, 1),
(38, 3, 'Electronic baby rocking swing', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Electronic baby rocking swing', 'baby-care', 5, 3000, 0x3133303835383433335f313037373530313235363031383036395f363439393038333837333935363636323930325f6e2e706e67, 0),
(39, 3, 'Rocking Chair', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Rocking Chair', 'baby-care', 5, 1800, 0x3133313235363131335f3338323937333638393636353135335f3539383136393732373532333035353231365f6e2e706e67, 0),
(40, 3, 'baby bottle', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'baby bottle', 'baby-care', 5, 150, 0x3133303937353931365f3730313730373133303738313638365f343637373539333237353131303537313239325f6e2e706e67, 0),
(41, 3, 'Headphones', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Headphones', 'electronics', 5, 500, 0x3133313035333439305f3338373737333633323534303138375f373838393830373732333537313535333537385f6e2e706e67, 0),
(42, 3, 'Bluetooth lightning Speaker', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Bluetooth lightning Speaker', 'electronics', 5, 70, 0x3133313037343031315f3737363736393633323930363730345f3232333136353030323131313135323230325f6e2e706e67, 0),
(43, 3, 'Canon Camera', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Canon Camera', 'electronics', 3, 3500, 0x3133313038383934355f3638323230353338393037333938335f323938383234383137303131383334363933345f6e2e706e67, 2),
(44, 3, 'Airpodes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Airpodes', 'electronics', 5, 30, 0x3133313037343732375f3232323733393239323736393537355f393136393033313236393230393632323834335f6e2e706e67, 0),
(45, 3, 'Studio series speaker', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Studio series speaker', 'electronics', 7, 30000, 0x3133303833373431305f3735343037323939313835333735325f323230323636303033353138303239323832325f6e2e706e67, 0),
(46, 5, 'Mini reciever with USB WIFI', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Mini reciever with USB WIFI', 'electronics', 5, 250, 0x3133313032393035315f3434353330333737333136313638355f313331323334373139363038393933353032355f6e2e706e67, 0),
(47, 5, 'Samsung UAT853211', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Samsung UAT853211', 'electronics', 5, 8000, 0x3133313039323839315f313037393530333132323531323135395f3638383531373031333434343133323933355f6e2e706e67, 0),
(49, 5, 'Wirless Microphone', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Wirless Microphone', 'electronics', 5, 150, 0x3133303937353832365f3232373936363230353337353338325f363232313635343639343633353031313735385f6e2e706e67, 0),
(50, 5, 'Earing Leaves', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Earing Leaves', 'accessories', 5, 1100, 0x3133373232383435385f333931303839373538323237343334315f333736363936393038353039353333343432375f6e2e706e67, 0),
(51, 5, 'Diamonds women\'s ring', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Diamonds women\'s ring', 'accessories', 5, 150, 0x3133373234303538385f3135373939363633353832333834395f323137383836323732333933333536333531355f6e2e706e67, 0),
(52, 5, 'Elegant Earings', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Elegant Earings', 'accessories', 5, 70, 0x3133373532313737385f353332303736343231343630313230315f3430333932353930333337333639303236315f6e2e706e67, 0),
(54, 5, 'L\'azurdi Elegant Necklace', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'L\'azurdi Elegant Necklace', 'accessories', 5, 1160, 0x3133373531373435305f3231393632303334363336393536355f373830303137323335363232363936323637335f6e2e706e67, 0),
(55, 5, 'L\'azurdi Gold Bracelet', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'L\'azurdi Gold Bracelet', 'accessories', 5, 1700, 0x3133373237373336365f3432353939373036383532323233355f363030303031363036303832363037363331335f6e2e706e67, 0),
(56, 5, 'L\'azurdi Heart Chain', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'L\'azurdi Heart Chain', 'accessories', 5, 1700, 0x3133383038383736305f313336323032393435373438333330305f343034393835353732323638393735393134385f6e2e706e67, 0),
(57, 5, 'Crystal Bracelet', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Crystal Bracelet', 'accessories', 5, 20, 0x3133383532313235305f3730323937313338333732353932345f353238363436373234363134353230353031325f6e2e706e67, 0),
(58, 5, 'L\'azurdi Ansial', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'L\'azurdi Ansial', 'accessories', 5, 1200, 0x3133373338323339345f333630363433353835363037313730395f343239393135333035343836313838373339385f6e2e706e67, 0),
(59, 4, 'Amanda Eye Liner', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Amanda Eye Liner', 'Makeup', 5, 60, 0x3133373631303439365f313135343736303237343933393431345f353333343731333733323636333333373539365f6e2e706e67, 0),
(60, 4, 'Make-up Remover', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Make-up Remover', 'Makeup', 5, 40, 0x3133373532373638385f3332313733373538323431373031365f323630303433343733383832323435303533345f6e2e706e67, 0),
(61, 4, 'Orange Corrector', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Orange Corrector', 'Makeup', 9, 100, 0x3133383038383736315f3434383733303830333136323638345f373737363737353131393638343837313334375f6e2e706e67, 1),
(62, 4, 'Fit Me Foundation', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Fit Me Foundation', 'Makeup', 20, 125, 0x3133373333393331395f3230343430323530383032363837395f363932343832313132363835313535363736335f6e2e706e67, 0),
(63, 4, 'Matte Poreless Powder', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Matte Poreless Powder', 'Makeup', 4, 160, 0x3133383236373735365f3438333630363430323632343534325f373632313131303839363931363430313836365f6e2e706e67, 0),
(64, 4, 'Lip Color Palette', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Lip Color Palette', 'Makeup', 5, 200, 0x3133383039373234345f333638373738363439313236303130325f3431333331323336323534363339383838365f6e2e706e67, 0),
(65, 4, 'Liquid Lipstick', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Liquid Lipstick', 'Makeup', 5, 240, 0x3133373337373538345f3736323834383232313234393639335f3937383533383532333534353133333431355f6e2e706e67, 0),
(66, 4, 'Mascra Black', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'mascra black', 'Makeup', 7, 150, 0x3133373531363434325f3231353436313935303234393633325f313035343737353739323932383336303334395f6e2e706e67, 0),
(67, 3, 'Gabardine Pants - Black', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Gabardine Pants - Black', 'Men Clothes', 5, 140, 0x3133303330353839385f3432363837303430353136303035335f373230323033323737313631363730383936365f6e2e706e67, 0),
(68, 4, 'Gabardine Pants - Dark Grey', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Gabardine Pants - Dark Grey', 'Men Clothes', 5, 140, 0x3133303734323434375f313033363736353038303135343933325f373230363037303338323939333738333038325f6e2e706e67, 0),
(69, 4, 'Dipok Thinner', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Dipok Thinner', 'Men Clothes', 5, 190, 0x3133303735363536315f3338353930373532393431343530335f3531363033363937383931343432373937305f6e2e706e67, 0),
(70, 4, 'Tone hoodie', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Tone hoodie', 'Men Clothes', 5, 160, 0x3133303935393234305f3835313330353032383936313132365f323830363435393833353635323135303134315f6e2e706e67, 0),
(71, 4, 'Pump Jacket', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Pump Jacket', 'Men Clothes', 5, 300, 0x3133303937353334395f3337363136313335333634353832365f333035373637353930323031363033383036375f6e2e706e67, 0),
(72, 4, 'Round Neck T-shirt', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Round Neck T-shirt', 'Men Clothes', 5, 70, 0x3133303830303031385f323731323635313434383939383832365f3233323238353230393037303330363235335f6e2e706e67, 0),
(73, 4, 'Turkish Suit - Grey', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Turkish Suit - Grey', 'Men Clothes', 5, 3500, 0x3133313034393834325f3433353933323335313132383936355f383337313435343838303631323036313537305f6e2e706e67, 0),
(74, 4, 'Front Pocket zipped hoodie', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Front Pocket zipped hoodie', 'Men Clothes', 8, 140, 0x3133303731383531365f3636373536303433303539303032365f3332393735343333323937323832313036335f6e2e706e67, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `seller_id` int(11) NOT NULL,
  `first_name` varchar(128) DEFAULT NULL,
  `last_name` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `type` enum('seller','customer') NOT NULL,
  `problem` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`seller_id`, `first_name`, `last_name`, `email`, `password`, `type`, `problem`) VALUES
(3, 'Salma', 'Sherif', 'salmasherif294@gmail.com', '4f743434baf96bd084e47b6d52fcb927', 'seller', NULL),
(4, 'mariam', 'Sherif', 'na@gma.com', '4f743434baf96bd084e47b6d52fcb927', 'seller', NULL),
(5, 'shimaa', 'abdelAziz', 'sh@gm.com', '4f743434baf96bd084e47b6d52fcb927', 'seller', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `star_rating`
--

CREATE TABLE `star_rating` (
  `customer_id` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `star_rating`
--

INSERT INTO `star_rating` (`customer_id`, `id`, `rating`) VALUES
(22, 9, 4),
(24, 11, 3),
(24, 74, 4),
(22, 10, 4),
(24, 67, 4),
(22, 74, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `email` (`email`),
  ADD KEY `password` (`password`);

--
-- Indexes for table `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `SellerID` (`seller_id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`seller_id`),
  ADD KEY `email` (`email`),
  ADD KEY `password` (`password`);

--
-- Indexes for table `star_rating`
--
ALTER TABLE `star_rating`
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`seller_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `star_rating`
--
ALTER TABLE `star_rating`
  ADD CONSTRAINT `star_rating_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `star_rating_ibfk_2` FOREIGN KEY (`id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
