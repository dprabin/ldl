CREATE TABLE IF NOT EXISTS `#__authors` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`name` VARCHAR(255) character set utf8 collate utf8_bin NOT NULL,
		`sort` VARCHAR(255) character set utf8 collate utf8_bin NULL,
		`link` VARCHAR(255) NOT NULL ,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`name`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__books` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`title` VARCHAR(255) character set utf8 collate utf8_bin NOT NULL DEFAULT 'Unknown',
		`sort` VARCHAR(255) character set utf8 collate utf8_bin NULL,
		`timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
		`pubdate` TIMESTAMP  NOT NULL,
		`series_index` real NOT NULL DEFAULT 1.0,
		`author_sort` VARCHAR(255) character set utf8 collate utf8_bin NULL,
		`isbn` VARCHAR(255) character set utf8 collate utf8_bin NULL,
		`lccn` VARCHAR(255) character set utf8 collate utf8_bin NULL,
		`path` VARCHAR(255) NOT NULL ,
		`flags` INT(11) NOT NULL DEFAULT 1,
		`uuid` VARCHAR(255) NULL,
		`has_cover` BOOL DEFAULT 0 NULL,
		`last_modified` TIMESTAMP NOT NULL,
		PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `#__books_authors_link` ( 
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`book` INT(11) NOT NULL,
		`author` INT(11) NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE(`book`, `author`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `#__books_languages_link` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`book` INT(11) NOT NULL,
		`lang_code` INT(11) NOT NULL,
		`item_order` INT(11) NOT NULL DEFAULT 0,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`book`, `lang_code`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `#__books_plugin_data` (
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`book` INT(11) NULL,
		`name` VARCHAR(255) NULL,
		`val` VARCHAR(255) NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(book,name)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `#__books_publishers_link` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`book` INT(11) NOT NULL,
		`publisher` INT(11) NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`book`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `#__books_ratings_link` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`book` INT(11) NOT NULL,
		`rating` INT(11) NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`book`, `rating`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `#__books_series_link` ( `id` INT(11) NOT NULL AUTO_INCREMENT,
		`book` INT(11) NOT NULL,
		`series` INT(11) NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`book`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `#__books_tags_link` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`book` INT(11) NOT NULL,
		`tag` INT(11) NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`book`, `tag`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `#__comments` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`book` INT(11) NULL,
		`text` LONGTEXT character set utf8 collate utf8_bin NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`book`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `#__conversion_options` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`format` VARCHAR(255) character set utf8 collate utf8_bin NOT NULL,
		`book` INT(11),
		`data` LONGTEXT character set utf8 collate utf8_bin NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`format`,`book`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `#__custom_columns` (
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`label` VARCHAR(255) NOT NULL,
		`name` VARCHAR(255) NOT NULL,
		`datatype` VARCHAR(255) NOT NULL,
		`mark_for_delete` BOOL DEFAULT 0 NOT NULL,
		`editable` BOOL DEFAULT 1 NOT NULL,
		`display` VARCHAR(255) NOT NULL,
		`is_multiple` BOOL DEFAULT 0 NOT NULL,
		`normalized` BOOL NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`label`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `#__data` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`book` INT(11) NULL,
		`format` varchar(255) character set utf8 collate utf8_bin NULL,
		`uncompressed_size` INT(11) NULL,
		`name` varchar(255) character set utf8 collate utf8_bin NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`book`, `format`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `#__feeds` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`title` VARCHAR(255) NOT NULL,
		`script` VARCHAR(255) NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `#__identifiers` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`book` INT(11) NULL,
		`type` varchar(25) character set utf8 collate utf8_bin NULL DEFAULT 'isbn',
		`val` varchar(25) character set utf8 collate utf8_bin NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`book`, `type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `#__languages_` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`lang_code` varchar(25) character set utf8 collate utf8_bin NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`lang_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `#__metadata_dirtied`(
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`book` INT(11) NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`book`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `#__preferences`(
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`key` varchar(25) NULL,
		`val` varchar(25) NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `#__publishers` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`name` VARCHAR(255) character set utf8 collate utf8_bin NOT NULL,
		`sort` VARCHAR(255) character set utf8 collate utf8_bin,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`name`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `#__ratings` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`rating` INT(11) CHECK(rating > -1 AND rating < 11),
		PRIMARY KEY (`id`),
		UNIQUE (`rating`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `#__series` ( 
		`id` INT(11) ,
		`name` VARCHAR(255) character set utf8 collate utf8_bin NOT NULL,
		`sort` VARCHAR(255) character set utf8 collate utf8_bin,
		PRIMARY KEY (`id`),
		UNIQUE (`name`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `#__tags` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`name` VARCHAR(255) character set utf8 collate utf8_bin NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE (`name`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `#__custom_column_1`(
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`value` VARCHAR(255) character set utf8 collate utf8_bin NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`value`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `#__books_custom_column_1_link`(
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`book` INT(11) NOT NULL,
		`value` INT(11) NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`book`, `value`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `#__custom_column_2`(
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`value` VARCHAR(255) character set utf8 collate utf8_bin NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`value`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `#__books_custom_column_2_link`(
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`book` INT(11) NOT NULL,
		`value` INT(11) NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`book`, `value`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `#__books_authors_link` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`book` INT(11) NOT NULL,
		`author` INT(11) NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`book`, `author`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `#__library_id` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`uuid` VARCHAR(255) NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`uuid`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
INSERT INTO `#__authors` VALUES(4,'Dan Gookin','Gookin, Dan','');
INSERT INTO `#__authors` VALUES(8,'Robert Kao','Kao, Robert','');
INSERT INTO `#__authors` VALUES(9,'Dante Sarigumba','Sarigumba, Dante','');
INSERT INTO `#__authors` VALUES(10,'Greg Harvey','Harvey, Greg','');
INSERT INTO `#__authors` VALUES(13,'David Vespremi','Vespremi, David','');
INSERT INTO `#__authors` VALUES(19,'Lita Epstein','Epstein, Lita','');
INSERT INTO `#__authors` VALUES(20,'Chey Cobb','Cobb, Chey','');
INSERT INTO `#__authors` VALUES(23,'Gary Dahl','Dahl, Gary','');
INSERT INTO `#__authors` VALUES(24,'Barbara Findlay Schenck','Schenck, Barbara Findlay','');
INSERT INTO `#__authors` VALUES(25,'Ron Gilster','Gilster, Ron','');
INSERT INTO `#__authors` VALUES(26,'Jennifer Smith','Smith, Jennifer','');
INSERT INTO `#__authors` VALUES(27,'Christopher Smith','Smith, Christopher','');
INSERT INTO `#__authors` VALUES(28,'Allen Wyatt','Wyatt, Allen','');
INSERT INTO `#__authors` VALUES(29,'Stephen Randy Davis','Davis, Stephen Randy','');
INSERT INTO `#__authors` VALUES(30,'Mark Middlebrook','Middlebrook, Mark','');
INSERT INTO `#__authors` VALUES(31,'Mark Ryan','Ryan, Mark','');
INSERT INTO `#__authors` VALUES(32,'Marie-Claude Kao','Kao, Marie-Claude','');
INSERT INTO `#__authors` VALUES(33,'Yosma Sarigumba','Sarigumba, Yosma','');
INSERT INTO `#__authors` VALUES(35,'Keith Underdahl','Underdahl, Keith','');
INSERT INTO `#__authors` VALUES(36,'Ken Cox','Cox, Ken','');
INSERT INTO `#__authors` VALUES(37,'Howie Southworth','Southworth, Howie','');
INSERT INTO `#__authors` VALUES(38,'Kemal Cakici','Cakici, Kemal','');
INSERT INTO `#__authors` VALUES(39,'Yianna Vovides','Vovides, Yianna','');
INSERT INTO `#__authors` VALUES(40,'Susan Zvacek','Zvacek, Susan','');
INSERT INTO `#__authors` VALUES(42,'Alan Simpson','Simpson, Alan','');
INSERT INTO `#__authors` VALUES(45,'Paul Ernest','Ernest, Paul','');
INSERT INTO `#__authors` VALUES(47,'Thomas Cathcart','Cathcart, Thomas','');
INSERT INTO `#__authors` VALUES(48,'Daniel Klein','Klein, Daniel','');
INSERT INTO `#__authors` VALUES(49,'Adam Smith','Smith, Adam','');
INSERT INTO `#__authors` VALUES(64,'Alex Prentiss','Prentiss, Alex','');
INSERT INTO `#__authors` VALUES(65,'Alice Wisler','Wisler, Alice','');
INSERT INTO `#__authors` VALUES(66,'Amy Huntley','Huntley, Amy','');
INSERT INTO `#__authors` VALUES(67,'Anastasia Hopcus','Hopcus, Anastasia','');
INSERT INTO `#__authors` VALUES(89,'Anne McCaffrey','McCaffrey, Anne','');
INSERT INTO `#__authors` VALUES(90,'Todd McCaffrey','McCaffrey, Todd','');
INSERT INTO `#__authors` VALUES(91,'H. P. Lovecraft','Lovecraft, H. P.','');
INSERT INTO `#__authors` VALUES(97,'Bryan Smith','Smith, Bryan','');
INSERT INTO `#__authors` VALUES(101,'Taigen Dan Leighton','Leighton, Taigen Dan','');
INSERT INTO `#__authors` VALUES(102,'Tom McArthur','McArthur, Tom','');
INSERT INTO `#__authors` VALUES(103,'John Ayto','Ayto, John','');
INSERT INTO `#__authors` VALUES(105,'Ellen M. Ross','Ross, Ellen M.','');
INSERT INTO `#__authors` VALUES(106,'Harriet Sigerman','Sigerman, Harriet','');
INSERT INTO `#__authors` VALUES(107,'David. W. Orr','Orr, David. W.','');
INSERT INTO `#__authors` VALUES(108,'Daniel R. Headrick','Headrick, Daniel R.','');
INSERT INTO `#__authors` VALUES(109,'Thomas Nagel','Nagel, Thomas','');
INSERT INTO `#__authors` VALUES(110,'Robert Kaplan','Kaplan, Robert','');
INSERT INTO `#__authors` VALUES(111,'Ellen Kaplan','Kaplan, Ellen','');
INSERT INTO `#__authors` VALUES(112,'Abrol Fairweather','Fairweather, Abrol','');
INSERT INTO `#__authors` VALUES(113,'Linda Zagzebski','Zagzebski, Linda','');
INSERT INTO `#__authors` VALUES(114,'Richard J. Davidson','Davidson, Richard J.','');
INSERT INTO `#__authors` VALUES(115,'Anne Harrington','Harrington, Anne','');
INSERT INTO `#__authors` VALUES(116,'Paula Kane Robinson Arai','Arai, Paula Kane Robinson','');
INSERT INTO `#__authors` VALUES(117,'Kimberley Christine Patton','Patton, Kimberley Christine','');
INSERT INTO `#__authors` VALUES(118,'Waldo Heinrichs','Heinrichs, Waldo','');
INSERT INTO `#__authors` VALUES(119,'Rupert Gethin','Gethin, Rupert','');
INSERT INTO `#__authors` VALUES(120,'Henry A. Murray','Murray, Henry A.','');
INSERT INTO `#__authors` VALUES(121,'LEC C Bollinger','Bollinger, LEC C','');
INSERT INTO `#__authors` VALUES(122,'David Michales','Michales, David','');
INSERT INTO `#__authors` VALUES(124,'Ronald de Sousa','Sousa, Ronald de','');
INSERT INTO `#__authors` VALUES(125,'Nicholas P. Money','Money, Nicholas P.','');
INSERT INTO `#__authors` VALUES(127,'Keith Denning','Denning, Keith','');
INSERT INTO `#__authors` VALUES(128,'Brett Kessler','Kessler, Brett','');
INSERT INTO `#__authors` VALUES(129,'William R. Leben','Leben, William R.','');
INSERT INTO `#__authors` VALUES(130,'David Lehman','Lehman, David','');
INSERT INTO `#__authors` VALUES(131,'John Brehm','Brehm, John','');
INSERT INTO `#__authors` VALUES(132,'Joseph Heller','Heller, Joseph','');
INSERT INTO `#__authors` VALUES(133,'Paulo Coelho','Coelho, Paulo','');
INSERT INTO `#__authors` VALUES(136,'Elvin T. Lim','Lim, Elvin T.','');
INSERT INTO `#__authors` VALUES(138,'Morton Keller','Keller, Morton','');
INSERT INTO `#__authors` VALUES(140,'Trenton Merricks','Merricks, Trenton','');
INSERT INTO `#__authors` VALUES(141,'Anthony Kenny','Kenny, Anthony','');
INSERT INTO `#__authors` VALUES(142,'Dirk Geeraerts','Geeraerts, Dirk','');
INSERT INTO `#__authors` VALUES(143,'Marc Mezard','Mezard, Marc','');
INSERT INTO `#__authors` VALUES(144,'Andrea Montanari','Montanari, Andrea','');
INSERT INTO `#__authors` VALUES(145,'Jan Vijg','Vijg, Jan','');
INSERT INTO `#__authors` VALUES(146,'Martinus Veltman','Veltman, Martinus','');
INSERT INTO `#__authors` VALUES(147,'Drik U Pfeiffer','Pfeiffer, Drik U','');
INSERT INTO `#__authors` VALUES(148,'Timothy P. Robinson','Robinson, Timothy P.','');
INSERT INTO `#__authors` VALUES(149,'Mark Stevenson','Stevenson, Mark','');
INSERT INTO `#__authors` VALUES(150,'Kim B. Stevens','Stevens, Kim B.','');
INSERT INTO `#__authors` VALUES(151,'David J. Rojers','Rojers, David J.','');
INSERT INTO `#__authors` VALUES(152,'Archie C. A. Clements','Clements, Archie C. A.','');
INSERT INTO `#__authors` VALUES(153,'Simon Caney','Caney, Simon','');
INSERT INTO `#__authors` VALUES(154,'Jeffrey N. Wasserstrom','Wasserstrom, Jeffrey N.','');
INSERT INTO `#__authors` VALUES(155,'Patrick E. Jamieson','Jamieson, Patrick E.','');
INSERT INTO `#__authors` VALUES(156,'Daniel Romer','Romer, Daniel','');
INSERT INTO `#__authors` VALUES(157,'Irwin Epstein','Epstein, Irwin','');
INSERT INTO `#__authors` VALUES(158,'Douglas Husak','Husak, Douglas','');
INSERT INTO `#__authors` VALUES(159,'Alfred Greiner','Greiner, Alfred','');
INSERT INTO `#__authors` VALUES(160,'Willi Semmler','Semmler, Willi','');
INSERT INTO `#__authors` VALUES(161,'Colleen M. Conway','Conway, Colleen M.','');
INSERT INTO `#__authors` VALUES(162,'George Molnar','Molnar, George','');






INSERT INTO `#__books` VALUES(2,'ASP .NET 3.5 For Dummies','ASP .NET 3.5 For Dummies','2008-02-01 09:53:03+00:00','2012-07-19 09:53:03.781000+00:00',1,'Cox, Ken','','','Ken Cox/ASP .NET 3.5 For Dummies (2)',1,'455bf885-eae6-4604-89c2-916f4ad8b027',1,'2012-07-25 09:20:33.338000+00:00');
INSERT INTO `#__books` VALUES(3,'Blackboard for Dummies','Blackboard for Dummies','2012-07-19 09:53:15+00:00','2012-07-19 09:53:15.453000+00:00',1,'Southworth, Howie & Cakici, Kemal & Vovides, Yianna & Zvacek, Susan','','','Howie Southworth/Blackboard for Dummies (3)',1,'d12ea121-5df1-46f2-88e7-323b3e28744f',1,'2012-07-25 09:23:21.136000+00:00');
INSERT INTO `#__books` VALUES(6,'Advertising for Dummies','Advertising for Dummies','2012-07-19 09:53:54.843000+00:00','2012-07-19 09:53:54.843000+00:00',1,'Dahl, Gary','','','Gary Dahl/Advertising for Dummies (6)',1,'bdb99544-e72f-4535-8ee2-bd92e0f240e0',1,'2012-07-25 10:09:13.084000+00:00');
INSERT INTO `#__books` VALUES(7,'Bit Torrent For Dummies','Bit Torrent For Dummies','2012-07-19 09:54:05.750000+00:00','2012-07-19 09:54:05.750000+00:00',1,'DDSTree','','','DDSTree/Bit Torrent For Dummies (7)',1,'95eb65e4-7df8-4942-832f-0db4890f8ced',1,'2012-07-25 09:22:21.057000+00:00');
INSERT INTO `#__books` VALUES(8,'Adobe Premiere Elements For Dummies','Adobe Premiere Elements For Dummies','2012-07-19 09:54:12.046000+00:00','2012-07-19 09:54:12.046000+00:00',1,'Underdahl, Keith','','','Keith Underdahl/Adobe Premiere Elements For Dummies (8)',1,'b1b246f2-a703-43a7-9e5c-32bfde15e948',1,'2012-07-25 09:18:36.915000+00:00');
INSERT INTO `#__books` VALUES(9,'Anger Management For Dummies','Anger Management For Dummies','2012-07-19 09:54:33.453000+00:00','2012-07-19 09:54:33.453000+00:00',1,'W. Doyle Gentry, PhD','','','W. Doyle Gentry, PhD/Anger Management For Dummies (9)',1,'f3a4ff4b-1db0-4eab-b899-3fd900f97eeb',1,'2012-07-19 11:04:51.234000+00:00');
INSERT INTO `#__books` VALUES(10,'BlackBerry Pearl for Dummies','BlackBerry Pearl for Dummies','2012-07-19 09:54:40+00:00','2012-07-19 09:54:40.156000+00:00',1,'Kao, Robert & Kao, Marie-Claude & Sarigumba, Dante & Sarigumba, Yosma','','','Robert Kao/BlackBerry Pearl for Dummies (10)',1,'0e5d2047-f16c-4245-92d5-9fb6f44fb100',1,'2012-07-25 09:23:13.292000+00:00');
INSERT INTO `#__books` VALUES(11,'Act! 2005 for Dummies','Act! 2005 for Dummies','2012-07-19 09:54:52.078000+00:00','2012-07-19 09:54:52.078000+00:00',1,'Fredricks, Karen S.','','','Karen S. Fredricks/Act! 2005 for Dummies (11)',1,'ed690aab-5e07-4842-92df-6493ff86235f',1,'2012-07-25 09:17:34.259000+00:00');
INSERT INTO `#__books` VALUES(12,'BlackBerry For Dummies','BlackBerry For Dummies','2012-07-19 09:55:09.250000+00:00','2012-07-19 09:55:09.250000+00:00',1,'Kao, Robert & Sarigumba, Dante','','','Robert Kao/BlackBerry For Dummies (12)',1,'50dc644b-e9c7-49dc-a936-40c90dbcc80d',1,'2012-07-25 09:23:08.120000+00:00');
INSERT INTO `#__books` VALUES(13,'Adobe Acrobat 6 PDF For Dummies','Adobe Acrobat 6 PDF For Dummies','2012-07-19 09:55:26.296000+00:00','2012-07-19 09:55:26.296000+00:00',1,'Harvey, Greg','','','Greg Harvey/Adobe Acrobat 6 PDF For Dummies (13)',1,'ad8b9251-aa32-4c55-acf2-22ec5d6723f0',1,'2012-07-25 09:18:10.071000+00:00');
INSERT INTO `#__books` VALUES(14,'Buying a Computer for Dummies','Buying a Computer for Dummies','2007-11-01 09:55:42+00:00','2012-07-19 09:55:42.671000+00:00',1,'Gookin, Dan','','','Dan Gookin/Buying a Computer for Dummies (14)',1,'402fa210-68db-4311-8be0-a1a6febc677e',1,'2012-07-27 12:17:30.337000+00:00');
INSERT INTO `#__books` VALUES(15,'Branding For Dummies','Branding For Dummies','2012-07-19 09:55:54.765000+00:00','2012-07-19 09:55:54.765000+00:00',1,'Schenck, Barbara Findlay','','','Barbara Findlay Schenck/Branding For Dummies (15)',1,'09e99d1c-aab2-45b4-aa65-e9304b1374b1',1,'2012-07-25 09:40:59.236000+00:00');
INSERT INTO `#__books` VALUES(16,'Access 2007 VBA Programming For Dummies','Access 2007 VBA Programming For Dummies','2007-02-01 09:56:13+00:00','2012-07-19 09:56:13.125000+00:00',1,'Stockman, Joseph C. & Simpson, Alan','','','Joseph C. Stockman/Access 2007 VBA Programming For Dummies (16)',1,'abbcc5f0-996b-49eb-9c90-a7dc09893737',1,'2012-07-25 09:45:46.598000+00:00');
INSERT INTO `#__books` VALUES(17,'Bookkeeping Workbook For Dummies','Bookkeeping Workbook For Dummies','2012-07-19 09:56:33.750000+00:00','2012-07-19 09:56:33.750000+00:00',1,'Epstein, Lita','','','Lita Epstein/Bookkeeping Workbook For Dummies (17)',1,'06bd919c-ab19-4ed6-b401-59a163eb1b32',1,'2012-07-25 09:24:30.605000+00:00');
INSERT INTO `#__books` VALUES(18,'Cryptography for Dummies','Cryptography for Dummies','2012-07-19 09:56:40+00:00','2012-07-19 09:56:40.609000+00:00',1,'Cobb, Chey','','','Chey Cobb/Cryptography for Dummies (18)',1,'629f02b8-42d9-430a-904d-54098be993d6',0,'2012-07-25 09:59:09.990000+00:00');
INSERT INTO `#__books` VALUES(19,'Car Hacks & Mods For Dummies','Car Hacks & Mods For Dummies','2012-07-19 09:56:50.609000+00:00','2012-07-19 09:56:50.609000+00:00',1,'Vespremi, David','','','David Vespremi/Car Hacks & Mods For Dummies (19)',1,'758489f4-c8f5-4114-bb7d-73076b395e25',1,'2012-07-25 09:28:17.841000+00:00');
INSERT INTO `#__books` VALUES(20,'Commodities for Dummies','Commodities for Dummies','2012-07-19 09:56:58.937000+00:00','2012-07-19 09:56:58.937000+00:00',1,'Bouchentouf, Amine','','','Amine Bouchentouf/Commodities for Dummies (20)',1,'eff4a97e-c191-47f0-973a-9bd492b1b42d',1,'2012-07-25 09:54:01.021000+00:00');
INSERT INTO `#__books` VALUES(21,'Cleaning Windows Vista For Dummies Jan 2007','Cleaning Windows Vista For Dummies Jan 2007','2012-07-19 09:57:09.734000+00:00','2012-07-19 09:57:09.734000+00:00',1,'Wyatt, Allen','','','Allen Wyatt/Cleaning Windows Vista For Dummies Jan 2 (21)',1,'579885fb-fc75-4c1f-b9ec-dbeeb87b6b4b',1,'2012-07-27 12:17:30.337000+00:00');
INSERT INTO `#__books` VALUES(22,'Adobe Creative Suite  2 All in One Desk Reference For Dummies','Adobe Creative Suite  2 All in One Desk Reference For Dummies','2005-07-19 09:57:23+00:00','2012-07-19 09:57:23.890000+00:00',1,'Smith, Jennifer & Smith, Christopher','','','Jennifer Smith/Adobe Creative Suite  2 All in One Desk  (22)',1,'99cbb32e-7266-4285-aa7b-29110c4b0c3d',1,'2012-07-25 09:43:43.690000+00:00');
INSERT INTO `#__books` VALUES(23,'Calculus Workbook for Dummies','Calculus Workbook for Dummies','2012-07-19 09:57:48.328000+00:00','2012-07-19 09:57:48.328000+00:00',1,'Ryan, Mark','','','Mark Ryan/Calculus Workbook for Dummies (23)',1,'d933fa41-1079-42ce-8af3-90e6abf186e8',1,'2012-08-27 10:47:03.158000+00:00');
INSERT INTO `#__books` VALUES(24,'A+ Certification For Dummies','A+ Certification For Dummies','2012-07-19 09:57:56.781000+00:00','2012-07-19 09:57:56.781000+00:00',1,'Gilster, Ron','','','Ron Gilster/A_ Certification For Dummies (24)',1,'b8af08db-f22d-4b09-adc2-5976df805511',0,'2012-07-25 09:16:58.665000+00:00');
INSERT INTO `#__books` VALUES(25,'C++ for Dummies','C++ for Dummies','2012-07-19 09:58:16.453000+00:00','2012-07-19 09:58:16.453000+00:00',1,'Davis, Stephen Randy','','','Stephen Randy Davis/C__ for Dummies (25)',1,'33705e3d-0440-4761-b2f2-bdcc33216fec',1,'2012-07-25 09:27:41.637000+00:00');
INSERT INTO `#__books` VALUES(26,'AutoCAD 2005 for Dummies','AutoCAD 2005 for Dummies','2012-07-19 09:58:26.437000+00:00','2012-07-19 09:58:26.437000+00:00',1,'Middlebrook, Mark','','','Mark Middlebrook/AutoCAD 2005 for Dummies (26)',1,'b5f1faff-7c0f-4267-a463-0bd77d2a46f5',1,'2012-07-25 09:20:51.479000+00:00');
INSERT INTO `#__books` VALUES(28,'The Philosophy of Mathematics Education','Philosophy of Mathematics Education, The','2012-07-19 12:01:05.296000+00:00','2012-07-19 12:01:05.296000+00:00',1,'Ernest, Paul','','','Paul Ernest/The Philosophy of Mathematics Education (28)',1,'22fdda42-b0d1-4573-a34c-f014d3cf25a2',1,'2012-08-27 10:47:03.158000+00:00');
INSERT INTO `#__books` VALUES(32,'A Little History of Philosophy','Little History of Philosophy, A','2011-07-19 12:12:25+00:00','2012-07-19 12:12:25.234000+00:00',1,'Warburton, Nigel','','','Warburton, Nigel/A Little History of Philosophy (32)',1,'23aaab4d-e23e-4095-973b-a3bd09b59d35',1,'2012-07-25 10:54:36.428000+00:00');
INSERT INTO `#__books` VALUES(37,'Philosophy of David Lynch','Philosophy of David Lynch','2012-07-19 12:21:27.531000+00:00','2012-07-19 12:21:27.531000+00:00',1,'Devlin, William J. & Biderman, Shai','','','William J. Devlin/Philosophy of David Lynch (37)',1,'c4a92a89-c390-490b-a3d8-8a4a13cda73b',1,'2012-07-25 10:44:47.584000+00:00');
INSERT INTO `#__books` VALUES(42,'A Brief History of Time','Brief History of Time, A','2012-07-19 12:37:44.453000+00:00','2010-06-03 04:00:00+00:00',1,'Hawking, Stephen','','','Stephen Hawking/A Brief History of Time (42)',1,'7f404fc3-690b-4ea8-a1f7-ddbe6b1a815d',1,'2012-07-25 09:26:05.590000+00:00');
INSERT INTO `#__books` VALUES(50,'A Graveyard For Lunatics','Graveyard For Lunatics, A','2012-07-19 12:39:12.796000+00:00','2010-06-14 04:00:00+00:00',1,'Bradbury, Ray','','','Ray Bradbury/A Graveyard For Lunatics (50)',1,'b4cbff23-5b28-4c7a-be0e-316af9dbd3c7',1,'2012-07-25 09:54:44.412000+00:00');
INSERT INTO `#__books` VALUES(54,'Night Tides','Night Tides','2012-07-19 12:39:16.734000+00:00','2010-07-15 04:00:00+00:00',1,'Prentiss, Alex','','','Alex Prentiss/Night Tides (54)',1,'34782d7a-2a72-4a2a-a8ae-6707db255c2f',1,'2012-07-25 10:40:16.412000+00:00');
INSERT INTO `#__books` VALUES(114,'The Chronicles of Pern','Chronicles of Pern, The','2012-07-19 13:02:17.125000+00:00','2011-04-29 19:16:40.314000+00:00',10,'McCaffrey, Anne','','','Anne McCaffrey/The Chronicles of Pern (114)',1,'9fe84c7a-28c3-4a53-a06c-ed9194368200',1,'2012-07-25 09:32:04.686000+00:00');
INSERT INTO `#__books` VALUES(115,'The Girl Who Heard Dragons','Girl Who Heard Dragons, The','2012-07-19 13:02:18.031000+00:00','2011-04-29 19:16:40.725000+00:00',13,'McCaffrey, Anne','','','Anne McCaffrey/The Girl Who Heard Dragons (115)',1,'6da6fd86-f9ec-4a44-94af-741ae77ebdcc',1,'2012-07-25 09:32:04.686000+00:00');
INSERT INTO `#__books` VALUES(116,'Dragonheart','Dragonheart','2012-07-19 13:02:19.828000+00:00','2011-04-29 19:16:42.158000+00:00',27,'McCaffrey, Todd','','','Todd McCaffrey/Dragonheart (116)',1,'13a5afaf-37e9-473a-aa3c-49c1fec7850c',1,'2012-07-25 09:32:04.686000+00:00');
INSERT INTO `#__books` VALUES(117,'Dragon Harper','Dragon Harper','2012-07-19 13:02:24.093000+00:00','2011-04-29 19:16:52.255000+00:00',26,'McCaffrey, Anne & McCaffrey, Todd','','','Anne McCaffrey/Dragon Harper (117)',1,'f1df610c-318b-4777-aba2-762c25374847',1,'2012-07-25 09:32:04.686000+00:00');
INSERT INTO `#__books` VALUES(118,'Dragon’s Fire','Dragon’s Fire','2012-07-19 13:02:25.046000+00:00','2011-04-29 19:16:52.577000+00:00',25,'McCaffrey, Anne & McCaffrey, Todd','','','Anne McCaffrey/Dragon''s Fire (118)',1,'caeb11cc-bb75-472a-9fe6-89c2e5e0418c',1,'2012-07-25 09:32:04.686000+00:00');
INSERT INTO `#__books` VALUES(119,'Dragonsblood','Dragonsblood','2012-07-19 13:02:25.890000+00:00','2011-04-29 19:16:53.029000+00:00',24,'McCaffrey, Todd','','','Todd McCaffrey/Dragonsblood (119)',1,'fefee547-abaa-4544-8f6d-c4aa934852ab',1,'2012-07-25 09:32:04.686000+00:00');
INSERT INTO `#__books` VALUES(120,'Beyond Between','Beyond Between','2012-07-19 13:02:26.718000+00:00','2011-04-29 19:16:53.477000+00:00',23,'McCaffrey, Anne','','','Anne McCaffrey/Beyond Between (120)',1,'4d6bf213-0bb9-45f7-b7eb-be8aa1fa1a0a',1,'2012-07-25 09:32:04.686000+00:00');
INSERT INTO `#__books` VALUES(121,'Dragon''s Kin','Dragon''s Kin','2012-07-19 13:02:27.718000+00:00','2011-04-29 19:16:53.641000+00:00',22,'McCaffrey, Anne & McCaffrey, Todd','','','Anne McCaffrey/Dragon''s Kin (121)',1,'37129af8-ab53-4a23-9d58-be775671e6a9',1,'2012-07-25 09:32:04.686000+00:00');
INSERT INTO `#__books` VALUES(122,'The Skies Of Pern','Skies Of Pern, The','2012-07-19 13:02:28.734000+00:00','2011-04-29 19:16:53.958000+00:00',20,'McCaffrey, Anne','','','Anne McCaffrey/The Skies Of Pern (122)',1,'a1bdb3db-1629-4176-b4df-fdb1e19e7399',1,'2012-07-25 09:32:04.686000+00:00');
INSERT INTO `#__books` VALUES(123,'Runner of Pern','Runner of Pern','2012-07-19 13:02:29.812000+00:00','2011-04-29 19:16:54.535000+00:00',19,'McCaffrey, Anne','','','Anne McCaffrey/Runner of Pern (123)',1,'44951109-45ba-437f-a561-56fe89c449fe',1,'2012-07-25 09:32:04.686000+00:00');
INSERT INTO `#__books` VALUES(124,'The Master Harper of Pern','Master Harper of Pern, The','2012-07-19 13:02:30.718000+00:00','2011-04-29 19:16:54.698000+00:00',18,'McCaffrey, Anne','','','Anne McCaffrey/The Master Harper of Pern (124)',1,'3b51d9f4-3121-45f8-aada-6b13d90148af',1,'2012-07-25 09:32:04.686000+00:00');
INSERT INTO `#__books` VALUES(125,'Red Star Rising - DragonsEye','Red Star Rising - DragonsEye','2012-07-19 13:02:31.781000+00:00','2011-04-29 19:16:55.125000+00:00',17,'McCaffrey, Anne','','','Anne McCaffrey/Red Star Rising - DragonsEye (125)',1,'62f3e053-b121-4605-b258-1638934e790c',1,'2012-07-25 09:32:04.686000+00:00');
INSERT INTO `#__books` VALUES(126,'The Dolphins of Pern','Dolphins of Pern, The','2012-07-19 13:02:33.359000+00:00','2011-04-29 19:16:55.655000+00:00',16,'McCaffrey, Anne','','','Anne McCaffrey/The Dolphins of Pern (126)',1,'e6a4351c-2c13-41b1-a178-62499cfc4e67',1,'2012-07-25 09:32:04.686000+00:00');
INSERT INTO `#__books` VALUES(127,'All the Weyrs of Pern','All the Weyrs of Pern','2012-07-19 13:02:34.343000+00:00','2011-04-29 19:16:55.998000+00:00',15,'McCaffrey, Anne','','','Anne McCaffrey/All the Weyrs of Pern (127)',1,'2f1270e7-716f-4a79-bccb-8dd220cd7b8b',1,'2012-07-25 09:32:04.686000+00:00');
INSERT INTO `#__books` VALUES(128,'The Renegades of Pern','Renegades of Pern, The','2012-07-19 13:02:35.375000+00:00','2011-04-29 19:16:56.684000+00:00',14,'McCaffrey, Anne','','','Anne McCaffrey/The Renegades of Pern (128)',1,'055a35d6-c772-446f-b35e-062aa875b89f',1,'2012-07-25 09:32:04.686000+00:00');
INSERT INTO `#__books` VALUES(129,'The Smallest Dragonboy','Smallest Dragonboy, The','2012-07-19 13:02:36.359000+00:00','2011-04-29 19:16:57.070000+00:00',10,'McCaffrey, Anne','','','Anne McCaffrey/The Smallest Dragonboy (129)',1,'4e7d3d4a-d314-4623-96be-964ab27b896f',1,'2012-07-25 09:32:04.686000+00:00');
INSERT INTO `#__books` VALUES(130,'Dragons Dawn','Dragons Dawn','2012-07-19 13:02:37.312000+00:00','2011-04-29 19:16:57.219000+00:00',9,'McCaffrey, Anne','','','Anne McCaffrey/Dragons Dawn (130)',1,'2d98dc7e-c970-43f2-829f-c5e0b2a5ac60',1,'2012-07-25 09:32:04.686000+00:00');
INSERT INTO `#__books` VALUES(131,'Nerilka''s story','Nerilka''s story','2012-07-19 13:02:38.359000+00:00','2011-04-29 19:16:57.724000+00:00',8,'McCaffrey, Anne','','','Anne McCaffrey/Nerilka''s story (131)',1,'ad8ad487-2f90-4b91-a383-9d86ee4874b3',1,'2012-07-25 09:32:04.686000+00:00');
INSERT INTO `#__books` VALUES(132,'Moreta, Dragonlady of Pern','Moreta, Dragonlady of Pern','2012-07-19 13:02:39.359000+00:00','2011-04-29 19:16:57.927000+00:00',7,'McCaffrey, Anne','','','Anne McCaffrey/Moreta, Dragonlady of Pern (132)',1,'78e5f0e6-d92a-47a1-9bcb-2086946f68d3',1,'2012-07-25 09:32:04.686000+00:00');
INSERT INTO `#__books` VALUES(133,'The White Dragon','White Dragon, The','2012-07-19 13:02:40.437000+00:00','2011-04-29 19:16:58.368000+00:00',6,'McCaffrey, Anne','','','Anne McCaffrey/The White Dragon (133)',1,'59655f74-19eb-492f-820f-254333059659',1,'2012-07-25 09:32:04.686000+00:00');
INSERT INTO `#__books` VALUES(134,'Dragonflight','Dragonflight','2012-07-19 13:04:23.437000+00:00','2011-04-29 19:16:38.800000+00:00',1,'McCaffrey, Anne','','','Anne McCaffrey/Dragonflight (134)',1,'9317bfab-4d89-4787-be6a-2211bddd240f',1,'2012-07-25 09:32:04.686000+00:00');
INSERT INTO `#__books` VALUES(135,'At the Mountains of Madness','At the Mountains of Madness','2012-07-19 13:22:44.625000+00:00','2012-07-19 13:22:44.625000+00:00',1,'Lovecraft, H. P.','','','H. P. Lovecraft/At the Mountains of Madness (135)',1,'07b7d495-ca33-453e-95f9-95f1396b405f',1,'2012-07-25 09:20:38.119000+00:00');
INSERT INTO `#__books` VALUES(140,'Brain Droppings','Brain Droppings','2012-07-19 13:24:36.843000+00:00','2010-06-10 04:00:00+00:00',1,'Carlin, George','','','George Carlin/Brain Droppings (140)',1,'ab35bff7-4db1-4e77-b75d-0002bd257133',1,'2012-07-25 09:58:09.475000+00:00');
INSERT INTO `#__books` VALUES(142,'The Oxford Book of American Poetry','Oxford Book of American Poetry, The','2012-07-19 13:25:56.875000+00:00','2006-04-19 13:25:56+00:00',1,'Lehman, David & Brehm, John','','','David Lehman/The Oxford Book of American Poetry (142)',1,'cca6b4b2-49d2-42db-8d1f-e115fc186294',1,'2012-07-27 12:16:52.318000+00:00');
INSERT INTO `#__books` VALUES(143,'English Vocabulary Elements','English Vocabulary Elements','2012-07-19 13:25:59.109000+00:00','2012-07-19 13:25:59.109000+00:00',1,'Denning, Keith & Kessler, Brett & Leben, William R.','','','Keith Denning/English Vocabulary Elements (143)',1,'2a94b471-9008-4dbd-b66a-c9f31eb80691',1,'2012-07-27 12:16:52.318000+00:00');
INSERT INTO `#__books` VALUES(144,'Patterns in Prehistory : Humankind''s First Three Million Years','Patterns in Prehistory : Humankind''s First Three Million Years','2012-07-19 13:26:09.328000+00:00','2012-07-19 13:26:09.328000+00:00',1,'Wenke, Robert J. & Olszewsk, Deborah','','','Robert J. Wenke/Patterns in Prehistory _ Humankind''s Fir (144)',1,'04cee183-ed12-40d5-95df-f7592236eaf7',1,'2012-07-25 09:47:38.286000+00:00');
INSERT INTO `#__books` VALUES(145,'Cardiac Development','Cardiac Development','2012-07-19 13:26:18.203000+00:00','2012-07-19 13:26:18.203000+00:00',1,'Kirby, Margaret L.; Waldo, Karen.','','','Kirby, Margaret L.; Waldo, Karen_/Cardiac Development (145)',1,'a77d8d1f-d430-4dcb-8109-58f3bd1e34e7',1,'2012-07-25 09:28:36.075000+00:00');
INSERT INTO `#__books` VALUES(146,'Tracking Reason : Proof, Consequence, and Truth','Tracking Reason : Proof, Consequence, and Truth','2012-07-19 13:26:20.359000+00:00','2012-07-19 13:26:20.359000+00:00',1,'Azzouni, Jody','','','Jody Azzouni/Tracking Reason _ Proof, Consequence, an (146)',1,'962029bd-2a68-4f88-8851-40b95068bafc',1,'2012-07-25 10:46:44.725000+00:00');
INSERT INTO `#__books` VALUES(147,'The Triumph of the Fungi: A Rotten History','Triumph of the Fungi: A Rotten History, The','2012-07-19 13:26:23.703000+00:00','2012-07-19 13:26:23.703000+00:00',1,'Money, Nicholas P.','','','Nicholas P. Money/The Triumph of the Fungi_ A Rotten Histo (147)',1,'367f1899-9520-4c37-9938-f98a45efb639',1,'2012-07-25 10:29:08.600000+00:00');
INSERT INTO `#__books` VALUES(148,'Why think? Evolution and the Rational Mind','Why think? Evolution and the Rational Mind','2012-07-19 13:26:25.703000+00:00','2012-07-19 13:26:25.703000+00:00',1,'Sousa, Ronald de','','','Ronald de Sousa/Why think_ Evolution and the Rational Mi (148)',1,'774a8661-ee1a-427f-9874-31615977e79f',1,'2012-07-25 11:02:32.631000+00:00');
INSERT INTO `#__books` VALUES(149,'Doubt is Their Product: How Industry''s Assualt on Science Threatens Your Health','Doubt is Their Product: How Industry''s Assualt on Science Threatens Your Health','2012-07-19 13:26:27.234000+00:00','2012-07-19 13:26:27.234000+00:00',1,'Unknown','','','David Michales/Doubt is Their Product_ How Industry''s A (149)',1,'b5ba38bf-30de-407d-8120-fd541933c09c',1,'2012-07-19 13:52:37.234000+00:00');
INSERT INTO `#__books` VALUES(150,'Uninhibited Robust and Wide-Open: A Free Press for a New Century','Uninhibited Robust and Wide-Open: A Free Press for a New Century','2012-07-19 13:26:30.031000+00:00','2010-01-19 13:26:30+00:00',1,'Bollinger, LEC C','','','LEC C Bollinger/Uninhibited Robust and Wide-Open_ A Free (150)',1,'bdf15955-89eb-4d74-9c04-e17935fd87f1',1,'2012-07-25 09:53:30.615000+00:00');
INSERT INTO `#__books` VALUES(151,'Explorations in Personality','Explorations in Personality','2012-07-19 13:26:44.234000+00:00','2012-07-19 13:26:44.234000+00:00',1,'Murray, Henry A.','','','Henry A. Murray/Explorations in Personality (151)',1,'3b38c83c-70bf-4860-bdbd-c9e01a1fb2a7',1,'2012-07-25 10:30:08.100000+00:00');
INSERT INTO `#__books` VALUES(152,'Visions of Awakening Space and Time: Dogen and the Lotus Sutra','Visions of Awakening Space and Time: Dogen and the Lotus Sutra','2012-07-19 13:26:56.250000+00:00','2012-07-19 13:26:56.250000+00:00',1,'Leighton, Taigen Dan','','','Taigen Dan Leighton/Visions of Awakening Space and Time_ Dog (152)',1,'43955c9d-95cf-4731-9e65-eb9880f825e5',1,'2012-07-25 11:02:11.365000+00:00');
INSERT INTO `#__books` VALUES(153,'The Oxford Companion to the English Language','Oxford Companion to the English Language, The','2012-07-19 13:27:08.765000+00:00','1992-07-19 13:27:08+00:00',1,'McArthur, Tom','','','Tom McArthur/The Oxford Companion to the English Lang (153)',1,'e0cfb2b7-dc42-4e3e-8044-ebacc59a9ae8',1,'2012-07-27 12:16:52.318000+00:00');
INSERT INTO `#__books` VALUES(154,'The Oxford Dictionary of Slang','Oxford Dictionary of Slang, The','2012-07-19 13:27:20.484000+00:00','1998-07-19 13:27:20+00:00',1,'Ayto, John','','','John Ayto/The Oxford Dictionary of Slang (154)',1,'20a80772-2002-47e2-9146-b45c806d8dc3',1,'2012-07-27 12:16:52.318000+00:00');
INSERT INTO `#__books` VALUES(155,'Sayings of the Buddha: New translations by Rupert Gethin from the Pali Nikayas','Sayings of the Buddha: New translations by Rupert Gethin from the Pali Nikayas','2012-07-19 13:27:26.765000+00:00','2012-07-19 13:27:26.765000+00:00',1,'Gethin, Rupert','','','Rupert Gethin/Sayings of the Buddha_ New translations  (155)',1,'36a58b12-3311-4ae9-8ffb-db6ffacc188f',1,'2012-07-25 10:59:12.240000+00:00');
INSERT INTO `#__books` VALUES(156,'Threshold of War Franklin D. Roosevelt and American Entry into World War II','Threshold of War Franklin D. Roosevelt and American Entry into World War II','2012-07-19 13:27:38.125000+00:00','1988-09-19 13:27:38+00:00',1,'Heinrichs, Waldo','','','Waldo Heinrichs/Threshold of War Franklin D. Roosevelt a (156)',1,'de846d98-11ff-40b6-b6f3-3e271a504faa',1,'2012-07-24 09:50:51.775000+00:00');
INSERT INTO `#__books` VALUES(157,'Religion of the Gods: Ritual, Paradox and Reflexivity','Religion of the Gods: Ritual, Paradox and Reflexivity','2012-07-19 13:27:41.921000+00:00','2009-02-19 13:27:41+00:00',1,'Patton, Kimberley Christine','','','Kimberley Christine Patton/Religion of the Gods_ Ritual, Paradox an (157)',1,'69b0335a-c421-4c46-8c47-453b8a5d4612',1,'2012-07-25 09:35:03.953000+00:00');
INSERT INTO `#__books` VALUES(158,'The Role of the Sun in Climate Change','Role of the Sun in Climate Change, The','2012-07-19 13:27:52.921000+00:00','2012-07-19 13:27:52.921000+00:00',1,'Hoyt, Douglas V. & Schatten, Kenneth H.','','','Douglas V. Hoyt/The Role of the Sun in Climate Change (158)',1,'a7833da6-d36d-45b4-9905-86cc9f897619',1,'2012-07-25 10:58:49.865000+00:00');
INSERT INTO `#__books` VALUES(159,'The Grief of God: Images of the Suffering Jesus in Late Medieval England','Grief of God: Images of the Suffering Jesus in Late Medieval England, The','2012-07-19 13:28:05.203000+00:00','2012-07-19 13:28:05.203000+00:00',1,'Ross, Ellen M.','','','Ellen M. Ross/The Grief of God_ Images of the Sufferin (159)',1,'b602402c-f9c4-40ab-8b9f-a0bb4c5bdd24',1,'2012-07-25 09:40:43.721000+00:00');
INSERT INTO `#__books` VALUES(161,'Women Living Zen: Japanese Soto Buddhist Nuns','Women Living Zen: Japanese Soto Buddhist Nuns','2012-07-19 13:28:20.640000+00:00','1999-08-19 13:28:20+00:00',1,'Arai, Paula Kane Robinson','','','Paula Kane Robinson Arai/Women Living Zen_ Japanese Soto Buddhist (161)',1,'08bfd506-49a3-41ba-baeb-2ce5e4c4cba7',1,'2012-07-25 09:51:02.209000+00:00');
INSERT INTO `#__books` VALUES(162,'Visions of Compassion: Western Scientists and Tibetan Buddhists Examine Human Nature','Visions of Compassion: Western Scientists and Tibetan Buddhists Examine Human Nature','2012-07-19 13:28:29.828000+00:00','2012-07-19 13:28:29.828000+00:00',1,'Davidson, Richard J. & Harrington, Anne','','','Richard J. Davidson/Visions of Compassion_ Western Scientist (162)',1,'a23373dd-7470-4893-ae43-d0bbd411d063',1,'2012-07-25 10:09:48.162000+00:00');
INSERT INTO `#__books` VALUES(163,'Virtue Epistemology: Essays on Epistemic Virtue and Responsibility','Virtue Epistemology: Essays on Epistemic Virtue and Responsibility','2012-07-19 13:28:33+00:00','2012-07-19 13:28:33+00:00',1,'Fairweather, Abrol & Zagzebski, Linda','','','Abrol Fairweather/Virtue Epistemology_ Essays on Epistemic (163)',1,'c2844a2f-023e-4e22-95f6-c906632aa367',1,'2012-07-25 10:47:11.271000+00:00');
INSERT INTO `#__books` VALUES(164,'The Art of the Infinite: The Pleasures of Mathematics','Art of the Infinite: The Pleasures of Mathematics, The','2012-07-19 13:28:36.078000+00:00','2012-07-19 13:28:36.078000+00:00',1,'Kaplan, Robert & Kaplan, Ellen','','','Robert Kaplan/The Art of the Infinite_ The Pleasures o (164)',1,'7afa2a65-3b91-4af1-adc5-f5099595a067',1,'2012-08-27 10:47:03.158000+00:00');
INSERT INTO `#__books` VALUES(165,'The Nature of Design: Ecology Culture and Human Intention','Nature of Design: Ecology Culture and Human Intention, The','2012-07-19 13:28:38.906000+00:00','2012-07-19 13:28:38.906000+00:00',1,'Orr, David. W.','','','David. W. Orr/The Nature of Design_ Ecology Culture an (165)',1,'85405e67-d010-4fcb-88d7-b9df5160088f',1,'2012-07-25 09:33:37.108000+00:00');
INSERT INTO `#__books` VALUES(166,'Concealment and Exposure and Other Essays','Concealment and Exposure and Other Essays','2012-07-19 13:28:41.531000+00:00','2012-07-19 13:28:41.531000+00:00',1,'Nagel, Thomas','','','Thomas Nagel/Concealment and Exposure and Other Essay (166)',1,'b6add685-1a89-46c1-aa3a-011522a0cd1b',1,'2012-07-25 10:30:44.256000+00:00');
INSERT INTO `#__books` VALUES(167,'Technology: A World History','Technology: A World History','2012-07-19 13:28:42.687000+00:00','2012-07-19 13:28:42.687000+00:00',1,'Headrick, Daniel R.','','','Daniel R. Headrick/Technology_ A World History (167)',1,'de38f9e6-24d7-45a8-ac73-64d121c5c9a7',1,'2012-07-25 11:00:45.318000+00:00');
INSERT INTO `#__books` VALUES(181,'Believing by Faith: An Essay in the Epistemology and Ethics of Religious Belief','Believing by Faith: An Essay in the Epistemology and Ethics of Religious Belief','2012-07-19 14:06:32.140000+00:00','2012-07-19 14:06:32.140000+00:00',1,'Bishop, John','','','John Bishop/Believing by Faith_ An Essay in the Epis (181)',1,'2ca3b59b-ccc9-48d5-8743-ac5b26fb37c7',1,'2012-07-25 09:53:07.100000+00:00');
INSERT INTO `#__books` VALUES(182,'The Possibility of Knowledge','Possibility of Knowledge, The','2012-07-19 14:06:33.781000+00:00','2012-07-19 14:06:33.781000+00:00',1,'Cassam, Quassim','','','Quassim Cassam/The Possibility of Knowledge (182)',1,'bff6b9eb-abea-43d4-8ead-2b2cab9e2219',1,'2012-07-25 10:01:52.068000+00:00');
INSERT INTO `#__books` VALUES(183,'The Impartial Spectator: Adam Smiths Moral Philosophy','Impartial Spectator: Adam Smiths Moral Philosophy, The','2012-07-19 14:06:35.062000+00:00','2007-03-19 14:06:35+00:00',1,'Raphael, D. D.','','','D. D. Raphael/The Impartial Spectator_ Adam Smiths Mor (183)',1,'d06e8388-c8d1-48f0-bbc7-bb34f31d836b',1,'2012-07-25 09:37:16.626000+00:00');
INSERT INTO `#__books` VALUES(184,'Defending the Society of States : Why America Opposes the International Criminal Court and Its Vision of World Society','Defending the Society of States : Why America Opposes the International Criminal Court and Its Vision of World Society','2012-07-19 14:06:36.375000+00:00','2012-07-19 14:06:36.375000+00:00',1,'Ralph, Jason G.','','','Ralph, Jason G_/Defending the Society of States _ Why Am (184)',1,'d34204dd-a282-4f12-8445-362d61eb868d',1,'2012-07-25 09:36:23.531000+00:00');
INSERT INTO `#__books` VALUES(185,'The Origin of Speech','Origin of Speech, The','2012-07-19 14:06:38.812000+00:00','2012-07-19 14:06:38.812000+00:00',1,'Macneilage, Peter F.','','','Peter F. Macneilage/The Origin of Speech (185)',1,'29b52ef2-939b-4221-8417-b879891dedec',1,'2012-07-27 12:16:52.630000+00:00');
INSERT INTO `#__books` VALUES(186,'Christocentric Cosmology of St. Maximus the Confessor','Christocentric Cosmology of St. Maximus the Confessor','2012-07-19 14:06:40.187000+00:00','2012-07-19 14:06:40.203000+00:00',1,'Tollefsen, Torstein Theodor','','','Torstein Theodor Tollefsen/Christocentric Cosmology of St. Maximus  (186)',1,'0b790e0e-3a7e-4f3b-9d50-94a746570b4e',1,'2012-07-25 09:31:33.748000+00:00');
INSERT INTO `#__books` VALUES(187,'Hegelian Metaphysics','Hegelian Metaphysics','2012-07-19 14:06:42.187000+00:00','2009-07-19 14:06:42+00:00',1,'Stern, Robert','','','Robert Stern/Hegelian Metaphysics (187)',1,'6caac63e-8b97-4749-932f-d59cb47b7591',1,'2012-07-25 10:52:54.506000+00:00');
INSERT INTO `#__books` VALUES(188,'Behind the Berlin Wall East Germany and the Frontiers of Power','Behind the Berlin Wall East Germany and the Frontiers of Power','2012-07-19 14:06:43.968000+00:00','2010-01-19 14:06:43+00:00',1,'Major, Patrick','','','Patrick Major/Behind the Berlin Wall East Germany and  (188)',1,'f5eeb3bd-55d8-4290-bf73-4e5933b21115',1,'2012-08-08 08:59:21.609000+00:00');
INSERT INTO `#__books` VALUES(189,'Powers: A Study in Metaphysics','Powers: A Study in Metaphysics','2012-07-19 14:06:45.687000+00:00','2012-07-19 14:06:45.687000+00:00',1,'Molnar, George','','','George Molnar/Powers_ A Study in Metaphysics (189)',1,'480aba21-933b-4846-a01f-7580280795fe',1,'2012-07-25 10:28:17.787000+00:00');
INSERT INTO `#__books` VALUES(190,'Behold the Man: Jesus and Greco-Roman Masculinity','Behold the Man: Jesus and Greco-Roman Masculinity','2012-07-19 14:06:47.156000+00:00','2012-07-19 14:06:47.156000+00:00',1,'Conway, Colleen M.','','','Colleen M. Conway/Behold the Man_ Jesus and Greco-Roman Ma (190)',1,'4095e6c7-7e2e-411a-ac7d-d5b10ea4f91b',1,'2012-07-25 09:21:22.088000+00:00');
INSERT INTO `#__books` VALUES(191,'The Global Environment Natural Resources and Economic Growth','Global Environment Natural Resources and Economic Growth, The','2012-07-19 14:06:49.343000+00:00','2008-07-19 14:06:49+00:00',1,'Greiner, Alfred & Semmler, Willi','','','Alfred Greiner/The Global Environment Natural Resources (191)',1,'31d82d08-22c6-4470-a645-c295159977b1',1,'2012-07-25 11:05:51.225000+00:00');
INSERT INTO `#__books` VALUES(192,'Over Criminalization: The Limits of the Criminal Law','Over Criminalization: The Limits of the Criminal Law','2012-07-19 14:06:51.859000+00:00','2012-07-19 14:06:51.859000+00:00',1,'Husak, Douglas','','','Douglas Husak/Over Criminalization_ The Limits of the  (192)',1,'50f9abce-dcf9-4d01-ad4e-3f9279486427',1,'2012-07-20 05:52:20.265000+00:00');
INSERT INTO `#__books` VALUES(193,'Clinical Data-Mining Integrating Practice and Research','Clinical Data-Mining Integrating Practice and Research','2012-07-19 14:06:53.046000+00:00','2009-11-19 14:06:53+00:00',1,'Epstein, Irwin','','','Irwin Epstein/Clinical Data-Mining Integrating Practic (193)',1,'309c0f94-dd47-4d01-9004-8732b88920d7',1,'2012-07-27 12:17:30.337000+00:00');
INSERT INTO `#__books` VALUES(194,'The Anti-Intellectual Presidency: The Decline of Presidential Rhetoric from George Washington to George W. Bush','Anti-Intellectual Presidency: The Decline of Presidential Rhetoric from George Washington to George W. Bush, The','2012-07-19 14:06:56.859000+00:00','2012-07-19 14:06:56.859000+00:00',1,'Lim, Elvin T.','','','Elvin T. Lim/The Anti-Intellectual Presidency_ The De (194)',1,'7f398adc-5718-4ca6-b65e-0e26212de5a3',1,'2012-07-20 05:49:46.875000+00:00');
INSERT INTO `#__books` VALUES(195,'The Changing Portrayal of Adolescents in the Media Since 1950','Changing Portrayal of Adolescents in the Media Since 1950, The','2012-07-19 14:06:58.734000+00:00','2008-07-19 14:06:58+00:00',1,'Jamieson, Patrick E. & Romer, Daniel','','','Patrick E. Jamieson/The Changing Portrayal of Adolescents in (195)',1,'64af2831-df3e-4f8a-b8cc-54682f29bb1f',1,'2012-07-25 09:29:32.451000+00:00');
INSERT INTO `#__books` VALUES(196,'Beyond the Roof of the World : Music, Prayer, and Healing in the Pamir Mountains','Beyond the Roof of the World : Music, Prayer, and Healing in the Pamir Mountains','2012-07-19 14:07:02.921000+00:00','2012-07-19 14:07:02.921000+00:00',1,'Koen, Benjamin D.','','','Koen, Benjamin D_/Beyond the Roof of the World _ Music, Pr (196)',1,'8113b035-8e04-48d7-9310-74ab2663f737',1,'2012-07-25 09:22:11.151000+00:00');
INSERT INTO `#__books` VALUES(197,'America''s Three Regimes: New Political History','America''s Three Regimes: New Political History','2012-07-19 14:07:04.984000+00:00','2012-07-19 14:07:04.984000+00:00',1,'Keller, Morton','','','Morton Keller/America''s Three Regimes_ New Political H (197)',1,'cc71bd79-6eed-4ba0-a100-12fbc23c16a9',1,'2012-07-19 14:18:06.906000+00:00');
INSERT INTO `#__books` VALUES(198,'China in the 21st Century: What Everyone Needs to Know','China in the 21st Century: What Everyone Needs to Know','2012-07-19 14:07:06.968000+00:00','2010-04-19 14:07:06+00:00',1,'Wasserstrom, Jeffrey N.','','','Jeffrey N. Wasserstrom/China in the 21st Century_ What Everyone (198)',1,'4192ef89-9011-435f-9194-aa29d553d6b8',1,'2012-07-19 14:17:50.421000+00:00');
INSERT INTO `#__books` VALUES(199,'Justice Beyond Borders : A Global Political Theory','Justice Beyond Borders : A Global Political Theory','2012-07-19 14:07:09.343000+00:00','2012-07-19 14:07:09.343000+00:00',1,'Caney, Simon.','','','Simon Caney/Justice Beyond Borders _ A Global Politi (199)',1,'0cf0884e-ce11-4d0f-bc48-180e7fd93e18',1,'2012-07-19 14:16:50.281000+00:00');
INSERT INTO `#__books` VALUES(200,'Spatial Analysis in Epidemiology','Spatial Analysis in Epidemiology','2012-07-19 14:07:12.187000+00:00','2008-07-19 14:07:12+00:00',1,'Pfeiffer, Drik U & Robinson, Timothy P. & Stevenson, Mark & Stevens, Kim B. & Rojers, David J. & Clements, Archie C. A.','','','Drik U Pfeiffer/Spatial Analysis in Epidemiology (200)',1,'927abc02-b9eb-45c0-8ae9-d1b264f95055',1,'2012-07-25 09:35:21.203000+00:00');
INSERT INTO `#__books` VALUES(201,'Facts and Mysteries in Elementary Particle Physics','Facts and Mysteries in Elementary Particle Physics','2012-07-19 14:07:19.515000+00:00','2012-07-19 14:07:19.515000+00:00',1,'Veltman, Martinus','','','Martinus Veltman/Facts and Mysteries in Elementary Partic (201)',1,'eb522915-c512-4a0d-b540-c161d2fd2532',1,'2012-07-25 10:52:24.834000+00:00');
INSERT INTO `#__books` VALUES(202,'Aging of the Genome: The Dual Role of DNA in Life and Death','Aging of the Genome: The Dual Role of DNA in Life and Death','2012-07-19 14:07:24.328000+00:00','2012-07-19 14:07:24.328000+00:00',1,'Vijg, Jan','','','Jan Vijg/Aging of the Genome_ The Dual Role of DN (202)',1,'0067e086-cf8b-48f0-9564-985361a23c60',1,'2012-07-25 09:19:09.056000+00:00');
INSERT INTO `#__books` VALUES(203,'Information, Physics, and Computation','Information, Physics, and Computation','2012-07-19 14:07:37.843000+00:00','2012-07-19 14:07:37.843000+00:00',1,'Mezard, Marc & Montanari, Andrea','','','Marc Mezard/Information, Physics, and Computation (203)',1,'ac18a542-0da5-4fcd-bbca-144e83d56fb3',1,'2012-08-27 10:47:03.158000+00:00');
INSERT INTO `#__books` VALUES(204,'Theories of Lexical Symantics','Oxford U. Press - Theories of Lexical Symantics (2010) (ATTiCA)','2012-07-19 14:07:40.828000+00:00','2010-07-19 14:07:40+00:00',1,'Geeraerts, Dirk','','','Dirk Geeraerts/Theories of Lexical Symantics (204)',1,'0046108b-6133-4ef5-a9f1-6d90d39a5a54',1,'2012-07-19 14:11:14.453000+00:00');
INSERT INTO `#__books` VALUES(205,'Medival Philosophy','Medival Philosophy','2012-07-19 14:07:45.890000+00:00','2012-07-19 14:07:45.890000+00:00',2,'Kenny, Anthony','','','Anthony Kenny/Medival Philosophy (205)',1,'319e0ba4-ce36-4990-9b0b-eff452877cb0',1,'2012-07-25 10:55:07.709000+00:00');







INSERT INTO `#__books_authors_link` VALUES(29,18,20);
INSERT INTO `#__books_authors_link` VALUES(45,9,34);
INSERT INTO `#__books_authors_link` VALUES(62,28,45);
INSERT INTO `#__books_authors_link` VALUES(68,32,50);
INSERT INTO `#__books_authors_link` VALUES(111,134,89);
INSERT INTO `#__books_authors_link` VALUES(112,133,89);
INSERT INTO `#__books_authors_link` VALUES(113,132,89);
INSERT INTO `#__books_authors_link` VALUES(114,131,89);
INSERT INTO `#__books_authors_link` VALUES(115,130,89);
INSERT INTO `#__books_authors_link` VALUES(116,129,89);
INSERT INTO `#__books_authors_link` VALUES(117,128,89);
INSERT INTO `#__books_authors_link` VALUES(118,127,89);
INSERT INTO `#__books_authors_link` VALUES(119,126,89);
INSERT INTO `#__books_authors_link` VALUES(122,125,89);
INSERT INTO `#__books_authors_link` VALUES(123,124,89);
INSERT INTO `#__books_authors_link` VALUES(124,123,89);
INSERT INTO `#__books_authors_link` VALUES(125,122,89);
INSERT INTO `#__books_authors_link` VALUES(132,121,89);
INSERT INTO `#__books_authors_link` VALUES(133,121,90);
INSERT INTO `#__books_authors_link` VALUES(142,119,90);
INSERT INTO `#__books_authors_link` VALUES(143,118,89);
INSERT INTO `#__books_authors_link` VALUES(144,118,90);
INSERT INTO `#__books_authors_link` VALUES(145,117,89);
INSERT INTO `#__books_authors_link` VALUES(146,117,90);
INSERT INTO `#__books_authors_link` VALUES(147,116,90);
INSERT INTO `#__books_authors_link` VALUES(148,115,89);
INSERT INTO `#__books_authors_link` VALUES(149,114,89);
INSERT INTO `#__books_authors_link` VALUES(230,166,109);
INSERT INTO `#__books_authors_link` VALUES(231,165,107);
INSERT INTO `#__books_authors_link` VALUES(232,164,110);
INSERT INTO `#__books_authors_link` VALUES(233,164,111);
INSERT INTO `#__books_authors_link` VALUES(252,149,122);
INSERT INTO `#__books_authors_link` VALUES(255,152,101);
INSERT INTO `#__books_authors_link` VALUES(258,155,119);
INSERT INTO `#__books_authors_link` VALUES(279,167,108);
INSERT INTO `#__books_authors_link` VALUES(287,148,124);
INSERT INTO `#__books_authors_link` VALUES(288,147,125);
INSERT INTO `#__books_authors_link` VALUES(292,143,127);
INSERT INTO `#__books_authors_link` VALUES(293,143,128);
INSERT INTO `#__books_authors_link` VALUES(294,143,129);
INSERT INTO `#__books_authors_link` VALUES(297,142,130);
INSERT INTO `#__books_authors_link` VALUES(298,142,131);
INSERT INTO `#__books_authors_link` VALUES(334,205,141);
INSERT INTO `#__books_authors_link` VALUES(335,204,142);
INSERT INTO `#__books_authors_link` VALUES(342,201,146);
INSERT INTO `#__books_authors_link` VALUES(356,199,153);
INSERT INTO `#__books_authors_link` VALUES(357,198,154);
INSERT INTO `#__books_authors_link` VALUES(358,197,138);
INSERT INTO `#__books_authors_link` VALUES(361,194,136);
INSERT INTO `#__books_authors_link` VALUES(364,193,157);
INSERT INTO `#__books_authors_link` VALUES(365,192,158);
INSERT INTO `#__books_authors_link` VALUES(366,191,159);
INSERT INTO `#__books_authors_link` VALUES(367,191,160);
INSERT INTO `#__books_authors_link` VALUES(369,189,162);











INSERT INTO `#__books_tags_link` VALUES(58,165,53);
INSERT INTO `#__books_tags_link` VALUES(74,149,67);
INSERT INTO `#__books_tags_link` VALUES(93,204,85);
INSERT INTO `#__books_tags_link` VALUES(94,204,86);
INSERT INTO `#__books_tags_link` VALUES(95,204,87);
INSERT INTO `#__books_tags_link` VALUES(96,204,88);
INSERT INTO `#__books_tags_link` VALUES(97,193,89);
INSERT INTO `#__books_tags_link` VALUES(103,152,94);
INSERT INTO `#__books_tags_link` VALUES(104,152,95);











INSERT INTO `#__tags` VALUES(23,'Erotica - General');
INSERT INTO `#__tags` VALUES(24,'Mystery & Detective');
INSERT INTO `#__tags` VALUES(25,'Fantasy fiction');
INSERT INTO `#__tags` VALUES(26,'Horror');
INSERT INTO `#__tags` VALUES(27,'Contemporary');
INSERT INTO `#__tags` VALUES(28,'Fiction - Fantasy');
INSERT INTO `#__tags` VALUES(29,'General');
INSERT INTO `#__tags` VALUES(30,'Fantasy');
INSERT INTO `#__tags` VALUES(31,'Romantic suspense fiction');
INSERT INTO `#__tags` VALUES(32,'Horror - General');
INSERT INTO `#__tags` VALUES(33,'Thrillers');
INSERT INTO `#__tags` VALUES(34,'Erotica');
INSERT INTO `#__tags` VALUES(35,'Fiction');
INSERT INTO `#__tags` VALUES(36,'Fantasy - Contemporary');
INSERT INTO `#__tags` VALUES(53,'Ecology');
INSERT INTO `#__tags` VALUES(67,'Health; Industry');
INSERT INTO `#__tags` VALUES(85,'Synonymy');
INSERT INTO `#__tags` VALUES(86,'Componential analysis');
INSERT INTO `#__tags` VALUES(87,'Metaphor');
INSERT INTO `#__tags` VALUES(88,'Lexical field');
INSERT INTO `#__tags` VALUES(89,'Social Work; Research Methods');
INSERT INTO `#__tags` VALUES(94,'Printed on USA on 2011');
INSERT INTO `#__tags` VALUES(95,'ISBN-13: 9780195320930');
