CREATE TABLE plzxoo_question ( 
	`qid` int(10) auto_increment,
	`cid` mediumint(5) NOT NULL default 0,
	`uid` mediumint(5) NOT NULL default 0,
	`subject` varchar(255) NOT NULL default '',
	`body` text NOT NULL,
	`input_date` int(10) NOT NULL default 0,
	`modified_date` int(10) NOT NULL default 0,
	`priority` tinyint(3) NOT NULL default 0,
	`status` tinyint(1) NOT NULL default 1,
	`size` mediumint(5) NOT NULL default 0,
	`for_search` mediumtext NOT NULL,
	PRIMARY KEY (`qid`) ,
	KEY (`cid`) ,
	KEY (`uid`) ,
	KEY (`status`) ,
	KEY (`input_date`) ,
	KEY (`modified_date`)
) TYPE=MyISAM;

CREATE TABLE plzxoo_answer ( 
	`aid` int(10) auto_increment,
	`qid` int(10) NOT NULL default 0,
	`uid` mediumint(5) NOT NULL default 0,
	`input_date` int(10) NOT NULL default 0,
	`modified_date` int(10) NOT NULL default 0,
	`body` text NOT NULL,
	`comment` text NOT NULL,
	`point` tinyint(3) NOT NULL default 0,
	PRIMARY KEY (`aid`) ,
	KEY (`qid`) ,
	KEY (`uid`) ,
	KEY (`input_date`) ,
	KEY (`modified_date`)
) TYPE=MyISAM;

CREATE TABLE plzxoo_category ( 
	`cid` int(10) auto_increment,
	`pid` int(10) NOT NULL default 0,
	`name` varchar(255) NOT NULL default '',
	`description` text NOT NULL,
	`size` mediumint(5) NOT NULL default 0,
	`weight` mediumint(5) NOT NULL default 0,
	PRIMARY KEY (`cid`) ,
	KEY (`weight`) ,
	KEY (`pid`)
) TYPE=MyISAM;

INSERT INTO plzxoo_category SET `cid`=1,`pid`=0,`name`='sample',`description`='rename this';

