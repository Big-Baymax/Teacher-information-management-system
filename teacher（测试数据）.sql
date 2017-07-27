/*
Navicat MySQL Data Transfer

Source Server         : teacher
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : teacher

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2017-04-20 12:41:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `achievement`
-- ----------------------------
DROP TABLE IF EXISTS `achievement`;
CREATE TABLE `achievement` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `class` varchar(50) DEFAULT NULL,
  `coursename` varchar(50) DEFAULT NULL,
  `teachername` varchar(50) DEFAULT NULL,
  `teacherid` varchar(50) DEFAULT '',
  `score` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of achievement
-- ----------------------------
INSERT INTO `achievement` VALUES ('1', '15师范班', '45', null, '', '90');
INSERT INTO `achievement` VALUES ('2', '16师范', '46', null, '', '86');
INSERT INTO `achievement` VALUES ('3', '14计科', '46', null, '', '89');
INSERT INTO `achievement` VALUES ('4', '14师范班', '40', null, '', '92');
INSERT INTO `achievement` VALUES ('5', '16师范班', '56', null, '', '31');
INSERT INTO `achievement` VALUES ('6', '14经管', '36', null, '', '88');
INSERT INTO `achievement` VALUES ('7', '15计科', '50', null, '', '100');

-- ----------------------------
-- Table structure for `grademanage`
-- ----------------------------
DROP TABLE IF EXISTS `grademanage`;
CREATE TABLE `grademanage` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `class` varchar(50) DEFAULT NULL,
  `teachername` varchar(50) DEFAULT NULL,
  `teacherid` varchar(50) DEFAULT NULL,
  `studentscore` varchar(50) DEFAULT NULL,
  `coursename` varchar(50) DEFAULT NULL,
  `school` varchar(50) DEFAULT NULL,
  `teacherscore` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of grademanage
-- ----------------------------
INSERT INTO `grademanage` VALUES ('2', '15师范班', '小王', null, '88', 'C语言', '北京大学', '90');
INSERT INTO `grademanage` VALUES ('3', '14师范班', '小白', null, '85', '高等数学', '宁德师院', '78');
INSERT INTO `grademanage` VALUES ('5', '12应化', '小何', null, '90', '化学与人类', '清华大学', '98');

-- ----------------------------
-- Table structure for `notice`
-- ----------------------------
DROP TABLE IF EXISTS `notice`;
CREATE TABLE `notice` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `noticetext` text,
  `author` varchar(50) DEFAULT NULL,
  `authorid` varchar(50) DEFAULT NULL,
  `noticetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of notice
-- ----------------------------
INSERT INTO `notice` VALUES ('3', '开会', '全体老师7月21号DB101开会', '小王', 'NDSY012', '2017-04-14 18:52:18');
INSERT INTO `notice` VALUES ('10', '感恩节', '感恩节全体老师放假', '小王', 'NDSY012', '2017-04-19 06:33:19');
INSERT INTO `notice` VALUES ('11', '党员大会', '7月21号下午DB301开党员大会', '小明', 'NDSY001', '2017-04-20 06:23:02');

-- ----------------------------
-- Table structure for `project`
-- ----------------------------
DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `class` varchar(50) DEFAULT NULL,
  `teacherid` varchar(50) DEFAULT NULL,
  `teachername` varchar(50) DEFAULT NULL,
  `paper` text,
  `winning` text,
  `paperimg` varchar(50) DEFAULT NULL,
  `winningimg` varchar(50) DEFAULT NULL,
  `paperimgmd5` varchar(50) DEFAULT NULL,
  `winningimgmd5` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of project
-- ----------------------------
INSERT INTO `project` VALUES ('1', '13计算机科学与技术非师范1班', 'NDSY001', '小王', '正在研究', '全国三等奖', '../upload/20170418152719143', '../upload/20170419115223407.png', '2eaac7676f933404c7a3911bf81ec8b6', '2eaac7676f933404c7a3911bf81ec8b6');
INSERT INTO `project` VALUES ('2', '12计算机科学与技术师范班', 'NDSY002', '小白', '已完成', '全国一等奖', '../upload/20170418151735232', '../upload/20170419115519758.png', '2eaac7676f933404c7a3911bf81ec8b6', '670aa4fd7b53d6122bbab848a5d4071c');
INSERT INTO `project` VALUES ('3', '14计算机科学与技术', 'NDSY003', '小彬', '未完成', '省二等奖', null, null, null, null);
INSERT INTO `project` VALUES ('4', null, null, '小何', '完成', '全国一等奖', null, null, null, null);
INSERT INTO `project` VALUES ('5', null, null, '小彬', '未完成', '无', null, null, null, null);

-- ----------------------------
-- Table structure for `studyinfo`
-- ----------------------------
DROP TABLE IF EXISTS `studyinfo`;
CREATE TABLE `studyinfo` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `class` varchar(50) DEFAULT NULL,
  `teacherid` varchar(50) DEFAULT NULL,
  `coursename` varchar(50) DEFAULT NULL,
  `orgintime` datetime DEFAULT NULL,
  `overtime` datetime DEFAULT NULL,
  `coursetime` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of studyinfo
-- ----------------------------
INSERT INTO `studyinfo` VALUES ('2', '13计算机科学与技术师范1班', 'NDSY002', 'C语言', '2017-02-15 18:10:05', '2017-06-30 18:10:22', '45');
INSERT INTO `studyinfo` VALUES ('3', '14计算机科学与技术', 'NDSY003', '数学', '2017-03-31 23:23:00', '2017-03-31 23:23:00', '45');
INSERT INTO `studyinfo` VALUES ('4', '15计算机科学与技术', null, '社会与法', '2017-04-18 12:23:00', '2017-03-29 23:21:00', '43');
INSERT INTO `studyinfo` VALUES ('6', '16师范班', null, '经济学', '2017-04-14 23:21:00', '2017-03-30 23:21:00', '32');
INSERT INTO `studyinfo` VALUES ('8', '15营销班', null, '经济管理', '2017-04-14 03:02:00', '2017-04-05 23:21:00', '46');
INSERT INTO `studyinfo` VALUES ('9', '16政法', null, '宪法历史', '2017-04-07 23:01:00', '2017-04-14 02:02:00', '35');
INSERT INTO `studyinfo` VALUES ('10', '22', null, '12', '2017-04-07 23:03:00', '2017-04-14 02:12:00', '12');
INSERT INTO `studyinfo` VALUES ('11', '1', null, '1', '0000-00-00 00:00:00', '0023-03-23 02:03:00', '22');
INSERT INTO `studyinfo` VALUES ('12', '12', null, '期望', '2017-04-22 12:02:00', '2017-03-28 02:03:00', '12');
INSERT INTO `studyinfo` VALUES ('13', '23', null, '212', '0003-03-02 03:02:00', '0023-03-02 02:01:00', '32');
INSERT INTO `studyinfo` VALUES ('14', '额外', null, '12', '0012-02-03 03:03:00', '0002-03-02 02:01:00', '54');
INSERT INTO `studyinfo` VALUES ('15', '21', null, '12', '2017-04-14 23:02:00', '2017-04-23 23:02:00', '21');
INSERT INTO `studyinfo` VALUES ('16', '23', null, '23', '0004-04-13 03:04:00', '2017-04-15 04:34:00', '23');

-- ----------------------------
-- Table structure for `teacherinfo`
-- ----------------------------
DROP TABLE IF EXISTS `teacherinfo`;
CREATE TABLE `teacherinfo` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `teachername` varchar(50) DEFAULT NULL,
  `teacherid` varchar(50) DEFAULT NULL,
  `identity` int(10) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `school` varchar(50) DEFAULT NULL,
  `brief` varchar(300) DEFAULT NULL,
  `registertime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of teacherinfo
-- ----------------------------
INSERT INTO `teacherinfo` VALUES ('2', '小明', 'NDSY001', '1', '女', '123456', '1995-11-30', '厦门大学', '福建人，2000年毕业，获得国家先进个人荣誉', '2017-04-04 18:06:30');
INSERT INTO `teacherinfo` VALUES ('3', '小五', 'NDSY002', '0', '男', '123456', '1995-06-30', '福建师范大学', '福建人，曾获得国家2级教师证', '2017-04-01 18:12:30');
INSERT INTO `teacherinfo` VALUES ('17', '小包', 'NDSY008', '0', '男', 'asdfgh', '2017-04-08', '宁德师院计算机系', '来自福建龙岩，曾担任省长！', '2017-04-19 12:13:56');
INSERT INTO `teacherinfo` VALUES ('18', '小哥', 'NDSY009', '0', '女', 'sdf123', '2017-04-23', '福建省福州大学', '来自福建漳州，曾经获得全国教师模范奖！', '2017-04-19 12:15:01');
INSERT INTO `teacherinfo` VALUES ('19', '小艳', 'NDSY006', '0', '女', 'adminzxc', '1994-02-18', '北京大学', '来自福建漳州，2015年获得全国教师奖', '2017-04-19 12:16:05');
INSERT INTO `teacherinfo` VALUES ('20', '小李', 'NDSY005', '0', '男', 'admin', '1984-06-22', '武汉大学', '浙江宁波人，曾任浙江省厅长！', '2017-04-19 12:16:14');
INSERT INTO `teacherinfo` VALUES ('21', '小丽', 'NDSY003', '0', '女', 'xfad24', '2017-04-21', '厦门大学', '福建三明人', '2017-04-29 12:15:23');
INSERT INTO `teacherinfo` VALUES ('22', '小许', 'NDSY004', '0', '女', 'qwerty', '2017-04-21', '厦门大学', '福建三明人', '2017-04-05 12:15:28');
INSERT INTO `teacherinfo` VALUES ('23', '小杨', 'NDSY010', '0', '女', 'wer212', '2017-04-21', '龙岩学院', '福建三明人', '2017-04-18 12:15:31');
INSERT INTO `teacherinfo` VALUES ('24', '小何', 'NDSY011', '0', '男', 'wwewrw', '2017-04-21', '龙岩学院', '福建三明人', '2017-04-22 12:15:34');
INSERT INTO `teacherinfo` VALUES ('25', '小王', 'NDSY012', '0', '男', 'fdasda', '2017-04-21', '龙岩学院', '福建三明人', '2017-04-04 12:15:37');
INSERT INTO `teacherinfo` VALUES ('26', '小何', 'NDSY013', '0', '男', 'fcvadw', '2017-04-21', '龙岩学院', '福建三明人', '2017-04-04 12:15:40');
INSERT INTO `teacherinfo` VALUES ('27', '小何', 'NDSY014', '0', '男', 'opuhjk', '2017-04-21', '龙岩学院', '福建三明人', '2017-04-29 12:15:44');
INSERT INTO `teacherinfo` VALUES ('28', '小何', 'NDSY015', '0', '男', '123456', '2017-04-21', '龙岩学院', '福建三明人', '2017-04-11 12:15:47');
INSERT INTO `teacherinfo` VALUES ('29', '小何', 'NDSY016', '0', '男', '654647', '2017-04-21', '龙岩学院', '福建三明人', '2017-04-10 12:15:52');
INSERT INTO `teacherinfo` VALUES ('30', '小何', 'NDSY017', '0', '男', '123578', '2017-04-21', '龙岩学院', '福建三明人', '2017-04-14 12:15:56');

-- ----------------------------
-- Table structure for `uploadfiles`
-- ----------------------------
DROP TABLE IF EXISTS `uploadfiles`;
CREATE TABLE `uploadfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(50) NOT NULL,
  `filesize` int(10) DEFAULT NULL,
  `filetype` varchar(50) DEFAULT NULL,
  `filesrc` varchar(50) DEFAULT NULL,
  `teachername` varchar(50) DEFAULT NULL,
  `uploaddate` date DEFAULT NULL,
  `md5file` varchar(50) NOT NULL DEFAULT '',
  `filebiref` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`,`md5file`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uploadfiles
-- ----------------------------
INSERT INTO `uploadfiles` VALUES ('7', 'bootsharp.zip', '65', 'application/x-zip-compressed', '../upload/20170419055623693.zip', '小王', '2017-04-19', 'c61f904944a4c4f1f0599b3d9b20e241', '12');
INSERT INTO `uploadfiles` VALUES ('8', 'C_38.png', '83', 'image/png', '../upload/20170419055832723.png', '小王', '2017-04-19', '2eaac7676f933404c7a3911bf81ec8b6', '12');
INSERT INTO `uploadfiles` VALUES ('9', '截图.zip', '1313', 'application/x-zip-compressed', '../upload/20170419060014614.zip', '小王', '2017-04-19', 'c589006f4777b5e6a6679a60d75f5668', '12');
INSERT INTO `uploadfiles` VALUES ('10', '素材.zip', '1351', 'application/x-zip-compressed', '../upload/20170419060033809.zip', '小王', '2017-04-19', '3872bf143fcb144998308124a7e97027', '123');
INSERT INTO `uploadfiles` VALUES ('11', 'C_38.png', '83', 'image/png', '../upload/20170419060119623.png', '小王', '2017-04-19', '2eaac7676f933404c7a3911bf81ec8b6', '123');
