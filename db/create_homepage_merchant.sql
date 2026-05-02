-- Create homepage_merchant table (minimal, inferred schema)
CREATE TABLE IF NOT EXISTS `homepage_merchant` (
  `merchantid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `merchantname` VARCHAR(255) NOT NULL DEFAULT '',
  `merchantdesc` TEXT,
  `username` VARCHAR(150) NOT NULL DEFAULT '',
  `password` VARCHAR(255) NOT NULL DEFAULT '',
  `merchantimg` VARCHAR(255) DEFAULT NULL,
  `status` VARCHAR(50) NOT NULL DEFAULT 'draft',
  `datecreated` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`merchantid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
