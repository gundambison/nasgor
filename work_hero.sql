-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 21, 2013 at 06:56 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `work_hero`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `itemid` int(11) NOT NULL AUTO_INCREMENT,
  `productid` varchar(20) NOT NULL,
  `listprice` varchar(20) NOT NULL,
  `unitcost` int(11) NOT NULL,
  `attr1` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemid`, `productid`, `listprice`, `unitcost`, `attr1`, `status`) VALUES
(1, 'a1', '21', 10, '2313', 1),
(2, 'a2', '22', 11, 'adasdas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `raja_category`
--

CREATE TABLE IF NOT EXISTS `raja_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_code` varchar(11) DEFAULT NULL,
  `cat_name` varchar(31) DEFAULT NULL,
  `cat_detail` text,
  `cat_parent` varchar(31) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `raja_counter`
--

CREATE TABLE IF NOT EXISTS `raja_counter` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raja_counter`
--

INSERT INTO `raja_counter` (`id`) VALUES
(179);

-- --------------------------------------------------------

--
-- Table structure for table `raja_currency`
--

CREATE TABLE IF NOT EXISTS `raja_currency` (
  `cur_id` int(11) NOT NULL AUTO_INCREMENT,
  `cur_name` varchar(31) DEFAULT NULL,
  PRIMARY KEY (`cur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `raja_currencyvalue`
--

CREATE TABLE IF NOT EXISTS `raja_currencyvalue` (
  `curval_id` int(11) NOT NULL AUTO_INCREMENT,
  `curval_cur` int(11) DEFAULT NULL,
  `curval_sale` int(11) DEFAULT NULL,
  `curval_buy` int(11) DEFAULT NULL,
  `curval_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`curval_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `raja_customer`
--

CREATE TABLE IF NOT EXISTS `raja_customer` (
  `cus_id` int(11) NOT NULL AUTO_INCREMENT,
  `cus_code` varchar(20) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `cus_name` varchar(30) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `cus_phone` text NOT NULL COMMENT 'pisahkan dengan ;',
  `cus_detail` text CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  PRIMARY KEY (`cus_id`),
  UNIQUE KEY `cus_code` (`cus_code`),
  KEY `cus_name` (`cus_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=170 ;

--
-- Dumping data for table `raja_customer`
--

INSERT INTO `raja_customer` (`cus_id`, `cus_code`, `cus_name`, `cus_phone`, `cus_detail`) VALUES
(169, '13101900A5', 'gunawan', '["12124","4124124"]', '');

-- --------------------------------------------------------

--
-- Table structure for table `raja_customeraddress`
--

CREATE TABLE IF NOT EXISTS `raja_customeraddress` (
  `cadr_id` int(11) NOT NULL AUTO_INCREMENT,
  `cadr_cus` int(11) NOT NULL,
  `cadr_address` text CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  PRIMARY KEY (`cadr_id`),
  KEY `cadr_cus` (`cadr_cus`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `raja_customeraddress`
--

INSERT INTO `raja_customeraddress` (`cadr_id`, `cadr_cus`, `cadr_address`) VALUES
(24, 169, 0x686f74656c31),
(25, 169, 0x686f74656c33),
(26, 169, 0x736166617366617366736166),
(27, 169, 0x647361646173),
(28, 169, 0x73646173646173),
(29, 169, 0x647364617364736164);

-- --------------------------------------------------------

--
-- Table structure for table `raja_customeraddresscounter`
--

CREATE TABLE IF NOT EXISTS `raja_customeraddresscounter` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raja_customeraddresscounter`
--

INSERT INTO `raja_customeraddresscounter` (`id`) VALUES
(29);

-- --------------------------------------------------------

--
-- Table structure for table `raja_logstock`
--

CREATE TABLE IF NOT EXISTS `raja_logstock` (
  `logstock_id` int(11) NOT NULL AUTO_INCREMENT,
  `logstock_prod` int(11) DEFAULT NULL,
  `logstock_store` int(11) DEFAULT NULL,
  `logstock_stock0` int(11) DEFAULT NULL,
  `logstock_stock1` int(11) DEFAULT NULL,
  `logstock_act` varchar(31) DEFAULT NULL,
  `logstock_type` varchar(31) DEFAULT NULL,
  `logstock_detail` text,
  PRIMARY KEY (`logstock_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `raja_merk`
--

CREATE TABLE IF NOT EXISTS `raja_merk` (
  `merk_id` int(11) NOT NULL AUTO_INCREMENT,
  `merk_code` varchar(11) DEFAULT NULL,
  `merk_name` varchar(31) DEFAULT NULL,
  `merk_detail` text,
  PRIMARY KEY (`merk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `raja_permission`
--

CREATE TABLE IF NOT EXISTS `raja_permission` (
  `per_id` int(11) NOT NULL AUTO_INCREMENT,
  `per_name` varchar(20) NOT NULL,
  `per_detail` text NOT NULL,
  PRIMARY KEY (`per_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `raja_permission`
--

INSERT INTO `raja_permission` (`per_id`, `per_name`, `per_detail`) VALUES
(1, 'master file', ''),
(2, 'produk', ''),
(3, 'invoice', ''),
(4, 'report', ''),
(5, 'utility', ''),
(6, 'history', ''),
(7, 'customer', ''),
(8, 'kurs', ''),
(9, 'stock', ''),
(10, 'stock transfer', ''),
(11, 'sales', ''),
(12, 'purchase', ''),
(13, 'retur sales', ''),
(14, 'retur purchase', ''),
(15, 'repair', '');

-- --------------------------------------------------------

--
-- Table structure for table `raja_product`
--

CREATE TABLE IF NOT EXISTS `raja_product` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_code` varchar(9) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `prod_name` varchar(30) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `prod_parent` int(11) DEFAULT NULL,
  `prod_merk` int(11) DEFAULT NULL,
  `prod_price` int(11) DEFAULT NULL,
  `prod_stat` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `raja_productcat`
--

CREATE TABLE IF NOT EXISTS `raja_productcat` (
  `pcat_id` int(11) NOT NULL AUTO_INCREMENT,
  `pcat_prod` int(11) DEFAULT NULL,
  `pcat_cat` int(11) DEFAULT NULL,
  PRIMARY KEY (`pcat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `raja_productdetail`
--

CREATE TABLE IF NOT EXISTS `raja_productdetail` (
  `prodet_id` int(11) NOT NULL AUTO_INCREMENT,
  `prodet_detail` text CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  PRIMARY KEY (`prodet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `raja_productprice`
--

CREATE TABLE IF NOT EXISTS `raja_productprice` (
  `prodprice_id` int(11) NOT NULL AUTO_INCREMENT,
  `prodprice_product` int(11) DEFAULT NULL,
  `prodprice_currency` int(11) DEFAULT NULL,
  `prodprice_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`prodprice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `raja_productstock`
--

CREATE TABLE IF NOT EXISTS `raja_productstock` (
  `pstock_id` int(11) NOT NULL AUTO_INCREMENT,
  `pstock_prod` int(11) DEFAULT NULL,
  `pstock_store` int(11) DEFAULT NULL,
  `pstock_stock` int(11) DEFAULT NULL,
  PRIMARY KEY (`pstock_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `raja_store`
--

CREATE TABLE IF NOT EXISTS `raja_store` (
  `str_id` int(11) NOT NULL AUTO_INCREMENT,
  `str_code` varchar(9) COLLATE utf32_bin NOT NULL,
  `str_name` varchar(30) COLLATE utf32_bin NOT NULL,
  `str_detail` text COLLATE utf32_bin NOT NULL,
  PRIMARY KEY (`str_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `raja_store`
--

INSERT INTO `raja_store` (`str_id`, `str_code`, `str_name`, `str_detail`) VALUES
(1, 'A', 'Gudang 1a', 0x7b);

-- --------------------------------------------------------

--
-- Table structure for table `raja_suplier`
--

CREATE TABLE IF NOT EXISTS `raja_suplier` (
  `sup_id` int(11) NOT NULL AUTO_INCREMENT,
  `sup_code` varchar(20) DEFAULT NULL,
  `sup_name` varchar(30) NOT NULL,
  `sup_detail` text NOT NULL,
  `sup_stat` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sup_id`),
  UNIQUE KEY `sup_code` (`sup_code`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `raja_suplier`
--

INSERT INTO `raja_suplier` (`sup_id`, `sup_code`, `sup_name`, `sup_detail`, `sup_stat`) VALUES
(1, 'TWT', 'testing 32', '{"address":"bla-bla bla","phone":"124125125125"}', 1),
(2, 'TWT2', 'TEST34', '{"address":"adasdsa","phone":"123124"}', 0),
(4, 'TWT2f', 'asdsa', '', 1),
(5, 'Tui', 'dasdas', '', 1),
(6, '123', 'dsada', '{"address":"dsadas","phone":"sadasdas"}', 0),
(7, '13213', '231', '', 0),
(8, '31231', '4124412', '', 0),
(9, '123i', '1241', '', 0),
(10, '123b', '213123', '', 0),
(11, '123c', '', '', 0),
(12, '123d', '123123123', '', 0),
(13, '123r', '2315', '', 0),
(14, '123123d', 'r21', '', 0),
(15, '421251', 'asafas', '', 0),
(16, '41dwq', 'dqd', '', 0),
(17, 'eq3', 'wq', '', 1),
(18, 'scar', 'eqe', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `raja_tab`
--

CREATE TABLE IF NOT EXISTS `raja_tab` (
  `tab_id` int(11) NOT NULL AUTO_INCREMENT,
  `tab_name` varchar(20) NOT NULL,
  `tab_detail` text NOT NULL,
  PRIMARY KEY (`tab_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `raja_tab`
--

INSERT INTO `raja_tab` (`tab_id`, `tab_name`, `tab_detail`) VALUES
(1, 'welcome', 'hello world');

-- --------------------------------------------------------

--
-- Table structure for table `raja_user`
--

CREATE TABLE IF NOT EXISTS `raja_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `user_realname` varchar(40) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `raja_user`
--

INSERT INTO `raja_user` (`user_id`, `user_name`, `user_realname`, `user_password`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `raja_usermenu`
--

CREATE TABLE IF NOT EXISTS `raja_usermenu` (
  `user` int(11) NOT NULL,
  `menu` text NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `raja_usertab`
--

CREATE TABLE IF NOT EXISTS `raja_usertab` (
  `utab_user` int(11) NOT NULL AUTO_INCREMENT,
  `utab_tab` text NOT NULL,
  PRIMARY KEY (`utab_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
