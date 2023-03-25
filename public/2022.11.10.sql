/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50739
 Source Host           : localhost:3306
 Source Schema         : one

 Target Server Type    : MySQL
 Target Server Version : 50739
 File Encoding         : 65001

 Date: 10/11/2022 10:40:32
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin_dictionary
-- ----------------------------
DROP TABLE IF EXISTS `admin_dictionary`;
CREATE TABLE `admin_dictionary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `code` varchar(64) DEFAULT NULL,
  `parentid` int(11) DEFAULT '0',
  `sorting` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `remark` varchar(50) DEFAULT NULL,
  `hidden` int(10) DEFAULT '0',
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1004 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of admin_dictionary
-- ----------------------------
BEGIN;
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (13, '显示平台', 'TARGET', 0, 3, 0, '', 0, '2022-03-06 20:10:58');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (14, 'All', 'all', 13, 1, 0, '所有', 0, '2022-03-06 20:11:25');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (15, 'Work', 'work', 13, 3, 0, '', 0, '2022-03-06 20:11:37');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (16, '产品状态', 'PRODUCT_STATUS', 0, 4, 0, 'PRODUCT_STATUS', 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (17, '开票人状态', 'INOVICE_STATUS', 0, 5, 0, NULL, 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (18, '收款人帐号类型', 'RECEIVER_TYPE', 0, 6, 0, '收款人类型', 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (19, '币种', 'CURRENCY', 0, 7, 0, '币种', 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (20, '国家字典', 'COUNTRY', 0, 8, 0, NULL, 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (21, '报关城市', 'CITY', 0, 9, 0, NULL, 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (22, '报关形式', 'BGXS', 0, 10, 0, '报关形式', 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (23, '收汇方式', 'SHFS', 0, 11, 0, '收汇方式', 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (24, '价格条款', 'FOB_CF', 0, 12, 0, '价格条款', 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (25, '监管方式', 'JGFS', 0, 15, 0, '监管方式', 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (26, '包装种类', 'BZZL', 0, 16, 0, '包装种类', 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (27, '运输方式', 'YSFS', 0, 17, 0, '运输方式', 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (28, '业务状态', 'PROJECT_STATE', 0, 18, 0, '业务状态', 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (29, '包装说明', 'BZSM', 0, 19, 0, '包装说明', 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (30, '单位', 'UNIT', 0, 20, 0, '单位', 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (31, '用途', 'USAGE', 0, 21, 0, '用途', 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (32, '帐户类型', 'ACCOUNT', 0, 22, 0, '帐户类型', 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (33, '收款状态', 'RECEIPTSTATUS', 0, 23, 0, NULL, 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (34, '支付状态', 'PAYMENTSTATUS', 0, 24, 0, NULL, 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (35, '增票状态', 'VIISTATUS', 0, 25, 0, '增票状态', 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (36, '颜色', 'FLAGCOLOR', 0, 26, 0, NULL, 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (37, '生产单位', 'PRODUCTION', 0, 27, 0, NULL, 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (38, '品牌类型', 'BRANDS', 0, 28, 0, NULL, 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (39, '出品优惠情况', 'YHQK', 0, 29, 0, NULL, 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (40, '统计', 'STATISTICS', 0, 30, 0, NULL, 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (41, '任务目的', 'QCTYPE', 0, 31, 0, '任务目的', 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (42, 'QC产品', 'INDUSTRY', 0, 32, 0, 'QC产品', 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (43, 'QC数量单位', 'QCUNIT', 0, 33, 0, '', 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (44, 'QC订单状态', 'QCSTATE', 0, 34, 0, '', 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (45, '客户类别', 'CTYPE', 0, 35, 0, NULL, 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (46, '客户来源', 'CSOURCE', 0, 36, 0, NULL, 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (47, '利润提取', 'PROFITS', 0, 37, 0, NULL, 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (48, '城市(EN)', 'CITYEN', 0, 38, 0, NULL, 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (49, '运输方式(EN)', 'YSFSEN', 0, 39, 0, NULL, 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (50, '国家(区域)', 'COUNTRYEN', 0, 40, 0, NULL, 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (51, '单位(EN)', 'UNITEN', 0, 41, 0, NULL, 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (52, '文章类型', 'CATEGORY', 0, 42, 0, NULL, 0, '2022-07-07 21:45:53');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (79, '草稿箱', '0', 16, 8, 0, '', 0, '2022-07-07 22:15:13');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (80, '审核中', '1', 16, 9, 0, NULL, 0, '2022-07-07 22:15:13');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (81, '待确认', '2', 16, 10, 0, NULL, 0, '2022-07-07 22:15:13');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (82, '审核通过', '3', 16, 11, 0, NULL, 0, '2022-07-07 22:15:13');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (83, '待补充材料', '4', 16, 12, 0, NULL, 0, '2022-07-07 22:15:13');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (84, '草稿箱', '0', 17, 13, 0, '', 0, '2022-07-07 22:16:22');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (85, '待审核', '1', 17, 14, 0, NULL, 0, '2022-07-07 22:16:22');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (86, '审核拒绝', '2', 17, 15, 0, NULL, 0, '2022-07-07 22:16:22');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (87, '审核通过', '3', 17, 16, 0, NULL, 0, '2022-07-07 22:16:22');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (88, '其它收款', '3', 18, 17, 0, '', 0, '2022-07-07 22:16:22');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (89, '物流收款', '2', 18, 18, 0, NULL, 0, '2022-07-07 22:16:22');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (90, '开票人收款', '1', 18, 19, 0, NULL, 0, '2022-07-07 22:16:22');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (91, '外汇收款', '9', 18, 1007, 0, NULL, 0, '2022-07-07 22:16:22');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (92, 'USD', 'USD', 19, 20, 0, NULL, 0, '2022-07-07 22:16:22');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (93, 'EUR', 'EUR', 19, 21, 0, '', 0, '2022-07-07 22:16:22');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (94, 'SDG', 'SDG', 19, 22, 0, NULL, 0, '2022-07-07 22:16:22');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (95, 'SEK', 'SEK', 19, 23, 0, NULL, 0, '2022-07-07 22:16:22');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (96, 'NZD', 'NZD', 19, 24, 0, NULL, 0, '2022-07-07 22:16:22');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (97, 'CHF', 'CHF', 19, 25, 0, NULL, 0, '2022-07-07 22:16:22');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (98, 'CAD', 'CAD', 19, 26, 0, NULL, 0, '2022-07-07 22:16:22');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (99, 'AUD', 'AUD', 19, 27, 0, NULL, 0, '2022-07-07 22:16:22');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (100, 'AED', 'AED', 19, 28, 0, NULL, 0, '2022-07-07 22:16:22');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (101, 'HKD', 'HKD', 19, 29, 0, NULL, 0, '2022-07-07 22:16:22');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (102, 'CNY', 'CNY', 19, 30, 0, NULL, 0, '2022-07-07 22:16:22');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (103, 'JPY', 'JPY', 19, 31, 0, NULL, 0, '2022-07-07 22:16:22');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (104, 'GBP', 'GBP', 19, 32, 0, NULL, 0, '2022-07-07 22:16:22');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (105, '阿富汗', '101', 20, 33, 0, '', 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (106, '巴林', '102', 20, 34, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (107, '孟加拉国', '103', 20, 35, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (108, '不丹', '104', 20, 36, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (109, '文莱', '105', 20, 37, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (110, '缅甸', '106', 20, 38, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (111, '柬埔寨', '107', 20, 39, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (112, '塞浦路斯', '108', 20, 40, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (113, '朝鲜', '109', 20, 41, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (114, '香港', '110', 20, 2, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (115, '印度', '111', 20, 43, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (116, '印度尼西亚', '112', 20, 44, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (117, '伊朗', '113', 20, 45, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (118, '伊拉克', '114', 20, 46, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (119, '以色列', '115', 20, 47, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (120, '日本', '116', 20, 48, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (121, '约旦', '117', 20, 49, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (122, '科威特', '118', 20, 50, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (123, '老挝', '119', 20, 51, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (124, '黎巴嫩', '120', 20, 52, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (125, '澳门', '121', 20, 3, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (126, '马来西亚', '122', 20, 54, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (127, '马尔代夫', '123', 20, 55, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (128, '蒙古', '124', 20, 56, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (129, '尼泊尔', '125', 20, 57, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (130, '阿曼', '126', 20, 58, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (131, '巴基斯坦', '127', 20, 59, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (132, '巴勒斯坦', '128', 20, 60, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (133, '菲律宾', '129', 20, 61, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (134, '卡塔尔', '130', 20, 62, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (135, '沙特阿拉伯', '131', 20, 63, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (136, '新加坡', '132', 20, 64, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (137, '韩国', '133', 20, 65, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (138, '斯里兰卡', '134', 20, 66, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (139, '叙利亚', '135', 20, 67, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (140, '泰国', '136', 20, 68, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (141, '土耳其', '137', 20, 69, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (142, '阿联酋', '138', 20, 70, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (143, '也门共和国', '139', 20, 71, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (144, '越南', '141', 20, 72, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (145, '中国', '142', 20, 1, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (146, '台澎金马关税区', '143', 20, 74, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (147, '东帝汶', '144', 20, 75, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (148, '哈萨克斯坦', '145', 20, 76, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (149, '吉尔吉斯斯坦', '146', 20, 77, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (150, '塔吉克斯坦', '147', 20, 78, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (151, '土库曼斯坦', '148', 20, 79, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (152, '乌兹别克斯坦', '149', 20, 80, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (153, '亚洲其他国家(地区)', '199', 20, 81, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (154, '阿尔及利亚', '201', 20, 82, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (155, '安哥拉', '202', 20, 83, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (156, '贝宁', '203', 20, 84, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (157, '博茨瓦那', '204', 20, 85, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (158, '布隆迪', '205', 20, 86, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (159, '喀麦隆', '206', 20, 87, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (160, '加那利群岛', '207', 20, 88, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (161, '佛得角', '208', 20, 89, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (162, '中非共和国', '209', 20, 90, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (163, '塞卜泰', '210', 20, 91, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (164, '乍得', '211', 20, 92, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (165, '科摩罗', '212', 20, 93, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (166, '刚果', '213', 20, 94, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (167, '吉布提', '214', 20, 95, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (168, '埃及', '215', 20, 96, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (169, '赤道几内亚', '216', 20, 97, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (170, '埃塞俄比亚', '217', 20, 98, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (171, '加蓬', '218', 20, 99, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (172, '冈比亚', '219', 20, 100, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (173, '加纳', '220', 20, 101, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (174, '几内亚', '221', 20, 102, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (175, '几内亚(比绍)', '222', 20, 103, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (176, '科特迪瓦', '223', 20, 104, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (177, '肯尼亚', '224', 20, 105, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (178, '利比里亚', '225', 20, 106, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (179, '利比亚', '226', 20, 107, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (180, '马达加斯加', '227', 20, 108, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (181, '马拉维', '228', 20, 109, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (182, '马里', '229', 20, 110, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (183, '毛里塔尼亚', '230', 20, 111, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (184, '毛里求斯', '231', 20, 112, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (185, '摩洛哥', '232', 20, 113, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (186, '莫桑比克', '233', 20, 114, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (187, '纳米比亚', '234', 20, 115, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (188, '尼日尔', '235', 20, 116, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (189, '尼日利亚', '236', 20, 117, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (190, '留尼汪', '237', 20, 118, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (191, '卢旺达', '238', 20, 119, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (192, '圣多美和普林西比', '239', 20, 120, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (193, '塞内加尔', '240', 20, 121, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (194, '塞舌尔', '241', 20, 122, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (195, '塞拉利昂', '242', 20, 123, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (196, '索马里', '243', 20, 124, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (197, '南非', '244', 20, 125, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (198, '西撒哈拉', '245', 20, 126, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (199, '苏丹', '246', 20, 127, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (200, '坦桑尼亚', '247', 20, 128, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (201, '多哥', '248', 20, 129, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (202, '突尼斯', '249', 20, 130, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (203, '乌干达', '250', 20, 131, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (204, '布基纳法索', '251', 20, 132, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (205, '民主刚果', '252', 20, 133, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (206, '赞比亚', '253', 20, 134, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (207, '津巴布韦', '254', 20, 135, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (208, '莱索托', '255', 20, 136, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (209, '梅利利亚', '256', 20, 137, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (210, '斯威士兰', '257', 20, 138, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (211, '厄立特里亚', '258', 20, 139, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (212, '马约特岛', '259', 20, 140, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (213, '非洲其他国家(地区)', '299', 20, 141, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (214, '比利时', '301', 20, 142, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (215, '丹麦', '302', 20, 143, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (216, '英国', '303', 20, 144, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (217, '德国', '304', 20, 145, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (218, '法国', '305', 20, 146, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (219, '爱尔兰', '306', 20, 147, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (220, '意大利', '307', 20, 148, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (221, '卢森堡', '308', 20, 149, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (222, '荷兰', '309', 20, 150, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (223, '希腊', '310', 20, 151, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (224, '葡萄牙', '311', 20, 152, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (225, '西班牙', '312', 20, 153, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (226, '阿尔巴尼亚', '313', 20, 154, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (227, '安道尔', '314', 20, 155, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (228, '奥地利', '315', 20, 156, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (229, '保加利亚', '316', 20, 157, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (230, '芬兰', '318', 20, 158, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (231, '直布罗陀', '320', 20, 159, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (232, '冰岛', '322', 20, 160, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (233, '列支敦士登', '323', 20, 161, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (234, '马耳他', '324', 20, 162, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (235, '摩纳哥', '325', 20, 163, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (236, '挪威', '326', 20, 164, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (237, '波兰', '327', 20, 165, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (238, '罗马尼亚', '328', 20, 166, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (239, '圣马力诺', '329', 20, 167, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (240, '瑞典', '330', 20, 168, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (241, '瑞士', '331', 20, 169, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (242, '爱沙尼亚', '334', 20, 170, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (243, '拉脱维亚', '335', 20, 171, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (244, '立陶宛', '336', 20, 172, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (245, '格鲁吉亚', '337', 20, 173, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (246, '亚美尼亚', '338', 20, 174, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (247, '阿塞拜疆', '339', 20, 175, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (248, '白俄罗斯', '340', 20, 176, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (249, '摩尔多瓦', '343', 20, 177, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (250, '俄罗斯联邦', '344', 20, 178, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (251, '乌克兰', '347', 20, 179, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (252, '塞尔维亚', '349', 20, 180, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (253, '斯洛文尼亚', '350', 20, 181, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (254, '克罗地亚', '351', 20, 182, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (255, '捷克共和国', '352', 20, 183, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (256, '斯洛伐克', '353', 20, 184, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (257, '马其顿', '354', 20, 185, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (258, '波斯尼亚-黑塞哥维那共和', '355', 20, 186, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (259, '梵蒂冈城国', '356', 20, 187, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (260, '法罗群岛', '357', 20, 188, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (261, '欧洲其他国家(地区)', '399', 20, 189, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (262, '安提瓜和巴布达', '401', 20, 190, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (263, '阿根廷', '402', 20, 191, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (264, '阿鲁巴岛', '403', 20, 192, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (265, '巴哈马', '404', 20, 193, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (266, '巴巴多斯', '405', 20, 194, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (267, '伯利兹', '406', 20, 195, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (268, '玻利维亚', '408', 20, 196, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (269, '博内尔', '409', 20, 197, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (270, '巴西', '410', 20, 198, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (271, '开曼群岛', '411', 20, 199, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (272, '智利', '412', 20, 200, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (273, '哥伦比亚', '413', 20, 201, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (274, '多米尼亚共和国', '414', 20, 202, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (275, '哥斯达黎加', '415', 20, 203, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (276, '古巴', '416', 20, 204, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (277, '库腊索岛', '417', 20, 205, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (278, '多米尼加共和国', '418', 20, 206, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (279, '厄瓜多尔', '419', 20, 207, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (280, '法属圭亚那', '420', 20, 208, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (281, '格林纳达', '421', 20, 209, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (282, '瓜德罗普', '422', 20, 210, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (283, '危地马拉', '423', 20, 211, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (284, '圭亚那', '424', 20, 212, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (285, '海地', '425', 20, 213, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (286, '洪都拉斯', '426', 20, 214, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (287, '牙买加', '427', 20, 215, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (288, '马提尼克', '428', 20, 216, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (289, '墨西哥', '429', 20, 217, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (290, '蒙特塞拉特', '430', 20, 218, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (291, '尼加拉瓜', '431', 20, 219, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (292, '巴拿马', '432', 20, 220, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (293, '巴拉圭', '433', 20, 221, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (294, '秘鲁', '434', 20, 222, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (295, '波多黎各', '435', 20, 223, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (296, '萨巴', '436', 20, 224, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (297, '圣卢西亚', '437', 20, 225, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (298, '圣马丁岛', '438', 20, 226, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (299, '圣文森特和格林纳丁斯', '439', 20, 227, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (300, '萨尔瓦多', '440', 20, 228, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (301, '苏里南', '441', 20, 229, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (302, '特立尼达和多巴哥', '442', 20, 230, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (303, '特克斯和凯科斯群岛', '443', 20, 231, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (304, '乌拉圭', '444', 20, 232, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (305, '委内瑞拉', '445', 20, 233, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (306, '英属维尔京群岛', '446', 20, 234, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (307, '圣其茨-尼维斯', '447', 20, 235, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (308, '圣皮埃尔和密克隆', '448', 20, 236, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (309, '荷属安地列斯群岛', '449', 20, 237, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (310, '拉丁美洲其他国家(地区)', '499', 20, 238, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (311, '加拿大', '501', 20, 239, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (312, '美国', '502', 20, 240, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (313, '格陵兰', '503', 20, 241, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (314, '百慕大', '504', 20, 242, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (315, '北美洲其他国家(地区)', '599', 20, 243, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (316, '澳大利亚', '601', 20, 244, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (317, '库克群岛', '602', 20, 245, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (318, '斐济', '603', 20, 246, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (319, '盖比群岛', '604', 20, 247, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (320, '马克萨斯群岛', '605', 20, 248, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (321, '瑙鲁', '606', 20, 249, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (322, '新喀里多尼亚', '607', 20, 250, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (323, '瓦努阿图', '608', 20, 251, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (324, '新西兰', '609', 20, 252, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (325, '诺福克岛', '610', 20, 253, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (326, '巴布亚新几内亚', '611', 20, 254, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (327, '社会群岛', '612', 20, 255, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (328, '所罗门群岛', '613', 20, 256, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (329, '汤加', '614', 20, 257, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (330, '土阿莫土群岛', '615', 20, 258, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (331, '土布艾群岛', '616', 20, 259, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (332, '萨摩亚', '617', 20, 260, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (333, '基里巴斯', '618', 20, 261, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (334, '图瓦卢', '619', 20, 262, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (335, '密克罗尼西亚联邦', '620', 20, 263, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (336, '马绍尔群岛', '621', 20, 264, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (337, '帕劳共和国', '622', 20, 265, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (338, '法属波利尼西亚', '623', 20, 266, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (339, '瓦利斯和浮图纳', '625', 20, 267, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (340, '大洋洲其他国家(地区)', '699', 20, 268, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (341, '国(地)别不详的', '701', 20, 269, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (342, '联合国及机构和国际组织', '702', 20, 270, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (343, '中性包装原产国别', '999', 20, 271, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (344, '黑山', '359', 20, 570, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (345, '匈牙利', '260', 20, 571, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (346, '中国台湾', '1001', 20, 4, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (347, '上海', '0', 21, 272, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (348, '浙江', '1', 21, 273, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (349, '宁波', '2', 21, 274, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (350, '杭州', '3', 21, 275, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (351, '江苏', '4', 21, 276, 0, '', 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (352, '山东', '5', 21, 277, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (353, '青岛', '6', 21, 278, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (354, '厦门', '7', 21, 279, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (355, '广东', '8', 21, 280, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (356, '广州', '9', 21, 281, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (357, '深圳', '10', 21, 282, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (358, '肇庆', '11', 21, 283, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (359, '大连', '12', 21, 284, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (360, '哈尔滨', '13', 21, 285, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (361, '福州', '14', 21, 286, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (362, '西安', '15', 21, 287, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (363, '福建', '16', 21, 288, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (364, '辽宁', '17', 21, 289, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (365, '吉林', '18', 21, 290, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (366, '云南', '19', 21, 291, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (367, '北京', '20', 21, 292, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (368, '内蒙古', '21', 21, 293, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (369, '黑龙江', '22', 21, 294, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (370, '新疆', '23', 21, 295, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (371, '广西', '24', 21, 296, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (372, '天津', '25', 21, 297, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (373, '四川', '26', 21, 298, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (374, '湖北', '27', 21, 299, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (375, '河南', '28', 21, 300, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (376, '江西', '29', 21, 301, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (377, '重庆', '30', 21, 302, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (378, '河北', '31', 21, 303, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (379, '湖南', '32', 21, 304, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (380, '安徽', '33', 21, 305, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (381, '海南', '34', 21, 306, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (382, '陕西', '35', 21, 307, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (383, '山西', '36', 21, 308, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (384, '西藏', '37', 21, 309, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (385, '宁夏', '38', 21, 310, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (386, '甘肃', '39', 21, 311, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (387, '贵州', '40', 21, 312, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (388, '青海', '41', 21, 313, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (389, '南京', '42', 21, 314, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (390, '无纸化报关', '0', 22, 314, 0, '', 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (391, '有纸化报关', '1', 22, 315, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (392, '信用证(L/C)', '3', 23, 316, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (393, '托收(D/P, D/A)', '2', 23, 317, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (394, '汇款(如T/T)', '1', 23, 318, 0, '', 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (395, 'C&F', '3', 24, 319, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (396, 'CIF', '2', 24, 320, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (397, 'FOB', '1', 24, 321, 0, '', 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (398, '一般贸易 0110', '110', 25, 329, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (399, '易货贸易 0130', '130', 25, 330, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (400, '来料加工 0214', '214', 25, 331, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (401, '来料以产顶进 0243', '243', 25, 332, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (402, '来料料件内销 0245', '245', 25, 333, 0, '', 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (403, '来料深加工 0255', '255', 25, 334, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (404, '来料余料结转 0258', '258', 25, 335, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (405, '来料料件复出 0265', '265', 25, 336, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (406, '来料料件退换 0300', '300', 25, 337, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (407, '来料成品内销 0345', '345', 25, 338, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (408, '加工设备内销 0446', '446', 25, 339, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (409, '加工设备结转 0456', '456', 25, 340, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (410, '加工设备退运 0466', '466', 25, 341, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (411, '补偿贸易 0513', '513', 25, 342, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (412, '进料对口 0615', '615', 25, 343, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (413, '进料以产顶进 0642', '642', 25, 344, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (414, '进料料件内销 0644', '644', 25, 345, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (415, '进料深加工 0654', '654', 25, 346, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (416, '进料余料结转 0657', '657', 25, 347, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (417, '进料料件复出 0664', '664', 25, 348, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (418, '进料料件退换 0700', '700', 25, 349, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (419, '进料非对口 0715', '715', 25, 350, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (420, '进料成品内销 0744', '744', 25, 351, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (421, '进料边角料内销 0844', '844', 25, 352, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (422, '来料边角料内销 0845', '845', 25, 353, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (423, '进料边角料复出 0864', '864', 25, 354, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (424, '来料边角料复出 0865', '865', 25, 355, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (425, '保税工厂 1215', '1215', 25, 356, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (426, '保税仓库货物 1233', '1233', 25, 357, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (427, '保税区仓储转口 1234', '1234', 25, 358, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (428, '修理物品 1300', '1300', 25, 359, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (429, '出料加工 1427', '1427', 25, 360, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (430, '租赁不满一年 1500', '1500', 25, 361, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (431, '租赁贸易 1523', '1523', 25, 362, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (432, '三资进料加工 2215', '2215', 25, 363, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (433, '暂时进出货物 2600', '2600', 25, 364, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (434, '展览品 2700', '2700', 25, 365, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (435, '货样广告品A 3010', '3010', 25, 366, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (436, '货样广告品B 3039', '3039', 25, 367, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (437, '对外承包出口 3422', '3422', 25, 368, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (438, '无偿援助 3511', '3511', 25, 369, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (439, '无偿军援 3611', '3611', 25, 370, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (440, '有权军事装备 3910', '3910', 25, 371, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (441, '无权军事装备 3939', '3939', 25, 372, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (442, '边境小额 4019', '4019', 25, 373, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (443, '对台小额 4039', '4039', 25, 374, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (444, '来料成品退换 4400', '4400', 25, 375, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (445, '退运货物 4561', '4561', 25, 376, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (446, '进料成品退换 4600', '4600', 25, 377, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (447, '后续补税 9700', '9700', 25, 378, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (448, '其他贸易 9739', '9739', 25, 379, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (449, '其他 9900', '9900', 25, 380, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (450, '木箱', '木箱', 26, 322, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (451, '纸箱', '纸箱', 26, 323, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (452, '桶装', '桶装', 26, 324, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (453, '散装', '散装', 26, 325, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (454, '托盘', '托盘', 26, 326, 0, '', 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (455, '包', '包', 26, 327, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (456, '其他', '其他', 26, 328, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (457, '水路运输', '水路运输', 27, 381, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (458, '铁路运输', '铁路运输', 27, 382, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (459, '汽车运输', '汽车运输', 27, 383, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (460, '航空运输', '航空运输', 27, 384, 0, '', 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (461, '邮件运输', '邮件运输', 27, 385, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (462, '其他运输', '其他运输', 27, 386, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (463, '草稿箱', '0', 28, 387, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (464, '进行中', '1', 28, 388, 0, '', 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (465, '已完成', '2', 28, 389, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (466, '无木', '无木', 29, 391, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (467, '非原木（如胶合板、复合板等）', '非原木（如胶合板、复合板等）', 29, 392, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (468, '原木（有IPPC标识）', '原木（有IPPC标识）', 29, 393, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (469, '原木（无标识）', '原木（无标识）', 29, 394, 0, '', 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (470, '台', '台', 30, 473, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (471, '个', '个', 30, 474, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (472, '件', '件', 30, 475, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (473, '支', '支', 30, 476, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (474, '座', '座', 30, 477, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (475, '千克', '千克', 30, 478, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (476, '套', '套', 30, 479, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (477, '箱', '箱', 30, 480, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (478, '辆', '辆', 30, 481, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (479, '只', '只', 30, 482, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (514, '斤', '斤', 30, 517, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (515, '磅', '磅', 30, 518, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (516, '担', '担', 30, 519, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (517, '两', '两', 30, 520, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (518, '盎司', '盎司', 30, 521, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (519, '克拉', '克拉', 30, 522, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (520, '码', '码', 30, 523, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (521, '英寸', '英寸', 30, 524, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (522, '寸', '寸', 30, 525, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (523, '升', '升', 30, 526, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (524, '毫升', '毫升', 30, 527, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (525, '加仑', '加仑', 30, 528, 0, '', 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (526, '批', '批', 30, 529, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (527, '罐', '罐', 30, 530, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (528, '桶', '桶', 30, 531, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (529, '扎', '扎', 30, 532, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (530, '包', '包', 30, 533, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (531, '箩', '箩', 30, 534, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (532, '筐', '筐', 30, 535, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (533, '打', '打', 30, 536, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (534, '匹', '匹', 30, 537, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (535, '册', '册', 30, 538, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (536, '本', '本', 30, 539, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (537, '发', '发', 30, 540, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (538, '枚', '枚', 30, 541, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (539, '捆', '捆', 30, 542, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (540, '粒', '粒', 30, 543, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (541, '盒', '盒', 30, 544, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (542, '瓶', '瓶', 30, 545, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (543, '部', '部', 30, 546, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (544, '樘', '樘', 30, 547, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (545, '面', '面', 30, 548, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (546, '颗', '颗', 30, 549, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (547, '道', '道', 30, 550, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (548, '货款收入', '1', 31, 551, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (549, '其它收入', '2', 31, 552, 0, '', 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (550, '个人账号', '3', 32, 555, 0, '', 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (551, '离岸账号', '2', 32, 554, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (552, '国内账号', '1', 32, 553, 0, NULL, 0, '2022-07-07 22:16:23');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (572, '默认生产单位', '1', 37, 579, 0, NULL, 0, '2022-07-07 22:16:24');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (573, '用单抬头报关', '2', 37, 580, 0, '', 0, '2022-07-07 22:16:24');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (574, '无品牌', '0', 38, 582, 0, NULL, 0, '2022-07-07 22:16:24');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (575, '境内自主品牌', '1', 38, 583, 0, NULL, 0, '2022-07-07 22:16:24');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (576, '境内收购品牌', '2', 38, 584, 0, NULL, 0, '2022-07-07 22:16:24');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (577, '境外品牌(贴牌生产)', '3', 38, 585, 0, '', 0, '2022-07-07 22:16:24');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (578, '境外品牌(其它)', '4', 38, 586, 0, NULL, 0, '2022-07-07 22:16:24');
INSERT INTO `admin_dictionary` (`id`, `name`, `code`, `parentid`, `sorting`, `status`, `remark`, `hidden`, `createtime`) VALUES (579, '出口货物在最终目的国(地区)不享受优惠关税', '0', 39, 587, 0, NULL, 0, '2022-07-07 22:16:24');
COMMIT;

-- ----------------------------
-- Table structure for admin_login_logs
-- ----------------------------
DROP TABLE IF EXISTS `admin_login_logs`;
CREATE TABLE `admin_login_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT '0' COMMENT '用户ID',
  `username` varchar(30) DEFAULT NULL COMMENT '用户名',
  `ip` varchar(20) DEFAULT NULL COMMENT 'IP地址',
  `ua` text COMMENT 'ua信息',
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=163 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of admin_login_logs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_menu`;
CREATE TABLE `admin_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentid` int(11) DEFAULT '0',
  `code` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `icon` varchar(30) DEFAULT NULL,
  `target` varchar(20) DEFAULT 'all',
  `url` varchar(120) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `sort` int(11) DEFAULT '0',
  `remark` varchar(50) DEFAULT NULL,
  `hidden` int(11) DEFAULT '0',
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of admin_menu
-- ----------------------------
BEGIN;
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (1, 0, '', '系统设置', 'icon-cog3', 'all', '', 0, 99000, '', 0, '2022-03-06 19:39:01');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (9, 1, 'admin/menus/index', '菜单管理', 'icon-lan2', 'all', '/admin/menus/index', 0, 99001, '', 0, '2022-03-06 20:23:11');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (10, 1, 'admin/dict/index', '字典管理', 'icon-bookmark', 'all', '/admin/dict/index', 0, 99002, '', 0, '2022-03-06 20:56:15');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (12, 0, '', '用户管理', 'icon-tree6', 'all', '', 0, 98000, '', 0, '2022-03-07 23:32:45');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (13, 12, 'account/staff/index', '员工管理', '', 'all', '/account/staff/index', 0, 98001, '', 0, '2022-03-07 23:35:05');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (15, 1, 'admin/roles/index', '角色管理', 'icon-users2', 'all', '/admin/roles/index', 0, 99003, '', 0, '2022-03-08 20:53:48');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (16, 1, 'admin/powers/index', '权限设置', 'icon-key', 'all', '/admin/powers/index', 0, 99004, '', 0, '2022-03-08 20:55:39');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (18, 1, 'admin/backup/index', '数据备份', 'icon-floppy-disks', 'all', '/admin/backup/index', 0, 99006, '', 0, '2022-03-09 17:34:48');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (19, 0, '', '准备出货', 'icon-clipboard2', 'all', '', 0, 31000, '', 0, '2022-07-07 22:33:28');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (20, 0, '', '业务管理', 'icon-sphere', 'all', '', 0, 32000, '', 0, '2022-07-07 22:34:43');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (21, 0, '', '资金管理', ' icon-coins', 'all', '', 0, 33000, '', 0, '2022-07-07 22:35:52');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (22, 0, 'data/census/index', '数据统计', 'icon-stats-dots', 'all', '/data/census/index', 0, 34000, '', 0, '2022-07-07 22:37:03');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (23, 0, '', '客户管理', 'icon-user-tie', 'all', '', 0, 35000, '', 0, '2022-07-07 22:42:41');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (24, 19, 'setup/products/index', '产品管理', '', 'all', '/setup/products/index', 0, 31001, '', 0, '2022-07-07 22:44:21');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (25, 19, 'setup/invoicer/index', '开票人管理', '', 'all', '/setup/invoicer/index', 0, 31002, '', 0, '2022-07-07 22:44:58');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (26, 19, 'setup/receiver/index', '收款人管理', '', 'all', '/setup/receiver/index', 0, 31003, '', 0, '2022-07-07 22:45:41');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (27, 19, 'setup/payer/index', '付款人管理', '', 'all', '/setup/payer/index', 0, 31004, '', 0, '2022-07-07 22:46:07');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (28, 19, 'setup/overseas/index', '境外收货人管理', '', 'all', '/setup/overseas/index', 0, 31005, '', 0, '2022-07-07 22:46:48');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (29, 20, 'declares/project/index', '出口业务', '', 'all', '/declares/project/index', 0, 32001, '', 0, '2022-07-07 22:47:31');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (30, 20, 'declares/import/index', '进口业务', '', 'all', '/declares/import/index', 0, 32002, '', 0, '2022-07-07 22:47:58');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (31, 20, 'declares/entry/attach', '文件管理', '', 'all', '/declares/entry/attach', 0, 32003, '', 0, '2022-07-07 22:52:15');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (32, 20, 'declares/stamp/index', '盖章管理', '', 'all', '/declares/stamp/index', 0, 32004, '', 0, '2022-07-07 22:52:41');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (33, 21, 'declares/capital/balance', '资金首页', '', 'all', '/declares/capital/balance', 0, 33001, '', 0, '2022-07-07 22:57:02');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (34, 21, 'declares/receipt/income', '收入明细', '', 'all', '/declares/receipt/income', 0, 33002, '', 0, '2022-07-07 22:57:43');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (35, 21, 'declares/payment/payment', '支付明细', '', 'all', '/declares/payment/payment', 0, 33003, '', 0, '2022-07-07 22:58:11');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (36, 21, 'declares/paymentcl/paymentcl', '成本支付', '', 'all', '/declares/paymentcl/paymentcl', 0, 33004, '', 0, '2022-07-07 22:58:40');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (37, 21, 'declares/vii/vdata', '增票管理', '', 'all', '/declares/vii/vdata', 0, 33005, '', 0, '2022-07-07 22:59:03');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (38, 21, 'data/census/fexchange', '收汇业务', '', 'all', '/data/census/fexchange', 0, 33006, '', 0, '2022-07-07 22:59:32');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (39, 23, 'setup/customer/index', '客户列表', '', 'all', '/setup/customer/index', 0, 35002, '', 0, '2022-07-07 23:19:20');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (40, 23, 'setup/crm/index', '客户关系', '', 'all', '/setup/crm/index', 0, 35003, '', 0, '2022-07-07 23:21:20');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (41, 0, '', '日志管理', 'icon-blog', 'all', '', 0, 41000, '', 0, '2022-07-07 23:50:18');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (42, 41, 'logs/sysLogin/index', '登录日志', '', 'all', '/logs/sysLogin/index', 0, 41001, '', 0, '2022-07-07 23:50:51');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (43, 41, 'logs/operations/index', '操作日志', '', 'all', '/logs/operations/index', 0, 41002, '', 0, '2022-07-07 23:51:21');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (44, 23, 'setup/company/index', '公司列表', '', 'all', '/setup/company/index', 0, 35001, '', 0, '2022-07-15 18:34:19');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (45, 12, 'account/cust/index', '客户帐户', '', 'all', '/account/cust/index', 0, 98002, '', 0, '2022-07-15 19:31:12');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (46, 0, '', '通知管理', 'icon-bubbles8', 'all', '', 0, 99001, '', 1, '2022-09-06 13:30:19');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (47, 46, 'notices/project', '业务消息', '', 'all', '/notices/project', 0, 99002, '', 1, '2022-09-06 15:28:50');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (48, 46, 'notices/entryform', '报关资料', '', 'all', '/notices/entryform', 0, 99003, '', 1, '2022-09-06 15:30:42');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (49, 46, 'notices/vii', '增票信息', '', 'all', '/notices/vii', 0, 99004, '', 1, '2022-09-06 15:31:39');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (50, 46, 'notices/receipt', '收入情况', '', 'all', '/notices/receipt', 0, 99005, '', 1, '2022-09-06 15:32:37');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (51, 46, 'notices/receiptclaim', '收入申领', '', 'all', '/notices/receiptclaim', 0, 99006, '', 1, '2022-09-06 15:32:37');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (52, 46, 'notices/payment', '支付情况', '', 'all', '/notices/payment', 0, 99007, '', 1, '2022-09-06 15:32:37');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (53, 46, 'notices/paymentcl', '成本支付', '', 'all', '/notices/paymentcl', 0, 99008, '', 1, '2022-09-06 15:32:37');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (54, 46, 'notices/products', '产品消息', '', 'all', '/notices/products', 0, 99009, '', 1, '2022-09-06 15:32:37');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (55, 46, 'notices/invoicer', '开票人', '', 'all', '/notices/invoicer', 0, 99010, '', 1, '2022-09-06 15:32:37');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (56, 46, 'notices/stamp', '盖章', '', 'all', '/notices/stamp', 0, 99011, '', 1, '2022-09-06 15:32:37');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (57, 46, 'notices/user', '新用户', '', 'all', '/notices/user', 0, 99012, '', 1, '2022-09-06 15:32:37');
INSERT INTO `admin_menu` (`id`, `parentid`, `code`, `title`, `icon`, `target`, `url`, `status`, `sort`, `remark`, `hidden`, `createtime`) VALUES (58, 46, 'message/notify/index', '通知中心', '', 'all', '/message/notify/index', 0, 99013, '', 1, '2022-09-06 15:51:16');
COMMIT;

-- ----------------------------
-- Table structure for admin_operation
-- ----------------------------
DROP TABLE IF EXISTS `admin_operation`;
CREATE TABLE `admin_operation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menuid` int(11) DEFAULT '0',
  `name` varchar(30) DEFAULT NULL COMMENT '操作名称',
  `code` varchar(50) DEFAULT NULL COMMENT '操作代码',
  `uri` varchar(120) DEFAULT NULL COMMENT 'url',
  `state` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of admin_operation
-- ----------------------------
BEGIN;
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (13, 9, '列表', 'index', 'admin/menus/index', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (14, 9, '新增', 'create', 'admin/menus/create', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (15, 9, '编辑', 'edit', 'admin/menus/edit', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (16, 9, '保存', 'save', 'admin/menus/save', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (17, 9, '删除', 'delete', 'admin/menus/delete', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (18, 10, '列表', 'index', 'admin/dict/index', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (19, 10, '新增', 'create', 'admin/dict/create', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (20, 10, '编辑', 'edit', 'admin/dict/edit', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (21, 10, '保存', 'save', 'admin/dict/save', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (22, 10, '删除', 'delete', 'admin/dict/delete', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (28, 13, '列表', 'index', 'account/staff/index', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (29, 13, '新增', 'create', 'account/staff/create', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (30, 13, '编辑', 'edit', 'account/staff/edit', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (31, 13, '保存', 'save', 'account/staff/save', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (32, 13, '删除', 'delete', 'account/staff/delete', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (33, 13, '重置密码', 'spasswd', 'account/staff/spasswd', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (34, 13, '启用/禁用', 'disabled_enabled', 'account/staff/disabled_enabled', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (35, 15, '列表', 'index', 'admin/roles/index', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (36, 15, '新增', 'create', 'admin/roles/create', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (37, 15, '编辑', 'update', 'admin/roles/update', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (38, 15, '保存', 'save', 'admin/roles/save', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (39, 15, '删除', 'delete', 'admin/roles/delete', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (40, 16, '列表', 'index', 'admin/powers/index', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (41, 16, '设置', 'set_actions', 'admin/powers/set_actions', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (42, 17, '列表', 'index', 'device/index', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (43, 18, '备份', 'backupall', 'admin/backup/backupall', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (44, 18, '还原', 'restore', 'admin/backup/restore', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (45, 18, '列表', 'index', 'admin/backup/index', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (46, 18, '删除', 'delFile', 'admin/backup/delfile', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (47, 16, '角色', 'roles_actions', 'admin/powers/roles_actions', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (48, 39, '列表', 'index', 'setup/customer/index', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (49, 39, '新增', 'create', 'setup/customer/create', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (50, 39, '编辑', 'edit', 'setup/customer/edit', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (51, 39, '保存', 'save', 'setup/customer/save', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (52, 39, '删除', 'delete', 'setup/customer/delete', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (53, 39, '启用/禁用', 'setup', 'setup/customer/setup', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (54, 44, '列表', 'index', 'setup/company/index', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (55, 44, '新增', 'create', 'setup/company/create', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (56, 44, '编辑', 'edit', 'setup/company/edit', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (57, 44, '保存', 'save', 'setup/company/save', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (58, 44, '删除', 'delete', 'setup/company/delete', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (59, 45, '列表', 'index', 'account/cust/index', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (60, 45, '新增', 'create', 'account/cust/create', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (61, 45, '编辑', 'edit', 'account/cust/edit', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (62, 45, '保存', 'save', 'account/cust/save', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (63, 45, '删除', 'delete', 'account/cust/delete', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (64, 45, '重置密码', 'spasswd', 'account/cust/spasswd', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (65, 45, '启用/禁用', 'disabled_enabled', 'account/cust/disabled_enabled', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (66, 45, '激活', 'active', 'account/cust/active', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (67, 24, '列表', 'index', 'setup/products/index', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (68, 24, '新增', 'create', 'setup/products/create', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (69, 24, '编辑', 'edit', 'setup/products/edit', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (70, 24, '详情', 'detail', 'setup/products/detail', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (71, 24, '提交', 'submits', 'setup/products/submits', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (72, 24, '审核', 'approve', 'setup/products/approve', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (73, 24, '确认', 'confirm', 'setup/products/confirm', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (74, 24, '补充资料', 'tosuplemt', 'setup/products/tosuplemt', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (75, 24, '删除', 'delete', 'setup/products/delete', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (76, 24, '下架', 'off_shelves', 'setup/products/off_shelves', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (77, 24, '复制', 'copy', 'setup/products/copy', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (78, 25, '列表', 'index', 'setup/invoicer/index', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (79, 25, '新增', 'create', 'setup/invoicer/create', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (80, 25, '编辑', 'edit', 'setup/invoicer/edit', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (81, 25, '详情', 'detail', 'setup/invoicer/detail', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (82, 25, '提交', 'save', 'setup/invoicer/save', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (83, 25, '删除', 'delete', 'setup/invoicer/delete', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (84, 25, '拒绝', 'refuse', 'setup/invoicer/refuse', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (85, 25, '审核', 'approve', 'setup/invoicer/approve', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (86, 26, '列表', 'index', 'setup/receiver/index', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (87, 26, '新增', 'create', 'setup/receiver/create', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (88, 26, '编辑', 'edit', 'setup/receiver/edit', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (89, 26, '详情', 'detail', 'setup/receiver/detail', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (90, 26, '删除', 'delete', 'setup/receiver/delete', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (92, 27, '列表', 'index', 'setup/payer/index', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (93, 27, '新增', 'create', 'setup/payer/create', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (94, 27, '编辑', 'edit', 'setup/payer/edit', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (95, 27, '详情', 'detail', 'setup/payer/detail', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (96, 27, '删除', 'delete', 'setup/payer/delete', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (98, 28, '列表', 'index', 'setup/overseas/index', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (99, 28, '新增', 'create', 'setup/overseas/create', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (100, 28, '编辑', 'edit', 'setup/overseas/edit', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (101, 28, '详情', 'detail', 'setup/overseas/detail', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (102, 28, '删除', 'delete', 'setup/overseas/delete', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (104, 42, '列表', 'index', 'logs/syslogin/index', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (105, 43, '列表', 'index', 'logs/operations/index', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (106, 29, '列表', 'index', 'declares/project/index', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (107, 29, '详情', 'view', 'declares/project/view', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (108, 29, '编辑', 'update', 'declares/project/update', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (109, 30, '列表', 'index', 'declares/import/index', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (110, 30, '新增', 'create', 'declares/import/create', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (111, 30, '编辑', 'update', 'declares/import/update', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (112, 30, '详情', 'view', 'declares/import/view', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (113, 31, '列表', 'attach', 'declares/entry/attach', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (114, 32, '列表', 'index', 'declares/stamp/index', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (115, 32, '新增', 'create', 'declares/stamp/create', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (116, 32, '查看', 'view', 'declares/stamp/view', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (117, 33, '列表', 'balance', 'declares/capital/balance', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (118, 34, '列表', 'income', 'declares/receipt/income', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (119, 35, '列表', 'payment', 'declares/payment/payment', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (120, 36, '列表', 'paymentcl', 'declares/paymentcl/paymentcl', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (121, 37, '列表', 'vdata', 'declares/vii/vdata', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (122, 38, '列表', 'fexchange', 'data/census/fexchange', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (123, 22, '列表', 'index', 'data/census/index', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (124, 47, '列表', 'project', 'notices/project', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (125, 48, '列表', 'entryform', 'notices/entryform', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (126, 49, '列表', 'vii', 'notices/vii', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (127, 50, '列表', 'receipt', 'notices/receipt', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (128, 51, '列表', 'receiptclaim', 'notices/receiptclaim', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (129, 52, '列表', 'payment', 'notices/payment', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (130, 53, '列表', 'paymentcl', 'notices/paymentcl', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (131, 54, '列表', 'products', 'notices/products', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (132, 55, '列表', 'invoicer', 'notices/invoicer', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (133, 56, '列表', 'stamp', 'notices/stamp', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (134, 57, '列表', 'user', 'notices/user', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (135, 58, '列表', 'index', 'message/notify/index', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (136, 24, '绑定开票人', 'bind_invoicer', 'setup/products/bind_invoicer', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (137, 29, '退回修改', 'back_entry', 'declares/project/back_entry', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (138, 29, '上传单证', 'upload_entry', 'declares/project/upload_entry', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (139, 29, '下载/上传备证单', 'download_entry', 'declares/project/download_entry', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (140, 32, '删除', 'delete', 'declares/stamp/delete', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (141, 32, '添加到备案单证', 'beiz', 'declares/stamp/beiz', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (142, 32, '保存/合并盖章', 'save', 'declares/stamp/save', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (143, 59, '新增', 'create', 'declares/vii/create', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (144, 59, '编辑', 'update', 'declares/vii/update', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (145, 59, '审核', 'confirm', 'declares/vii/confirm', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (146, 59, '确认', 'accept', 'declares/vii/accept', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (147, 59, '转出', 'rollcopy', 'declares/vii/rollcopy', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (148, 59, '删除', 'delete', 'declares/vii/delete', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (171, 63, '审核', 'approve', 'declares/claim/approve', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (172, 63, '取消', 'cancel', 'declares/claim/cancel', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (173, 63, '删除', 'delete', 'declares/claim/delete', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (174, 63, '更新', 'update', 'declares/claim/update', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (175, 29, '新增', 'create', 'declares/project/create', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (176, 60, '收入收齐', 'receipt_finished', 'declares/project/receipt_finished', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (177, 40, '列表', 'index', 'setup/crm/index', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (178, 40, '新增', 'create', 'setup/crm/create', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (179, 40, '编辑', 'update', 'setup/crm/update', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (180, 40, '跟进', 'track', 'setup/crm/track', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (181, 40, '删除', 'delete', 'setup/crm/delete', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (182, 40, '保存', 'save', 'setup/crm/save', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (183, 40, '详情', 'view', 'setup/crm/view', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (184, 60, '审核', 'approve', 'declares/receipt/approve', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (185, 64, '列表', 'index', 'account/uncredited/index', 0);
INSERT INTO `admin_operation` (`id`, `menuid`, `name`, `code`, `uri`, `state`) VALUES (186, 64, '编辑', 'edit', 'account/uncredited/edit', 0);
COMMIT;

-- ----------------------------
-- Table structure for admin_operation_logs
-- ----------------------------
DROP TABLE IF EXISTS `admin_operation_logs`;
CREATE TABLE `admin_operation_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL COMMENT '操作类型',
  `controller` varchar(50) DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `uri` text COMMENT 'JSON数据',
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30122 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of admin_operation_logs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for admin_power
-- ----------------------------
DROP TABLE IF EXISTS `admin_power`;
CREATE TABLE `admin_power` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `operation_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=473 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of admin_power
-- ----------------------------
BEGIN;
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (2, 1, 10, 18);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (3, 1, 13, 28);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (7, 1, 13, 29);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (9, 1, 13, 30);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (10, 1, 13, 31);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (11, 1, 13, 32);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (14, 1, 10, 22);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (15, 1, 15, 39);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (16, 1, 15, 38);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (17, 1, 10, 21);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (22, 1, 10, 19);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (23, 1, 10, 20);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (24, 1, 15, 37);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (25, 1, 15, 36);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (26, 1, 15, 35);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (27, 1, 16, 40);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (28, 1, 16, 41);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (48, 1, 18, 43);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (49, 1, 18, 44);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (50, 1, 18, 45);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (51, 1, 18, 46);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (53, 1, 16, 47);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (55, 16, 9, 13);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (56, 16, 9, 14);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (57, 1, 45, 59);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (58, 1, 13, 33);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (59, 1, 13, 34);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (60, 1, 45, 66);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (61, 1, 45, 61);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (62, 1, 45, 60);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (63, 1, 45, 62);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (64, 1, 45, 63);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (65, 1, 45, 64);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (66, 1, 45, 65);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (67, 1, 43, 105);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (68, 1, 42, 104);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (69, 1, 24, 67);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (70, 1, 24, 68);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (71, 1, 24, 69);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (72, 1, 24, 70);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (73, 1, 24, 71);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (74, 1, 24, 72);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (75, 1, 24, 77);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (76, 1, 24, 76);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (77, 1, 24, 75);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (78, 1, 24, 74);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (79, 1, 24, 73);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (80, 1, 24, 136);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (81, 1, 25, 85);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (82, 1, 25, 84);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (83, 1, 25, 83);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (84, 1, 25, 82);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (85, 1, 25, 81);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (86, 1, 25, 80);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (87, 1, 25, 79);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (88, 1, 25, 78);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (89, 1, 26, 90);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (90, 1, 26, 89);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (91, 1, 26, 88);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (92, 1, 26, 87);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (93, 1, 26, 86);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (94, 1, 27, 96);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (95, 1, 27, 95);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (96, 1, 27, 94);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (97, 1, 27, 93);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (98, 1, 27, 92);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (99, 1, 28, 102);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (100, 1, 28, 101);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (101, 1, 28, 100);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (102, 1, 28, 99);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (103, 1, 28, 98);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (104, 1, 29, 106);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (105, 1, 29, 107);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (106, 1, 29, 108);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (107, 1, 29, 137);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (108, 1, 29, 138);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (109, 1, 29, 139);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (110, 1, 29, 175);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (111, 1, 30, 109);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (112, 1, 30, 110);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (113, 1, 30, 111);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (114, 1, 30, 112);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (115, 1, 31, 113);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (116, 1, 32, 114);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (117, 1, 32, 115);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (118, 1, 32, 116);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (119, 1, 32, 140);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (120, 1, 32, 141);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (121, 1, 32, 142);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (122, 1, 59, 143);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (123, 1, 59, 144);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (124, 1, 59, 145);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (125, 1, 59, 146);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (126, 1, 59, 147);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (127, 1, 59, 148);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (128, 1, 59, 149);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (129, 1, 59, 150);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (130, 1, 59, 151);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (131, 1, 59, 152);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (132, 1, 60, 153);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (133, 1, 60, 154);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (134, 1, 60, 155);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (135, 1, 60, 156);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (136, 1, 60, 157);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (137, 1, 60, 158);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (138, 1, 60, 176);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (139, 1, 61, 159);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (140, 1, 61, 160);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (141, 1, 61, 161);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (142, 1, 61, 162);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (143, 1, 61, 163);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (144, 1, 61, 164);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (145, 1, 61, 165);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (146, 1, 62, 166);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (147, 1, 62, 167);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (148, 1, 62, 168);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (149, 1, 62, 169);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (150, 1, 62, 170);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (151, 1, 63, 171);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (152, 1, 63, 172);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (153, 1, 63, 173);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (154, 1, 63, 174);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (155, 1, 33, 117);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (156, 1, 34, 118);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (157, 1, 35, 119);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (158, 1, 36, 120);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (159, 1, 37, 121);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (160, 1, 38, 122);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (161, 1, 22, 123);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (162, 1, 44, 54);
INSERT INTO `admin_power` (`id`, `role_id`, `menu_id`, `operation_id`) VALUES (163, 1, 44, 55);
COMMIT;

-- ----------------------------
-- Table structure for admin_roles
-- ----------------------------
DROP TABLE IF EXISTS `admin_roles`;
CREATE TABLE `admin_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(32) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL,
  `creatorId` int(11) DEFAULT '0',
  `asscess` varchar(20) DEFAULT 'all',
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of admin_roles
-- ----------------------------
BEGIN;
INSERT INTO `admin_roles` (`id`, `code`, `name`, `remark`, `creatorId`, `asscess`, `createtime`) VALUES (1, 'admin', '系统管理员', '系统管理员', 0, 'all', '2022-03-08 18:30:02');
COMMIT;

-- ----------------------------
-- Table structure for admin_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `realname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `qq` varchar(255) DEFAULT NULL,
  `customerid` int(11) DEFAULT NULL,
  `companyname` varchar(255) DEFAULT NULL,
  `products` varchar(255) DEFAULT NULL,
  `percentage` decimal(10,2) DEFAULT NULL COMMENT '提成',
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(20) DEFAULT NULL,
  `openid` varchar(64) DEFAULT NULL,
  `nickname` varchar(32) DEFAULT NULL,
  `avatarUrl` varchar(256) DEFAULT NULL,
  `province` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `activation_token` varchar(32) DEFAULT NULL,
  `companyid` int(11) DEFAULT '0',
  `activated` int(11) DEFAULT '0',
  `source` varchar(10) DEFAULT 'WEB',
  `login_lasttime` datetime DEFAULT NULL,
  `last_ip` varchar(20) DEFAULT NULL,
  `power` varchar(500) DEFAULT NULL,
  `remark` varchar(500) DEFAULT NULL,
  `post` varchar(20) DEFAULT NULL COMMENT '职位',
  `updatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` varchar(255) CHARACTER SET armscii8 NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `fkcustomer` (`customerid`)
) ENGINE=InnoDB AUTO_INCREMENT=1551839584 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_users
-- ----------------------------
BEGIN;
INSERT INTO `admin_users` (`id`, `username`, `token`, `password`, `status`, `realname`, `email`, `tel`, `phone`, `qq`, `customerid`, `companyname`, `products`, `percentage`, `createtime`, `type`, `openid`, `nickname`, `avatarUrl`, `province`, `city`, `activation_token`, `companyid`, `activated`, `source`, `login_lasttime`, `last_ip`, `power`, `remark`, `post`, `updatetime`, `comment`) VALUES (1551839153, 'admin', NULL, 'e10adc3949ba59abbe56e057f20f883e', 0, '系统管理员', 'dlj8991@163.com', '15823045536', NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-28 21:01:10', 'ent', NULL, '系统管理员', NULL, NULL, NULL, NULL, NULL, 1, 'WEB', '2022-10-22 09:14:52', '127.0.0.1', 'all', '', NULL, '2019-04-26 14:07:17', '');
COMMIT;

-- ----------------------------
-- Table structure for admin_users_role
-- ----------------------------
DROP TABLE IF EXISTS `admin_users_role`;
CREATE TABLE `admin_users_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1102 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of admin_users_role
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(32) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `companyid` int(11) DEFAULT '0',
  `category` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL COMMENT '附件',
  `imgs` text COMMENT '图片组',
  `outlink` varchar(500) DEFAULT NULL COMMENT '外链',
  `desc` text,
  `createtor` varchar(30) DEFAULT NULL COMMENT '创建者',
  `isread` int(11) DEFAULT '0' COMMENT '阅读数',
  `istop` int(11) DEFAULT '0' COMMENT '是否置顶',
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of articles
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for balance_log
-- ----------------------------
DROP TABLE IF EXISTS `balance_log`;
CREATE TABLE `balance_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customerid` int(11) unsigned NOT NULL DEFAULT '0',
  `balance_from` float(15,2) NOT NULL DEFAULT '0.00',
  `amount` float(15,2) NOT NULL DEFAULT '0.00',
  `balance_to` float(15,2) NOT NULL DEFAULT '0.00',
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `companyid` int(11) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `index` (`customerid`,`companyid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4012 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of balance_log
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for company
-- ----------------------------
DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(32) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `ename` varchar(500) DEFAULT NULL COMMENT '英文名称',
  `shortname` varchar(30) DEFAULT NULL COMMENT '公司简称',
  `code` varchar(30) DEFAULT NULL COMMENT '企业代码',
  `province` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `district` varchar(30) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL COMMENT '公司地址',
  `enaddr` varchar(256) DEFAULT NULL COMMENT '英文地址',
  `legal` varchar(20) DEFAULT NULL COMMENT '法人代表',
  `creditno` varchar(32) DEFAULT NULL COMMENT '信用代码/税号',
  `cardno` varchar(32) DEFAULT NULL COMMENT '证件编号',
  `founddt` varchar(20) DEFAULT NULL COMMENT '成立日期',
  `scope` varchar(500) DEFAULT NULL COMMENT '经营范围',
  `acname` varchar(64) DEFAULT NULL COMMENT '开户名称',
  `bkname` varchar(30) DEFAULT NULL COMMENT '开户银行',
  `account` varchar(20) DEFAULT NULL COMMENT '银行帐户',
  `expressdt` varchar(20) DEFAULT NULL COMMENT '到期日期',
  `versions` varchar(20) DEFAULT '' COMMENT '版本',
  `amount` decimal(2,0) DEFAULT '0' COMMENT '帐户余额',
  `remark` varchar(500) DEFAULT NULL COMMENT '备注',
  `logo` varchar(256) DEFAULT NULL COMMENT 'logo路径',
  `licence_url` varchar(256) DEFAULT NULL COMMENT '营业执照',
  `contact` varchar(20) DEFAULT NULL COMMENT '联系方式',
  `fax` varchar(20) DEFAULT NULL COMMENT '传傎',
  `domain` varchar(20) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '状态(-1:退回, 0: 待审核, 1:已审核,2:停用)',
  `reason` varchar(100) DEFAULT NULL COMMENT '退回原因',
  `agent` int(11) DEFAULT '0' COMMENT '客户数量',
  `icq` varchar(20) DEFAULT NULL COMMENT '海关代码',
  `stamp_zh_en` varchar(150) DEFAULT NULL COMMENT '中英文圆形章',
  `stamp_bgz` varchar(150) DEFAULT NULL COMMENT '报关专用章',
  `aprovedt` datetime DEFAULT NULL COMMENT '审核日期',
  `mini` int(11) NOT NULL DEFAULT '0',
  `qrcode` varchar(64) NOT NULL,
  `createdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of company
-- ----------------------------
BEGIN;
INSERT INTO `company` (`id`, `guid`, `name`, `ename`, `shortname`, `code`, `province`, `city`, `district`, `address`, `enaddr`, `legal`, `creditno`, `cardno`, `founddt`, `scope`, `acname`, `bkname`, `account`, `expressdt`, `versions`, `amount`, `remark`, `logo`, `licence_url`, `contact`, `fax`, `domain`, `status`, `reason`, `agent`, `icq`, `stamp_zh_en`, `stamp_bgz`, `aprovedt`, `mini`, `qrcode`, `createdate`) VALUES (1, '6847a6299a0128bbac9b48260ae385e5', '上海ETRADE服务有限公司', 'SHANGHAI ETRADE CO.,LTD', '', 'ETRADE', NULL, NULL, NULL, '上海市静安区江场西路', 'ROOM1111 BUILDING ', '黄', '91310115KBH79', NULL, NULL, '', '一', '中国银行股份有', '', '2030-05-11', '', 0, NULL, '/uploads/etrades/png/20220916/abf4a0485918fd0c27b344c4556c3e8c.png', '/uploads/etrades/jpg/20220908/7a0f02006d9636d6b2979890002c7599.jpg', '61119980', NULL, 'etrade', 1, 'erqwerqwer', 999, NULL, '/uploads/etrades/png/20221015/f90b4e3ff8c3b73ec863cb1c1fec60fc.png', '/uploads/etrades/png/20221015/cb4ccf161df747e06b1a7be459ab7cdf.png', NULL, 1, '/uploads/qr/MQ==.png', '2018-12-14 10:40:24');
COMMIT;

-- ----------------------------
-- Table structure for crm
-- ----------------------------
DROP TABLE IF EXISTS `crm`;
CREATE TABLE `crm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companyid` int(11) DEFAULT '0',
  `customerid` int(11) DEFAULT '0' COMMENT '客户ID号',
  `name` varchar(50) DEFAULT NULL COMMENT '客户名称',
  `shortname` varchar(30) DEFAULT NULL,
  `type` varchar(20) DEFAULT 'P' COMMENT '客户类型(潜在客户:Q；报价客户:P；签约客户:S；合作客户:T)',
  `owner` int(11) DEFAULT '0' COMMENT '业务员',
  `region` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `post` varchar(20) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `site` varchar(200) DEFAULT NULL,
  `mainproduct` varchar(50) DEFAULT NULL,
  `bank` varchar(30) DEFAULT NULL,
  `bankaccount` varchar(30) DEFAULT NULL,
  `source` varchar(20) DEFAULT 'OD' COMMENT '百度(BD)；360(360)；福步(FB)；展会(ZH)；客户推荐(TJ)；其他(OD)',
  `profits` varchar(30) DEFAULT 'O' COMMENT '离岸公司(L)；工厂开票(I)；扣点提现(C)；外汇佣金(A)；费用抵充(F)；其他(O)',
  `creator` varchar(20) DEFAULT '' COMMENT '创建人',
  `remark` varchar(200) DEFAULT NULL,
  `files` text,
  `trackdate` varchar(20) DEFAULT NULL,
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=357 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of crm
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for crm_contact
-- ----------------------------
DROP TABLE IF EXISTS `crm_contact`;
CREATE TABLE `crm_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT '0',
  `name` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `weixin` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `sex` varchar(10) DEFAULT '',
  `birthday` varchar(20) DEFAULT NULL,
  `qq` varchar(20) DEFAULT NULL,
  `position` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `remark` varchar(50) DEFAULT NULL,
  `isdefault` int(11) DEFAULT '0',
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=351 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of crm_contact
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for crm_track
-- ----------------------------
DROP TABLE IF EXISTS `crm_track`;
CREATE TABLE `crm_track` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT '0',
  `trackid` int(11) DEFAULT '0',
  `trackor` varchar(20) DEFAULT NULL,
  `content` varchar(200) DEFAULT NULL,
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=357 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of crm_track
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customername` varchar(50) DEFAULT NULL,
  `commissionfee` decimal(18,4) DEFAULT NULL,
  `operator` int(11) DEFAULT NULL,
  `owner` int(11) DEFAULT NULL,
  `mainproducts` varchar(50) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `qq` varchar(20) DEFAULT NULL,
  `customerno` varchar(20) DEFAULT NULL,
  `taxrefundfee` decimal(18,5) DEFAULT '0.00000',
  `customercursor` int(11) DEFAULT NULL,
  `projectcursor` int(11) DEFAULT '1',
  `phone` varchar(20) DEFAULT NULL,
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `companyid` int(11) DEFAULT '0',
  `commissionfeemin` decimal(18,2) DEFAULT '0.00',
  `taxrefundfeemin` decimal(18,2) DEFAULT '0.00',
  `entrancecursor` int(11) DEFAULT '1',
  `creditamount` decimal(18,2) DEFAULT '0.00',
  `creditrate` decimal(18,5) DEFAULT '0.00000',
  `creditamountmin` decimal(18,4) DEFAULT '0.0000',
  `status` int(11) DEFAULT '0',
  `creditamount_temp` decimal(18,5) DEFAULT '0.00000',
  `usedamout` decimal(18,5) DEFAULT '0.00000',
  `identity_card` varchar(500) DEFAULT NULL,
  `cardsmark` varchar(255) DEFAULT NULL,
  `assets` varchar(500) DEFAULT NULL,
  `assetsmark` varchar(255) DEFAULT NULL,
  `creditstatus` int(11) DEFAULT '0',
  `applydate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `CustomerOperator` (`operator`),
  KEY `idx_Owner` (`owner`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1555580000 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for entryform
-- ----------------------------
DROP TABLE IF EXISTS `entryform`;
CREATE TABLE `entryform` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` int(11) DEFAULT '0',
  `companyid` int(11) DEFAULT '0',
  `projectid` int(11) DEFAULT NULL,
  `entryform` int(11) DEFAULT '0' COMMENT '报关形式',
  `foreigncurrency` int(11) DEFAULT NULL COMMENT '收汇方式',
  `priceterm` int(11) DEFAULT NULL COMMENT '价格条款',
  `supervisionmode` int(11) DEFAULT '110' COMMENT '监管方式',
  `taxation` int(11) DEFAULT NULL COMMENT '征免性质',
  `specialrelation` int(11) DEFAULT NULL COMMENT '特殊关系确认',
  `priceimpact` int(11) DEFAULT NULL COMMENT '价格影响确认',
  `privilegefeeconfirm` int(11) DEFAULT NULL COMMENT '支付特许权使用费确认',
  `totalpackageamount` int(11) DEFAULT '0' COMMENT '整体包装件数',
  `status` tinyint(4) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `exportdate` date DEFAULT NULL COMMENT '预计出货日期',
  `transport` varchar(255) DEFAULT NULL COMMENT '运输方式',
  `tranportexpense` decimal(10,2) DEFAULT NULL COMMENT '运费',
  `insurancefee` decimal(10,2) DEFAULT NULL COMMENT '保费',
  `receiver` varchar(255) DEFAULT NULL COMMENT '收件人',
  `address` varchar(255) DEFAULT NULL COMMENT '收件地址',
  `tel` varchar(255) DEFAULT NULL COMMENT '收件电话',
  `brokerno` varchar(255) DEFAULT NULL COMMENT '10位报关行代码',
  `entryport` varchar(255) DEFAULT NULL COMMENT '报关口岸',
  `destionationcountry` varchar(255) DEFAULT NULL COMMENT '运抵国',
  `destionationport` varchar(255) DEFAULT NULL COMMENT '启运国',
  `brokername` varchar(255) DEFAULT NULL COMMENT '报关行名称',
  `currency` varchar(255) DEFAULT NULL COMMENT '币种',
  `lcnumber` varchar(255) DEFAULT NULL COMMENT '信用证号',
  `fileno` varchar(255) DEFAULT NULL COMMENT '备案号',
  `licno` varchar(255) DEFAULT NULL COMMENT '许可证号',
  `businesscountry` varchar(255) DEFAULT NULL COMMENT '贸易国',
  `businessid` int(11) DEFAULT '0' COMMENT '境外贸易商',
  `businessman` varchar(255) DEFAULT NULL COMMENT '境外贸易商',
  `totalpackagemode` varchar(255) DEFAULT '纸箱',
  `totalpackagenote` varchar(255) DEFAULT NULL,
  `authdeclar` text,
  `clearance` text COMMENT '确认通关',
  `totalcube` decimal(11,2) DEFAULT '0.00',
  `clearancenbr` varchar(255) DEFAULT NULL,
  `updatereason` varchar(255) DEFAULT NULL,
  `archives` int(11) DEFAULT '0' COMMENT '0: 未审核，1已审核',
  `entryfiles` text COMMENT '报关附件',
  `entrymark` varchar(255) DEFAULT NULL COMMENT '报关备注',
  `fileht` text COMMENT '供货合同',
  `htmark` varchar(500) DEFAULT NULL COMMENT '供货合同备注',
  `filetrade` text COMMENT '运输单据',
  `trademark` varchar(500) DEFAULT NULL COMMENT '运输单据备注',
  `filepak` text COMMENT '装箱单附件',
  `pakmark` varchar(500) DEFAULT NULL COMMENT '装箱单附备注',
  `production` varchar(100) DEFAULT '1' COMMENT '生产单位',
  `kama` varchar(500) DEFAULT NULL,
  `domesticid` int(11) DEFAULT '0' COMMENT '境内贸易商',
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_projectid` (`projectid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1476 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of entryform
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for form
-- ----------------------------
DROP TABLE IF EXISTS `form`;
CREATE TABLE `form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(32) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1477 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of form
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `companyid` int(11) DEFAULT '0',
  `customerid` int(11) DEFAULT '0',
  `model` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `projectid` int(11) DEFAULT NULL,
  `ProductPackageAmount` float(11,2) DEFAULT NULL,
  `productid` int(11) DEFAULT NULL,
  `supcount` int(11) DEFAULT NULL,
  `ProductUnitPrice` float(11,4) DEFAULT '0.0000',
  `ProductUnitTotalPrice` float(11,4) DEFAULT NULL,
  `ProductNetWeight` float(11,2) DEFAULT '0.00',
  `ProductGrossWeight` float(11,2) DEFAULT '0.00',
  `ProductAmount` float(11,2) DEFAULT '0.00',
  `officialamount` float(11,2) DEFAULT '0.00',
  `officialunit` varchar(255) DEFAULT NULL,
  `ProductChineseName` varchar(255) DEFAULT NULL,
  `ProductEnglishName` varchar(255) DEFAULT NULL,
  `yhqk` int(11) DEFAULT '0',
  `brandtype` int(11) DEFAULT '0',
  `productunit` varchar(255) DEFAULT NULL,
  `invoiceamount` decimal(11,2) DEFAULT NULL,
  `region` varchar(30) DEFAULT '142' COMMENT '原产地',
  `supelement` text,
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_ProjectID` (`projectid`) USING BTREE,
  KEY `idx_productid` (`productid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1557052306 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for hscode
-- ----------------------------
DROP TABLE IF EXISTS `hscode`;
CREATE TABLE `hscode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `productname` varchar(255) DEFAULT NULL,
  `officialunit1` varchar(255) DEFAULT NULL,
  `officialunit2` varchar(255) DEFAULT NULL,
  `taxreturnrate` decimal(10,2) DEFAULT NULL,
  `type` int(11) DEFAULT '0',
  `customsupervision` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `declarationelements` varchar(255) DEFAULT NULL,
  `updatetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx` (`code`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=58466 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hscode
-- ----------------------------
BEGIN;
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43379, '0101', '马、驴、骡', '', '', 0.00, 1, '', '', '品名;是否改良种用。品种', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43383, '0101290090', '非改良种用其他马', '千克', '头', 0.09, 0, 'AB', '非改良种用其他马', '品名;品牌类型;出口享惠情况;是否改良种用;品种;GTIN;CAS;其他', '2022-04-22 16:33:58');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43384, '0101301010', '改良种用的濒危野驴', '千克', '头', 0.00, 0, 'AFEB', '改良种用的濒危野驴', '品名;品牌类型;出口享惠情况;是否改良种用;品种;GTIN;CAS;其他', '2022-04-22 16:33:58');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43385, '0101301090', '改良种用驴（濒危野驴除外）', '千克', '头', 0.09, 0, 'AB', '改良种用驴（濒危野驴除外） ', '品名;品牌类型;出口享惠情况;是否改良种用;品种;GTIN;CAS;其他', '2022-04-22 16:33:58');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43386, '0101309010', '非改良种用濒危野驴', '千克', '头', 0.00, 0, 'AFEB', '非改良种用濒危野驴', '品名;品牌类型;出口享惠情况;是否改良种用;品种;GTIN;CAS;其他', '2022-04-22 16:33:58');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43387, '0101309090', '非改良种用其他驴', '千克', '头', 0.09, 0, 'AB', '非改良种用其他驴', '品名;品牌类型;出口享惠情况;是否改良种用;品种;GTIN;CAS;其他', '2022-04-22 16:33:58');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43388, '0101900000', '骡', '千克', '头', 0.09, 0, 'AB', '骡', '品名;品牌类型;出口享惠情况;是否改良种用;品种;GTIN;CAS;其他', '2022-04-22 16:33:58');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43389, '0102', '牛', '', '', 0.00, 1, '', '', '品名;是否改良种用', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43390, '0102210000', '改良种用家牛', '千克', '头', 0.09, 0, 'AB', '改良种用家牛 ', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:33:58');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43391, '0102290000', '非改良种用家牛', '千克', '头', 0.09, 0, '4xAB', '非改良种用家牛', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43392, '0102310010', '改良种用濒危水牛', '千克', '头', 0.00, 0, 'ABEF', '改良种用濒危水牛', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43393, '0102310090', '改良种用水牛（濒危水牛除外）', '千克', '头', 0.09, 0, 'AB', '改良种用水牛（濒危水牛除外） ', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43394, '0102390010', '非改良种用濒危水牛', '千克', '头', 0.00, 0, '4ABEFx', '非改良种用濒危水牛', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43395, '0102390090', '非改良种用其他水牛', '千克', '头', 0.09, 0, '4ABx', '非改良种用其他水牛', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43396, '0102901010', '改良种用濒危野牛', '千克', '头', 0.00, 0, 'AFEB', '改良种用濒危野牛', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43397, '0102901090', '其他改良种用牛', '千克', '头', 0.09, 0, 'AB', '其他改良种用牛', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43398, '0102909010', '非改良种用濒危野牛', '千克', '头', 0.00, 0, '4xABFE', '非改良种用濒危野牛', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43399, '0102909090', '非改良种用其他牛', '千克', '头', 0.09, 0, '4xAB', '非改良种用其他牛', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43400, '0103', '猪', '', '', 0.00, 1, '', '', '1:品名;是否改良种用;个体重量3:品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43401, '0103100010', '改良种用的鹿豚、姬猪', '千克', '头', 0.09, 0, 'AFEB', '改良种用的鹿豚、姬猪', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43402, '0103100090', '改良种用猪（鹿豚、姬猪除外）', '千克', '头', 0.09, 0, 'AB', '改良种用猪（鹿豚、姬猪除外） ', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43403, '0103911010', '重量在10千克以下的非改良种用濒危猪', '千克', '头', 0.09, 0, '4xABFE', '重量在10千克以下的其他野猪改良种用的除外', '品名;品牌类型;出口享惠情况;个体重量;GTIN;CAS;其他', '2022-10-28 22:29:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43404, '0103911090', '重量在10千克以下的其他猪', '千克', '头', 0.09, 0, '4xAB', '重量在10千克以下的其他猪改良种用的除外', '品名;品牌类型;出口享惠情况;个体重量;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43405, '0103912010', '10≤重量<50千克的非改良种用濒危猪', '千克', '头', 0.09, 0, '4xABFE', '10≤重量<50千克的其他野猪改良种用的除外', '品名;品牌类型;出口享惠情况;个体重量;GTIN;CAS;其他', '2022-10-28 22:29:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43406, '0103912090', '10≤重量<50千克的其他猪', '千克', '头', 0.09, 0, '4xAB', '10≤重量<50千克的其他猪改良种用的除外', '品名;品牌类型;出口享惠情况;个体重量;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43407, '0103920010', '重量在50千克及以上的非改良种用濒危猪', '千克', '头', 0.09, 0, '4xABFE', '重量在50千克及以上的其他野猪改良种用的除外', '品名;品牌类型;出口享惠情况;个体重量;GTIN;CAS;其他', '2022-10-28 22:29:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43408, '0103920090', '重量在50千克及以上的其他猪', '千克', '头', 0.09, 0, '4xAB', '重量在50千克及以上的其他猪改良种用的除外', '品名;品牌类型;出口享惠情况;个体重量;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43409, '0104', '绵羊、山羊', '', '', 0.00, 1, '', '', '1:品名;是否改良种用;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43410, '0104101000', '改良种用绵羊', '千克', '头', 0.09, 0, 'AB', '改良种用绵羊 ', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43411, '0104109000', '其他绵羊', '千克', '头', 0.09, 0, 'AB', '其他绵羊改良种用的除外', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43412, '0104201000', '改良种用山羊', '千克', '头', 0.09, 0, 'AB', '改良种用山羊 ', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43413, '0104209000', '非改良种用山羊', '千克', '头', 0.09, 0, 'AB', '非改良种用山羊', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43414, '0105', '家禽，即鸡、鸭、鹅、火鸡及珍珠鸡', '', '', 0.00, 1, '', '', '1:品名;是否改良种用;个体重量;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43415, '0105111000', '重量不超过185克的改良种用鸡', '千克', '只', 0.09, 0, 'AB', '重量不超过185克的改良种用鸡 ', '品名;品牌类型;出口享惠情况;是否改良种用;个体重量;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43416, '0105119000', '不超过185克的其他鸡', '千克', '只', 0.09, 0, 'AB', '不超过185克的其他鸡改良种用的除外', '品名;品牌类型;出口享惠情况;是否改良种用;个体重量;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43417, '0105121000', '重量不超过185克的改良种用火鸡', '千克', '只', 0.09, 0, 'AB', '重量不超过185克的改良种用火鸡 ', '品名;品牌类型;出口享惠情况;是否改良种用;个体重量;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43418, '0105129000', '不超过185克的其他火鸡', '千克', '只', 0.09, 0, 'AB', '不超过185克的其他火鸡改良种用的除外', '品名;品牌类型;出口享惠情况;是否改良种用;个体重量;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43419, '0105131000', '重量不超过185克的改良种用鸭', '千克', '只', 0.09, 0, 'AB', '重量不超过185克的改良种用鸭 ', '品名;品牌类型;出口享惠情况;是否改良种用;个体重量;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43420, '0105139000', '不超过185克的其他鸭', '千克', '只', 0.09, 0, 'AB', '不超过185克的其他鸭改良种用的除外', '品名;品牌类型;出口享惠情况;是否改良种用;个体重量;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43421, '0105141000', '重量不超过185克的改良种用鹅', '千克', '只', 0.09, 0, 'AB', '重量不超过185克的改良种用鹅 ', '品名;品牌类型;出口享惠情况;是否改良种用;个体重量;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43422, '0105149000', '不超过185克的其他鹅', '千克', '只', 0.09, 0, 'AB', '不超过185克的其他鹅改良种用的除外', '品名;品牌类型;出口享惠情况;是否改良种用;个体重量;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43423, '0105151000', '重量不超过185克的改良种用珍珠鸡', '千克', '只', 0.09, 0, 'AB', '重量不超过185克的改良种用珍珠鸡 ', '品名;品牌类型;出口享惠情况;是否改良种用;个体重量;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43424, '0105159000', '不超过185克的其他珍珠鸡', '千克', '只', 0.09, 0, 'AB', '不超过185克的其他珍珠鸡改良种用的除外', '品名;品牌类型;出口享惠情况;是否改良种用;个体重量;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43425, '0105941000', '重量大于185克的改良种用鸡', '千克', '只', 0.09, 0, '4xAB', '重量大于185克的改良种用鸡 ', '品名;品牌类型;出口享惠情况;是否改良种用;个体重量;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43426, '0105949000', '超过185克其他鸡', '千克', '只', 0.09, 0, '4xAB', '超过185克其他鸡改良种用的除外', '品名;品牌类型;出口享惠情况;是否改良种用;个体重量;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43427, '0105991000', '重量大于185克的改良种用其他家禽', '千克', '只', 0.09, 0, 'AB', '重量大于185克的改良种用其他家禽 ', '品名;品牌类型;出口享惠情况;是否改良种用;个体重量;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43428, '0105999100', '超过185克的非改良种用鸭', '千克', '只', 0.09, 0, 'AB', '超过185克的非改良种用鸭', '品名;品牌类型;出口享惠情况;是否改良种用;个体重量;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43429, '0105999200', '超过185克的非改良种用鹅', '千克', '只', 0.09, 0, 'AB', '超过185克的非改良种用鹅', '品名;品牌类型;出口享惠情况;是否改良种用;个体重量;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43430, '0105999300', '超过185克的非改良种用珍珠鸡', '千克', '只', 0.09, 0, '4xAB', '超过185克的非改良种用珍珠鸡', '品名;品牌类型;出口享惠情况;是否改良种用;个体重量;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43431, '0105999400', '超过185克的非改良种用火鸡', '千克', '只', 0.09, 0, 'AB', '超过185克的非改良种用火鸡', '品名;品牌类型;出口享惠情况;是否改良种用;个体重量;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43432, '0106', '其他活动物', '', '', 0.00, 1, '', '', '1:品名;是否改良种用;品牌;1:品名;用途(食用);品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43433, '0106111000', '改良种用灵长目哺乳动物', '千克', '只', 0.09, 0, 'AFEB', '改良种用灵长目哺乳动物包括人工驯养、繁殖的', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43434, '0106119000', '其他灵长目哺乳动物', '千克', '只', 0.09, 0, 'AFEB', '其他灵长目哺乳动物包括人工驯养、繁殖的', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43435, '0106121100', '改良种用鲸、海豚及鼠海豚（鲸目哺乳动物）；改良种用海牛及儒艮（海牛目哺乳动物）', '千克', '只', 0.09, 0, 'AFEB', '改良种用鲸、海豚及鼠海豚（鲸目哺乳动物）；改良种用海牛及儒艮（海牛目哺乳动物）包括人工驯养、繁殖的', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43436, '0106121900', '非改良种用鲸、海豚及鼠海豚（鲸目哺乳动物）；非改良种用海牛及儒艮（海牛目哺乳动物）', '千克', '只', 0.09, 0, 'AFEB', '非改良种用鲸、海豚及鼠海豚（鲸目哺乳动物）；非改良种用海牛及儒艮（海牛目哺乳动物）包括人工驯养、繁殖的', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43437, '0106122100', '改良种用海豹、海狮及海象（鳍足亚目哺乳动物）', '千克', '只', 0.09, 0, 'AFEB', '改良种用海豹、海狮及海象（鳍足亚目哺乳动物）包括人工驯养、繁殖的', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43438, '0106122900', '非改良种用海豹、海狮及海象（鳍足亚目哺乳动物） ', '千克', '只', 0.09, 0, 'ABEF', '非改良种用海豹、海狮及海象（鳍足亚目哺乳动物） 包括人工驯养、繁殖的                               ', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43439, '0106131010', '改良种用濒危骆驼及其他濒危骆驼科动物', '千克', '只', 0.00, 0, 'ABFE', '改良种用濒危骆驼及其他濒危骆驼科动物包括人工驯养、繁殖的', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43440, '0106131090', '改良种用骆驼及其他骆驼科动物（濒危骆驼及其他濒危骆鸵科动物除外）', '千克', '只', 0.09, 0, 'AB', '改良种用骆驼及其他骆驼科动物（濒危骆驼及其他濒危骆鸵科动物除外） ', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43441, '0106139010', '其他濒危骆驼及其他濒危骆驼科动物 ', '千克', '只', 0.00, 0, 'AFEB', '其他濒危骆驼及其他濒危骆驼科动物 包括人工驯养、繁殖的', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43442, '0106139090', '其他骆驼及其他骆驼科动物', '千克', '只', 0.09, 0, 'AB', '其他骆驼及其他骆驼科动物', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43443, '0106141010', '改良种用濒危野兔', '千克', '只', 0.00, 0, 'ABEF', '改良种用濒危野兔包括人工驯养、繁殖的', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43444, '0106141090', '改良种用家兔及野兔（濒危除外）', '千克', '只', 0.09, 0, 'AB', '改良种用家兔及野兔（濒危除外） ', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43445, '0106149010', '其他濒危野兔', '千克', '只', 0.00, 0, 'AFEB', '其他濒危野兔包括人工驯养、繁殖的', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43446, '0106149090', '其他家兔及野兔', '千克', '只', 0.09, 0, 'AB', '其他家兔及野兔', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43447, '0106191010', '其他改良种用濒危哺乳动物', '千克', '只', 0.00, 0, 'ABFE', '其他改良种用濒危哺乳动物包括人工驯养、繁殖的', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43448, '0106191090', '其他改良种用哺乳动物', '千克', '只', 0.09, 0, 'AB', '其他改良种用哺乳动物 ', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43449, '0106199010', '其他濒危哺乳动物', '千克', '只', 0.00, 0, 'AFEB', '其他濒危哺乳动物包括人工驯养、繁殖的', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43450, '0106199090', '其他哺乳动物', '千克', '只', 0.09, 0, 'AB', '其他哺乳动物', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43451, '0106201100', '改良种用鳄鱼苗', '千克', '只', 0.09, 0, 'AFEB', '改良种用鳄鱼苗包括人工驯养、繁殖的', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43452, '0106201900', '其他改良种用爬行动物', '千克', '只', 0.09, 0, 'FEAB', '其他改良种用爬行动物包括人工驯养、繁殖的', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43453, '0106202010', '食用蛇', '千克', '只', 0.09, 0, 'AFEB', '食用蛇包括人工驯养、繁殖的', '品名;品牌类型;出口享惠情况;用途（食用）;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43454, '0106202021', '食用濒危龟鳖', '千克', '只', 0.00, 0, 'ABFE', '食用濒危龟鳖包括人工驯养、繁殖的', '品名;品牌类型;出口享惠情况;用途（食用）;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43455, '0106202029', '其他食用龟鳖', '千克', '只', 0.09, 0, 'AB', '其他食用龟鳖包括人工驯养、繁殖的', '品名;品牌类型;出口享惠情况;用途（食用）;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43456, '0106202090', '其他食用爬行动物', '千克', '只', 0.05, 0, 'FEAB', '其他食用爬行动物(包括人工驯养、繁殖的)', '品名;用途(食用);品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43457, '0106209000', '其他爬行动物', '千克', '只', 0.05, 0, 'FEAB', '其他爬行动物(包括人工驯养、繁殖的)', '品名;用途;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43458, '0106311000', '改良种用猛禽', '千克', '只', 0.09, 0, 'AFEB', '改良种用猛禽包括人工驯养、繁殖的', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43459, '0106319000', '其他猛禽', '千克', '只', 0.09, 0, 'ABFE', '其他猛禽包括人工驯养、繁殖的', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43460, '0106321010', '改良种用濒危鹦形目的鸟', '千克', '只', 0.00, 0, 'ABFE', '改良种用濒危鹦形目的鸟包括人工繁育的', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-10-28 22:29:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43461, '0106321020', '改良种用鸡尾鹦鹉', '千克', '只', 0.05, 0, 'AB', '改良种用鸡尾鹦鹉', '品牌类型; 出口享惠情况;  是否改良种用;GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43462, '0106321090', '改良种用非濒危鹦形目的鸟', '千克', '只', 0.00, 0, 'AB', '改良种用非濒危鹦形目的鸟 ', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-10-28 22:29:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43463, '0106329010', '非改良种用濒危鹦形目的鸟', '千克', '只', 0.00, 0, 'ABFE', '非改良种用濒危鹦形目的鸟包括人工繁育的', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-10-28 22:29:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43464, '0106329020', '非改良种用鸡尾鹦鹉', '千克', '只', 0.05, 0, 'AB', '非改良种用鸡尾鹦鹉', '品牌类型; 出口享惠情况;  是否改良种用;GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43465, '0106329090', '非改良种用非濒危鹦形目的鸟', '千克', '只', 0.00, 0, 'AB', '非改良种用非濒危鹦形目的鸟 ', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-10-28 22:29:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43466, '0106331010', '改良种用濒危鸵鸟', '千克', '只', 0.00, 0, 'ABFE', '改良种用濒危鸵鸟包括人工驯养、繁殖的', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43467, '0106331090', '改良种用鸵乌；鸸鹋（濒危鸵鸟除外） ', '千克', '只', 0.09, 0, 'AB', '改良种用鸵乌；鸸鹋（濒危鸵鸟除外）  ', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43468, '0106339010', '其他濒危鸵鸟 ', '千克', '只', 0.00, 0, 'ABFE', '其他濒危鸵鸟 包括人工驯养、繁殖的', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43469, '0106339090', '其他鸵鸟、鸸鹋 ', '千克', '只', 0.09, 0, 'AB', '其他鸵鸟、鸸鹋 ', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43470, '0106391010', '其他改良种用濒危鸟', '千克', '只', 0.00, 0, 'ABFE', '其他改良种用濒危鸟包括人工驯养、繁殖的', '品名;品牌类型;出口享惠情况;是否改良种用;如为信鸽请注明足环号;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43471, '0106391090', '其他改良种用的鸟', '千克', '只', 0.09, 0, 'AB', '其他改良种用的鸟 ', '品名;品牌类型;出口享惠情况;是否改良种用;如为信鸽请注明足环号;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43472, '0106392100', '食用乳鸽', '千克', '只', 0.09, 0, 'AB', '食用乳鸽', '品名;品牌类型;出口享惠情况;用途（食用）;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43473, '0106392300', '食用野鸭', '千克', '只', 0.09, 0, 'FEAB', '食用野鸭', '品名;品牌类型;出口享惠情况;用途（食用）;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43474, '0106392910', '其他食用濒危鸟', '千克', '只', 0.00, 0, 'ABFE', '其他食用濒危鸟包括人工驯养、繁殖的', '品名;品牌类型;出口享惠情况;用途（食用）;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43475, '0106392990', '其他食用鸟', '千克', '只', 0.09, 0, 'AB', '其他食用鸟', '品名;品牌类型;出口享惠情况;用途（食用）;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43476, '0106399010', '其他濒危鸟', '千克', '只', 0.00, 0, 'ABFE', '其他濒危鸟包括人工驯养、繁殖的', '品名;品牌类型;出口享惠情况;如为信鸽请注明足环号;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43477, '0106399090', '其他鸟', '千克', '只', 0.09, 0, 'AB', '其他鸟', '品名;品牌类型;出口享惠情况;如为信鸽请注明足环号;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43478, '0106411000', '改良种用蜂 ', '千克', '只', 0.09, 0, 'AB', '改良种用蜂  ', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43479, '0106419001', '赤眼蜂', '千克', '只', 0.09, 0, 'ABS', '赤眼蜂', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:08:24');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43480, '0106419090', '其他蜂', '千克', '只', 0.09, 0, 'AB', '其他蜂', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:08:24');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43481, '0106491010', '其他改良种用濒危昆虫 ', '千克', '只', 0.00, 0, 'ABFE', '其他改良种用濒危昆虫 包括人工驯养、繁殖的', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43482, '0106491090', '其他改良种用非濒危昆虫 ', '千克', '只', 0.09, 0, 'AB', '其他改良种用非濒危昆虫 ', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43483, '0106499001', '捕食螨', '千克', '只', 0.09, 0, 'ABS', '捕食螨', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:08:24');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43484, '0106499010', '其他濒危昆虫 ', '千克', '只', 0.00, 0, 'ABFE', '其他濒危昆虫 包括人工驯养、繁殖的                               ', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43485, '0106499090', '其他非濒危昆虫 ', '千克', '只', 0.09, 0, 'AB', '其他非濒危昆虫  ', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43486, '0106901110', '改良种用濒危蛙苗', '千克', '只', 0.00, 0, 'ABFE', '改良种用濒危蛙苗', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43487, '0106901190', '其他改良种用蛙苗', '千克', '只', 0.09, 0, 'AB', '其他改良种用蛙苗', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43488, '0106901910', '其他改良种用濒危动物', '千克', '只', 0.00, 0, 'ABFE', '其他改良种用濒危动物包括人工驯养、繁殖的', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43489, '0106901990', '其他改良种用动物', '千克', '只', 0.09, 0, 'AB', '其他改良种用动物', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43490, '0106909010', '其他濒危动物', '千克', '只', 0.00, 0, 'ABFE', '其他濒危动物包括人工驯养、繁殖的', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43491, '0106909090', '其他动物', '千克', '只', 0.09, 0, 'AB', '其他动物', '品名;品牌类型;出口享惠情况;是否改良种用;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43492, '0201', '鲜、冷牛肉', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜、冷);加工方法(整头及半头、带骨或去骨等);牛肉部位(如眼肉、腱子肉等);包装规格;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43493, '0201100010', '整头及半头鲜或冷藏的濒危野牛肉', '千克', '无', 0.09, 0, '4ABEFx', '整头及半头鲜或冷藏的野牛肉', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;加工方法（整头、半头；带骨、去骨）;牛肉部位（如眼肉、腱子肉等）;包装规格;英文品名;品牌（中文或外文名称）;厂号;级别（A级、B级等）;饲养方式（草饲、谷饲等）;签约日期;加工程度（精修、粗修等）;GTIN;CAS;其他', '2022-10-28 22:29:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43494, '0201100090', '其他整头及半头鲜或冷藏的牛肉', '千克', '无', 0.09, 0, '4ABx', '其他整头及半头鲜或冷藏的牛肉', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;加工方法（整头、半头；带骨、去骨）;牛肉部位（如眼肉、腱子肉等）;包装规格;英文品名;品牌（中文或外文名称）;厂号;级别（A级、B级等）;饲养方式（草饲、谷饲等）;签约日期;加工程度（精修、粗修等）;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43495, '0201200010', '鲜或冷藏的带骨濒危野牛肉', '千克', '无', 0.09, 0, '47ABEFx', '鲜或冷藏的带骨野牛肉', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;加工方法（整头、半头；带骨、去骨）;牛肉部位（如眼肉、腱子肉等）;包装规格;英文品名;品牌（中文或外文名称）;厂号;级别（A级、B级等）;饲养方式（草饲、谷饲等）;签约日期;加工程度（精修、粗修等）;GTIN;CAS;其他', '2022-10-28 22:29:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43496, '0201200090', '其他鲜或冷藏的带骨牛肉', '千克', '无', 0.09, 0, '47ABx', '其他鲜或冷藏的带骨牛肉', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;加工方法（整头、半头；带骨、去骨）;牛肉部位（如眼肉、腱子肉等）;包装规格;英文品名;品牌（中文或外文名称）;厂号;级别（A级、B级等）;饲养方式（草饲、谷饲等）;签约日期;加工程度（精修、粗修等）;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43497, '0201300010', '鲜或冷藏的去骨濒危野牛肉', '千克', '无', 0.09, 0, '47ABEFx', '鲜或冷藏的去骨野牛肉', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;加工方法（整头、半头；带骨、去骨）;牛肉部位（如眼肉、腱子肉等）;包装规格;英文品名;品牌（中文或外文名称）;厂号;级别（A级、B级等）;饲养方式（草饲、谷饲等）;签约日期;加工程度（精修、粗修等）;GTIN;CAS;其他', '2022-10-28 22:29:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43498, '0201300090', '其他鲜或冷藏的去骨牛肉', '千克', '无', 0.09, 0, '47ABx', '其他鲜或冷藏的去骨牛肉', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;加工方法（整头、半头；带骨、去骨）;牛肉部位（如眼肉、腱子肉等）;包装规格;英文品名;品牌（中文或外文名称）;厂号;级别（A级、B级等）;饲养方式（草饲、谷饲等）;签约日期;加工程度（精修、粗修等）;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43499, '0202', '冻牛肉', '', '', 0.00, 1, '', '', '品名;制作或保存方法(冻);加工方法(整头及半头、带骨或去骨等);牛肉部位(如眼肉、腱子肉等);包装规格;英文品名;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43500, '0202100010', '冻藏的整头及半头濒危野牛肉', '千克', '无', 0.09, 0, '4ABEFx', '冻藏的整头及半头野牛肉', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;加工方法（整头、半头；带骨、去骨）;牛肉部位（如眼肉、腱子肉等）;包装规格;英文品名;品牌（中文或外文名称）;厂号;级别（A级、B级等）;饲养方式（草饲、谷饲等）;签约日期;加工程度（精修、粗修等）;GTIN;CAS;其他', '2022-10-28 22:29:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43501, '0202100090', '其他冻藏的整头及半头牛肉', '千克', '无', 0.09, 0, '4ABx', '其他冻藏的整头及半头牛肉', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;加工方法（整头、半头；带骨、去骨）;牛肉部位（如眼肉、腱子肉等）;包装规格;英文品名;品牌（中文或外文名称）;厂号;级别（A级、B级等）;饲养方式（草饲、谷饲等）;签约日期;加工程度（精修、粗修等）;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43502, '0202200010', '冻藏的带骨濒危野牛肉', '千克', '无', 0.09, 0, '47ABEFx', '冻藏的带骨野牛肉', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;加工方法（整头、半头；带骨、去骨）;牛肉部位（如眼肉、腱子肉等）;包装规格;英文品名;品牌（中文或外文名称）;厂号;级别（A级、B级等）;饲养方式（草饲、谷饲等）;签约日期;加工程度（精修、粗修等）;GTIN;CAS;其他', '2022-10-28 22:29:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43503, '0202200090', '其他冻藏的带骨牛肉', '千克', '无', 0.09, 0, '47ABx', '其他冻藏的带骨牛肉', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;加工方法（整头、半头；带骨、去骨）;牛肉部位（如眼肉、腱子肉等）;包装规格;英文品名;品牌（中文或外文名称）;厂号;级别（A级、B级等）;饲养方式（草饲、谷饲等）;签约日期;加工程度（精修、粗修等）;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43504, '0202300010', '冻藏的去骨濒危野牛肉', '千克', '无', 0.09, 0, '47ABEFx', '冻藏的去骨野牛肉', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;加工方法（整头、半头；带骨、去骨）;牛肉部位（如眼肉、腱子肉等）;包装规格;英文品名;品牌（中文或外文名称）;厂号;级别（A级、B级等）;饲养方式（草饲、谷饲等）;签约日期;加工程度（精修、粗修等）;GTIN;CAS;其他', '2022-10-28 22:29:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43505, '0202300090', '其他冻藏的去骨牛肉', '千克', '无', 0.09, 0, '47ABx', '其他冻藏的去骨牛肉', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;加工方法（整头、半头；带骨、去骨）;牛肉部位（如眼肉、腱子肉等）;包装规格;英文品名;品牌（中文或外文名称）;厂号;级别（A级、B级等）;饲养方式（草饲、谷饲等）;签约日期;加工程度（精修、粗修等）;GTIN;CAS;其他', '2022-04-22 16:35:45');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43506, '0203', '鲜、冷、冻猪肉', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜、冷、冻);加工方法(整头及半头、带骨或去骨等);包装规格;厂号;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43507, '0203111010', '鲜或冷藏整头及半头濒危乳猪肉', '千克', '无', 0.09, 0, '4ABEFx', '鲜或冷藏整头及半头野乳猪肉', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;加工方法（整头、半头；带骨、去骨）;包装规格;厂号;GTIN;CAS;其他', '2022-10-28 22:29:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43508, '0203111090', '鲜或冷藏整头及半头其他乳猪肉', '千克', '无', 0.09, 0, '4ABx', '其他鲜或冷藏的整头及半头乳猪肉', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;加工方法（整头、半头；带骨、去骨）;包装规格;厂号;GTIN;CAS;其他', '2022-10-28 22:29:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43509, '0203119010', '鲜或冷藏整头及半头濒危其他猪肉', '千克', '无', 0.09, 0, '4ABEFx', '其他鲜或冷藏整头及半头野猪肉', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;加工方法（整头、半头；带骨、去骨）;包装规格;厂号;GTIN;CAS;其他', '2022-10-28 22:29:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43510, '0203119090', '鲜或冷藏整头及半头其他猪肉', '千克', '无', 0.09, 0, '4ABx', '其他鲜或冷藏的整头及半头猪肉', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;加工方法（整头、半头；带骨、去骨）;包装规格;厂号;GTIN;CAS;其他', '2022-10-28 22:29:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43511, '0203120010', '鲜或冷藏带骨濒危猪前腿、后腿及肉块', '千克', '无', 0.09, 0, '47ABEFx', '鲜或冷的带骨野猪前腿、后腿及肉块', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;加工方法（整头、半头；带骨、去骨）;包装规格;厂号;GTIN;CAS;其他', '2022-10-28 22:29:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43512, '0203120090', '鲜或冷藏带骨其他猪前腿、后腿及肉块', '千克', '无', 0.09, 0, '47ABx', '鲜或冷的带骨猪前腿、后腿及其肉块', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;加工方法（整头、半头；带骨、去骨）;包装规格;厂号;GTIN;CAS;其他', '2022-10-28 22:29:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43513, '0203190010', '其他鲜或冷藏濒危猪肉', '千克', '无', 0.09, 0, '47ABEFx', '其他鲜或冷藏的野猪肉', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;加工方法（整头、半头；带骨、去骨）;包装规格;厂号;GTIN;CAS;其他', '2022-10-28 22:29:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43514, '0203190090', '其他鲜或冷藏的猪肉', '千克', '无', 0.09, 0, '47ABx', '其他鲜或冷藏的猪肉', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;加工方法（整头、半头；带骨、去骨）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43515, '0203211010', '冻藏整头及半头濒危乳猪肉', '千克', '无', 0.09, 0, '4ABEFx', '冻整头及半头野乳猪肉', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;加工方法（整头、半头；带骨、去骨）;包装规格;厂号;GTIN;CAS;其他', '2022-10-28 22:29:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43516, '0203211090', '冻藏整头及半头其他乳猪肉', '千克', '无', 0.09, 0, '4ABx', '冻整头及半头乳猪肉', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;加工方法（整头、半头；带骨、去骨）;包装规格;厂号;GTIN;CAS;其他', '2022-10-28 22:29:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43517, '0203219010', '冻藏整头及半头濒危其他猪肉', '千克', '无', 0.09, 0, '47ABEFx', '其他冻整头及半头野猪肉', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;加工方法（整头、半头；带骨、去骨）;包装规格;厂号;GTIN;CAS;其他', '2022-10-28 22:29:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43518, '0203219090', '冻藏整头及半头其他猪肉', '千克', '无', 0.09, 0, '47ABx', '其他冻整头及半头猪肉', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;加工方法（整头、半头；带骨、去骨）;包装规格;厂号;GTIN;CAS;其他', '2022-10-28 22:29:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43519, '0203220010', '冻藏带骨濒危猪前腿、后腿及肉块', '千克', '无', 0.09, 0, '47ABEFx', '冻带骨野猪前腿、后腿及肉 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;加工方法（整头、半头；带骨、去骨）;包装规格;厂号;GTIN;CAS;其他', '2022-10-28 22:29:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43520, '0203220090', '冻藏带骨其他猪前腿、后腿及肉块', '千克', '无', 0.09, 0, '47ABx', '冻藏的带骨猪前腿、后腿及其肉块 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;加工方法（整头、半头；带骨、去骨）;包装规格;厂号;GTIN;CAS;其他', '2022-10-28 22:29:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43521, '0203290010', '其他冻藏濒危猪肉', '千克', '无', 0.09, 0, '47ABEFx', '冻藏野猪其他肉 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;加工方法（整头、半头；带骨、去骨）;包装规格;厂号;GTIN;CAS;其他', '2022-10-28 22:29:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43522, '0203290090', '其他冻藏猪肉', '千克', '无', 0.09, 0, '47ABx', '其他冻藏猪肉 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;加工方法（整头、半头；带骨、去骨）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43523, '0204', '鲜、冷、冻绵羊肉或山羊肉', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜、冷、冻);加工方法(整头及半头、带骨或去骨等);包装规格;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43524, '0204100000', '鲜或冷藏的整头及半头羔羊肉', '千克', '无', 0.09, 0, '7AB', '鲜或冷藏的整头及半头羔羊肉', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;加工方法（整头、半头；带骨、去骨）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43525, '0204210000', '鲜或冷藏的整头及半头绵羊肉', '千克', '无', 0.09, 0, '7AB', '鲜或冷藏的整头及半头绵羊肉', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;加工方法（整头、半头；带骨、去骨）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43526, '0204220000', '鲜或冷藏的带骨绵羊肉', '千克', '无', 0.09, 0, '7AB', '鲜或冷藏的带骨绵羊肉', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;加工方法（整头、半头；带骨、去骨）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43527, '0204230000', '鲜或冷藏的去骨绵羊肉', '千克', '无', 0.09, 0, '7AB', '鲜或冷藏的去骨绵羊肉', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;加工方法（整头、半头；带骨、去骨）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43528, '0204300000', '冻藏的整头及半头羔羊肉', '千克', '无', 0.09, 0, '7AB', '冻藏的整头及半头羔羊肉', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;加工方法（整头、半头；带骨、去骨）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43529, '0204410000', '冻藏的整头及半头绵羊肉', '千克', '无', 0.09, 0, '7AB', '冻藏的整头及半头绵羊肉', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;加工方法（整头、半头；带骨、去骨）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43530, '0204420000', '冻藏的其他带骨绵羊肉', '千克', '无', 0.09, 0, '7AB', '冻藏的其他带骨绵羊肉', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;加工方法（整头、半头；带骨、去骨）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43531, '0204430000', '冻藏的其他去骨绵羊肉', '千克', '无', 0.09, 0, '7AB', '冻藏的其他去骨绵羊肉', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;加工方法（整头、半头；带骨、去骨）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43532, '0204500000', '鲜或冷藏、冻藏的山羊肉', '千克', '无', 0.09, 0, '7AB', '鲜或冷藏、冻藏的山羊肉', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;加工方法（整头、半头；带骨、去骨）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43533, '0205', '鲜、冷、冻马、驴、骡肉', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜、冷、冻);包装规格;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43534, '0205000010', '鲜、冷或冻的濒危野马、野驴肉', '千克', '无', 0.00, 0, 'ABFE', '鲜、冷或冻的濒危野马、野驴肉', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43535, '0205000090', '鲜、冷或冻的马、驴、骡肉', '千克', '无', 0.09, 0, 'AB', '鲜、冷或冻的马、驴、骡肉', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43536, '0206', '鲜、冷、冻牛、猪、绵羊、山羊、马、驴、骡食用杂碎', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜、冷、冻);种类(舌、肝、心管、板筋等);包装规格;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43537, '0206100000', '鲜或冷藏的牛杂碎', '千克', '无', 0.09, 0, '4ABx', '鲜或冷藏的牛杂碎', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;种类（舌、肝、心管、板筋等）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43538, '0206210000', '冻牛舌', '千克', '无', 0.09, 0, '47ABx', '冻牛舌', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;种类（舌、肝、心管、板筋等）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43539, '0206220000', '冻牛肝', '千克', '无', 0.09, 0, '47ABx', '冻牛肝', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;种类（舌、肝、心管、板筋等）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43540, '0206290000', '其他冻牛杂碎', '千克', '无', 0.09, 0, '47ABx', '其他冻牛杂碎', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;种类（舌、肝、心管、板筋等）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43541, '0206300000', '鲜或冷藏的猪杂碎', '千克', '无', 0.09, 0, '4ABx', '鲜或冷藏的猪杂碎', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;种类（舌、肝、心管、板筋等）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43542, '0206410000', '冻猪肝', '千克', '无', 0.09, 0, '47ABx', '冻猪肝', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;种类（舌、肝、心管、板筋等）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43543, '0206490000', '其他冻猪杂碎', '千克', '无', 0.09, 0, '47ABx', '其他冻猪杂碎', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;种类（舌、肝、心管、板筋等）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43544, '0206800010', '鲜或冷的羊杂碎', '千克', '无', 0.09, 0, 'AB', '鲜或冷的羊杂碎', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;种类（舌、肝、心管、板筋等）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43545, '0206800090', '鲜或冷的马、驴、骡杂碎', '千克', '无', 0.09, 0, 'AB', '鲜或冷的马、驴、骡杂碎', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;种类（舌、肝、心管、板筋等）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43546, '0206900010', '冻藏的羊杂碎', '千克', '无', 0.09, 0, '7AB', '冻藏的羊杂碎', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;种类（舌、肝、心管、板筋等）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43547, '0206900090', '冻藏的马、驴、骡杂碎', '千克', '无', 0.09, 0, 'AB', '冻藏的马、驴、骡杂碎', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;种类（舌、肝、心管、板筋等）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43548, '0207', '品目0105所列家禽的鲜、冷、冻肉及食用杂碎', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜、冷);加工方法(整只、带骨或去骨等);厂号(名称或号码,饲养场或加工厂);品牌;原产地证据文件及编号(例', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43549, '0207110000', '鲜或冷藏的整只鸡', '千克', '无', 0.09, 0, '4xAB', '鲜或冷藏的整只鸡', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;加工方法（整只、带骨或去骨等）;厂号;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43550, '0207120000', '冻的整只鸡', '千克', '无', 0.09, 0, '4x7AB', '冻的整只鸡', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;加工方法（整只、带骨或去骨等）;厂号;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43551, '0207131100', '鲜或冷的带骨的鸡块', '千克', '无', 0.09, 0, '4xAB', '鲜或冷的带骨的鸡块', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;加工方法（带骨、去骨）;厂号;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43552, '0207131900', '其他鲜或冷的鸡块', '千克', '无', 0.09, 0, '4xAB', '其他鲜或冷的鸡块', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;加工方法（带骨、去骨）;厂号;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43553, '0207132100', '鲜或冷的鸡翼', '千克', '无', 0.10, 0, '4xAB', '鲜或冷的鸡翼(不包括翼尖)', '品牌类型; 出口享惠情况;  制作或保存方法(鲜、冷);加工方法（整只、带骨或去骨等）;厂号(名称或号码饲养场或加工厂);品牌;GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43554, '0207132900', '其他鲜或冷的鸡杂碎', '千克', '无', 0.06, 0, 'AB4x', '其他鲜或冷的鸡杂碎', '品牌类型; 出口享惠情况;  制作或保存方法(鲜、冷);加工方法（整只、带骨或去骨等）;厂号(名称或号码饲养场或加工厂);品牌;GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43555, '0207141100', '冻的带骨鸡块', '千克', '无', 0.09, 0, '7AB4x', '冻的带骨鸡块包括鸡胸脯、鸡大腿等', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;加工方法（带骨、去骨）;厂号;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43556, '0207141900', '冻的不带骨鸡块', '千克', '无', 0.09, 0, '7AB4x', '冻的不带骨鸡块包括鸡胸脯、鸡大腿等', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;加工方法（带骨、去骨）;厂号;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43557, '0207142100', '冻的鸡翼', '千克', '无', 0.10, 0, '7AB4x', '冻的鸡翼(不包括翼尖)', '品牌类型; 出口享惠情况;  制作或保存方法(冻);加工方法（整只、带骨或去骨等）;厂号(名称或号码饲养场或加工厂);品牌;GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43558, '0207142200', '冻的鸡爪', '千克', '无', 0.09, 0, '7AB4x', '冻的鸡爪', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;加工方法（带骨、去骨）;厂号;品牌（中文或外文名称）;规格（个体重量）;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43559, '0207142900', '冻的其他食用鸡杂碎', '千克', '无', 0.06, 0, '7AB4x', '冻的其他食用鸡杂碎(包括鸡翼尖、鸡肝等)', '品牌类型; 出口享惠情况;  制作或保存方法(冻);加工方法（整只、带骨或去骨等）;种类（心、肝等）;厂号(名称或号码饲养场或加工厂);品牌;GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43560, '0207240000', '鲜或冷的整只火鸡', '千克', '无', 0.09, 0, 'AB', '鲜或冷的整只火鸡', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;加工方法（整只、带骨或去骨等）;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43561, '0207250000', '冻的整只火鸡', '千克', '无', 0.09, 0, 'AB', '冻的整只火鸡', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;加工方法（整只、带骨或去骨等）;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43562, '0207260000', '鲜或冷的火鸡块及杂碎', '千克', '无', 0.09, 0, 'AB', '鲜或冷的火鸡块及杂碎肥肝除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;加工方法（带骨、去骨）;杂碎请列明具体种类;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43563, '0207270000', '冻的火鸡块及杂碎', '千克', '无', 0.09, 0, 'AB', '冻的火鸡块及杂碎肥肝除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;加工方法（带骨、去骨）;杂碎请列明具体种类;厂号;品牌（中文或外文名称）;英文品名;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43564, '0207410000', '鲜或冷的整只鸭 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷的整只鸭 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;加工方法（整只）;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43565, '0207420000', '冻的整只鸭 ', '千克', '无', 0.09, 0, 'AB', '冻的整只鸭 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;加工方法（整只）;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43566, '0207430000', '鲜或冷的鸭肥肝 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷的鸭肥肝 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43567, '0207440000', '鲜或冷的鸭块及食用杂碎 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷的鸭块及食用杂碎 肥肝除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;加工方法（带骨或去骨等）;杂碎请列明具体种类;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43568, '0207450000', '冻的鸭块及食用杂碎 ', '千克', '无', 0.09, 0, 'AB', '冻的鸭块及食用杂碎 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;加工方法（带骨或去骨等）;杂碎请列明具体种类;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43569, '0207510000', '鲜或冷的整只鹅 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷的整只鹅 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;加工方法（整只）;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43570, '0207520000', '冻的整只鹅 ', '千克', '无', 0.09, 0, 'AB', '冻的整只鹅 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;加工方法（整只）;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43571, '0207530000', '鲜或冷的鹅肥肝 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷的鹅肥肝 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43572, '0207540000', '鲜或冷的鹅块及食用杂碎 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷的鹅块及食用杂碎 肥肝除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;加工方法（带骨或去骨等）;杂碎请列明具体种类;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43573, '0207550000', '冻的鹅块及食用杂碎 ', '千克', '无', 0.09, 0, 'AB', '冻的鹅块及食用杂碎 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;加工方法（带骨或去骨等）;杂碎请列明具体种类;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43574, '0207600000', '鲜、冷、冻的整只珍珠鸡、珍珠鸡块及食用杂碎 ', '千克', '无', 0.09, 0, 'AB', '鲜、冷、冻的整只珍珠鸡、珍珠鸡块及食用杂碎 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;加工方法（整只、带骨或去骨等）;杂碎请列明具体种类;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43575, '0208', '其他鲜、冷、冻肉及食用杂碎', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜、冷、冻);杂碎请列明具体种类及用途;包装规格;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43576, '0208101000', '鲜或冷的家兔肉', '千克', '无', 0.09, 0, 'AB', '鲜或冷的家兔肉不包括兔头', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43577, '0208102000', '冻家兔肉', '千克', '无', 0.09, 0, 'AB', '冻家兔肉不包括兔头', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43578, '0208109010', '鲜、冷或冻的濒危野兔肉及其食用杂碎', '千克', '无', 0.00, 0, 'ABFE', '鲜、冷或冻的濒危野兔肉及其食用杂碎不包括兔头', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;杂碎请列明具体种类;用途（食用）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43579, '0208109090', '鲜、冷或冻家兔食用杂碎', '千克', '无', 0.09, 0, 'AB', '鲜、冷或冻家兔食用杂碎', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;杂碎请列明具体种类;用途（食用）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43580, '0208300000', '鲜、冷或冻的灵长目动物肉及食用杂碎', '千克', '无', 0.09, 0, 'ABFE', '鲜、冷或冻的灵长目动物肉及食用杂碎', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;杂碎请列明具体种类;用途（食用）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43581, '0208400000', '鲜、冷或冻的鲸、海豚及鼠海豚（鲸目哺乳动物）的；鲜、冷或冻的海牛及儒艮（海牛目哺乳动物）的；鲜、冷或冻的海豹、海狮及海象（鳍足亚目哺乳动物）的肉及食用杂碎 ', '千克', '无', 0.09, 0, 'ABFE', '鲜、冷或冻的鲸、海豚及鼠海豚（鲸目哺乳动物）的；鲜、冷或冻的海牛及儒艮（海牛目哺乳动物）的；鲜、冷或冻的海豹、海狮及海象（鳍足亚目哺乳动物）的肉及食用杂碎 鲜、冷或冻的鲸、海豚、鼠海豚、海牛、儒艮、海豹、海狮及海象的肉及食用杂碎 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;杂碎请列明具体种类;用途（食用）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43582, '0208500000', '鲜、冷或冻的爬行动物肉及食用杂碎', '千克', '无', 0.09, 0, 'ABFE', '鲜、冷或冻的爬行动物肉及食用杂碎', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;杂碎请列明具体种类;用途（食用）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43583, '0208600010', '鲜、冷或冻的濒危野生骆驼及其他濒危野生骆驼科动物的肉及食用杂碎 ', '千克', '无', 0.00, 0, 'ABFE', '鲜、冷或冻的濒危野生骆驼及其他濒危野生骆驼科动物的肉及食用杂碎 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;杂碎请列明具体种类;用途（食用）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43584, '0208600090', '其他鲜、冷或冻骆驼及其他骆驼科动物的肉及食用杂碎 ', '千克', '无', 0.09, 0, 'AB', '其他鲜、冷或冻骆驼及其他骆驼科动物的肉及食用杂碎 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;杂碎请列明具体种类;用途（食用）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43585, '0208901000', '鲜、冷或冻的乳鸽肉及其杂碎', '千克', '无', 0.09, 0, 'AB', '鲜、冷或冻的乳鸽肉及其杂碎', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;杂碎请列明具体种类;用途（食用）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43586, '0208909010', '其他鲜、冷或冻的濒危野生动物肉', '千克', '无', 0.00, 0, 'ABFE', '其他鲜、冷或冻的濒危野生动物肉', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;杂碎请列明具体种类;用途（食用）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43587, '0208909090', '其他鲜、冷或冻肉及食用杂碎', '千克', '无', 0.09, 0, 'AB', '其他鲜、冷或冻肉及食用杂碎', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻）;杂碎请列明具体种类;用途（食用）;包装规格;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43588, '0209', '未炼制或用其他方法提取的不带瘦肉的肥猪肉、猪脂肪及家禽脂肪，鲜、冷、冻、干、熏、盐腌或盐渍的', '', '', 0.00, 1, '', '', '品名;制作或保存方法(未炼制、未提取脂肪、干、熏、盐腌、;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43589, '0209100000', '未炼制或用其他方法提取的不带瘦肉的肥猪肉、猪脂肪 ', '千克', '无', 0.09, 0, 'AB', '未炼制或用其他方法提取的不带瘦肉的肥猪肉、猪脂肪 包括鲜、冷、冻、干、熏、盐制的', '品名;品牌类型;出口享惠情况;制作或保存方法（未炼制、未提取脂肪，干、熏、盐腌、;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43590, '0209900000', '未炼制或用其他方法提取的家禽脂肪 ', '千克', '无', 0.09, 0, 'AB', '未炼制或用其他方法提取的家禽脂肪 包括鲜、冷、冻、干、熏、盐制的', '品名;品牌类型;出口享惠情况;制作或保存方法（未炼制、未提取脂肪，干、熏、盐腌、;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43591, '0210', '肉及食用杂碎，干、熏、盐腌或盐渍的；可供食用的肉或杂碎的细粉、粗粉', '', '', 0.00, 1, '', '', '品名;制作或保存方法(带骨、腿肉、腹肉、干、熏、盐腌、盐;品牌;品名;用途;制作或保存方法(干、熏、盐腌、盐渍等);杂碎请列明具体种类;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43592, '0210111010', '干、熏、盐制的带骨鹿豚、姬猪腿', '千克', '无', 0.09, 0, 'ABFE', '干、熏、盐制的带骨鹿豚、姬猪腿', '品名;品牌类型;出口享惠情况;部位（腿肉、腹肉等）,是否带骨;制作或保存方法（干、熏、盐腌、盐渍等）;加工方法（带骨、去骨）;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43593, '0210111090', '其他干、熏、盐制的带骨猪腿', '千克', '无', 0.09, 0, 'AB', '其他干、熏、盐制的带骨猪腿', '品名;品牌类型;出口享惠情况;部位（腿肉、腹肉等）,是否带骨;制作或保存方法（干、熏、盐腌、盐渍等）;加工方法（带骨、去骨）;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43594, '0210119010', '干、熏、盐制的带骨鹿豚、姬猪腿肉块', '千克', '无', 0.09, 0, 'ABFE', '干、熏、盐制的带骨鹿豚、姬猪腿肉块', '品名;品牌类型;出口享惠情况;部位（腿肉、腹肉等）,是否带骨;制作或保存方法（干、熏、盐腌、盐渍等）;加工方法（带骨、去骨）;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43595, '0210119090', '其他干、熏、盐制的带骨猪腿肉', '千克', '无', 0.09, 0, 'AB', '其他干、熏、盐制的带骨猪腿肉', '品名;品牌类型;出口享惠情况;部位（腿肉、腹肉等）,是否带骨;制作或保存方法（干、熏、盐腌、盐渍等）;加工方法（带骨、去骨）;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43596, '0210120010', '干、熏、盐制的鹿豚、姬猪腹肉', '千克', '无', 0.09, 0, 'ABFE', '干、熏、盐制的鹿豚、姬猪腹肉指五花肉', '品名;品牌类型;出口享惠情况;部位（腿肉、腹肉等）,是否带骨;制作或保存方法（干、熏、盐腌、盐渍等）;加工方法（带骨、去骨）;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43597, '0210120090', '其他干、熏、盐制的猪腹肉', '千克', '无', 0.09, 0, 'AB', '其他干、熏、盐制的猪腹肉指五花肉', '品名;品牌类型;出口享惠情况;部位（腿肉、腹肉等）,是否带骨;制作或保存方法（干、熏、盐腌、盐渍等）;加工方法（带骨、去骨）;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43598, '0210190010', '干、熏、盐制的鹿豚、姬猪其他肉', '千克', '无', 0.09, 0, 'ABFE', '干、熏、盐制的鹿豚、姬猪其他肉', '品名;品牌类型;出口享惠情况;部位（腿肉、腹肉等）,是否带骨;制作或保存方法（干、熏、盐腌、盐渍等）;加工方法（带骨、去骨）;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43599, '0210190090', '其他干、熏、盐制的其他猪肉', '千克', '无', 0.09, 0, 'AB', '其他干、熏、盐制的其他猪肉', '品名;品牌类型;出口享惠情况;部位（腿肉、腹肉等）,是否带骨;制作或保存方法（干、熏、盐腌、盐渍等）;加工方法（带骨、去骨）;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43600, '0210200010', '干、熏、盐制的濒危野牛肉', '千克', '无', 0.00, 0, 'ABFE', '干、熏、盐制的濒危野牛肉', '品名;品牌类型;出口享惠情况;制作或保存方法（干、熏、盐腌、盐渍等）;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43601, '0210200090', '干、熏、盐制的其他牛肉', '千克', '无', 0.09, 0, 'AB', '干、熏、盐制的其他牛肉', '品名;品牌类型;出口享惠情况;制作或保存方法（干、熏、盐腌、盐渍等）;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43602, '0210910000', '干、熏、盐制的灵长目动物肉及食用杂碎', '千克', '无', 0.09, 0, 'ABFE', '干、熏、盐制的灵长目动物肉及食用杂碎', '品名;品牌类型;出口享惠情况;用途;制作或保存方法（干、熏、盐腌、盐渍等）;杂碎请列明具体种类;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43603, '0210920000', '干、熏、盐制的鲸、海豚及鼠海豚（鲸目哺乳动物）的；干、熏、盐制的海牛及儒艮（海牛目哺乳动物）的；干、熏、盐制的海豹、海狮及海象（鳍足亚目哺乳动物）的肉及食用杂碎 ', '千克', '无', 0.09, 0, 'ABFE', '干、熏、盐制的鲸、海豚及鼠海豚（鲸目哺乳动物）的；干、熏、盐制的海牛及儒艮（海牛目哺乳动物）的；干、熏、盐制的海豹、海狮及海象（鳍足亚目哺乳动物）的肉及食用杂碎 包括可供食用的肉或杂碎的细粉、粗粉', '品名;品牌类型;出口享惠情况;用途;制作或保存方法（干、熏、盐腌、盐渍等）;杂碎请列明具体种类;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43604, '0210930000', '干、熏、盐制的爬行动物肉及食用杂碎', '千克', '无', 0.09, 0, 'ABFE', '干、熏、盐制的爬行动物肉及食用杂碎包括食用的肉及杂碎的细粉、粗粉', '品名;品牌类型;出口享惠情况;用途;制作或保存方法（干、熏、盐腌、盐渍等）;杂碎请列明具体种类;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43605, '0210990010', '干、熏、盐制的其他濒危动物肉及杂碎', '千克', '无', 0.00, 0, 'ABFE', '干、熏、盐制的其他濒危动物肉及杂碎包括可供食用的肉或杂碎的细粉、粗粉', '品名;品牌类型;出口享惠情况;用途;制作或保存方法（干、熏、盐腌、盐渍等）;杂碎请列明具体种类;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43606, '0210990090', '干、熏、盐制的其他肉及食用杂碎', '千克', '无', 0.09, 0, 'AB', '干、熏、盐制的其他肉及食用杂碎包括可供食用的肉或杂碎的细粉、粗粉', '品名;品牌类型;出口享惠情况;用途;制作或保存方法（干、熏、盐腌、盐渍等）;杂碎请列明具体种类;厂号;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43607, '0301', '活鱼', '', '', 0.00, 1, '', '', '品名;用途(观赏用);状态(活);拉丁名称;品名;状态(活);是否为鱼苗;拉丁名称;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43608, '0301110010', '观赏用濒危淡水鱼', '千克', '无', 0.00, 0, 'ABFE', '观赏用濒危淡水鱼 ', '品名;品牌类型;出口享惠情况;用途（观赏用）;状态（活）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43609, '0301110090', '观赏用其他淡水鱼（种苗除外）', '千克', '无', 0.09, 0, 'AB', '观赏用其他淡水鱼（种苗除外） ', '品名;品牌类型;出口享惠情况;用途（观赏用）;状态（活）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43610, '0301190010', '观赏用濒危非淡水鱼', '千克', '无', 0.00, 0, 'ABFE', '观赏用濒危非淡水鱼 ', '品名;品牌类型;出口享惠情况;用途（观赏用）;状态（活）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43611, '0301190090', '观赏用其他非淡水鱼（种苗除外）', '千克', '无', 0.09, 0, 'AB', '观赏用其他非淡水鱼（种苗除外） ', '品名;品牌类型;出口享惠情况;用途（观赏用）;状态（活）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43612, '0301911000', '鳟鱼(河鳟、虹鳟、克拉克大麻哈鱼、阿瓜大麻哈鱼、吉雨大麻哈鱼、亚利桑那大麻哈鱼、金腹大麻哈鱼)鱼苗', '千克', '无', 0.09, 0, 'AB', '鳟鱼(河鳟、虹鳟、克拉克大麻哈鱼、阿瓜大麻哈鱼、吉雨大麻哈鱼、亚利桑那大麻哈鱼、金腹大麻哈鱼)鱼苗 ', '品名;品牌类型;出口享惠情况;状态（活）;是否为鱼苗;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43613, '0301919000', '其他活鳟鱼(河鳟、虹鳟、克拉克大麻哈鱼、阿瓜大麻哈鱼、吉雨大麻哈鱼、亚利桑那大麻哈鱼、金腹大麻哈鱼)', '千克', '无', 0.09, 0, 'AB', '其他活鳟鱼(河鳟、虹鳟、克拉克大麻哈鱼、阿瓜大麻哈鱼、吉雨大麻哈鱼、亚利桑那大麻哈鱼、金腹大麻哈鱼) ', '品名;品牌类型;出口享惠情况;状态（活）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43614, '0301921010', '花鳗鲡鱼苗', '千克', '无', 0.00, 0, 'ABE', '花鳗鲡鱼苗', '品名;品牌类型;出口享惠情况;状态（活）;是否为鱼苗;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43615, '0301921020', '欧洲鳗鲡鱼苗', '千克', '无', 0.00, 0, 'ABEF', '欧洲鳗鲡鱼苗', '品名;品牌类型;出口享惠情况;状态（活）;是否为鱼苗;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43616, '0301921090', '鳗鱼（鳗鲡属）鱼苗（濒危除外）', '千克', '无', 0.00, 0, 'AB', '鳗鱼（鳗鲡属）鱼苗（濒危除外） ', '品名;品牌类型;出口享惠情况;状态（活）;是否为鱼苗;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43617, '0301929010', '花鳗鲡', '千克', '无', 0.09, 0, 'ABE', '花鳗鲡 ', '品名;品牌类型;出口享惠情况;状态（活）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43618, '0301929020', '欧洲鳗鲡', '千克', '无', 0.09, 0, 'ABEF', '欧洲鳗鲡 ', '品名;品牌类型;出口享惠情况;状态（活）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43619, '0301929090', '其他活鳗鱼（鳗鲡属）', '千克', '无', 0.09, 0, 'AB', '其他活鳗鱼（鳗鲡属） ', '品名;品牌类型;出口享惠情况;状态（活）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43620, '0301931000', '鲤科鱼（鲤属、鲫属、草鱼、鲢属、鲮属、青鱼、卡特拉鲃、野鲮属、哈氏纹唇鱼、何氏细须鲃、鲂属）鱼苗', '千克', '无', 0.09, 0, 'AB', '鲤科鱼（鲤属、鲫属、草鱼、鲢属、鲮属、青鱼、卡特拉鲃、野鲮属、哈氏纹唇鱼、何氏细须鲃、鲂属）鱼苗', '品名;品牌类型;出口享惠情况;状态[活];是否为鱼苗;拉丁学名;GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:08:35');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43621, '0301939000', '其他鲤科鱼（鲤属、鲫属、草鱼、鲢属、鲮属、青鱼、卡特拉鲃、野鲮属、哈氏纹唇鱼、何氏细须鲃、鲂属）', '千克', '无', 0.09, 0, 'AB', '其他鲤科鱼（鲤属、鲫属、草鱼、鲢属、鲮属、青鱼、卡特拉鲃、野鲮属、哈氏纹唇鱼、何氏细须鲃、鲂属） ', '品名;品牌类型;出口享惠情况;状态（活）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43622, '0301941000', '大西洋及太平洋蓝鳍金枪鱼鱼苗', '千克', '无', 0.09, 0, 'AB', '大西洋及太平洋蓝鳍金枪鱼鱼苗 ', '品名;品牌类型;出口享惠情况;状态（活）;是否为鱼苗;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43623, '0301949100', '大西洋蓝鳍金枪鱼', '千克', '无', 0.09, 0, 'AB', '大西洋蓝鳍金枪鱼 ', '品名;品牌类型;出口享惠情况;状态（活）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43624, '0301949200', '太平洋蓝鳍金枪鱼', '千克', '无', 0.09, 0, 'AB', '太平洋蓝鳍金枪鱼 ', '品名;品牌类型;出口享惠情况;状态（活）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43625, '0301951000', '南方蓝鳍金枪鱼鱼苗', '千克', '无', 0.09, 0, 'AB', '南方蓝鳍金枪鱼鱼苗(Thunnus maccoyii)', '品名;品牌类型;出口享惠情况;状态（活）;是否为鱼苗;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43626, '0301959000', '其他南方蓝鳍金枪鱼(Thunnus maccoyii)', '千克', '无', 0.09, 0, 'AB', '其他南方蓝鳍金枪鱼(Thunnus maccoyii) ', '品名;品牌类型;出口享惠情况;状态（活）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43627, '0301991100', '鲈鱼种苗', '千克', '无', 0.09, 0, 'AB', '鲈鱼种苗 ', '品名;品牌类型;出口享惠情况;状态（活）;是否为鱼苗;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43628, '0301991200', '鲟鱼种苗', '千克', '无', 0.09, 0, 'ABFE', '鲟鱼种苗', '品名;品牌类型;出口享惠情况;状态（活）;是否为鱼苗;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43629, '0301991910', '其他濒危鱼苗', '千克', '无', 0.00, 0, 'ABFE', '其他濒危鱼苗', '品名;品牌类型;出口享惠情况;状态（活）;是否为鱼苗;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43630, '0301991990', '其他鱼苗（濒危除外）', '千克', '无', 0.09, 0, 'AB', '其他鱼苗（濒危除外） ', '品名;品牌类型;出口享惠情况;状态（活）;是否为鱼苗;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43631, '0301999100', '活罗非鱼', '千克', '无', 0.09, 0, 'AB', '活罗非鱼 ', '品名;品牌类型;出口享惠情况;状态（活）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43632, '0301999200', '活的鲀', '千克', '无', 0.09, 0, 'AB', '活的鲀 ', '品名;品牌类型;出口享惠情况;状态（活）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43633, '0301999310', '活的濒危鲤科鱼', '千克', '无', 0.00, 0, 'ABFE', '活的濒危鲤科鱼 ', '品名;品牌类型;出口享惠情况;状态（活）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43634, '0301999390', '活的其他鲤科鱼', '千克', '无', 0.09, 0, 'AB', '活的其他鲤科鱼鲤科鱼（鲤属、鲫属、草鱼、鲢属、鲮属、青鱼、卡特拉鲃、野鲮属、哈氏纹唇鱼、何氏细须鲃、鲂属）除外', '品名;品牌类型;出口享惠情况;状态（活）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43635, '0301999910', '其他濒危活鱼', '千克', '无', 0.00, 0, 'ABFE', '其他濒危活鱼 ', '品名;品牌类型;出口享惠情况;状态（活）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43636, '0301999990', '其他活鱼', '千克', '无', 0.09, 0, 'AB', '其他活鱼 ', '品名;品牌类型;出口享惠情况;状态（活）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43637, '0302', '鲜、冷鱼，但品目0304的鱼片及其他鱼肉除外', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜、冷);拉丁名称;个体重量[如1000-2000克/条(块)等];品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43638, '0302110000', '鲜或冷鳟鱼(河鳟、虹鳟、克拉克大麻哈鱼、阿瓜大麻哈鱼、吉雨大麻哈鱼、亚利桑那大麻哈鱼、金腹大麻哈鱼)', '千克', '无', 0.09, 0, 'AB', '鲜或冷鳟鱼(河鳟、虹鳟、克拉克大麻哈鱼、阿瓜大麻哈鱼、吉雨大麻哈鱼、亚利桑那大麻哈鱼、金腹大麻哈鱼)子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43639, '0302130000', '鲜或冷的大麻哈鱼〔红大麻哈鱼、细磷大麻哈鱼、大麻哈鱼（种）、大鳞大麻哈鱼、银大麻哈鱼、马苏大麻哈鱼、玫瑰大麻哈鱼〕', '千克', '无', 0.09, 0, 'ABU', '鲜或冷的大麻哈鱼〔红大麻哈鱼、细磷大麻哈鱼、大麻哈鱼（种）、大鳞大麻哈鱼、银大麻哈鱼、马苏大麻哈鱼、玫瑰大麻哈鱼〕子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43640, '0302141000', '鲜或冷大西洋鲑鱼', '千克', '无', 0.09, 0, 'AB', '鲜或冷大西洋鲑鱼子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43641, '0302142000', '鲜或冷多瑙哲罗鱼', '千克', '无', 0.09, 0, 'AB', '鲜或冷多瑙哲罗鱼子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43642, '0302190010', '鲜或冷川陕哲罗鲑', '千克', '无', 0.09, 0, 'AB', '鲜或冷川陕哲罗鲑子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43643, '0302190020', '鲜或冷秦岭细鳞鲑', '千克', '无', 0.09, 0, 'AB', '鲜或冷秦岭细鳞鲑子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43644, '0302190090', '其他鲜或冷鲑科鱼', '千克', '无', 0.09, 0, 'AB', '其他鲜或冷鲑科鱼子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43645, '0302210010', '鲜或冷大西洋庸鲽（庸鲽）', '千克', '无', 0.09, 0, 'ABU', '鲜或冷大西洋庸鲽（庸鲽）子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43646, '0302210020', '鲜或冷马舌鲽', '千克', '无', 0.09, 0, 'ABU', '鲜或冷马舌鲽子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43647, '0302210090', '其他鲜或冷庸鲽鱼', '千克', '无', 0.09, 0, 'AB', '其他鲜或冷庸鲽鱼子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43648, '0302220000', '鲜或冷鲽鱼（鲽）', '千克', '无', 0.09, 0, 'AB', '鲜或冷鲽鱼（鲽）子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43649, '0302230000', '鲜或冷鳎鱼（鳎属）', '千克', '无', 0.09, 0, 'AB', '鲜或冷鳎鱼（鳎属）子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43650, '0302240000', '鲜或冷大菱鲆（瘤棘鮃）', '千克', '无', 0.09, 0, 'AB', '鲜或冷大菱鲆（瘤棘鮃）子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43651, '0302290010', '鲜或冷的亚洲箭齿鲽', '千克', '无', 0.09, 0, 'ABU', '鲜或冷的亚洲箭齿鲽子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43652, '0302290090', '其他鲜或冷比目鱼（鲽科、鲆科、舌鳎科、鳎科、菱鲆科、刺鲆科）', '千克', '无', 0.09, 0, 'AB', '其他鲜或冷比目鱼（鲽科、鲆科、舌鳎科、鳎科、菱鲆科、刺鲆科）子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43653, '0302310000', '鲜或冷长鳍金枪鱼', '千克', '无', 0.09, 0, 'AB', '鲜或冷长鳍金枪鱼子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43654, '0302320000', '鲜或冷黄鳍金枪鱼', '千克', '无', 0.09, 0, 'AB', '鲜或冷黄鳍金枪鱼子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43655, '0302330000', '鲜或冷鲣', '千克', '无', 0.09, 0, 'AB', '鲜或冷鲣子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43656, '0302340000', '鲜或冷大眼金枪鱼', '千克', '无', 0.09, 0, 'AB', '鲜或冷大眼金枪鱼子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43657, '0302351000', '鲜或冷大西洋蓝鳍金枪鱼 ', '千克', '无', 0.09, 0, 'ABU', '鲜或冷大西洋蓝鳍金枪鱼 子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43658, '0302352000', '鲜或冷太平洋蓝鳍金枪鱼 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷太平洋蓝鳍金枪鱼 子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43659, '0302360000', '鲜或冷南方金枪鱼', '千克', '无', 0.09, 0, 'AB', '鲜或冷南方金枪鱼子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43660, '0302390000', '其他鲜或冷金枪鱼（金枪鱼属）', '千克', '无', 0.09, 0, 'AB', '其他鲜或冷金枪鱼（金枪鱼属）子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43661, '0302410010', '鲜或冷太平洋鲱鱼', '千克', '无', 0.09, 0, 'ABU', '鲜或冷太平洋鲱鱼子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43662, '0302410090', '鲜或冷大西洋鲱鱼', '千克', '无', 0.09, 0, 'AB', '鲜或冷大西洋鲱鱼子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43663, '0302420000', '鲜或冷鳀鱼(鳀属) ', '千克', '无', 0.09, 0, 'AB', '鲜或冷鳀鱼(鳀属) 子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43664, '0302430000', '鲜或冷沙丁鱼（沙丁鱼、沙瑙鱼属）、小沙丁鱼属、黍鲱或西鲱 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷沙丁鱼（沙丁鱼、沙瑙鱼属）、小沙丁鱼属、黍鲱或西鲱 子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43665, '0302440000', '鲜或冷鲭鱼〔大西洋鲭、澳洲鲭（鲐）、日本鲭（鲐）〕 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷鲭鱼〔大西洋鲭、澳洲鲭（鲐）、日本鲭（鲐）〕 子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43666, '0302450000', '鲜或冷对称竹荚鱼、新西兰竹荚鱼及竹荚鱼(竹荚鱼属) ', '千克', '无', 0.09, 0, 'AB', '鲜或冷对称竹荚鱼、新西兰竹荚鱼及竹荚鱼(竹荚鱼属) 子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43667, '0302460000', '鲜或冷军曹鱼 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷军曹鱼 子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43668, '0302470000', '鲜或冷剑鱼', '千克', '无', 0.09, 0, 'ABU', '鲜或冷剑鱼子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43669, '0302490000', '鲜或冷其他03024项下的鱼', '千克', '无', 0.10, 0, 'AB', '鲜或冷其他0302.4项下的鱼印度鲭(羽鳃鲐属)、马鲛鱼(马鲛属)、鲹鱼（鲹属）、银', '品牌类型; 出口享惠情况;  制作或保存方法(鲜、冷);拉丁名称;个体重量[如1000-2000克/条(块)等];GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43670, '0302510000', '鲜或冷鳕鱼（大西洋鳕鱼、格陵兰鳕鱼、太平洋鳕鱼）', '千克', '无', 0.09, 0, 'AB', '鲜或冷鳕鱼（大西洋鳕鱼、格陵兰鳕鱼、太平洋鳕鱼）子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43671, '0302520000', '鲜或冷黑线鳕鱼（黑线鳕） ', '千克', '无', 0.09, 0, 'AB', '鲜或冷黑线鳕鱼（黑线鳕） 子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43672, '0302530000', '鲜或冷绿青鳕鱼 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷绿青鳕鱼 子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43673, '0302540000', '鲜或冷狗鳕鱼(无须鳕属、长鳍鳕属)', '千克', '无', 0.09, 0, 'AB', '鲜或冷狗鳕鱼(无须鳕属、长鳍鳕属)子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43674, '0302550000', '鲜或冷阿拉斯加狭鳕鱼', '千克', '无', 0.09, 0, 'ABU', '鲜或冷阿拉斯加狭鳕鱼子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43675, '0302560000', '鲜或冷蓝鳕鱼（小鳍鳕、南蓝鳕） ', '千克', '无', 0.09, 0, 'AB', '鲜或冷蓝鳕鱼（小鳍鳕、南蓝鳕） 子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43676, '0302590000', '其他鲜或冷犀鳕科、多丝真鳕科、鳕科、长尾鳕科、黑鳕科、无须鳕科、深海鳕科及南极鳕科鱼 ', '千克', '无', 0.09, 0, 'AB', '其他鲜或冷犀鳕科、多丝真鳕科、鳕科、长尾鳕科、黑鳕科、无须鳕科、深海鳕科及南极鳕科鱼 子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43677, '0302710000', '鲜或冷罗非鱼（口孵非鲫属） ', '千克', '无', 0.09, 0, 'AB', '鲜或冷罗非鱼（口孵非鲫属） 子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43678, '0302720000', '鲜或冷鲶鱼（(鱼芒)鲶属、鲶属、胡鲶属、真鮰属） ', '千克', '无', 0.09, 0, 'AB', '鲜或冷鲶鱼（(鱼芒)鲶属、鲶属、胡鲶属、真鮰属） 子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43679, '0302730000', '鲜或冷鲤科鱼（鲤属、鲫属、草鱼、鲢属、鲮属、青鱼、卡特拉鲃、野鲮属、哈氏纹唇鱼、何氏细须鲃、鲂属）', '千克', '无', 0.09, 0, 'AB', '鲜或冷鲤科鱼（鲤属、鲫属、草鱼、鲢属、鲮属、青鱼、卡特拉鲃、野鲮属、哈氏纹唇鱼、何氏细须鲃、鲂属）子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43680, '0302740010', '鲜或冷花鳗鲡 ', '千克', '无', 0.09, 0, 'ABE', '鲜或冷花鳗鲡 子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43681, '0302740020', '鲜或冷欧洲鳗鲡 ', '千克', '无', 0.09, 0, 'ABEF', '鲜或冷欧洲鳗鲡 子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43682, '0302740090', '其他鲜或冷鳗鱼（鳗鲡属） ', '千克', '无', 0.09, 0, 'AB', '其他鲜或冷鳗鱼（鳗鲡属） 子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43683, '0302790001', '鲜或冷尼罗河鲈鱼（尼罗尖吻鲈）', '千克', '无', 0.09, 0, 'AB', '鲜或冷尼罗河鲈鱼（尼罗尖吻鲈）子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43684, '0302790090', '鲜或冷的黑鱼（鳢属）', '千克', '无', 0.09, 0, 'AB', '鲜或冷的黑鱼（鳢属）子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43685, '0302810010', '鲜或冷濒危鲨鱼', '千克', '无', 0.00, 0, 'ABEF', '鲜或冷濒危鲨鱼子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43686, '0302810090', '鲜或冷其他鲨鱼 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷其他鲨鱼 子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43687, '0302820000', '鲜或冷魟鱼及鳐鱼（鳐科） ', '千克', '无', 0.09, 0, 'AB', '鲜或冷魟鱼及鳐鱼（鳐科） 子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43688, '0302830000', '鲜或冷南极犬牙鱼（南极犬牙鱼属） ', '千克', '无', 0.09, 0, 'ABU', '鲜或冷南极犬牙鱼（南极犬牙鱼属） 子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43689, '0302840000', '鲜或冷尖吻鲈鱼(舌齿鲈属) ', '千克', '无', 0.09, 0, 'AB', '鲜或冷尖吻鲈鱼(舌齿鲈属) 子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43690, '0302850000', '鲜或冷菱羊鲷(鲷科) ', '千克', '无', 0.09, 0, 'AB', '鲜或冷菱羊鲷(鲷科) 子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43691, '0302891000', '鲜或冷带鱼 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷带鱼 子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43692, '0302892000', '鲜或冷黄鱼 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷黄鱼 子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43693, '0302893000', '鲜或冷鲳鱼 (银鲳除外)', '千克', '无', 0.09, 0, 'AB', '鲜或冷鲳鱼 (银鲳除外)子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43694, '0302894000', '鲜或冷的鲀 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷的鲀 子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43695, '0302899001', '鲜或冷的其他鲈鱼 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷的其他鲈鱼 子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43696, '0302899010', '其他未列名濒危鲜或冷鱼 ', '千克', '无', 0.00, 0, 'ABFE', '其他未列名濒危鲜或冷鱼 子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43697, '0302899020', '鲜或冷的平鲉属', '千克', '无', 0.09, 0, 'ABU', '鲜或冷的平鲉属子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43698, '0302899030', '鲜或冷的鲪鲉属（叶鳍鲉属）', '千克', '无', 0.09, 0, 'ABU', '鲜或冷的鲪鲉属（叶鳍鲉属）子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43699, '0302899090', '其他鲜或冷鱼 ', '千克', '无', 0.09, 0, 'AB', '其他鲜或冷鱼 子目0302.91至0302.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:46');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43700, '0302910010', '鲜或冷濒危鱼种的肝、鱼卵及鱼精 ', '千克', '无', 0.00, 0, 'ABFE', '鲜或冷濒危鱼种的肝、鱼卵及鱼精 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43701, '0302910090', '其他鲜或冷的鱼肝、鱼卵及鱼精', '千克', '无', 0.09, 0, 'AB', '其他鲜或冷的鱼肝、鱼卵及鱼精 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;GTIN;CAS;其他', '2022-06-09 11:53:40');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43702, '0302920010', '鲜或冷濒危鲨鱼翅', '千克', '无', 0.00, 0, 'ABFE', '鲜或冷濒危鲨鱼翅', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43703, '0302920090', '其他鲜或冷鲨鱼翅', '千克', '无', 0.09, 0, 'AB', '其他鲜或冷鲨鱼翅', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43704, '0302990010', '其他鲜或冷可食用濒危鱼杂碎', '千克', '无', 0.00, 0, 'ABFE', '其他鲜或冷可食用濒危鱼杂碎', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43705, '0302990090', '其他鲜或冷可食用其他鱼杂碎', '千克', '无', 0.09, 0, 'AB', '其他鲜或冷可食用其他鱼杂碎', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43706, '0303', '冻鱼，但品目0304的鱼片及其他鱼肉除外', '', '', 0.00, 1, '', '', '品名;制作或保存方法(冻);拉丁名称;个体重量[如1000-2000克/条(块)等];品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43707, '0303110000', '冻红大麻哈鱼 ', '千克', '无', 0.09, 0, 'ABU', '冻红大麻哈鱼 但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43708, '0303120000', '其他冻大麻哈鱼〔细磷大麻哈鱼、大麻哈鱼（种）、大鳞大麻哈鱼、银大麻哈鱼、马苏大麻哈鱼、玫瑰大麻哈鱼〕 ', '千克', '无', 0.09, 0, 'ABU', '其他冻大麻哈鱼〔细磷大麻哈鱼、大麻哈鱼（种）、大鳞大麻哈鱼、银大麻哈鱼、马苏大麻哈鱼、玫瑰大麻哈鱼〕 但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43709, '0303130000', '冻大西洋鲑鱼及多瑙哲罗鱼', '千克', '无', 0.10, 0, 'AB', '冻大西洋鲑鱼及多瑙哲罗鱼(鱼肝及鱼卵除外)', '品牌类型; 出口享惠情况;  制作或保存方法(冻);拉丁名称;个体重量[如1000-2000克/条(块)等];GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43710, '0303140000', '冻鳟鱼(河鳟、虹鳟、克拉克大麻哈鱼、阿瓜大麻哈鱼、吉雨大麻哈鱼、亚利桑那大麻哈鱼、金腹大麻哈鱼) ', '千克', '无', 0.09, 0, 'AB', '冻鳟鱼(河鳟、虹鳟、克拉克大麻哈鱼、阿瓜大麻哈鱼、吉雨大麻哈鱼、亚利桑那大麻哈鱼、金腹大麻哈鱼) 但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43711, '0303190010', '冻川陕哲罗鲑 ', '千克', '无', 0.09, 0, 'AB', '冻川陕哲罗鲑 但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43712, '0303190020', '冻秦岭细鳞鲑 ', '千克', '无', 0.09, 0, 'AB', '冻秦岭细鳞鲑 但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43713, '0303190090', '其他冻鲑科鱼 ', '千克', '无', 0.09, 0, 'AB', '其他冻鲑科鱼 但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43714, '0303230000', '冻罗非鱼（口孵非鲫属） ', '千克', '无', 0.09, 0, 'AB', '冻罗非鱼（口孵非鲫属） 但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43715, '0303240000', '冻鲶鱼（(鱼芒)鲶属、鲶属、胡鲶属、真鮰属） ', '千克', '无', 0.09, 0, 'AB', '冻鲶鱼（(鱼芒)鲶属、鲶属、胡鲶属、真鮰属） 但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43716, '0303250000', '冻鲤科鱼（鲤属、鲫属、草鱼、鲢属、鲮属、青鱼、卡特拉鲃、野鲮属、哈氏纹唇鱼、何氏细须鲃、鲂属）', '千克', '无', 0.09, 0, 'AB', '冻鲤科鱼（鲤属、鲫属、草鱼、鲢属、鲮属、青鱼、卡特拉鲃、野鲮属、哈氏纹唇鱼、何氏细须鲃、鲂属）但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43717, '0303260010', '冻花鳗鲡 ', '千克', '无', 0.09, 0, 'ABE', '冻花鳗鲡 但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43718, '0303260020', '冻欧洲鳗鲡 ', '千克', '无', 0.09, 0, 'ABEF', '冻欧洲鳗鲡 但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43719, '0303260090', '其他冻鳗鱼（鳗鲡属） ', '千克', '无', 0.09, 0, 'AB', '其他冻鳗鱼（鳗鲡属） 但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43720, '0303290001', '冻尼罗河鲈鱼（尼罗尖吻鲈） ', '千克', '无', 0.09, 0, 'AB', '冻尼罗河鲈鱼（尼罗尖吻鲈） 但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43721, '0303290090', '冻黑鱼（鳢属）', '千克', '无', 0.09, 0, 'AB', '冻黑鱼（鳢属）但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43722, '0303311000', '冻马舌鲽（格陵兰庸鲽鱼）', '千克', '无', 0.09, 0, 'ABU', '冻马舌鲽（格陵兰庸鲽鱼）但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43723, '0303319010', '冻大西洋庸鲽（庸鲽）', '千克', '无', 0.09, 0, 'ABU', '冻大西洋庸鲽（庸鲽）但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43724, '0303319090', '其他冻庸鲽鱼', '千克', '无', 0.09, 0, 'AB', '其他冻庸鲽鱼但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43725, '0303320000', '冻鲽鱼（鲽）', '千克', '无', 0.09, 0, 'AB', '冻鲽鱼（鲽）但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43726, '0303330000', '冻鳎鱼（鳎属）', '千克', '无', 0.09, 0, 'AB', '冻鳎鱼（鳎属）但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43727, '0303340000', '冻大菱鲆（瘤棘鲆）', '千克', '无', 0.09, 0, 'AB', '冻大菱鲆（瘤棘鲆）但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43728, '0303390010', '冻亚洲箭齿鲽', '千克', '无', 0.09, 0, 'ABU', '冻亚洲箭齿鲽但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43729, '0303390090', '其他冻比目鱼（鲽科、鮃科、舌鳎科、鳎科、菱鲆科、刺鲆科）', '千克', '无', 0.09, 0, 'AB', '其他冻比目鱼（鲽科、鮃科、舌鳎科、鳎科、菱鲆科、刺鲆科）但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43730, '0303410000', '冻长鳍金枪鱼', '千克', '无', 0.09, 0, 'AB', '冻长鳍金枪鱼但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43731, '0303420000', '冻黄鳍金枪鱼', '千克', '无', 0.09, 0, 'AB', '冻黄鳍金枪鱼但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43732, '0303430000', '冻鲣', '千克', '无', 0.09, 0, 'AB', '冻鲣但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43733, '0303440000', '冻大眼金枪鱼', '千克', '无', 0.09, 0, 'ABU', '冻大眼金枪鱼但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43734, '0303451000', '冻大西洋蓝鳍金枪鱼 ', '千克', '无', 0.09, 0, 'ABU', '冻大西洋蓝鳍金枪鱼 但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43735, '0303452000', '冻太平洋蓝鳍金枪鱼 ', '千克', '无', 0.09, 0, 'AB', '冻太平洋蓝鳍金枪鱼 但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43736, '0303460000', '冻南方蓝鳍金枪鱼 ', '千克', '无', 0.09, 0, 'AB', '冻南方蓝鳍金枪鱼 但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43737, '0303490000', '其他冻金枪鱼（金枪鱼属） ', '千克', '无', 0.09, 0, 'AB', '其他冻金枪鱼（金枪鱼属） 但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43738, '0303510010', '冻太平洋鲱鱼', '千克', '无', 0.09, 0, 'ABU', '冻太平洋鲱鱼但子目0303.91至0303.99的可食用鱼杂碎除外：', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43739, '0303510090', '冻大西洋鲱鱼', '千克', '无', 0.09, 0, 'AB', '冻大西洋鲱鱼但子目0303.91至0303.99的可食用鱼杂碎除外：', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43740, '0303530000', '冻沙丁鱼（沙丁鱼、沙瑙鱼属）、小沙丁鱼属、黍鲱或西鲱 ', '千克', '无', 0.09, 0, 'AB', '冻沙丁鱼（沙丁鱼、沙瑙鱼属）、小沙丁鱼属、黍鲱或西鲱 但子目0303.91至0303.99的可食用鱼杂碎除外：', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43741, '0303540000', '冻鲭鱼〔大西洋鲭、澳洲鲭（鲐）、日本鲭（鲐）〕 ', '千克', '无', 0.09, 0, 'AB', '冻鲭鱼〔大西洋鲭、澳洲鲭（鲐）、日本鲭（鲐）〕 但子目0303.91至0303.99的可食用鱼杂碎除外：', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43742, '0303550000', '冻对称竹荚鱼、新西兰竹荚鱼及竹荚鱼(竹荚鱼属) ', '千克', '无', 0.09, 0, 'AB', '冻对称竹荚鱼、新西兰竹荚鱼及竹荚鱼(竹荚鱼属) 但子目0303.91至0303.99的可食用鱼杂碎除外：', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43743, '0303560000', '冻军曹鱼 ', '千克', '无', 0.09, 0, 'AB', '冻军曹鱼 但子目0303.91至0303.99的可食用鱼杂碎除外：', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43744, '0303570000', '冻剑鱼 ', '千克', '无', 0.09, 0, 'ABU', '冻剑鱼 但子目0303.91至0303.99的可食用鱼杂碎除外：', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43745, '0303590000', '鲜或冷银鲳(鲳属)、秋刀鱼、圆鲹(圆鲹属)、多春鱼(毛鳞鱼)、鲔鱼、狐鲣(狐鲣属)、枪鱼、旗鱼、四鳍旗鱼(旗鱼科)但子目0302.91至0302.99的可食用鱼杂碎除外', '千克', '', 0.00, 0, 'AB', '鲜或冷银鲳(鲳属)、秋刀鱼、圆鲹(圆鲹属)、多春鱼(毛鳞鱼)、鲔鱼、狐鲣(狐鲣属)、枪鱼、旗鱼、四鳍旗鱼(旗鱼科)但子目0302.91至0302.99的可食用鱼杂碎除外', '品名;制作或保存方法(冻);拉丁名称;个体重量[如1000-2000克/条(块)等];', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43746, '0303630000', '冻鳕鱼(大西洋鳕鱼、格陵兰鳕鱼、太平洋鳕鱼) ', '千克', '无', 0.09, 0, 'AB', '冻鳕鱼(大西洋鳕鱼、格陵兰鳕鱼、太平洋鳕鱼) 但子目0303.91至0303.99的可食用鱼杂碎除外：', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43747, '0303640000', '冻黑线鳕鱼（黑线鳕） ', '千克', '无', 0.09, 0, 'AB', '冻黑线鳕鱼（黑线鳕） 但子目0303.91至0303.99的可食用鱼杂碎除外：', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43748, '0303650000', '冻绿青鳕鱼 ', '千克', '无', 0.09, 0, 'AB', '冻绿青鳕鱼 但子目0303.91至0303.99的可食用鱼杂碎除外：', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43749, '0303660000', '冻狗鳕鱼(无须鳕属、长鳍鳕属) ', '千克', '无', 0.09, 0, 'AB', '冻狗鳕鱼(无须鳕属、长鳍鳕属) 但子目0303.91至0303.99的可食用鱼杂碎除外：', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43750, '0303670000', '冻阿拉斯加狭鳕鱼', '千克', '无', 0.09, 0, 'ABU', '冻阿拉斯加狭鳕鱼但子目0303.91至0303.99的可食用鱼杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43751, '0303680000', '冻蓝鳕鱼（小鳍鳕、南蓝鳕） ', '千克', '无', 0.09, 0, 'AB', '冻蓝鳕鱼（小鳍鳕、南蓝鳕） 但子目0303.91至0303.99的可食用鱼杂碎除外：', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43752, '0303690000', '冻的其他犀鳕科、多丝真鳕科、鳕科、长尾鳕科、黑鳕科、无须鳕科、深海鳕科及南极鳕科鱼 ', '千克', '无', 0.09, 0, 'AB', '冻的其他犀鳕科、多丝真鳕科、鳕科、长尾鳕科、黑鳕科、无须鳕科、深海鳕科及南极鳕科鱼 但子目0303.91至0303.99的可食用鱼杂碎除外：', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43753, '0303810010', '冻濒危鲨鱼', '千克', '无', 0.00, 0, 'ABFE', '冻濒危鲨鱼但子目0303.91至0303.99的可食用鱼杂碎除外：', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43754, '0303810090', '冻其他鲨鱼 ', '千克', '无', 0.09, 0, 'AB', '冻其他鲨鱼 但子目0303.91至0303.99的可食用鱼杂碎除外：', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43755, '0303820000', '冻魟鱼及鳐鱼（鳐科） ', '千克', '无', 0.09, 0, 'AB', '冻魟鱼及鳐鱼（鳐科） 但子目0303.91至0303.99的可食用鱼杂碎除外：', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43756, '0303830000', '冻南极犬牙鱼（南极犬牙鱼属） ', '千克', '无', 0.09, 0, 'ABU', '冻南极犬牙鱼（南极犬牙鱼属） 但子目0303.91至0303.99的可食用鱼杂碎除外：', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43757, '0303840000', '冻尖吻鲈鱼(舌齿鲈属) ', '千克', '无', 0.09, 0, 'AB', '冻尖吻鲈鱼(舌齿鲈属) 但子目0303.91至0303.99的可食用鱼杂碎除外：', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43758, '0303891000', '冻带鱼 ', '千克', '无', 0.09, 0, 'AB', '冻带鱼 但子目0303.91至0303.99的可食用鱼杂碎除外：', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];捕捞方式;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43759, '0303892000', '冻黄鱼 ', '千克', '无', 0.09, 0, 'AB', '冻黄鱼 但子目0303.91至0303.99的可食用鱼杂碎除外：', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43760, '0303893000', '冻鲳鱼(银鲳除外)', '千克', '无', 0.09, 0, 'AB', '冻鲳鱼(银鲳除外)但子目0303.91至0303.99的可食用鱼杂碎除外：', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43761, '0303899001', '其他冻鲈鱼 ', '千克', '无', 0.09, 0, 'AB', '其他冻鲈鱼 但子目0303.91至0303.99的可食用鱼杂碎除外：', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43762, '0303899010', '其他未列名濒危冻鱼 ', '千克', '无', 0.00, 0, 'ABFE', '其他未列名濒危冻鱼 但子目0303.91至0303.99的可食用鱼杂碎除外：', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43763, '0303899020', '冻平鲉属鱼', '千克', '无', 0.09, 0, 'ABU', '冻平鲉属鱼但子目0303.91至0303.99的可食用鱼杂碎除外：', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43764, '0303899030', '冻鲪鲉属（叶鳍鲉属）', '千克', '无', 0.09, 0, 'ABU', '冻鲪鲉属（叶鳍鲉属）但子目0303.91至0303.99的可食用鱼杂碎除外：', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43765, '0303899090', '其他未列名冻鱼 ', '千克', '无', 0.09, 0, 'AB', '其他未列名冻鱼 但子目0303.91至0303.99的可食用鱼杂碎除外：', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量[如;-;克/条（块）等];GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43766, '0303910010', '冻濒危鱼种的肝、鱼卵及鱼精 ', '千克', '无', 0.00, 0, 'ABFE', '冻濒危鱼种的肝、鱼卵及鱼精 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43767, '0303910090', '其他冻鱼肝、鱼卵及鱼精', '千克', '无', 0.09, 0, 'AB', '其他冻鱼肝、鱼卵及鱼精 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;GTIN;CAS;其他', '2022-06-09 11:53:40');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43768, '0303920010', '冻濒危鲨鱼翅', '千克', '无', 0.00, 0, 'ABFE', '冻濒危鲨鱼翅', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43769, '0303920090', '其他冻鲨鱼翅', '千克', '无', 0.09, 0, 'AB', '其他冻鲨鱼翅', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43770, '0303990010', '其他冻可食用濒危鱼杂碎', '千克', '无', 0.00, 0, 'ABFE', '其他冻可食用濒危鱼杂碎', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43771, '0303990090', '其他冻可食用其他鱼杂碎', '千克', '无', 0.09, 0, 'AB', '其他冻可食用其他鱼杂碎', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43772, '0304', '鲜、冷、冻鱼片及其他鱼肉（不论是否绞碎）', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜、冷);拉丁名称;规格[克重/片(块)等];品名;制作或保存方法(冻);拉丁名称;规格[克重/片(块)等];是否带头、脏、皮、刺、鳞、鳍;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43773, '0304310000', '鲜或冷的罗非鱼（口孵非鲫属）的鱼片 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷的罗非鱼（口孵非鲫属）的鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43774, '0304320000', '鲜或冷的鲶鱼（(鱼芒)鲶属、鲶属、胡鲶属、真鮰属）的鱼片 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷的鲶鱼（(鱼芒)鲶属、鲶属、胡鲶属、真鮰属）的鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43775, '0304330000', '鲜或冷的尼罗河鲈鱼（尼罗尖吻鲈）的鱼片 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷的尼罗河鲈鱼（尼罗尖吻鲈）的鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43776, '0304390010', '鲜或冷的花鳗鲡鱼片 ', '千克', '无', 0.09, 0, 'ABE', '鲜或冷的花鳗鲡鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43777, '0304390020', '鲜或冷的欧洲鳗鲡鱼片 ', '千克', '无', 0.09, 0, 'ABEF', '鲜或冷的欧洲鳗鲡鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43778, '0304390090', '鲜或冷的鲤科鱼（鲤属、鯽属、草鱼、鲢属、鲮属、青鱼、卡特拉鲃、野鲮属、哈氏纹唇鱼、何氏细须鲃、鲂属）、其他鳗鱼（鳗鲡属）及黑鱼（鳢属）的鱼片 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷的鲤科鱼（鲤属、鯽属、草鱼、鲢属、鲮属、青鱼、卡特拉鲃、野鲮属、哈氏纹唇鱼、何氏细须鲃、鲂属）、其他鳗鱼（鳗鲡属）及黑鱼（鳢属）的鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43779, '0304410000', '鲜或冷的大麻哈鱼〔红大麻哈鱼、细磷大麻哈鱼、大麻哈鱼（种）、大鳞大麻哈鱼、银大麻哈鱼、马苏大麻哈鱼、玫瑰大麻哈鱼〕、大西洋鲑鱼及多瑙哲罗鱼的鱼片 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷的大麻哈鱼〔红大麻哈鱼、细磷大麻哈鱼、大麻哈鱼（种）、大鳞大麻哈鱼、银大麻哈鱼、马苏大麻哈鱼、玫瑰大麻哈鱼〕、大西洋鲑鱼及多瑙哲罗鱼的鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43780, '0304420000', '鲜或冷的鳟鱼(河鳟、虹鳟、克拉克大麻哈鱼、阿瓜大麻哈鱼、吉雨大麻哈鱼、亚利桑那大麻哈鱼、金腹大麻哈鱼)的鱼片 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷的鳟鱼(河鳟、虹鳟、克拉克大麻哈鱼、阿瓜大麻哈鱼、吉雨大麻哈鱼、亚利桑那大麻哈鱼、金腹大麻哈鱼)的鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43781, '0304430000', '鲜或冷的比目鱼（鲽科、鮃科、舌鳎科、鳎科、菱鮃科、刺鮃科）的鱼片 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷的比目鱼（鲽科、鮃科、舌鳎科、鳎科、菱鮃科、刺鮃科）的鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43782, '0304440000', '鲜或冷的犀鳕科、多丝真鳕科、鳕科、长尾鳕科、黑鳕科、无须鳕科、深海鳕科及南极鳕科鱼的鱼片 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷的犀鳕科、多丝真鳕科、鳕科、长尾鳕科、黑鳕科、无须鳕科、深海鳕科及南极鳕科鱼的鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43783, '0304450000', '鲜或冷的剑鱼鱼片 ', '千克', '无', 0.09, 0, 'ABU', '鲜或冷的剑鱼鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43784, '0304460000', '鲜或冷的南极犬牙鱼(南极犬牙鱼属)的鱼片 ', '千克', '无', 0.09, 0, 'ABU', '鲜或冷的南极犬牙鱼(南极犬牙鱼属)的鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43785, '0304470010', '鲜或冷的濒危鲨鱼的鱼片', '千克', '无', 0.00, 0, 'ABFE', '鲜或冷的濒危鲨鱼的鱼片', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43786, '0304470090', '鲜或冷的其他鲨鱼的鱼片', '千克', '无', 0.09, 0, 'AB', '鲜或冷的其他鲨鱼的鱼片', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43787, '0304480010', '鲜或冷的濒危魟鱼及鳐鱼的鱼片', '千克', '无', 0.00, 0, 'ABFE', '鲜或冷的濒危魟鱼及鳐鱼的鱼片', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43788, '0304480090', '鲜或冷的其他魟鱼及鳐鱼的鱼片', '千克', '无', 0.09, 0, 'AB', '鲜或冷的其他魟鱼及鳐鱼的鱼片', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43789, '0304490010', '鲜或冷的其他濒危鱼的鱼片 ', '千克', '无', 0.00, 0, 'ABFE', '鲜或冷的其他濒危鱼的鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43790, '0304490090', '鲜或冷的其他鱼的鱼片 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷的其他鱼的鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43791, '0304510010', '鲜或冷的花鳗鲡的鱼肉', '千克', '无', 0.09, 0, 'ABE', '鲜或冷的花鳗鲡的鱼肉不论是否绞碎', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43792, '0304510020', '鲜或冷的欧洲鳗鲡的鱼肉', '千克', '无', 0.09, 0, 'ABEF', '鲜或冷的欧洲鳗鲡的鱼肉不论是否绞碎', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43793, '0304510090', '鲜或冷的罗非鱼（口孵非鲫属）、鲶鱼（(鱼芒)鲶属、鲶属、胡鲶属、真鮰属）、鲤科鱼（鲤属、鯽属、草鱼、鲢属、鲮属、青鱼、卡特拉鲃、野鲮属、哈氏纹唇鱼、何氏细须鲃、鲂属）、其他鳗鱼（鳗鲡属）、尼罗河鲈鱼（尼罗尖吻鲈）及黑鱼（醴属）的鱼肉 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷的罗非鱼（口孵非鲫属）、鲶鱼（(鱼芒)鲶属、鲶属、胡鲶属、真鮰属）、鲤科鱼（鲤属、鯽属、草鱼、鲢属、鲮属、青鱼、卡特拉鲃、野鲮属、哈氏纹唇鱼、何氏细须鲃、鲂属）、其他鳗鱼（鳗鲡属）、尼罗河鲈鱼（尼罗尖吻鲈）及黑鱼（醴属）的鱼肉 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43794, '0304520000', '鲜或冷的鲑科鱼的鱼肉 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷的鲑科鱼的鱼肉 不论是否绞碎', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43795, '0304530000', '鲜或冷的犀鳕科、多丝真鳕科、鳕科、长尾鳕科、黑鳕科、无须鳕科、深海鳕科及南极鳕科鱼的鱼肉 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷的犀鳕科、多丝真鳕科、鳕科、长尾鳕科、黑鳕科、无须鳕科、深海鳕科及南极鳕科鱼的鱼肉 不论是否绞碎', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43796, '0304540000', '鲜或冷的剑鱼鱼肉', '千克', '无', 0.09, 0, 'ABU', '鲜或冷的剑鱼鱼肉不论是否绞碎', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43797, '0304550000', '鲜或冷的南极犬牙鱼(南极犬牙鱼属)鱼的鱼肉 ', '千克', '无', 0.09, 0, 'ABU', '鲜或冷的南极犬牙鱼(南极犬牙鱼属)鱼的鱼肉 不论是否绞碎', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43798, '0304560010', '鲜或冷的濒危鲨鱼肉', '千克', '无', 0.00, 0, 'ABEF', '鲜或冷的濒危鲨鱼肉不论是否绞碎', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43799, '0304560090', '鲜或冷的其他鲨鱼肉', '千克', '无', 0.09, 0, 'AB', '鲜或冷的其他鲨鱼肉不论是否绞碎', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43800, '0304570010', '鲜或冷的濒危魟鱼及鳐鱼的鱼肉', '千克', '无', 0.00, 0, 'ABEF', '鲜或冷的濒危魟鱼及鳐鱼的鱼肉不论是否绞碎', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43801, '0304570090', '鲜或冷的其他魟鱼及鳐鱼的鱼肉', '千克', '无', 0.09, 0, 'AB', '鲜或冷的其他魟鱼及鳐鱼的鱼肉不论是否绞碎', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43802, '0304590010', '鲜或冷的其他濒危鱼的鱼肉 ', '千克', '无', 0.00, 0, 'ABEF', '鲜或冷的其他濒危鱼的鱼肉 不论是否绞碎', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43803, '0304590090', '鲜或冷的其他鱼的鱼肉 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷的其他鱼的鱼肉 不论是否绞碎', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43804, '0304610000', '冻罗非鱼（口孵非鲫属）鱼片 ', '千克', '无', 0.09, 0, 'AB', '冻罗非鱼（口孵非鲫属）鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43805, '0304621100', '冻斑点叉尾鮰鱼鱼片 ', '千克', '无', 0.09, 0, 'AB', '冻斑点叉尾鮰鱼鱼片 斑点叉尾鮰鱼亦称沟鲶,属于鲇形目、叉尾鮰科、叉尾鮰属。', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43806, '0304621900', '冻的其他叉尾鮰鱼片 ', '千克', '无', 0.09, 0, 'AB', '冻的其他叉尾鮰鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43807, '0304629000', '冻的其他鲶鱼（(鱼芒)鲶属、鲶属、胡鲶属、真鮰属）鱼片 ', '千克', '无', 0.09, 0, 'AB', '冻的其他鲶鱼（(鱼芒)鲶属、鲶属、胡鲶属、真鮰属）鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;是否带皮、刺、鳞、鳍;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43808, '0304630000', '冻的尼罗河鲈鱼（尼罗尖吻鲈）鱼片 ', '千克', '无', 0.09, 0, 'AB', '冻的尼罗河鲈鱼（尼罗尖吻鲈）鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;是否带皮、刺、鳞、鳍;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43809, '0304690010', '冻的花鳗鲡鱼片', '千克', '无', 0.09, 0, 'ABE', '冻的花鳗鲡鱼片', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;是否带皮、刺、鳞、鳍;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43810, '0304690020', '冻的欧洲鳗鲡鱼片', '千克', '无', 0.09, 0, 'ABEF', '冻的欧洲鳗鲡鱼片', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;是否带皮、刺、鳞、鳍;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43811, '0304690090', '冻的鲤科鱼（鲤属、鯽属、草鱼、鲢属、鲮属、青鱼、卡特拉鲃、野鲮属、哈氏纹唇鱼、何氏细须鲃、鲂属）、其他鳗鱼（鳗鲡属）及黑鱼（鳢属）的鱼片 ', '千克', '无', 0.09, 0, 'AB', '冻的鲤科鱼（鲤属、鯽属、草鱼、鲢属、鲮属、青鱼、卡特拉鲃、野鲮属、哈氏纹唇鱼、何氏细须鲃、鲂属）、其他鳗鱼（鳗鲡属）及黑鱼（鳢属）的鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;是否带皮、刺、鳞、鳍;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43812, '0304710000', '冻的鳕鱼（大西洋鳕鱼、格陵兰鳕鱼、太平洋鳕鱼）鱼片 ', '千克', '无', 0.09, 0, 'AB', '冻的鳕鱼（大西洋鳕鱼、格陵兰鳕鱼、太平洋鳕鱼）鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;是否带皮、刺、鳞、鳍;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43813, '0304720000', '冻的黑线鳕鱼（黑线鳕）鱼片 ', '千克', '无', 0.09, 0, 'AB', '冻的黑线鳕鱼（黑线鳕）鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;是否带皮、刺、鳞、鳍;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43814, '0304730000', '冻的绿青鳕鱼鱼片 ', '千克', '无', 0.09, 0, 'AB', '冻的绿青鳕鱼鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;是否带皮、刺、鳞、鳍;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43815, '0304740000', '冻的狗鳕鱼(无须鳕属、长鳍鳕属)鱼片 ', '千克', '无', 0.09, 0, 'AB', '冻的狗鳕鱼(无须鳕属、长鳍鳕属)鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;是否带皮、刺、鳞、鳍;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43816, '0304750000', '冻的阿拉斯加狭鳕鱼鱼片', '千克', '无', 0.09, 0, 'AB', '冻的阿拉斯加狭鳕鱼鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;是否带皮、刺、鳞、鳍;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43817, '0304790000', '冻的犀鳕科、多丝真鳕科、鳕科、长尾鳕科、黑鳕科、无须鳕科、深海鳕科及南极鳕科鱼的鱼片 ', '千克', '无', 0.09, 0, 'AB', '冻的犀鳕科、多丝真鳕科、鳕科、长尾鳕科、黑鳕科、无须鳕科、深海鳕科及南极鳕科鱼的鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;是否带皮、刺、鳞、鳍;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43818, '0304810000', '冻的大麻哈鱼〔红大麻哈鱼、细磷大麻哈鱼、大麻哈鱼（种）、大鳞大麻哈鱼、银大麻哈鱼、马苏大麻哈鱼、玫瑰大麻哈鱼〕、大西洋鲑鱼及多瑙哲罗鱼鱼片 ', '千克', '无', 0.09, 0, 'AB', '冻的大麻哈鱼〔红大麻哈鱼、细磷大麻哈鱼、大麻哈鱼（种）、大鳞大麻哈鱼、银大麻哈鱼、马苏大麻哈鱼、玫瑰大麻哈鱼〕、大西洋鲑鱼及多瑙哲罗鱼鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;是否带皮、刺、鳞、鳍;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43819, '0304820000', '冻的鳟鱼(河鳟、虹鳟、克拉克大麻哈鱼、阿瓜大麻哈鱼、吉雨大麻哈鱼、亚利桑那大麻哈鱼、金腹大麻哈鱼) 鱼片 ', '千克', '无', 0.09, 0, 'AB', '冻的鳟鱼(河鳟、虹鳟、克拉克大麻哈鱼、阿瓜大麻哈鱼、吉雨大麻哈鱼、亚利桑那大麻哈鱼、金腹大麻哈鱼) 鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;是否带皮、刺、鳞、鳍;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43820, '0304830000', '冻的比目鱼（鲽科、鮃科、舌鳎科、鳎科、菱鮃科、刺鮃科） 鱼片 ', '千克', '无', 0.09, 0, 'AB', '冻的比目鱼（鲽科、鮃科、舌鳎科、鳎科、菱鮃科、刺鮃科） 鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;是否带皮、刺、鳞、鳍;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43821, '0304840000', '冻剑鱼鱼片 ', '千克', '无', 0.09, 0, 'ABU', '冻剑鱼鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43822, '0304850000', '冻南极犬牙鱼(南极犬牙鱼属)鱼片 ', '千克', '无', 0.09, 0, 'ABU', '冻南极犬牙鱼(南极犬牙鱼属)鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43823, '0304860000', '冻的鲱鱼（大西洋鲱鱼、太平洋鲱鱼）鱼片 ', '千克', '无', 0.09, 0, 'AB', '冻的鲱鱼（大西洋鲱鱼、太平洋鲱鱼）鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;是否带皮、刺、鳞、鳍;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43824, '0304870000', '冻的金枪鱼(金枪鱼属)、鲣的鱼片', '千克', '无', 0.09, 0, 'AB', '冻的金枪鱼(金枪鱼属)、鲣的鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;是否带皮、刺、鳞、鳍;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43825, '0304880010', '冻的濒危鲨鱼、魟鱼及鳐鱼的鱼片 ', '千克', '无', 0.00, 0, 'ABEF', '冻的濒危鲨鱼、魟鱼及鳐鱼的鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43826, '0304880090', '冻的其他鲨鱼、魟鱼及鳐鱼的鱼片 ', '千克', '无', 0.09, 0, 'AB', '冻的其他鲨鱼、魟鱼及鳐鱼的鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43827, '0304890010', '冻的其他濒危鱼片 ', '千克', '无', 0.00, 0, 'ABEF', '冻的其他濒危鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;是否带皮、刺、鳞、鳍;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43828, '0304890090', '冻的其他鱼片 ', '千克', '无', 0.09, 0, 'AB', '冻的其他鱼片 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;是否带皮、刺、鳞、鳍;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43829, '0304910000', '其他冻剑鱼肉', '千克', '无', 0.09, 0, 'ABU', '其他冻剑鱼肉(Xiphias gladius)不论是否绞碎', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43830, '0304920000', '其他冻南极犬牙鱼肉', '千克', '无', 0.09, 0, 'ABU', '其他冻南极犬牙鱼肉(Toothfish,Dissostichus spp.)不论是否绞碎', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43831, '0304930010', '冻的花鳗鲡鱼肉', '千克', '无', 0.09, 0, 'ABE', '冻的花鳗鲡鱼肉不论是否绞碎', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43832, '0304930020', '冻的欧洲鳗鲡鱼肉', '千克', '无', 0.09, 0, 'ABEF', '冻的欧洲鳗鲡鱼肉不论是否绞碎', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43833, '0304930090', '冻的罗非鱼（口孵非鲫属）、鲶鱼（(鱼芒)鲶属、鲶属、胡鲶属、真鮰属）、鲤科鱼（鲤属、鯽属、草鱼、鲢属、鲮属、青鱼、卡特拉鲃、野鲮属、哈氏纹唇鱼、何氏细须鲃、鲂属）、其他鳗鱼（鳗鲡属）、尼罗河鲈鱼（尼罗尖吻鲈）及黑鱼（鳢属）鱼肉 ', '千克', '无', 0.09, 0, 'AB', '冻的罗非鱼（口孵非鲫属）、鲶鱼（(鱼芒)鲶属、鲶属、胡鲶属、真鮰属）、鲤科鱼（鲤属、鯽属、草鱼、鲢属、鲮属、青鱼、卡特拉鲃、野鲮属、哈氏纹唇鱼、何氏细须鲃、鲂属）、其他鳗鱼（鳗鲡属）、尼罗河鲈鱼（尼罗尖吻鲈）及黑鱼（鳢属）鱼肉 不论是否绞碎', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43834, '0304940000', '冻的阿拉斯加狭鳕鱼鱼肉', '千克', '无', 0.09, 0, 'AB', '冻的阿拉斯加狭鳕鱼鱼肉不论是否绞碎', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43835, '0304950000', '冻的犀鳕科、多丝真鳕科、鳕科、长尾鳕科、黑鳕科、无须鳕科、深海鳕科及南极鳕科鱼的鱼肉，阿拉斯加狭鳕鱼除外 ', '千克', '无', 0.09, 0, 'AB', '冻的犀鳕科、多丝真鳕科、鳕科、长尾鳕科、黑鳕科、无须鳕科、深海鳕科及南极鳕科鱼的鱼肉，阿拉斯加狭鳕鱼除外 不论是否绞碎', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43836, '0304960010', '冻的濒危鲨鱼肉', '千克', '无', 0.00, 0, 'ABFE', '冻的濒危鲨鱼肉不论是否绞碎', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43837, '0304960090', '冻的其他鲨鱼肉', '千克', '无', 0.09, 0, 'AB', '冻的其他鲨鱼肉不论是否绞碎', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43838, '0304970010', '冻的濒危魟鱼及鳐鱼的鱼肉', '千克', '无', 0.00, 0, 'ABFE', '冻的濒危魟鱼及鳐鱼的鱼肉不论是否绞碎', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43839, '0304970090', '冻的其他魟鱼及鳐鱼的鱼肉', '千克', '无', 0.09, 0, 'AB', '冻的其他魟鱼及鳐鱼的鱼肉不论是否绞碎', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43840, '0304990010', '冻的其他濒危鱼的鱼肉', '千克', '无', 0.00, 0, 'ABFE', '冻的其他濒危鱼的鱼肉不论是否绞碎', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43841, '0304990090', '其他冻鱼肉', '千克', '无', 0.09, 0, 'AB', '其他冻鱼肉不论是否绞碎', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量［如;～;克/片（块）等］;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43842, '0305', '干、盐腌或盐渍的鱼；熏鱼，不论在熏制前或熏制过程中是否烹煮；适合供人食用的鱼的细粉、粗粉及团粒', '', '', 0.00, 1, '', '', '品名;制作或保存方法(干、熏、盐腌、盐渍);拉丁名称;规格大小;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43843, '0305100000', '供人食用的鱼粉及团粒', '千克', '无', 0.09, 0, 'AB', '供人食用的鱼粉及团粒', '品名;品牌类型;出口享惠情况;用途;拉丁学名;GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:08:53');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43844, '0305200010', '干、熏、盐制的濒危鱼种肝、卵及鱼精', '千克', '无', 0.00, 0, 'ABFE', '干、熏、盐制的濒危鱼种肝、卵及鱼精', '品名;品牌类型;出口享惠情况;制作或保存方法（干、熏、盐腌、盐渍）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43845, '0305200090', '其他干、熏、盐制的鱼肝、鱼卵及鱼精', '千克', '无', 0.09, 0, 'AB', '其他干、熏、盐制的鱼肝、鱼卵及鱼精', '品名;品牌类型;出口享惠情况;制作或保存方法（干、熏、盐腌、盐渍）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43846, '0305310010', '干、盐腌或盐渍的花鳗鲡鱼片 ', '千克', '无', 0.09, 0, 'ABE', '干、盐腌或盐渍的花鳗鲡鱼片 熏制的除外', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43847, '0305310020', '干、盐腌或盐渍的欧洲鳗鲡鱼片 ', '千克', '无', 0.09, 0, 'ABEF', '干、盐腌或盐渍的欧洲鳗鲡鱼片 熏制的除外', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43848, '0305310090', '干、盐腌或盐渍的罗非鱼（口孵非鲫属）、鲶鱼（(鱼芒)鲶属、鲶属、胡鲶属、真鮰属）、鲤科鱼（鲤属、鯽属、草鱼、鲢属、鲮属、青鱼、卡特拉鲃、野鲮属、哈氏纹唇鱼、何氏细须鲃、鲂属）、鳗鱼（鳗鲡属）、尼罗河鲈鱼（尼罗尖吻鲈）及黑鱼（鳢属）的鱼片', '千克', '无', 0.09, 0, 'AB', '干、盐腌或盐渍的罗非鱼（口孵非鲫属）、鲶鱼（(鱼芒)鲶属、鲶属、胡鲶属、真鮰属）、鲤科鱼（鲤属、鯽属、草鱼、鲢属、鲮属、青鱼、卡特拉鲃、野鲮属、哈氏纹唇鱼、何氏细须鲃、鲂属）、鳗鱼（鳗鲡属）、尼罗河鲈鱼（尼罗尖吻鲈）及黑鱼（鳢属）的鱼片熏制的除外', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43849, '0305320000', '干、盐腌或盐渍的犀鳕科、多丝真鳕科、鳕科、长尾鳕科、黑鳕科、无须鳕科、深海鳕科及南极鳕科的鱼片 ', '千克', '无', 0.09, 0, 'AB', '干、盐腌或盐渍的犀鳕科、多丝真鳕科、鳕科、长尾鳕科、黑鳕科、无须鳕科、深海鳕科及南极鳕科的鱼片 熏制的除外', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43850, '0305390010', '干、盐腌或盐渍的濒危鱼类的鱼片 ', '千克', '无', 0.00, 0, 'ABEF', '干、盐腌或盐渍的濒危鱼类的鱼片 熏制的除外', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43851, '0305390090', '其他干、盐腌或盐渍的鱼片 ', '千克', '无', 0.09, 0, 'AB', '其他干、盐腌或盐渍的鱼片 熏制的除外', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43852, '0305411000', '熏大西洋鲑鱼及鱼片 ', '千克', '无', 0.09, 0, 'AB', '熏大西洋鲑鱼及鱼片 食用杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（熏）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43853, '0305412000', '熏大麻哈鱼、多瑙哲罗鱼及鱼片 ', '千克', '无', 0.09, 0, 'AB', '熏大麻哈鱼、多瑙哲罗鱼及鱼片 食用杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（熏）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43854, '0305420000', '熏制鲱鱼（大西洋鲱鱼、太平洋鲱鱼）及鱼片 ', '千克', '无', 0.09, 0, 'AB', '熏制鲱鱼（大西洋鲱鱼、太平洋鲱鱼）及鱼片 食用杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（熏）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43855, '0305430000', '熏制鳟鱼(河鳟、虹鳟、克拉克大麻哈鱼、阿瓜大麻哈鱼、吉雨大麻哈鱼、亚利桑那大麻哈鱼、金腹大麻哈鱼)及鱼片 ', '千克', '无', 0.09, 0, 'AB', '熏制鳟鱼(河鳟、虹鳟、克拉克大麻哈鱼、阿瓜大麻哈鱼、吉雨大麻哈鱼、亚利桑那大麻哈鱼、金腹大麻哈鱼)及鱼片 食用杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（熏）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43856, '0305440010', '熏制花鳗鲡及鱼片', '千克', '无', 0.09, 0, 'ABE', '熏制花鳗鲡及鱼片食用杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（熏）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43857, '0305440020', '熏制欧洲鳗鲡及鱼片', '千克', '无', 0.09, 0, 'ABEF', '熏制欧洲鳗鲡及鱼片食用杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（熏）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:48');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43858, '0305440090', '熏制罗非鱼（口孵非鲫属）、鲶鱼（(鱼芒)鲶属、鲶属、胡鲶属、真鮰属）、鲤科鱼（鲤属、鯽属、草鱼、鲢属、鲮属、青鱼、卡特拉鲃、野鲮属、哈氏纹唇鱼、何氏细须鲃、鲂属）、鳗鱼（鳗鲡属）、尼罗河鲈鱼（尼罗尖吻鲈）及黑鱼（鳢属）', '千克', '无', 0.09, 0, 'AB', '熏制罗非鱼（口孵非鲫属）、鲶鱼（(鱼芒)鲶属、鲶属、胡鲶属、真鮰属）、鲤科鱼（鲤属、鯽属、草鱼、鲢属、鲮属、青鱼、卡特拉鲃、野鲮属、哈氏纹唇鱼、何氏细须鲃、鲂属）、鳗鱼（鳗鲡属）、尼罗河鲈鱼（尼罗尖吻鲈）及黑鱼（鳢属）食用杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（熏）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:48');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43859, '0305490020', '熏制其他濒危鱼及鱼片 ', '千克', '无', 0.00, 0, 'ABEF', '熏制其他濒危鱼及鱼片 食用杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（熏）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:48');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43860, '0305490090', '其他熏鱼及鱼片 ', '千克', '无', 0.09, 0, 'AB', '其他熏鱼及鱼片 食用杂碎除外', '品名;品牌类型;出口享惠情况;制作或保存方法（熏）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:48');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43861, '0305510000', '干鳕鱼（大西洋鳕鱼、格陵兰鳕鱼、太平洋鳕鱼），食用杂碎除外 ', '千克', '无', 0.09, 0, 'AB', '干鳕鱼（大西洋鳕鱼、格陵兰鳕鱼、太平洋鳕鱼），食用杂碎除外 不论是否盐腌,但熏制的除外', '品名;品牌类型;出口享惠情况;制作或保存方法（干）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:48');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43862, '0305520000', '干罗非鱼（口孵非鲫属）、鲶鱼（(鱼芒)鲶属、鲶属、胡鲶属、真鮰属）、鲤科鱼（鲤属、鯽属、草鱼、鲢属、鲮属、青鱼、卡特拉鲃、野鲮属、哈氏纹唇鱼、何氏细须鲃、鲂属）、鳗鱼（鳗鲡属）、尼罗河鲈鱼（尼罗尖吻鲈）及黑鱼（鳢属）', '千克', '无', 0.09, 0, 'AB', '干罗非鱼（口孵非鲫属）、鲶鱼（(鱼芒)鲶属、鲶属、胡鲶属、真鮰属）、鲤科鱼（鲤属、鯽属、草鱼、鲢属、鲮属、青鱼、卡特拉鲃、野鲮属、哈氏纹唇鱼、何氏细须鲃、鲂属）、鳗鱼（鳗鲡属）、尼罗河鲈鱼（尼罗尖吻鲈）及黑鱼（鳢属）                       ', '品名;品牌类型;出口享惠情况;制作或保存方法（干）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:48');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43863, '0305530000', '干犀鳕科、多丝真鳕科、鳕科、长尾鳕科、黑鳕科、无须鳕科、深海鳕科及南极鳕科鱼，鳕鱼（大西洋鳕鱼、格陵兰鳕鱼、太平洋鳕鱼）除外', '千克', '无', 0.09, 0, 'AB', '干犀鳕科、多丝真鳕科、鳕科、长尾鳕科、黑鳕科、无须鳕科、深海鳕科及南极鳕科鱼，鳕鱼（大西洋鳕鱼、格陵兰鳕鱼、太平洋鳕鱼）除外                       ', '品名;品牌类型;出口享惠情况;制作或保存方法（干）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:48');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43864, '0305540000', '鲱鱼（大西洋鲱鱼、太平洋鲱鱼）、鳀鱼（鳀属）、沙丁鱼（沙丁鱼、沙瑙鱼属）、小沙丁鱼属、黍鲱或西鲱、鲭鱼[大西洋鲭、澳洲鲭（鲐）、日本鲭（鲐）]、印度鲭（羽鳃鲐属）、马鲛鱼（马鲛属）、对称竹荚鱼、新西兰竹荚鱼及竹荚鱼（竹荚鱼属）、鲹鱼（鲹属）、军曹鱼、银鲳（鲳属）、秋刀鱼、圆鲹（圆鲹属）、多春鱼（毛鳞鱼）、剑鱼、鲔鱼、狐鲣（狐鲣属）、枪鱼、旗鱼、四鳍旗鱼（旗鱼科）', '千克', '无', 0.10, 0, 'AB', '干鲱鱼（大西洋鲱鱼、太平洋鲱鱼包括印度鲭(羽鳃鲐属)、马鲛鱼(马鲛属)、对称竹荚鱼、', '品牌类型; 出口享惠情况;  制作或保存方法(干);拉丁名称;GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43865, '0305591000', '干海马、干海龙，食用杂碎除外 ', '千克', '无', 0.09, 0, 'FEAB', '干海马、干海龙，食用杂碎除外 不论是否盐腌,但熏制的除外                          ', '品名;品牌类型;出口享惠情况;制作或保存方法（干）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:48');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43866, '0305599010', '其他濒危干鱼，食用杂碎除外 ', '千克', '无', 0.00, 0, 'AFEB', '其他濒危干鱼，食用杂碎除外 不论是否盐腌,但熏制的除外', '品名;品牌类型;出口享惠情况;制作或保存方法（干）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43867, '0305599090', '其他干鱼，食用杂碎除外 ', '千克', '无', 0.09, 0, 'AB', '其他干鱼，食用杂碎除外 不论是否盐腌,但熏制的除外                          ', '品名;品牌类型;出口享惠情况;制作或保存方法（干）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43868, '0305610000', '盐腌及盐渍的鲱鱼（大西洋鲱鱼、太平洋鲱鱼），食用杂碎除外 ', '千克', '无', 0.09, 0, 'AB', '盐腌及盐渍的鲱鱼（大西洋鲱鱼、太平洋鲱鱼），食用杂碎除外 干或熏制的除外', '品名;品牌类型;出口享惠情况;制作或保存方法（盐腌、盐渍）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43869, '0305620000', '盐腌及盐渍鳕鱼（大西洋鳕鱼、格陵兰鳕鱼、太平洋鳕鱼），食用杂碎除外 ', '千克', '无', 0.09, 0, 'AB', '盐腌及盐渍鳕鱼（大西洋鳕鱼、格陵兰鳕鱼、太平洋鳕鱼），食用杂碎除外 干或熏制的除外', '品名;品牌类型;出口享惠情况;制作或保存方法（盐腌、盐渍）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43870, '0305630000', '盐腌及盐渍的鳀鱼(鳀属)，食用杂碎除外 ', '千克', '无', 0.09, 0, 'AB', '盐腌及盐渍的鳀鱼(鳀属)，食用杂碎除外 干或熏制的除外', '品名;品牌类型;出口享惠情况;制作或保存方法（盐腌、盐渍）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:48');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43871, '0305640010', '盐腌及盐渍的花鳗鲡，食用杂碎除外  ', '千克', '无', 0.09, 0, 'ABE', '盐腌及盐渍的花鳗鲡，食用杂碎除外  干或熏制的除外', '品名;品牌类型;出口享惠情况;制作或保存方法（盐腌、盐渍）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:48');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43872, '0305640020', '盐腌及盐渍的欧洲鳗鲡，食用杂碎除外  ', '千克', '无', 0.09, 0, 'ABEF', '盐腌及盐渍的欧洲鳗鲡，食用杂碎除外  干或熏制的除外', '品名;品牌类型;出口享惠情况;制作或保存方法（盐腌、盐渍）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:48');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43873, '0305640090', '盐腌及盐渍的罗非鱼（口孵非鲫属）、鲶鱼（(鱼芒)鲶属、鲶属、胡鲶属、真鮰属）、鲤科鱼（鲤属、鯽属、草鱼、鲢属、鲮属、青鱼、卡特拉鲃、野鲮属、哈氏纹唇鱼、何氏细须鲃、鲂属）、其他鳗鱼（鳗鲡属）、尼罗河鲈鱼（尼罗尖吻鲈）及黑鱼（鳢属），食用杂碎除外 ', '千克', '无', 0.09, 0, 'AB', '盐腌及盐渍的罗非鱼（口孵非鲫属）、鲶鱼（(鱼芒)鲶属、鲶属、胡鲶属、真鮰属）、鲤科鱼（鲤属、鯽属、草鱼、鲢属、鲮属、青鱼、卡特拉鲃、野鲮属、哈氏纹唇鱼、何氏细须鲃、鲂属）、其他鳗鱼（鳗鲡属）、尼罗河鲈鱼（尼罗尖吻鲈）及黑鱼（鳢属），食用杂碎除外 干或熏制的除外', '品名;品牌类型;出口享惠情况;制作或保存方法（盐腌、盐渍）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:48');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43874, '0305691000', '盐腌及盐渍的带鱼，食用杂碎除外 ', '千克', '无', 0.09, 0, 'AB', '盐腌及盐渍的带鱼，食用杂碎除外 干或熏制的除外', '品名;品牌类型;出口享惠情况;制作或保存方法（盐腌、盐渍）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:48');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43875, '0305692000', '盐腌及盐渍的黄鱼，食用杂碎除外 ', '千克', '无', 0.09, 0, 'AB', '盐腌及盐渍的黄鱼，食用杂碎除外 干或熏制的除外', '品名;品牌类型;出口享惠情况;制作或保存方法（盐腌、盐渍）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:48');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43876, '0305693000', '盐腌及盐渍的鲳鱼(银鲳除外)，食用杂碎除外 ', '千克', '无', 0.09, 0, 'AB', '盐腌及盐渍的鲳鱼(银鲳除外)，食用杂碎除外 干或熏制的除外', '品名;品牌类型;出口享惠情况;制作或保存方法（盐腌、盐渍）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:48');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43877, '0305699010', '盐腌及盐渍的其他濒危鱼，食用杂碎除外 ', '千克', '无', 0.00, 0, 'ABFE', '盐腌及盐渍的其他濒危鱼，食用杂碎除外 干或熏制的除外', '品名;品牌类型;出口享惠情况;制作或保存方法（盐腌、盐渍）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:48');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43878, '0305699090', '盐腌及盐渍的其他鱼，食用杂碎除外 ', '千克', '无', 0.09, 0, 'AB', '盐腌及盐渍的其他鱼，食用杂碎除外 干或熏制的除外', '品名;品牌类型;出口享惠情况;制作或保存方法（盐腌、盐渍）;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:48');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43879, '0305710010', '濒危鲨鱼鱼翅 ', '千克', '无', 0.00, 0, 'ABEF', '濒危鲨鱼鱼翅 不论是否干制、盐腌、盐渍和熏制', '品名;品牌类型;出口享惠情况;用途;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:48');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43880, '0305710090', '其他鲨鱼鱼翅 ', '千克', '无', 0.09, 0, 'AB', '其他鲨鱼鱼翅 不论是否干制、盐腌、盐渍和熏制                          ', '品名;品牌类型;出口享惠情况;用途;拉丁学名;GTIN;CAS;其他', '2022-04-22 16:35:48');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43881, '0305720010', '濒危鱼的鱼头、鱼尾、鱼鳔 ', '千克', '无', 0.00, 0, 'ABEF', '濒危鱼的鱼头、鱼尾、鱼鳔 不论是否干制、盐腌、盐渍和熏制', '品名;品牌类型;出口享惠情况;用途;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43882, '0305720090', '其他鱼的鱼头、鱼尾、鱼鳔 ', '千克', '无', 0.09, 0, 'AB', '其他鱼的鱼头、鱼尾、鱼鳔 不论是否干制、盐腌、盐渍和熏制', '品名;品牌类型;出口享惠情况;用途;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43883, '0305790010', '其他濒危可食用鱼杂碎 ', '千克', '无', 0.00, 0, 'ABEF', '其他濒危可食用鱼杂碎 不论是否干制、盐腌、盐渍和熏制', '品名;品牌类型;出口享惠情况;用途;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43884, '0305790090', '其他可食用鱼杂碎 ', '千克', '无', 0.09, 0, 'AB', '其他可食用鱼杂碎 不论是否干制、盐腌、盐渍和熏制', '品名;品牌类型;出口享惠情况;用途;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43885, '0306', '带壳或去壳的甲壳动物，活、鲜、冷、冻、干、盐腌或盐渍的；蒸过或用水煮过的带壳甲壳动物，不论是否冷、冻、干、盐腌或盐渍的；适合供人食用的甲壳动物的细粉、粗粉及团粒', '', '', 0.00, 1, '', '', '品名;制作或保存方法(冷水);状态(带壳、去壳);拉丁名称;规格(如41～50个/磅);包装规格;品名;制作或保存方法(活、鲜、冷、干等);状态(带壳、去壳);拉丁名称;个体重量;包装规格;品牌;品名;制作或保存方法(活、鲜、冷、干等);拉丁名称;状态(是否全虾、去头、去肠线,去尾、带壳、去壳、裹;个体重量;包装规格;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43886, '0306110000', '冻岩礁虾和其他龙虾（真龙虾属、龙虾属、岩龙虾属）', '千克', '无', 0.09, 0, 'AB', '冻岩礁虾和其他龙虾（真龙虾属、龙虾属、岩龙虾属）', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;状态（带壳、去壳）;拉丁学名;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43887, '0306120000', '冻鳌龙虾 （鳌龙虾属）', '千克', '无', 0.09, 0, 'AB', '冻鳌龙虾 （鳌龙虾属）', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;状态（带壳、去壳）;拉丁学名;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43888, '0306141000', '冻梭子蟹', '千克', '无', 0.09, 0, 'AB', '冻梭子蟹', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;状态（带壳、去壳）;拉丁学名;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43889, '0306149011', '冻的金霸王蟹（帝王蟹）', '千克', '无', 0.09, 0, 'ABU', '冻的金霸王蟹（帝王蟹）', '品名;品牌类型;出口享惠情况;制作或保存方法[冻];状态[带壳、去壳];拉丁学名;个体重量;包装规格;GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:18:40');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43890, '0306149019', '冻的毛蟹、仿石蟹（仿岩蟹）、堪察加拟石蟹、短足拟石蟹、扁足拟石蟹、雪蟹、日本雪蟹', '千克', '无', 0.09, 0, 'ABU', '冻的毛蟹、仿石蟹（仿岩蟹）、堪察加拟石蟹、短足拟石蟹、扁足拟石蟹、雪蟹、日本雪蟹', '品名;品牌类型;出口享惠情况;制作或保存方法[冻];状态[带壳、去壳];拉丁学名;个体重量;包装规格;GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:18:40');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43891, '0306149090', '其他冻蟹', '千克', '无', 0.09, 0, 'AB', '其他冻蟹', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;状态（带壳、去壳）;拉丁学名;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43892, '0306150000', '冻挪威海鳌虾 ', '千克', '无', 0.09, 0, 'AB', '冻挪威海鳌虾 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;状态（带壳、去壳）;拉丁学名;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43893, '0306161100', '冻冷水小虾虾仁', '千克', '无', 0.09, 0, 'AB', '冻冷水小虾虾仁', '品名;品牌类型;出口享惠情况;制作或保存方法[冻];状态[带壳、去壳];拉丁学名;规格[如41～50个/磅];包装规格;GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:18:40');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43894, '0306161210', '冻煮北方长额虾（虾仁除外）', '千克', '', 0.00, 0, 'AB', '冻煮北方长额虾（虾仁除外）', '品名;制作或保存方法(冷水);状态(带壳、去壳);拉丁名称;规格(如41～50个/磅);包装规格;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43895, '0306161290', '其他冻煮北方长额虾（虾仁除外）', '千克', '', 0.00, 0, 'AB', '其他冻煮北方长额虾（虾仁除外）', '品名;制作或保存方法(冷水);状态(带壳、去壳);拉丁名称;规格(如41～50个/磅);包装规格;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43896, '0306161900', '其他冻冷水小虾', '千克', '无', 0.09, 0, 'AB', '其他冻冷水小虾', '品名;品牌类型;出口享惠情况;制作或保存方法[冻];状态[带壳、去壳];拉丁学名;规格[如41～50个/磅];包装规格;GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:18:40');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43897, '0306162100', '冻冷水对虾仁', '千克', '无', 0.09, 0, 'AB', '冻冷水对虾仁', '品名;品牌类型;出口享惠情况;制作或保存方法[冻];状态[带壳、去壳];拉丁学名;规格[如41～50个/磅];包装规格;GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:18:40');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43898, '0306162900', '其他冻冷水对虾', '千克', '无', 0.09, 0, 'AB', '其他冻冷水对虾', '品名;品牌类型;出口享惠情况;制作或保存方法[冻];状态[带壳、去壳];拉丁学名;规格[如41～50个/磅];包装规格;GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:18:40');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43899, '0306171100', '其他冻小虾仁', '千克', '无', 0.09, 0, 'AB', '其他冻小虾仁', '品名;品牌类型;出口享惠情况;制作或保存方法[冻];状态[带壳、去壳];拉丁学名;规格[如41～50个/磅];包装规格;品牌;GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:18:40');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43900, '0306171900', '其他冻小虾', '千克', '无', 0.09, 0, 'AB', '其他冻小虾', '品名;品牌类型;出口享惠情况;制作或保存方法[冻];状态[带壳、去壳];拉丁学名;规格[如41～50个/磅];包装规格;品牌;GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:18:40');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43901, '0306172100', '其他冻对虾仁', '千克', '无', 0.09, 0, 'AB', '其他冻对虾仁', '品名;品牌类型;出口享惠情况;制作或保存方法[冻];状态[带壳、去壳];拉丁学名;规格[如41～50个/磅];包装规格;品牌;GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:18:40');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43902, '0306172900', '其他冻对虾', '千克', '无', 0.09, 0, 'AB', '其他冻对虾', '品名;品牌类型;出口享惠情况;制作或保存方法[冻];状态[带壳、去壳];拉丁学名;规格[如41～50个/磅];包装规格;品牌;GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:18:41');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43903, '0306191100', '冻淡水小龙虾仁', '千克', '无', 0.09, 0, 'AB', '冻淡水小龙虾仁', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43904, '0306191900', '冻带壳淡水小龙虾', '千克', '无', 0.09, 0, 'AB', '冻带壳淡水小龙虾', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43905, '0306199000', '其他冻甲壳动物', '千克', '无', 0.09, 0, 'AB', '其他冻甲壳动物 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43906, '0306311000', '岩礁虾及其他龙虾种苗', '千克', '无', 0.09, 0, 'AB', '岩礁虾及其他龙虾种苗 ', '品名;品牌类型;出口享惠情况;是否为种苗;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43907, '0306319000', '活、鲜或冷的带壳或去壳岩礁虾和其他龙虾（真龙虾属、龙虾属、岩龙虾属）', '千克', '无', 0.09, 0, 'AB', '活、鲜或冷的带壳或去壳岩礁虾和其他龙虾（真龙虾属、龙虾属、岩龙虾属）', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷等）;状态（带壳、去壳）;拉丁学名;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43908, '0306321000', '鳌龙虾（鳌龙虾属）种苗', '千克', '无', 0.09, 0, 'AB', '鳌龙虾（鳌龙虾属）种苗 ', '品名;品牌类型;出口享惠情况;是否为种苗;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43909, '0306329000', '活、鲜或冷的带壳或去壳鳌龙虾  （鳌龙虾  属）', '千克', '无', 0.09, 0, 'AB', '活、鲜或冷的带壳或去壳鳌龙虾  （鳌龙虾  属）', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷等）;状态（带壳、去壳）;拉丁学名;个体重量;包装规格;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43910, '0306331000', '蟹种苗', '千克', '无', 0.09, 0, 'AB', '蟹种苗 ', '品名;品牌类型;出口享惠情况;是否为种苗;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43911, '0306339100', '活、鲜或冷的带壳或去壳中华绒螯蟹', '千克', '无', 0.09, 0, 'AB', '活、鲜或冷的带壳或去壳中华绒螯蟹', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷等）;状态（带壳、去壳）;拉丁学名;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43912, '0306339200', '活、鲜或冷的带壳或去壳梭子蟹 ', '千克', '无', 0.09, 0, 'AB', '活、鲜或冷的带壳或去壳梭子蟹 ', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷等）;状态（带壳、去壳）;拉丁学名;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43913, '0306339911', '活金霸王蟹（帝王蟹）', '千克', '无', 0.09, 0, 'ABU', '活金霸王蟹（帝王蟹）', '品名;品牌类型;出口享惠情况;制作或保存方法[活、鲜、冷等];状态[带壳、去壳];拉丁学名;个体重量;包装规格;GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:18:42');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43914, '0306339919', '活、鲜或冷的毛蟹、、仿石蟹（仿岩蟹）、堪察加拟石蟹、短足拟石蟹、扁足拟石蟹、雪蟹、日本雪蟹，鲜或冷的金霸王蟹（帝王蟹）', '千克', '无', 0.09, 0, 'ABU', '活、鲜或冷的毛蟹、、仿石蟹（仿岩蟹）、堪察加拟石蟹、短足拟石蟹、扁足拟石蟹、雪蟹、日本雪蟹，鲜或冷的金霸王蟹（帝王蟹）', '品名;品牌类型;出口享惠情况;制作或保存方法[活、鲜、冷等];状态[带壳、去壳];拉丁学名;个体重量;包装规格;GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:18:42');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43915, '0306339990', '其他活、鲜或冷的带壳或去壳蟹 ', '千克', '无', 0.09, 0, 'AB', '其他活、鲜或冷的带壳或去壳蟹 ', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷等）;状态（带壳、去壳）;拉丁学名;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43916, '0306341000', '挪威海鳌虾种苗 ', '千克', '无', 0.09, 0, 'AB', '挪威海鳌虾种苗 ', '品名;品牌类型;出口享惠情况;是否为种苗;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43917, '0306349000', '其他活、鲜或冷的带壳或去壳挪威海鳌虾 ', '千克', '无', 0.09, 0, 'AB', '其他活、鲜或冷的带壳或去壳挪威海鳌虾 ', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷等）;状态（带壳、去壳）;拉丁学名;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43918, '0306351000', '冷水小虾及对虾(长额虾属、褐虾)种苗 ', '千克', '无', 0.09, 0, 'AB', '冷水小虾及对虾(长额虾属、褐虾)种苗  ', '品名;品牌类型;出口享惠情况;是否为种苗;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43919, '0306352000', '鲜、冷的带壳或去壳冷水对虾', '千克', '无', 0.09, 0, 'AB', '鲜、冷的带壳或去壳冷水对虾', '品名;品牌类型;出口享惠情况;制作或保存方法[鲜、冷等];状态[带壳、去壳];拉丁学名;个体重量;包装规格;GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:18:42');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43920, '0306359001', '活、鲜或冷的其他冷水小虾', '千克', '无', 0.09, 0, 'AB', '活、鲜或冷的其他冷水小虾', '品名;品牌类型;出口享惠情况;制作或保存方法[活、鲜、冷等];状态[带壳、去壳];拉丁学名;个体重量;包装规格;GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:18:42');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43921, '0306359090', '活的冷水小虾及对虾(长额虾属、褐虾）', '千克', '无', 0.09, 0, 'AB', '活的冷水小虾及对虾(长额虾属、褐虾）种苗除外', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷等）;状态（带壳、去壳）;拉丁学名;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43922, '0306361000', '其他小虾及对虾种苗 ', '千克', '无', 0.09, 0, 'AB', '其他小虾及对虾种苗  ', '品名;品牌类型;出口享惠情况;是否为种苗;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43923, '0306362000', '其他鲜、冷带壳或去壳对虾', '千克', '无', 0.09, 0, 'AB', '其他鲜、冷带壳或去壳对虾', '品名;品牌类型;出口享惠情况;制作或保存方法[鲜、冷等];状态[带壳、去壳];拉丁学名;个体重量;包装规格;GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:18:42');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43924, '0306369001', '其他鲜、冷小虾', '千克', '无', 0.09, 0, 'AB', '其他鲜、冷小虾', '品名;品牌类型;出口享惠情况;制作或保存方法[活、鲜、冷等];拉丁学名;状态[是否全虾、去头、去肠线，去尾、带壳、去壳、裹;个体重量;包装规格;GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:18:42');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43925, '0306369090', '活、鲜或冷的对虾（对虾属）；其他活的小虾（对虾属除外）', '千克', '无', 0.09, 0, 'AB', '活、鲜或冷的对虾（对虾属）；其他活的小虾（对虾属除外）种苗除外', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷等）;拉丁学名;状态（是否全虾、去头、去肠线，去尾、带壳、去壳、裹;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43926, '0306391000', '其他甲壳动物种苗', '千克', '无', 0.09, 0, 'AB', '其他甲壳动物种苗 ', '品名;品牌类型;出口享惠情况;是否为种苗;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43927, '0306399000', '其他活、鲜、冷的带壳或去壳甲壳动物', '千克', '无', 0.09, 0, 'AB', '其他活、鲜、冷的带壳或去壳甲壳动物', '品名;品牌类型;出口享惠情况;制作或保存方法[活、鲜、冷等];GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:18:42');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43928, '0306910000', '干、盐腌或盐渍的其他岩礁虾及其他龙虾（真龙虾属、龙虾属、岩龙虾属）', '千克', '无', 0.09, 0, 'AB', '干、盐腌或盐渍的其他岩礁虾及其他龙虾（真龙虾属、龙虾属、岩龙虾属）包括熏制的带壳或去壳的，不论在熏制前或熏制过程中是否烹煮', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍等）;状态（带壳、去壳）;拉丁学名;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43929, '0306920000', '干、盐腌或盐渍的其他鳌龙虾（鳌龙虾属）', '千克', '无', 0.09, 0, 'AB', '干、盐腌或盐渍的其他鳌龙虾（鳌龙虾属）包括熏制的带壳或去壳的，不论在熏制前或熏制过程中是否烹煮', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍等）;状态（带壳、去壳）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43930, '0306931000', '干、盐腌或盐渍的其他中华绒螯蟹', '千克', '无', 0.09, 0, 'AB', '干、盐腌或盐渍的其他中华绒螯蟹包括熏制的带壳或去壳的，不论在熏制前或熏制过程中是否烹煮', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍等）;状态（带壳、去壳）;拉丁学名;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43931, '0306932000', '干、盐腌或盐渍的其他梭子蟹', '千克', '无', 0.09, 0, 'AB', '干、盐腌或盐渍的其他梭子蟹包括熏制的带壳或去壳的，不论在熏制前或熏制过程中是否烹煮', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍等）;状态（带壳、去壳）;拉丁学名;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43932, '0306939000', '干、盐腌或盐渍的其他蟹', '千克', '无', 0.09, 0, 'AB', '干、盐腌或盐渍的其他蟹包括熏制的带壳或去壳的，不论在熏制前或熏制过程中是否烹煮', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍等）;状态（带壳、去壳）;拉丁学名;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43933, '0306940000', '干、盐腌或盐渍的挪威海鳌虾', '千克', '无', 0.09, 0, 'AB', '干、盐腌或盐渍的挪威海鳌虾包括熏制的带壳或去壳的，不论在熏制前或熏制过程中是否烹煮', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍等）;状态（带壳、去壳）;拉丁学名;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43934, '0306951000', '干、盐腌或盐渍的冷水小虾及对虾(长额虾属、褐虾)', '千克', '无', 0.09, 0, 'AB', '干、盐腌或盐渍的冷水小虾及对虾(长额虾属、褐虾)包括熏制的带壳或去壳的，不论在熏制前或熏制过程中是否烹煮', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍等）;状态（带壳、去壳）;拉丁学名;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43935, '0306959000', '干、盐腌或盐渍的其他小虾及对虾', '千克', '无', 0.09, 0, 'AB', '干、盐腌或盐渍的其他小虾及对虾包括熏制的带壳或去壳的，不论在熏制前或熏制过程中是否烹煮', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍等）;状态（带壳、去壳）;拉丁学名;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43936, '0306990000', '干、盐腌或盐渍的其他甲壳动物', '千克', '无', 0.09, 0, 'AB', '干、盐腌或盐渍的其他甲壳动物包括熏制的带壳或去壳的，不论在熏制前或熏制过程中是否烹煮', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍等）;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43937, '0307', '带壳或去壳的软体动物，活、鲜、冷、冻、干、盐腌或盐渍的；不属于甲壳动物和软体动物的水生无脊椎动物，活、鲜、冷、冻、干、盐腌或盐渍的；适合供人食用的水生无脊椎动物（甲壳动物除外）的细粉、粗粉及团粒', '', '', 0.00, 1, '', '', '品名;制作或保存方法(干、盐腌、盐渍等);状态(带壳、去壳);拉丁名称;个体重量;包装规格;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43938, '0307111000', '牡蛎(蚝)种苗 ', '千克', '无', 0.09, 0, 'AB', '牡蛎(蚝)种苗  ', '品名;品牌类型;出口享惠情况;是否为种苗;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43939, '0307119000', '其他活、鲜、冷的牡蛎(蚝) ', '千克', '无', 0.09, 0, 'AB', '其他活、鲜、冷的牡蛎(蚝) ', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷）;状态（带壳、去壳）;拉丁学名;个体重量;包装规格;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43940, '0307120000', '冻的牡蛎(蚝) ', '千克', '无', 0.09, 0, 'AB', '冻的牡蛎(蚝) ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;状态（带壳、去壳）;拉丁学名;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43941, '0307190000', '其他干、盐腌或盐渍牡蛎(蚝) ', '千克', '无', 0.09, 0, 'AB', '其他干、盐腌或盐渍牡蛎(蚝) 包括熏制的带壳或去壳的，不论在熏制前或熏制过程中是否烹煮                                             ', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍等）;状态（带壳、去壳）;拉丁学名;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43942, '0307211010', '大珠母贝种苗', '千克', '无', 0.09, 0, 'ABE', '大珠母贝种苗', '品名;品牌类型;出口享惠情况;是否为种苗;拉丁学名;GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:18:43');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43943, '0307211090', '其他扇贝种苗', '千克', '无', 0.09, 0, 'AB', '其他扇贝种苗包括海扇种苗', '品名;品牌类型;出口享惠情况;是否为种苗;拉丁学名;GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:18:43');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43944, '0307219010', '其他活、鲜、冷大珠母贝', '千克', '无', 0.09, 0, 'ABE', '其他活、鲜、冷大珠母贝', '品名;品牌类型;出口享惠情况;制作或保存方法[活、鲜、冷];状态[带壳、去壳];拉丁学名;个体重量;包装规格;GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:18:43');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43945, '0307219090', '其他活、鲜、冷扇贝', '千克', '无', 0.09, 0, 'AB', '其他活、鲜、冷扇贝包括海扇,种苗除外', '品名;品牌类型;出口享惠情况;制作或保存方法[活、鲜、冷];状态[带壳、去壳];拉丁学名;个体重量;包装规格;GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:18:43');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43946, '0307220010', '冻的大珠母贝', '千克', '无', 0.09, 0, 'ABE', '冻的大珠母贝', '品名;品牌类型;出口享惠情况;制作或保存方法[冻];状态[带壳、去壳];拉丁学名;个体重量;包装规格;GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:18:43');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43947, '0307220090', '其他冻的扇贝', '千克', '无', 0.09, 0, 'AB', '其他冻的扇贝包括海扇', '品名;品牌类型;出口享惠情况;制作或保存方法[冻];状态[带壳、去壳];拉丁学名;个体重量;包装规格;GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:18:43');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43948, '0307290010', '其他干、盐腌或盐渍的大珠母贝', '千克', '无', 0.09, 0, 'ABE', '其他干、盐腌或盐渍的大珠母贝包括熏制的带壳或去壳的，不论在熏制前或熏制过程中是否烹煮', '品名;品牌类型;出口享惠情况;制作或保存方法[干、盐腌、盐渍等];状态[带壳、去壳];拉丁学名;个体重量;包装规格;GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:18:44');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43949, '0307290090', '其他干、盐腌或盐渍的扇贝', '千克', '无', 0.09, 0, 'AB', '其他干、盐腌或盐渍的扇贝包括海扇；包括熏制的带壳或去壳的，不论在熏制前或熏制过程中是否烹煮', '品名;品牌类型;出口享惠情况;制作或保存方法[干、盐腌、盐渍等];状态[带壳、去壳];拉丁学名;个体重量;包装规格;GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:18:44');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43950, '0307311000', '贻贝种苗', '千克', '无', 0.09, 0, 'AB', '贻贝种苗 ', '品名;品牌类型;出口享惠情况;是否为种苗;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43951, '0307319001', '鲜、冷贻贝', '千克', '无', 0.09, 0, 'AB', '鲜、冷贻贝', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷）;状态（带壳、去壳）;拉丁学名;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43952, '0307319090', '其他活贻贝', '千克', '无', 0.09, 0, 'AB', '其他活贻贝', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷）;状态（带壳、去壳）;拉丁学名;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43953, '0307320000', '冻贻贝', '千克', '无', 0.09, 0, 'AB', '冻贻贝', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;状态（带壳、去壳）;拉丁学名;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43954, '0307390090', '其他干、盐腌或盐渍的贻贝', '千克', '', 0.00, 0, 'AB', '其他干、盐腌或盐渍的贻贝', '品名;制作或保存方法(干、盐腌、盐渍等);状态(带壳、去壳);拉丁名称;个体重量;包装规格;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43955, '0307421000', '墨鱼及鱿鱼种苗', '千克', '无', 0.09, 0, 'AB', '墨鱼及鱿鱼种苗 ', '品名;品牌类型;出口享惠情况;是否为种苗;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43956, '0307429100', '其他活、鲜、冷的墨鱼（乌贼属、巨粒僧头乌贼、耳乌贼属）及鱿鱼（柔鱼属、枪乌贼属、双柔鱼属、拟乌贼属）', '千克', '无', 0.09, 0, 'AB', '其他活、鲜、冷的墨鱼（乌贼属、巨粒僧头乌贼、耳乌贼属）及鱿鱼（柔鱼属、枪乌贼属、双柔鱼属、拟乌贼属）', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷）;拉丁学名;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43957, '0307429900', '其他活、鲜、冷的墨鱼及鱿鱼', '千克', '无', 0.09, 0, 'AB', '其他活、鲜、冷的墨鱼及鱿鱼', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43958, '0307431000', '冻的墨鱼（乌贼属、巨粒僧头乌贼、耳乌贼属）及鱿鱼（柔鱼属、枪乌贼属、双柔鱼属、拟乌贼属）', '千克', '无', 0.09, 0, 'AB', '冻的墨鱼（乌贼属、巨粒僧头乌贼、耳乌贼属）及鱿鱼（柔鱼属、枪乌贼属、双柔鱼属、拟乌贼属）', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名（规范到属）;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43959, '0307439000', '其他冻的墨鱼及鱿鱼', '千克', '无', 0.09, 0, 'AB', '其他冻的墨鱼及鱿鱼', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43960, '0307491000', '其他干、盐制的墨鱼（乌贼属、巨粒僧头乌贼、耳乌贼属）及鱿鱼（柔鱼属、枪乌贼属、双柔鱼属、拟乌贼属）', '千克', '无', 0.09, 0, 'AB', '其他干、盐制的墨鱼（乌贼属、巨粒僧头乌贼、耳乌贼属）及鱿鱼（柔鱼属、枪乌贼属、双柔鱼属、拟乌贼属）包括熏制的带壳或去壳的，不论在熏制前或熏制过程中是否烹煮', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍等）;拉丁学名;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43961, '0307499000', '其他干、盐制的墨鱼及鱿鱼', '千克', '无', 0.09, 0, 'AB', '其他干、盐制的墨鱼及鱿鱼包括熏制的带壳或去壳的，不论在熏制前或熏制过程中是否烹煮', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍等）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43962, '0307510000', '活、鲜、冷章鱼', '千克', '无', 0.09, 0, 'AB', '活、鲜、冷章鱼', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷）;拉丁学名;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43963, '0307520000', '冻的章鱼', '千克', '无', 0.09, 0, 'AB', '冻的章鱼', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43964, '0307590000', '其他干、盐制的章鱼', '千克', '无', 0.09, 0, 'AB', '其他干、盐制的章鱼包括熏制的，不论在熏制前或熏制过程中是否烹煮', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍等）;拉丁学名;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43965, '0307601010', '濒危蜗牛及螺种苗，海螺除外', '千克', '无', 0.00, 0, 'ABFE', '濒危蜗牛及螺种苗，海螺除外', '品名;品牌类型;出口享惠情况;是否为种苗;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43966, '0307601090', '蜗牛及螺种苗，海螺除外（濒危除外）', '千克', '无', 0.09, 0, 'AB', '蜗牛及螺种苗，海螺除外（濒危除外） ', '品名;品牌类型;出口享惠情况;是否为种苗;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43967, '0307609010', '其他濒危蜗牛及螺，海螺除外', '千克', '无', 0.00, 0, 'ABFE', '其他濒危蜗牛及螺，海螺除外', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷、冻、干、盐腌、盐渍等）;拉丁学名;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43968, '0307609090', '其他活、鲜、冷、冻、干、盐腌或盐渍的蜗牛及螺，海螺除外', '千克', '无', 0.09, 0, 'AB', '其他活、鲜、冷、冻、干、盐腌或盐渍的蜗牛及螺，海螺除外包括熏制的带壳或去壳的，不论在熏制前或熏制过程中是否烹煮', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷、冻、干、盐腌、盐渍等）;拉丁学名;个体重量;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43969, '0307711010', '砗磲的种苗', '千克', '无', 0.09, 0, 'ABEF', '砗磲的种苗', '品名;品牌类型;出口享惠情况;是否为种苗;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43970, '0307711090', '蛤、鸟蛤及舟贝种苗（濒危除外）', '千克', '无', 0.09, 0, 'AB', '蛤、鸟蛤及舟贝种苗（濒危除外） ', '品名;品牌类型;出口享惠情况;是否为种苗;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43971, '0307719100', '活、鲜、冷蛤', '千克', '无', 0.09, 0, 'AB', '活、鲜、冷蛤', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43972, '0307719910', '活、鲜、冷砗磲', '千克', '无', 0.09, 0, 'ABEF', '活、鲜、冷砗磲', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43973, '0307719920', '活、鲜、冷的粗饰蚶', '千克', '无', 0.09, 0, 'ABU', '活、鲜、冷的粗饰蚶', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43974, '0307719990', '活、鲜、冷鸟蛤及舟贝（蚶科、北极蛤科、鸟蛤科、斧蛤科、缝栖蛤科、蛤蜊科中带蛤科、海螂科、双带蛤科、截蛏科、竹蛏科、帘蛤科）', '千克', '无', 0.09, 0, 'AB', '活、鲜、冷鸟蛤及舟贝（蚶科、北极蛤科、鸟蛤科、斧蛤科、缝栖蛤科、蛤蜊科中带蛤科、海螂科、双带蛤科、截蛏科、竹蛏科、帘蛤科）', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43975, '0307720000', '冻的蛤', '千克', '', 0.00, 0, 'AB', '冻的蛤', '品名;制作或保存方法(冻);拉丁名称;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43976, '0307720010', '冻的砗磲', '千克', '无', 0.09, 0, 'ABEF', '冻的砗磲', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43977, '0307720020', '冻的粗饰蚶', '千克', '无', 0.09, 0, 'ABU', '冻的粗饰蚶', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43978, '0307720090', '冻的其他蛤、鸟蛤及舟贝（蚶科、北极蛤科、鸟蛤科、斧蛤科、缝栖蛤科、蛤蜊科、中带蛤科、海螂科、双带蛤科、截蛏科、竹蛏科、帘蛤科）', '千克', '无', 0.09, 0, 'AB', '冻的其他蛤、鸟蛤及舟贝（蚶科、北极蛤科、鸟蛤科、斧蛤科、缝栖蛤科、蛤蜊科、中带蛤科、海螂科、双带蛤科、截蛏科、竹蛏科、帘蛤科）', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43979, '0307790010', '干、盐渍的砗磲', '千克', '无', 0.09, 0, 'ABEF', '干、盐渍的砗磲包括熏制的带壳或去壳的，不论在熏制前或熏制过程中是否烹煮', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍等）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43980, '0307790020', '干、盐制的粗饰蚶', '千克', '无', 0.09, 0, 'ABU', '干、盐制的粗饰蚶包括熏制的带壳或去壳的，不论在熏制前或熏制过程中是否烹煮', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍等）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43981, '0307790090', '干、盐制其他蛤、鸟蛤及舟贝（蚶科、北极蛤科、鸟蛤科、斧蛤科、缝栖蛤科、蛤蜊科、中带蛤科、海螂科、双带蛤科、截蛏科、竹蛏科、帘蛤科）', '千克', '无', 0.09, 0, 'AB', '干、盐制其他蛤、鸟蛤及舟贝（蚶科、北极蛤科、鸟蛤科、斧蛤科、缝栖蛤科、蛤蜊科、中带蛤科、海螂科、双带蛤科、截蛏科、竹蛏科、帘蛤科）包括熏制的带壳或去壳的，不论在熏制前或熏制过程中是否烹煮', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍等）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43982, '0307811000', '鲍鱼(鲍属)种苗', '千克', '无', 0.09, 0, 'AB', '鲍鱼(鲍属)种苗 ', '品名;品牌类型;出口享惠情况;是否为种苗;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43983, '0307819000', '活、鲜、冷的鲍鱼(鲍属)', '千克', '无', 0.09, 0, 'AB', '活、鲜、冷的鲍鱼(鲍属)', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43984, '0307821000', '凤螺（凤螺属）种苗', '千克', '无', 0.09, 0, 'AB', '凤螺（凤螺属）种苗 ', '品名;品牌类型;出口享惠情况;是否为种苗;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43985, '0307829000', '活、鲜或冷的其他凤螺（凤螺属）', '千克', '无', 0.09, 0, 'AB', '活、鲜或冷的其他凤螺（凤螺属）', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43986, '0307830000', '冻的鲍鱼(鲍属)', '千克', '无', 0.09, 0, 'AB', '冻的鲍鱼(鲍属)', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43987, '0307840000', '冻的凤螺（凤螺属）', '千克', '无', 0.09, 0, 'AB', '冻的凤螺（凤螺属）', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43988, '0307870000', '干、盐腌或盐渍的鲍鱼(鲍属)', '千克', '无', 0.09, 0, 'AB', '干、盐腌或盐渍的鲍鱼(鲍属)包括熏制的带壳或去壳的，不论在熏制前或熏制过程中是否烹煮', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍等）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43989, '0307880000', '干、盐腌或盐渍的凤螺（凤螺属）', '千克', '无', 0.09, 0, 'AB', '干、盐腌或盐渍的凤螺（凤螺属）包括熏制的带壳或去壳的，不论在熏制前或熏制过程中是否烹煮', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍等）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:12');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43990, '0307911010', '濒危软体动物的种苗', '千克', '无', 0.00, 0, 'ABEF', '活、鲜、冷的濒危软体动物的种苗', '品牌类型; 出口享惠情况;  是否为种苗;拉丁名称;GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43991, '0307911090', '其他软体动物的种苗', '千克', '无', 0.09, 0, 'AB', '其他软体动物的种苗 ', '品名;品牌类型;出口享惠情况;是否为种苗;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43992, '0307919010', '其他活、鲜、冷的濒危软体动物', '千克', '无', 0.00, 0, 'ABEF', '其他活、鲜、冷的濒危软体动物包括供人食用的软体动物粉、团粒，甲壳动物除外', '品牌类型; 出口享惠情况;  制作或保存方法(活、鲜、冷);拉丁名称;GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43993, '0307919020', '活、鲜、冷蚬属', '千克', '无', 0.09, 0, 'ABU', '活、鲜、冷蚬属种苗除外', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43994, '0307919030', '活、鲜或冷的象拔蚌', '千克', '无', 0.09, 0, 'AB', '活、鲜或冷的象拔蚌', '品名;品牌类型;出口享惠情况;制作或保存方法[活、鲜、冷];拉丁学名;GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:18:48');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43995, '0307919090', '其他活、鲜、冷的软体动物', '千克', '无', 0.09, 0, 'AB', '其他活、鲜、冷的软体动物种苗除外', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43996, '0307920010', '其他冻的濒危软体动物', '千克', '无', 0.00, 0, 'ABEF', '其他冻的濒危软体动物', '品牌类型; 出口享惠情况;  制作或保存方法(冻);拉丁名称;GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43997, '0307920020', '冻的蚬属', '千克', '无', 0.09, 0, 'ABU', '冻的蚬属 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43998, '0307920090', '其他冻的软体动物 ', '千克', '无', 0.09, 0, 'AB', '其他冻的软体动物  ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (43999, '0307990010', '其他干、盐腌或盐渍的濒危软体动物', '千克', '无', 0.00, 0, 'ABEF', '其他冻、干、盐腌或盐渍的濒危软体动物(包括供人食用的软体动物粉、团粒,甲壳动物除外;包括熏制的带壳或去壳的，不论在熏制前或熏制过程中是否烹煮)', '品牌类型; 出口享惠情况;  制作或保存方法(干、盐腌、盐渍等);拉丁名称;GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44000, '0307990020', '干、盐腌或盐渍蚬属', '千克', '无', 0.09, 0, 'ABU', '干、盐腌或盐渍蚬属包括供人食用的软体动物粉、团粒,甲壳动物除外；包括熏制的带壳或去壳的，不论在熏制前或熏制过程中是否烹煮 ', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍等）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44001, '0307990090', '其他干、盐腌或盐渍软体动物 ', '千克', '无', 0.09, 0, 'AB', '其他干、盐腌或盐渍软体动物 包括熏制的带壳或去壳的，不论在熏制前或熏制过程中是否烹煮 ', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍等）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44002, '0308', '不属于甲壳动物及软体动物的水生无脊椎动物，活、鲜、冷、冻、干、盐腌或盐渍的；熏制的不属于甲壳动物及软体动物的水生无脊椎动物，不论在熏制前或熏制过程中是否烹煮；适合供人食用的不属于甲壳动物及软体动物的水生无脊椎动物的细粉、粗粉及团粒', '', '', 0.00, 1, '', '', '品名;制作或保存方法(冻、干、盐腌、盐渍等);是否经水煮;包装规格;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44003, '0308111010', '暗色刺参的种苗 ', '千克', '无', 0.09, 0, 'ABEF', '暗色刺参的种苗 ', '品名;品牌类型;出口享惠情况;种苗请注明个体长度、尾数/千克等;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44004, '0308111090', '海参（仿刺参、海参纲）种苗（濒危除外）', '千克', '无', 0.09, 0, 'AB', '海参（仿刺参、海参纲）种苗（濒危除外） ', '品名;品牌类型;出口享惠情况;种苗请注明个体长度、尾数/千克等;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44005, '0308119010', '活、鲜或冷的暗色刺参 ', '千克', '无', 0.09, 0, 'ABEF', '活、鲜或冷的暗色刺参 ', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44006, '0308119020', '活、鲜或冷的刺参', '千克', '无', 0.09, 0, 'ABU', '活、鲜或冷的刺参', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44007, '0308119090', '活、鲜或冷的其他海参（仿刺参、海参纲） ', '千克', '无', 0.09, 0, 'AB', '活、鲜或冷的其他海参（仿刺参、海参纲） ', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44008, '0308120010', '冻的暗色刺参', '千克', '无', 0.09, 0, 'ABEF', '冻的暗色刺参', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;是否经水煮;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44009, '0308120020', '冻的其他刺参', '千克', '无', 0.09, 0, 'ABU', '冻的其他刺参', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;是否经水煮;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44010, '0308120090', '冻的其他海参（仿刺参、海参纲）', '千克', '无', 0.09, 0, 'AB', '冻的其他海参（仿刺参、海参纲）', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;是否经水煮;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44011, '0308190010', '干、盐腌或盐渍暗色刺参  ', '千克', '无', 0.09, 0, 'ABEF', '干、盐腌或盐渍暗色刺参  包括熏制的，不论在熏制前或熏制过程中是否烹煮', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍等）;拉丁学名;是否经水煮;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44012, '0308190020', '干、盐腌或盐渍的其他刺参', '千克', '无', 0.09, 0, 'ABU', '干、盐腌或盐渍的其他刺参包括熏制的，不论在熏制前或熏制过程中是否烹煮', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍等）;拉丁学名;是否经水煮;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44013, '0308190090', '干、盐腌或盐渍的其他海参（仿刺参、海参纲） ', '千克', '无', 0.09, 0, 'AB', '干、盐腌或盐渍的其他海参（仿刺参、海参纲） 包括熏制的，不论在熏制前或熏制过程中是否烹煮', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍等）;拉丁学名;是否经水煮;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44014, '0308211000', '海胆种苗 ', '千克', '无', 0.09, 0, 'AB', '海胆种苗  ', '品名;品牌类型;出口享惠情况;种苗请注明个体长度、尾数/千克等;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44015, '0308219010', '活、鲜或冷的食用海胆纲', '千克', '无', 0.09, 0, 'ABU', '活、鲜或冷的食用海胆纲', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44016, '0308219090', '其他活、鲜或冷的海胆', '千克', '无', 0.09, 0, 'AB', '其他活、鲜或冷的海胆', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44017, '0308220010', '冻食用海胆纲', '千克', '无', 0.09, 0, 'ABU', '冻食用海胆纲', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44018, '0308220090', '其他冻海胆', '千克', '无', 0.09, 0, 'AB', '其他冻海胆', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;拉丁学名;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44019, '0308290010', '干、盐制食用海胆纲', '千克', '无', 0.09, 0, 'ABU', '干、盐制食用海胆纲包括熏制的，不论在熏制前或熏制过程中是否烹煮', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍等）;拉丁学名;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44020, '0308290090', '其他干、盐制海胆', '千克', '无', 0.09, 0, 'AB', '其他干、盐制海胆包括熏制的，不论在熏制前或熏制过程中是否烹煮', '品名;品牌类型;出口享惠情况;制作或保存方法（干、盐腌、盐渍等）;拉丁学名;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44021, '0308301100', '海蜇（海蜇属）种苗 ', '千克', '无', 0.09, 0, 'AB', '海蜇（海蜇属）种苗  ', '品名;品牌类型;出口享惠情况;种苗请注明个体长度、尾数/千克等;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44022, '0308301900', '活、鲜或冷的海蜇（海蜇属） ', '千克', '无', 0.09, 0, 'AB', '活、鲜或冷的海蜇（海蜇属） ', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷）;拉丁学名;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44023, '0308309000', '冻、干、盐制海蜇（海蜇属） ', '千克', '无', 0.09, 0, 'AB', '冻、干、盐制海蜇（海蜇属） 包括熏制的，不论在熏制前或熏制过程中是否烹煮', '品名;品牌类型;出口享惠情况;制作或保存方法（冻、干、盐腌、盐渍等）;拉丁学名;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44024, '0308901110', '活、鲜或冷的其他濒危水生无脊椎动物的种苗', '千克', '无', 0.00, 0, 'ABFE', '活、鲜或冷的其他濒危水生无脊椎动物的种苗甲壳动物及软体动物除外 ', '品名;品牌类型;出口享惠情况;种苗请注明个体长度、尾数/千克等;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44025, '0308901190', '其他水生无脊椎动物的种苗（甲壳动物及软体动物和其他濒危水生无脊椎动物除外）', '千克', '无', 0.09, 0, 'AB', '其他水生无脊椎动物的种苗（甲壳动物及软体动物和其他濒危水生无脊椎动物除外）甲壳动物及软体动物除外 ', '品名;品牌类型;出口享惠情况;种苗请注明个体长度、尾数/千克等;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44026, '0308901200', '活、鲜或冷的沙蚕，种苗除外', '千克', '无', 0.09, 0, 'AB', '活、鲜或冷的沙蚕，种苗除外', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44027, '0308901910', '活、鲜或冷的其他濒危水生无脊椎动物 ', '千克', '无', 0.00, 0, 'ABFE', '活、鲜或冷的其他濒危水生无脊椎动物 甲壳动物及软体动物除外 ', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44028, '0308901990', '活、鲜或冷的其他水生无脊椎动物 ', '千克', '无', 0.09, 0, 'AB', '活、鲜或冷的其他水生无脊椎动物 甲壳动物及软体动物除外 ', '品名;品牌类型;出口享惠情况;制作或保存方法（活、鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44029, '0308909010', '其他冻、干、盐制濒危水生无脊椎动物', '千克', '无', 0.00, 0, 'ABFE', '其他冻、干、盐制濒危水生无脊椎动物包括熏制的，不论在熏制前或熏制过程中是否烹煮', '品名;品牌类型;出口享惠情况;制作或保存方法（冻、干、盐腌、盐渍等）;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44030, '0308909090', '其他冻、干、盐制水生无脊椎动物', '千克', '无', 0.09, 0, 'AB', '其他冻、干、盐制水生无脊椎动物包括熏制的，不论在熏制前或熏制过程中是否烹煮', '品名;品牌类型;出口享惠情况;制作或保存方法（冻、干、盐腌、盐渍等）;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44031, '0401', '未浓缩及未加糖或其他甜物质的乳及奶油', '', '', 0.00, 1, '', '', '品名;制作或保存方法(未浓缩及未加糖或其他甜物质);脂肪含量(按重量计);成分含量;包装规格(如1升/盒);品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44032, '0401100000', '脂肪含量≤1%未浓缩的乳及稀奶油 ', '千克', '无', 0.09, 0, '7AB', '脂肪含量≤1%未浓缩的乳及稀奶油 脂肪含量按重量计,本编号货品不得加糖和其他甜物质', '品名;品牌类型;出口享惠情况;制作或保存方法（未浓缩及未加糖或其他甜物质）;脂肪含量（按重量计）;成分含量;包装规格（如;升/盒）;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44033, '0401200000', '1%<脂肪含量≤6%的未浓缩的乳及稀奶油 ', '千克', '无', 0.09, 0, '7AB', '1%<脂肪含量≤6%的未浓缩的乳及稀奶油 脂肪含量按重量计,本编号货品不得加糖和其他甜物质', '品名;品牌类型;出口享惠情况;制作或保存方法（未浓缩及未加糖或其他甜物质）;脂肪含量（按重量计）;成分含量;包装规格（如;升/盒）;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44034, '0401400000', '6%<脂肪含量≤10%的未浓缩的乳及稀奶油 ', '千克', '无', 0.09, 0, '7AB', '6%<脂肪含量≤10%的未浓缩的乳及稀奶油 脂肪含量按重量计,本编号货品不得加糖和其他甜物质', '品名;品牌类型;出口享惠情况;制作或保存方法（未浓缩及未加糖或其他甜物质）;脂肪含量（按重量计）;成分含量;包装规格（如;升/盒）;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44035, '0401500000', '脂肪含量＞10%未浓缩的乳及稀奶油 ', '千克', '无', 0.09, 0, '7AB', '脂肪含量＞10%未浓缩的乳及稀奶油 脂肪含量按重量计,本编号货品不得加糖和其他甜物质', '品名;品牌类型;出口享惠情况;制作或保存方法（未浓缩及未加糖或其他甜物质）;脂肪含量（按重量计）;成分含量;包装规格（如;升/盒）;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44036, '0402', '浓缩、加糖或其他甜物质的乳及奶油', '', '', 0.00, 1, '', '', '品名;制作或保存方法(浓缩及加糖或其他甜物质);外观(粉状、粒状等);脂肪含量(按重量计);成分含量;包装规格(如25公斤/包);品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44037, '0402100000', '脂肪含量≤1.5%固状乳及稀奶油', '千克', '无', 0.13, 0, '7AB', '脂肪含量≤1.5%固状乳及稀奶油指粉状、粒状或其他固体状态，浓缩，加糖或其他甜物质', '品名;品牌类型;出口享惠情况;制作或保存方法（浓缩、加糖或其他甜物质）;外观（粉状、粒状等）;脂肪含量（按重量计）;成分含量;包装规格（如;公斤/包）;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44038, '0402210000', '脂肪量＞1.5%未加糖固状乳及稀奶油', '千克', '无', 0.13, 0, '7AB', '脂肪量＞1.5%未加糖固状乳及稀奶油指粉状、粒状或其他固体状态,浓缩，未加糖或其他甜物质', '品名;品牌类型;出口享惠情况;制作或保存方法（浓缩、加糖或其他甜物质）;外观（粉状、粒状等）;脂肪含量（按重量计）;成分含量;包装规格（如;公斤/包）;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44039, '0402290000', '脂肪量＞1.5%的加糖固状乳及稀奶油', '千克', '无', 0.13, 0, '7AB', '脂肪量＞1.5%的加糖固状乳及稀奶油指粉状、粒状或其他固体状态,浓缩,加糖或其他甜物质', '品名;品牌类型;出口享惠情况;制作或保存方法（浓缩、加糖或其他甜物质）;外观（粉状、粒状等）;脂肪含量（按重量计）;成分含量;包装规格（如;公斤/包）;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44040, '0402910000', '浓缩但未加糖的非固状乳及稀奶油', '千克', '无', 0.09, 0, 'AB', '浓缩但未加糖的非固状乳及稀奶油未加其他甜物质', '品名;品牌类型;出口享惠情况;制作或保存方法（浓缩、加糖或其他甜物质）;外观（粉状、粒状等）;脂肪含量（按重量计）;成分含量;包装规格（如;公斤/包）;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44041, '0402990000', '浓缩并已加糖的非固状乳及稀奶油', '千克', '无', 0.09, 0, 'AB', '浓缩并已加糖的非固状乳及稀奶油加其他甜物质', '品名;品牌类型;出口享惠情况;制作或保存方法（浓缩、加糖或其他甜物质）;外观（粉状、粒状等）;脂肪含量（按重量计）;成分含量;包装规格（如;公斤/包）;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44042, '0403', '酪乳、结块的乳及奶油、酸乳、酸乳酒及其他发酵或酸化的乳和奶油，不论是否浓缩、加糖、加其他甜物质、加香料、加水果、加坚果或加可可', '', '', 0.00, 1, '', '', '品名;制作或保存方法(发酵、酸化、浓缩、加糖及其他甜物质;成分含量;包装规格;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44043, '0403100000', '酸乳', '千克', '无', 0.13, 0, 'AB', '酸乳', '品名;品牌类型;出口享惠情况;加工方法[发酵、酸化、浓缩、加糖及其他甜物质、香料;保存方法[常温、冷藏等];成分含量;发酵菌种;包装规格;品牌[中文及外文名称];GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:18:50');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44044, '0403900000', '酪乳及其他发酵或酸化的乳及稀奶油', '千克', '无', 0.13, 0, 'AB', '酪乳及其他发酵或酸化的乳及稀奶油不论是否浓缩、加糖或其他甜物质、香料、水果等', '品名;品牌类型;出口享惠情况;加工方法（发酵、酸化、浓缩、加糖及其他甜物质、香料;保存方法（常温、冷藏等）;成分含量;包装规格;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44045, '0404', '乳清，不论是否浓缩、加糖或其他甜物质；其他品目未列名的含天然乳的产品，不论是否加糖或其他甜物质', '', '', 0.00, 1, '', '', '品名;用途;制作或保存方法(浓缩、加糖及其他甜物质);成分含量;品牌;等级(食品级、饲料级等);', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44046, '0404100000', '乳清及改性乳清', '千克', '无', 0.16, 0, 'AB', '乳清及改性乳清(不论是否浓缩、加糖或其他甜物质)', '品牌类型; 出口享惠情况;  制作或保存方法(浓缩、加糖及其他甜物质);成分含量;品牌;GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44047, '0404900000', '其他编号未列名的含天然乳的产品', '千克', '无', 0.13, 0, 'AB', '其他编号未列名的含天然乳的产品不论是否浓缩、加糖或其他甜物质', '品名;品牌类型;出口享惠情况;成分含量;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44048, '0405', '黄油及其他从乳提取的脂和油；乳酱', '', '', 0.00, 1, '', '', '品名;成分含量;包装规格;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44049, '0405100000', '黄油', '千克', '无', 0.13, 0, 'AB', '黄油', '品名;品牌类型;出口享惠情况;成分含量（乳脂、乳的无脂固形物、水及其他成分含量）;包装规格;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44050, '0405200000', '乳酱', '千克', '无', 0.13, 0, 'AB', '乳酱', '品名;品牌类型;出口享惠情况;成分含量;包装规格;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44051, '0405900000', '其他从乳中提取的脂和油', '千克', '无', 0.13, 0, 'AB', '其他从乳中提取的脂和油', '品名;品牌类型;出口享惠情况;成分含量;包装规格;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44052, '0406', '乳酪及凝乳', '', '', 0.00, 1, '', '', '品名;制作或保存方法(未熟化、未固化等);成分含量;包装规格;品牌;种类(如是否为蓝纹乳酪);', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44053, '0406100000', '鲜乳酪(未熟化或未固化的)', '千克', '无', 0.13, 0, 'AB', '鲜乳酪(未熟化或未固化的)包括乳清乳酪;凝乳', '品名;品牌类型;出口享惠情况;制作或保存方法（未熟化、未固化等）;成分含量;包装规格;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44054, '0406200000', '各种磨碎或粉化的乳酪', '千克', '无', 0.13, 0, 'AB', '各种磨碎或粉化的乳酪', '品名;品牌类型;出口享惠情况;制作方法（磨碎、粉化等）;乳脂含量;包装规格;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44055, '0406300000', '经加工的乳酪', '千克', '无', 0.13, 0, 'AB', '经加工的乳酪但磨碎或粉化的除外', '品名;品牌类型;出口享惠情况;制作或保存方法（未熟化、未固化等）;成分含量;包装规格;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44056, '0406400000', '蓝纹乳酪和娄地青霉生产的带有纹理的其他乳酪', '千克', '无', 0.13, 0, 'AB', '蓝纹乳酪和娄地青霉生产的带有纹理的其他乳酪', '品名;品牌类型;出口享惠情况;制作或保存方法（熟化、固化、磨碎或粉化等）;成分含量;是否带蓝纹或娄地青霉生产的带有纹理;包装规格;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44057, '0406900000', '其他乳酪', '千克', '无', 0.13, 0, 'AB', '其他乳酪', '品名;品牌类型;出口享惠情况;制作或保存方法（熟化、固化、磨碎或粉化等）;成分含量;包装规格;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44058, '0407', '带壳禽蛋，鲜、腌制或煮过的', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜、带壳、腌制、煮过);', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44059, '0407110010', '孵化用受精的濒危鸡的蛋 ', '千克', '个', 0.00, 0, 'AFEB', '孵化用受精的濒危鸡的蛋 ', '品名;品牌类型;出口享惠情况;是否孵化用受精禽蛋;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44060, '0407110090', '孵化用受精的鸡的蛋（濒危除外） ', '千克', '个', 0.09, 0, 'AB', '孵化用受精的鸡的蛋（濒危除外）  ', '品名;品牌类型;出口享惠情况;是否孵化用受精禽蛋;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44061, '0407190010', '其他孵化用受精濒危禽蛋 ', '千克', '个', 0.00, 0, 'AFEB', '其他孵化用受精濒危禽蛋 ', '品名;品牌类型;出口享惠情况;是否孵化用受精禽蛋;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44062, '0407190090', '其他孵化用受精禽蛋（濒危禽蛋除外） ', '千克', '个', 0.09, 0, 'AB', '其他孵化用受精禽蛋（濒危禽蛋除外）  ', '品名;品牌类型;出口享惠情况;是否孵化用受精禽蛋;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44063, '0407210000', '其他带壳的鸡的鲜蛋 ', '千克', '个', 0.09, 0, 'AB', '其他带壳的鸡的鲜蛋 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、带壳）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44064, '0407290010', '其他鲜的带壳濒危禽蛋 ', '千克', '个', 0.00, 0, 'ABFE', '其他鲜的带壳濒危禽蛋 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、带壳）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44065, '0407290090', '其他鲜的带壳禽蛋 ', '千克', '个', 0.09, 0, 'AB', '其他鲜的带壳禽蛋 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、带壳）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44066, '0407901000', '带壳咸蛋', '千克', '个', 0.09, 0, 'AB', '带壳咸蛋', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、带壳、腌制、煮过）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44067, '0407902000', '带壳皮蛋', '千克', '个', 0.09, 0, 'AB', '带壳皮蛋', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、带壳、腌制、煮过）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44068, '0407909010', '其他腌制或煮过的带壳濒危野鸟蛋 ', '千克', '个', 0.00, 0, 'ABFE', '其他腌制或煮过的带壳濒危野鸟蛋 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、带壳、腌制、煮过）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44069, '0407909090', '其他腌制或煮过的带壳禽蛋 ', '千克', '个', 0.09, 0, 'AB', '其他腌制或煮过的带壳禽蛋 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、带壳、腌制、煮过）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44070, '0408', '去壳禽蛋及蛋黄，鲜、干、冻、蒸过或水煮、制成型或用其他方法保藏的，不论是否加糖或其他甜物质', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜、冻、干、去壳、蒸、水煮、制成型;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44071, '0408110000', '干蛋黄', '千克', '无', 0.09, 0, 'AB', '干蛋黄', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冻、干、去壳、蒸、水煮、制成型;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44072, '0408190000', '其他蛋黄', '千克', '无', 0.09, 0, 'AB', '其他蛋黄', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冻、干、去壳、蒸、水煮、制成型;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44073, '0408910000', '干的其他去壳禽蛋', '千克', '无', 0.09, 0, 'AB', '干的其他去壳禽蛋', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冻、干、去壳、蒸、水煮、制成型;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44074, '0408990000', '其他去壳禽蛋', '千克', '无', 0.09, 0, 'AB', '其他去壳禽蛋', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冻、干、去壳、蒸、水煮、制成型;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44075, '0409', '天然蜂蜜', '', '', 0.00, 1, '', '', '品名;来源(天然);品牌;成分;状态;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44076, '0409000000', '天然蜂蜜', '千克', '无', 0.09, 0, 'AB', '天然蜂蜜', '品名;品牌类型;出口享惠情况;来源（天然）;品牌（中文或外文名称）;包装规格;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44077, '0410', '其他品目未列名的食用动物产品', '', '', 0.00, 1, '', '', '品名;用途(食用);品种(燕子的品种);外形(燕盏或燕碎,燕条等);含水量;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44078, '0410001000', '燕窝', '千克', '无', 0.10, 0, 'AB', '燕窝', '品牌类型; 出口享惠情况;  品种(燕子的品种);外形（燕盏或燕碎，燕条等）;含水量;GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44079, '0410004100', '鲜蜂王浆', '千克', '无', 0.09, 0, 'AB', '鲜蜂王浆', '品名;品牌类型;出口享惠情况;制作或保存方法[鲜];品牌[中文及外文名称];GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:18:53');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44080, '0410004200', '鲜蜂王浆粉', '千克', '无', 0.10, 0, 'AB', '鲜蜂王浆粉', '品牌类型; 出口享惠情况;  制作或保存方法(鲜);外观（粉）;品牌;GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44081, '0410004300', '蜂花粉', '千克', '无', 0.10, 0, 'AB', '蜂花粉', '品牌类型; 出口享惠情况;  外观（粉）;品牌;GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44082, '0410004900', '其他蜂产品', '千克', '无', 0.10, 0, 'AB', '其他蜂产品', '品牌类型; 出口享惠情况;  品牌;GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44083, '0410009010', '其他编号未列名濒危野生动物产品（食用）', '千克', '无', 0.00, 0, 'ABFE', '其他编号未列名濒危野生动物产品(食用)', '品牌类型; 出口享惠情况;  用途（食用）;GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44084, '0410009090', '其他编号未列名的食用动物产品', '千克', '无', 0.10, 0, 'AB', '其他编号未列名的食用动物产品', '品牌类型; 出口享惠情况;  用途（食用）;GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44085, '0501', '未经加工的人发，不论是否洗涤；废人发', '', '', 0.00, 1, '', '', '品名;是否经加工;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44086, '0501000000', '未经加工的人发;废人发', '千克', '无', 0.13, 0, '9B', '未经加工的人发;废人发不论是否洗涤', '品名;品牌类型;出口享惠情况;是否经加工;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44087, '0502', '猪鬃、猪毛；獾毛及其他制刷用兽毛；上述鬃毛的废料', '', '', 0.00, 1, '', '', '品名;用途(制刷用);品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44088, '0502101000', '猪鬃', '千克', '无', 0.09, 0, 'AB', '猪鬃', '品名;品牌类型;出口享惠情况;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44089, '0502102000', '猪毛', '千克', '无', 0.09, 0, 'AB', '猪毛', '品名;品牌类型;出口享惠情况;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44090, '0502103000', '猪鬃或猪毛的废料', '千克', '无', 0.09, 0, '9B', '猪鬃或猪毛的废料', '品名;品牌类型;出口享惠情况;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44091, '0502901100', '山羊毛', '千克', '无', 0.09, 0, 'AB', '山羊毛', '品名;品牌类型;出口享惠情况;用途（制刷用）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44092, '0502901200', '黄鼠狼尾毛', '千克', '无', 0.09, 0, 'ABEF', '黄鼠狼尾毛', '品名;品牌类型;出口享惠情况;用途（制刷用）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44093, '0502901910', '濒危獾毛及其他制刷用濒危兽毛', '千克', '无', 0.00, 0, 'ABFE', '濒危獾毛及其他制刷用濒危兽毛', '品名;品牌类型;出口享惠情况;用途（制刷用）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44094, '0502901990', '其他獾毛及其他制刷用兽毛', '千克', '无', 0.09, 0, 'AB', '其他獾毛及其他制刷用兽毛', '品名;品牌类型;出口享惠情况;用途（制刷用）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44095, '0502902010', '濒危獾毛及其他制刷濒危兽毛废料', '千克', '无', 0.00, 0, 'BEF', '濒危獾毛及其他制刷濒危兽毛废料', '品名;品牌类型;出口享惠情况;用途（制刷用）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44096, '0502902090', '其他獾毛及其他制刷用兽毛的废料', '千克', '无', 0.09, 0, '9B', '其他獾毛及其他制刷用兽毛的废料', '品名;品牌类型;出口享惠情况;用途（制刷用）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44097, '0504', '整个或切块的动物（鱼除外）的肠、膀胱及胃，鲜、冷、冻、干、熏、盐腌或盐渍的', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜、冷、冻、干、熏、盐腌、盐渍);品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44098, '0504001100', '整个或切块盐渍的猪肠衣', '千克', '无', 0.09, 0, 'AB', '整个或切块盐渍的猪肠衣猪大肠头除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干、熏、盐腌、盐渍）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44099, '0504001200', '整个或切块盐渍的绵羊肠衣', '千克', '无', 0.09, 0, 'AB', '整个或切块盐渍的绵羊肠衣', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干、熏、盐腌、盐渍）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44100, '0504001300', '整个或切块盐渍的山羊肠衣', '千克', '无', 0.09, 0, 'AB', '整个或切块盐渍的山羊肠衣', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干、熏、盐腌、盐渍）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44101, '0504001400', '整个或切块盐渍的猪大肠头', '千克', '无', 0.09, 0, 'AB', '整个或切块盐渍的猪大肠头', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干、熏、盐腌、盐渍）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44102, '0504001900', '整个或切块的其他动物肠衣', '千克', '无', 0.09, 0, 'AB', '整个或切块的其他动物肠衣包括鲜、冷、冻、干、熏、盐腌或盐渍的,鱼除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干、熏、盐腌、盐渍）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44103, '0504002100', '冷,冻的鸡胗', '千克', '无', 0.09, 0, '7AB', '冷,冻的鸡胗即鸡胃', '品名;品牌类型;出口享惠情况;制作或保存方法（冷、冻）;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44104, '0504002900', '整个或切块的其他动物的胃', '千克', '无', 0.09, 0, 'AB', '整个或切块的其他动物的胃包括鲜、冷、冻、干、熏、盐腌或盐渍的,鱼除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干、熏、盐腌、盐渍）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44105, '0504009000', '整个或切块的其他动物肠、膀胱', '千克', '无', 0.09, 0, 'AB', '整个或切块的其他动物肠、膀胱包括鲜、冷、冻、干、熏、盐腌或盐渍的,鱼除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干、熏、盐腌、盐渍）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44106, '0505', '带有羽毛或羽绒的鸟皮及鸟体其他部分；羽毛及不完整羽毛（不论是否修边）、羽绒，仅经洗涤、消毒或为了保藏而作过处理，但未经进一步加工；羽毛或不完整羽毛的粉末及废料', '', '', 0.00, 1, '', '', '品名;用途;制作或保存方法(仅经洗涤、消毒或为了保藏而做过处理;绒分;羽毛长度;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44107, '0505100010', '填充用濒危野生禽类羽毛、羽绒', '千克', '无', 0.00, 0, 'ABFE', '填充用濒危野生禽类羽毛、羽绒仅经洗涤、消毒等处理,未进一步加工', '品名;品牌类型;出口享惠情况;用途;制作或保存方法（仅经洗涤、消毒或为了保藏而做过处理;含绒量（包含绒子和绒丝含量）;羽毛长度;羽毛来源（鸭、鹅等）;GTIN;CAS;其他', '2022-04-22 17:51:13');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44108, '0505100090', '其他填充用羽毛、羽绒', '千克', '无', 0.09, 0, 'AB', '其他填充用羽毛、羽绒仅经洗涤、消毒等处理,未进一步加工', '品名;品牌类型;出口享惠情况;用途;制作或保存方法（仅经洗涤、消毒或为了保藏而做过处理;含绒量（包含绒子和绒丝含量）;羽毛长度;羽毛来源（鸭、鹅等）;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44109, '0505901000', '羽毛或不完整羽毛的粉末及废料', '千克', '无', 0.09, 0, '9AB', '羽毛或不完整羽毛的粉末及废料', '品名;品牌类型;出口享惠情况;用途;制作或保存方法（仅经洗涤、消毒或为了保藏而做过处理;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44110, '0505909010', '其他濒危野生禽类羽毛、羽绒', '千克', '无', 0.00, 0, 'AFEB', '其他濒危野生禽类羽毛、羽绒包括带有羽毛或羽绒的鸟皮及鸟体的其他部分', '品名;品牌类型;出口享惠情况;用途;制作或保存方法（仅经洗涤、消毒或为了保藏而做过处理;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44111, '0505909090', '其他羽毛,羽绒', '千克', '无', 0.09, 0, 'AB', '其他羽毛,羽绒包括带有羽毛或羽绒的鸟皮及鸟体的其他部分', '品名;品牌类型;出口享惠情况;用途;制作或保存方法（仅经洗涤、消毒或为了保藏而做过处理;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44112, '0506', '骨及角柱，未经加工或经脱脂、简单整理（但未切割成形）、酸处理或脱胶；上述产品的粉末及废料', '', '', 0.00, 1, '', '', '品名;成分;处理方法(未经加工或经脱脂等);外观(粉末);是否废料;用途;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44113, '0506100000', '经酸处理的骨胶原及骨', '千克', '无', 0.00, 0, 'AB', '经酸处理的骨胶原及骨', '品名;品牌类型;出口享惠情况;处理方法（经酸处理等）;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44114, '0506901110', '含牛羊成分的骨废料', '千克', '无', 0.00, 0, '9AB', '含牛羊成分的骨废料未经加工或仅经脱脂等加工的', '品名;品牌类型;出口享惠情况;成分;处理方法（未经加工或经脱脂等）;外观（粉末）;是否废料;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44115, '0506901190', '含牛羊成分的骨粉', '千克', '无', 0.00, 0, 'AB', '含牛羊成分的骨粉未经加工或仅经脱脂等加工的', '品名;品牌类型;出口享惠情况;成分;处理方法（未经加工或经脱脂等）;外观（粉末）;是否废料;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44116, '0506901910', '其他骨废料', '千克', '无', 0.00, 0, '9AB', '其他骨废料未经加工或仅经脱脂等加工的', '品名;品牌类型;出口享惠情况;处理方法（未经加工或经脱脂等）;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44117, '0506901990', '其他骨粉', '千克', '无', 0.00, 0, 'AB', '其他骨粉未经加工或仅经脱脂等加工的', '品名;品牌类型;出口享惠情况;处理方法（未经加工或经脱脂等）;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44118, '0506909011', '已脱胶的虎骨', '千克', '无', 0.00, 0, '89AB', '已脱胶的虎骨指未经加工或经脱脂等加工的', '品名;品牌类型;出口享惠情况;处理方法（未经加工、经脱脂、脱胶等）;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44119, '0506909019', '未脱胶的虎骨', '千克', '无', 0.00, 0, '89AB', '未脱胶的虎骨指未经加工或经脱脂等加工的', '品名;品牌类型;出口享惠情况;处理方法（未经加工、经脱脂、脱胶等）;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44120, '0506909021', '已脱胶的豹骨', '千克', '无', 0.00, 0, 'ABFE', '已脱胶的豹骨指未经加工或经脱脂等加工的', '品名;品牌类型;出口享惠情况;处理方法（未经加工、经脱脂、脱胶等）;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44121, '0506909029', '未脱胶的豹骨', '千克', '无', 0.00, 0, 'ABFE', '未脱胶的豹骨指未经加工或经脱脂等加工的', '品名;品牌类型;出口享惠情况;处理方法（未经加工、经脱脂、脱胶等）;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44122, '0506909031', '已脱胶的濒危野生动物的骨及角柱', '千克', '无', 0.00, 0, 'AFEB', '已脱胶的濒危野生动物的骨及角柱不包括虎骨、豹骨，指未经加工或经脱脂等加工的', '品名;品牌类型;出口享惠情况;处理方法（未经加工、经脱脂、脱胶等）;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44123, '0506909039', '未脱胶的濒危野生动物的骨及角柱', '千克', '无', 0.00, 0, 'AFEB', '未脱胶的濒危野生动物的骨及角柱不包括虎骨、豹骨，指未经加工或经脱脂等加工的', '品名;品牌类型;出口享惠情况;处理方法（未经加工、经脱脂、脱胶等）;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44124, '0506909091', '已脱胶的其他骨及角柱', '千克', '无', 0.00, 0, 'AB', '已脱胶的其他骨及角柱不包括虎骨、豹骨.指未经加工或经脱脂等加工的', '品名;品牌类型;出口享惠情况;处理方法（未经加工、经脱脂、脱胶等）;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44125, '0506909099', '未脱胶的其他骨及角柱', '千克', '无', 0.00, 0, 'AB', '未脱胶的其他骨及角柱不包括虎骨、豹骨.指未经加工或经脱脂等加工的', '品名;品牌类型;出口享惠情况;处理方法（未经加工、经脱脂、脱胶等）;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44126, '0507', '兽牙、龟壳、鲸须、鲸须毛、角、鹿角、蹄、甲、爪及喙，未经加工或仅简单整理但未切割成形；上述产品的粉末及废料', '', '', 0.00, 1, '', '', '品名;处理方法(未经加工或经脱脂等);是否为粉末及废料;用途;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44127, '0507100010', '犀牛角', '千克', '无', 0.09, 0, '89AB', '犀牛角', '品名;品牌类型;出口享惠情况;处理方法（未经加工或经脱脂等）;是否为粉末及废料;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44128, '0507100020', '其他濒危野生兽牙、兽牙粉末及废料', '千克', '无', 0.00, 0, 'AFEB', '其他濒危野生兽牙、兽牙粉末及废料', '品名;品牌类型;出口享惠情况;处理方法（未经加工或经脱脂等）;是否为粉末及废料;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44129, '0507100030', '其他兽牙', '千克', '无', 0.09, 0, 'AB', '其他兽牙', '品名;品牌类型;出口享惠情况;处理方法（未经加工或经脱脂等）;是否为粉末及废料;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44130, '0507100090', '其他兽牙粉末及废料', '千克', '无', 0.09, 0, '9AB', '其他兽牙粉末及废料', '品名;品牌类型;出口享惠情况;处理方法（未经加工或经脱脂等）;是否为粉末及废料;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44131, '0507901000', '羚羊角及其粉末和废料', '千克', '无', 0.09, 0, 'ABFE', '羚羊角及其粉末和废料', '品名;品牌类型;出口享惠情况;处理方法（未经加工或经脱脂等）;是否为粉末及废料;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44132, '0507902000', '鹿茸及其粉末', '千克', '无', 0.09, 0, 'ABFE', '鹿茸及其粉末', '品名;品牌类型;出口享惠情况;处理方法（未经加工或经脱脂等）;是否为粉末及废料;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44133, '0507909000', '龟壳,鲸须,鲸须毛,鹿角及其他角', '千克', '', 0.05, 0, 'AFEB', '龟壳,鲸须,鲸须毛,鹿角及其他角(包括蹄,甲,爪及喙及其粉末和废料)', '品名;处理方法(未经加工或经脱脂等);是否为粉末及废料;用途;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44134, '0508', '珊瑚及类似品，未经加工或仅简单整理但未经进一步加工；软体动物壳、甲壳动物壳、棘皮动物壳、墨鱼骨，未经加工或仅简单整理但未切割成形，上述壳、骨的粉末及废料', '', '', 0.00, 1, '', '', '品名;处理方法(未经加工或经脱脂等);是否为粉末及废料;用途;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44135, '0508001010', '濒危珊瑚及濒危水产品的粉末、废料', '千克', '无', 0.00, 0, 'AFEB', '濒危珊瑚及濒危水产品的粉末、废料包括介、贝、棘皮动物壳,不包括墨鱼骨的粉末、废料', '品名;品牌类型;出口享惠情况;处理方法（未经加工或经脱脂等）;是否为粉末及废料;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44136, '0508001090', '其他水产品壳、骨的粉末及废料', '千克', '无', 0.09, 0, 'AB', '其他水产品壳、骨的粉末及废料包括介、贝壳,棘皮动物壳,墨鱼骨的粉末及废料', '品名;品牌类型;出口享惠情况;处理方法（未经加工或经脱脂等）;是否为粉末及废料;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44137, '0508009010', '濒危珊瑚及濒危水产品的壳、骨', '千克', '无', 0.00, 0, 'AFEB', '濒危珊瑚及濒危水产品的壳、骨包括介、贝、棘皮动物的壳,不包括墨鱼骨', '品名;品牌类型;出口享惠情况;处理方法（未经加工或经脱脂等）;是否为粉末及废料;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44138, '0508009090', '其他水产品的壳、骨', '千克', '无', 0.09, 0, 'AB', '其他水产品的壳、骨包括介、贝、棘皮动物的壳,墨鱼骨', '品名;品牌类型;出口享惠情况;处理方法（未经加工或经脱脂等）;是否为粉末及废料;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44139, '0510', '龙涎香、海狸香、灵猫香及麝香；斑蝥；胆汁，不论是否干制；供配制药用的腺体及其他动物产品，鲜、冷、冻或用其他方法暂时保藏的', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜、冷、冻、干或用其他方法暂时保藏;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44140, '0510001010', '牛黄', '千克', '无', 0.09, 0, '8A', '牛黄', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干或用其他方法暂时保藏;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44141, '0510001020', '猴枣', '千克', '无', 0.09, 0, 'QAFEB', '猴枣', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干或用其他方法暂时保藏;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44142, '0510001090', '其他黄药', '千克', '无', 0.09, 0, 'AFEB', '其他黄药不包括牛黄', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干或用其他方法暂时保藏;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44143, '0510002010', '海狸香、灵猫香', '千克', '无', 0.09, 0, 'AFEB', '海狸香、灵猫香', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干或用其他方法暂时保藏;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44144, '0510002020', '龙涎香', '千克', '无', 0.09, 0, 'AB', '龙涎香', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干或用其他方法暂时保藏;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44145, '0510003000', '麝香', '千克', '无', 0.00, 0, '8AF', '麝香', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干或用其他方法暂时保藏;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44146, '0510004000', '斑蝥', '千克', '无', 0.09, 0, 'QAB', '斑蝥', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干或用其他方法暂时保藏;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44147, '0510009010', '其他濒危野生动物胆汁及其他产品', '千克', '无', 0.00, 0, 'AFEB', '其他濒危野生动物胆汁及其他产品不论是否干制;鲜、冷、冻或用其他方法暂时保藏的', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干或用其他方法暂时保藏;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44148, '0510009090', '胆汁,配药用腺体及其他动物产品', '千克', '无', 0.09, 0, 'AB', '胆汁,配药用腺体及其他动物产品不论是否干制;鲜,冷,冻或用其他方法暂时保藏的', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干或用其他方法暂时保藏;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44149, '0511', '其他品目未列名的动物产品；不适合供人食用的第一章或第三章的死动物', '', '', 0.00, 1, '', '', '品名;用途;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44150, '0511100010', '濒危野生牛的精液', '千克', '支', 0.00, 0, 'ABFE', '濒危野生牛的精液', '品名;品牌类型;出口享惠情况;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44151, '0511100090', '牛的精液（濒危野牛的精液除外）', '千克', '支', 0.09, 0, 'AB', '牛的精液（濒危野牛的精液除外） ', '品名;品牌类型;出口享惠情况;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44152, '0511911110', '濒危鱼的受精卵', '千克', '无', 0.00, 0, 'ABFE', '濒危鱼的受精卵', '品名;品牌类型;出口享惠情况;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44153, '0511911190', '受精鱼卵（包括发眼卵，濒危除外）', '千克', '无', 0.09, 0, 'AB', '受精鱼卵（包括发眼卵，濒危除外） ', '品名;品牌类型;出口享惠情况;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44154, '0511911910', '濒危鱼的非食用产品', '千克', '无', 0.00, 0, 'ABFE', '濒危鱼的非食用产品包括鱼肚', '品名;品牌类型;出口享惠情况;用途;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44155, '0511911990', '其他鱼的非食用产品', '千克', '无', 0.09, 0, 'AB', '其他鱼的非食用产品包括鱼肚', '品名;品牌类型;出口享惠情况;用途;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44156, '0511919010', '濒危水生无脊椎动物产品', '千克', '无', 0.00, 0, 'ABFE', '濒危水生无脊椎动物产品包括甲壳动物、软体动物，第三章死动物', '品名;品牌类型;出口享惠情况;用途;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44157, '0511919090', '其他水生无脊椎动物产品', '千克', '无', 0.09, 0, 'AB', '其他水生无脊椎动物产品包括甲壳动物、软体动物、第三章死动物', '品名;品牌类型;出口享惠情况;用途;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44158, '0511991010', '濒危野生动物精液(牛的精液除外)', '千克', '无', 0.00, 0, 'AFEB', '濒危野生动物精液(牛的精液除外)', '品名;品牌类型;出口享惠情况;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44159, '0511991090', '其他动物精液（牛的精液和其他濒危动物精液除外）', '千克', '无', 0.09, 0, 'AB', '其他动物精液（牛的精液和其他濒危动物精液除外） ', '品名;品牌类型;出口享惠情况;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44160, '0511992010', '濒危野生动物胚胎', '千克', '无', 0.00, 0, 'AFEB', '濒危野生动物胚胎', '品名;品牌类型;出口享惠情况;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44161, '0511992090', '其他动物胚胎', '千克', '无', 0.09, 0, 'AB', '其他动物胚胎 ', '品名;品牌类型;出口享惠情况;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44162, '0511993000', '蚕种', '千克', '无', 0.09, 0, 'AB', '蚕种', '品名;品牌类型;出口享惠情况;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44163, '0511994010', '废马毛', '千克', '无', 0.09, 0, '9B', '废马毛不论是否制成有或无衬垫的毛片', '品名;品牌类型;出口享惠情况;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44164, '0511994090', '其他马毛', '千克', '无', 0.09, 0, 'AB', '其他马毛不论是否制成有或无衬垫的毛片', '品名;品牌类型;出口享惠情况;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44165, '0511999010', '其他编号未列名濒危野生动物产品', '千克', '无', 0.00, 0, 'AFEB', '其他编号未列名濒危野生动物产品包括不适合供人食用的第一章的死动物', '品名;品牌类型;出口享惠情况;用途;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44166, '0511999090', '其他编号未列名的动物产品', '千克', '无', 0.09, 0, 'AB', '其他编号未列名的动物产品包括不适合供人食用的第一章的死动物', '品名;品牌类型;出口享惠情况;用途;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44167, '0601', '鳞茎、块茎、块根、球茎、根颈及根茎，休眠、生长或开花的；菊苣植物及其根，但品目1212的根除外', '', '', 0.00, 1, '', '', '品名;状态(休眠、生长、开花);种类(球茎、块茎、鳞茎、块根等);是否种用;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44168, '0601101000', '休眠的番红花球茎', '个', '千克', 0.09, 0, 'AB', '番红花球茎 ', '品名;品牌类型;出口享惠情况;状态（休眠、生长、开花）;种类（球茎、块茎、鳞茎、块根等）;是否种用;GTIN;CAS;其他', '2022-10-28 22:37:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44169, '0601102100', '种用百合球茎', '个', '千克', 0.00, 0, 'AB', '种用百合球茎 ', '品名;品牌类型;出口享惠情况;状态（休眠、生长、开花）;种类（球茎、块茎、鳞茎、块根等）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44170, '0601102900', '其他休眠的百合球茎', '个', '千克', 0.00, 0, 'AB', '其他休眠的百合球茎', '品名;品牌类型;出口享惠情况;状态（休眠、生长、开花）;种类（球茎、块茎、鳞茎、块根等）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44171, '0601109110', '种用休眠的兰花块茎', '个', '千克', 0.09, 0, 'AFEB', '种用休眠的兰花块茎包括球茎、根颈及根茎', '品名;品牌类型;出口享惠情况;状态（休眠、生长、开花）;种类（球茎、块茎、鳞茎、块根等）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44172, '0601109191', '种用休眠其他濒危植物鳞茎等', '个', '千克', 0.00, 0, 'ABFE', '种用休眠其他濒危植物鳞茎等包括球茎、根颈、根茎、鳞茎、块茎、块根', '品名;品牌类型;出口享惠情况;状态（休眠、生长、开花）;种类（球茎、块茎、鳞茎、块根等）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44173, '0601109199', '种用休眠的鳞茎、块茎、块根、球茎、根颈及根茎（濒危除外）', '个', '千克', 0.09, 0, 'AB', '种用休眠的鳞茎、块茎、块根、球茎、根颈及根茎（濒危除外） ', '品名;品牌类型;出口享惠情况;状态（休眠、生长、开花）;种类（球茎、块茎、鳞茎、块根等）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44174, '0601109910', '其他休眠的兰花块茎', '个', '千克', 0.09, 0, 'AFEB', '其他休眠的兰花块茎包括球茎、根颈及根茎', '品名;品牌类型;出口享惠情况;状态（休眠、生长、开花）;种类（球茎、块茎、鳞茎、块根等）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44175, '0601109991', '其他休眠濒危植物鳞茎等', '个', '千克', 0.00, 0, 'AFEB', '其他休眠濒危植物鳞茎等包括球茎、根颈、根茎、鳞茎、块茎、块根', '品名;品牌类型;出口享惠情况;状态（休眠、生长、开花）;种类（球茎、块茎、鳞茎、块根等）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44176, '0601109999', '其他休眠的其他鳞茎、块茎、块根', '个', '千克', 0.09, 0, 'AB', '其他休眠的其他鳞茎、块茎、块根包括球茎、根颈及根茎', '品名;品牌类型;出口享惠情况;状态（休眠、生长、开花）;种类（球茎、块茎、鳞茎、块根等）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44177, '0601200010', '生长或开花的兰花块茎', '个', '千克', 0.09, 0, 'AFEB', '生长或开花的兰花块茎包括球茎、根颈及根茎', '品名;品牌类型;出口享惠情况;状态（休眠、生长、开花）;种类（球茎、块茎、鳞茎、块根等）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44178, '0601200020', '生长或开花的仙客来鳞茎', '个', '千克', 0.09, 0, 'AFEB', '生长或开花的仙客来鳞茎', '品名;品牌类型;出口享惠情况;状态（休眠、生长、开花）;种类（球茎、块茎、鳞茎、块根等）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44179, '0601200091', '生长或开花的其他濒危植物鳞茎等', '个', '千克', 0.00, 0, 'AFEB', '生长或开花的其他濒危植物鳞茎等包括球茎、根颈、根茎、鳞茎、块茎、块根、菊苣植物', '品名;品牌类型;出口享惠情况;状态（休眠、生长、开花）;种类（球茎、块茎、鳞茎、块根等）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44180, '0601200099', '生长或开花的鳞茎、块茎、块根、球茎、根颈及根茎；菊苣植物及其根（濒危除外）', '个', '千克', 0.09, 0, 'AB', '生长或开花的鳞茎、块茎、块根、球茎、根颈及根茎；菊苣植物及其根（濒危除外）包括块茎、块根、球茎、根颈及根茎,品目1212的根除外', '品名;品牌类型;出口享惠情况;状态（休眠、生长、开花）;种类（球茎、块茎、鳞茎、块根等）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44181, '0602', '其他活植物（包括其根）、插枝及接穗；蘑菇菌丝', '', '', 0.00, 1, '', '', '品名;是否种用;品牌;是否附苗木种子引进证明;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44182, '0602100010', '濒危植物的无根插枝及接穗', '株', '千克', 0.00, 0, 'ABFE', '濒危植物的无根插枝及接穗', '品名;品牌类型;出口享惠情况;栽培方法（无根插枝、接穗等）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44183, '0602100090', '无根插枝及接穗（濒危除外）', '株', '千克', 0.09, 0, 'AB', '无根插枝及接穗（濒危除外） ', '品名;品牌类型;出口享惠情况;栽培方法（无根插枝、接穗等）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44184, '0602201000', '食用水果或食用坚果的种用苗木', '株', '千克', 0.00, 0, 'AB', '食用水果或食用坚果的种用苗木包括食用果灌木种用苗木', '品名;品牌类型;出口享惠情况;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44185, '0602209000', '其他食用水果、坚果树及灌木', '株', '千克', 0.09, 0, 'AB', '其他食用水果、坚果树及灌木不论是否嫁接', '品名;品牌类型;出口享惠情况;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44186, '0602301000', '种用杜鹃', '株', '千克', 0.09, 0, 'AB', '种用杜鹃不论是否嫁接', '品名;品牌类型;出口享惠情况;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44187, '0602309000', '其他杜鹃', '株', '千克', 0.09, 0, 'AB', '其他杜鹃不论是否嫁接', '品名;品牌类型;出口享惠情况;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44188, '0602401000', '种用玫瑰', '株', '千克', 0.09, 0, 'AB', '种用玫瑰不论是否嫁接', '品名;品牌类型;出口享惠情况;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44189, '0602409000', '其他玫瑰', '株', '千克', 0.09, 0, 'AB', '其他玫瑰不论是否嫁接', '品名;品牌类型;出口享惠情况;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44190, '0602901000', '蘑菇菌丝', '千克', '无', 0.09, 0, 'AB', '蘑菇菌丝', '品名;品牌类型;出口享惠情况;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44191, '0602909110', '种用兰花', '株', '千克', 0.00, 0, 'AFEB', '种用兰花', '品名;品牌类型;出口享惠情况;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44192, '0602909120', '种用濒危红豆杉苗木', '株', '千克', 0.00, 0, 'AFEB', '种用红豆杉苗木', '品名;品牌类型;出口享惠情况;是否种用;GTIN;CAS;其他', '2022-10-28 22:37:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44193, '0602909191', '其他濒危植物种用苗木', '株', '千克', 0.00, 0, 'AFEB', '其他濒危植物种用苗木', '品名;品牌类型;出口享惠情况;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44194, '0602909199', '其他种用苗木（濒危除外）', '株', '千克', 0.00, 0, 'AB', '其他种用苗木（濒危除外） ', '品名;品牌类型;出口享惠情况;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44195, '0602909200', '其他兰花', '株', '千克', 0.09, 0, 'ABFE', '其他兰花种用除外', '品名;品牌类型;出口享惠情况;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44196, '0602909300', '其他菊花', '株', '千克', 0.09, 0, 'AB', '其他菊花种用除外', '品名;品牌类型;出口享惠情况;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44197, '0602909410', '非种用翠叶芦荟', '株', '千克', 0.09, 0, 'ABEFQ', '芦荟种用除外', '品名;品牌类型;出口享惠情况;GTIN;CAS;其他', '2022-10-28 22:37:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44198, '0602909490', '其他百合', '株', '千克', 0.00, 0, 'AB', '其他百合种用除外', '品名;品牌类型;出口享惠情况;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44199, '0602909500', '其他康乃馨', '株', '千克', 0.09, 0, 'AB', '其他康乃馨种用除外', '品名;品牌类型;出口享惠情况;GTIN;CAS;其他', '2022-04-22 17:51:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44200, '0602909910', '苏铁(铁树)类', '株', '千克', 0.09, 0, 'ABFE', '苏铁(铁树)类', '品名;品牌类型;出口享惠情况;直径、高度（整株植物从根部到树杈顶部的高度范围）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44201, '0602909920', '仙人掌', '株', '千克', 0.09, 0, 'ABFE', '仙人掌包括仙人球、仙人柱、仙人指', '品名;品牌类型;出口享惠情况;直径、高度（整株植物从根部到树杈顶部的高度范围）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44202, '0602909930', '濒危红豆杉', '株', '千克', 0.00, 0, 'ABFE', '红豆杉种用除外', '品名;品牌类型;出口享惠情况;直径、高度（整株植物从根部到树杈顶部的高度范围）;GTIN;CAS;其他', '2022-10-28 22:37:47');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44203, '0602909991', '其他濒危活植物', '株', '千克', 0.00, 0, 'AFEB', '其他濒危活植物种用除外', '品名;品牌类型;出口享惠情况;直径、高度（整株植物从根部到树杈顶部的高度范围）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44204, '0602909999', '其他活植物', '株', '千克', 0.09, 0, 'AB', '其他活植物种用除外', '品名;品牌类型;出口享惠情况;直径、高度（整株植物从根部到树杈顶部的高度范围）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44205, '0603', '制花束或装饰用的插花及花蕾，鲜、干、染色、漂白、浸渍或用其他方法处理的', '', '', 0.00, 1, '', '', '品名;用途(制花束或装饰用);制作或保存方法(鲜、干、染色、漂白、浸渍等);品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44206, '0603110000', '鲜的玫瑰', '千克', '枝', 0.09, 0, 'AB', '鲜的玫瑰制花束或装饰用的', '品名;品牌类型;出口享惠情况;用途（制花束或装饰用）;制作或保存方法（鲜、干、染色、漂白、浸渍等）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44207, '0603120000', '鲜的康乃馨', '千克', '枝', 0.09, 0, 'AB', '鲜的康乃馨制花束或装饰用的', '品名;品牌类型;出口享惠情况;用途（制花束或装饰用）;制作或保存方法（鲜、干、染色、漂白、浸渍等）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44208, '0603130000', '鲜的兰花', '千克', '枝', 0.09, 0, 'ABEF', '鲜的兰花制花束或装饰用的', '品名;品牌类型;出口享惠情况;用途（制花束或装饰用）;制作或保存方法（鲜、干、染色、漂白、浸渍等）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44209, '0603140000', '鲜的菊花', '千克', '枝', 0.09, 0, 'AB', '鲜的菊花制花束或装饰用的', '品名;品牌类型;出口享惠情况;用途（制花束或装饰用）;制作或保存方法（鲜、干、染色、漂白、浸渍等）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44210, '0603150000', '鲜的百合花（百合属） ', '千克', '枝', 0.09, 0, 'AB', '鲜的百合花（百合属） 制花束或装饰用的', '品名;品牌类型;出口享惠情况;用途（制花束或装饰用）;制作或保存方法（鲜、干、染色、漂白、浸渍等）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44211, '0603190010', '鲜的濒危植物插花及花蕾', '千克', '枝', 0.00, 0, 'ABFE', '鲜的濒危植物插花及花蕾制花束或装饰用的', '品名;品牌类型;出口享惠情况;用途（制花束或装饰用）;制作或保存方法（鲜、干、染色、漂白、浸渍等）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44212, '0603190090', '其他鲜的插花及花蕾', '千克', '枝', 0.09, 0, 'AB', '其他鲜的插花及花蕾制花束或装饰用的', '品名;品牌类型;出口享惠情况;用途（制花束或装饰用）;制作或保存方法（鲜、干、染色、漂白、浸渍等）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44213, '0603900010', '干或染色等加工濒危植物插花及花蕾', '千克', '枝', 0.00, 0, 'ABFE', '干或染色等加工濒危植物插花及花蕾制花束或装饰用的,鲜的除外', '品名;品牌类型;出口享惠情况;用途（制花束或装饰用）;制作或保存方法（鲜、干、染色、漂白、浸渍等）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44214, '0603900090', '其他干或染色等加工的插花及花蕾', '千克', '枝', 0.09, 0, 'AB', '其他干或染色等加工的插花及花蕾制花束或装饰用的,鲜的除外', '品名;品牌类型;出口享惠情况;用途（制花束或装饰用）;制作或保存方法（鲜、干、染色、漂白、浸渍等）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44215, '0604', '制花束或装饰用的不带花及花蕾的植物枝、叶或其他部分，草、苔藓及地衣，鲜、干、染色、漂白、浸渍或用其他方法处理的', '', '', 0.00, 1, '', '', '品名;用途(制花束或装饰用);制作或保存方法(鲜且不带花及花蕾、干、染色、漂白、;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44216, '0604201000', '鲜的苔藓及地衣 ', '千克', '无', 0.09, 0, 'AB', '鲜的苔藓及地衣 ', '品名;品牌类型;出口享惠情况;用途（制花束或装饰用）;是否带花及花蕾;制作或保存方法（鲜、干、染色、漂白、浸渍等）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44217, '0604209010', '其他鲜濒危植物枝、叶或其他部分,草 ', '千克', '无', 0.00, 0, 'ABFE', '其他鲜濒危植物枝、叶或其他部分,草 枝、叶或其他部分是指制花束或装饰用并且不带花及花蕾', '品名;品牌类型;出口享惠情况;用途（制花束或装饰用）;是否带花及花蕾;制作或保存方法（鲜、干、染色、漂白、浸渍等）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44218, '0604209090', '其他鲜植物枝、叶或其他部分,草 ', '千克', '无', 0.09, 0, 'AB', '其他鲜植物枝、叶或其他部分,草 枝、叶或其他部分是指制花束或装饰用并且不带花及花蕾', '品名;品牌类型;出口享惠情况;用途（制花束或装饰用）;是否带花及花蕾;制作或保存方法（鲜、干、染色、漂白、浸渍等）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44219, '0604901000', '其他苔藓及地衣 ', '千克', '无', 0.09, 0, 'AB', '其他苔藓及地衣 ', '品名;品牌类型;出口享惠情况;用途（制花束或装饰用）;是否带花及花蕾;制作或保存方法（鲜、干、染色、漂白、浸渍等）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44220, '0604909010', '其他染色或经加工濒危植物枝、叶或其他部分,草 等', '千克', '无', 0.00, 0, 'ABFE', '其他染色或经加工濒危植物枝、叶或其他部分,草 等枝、叶或其他部分是指制花束或装饰用并且不带花及花蕾', '品名;品牌类型;出口享惠情况;用途（制花束或装饰用）;是否带花及花蕾;制作或保存方法（鲜、干、染色、漂白、浸渍等）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44221, '0604909090', '其他染色或加工的植物枝、叶或其他部分,草 ', '千克', '无', 0.09, 0, 'AB', '其他染色或加工的植物枝、叶或其他部分,草 枝、叶或其他部分是指制花束或装饰用并且不带花及花蕾', '品名;品牌类型;出口享惠情况;用途（制花束或装饰用）;是否带花及花蕾;制作或保存方法（鲜、干、染色、漂白、浸渍等）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44222, '0701', '鲜或冷藏的马铃薯', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜、冷);是否种用;品牌;是否附苗木种子引进证明;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44223, '0701100000', '种用马铃薯', '千克', '无', 0.00, 0, 'AB', '种用马铃薯', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44224, '0701900000', '其他鲜或冷藏的马铃薯', '千克', '无', 0.00, 0, 'AB', '其他鲜或冷藏的马铃薯', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44225, '0702', '鲜或冷藏的番茄', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜、冷);品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44226, '0702000000', '鲜或冷藏的番茄', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的番茄', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44227, '0703', '鲜或冷藏的洋葱、青葱、大蒜、韭葱及其他葱属蔬菜', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜、冷);品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44228, '0703101000', '鲜或冷藏的洋葱', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的洋葱', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44229, '0703102000', '鲜或冷藏的青葱', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的青葱', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44230, '0703201000', '鲜或冷藏的蒜头', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的蒜头', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44231, '0703202000', '鲜或冷藏的蒜苔及蒜苗', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的蒜苔及蒜苗包括青蒜', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44232, '0703209000', '鲜或冷藏的其他大蒜', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的其他大蒜包括切片、切碎、切丝、捣碎、磨碎、去皮等', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44233, '0703901000', '鲜或冷藏的韭葱', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的韭葱', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44234, '0703902000', '鲜或冷藏的大葱', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的大葱', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44235, '0703909000', '鲜或冷藏的其他葱属蔬菜', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的其他葱属蔬菜', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44236, '0704', '鲜或冷藏的卷心菜、菜花、球茎甘蓝、羽衣甘蓝及类似的食用芥菜类蔬菜', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜、冷);品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44237, '0704100001', '鲜、冷硬花甘蓝', '千克', '无', 0.00, 0, 'AB', '鲜、冷硬花甘蓝', '品牌类型; 出口享惠情况;  制作或保存方法(鲜、冷);GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44238, '0704100002', '鲜、冷花椰菜', '千克', '无', 0.00, 0, 'AB', '鲜、冷花椰菜(花椰菜也叫菜花)', '品牌类型; 出口享惠情况;  制作或保存方法(鲜、冷);GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44239, '0704200000', '鲜或冷藏的抱子甘蓝', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的抱子甘蓝', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44240, '0704901000', '鲜或冷藏的卷心菜', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的卷心菜学名结球甘蓝,又名圆白菜、洋白菜,属十字花科芸苔属甘蓝变种', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44241, '0704902000', '鲜或冷藏的西兰花', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的西兰花(西兰花,又称青花菜、绿菜花,属十字花科芸苔属甘蓝变种。)', '品牌类型; 出口享惠情况;  制作或保存方法(鲜、冷);GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44242, '0704909001', '鲜、冷其他甘蓝', '千克', '无', 0.00, 0, 'AB', '鲜、冷其他甘蓝', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44243, '0704909090', '鲜或冷藏的其他食用芥菜类蔬菜', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的其他食用芥菜类蔬菜', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44244, '0705', '鲜或冷藏的莴苣及菊苣', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜、冷);品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44245, '0705110000', '鲜或冷藏的结球莴苣(包心生菜)', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的结球莴苣(包心生菜)', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44246, '0705190000', '鲜或冷藏的其他莴苣', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的其他莴苣', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44247, '0705210000', '鲜或冷藏的维特罗夫菊苣', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的维特罗夫菊苣', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44248, '0705290000', '鲜或冷藏的其他菊苣', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的其他菊苣', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44249, '0706', '鲜或冷藏的胡萝卜、萝卜、色拉甜菜根、婆罗门参、块根芹、小萝卜及类似的食用根茎', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜、冷);品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44250, '0706100001', '鲜、冷胡萝卜', '千克', '无', 0.00, 0, 'AB', '鲜、冷胡萝卜', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44251, '0706100090', '鲜或冷藏的芜菁', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的芜菁', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44252, '0706900000', '鲜或冷藏的萝卜及类似食用根茎', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的萝卜及类似食用根茎包括色拉甜菜根、婆罗门参、块根芹', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44253, '0707', '鲜或冷藏的黄瓜及小黄瓜', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜、冷);品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44254, '0707000000', '鲜或冷藏的黄瓜及小黄瓜', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的黄瓜及小黄瓜', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44255, '0708', '鲜或冷藏的豆类蔬菜，不论是否脱荚', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜、冷);品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44256, '0708100000', '鲜或冷藏的豌豆', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的豌豆不论是否脱荚', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44257, '0708200000', '鲜或冷藏的豇豆及菜豆', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的豇豆及菜豆不论是否脱荚', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44258, '0708900000', '鲜或冷藏的其他豆类蔬菜', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的其他豆类蔬菜不论是否脱荚', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44259, '0709', '鲜或冷藏的其他蔬菜', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜、冷);品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44260, '0709200000', '鲜或冷藏的芦笋', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的芦笋', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44261, '0709300000', '鲜或冷藏的茄子', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的茄子', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44262, '0709400000', '鲜或冷藏的芹菜', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的芹菜块根芹除外', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44263, '0709510000', '鲜或冷藏的伞菌属蘑菇', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的伞菌属蘑菇', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44264, '0709591000', '鲜或冷藏的其他松茸', '千克', '无', 0.00, 0, 'ABE', '鲜或冷藏的其他松茸 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44265, '0709592000', '鲜或冷藏的香菇', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的香菇', '品牌类型; 出口享惠情况;  制作或保存方法(鲜、冷);GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44266, '0709593000', '鲜或冷藏的金针菇', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的金针菇', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44267, '0709594000', '鲜或冷藏的草菇', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的草菇', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44268, '0709595000', '鲜或冷藏的口蘑', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的口蘑', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44269, '0709596000', '鲜或冷藏的其他块菌', '千克', '无', 0.09, 0, 'AB', '鲜或冷藏的其他块菌 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44270, '0709599000', '鲜或冷藏的其他蘑菇', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的其他蘑菇 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44271, '0709600000', '鲜或冷藏的辣椒属及多香果属的果实', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的辣椒属及多香果属的果实包括甜椒', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44272, '0709700000', '鲜或冷藏的菠菜', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的菠菜', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44273, '0709910000', '鲜或冷藏的洋蓟 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷藏的洋蓟 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44274, '0709920000', '鲜或冷藏的油橄榄 ', '千克', '无', 0.09, 0, 'AB', '鲜或冷藏的油橄榄 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44275, '0709930000', '鲜或冷藏的南瓜、笋瓜及瓠瓜（南瓜属） ', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的南瓜、笋瓜及瓠瓜（南瓜属） ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44276, '0709991010', '鲜或冷藏的酸竹笋', '千克', '无', 0.00, 0, 'ABE', '鲜或冷藏的酸竹笋', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44277, '0709991090', '鲜或冷藏的其他竹笋 ', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的其他竹笋 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44278, '0709999001', '鲜或冷藏的丝瓜 ', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的丝瓜 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44279, '0709999002', '鲜或冷藏的青江菜 ', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的青江菜 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44280, '0709999003', '鲜或冷藏的小白菜 ', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的小白菜 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44281, '0709999004', '鲜或冷藏的苦瓜 ', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的苦瓜 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44282, '0709999005', '鲜或冷藏的山葵 ', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的山葵 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44283, '0709999010', '鲜或冷藏的野生莼菜', '千克', '无', 0.00, 0, 'ABE', '鲜或冷藏的莼菜 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-10-28 22:37:48');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44284, '0709999090', '鲜或冷藏的其他蔬菜 ', '千克', '无', 0.00, 0, 'AB', '鲜或冷藏的其他蔬菜 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44285, '0710', '冷冻蔬菜（不论是否蒸煮）', '', '', 0.00, 1, '', '', '品名;制作或保存方法(冻);品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44286, '0710100000', '冷冻马铃薯', '千克', '无', 0.00, 0, 'AB', '冷冻马铃薯不论是否蒸煮', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44287, '0710210000', '冷冻豌豆', '千克', '无', 0.00, 0, 'AB', '冷冻豌豆不论是否蒸煮', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44288, '0710221000', '冷冻的红小豆（赤豆）', '千克', '无', 0.09, 0, 'AB', '冷冻的红小豆（赤豆）不论是否蒸煮', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44289, '0710229000', '冷冻豇豆及菜豆', '千克', '无', 0.00, 0, 'AB', '冷冻豇豆及菜豆不论是否蒸煮', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44290, '0710290000', '冷冻其他豆类蔬菜', '千克', '无', 0.00, 0, 'AB', '冷冻其他豆类蔬菜不论是否蒸煮', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44291, '0710300000', '冷冻菠菜', '千克', '无', 0.00, 0, 'AB', '冷冻菠菜不论是否蒸煮', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44292, '0710400000', '冷冻甜玉米', '千克', '无', 0.00, 0, 'AB', '冷冻甜玉米不论是否蒸煮', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44293, '0710801000', '冷冻松茸', '千克', '无', 0.00, 0, 'ABE', '冷冻松茸不论是否蒸煮', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44294, '0710802000', '冷冻蒜苔及蒜苗(包括青蒜)', '千克', '无', 0.09, 0, 'AB', '冷冻蒜苔及蒜苗(包括青蒜)不论是否蒸煮', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44295, '0710803000', '冷冻蒜头', '千克', '无', 0.09, 0, 'AB', '冷冻蒜头不论是否蒸煮', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44296, '0710804000', '冷冻牛肝菌 ', '千克', '无', 0.00, 0, 'AB', '冷冻牛肝菌 不论是否蒸煮                                                      ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44297, '0710809010', '冷冻的大蒜瓣', '千克', '无', 0.00, 0, 'AB', '冷冻的大蒜瓣不论是否蒸煮', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44298, '0710809020', '冷冻的香菇', '千克', '无', 0.00, 0, 'AB', '冷冻的香菇不论是否蒸煮', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44299, '0710809030', '冷冻野生莼菜', '千克', '无', 0.00, 0, 'ABE', '冷冻莼菜不论是否蒸煮', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;GTIN;CAS;其他', '2022-10-28 22:37:48');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44300, '0710809090', '冷冻的未列名蔬菜', '千克', '无', 0.00, 0, 'AB', '冷冻的未列名蔬菜不论是否蒸煮', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44301, '0710900000', '冷冻什锦蔬菜', '千克', '无', 0.00, 0, 'AB', '冷冻什锦蔬菜不论是否蒸煮', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44302, '0711', '暂时保藏（例如，使用二氧化硫气体、盐水、亚硫酸水或其他防腐液）的蔬菜，但不适于直接食用的', '', '', 0.00, 1, '', '', '品名;用途(不适于直接食用);制作或保存方法(用盐水、二氧化硫气体、亚硫酸水或其;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44303, '0711200000', '暂时保藏的油橄榄', '千克', '无', 0.09, 0, 'AB', '暂时保藏的油橄榄不适于直接食用的', '品名;品牌类型;出口享惠情况;是否适于直接食用;制作或保存方法（用盐水、二氧化硫气体、亚硫酸水或其;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44304, '0711400000', '暂时保藏的黄瓜及小黄瓜', '千克', '无', 0.09, 0, 'AB', '暂时保藏的黄瓜及小黄瓜不适于直接食用的', '品名;品牌类型;出口享惠情况;是否适于直接食用;制作或保存方法（用盐水、二氧化硫气体、亚硫酸水或其;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44305, '0711511200', '盐水白蘑菇', '千克', '无', 0.09, 0, 'AB', '盐水白蘑菇不适于直接食用的', '品名;品牌类型;出口享惠情况;是否适于直接食用;制作或保存方法（用盐水、二氧化硫气体、亚硫酸水或其;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44306, '0711511900', '盐水的其他伞菌属蘑菇', '千克', '无', 0.09, 0, 'AB', '盐水的其他伞菌属蘑菇不适于直接食用的', '品名;品牌类型;出口享惠情况;是否适于直接食用;制作或保存方法（用盐水、二氧化硫气体、亚硫酸水或其;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44307, '0711519000', '暂时保藏的其他伞菌属蘑菇', '千克', '无', 0.09, 0, 'AB', '暂时保藏的其他伞菌属蘑菇不适于直接食用的', '品名;品牌类型;出口享惠情况;是否适于直接食用;制作或保存方法（用盐水、二氧化硫气体、亚硫酸水或其;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44308, '0711591100', '盐水松茸', '千克', '无', 0.09, 0, 'EAB', '盐水松茸不适于直接食用的', '品名;品牌类型;出口享惠情况;是否适于直接食用;制作或保存方法（用盐水、二氧化硫气体、亚硫酸水或其;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44309, '0711591910', '盐水的香菇', '千克', '无', 0.09, 0, 'AB', '盐水的香菇不适于直接食用的', '品名;品牌类型;出口享惠情况;是否适于直接食用;制作或保存方法（用盐水、二氧化硫气体、亚硫酸水或其;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44310, '0711591990', '盐水的其他非伞菌属蘑菇及块菌', '千克', '无', 0.09, 0, 'AB', '盐水的其他非伞菌属蘑菇及块菌不适于直接食用的', '品名;品牌类型;出口享惠情况;是否适于直接食用;制作或保存方法（用盐水、二氧化硫气体、亚硫酸水或其;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44311, '0711599010', '暂时保藏的香菇', '千克', '无', 0.09, 0, 'AB', '暂时保藏的香菇不适于直接食用的', '品名;品牌类型;出口享惠情况;是否适于直接食用;制作或保存方法（用盐水、二氧化硫气体、亚硫酸水或其;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44312, '0711599090', '暂时保藏的蘑菇及块菌', '千克', '无', 0.09, 0, 'AB', '暂时保藏的蘑菇及块菌不适于直接食用的', '品名;品牌类型;出口享惠情况;是否适于直接食用;制作或保存方法（用盐水、二氧化硫气体、亚硫酸水或其;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44313, '0711903110', '盐水酸竹笋', '千克', '无', 0.09, 0, 'ABE', '盐水酸竹笋不适于直接食用的', '品名;品牌类型;出口享惠情况;是否适于直接食用;制作或保存方法（用盐水、二氧化硫气体、亚硫酸水或其;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44314, '0711903190', '其他盐水竹笋', '千克', '无', 0.09, 0, 'AB', '其他盐水竹笋不适于直接食用的', '品名;品牌类型;出口享惠情况;是否适于直接食用;制作或保存方法（用盐水、二氧化硫气体、亚硫酸水或其;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44315, '0711903410', '盐水简单腌制的大蒜头、大蒜瓣', '千克', '无', 0.09, 0, 'AB', '盐水简单腌制的大蒜头、大蒜瓣无论是否去皮,但不适于直接食用', '品名;品牌类型;出口享惠情况;是否适于直接食用;制作或保存方法（用盐水、二氧化硫气体、亚硫酸水或其;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44316, '0711903490', '盐水简单腌制的其他大蒜', '千克', '无', 0.09, 0, 'AB', '盐水简单腌制的其他大蒜不含蒜头、蒜瓣,无论是否去皮,但不适于直接食用', '品名;品牌类型;出口享惠情况;是否适于直接食用;制作或保存方法（用盐水、二氧化硫气体、亚硫酸水或其;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44317, '0711903900', '盐水的其他蔬菜及什锦蔬菜', '千克', '无', 0.09, 0, 'AB', '盐水的其他蔬菜及什锦蔬菜不适于直接食用的', '品名;品牌类型;出口享惠情况;是否适于直接食用;制作或保存方法（用盐水、二氧化硫气体、亚硫酸水或其;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44318, '0711909000', '暂时保藏的其他蔬菜及什锦蔬菜', '千克', '无', 0.09, 0, 'AB', '暂时保藏的其他蔬菜及什锦蔬菜不适于直接食用的', '品名;品牌类型;出口享惠情况;是否适于直接食用;制作或保存方法（用盐水、二氧化硫气体、亚硫酸水或其;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44319, '0712', '干蔬菜，整个、切块、切片、破碎或制成粉状，但未经进一步加工的', '', '', 0.00, 1, '', '', '品名;制作或保存方法(干制,包括脱水、蒸干或冻干);品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44320, '0712200000', '干制洋葱', '千克', '无', 0.00, 0, 'AB', '干制洋葱整个,切块,切片,破碎或制成粉状,但未经进一步加工的', '品名;品牌类型;出口享惠情况;制作或保存方法（干制，包括脱水、蒸干或冻干）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44321, '0712310000', '干伞菌属蘑菇', '千克', '无', 0.00, 0, 'AB', '干伞菌属蘑菇整个,切块,切片,破碎或制成粉状,但未经进一步加工的', '品名;品牌类型;出口享惠情况;制作或保存方法（干制，包括脱水、蒸干或冻干）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44322, '0712320000', '干木耳', '千克', '无', 0.00, 0, 'AB', '干木耳整个,切块,切片,破碎或制成粉状,但未经进一步加工的', '品名;品牌类型;出口享惠情况;制作或保存方法（干制，包括脱水、蒸干或冻干）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44323, '0712330000', '干银耳(白木耳)', '千克', '无', 0.00, 0, 'AB', '干银耳(白木耳)整个,切块,切片,破碎或制成粉状,但未经进一步加工的', '品名;品牌类型;出口享惠情况;制作或保存方法（干制，包括脱水、蒸干或冻干）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44324, '0712391000', '干制香菇', '千克', '无', 0.00, 0, 'AB', '干制香菇整个,切块,切片,破碎或制成粉状,但未经进一步加工的', '品名;品牌类型;出口享惠情况;制作或保存方法[干制，包括脱水、蒸干或冻干];GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:19:08');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44325, '0712392000', '干制金针菇', '千克', '无', 0.00, 0, 'AB', '干制金针菇整个,切块,切片,破碎或制成粉状,但未经进一步加工的', '品名;品牌类型;出口享惠情况;制作或保存方法（干制，包括脱水、蒸干或冻干）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44326, '0712393000', '干制草菇', '千克', '', 0.00, 0, 'AB', '干制草菇(整个,切块,切片,破碎或制成粉状,但未经进一步加工的)', '品名;制作或保存方法(干制,包括脱水、蒸干或冻干);品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44327, '0712394000', '干制口蘑', '千克', '', 0.00, 0, 'AB', '干制口蘑(整个,切块,切片,破碎或制成粉状,但未经进一步加工的)', '品名;制作或保存方法(干制,包括脱水、蒸干或冻干);品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44328, '0712395000', '干制牛肝菌', '千克', '无', 0.00, 0, 'AB', '干制牛肝菌整个,切块,切片,破碎或制成粉状,但未经进一步加工的', '品名;品牌类型;出口享惠情况;制作或保存方法（干制，包括脱水、蒸干或冻干）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44329, '0712399010', '干制松茸', '千克', '', 0.00, 0, 'ABE', '干制松茸(整个,切块,切片,破碎或制成粉状,但未经进一步加工的)', '品名;制作或保存方法(干制,包括脱水、蒸干或冻干);品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44330, '0712399090', '其他干制蘑菇及块菌', '千克', '', 0.00, 0, 'AB', '其他干制蘑菇及块菌(整个,切块,切片,破碎或制成粉状,但未经进一步加工的)', '品名;制作或保存方法(干制,包括脱水、蒸干或冻干);品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44331, '0712901010', '酸竹笋干丝', '千克', '无', 0.00, 0, 'ABE', '酸竹笋干丝', '品名;品牌类型;出口享惠情况;制作或保存方法（干制，包括脱水、蒸干或冻干）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44332, '0712901090', '其他笋干丝', '千克', '无', 0.00, 0, 'AB', '其他笋干丝', '品名;品牌类型;出口享惠情况;制作或保存方法（干制，包括脱水、蒸干或冻干）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44333, '0712902000', '紫萁(薇菜干)', '千克', '无', 0.09, 0, 'AB', '紫萁(薇菜干)整条,切段,破碎或制成粉状,但未经进一步加工的', '品名;品牌类型;出口享惠情况;制作或保存方法（干制，包括脱水、蒸干或冻干）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44334, '0712903000', '干金针菜(黄花菜)', '千克', '无', 0.09, 0, 'AB', '干金针菜(黄花菜)整条,切段,破碎或制成粉状,但未经进一步加工的', '品名;品牌类型;出口享惠情况;制作或保存方法（干制，包括脱水、蒸干或冻干）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44335, '0712904000', '蕨菜干', '千克', '无', 0.09, 0, 'AB', '蕨菜干整个,切段,破碎或制成粉状,但未经进一步加工的', '品名;品牌类型;出口享惠情况;制作或保存方法（干制，包括脱水、蒸干或冻干）;GTIN;CAS;其他', '2022-04-22 17:51:15');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44336, '0712905010', '干燥或脱水的大蒜头、大蒜瓣', '千克', '无', 0.00, 0, 'AB', '干燥或脱水的大蒜头、大蒜瓣无论是否去皮', '品名;品牌类型;出口享惠情况;制作或保存方法（干制，包括脱水、蒸干或冻干）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44337, '0712905090', '干燥或脱水的其他大蒜', '千克', '无', 0.00, 0, 'AB', '干燥或脱水的其他大蒜不含蒜头、蒜瓣,无论是否去皮', '品名;品牌类型;出口享惠情况;制作或保存方法（干制，包括脱水、蒸干或冻干）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44338, '0712909100', '干辣根', '千克', '无', 0.09, 0, 'AB', '干辣根整个,切块,切片,破碎或制成粉状,但未经进一步加工的', '品名;品牌类型;出口享惠情况;制作或保存方法（干制，包括脱水、蒸干或冻干）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44339, '0712909910', '干野生莼菜', '千克', '无', 0.00, 0, 'ABE', '干莼菜整个,切块,切片,破碎或制成粉状,但未经进一步加工的', '品名;品牌类型;出口享惠情况;制作或保存方法（干制，包括脱水、蒸干或冻干）;GTIN;CAS;其他', '2022-10-28 22:37:48');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44340, '0712909990', '干制的其他蔬菜及什锦蔬菜', '千克', '无', 0.00, 0, 'AB', '干制的其他蔬菜及什锦蔬菜整个,切块,切片,破碎或制成粉状,但未经进一步加工的', '品名;品牌类型;出口享惠情况;制作或保存方法（干制，包括脱水、蒸干或冻干）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44341, '0713', '脱荚的干豆，不论是否去皮或分瓣', '', '', 0.00, 1, '', '', '品名;制作或保存方法(干制且脱荚);品种(黄豌豆、青豌豆、白豌豆等);品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44342, '0713101000', '种用豌豆', '千克', '无', 0.00, 0, 'AB', '种用豌豆干豆，不论是否去皮或分瓣', '品名;品牌类型;出口享惠情况;制作或保存方法（干制且脱荚）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44343, '0713109000', '其他干豌豆', '千克', '无', 0.00, 0, 'AB', '其他干豌豆不论是否去皮或分瓣', '品名;品牌类型;出口享惠情况;制作或保存方法（干制且脱荚）;品种（黄豌豆、青豌豆、白豌豆等）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44344, '0713201000', '种用干鹰嘴豆', '千克', '无', 0.09, 0, 'AB', '种用干鹰嘴豆不论是否去皮或分瓣', '品名;品牌类型;出口享惠情况;制作或保存方法（干制且脱荚）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44345, '0713209000', '其他干鹰嘴豆', '千克', '无', 0.09, 0, 'AB', '其他干鹰嘴豆不论是否去皮或分瓣', '品名;品牌类型;出口享惠情况;制作或保存方法（干制且脱荚）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44346, '0713311000', '种用干绿豆', '千克', '无', 0.09, 0, 'AB', '种用干绿豆不论是否去皮或分瓣', '品名;品牌类型;出口享惠情况;制作或保存方法（干制且脱荚）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44347, '0713319000', '其他干绿豆', '千克', '无', 0.09, 0, 'AB', '其他干绿豆不论是否去皮或分瓣', '品名;品牌类型;出口享惠情况;制作或保存方法（干制且脱荚）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44348, '0713321000', '种用红小豆（赤豆）', '千克', '无', 0.09, 0, 'AB', '种用红小豆（赤豆）不论是否去皮或分瓣', '品名;品牌类型;出口享惠情况;制作或保存方法（干制且脱荚）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44349, '0713329000', '其他干赤豆', '千克', '无', 0.09, 0, 'AB', '其他干赤豆不论是否去皮或分瓣', '品名;品牌类型;出口享惠情况;制作或保存方法（干制且脱荚）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44350, '0713331000', '种用芸豆', '千克', '无', 0.00, 0, 'AB', '种用芸豆干豆，不论是否去皮或分瓣', '品名;品牌类型;出口享惠情况;制作或保存方法（干制且脱荚）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44351, '0713339000', '其他干芸豆', '千克', '无', 0.00, 0, 'AB', '其他干芸豆不论是否去皮或分瓣', '品名;品牌类型;出口享惠情况;制作或保存方法（干制且脱荚）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44352, '0713340000', '干巴姆巴拉豆 ', '千克', '无', 0.09, 0, 'AB', '干巴姆巴拉豆 不论是否去皮或分瓣', '品名;品牌类型;出口享惠情况;制作或保存方法（干制且脱荚）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44353, '0713350000', '干牛豆（豇豆） ', '千克', '无', 0.09, 0, 'AB', '干牛豆（豇豆） 不论是否去皮或分瓣', '品名;品牌类型;出口享惠情况;制作或保存方法（干制且脱荚）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44354, '0713390000', '其他干豇豆属及菜豆属 ', '千克', '无', 0.00, 0, 'AB', '其他干豇豆属及菜豆属 不论是否去皮或分瓣', '品名;品牌类型;出口享惠情况;制作或保存方法（干制且脱荚）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44355, '0713401000', '种用干扁豆', '千克', '无', 0.00, 0, 'AB', '种用干扁豆不论是否去皮或分瓣', '品名;品牌类型;出口享惠情况;制作或保存方法（干制且脱荚）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44356, '0713409000', '其他干扁豆', '千克', '无', 0.00, 0, 'AB', '其他干扁豆不论是否去皮或分瓣', '品名;品牌类型;出口享惠情况;制作或保存方法（干制且脱荚）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44357, '0713501000', '种用蚕豆', '千克', '无', 0.09, 0, 'AB', '种用蚕豆干豆，不论是否去皮或分瓣', '品名;品牌类型;出口享惠情况;制作或保存方法（干制且脱荚）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44358, '0713509000', '其他干蚕豆', '千克', '无', 0.09, 0, 'AB', '其他干蚕豆不论是否去皮或分瓣', '品名;品牌类型;出口享惠情况;制作或保存方法（干制且脱荚）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44359, '0713601000', '种用干木豆（木豆属） ', '千克', '无', 0.09, 0, 'AB', '种用干木豆（木豆属） 不论是否去皮或分瓣', '品名;品牌类型;出口享惠情况;制作或保存方法（干制且脱荚）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44360, '0713609000', '其他干木豆（木豆属） ', '千克', '无', 0.09, 0, 'AB', '其他干木豆（木豆属） 不论是否去皮或分瓣', '品名;品牌类型;出口享惠情况;制作或保存方法（干制且脱荚）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44361, '0713901000', '其他种用干豆', '千克', '无', 0.00, 0, 'AB', '其他种用干豆不论是否去皮或分瓣', '品名;品牌类型;出口享惠情况;制作或保存方法（干制且脱荚）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44362, '0713909000', '其他干豆', '千克', '无', 0.00, 0, 'AB', '其他干豆不论是否去皮或分瓣', '品名;品牌类型;出口享惠情况;制作或保存方法（干制且脱荚）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44363, '0714', '鲜、冷、冻或干的木薯、竹芋、兰科植物块茎、菊芋、甘薯及含有高淀粉或菊粉的类似根茎，不论是否切片或制成团粒；西谷茎髓', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜、冷、冻、干);是否种用;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44364, '0714101000', '鲜木薯', '千克', '无', 0.09, 0, '7AB', '鲜木薯不论是否切片', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44365, '0714102000', '干木薯', '千克', '无', 0.09, 0, '7AB', '干木薯不论是否切片或制成团粒', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44366, '0714103000', '冷或冻的木薯', '千克', '无', 0.09, 0, '7AB', '冷或冻的木薯不论是否切片或制成团粒', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44367, '0714201100', '鲜种用甘薯', '千克', '无', 0.00, 0, 'AB', '鲜种用甘薯', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44368, '0714201900', '其他非种用鲜甘薯', '千克', '无', 0.00, 0, 'AB', '其他非种用鲜甘薯不论是否切片', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44369, '0714202000', '干甘薯', '千克', '无', 0.00, 0, 'AB', '干甘薯不论是否切片或制成团粒', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44370, '0714203000', '冷或冻的甘薯', '千克', '无', 0.00, 0, 'AB', '冷或冻的甘薯不论是否切片或制成团粒', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44371, '0714300000', '鲜、冷、冻或干的山药 ', '千克', '无', 0.00, 0, 'AB', '鲜、冷、冻或干的山药 不论是否切片或制成团粒', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44372, '0714400001', '鲜、冷芋头（芋属） ', '千克', '无', 0.00, 0, 'AB', '鲜、冷芋头（芋属） 不论是否切片或制成团粒;芋头又称芋艿,为天南星科芋属植物。分旱芋、水芋                                     ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44373, '0714400090', '冻、干的芋头（芋属） ', '千克', '无', 0.00, 0, 'AB', '冻、干的芋头（芋属） 不论是否切片或制成团粒;芋头又称芋艿,为天南星科芋属植物。分旱芋、水芋                                     ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44374, '0714500000', '鲜、冷、冻或干的箭叶黄体芋（黄肉芋属） ', '千克', '无', 0.09, 0, 'AB', '鲜、冷、冻或干的箭叶黄体芋（黄肉芋属） 不论是否切片或制成团粒,鲜、冷、冻或干的                       ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44375, '0714901000', '鲜、冷、冻、干的荸荠', '千克', '无', 0.00, 0, 'AB', '鲜、冷、冻、干的荸荠不论是否切片或制成团粒', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44376, '0714902100', '种用藕', '千克', '无', 0.00, 0, 'AB', '种用藕不论是否去皮或分瓣', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44377, '0714902900', '鲜、冷、冻、干的非种用藕', '千克', '无', 0.00, 0, 'AB', '鲜、冷、冻、干的非种用藕不论是否切片或制成团粒', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44378, '0714909010', '鲜、冷、冻、干的兰科植物块茎', '千克', '无', 0.00, 0, 'ABFE', '鲜、冷、冻、干的兰科植物块茎', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44379, '0714909091', '含高淀粉或菊粉其他濒危类似根茎', '千克', '无', 0.00, 0, 'ABFE', '含高淀粉或菊粉其他濒危类似根茎包括西谷茎髓,不论是否切片或制成团粒,鲜、冷、冻或干的', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44380, '0714909099', '含有高淀粉或菊粉的其他类似根茎', '千克', '无', 0.00, 0, 'AB', '含有高淀粉或菊粉的其他类似根茎包括西谷茎髓,不论是否切片或制成团粒,鲜、冷、冻或干的', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冷、冻、干）;是否种用;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44381, '0801', '鲜或干的椰子、巴西果及腰果，不论是否去壳或去皮', '', '', 0.00, 1, '', '', '品名;制作或保存方法[鲜、干、未去内壳(内果皮)、去壳];是否种用;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44382, '0801110000', '干的椰子', '千克', '无', 0.09, 0, 'AB', '干的椰子不论是否去壳或去皮', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法（去内壳或未去内壳）;是否种用;种类;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44383, '0801120000', '鲜的未去内壳（内果皮）椰子 ', '千克', '无', 0.09, 0, 'AB', '鲜的未去内壳（内果皮）椰子 ', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法（去内壳或未去内壳）;是否种用;种类;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44384, '0801191000', '种用椰子', '千克', '无', 0.09, 0, 'AB', '种用椰子', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法（去内壳或未去内壳）;是否种用;种类;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44385, '0801199000', '其他鲜椰子 ', '千克', '无', 0.09, 0, 'AB', '其他鲜椰子 ', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法（去内壳或未去内壳）;是否种用;种类;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44386, '0801210000', '鲜或干的未去壳巴西果', '千克', '无', 0.09, 0, 'AB', '鲜或干的未去壳巴西果', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法（去壳或未去壳）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44387, '0801220000', '鲜或干的去壳巴西果', '千克', '无', 0.09, 0, 'AB', '鲜或干的去壳巴西果', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法（去壳或未去壳）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44388, '0801310000', '鲜或干的未去壳腰果', '千克', '无', 0.09, 0, 'AB', '鲜或干的未去壳腰果', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法（未去壳）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44389, '0801320000', '鲜或干的去壳腰果', '千克', '无', 0.09, 0, 'AB', '鲜或干的去壳腰果', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法（去壳）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44390, '0802', '鲜或干的其他坚果，不论是否去壳或去皮', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜、干、未去壳、去壳);品种;品牌;出仁率;大小(个/磅);产地;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44391, '0802110000', '鲜或干的未去壳扁桃核', '千克', '无', 0.09, 0, 'AB', '鲜或干的未去壳扁桃核', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法（去壳或未去壳）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44392, '0802120000', '鲜或干的去壳扁桃仁', '千克', '无', 0.09, 0, 'AB', '鲜或干的去壳扁桃仁', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法（去壳或未去壳）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44393, '0802210000', '鲜或干的未去壳榛子', '千克', '无', 0.09, 0, 'AB', '鲜或干的未去壳榛子', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法（去壳或未去壳）;种类;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44394, '0802220000', '鲜或干的去壳榛子', '千克', '无', 0.09, 0, 'AB', '鲜或干的去壳榛子', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法（去壳或未去壳）;种类;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44395, '0802310000', '鲜或干的未去壳核桃', '千克', '无', 0.09, 0, 'AB', '鲜或干的未去壳核桃', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法（去壳或未去壳）;种类;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44396, '0802320000', '鲜或干的去壳核桃', '千克', '无', 0.09, 0, 'AB', '鲜或干的去壳核桃', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法（去壳或未去壳）;种类;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44397, '0802411000', '鲜或干的未去壳板栗 ', '千克', '无', 0.09, 0, 'AB', '鲜或干的未去壳板栗 ', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法（去壳或未去壳）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44398, '0802419000', '鲜或干的未去壳其他栗子 ', '千克', '无', 0.09, 0, 'AB', '鲜或干的未去壳其他栗子 板栗除外', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法（去壳或未去壳）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44399, '0802421000', '鲜或干去壳板栗 ', '千克', '无', 0.09, 0, 'AB', '鲜或干去壳板栗 不论是否去皮                                 ', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法（去壳或未去壳）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44400, '0802429000', '鲜或干的去壳其他栗子', '千克', '无', 0.09, 0, 'AB', '鲜或干的去壳其他栗子不论是否去皮，板栗除外                      ', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法（去壳或未去壳）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44401, '0802510000', '鲜或干的未去壳阿月浑子果（开心果） ', '千克', '无', 0.09, 0, 'AB', '鲜或干的未去壳阿月浑子果（开心果） ', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法（去壳或未去壳）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44402, '0802520000', '鲜或干的去壳阿月浑子果（开心果） ', '千克', '无', 0.09, 0, 'AB', '鲜或干的去壳阿月浑子果（开心果） ', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法（去壳或未去壳）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44403, '0802611000', '鲜或干的种用未去壳马卡达姆坚果(夏威夷果) ', '千克', '无', 0.09, 0, 'AB', '鲜或干的种用未去壳马卡达姆坚果(夏威夷果) ', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法（去壳或未去壳）;是否种用;签约日期;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44404, '0802619000', '鲜或干的其他未去壳马卡达姆坚果(夏威夷果) ', '千克', '无', 0.09, 0, 'AB', '鲜或干的其他未去壳马卡达姆坚果(夏威夷果) ', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法（去壳或未去壳）;是否种用;签约日期;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44405, '0802620000', '鲜或干的去壳马卡达姆坚果(夏威夷果) ', '千克', '无', 0.09, 0, 'AB', '鲜或干的去壳马卡达姆坚果(夏威夷果) 不论是否去皮                                 ', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法（去壳或未去壳）;是否种用;签约日期;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44406, '0802700000', '鲜或干的可乐果（可乐果属） ', '千克', '无', 0.09, 0, 'AB', '鲜或干的可乐果（可乐果属） 不论是否去壳或去皮                                 ', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法（去壳或未去壳）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44407, '0802800001', '鲜的槟榔果 ', '千克', '无', 0.09, 0, 'AB', '鲜的槟榔果 不论是否去壳或去皮 ', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法（去壳或未去壳）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44408, '0802800090', '干的槟榔果 ', '千克', '无', 0.09, 0, 'AB', '干的槟榔果 不论是否去壳或去皮 ', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法（去壳或未去壳）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44409, '0802902000', '鲜或干的白果', '千克', '无', 0.09, 0, 'ABE', '鲜或干的白果不论是否去壳或去皮', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法[去壳或未去壳];GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:19:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44410, '0802903010', '鲜或干的红松子仁', '千克', '无', 0.09, 0, 'ABE', '鲜或干的红松子仁', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法[去壳或未去壳];GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:19:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44411, '0802903020', '鲜或干的其他濒危松子仁', '千克', '无', 0.00, 0, 'ABEF', '鲜或干的其他濒危松子仁', '品牌类型; 出口享惠情况;  制作或保存方法(鲜、干、未去壳、去壳);GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44412, '0802903090', '鲜或干的其他松子仁', '千克', '无', 0.09, 0, 'AB', '鲜或干的其他松子仁', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法[去壳或未去壳];GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:19:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44413, '0802909010', '鲜或干的榧子、红松子', '千克', '无', 0.09, 0, 'ABE', '鲜或干的榧子、红松子不论是否去壳或去皮', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法[去壳或未去壳];GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:19:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44414, '0802909020', '鲜或干的其他濒危松子', '千克', '无', 0.00, 0, 'ABEF', '鲜或干的其他濒危松子(不论是否去壳或去皮)', '品牌类型; 出口享惠情况;  制作或保存方法(鲜、干、未去壳、去壳);GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44415, '0802909030', '鲜或干的巨籽棕（海椰子）果仁', '千克', '无', 0.09, 0, 'ABEF', '鲜或干的巨籽棕（海椰子）果仁', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法[去壳或未去壳];GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:19:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44416, '0802909040', '鲜或干的碧根果', '千克', '无', 0.09, 0, 'AB', '鲜或干的碧根果不论是否去壳或去皮', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法[去壳或未去壳];GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:19:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44417, '0802909090', '鲜或干的其他坚果', '千克', '无', 0.09, 0, 'AB', '鲜或干的其他坚果不论是否去壳或去皮', '品名;品牌类型;出口享惠情况;制作或保存方法;加工方法[去壳或未去壳];GTIN;CAS;其他[非必报要素，请根据实际情况填报];', '2021-07-31 21:19:14');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44418, '0803', '鲜或干的香蕉，包括芭蕉', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜、干);干制方法(脱水、蒸干或冻干);种类(大香蕉、蕉仔、皇帝蕉等);等级(A级、B级、C级等);品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44419, '0803100000', '鲜或干的芭蕉 ', '千克', '无', 0.09, 0, 'AB', '鲜或干的芭蕉 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、干）;干制方法（脱水、蒸干或冻干）;种类（大香蕉、蕉仔、皇帝蕉等）;等级（A级、B级、C级等）;品牌（中文或外文名称）;注册厂商;每箱把数（如;把/箱）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44420, '0803900000', '鲜或干的香蕉 ', '千克', '无', 0.09, 0, 'AB', '鲜或干的香蕉 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、干）;干制方法（脱水、蒸干或冻干）;种类（大香蕉、蕉仔、皇帝蕉等）;等级（A级、B级、C级等）;品牌（中文或外文名称）;注册厂商;每箱把数（如;把/箱）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44421, '0804', '鲜或干的椰枣、无花果、菠萝、鳄梨、番石榴、芒果及山竹果', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜、干);种类(如青菠萝、金菠萝等);等级;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44422, '0804100000', '鲜或干的椰枣', '千克', '无', 0.09, 0, 'AB', '鲜或干的椰枣', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、干）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44423, '0804200000', '鲜或干的无花果', '千克', '无', 0.09, 0, 'AB', '鲜或干的无花果', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、干）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44424, '0804300001', '鲜菠萝', '千克', '无', 0.09, 0, 'AB', '鲜菠萝', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、干）;种类（如青菠萝、金菠萝等）;等级;去除果冠请注明;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44425, '0804300090', '干菠萝', '千克', '无', 0.09, 0, 'AB', '干菠萝', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、干）;种类（如青菠萝、金菠萝等）;等级;去除果冠请注明;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44426, '0804400000', '鲜或干的鳄梨', '千克', '无', 0.09, 0, 'AB', '鲜或干的鳄梨', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、干）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44427, '0804501001', '鲜番石榴', '千克', '无', 0.09, 0, 'AB', '鲜番石榴', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、干）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44428, '0804501090', '干番石榴', '千克', '无', 0.09, 0, 'AB', '干番石榴', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、干）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44429, '0804502001', '鲜芒果', '千克', '无', 0.09, 0, 'AB', '鲜芒果', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、干）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44430, '0804502090', '干芒果', '千克', '无', 0.09, 0, 'AB', '干芒果', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、干）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44431, '0804503000', '鲜或干的山竹果', '千克', '无', 0.09, 0, 'AB', '鲜或干的山竹果', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、干）;等级（如;A、;A、统级等）;种类（如油竹、花竹和沙竹等）;品牌（中文或外文名称）;注册厂商;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44432, '0805', '鲜或干的柑桔属水果', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜、干);种类(如脐橙、夏橙等);等级;品牌;鲜橙请注明包装规格(如88只/箱等);', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44433, '0805100000', '鲜或干的橙', '千克', '无', 0.09, 0, 'AB', '鲜或干的橙', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、干）;种类（如脐橙、夏橙等）;等级（如一级、二级等）;品牌（中文或外文名称）;注册厂商;每箱个数（如;个/箱）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44434, '0805201000', '鲜或干的蕉柑', '千克', '', 0.05, 0, 'AB', '鲜或干的蕉柑', '品名;制作或保存方法(鲜、干);等级;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44435, '0805202000', '鲜或干的阔叶柑橘', '千克', '', 0.05, 0, 'AB', '鲜或干的阔叶柑橘', '品名;制作或保存方法(鲜、干);等级;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44436, '0805209000', '鲜或干的柑橘及杂交柑橘', '千克', '', 0.05, 0, 'AB', '鲜或干的柑橘及杂交柑橘', '品名;制作或保存方法(鲜、干);等级;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44437, '0805400001', '鲜葡萄柚,包括鲜柚', '千克', '无', 0.06, 0, 'AB', '鲜葡萄柚,包括鲜柚', '品牌类型; 出口享惠情况;  制作或保存方法(鲜、干）;等级;GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44438, '0805400090', '干的葡萄柚及柚', '千克', '无', 0.09, 0, 'AB', '干的葡萄柚及柚 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、干）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44439, '0805500000', '鲜或干的柠檬及酸橙', '千克', '无', 0.09, 0, 'AB', '鲜或干的柠檬及酸橙', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、干）;等级;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44440, '0805900000', '鲜或干的其他柑橘属水果', '千克', '无', 0.09, 0, 'AB', '鲜或干的其他柑橘属水果', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、干）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44441, '0806', '鲜或干的葡萄', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜);种类;等级;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44442, '0806100000', '鲜葡萄', '千克', '无', 0.09, 0, 'AB', '鲜葡萄', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;种类;规格;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44443, '0806200000', '葡萄干', '千克', '无', 0.09, 0, 'AB', '葡萄干', '品名;品牌类型;出口享惠情况;制作或保存方法（干）;等级;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44444, '0807', '鲜的甜瓜（包括西瓜）及木瓜', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜);等级;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44445, '0807110000', '鲜西瓜', '千克', '无', 0.09, 0, 'AB', '鲜西瓜', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;等级;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44446, '0807191000', '鲜哈密瓜', '千克', '无', 0.09, 0, 'AB', '鲜哈密瓜', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44447, '0807192000', '鲜罗马甜瓜及加勒比甜瓜', '千克', '无', 0.09, 0, 'AB', '鲜罗马甜瓜及加勒比甜瓜', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44448, '0807199000', '其他鲜甜瓜', '千克', '无', 0.09, 0, 'AB', '其他鲜甜瓜', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44449, '0807200000', '鲜番木瓜', '千克', '无', 0.09, 0, 'AB', '鲜番木瓜', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;等级;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44450, '0808', '鲜的苹果、梨及榅桲', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜);种类(蛇果、加纳果、青苹果、富士等);等级;品牌;大小;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44451, '0808100000', '鲜苹果', '千克', '无', 0.09, 0, 'AB', '鲜苹果', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;种类（蛇果、加纳果、青苹果、富士等）;等级;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44452, '0808301000', '鲜鸭梨及雪梨 ', '千克', '无', 0.09, 0, 'AB', '鲜鸭梨及雪梨 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44453, '0808302000', '鲜香梨 ', '千克', '无', 0.09, 0, 'AB', '鲜香梨 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44454, '0808309000', '其他鲜梨', '千克', '无', 0.09, 0, 'AB', '其他鲜梨', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44455, '0808400000', '鲜榅桲 ', '千克', '无', 0.09, 0, 'AB', '鲜榅桲 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44456, '0809', '鲜的杏、樱桃、桃（包括油桃）、梅及李', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜);等级;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44457, '0809100000', '鲜杏', '千克', '无', 0.06, 0, 'AB', '鲜杏', '品牌类型; 出口享惠情况;  制作或保存方法(鲜）;等级;GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44458, '0809210000', '鲜欧洲酸樱桃 ', '千克', '无', 0.09, 0, 'AB', '鲜欧洲酸樱桃 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44459, '0809290000', '其他鲜樱桃 ', '千克', '无', 0.09, 0, 'AB', '其他鲜樱桃 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;等级;种类（如Bing,lambert,Van,Tulare,Chelan,Tieton,Skee;品牌（中文或外文名称）;注册厂商;尺寸（按果径最大处以毫米为单位计算）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44460, '0809300000', '鲜桃,包括鲜油桃', '千克', '无', 0.09, 0, 'AB', '鲜桃,包括鲜油桃', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44461, '0809400001', '鲜梅', '千克', '无', 0.06, 0, 'AB', '鲜梅', '品牌类型; 出口享惠情况;  制作或保存方法(鲜）;等级;GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44462, '0809400090', '其他鲜李子及黑刺李', '千克', '无', 0.09, 0, 'AB', '其他鲜李子及黑刺李 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44463, '0810', '其他鲜果', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜);等级;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44464, '0810100000', '鲜草莓', '千克', '无', 0.09, 0, 'AB', '鲜草莓', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44465, '0810200000', '鲜的木莓、黑莓、桑椹及罗甘莓', '千克', '无', 0.09, 0, 'AB', '鲜的木莓、黑莓、桑椹及罗甘莓', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44466, '0810300000', '鲜的黑、白或红的穗醋栗(加仑子)及醋栗 ', '千克', '无', 0.09, 0, 'AB', '鲜的黑、白或红的穗醋栗(加仑子)及醋栗 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44467, '0810400000', '鲜蔓越橘、越橘及其他越橘属植物果实', '千克', '无', 0.00, 0, 'AB', '鲜蔓越橘、越橘及其他越橘属植物果实 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;等级;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44468, '0810500000', '鲜猕猴桃', '千克', '无', 0.09, 0, 'AB', '鲜猕猴桃', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;种类（Hayward,Hort;A,SunGold,Jintao,Sorelli，;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44469, '0810600000', '鲜榴莲', '千克', '无', 0.09, 0, 'AB', '鲜榴莲', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;等级（如一级等）;种类（如金枕、干尧、青尼等）;品牌（中文或外文名称）;注册厂商;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44470, '0810700000', '鲜柿子 ', '千克', '无', 0.09, 0, 'AB', '鲜柿子 ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44471, '0810901000', '鲜荔枝', '千克', '无', 0.09, 0, 'AB', '鲜荔枝', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44472, '0810903000', '鲜龙眼', '千克', '无', 0.09, 0, 'AB', '鲜龙眼', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44473, '0810904000', '鲜红毛丹', '千克', '无', 0.09, 0, 'AB', '鲜红毛丹', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44474, '0810905000', '鲜蕃荔枝', '千克', '无', 0.09, 0, 'AB', '鲜蕃荔枝', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44475, '0810906000', '鲜杨桃', '千克', '无', 0.09, 0, 'AB', '鲜杨桃', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44476, '0810907000', '鲜莲雾', '千克', '无', 0.09, 0, 'AB', '鲜莲雾', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44477, '0810908000', '鲜火龙果', '千克', '无', 0.09, 0, 'AB', '鲜火龙果', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;等级;种类;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44478, '0810909001', '鲜枣', '千克', '无', 0.09, 0, 'AB', '鲜枣', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44479, '0810909002', '鲜枇杷', '千克', '无', 0.09, 0, 'AB', '鲜枇杷', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44480, '0810909010', '鲜的翅果油树果', '千克', '无', 0.09, 0, 'ABE', '鲜的翅果油树果', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44481, '0810909090', '其他鲜果', '千克', '无', 0.09, 0, 'AB', '其他鲜果', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44482, '0811', '冷冻水果及坚果，不论是否蒸煮，加糖或其他甜物质', '', '', 0.00, 1, '', '', '品名;制作或保存方法(冻,未去壳);品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44483, '0811100000', '冷冻草莓', '千克', '无', 0.09, 0, 'AB', '冷冻草莓', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44484, '0811200000', '冷冻木莓、黑莓、桑椹、 罗甘莓、黑、白或红的穗醋栗（加仑子）及醋栗 ', '千克', '无', 0.09, 0, 'AB', '冷冻木莓、黑莓、桑椹、 罗甘莓、黑、白或红的穗醋栗（加仑子）及醋栗 ', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44485, '0811901000', '未去壳的冷冻栗子', '千克', '无', 0.09, 0, 'AB', '未去壳的冷冻栗子', '品名;品牌类型;出口享惠情况;制作或保存方法（冻,未去壳）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44486, '0811909010', '冷冻的白果', '千克', '无', 0.09, 0, 'ABE', '冷冻的白果', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44487, '0811909021', '冷冻的野生红松子', '千克', '无', 0.09, 0, 'ABE', '冷冻的红松子不论是否去壳或去皮', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;GTIN;CAS;其他', '2022-10-28 22:37:49');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44488, '0811909022', '冷冻的其他濒危松子', '千克', '无', 0.00, 0, 'ABEF', '冷冻的其他濒危松子不论是否去壳或去皮', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44489, '0811909030', '冷冻的野生榧子', '千克', '无', 0.09, 0, 'ABE', '冷冻的榧子', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;GTIN;CAS;其他', '2022-10-28 22:37:49');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44490, '0811909040', '冷冻的翅果油树果', '千克', '无', 0.09, 0, 'ABE', '冷冻的翅果油树果', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44491, '0811909050', '冷冻的巨籽棕（海椰子）果仁', '千克', '无', 0.09, 0, 'ABEF', '冷冻的巨籽棕（海椰子）果仁', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44492, '0811909090', '其他未列名冷冻水果及坚果', '千克', '无', 0.09, 0, 'AB', '其他未列名冷冻水果及坚果', '品名;品牌类型;出口享惠情况;制作或保存方法（冻）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44493, '0812', '暂时保藏（例如，使用二氧化硫气体、盐水、亚硫酸水或其他防腐液）的水果及坚果，但不适于直接食用的', '', '', 0.00, 1, '', '', '品名;用途(不适于直接食用);制作或保存方法(用盐水、二氧化硫气体、亚硫酸水或其;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44494, '0812100000', '暂时保藏的樱桃', '千克', '无', 0.09, 0, 'AB', '暂时保藏的樱桃但不适于直接食用的', '品名;品牌类型;出口享惠情况;是否适于直接食用;制作或保存方法（用盐水、二氧化硫气体、亚硫酸水或其;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44495, '0812900010', '暂时保存的白果', '千克', '无', 0.10, 0, 'ABE', '暂时保存的白果(用二氧化硫气体,盐水等物质处理,但不适于直接食用的)', '品牌类型; 出口享惠情况;  是否适于直接食用;制作或保存方法(用盐水、二氧化硫气体、亚硫酸水或其;GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44496, '0812900021', '暂时保存的红松子', '千克', '无', 0.10, 0, 'ABE', '暂时保存的红松子(用二氧化硫气体,盐水等物质处理,但不适于直接食用的)', '品牌类型; 出口享惠情况;  是否适于直接食用;制作或保存方法(用盐水、二氧化硫气体、亚硫酸水或其;GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44497, '0812900022', '暂时保存的其他濒危松子', '千克', '无', 0.00, 0, 'ABEF', '暂时保存的其他濒危松子(用二氧化硫气体,盐水等物质处理,但不适于直接食用的)', '品牌类型; 出口享惠情况;  是否适于直接食用;制作或保存方法(用盐水、二氧化硫气体、亚硫酸水或其;GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44498, '0812900030', '暂时保存的榧子', '千克', '无', 0.10, 0, 'ABE', '暂时保存的榧子(用二氧化硫气体,盐水等物质处理,但不适于直接食用的)', '品牌类型; 出口享惠情况;  是否适于直接食用;制作或保存方法(用盐水、二氧化硫气体、亚硫酸水或其;GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44499, '0812900040', '暂时保存的翅果油树果', '千克', '无', 0.10, 0, 'ABE', '暂时保存的翅果油树果(用二氧化硫气体,盐水等物质处理,但不适于直接食用的)', '品牌类型; 出口享惠情况;  是否适于直接食用;制作或保存方法(用盐水、二氧化硫气体、亚硫酸水或其;GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44500, '0812900050', '暂时保存的巨籽棕（海椰子）果仁', '千克', '无', 0.10, 0, 'ABEF', '暂时保存的巨籽棕（海椰子）果仁(用二氧化硫气体,盐水等物质处理,但不适于直接食用的)', '品牌类型; 出口享惠情况;  是否适于直接食用;制作或保存方法(用盐水、二氧化硫气体、亚硫酸水或其;GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44501, '0812900090', '暂时保存的其他水果及坚果', '千克', '无', 0.09, 0, 'AB', '暂时保存的其他水果及坚果但不适于直接食用的', '品名;品牌类型;出口享惠情况;是否适于直接食用;制作或保存方法（用盐水、二氧化硫气体、亚硫酸水或其;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44502, '0813', '品目0801至0806以外的干果；本章的什锦坚果或干果', '', '', 0.00, 1, '', '', '品名;制作或保存方法(干);品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44503, '0813100000', '杏干', '千克', '无', 0.09, 0, 'AB', '杏干品目0801至0806的干果除外', '品名;品牌类型;出口享惠情况;制作或保存方法（干）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44504, '0813200000', '梅干及李干', '千克', '无', 0.09, 0, 'AB', '梅干及李干品目0801至0806的干果除外', '品名;品牌类型;出口享惠情况;制作或保存方法（干）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44505, '0813300000', '苹果干', '千克', '无', 0.09, 0, 'AB', '苹果干品目0801至0806的干果除外', '品名;品牌类型;出口享惠情况;制作或保存方法（干）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44506, '0813401000', '龙眼干、肉', '千克', '无', 0.09, 0, 'AB', '龙眼干、肉品目0801至0806的干果除外', '品名;品牌类型;出口享惠情况;制作或保存方法（干）;等级;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44507, '0813402000', '柿饼', '千克', '无', 0.09, 0, 'AB', '柿饼品目0801至0806的干果除外', '品名;品牌类型;出口享惠情况;制作或保存方法（干）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44508, '0813403000', '干红枣', '千克', '无', 0.09, 0, 'AB', '干红枣品目0801至0806的干果除外', '品名;品牌类型;出口享惠情况;制作或保存方法（干）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44509, '0813404000', '荔枝干', '千克', '无', 0.09, 0, 'AB', '荔枝干品目0801至0806的干果除外', '品名;品牌类型;出口享惠情况;制作或保存方法（干）;加工程度（去壳、未去壳）;GTIN;CAS;其他', '2022-04-22 17:51:16');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44510, '0813409010', '翅果油树干果', '千克', '无', 0.09, 0, 'ABE', '翅果油树干果', '品名;品牌类型;出口享惠情况;制作或保存方法（干）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44511, '0813409090', '其他干果', '千克', '无', 0.09, 0, 'AB', '其他干果品目0801至0806的干果除外', '品名;品牌类型;出口享惠情况;制作或保存方法（干）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44512, '0813500000', '本章的什锦坚果或干果', '千克', '无', 0.09, 0, 'AB', '本章的什锦坚果或干果品目0801至0806的干果除外', '品名;品牌类型;出口享惠情况;制作或保存方法（干）;种类;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44513, '0814', '柑桔属水果或甜瓜（包括西瓜）的果皮，鲜、冻、干或用盐水、亚硫酸水或其他防腐液暂时保藏的', '', '', 0.00, 1, '', '', '品名;制作或保存方法(鲜、冻、干,用盐水、亚硫酸水或其他防;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44514, '0814000000', '柑橘属水果或甜瓜(包括西瓜)的果皮 ', '千克', '无', 0.09, 0, 'AB', '柑橘属水果或甜瓜(包括西瓜)的果皮 仅包括鲜、冻、干或暂时保藏的                       ', '品名;品牌类型;出口享惠情况;制作或保存方法（鲜、冻、干,用盐水、亚硫酸水或其他;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44515, '0901', '咖啡，不论是否焙炒或浸除咖啡碱；咖啡豆荚及咖啡豆皮；含咖啡的咖啡代用品', '', '', 0.00, 1, '', '', '品名;制作或保存方法(豆、粉等、未焙炒且未浸除咖啡碱);品种;产区;咖啡品种;报清咖啡豆/粉(若为咖啡粉需注明加工工艺);品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44516, '0901110000', '未浸除咖啡碱的未焙炒咖啡', '千克', '无', 0.09, 0, 'AB', '未浸除咖啡碱的未焙炒咖啡', '品名;品牌类型;出口享惠情况;制作或保存方法（豆、粉等，未焙炒且未浸除咖啡碱）;品种;产区;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44517, '0901120000', '已浸除咖啡碱的未焙炒咖啡', '千克', '无', 0.09, 0, 'AB', '已浸除咖啡碱的未焙炒咖啡', '品名;品牌类型;出口享惠情况;制作或保存方法（豆、粉等，未焙炒且已浸除咖啡碱）;品种;产区;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44518, '0901210000', '未浸除咖啡碱的已焙炒咖啡', '千克', '无', 0.13, 0, 'AB', '未浸除咖啡碱的已焙炒咖啡', '品名;品牌类型;出口享惠情况;制作或保存方法（豆、粉等，已焙炒且未浸除咖啡碱）;品种;产区;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44519, '0901220000', '已浸除咖啡碱的已焙炒咖啡', '千克', '无', 0.13, 0, 'AB', '已浸除咖啡碱的已焙炒咖啡', '品名;品牌类型;出口享惠情况;制作或保存方法（豆、粉等，已焙炒且已浸除咖啡碱）;品种;产区;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44520, '0901901000', '咖啡豆荚及咖啡豆皮', '千克', '无', 0.09, 0, 'AB', '咖啡豆荚及咖啡豆皮', '品名;品牌类型;出口享惠情况;种类（咖啡豆荚或豆皮）;品种;产区;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44521, '0901902000', '含咖啡的咖啡代用品', '千克', '无', 0.13, 0, 'AB', '含咖啡的咖啡代用品', '品名;品牌类型;出口享惠情况;成分;品种;产区;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44522, '0902', '茶，不论是否加香料', '', '', 0.00, 1, '', '', '品名;制作或保存方法(未发酵、半发酵、发酵);内包装每件净重;品牌;成分;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44523, '0902101000', '每件净重不超过3千克的花茶', '千克', '无', 0.09, 0, 'AB', '每件净重不超过3千克的花茶未发酵的,净重指内包装', '品名;品牌类型;出口享惠情况;制作或保存方法（未发酵、半发酵、发酵）;内包装每件净重;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44524, '0902109000', '每件净重不超过3千克的其他绿茶', '千克', '无', 0.09, 0, 'AB', '每件净重不超过3千克的其他绿茶未发酵的,净重指内包装', '品名;品牌类型;出口享惠情况;制作或保存方法（未发酵、半发酵、发酵）;内包装每件净重;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44525, '0902201000', '每件净重超过3千克的花茶', '千克', '无', 0.09, 0, 'AB', '每件净重超过3千克的花茶未发酵的,净重指内包装', '品名;品牌类型;出口享惠情况;制作或保存方法（未发酵、半发酵、发酵）;内包装每件净重;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44526, '0902209000', '每件净重超过3千克的其他绿茶', '千克', '无', 0.09, 0, 'AB', '每件净重超过3千克的其他绿茶未发酵的,净重指内包装', '品名;品牌类型;出口享惠情况;制作或保存方法（未发酵、半发酵、发酵）;内包装每件净重;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44527, '0902301000', '每件净重不超过3千克的乌龙茶', '千克', '无', 0.09, 0, 'AB', '每件净重不超过3千克的乌龙茶净重指内包装', '品名;品牌类型;出口享惠情况;制作或保存方法（未发酵、半发酵、发酵）;内包装每件净重;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44528, '0902302000', '每件净重不超过3千克的普洱茶', '千克', '无', 0.16, 0, 'AB', '每件净重不超过3千克的普洱茶(净重指内包装)', '品牌类型; 出口享惠情况;  制作或保存方法(未发酵、半发酵、发酵);内包装每件净重;品牌;GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44529, '0902309000', '红茶内包装每件净重不超过3千克', '千克', '无', 0.09, 0, 'AB', '红茶内包装每件净重不超过3千克包括其他部分发酵茶', '品名;品牌类型;出口享惠情况;制作或保存方法（未发酵、半发酵、发酵）;内包装每件净重;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44530, '0902401000', '每件净重超过3千克的乌龙茶', '千克', '无', 0.09, 0, 'AB', '每件净重超过3千克的乌龙茶净重指内包装', '品名;品牌类型;出口享惠情况;制作或保存方法（未发酵、半发酵、发酵）;内包装每件净重;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44531, '0902402000', '每件净重超过3千克的普洱茶', '千克', '无', 0.16, 0, 'AB', '每件净重超过3千克的普洱茶(净重指内包装)', '品牌类型; 出口享惠情况;  制作或保存方法(未发酵、半发酵、发酵);内包装每件净重;品牌;GTIN;CAS;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44532, '0902409000', '红茶(内包装每件净重超过3千克)', '千克', '无', 0.09, 0, 'AB', '红茶(内包装每件净重超过3千克)包括其他部分发酵茶', '品名;品牌类型;出口享惠情况;制作或保存方法（未发酵、半发酵、发酵）;内包装每件净重;品牌（中文或外文名称）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44533, '0903', '马黛茶', '', '', 0.00, 1, '', '', '品名;品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44534, '0903000000', '马黛茶', '千克', '无', 0.13, 0, 'AB', '马黛茶', '品名;品牌类型;出口享惠情况;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44535, '0904', '胡椒；辣椒干及辣椒粉', '', '', 0.00, 1, '', '', '品名;制作或保存方法(未磨、已磨、干、粉);品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44536, '0904110010', '毕拨', '千克', '无', 0.09, 0, 'QAB', '毕拨', '品名;品牌类型;出口享惠情况;制作和保存方法（未磨、已磨；干、粉）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44537, '0904110090', '未磨胡椒', '千克', '无', 0.09, 0, 'AB', '未磨胡椒毕拨除外', '品名;品牌类型;出口享惠情况;制作和保存方法（未磨、已磨；干、粉）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44538, '0904120000', '已磨胡椒', '千克', '无', 0.13, 0, 'AB', '已磨胡椒', '品名;品牌类型;出口享惠情况;制作和保存方法（未磨、已磨；干、粉）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44539, '0904210000', '干且未磨辣椒 ', '千克', '无', 0.00, 0, 'AB', '干且未磨辣椒 ', '品名;品牌类型;出口享惠情况;制作和保存方法（未磨、已磨；干、粉）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44540, '0904220000', '已磨辣椒 ', '千克', '无', 0.09, 0, 'AB', '已磨辣椒 ', '品名;品牌类型;出口享惠情况;制作和保存方法（未磨、已磨；干、粉）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44541, '0905', '香子兰豆', '', '', 0.00, 1, '', '', '品名;加工方法(未磨、已磨);', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44542, '0905100000', '未磨的香子兰豆 ', '千克', '无', 0.09, 0, 'AB', '未磨的香子兰豆 ', '品名;品牌类型;出口享惠情况;加工方法（未磨、已磨）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44543, '0905200000', '已磨的香子兰豆 ', '千克', '无', 0.09, 0, 'AB', '已磨的香子兰豆 ', '品名;品牌类型;出口享惠情况;加工方法（未磨、已磨）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44544, '0906', '肉桂及肉桂花', '', '', 0.00, 1, '', '', '品名;加工方法(未磨、已磨);品牌;', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44545, '0906110000', '未磨锡兰肉桂', '千克', '无', 0.09, 0, 'AB', '未磨锡兰肉桂', '品名;品牌类型;出口享惠情况;加工方法（未磨、已磨）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44546, '0906190000', '其他未磨肉桂及肉桂花', '千克', '无', 0.09, 0, 'AB', '其他未磨肉桂及肉桂花', '品名;品牌类型;出口享惠情况;加工方法（未磨、已磨）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44547, '0906200000', '已磨肉桂及肉桂花', '千克', '无', 0.13, 0, 'QAB', '已磨肉桂及肉桂花', '品名;品牌类型;出口享惠情况;加工方法（未磨、已磨）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44548, '0907', '丁香（母丁香、公丁香及丁香梗）', '', '', 0.00, 1, '', '', '品名;加工方法(未磨、已磨);', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44549, '0907100000', '未磨的丁香(母丁香、公丁香及丁香梗) ', '千克', '无', 0.09, 0, 'QAB', '未磨的丁香(母丁香、公丁香及丁香梗) ', '品名;品牌类型;出口享惠情况;加工方法（未磨、已磨）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44550, '0907200000', '已磨的丁香(母丁香、公丁香及丁香梗) ', '千克', '无', 0.09, 0, 'QAB', '已磨的丁香(母丁香、公丁香及丁香梗) ', '品名;品牌类型;出口享惠情况;加工方法（未磨、已磨）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44551, '0908', '肉豆蔻、肉豆蔻衣及豆蔻', '', '', 0.00, 1, '', '', '品名;加工方法(未磨、已磨);', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44552, '0908110000', '未磨的肉豆蔻 ', '千克', '无', 0.09, 0, 'QABE', '未磨的肉豆蔻 ', '品名;品牌类型;出口享惠情况;加工方法（未磨、已磨）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44553, '0908120000', '已磨的肉豆蔻 ', '千克', '无', 0.09, 0, 'QABE', '已磨的肉豆蔻 ', '品名;品牌类型;出口享惠情况;加工方法（未磨、已磨）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44554, '0908210000', '未磨的肉豆蔻衣 ', '千克', '无', 0.09, 0, 'ABE', '未磨的肉豆蔻衣 ', '品名;品牌类型;出口享惠情况;加工方法（未磨、已磨）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44555, '0908220000', '已磨的肉豆蔻衣 ', '千克', '无', 0.09, 0, 'ABE', '已磨的肉豆蔻衣 ', '品名;品牌类型;出口享惠情况;加工方法（未磨、已磨）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44556, '0908310000', '未磨的豆蔻 ', '千克', '无', 0.09, 0, 'QABE', '未磨的豆蔻 ', '品名;品牌类型;出口享惠情况;加工方法（未磨、已磨）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44557, '0908320000', '已磨的豆蔻 ', '千克', '无', 0.13, 0, 'QABE', '已磨的豆蔻 ', '品名;品牌类型;出口享惠情况;加工方法（未磨、已磨）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44558, '0909', '茴芹子、八角茴香、小茴香子、芫荽子、枯茗子及蒿子；杜松果', '', '', 0.00, 1, '', '', '品名;加工方法(未磨、已磨);', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44559, '0909210000', '未磨的芫荽子 ', '千克', '无', 0.09, 0, 'AB', '未磨的芫荽子 ', '品名;品牌类型;出口享惠情况;加工方法（未磨、已磨）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44560, '0909220000', '已磨的芫荽子 ', '千克', '无', 0.13, 0, 'AB', '已磨的芫荽子 ', '品名;品牌类型;出口享惠情况;加工方法（未磨、已磨）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44561, '0909310000', '未磨的枯茗子 ', '千克', '无', 0.09, 0, 'AB', '未磨的枯茗子 ', '品名;品牌类型;出口享惠情况;加工方法（未磨、已磨）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44562, '0909320000', '已磨的枯茗子 ', '千克', '无', 0.13, 0, 'AB', '已磨的枯茗子 ', '品名;品牌类型;出口享惠情况;加工方法（未磨、已磨）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44563, '0909611000', '未磨的八角茴香 ', '千克', '无', 0.09, 0, 'QAB', '未磨的八角茴香 ', '品名;品牌类型;出口享惠情况;加工方法（未磨、已磨）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44564, '0909619010', '未磨的小茴香子;未磨的杜松果 ', '千克', '无', 0.09, 0, 'QAB', '未磨的小茴香子;未磨的杜松果 ', '品名;品牌类型;出口享惠情况;加工方法（未磨、已磨）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44565, '0909619090', '未磨的茴芹子;未磨的页蒿子 ', '千克', '无', 0.09, 0, 'AB', '未磨的茴芹子;未磨的页蒿子 ', '品名;品牌类型;出口享惠情况;加工方法（未磨、已磨）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44566, '0909621000', '已磨的八角茴香 ', '千克', '无', 0.13, 0, 'QAB', '已磨的八角茴香 ', '品名;品牌类型;出口享惠情况;加工方法（未磨、已磨）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44567, '0909629010', '已磨的小茴香子;已磨的杜松果 ', '千克', '无', 0.13, 0, 'QAB', '已磨的小茴香子;已磨的杜松果 ', '品名;品牌类型;出口享惠情况;加工方法（未磨、已磨）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44568, '0909629090', '已磨的茴芹子;已磨的页蒿子 ', '千克', '无', 0.13, 0, 'AB', '已磨的茴芹子;已磨的页蒿子 ', '品名;品牌类型;出口享惠情况;加工方法（未磨、已磨）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44569, '0910', '姜、番红花、姜黄、麝香草、月桂叶、咖喱及其他调味香料', '', '', 0.00, 1, '', '', '品名;加工方法(未磨、已磨);', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44570, '0910110000', '未磨的姜 ', '千克', '无', 0.00, 0, 'AB', '未磨的姜 ', '品名;品牌类型;出口享惠情况;加工方法（未磨、已磨）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44571, '0910120000', '已磨的姜 ', '千克', '无', 0.09, 0, 'AB', '已磨的姜 ', '品名;品牌类型;出口享惠情况;加工方法（未磨、已磨）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44572, '0910200000', '番红花', '千克', '无', 0.09, 0, 'QAB', '番红花西红花', '品名;品牌类型;出口享惠情况;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44573, '0910300000', '姜黄', '千克', '无', 0.09, 0, 'QAB', '姜黄', '品名;品牌类型;出口享惠情况;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44574, '0910910000', '混合调味香料', '千克', '无', 0.13, 0, 'AB', '混合调味香料本章注释一(二)所述的混合物', '品名;品牌类型;出口享惠情况;成分含量;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44575, '0910990000', '其他调味香料', '千克', '无', 0.09, 0, 'AB', '其他调味香料', '品名;品牌类型;出口享惠情况;成分含量;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44576, '1001', '小麦及混合麦', '', '', 0.00, 1, '', '', '品名;是否种用;是否硬粒;种类(白麦、红麦、冬麦、春麦);', NULL);
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44577, '1001110001', '种用硬粒小麦 ', '千克', '无', 0.00, 0, '4xABty', '种用硬粒小麦 配额内', '品名;品牌类型;出口享惠情况;是否种用;是否硬粒;种类（白麦、红麦、冬麦、春麦）;有无滞期费（无滞期费、滞期费未确定、滞期费已申报）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44578, '1001110090', '种用硬粒小麦 ', '千克', '无', 0.00, 0, '4xABy', '种用硬粒小麦 配额外', '品名;品牌类型;出口享惠情况;是否种用;是否硬粒;种类（白麦、红麦、冬麦、春麦）;有无滞期费（无滞期费、滞期费未确定、滞期费已申报）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44579, '1001190001', '其他硬粒小麦 ', '千克', '无', 0.00, 0, '4xABty', '其他硬粒小麦 配额内', '品名;品牌类型;出口享惠情况;是否种用;是否硬粒;种类（白麦、红麦、冬麦、春麦）;有无滞期费（无滞期费、滞期费未确定、滞期费已申报）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44580, '1001190090', '其他硬粒小麦 ', '千克', '无', 0.00, 0, '4xABy', '其他硬粒小麦 配额外', '品名;品牌类型;出口享惠情况;是否种用;是否硬粒;种类（白麦、红麦、冬麦、春麦）;有无滞期费（无滞期费、滞期费未确定、滞期费已申报）;GTIN;CAS;其他', '2022-04-22 17:51:17');
INSERT INTO `hscode` (`id`, `code`, `productname`, `officialunit1`, `officialunit2`, `taxreturnrate`, `type`, `customsupervision`, `description`, `declarationelements`, `updatetime`) VALUES (44581, '1001910001', '其他种用小麦及混合麦 ', '千克', '无', 0.00, 0, '4xABty', '其他种用小麦及混合麦 配额内', '品名;品牌类型;出口享惠情况;是否种用;是否硬粒;种类（白麦、红麦、冬麦、春麦）;有无滞期费（无滞期费、滞期费未确定、滞期费已申报）;GTIN;CAS;其他', '2022-04-22 17:51:17');
COMMIT;

-- ----------------------------
-- Table structure for invoicer
-- ----------------------------
DROP TABLE IF EXISTS `invoicer`;
CREATE TABLE `invoicer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companyid` int(11) DEFAULT '0' COMMENT '公司ID',
  `customerid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `taxpayerid` varchar(255) NOT NULL,
  `licenseid` varchar(255) NOT NULL,
  `taxpayerconfirmdate` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `domesticsource` varchar(255) DEFAULT NULL,
  `viirate` decimal(10,2) NOT NULL DEFAULT '0.17',
  `status` tinyint(4) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `account` varchar(255) DEFAULT NULL,
  `rejectreason` varchar(255) DEFAULT NULL,
  `posbit` varchar(255) DEFAULT NULL,
  `products` varchar(255) DEFAULT NULL,
  `files` text,
  `createtor` varchar(30) DEFAULT NULL,
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=618 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of invoicer
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for noticetopic
-- ----------------------------
DROP TABLE IF EXISTS `noticetopic`;
CREATE TABLE `noticetopic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` varchar(80) DEFAULT NULL,
  `roleid` int(11) DEFAULT NULL,
  `companyid` int(11) DEFAULT NULL,
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of noticetopic
-- ----------------------------
BEGIN;
INSERT INTO `noticetopic` (`id`, `topic`, `roleid`, `companyid`, `createtime`) VALUES (125, 'TOPIC_APPROVE_PRODUCT', 21, 0, '2022-09-08 16:57:13');
INSERT INTO `noticetopic` (`id`, `topic`, `roleid`, `companyid`, `createtime`) VALUES (126, 'TOPIC_NEW_USR', 1, 0, '2022-09-08 17:10:07');
INSERT INTO `noticetopic` (`id`, `topic`, `roleid`, `companyid`, `createtime`) VALUES (128, 'TOPIC_CONFIRM_PRODUCT', 21, 0, '2022-09-08 17:36:15');
INSERT INTO `noticetopic` (`id`, `topic`, `roleid`, `companyid`, `createtime`) VALUES (129, 'TOPIC_APPROVE_PRODUCT', 20, 0, '2022-09-08 17:37:50');
INSERT INTO `noticetopic` (`id`, `topic`, `roleid`, `companyid`, `createtime`) VALUES (130, 'TOPIC_NEW_USR', 19, 0, '2022-09-08 17:38:22');
INSERT INTO `noticetopic` (`id`, `topic`, `roleid`, `companyid`, `createtime`) VALUES (131, 'TOPIC_APPROVED_PRODUCT', 20, 0, '2022-09-08 17:38:33');
INSERT INTO `noticetopic` (`id`, `topic`, `roleid`, `companyid`, `createtime`) VALUES (132, 'TOPIC_APPROVED_PRODUCT', 21, 0, '2022-09-08 17:38:34');
COMMIT;

-- ----------------------------
-- Table structure for notification
-- ----------------------------
DROP TABLE IF EXISTS `notification`;
CREATE TABLE `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notificationid` int(11) DEFAULT '0',
  `receiverid` int(11) DEFAULT NULL,
  `customerid` int(11) DEFAULT '0',
  `companyid` int(11) DEFAULT '0',
  `topickey` varchar(64) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `url` varchar(1000) DEFAULT NULL,
  `type` tinyint(4) DEFAULT '0' COMMENT '0 - 只读  1-操作',
  `relationid` int(11) DEFAULT NULL COMMENT '关联ID',
  `relationtb` varchar(50) DEFAULT NULL COMMENT '关联表',
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_receiverid` (`receiverid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of notification
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for operator
-- ----------------------------
DROP TABLE IF EXISTS `operator`;
CREATE TABLE `operator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1107 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of operator
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for overseas
-- ----------------------------
DROP TABLE IF EXISTS `overseas`;
CREATE TABLE `overseas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companyid` int(11) DEFAULT '0' COMMENT '公司ID',
  `customerid` int(11) DEFAULT NULL,
  `companyname` varchar(200) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `contractor` varchar(30) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `type` int(11) DEFAULT '0' COMMENT '0 : 境外贸易商, 1 :  境内收货人',
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=379 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of overseas
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for payer
-- ----------------------------
DROP TABLE IF EXISTS `payer`;
CREATE TABLE `payer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companyid` int(11) DEFAULT '0' COMMENT '公司ID',
  `customerid` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `createdtype` tinyint(4) DEFAULT NULL,
  `bankname` varchar(255) DEFAULT NULL,
  `account` varchar(255) DEFAULT NULL,
  `currency` varchar(20) DEFAULT NULL,
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=330 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of payer
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for payment
-- ----------------------------
DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companyid` int(11) DEFAULT '0' COMMENT '公司ID',
  `customerid` int(11) DEFAULT '0' COMMENT '客户ID',
  `projectid` int(11) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL COMMENT '货款支付:1,运费支付:2,费用支付:4,其它支付:3',
  `receivername` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `bankaccount` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `paymentdate` date DEFAULT NULL,
  `exchangerate` decimal(10,4) DEFAULT NULL,
  `receiverid` int(11) DEFAULT NULL,
  `receiver_tag` tinyint(4) DEFAULT NULL,
  `save_tag` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0' COMMENT '0-待审核，1-核准',
  `bankreceipt` varchar(255) DEFAULT NULL,
  `copysessionid` int(11) DEFAULT NULL,
  `transfer` tinyint(4) DEFAULT '0',
  `formId` varchar(32) DEFAULT NULL,
  `approvedt` datetime DEFAULT NULL COMMENT '审核日期',
  `createtor` varchar(30) DEFAULT NULL,
  `approvedid` int(11) DEFAULT NULL,
  `approvedip` varchar(255) DEFAULT NULL,
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_projectid` (`projectid`) USING BTREE,
  KEY `idx_receivername` (`receivername`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5829 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of payment
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for paymentcl
-- ----------------------------
DROP TABLE IF EXISTS `paymentcl`;
CREATE TABLE `paymentcl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companyid` int(11) DEFAULT '0' COMMENT '公司ID',
  `customerid` int(11) DEFAULT '0' COMMENT '客户ID',
  `projectid` int(11) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `receivername` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `bankaccount` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `paymentdate` date DEFAULT NULL,
  `exchangerate` decimal(10,4) DEFAULT NULL,
  `receiverid` int(11) DEFAULT NULL,
  `receiver_tag` tinyint(4) DEFAULT NULL,
  `save_tag` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0' COMMENT '0-待审核，1-核准',
  `bankreceipt` varchar(255) DEFAULT NULL,
  `copysessionid` int(11) DEFAULT NULL,
  `transfer` tinyint(4) DEFAULT '0',
  `approvedt` datetime DEFAULT NULL COMMENT '审核日期',
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_projectid` (`projectid`) USING BTREE,
  KEY `idx_receivername` (`receivername`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of paymentcl
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `customer` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `englishname` varchar(255) DEFAULT NULL,
  `usage` varchar(255) DEFAULT NULL,
  `misc` varchar(255) DEFAULT NULL,
  `taxreturnrate` decimal(10,2) DEFAULT NULL,
  `invoicerid` int(11) DEFAULT NULL,
  `hscode` varchar(255) DEFAULT NULL,
  `productid` varchar(50) DEFAULT NULL,
  `supcount` int(11) DEFAULT NULL,
  `officialamount` int(11) DEFAULT NULL,
  `officialunit` varchar(10) DEFAULT NULL,
  `productunit` varchar(255) DEFAULT NULL,
  `reason` varchar(500) DEFAULT NULL,
  `supplementinstruction` varchar(255) DEFAULT NULL,
  `customsupervision` varchar(255) DEFAULT NULL,
  `files` text,
  `type` tinyint(4) DEFAULT NULL,
  `supelement` text,
  `declarationelements` varchar(255) DEFAULT NULL,
  `companyid` int(11) DEFAULT '0',
  `customerid` int(11) DEFAULT '0',
  `isentrance` int(11) DEFAULT '0',
  `approvedt` datetime DEFAULT NULL,
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_name` (`companyid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1556596704 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for project
-- ----------------------------
DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` int(11) DEFAULT NULL,
  `companyid` int(11) DEFAULT '0' COMMENT '公司ID',
  `BusinessID` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0' COMMENT '0 : 草稿箱, 1 : 进行中, 2 : 已完成',
  `taxrefund` tinyint(4) DEFAULT '0' COMMENT '0-未申请 1-已申请 2-拒绝 3-已退税',
  `taxrefundreason` varchar(255) DEFAULT NULL COMMENT '退回原因',
  `taxrefundamount` decimal(11,4) DEFAULT '0.0000',
  `receiptstatus` tinyint(4) DEFAULT '0' COMMENT '0-未确认收齐，1-已确认收齐',
  `paymentstatus` tinyint(4) DEFAULT '0' COMMENT '0 - 未付清 1-已付清',
  `viistatus` tinyint(4) DEFAULT '0',
  `paymentclstatus` int(11) DEFAULT '0' COMMENT '成本支付情况',
  `remark` varchar(500) DEFAULT NULL COMMENT '备注',
  `rate` decimal(8,4) DEFAULT '0.0000' COMMENT '价格比率',
  `taxrefunddt` datetime DEFAULT NULL,
  `receiptdt` datetime DEFAULT NULL,
  `paymentdt` datetime DEFAULT NULL,
  `paymentctldt` datetime DEFAULT NULL,
  `isentrance` int(11) DEFAULT '0' COMMENT '是否进口(0:否,1:是)',
  `donetime` datetime DEFAULT NULL COMMENT '完成时间',
  `viidt` datetime DEFAULT NULL,
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `diy` int(11) DEFAULT NULL,
  `chinaport` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `idx_business` (`BusinessID`) USING BTREE,
  KEY `idx_customer` (`customerid`) USING BTREE,
  KEY `idx_id` (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1725 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of project
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for receipt
-- ----------------------------
DROP TABLE IF EXISTS `receipt`;
CREATE TABLE `receipt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` int(11) DEFAULT NULL,
  `companyid` int(11) DEFAULT '0' COMMENT '公司ID',
  `batchid` int(11) DEFAULT NULL,
  `projectid` int(11) DEFAULT NULL,
  `payerid` int(11) DEFAULT NULL,
  `payername` varchar(255) DEFAULT NULL,
  `payercountry` varchar(255) DEFAULT NULL,
  `realityamount` decimal(11,2) DEFAULT '0.00',
  `amount` decimal(10,2) DEFAULT '0.00',
  `exchangerate` decimal(10,4) DEFAULT '0.0000',
  `createdat` int(11) DEFAULT NULL,
  `receiptdate` date DEFAULT NULL,
  `claimid` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `vii` tinyint(4) DEFAULT '0' COMMENT '0-非退税收入 1-退税收入',
  `bankreceipt` varchar(1000) DEFAULT NULL,
  `accounttype` tinyint(4) DEFAULT '1',
  `usage` tinyint(4) DEFAULT '1' COMMENT '1-外汇收入 2-其它收入 3-退税收入',
  `approved` tinyint(4) DEFAULT '0',
  `copysessionid` int(11) DEFAULT NULL,
  `transfer` tinyint(4) DEFAULT '0' COMMENT '0- 不是转款产生的 1-转款产生的',
  `formId` varchar(32) DEFAULT NULL,
  `approvedt` datetime DEFAULT NULL,
  `createtorid` int(11) DEFAULT '0',
  `createtor` varchar(30) DEFAULT NULL,
  `approvedid` int(11) DEFAULT NULL,
  `approvedip` varchar(255) DEFAULT NULL,
  `realityDate` varchar(20) DEFAULT NULL,
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_projectid` (`projectid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5201 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of receipt
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for receiptclaim
-- ----------------------------
DROP TABLE IF EXISTS `receiptclaim`;
CREATE TABLE `receiptclaim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` int(11) DEFAULT '0',
  `companyid` int(11) DEFAULT '0',
  `payername` varchar(255) DEFAULT NULL,
  `payerregion` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `receiptamount` decimal(10,2) DEFAULT NULL,
  `receiptdate` date DEFAULT NULL,
  `createdat` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `save_tag` tinyint(4) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `bankaccount` varchar(255) DEFAULT NULL,
  `projectid` int(11) DEFAULT NULL,
  `note` text,
  `aproveddt` datetime DEFAULT NULL,
  `formId` varchar(32) NOT NULL,
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=894 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of receiptclaim
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for receiver
-- ----------------------------
DROP TABLE IF EXISTS `receiver`;
CREATE TABLE `receiver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companyid` int(11) DEFAULT NULL,
  `customerid` int(11) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `account` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `customer` int(11) DEFAULT NULL,
  `createdtype` tinyint(4) DEFAULT NULL,
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=812 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of receiver
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for stamp
-- ----------------------------
DROP TABLE IF EXISTS `stamp`;
CREATE TABLE `stamp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companyid` int(11) DEFAULT '0' COMMENT '公司ID',
  `projectid` int(11) DEFAULT NULL,
  `customerid` int(11) DEFAULT NULL,
  `original` text,
  `component` text,
  `status` int(11) DEFAULT '1' COMMENT '盖章 0:未盖章,1:已申请,2:已盖章',
  `stampmark` varchar(500) DEFAULT NULL,
  `stamper` varchar(500) DEFAULT NULL,
  `isbz` int(11) DEFAULT '0',
  `stamptime` datetime DEFAULT NULL,
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=354 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stamp
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for stamper
-- ----------------------------
DROP TABLE IF EXISTS `stamper`;
CREATE TABLE `stamper` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companyid` int(11) DEFAULT '0',
  `stamper` varchar(500) DEFAULT NULL,
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of stamper
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for verycode
-- ----------------------------
DROP TABLE IF EXISTS `verycode`;
CREATE TABLE `verycode` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `ipaddr` varchar(30) DEFAULT NULL,
  `ua` varchar(1000) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of verycode
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for vii
-- ----------------------------
DROP TABLE IF EXISTS `vii`;
CREATE TABLE `vii` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` int(11) DEFAULT '0',
  `companyid` int(11) DEFAULT '0' COMMENT '公司ID',
  `projectid` int(11) DEFAULT '0',
  `productid` int(11) DEFAULT '0',
  `productname` varchar(50) DEFAULT NULL,
  `invoicerid` int(11) DEFAULT NULL,
  `invoicer` varchar(150) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT '0.00',
  `entryform` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `taxreturnrate` decimal(10,2) DEFAULT NULL,
  `invoiceamount` decimal(18,4) DEFAULT '0.0000',
  `taxamount` decimal(11,4) DEFAULT '0.0000' COMMENT '退税额',
  `unit` varchar(255) DEFAULT NULL,
  `type` tinyint(4) DEFAULT '1',
  `confirmer` tinyint(4) DEFAULT NULL,
  `viiimage` text,
  `copysessionid` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `approvedt` datetime DEFAULT NULL,
  `createtor` varchar(20) DEFAULT NULL,
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `contactaddress` varchar(255) DEFAULT NULL,
  `contactbank` varchar(255) DEFAULT NULL,
  `taxno` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_projectid` (`projectid`)
) ENGINE=InnoDB AUTO_INCREMENT=2167 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of vii
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Function structure for fn_getCategory
-- ----------------------------
DROP FUNCTION IF EXISTS `fn_getCategory`;
delimiter ;;
CREATE FUNCTION `fn_getCategory`(pkey varchar(30),pvalue varchar(20))
 RETURNS varchar(30) CHARSET utf8
begin
	declare val varchar(30);
	select name into val from auth_category_second where primary_key = pkey and `key` = pvalue;
	return val;
end
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
