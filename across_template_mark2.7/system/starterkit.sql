-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2018 at 11:49 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `starterkit`
--

-- --------------------------------------------------------

--
-- Table structure for table `across_account_type_template`
--

CREATE TABLE IF NOT EXISTS `across_account_type_template` (
  `pageTemplateId` int(10) NOT NULL,
  `userTypeId` int(10) NOT NULL,
  `pageId` int(10) NOT NULL,
  `aview` int(2) NOT NULL COMMENT '-1=hidden 0=hide 1=show',
  `aadd` int(2) NOT NULL,
  `aedit` int(2) NOT NULL,
  `adelete` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `across_account_type_template`
--

INSERT INTO `across_account_type_template` (`pageTemplateId`, `userTypeId`, `pageId`, `aview`, `aadd`, `aedit`, `adelete`) VALUES
(1, 1, 1, 1, 0, 0, 0),
(2, 1, 2, 1, 1, 1, 1),
(3, 1, 3, 1, 1, 1, 1),
(13, 1, 13, 1, 0, 0, 0),
(14, 1, 14, 1, 0, 0, 0),
(31, 1, 15, 1, 0, 0, 0),
(35, 1, 18, 1, 1, 0, 0),
(36, 1, 19, 1, 0, 0, 0),
(37, 1, 20, 1, 0, 0, 0),
(38, 1, 21, 1, 0, 0, 0),
(39, 1, 22, 1, 0, 0, 0),
(40, 1, 23, 1, 0, 0, 0),
(41, 1, 24, 1, 0, 0, 0),
(42, 1, 25, 1, 0, 0, 0),
(43, 1, 26, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `across_coding`
--

CREATE TABLE IF NOT EXISTS `across_coding` (
  `codeNumber` int(10) NOT NULL,
  `codePrefix` text NOT NULL,
  `codeLength` int(10) NOT NULL,
  `tableName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `across_coding`
--

INSERT INTO `across_coding` (`codeNumber`, `codePrefix`, `codeLength`, `tableName`) VALUES
(1, 'USR', 6, 'across_p_dealer');

-- --------------------------------------------------------

--
-- Table structure for table `across_group`
--

CREATE TABLE IF NOT EXISTS `across_group` (
  `groupId` int(10) NOT NULL AUTO_INCREMENT,
  `groupOrder` int(10) NOT NULL,
  `groupAlias` varchar(50) NOT NULL,
  `groupName` varchar(50) NOT NULL,
  `isVisible` int(1) NOT NULL,
  PRIMARY KEY (`groupId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `across_group`
--

INSERT INTO `across_group` (`groupId`, `groupOrder`, `groupAlias`, `groupName`, `isVisible`) VALUES
(1, 1, 'dashboard', 'DashBoard', 1),
(4, 5, 'hr', 'HR', 1),
(6, 6, 'administrator', 'Administrator', 1);

-- --------------------------------------------------------

--
-- Table structure for table `across_icons`
--

CREATE TABLE IF NOT EXISTS `across_icons` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `iconId` int(11) NOT NULL,
  `iconFileName` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `across_icons`
--

INSERT INTO `across_icons` (`id`, `iconId`, `iconFileName`) VALUES
(1, 1, 'maintenance.png');

-- --------------------------------------------------------

--
-- Table structure for table `across_image`
--

CREATE TABLE IF NOT EXISTS `across_image` (
  `imgid` int(10) NOT NULL,
  `imgtype` text NOT NULL,
  `img_location` text NOT NULL,
  PRIMARY KEY (`imgid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `across_image`
--

INSERT INTO `across_image` (`imgid`, `imgtype`, `img_location`) VALUES
(1, 'image/jpeg', 'resources/images/All_images/2016-01-211.jpg'),
(3, 'image/jpeg', 'resources/images/All_images/2016-01-233.jpg'),
(5, 'image/jpeg', 'resources/images/All_images/2016-01-235.jpg'),
(6, 'image/jpeg', 'resources/images/All_images/2016-01-276.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `across_module`
--

CREATE TABLE IF NOT EXISTS `across_module` (
  `moduleId` int(10) NOT NULL AUTO_INCREMENT,
  `groupId` int(10) NOT NULL,
  `moduleOrder` int(10) NOT NULL,
  `moduleAlias` varchar(50) NOT NULL,
  `moduleName` varchar(50) NOT NULL,
  PRIMARY KEY (`moduleId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `across_module`
--

INSERT INTO `across_module` (`moduleId`, `groupId`, `moduleOrder`, `moduleAlias`, `moduleName`) VALUES
(1, 4, 1, 'profile', 'User Profile'),
(2, 4, 2, 'personnel_information', 'Personnel Information'),
(6, 6, 9, 'administration', 'Administration'),
(7, 6, 10, 'docs', 'Documentation'),
(9, 4, 7, 'reports', 'Reports');

-- --------------------------------------------------------

--
-- Table structure for table `across_page`
--

CREATE TABLE IF NOT EXISTS `across_page` (
  `pageId` int(10) NOT NULL AUTO_INCREMENT,
  `moduleId` int(10) NOT NULL,
  `pageOrder` int(10) NOT NULL,
  `pageAlias` varchar(50) NOT NULL,
  `pageName` varchar(50) NOT NULL,
  PRIMARY KEY (`pageId`),
  KEY `page_moduleId_fk` (`moduleId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `across_page`
--

INSERT INTO `across_page` (`pageId`, `moduleId`, `pageOrder`, `pageAlias`, `pageName`) VALUES
(1, 1, 1, 'user_profile', 'Profile'),
(2, 2, 1, 'personnel_registration', 'Personnel Information'),
(3, 2, 2, 'personnel_login_account', 'Personnel Login Account'),
(13, 6, 1, 'page_template', 'Page Template'),
(14, 6, 2, 'page_authorization', 'Page Authorization'),
(19, 6, 3, 'page_management', 'Page Management'),
(20, 6, 4, 'module_management', 'Module Management'),
(21, 7, 3, 'sample_api_handling', 'Sample API handling'),
(22, 7, 4, 'sample_printview', 'Sample Printview'),
(23, 9, 1, 'reports', 'Reports'),
(24, 6, 5, 'usertype_management', 'User type Management'),
(25, 7, 2, 'adding_new_pages', 'Adding New Pages and Modules'),
(26, 7, 1, 'intro', 'Introduction');

-- --------------------------------------------------------

--
-- Table structure for table `across_p_authorization`
--

CREATE TABLE IF NOT EXISTS `across_p_authorization` (
  `accountid` int(10) NOT NULL,
  `pageId` int(10) NOT NULL,
  `aview` int(2) NOT NULL COMMENT '-1=hidden 0=hide 1=show',
  `aadd` int(2) NOT NULL,
  `aedit` int(2) NOT NULL,
  `adelete` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `across_p_authorization`
--

INSERT INTO `across_p_authorization` (`accountid`, `pageId`, `aview`, `aadd`, `aedit`, `adelete`) VALUES
(1, 1, 1, 0, 0, 0),
(1, 2, 1, 1, 1, 1),
(1, 3, 1, 1, 1, 1),
(1, 13, 1, 0, 0, 0),
(1, 14, 1, 0, 0, 0),
(1, 15, 1, 0, 0, 0),
(1, 18, 1, 1, 0, 0),
(1, 19, 1, 0, 0, 0),
(1, 20, 1, 0, 0, 0),
(1, 21, 1, 0, 0, 0),
(1, 22, 1, 0, 0, 0),
(1, 23, 1, 0, 0, 0),
(1, 24, 1, 0, 0, 0),
(1, 25, 1, 0, 0, 0),
(1, 26, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `across_p_person`
--

CREATE TABLE IF NOT EXISTS `across_p_person` (
  `pid` int(10) NOT NULL,
  `fname` text NOT NULL,
  `mname` text NOT NULL,
  `lname` text NOT NULL,
  `ename` text NOT NULL,
  `gender` int(2) NOT NULL COMMENT '1=male 2=female',
  `imgid` int(10) NOT NULL,
  `remark` int(2) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `across_p_person`
--

INSERT INTO `across_p_person` (`pid`, `fname`, `mname`, `lname`, `ename`, `gender`, `imgid`, `remark`) VALUES
(1, 'Across', '', 'Media', '', 1, 1, 1),
(2, 'JOHN', 'MATTHEW', 'LUKE', '', 1, 0, 1),
(3, 'JOHN', 'MARK', 'JAMES', '', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `across_p_personnel`
--

CREATE TABLE IF NOT EXISTS `across_p_personnel` (
  `pid` int(10) NOT NULL,
  `personnel_id` text NOT NULL,
  `civilstat` int(2) NOT NULL COMMENT '1=single 2=married 3=divorced',
  `bdate` date NOT NULL,
  `home_address` text NOT NULL,
  `present_address` text NOT NULL,
  `mobilenum` text NOT NULL,
  `other_contact` text NOT NULL,
  `remark` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `across_p_personnel`
--

INSERT INTO `across_p_personnel` (`pid`, `personnel_id`, `civilstat`, `bdate`, `home_address`, `present_address`, `mobilenum`, `other_contact`, `remark`) VALUES
(2, 'USR-2016-000001', 2, '1969-05-24', '', '', '', '', 1),
(3, 'USR-2016-000002', 1, '2000-03-15', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `across_p_user_account`
--

CREATE TABLE IF NOT EXISTS `across_p_user_account` (
  `accountid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `userTypeId` int(10) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `status` int(2) NOT NULL COMMENT '0=inactive 1=active',
  `approval_stat` int(2) NOT NULL COMMENT '0=for approval 1=approved 2=removed',
  `account_status` int(2) NOT NULL COMMENT '1=active 0=delequent account',
  `remark` int(2) NOT NULL,
  PRIMARY KEY (`accountid`),
  KEY `pid` (`pid`),
  KEY `userTypeId` (`userTypeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `across_p_user_account`
--

INSERT INTO `across_p_user_account` (`accountid`, `pid`, `userTypeId`, `username`, `password`, `status`, `approval_stat`, `account_status`, `remark`) VALUES
(1, 1, 1, 'superadmin', '1a1dc91c907325c69271ddf0c944bc72', 1, 1, 1, 1),
(2, 2, 3, 'RDBOAA1', '1a1dc91c907325c69271ddf0c944bc72', 1, 1, 1, 1),
(3, 3, 3, 'admin1', '1a1dc91c907325c69271ddf0c944bc72', 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `across_staticpages`
--

CREATE TABLE IF NOT EXISTS `across_staticpages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pageTitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pageAlias` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pageContent` text COLLATE utf8_unicode_ci NOT NULL,
  `showTitle` int(1) NOT NULL DEFAULT '0',
  `showStyle` int(1) NOT NULL DEFAULT '1',
  `isVisible` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `across_staticpages`
--

INSERT INTO `across_staticpages` (`id`, `pageTitle`, `pageAlias`, `pageContent`, `showTitle`, `showStyle`, `isVisible`) VALUES
(1, '', 'important_notice', '<p><strong>IMPORTANT</strong></p>\r\n            <p>To prevent other people from accessing your personal information, regularly \r\nchange your password and always Logout and close \r\nyour browser completely when you are finished using the system.</p>', 0, 0, 1),
(2, '', 'security_notice', '<p><strong>SECURITY NOTICE</strong></p>\r\n<p>The security and integrity of our user''s \r\npersonal data is our highest priority. Once you login,\r\nyou will enter into a secure environment where your\r\npersonal data will not be compromised, lost, misused or altered.</p>', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `across_userlog`
--

CREATE TABLE IF NOT EXISTS `across_userlog` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `session_id` text NOT NULL,
  `pid` int(10) NOT NULL,
  `accountId` int(10) NOT NULL,
  `ipaddress` text NOT NULL,
  `datelogin` datetime NOT NULL,
  `datelogout` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `accountId` (`accountId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=376 ;

-- --------------------------------------------------------

--
-- Table structure for table `across_usertype`
--

CREATE TABLE IF NOT EXISTS `across_usertype` (
  `userTypeId` int(10) NOT NULL,
  `user_type` text NOT NULL,
  `usercateg` int(2) NOT NULL COMMENT '1=admin 2=users',
  `ranking` int(10) NOT NULL,
  `remark` int(2) NOT NULL,
  PRIMARY KEY (`userTypeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `across_usertype`
--

INSERT INTO `across_usertype` (`userTypeId`, `user_type`, `usercateg`, `ranking`, `remark`) VALUES
(1, 'Super Admin', 1, 1, 1),
(2, 'User', 2, 3, 1),
(3, 'Admin', 1, 2, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
