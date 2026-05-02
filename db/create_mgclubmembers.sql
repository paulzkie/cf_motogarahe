-- Create mgclubmembers table (inferred schema)
CREATE TABLE IF NOT EXISTS `mgclubmembers` (
  `mgclubid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `accountno` VARCHAR(100) NOT NULL,
  `fullname` VARCHAR(255) NOT NULL DEFAULT '',
  `address` TEXT,
  `contactno` VARCHAR(50) DEFAULT NULL,
  `email` VARCHAR(150) DEFAULT NULL,
  `mgclubimg` VARCHAR(255) DEFAULT NULL,
  `status` VARCHAR(50) NOT NULL DEFAULT 'active',
  `datecreated` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`mgclubid`),
  UNIQUE KEY `u_accountno` (`accountno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
