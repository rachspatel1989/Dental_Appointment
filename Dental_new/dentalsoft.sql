/*
Navicat MySQL Data Transfer

Source Server         : 166.62.28.97
Source Server Version : 50545
Source Host           : 166.62.28.97:3306
Source Database       : dentalsoft

Target Server Type    : MYSQL
Target Server Version : 50545
File Encoding         : 65001

Date: 2016-07-18 18:51:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `addional_info_master`
-- ----------------------------
DROP TABLE IF EXISTS `addional_info_master`;
CREATE TABLE `addional_info_master` (
  `addi_id` int(11) NOT NULL AUTO_INCREMENT,
  `case_id` varchar(255) DEFAULT NULL,
  `excisional` varchar(255) DEFAULT NULL,
  `incisional` varchar(255) DEFAULT NULL,
  `smear_aspir` varchar(255) DEFAULT NULL,
  `immuno_fluor` varchar(255) DEFAULT NULL,
  `indicate_img1` varchar(255) DEFAULT NULL,
  `indicate_img2` varchar(255) DEFAULT NULL,
  `indicate_img3` varchar(255) DEFAULT NULL,
  `buccal_muco` varchar(255) DEFAULT NULL,
  `gingiva` varchar(255) DEFAULT NULL,
  `palate_hard` varchar(255) DEFAULT NULL,
  `teeth` varchar(255) DEFAULT NULL,
  `tongue` varchar(255) DEFAULT NULL,
  `tonsil` varchar(255) DEFAULT NULL,
  `uvula` varchar(255) DEFAULT NULL,
  `palate_soft` varchar(255) DEFAULT NULL,
  `left_side` varchar(255) DEFAULT NULL,
  `right_side` varchar(255) DEFAULT NULL,
  `upper_side` varchar(255) DEFAULT NULL,
  `lower_side` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `notes` text,
  `other` varchar(255) DEFAULT NULL,
  `other_img1` varchar(255) DEFAULT NULL,
  `other_img2` varchar(255) DEFAULT NULL,
  `other_img3` varchar(255) DEFAULT NULL,
  `reg_via` varchar(255) DEFAULT NULL,
  `reg_device_id` varchar(255) DEFAULT NULL,
  `creation_date` varchar(255) DEFAULT NULL,
  `modify_date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`addi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of addional_info_master
-- ----------------------------
INSERT INTO `addional_info_master` VALUES ('1', '1', 'Yes', '', null, '', '', 'Yes', '', '', 'Yes', '', '', '', '', '', '', '', '', '', '', null, '', null, null, null, null, 'web', null, '2016-07-18 03:24:11', null);
INSERT INTO `addional_info_master` VALUES ('2', '3', '', '', null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, '', null, null, null, null, 'web', null, '2016-07-18 05:06:11', null);

-- ----------------------------
-- Table structure for `advice_master`
-- ----------------------------
DROP TABLE IF EXISTS `advice_master`;
CREATE TABLE `advice_master` (
  `advise_id` int(11) NOT NULL AUTO_INCREMENT,
  `case_id` int(11) DEFAULT NULL,
  `visit_date` datetime DEFAULT NULL,
  `advice_desc` varchar(255) DEFAULT NULL,
  `charge` varchar(255) DEFAULT NULL,
  `additional_notes` varchar(255) DEFAULT NULL,
  `next_visit` date DEFAULT NULL,
  `reg_via` varchar(255) DEFAULT NULL,
  `reg_device_id` varchar(255) DEFAULT NULL,
  `creation_date` varchar(255) DEFAULT NULL,
  `modifiy_date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`advise_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of advice_master
-- ----------------------------
INSERT INTO `advice_master` VALUES ('1', '1', '2016-07-18 03:24:11', '', null, null, '2017-01-18', null, null, null, null);
INSERT INTO `advice_master` VALUES ('2', '3', '2016-07-18 05:06:11', '', null, null, '2016-08-18', null, null, null, null);

-- ----------------------------
-- Table structure for `appointment_master`
-- ----------------------------
DROP TABLE IF EXISTS `appointment_master`;
CREATE TABLE `appointment_master` (
  `app_id` int(11) NOT NULL AUTO_INCREMENT,
  `pat_id` int(11) DEFAULT NULL,
  `app_date` date DEFAULT NULL,
  `app_time` time DEFAULT NULL,
  `reg_device_id` varchar(255) DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`app_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of appointment_master
-- ----------------------------
INSERT INTO `appointment_master` VALUES ('1', '1', '2016-07-18', '16:30:00', '127.0.0.1', '2016-07-18', null, '1');
INSERT INTO `appointment_master` VALUES ('2', '1', '2016-07-18', '18:00:00', '127.0.0.1', '2016-07-18', null, '0');

-- ----------------------------
-- Table structure for `case_master`
-- ----------------------------
DROP TABLE IF EXISTS `case_master`;
CREATE TABLE `case_master` (
  `case_id` int(11) NOT NULL AUTO_INCREMENT,
  `case_no` varchar(255) DEFAULT NULL,
  `pat_name` varchar(255) DEFAULT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `locality` varchar(255) DEFAULT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `houseno` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel_no` varchar(255) DEFAULT NULL,
  `mob_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `office_addr` varchar(255) DEFAULT NULL,
  `office_no` varchar(255) DEFAULT NULL,
  `ref_by` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `diabetes` varchar(255) DEFAULT NULL,
  `drug_reaction` varchar(255) DEFAULT NULL,
  `allergy` varchar(255) DEFAULT NULL,
  `pregnancy` varchar(255) DEFAULT NULL,
  `aspirin` varchar(255) DEFAULT NULL,
  `heart` varchar(255) DEFAULT NULL,
  `blood_pressure` varchar(255) DEFAULT NULL,
  `acidity` varchar(255) DEFAULT NULL,
  `other` varchar(255) DEFAULT NULL,
  `family_doc` varchar(255) DEFAULT NULL,
  `family_doc_contact` varchar(255) DEFAULT NULL,
  `consent` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `reg_via` varchar(255) DEFAULT NULL,
  `reg_device_id` varchar(255) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`case_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of case_master
-- ----------------------------
INSERT INTO `case_master` VALUES ('1', '1001', 'User', 'Kemry', 'Patel', '23.12.1989', '26', 'Female', 'India', 'Gujarat', 'Vadodara', 'Vadodara', 'Vadodara', '391410', '103', 'Rosedale Flats', '0265 - 2 785 556', '091 - 785 522 3322', 'rachana.patel@yogintechnologies.com', 'Software Engineer', 'Yogin', '0265 - 2 525 523', 'Sunil Salat', 'AB Positive', '', 'Yes', 'Yes', '', '', '', '', '', '', 'Sunil Salat', '091 - 785 525 2222', 'Yes', '1', 'Web', '127.0.0.1', '2016-07-18 03:41:00', null);
INSERT INTO `case_master` VALUES ('3', '1002', 'Reece', 'Mel', 'Shah', '04.12.1991', '24', 'Female', 'India', 'Gujarat', 'Ahmedabad', 'Ahmedabad', 'Ahmedabad', '391412', '204', 'Satellite', '0079 - 1 215 121', '091 - 885 522 2632', 'reema.desai@yogintechnologies.com', 'Engineer', 'Yogin', '0265 - 1 215 522', 'Doctor', 'O Positive', 'Yes', 'Yes', '', '', 'Yes', '', '', '', '', 'Doctor', '091 - 784 555 6565', 'Yes', '1', 'Web', '127.0.0.1', '2016-07-18 05:33:00', null);

-- ----------------------------
-- Table structure for `cbct_teeth_master`
-- ----------------------------
DROP TABLE IF EXISTS `cbct_teeth_master`;
CREATE TABLE `cbct_teeth_master` (
  `cbct_id` int(11) NOT NULL AUTO_INCREMENT,
  `case_id` int(11) DEFAULT NULL,
  `prosthetic1` varchar(255) DEFAULT NULL,
  `prosthetic2` varchar(255) DEFAULT NULL,
  `prosthetic3` varchar(255) DEFAULT NULL,
  `Operatice1` varchar(255) DEFAULT NULL,
  `Operatice2` varchar(255) DEFAULT NULL,
  `Operatice3` varchar(255) DEFAULT NULL,
  `Periodontia1` varchar(255) DEFAULT NULL,
  `Periodontia2` varchar(255) DEFAULT NULL,
  `oral_surgery1` varchar(255) DEFAULT NULL,
  `oral_surgery2` varchar(255) DEFAULT NULL,
  `cosmetic1` varchar(255) DEFAULT NULL,
  `radiology1` varchar(255) DEFAULT NULL,
  `radiology2` varchar(255) DEFAULT NULL,
  `reg_via` varchar(255) DEFAULT NULL,
  `reg_device_id` varchar(255) DEFAULT NULL,
  `creation_date` varchar(255) DEFAULT NULL,
  `modify_date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cbct_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cbct_teeth_master
-- ----------------------------
INSERT INTO `cbct_teeth_master` VALUES ('1', '1', '', '', '', '', '', '', '1,5', '', '', '', '', '', '', 'web', null, '2016-07-18 03:24:11', null);
INSERT INTO `cbct_teeth_master` VALUES ('2', '3', '', '', '', '', '', '', '', '', '2,4', '', '', '', '', 'web', null, '2016-07-18 05:06:11', null);

-- ----------------------------
-- Table structure for `cbct_teeth_master_copy`
-- ----------------------------
DROP TABLE IF EXISTS `cbct_teeth_master_copy`;
CREATE TABLE `cbct_teeth_master_copy` (
  `cbct_id` int(11) NOT NULL AUTO_INCREMENT,
  `case_id` int(11) DEFAULT NULL,
  `prosthetic` varchar(255) DEFAULT NULL,
  `Operatice` varchar(255) DEFAULT NULL,
  `Periodontia` varchar(255) DEFAULT NULL,
  `oral_surgery` varchar(255) DEFAULT NULL,
  `cosmetic` varchar(255) DEFAULT NULL,
  `radiology` varchar(255) DEFAULT NULL,
  `reg_via` varchar(255) DEFAULT NULL,
  `reg_device_id` varchar(255) DEFAULT NULL,
  `creation_date` varchar(255) DEFAULT NULL,
  `modify_date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cbct_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cbct_teeth_master_copy
-- ----------------------------

-- ----------------------------
-- Table structure for `charges_master`
-- ----------------------------
DROP TABLE IF EXISTS `charges_master`;
CREATE TABLE `charges_master` (
  `charge_id` int(11) NOT NULL AUTO_INCREMENT,
  `treatment_name` varchar(255) DEFAULT NULL,
  `treatment_charge` varchar(255) DEFAULT NULL,
  `reg_via` varchar(255) DEFAULT NULL,
  `reg_device_id` varchar(255) DEFAULT NULL,
  `creation_date` varchar(255) DEFAULT NULL,
  `modify_date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`charge_id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of charges_master
-- ----------------------------
INSERT INTO `charges_master` VALUES ('1', 'sectional', '100', null, null, null, null);
INSERT INTO `charges_master` VALUES ('2', 'maxilla', '100', null, null, null, null);
INSERT INTO `charges_master` VALUES ('3', 'mandible', '200', null, null, null, null);
INSERT INTO `charges_master` VALUES ('4', 'both_jaws', '300', null, null, null, null);
INSERT INTO `charges_master` VALUES ('5', 'tmj', '100', null, null, null, null);
INSERT INTO `charges_master` VALUES ('6', 'sinus_view', '100', null, null, null, null);
INSERT INTO `charges_master` VALUES ('7', 'middle_view', '200', null, null, null, null);
INSERT INTO `charges_master` VALUES ('8', 'airway', '100', null, null, null, null);
INSERT INTO `charges_master` VALUES ('9', 'implant', '400', null, null, null, null);
INSERT INTO `charges_master` VALUES ('10', 'pathology', '100', null, null, null, null);
INSERT INTO `charges_master` VALUES ('11', 'root_canal', '100', null, null, null, null);
INSERT INTO `charges_master` VALUES ('12', 'bone_loss', '100', null, null, null, null);
INSERT INTO `charges_master` VALUES ('13', 'impacted', '500', null, null, null, null);
INSERT INTO `charges_master` VALUES ('14', 'third_molar', '100', null, null, null, null);
INSERT INTO `charges_master` VALUES ('15', 'opg', '100', null, null, null, null);
INSERT INTO `charges_master` VALUES ('16', 'lat_cepal', '200', null, null, null, null);
INSERT INTO `charges_master` VALUES ('17', 'pa_mandible', '300', null, null, null, null);
INSERT INTO `charges_master` VALUES ('18', 'subment_view', '100', null, null, null, null);
INSERT INTO `charges_master` VALUES ('19', 'tmj_view', '100', null, null, null, null);
INSERT INTO `charges_master` VALUES ('20', 'water_view', '400', null, null, null, null);
INSERT INTO `charges_master` VALUES ('21', 'hand_wrist', '100', null, null, null, null);
INSERT INTO `charges_master` VALUES ('22', 'town_view', '100', null, null, null, null);
INSERT INTO `charges_master` VALUES ('23', 'excisional', '500', null, null, null, null);
INSERT INTO `charges_master` VALUES ('24', 'incisional', '100', null, null, null, null);
INSERT INTO `charges_master` VALUES ('25', 'smear_aspir', '200', null, null, null, null);
INSERT INTO `charges_master` VALUES ('26', 'immuno_fluor', '100', null, null, null, null);
INSERT INTO `charges_master` VALUES ('27', 'buccal_muco', '100', null, null, null, null);
INSERT INTO `charges_master` VALUES ('28', 'gingiva', '300', null, null, null, null);
INSERT INTO `charges_master` VALUES ('29', 'palate_hard', '400', null, null, null, null);
INSERT INTO `charges_master` VALUES ('30', 'teeth', '100', null, null, null, null);
INSERT INTO `charges_master` VALUES ('31', 'tongue', '100', null, null, null, null);
INSERT INTO `charges_master` VALUES ('32', 'tonsil', '400', null, null, null, null);
INSERT INTO `charges_master` VALUES ('33', 'uvula', '500', null, null, null, null);
INSERT INTO `charges_master` VALUES ('34', 'palate_soft', '100', null, null, null, null);
INSERT INTO `charges_master` VALUES ('35', 'left_side', '100', null, null, null, null);
INSERT INTO `charges_master` VALUES ('36', 'right_side', '200', null, null, null, null);
INSERT INTO `charges_master` VALUES ('37', 'upper_side', '300', null, null, null, null);
INSERT INTO `charges_master` VALUES ('38', 'lower_side', '400', null, null, null, null);
INSERT INTO `charges_master` VALUES ('39', 'prosthetic1', '100', null, null, null, null);
INSERT INTO `charges_master` VALUES ('40', 'prosthetic2', '100', null, null, null, null);
INSERT INTO `charges_master` VALUES ('41', 'prosthetic3', '500', null, null, null, null);
INSERT INTO `charges_master` VALUES ('42', 'Operatice1', '100', null, null, null, null);
INSERT INTO `charges_master` VALUES ('43', 'Operatice2', '200', null, null, null, null);
INSERT INTO `charges_master` VALUES ('44', 'Operatice3', '100', null, null, null, null);
INSERT INTO `charges_master` VALUES ('45', 'Periodontia1', '300', null, null, null, null);
INSERT INTO `charges_master` VALUES ('46', 'Periodontia2', '100', null, null, null, null);
INSERT INTO `charges_master` VALUES ('47', 'oral_surgery1', '400', null, null, null, null);
INSERT INTO `charges_master` VALUES ('48', 'oral_surgery2', '100', null, null, null, null);
INSERT INTO `charges_master` VALUES ('49', 'cosmetic1', '500', null, null, null, null);
INSERT INTO `charges_master` VALUES ('50', 'radiology1', '600', null, null, null, null);
INSERT INTO `charges_master` VALUES ('51', 'radiology2', '100', null, null, null, null);

-- ----------------------------
-- Table structure for `diagnostic_master`
-- ----------------------------
DROP TABLE IF EXISTS `diagnostic_master`;
CREATE TABLE `diagnostic_master` (
  `dia_id` int(11) NOT NULL AUTO_INCREMENT,
  `case_id` int(11) DEFAULT NULL,
  `sectional` varchar(255) DEFAULT NULL,
  `maxilla` varchar(255) DEFAULT NULL,
  `mandible` varchar(255) DEFAULT NULL,
  `both_jaws` varchar(255) DEFAULT NULL,
  `tmj` varchar(255) DEFAULT NULL,
  `sinus_view` varchar(255) DEFAULT NULL,
  `middle_view` varchar(255) DEFAULT NULL,
  `airway` varchar(255) DEFAULT NULL,
  `implant` varchar(255) DEFAULT NULL,
  `pathology` varchar(255) DEFAULT NULL,
  `root_canal` varchar(255) DEFAULT NULL,
  `bone_loss` varchar(255) DEFAULT NULL,
  `impacted` varchar(255) DEFAULT NULL,
  `third_molar` varchar(255) DEFAULT NULL,
  `opg` varchar(255) DEFAULT NULL,
  `lat_cepal` varchar(255) DEFAULT NULL,
  `pa_mandible` varchar(255) DEFAULT NULL,
  `subment_view` varchar(255) DEFAULT NULL,
  `tmj_view` varchar(255) DEFAULT NULL,
  `water_view` varchar(255) DEFAULT NULL,
  `hand_wrist` varchar(255) DEFAULT NULL,
  `town_view` varchar(255) DEFAULT NULL,
  `reg_via` varchar(255) DEFAULT NULL,
  `reg_device_id` varchar(255) DEFAULT NULL,
  `creation_date` varchar(255) DEFAULT NULL,
  `modify_date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`dia_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of diagnostic_master
-- ----------------------------
INSERT INTO `diagnostic_master` VALUES ('1', '1', 'Yes', '', '', '', '', '', '', '', '', '', '', '', 'Yes', '', '', '', '', 'Yes', '', '', '', '', 'web', null, '2016-07-18 03:24:11', null);
INSERT INTO `diagnostic_master` VALUES ('2', '3', 'Yes', '', '', '', '', '', '', '', '', '', 'Yes', '', '', '', '', '', 'Yes', '', '', '', '', '', 'web', null, '2016-07-18 05:06:11', null);

-- ----------------------------
-- Table structure for `image_master`
-- ----------------------------
DROP TABLE IF EXISTS `image_master`;
CREATE TABLE `image_master` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `case_id` int(11) DEFAULT NULL,
  `img1` varchar(255) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `img3` varchar(255) DEFAULT NULL,
  `img4` varchar(255) DEFAULT NULL,
  `img5` varchar(255) DEFAULT NULL,
  `reg_via` varchar(255) DEFAULT NULL,
  `reg_device_id` varchar(255) DEFAULT NULL,
  `creation_date` varchar(255) DEFAULT NULL,
  `modifiy_date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of image_master
-- ----------------------------
INSERT INTO `image_master` VALUES ('2', '1', 'http://localhost:82upload/xray/1468239630.jpg', null, null, null, null, 'Web', '127.0.0.1', '2016-07-11 17:50', null);

-- ----------------------------
-- Table structure for `login_master`
-- ----------------------------
DROP TABLE IF EXISTS `login_master`;
CREATE TABLE `login_master` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_uniq_id` int(11) DEFAULT NULL,
  `user_uname` varchar(255) DEFAULT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `user_pass` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `user_login_datetime` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of login_master
-- ----------------------------
INSERT INTO `login_master` VALUES ('1', '1', 'Admin', 'docs@gmail.com', '12345678', 'docs', null);

-- ----------------------------
-- Table structure for `service_master`
-- ----------------------------
DROP TABLE IF EXISTS `service_master`;
CREATE TABLE `service_master` (
  `serv_id` int(11) NOT NULL AUTO_INCREMENT,
  `case_id` varchar(255) DEFAULT NULL,
  `oral_radiology` varchar(255) DEFAULT NULL,
  `oral_pathology` varchar(255) DEFAULT NULL,
  `tob_cess_prgm` varchar(255) DEFAULT NULL,
  `reg_via` varchar(255) DEFAULT NULL,
  `reg_device_id` varchar(255) DEFAULT NULL,
  `creation_date` varchar(255) DEFAULT NULL,
  `modify_date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`serv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of service_master
-- ----------------------------
INSERT INTO `service_master` VALUES ('1', '1', 'Yes', '', '', 'web', null, '2016-07-18 03:24:11', null);
INSERT INTO `service_master` VALUES ('2', '3', 'Yes', '', '', 'web', null, '2016-07-18 05:06:11', null);
