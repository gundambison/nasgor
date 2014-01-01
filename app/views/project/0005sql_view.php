CREATE TABLE IF NOT EXISTS `nasgor_counter` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nasgor_counter`
--

INSERT INTO `nasgor_counter` (`id`) VALUES
(52);

-- --------------------------------------------------------

--
-- Table structure for table `nasgor_tutorial`
--

CREATE TABLE IF NOT EXISTS `nasgor_tutorial` (
  `tutor_id` int(11) NOT NULL,
  `tutor_name` varchar(100) NOT NULL,
  PRIMARY KEY (`tutor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nasgor_tutorial`
--

INSERT INTO `nasgor_tutorial` (`tutor_id`, `tutor_name`) VALUES
(1, 'Bootstrap');

-- --------------------------------------------------------

--
-- Table structure for table `nasgor_tutorialcounter`
--

CREATE TABLE IF NOT EXISTS `nasgor_tutorialcounter` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nasgor_tutorialcounter`
--

INSERT INTO `nasgor_tutorialcounter` (`id`) VALUES
(42);

-- --------------------------------------------------------

--
-- Table structure for table `nasgor_tutoriallist`
--

CREATE TABLE IF NOT EXISTS `nasgor_tutoriallist` (
  `tlist_id` int(11) NOT NULL AUTO_INCREMENT,
  `tlist_name` varchar(100) NOT NULL,
  `tlist_tutor` int(11) NOT NULL,
  `tlist_pos` int(11) NOT NULL DEFAULT '1',
  `tlist_prev` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=ditampilkan',
  PRIMARY KEY (`tlist_id`),
  KEY `ttext_tutor` (`tlist_tutor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `nasgor_tutoriallist`
--

INSERT INTO `nasgor_tutoriallist` (`tlist_id`, `tlist_name`, `tlist_tutor`, `tlist_pos`, `tlist_prev`) VALUES
(1, 'Template Dasar Bootstrap', 1, 1, 0),
(29, 'Starter', 1, 2, 0),
(32, 'Grid Dasar (3 grid)', 1, 3, 0),
(34, 'Grid Dasar (3 grid) dengan offset', 1, 4, 0),
(37, 'Heading ', 1, 300, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nasgor_tutorialtext`
--

CREATE TABLE IF NOT EXISTS `nasgor_tutorialtext` (
  `ttext_list` int(11) NOT NULL AUTO_INCREMENT,
  `ttext_detail` text NOT NULL,
  `ttext_code` text NOT NULL,
  PRIMARY KEY (`ttext_list`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `nasgor_tutorialtext`
--

INSERT INTO `nasgor_tutorialtext` (`ttext_list`, `ttext_detail`, `ttext_code`) VALUES
(1, 'template dasar bootstrap yang biasa digunakan. Biasanya tidak memakai row, tetapi memakai container', '<!doctype html>\r\n<html lang="en">\r\n	<head>\r\n		<meta charset="utf-8">\r\n		<title>160 Hari bersama Nasgor</title>\r\n		<link rel="shortcut icon" type="image/ico" href="images/main.ico" />\r\n		<meta name="viewport" content="width=device-width, initial-scale=1.0">\r\n		<!-- Bootstrap -->\r\n		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">	\r\n		\r\n	</head>\r\n	<body>\r\n		<div class=''container''> \r\n\r\n		</div>\r\n	<script src="js/jquery.min.js"></script>		\r\n	<script src="js/bootstrap.js"></script>\r\n	</body>\r\n</html>'),
(29, 'Untuk tampilan awal', '<div class="container">\r\n      <div class="starter-template">\r\n        <h1>Bootstrap starter template</h1>\r\n        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>\r\n      </div>\r\n</div>'),
(32, 'Memakai 3 Grid \r\nsebelumnya memakai .span* diganti .col-md-*', '<div class="container">\r\n     <div class="row">\r\n        <div class="col-md-4">.col-md-4</div>\r\n        <div class="col-md-4">.col-md-4</div>\r\n        <div class="col-md-4">.col-md-4</div>\r\n      </div>\r\n</div>'),
(34, 'memakai kolom dan offset', '<div class="container">\r\n    <div class="row">\r\n        <div class="col-md-3 col-md-offset-1">.col-md-3 col-md-offset-1</div>\r\n        <div class="col-md-3">.col-md-3</div>\r\n        <div class="col-md-3 col-md-offset-1">.col-md-3 col-md-offset-2</div>\r\n    </div>\r\n</div>'),
(37, 'Bootstrap juga memberikan tampilan berbeda pada Heading, berikut adalah tampilannya', '<div class="container">\r\n	<div class="row">\r\n		<div class="col-md-10 col-md-offset-2">\r\n			<h1>Heading 1</h1>\r\n			<h2>Heading 2</h2>\r\n			<h3>Heading 3</h3>\r\n			<h4>Heading 4</h4>\r\n			<h5>Heading 5</h5>\r\n		</div>\r\n	</div>\r\n</div>');
