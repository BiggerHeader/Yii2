-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-03-22 12:02:14
-- 服务器版本： 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- 表的结构 `adminuser`
--

CREATE TABLE `adminuser` (
  `id` int(11) NOT NULL,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `profile` text COLLATE utf8_unicode_ci,
  `password_hash` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `adminuser`
--

INSERT INTO `adminuser` (`id`, `username`, `nickname`, `password`, `email`, `profile`, `password_hash`, `password_reset_token`, `auth_key`) VALUES
(1, '大头', 'datou', '111111', 'webmaster@example.com', 'hello,this is my profilewedf', '$2y$13$HtJqGRmc76KIRIwokii8AOQ1XZljXiuWCKUGFnH9vkTnfBpHtqgFu', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF'),
(2, 'chengcheng', '成成', '$2y$13$RZ20K81ZdERPDyFq2EM31e6KjmmdNRtGmCC6Fq9NST3hWhcgoPqUy', 'tim@u2000.com', 'a testing user', '$2y$13$HtJqGRmc76KIRIwokii8AOQ1XZljXiuWCKUGFnH9vkTnfBpHtqgFu', NULL, 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF'),
(3, 'datou', '大头', '$2y$13$RZ20K81ZdERPDyFq2EM31e6KjmmdNRtGmCC6Fq9NST3hWhcgoPqUy', 'heyx@hotmail.com', 'a testing user', '$2y$13$HtJqGRmc76KIRIwokii8AOQ1XZljXiuWCKUGFnH9vkTnfBpHtqgFu', NULL, 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF'),
(4, 'e3wr', '****', '2', 'dsc@w.c', NULL, '$2y$13$Lgel236DJG1Wl6Oa36ITaOt8xaNUUc2JFO8xWr0fhQJfqWvJh3Gsa', NULL, 'sdWf47cBNF_TASKkGH4pstJrkcdJs7CF'),
(5, 'qew3r', '****', '###', 'dsx@qqd.vv', NULL, '$2y$13$WNw3N3p4LMphg1HQfBIs9.XqyayehrbqsMKl8VAMiN3jOwWL8Mwea', NULL, 'fJloBypqEpQ9B9VFMynOQTsfkKQr94XQ'),
(6, 'e3r4tg', '****', '###', 'efdbgv@qq.cc', NULL, '$2y$13$akRXIm.alVLPNoTFI3VyDeFmXpkysoLdpQDtEdw7VWj3EjX1fNFgy', NULL, 'u_oLAZK-wZjF9MWWT_o7TM1mYB3C0nKX'),
(7, 'qew3r234t5y', 'XXXXXXXXXXXXXXXXx', '*****', 'ew3rgth@t.ythgnb', 'rgfbvsertdyfh', '$2y$13$tJszLI/nL0.QaE0i8UNw0eMzgBGi7VsV/Y3JDxgSpr5TM.WUvQfd6', NULL, 'VRgWpaVQESOv9VKp2scprjDdBs4B5j3N'),
(8, 'qwe', 'XXXXXXXXXXXXXXXXx', '*****', 'erstdgdsc@w.c', 'w2e3rfsgb', '$2y$13$k7K6Md.ybmLEYFrfqlkdBepPNhOuHlbXd3MDJD0K//i3PbTEeHNpi', NULL, 'vfAJdzDjxTbfaLlsQIwGHt1dNT6aTspF'),
(9, 'qweswdcx', 'XXXXXXXXXXXXXXXXx', '*****', 'erstdgdsc@w.cwed', 'w2e3rfsgb', '$2y$13$1MkyGwv/tcli1FznuneHZOQGJuS8JJgRNrw/SmZmWfHIgGOcR/1Ka', NULL, 'sxO6s4WEOsfl0NK4buxsDs9bS8UZ5gp-'),
(10, 'qweswdcxwedfc', 'XXXXXXXXXXXXXXXXx', '*****', 'erstdgdsc@w.cwedwedf', 'w2e3rfsgb', '$2y$13$7O3/SD1VrcGVYUPA5oRpbexC/j3N/f0txPpgjnPhkV5o6jgnoTsj.', NULL, 'HQsRmeBDa2GuLEI1SMOMDWlgYXSRjDky'),
(11, 'qweswdcxweqrfd', 'XXXXXXXXXXXXXXXXx', '*****', 'erstdgdsc@w.cdfgb', 'w2e3rfsgb', '$2y$13$XkrUhaB3OgdhGX9yC55SyugDbFeLYEbZml6HrXLpamvYi8rJTPciO', NULL, 'uEWhi30nma7OozQzt6d0E6SH4VWbX3Jq'),
(12, 'qweswdcxweqrfdwerfg', 'XXXXXXXXXXXXXXXXx', '*****', 'erstdgdsc@w.cdfgbefgb', 'w2e3rfsgbedfv', '$2y$13$J.2M6MfZ80IGCtUnMM/Ex.6A/f5QNgLMykxRqfylTNBKieDnYc6uC', NULL, 'Hk_fLJChgEG9U7zuSdSCPr21AG1pSCQF');

-- --------------------------------------------------------

--
-- 表的结构 `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('updatePost', '1', 1489982488);

-- --------------------------------------------------------

--
-- 表的结构 `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1489980136, 1489980136),
('approveComment', 2, '审核评论', NULL, NULL, 1489980136, 1489980136),
('commentAuditor', 1, '评论审核员', NULL, NULL, 1489980136, 1489980136),
('createPost', 2, '新增文章', NULL, NULL, 1489980136, 1489980136),
('deletePost', 2, '删除文章', NULL, NULL, 1489980136, 1489980136),
('postAdmin', 1, '文章管理员', NULL, NULL, 1489980136, 1489980136),
('postOperator', 1, '文章操作员', NULL, NULL, 1489980136, 1489980136),
('updatePost', 2, '修改文章', NULL, NULL, 1489980136, 1489980136);

-- --------------------------------------------------------

--
-- 表的结构 `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('commentAuditor', 'approveComment'),
('admin', 'commentAuditor'),
('postAdmin', 'createPost'),
('postAdmin', 'deletePost'),
('postOperator', 'deletePost'),
('admin', 'postAdmin'),
('postAdmin', 'updatePost');

-- --------------------------------------------------------

--
-- 表的结构 `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  `remind` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`id`, `content`, `status`, `create_time`, `userid`, `email`, `url`, `post_id`, `remind`) VALUES
(89, 'yii行为（Behavior）\r\n一个行为 behavior （也被称为 Mixin）能被用来增强一个已有组件的功能而无需修改该组件的代码。特别是，一个行为可以注入其方法和属性到这个组件中，使得它们可以像组件自身的方法和属性一样直接访问。行为还能响应组件中触发的事件，以便截取正常的代码执行。和 PHP\'s traits 不同，行为可以在运行时被附属到类中。\\db\\Query::one()  ($content_len > 20) ? \'......\' : \'\' ($content_len > 20) ? \'......\' : \'\' ($content_len > 20) ? \'......\' : \'\' ($conten ($content_len > 20) ? \'......\' : \'\'t_len > 20) ? \'......\' : \'\'', 1, 1443004455, 1, 'somuchfun@gmail.com', 'www.baidu.com', 39, 1),
(91, 'wefdgbnv c行为（Behavior）\r\n一个行为 behavior （也被称为 Mixin）能被用来增强一个已有组件的功能而无需修改该组件的代码。特别是，一个行为可以注入其方法和属性到这个组件中，使得它们可以像组件自身的方法\r\n行为（Behavior）\r\n一个行为 behavior （也被称为 Mixin）能被用来增强一个已有组件的功能而无需修改该组件的代码。特别是，一个行为可以注入其方法和属性到这个组件中，使得它们可以像组件自身的方法和属性一样直接访问。行为还能响应组件中触发的事件，以便截取正常的代码执行。和 PHP\'s traits 不同，行为可以在运行时被附属到类中。和属性一样直接访问。行为还能响应组件中触发的事件，以便截取正常的代码执行。和 PHP\'s traits 不同，行为可以在运行时被附属到类中。', 1, 1443047988, 1, 'ctq@qq.com', 'www.baidu.com', 39, 1),
(92, 'rfvcserthyjumgkmn\r\nContent行为（Behavior）\r\n一个行为 behavior （也被称为 Mixin）能被用来增强一个已有组件的功能而无需修改该组件的代码。特别是，一个行为可以注入其方法和属性到这个组件中，使得它们可以像组件自身的方法和属性一样直接访问。行为还能响应组件中触发的事件，以便截取正常的代码执行。和 PHP\'s traits 不同，行为可以在运行时被附属到类中。', 1, 1443049673, 1, 'kiki@qq.com', 'www.baidu.com', 39, 1),
(93, 'yii\\db\\Query::one() yii\\db\\Query::one() yii\\db\\Query::one() yii\\db\\Query::one() yii\\db\\Query::one() ', 1, 1443927141, 1, 'csc@bing.com', 'www.baidu.com', 39, 1),
(95, '基础知识\r\n\r\n对于前端来说，最基础的三大件就是HTML、CSS、JavaScript，在写简历的时候切忌没有重点，写诸如“熟练掌握 HTML/CSS/JavaScript…”这类的话。最好能写上对一些特定领域或者常见技术的掌握，比如说：\r\n\r\n能够语义化的编写HTML文档\r\n熟悉CSS2.1规范，了解外边距折叠等特性\r\n熟悉ES5/ES6，对原型、闭包、继承等有自己的理解\r\n这样看下来面试官就会对你的能力有一个初步的了解，你也可以借这些能力去在面试中掌握主动权。', 2, 1444377054, 1, 'tester@example.com', 'www.baidu.com', 36, 1),
(96, 'wearsfgbc ', 1, NULL, 1, 'weixi@weixistyle.com', NULL, 47, 1),
(97, 'wq2edsv cdfv', 1, 1490146916, 1, 'weixi@weixistyle.com', NULL, 47, 1),
(98, 'qwdescv ', 2, 1490146923, 1, 'weixi@weixistyle.com', NULL, 47, 1),
(99, 'qwdescv ', 2, 1490146929, 1, 'weixi@weixistyle.com', NULL, 47, 1),
(100, 'qwdescv ', 2, 1490146942, 1, 'weixi@weixistyle.com', NULL, 47, 1),
(101, 'qwdescv ', 2, 1490147038, 1, 'weixi@weixistyle.com', NULL, 47, 1),
(102, '新版《魏曦教你学Yii2.0》陆续发布到优酷网站：http://i.youku.com/weixistyle\r\n\r\n新版吸取了旧版的经验，综合网友的意见重新录制，通过博客系统案例和权威指南的结合，从具体到抽象，循序渐进讲解Yii2.0的核心知识，能有效降低学习的难度，更轻松的学会Yii框架。\r\n\r\n新版充分利用视频的表现能力，真人出镜讲解，力求逻辑清晰、画面美观、语言简洁、节奏明快，达到高效学习的目的。视频相关的源码可到我的个人网址找到下载地址：http://www.weixistyle.com\r\n\r\n非常欢迎任何意见建议。', 1, 1490147264, 1, 'weixi@weixistyle.com', NULL, 47, 1),
(103, 'qwdescv ', 2, 1490147323, 1, 'weixi@weixistyle.com', NULL, 47, 1),
(104, 'qwdescv ', 2, 1490147427, 1, 'weixi@weixistyle.com', NULL, 47, 1),
(105, 'qwdescv ', 2, 1490147450, 1, 'weixi@weixistyle.com', NULL, 47, 1),
(106, 'qwdescv ', 2, 1490147480, 1, 'weixi@weixistyle.com', NULL, 47, 1),
(107, 'qwdescv ', 2, 1490147510, 1, 'weixi@weixistyle.com', NULL, 47, 1),
(108, 'qwdescv ', 2, 1490147613, 1, 'weixi@weixistyle.com', NULL, 47, 1),
(109, '新版充分利用视频的表现能力，真人出镜讲解，力求逻辑清晰、画面美观、语言简洁、节奏明快，达到高效学习的目的。视频相关的源码可到我的个人网址找到下载地址：http://www.weixistyle.com', 2, 1490147640, 1, 'weixi@weixistyle.com', NULL, 47, 1),
(110, '新版充分利用视频的表现能力，真人出镜讲解，力求逻辑清晰、画面美观、语言简洁、节奏明快，达到高效学习的目的。视频相关的源码可到我的个人网址找到下载地址：http://www.weixistyle.com', 2, 1490147691, 1, 'weixi@weixistyle.com', NULL, 47, 1);

-- --------------------------------------------------------

--
-- 表的结构 `commentstatus`
--

CREATE TABLE `commentstatus` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `commentstatus`
--

INSERT INTO `commentstatus` (`id`, `name`, `position`) VALUES
(1, '已回复', 1),
(2, '未回复', 2);

-- --------------------------------------------------------

--
-- 表的结构 `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1462597684),
('m130524_201442_init', 1462597693),
('m140506_102106_rbac_init', 1489912041);

-- --------------------------------------------------------

--
-- 表的结构 `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `tags` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `tags`, `status`, `create_time`, `update_time`, `author_id`) VALUES
(32, 'Yii2С', '行为（Behavior）\r\n一个行为 behavior （也被称为 Mixin）能被用来增强一个已有组件的功能而无需修改该组件的代码。特别是，一个行为可以注入其方法和属性到这个组件中，使得它们可以像组件自身的方法和属性一样直接访问。行为还能响应组件中触发的事件，以便截取正常的代码执行。和 PHP\'s traits 不同，行为可以在运行时被附属到类中。\r\n\r\n \r\n\r\n使用行为\r\n行为可以被附属到任何从组件 [[yii\\base\\Component]] 派生的类中，通过代码或者应用程序配置。\r\n\r\n通过 behaviors 方法附属行为\r\n为了把一个行为附属到一个类中，你可以实现这个component的 behaviors 方法。作为示例，Yii提供了 [[yii\\behaviors\\TimestampBehavior]] 行为，用于在保存或更新 Active Record 模型时自动更新时间相关字段：', 'Yii2', 3, 1442998314, 1490064586, 1),
(34, 'ActiveRecord ', '<div id="content">\r\n			\r\n<p><a href="http://zh.wikipedia.org/wiki/Active_Record">Active Record</a> \r\n行为（Behavior）\r\n一个行为 behavior （也被称为 Mixin）能被用来增强一个已有组件的功能而无需修改该组件的代码。特别是，一个行为可以注入其方法和属性到这个组件中，使得它们可以像组件自身的方法和属性一样直接访问。行为还能响应组件中触发的事件，以便截取正常的代码执行。和 PHP\'s traits 不同，行为可以在运行时被附属到类中。\r\n基础知识\r\n\r\n对于前端来说，最基础的三大件就是HTML、CSS、JavaScript，在写简历的时候切忌没有重点，写诸如“熟练掌握 HTML/CSS/JavaScript…”这类的话。最好能写上对一些特定领域或者常见技术的掌握，比如说：\r\n\r\n能够语义化的编写HTML文档\r\n熟悉CSS2.1规范，了解外边距折叠等特性\r\n熟悉ES5/ES6，对原型、闭包、继承等有自己的理解\r\n这样看下来面试官就会对你的能力有一个初步的了解，你也可以借这些能力去在面试中掌握主动权。', 'ActiveRecord,Yii2,php', 2, 1443000145, 1490064708, 1),
(35, 'Active Record ', '<div id="content">\r\n行为（Behavior）\r\n一个行为 behavior （也被称为 Mixin）能被用来增强一个已有组件的功能而无需修改该组件的代码。特别是，一个行为可以注入其方法和属性到这个组件中，使得它们可以像组件自身的方法和属性一样直接访问。行为还能响应组件中触发的事件，以便截取正常的代码执行。和 PHP\'s traits 不同，行为可以在运行时被附属到类中。\r\n\r\n \r\n\r\n使用行为\r\n行为可以被附属到任何从组件 [[yii\\base\\Component]] 派生的类中，通过代码或者应用程序配置。\r\n\r\n通过 behaviors 方法附属行为\r\n为了把一个行为附属到一个类中，你可以实现这个component的 behaviors 方法。作为示例，Yii提供了 [[yii\\behaviors\\TimestampBehavior]] 行为，用于在保存或更新 Active Record 模型时自动更新时间相关字段：\r\n\r\n<h2>AR', 'Yii,http,java', 2, 1443000262, 1490064493, 1),
(36, 'DetailView', '<div id="content">\r\n行为（Behavior）\r\n一个行为 behavior （也被称为 Mixin）能被用来增强一个已有组件的功能而无需修改该组件的代码。特别是，一个行为可以注入其方法和属性到这个组件中，使得它们可以像组件自身的方法和属性一样直接访问。行为还能响应组件中触发的事件，以便截取正常的代码执行。和 PHP\'s traits 不同，行为可以在运行时被附属到类中。\r\n<p>yii\\widgets\\DetailView С', 'Yii2,DetailView', 2, 1443001778, 1490064629, 1),
(37, 'ListView', '<p>yii\\widgets\\ListView С</p>\r\nyii\\widgets\\ListView Сyii\\widgets\\ListView С\r\n行为（Behavior）\r\n一个行为 behavior （也被称为 Mixin）能被用来增强一个已有组件的功能而无需修改该组件的代码。特别是，一个行为可以注入其方法和属性到这个组件中，使得它们可以像组件自身的方法和属性一样直接访问。行为还能响应组件中触发的事件，以便截取正常的代码执行。和 PHP\'s traits 不同，行为可以在运行时被附属到类中。', 'Yii2,ListView,php', 2, 1443001837, 1490064655, 1),
(38, 'GridView', '<p>通过指定行为配置数组相应的键可以给行为关联一个名称。这种行为称为命名行为。如果行为没有指定名称就是匿名行为。\r\n\r\n动态附属行为\r\n还可以通过调用 attachBehavior 方法来把行为附属给一个组件：\r\n\r\nuse app\\components\\MyBehavior;\r\n \r\n// 附加行为对象\r\n$component->attachBehavior(\'myBehavior1\', new MyBehavior);\r\n \r\n// 附加行为类\r\n$component->attachBehavior(\'myBehavior2\', MyBehavior::className());\r\n \r\n// 附加配置数组\r\n$component->attachBehavior(\'myBehavior3\', [\r\n    \'class\' => MyBehavior::className(),\r\n    \'prop1\' => \'value1\',\r\n    \'prop2\' => \'value2\',\r\n]);\r\n附加行为到组件时的命名行为，可以使用这个名称来访问行为对象，如下所示：\r\n\r\n1\r\n$behavior = $component->getBehavior(\'myBehavior\');\r\n也能获取附加到这个组件的所有行为：\r\n\r\n1\r\n$behaviors = $component->getBehaviors();\r\n通过配置附属行为\r\n我们还可以通过配置来附属行为，语法如下：\r\n\r\n1\r\n2\r\n3\r\n4\r\n5\r\n6\r\n7\r\n8\r\n9\r\n10\r\n11\r\n12\r\nreturn [\r\n    // ...\r\n    \'components\' => [\r\n        \'myComponent\' => [\r\n            // ...\r\n            \'as tree\' => [\r\n                \'class\' => \'Tree\',\r\n                \'root\' => 0,\r\n            ],\r\n        ],\r\n    ],\r\n];\r\n如上配置中 as tree 代表附属一个名称为 tree 的行为，并且这个数组将被传递给 Yii::createObject() 来创建这个行为对象。', 'Yii2,GridView', 2, 1443001924, 1490064465, 1),
(39, 'Yii', '<div id="content">\r\n行为（Behavior）\r\n一个行为 behavior （也被称为 Mixin）能被用来增强一个已有组件的功能而无需修改该组件的代码。特别是，一个行为可以注入其方法和属性到这个组件中，使得它们可以像组件自身的方法和属性一样直接访问。行为还能响应组件中触发的事件，以便截取正常的代码执行。和 PHP\'s traits 不同，行为可以在运行时被附属到类中。\r\n\r\n \r\n\r\n使用行为\r\n行为可以被附属到任何从组件 [[yii\\base\\Component]] 派生的类中，通过代码或者应用程序配置。\r\n\r\n通过 behaviors 方法附属行为\r\n为了把一个行为附属到一个类中，你可以实现这个component的 behaviors 方法。作为示例，Yii提供了 [[yii\\behaviors\\TimestampBehavior]] 行为，用于在保存或更新 Active Record 模型时自动更新时间相关字段：\r\n行为（Behavior）\r\n一个行为 behavior （也被称为 Mixin）能被用来增强一个已有组件的功能而无需修改该组件的代码。特别是，一个行为可以注入其方法和属性到这个组件中，使得它们可以像组件自身的方法和属性一样直接访问。行为还能响应组件中触发的事件，以便截取正常的代码执行。和 PHP\'s traits 不同，行为可以在运行时被附属到类中。\r\n<p>', 'Yiiw2', 2, 1443002072, 1490064611, 1),
(40, 'activerecorde讲解', '<div id="content">\r\n认真听\r\n<p>', 'Yii2,php', 2, 1443002396, 1489753138, 1),
(43, 'datou', 'datou丰富的V哦开吗V，速度是非常', 'javascript,java,Html', 3, 1489743589, 1490075904, 1),
(44, 'Yii2解读', 'Yii2解读Yii2解读Yii2解读Yii2解读', 'php,drop', 3, 1489753193, 1489753466, 2),
(45, 'datou', 'datoudatoudatoudatoudatou', 'list,while', 3, 1489804253, 1489804279, 2),
(46, '1111', '1111111111111111111111', 'Yii,http,java', 1, 1489804458, 1490075941, 2),
(47, '1111', '与 PHP traits 的比较\r\n尽管行为在 "注入" 属性和方法到主类方面类似于 traits ，它们在很多方面却不相同。如上所述，它们各有利弊。它们更像是互补的而不是相互替代。\r\n\r\n行为的优势\r\n行为类像普通类支持继承。另一方面，traits 可以视为 PHP 语言支持的复制粘贴功能，它不支持继承。\r\n\r\n行为无须修改组件类就可动态附加到组件或移除。要使用 traits，必须修改使用它的类。\r\n\r\n行为是可配置的而 traits 不能。\r\n\r\n行为以响应事件来自定义组件的代码执行。\r\n\r\n当不同行为附加到同一组件产生命名冲突时，这个冲突通过先附加行为的优先权自动解决。而由不同 traits 引发的命名冲突需要通过手工重命名冲突属性或方法来解决。\r\n\r\ntraits 的优势\r\ntraits 比起行为更高效，因为行为是对象，消耗时间和内存。\r\n\r\nIDE 对 traits 更友好，因为它们是语言结构。\r\n行为（Behavior）\r\n一个行为 behavior （也被称为 Mixin）能被用来增强一个已有组件的功能而无需修改该组件的代码。特别是，一个行为可以注入其方法和属性到这个组件中，使得它们可以像组件自身的方法和属性一样直接访问。行为还能响应组件中触发的事件，以便截取正常的代码执行。和 PHP\'s traits 不同，行为可以在运行时被附属到类中。\r\n\r\n \r\n\r\n使用行为\r\n行为可以被附属到任何从组件 [[yii\\base\\Component]] 派生的类中，通过代码或者应用程序配置。\r\n\r\n通过 behaviors 方法附属行为\r\n为了把一个行为附属到一个类中，你可以实现这个component的 behaviors 方法。作为示例，Yii提供了 [[yii\\behaviors\\TimestampBehavior]] 行为，用于在保存或更新 Active Record 模型时自动更新时间相关字段：', 'http', 1, 1489804526, 1490064539, 2),
(48, 'create', 'createEvents\r\nHide inherited events\r\n\r\nEvent	Type	Description	Defined By\r\nEVENT_AFTER_RUN	yii\\base\\WidgetEvent	An event raised right after executing a widget. (available since version 2.0.11)	yii\\base\\Widget\r\nEVENT_BEFORE_RUN	yii\\base\\WidgetEvent	An event raised right before executing a widget. (available since version 2.0.11)	yii\\base\\Widget\r\nEVENT_INIT	yii\\base\\Event	An event that is triggered when the widget is initialized via init(). (available since version 2.0.11)	yii\\base\\Widget\r\nProperty Details\r\n$activePageCssClass public property\r\nThe CSS class for the active (currently selected) page button.\r\npublic string $activePageCssClass = \'active\'\r\n$disabledListItemSubTagOptions public property (available since version 2.0.11)\r\nThe options for the disabled tag to be generated inside the disabled list element. In order to customize the html tag, please use the tag key.\r\n\r\n$disabledListItemSubTagOptions = [\'tag\' => \'div\', \'class\' => \'disabled-div\'];\r\npublic array $disabledListItemSubTagOptions = []\r\n$disabledPageCssClass public property\r\nThe CSS class for the disabled page buttons.\r\npublic string $disabledPageCssClass = \'disabled\'\r\n$firstPageCssClass public property\r\nThe CSS class for the "first" page button.\r\npublic string $firstPageCssClass = \'first\'\r\n$firstPageLabel public property\r\nThe text label for the "first" page button. Note that this will NOT be HTML-encoded. If it\'s specified as true, page number will be used as label. Default is false that means the "first" page button will not be displayed.\r\npublic string|boolean $firstPageLabel = false\r\n$hideOnSinglePage public property\r\nHide widget when only one page exist.\r\npublic boolean $hideOnSinglePage = true\r\n$lastPageCssClass public property\r\nThe CSS class for the "last" page button.', 'ActiveRecord,Yii2,Weight,PHP7', 3, 1489804552, 1490075829, 1),
(49, '1234', '1234re5tQwsedzFXGC\r\n /**\r\n     * 重写beforesave 方法\r\n     * @return bool\r\n     */\r\n    public function beforeSave($insert)\r\n    {\r\n        //执行父类方法\r\n        if (parent::beforeSave($insert)) {\r\n            //执行成功后，设置对象属性值\r\n            if ($insert) {\r\n                //创建文章操作\r\n                $this->update_time = time();\r\n                $this->create_time = time();\r\n            } else {\r\n                //更新操作\r\n                $this->update_time = time();\r\n            }\r\n            return true;\r\n        } else {\r\n            return false;\r\n        }\r\n    }\r\n\r\n    /**\r\n     *\r\n     */\r\n    public function afterFind()\r\n    {\r\n        parent::afterFind(); // TODO: Change the autogenerated stub\r\n        //保存之前标签\r\n        $this->_oldTags = $this->tags;\r\n    }\r\n\r\n    /**\r\n     * 修改标签 添加 或删除\r\n     * @param bool $insert\r\n     * @param array $changedAttributes\r\n     */\r\n    public function afterSave($insert, $changedAttributes)\r\n    {\r\n        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub\r\n        // echo $this->_oldTags,$this->tags;exit();\r\n        Tag::updateTags($this->_oldTags, $this->tags);\r\n    }\r\n\r\n    /**\r\n     *删除标签\r\n     */\r\n    public function afterDelete()\r\n    {\r\n        parent::afterDelete(); // TODO: Change the autogenerated stub\r\n        Tag::updateTags($this->tags, \'\');\r\n    }\r\n\r\n    /**\r\n     * 通过getter方法设置URL 添加Url属性\r\n     * @return string\r\n     */\r\n    public function getUrl()\r\n    {\r\n        return Yii::$app->urlManager->createUrl([\r\n            \'post/detail\',\r\n            \'id\' => $this->id,\r\n            //优化SEO\r\n            \'title\' => $this->title,\r\n        ]);\r\n    }\r\n\r\n    /**\r\n     * 截取内容\r\n     */\r\n    public function getContent($length = 200)\r\n    {\r\n        //去除文章里的标签\r\n        $strap_data = strip_tags($this->content);\r\n        //计算总长度 注意中文字符的计算长度\r\n        $count = mb_strlen($strap_data);\r\n        //返回数据\r\n        $sub_data = mb_substr($strap_data, 0, $length, \'utf-8\');\r\n\r\n        return $sub_data . ($count > $length ? \'......\' : \'\');\r\n    }\r\n}\r\n', 'ARCD,Yii2', 2, 1489804792, 1490075741, 1);

-- --------------------------------------------------------

--
-- 表的结构 `poststatus`
--

CREATE TABLE `poststatus` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `poststatus`
--

INSERT INTO `poststatus` (`id`, `name`, `position`) VALUES
(1, '未发布', 1),
(2, '更新中', 2),
(3, '已发布', 3);

-- --------------------------------------------------------

--
-- 表的结构 `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `frequency` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `tag`
--

INSERT INTO `tag` (`id`, `name`, `frequency`) VALUES
(80, 'Yii', 7),
(82, 'while', 1),
(84, 'php', 20),
(85, 'http', 1),
(88, 'Yii2', 50),
(89, 'ARCD', 1),
(90, 'ActiveRecord', 10),
(91, 'Weight', 1),
(92, 'PHP7', 15),
(93, 'java', 30),
(94, 'Html', 1);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'weixi_web', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', '$2y$13$HtJqGRmc76KIRIwokii8AOQ1XZljXiuWCKUGFnH9vkTnfBpHtqgFu', NULL, 'weixi@weixistyle.com', 10, 1462597929, 1462597929);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_comment_post` (`post_id`),
  ADD KEY `FK_comment_user` (`userid`),
  ADD KEY `FK_comment_status` (`status`);

--
-- Indexes for table `commentstatus`
--
ALTER TABLE `commentstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_post_author` (`author_id`),
  ADD KEY `FK_post_status` (`status`);

--
-- Indexes for table `poststatus`
--
ALTER TABLE `poststatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用表AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- 使用表AUTO_INCREMENT `commentstatus`
--
ALTER TABLE `commentstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- 使用表AUTO_INCREMENT `poststatus`
--
ALTER TABLE `poststatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 限制导出的表
--

--
-- 限制表 `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- 限制表 `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_comment_post` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_comment_status` FOREIGN KEY (`status`) REFERENCES `commentstatus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_comment_user` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- 限制表 `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_post_author` FOREIGN KEY (`author_id`) REFERENCES `adminuser` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_post_status` FOREIGN KEY (`status`) REFERENCES `poststatus` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
