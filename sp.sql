/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : sp

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-06-09 10:58:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `customer`
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `c_userName` varchar(200) DEFAULT NULL,
  `c_tell` varchar(200) DEFAULT NULL,
  `c_address` varchar(200) DEFAULT NULL,
  `c_location` varchar(200) DEFAULT NULL,
  `c_postal_code` varchar(200) DEFAULT NULL,
  `c_email` varchar(200) DEFAULT NULL,
  `c_password` varchar(200) DEFAULT NULL,
  `access_level` enum('ADMIN','CUSTOMER','SP') DEFAULT NULL,
  `s_p_status` enum('PENDING','REJECTED','APPROVED') DEFAULT NULL,
  `s_p_skill_id` int(11) DEFAULT NULL,
  `s_p_location_id` int(11) DEFAULT NULL,
  `location_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES ('1', 'Admin', '+94143553', '325-a', null, '61120', 'mm@gmail.com', '125-125-125-125-125', 'ADMIN', null, null, null, null);
INSERT INTO `customer` VALUES ('2', 'customer', '+94143553', '325-a', 'SL', '61120', 'mm@gmail.com', 'sssss', 'ADMIN', null, '1', '1', '1');

-- ----------------------------
-- Table structure for `doc`
-- ----------------------------
DROP TABLE IF EXISTS `doc`;
CREATE TABLE `doc` (
  `docid` bigint(20) DEFAULT NULL,
  `docname` varchar(100) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `grp` varchar(30) DEFAULT NULL,
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `icon_class` varchar(90) DEFAULT NULL,
  `color` varchar(30) DEFAULT 'AUTO',
  `icon` varchar(30) DEFAULT NULL,
  `auto` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `doc` (`docid`,`grp`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of doc
-- ----------------------------
INSERT INTO `doc` VALUES ('6', 'Change Password', 'change_password', 'Administration', '63', 'fa fa-key', 'small-box bg-yellow', 'fa fa-pencil-square-o', 'AUTO');
INSERT INTO `doc` VALUES ('5', 'Manage Permission', 'user_p', 'Administration', '64', 'fa fa-cogs', 'small-box bg-blue', 'fa fa-user-secret', null);
INSERT INTO `doc` VALUES ('10', 'Location', 'location', 'Operations', '119', 'fa fa-map-marker', 'small-box bg-aqua', 'fa fa-map-marker', null);
INSERT INTO `doc` VALUES ('11', 'Skill', 'skill', 'Operations', '120', 'fa fa-list', 'small-box bg-green', 'fa fa-plus-circle', null);
INSERT INTO `doc` VALUES ('12', 'Service Provider', 'serprovider', 'Operations', '121', 'fa fa-users', 'small-box bg-orange', 'fa fa-bug', null);
INSERT INTO `doc` VALUES ('13', 'Order', 'order', 'Operations', '122', 'fa fa-truck', 'small-box bg-yellow', 'fa fa-plus', 'AUTO');

-- ----------------------------
-- Table structure for `entry_log`
-- ----------------------------
DROP TABLE IF EXISTS `entry_log`;
CREATE TABLE `entry_log` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `refno` varchar(50) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `docid` bigint(20) DEFAULT NULL,
  `docname` varchar(200) DEFAULT NULL,
  `trnType` varchar(20) DEFAULT NULL,
  `stime` datetime DEFAULT NULL,
  `sdate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of entry_log
-- ----------------------------
INSERT INTO `entry_log` VALUES ('1', 'E/00001', 'admin', null, 'Expense', 'Save', '2019-11-05 23:07:50', '2019-11-05');
INSERT INTO `entry_log` VALUES ('2', 'HUC/00802', 'hucadmin', null, 'Invoice', 'Cancel', '2019-11-05 23:28:06', '2019-11-05');
INSERT INTO `entry_log` VALUES ('3', 'E/00002', 'admin', null, 'Expense', 'Save', '2019-11-05 23:40:22', '2019-11-05');
INSERT INTO `entry_log` VALUES ('4', 'E/00003', 'admin', null, 'Expense', 'Save', '2019-11-06 07:07:31', '2019-11-06');
INSERT INTO `entry_log` VALUES ('5', 'E/00003', 'admin', null, 'Expense', 'Cancel', '2019-11-06 07:07:40', '2019-11-06');
INSERT INTO `entry_log` VALUES ('6', 'HUC/00801', 'hucadmin', null, 'Invoice', 'Cancel', '2019-11-06 14:09:35', '2019-11-06');
INSERT INTO `entry_log` VALUES ('7', 'HUC/00802', 'hucadmin', null, 'Invoice', 'Cancel', '2019-11-06 14:10:11', '2019-11-06');
INSERT INTO `entry_log` VALUES ('8', 'HUC/00802', 'hucadmin', null, 'Invoice', 'Cancel', '2019-11-06 14:15:15', '2019-11-06');
INSERT INTO `entry_log` VALUES ('9', 'HUC/00802', 'hucadmin', null, 'Invoice', 'Cancel', '2019-11-14 14:04:40', '2019-11-14');
INSERT INTO `entry_log` VALUES ('10', 'HUC/00801', 'hucadmin', null, 'Invoice', 'Cancel', '2019-11-14 14:04:51', '2019-11-14');
INSERT INTO `entry_log` VALUES ('11', 'HUC/00804', 'hucadmin', null, 'Invoice', 'Cancel', '2019-11-14 15:28:36', '2019-11-14');
INSERT INTO `entry_log` VALUES ('12', 'E/00001', 'admin', null, 'Expense', 'Save', '2019-11-20 11:11:33', '2019-11-20');
INSERT INTO `entry_log` VALUES ('13', 'E/00001', 'malees', null, 'Expense', 'Cancel', '2019-11-20 12:01:32', '2019-11-20');

-- ----------------------------
-- Table structure for `invpara`
-- ----------------------------
DROP TABLE IF EXISTS `invpara`;
CREATE TABLE `invpara` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `company` varchar(50) DEFAULT NULL,
  `add1` varchar(100) DEFAULT NULL,
  `add2` varchar(100) DEFAULT NULL,
  `contact` int(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `invoice` bigint(20) DEFAULT NULL,
  `receipt` bigint(20) DEFAULT NULL,
  `resultup` bigint(20) DEFAULT NULL,
  `expense` bigint(20) DEFAULT NULL,
  `certino` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of invpara
-- ----------------------------
INSERT INTO `invpara` VALUES ('1', 'Hogwarts University College', 'No 550-3/2,Galle Road,', 'Colombo 006', '1125995900', null, '844', '840', '1', '1', '3');

-- ----------------------------
-- Table structure for `location`
-- ----------------------------
DROP TABLE IF EXISTS `location`;
CREATE TABLE `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(200) DEFAULT NULL,
  `status` enum('active','deleted') DEFAULT 'active',
  `datetime` datetime DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `cancel` varchar(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of location
-- ----------------------------
INSERT INTO `location` VALUES ('1', 'SL', 'active', '2020-06-06 17:24:36', 'praweenakahemachandra@gmail.com', '0');
INSERT INTO `location` VALUES ('2', 'AM', 'active', '2020-06-06 17:24:36', 'praweenakahemachandra@gmail.com', '0');
INSERT INTO `location` VALUES ('27', 'CAN', 'active', '2020-06-06 17:24:36', 'praweenakahemachandra@gmail.com', '0');
INSERT INTO `location` VALUES ('29', 'AUS', 'active', '2020-06-06 21:21:52', 'praweenakahemachandra@gmail.com', '0');
INSERT INTO `location` VALUES ('30', 'dfsd', 'active', '2020-06-07 00:08:30', 'zendomomus@gmail.com', '1');
INSERT INTO `location` VALUES ('31', 'ss', 'active', '2020-06-08 21:11:15', 'zendomomus@gmail.com', '1');

-- ----------------------------
-- Table structure for `loging`
-- ----------------------------
DROP TABLE IF EXISTS `loging`;
CREATE TABLE `loging` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `User_Type` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Logon_Time` time NOT NULL,
  `Logout_Time` time NOT NULL,
  `Sessioan_Id` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of loging
-- ----------------------------
INSERT INTO `loging` VALUES ('151', 'admin', '', '2019-10-26', '21:22:08', '21:22:08', '2a482ce59242d0cf18511f1da5e4925e', '172.69.134.43');
INSERT INTO `loging` VALUES ('152', 'admin', '', '2019-10-26', '21:22:08', '21:22:08', '2a482ce59242d0cf18511f1da5e4925e', '172.69.134.43');
INSERT INTO `loging` VALUES ('153', 'admin', '', '2019-10-26', '21:22:34', '21:22:34', '0e83fbd16e907088f4fd95a0cb1aebb0', '172.69.134.43');
INSERT INTO `loging` VALUES ('154', 'admin', '', '2019-10-26', '21:22:43', '21:22:43', '6558ec0e2b5e3b0fd0758cc79a1d032c', '172.69.134.43');
INSERT INTO `loging` VALUES ('155', 'admin', '', '2019-10-26', '21:22:43', '21:22:43', '6558ec0e2b5e3b0fd0758cc79a1d032c', '172.69.134.43');
INSERT INTO `loging` VALUES ('156', 'admin', '', '2019-10-26', '21:23:00', '21:23:00', '78f0704313c5a83d3baf5db98dd940a2', '172.69.134.43');
INSERT INTO `loging` VALUES ('157', 'admin', '', '2019-10-26', '21:23:19', '21:23:19', '1c732ef54323926794e74a25f71c795a', '172.69.134.43');
INSERT INTO `loging` VALUES ('158', 'admin', '', '2019-10-26', '21:23:19', '21:23:19', '1c732ef54323926794e74a25f71c795a', '172.69.134.43');
INSERT INTO `loging` VALUES ('159', 'admin', 'admin', '2019-10-26', '21:24:21', '21:24:21', 'c73a5e95c2b6484e3e23ed27ca0f0a52', '172.68.144.215');
INSERT INTO `loging` VALUES ('160', 'admin', 'admin', '2019-10-26', '21:24:23', '21:24:23', '32604d521ff3e0fb13cbbad38086172f', '172.68.144.215');
INSERT INTO `loging` VALUES ('161', 'admin', 'admin', '2019-10-26', '21:24:23', '21:24:23', '32604d521ff3e0fb13cbbad38086172f', '172.68.144.215');
INSERT INTO `loging` VALUES ('162', 'admin', 'admin', '2019-10-26', '21:24:25', '21:24:25', '9a48387ac1a14f7cc8b76e66db22a552', '172.68.144.215');
INSERT INTO `loging` VALUES ('163', 'admin', 'admin', '2019-10-26', '21:24:26', '21:24:26', '9a48387ac1a14f7cc8b76e66db22a552', '172.68.144.215');
INSERT INTO `loging` VALUES ('164', 'admin', 'admin', '2019-10-26', '21:24:31', '21:24:31', '917bb2c2b051e7b0864c86c64b68924c', '172.68.144.215');
INSERT INTO `loging` VALUES ('165', 'admin', 'admin', '2019-10-26', '21:24:31', '21:24:31', '917bb2c2b051e7b0864c86c64b68924c', '172.68.144.215');
INSERT INTO `loging` VALUES ('166', 'admin', 'admin', '2019-10-26', '21:24:38', '21:24:38', '75d631079027a612212725bb685d356e', '172.68.144.215');
INSERT INTO `loging` VALUES ('167', 'admin', 'admin', '2019-10-26', '21:24:38', '21:24:38', '75d631079027a612212725bb685d356e', '172.68.144.215');
INSERT INTO `loging` VALUES ('168', 'admin', 'admin', '2019-10-26', '21:24:38', '21:24:38', '75d631079027a612212725bb685d356e', '172.68.144.215');
INSERT INTO `loging` VALUES ('169', 'admin', 'admin', '2019-10-26', '21:24:50', '21:24:50', 'dd5c492a10624063469ce779fa8529d4', '172.68.144.215');
INSERT INTO `loging` VALUES ('170', 'admin', 'admin', '2019-10-26', '21:24:50', '21:24:50', 'dd5c492a10624063469ce779fa8529d4', '172.68.144.215');
INSERT INTO `loging` VALUES ('171', 'admin', 'admin', '2019-10-26', '21:24:50', '21:24:50', 'f0680a2db225f7f629b22d90d8c676d4', '172.68.144.215');
INSERT INTO `loging` VALUES ('172', 'admin', 'admin', '2019-10-26', '21:24:51', '21:24:51', 'f0680a2db225f7f629b22d90d8c676d4', '172.68.144.215');
INSERT INTO `loging` VALUES ('173', 'admin', 'admin', '2019-10-26', '21:24:56', '21:24:56', '30a33ebbe1970f593f3aa60007e8c404', '172.68.144.215');
INSERT INTO `loging` VALUES ('174', 'admin', 'admin', '2019-10-26', '21:24:56', '21:24:56', '30a33ebbe1970f593f3aa60007e8c404', '172.68.144.215');
INSERT INTO `loging` VALUES ('175', 'admin', 'admin', '2019-10-26', '21:24:57', '21:24:57', '30a33ebbe1970f593f3aa60007e8c404', '172.68.144.215');
INSERT INTO `loging` VALUES ('176', 'admin', '', '2019-10-26', '21:25:26', '21:25:26', '54a754468d28aed3905dd08fd4a97f8e', '172.68.144.215');
INSERT INTO `loging` VALUES ('177', 'admin', '', '2019-10-26', '21:25:26', '21:25:26', '54a754468d28aed3905dd08fd4a97f8e', '172.68.144.215');
INSERT INTO `loging` VALUES ('178', 'admin', '', '2019-10-26', '21:25:27', '21:25:27', '3108e0295e00e91b5470dd884cb1773e', '172.68.144.215');
INSERT INTO `loging` VALUES ('179', 'admin', '', '2019-10-26', '21:25:59', '21:25:59', 'c78f43a035582380f78af71073549b16', '172.68.144.185');
INSERT INTO `loging` VALUES ('180', 'admin', '', '2019-10-26', '21:25:59', '21:25:59', '3792440f76a3cccb6e915078283ddc39', '172.68.144.185');
INSERT INTO `loging` VALUES ('181', 'admin', '', '2019-10-26', '21:26:00', '21:26:00', 'e392e242bf4f1a066872d5ebb09aebc4', '172.68.144.185');
INSERT INTO `loging` VALUES ('182', 'admin', 'admin', '2019-10-26', '21:26:52', '21:26:52', 'a56791458449d83fd33cce56d6e626ce', '172.68.144.185');
INSERT INTO `loging` VALUES ('183', 'admin', 'admin', '2019-10-26', '21:26:55', '21:26:55', '58bc3f5825908ac42d21da1de81153a1', '172.68.144.185');
INSERT INTO `loging` VALUES ('184', 'admin', 'admin', '2019-10-26', '21:26:55', '21:26:55', '58bc3f5825908ac42d21da1de81153a1', '172.68.144.185');
INSERT INTO `loging` VALUES ('185', 'admin', 'admin', '2019-10-26', '21:26:58', '21:26:58', '64ee9bdd040be37cb5185ade3a1ff9ad', '172.68.144.185');
INSERT INTO `loging` VALUES ('186', 'admin', 'admin', '2019-10-26', '21:26:58', '21:26:58', '64ee9bdd040be37cb5185ade3a1ff9ad', '172.68.144.185');
INSERT INTO `loging` VALUES ('187', 'admin', 'admin', '2019-10-26', '21:26:59', '21:26:59', '64ee9bdd040be37cb5185ade3a1ff9ad', '172.68.144.185');
INSERT INTO `loging` VALUES ('188', 'admin', 'admin', '2019-10-26', '21:27:06', '21:27:06', '242515fce33281008fcff3240c2cf2b2', '172.68.144.185');
INSERT INTO `loging` VALUES ('189', 'admin', 'admin', '2019-10-26', '21:27:06', '21:27:06', '242515fce33281008fcff3240c2cf2b2', '172.68.144.185');
INSERT INTO `loging` VALUES ('190', 'admin', 'admin', '2019-10-26', '21:27:07', '21:27:07', 'ceff7550dc9b6da5d8660c7fb09865ea', '172.68.144.185');
INSERT INTO `loging` VALUES ('191', 'admin', 'admin', '2019-10-26', '21:27:08', '21:27:08', 'ceff7550dc9b6da5d8660c7fb09865ea', '172.68.144.185');
INSERT INTO `loging` VALUES ('192', 'admin', 'admin', '2019-10-26', '21:27:08', '21:27:08', 'ceff7550dc9b6da5d8660c7fb09865ea', '172.68.144.185');
INSERT INTO `loging` VALUES ('193', 'admin', 'admin', '2019-10-26', '21:27:08', '21:27:08', '32e2cd36c42b99c8e37860c12db060e1', '172.68.144.185');
INSERT INTO `loging` VALUES ('194', 'admin', 'admin', '2019-10-26', '21:27:10', '21:27:10', '40718370997ae69ccfab66c602e60e4f', '172.68.144.185');
INSERT INTO `loging` VALUES ('195', 'admin', 'admin', '2019-10-26', '21:27:10', '21:27:10', '40718370997ae69ccfab66c602e60e4f', '172.68.144.185');
INSERT INTO `loging` VALUES ('196', 'admin', 'admin', '2019-10-26', '21:27:11', '21:27:11', '410997a1b54adc9e71324447eda16951', '172.68.144.185');
INSERT INTO `loging` VALUES ('197', 'admin', 'admin', '2019-10-26', '21:27:11', '21:27:11', '410997a1b54adc9e71324447eda16951', '172.68.144.185');
INSERT INTO `loging` VALUES ('198', 'admin', 'admin', '2019-10-26', '21:27:17', '21:27:17', '98bed7d47db37e886dcb331f07bfc24b', '172.68.144.185');
INSERT INTO `loging` VALUES ('199', 'admin', 'admin', '2019-10-26', '21:27:18', '21:27:18', '98bed7d47db37e886dcb331f07bfc24b', '172.68.144.185');
INSERT INTO `loging` VALUES ('200', 'admin', 'admin', '2019-10-26', '21:27:18', '21:27:18', '0520ebba60b7347eae5086bbfc6ecf09', '172.68.144.185');
INSERT INTO `loging` VALUES ('201', 'admin', 'admin', '2019-10-26', '21:27:19', '21:27:19', 'f384687102d432b379778812aa762b6d', '172.68.144.185');
INSERT INTO `loging` VALUES ('202', 'admin', 'admin', '2019-10-26', '21:27:20', '21:27:20', 'f384687102d432b379778812aa762b6d', '172.68.144.185');
INSERT INTO `loging` VALUES ('203', 'admin', 'admin', '2019-10-26', '21:27:29', '21:27:29', '689e3a2c847c2a3d38654898d3d60c1e', '172.68.144.185');
INSERT INTO `loging` VALUES ('204', 'admin', 'admin', '2019-10-26', '21:27:29', '21:27:29', '689e3a2c847c2a3d38654898d3d60c1e', '172.68.144.185');
INSERT INTO `loging` VALUES ('205', 'admin', 'admin', '2019-10-26', '21:27:44', '21:27:44', 'a4ee6b4bdca8b0a0aa0affd52a76194b', '172.68.144.185');
INSERT INTO `loging` VALUES ('206', 'admin', 'admin', '2019-10-26', '21:27:44', '21:27:44', 'a4ee6b4bdca8b0a0aa0affd52a76194b', '172.68.144.185');
INSERT INTO `loging` VALUES ('207', 'admin', 'admin', '2019-10-26', '21:27:44', '21:27:44', 'a4ee6b4bdca8b0a0aa0affd52a76194b', '172.68.144.185');
INSERT INTO `loging` VALUES ('208', 'admin', 'admin', '2019-10-26', '21:28:37', '21:28:37', 'fb709e3f87b83b280fba84ba9837819f', '162.158.166.155');
INSERT INTO `loging` VALUES ('209', 'admin', 'admin', '2019-10-26', '21:28:39', '21:28:39', '197bc10e1c3dca5281a37a4f974f621e', '162.158.166.155');
INSERT INTO `loging` VALUES ('210', 'admin', 'admin', '2019-10-26', '21:28:40', '21:28:40', 'fca1fa47a187c6d11658bc9189a690d2', '162.158.166.155');
INSERT INTO `loging` VALUES ('211', 'admin', 'admin', '2019-10-26', '21:28:41', '21:28:41', 'fca1fa47a187c6d11658bc9189a690d2', '162.158.166.155');
INSERT INTO `loging` VALUES ('212', 'admin', 'admin', '2019-10-26', '21:28:41', '21:28:41', '9f79a5db39d9493539711d71fd81ae1b', '162.158.166.155');
INSERT INTO `loging` VALUES ('213', 'admin', 'admin', '2019-10-26', '21:28:41', '21:28:41', '8e7f29347ae860572913d0e2a171d186', '162.158.166.155');
INSERT INTO `loging` VALUES ('214', 'admin', 'admin', '2019-10-26', '21:28:42', '21:28:42', '371347ea61a9b85376db9c606d8df092', '162.158.166.155');
INSERT INTO `loging` VALUES ('215', 'admin', 'admin', '2019-10-26', '21:29:13', '21:29:13', '7c0ccac4edec8de5cfa1e2790105d291', '162.158.166.155');
INSERT INTO `loging` VALUES ('216', 'admin', 'admin', '2019-10-26', '21:29:14', '21:29:14', '7c0ccac4edec8de5cfa1e2790105d291', '162.158.166.155');
INSERT INTO `loging` VALUES ('217', 'admin', 'admin', '2019-10-26', '21:29:14', '21:29:14', '7c0ccac4edec8de5cfa1e2790105d291', '162.158.166.155');
INSERT INTO `loging` VALUES ('218', 'admin', 'admin', '2019-10-26', '21:29:25', '21:29:25', 'b2a9c6a993aaf7c163ebfcbacec9fbe8', '162.158.166.155');
INSERT INTO `loging` VALUES ('219', 'admin', 'admin', '2019-10-26', '21:29:27', '21:29:27', '9a2693c1e3d6abac8b300075653d5ce4', '162.158.166.155');
INSERT INTO `loging` VALUES ('220', 'admin', 'admin', '2019-10-26', '21:29:27', '21:29:27', '9a2693c1e3d6abac8b300075653d5ce4', '162.158.166.155');
INSERT INTO `loging` VALUES ('221', 'admin', 'admin', '2019-10-26', '21:29:28', '21:29:28', '9a2693c1e3d6abac8b300075653d5ce4', '162.158.166.155');
INSERT INTO `loging` VALUES ('222', 'admin', 'admin', '2019-10-26', '21:29:28', '21:29:28', '9a2693c1e3d6abac8b300075653d5ce4', '162.158.166.155');
INSERT INTO `loging` VALUES ('223', 'admin', 'admin', '2019-10-26', '21:29:28', '21:29:28', '4a021b45abf0fcdc53f5a3f9352ddd53', '162.158.166.155');
INSERT INTO `loging` VALUES ('224', 'admin', '', '2019-10-26', '21:29:47', '21:29:47', 'e0a5dec22413ecfdede4a6b5c9933562', '162.158.166.155');
INSERT INTO `loging` VALUES ('225', 'admin', '', '2019-10-26', '21:29:47', '21:29:47', 'e0a5dec22413ecfdede4a6b5c9933562', '162.158.166.155');
INSERT INTO `loging` VALUES ('226', 'admin', '', '2019-10-26', '21:29:48', '21:29:48', 'e0a5dec22413ecfdede4a6b5c9933562', '162.158.166.155');
INSERT INTO `loging` VALUES ('227', 'admin', '', '2019-10-26', '21:29:48', '21:29:48', 'e0a5dec22413ecfdede4a6b5c9933562', '162.158.166.155');
INSERT INTO `loging` VALUES ('228', 'admin', '', '2019-10-26', '21:29:49', '21:29:49', '63de57ff8439754a051eb862c60fb07d', '162.158.166.155');
INSERT INTO `loging` VALUES ('229', 'admin', '', '2019-10-26', '21:29:49', '21:29:49', '63de57ff8439754a051eb862c60fb07d', '162.158.166.155');
INSERT INTO `loging` VALUES ('230', 'admin', '', '2019-10-26', '21:29:49', '21:29:49', '63de57ff8439754a051eb862c60fb07d', '162.158.166.155');
INSERT INTO `loging` VALUES ('231', 'admin', '', '2019-10-26', '21:29:50', '21:29:50', '5f6d870c7c8da4ed62ab2b3fd0bc7db8', '162.158.166.155');
INSERT INTO `loging` VALUES ('232', 'admin', '', '2019-10-26', '21:29:58', '21:29:58', '35bc7ae1f207eaa6db20d243b9f8d1e4', '172.68.144.185');
INSERT INTO `loging` VALUES ('233', 'admin', '', '2019-10-26', '21:29:59', '21:29:59', '35bc7ae1f207eaa6db20d243b9f8d1e4', '172.68.144.185');
INSERT INTO `loging` VALUES ('234', 'admin', '', '2019-10-26', '21:30:34', '21:30:34', '65c554b9195ea4f0fe173836f094eb15', '172.68.144.185');
INSERT INTO `loging` VALUES ('235', 'admin', 'admin', '2019-10-26', '21:31:33', '21:31:33', 'bfef5e2f85b0f000aeec20eeb72d1d6b', '172.68.144.185');
INSERT INTO `loging` VALUES ('236', 'admin', 'admin', '2019-10-26', '21:31:36', '21:31:36', 'bfef5e2f85b0f000aeec20eeb72d1d6b', '172.68.144.185');
INSERT INTO `loging` VALUES ('237', 'admin', 'admin', '2019-10-26', '21:31:36', '21:31:36', 'bfef5e2f85b0f000aeec20eeb72d1d6b', '172.68.144.185');
INSERT INTO `loging` VALUES ('238', 'admin', 'admin', '2019-10-26', '21:31:36', '21:31:36', 'bfef5e2f85b0f000aeec20eeb72d1d6b', '172.68.144.185');
INSERT INTO `loging` VALUES ('239', 'admin', 'admin', '2019-10-26', '21:32:01', '21:32:01', '5f6d870c7c8da4ed62ab2b3fd0bc7db8', '162.158.166.155');
INSERT INTO `loging` VALUES ('240', 'admin', 'admin', '2019-10-26', '21:32:01', '21:32:01', '5f6d870c7c8da4ed62ab2b3fd0bc7db8', '162.158.166.155');
INSERT INTO `loging` VALUES ('241', 'admin', 'admin', '2019-10-26', '21:32:02', '21:32:02', '5f6d870c7c8da4ed62ab2b3fd0bc7db8', '162.158.166.155');
INSERT INTO `loging` VALUES ('242', 'admin', 'admin', '2019-10-26', '21:32:03', '21:32:03', '5f6d870c7c8da4ed62ab2b3fd0bc7db8', '162.158.166.155');
INSERT INTO `loging` VALUES ('243', 'admin', 'admin', '2019-10-26', '21:44:45', '21:44:45', 'efe7ec1d226f1b95b66924311ba5d1b0', '172.68.146.30');
INSERT INTO `loging` VALUES ('244', 'admin', 'admin', '2019-10-26', '21:44:45', '21:44:45', 'efe7ec1d226f1b95b66924311ba5d1b0', '172.68.146.30');
INSERT INTO `loging` VALUES ('245', 'admin', 'admin', '2019-10-26', '21:46:11', '21:46:11', 'bfef5e2f85b0f000aeec20eeb72d1d6b', '172.68.146.30');
INSERT INTO `loging` VALUES ('246', 'admin', 'admin', '2019-10-26', '21:46:12', '21:46:12', 'bfef5e2f85b0f000aeec20eeb72d1d6b', '172.68.146.30');

-- ----------------------------
-- Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `des` varchar(200) DEFAULT NULL,
  `cid` varchar(50) DEFAULT NULL,
  `spid` varchar(50) DEFAULT 'NO',
  `status` varchar(20) DEFAULT 'Pending',
  `cancel` varchar(1) DEFAULT '0',
  `sdate` date DEFAULT NULL,
  `skid` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('12', 'MR', 'test', '24', '10', 'Approval', '0', '2020-06-23', '18');
INSERT INTO `orders` VALUES ('16', 'ttttttttttt', 'dddddddddd', '24', '15', 'Approval', '0', '2020-06-26', '20');
INSERT INTO `orders` VALUES ('17', 'rrrr', 'dd', '23', '22', 'Approval', '0', '2020-06-01', '19');
INSERT INTO `orders` VALUES ('18', 'eee', 'deddd', '23', 'NO', 'Pending', '0', '2020-06-02', '20');
INSERT INTO `orders` VALUES ('19', 'mmmmm', 'dedededededede', '24', '15', 'Approval', '0', '2020-06-01', '20');
INSERT INTO `orders` VALUES ('21', 'MR', 'ok', '30', '10', 'Approval', '0', '2020-06-30', '23');
INSERT INTO `orders` VALUES ('22', 'e', 'eee', '27', 'NO', 'Pending', '0', '2020-06-10', '18');
INSERT INTO `orders` VALUES ('25', 'rrrrr', 'xss', '10', 'NO', 'Pending', '0', '2020-06-24', '18');
INSERT INTO `orders` VALUES ('26', 'ooo', '45', '31', 'NO', 'Pending', '0', '2020-06-18', '18');
INSERT INTO `orders` VALUES ('27', 'ww', 'wwwwwww', '31', '', 'Pending', '0', '2020-06-02', '19');
INSERT INTO `orders` VALUES ('28', '33', '3333', '31', '29', 'Pending', '0', '2020-06-01', '23');
INSERT INTO `orders` VALUES ('29', '222', '22', '31', '', 'Pending', '0', '2020-06-10', '18');
INSERT INTO `orders` VALUES ('30', '222', '2222', '31', '', 'Pending', '0', '2020-06-09', '18');
INSERT INTO `orders` VALUES ('31', 'www', 'chaaaaaaa', '31', 'NO', 'Pending', '0', '2020-06-02', '18');
INSERT INTO `orders` VALUES ('32', 'ww', 'cha', '10', '29', 'Pending', '0', '2020-06-09', '23');

-- ----------------------------
-- Table structure for `service_provider`
-- ----------------------------
DROP TABLE IF EXISTS `service_provider`;
CREATE TABLE `service_provider` (
  `spid` int(11) NOT NULL AUTO_INCREMENT,
  `s_p_userName` varchar(200) DEFAULT NULL,
  `s_p_tell` varchar(200) DEFAULT NULL,
  `s_p_address` varchar(200) DEFAULT NULL,
  `s_p_location_id` int(11) DEFAULT NULL,
  `s_p_skill_id` int(11) DEFAULT NULL,
  `s_p_postal_code` varchar(200) DEFAULT NULL,
  `s_p_email` varchar(200) DEFAULT NULL,
  `s_p_password` varchar(200) DEFAULT NULL,
  `s_p_status` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`spid`),
  KEY `s_p_location_id` (`s_p_location_id`),
  CONSTRAINT `service_provider_ibfk_1` FOREIGN KEY (`s_p_location_id`) REFERENCES `location` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of service_provider
-- ----------------------------
INSERT INTO `service_provider` VALUES ('1', 'Nimal', '0779515540', 'kurunegala', '1', '1', '1000', 'prawee@gmail.com', null, 'Active');

-- ----------------------------
-- Table structure for `skill`
-- ----------------------------
DROP TABLE IF EXISTS `skill`;
CREATE TABLE `skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skill_name` varchar(200) DEFAULT NULL,
  `status` enum('active','deleted') DEFAULT 'active',
  `datetime` datetime DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `cancel` varchar(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of skill
-- ----------------------------
INSERT INTO `skill` VALUES ('18', 'LEG', 'active', '2020-06-06 17:24:56', 'praweenakahemachandra@gmail.com', '0');
INSERT INTO `skill` VALUES ('19', 'FOOT', 'active', '2020-06-06 17:25:03', 'praweenakahemachandra@gmail.com', '0');
INSERT INTO `skill` VALUES ('20', 'HEAD', 'active', '2020-06-06 17:25:05', 'praweenakahemachandra@gmail.com', '0');
INSERT INTO `skill` VALUES ('23', 'HAIR', 'active', '2020-06-06 17:26:37', 'praweenakahemachandra@gmail.com', '0');
INSERT INTO `skill` VALUES ('25', 'NECK', 'active', '2020-06-06 21:25:21', 'praweenakahemachandra@gmail.com', '0');

-- ----------------------------
-- Table structure for `userpermission`
-- ----------------------------
DROP TABLE IF EXISTS `userpermission`;
CREATE TABLE `userpermission` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) DEFAULT NULL,
  `userpass` varchar(50) DEFAULT NULL,
  `grp` varchar(50) DEFAULT NULL,
  `docid` bigint(20) DEFAULT '0',
  `doc_view` smallint(11) DEFAULT '0',
  `doc_feed` smallint(1) DEFAULT '0',
  `doc_mod` smallint(1) DEFAULT '0',
  `price_edit` smallint(1) DEFAULT '0',
  `admin` smallint(1) DEFAULT '0',
  `dev` smallint(1) DEFAULT '0',
  `doc_print` smallint(1) DEFAULT '0',
  `comcode` varchar(1) DEFAULT '0',
  `comname` varchar(1) DEFAULT '0',
  `sal_ex` varchar(100) DEFAULT NULL,
  `logdate` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userpermission` (`username`,`grp`,`docid`)
) ENGINE=InnoDB AUTO_INCREMENT=263 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of userpermission
-- ----------------------------
INSERT INTO `userpermission` VALUES ('137', 'chamika', '', 'Administration', '5', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('138', 'chamika', '', 'Administration', '6', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('139', 'chamika', '', 'Operations', '10', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('140', 'chamika', '', 'Operations', '11', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('141', 'chamika', '', 'Operations', '12', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('142', 'chamika', '', 'Operations', '13', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('209', 'ashan@gmail.com', '', 'Administration', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('210', 'ashan@gmail.com', '', 'Administration', '6', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('211', 'ashan@gmail.com', '', 'Operations', '10', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('212', 'ashan@gmail.com', '', 'Operations', '11', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('213', 'ashan@gmail.com', '', 'Operations', '12', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('214', 'ashan@gmail.com', '', 'Operations', '13', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('215', 'chamika@gmail.com', '', 'Administration', '5', '0', '1', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('216', 'chamika@gmail.com', '', 'Administration', '6', '1', '1', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('217', 'chamika@gmail.com', '', 'Operations', '10', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('218', 'chamika@gmail.com', '', 'Operations', '11', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('219', 'chamika@gmail.com', '', 'Operations', '12', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('220', 'chamika@gmail.com', '', 'Operations', '13', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('227', 'zendomomus@gmail.com', '', 'Administration', '5', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('228', 'zendomomus@gmail.com', '', 'Administration', '6', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('229', 'zendomomus@gmail.com', '', 'Operations', '10', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('230', 'zendomomus@gmail.com', '', 'Operations', '11', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('231', 'zendomomus@gmail.com', '', 'Operations', '12', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('232', 'zendomomus@gmail.com', '', 'Operations', '13', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('233', 'thila@gmail.com', null, 'Administration', '6', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('234', 'thila@gmail.com', null, 'Operations', '13', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('235', 'kamal@gmail.com', null, 'Administration', '6', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('236', 'kamal@gmail.com', null, 'Operations', '13', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('239', 'testcu@gmail.com', null, 'Administration', '6', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('240', 'testcu@gmail.com', null, 'Operations', '13', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('241', 'amal@gmail.com', '', 'Administration', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('242', 'amal@gmail.com', '', 'Administration', '6', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('243', 'amal@gmail.com', '', 'Operations', '10', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('244', 'amal@gmail.com', '', 'Operations', '11', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('245', 'amal@gmail.com', '', 'Operations', '12', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('246', 'amal@gmail.com', '', 'Operations', '13', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('247', 'customer@gmail.com', null, 'Administration', '6', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('248', 'customer@gmail.com', null, 'Operations', '13', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('249', 'rr', null, 'Administration', '6', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('250', 'rr', null, 'Operations', '13', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('251', 'rrrrrr', null, 'Administration', '6', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('252', 'rrrrrr', null, 'Operations', '13', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('253', 'rrrrrrwwwwwww', null, 'Administration', '6', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('254', 'rrrrrrwwwwwww', null, 'Operations', '13', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('255', '332', null, 'Administration', '6', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('256', '332', null, 'Operations', '13', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('257', '31231', null, 'Administration', '6', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('258', '31231', null, 'Operations', '13', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('259', '333', null, 'Administration', '6', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('260', '333', null, 'Operations', '13', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('261', 'ss', null, 'Administration', '6', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);
INSERT INTO `userpermission` VALUES ('262', 'ss', null, 'Operations', '13', '1', '0', '0', '0', '0', '0', '0', '0', '0', null, null);

-- ----------------------------
-- Table structure for `user_mast`
-- ----------------------------
DROP TABLE IF EXISTS `user_mast`;
CREATE TABLE `user_mast` (
  `user_name` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `user_type` varchar(40) DEFAULT NULL,
  `user_level` varchar(20) DEFAULT '0',
  `dev` varchar(20) DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `postalcode` varchar(20) DEFAULT NULL,
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) DEFAULT 'Pending',
  `skill` varchar(50) DEFAULT NULL,
  `ordercount` int(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_mast
-- ----------------------------
INSERT INTO `user_mast` VALUES ('chamika', '202cb962ac59075b964b07152d234b70', 'SERVICE PROVIDER', '0', '0', null, '077', 'chamika@gmail.com', 'sss', '1', '123', '10', 'Approval', '', '1');
INSERT INTO `user_mast` VALUES ('roy', 'd41d8cd98f00b204e9800998ecf8427e', 'SERVICE PROVIDER', '0', '0', null, '044', 'roy@gmail.com', 'sss', '23', '222', '15', 'Rejected', '25', '0');
INSERT INTO `user_mast` VALUES ('name', '202cb962ac59075b964b07152d234b70', 'SERVICE PROVIDER', '0', '0', null, '077', 'praw', 'add', '1', '1', '22', 'Pending', '18', '0');
INSERT INTO `user_mast` VALUES ('akial', '202cb962ac59075b964b07152d234b70', 'CUSTOMER', '0', '0', null, 'qwqq', 'akila@gmail.com', '', '', '', '23', 'Pending', '25', '0');
INSERT INTO `user_mast` VALUES ('ashan', '202cb962ac59075b964b07152d234b70', 'CUSTOMER', '0', '0', null, '077', 'ashan@gmail.com', 'add', '1', '100', '24', 'Approval', '25', '0');
INSERT INTO `user_mast` VALUES ('admin', '202cb962ac59075b964b07152d234b70', 'ADMIN', '0', '0', null, null, 'zendomomus@gmail.com', null, null, null, '26', 'Rejected', null, '0');
INSERT INTO `user_mast` VALUES ('thila', '202cb962ac59075b964b07152d234b70', 'CUSTOMER', '0', '0', null, '0777', 'thila@gmail.com', 'aaa', '1', '222', '27', 'Approval', '', '0');
INSERT INTO `user_mast` VALUES ('kamal', '202cb962ac59075b964b07152d234b70', 'Customer', '0', '0', null, '077', 'kamal@gmail.com', 'sss', '27', '111', '28', 'Pending', '', '0');
INSERT INTO `user_mast` VALUES ('amal', '202cb962ac59075b964b07152d234b70', 'SERVICE PROVIDER', '0', '0', null, '00585', 'amal@gmail.com', 'sss', '1', '11', '29', 'Approval', '23', '0');
INSERT INTO `user_mast` VALUES ('testcu', '202cb962ac59075b964b07152d234b70', 'Customer', '0', '0', null, '00', 'testcu@gmail.com', 'ss', '1', '3432', '30', 'Approval', '', '0');
INSERT INTO `user_mast` VALUES ('cust', '202cb962ac59075b964b07152d234b70', 'CUSTOMER', '0', '0', null, '055', 'customer@gmail.com', 's', '1', '1', '31', 'Pending', '', '0');

-- ----------------------------
-- View structure for `view_menu`
-- ----------------------------
DROP VIEW IF EXISTS `view_menu`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_menu` AS select `userpermission`.`docid` AS `docid`,`userpermission`.`doc_view` AS `doc_view`,`userpermission`.`doc_feed` AS `doc_feed`,`userpermission`.`doc_mod` AS `doc_mod`,`userpermission`.`price_edit` AS `price_edit`,`userpermission`.`doc_print` AS `doc_print`,`doc`.`icon` AS `icon`,`doc`.`color` AS `color`,`doc`.`icon_class` AS `icon_class`,`doc`.`grp` AS `grp`,`doc`.`docname` AS `docname`,`doc`.`name` AS `name`,`user_mast`.`user_name` AS `user_name`,`user_mast`.`password` AS `password`,`user_mast`.`user_type` AS `user_type`,`user_mast`.`user_level` AS `user_level`,`user_mast`.`tel` AS `tel`,`user_mast`.`email` AS `email`,`user_mast`.`address` AS `address`,`user_mast`.`location` AS `location`,`user_mast`.`postalcode` AS `postalcode`,`user_mast`.`status` AS `status`,`user_mast`.`skill` AS `skill` from ((`userpermission` join `doc` on((`userpermission`.`docid` = `doc`.`docid`))) join `user_mast` on((`user_mast`.`email` = `userpermission`.`username`)));
