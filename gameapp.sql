/*
Navicat MySQL Data Transfer

Source Server         : gameworld
Source Server Version : 50717
Source Host           : localhost:3306
Source Database       : gameapp

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2017-09-13 16:30:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `title` varchar(255) NOT NULL COMMENT '标题',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bannerpicture` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL COMMENT '内容',
  `createtime` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `tag` varchar(255) DEFAULT NULL,
  `parentid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article
-- ----------------------------

-- ----------------------------
-- Table structure for gameconfig
-- ----------------------------
DROP TABLE IF EXISTS `gameconfig`;
CREATE TABLE `gameconfig` (
  `gameconfig_id` varchar(100) NOT NULL,
  `shuxingid` varchar(255) DEFAULT NULL COMMENT '属性id',
  `tishengshuxingid` varchar(255) DEFAULT NULL COMMENT '提升属性id',
  `tishengpoint` int(11) DEFAULT '0' COMMENT '提升多少',
  PRIMARY KEY (`gameconfig_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gameconfig
-- ----------------------------
INSERT INTO `gameconfig` VALUES ('z3162049641', 'power', 'physical_attack', '30');
INSERT INTO `gameconfig` VALUES ('z3162110217', 'intelligence', 'magic_attack', '30');
INSERT INTO `gameconfig` VALUES ('z3162143037', 'agile', 'physical_protect', '30');
INSERT INTO `gameconfig` VALUES ('z3162172585', 'agile', 'megic_protect', '30');

-- ----------------------------
-- Table structure for gamefuben
-- ----------------------------
DROP TABLE IF EXISTS `gamefuben`;
CREATE TABLE `gamefuben` (
  `gamefuben_id` varchar(100) NOT NULL,
  `fubenid` varchar(255) DEFAULT NULL COMMENT '副本id',
  `fubenname` varchar(255) DEFAULT NULL COMMENT '副本名字',
  `fubenlevel` int(11) NOT NULL COMMENT '副本等级',
  PRIMARY KEY (`gamefuben_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gamefuben
-- ----------------------------
INSERT INTO `gamefuben` VALUES ('z2671859258', '1', '蒲家村', '100');
INSERT INTO `gamefuben` VALUES ('z2671875920', '2', '镇郊荒野', '200');
INSERT INTO `gamefuben` VALUES ('z2671888064', '3', '黑风洞', '300');
INSERT INTO `gamefuben` VALUES ('zz5344030240', '4', '大朝试', '200');

-- ----------------------------
-- Table structure for gamegoods
-- ----------------------------
DROP TABLE IF EXISTS `gamegoods`;
CREATE TABLE `gamegoods` (
  `gamegoods_id` varchar(100) NOT NULL,
  `goods_id` varchar(255) DEFAULT NULL COMMENT '物品id',
  `goods_belongroleid` varchar(32) NOT NULL COMMENT '属于玩家',
  `goods_name` varchar(255) DEFAULT NULL COMMENT '物品名字',
  `goods_grade` varchar(255) DEFAULT NULL COMMENT '装备品级n，s，sr，ssr',
  `goods_level` int(11) NOT NULL COMMENT '所需等级',
  `goods_price` int(11) NOT NULL COMMENT '商品价格',
  `goods_max_physical_attack` int(11) NOT NULL COMMENT '最大物理攻击',
  `goods_min_physical_attack` int(11) NOT NULL COMMENT '最小物理攻击',
  `goods_max_magic_attack` int(11) NOT NULL COMMENT '最大魔法攻击',
  `goods_min_magic_attack` int(11) NOT NULL COMMENT '最小魔法攻击',
  `goods_addpower` int(11) NOT NULL COMMENT '增加力量',
  `goods_addintelligence` int(11) NOT NULL COMMENT '增加智力',
  `goods_addagile` int(11) NOT NULL COMMENT '增加敏捷',
  PRIMARY KEY (`gamegoods_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gamegoods
-- ----------------------------

-- ----------------------------
-- Table structure for gamelevel
-- ----------------------------
DROP TABLE IF EXISTS `gamelevel`;
CREATE TABLE `gamelevel` (
  `gamelevel_id` varchar(100) NOT NULL,
  `level` int(11) DEFAULT '0' COMMENT '等级',
  `levelexp` int(11) DEFAULT '0' COMMENT '等级经验',
  PRIMARY KEY (`gamelevel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gamelevel
-- ----------------------------
INSERT INTO `gamelevel` VALUES ('z3151620613', '2', '200');

-- ----------------------------
-- Table structure for gamemonster
-- ----------------------------
DROP TABLE IF EXISTS `gamemonster`;
CREATE TABLE `gamemonster` (
  `gamemonster_id` varchar(100) NOT NULL,
  `monsterid` int(11) DEFAULT NULL COMMENT '怪物id',
  `monstername` varchar(255) DEFAULT NULL COMMENT '怪物名字',
  `monsterexperience` int(11) NOT NULL COMMENT '怪物经验',
  `monsterlevel` int(11) NOT NULL COMMENT '怪物等级',
  `monsterphysicalattack` int(11) NOT NULL COMMENT '物理攻击',
  `monstermagicattack` int(11) NOT NULL COMMENT '魔法攻击',
  `monsterphysicalprotect` int(11) NOT NULL COMMENT '怪物物理防御',
  `monstermagicprotect` int(11) NOT NULL COMMENT '怪物魔法防御',
  `belongfuben` varchar(255) DEFAULT NULL COMMENT '属于副本',
  `blood` int(222) NOT NULL COMMENT '血量',
  PRIMARY KEY (`gamemonster_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gamemonster
-- ----------------------------
INSERT INTO `gamemonster` VALUES ('2', '2', '黄口稻草人', '200', '2', '200', '200', '100', '100', '1', '200');
INSERT INTO `gamemonster` VALUES ('3', '3', '双头龟', '300', '3', '300', '300', '150', '150', '2', '300');
INSERT INTO `gamemonster` VALUES ('a8d8d2adfaa14d50a293756a1d7cded1', '1', '三眼猴', '100', '1', '100', '100', '50', '49', '1', '100');
INSERT INTO `gamemonster` VALUES ('zz4337454885', '123', '魔将', '200', '5', '300', '300', '200', '200', '2', '500');

-- ----------------------------
-- Table structure for gameorgoods
-- ----------------------------
DROP TABLE IF EXISTS `gameorgoods`;
CREATE TABLE `gameorgoods` (
  `gameorgoods_id` varchar(100) NOT NULL,
  `goods_id` varchar(255) DEFAULT NULL COMMENT '物品id',
  `goods_name` varchar(255) DEFAULT NULL COMMENT '物品名字',
  `goods_grade` varchar(255) DEFAULT NULL COMMENT '装备品级n，s，sr，ssr',
  `goods_level` int(11) NOT NULL COMMENT '所需等级',
  `goods_price` int(11) NOT NULL COMMENT '商品价格',
  `goods_max_physical_attack` int(11) NOT NULL COMMENT '最大物理攻击',
  `goods_min_physical_attack` int(11) NOT NULL COMMENT '最小物理攻击',
  `goods_max_magic_attack` int(11) NOT NULL COMMENT '最大魔法攻击',
  `goods_min_magic_attack` int(11) NOT NULL COMMENT '最小魔法攻击',
  `goods_addpower` int(11) NOT NULL COMMENT '增加力量',
  `goods_addintelligence` int(11) NOT NULL COMMENT '增加智力',
  `goods_addagile` int(11) NOT NULL COMMENT '增加敏捷',
  PRIMARY KEY (`gameorgoods_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gameorgoods
-- ----------------------------

-- ----------------------------
-- Table structure for gameprofession
-- ----------------------------
DROP TABLE IF EXISTS `gameprofession`;
CREATE TABLE `gameprofession` (
  `gameprofession_id` varchar(100) NOT NULL,
  `profession_id` varchar(255) DEFAULT NULL COMMENT '职业id',
  `profession_name` varchar(255) DEFAULT NULL COMMENT '职业名字',
  `base_megic_attack` int(11) DEFAULT '0' COMMENT '基础魔法攻击',
  `base_physical_attack` int(11) DEFAULT '0' COMMENT '基础物理攻击',
  `base_physical_protect` int(11) DEFAULT '0' COMMENT '基础物理防御',
  `base_megic_protect` int(11) DEFAULT '0' COMMENT '基础魔法防御',
  `base_blood` int(11) DEFAULT '0' COMMENT '基础血量',
  PRIMARY KEY (`gameprofession_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gameprofession
-- ----------------------------
INSERT INTO `gameprofession` VALUES ('2fd23d4a734c45c0a1e3f9a5cdc01d44', '3', '射手', '0', '100', '50', '50', '500');
INSERT INTO `gameprofession` VALUES ('72b76439dcb54340a602553082bff032', '1', '魔法师', '100', '0', '50', '50', '500');
INSERT INTO `gameprofession` VALUES ('ec528159693d4d92ac2f9c7fe2c6cc67', '2', '战士', '0', '70', '70', '70', '800');

-- ----------------------------
-- Table structure for gamerole
-- ----------------------------
DROP TABLE IF EXISTS `gamerole`;
CREATE TABLE `gamerole` (
  `gamerole_id` varchar(100) NOT NULL,
  `userid` varchar(255) DEFAULT NULL COMMENT '玩家id',
  `money` int(11) DEFAULT '0' COMMENT '金币',
  `rolename` varchar(255) DEFAULT NULL COMMENT '玩家名字',
  `physical_attack` int(11) DEFAULT '0' COMMENT '物理攻击',
  `megic_attack` int(11) DEFAULT '0' COMMENT '魔法攻击',
  `level` int(11) DEFAULT '0' COMMENT '等级',
  `intelligence` int(11) DEFAULT '0' COMMENT '智力',
  `power` int(11) DEFAULT '0' COMMENT '力量',
  `agile` int(11) DEFAULT '0' COMMENT '敏捷',
  `weapon` varchar(255) DEFAULT NULL COMMENT '武器',
  `helmet` varchar(255) DEFAULT NULL COMMENT '头盔',
  `armguard` varchar(255) DEFAULT NULL COMMENT '护手',
  `coat` varchar(255) DEFAULT NULL COMMENT '上衣',
  `leggings` varchar(255) DEFAULT NULL COMMENT '护腿',
  `shoe` varchar(255) DEFAULT NULL COMMENT '鞋子',
  `profession` varchar(255) DEFAULT NULL COMMENT '职业',
  `physical_protect` int(11) DEFAULT '0' COMMENT '物理防御',
  `attackrate` int(11) DEFAULT '0' COMMENT '攻击速率',
  `allexperience` int(11) DEFAULT '0' COMMENT '经验',
  `remainexperience` int(11) DEFAULT '0' COMMENT '剩余经验',
  `megic_protect` int(11) DEFAULT '0' COMMENT '魔法防御',
  `blood` int(11) DEFAULT '0' COMMENT '血量条',
  `magicbar` int(11) DEFAULT '0' COMMENT '魔法值',
  `createtime` varchar(255) DEFAULT NULL COMMENT '创建时间',
  `lastloginip` varchar(255) DEFAULT NULL COMMENT '最后一次登陆ip',
  `lastlogintime` varchar(255) DEFAULT NULL COMMENT '最后一次登陆时间',
  `remainpoint` int(11) DEFAULT '0' COMMENT '剩余属性点数',
  PRIMARY KEY (`gamerole_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gamerole
-- ----------------------------
INSERT INTO `gamerole` VALUES ('z3013743784', '12345', '0', '好集团', '100', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3', '0', '0', '0', '0', '0', '300', '0', '2017-04-13 00:15:43.784', '192.168.2.8', '0', null);
INSERT INTO `gamerole` VALUES ('z3013871275', '1234', '0', '厉害了', '100', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '300', '0', '2017-04-13 00:17:51.275', '192.168.2.8', '0', null);
INSERT INTO `gamerole` VALUES ('zz5028139749', '12344321', '0', '你懂得', '0', '100', '0', '0', '0', '0', '1', '1', '1', '1', '1', '1', '魔法师', '50', '0', '0', '0', '50', '500', '0', '17-05-17 01:35:39', '127.0.0.1', '17-05-17 01:35:39', '0');

-- ----------------------------
-- Table structure for gameuser
-- ----------------------------
DROP TABLE IF EXISTS `gameuser`;
CREATE TABLE `gameuser` (
  `gameuser_id` varchar(100) NOT NULL COMMENT '玩家id',
  `uid` varchar(255) DEFAULT NULL COMMENT '唯一uid',
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  `email` varchar(255) DEFAULT NULL COMMENT '邮件',
  `phone` int(11) DEFAULT NULL COMMENT '手机号',
  PRIMARY KEY (`gameuser_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gameuser
-- ----------------------------
INSERT INTO `gameuser` VALUES ('111111111111', '111111111111', 'e88ca5bc66f5b9618a0b6b6cf55de233', 'fs', '3214');
INSERT INTO `gameuser` VALUES ('1212', '1212', 'a01610228fe998f515a72dd730294d87', null, null);
INSERT INTO `gameuser` VALUES ('123321', '123321', 'd5a932c3f1740a045625075fb111b2f4', null, null);
INSERT INTO `gameuser` VALUES ('12332123', '12332123', '160be658c1514665005b7ab5ddb3773e', null, null);
INSERT INTO `gameuser` VALUES ('1234', '1234', '81dc9bdb52d04dc20036dbd8313ed055', null, null);
INSERT INTO `gameuser` VALUES ('12344321', '12344321', '81dc9bdb52d04dc20036dbd8313ed055', null, null);
INSERT INTO `gameuser` VALUES ('12345', '12345', '03bd39a0ed98bb583fe61bfc4cb9668d', null, null);
INSERT INTO `gameuser` VALUES ('123456', '123456', '62c40343f43f09980fd637654ede90b1', null, null);
INSERT INTO `gameuser` VALUES ('123456532', '123456532', '62c40343f43f09980fd637654ede90b1', null, null);
INSERT INTO `gameuser` VALUES ('1234567', '1234567', 'ba278394f3eedf075789bc58e16665d9', null, null);
INSERT INTO `gameuser` VALUES ('1494249931', '10986738', '123321', '123321', '123321');
INSERT INTO `gameuser` VALUES ('z1003655627', 'z1003655627', '123', null, null);
INSERT INTO `gameuser` VALUES ('z1007251949', 'z1007251949', '123', null, null);
INSERT INTO `gameuser` VALUES ('z1007256340', 'z1007256340', '123', null, null);
INSERT INTO `gameuser` VALUES ('z1007260741', 'z1007260741', '123', null, null);
INSERT INTO `gameuser` VALUES ('zhangjiafan', 'zhangjiafan', '81dc9bdb52d04dc20036dbd8313ed055', null, null);
INSERT INTO `gameuser` VALUES ('zz1234', 'zz1234', '81dc9bdb52d04dc20036dbd8313ed055', null, null);

-- ----------------------------
-- Table structure for sys_app_user
-- ----------------------------
DROP TABLE IF EXISTS `sys_app_user`;
CREATE TABLE `sys_app_user` (
  `user_id` varchar(100) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `rights` varchar(255) DEFAULT NULL,
  `role_id` varchar(100) DEFAULT NULL,
  `last_login` varchar(255) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `status` varchar(32) DEFAULT NULL,
  `bz` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `sfid` varchar(100) DEFAULT NULL,
  `start_time` varchar(100) DEFAULT NULL,
  `end_time` varchar(100) DEFAULT NULL,
  `years` int(10) DEFAULT NULL,
  `number` varchar(100) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_app_user
-- ----------------------------
INSERT INTO `sys_app_user` VALUES ('04762c0b28b643939455c7800c2e2412', 'dsfsd', 'f1290186a5d0b1ceab27f4e77c0c5d68', 'w', '', '55896f5ce3c0494fa6850775a4e29ff6', '', '', '0', '', '18766666666', '', '', '', '0', '001', '18766666666@qq.com');
INSERT INTO `sys_app_user` VALUES ('3faac8fe5c0241e593e0f9ea6f2d5870', 'dsfsdf', 'f1290186a5d0b1ceab27f4e77c0c5d68', 'wewe', '', '68f23fc0caee475bae8d52244dea8444', '', '', '1', '', '18767676767', '', '', '', '0', 'wqwe', 'qweqwe@qq.com');

-- ----------------------------
-- Table structure for sys_dictionaries
-- ----------------------------
DROP TABLE IF EXISTS `sys_dictionaries`;
CREATE TABLE `sys_dictionaries` (
  `zd_id` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `bianma` varchar(100) DEFAULT NULL,
  `ordy_by` int(10) DEFAULT NULL,
  `parent_id` varchar(100) DEFAULT NULL,
  `jb` int(10) DEFAULT NULL,
  `p_bm` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`zd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_dictionaries
-- ----------------------------
INSERT INTO `sys_dictionaries` VALUES ('212a6765fddc4430941469e1ec8c8e6c', '人事部', '001', '1', 'c067fdaf51a141aeaa56ed26b70de863', '2', 'bm_001');
INSERT INTO `sys_dictionaries` VALUES ('3cec73a7cc8a4cb79e3f6ccc7fc8858c', '行政部', '002', '2', 'c067fdaf51a141aeaa56ed26b70de863', '2', 'bm_002');
INSERT INTO `sys_dictionaries` VALUES ('48724375640341deb5ef01ac51a89c34', '北京', 'dq001', '1', 'cdba0b5ef20e4fc0a5231fa3e9ae246a', '2', 'dq_dq001');
INSERT INTO `sys_dictionaries` VALUES ('5a1547632cca449db378fbb9a042b336', '研发部', '004', '4', 'c067fdaf51a141aeaa56ed26b70de863', '2', 'bm_004');
INSERT INTO `sys_dictionaries` VALUES ('7f9cd74e60a140b0aea5095faa95cda3', '财务部', '003', '3', 'c067fdaf51a141aeaa56ed26b70de863', '2', 'bm_003');
INSERT INTO `sys_dictionaries` VALUES ('b861bd1c3aba4934acdb5054dd0d0c6e', '科技不', 'kj', '7', 'c067fdaf51a141aeaa56ed26b70de863', '2', 'bm_kj');
INSERT INTO `sys_dictionaries` VALUES ('c067fdaf51a141aeaa56ed26b70de863', '部门', 'bm', '1', '0', '1', 'bm');
INSERT INTO `sys_dictionaries` VALUES ('cdba0b5ef20e4fc0a5231fa3e9ae246a', '地区', 'dq', '2', '0', '1', 'dq');
INSERT INTO `sys_dictionaries` VALUES ('f184bff5081d452489271a1bd57599ed', '上海', 'sh', '2', 'cdba0b5ef20e4fc0a5231fa3e9ae246a', '2', 'dq_sh');
INSERT INTO `sys_dictionaries` VALUES ('f30bf95e216d4ebb8169ff0c86330b8f', '客服部', '006', '6', 'c067fdaf51a141aeaa56ed26b70de863', '2', 'bm_006');

-- ----------------------------
-- Table structure for sys_gl_qx
-- ----------------------------
DROP TABLE IF EXISTS `sys_gl_qx`;
CREATE TABLE `sys_gl_qx` (
  `gl_id` varchar(100) NOT NULL,
  `role_id` varchar(100) DEFAULT NULL,
  `fx_qx` int(10) DEFAULT NULL,
  `fw_qx` int(10) DEFAULT NULL,
  `qx1` int(10) DEFAULT NULL,
  `qx2` int(10) DEFAULT NULL,
  `qx3` int(10) DEFAULT NULL,
  `qx4` int(10) DEFAULT NULL,
  PRIMARY KEY (`gl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_gl_qx
-- ----------------------------
INSERT INTO `sys_gl_qx` VALUES ('1', '2', '1', '1', '1', '1', '1', '1');
INSERT INTO `sys_gl_qx` VALUES ('2', '1', '0', '0', '1', '1', '1', '1');
INSERT INTO `sys_gl_qx` VALUES ('55896f5ce3c0494fa6850775a4e29ff6', '7', '0', '0', '1', '0', '0', '0');
INSERT INTO `sys_gl_qx` VALUES ('68f23fc0caee475bae8d52244dea8444', '7', '0', '0', '1', '0', '0', '0');
INSERT INTO `sys_gl_qx` VALUES ('7dfd8d1f7b6245d283217b7e63eec9b2', '1', '1', '1', '0', '0', '0', '0');
INSERT INTO `sys_gl_qx` VALUES ('ac66961adaa2426da4470c72ffeec117', '1', '1', '0', '0', '1', '0', '0');
INSERT INTO `sys_gl_qx` VALUES ('b0c77c29dfa140dc9b14a29c056f824f', '7', '1', '0', '1', '0', '0', '0');
INSERT INTO `sys_gl_qx` VALUES ('e74f713314154c35bd7fc98897859fe3', '6', '1', '1', '1', '1', '0', '0');
INSERT INTO `sys_gl_qx` VALUES ('f944a9df72634249bbcb8cb73b0c9b86', '7', '1', '1', '1', '0', '0', '0');

-- ----------------------------
-- Table structure for sys_menu
-- ----------------------------
DROP TABLE IF EXISTS `sys_menu`;
CREATE TABLE `sys_menu` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(255) DEFAULT NULL,
  `menu_url` varchar(255) DEFAULT NULL,
  `parent_id` varchar(100) DEFAULT NULL,
  `menu_order` varchar(100) DEFAULT NULL,
  `menu_icon` varchar(30) DEFAULT NULL,
  `menu_type` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_menu
-- ----------------------------
INSERT INTO `sys_menu` VALUES ('1', '系统管理', '#', '0', '1', 'icon-desktop', '2');
INSERT INTO `sys_menu` VALUES ('2', '组织管理', 'role.do', '1', '2', null, '2');
INSERT INTO `sys_menu` VALUES ('4', '会员管理', 'happuser/listusers.do', '1', '4', null, '2');
INSERT INTO `sys_menu` VALUES ('5', '系统用户', 'user/listusers.do', '1', '3', null, '2');
INSERT INTO `sys_menu` VALUES ('6', '信息管理', '#', '0', '2', 'icon-list-alt', '2');
INSERT INTO `sys_menu` VALUES ('7', '图片管理', 'pictures/list.do', '6', '1', null, '2');
INSERT INTO `sys_menu` VALUES ('8', '性能监控', 'druid/index.html', '9', '1', null, '2');
INSERT INTO `sys_menu` VALUES ('9', '系统工具', '#', '0', '3', 'icon-th', '2');
INSERT INTO `sys_menu` VALUES ('10', '接口测试', 'tool/interfacetest.do', '9', '2', null, '2');
INSERT INTO `sys_menu` VALUES ('11', '发送邮件', 'tool/gosendemail.do', '9', '3', null, '2');
INSERT INTO `sys_menu` VALUES ('12', '置二维码', 'tool/gotwodimensioncode.do', '9', '4', null, '2');
INSERT INTO `sys_menu` VALUES ('13', '多级别树', 'tool/ztree.do', '9', '5', null, '2');
INSERT INTO `sys_menu` VALUES ('14', '地图工具', 'tool/map.do', '9', '6', null, '2');
INSERT INTO `sys_menu` VALUES ('15', '微信管理', '#', '0', '2', 'icon-comments', '2');
INSERT INTO `sys_menu` VALUES ('16', '文本回复', 'textmsg/list.do', '15', '2', null, '2');
INSERT INTO `sys_menu` VALUES ('17', '应用命令', 'command/list.do', '15', '4', null, '2');
INSERT INTO `sys_menu` VALUES ('18', '图文回复', 'imgmsg/list.do', '15', '3', null, '2');
INSERT INTO `sys_menu` VALUES ('19', '关注回复', 'textmsg/gosubscribe.do', '15', '1', null, '2');
INSERT INTO `sys_menu` VALUES ('20', '在线管理', 'onlinemanager/list.do', '1', '5', null, '2');
INSERT INTO `sys_menu` VALUES ('21', '打印测试', 'tool/printtest.do', '9', '7', null, '2');
INSERT INTO `sys_menu` VALUES ('22', '游戏管理', '#', '0', '5', null, '2');
INSERT INTO `sys_menu` VALUES ('25', '玩家信息', 'admin/gameuser', '22', '1', null, '2');
INSERT INTO `sys_menu` VALUES ('26', '职业设定', 'admin/gameprofession', '22', '2', '8', '2');
INSERT INTO `sys_menu` VALUES ('27', '怪物', 'admin/gamemonster', '22', '3', null, '2');
INSERT INTO `sys_menu` VALUES ('28', '角色管理', 'admin/gamerole', '22', '4', null, '2');
INSERT INTO `sys_menu` VALUES ('29', '副本', 'admin/gamefuben', '22', '5', null, '2');
INSERT INTO `sys_menu` VALUES ('30', '装备列表', 'gameorgoods/list.do', '22', '6', null, '2');
INSERT INTO `sys_menu` VALUES ('31', '玩家装备列表', 'gamegoods/list.do', '22', '7', null, '2');
INSERT INTO `sys_menu` VALUES ('32', '配置', 'gameconfig/list.do', '22', '8', null, '2');
INSERT INTO `sys_menu` VALUES ('33', '等级经验设置', 'gamelevel/list.do', '22', '9', null, '2');
INSERT INTO `sys_menu` VALUES ('34', '菜单管理', 'admin/sys_menu', '1', '5', null, '2');

-- ----------------------------
-- Table structure for sys_role
-- ----------------------------
DROP TABLE IF EXISTS `sys_role`;
CREATE TABLE `sys_role` (
  `role_id` varchar(100) NOT NULL,
  `role_name` varchar(100) DEFAULT NULL,
  `rights` varchar(255) DEFAULT NULL,
  `parent_id` varchar(100) DEFAULT NULL,
  `add_qx` varchar(255) DEFAULT NULL,
  `del_qx` varchar(255) DEFAULT NULL,
  `edit_qx` varchar(255) DEFAULT NULL,
  `cha_qx` varchar(255) DEFAULT NULL,
  `qx_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_role
-- ----------------------------
INSERT INTO `sys_role` VALUES ('1', '系统管理员', '511705078', '0', '1', '1', '1', '1', '1');
INSERT INTO `sys_role` VALUES ('2', '超级管理员', '17154703350', '1', '17154703350', '17153654770', '17154703350', '17153654774', '2');
INSERT INTO `sys_role` VALUES ('4', '用户组', '118', '0', '0', '0', '0', '0', null);
INSERT INTO `sys_role` VALUES ('55896f5ce3c0494fa6850775a4e29ff6', '特级会员', '498', '7', '1048630', '0', '0', '0', '55896f5ce3c0494fa6850775a4e29ff6');
INSERT INTO `sys_role` VALUES ('6', '客户组', '18', '0', '1', '1', '1', '1', null);
INSERT INTO `sys_role` VALUES ('68f23fc0caee475bae8d52244dea8444', '中级会员', '498', '7', '0', '0', '0', '0', '68f23fc0caee475bae8d52244dea8444');
INSERT INTO `sys_role` VALUES ('7', '会员组', '498', '0', '0', '0', '0', '1', null);
INSERT INTO `sys_role` VALUES ('7dfd8d1f7b6245d283217b7e63eec9b2', '管理员b', '511705078', '1', '246', '0', '0', '0', '7dfd8d1f7b6245d283217b7e63eec9b2');
INSERT INTO `sys_role` VALUES ('ac66961adaa2426da4470c72ffeec117', '管理员a', '511705078', '1', '54', '54', '0', '246', 'ac66961adaa2426da4470c72ffeec117');
INSERT INTO `sys_role` VALUES ('b0c77c29dfa140dc9b14a29c056f824f', '高级会员', '498', '7', '0', '0', '0', '0', 'b0c77c29dfa140dc9b14a29c056f824f');
INSERT INTO `sys_role` VALUES ('e74f713314154c35bd7fc98897859fe3', '黄金客户', '18', '6', '1', '1', '1', '1', 'e74f713314154c35bd7fc98897859fe3');
INSERT INTO `sys_role` VALUES ('f944a9df72634249bbcb8cb73b0c9b86', '初级会员', '498', '7', '1', '1', '1', '1', 'f944a9df72634249bbcb8cb73b0c9b86');

-- ----------------------------
-- Table structure for sys_user
-- ----------------------------
DROP TABLE IF EXISTS `sys_user`;
CREATE TABLE `sys_user` (
  `user_id` varchar(100) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `rights` varchar(255) DEFAULT NULL,
  `role_id` varchar(100) DEFAULT NULL,
  `last_login` varchar(255) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `status` varchar(32) DEFAULT NULL,
  `bz` varchar(255) DEFAULT NULL,
  `skin` varchar(100) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `number` varchar(100) DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_user
-- ----------------------------
INSERT INTO `sys_user` VALUES ('089d664844f8441499955b3701696fc0', 'fushide', '67bc304642856b709dfeb907b92cc7e10e0b02f2', '富师德', '', '2', '', '', '0', '18629359', 'default', 'asdadf@qq.com', '1231', '18766666666');
INSERT INTO `sys_user` VALUES ('0b3f2ab1896b47c097a81d322697446a', 'zhangsan', '5ee5d458d02fde6170b9c3ebfe06af85dacd131d', '张三', '', '2', '2015-06-03 22:09:13', '127.0.0.1', '0', '小张', 'default', 'wwwwq@qq.com', '1101', '18788888888');
INSERT INTO `sys_user` VALUES ('0e2da7c372e147a0b67afdf4cdd444a3', 'dfsdf', 'c49639f0b2c5dda506b777a1e518990e9a88a221', 'wqeqw', '', 'e74f713314154c35bd7fc98897859fe3', '', '', '0', 'ff', 'default', 'q324@qq.com', 'dsfsdddd', '18767676767');
INSERT INTO `sys_user` VALUES ('1', 'admin', 'de41b7fb99201d8334c23c014db35ecd92df81bc', '系统管理员', '1133671055321055258374707980945218933803269864762743594642571294', '1', '2017-04-13 23:13:24', '192.168.2.6', '0', '最高统治者', 'default', 'admin@main.com', '001', '18788888888');
INSERT INTO `sys_user` VALUES ('3d3bacf7535444cda51f23711e32c0b2', 'sss', '6d606b5972e69fd5173faff05a28aa38e2b38d38', '中丧生', '', 'ac66961adaa2426da4470c72ffeec117', '', '', '0', 'cess', 'default', '12312315@qq.com', '223', '18777777878');
INSERT INTO `sys_user` VALUES ('79d9e8d227d14902871e162950d17356', 'xinyonghu', '527e060c0c42db870b0d83cf97d28fa0111cf2f9', '新用户22', '', '2', '', '', '0', '新用户22', 'default', 'zhangsassn@www.com', '121121', '18765656556');
INSERT INTO `sys_user` VALUES ('8009132b158748a5a84510f91a291119', 'asdasd', '26be4dd18f543d7002b4d8aa525f90a33c0faefb', 'sdsdf', '', '7dfd8d1f7b6245d283217b7e63eec9b2', '', '', '0', '', 'default', '12312312@qq.com', '2312', '18765810587');
INSERT INTO `sys_user` VALUES ('b825f152368549069be79e1d34184afa', 'san', '47c4a8dc64ac2f0bb46bbd8813b037c9718f9349', '三', '', '2', '2015-08-03 14:18:14', '127.0.0.1', '0', 'sdfsdgf', 'default', 'sdfsdf@qq.com', 'sdsaw22', '18765656565');
INSERT INTO `sys_user` VALUES ('be025a79502e433e820fac37ddb1cfc2', 'zhangsan570256', '42f7554cb9c00e11ef16543a2c86ade815b79faa', '张三', '', '2', '', '', '0', '小张', 'default', 'zhangsan@www.com', '21101', '2147483647');
INSERT INTO `sys_user` VALUES ('d2e7c52f54ee4499808ea2980cd8f3aa', 'zhangjiafan', 'e2185d84f4da5a6465d1a6245981a5e6f1174b2a', '张珈凡', '', '2', '2017-04-14 17:19:58', '192.168.56.1', '0', '11', 'default', '111@qq.com', '10', '15521054332');

-- ----------------------------
-- Table structure for sys_user_qx
-- ----------------------------
DROP TABLE IF EXISTS `sys_user_qx`;
CREATE TABLE `sys_user_qx` (
  `u_id` varchar(100) NOT NULL,
  `c1` int(10) DEFAULT NULL,
  `c2` int(10) DEFAULT NULL,
  `c3` int(10) DEFAULT NULL,
  `c4` int(10) DEFAULT NULL,
  `q1` int(10) DEFAULT NULL,
  `q2` int(10) DEFAULT NULL,
  `q3` int(10) DEFAULT NULL,
  `q4` int(10) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_user_qx
-- ----------------------------
INSERT INTO `sys_user_qx` VALUES ('1', '1', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user_qx` VALUES ('2', '1', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `sys_user_qx` VALUES ('55896f5ce3c0494fa6850775a4e29ff6', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user_qx` VALUES ('68f23fc0caee475bae8d52244dea8444', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user_qx` VALUES ('7dfd8d1f7b6245d283217b7e63eec9b2', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user_qx` VALUES ('ac66961adaa2426da4470c72ffeec117', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user_qx` VALUES ('b0c77c29dfa140dc9b14a29c056f824f', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user_qx` VALUES ('e74f713314154c35bd7fc98897859fe3', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `sys_user_qx` VALUES ('f944a9df72634249bbcb8cb73b0c9b86', '0', '0', '0', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for tb_pictures
-- ----------------------------
DROP TABLE IF EXISTS `tb_pictures`;
CREATE TABLE `tb_pictures` (
  `pictures_id` varchar(100) NOT NULL,
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `name` varchar(255) DEFAULT NULL COMMENT '文件名',
  `path` varchar(255) DEFAULT NULL COMMENT '路径',
  `createtime` varchar(255) DEFAULT NULL COMMENT '创建时间',
  `master_id` varchar(255) DEFAULT NULL COMMENT '属于',
  `bz` varchar(255) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`pictures_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_pictures
-- ----------------------------
INSERT INTO `tb_pictures` VALUES ('1d16c4e6ac2d46fda5802462819b3162', '图片', 'ef09a150ba8f4f36864fbfa6540ffda8.jpg', '20150803/ef09a150ba8f4f36864fbfa6540ffda8.jpg', '2015-08-03 14:31:32', '1', '图片管理处上传');
INSERT INTO `tb_pictures` VALUES ('aa07d74f97fe4171be10067f6e738820', '图片', 'c238f8ac2343484daee37c70855c217a.jpg', '20150803/c238f8ac2343484daee37c70855c217a.jpg', '2015-08-03 14:33:08', '1', '图片管理处上传');
INSERT INTO `tb_pictures` VALUES ('bd0f0dbf926b41c986e14d7e3008e65a', '图片', 'f91e764e253f4de384bec4c7e6342af3.jpg', '20150803/f91e764e253f4de384bec4c7e6342af3.jpg', '2015-08-03 14:31:32', '1', '图片管理处上传');
INSERT INTO `tb_pictures` VALUES ('ccde8af6778f42e7924ede153d9c1465', '图片', '25dba768c6a04904b2cfce26730ee50d.jpg', '20150803/25dba768c6a04904b2cfce26730ee50d.jpg', '2015-08-03 14:31:33', '1', '图片管理处上传');

-- ----------------------------
-- Table structure for tuku_picture
-- ----------------------------
DROP TABLE IF EXISTS `tuku_picture`;
CREATE TABLE `tuku_picture` (
  `id` int(128) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `pictureurl` varchar(255) NOT NULL,
  `createtime` datetime(6) NOT NULL ON UPDATE CURRENT_TIMESTAMP(6) COMMENT '创建时间',
  `createid` int(128) NOT NULL COMMENT '创建者id',
  `classify` int(24) DEFAULT NULL COMMENT '分类',
  `smallpictureurl` varchar(255) DEFAULT NULL COMMENT '小预览图',
  `status` int(4) unsigned zerofill NOT NULL DEFAULT '0000' COMMENT '0为禁用1为启用',
  `tags` varchar(50) DEFAULT NULL COMMENT '标签合集  1,2,3用逗号分开',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tuku_picture
-- ----------------------------
INSERT INTO `tuku_picture` VALUES ('1', '进几百的巨人', 'http://jiafan.bj.bcebos.com/1eab527e-f456-4171-87e4-7316866af0a5.jpg', '2017-03-07 15:08:58.090000', '2', null, null, '0001', '图片+萌+萌大大');
INSERT INTO `tuku_picture` VALUES ('2', '晋级的爸爸', 'http://jiafan.bj.bcebos.com/068114f3-6975-4773-a65a-2adba7f291c1.jpg', '2017-03-07 15:39:58.154000', '2', null, null, '0001', '图片+好看呀+不错的');
INSERT INTO `tuku_picture` VALUES ('3', '进击的爸爸', 'http://jiafan.bj.bcebos.com/f5eed687-d829-43aa-a1f4-49517d1ef490.jpg', '2017-03-07 15:45:36.933000', '2', null, null, '0001', '图片+玩玩+have fun');

-- ----------------------------
-- Table structure for weixin_command
-- ----------------------------
DROP TABLE IF EXISTS `weixin_command`;
CREATE TABLE `weixin_command` (
  `command_id` varchar(100) NOT NULL,
  `keyword` varchar(255) DEFAULT NULL COMMENT '关键词',
  `commandcode` varchar(255) DEFAULT NULL COMMENT '应用路径',
  `createtime` varchar(255) DEFAULT NULL COMMENT '创建时间',
  `status` int(1) NOT NULL COMMENT '状态',
  `bz` varchar(255) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`command_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of weixin_command
-- ----------------------------
INSERT INTO `weixin_command` VALUES ('2636750f6978451b8330874c9be042c2', '锁定服务器', 'rundll32.exe user32.dll,lockworkstation', '2015-05-10 21:25:06', '1', '锁定计算机');
INSERT INTO `weixin_command` VALUES ('46217c6d44354010823241ef484f7214', '打开浏览器', 'c:/program files/internet explorer/iexplore.exe', '2015-05-09 02:43:02', '1', '打开浏览器操作');
INSERT INTO `weixin_command` VALUES ('576adcecce504bf3bb34c6b4da79a177', '关闭浏览器', 'taskkill /f /im iexplore.exe', '2015-05-09 02:36:48', '1', '关闭浏览器操作');
INSERT INTO `weixin_command` VALUES ('854a157c6d99499493f4cc303674c01f', '关闭qq', 'taskkill /f /im qq.exe', '2015-05-10 21:25:46', '1', '关闭qq');
INSERT INTO `weixin_command` VALUES ('ab3a8c6310ca4dc8b803ecc547e55ae7', '打开qq', 'd:/soft/qq/qq/bin/qq.exe', '2015-05-10 21:25:25', '1', '打开qq');

-- ----------------------------
-- Table structure for weixin_imgmsg
-- ----------------------------
DROP TABLE IF EXISTS `weixin_imgmsg`;
CREATE TABLE `weixin_imgmsg` (
  `imgmsg_id` varchar(100) NOT NULL,
  `keyword` varchar(255) DEFAULT NULL COMMENT '关键词',
  `createtime` varchar(255) DEFAULT NULL COMMENT '创建时间',
  `status` int(11) NOT NULL COMMENT '状态',
  `bz` varchar(255) DEFAULT NULL COMMENT '备注',
  `title1` varchar(255) DEFAULT NULL COMMENT '标题1',
  `description1` varchar(255) DEFAULT NULL COMMENT '描述1',
  `imgurl1` varchar(255) DEFAULT NULL COMMENT '图片地址1',
  `tourl1` varchar(255) DEFAULT NULL COMMENT '超链接1',
  `title2` varchar(255) DEFAULT NULL COMMENT '标题2',
  `description2` varchar(255) DEFAULT NULL COMMENT '描述2',
  `imgurl2` varchar(255) DEFAULT NULL COMMENT '图片地址2',
  `tourl2` varchar(255) DEFAULT NULL COMMENT '超链接2',
  `title3` varchar(255) DEFAULT NULL COMMENT '标题3',
  `description3` varchar(255) DEFAULT NULL COMMENT '描述3',
  `imgurl3` varchar(255) DEFAULT NULL COMMENT '图片地址3',
  `tourl3` varchar(255) DEFAULT NULL COMMENT '超链接3',
  `title4` varchar(255) DEFAULT NULL COMMENT '标题4',
  `description4` varchar(255) DEFAULT NULL COMMENT '描述4',
  `imgurl4` varchar(255) DEFAULT NULL COMMENT '图片地址4',
  `tourl4` varchar(255) DEFAULT NULL COMMENT '超链接4',
  `title5` varchar(255) DEFAULT NULL COMMENT '标题5',
  `description5` varchar(255) DEFAULT NULL COMMENT '描述5',
  `imgurl5` varchar(255) DEFAULT NULL COMMENT '图片地址5',
  `tourl5` varchar(255) DEFAULT NULL COMMENT '超链接5',
  `title6` varchar(255) DEFAULT NULL COMMENT '标题6',
  `description6` varchar(255) DEFAULT NULL COMMENT '描述6',
  `imgurl6` varchar(255) DEFAULT NULL COMMENT '图片地址6',
  `tourl6` varchar(255) DEFAULT NULL COMMENT '超链接6',
  `title7` varchar(255) DEFAULT NULL COMMENT '标题7',
  `description7` varchar(255) DEFAULT NULL COMMENT '描述7',
  `imgurl7` varchar(255) DEFAULT NULL COMMENT '图片地址7',
  `tourl7` varchar(255) DEFAULT NULL COMMENT '超链接7',
  `title8` varchar(255) DEFAULT NULL COMMENT '标题8',
  `description8` varchar(255) DEFAULT NULL COMMENT '描述8',
  `imgurl8` varchar(255) DEFAULT NULL COMMENT '图片地址8',
  `tourl8` varchar(255) DEFAULT NULL COMMENT '超链接8',
  PRIMARY KEY (`imgmsg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of weixin_imgmsg
-- ----------------------------
INSERT INTO `weixin_imgmsg` VALUES ('380b2cb1f4954315b0e20618f7b5bd8f', '首页', '2015-05-10 20:51:09', '1', '图文回复', '图文回复标题', '图文回复描述', 'http://a.hiphotos.baidu.com/image/h%3d360/sign=c6c7e73ebc389b5027ffe654b535e5f1/a686c9177f3e6709392bb8df3ec79f3df8dc55e3.jpg', 'www.baidu.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for weixin_textmsg
-- ----------------------------
DROP TABLE IF EXISTS `weixin_textmsg`;
CREATE TABLE `weixin_textmsg` (
  `textmsg_id` varchar(100) NOT NULL,
  `keyword` varchar(255) DEFAULT NULL COMMENT '关键词',
  `content` varchar(255) DEFAULT NULL COMMENT '内容',
  `createtime` varchar(255) DEFAULT NULL COMMENT '创建时间',
  `status` int(11) DEFAULT NULL COMMENT '状态',
  `bz` varchar(255) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`textmsg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of weixin_textmsg
-- ----------------------------
INSERT INTO `weixin_textmsg` VALUES ('303c190498a045bdbba4c940c2f0d9f9', '1ss', '1ssddd', '2015-05-18 20:17:02', '1', '1ssdddsd');
INSERT INTO `weixin_textmsg` VALUES ('63681adbe7144f10b66d6863e07f23c2', '你好', '你也好', '2015-05-09 02:39:23', '1', '文本回复');
INSERT INTO `weixin_textmsg` VALUES ('695cd74779734231928a253107ab0eeb', '吃饭', '吃了噢噢噢噢', '2015-05-10 22:52:27', '1', '文本回复');
INSERT INTO `weixin_textmsg` VALUES ('d4738af7aea74a6ca1a5fb25a98f9acb', '关注', '关注', '2015-05-11 02:12:36', '1', '关注回复');
SET FOREIGN_KEY_CHECKS=1;
