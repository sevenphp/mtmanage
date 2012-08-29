-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 08 月 29 日 04:13
-- 服务器版本: 5.5.25a
-- PHP 版本: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `meeting`
--

-- --------------------------------------------------------

--
-- 表的结构 `mt_meeting_content`
--
-- 创建时间: 2012 年 08 月 26 日 04:25
--

CREATE TABLE IF NOT EXISTS `mt_meeting_content` (
  `mt_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '//自动编号',
  `mt_title` varchar(20) NOT NULL COMMENT '//会议名称',
  `mt_depart` varchar(10) NOT NULL COMMENT '//部门名称',
  `mt_addr` varchar(30) NOT NULL COMMENT '//会议地点',
  `mt_date` char(10) NOT NULL COMMENT '//会议时间',
  `mt_manager` varchar(20) NOT NULL COMMENT '//会议主持人',
  `mt_person` varchar(20) NOT NULL COMMENT '//会议出席人',
  `mt_record` varchar(20) NOT NULL COMMENT '//会议记录人',
  `mt_describe` varchar(50) NOT NULL COMMENT '//会议摘要',
  `mt_content` varchar(200) NOT NULL COMMENT '//会议内容存放路径',
  `mt_login` varchar(20) NOT NULL COMMENT '//添加记录者',
  PRIMARY KEY (`mt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `mt_meeting_content`
--

INSERT INTO `mt_meeting_content` (`mt_id`, `mt_title`, `mt_depart`, `mt_addr`, `mt_date`, `mt_manager`, `mt_person`, `mt_record`, `mt_describe`, `mt_content`, `mt_login`) VALUES
(2, '第二次PHP开发会议', '开发部2', '开发会议室', '2012-8-26', 'sevenphp', 'seven,sevenphp,laoma', 'seven', '第二次PHP开发会议', 'upfile/201208260105254.txt', 'seven'),
(3, 'java开发例会', 'java开发部', '开发会议室', '2012-8-26', 'java', 'seven,sevenphp,laoma', 'seven', 'java开发例会', 'upfile/201208260932274.txt', 'seven'),
(4, '网管例会', '行政部', '行政会议室', '2012-8-26', 'zhang3', 'zhang3,li4,wang5', 'li4', '网管例会', 'upfile/2012082609342157.txt', 'seven'),
(6, 'phpcms二次开发', 'php开发小组', '开发会议室', '2012-8-26', 'sevenphp', 'seven,sevenphp,haipi', 'seven', 'phpcms二次开发', 'upfile/2012082609360973.txt', 'seven'),
(7, 'phpcms二次开发2', 'php开发小组', '开发会议室', '2012-8-26', 'sevenphp', 'seven,sevenphp,laoma', 'seven', 'phpcms二次开发2', 'upfile/2012082609370271.txt', 'seven'),
(8, '各部门主管会议', '各部门', '行政会议室', '2012-8-26', 'dada', 'aaa,bbb,ccc,张3,中6', 'ddd', 'phpcms二次开发2', 'upfile/2012082609390417.txt', 'seven'),
(9, '各部门主管会议2', '各部门', '行政会议室', '2012-8-26', 'dada', 'seven,sevenphp,haipi', 'ddd', '各部门主管会议2', 'upfile/2012082609393870.txt', 'seven'),
(10, 'github 使用文档', '开发部', '开发会议室', '2012-8-26', 'sevenphp', 'seven,sevenphp,haipi', 'ddd', 'github 使用文档', 'upfile/2012082609412142.txt', 'seven'),
(11, 'github 使用文档2', 'php开发小组', '开发会议室', '2012-8-26', 'zhang3', 'zhang3,li4,wang5', 'seven', 'github 使用文档2', 'upfile/2012082609415081.txt', 'seven'),
(12, 'github_百度百科', '开发部', '开发会议室', '2012-8-26', 'sevenphp', 'zhang3,li4,wang5', 'seven', 'github_百度百科', 'upfile/201208260942383.txt', 'seven'),
(13, 'github_百度百科2', 'php开发小组', '开发会议室', '2012-8-26', 'sevenphp', 'seven,sevenphp,haipi', 'seven', 'github_百度百科2', 'upfile/2012082609425867.txt', 'seven'),
(14, 'github_百度百科23', '开发部', '开发会议室', '2012-8-26', 'sevenphp', 'seven,sevenphp,haipi', 'seven', 'github_百度百科23', 'upfile/2012082609431915.txt', 'seven'),
(15, 'PHP开发会议', 'php开发小组', '开发会议室', '2012-8-26', 'dada', 'seven,sevenphp,haipi', 'seven', 'PHP开发会议', 'upfile/2012082609435185.txt', 'seven'),
(16, '决定谁是管理员', '管理员', '小会议室', '2012-8-26', 'sevenphp', 'sevenphp,seven,one,t', 'seven', '决定谁是管理员', 'upfile/2012082612283838.txt', 'sevenphp'),
(17, '决定谁是管理员2', '管理员', '小会议室', '2012-8-26', 'sevenphp', 'sevenphp,seven,one,t', 'seven', '决定谁是管理员2', 'upfile/2012082612405283.txt', 'sevenphp'),
(18, '测试部门会议', '测试部', '开发会议室', '2012-8-28', 'sevenphp', 'seven,sevenphp,haipi', 'seven', '测试部门会议', 'upfile/2012082811065765.txt', 'sevenphp');

-- --------------------------------------------------------

--
-- 表的结构 `mt_meeting_depart`
--
-- 创建时间: 2012 年 08 月 29 日 02:11
--

CREATE TABLE IF NOT EXISTS `mt_meeting_depart` (
  `mt_id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT '//自动编号',
  `mt_depart_name` varchar(30) NOT NULL COMMENT '//部门名称',
  PRIMARY KEY (`mt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `mt_meeting_depart`
--

INSERT INTO `mt_meeting_depart` (`mt_id`, `mt_depart_name`) VALUES
(1, 'php开发部'),
(2, '行政部'),
(3, 'java开发部'),
(4, '测试部'),
(5, '网络安全部');

-- --------------------------------------------------------

--
-- 表的结构 `mt_meeting_user`
--
-- 创建时间: 2012 年 08 月 29 日 02:11
--

CREATE TABLE IF NOT EXISTS `mt_meeting_user` (
  `mt_id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT '//自动编号',
  `mt_user` varchar(20) NOT NULL COMMENT '//用户名称',
  `mt_pass` char(40) NOT NULL COMMENT '//用户密码',
  `mt_depart` varchar(20) DEFAULT NULL COMMENT '//所属部门',
  `mt_level` tinyint(1) NOT NULL DEFAULT '0' COMMENT '//用户等级(0普通1管理)',
  `mt_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '//用户状态(0冻结1解封)',
  `mt_last_logintime` datetime DEFAULT NULL COMMENT '//用户上次最后登录时间',
  `mt_last_ip` varchar(15) DEFAULT NULL COMMENT '//最后登录ip',
  `mt_login_count` int(11) NOT NULL DEFAULT '0' COMMENT '//该用户总登录次数',
  PRIMARY KEY (`mt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='//用户账户信息表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `mt_meeting_user`
--

INSERT INTO `mt_meeting_user` (`mt_id`, `mt_user`, `mt_pass`, `mt_depart`, `mt_level`, `mt_status`, `mt_last_logintime`, `mt_last_ip`, `mt_login_count`) VALUES
(1, 'sevenphp', '7c4a8d09ca3762af61e59520943dc26494f8941b', '开发部', 1, 1, '2012-08-29 10:10:36', '127.0.0.1', 19),
(2, 'seven', 'f6be80f74c04d92368457706c9c84c6facf2c88a', '行政部', 0, 1, '2012-08-29 10:10:22', '127.0.0.1', 37),
(4, 'two', '7c4a8d09ca3762af61e59520943dc26494f8941b', '行政部', 1, 1, '2012-08-27 16:31:57', '127.0.0.1', 3),
(5, 'six', '7c4a8d09ca3762af61e59520943dc26494f8941b', '网络安全部', 0, 1, '2012-08-28 15:04:39', '127.0.0.1', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
