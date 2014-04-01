CREATE TABLE `authors` (
	`id` int(11) NOT NULL auto_increment,
	`name` varchar(255) character set utf8 collate utf8_bin NOT NULL,
	`sort` varchar(255) character set utf8 collate utf8_bin default NULL,
	`link` varchar(255) character set utf8 collate utf8_bin default NULL,
	PRIMARY KEY  (`id`),
	UNIQUE KEY (`name`),
) ENGINE=InnoDB ;