-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2019 年 01 月 11 日 21:19
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `testguest`
--

-- --------------------------------------------------------

--
-- 表的结构 `tg_article`
--

CREATE TABLE IF NOT EXISTS `tg_article` (
  `tg_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `tg_reid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `tg_username` varchar(20) NOT NULL COMMENT '//发帖人',
  `tg_type` tinyint(2) unsigned NOT NULL COMMENT '//发帖类型',
  `tg_title` varchar(40) NOT NULL COMMENT '//发帖标题',
  `tg_content` text NOT NULL COMMENT '//发帖内容',
  `tg_readcount` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '//读贴数目',
  `tg_commendcount` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '//评论帖子数目',
  `tg_last_modify` datetime NOT NULL COMMENT '//最后修改时间',
  `tg_date` datetime NOT NULL,
  PRIMARY KEY (`tg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=116 ;

--
-- 转存表中的数据 `tg_article`
--

INSERT INTO `tg_article` (`tg_id`, `tg_reid`, `tg_username`, `tg_type`, `tg_title`, `tg_content`, `tg_readcount`, `tg_commendcount`, `tg_last_modify`, `tg_date`) VALUES
(1, 0, '刘德华', 16, '高尔基-书籍是人类进步的阶梯，所以我们要养成读书的好习惯。', '																								[img]qimg/1/3.png[/img][img]qimg/1/6.png[/img][b][/b][i][/i]曾经有一段真挚的爱情放在我面前，我没有珍惜，等到失去的时候才追悔莫及，人生最痛苦的事情莫过于此。如果上天能再给我一次机会，我一定会对那个女孩说我爱你，如果非要加上期限的话我希望是一万年。\r\n[img]qimg/1/7.png[/img]\r\n[img]qimg/2/11.png[/img]\r\n[img]qimg/3/4.png[/img]\r\n[size=14]你好[/size]\r\n[b]美女[/b]\r\n[color=yellow]mm[/color]\r\n[i]你真的[/i]\r\n[u]真的漂亮[/u]\r\n[img]face/17.jpg[/img]\r\n[img]face/11.jpg[/img]\r\n																			', 492, 29, '2018-09-02 10:28:21', '2018-05-06 13:50:47'),
(76, 2, 'wangqiang', 1, 'RE:今年的俄罗斯世界杯，中国队未能出线，伤了13亿中国人的心，太失望了。', '中国队还是有希望的。。。。', 0, 0, '0000-00-00 00:00:00', '2018-05-08 19:36:02'),
(2, 0, 'wangqiang', 6, '今年的俄罗斯世界杯，中国队未能出线，伤了13亿中国人的心，太失望了。', '															曾经有一段真挚的爱情放在我面前，我没有珍惜，等到失去的时候才追悔莫及，人生最痛苦的事情莫过于此。如果上天能再给我一次机会，我一定会对那个女孩说我爱你，如果非要加上期限的话我希望是一万年。\r\n[img]qimg/1/7.png[/img]\r\n[img]qimg/2/11.png[/img]\r\n[img]qimg/3/4.png[/img]\r\n[size=14]你好[/size]\r\n[b]美女[/b]\r\n[color=yellow]mm[/color]\r\n[i]你真的[/i]\r\n[u]真的漂亮[/u]\r\n[img]face/17.jpg[/img]\r\n[img]face/11.jpg[/img]\r\n[url]http://www.mm.com[/url]\r\n[img]moniimg/2.jpg[/img]\r\n[img]moniimg/4.jpg[/img]\r\n[img]moniimg/6.jpg[/img]															', 168, 8, '2018-05-08 16:08:24', '2018-05-06 13:53:02'),
(3, 0, '成龙', 3, '2010南非世界杯，西班牙对最终赢得了大力神杯', '[img]qimg/3/2.png[/img]西班牙最终赢得了世界杯。曾经有一段真挚的爱情放在我面前，我没有珍惜，等到失去的时候才追悔莫及，人生最痛苦的事情莫过于此。如果上天能再给我一次机会，我一定会对那个女孩说我爱你，如果非要加上期限的话我希望是一万年。\n[img]qimg/1/12.png[/img]\n[img]qimg/2/14.png[/img]\n[img]qimg/3/10.png[/img]\n[size=14]你好[/size]\n[b]美女[/b]\n[color=yellow]mm[/color]\n[i]你真的[/i]\n[u]真的漂亮[/u]\n[img]face/14.jpg[/img]\n[img]face/15.jpg[/img]\n[url]http://www.mm.com[/url]\n[img]moniimg/2.jpg[/img]\n[img]moniimg/4.jpg[/img]\n[img]moniimg/6.jpg[/img]', 97, 2, '0000-00-00 00:00:00', '2018-05-06 13:54:18'),
(4, 0, '周润发', 12, '2014巴西世界杯，巴西队四分之一决赛意外出局，有点失望。', '[img]qimg/3/2.png[/img]德国最终赢得了世界杯。曾经有一段真挚的爱情放在我面前，我没有珍惜，等到失去的时候才追悔莫及，人生最痛苦的事情莫过于此。如果上天能再给我一次机会，我一定会对那个女孩说我爱你，如果非要加上期限的话我希望是一万年。\n[img]qimg/1/5.png[/img]\n[img]qimg/2/1.png[/img]\n[img]qimg/3/9.png[/img]\n[size=14]你好[/size]\n[b]美女[/b]\n[color=yellow]mm[/color]\n[i]你真的[/i]\n[u]真的漂亮[/u]\n[img]face/17.jpg[/img]\n[img]face/11.jpg[/img]\n[url]http://www.mm.com[/url]\n[img]moniimg/12.jpg[/img]\n[img]moniimg/4.jpg[/img]\n[img]moniimg/16.jpg[/img]', 38, 1, '0000-00-00 00:00:00', '2018-05-06 13:57:03'),
(5, 0, '刘德华', 9, '2016年杭州G20峰会，首次在除了北上广之外的城市举办。', '关塞年华早，楼台别望违。试衫著暖气，开镜觅春晖。\n\n燕入窥罗幕，蜂来上画衣。情催桃李艳，心寄管弦飞。\n\n妆洗朝相待，风花暝不归。梦魂何处入，寂寂掩重扉。曾经有一段真挚的爱情放在我面前，我没有珍惜，等到失去的时候才追悔莫及，人生最痛苦的事情莫过于此。如果上天能再给我一次机会，我一定会对那个女孩说我爱你，如果非要加上期限的话我希望是一万年。\n[img]qimg/1/7.png[/img]\n[img]qimg/2/11.png[/img]\n[img]qimg/3/4.png[/img]\n[size=14]你好[/size]\n[b]美女[/b]\n[color=yellow]mm[/color]\n[i]你真的[/i]\n[u]真的漂亮[/u]\n[img]face/17.jpg[/img]\n[img]face/11.jpg[/img]\n[url]http://www.mm.com[/url]\n[img]moniimg/19.jpg[/img]\n', 15, 1, '0000-00-00 00:00:00', '2018-05-06 14:00:29'),
(6, 0, '乔丹', 11, '今天天气很好，适合出去游玩，不能老是呆在宿舍不出去。', '你在哪里呢，我好想你啊。曾经有一段真挚的爱情放在我面前，我没有珍惜，等到失去的时候才追悔莫及，人生最痛苦的事情莫过于此。如果上天能再给我一次机会，我一定会对那个女孩说我爱你，如果非要加上期限的话我希望是一万年。\n[img]qimg/1/7.png[/img]\n[img]qimg/2/11.png[/img]\n[img]qimg/3/4.png[/img]\n[size=14]你好[/size]\n[b]美女[/b]\n[color=yellow]mm[/color]\n[i]你真的[/i]\n[u]真的漂亮[/u]\n[img]face/17.jpg[/img]\n[img]face/11.jpg[/img]\n[url]http://www.mm.com[/url]\n[img]moniimg/22.jpg[/img]\n[img]moniimg/14.jpg[/img]\n[img]moniimg/11.jpg[/img]', 12, 1, '0000-00-00 00:00:00', '2018-05-06 14:06:50'),
(7, 0, '科比', 1, '2018世界经济博鳌论坛，中国经济持续上升，值得关注。', '关塞年华早，楼台别望违。试衫著暖气，开镜觅春晖。\n\n燕入窥罗幕，蜂来上画衣。情催桃李艳，心寄管弦飞。\n\n妆洗朝相待，风花暝不归。梦魂何处入，寂寂掩重扉。', 33, 0, '0000-00-00 00:00:00', '2018-05-06 14:08:51'),
(8, 0, '张国荣', 1, '2018世界经济博鳌论坛三亚', '春江潮水连海平，海上明月共潮生。\n滟滟随波千万里，何处春江无月明！\n江流宛转绕芳甸，月照花林皆似霰；\n空里流霜不觉飞，汀上白沙看不见。\n江天一色无纤尘，皎皎空中孤月轮。\n江畔何人初见月？江月何年初照人？\n人生代代无穷已，江月年年只相似。\n不知江月待何人，但见长江送流水。\n白云一片去悠悠，青枫浦上不胜愁。\n谁家今夜扁舟子？何处相思明月楼？\n可怜楼上月徘徊，应照离人妆镜台。\n玉户帘中卷不去，捣衣砧上拂还来。\n此时相望不相闻，愿逐月华流照君。\n鸿雁长飞光不度，鱼龙潜跃水成文。\n昨夜闲潭梦落花，可怜春半不还家。\n江水流春去欲尽，江潭落月复西斜。\n斜月沉沉藏海雾，碣石潇湘无限路。\n不知乘月几人归，落月摇情满江树。\n曾经有一段真挚的爱情放在我面前，我没有珍惜，等到失去的时候才追悔莫及，人生最痛苦的事情莫过于此。如果上天能再给我一次机会，我一定会对那个女孩说我爱你，如果非要加上期限的话我希望是一万年。\n[img]qimg/1/7.png[/img]\n[img]qimg/2/11.png[/img]\n[img]qimg/3/4.png[/img]\n[size=14]你好[/size]\n[b]美女[/b]\n[color=yellow]mm[/color]\n[i]你真的[/i]\n[u]真的漂亮[/u]\n[img]face/7.jpg[/img]\n[img]face/14.jpg[/img]\n[url]http://www.mm.com[/url]\n\n[img]moniimg/6.jpg[/img]\n关塞年华早，楼台别望违。\n试衫著暖气，开镜觅春晖。\n\n燕入窥罗幕，蜂来上画衣。\n情催桃李艳，心寄管弦飞。\n\n妆洗朝相待，风花暝不归。\n梦魂何处入，寂寂掩重扉。', 45, 0, '0000-00-00 00:00:00', '2018-05-06 14:16:35'),
(9, 0, '李嘉欣', 1, '80年代和90年代的香港电影伴随着我们90后的回忆。', '[img]qimg/1/1.png[/img]人生若只如相见，何事秋风悲画扇。曾经有一段真挚的爱情放在我面前，我没有珍惜，等到失去的时候才追悔莫及，人生最痛苦的事情莫过于此。如果上天能再给我一次机会，我一定会对那个女孩说我爱你，如果非要加上期限的话我希望是一万年。\n[img]qimg/1/7.png[/img]\n[img]qimg/2/11.png[/img]\n[img]qimg/3/4.png[/img]\n[size=14]你好[/size]\n[b]美女[/b]\n[color=yellow]mm[/color]\n[i]你真的[/i]\n[u]真的漂亮[/u]\n[img]face/17.jpg[/img]\n[img]face/11.jpg[/img]\n[url]http://www.mm.com[/url]\n[img]moniimg/2.jpg[/img]\n[img]moniimg/4.jpg[/img]\n[img]moniimg/6.jpg[/img]', 26, 520, '0000-00-00 00:00:00', '2018-05-06 16:56:56'),
(10, 0, '周星驰', 4, '大话西游影响了一代又一代的人，经典中的经典。', '曾经有一段真挚的爱情放在我面前，我没有珍惜，等到失去的时候才追悔莫及，人生最痛苦的事情莫过于此。如果上天能再给我一次机会，我一定会对那个女孩说我爱你，如果非要加上期限的话我希望是一万年。\n[img]qimg/1/7.png[/img]\n[img]qimg/2/11.png[/img]\n[img]qimg/3/4.png[/img]\n[size=14]你好[/size]\n[b]美女[/b]\n[color=yellow]mm[/color]\n[i]你真的[/i]\n[u]真的漂亮[/u]\n[img]face/17.jpg[/img]\n[img]face/11.jpg[/img]\n[url]http://www.mm.com[/url]\n[img]moniimg/2.jpg[/img]\n[img]moniimg/4.jpg[/img]\n[img]moniimg/6.jpg[/img]', 16, 0, '0000-00-00 00:00:00', '2018-05-06 17:57:27'),
(11, 0, '赵艺', 1, '测试功能', '[size=10]123[/size]\n[size=18]123[/size]\n[size=14]123[/size]\n[size=24]123[/size]\n[b]123[/b]\n[b]qaz[/b]\n[color=coral]coral[/color]\n[color=red]red[/color]\n[img]face/19.jpg[/img]\n[u]123[/u]\n[i]密码[/i]\n[url]http://www.baidu.com[/url]\n[email]2476514516@qq.com[/email]\n[flash]http://v.youku.com/v_show/id_XMzM1NzYzMjU5Ng==.html?spm=a2hww.20027244.m_250012.5~5!4~5~5~A[/flash]\n[img]qimg/1/2.png[/img]\n[size=14]你好[/size]\n[b]美女[/b]\n[color=yellow]mm[/color]\n[i]你真的[/i]\n[u]真的漂亮[/u]\n[img]face/1.jpg[/img]\n[url]http://www.mm.com[/url]\n[img]moniimg/11.jpg[/img]\n[img]moniimg/8.jpg[/img]\n', 55, 0, '0000-00-00 00:00:00', '2018-05-06 18:23:24'),
(14, 0, '赵毅', 1, 'hello world', '[img]qimg/1/2.png[/img]\n[img]qimg/2/3.png[/img]\n[img]qimg/3/3.png[/img]\n[size=14]你好[/size]\n[b]美女[/b]\n[color=yellow]mm[/color]\n[i]你真的[/i]\n[u]真的漂亮[/u]\n[img]face/1.jpg[/img]\n[url]http://www.mm.com[/url]\n[img]moniimg/1.jpg[/img]\n[img]moniimg/3.jpg[/img]\n[img]moniimg/5.jpg[/img]', 17, 0, '0000-00-00 00:00:00', '2018-05-06 19:53:01'),
(15, 0, '刘德华', 1, '2017-13-14我爱你一生一世', '[size=10][/size][size=12][/size][b][/b]', 15, 0, '0000-00-00 00:00:00', '2018-05-06 22:43:35'),
(16, 0, 'wangqiang', 1, '大话西游之爱你一万年', '[img]moniimg/1.jpg[/img]\r\n[img]moniimg/11.jpg[/img]						\r\n[img]qimg/2/2.png[/img][img]qimg/2/6.png[/img][size=12]我爱[/size][i]你[/i][b]你知道吗[/b][img]moniimg/13.jpg[/img]\r\n[img]moniimg/11.jpg[/img][img]moniimg/16.jpg[/img][img]moniimg/19.jpg[/img][u]123456789[/u][email]246588@qq.com[/email][url]http://www.mm.com.cn[/url]					', 22, 0, '2018-05-08 15:47:39', '2018-05-06 22:57:37'),
(17, 0, 'wangqiang', 2, '你还好吗？这么久没有见面。不知道你过的怎么样?我好想你啊。', '[img]qimg/1/1.png[/img][img]qimg/1/1.png[/img]						[img]qimg/1/9.png[/img]\r\n[img]qimg/2/6.png[/img]\r\n[img]qimg/3/2.png[/img]\r\n[img]qimg/3/8.png[/img]\r\n[img]qimg/3/12.png[/img]\r\n[img]qimg/3/12.png[/img]\r\n[size=18]我爱你[/size][size=16]guanyue[/size][b]爱你的[/b]\r\n[i]wcy[/i][u]一直一直[/u]\r\n[img]moniimg/11.jpg[/img]\r\n[img]moniimg/19.jpg[/img]\r\n[img]moniimg/14.jpg[/img]\r\n[email]247652@qq.com[/email][url]http://www.NBA.com[/url]					', 18, 0, '2018-05-08 16:09:26', '2018-05-07 12:03:01'),
(18, 1, '周星驰', 16, 'RE:世界读书日-高尔基-书籍是人类进步的阶梯，所以我们要养成读书的习惯。', 'womqwbehwufnhergjrehgtrhjt', 1, 0, '0000-00-00 00:00:00', '2018-05-07 13:11:37'),
(19, 1, '周星驰', 16, 'RE:世界读书日-高尔基-书籍是人类进步的阶梯，所以我们要养成读书的习惯。', 'qdewgregtrh', 3, 0, '0000-00-00 00:00:00', '2018-05-07 13:12:17'),
(20, 1, '周星驰', 12, 'RE:2014巴西世界杯，巴西队四分之一决赛意外出局，有点失望。', '好可惜啊，巴西队尽然输了7：0.', 2, 0, '0000-00-00 00:00:00', '2018-05-07 13:17:40'),
(21, 2, '李嘉欣', 1, 'RE:2018俄罗斯世界杯，中国队未能出线，伤了13亿中国人的心，太失望了。', '中国足球又未能出线，可惜啊。[img]qimg/1/1.png[/img][img]qimg/1/6.png[/img]\n[img]moniimg/1.jpg[/img]\n[img]moniimg/8.jpg[/img]\n[img]moniimg/4.jpg[/img]\n[img]moniimg/11.jpg[/img]', 4, 0, '0000-00-00 00:00:00', '2018-05-07 17:43:18'),
(22, 5, '成龙', 9, 'RE:2016年杭州G20峰会，首次在除了北上广之外的城市举办。', '[size=18]马云的阿里巴巴[/size]和\n[size=14]饿了么外卖[/size]\n[img]moniimg/13.jpg[/img]\n[img]moniimg/16.jpg[/img]\n[img]moniimg/19.jpg[/img]\n[flash]http://www.youku.com.cn[/flash]\n[email]2345@qq.com[/email]\n[img]qimg/1/1.png[/img][img]qimg/1/6.png[/img]', 3, 0, '0000-00-00 00:00:00', '2018-05-07 17:48:14'),
(23, 9, '张国荣', 1, 'RE:80年代和90年代的香港电影伴随着我们90后的回忆。', '[img]qimg/1/2.png[/img]\r\n[img]qimg/1/9.png[/img]\r\n[img]qimg/1/12.png[/img]\r\n[img]qimg/1/15.png[/img]\r\n[img]qimg/2/6.png[/img]\r\n[img]moniimg/13.jpg[/img]\r\n[img]moniimg/15.jpg[/img]\r\n[img]moniimg/17.jpg[/img]\r\n[img]moniimg/19.jpg[/img]\r\n[i][size=18]张国荣[/size][/i]\r\n[u]抑郁而死[/u]', 2, 0, '0000-00-00 00:00:00', '2018-05-07 17:56:14'),
(24, 7, '周润发', 1, 'RE:2018世界经济博鳌论坛，中国经济持续上升，值得关注。', '[img]qimg/1/2.png[/img]\r\n[img]qimg/1/3.png[/img]\r\n[img]qimg/1/6.png[/img]\r\n[img]qimg/1/9.png[/img]\r\n\r\n[img]qimg/2/2.png[/img]\r\n[img]qimg/2/6.png[/img]\r\n我们坚决抵制美国的贸易战。', 2, 0, '0000-00-00 00:00:00', '2018-05-07 18:00:33'),
(25, 0, '成龙', 1, '1314520爱你一生一世', '[img]qimg/1/3.png[/img][img]qimg/1/6.png[/img][img]qimg/1/9.png[/img][img]qimg/1/12.png[/img]\r\n[img]moniimg/1.jpg[/img]\r\n[img]moniimg/3.jpg[/img]\r\n[img]moniimg/6.jpg[/img]\r\n[img]moniimg/7.jpg[/img]\r\n[img]moniimg/9.jpg[/img]', 7, 0, '0000-00-00 00:00:00', '2018-05-07 18:49:40'),
(26, 0, '成龙', 11, '1314520爱你一生一世', '[img]qimg/1/3.png[/img][img]qimg/1/6.png[/img][img]qimg/1/9.png[/img][img]qimg/1/12.png[/img]\r\n[img]moniimg/1.jpg[/img]\r\n[img]moniimg/3.jpg[/img]\r\n[img]moniimg/6.jpg[/img]\r\n[img]moniimg/7.jpg[/img]\r\n[img]moniimg/9.jpg[/img]', 7, 0, '0000-00-00 00:00:00', '2018-05-07 18:50:13'),
(27, 3, '成龙', 3, 'RE:2010南非世界杯，西班牙对最终赢得了大力神杯', '[b]中国队有没有静如世界杯。。。。。[/b][img]qimg/1/3.png[/img]\r\n[img]qimg/1/6.png[/img]\r\n[img]qimg/1/9.png[/img]\r\n[img]qimg/1/8.png[/img]\r\n[img]qimg/2/2.png[/img]\r\n[img]qimg/2/8.png[/img]\r\n[img]qimg/2/6.png[/img]\r\n[img]qimg/2/9.png[/img]\r\n[img]qimg/2/12.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-07 21:11:42'),
(28, 4, '成龙', 12, 'RE:2014巴西世界杯，巴西队四分之一决赛意外出局，有点失望。', '如果内马尔不受伤的话，巴西队不可能惨败德国队。\r\n[img]qimg/1/6.png[/img]\r\n\r\n[img]qimg/1/3.png[/img]\r\n[img]qimg/1/8.png[/img]\r\n[img]qimg/1/1.png[/img]\r\n[img]moniimg/1.jpg[/img]\r\n[img]moniimg/3.jpg[/img]\r\n[img]moniimg/5.jpg[/img]\r\n[img]moniimg/6.jpg[/img]\r\n[img]moniimg/9.jpg[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-07 21:13:19'),
(29, 4, '成龙', 12, 'RE:RE:2014巴西世界杯，巴西队四分之一决赛意外出局，有点失望。', '[img]qimg/1/2.png[/img][img]qimg/1/6.png[/img][img]qimg/1/9.png[/img][img]qimg/1/12.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-07 21:13:55'),
(30, 4, '成龙', 12, 'RE:RE:RE:2014巴西世界杯，巴西队四分之一决赛意外出局，有点失望。', '[b]\r\n曾经有一段真挚的爱情放在我面前，我没有珍惜，等到失去的时候才追悔莫及，人生最痛苦的事情莫过于此。如果上天能再给我一次机会，我一定会对那个女孩说我爱你，如果非要加上期限的话我希望是一万年。\r\n[/b]\r\n[img]moniimg/19.jpg[/img]\r\n[img]moniimg/18.jpg[/img]\r\n[img]moniimg/11.jpg[/img]\r\n[img]moniimg/15.jpg[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-07 21:15:19'),
(31, 8, '成龙', 1, 'RE:2018世界经济博鳌论坛三亚', '[img]qimg/1/5.png[/img][img]qimg/1/9.png[/img][img]qimg/1/12.png[/img][img]qimg/1/11.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-07 21:16:02'),
(32, 6, '成龙', 11, 'RE:今天天气很好，适合出去游玩，不能老是呆在宿舍不出去。', '[img]moniimg/19.jpg[/img]\r\n[img]moniimg/18.jpg[/img]\r\n[img]moniimg/3.jpg[/img]\r\n[img]moniimg/6.jpg[/img]\r\n[img]moniimg/9.jpg[/img]\r\n[img]moniimg/8.jpg[/img]\r\n[img]moniimg/11.jpg[/img]\r\n[img]moniimg/17.jpg[/img]\r\n[img]moniimg/5.jpg[/img]\r\n[img]moniimg/13.jpg[/img]\r\n[img]moniimg/4.jpg[/img]\r\n[img]moniimg/12.jpg[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-07 21:17:19'),
(33, 10, '成龙', 4, 'RE:大话西游影响了一代又一代的人，经典中的经典。', '[img]moniimg/19.jpg[/img]\r\n[img]moniimg/18.jpg[/img][img]moniimg/19.jpg[/img]\r\n[img]moniimg/18.jpg[/img][img]moniimg/19.jpg[/img]\r\n[img]moniimg/18.jpg[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-07 21:17:57'),
(34, 11, '成龙', 1, 'RE:测试功能', '[img]qimg/1/3.png[/img]\r\n[img]qimg/1/6.png[/img]\r\n[img]qimg/1/9.png[/img]\r\n[img]qimg/1/12.png[/img]\r\n[img]moniimg/19.jpg[/img]\r\n[img]moniimg/18.jpg[/img][img]moniimg/19.jpg[/img]\r\n[img]moniimg/18.jpg[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-07 21:18:29'),
(35, 3, '成龙', 3, 'RE:RE:2010南非世界杯，西班牙对最终赢得了大力神杯', '[img]moniimg/19.jpg[/img]\r\n[img]moniimg/18.jpg[/img][img]moniimg/19.jpg[/img]\r\n[img]moniimg/18.jpg[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-07 21:20:31'),
(36, 3, '成龙', 3, 'RE:RE:RE:2010南非世界杯，西班牙对最终赢得了大力神杯', '[img]moniimg/19.jpg[/img]\r\n[img]moniimg/18.jpg[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-07 21:21:01'),
(37, 26, '成龙', 11, 'RE:1314520爱你一生一世', '[img]moniimg/19.jpg[/img]\r\n[img]moniimg/18.jpg[/img]\r\n[img]moniimg/19.jpg[/img]\r\n[img]moniimg/18.jpg[/img]\r\n[img]moniimg/19.jpg[/img]\r\n[img]moniimg/18.jpg[/img][img]qimg/1/3.png[/img][img]qimg/1/6.png[/img][img]qimg/1/12.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-07 21:23:38'),
(38, 25, '成龙', 1, 'RE:1314520爱你一生一世', '[img]moniimg/19.jpg[/img]\r\n[img]moniimg/18.jpg[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-07 21:23:59'),
(39, 17, '成龙', 2, 'RE:你还好吗？这么久没有见面。不知道你过的怎么样?', '[img]moniimg/19.jpg[/img]\r\n[img]moniimg/18.jpg[/img]\r\n[img]moniimg/11.jpg[/img]\r\n[img]moniimg/12.jpg[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-07 21:26:16'),
(40, 16, '成龙', 5, 'RE:大话西游', '[img]moniimg/19.jpg[/img]\r\n[img]moniimg/18.jpg[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-07 21:26:43'),
(41, 15, '成龙', 1, 'RE:2017-13-14我爱你一生一世', '[img]moniimg/9.jpg[/img]\r\n[img]moniimg/8.jpg[/img]\r\n[img]moniimg/7.jpg[/img]\r\n[img]moniimg/6.jpg[/img]\r\n[img]qimg/2/3.png[/img]\r\n[img]qimg/2/6.png[/img]\r\n[img]qimg/2/9.png[/img]\r\n[img]qimg/2/12.png[/img]\r\n[img]qimg/3/2.png[/img]\r\n[img]qimg/3/3.png[/img]\r\n[img]qimg/3/9.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-07 21:27:29'),
(42, 14, '成龙', 1, 'RE:hello world', '[img]moniimg/19.jpg[/img]\r\n[img]moniimg/18.jpg[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-07 21:27:44'),
(43, 1, '成龙', 12, 'RE:RE:2014巴西世界杯，巴西队四分之一决赛意外出局，有点失望。', '[img]moniimg/19.jpg[/img]\r\n[img]moniimg/18.jpg[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-07 21:28:23'),
(44, 1, '成龙', 12, 'RE:RE:RE:2014巴西世界杯，巴西队四分之一决赛意外出局，有点失望。', '[img]moniimg/11.jpg[/img]\r\n[img]moniimg/12.jpg[/img]\r\n[img]moniimg/13.jpg[/img]\r\n[img]moniimg/14.jpg[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-07 21:28:50'),
(45, 1, '成龙', 12, 'RE:2014巴西世界杯，巴西队四分之一决赛意外出局，有点失望。', '[b][i][u]你最近还好吗？我好想你啊。[/u][/i][/b]\r\n[img]qimg/1/3.png[/img]\r\n[img]qimg/1/6.png[/img]\r\n[img]qimg/1/9.png[/img]\r\n[img]qimg/1/12.png[/img]\r\n[img]qimg/1/11.png[/img]\r\n[img]qimg/1/15.png[/img]\r\n[img]qimg/1/14.png[/img]\r\n[img]qimg/1/10.png[/img]\r\n[img]qimg/1/4.png[/img]\r\n[img]qimg/1/7.png[/img]\r\n[img]qimg/1/1.png[/img]\r\n[img]qimg/1/5.png[/img]\r\n[img]qimg/1/9.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-07 21:36:46'),
(46, 1, '成龙', 12, 'RE:2014巴西世界杯，巴西队四分之一决赛意外出局，有点失望。', '[b][i][u]你最近还好吗？我好想你啊。[/u][/i][/b]\r\n[img]qimg/1/3.png[/img]\r\n[img]qimg/1/6.png[/img]\r\n[img]qimg/1/9.png[/img]\r\n[img]qimg/1/12.png[/img]\r\n[img]qimg/1/11.png[/img]\r\n[img]qimg/1/15.png[/img]\r\n\r\n[img]qimg/1/5.png[/img]\r\n[img]qimg/1/9.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-07 21:37:20'),
(47, 1, '成龙', 12, 'RE:2014巴西世界杯，巴西队四分之一决赛意外出局，有点失望。', '[b][i][u]你最近还好吗？我好想你啊。[/u][/i][/b]\r\n[img]qimg/1/3.png[/img]\r\n[img]qimg/1/6.png[/img]\r\n[img]qimg/1/9.png[/img]\r\n\r\n[img]qimg/1/4.png[/img]\r\n[img]qimg/1/7.png[/img]\r\n[img]qimg/1/1.png[/img]\r\n[img]qimg/1/5.png[/img]\r\n[img]qimg/1/9.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-07 21:37:43'),
(48, 1, '李嘉欣', 12, 'RE:RE:2014巴西世界杯，巴西队四分之一决赛意外出局，有点失望。', '[img]moniimg/1.jpg[/img]\r\n[img]moniimg/3.jpg[/img]\r\n[img]moniimg/6.jpg[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-08 08:07:02'),
(49, 1, '李嘉欣', 12, 'RE:RE:RE:2014巴西世界杯，巴西队四分之一决赛意外出局，有点失望。', '[img]moniimg/1.jpg[/img]\r\n[img]moniimg/3.jpg[/img]\r\n[img]moniimg/5.jpg[/img]\r\n[img]qimg/1/2.png[/img][img]qimg/1/12.png[/img][img]qimg/1/11.png[/img][img]qimg/1/10.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-08 08:08:36'),
(50, 1, '李嘉欣', 12, 'RE:巴西队四分之一决赛意外出局，有点失望。', '[img]moniimg/3.jpg[/img]\r\n[img]moniimg/13.jpg[/img]\r\n[img]moniimg/17.jpg[/im', 0, 0, '0000-00-00 00:00:00', '2018-05-08 08:09:45'),
(51, 1, '李嘉欣', 12, 'RE:巴西队四分之一决赛意外出局，有点失望。', '[img]moniimg/6.jpg[/img]\r\n[img]moniimg/11.jpg[/img]\r\n[img]moniimg/7.jpg[/im', 0, 0, '0000-00-00 00:00:00', '2018-05-08 08:10:19'),
(52, 1, '李嘉欣', 12, 'RE:世界读书日-高尔基-书籍是人类进步的阶梯，所以我们要养成读书的习惯。', '[img]moniimg/3.jpg[/img]\r\n[img]moniimg/13.jpg[/img]\r\n[img]moniimg/17.jpg[/im', 0, 0, '0000-00-00 00:00:00', '2018-05-08 08:14:48'),
(53, 3, '李嘉欣', 3, 'RE:2010南非世界杯，西班牙对最终赢得了大力神杯', '[img]qimg/1/2.png[/img][img]qimg/1/11.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-08 08:25:35'),
(54, 1, '李嘉欣', 12, 'RE:世界读书日-高尔基-书籍是人类进步的阶梯，所以我们要养成读书的习惯。', '[img]qimg/2/3.png[/img]\r\n[img]qimg/2/6.png[/img]\r\n[img]qimg/2/9.png[/img]\r\n[img]qimg/2/12.png[/img]\r\n[img]qimg/2/8.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-08 08:32:15'),
(55, 1, '李嘉欣', 12, 'RE:世界读书日-高尔基-书籍是人类进步的阶梯，所以我们要养成读书的习惯。', '[img]qimg/1/1.png[/img][img]qimg/1/12.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-08 08:34:40'),
(56, 17, '李嘉欣', 2, 'RE:你还好吗？这么久没有见面。不知道你过的怎么样?', '[img]qimg/2/3.png[/img]\r\n[img]qimg/2/9.png[/img]\r\n[img]qimg/2/12.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-08 08:50:59'),
(57, 3, '李嘉欣', 3, 'RE:2010南非世界杯，西班牙对最终赢得了大力神杯', '[img]qimg/2/12.png[/img][img]qimg/2/12.png[/img][img]qimg/2/12.png[/img][img]qimg/2/12.png[/img][img]qimg/2/12.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-08 08:52:09'),
(58, 2, '李嘉欣', 1, 'RE:2018俄罗斯世界杯，中国队未能出线，伤了13亿中国人的心，太失望了。', '[img]qimg/1/3.png[/img][img]qimg/1/9.png[/img][img]qimg/1/12.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-08 09:01:23'),
(59, 4, '刘德华', 12, 'RE:2014巴西世界杯，巴西队四分之一决赛意外出局，有点失望。', '[img]qimg/1/3.png[/img][img]qimg/1/6.png[/img][img]qimg/1/9.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-08 09:02:39'),
(60, 1, '赵艺', 12, 'RE:世界读书日-高尔基-书籍是人类进步的阶梯，所以我们要养成读书的习惯。', '[b]你好吗[/b][img]qimg/1/6.png[/img][img]qimg/1/9.png[/img]\r\n[img]moniimg/14.jpg[/img]\r\n[img]moniimg/16.jpg[/img]\r\n[img]moniimg/18.jpg[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-08 13:25:34'),
(61, 1, '赵艺', 12, 'RE:世界读书日-高尔基-书籍是人类进步的阶梯，所以我们要养成读书的习惯。', '[img]moniimg/1.jpg[/img]\r\n[img]moniimg/3.jpg[/img]\r\n[img]moniimg/5.jpg[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-08 13:40:58'),
(62, 1, '赵艺', 12, 'RE:世界读书日-高尔基-书籍是人类进步的阶梯，所以我们要养成读书的习惯。', '[b]我是谁谁谁[/b][i]大家好[/i]\r\n[img]qimg/1/2.png[/img]\r\n[img]qimg/1/12.png[/img]\r\n[img]qimg/1/12.png[/img]\r\n[img]qimg/2/6.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-08 13:47:55'),
(63, 2, '赵艺', 1, 'RE:2018俄罗斯世界杯，中国队未能出线，伤了13亿中国人的心，太失望了。', '[img]qimg/1/3.png[/img][img]qimg/1/9.png[/img][img]qimg/1/7.png[/img][img]qimg/1/1.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-08 13:48:46'),
(64, 3, '赵艺', 3, 'RE:2010南非世界杯，西班牙对最终赢得了大力神杯', '[img]qimg/1/3.png[/img]\r\n[img]qimg/1/6.png[/img]\r\n[img]qimg/1/9.png[/img][img]qimg/1/12.png[/img][img]qimg/1/15.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-08 13:49:30'),
(65, 4, '赵艺', 12, 'RE:2014巴西世界杯，巴西队四分之一决赛意外出局，有点失望。', '[img]qimg/2/6.png[/img][img]qimg/2/9.png[/img][img]qimg/2/8.png[/img]\r\n[img]qimg/2/1.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-08 13:50:14'),
(66, 0, 'wangqiang', 2, '2018俄罗斯世界杯，中国队未能出线，伤了13亿中国人的心，太失望了。', '						[img]qimg/2/6.png[/img]曾经有一段真挚的爱情放在我面前，我没有珍惜，等到失去的时候才追悔莫及，人生最痛苦的事情莫过于此。如果上天能再给我一次机会，我一定会对那个女孩说我爱你，如果非要加上期限的话我希望是一万年。\r\n[img]qimg/1/7.png[/img]\r\n[img]qimg/2/11.png[/img]\r\n[img]qimg/3/4.png[/img]\r\n[size=14]你好[/size]\r\n[b]美女[/b]\r\n[color=yellow]mm[/color]\r\n[i]你真的[/i]\r\n[u]真的漂亮[/u]\r\n[img]face/17.jpg[/img]\r\n[img]face/11.jpg[/img]\r\n[url]http://www.mm.com[/url]\r\n[img]moniimg/2.jpg[/img]\r\n[img]moniimg/4.jpg[/img]\r\n[img]moniimg/6.jpg[/img]					', 1, 0, '0000-00-00 00:00:00', '2018-05-08 15:15:28'),
(67, 0, 'wangqiang', 2, '2018俄罗斯世界杯，中国队未能出线，伤了13亿中国人的心，太失望了。', '						[img]qimg/2/6.png[/img]曾经有一段真挚的爱情放在我面前，我没有珍惜，等到失去的时候才追悔莫及，人生最痛苦的事情莫过于此。如果上天能再给我一次机会，我一定会对那个女孩说我爱你，如果非要加上期限的话我希望是一万年。\r\n[img]qimg/1/7.png[/img]\r\n[img]qimg/2/11.png[/img]\r\n[img]qimg/3/4.png[/img]\r\n[size=14]你好[/size]\r\n[b]美女[/b]\r\n[color=yellow]mm[/color]\r\n[i]你真的[/i]\r\n[u]真的漂亮[/u]\r\n[img]face/17.jpg[/img]\r\n[img]face/11.jpg[/img]\r\n[url]http://www.mm.com[/url]\r\n[img]moniimg/2.jpg[/img]\r\n[img]moniimg/4.jpg[/img]\r\n[img]moniimg/6.jpg[/img]					', 1, 0, '0000-00-00 00:00:00', '2018-05-08 15:17:01'),
(68, 3, 'wangqiang', 3, 'RE:2010南非世界杯，西班牙对最终1:0荷兰，赢得了大力神杯', '[img]qimg/1/3.png[/img][img]qimg/1/6.png[/img][img]qimg/1/9.png[/img][img]qimg/1/12.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-08 16:10:49'),
(69, 1, 'wangqiang', 12, 'RE:世界读书日-高尔基-书籍是人类进步的阶梯，所以我们要养成读书的习惯。', '[img]qimg/1/3.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-08 17:20:20'),
(70, 2, '刘德华', 1, 'RE:今年的俄罗斯世界杯，中国队未能出线，伤了13亿中国人的心，太失望了。', '[img]qimg/1/3.png[/img][img]qimg/1/9.png[/img][img]qimg/1/1.png[/img][img]qimg/1/1.png[/img][img]qimg/1/1.png[/img][img]qimg/1/1.png[/img][img]qimg/1/1.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-08 18:43:12'),
(71, 1, '刘德华', 12, 'RE:世界读书日-高尔基-书籍是人类进步的阶梯，所以我们要养成读书的习惯。', '[img]qimg/1/6.png[/img][img]qimg/1/6.png[/img][img]qimg/1/6.png[/img][img]qimg/1/6.png[/img][img]qimg/1/6.png[/img][img]qimg/1/6.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-08 18:57:25'),
(72, 1, '刘德华', 12, 'RE:世界读书日-高尔基-书籍是人类进步的阶梯，所以我们要养成读书的习惯。', '楼主说的对，我们确实要多读书。', 0, 0, '0000-00-00 00:00:00', '2018-05-08 19:09:48'),
(73, 1, '刘德华', 12, 'RE:世界读书日-高尔基-书籍是人类进步的阶梯，所以我们要养成读书的习惯。', '[img]qimg/1/6.png[/img][img]qimg/1/6.png[/img][img]qimg/1/6.png[/img][img]qimg/1/6.png[/img][img]qimg/1/6.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-08 19:10:25'),
(74, 1, '刘德华', 12, 'RE:世界读书日-高尔基-书籍是人类进步的阶梯，所以我们要养成读书的习惯。', '[img]qimg/3/2.png[/img][img]qimg/3/2.png[/img][img]qimg/3/2.png[/img][img]qimg/3/2.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-08 19:30:04'),
(75, 1, '刘德华', 12, 'RE:世界读书日-高尔基-书籍是人类进步的阶梯，所以我们要养成读书的习惯。', '你说的话很有道理[img]qimg/1/3.png[/img][img]qimg/1/3.png[/img][img]qimg/1/3.png[/img][img]qimg/1/3.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-08 19:31:58'),
(77, 2, 'wangqiang', 1, 'RE:今年的俄罗斯世界杯，中国队未能出线，伤了13亿中国人的心，太失望了。', '[img]qimg/1/1.png[/img][img]qimg/1/1.png[/img][img]qimg/1/1.png[/img][img]qimg/1/1.png[/img][img]qimg/1/1.png[/img][img]qimg/1/1.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-08 19:36:58'),
(78, 2, 'wangqiang', 1, 'RE:今年的俄罗斯世界杯，中国队未能出线，伤了13亿中国人的心，太失望了。', '曾经有一段真挚的爱情放在我面前，我没有珍惜，等到失去的时候才追悔莫及，人生最痛苦的事情莫过于此。如果上天能再给我一次机会，我一定会对那个女孩说我爱你，如果非要加上期限的话我希望是一万年。', 0, 0, '0000-00-00 00:00:00', '2018-05-08 19:37:38'),
(79, 2, 'wangqiang', 1, 'RE:今年的俄罗斯世界杯，中国队未能出线，伤了13亿中国人的心，太失望了。', '曾经有一段真挚的爱情放在我面前，我没有珍惜，等到失去的时候才追悔莫及，人生最痛苦的事情莫过于此。如果上天能再给我一次机会，我一定会对那个女孩说我爱你，如果非要加上期限的话我希望是一万年。\r\n曾经有一段真挚的爱情放在我面前，我没有珍惜，等到失去的时候才追悔莫及，人生最痛苦的事情莫过于此。如果上天能再给我一次机会，我一定会对那个女孩说我爱你，如果非要加上期限的话我希望是一万年。\r\n曾经有一段真挚的爱情放在我面前，我没有珍惜，等到失去的时候才追悔莫及，人生最痛苦的事情莫过于此。如果上天能再给我一次机会，我一定会对那个女孩说我爱你，如果非要加上期限的话我希望是一万年。', 0, 0, '0000-00-00 00:00:00', '2018-05-08 19:38:08'),
(80, 0, 'jack', 14, '今年的欧冠决赛，皇马是否能够史无前例的赢得3连贯', '[img]qimg/1/2.png[/img][img]qimg/1/2.png[/img][img]qimg/1/2.png[/img][img]qimg/1/2.png[/img]', 2, 0, '0000-00-00 00:00:00', '2018-05-09 15:15:35'),
(81, 0, 'jack', 1, 'how are you', '[img]qimg/1/2.png[/img][img]qimg/1/2.png[/img][img]qimg/1/2.png[/img][img]qimg/1/2.png[/img]', 10, 1, '0000-00-00 00:00:00', '2018-05-09 15:18:56'),
(82, 81, 'jack', 1, 'RE:how are you', '[img]qimg/1/3.png[/img][img]qimg/1/6.png[/img][img]qimg/1/9.png[/img][img]qimg/1/12.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-09 15:22:03'),
(83, 0, 'jack', 2, '你好吗', '[img]qimg/1/9.png[/img][img]qimg/1/12.png[/img]', 1, 0, '0000-00-00 00:00:00', '2018-05-09 15:23:52'),
(84, 0, '刘德华', 1, '我是刘德华', '[img]qimg/2/5.png[/img][img]qimg/2/5.png[/img][img]qimg/2/6.png[/img][img]qimg/2/8.png[/img]', 2, 0, '0000-00-00 00:00:00', '2018-05-09 15:25:06'),
(85, 1, '刘德华', 12, 'RE:世界读书日-高尔基-书籍是人类进步的阶梯，所以我们要养成读书的习惯。', '[img]qimg/1/2.png[/img][img]qimg/1/3.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-09 15:27:45'),
(86, 0, 'wangqiang', 1, '你好吗，我很好。', '[img]qimg/1/2.png[/img][img]qimg/1/3.png[/img][img]qimg/1/9.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-09 15:31:37'),
(87, 0, 'wangqiang', 2, 'nihaishui', '[img]qimg/1/2.png[/img][img]qimg/1/5.png[/img][img]qimg/1/6.png[/img]', 3, 0, '0000-00-00 00:00:00', '2018-05-09 15:33:20'),
(88, 0, 'wangqiang', 1, '1234567890', '[img]qimg/3/2.png[/img][img]qimg/3/2.png[/img][img]qimg/3/2.png[/img][img]qimg/3/2.png[/img][img]qimg/3/2.png[/img][img]qimg/3/2.png[/img][img]qimg/3/2.png[/img]', 1, 0, '0000-00-00 00:00:00', '2018-05-09 15:35:26'),
(89, 0, 'wangqiang', 1, 'hell0 world 你好', '[img]qimg/1/1.png[/img][img]qimg/1/3.png[/img][img]qimg/1/9.png[/img]', 1, 0, '0000-00-00 00:00:00', '2018-05-09 16:56:49'),
(91, 0, '刘德华', 0, 'RE:东京下的唯美雪景', '[b]好美啊，[i]真想去[/i][u]好好看一看[/u][/b]\r\n[img]qimg/2/14.png[/img]\r\n[img]qimg/3/2.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-11 17:42:26'),
(92, 0, '刘德华', 0, 'RE:东京下的唯美雪景', '[b]好美啊，[i]真想去[/i][u]好好看一看[/u][/b]\r\n[img]qimg/2/14.png[/img]\r\n[img]qimg/3/2.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-11 17:45:19'),
(93, 0, '刘德华', 0, 'RE:东京下的唯美雪景', '[b]真的好美啊[/b]\r\n[i]好想和你一起去看一看[/i]\r\n[u]你愿意吗[/u]\r\n[img]qimg/3/2.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-11 17:48:12'),
(94, 0, '刘德华', 0, 'RE:东京下的唯美雪景', '[b]真的好美啊[/b]\r\n[i]好想和你一起去看一看[/i]\r\n[u]你愿意吗[/u]\r\n[img]qimg/3/2.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-11 17:49:46'),
(95, 0, '刘德华', 0, 'RE:东京下的唯美雪景', '[b]真的好美啊[/b]\r\n[i]好想和你一起去看一看[/i]\r\n[u]你愿意吗[/u]\r\n[img]qimg/3/2.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-11 17:53:42'),
(96, 0, '刘德华', 0, 'RE:东京下的唯美雪景', '[b]真的好美啊[/b]\r\n[i]好想和你一起去看一看[/i]\r\n[u]你愿意吗[/u]\r\n[img]qimg/3/2.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-11 17:54:57'),
(97, 0, '刘德华', 0, 'RE:东京下的唯美雪景', '[b]真的好美啊[/b]\r\n[i]好想和你一起去看一看[/i]\r\n[u]你愿意吗[/u]\r\n[img]qimg/3/2.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-11 17:55:26'),
(98, 0, '刘德华', 0, 'RE:东京下的唯美雪景', '[b]真的好美啊[/b]\r\n[i]好想和你一起去看一看[/i]\r\n[u]你愿意吗[/u]\r\n[img]qimg/3/2.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-11 17:57:59'),
(99, 0, '刘德华', 0, 'RE:东京下的唯美雪景', '[b]真的好美啊[/b]\r\n[i]好想和你一起去看一看[/i]\r\n[u]你愿意吗[/u]\r\n[img]qimg/3/2.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-11 17:59:11'),
(100, 0, '刘德华', 0, 'RE:东京下的唯美雪景', '[b]真的好美啊[/b]\r\n[i]好想和你一起去看一看[/i]\r\n[u]你愿意吗[/u]\r\n[img]qimg/3/2.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-05-11 18:06:03'),
(101, 0, '刘德华', 1, '大家好，我是刘德华。', '[b]大家好，我是刘德华。[/b]\r\n[img]qimg/2/2.png[/img][img]qimg/2/3.png[/img]', 1, 0, '0000-00-00 00:00:00', '2018-05-12 17:20:15'),
(102, 1, '刘德华', 12, 'RE:世界读书日---高尔基-书籍是人类进步的阶梯，所以我们要养成读书的好习惯。', 'RE:世界读书日---高尔基-书籍是人类进步的阶梯，所以我们要养成读书的好习惯。', 0, 0, '0000-00-00 00:00:00', '2018-05-12 17:21:51'),
(103, 1, '刘德华', 12, 'RE:世界读书日---高尔基-书籍是人类进步的阶梯，所以我们要养成读书的好习惯。', 'RE:世界读书日---高尔基-书籍是人类进步的阶梯，所以我们要养成读书的好习惯。', 0, 0, '0000-00-00 00:00:00', '2018-05-12 17:22:07'),
(104, 0, '刘德华', 13, 'RE:世界读书日---高尔基-书籍是人类进步的阶梯，所以我们要养成读书的好习惯。', 'RE:世界读书日---高尔基-书籍是人类进步的阶梯，所以我们要养成读书的好习惯。', 2, 0, '0000-00-00 00:00:00', '2018-05-12 17:25:27'),
(105, 0, '刘德华', 1, '11111111111111', '11111111111111111111111111', 1, 0, '0000-00-00 00:00:00', '2018-05-23 12:14:08'),
(106, 1, '刘德华', 12, 'RE:世界读书日---高尔基-书籍是人类进步的阶梯，所以我们要养成读书的好习惯。', '[img]qimg/2/2.png[/img][img]qimg/2/8.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-06-15 06:46:36'),
(107, 1, '刘德华', 12, 'RE:世界读书日---高尔基-书籍是人类进步的阶梯，所以我们要养成读书的好习惯。', '[b]hello world[/b]', 0, 0, '0000-00-00 00:00:00', '2018-06-15 06:47:26'),
(108, 1, '刘德华', 12, 'RE:世界读书日---高尔基-书籍是人类进步的阶梯，所以我们要养成读书的好习惯。', '[img]qimg/1/5.png[/img][img]qimg/1/12.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-06-15 08:05:34'),
(109, 1, '刘德华', 12, 'RE:世界读书日---高尔基-书籍是人类进步的阶梯，所以我们要养成读书的好习惯。', '[img]qimg/1/5.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-06-15 08:43:50'),
(110, 1, '刘德华', 12, 'RE:世界读书日---高尔基-书籍是人类进步的阶梯，所以我们要养成读书的好习惯。', '你说得对，横有道理。很不错。', 0, 0, '0000-00-00 00:00:00', '2018-09-01 10:30:17'),
(111, 2, '刘德华', 1, 'RE:今年的俄罗斯世界杯，中国队未能出线，伤了13亿中国人的心，太失望了。', '最终法国依靠姆巴佩和格里兹曼的稳定发挥赢得了克罗地亚获得国家第二座大力神杯', 0, 0, '0000-00-00 00:00:00', '2018-09-01 10:31:36'),
(112, 2, '刘德华', 1, 'RE:今年的俄罗斯世界杯，中国队未能出线，伤了13亿中国人的心，太失望了。', '[img]qimg/1/4.png[/img][img]qimg/1/5.png[/img][img]qimg/1/9.png[/img]', 0, 0, '0000-00-00 00:00:00', '2018-09-01 10:32:11');

-- --------------------------------------------------------

--
-- 表的结构 `tg_dir`
--

CREATE TABLE IF NOT EXISTS `tg_dir` (
  `tg_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `tg_name` varchar(20) NOT NULL COMMENT '//相册名',
  `tg_type` tinyint(1) unsigned NOT NULL,
  `tg_password` char(40) DEFAULT NULL,
  `tg_content` varchar(200) DEFAULT NULL,
  `tg_face` varchar(200) DEFAULT NULL COMMENT '//相册封面',
  `tg_dir` varchar(200) NOT NULL,
  `tg_date` datetime NOT NULL,
  PRIMARY KEY (`tg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `tg_dir`
--

INSERT INTO `tg_dir` (`tg_id`, `tg_name`, `tg_type`, `tg_password`, `tg_content`, `tg_face`, `tg_dir`, `tg_date`) VALUES
(15, '海滩上的夕阳', 1, '7c4a8d09ca3762af61e59520943dc26494f8941b', '海滩上的夕阳', 'moniimg/4.jpg', 'photo/1525943686', '2018-05-10 17:14:46'),
(14, '放学后的女孩', 0, NULL, '放学后的女孩', 'moniimg/2.jpg', 'photo/1525943481', '2018-05-10 17:11:21');

-- --------------------------------------------------------

--
-- 表的结构 `tg_flower`
--

CREATE TABLE IF NOT EXISTS `tg_flower` (
  `tg_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `tg_touser` varchar(20) NOT NULL COMMENT '//收花者',
  `tg_from_touser` varchar(20) NOT NULL COMMENT '//送花者',
  `tg_flowers` tinyint(4) NOT NULL COMMENT '//送花数目',
  `tg_content` varchar(200) NOT NULL COMMENT '//送花感言',
  `tg_time` datetime NOT NULL,
  PRIMARY KEY (`tg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `tg_flower`
--

INSERT INTO `tg_flower` (`tg_id`, `tg_touser`, `tg_from_touser`, `tg_flowers`, `tg_content`, `tg_time`) VALUES
(1, 'bbb', 'aaa', 10, '灰常的的欣赏你，送你花喽~~~', '2018-05-04 23:35:54'),
(2, 'aaa', 'ccc', 99, '灰常的的欣赏你，送你花喽~~~', '2018-05-04 23:41:19'),
(3, 'ccc', 'bbb', 0, '灰常的的欣赏你，送你花喽~~~', '2018-05-04 23:41:52'),
(4, 'ddd', 'eee', 99, '灰常的的欣赏你，送你花喽~~~', '2018-05-04 23:45:57'),
(5, 'eee', 'ddd', 0, '灰常的的欣赏你，送你花喽~~~', '2018-05-04 23:47:05'),
(6, 'fff', 'ggg', 11, '灰常的的欣赏你，送你花喽~~~', '2018-05-04 23:48:14');

-- --------------------------------------------------------

--
-- 表的结构 `tg_friend`
--

CREATE TABLE IF NOT EXISTS `tg_friend` (
  `tg_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `tg_touser` varchar(20) NOT NULL,
  `tg_from_touser` varchar(20) NOT NULL,
  `tg_content` varchar(200) NOT NULL,
  `tg_state` tinyint(1) NOT NULL DEFAULT '0',
  `tg_time` datetime NOT NULL,
  PRIMARY KEY (`tg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- 转存表中的数据 `tg_friend`
--

INSERT INTO `tg_friend` (`tg_id`, `tg_touser`, `tg_from_touser`, `tg_content`, `tg_state`, `tg_time`) VALUES
(5, '利智', '李连杰', '认识若只如初见，何事秋风悲画扇。', 1, '2018-05-04 18:59:35'),
(6, '王祖贤', '秦汉', '认识若只如初见，何事秋风悲画扇。', 1, '2018-05-04 18:59:53'),
(17, '谢霆锋', '张伯芝', '认识若只如初见，何事秋风悲画扇。', 1, '2018-05-04 21:21:03'),
(18, '梅艳芳', '张国荣', '认识若只如初见，何事秋风悲画扇。', 1, '2018-05-04 21:22:30'),
(21, '莫文蔚', '周星驰', '认识若只如初见，何事秋风悲画扇。', 1, '2018-05-04 21:24:41'),
(22, '罗家英', '吴镇伟', '认识若只如初见，何事秋风悲画扇。', 1, '2018-05-04 21:24:53'),
(27, '凯特温斯莱特', '莱昂纳多', '认识若只如初见，何事秋风悲画扇。', 1, '2018-05-05 17:25:17'),
(32, '', '成龙', '认识若只如初见，何事秋风悲画扇。', 1, '2018-05-07 21:30:49');

-- --------------------------------------------------------

--
-- 表的结构 `tg_message`
--

CREATE TABLE IF NOT EXISTS `tg_message` (
  `tg_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `tg_touser` varchar(20) NOT NULL COMMENT '//收件人',
  `tg_from_touser` varchar(20) NOT NULL COMMENT '//发件人',
  `tg_content` varchar(200) NOT NULL COMMENT '//发信内容',
  `tg_state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '//短信状态',
  `tg_time` datetime NOT NULL,
  PRIMARY KEY (`tg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=68 ;

--
-- 转存表中的数据 `tg_message`
--

INSERT INTO `tg_message` (`tg_id`, `tg_touser`, `tg_from_touser`, `tg_content`, `tg_state`, `tg_time`) VALUES
(57, '科比', '莱昂纳多', '20年的湖人生涯，足够伟大。你就是我们这个年代的乔丹。', 1, '2018-05-05 17:26:22'),
(38, '刘德华', '李嘉欣', '你那忧郁的眼神，曾经让多少人为之迷恋。', 1, '2018-05-03 23:22:01'),
(39, 'wangqiang1996921', '刘德华', '你留下了一部又一部的经典电影，正如电影里的那样，快50多岁的你，岁月没有在你的身上留下一丝痕迹。', 1, '2018-05-04 06:59:12'),
(40, '赵3', '赵艺', '曾经的你是那么的帅，看看现在的自己是否很迷茫呢。最美不过初相见。', 1, '2018-05-04 06:59:24'),
(42, '赵艺3', '邱淑贞', '曾经的你是那么的帅，看看现在的自己是否很迷茫呢。最美不过初相见。', 1, '2018-05-04 06:59:53'),
(43, '刘德华', '赵艺', '曾经的你是那么的帅，看看现在的自己是否很迷茫呢。最美不过初相见。', 1, '2018-05-04 07:00:04'),
(53, '张国荣', '周星驰', '人生若只如相见，何事秋风悲画扇。', 1, '2018-05-04 21:26:42'),
(45, '赵艺', '张伯芝', '曾经的你是那么的帅，看看现在的自己是否很迷茫呢。最美不过初相见。', 1, '2018-05-04 07:00:30'),
(56, '', '周星驰', '灰常的的欣赏你，送你花喽~~~', 1, '2018-05-04 23:30:13');

-- --------------------------------------------------------

--
-- 表的结构 `tg_photo`
--

CREATE TABLE IF NOT EXISTS `tg_photo` (
  `tg_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `tg_name` varchar(20) NOT NULL,
  `tg_url` varchar(200) NOT NULL,
  `tg_content` varchar(200) DEFAULT NULL,
  `tg_sid` mediumint(8) unsigned NOT NULL,
  `tg_username` varchar(20) NOT NULL DEFAULT '刘德华',
  `tg_readcount` smallint(5) NOT NULL DEFAULT '0',
  `tg_commendcount` smallint(5) NOT NULL DEFAULT '0',
  `tg_date` datetime NOT NULL,
  PRIMARY KEY (`tg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- 转存表中的数据 `tg_photo`
--

INSERT INTO `tg_photo` (`tg_id`, `tg_name`, `tg_url`, `tg_content`, `tg_sid`, `tg_username`, `tg_readcount`, `tg_commendcount`, `tg_date`) VALUES
(1, '唯美意境图', 'photo/1525943481/1525948998.jpg', '唯美意境图', 14, '', 7, 3, '2018-05-10 18:43:23'),
(13, '雾里云山', 'photo/1525943481/1526015682.jpg', '雾里云山', 14, 'wangqiang', 8, 4, '2018-05-11 13:14:55'),
(5, '跳跃的女孩', 'photo/1525943481/1525949474.jpg', '跳跃的女孩', 14, '', 10, 6, '2018-05-10 18:51:52'),
(6, '幽蓝色玫瑰花', 'photo/1525943481/1525958269.jpg', '幽蓝色玫瑰花', 14, '', 10, 7, '2018-05-10 21:18:13'),
(7, '湖畔樱花', 'photo/1525943686/1525958485.jpg', '湖畔樱花', 15, '', 18, 9, '2018-05-10 21:22:33'),
(14, '夕阳下的情侣', 'photo/1525943481/1526015788.jpg', '夕阳下的情侣', 14, 'wangqiang', 17, 11, '2018-05-11 13:16:48'),
(18, '仰望蔚蓝的天空', 'photo/1525943686/1526016026.jpg', '仰望蔚蓝的天空', 15, 'wangqiang', 27, 1, '2018-05-11 13:20:39'),
(20, '唯美的夕阳倒影', 'photo/1525943686/1526016110.jpg', '唯美的夕阳倒影', 15, 'wangqiang', 21, 59, '2018-05-11 13:22:04'),
(21, '湖畔下的樱花', 'photo/1525943686/1526016147.jpg', '湖畔下的樱花', 15, 'wangqiang', 84, 56, '2018-05-11 13:22:43'),
(23, '北方的雪景', 'photo/1525943481/1526016569.jpg', '北方的雪景', 14, '刘德华', 108, 521, '2018-05-11 13:29:42'),
(24, '阳光下美女的身影', 'photo/1525943481/1526021944.jpg', '阳光下美女的身影', 14, '刘德华', 62, 89, '2018-05-11 15:00:08'),
(25, '幽蓝色的玫瑰花', 'photo/1525943686/1526022083.jpg', '幽蓝色玫瑰花', 15, '刘德华', 54, 20, '2018-05-11 15:01:51'),
(26, '花丛中的女神', 'photo/1525943481/1526030564.jpg', '花丛中的女神', 14, '李嘉欣', 34, 4, '2018-05-11 17:22:58'),
(27, '梦幻唯美雪景', 'photo/1525943686/1526030623.jpg', '梦幻唯美雪景', 15, '李嘉欣', 43, 4, '2018-05-11 17:24:00'),
(30, '花丛中的可爱女孩', 'photo/1525943481/1526030882.jpg', '花丛中的可爱女孩', 14, '周星驰', 78, 6, '2018-05-11 17:28:31'),
(31, '经典电影中的场景', 'photo/1525943686/1526030969.jpg', '经典电影中的场景', 15, '周星驰', 63, 4, '2018-05-11 17:29:45'),
(32, '梦幻意境', 'photo/1525943481/1526038326.jpg', '梦幻意境', 14, '刘德华', 23, 4, '2018-05-11 19:32:20');

-- --------------------------------------------------------

--
-- 表的结构 `tg_photo_commend`
--

CREATE TABLE IF NOT EXISTS `tg_photo_commend` (
  `tg_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `tg_title` varchar(200) NOT NULL COMMENT '//评论标题',
  `tg_content` text NOT NULL COMMENT '//评论内容',
  `tg_sid` mediumint(8) unsigned NOT NULL COMMENT '//图片id',
  `tg_username` varchar(20) NOT NULL COMMENT '//评论者',
  `tg_date` datetime NOT NULL COMMENT '//评论时间',
  PRIMARY KEY (`tg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

--
-- 转存表中的数据 `tg_photo_commend`
--

INSERT INTO `tg_photo_commend` (`tg_id`, `tg_title`, `tg_content`, `tg_sid`, `tg_username`, `tg_date`) VALUES
(1, 'RE:蔚蓝天空下的花丛', '蔚蓝天空下的花丛,真的好美啊。', 28, '刘德华', '2018-05-11 18:16:32'),
(2, 'RE:东京下的唯美雪景', '[b]蔚蓝天空下的花丛,真的好美啊，我想和你一去[u]看一看[/u][/b]，[i]你愿意吗[/i]', 29, '刘德华', '2018-05-11 18:18:58'),
(3, 'RE:梦幻唯美雪景', '[b]东京唯美雪景,真的好美啊，我想和你一去[u]看一看[/u][/b]，[i]你愿意吗[/i]', 27, '刘德华', '2018-05-11 18:20:28'),
(4, 'RE:经典电影中的场景', '经典电影中的场景，仿佛在我身上经历过。', 31, '刘德华', '2018-05-11 18:23:24'),
(5, 'RE:湖畔下的樱花', '[b]湖畔下的樱花,真的好美啊，我想和你一去[u]看一看[/u][/b]，[i]你愿意吗[/i]', 21, '刘德华', '2018-05-11 18:24:44'),
(6, 'RE:花丛中的女神', '[b]花丛中的女神,真的好美啊，我想和你一去[u]看一看[/u][/b]，[i]你愿意吗[/i]\r\n[img]moniimg/1.jpg[/img]', 26, '刘德华', '2018-05-11 18:25:56'),
(7, 'RE:花丛中的可爱女孩', '花丛中的可爱女孩,真的好美啊。', 30, '刘德华', '2018-05-11 18:26:42'),
(8, 'RE:花丛中的可爱女孩', '花丛中的可爱女孩，真的好美啊。', 30, '刘德华', '2018-05-11 19:11:03'),
(9, 'RE:花丛中的可爱女孩', '\r\n[img]qimg/1/2.png[/img]\r\n[b]花丛中的可爱女孩，真的好美啊。[/b]\r\n[i]你觉得对吗[/i]', 30, '刘德华', '2018-05-11 19:12:10'),
(10, 'RE:花丛中的可爱女孩', '[u]花丛中的可爱女孩，能和你成为朋友吗。[/u]\r\n[img]qimg/2/6.png[/img]\r\n[img]qimg/3/2.png[/img]\r\n', 30, '刘德华', '2018-05-11 19:16:40'),
(11, 'RE:花丛中的可爱女孩', '花丛中的可爱女孩，你好吗。', 30, '刘德华', '2018-05-11 19:23:42'),
(12, 'RE:花丛中的女神', '\r\n[u]花丛中的女神 你好吗,你真的好美啊，我想和你一去看一看，你愿意吗？[/u][img]qimg/3/2.png[/img]', 26, '刘德华', '2018-05-11 19:24:51'),
(13, 'RE:阳光下美女的身影', '阳光下美女的身影,好飘然的感觉。\r\n[img]qimg/3/2.png[/img]', 24, '刘德华', '2018-05-11 19:29:17'),
(14, 'RE:梦幻唯美雪景', '东京唯美雪景,真的好美啊，我想和你一去看一看，你愿意吗', 27, '刘德华', '2018-05-11 19:30:01'),
(15, 'RE:幽蓝色的玫瑰花', '幽蓝色玫瑰花幽蓝色玫瑰花', 25, '刘德华', '2018-05-11 19:30:29'),
(16, 'RE:大海边情侣的拥抱', '大海边情侣的拥抱,真的好有感觉啊。', 22, '刘德华', '2018-05-11 19:31:38'),
(17, 'RE:梦幻意境', '梦幻意境梦幻意境梦幻意境', 32, '刘德华', '2018-05-11 19:32:52'),
(18, 'RE:唯美意境图', '唯美意境图唯美意境图', 1, '刘德华', '2018-05-11 19:33:38'),
(19, 'RE:跳跃的女孩', '跳跃的女孩跳跃的女孩跳跃的女孩[img]qimg/2/6.png[/img]', 5, '刘德华', '2018-05-11 19:34:09'),
(20, 'RE:幽蓝色玫瑰花', '幽蓝色玫瑰花幽蓝色玫瑰花', 6, '刘德华', '2018-05-11 19:34:33'),
(21, 'RE:雾里云山', '雾里云山雾里云山雾里云山', 13, '刘德华', '2018-05-11 19:34:53'),
(22, 'RE:夕阳下的情侣', '夕阳下的情侣夕阳下的情侣夕阳下的情侣', 14, '刘德华', '2018-05-11 19:35:14'),
(23, 'RE:沙滩上的女孩', '仰望蔚蓝的天空仰望蔚蓝的天空', 19, '刘德华', '2018-05-11 19:35:48'),
(24, 'RE:北方的雪景', '北方的雪景北方的雪景', 23, '刘德华', '2018-05-11 19:36:14'),
(25, 'RE:唯美的夕阳倒影', '唯美的夕阳倒影唯美的夕阳倒影', 20, '刘德华', '2018-05-11 19:38:43'),
(26, 'RE:唯美的夕阳倒影', '唯美的夕阳倒影唯美的夕阳倒影唯美的夕阳倒影', 20, '刘德华', '2018-05-11 19:39:05'),
(27, 'RE:仰望蔚蓝的天空', '仰望蔚蓝的天空仰望蔚蓝的天空', 18, '刘德华', '2018-05-11 19:39:39'),
(28, 'RE:湖畔樱花', '仰望蔚蓝的天空湖畔樱花仰望蔚蓝的天空', 7, '刘德华', '2018-05-11 19:40:10'),
(29, 'RE:放学后的女孩', '放学后的女孩放学后的女孩', 17, '刘德华', '2018-05-11 19:40:56'),
(30, 'RE:跳跃的女孩', '放学后的女孩跳跃的女孩', 16, '刘德华', '2018-05-11 19:41:23'),
(31, 'RE:富士山下的樱花', '富士山下的樱花富士山下的樱花', 15, '刘德华', '2018-05-11 19:41:49'),
(32, 'RE:倒影', '富士山下的樱花富士山下的樱花', 12, '刘德华', '2018-05-11 19:42:11'),
(33, 'RE:风景图之夕阳中的情侣', '富士山下的樱花风景图之夕阳中的情侣', 4, '刘德华', '2018-05-11 19:42:44'),
(34, 'RE:风景图之夕阳中的情侣', '风景图之夕阳中的情侣风景图之夕阳中的情侣', 4, '刘德华', '2018-05-11 19:43:35'),
(35, 'RE:唯美的夕阳倒影', '风景图之夕阳中的情侣风景图之夕阳中的情侣', 20, '刘德华', '2018-05-11 19:44:02'),
(36, 'RE:经典电影中的场景', '风景图之夕阳中的情侣风景图之夕阳中的情侣', 31, '刘德华', '2018-05-11 19:44:24'),
(37, 'RE:湖畔樱花', '风景图之夕阳中的情侣风景图之夕阳中的情侣', 7, '刘德华', '2018-05-11 19:44:59'),
(38, 'RE:梦幻意境', '风景图之夕阳中的情侣风景图之夕阳中的情侣', 32, '刘德华', '2018-05-11 19:45:29'),
(39, 'RE:东京下的唯美雪景', '蔚蓝天空下的花丛,真的好美啊，我想和你一去看一看，你愿意吗', 29, '赵艺', '2018-05-11 19:47:24'),
(40, 'RE:唯美意境图', '蔚蓝天空下的花丛,真的好美啊，我想和你一去看一看，你愿意吗', 1, '赵艺', '2018-05-11 19:49:21'),
(41, 'RE:梦幻意境', '蔚蓝天空下的花丛,真的好美啊，我想和你一去看一看，你愿意吗', 32, '赵艺', '2018-05-11 19:52:30'),
(42, 'RE:经典电影中的场景', '蔚蓝天空下的花丛,真的好美啊，我想和你一去看一看，你愿意吗', 31, '赵艺', '2018-05-11 19:52:53'),
(43, 'RE:花丛中的可爱女孩', '蔚蓝天空下的花丛,真的好美啊，我想和你一去看一看，你愿意吗', 30, '赵艺', '2018-05-11 19:53:36'),
(44, 'RE:经典电影中的场景', '蔚蓝天空下的花丛,真的好美啊，我想和你一去看一看，你愿意吗\r\n', 31, '刘德华', '2018-05-11 20:23:12'),
(45, 'RE:跳跃的女孩', '放学后的女孩跳跃的女孩\r\n', 16, '刘德华', '2018-05-11 20:34:04'),
(46, 'RE:东京下的唯美雪景', '蔚蓝天空下的花丛,真的好美啊，我想和你一去看一看，你愿意吗\r\n[img]qimg/3/2.png[/img]', 29, '刘德华', '2018-05-11 21:08:37'),
(47, 'RE:梦幻意境', '蔚蓝天空下的花丛,真的好美啊，我想和你一去看一看，你愿意吗\r\n[img]qimg/3/2.png[/img]', 32, '刘德华', '2018-05-11 22:29:40'),
(48, 'RE:梦幻唯美雪景', '东京唯美雪景,真的好美啊，我想和你一去看一看，你愿意吗', 27, '刘德华', '2018-05-11 22:51:36'),
(49, 'RE:花丛中的女神', '东京唯美雪景,真的好美啊，我想和你一去看一看，你愿意吗', 26, '刘德华', '2018-05-11 22:52:05'),
(50, 'RE:花丛中的女神', '东京唯美雪景,真的好美啊，我想和你一去看一看，你愿意吗[i]东京唯美雪景,真的好美啊，我想和你一去看一看，你愿意吗[/i]\r\n[img]qimg/3/2.png[/img]', 26, '刘德华', '2018-05-12 08:11:44'),
(51, 'RE:湖畔边美女的倒影', '湖畔边美女的倒影湖畔边美女的倒影[img]qimg/3/2.png[/img]', 34, '刘德华', '2018-05-12 08:29:50'),
(52, 'RE:夕阳下的情侣真的好有意境啊', '夕阳下的情侣真的好有意境啊[i]夕阳下的情侣真的好有意境啊[/i]', 35, '刘德华', '2018-05-12 08:31:14'),
(53, 'RE:夕阳下的情侣真的好有意境啊', '夕阳下的情侣真的好有意境啊\r\n[img]qimg/2/6.png[/img]', 35, '刘德华', '2018-05-12 08:31:34'),
(54, 'RE:倒影', 'LIMIT $_pagenum,$_pagesize', 37, '刘德华', '2018-05-12 08:41:07'),
(55, 'RE:幽蓝色的玫瑰花', '幽蓝色的玫瑰花幽蓝色的玫瑰花', 36, '刘德华', '2018-05-12 08:41:42'),
(56, 'RE:倒影', '幽蓝色的玫瑰花幽蓝色的玫瑰花', 37, '刘德华', '2018-05-12 08:42:04'),
(57, 'RE:富士山下的樱花', '[u]富士山下的樱花[/u]\r\n[img]qimg/3/2.png[/img]', 39, '刘德华', '2018-05-12 09:46:30'),
(58, 'RE:夕阳下的情侣', '[u]夕阳下的情侣[/u]\r\n[img]qimg/3/2.png[/img]', 38, '刘德华', '2018-05-12 09:46:52'),
(59, 'RE:背着书包上学的女孩', '夕阳下的情侣夕阳下的情侣', 40, '刘德华', '2018-05-12 09:47:21'),
(60, 'RE:专用删除目录1', '专用删除目录专用删除目录', 41, '刘德华', '2018-05-12 09:55:47'),
(61, 'RE:专用删除目录2', '专用删除目录专用删除目录专用删除目录', 42, '刘德华', '2018-05-12 09:56:48'),
(62, 'RE:倒影', '富士山下的樱花富士山下的樱花\r\n', 12, '刘德华', '2018-05-12 12:24:31'),
(63, 'RE:背着书包上学的女孩', '背着书包上学的女孩背着书包上学的女孩[img]qimg/2/6.png[/img]', 40, '刘德华', '2018-05-12 12:29:57'),
(64, 'RE:倒影', '幽蓝色的玫瑰花幽蓝色的玫瑰花', 37, 'admin', '2018-05-12 17:45:28'),
(65, 'RE:123', '[img]qimg/2/3.png[/img][img]qimg/2/6.png[/img]', 45, 'admin', '2018-05-12 17:47:39'),
(66, 'RE:湖畔边的樱花', 'RE:湖畔边的樱花，好美啊。', 48, 'admin', '2018-05-12 17:55:47'),
(67, 'RE:背着书包上学的女孩', '11111111111111111111111111', 40, '刘德华', '2018-05-23 12:13:44'),
(68, 'RE:背着书包上学的女孩', '[b]hello[/b][img]qimg/1/1.png[/img]', 40, '刘德华', '2018-06-12 13:18:54'),
(69, 'RE:夕阳下的情侣', '[i]hello[/i]', 38, '刘德华', '2018-06-12 13:19:18'),
(70, 'RE:蔚蓝天空下的花丛', '蔚蓝天空下的花丛蔚蓝天空下的花丛蔚蓝天空下的花丛', 28, '刘德华', '2018-09-01 10:09:53'),
(71, 'RE:唯美风景', '土耳其一年一度的伊斯坦布尔热气球节', 50, '刘德华', '2018-09-01 10:25:26'),
(72, 'RE:印尼巴厘岛', '印尼巴厘岛，享受大海带来的欢乐。', 51, '刘德华', '2018-09-01 10:27:17'),
(73, 'RE:东京下的唯美雪景', ':东京下的唯美雪景:东京下的唯美雪景:东京下的唯美雪景:东京下的唯美雪景[img]qimg/1/1.png[/img][img]qimg/2/2.png[/img]', 29, '刘德华', '2018-09-02 10:26:32'),
(74, 'RE:梦幻唯美雪景', '\r\n[color=yellow][b][size=18]12[/size][/b][/color]', 27, '刘德华', '2018-11-03 15:36:02');

-- --------------------------------------------------------

--
-- 表的结构 `tg_user`
--

CREATE TABLE IF NOT EXISTS `tg_user` (
  `tg_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tg_username` varchar(20) NOT NULL,
  `tg_password` char(40) NOT NULL,
  `tg_question` varchar(20) NOT NULL,
  `tg_answer` char(40) NOT NULL,
  `tg_sex` char(1) NOT NULL,
  `tg_face` char(12) NOT NULL,
  `tg_switch` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `tg_autograph` varchar(200) DEFAULT NULL,
  `tg_email` varchar(20) DEFAULT NULL,
  `tg_qq` varchar(10) DEFAULT NULL,
  `tg_url` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`tg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

--
-- 转存表中的数据 `tg_user`
--

INSERT INTO `tg_user` (`tg_id`, `tg_username`, `tg_password`, `tg_question`, `tg_answer`, `tg_sex`, `tg_face`, `tg_switch`, `tg_autograph`, `tg_email`, `tg_qq`, `tg_url`) VALUES
(67, 'jack', '7c4a8d09ca3762af61e59520943dc26494f8941b', '泰坦尼克号', '596727c8a0ea4db3ba2ceceedccbacd3d7b371b8', '男', 'face/16.jpg', 0, NULL, '2345@163.com', '24765141', 'http://2345.com.cn'),
(37, '赵3', 'zhaoyi', '2324r3t4', 'wfrehtjr', '女', 'face/3.jpg', 0, NULL, '32143@qq.com', NULL, NULL),
(53, '赵小艺', '20eabe5d64b0e216796e834f52d61fd0b70332fc', '1996921', '244a4303cb30462bf3ae161d482bfa8e90664c3c', '男', 'face/1.jpg', 0, NULL, '2345@163.com', '24765141', 'http://www.baidu.com'),
(35, '赵艺1', 'zhaoyi', '123456', '1234', '女', 'face/1.jpg', 0, NULL, '22345@qq.com', NULL, NULL),
(52, 'wangqiang12', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456', 'cb654b3a5b4378595a0e3918e15563b79bf4263f', '男', 'face/5.jpg', 0, NULL, '276541223@qq.com', '21432556', 'http://www.baidu.com'),
(32, 'wangqiang', 'c3925a6030a9aa3f515a21796688485cea9fd3d7', '1996921', '26ed0276940808fb9faa84bfee454393a3afb3c6', '男', 'face/1.jpg', 1, '大家好,我是wangqiang。', '247651114@qq.com', '2888888', 'http://www.wq.com.cn'),
(39, '赵艺3', 'zhaoyi', '2324r3t4', 'wfrehtjr', '女', 'face/6.jpg', 0, NULL, '32143@qq.com', NULL, NULL),
(23, '张国荣', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456', '8cb2237d0679ca88db6464eac60da96345513964', '男', 'face/7.jpg', 0, NULL, '2476542@qq.com', '2343456', 'http://www.mm.com'),
(21, '刘德华', '76319277f0aedbbfc4d3eb5760a3b10220922813', 'wujiandao', 'd15237cad5c235cef6f031623840a4450c12c0bb', '男', 'face/20.jpg', 1, '大家好，我是刘德华。希望大家多多支持我，谢谢。', '247658888@qq.com', '2888888', 'http://www.liudehua.com'),
(34, '赵艺', '2c51e2fac5f4b51dc7edbb62b4a12c5b03d43277', '大话西游', '20eabe5d64b0e216796e834f52d61fd0b70332fc', '女', 'face/11.jpg', 0, NULL, '1314520@qq.com', '2345789', 'http://www.zhaoyi.com.cn'),
(19, '成龙', 'f7a9e24777ec23212c54d7a350bc5bea5477fdbb', 'A计划', 'd15237cad5c235cef6f031623840a4450c12c0bb', '男', 'face/8.jpg', 0, NULL, '2476514517@qq.com', '24765141', 'http://www.bai.don.cn'),
(18, '周星驰', 'e28f2ebe7df6baf8bd89e470dd80b12601f03231', '大话西游朱茵', 'd15237cad5c235cef6f031623840a4450c12c0bb', '男', 'face/9.jpg', 0, NULL, '2476514517@qq.com', '24765141', 'http://www.bai.don.cn'),
(17, '周润发', '7c4a8d09ca3762af61e59520943dc26494f8941b', '我的生日', '3ea75e81d6e8670b53191d740bbafb6e97cf78cd', '男', 'face/12.jpg', 0, NULL, '2476514517@qq.com', '24411111', 'http://www.bai.don.cn'),
(40, '赵艺4', 'zhaoyi', '2324r3t4', 'wfrehtjr', '女', 'face/12.jpg', 0, NULL, '32143@qq.com', NULL, NULL),
(41, '赵艺5', 'zhaoyi', '2324r3t4', 'wfrehtjr', '女', 'face/17.jpg', 0, NULL, '32143@qq.com', NULL, NULL),
(42, '赵艺6', 'zhaoyi', '2324r3t4', 'wfrehtjr', '女', 'face/3.jpg', 0, NULL, '32143@qq.com', NULL, NULL),
(43, '赵艺7', 'zhaoyi', '2324r3t4', 'wfrehtjr', '女', 'face/3.jpg', 0, NULL, '32143@qq.com', NULL, NULL),
(44, '赵艺8', 'zhaoyi', '2324r3t4', 'wfrehtjr', '女', 'face/18.jpg', 0, NULL, '32143@qq.com', NULL, NULL),
(45, '赵艺9', 'zhaoyi', '2324r3t4', 'wfrehtjr', '女', 'face/3.jpg', 0, NULL, '32143@qq.com', NULL, NULL),
(68, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', '管理员', '7c4a8d09ca3762af61e59520943dc26494f8941b', '男', 'face/1.jpg', 0, NULL, '2476514517@qq.com', '24765141', 'http://www.baidu.com'),
(51, 'zhaoyiman', 'fa38ca0a858e9937b83ad552da954b1576728181', '11232', '8b876f157b19975ec5180e2e204904de7828243e', '男', 'face/9.jpg', 0, NULL, '247651114@qq.com', '432435', 'http://www.baidu.com'),
(54, '赵毅', '7eb9aaab89f7c389aee65f01dddf544ad0d32ae1', '1996921', '35dade852f7a42d06811d13897e688167e360c2d', '男', 'face/16.jpg', 0, NULL, '276541223@qq.com', '2134567', 'http://www.baidu.com.cn'),
(55, '12345678900', '20eabe5d64b0e216796e834f52d61fd0b70332fc', '1234356', 'b93a77be54dbd1cdd2a172b893a3b2e16bbd52b8', '男', 'face/1.jpg', 0, NULL, '2345@163.com', '', ''),
(56, '31243y4', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'ewqt4tqr', 'adce7c90252cfb2b3068cea2d92391499641a728', '男', 'face/1.jpg', 0, NULL, '24765517@qq.com', '', 'http://www.baidu.com.cn'),
(59, '李嘉欣', 'ffd8353b7d40cf8e82e7215eefd693790e510041', '李嘉欣', 'bbf67e90b07993997e147bdb3de5febaeda35006', '女', 'face/15.jpg', 0, NULL, 'ljx520@qq.com', '1314520', 'http://www.ljx520.com'),
(60, '孙悟空', '56522e3078ed0624039e3fa47533bb49979c1bde', '12345678', '58c859e2c8d1310214996c0871c004042904996d', '男', 'face/8.jpg', 0, NULL, '2345@163.com', '2345789', 'http://www.baidu.com.cn'),
(61, '孙悟空123', '7c4a8d09ca3762af61e59520943dc26494f8941b', '12345678', '58c859e2c8d1310214996c0871c004042904996d', '男', 'face/1.jpg', 0, NULL, '2345@163.com', '2345789', 'http://www.baidu.com.cn'),
(62, '孙悟空123456', '7c4a8d09ca3762af61e59520943dc26494f8941b', '12345678', '58c859e2c8d1310214996c0871c004042904996d', '男', 'face/7.jpg', 0, NULL, '2345@163.com', '2345789', 'http://www.baidu.com.cn'),
(63, '莱昂纳多', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '12345678', '6b05bbe0a56929ce5a53f2c2398bed13464e5497', '男', 'face/14.jpg', 0, NULL, '24765517@qq.com', '2537783', 'http://www.baidu.com.cn'),
(64, '乔丹', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456789', '7c4a8d09ca3762af61e59520943dc26494f8941b', '男', 'face/1.jpg', 0, NULL, '2476514517@qq.com', '2134567', 'http://www.qq.com'),
(65, '科比', '7c4a8d09ca3762af61e59520943dc26494f8941b', '12345678', '7c4a8d09ca3762af61e59520943dc26494f8941b', '男', 'face/1.jpg', 0, NULL, '24765517@qq.com', '2456788', 'http://www.nba.com'),
(66, 'meimei', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1232435', 'ce5913f58017326438bce7719d28165cbf758bc4', '女', 'face/18.jpg', 0, NULL, '2345@163.com', '21111111', 'http://www.baidu.com'),
(69, '1234', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456', 'dd5fef9c1c1da1394d6d34b248c51be2ad740840', '女', 'face/1.jpg', 0, NULL, '13843343@qq.com', '13843343', 'http://abc.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
