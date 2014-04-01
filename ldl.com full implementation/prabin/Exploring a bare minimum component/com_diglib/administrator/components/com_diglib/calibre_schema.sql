CREATE TABLE `authors` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`name` VARCHAR(255) character set utf8 collate utf8_bin NOT NULL,
		`sort` VARCHAR(255) character set utf8 collate utf8_bin NULL,
		`link` VARCHAR(255) NOT NULL ,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`name`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `books` ( 
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
CREATE TABLE `books_languages_link` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`book` INT(11) NOT NULL,
		`lang_code` INT(11) NOT NULL,
		`item_order` INT(11) NOT NULL DEFAULT 0,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`book`, `lang_code`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE `books_plugin_data` (
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`book` INT(11) NULL,
		`name` VARCHAR(255) NULL,
		`val` VARCHAR(255) NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(book,name)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE `books_publishers_link` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`book` INT(11) NOT NULL,
		`publisher` INT(11) NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`book`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE `books_ratings_link` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`book` INT(11) NOT NULL,
		`rating` INT(11) NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`book`, `rating`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE `books_series_link` ( `id` INT(11) NOT NULL AUTO_INCREMENT,
		`book` INT(11) NOT NULL,
		`series` INT(11) NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`book`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE `books_tags_link` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`book` INT(11) NOT NULL,
		`tag` INT(11) NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`book`, `tag`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE `comments` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`book` INT(11) NULL,
		`text` LONGTEXT character set utf8 collate utf8_bin NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`book`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE `conversion_options` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`format` VARCHAR(255) character set utf8 collate utf8_bin NOT NULL,
		`book` INT(11),
		`data` LONGTEXT character set utf8 collate utf8_bin NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`format`,`book`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE `custom_columns` (
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
CREATE TABLE `data` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`book` INT(11) NULL,
		`format` varchar(255) character set utf8 collate utf8_bin NULL,
		`uncompressed_size` INT(11) NULL,
		`name` varchar(255) character set utf8 collate utf8_bin NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`book`, `format`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE `feeds` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`title` VARCHAR(255) NOT NULL,
		`script` VARCHAR(255) NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE `identifiers` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`book` INT(11) NULL,
		`type` varchar(25) character set utf8 collate utf8_bin NULL DEFAULT 'isbn',
		`val` varchar(25) character set utf8 collate utf8_bin NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`book`, `type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE `languages` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`lang_code` varchar(25) character set utf8 collate utf8_bin NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`lang_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE `metadata_dirtied`(
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`book` INT(11) NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`book`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE `preferences`(
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`key` varchar(25) NULL,
		`val` varchar(25) NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE `publishers` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`name` VARCHAR(255) character set utf8 collate utf8_bin NOT NULL,
		`sort` VARCHAR(255) character set utf8 collate utf8_bin,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`name`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE `ratings` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`rating` INT(11) CHECK(rating > -1 AND rating < 11),
		PRIMARY KEY (`id`),
		UNIQUE (`rating`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE `series` ( 
		`id` INT(11) ,
		`name` VARCHAR(255) character set utf8 collate utf8_bin NOT NULL,
		`sort` VARCHAR(255) character set utf8 collate utf8_bin,
		PRIMARY KEY (`id`),
		UNIQUE (`name`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE `tags` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`name` VARCHAR(255) character set utf8 collate utf8_bin NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE (`name`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE `custom_column_1`(
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`value` VARCHAR(255) character set utf8 collate utf8_bin NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`value`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE `books_custom_column_1_link`(
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`book` INT(11) NOT NULL,
		`value` INT(11) NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`book`, `value`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE `custom_column_2`(
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`value` VARCHAR(255) character set utf8 collate utf8_bin NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`value`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE `books_custom_column_2_link`(
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`book` INT(11) NOT NULL,
		`value` INT(11) NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`book`, `value`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE `books_authors_link` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`book` INT(11) NOT NULL,
		`author` INT(11) NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`book`, `author`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE `library_id` ( 
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`uuid` VARCHAR(255) NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY(`uuid`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
