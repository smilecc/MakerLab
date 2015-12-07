-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: 2015-12-07 14:39:36
-- 服务器版本： 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `lab`
--

-- --------------------------------------------------------

--
-- 表的结构 `lab_activity`
--

CREATE TABLE `lab_activity` (
  `id` int(11) NOT NULL,
  `name` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `online` int(1) NOT NULL,
  `start_time` date NOT NULL,
  `over_time` date NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_release` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `lab_activity`
--

INSERT INTO `lab_activity` (`id`, `name`, `username`, `img`, `detail`, `online`, `start_time`, `over_time`, `create_time`, `is_release`) VALUES
(3, '新的活动测试', 'Smilec', '2015-10-24/sm_562b3263e5454.jpg', '这里是活动的测试说明这里是活动的测试说明这里是活动的测试说明这里是活动的测试说明这里是活动的测试说明这里是活动的测试说明这里是活动的测试说明这里是活动的测试说明这里是活动的测试说明\r\n![screenshot](/Public/Uploads/2015-10-24/562b32dca6969.jpg)\r\n哈哈哈\r\n\r\n# 你怎么样\r\n还不错\r\n## 你好\r\n\r\n## 还不错\r\n哈哈', 1, '2015-10-24', '2015-10-27', '2015-10-24 07:25:31', 1),
(4, '测试活动2', 'Smilec', '2015-10-24/sm_562b652009f24.gif', '这里是简介', 0, '2015-10-15', '2015-10-23', '2015-10-24 11:02:17', 1),
(5, 'Test', 'Smilec', '2015-10-27/sm_562eda9099301.jpg', '', 1, '2015-10-14', '2015-10-28', '2015-10-27 02:00:20', 0),
(6, 'Test', 'Smilec', '2015-10-27/sm_562eda9099301.jpg', '你A酸扥A酸的发送到 \r\n![screenshot](/Public/Uploads/2015-10-27/562edb0489b0e.png)', 1, '2015-10-14', '2015-10-28', '2015-10-27 02:00:57', 1);

-- --------------------------------------------------------

--
-- 表的结构 `lab_activity_form`
--

CREATE TABLE `lab_activity_form` (
  `id` int(11) NOT NULL,
  `question` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `activity_id` int(11) NOT NULL,
  `input_element` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `lab_activity_form`
--

INSERT INTO `lab_activity_form` (`id`, `question`, `activity_id`, `input_element`) VALUES
(17, 'test', 0, 1),
(20, '你的姓名？', 1, 0),
(21, '你加入的理由是什么？', 1, 1),
(22, '你的名字？', 3, 0),
(23, '你的手机号码？', 3, 0),
(24, '你加入的理由？', 3, 1),
(25, '你是逗比吗', 4, 0),
(26, '你的姓名？', 5, 0),
(27, '你的姓名？', 6, 0),
(28, '你的手机号码？', 6, 0),
(29, '你的理由', 6, 1),
(30, '你多少岁', 3, 0);

-- --------------------------------------------------------

--
-- 表的结构 `lab_activity_form_answer`
--

CREATE TABLE `lab_activity_form_answer` (
  `id` int(11) NOT NULL,
  `sign_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `lab_activity_form_answer`
--

INSERT INTO `lab_activity_form_answer` (`id`, `sign_id`, `question_id`, `answer`) VALUES
(8, 1, 20, '崔璨'),
(9, 1, 21, '你说啥'),
(10, 2, 22, '崔璨'),
(11, 2, 23, '13026061103'),
(12, 2, 24, '我就试试，\r\n你能怎么我');

-- --------------------------------------------------------

--
-- 表的结构 `lab_activity_form_sign`
--

CREATE TABLE `lab_activity_form_sign` (
  `id` int(11) NOT NULL,
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `activity_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `lab_activity_form_sign`
--

INSERT INTO `lab_activity_form_sign` (`id`, `username`, `activity_id`, `time`) VALUES
(1, 'Smilec', 1, '2015-10-24 03:06:11'),
(2, 'Smilec', 3, '2015-10-24 10:24:55');

-- --------------------------------------------------------

--
-- 表的结构 `lab_project`
--

CREATE TABLE `lab_project` (
  `id` int(11) NOT NULL,
  `name` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `process` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `tag` int(11) NOT NULL,
  `intro` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `allow` int(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `lab_project`
--

INSERT INTO `lab_project` (`id`, `name`, `img`, `process`, `type`, `tag`, `intro`, `detail`, `time`, `username`, `allow`) VALUES
(14, '测试项目', '2015-10-01/sm_560c9bdf9489d.jpg', 2, 7, 8, '测试项目的介绍，对啊', '![moegirl-Q&amp;amp;A](http://static.mengniang.org/logo/zh2015_moegirlpedia_logo.png)\r\n##项目说明\r\n隶属于萌娘百科的子项目 - 萌娘问答\r\n\r\n##项目进程\r\n\r\n2015-1-31 11:39:13 起步阶段\r\n\r\n##项目说明\r\n\r\n* 语言：PHP\r\n* 框架：ThinkPHP\r\n* 前端框架：amaze\r\n\r\n\r\n##有问题反馈\r\n在使用中有任何问题，欢迎反馈给我，可以用以下联系方式跟我交流\r\n\r\n* 邮件(sxcuican#hotmail.com, 把#换成@)\r\n* QQ: 464930878\r\n<b>123</b>', '2015-10-01 02:35:29', 'Smilec', 1),
(15, '测试项目2', '2015-10-24/sm_562b6353366ec.gif', 1, 5, 8, '哈哈 我就试试Gif', '', '2015-10-24 10:54:41', 'Smilec', 1),
(16, '测试项目3', '2015-10-24/sm_562b642a2da98.jpg', 1, 5, 8, 'TestAgain', '哈哈哈\r\n![screenshot](/Public/Uploads/2015-10-24/562b6459ae300.jpg)', '2015-10-24 10:58:25', 'Smilec', 0),
(17, 'Test', '2015-10-27/sm_562edd6a393cf.jpg', 1, 5, 8, 'Test Intro', 'Test', '2015-10-27 02:12:17', 'Smilec', 2);

-- --------------------------------------------------------

--
-- 表的结构 `lab_project_class`
--

CREATE TABLE `lab_project_class` (
  `id` int(11) NOT NULL,
  `class` int(1) NOT NULL,
  `name` varchar(8) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `lab_project_class`
--

INSERT INTO `lab_project_class` (`id`, `class`, `name`) VALUES
(1, 1, '创意'),
(2, 1, '研发'),
(3, 1, '测试'),
(4, 1, '成品'),
(5, 2, '概念'),
(6, 2, '创意'),
(7, 2, '基础'),
(8, 3, '智慧互联'),
(9, 3, '智能家居'),
(10, 3, '智慧食品'),
(11, 3, '健康洗涤'),
(12, 3, '舒适用水'),
(13, 3, '健康厨房'),
(14, 3, '智慧视听'),
(15, 3, '健康空气'),
(16, 3, '创意飞行器'),
(17, 3, '其他');

-- --------------------------------------------------------

--
-- 表的结构 `lab_project_process`
--

CREATE TABLE `lab_project_process` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `content` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `lab_project_process`
--

INSERT INTO `lab_project_process` (`id`, `project_id`, `content`, `time`) VALUES
(4, 14, '已经完成了很多很多很多很多很多很多很多很多很多很多的内容', '2015-10-16 06:10:41'),
(5, 14, '已经完成了很多很多很多很多很多很多很多很多很多很多的内容已经完成了很多很多很多很多很多很多很多很多很多很多的内容', '2015-10-16 06:10:54'),
(6, 14, 'Test Reload', '2015-10-16 06:21:24'),
(7, 14, 'Hello world', '2015-10-16 06:22:45'),
(8, 14, 'Hello world2', '2015-10-16 06:23:11'),
(9, 14, '&lt;script type=&quot;text/javascript&quot;&gt;alert(''test'')&lt;/alert&gt;', '2015-10-16 06:59:32'),
(10, 14, 'you see see you', '2015-10-17 00:24:20'),
(11, 14, '你好', '2015-10-27 01:53:19'),
(12, 14, '123', '2015-10-29 03:22:28');

-- --------------------------------------------------------

--
-- 表的结构 `lab_project_reject`
--

CREATE TABLE `lab_project_reject` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `info` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `lab_user`
--

CREATE TABLE `lab_user` (
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `page` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `admin` int(1) NOT NULL,
  `random` int(11) NOT NULL,
  `introduce_short` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `introduce_long` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `weibo` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `lab_user`
--

INSERT INTO `lab_user` (`username`, `page`, `password`, `email`, `admin`, `random`, `introduce_short`, `introduce_long`, `weibo`) VALUES
('Smilec', 'ee8ae19cfb6112e2f67ce526a6c8ef64', '054687d7b3afbcc15d1c037a200d425b', 'sxcuican@163.com', 1, 487819778, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lab_activity`
--
ALTER TABLE `lab_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_activity_form`
--
ALTER TABLE `lab_activity_form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_id` (`activity_id`);

--
-- Indexes for table `lab_activity_form_answer`
--
ALTER TABLE `lab_activity_form_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_activity_form_sign`
--
ALTER TABLE `lab_activity_form_sign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_project`
--
ALTER TABLE `lab_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_project_class`
--
ALTER TABLE `lab_project_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_project_process`
--
ALTER TABLE `lab_project_process`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_project_reject`
--
ALTER TABLE `lab_project_reject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_user`
--
ALTER TABLE `lab_user`
  ADD PRIMARY KEY (`username`,`page`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lab_activity`
--
ALTER TABLE `lab_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `lab_activity_form`
--
ALTER TABLE `lab_activity_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `lab_activity_form_answer`
--
ALTER TABLE `lab_activity_form_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `lab_activity_form_sign`
--
ALTER TABLE `lab_activity_form_sign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lab_project`
--
ALTER TABLE `lab_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `lab_project_class`
--
ALTER TABLE `lab_project_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `lab_project_process`
--
ALTER TABLE `lab_project_process`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `lab_project_reject`
--
ALTER TABLE `lab_project_reject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;