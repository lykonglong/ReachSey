/*
Navicat MySQL Data Transfer

Source Server         : Laravel
Source Server Version : 100203
Source Host           : localhost:3306
Source Database       : reachsey

Target Server Type    : MYSQL
Target Server Version : 100203
File Encoding         : 65001

Date: 2017-12-24 16:32:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `cat_id` int(20) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'Tutorials');
INSERT INTO `categories` VALUES ('2', 'Software');

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `post_id` int(20) NOT NULL AUTO_INCREMENT,
  `sub_cat_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_view` int(255) DEFAULT NULL,
  `post_desc` text NOT NULL,
  `post_tage` varchar(255) NOT NULL,
  `post_status` varchar(255) DEFAULT NULL,
  `post_suggestion` tinyint(4) DEFAULT NULL,
  `down_link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `FK_subcat` (`sub_cat_id`),
  KEY `FK_user` (`user_id`),
  CONSTRAINT `FK_subcat` FOREIGN KEY (`sub_cat_id`) REFERENCES `sub_categories` (`sub_cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES ('5', '1', '1', 'Cakewalk SONAR Platinum v23.10.0.14', '1.png', '2017-11-21', '9', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Lorem,undoubtable,book', '1', '1', null);
INSERT INTO `posts` VALUES ('6', '2', '1', 'Where can I get some?', '2.png', '2017-11-16', '8', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'combined,reasonable,repetition,characteristic', '1', '1', null);
INSERT INTO `posts` VALUES ('7', '3', '2', '1914 translation by H. Rackham', '3.jpg', '2017-11-22', '16', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?', 'pleasure,consequences', '1', '1', null);
INSERT INTO `posts` VALUES ('8', '4', '2', 'This is a test', '1.png', '2017-11-20', '90', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'a,b,c,d', '1', '1', null);
INSERT INTO `posts` VALUES ('9', '2', '2', 'Obscure Latin words, consectetur, from a Lorem Ipsum', '2.png', '2017-11-20', '21', 'obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more ', '', '1', '1', null);
INSERT INTO `posts` VALUES ('10', '4', '3', 'Logicly 1.8.0 MacOSX', '004d1a79.jpg', '2017-12-19', '9', '<p><strong>Logicly 1.8.0 MacOSX | 20 MB</strong></p>\r\n\r\n<p>Teach logic gates + digital circuits effectively — with Logicly. Helps you learn or teach logic gates and circuits effectively. Logicly aims to keep students engaged and put them to work on their Physics or Informatics classes. Logicly lets you easily add new elements in your schemes, then helps you draw connections among them.</p>\r\n\r\n<p>- Design circuits quickly and easily with a modern and intuitive user interface with drag-and-drop, copy/paste, zoom & more.<br />\r\n- Take control of debugging by pausing the simulation and watching the signal propagate as you advance step-by-step.<br />\r\n- Don\'t worry about multiple platforms on student computers. Install on both Windows and macOS.</p>\r\n\r\n<p><strong>Create engaging, hands-on, homework assignments</strong><br />\r\n- Let students experiment in a \"no worries\" simulation where undo is a click away — before building physical circuits.<br />\r\n- Encapsulate and avoid duplication by creating custom integrated circuits that you can drag and drop… just like gates.<br />\r\n- Customize Logicly for your curriculum by building libraries of custom circuits that students can “import” into their work.</p>\r\n\r\n<p><strong>Logic Gates:</strong><br />\r\nBuild logic circuits with a variety of gates, including AND, OR, XOR, NAND, NOR, XNOR, and NOT. Use either ANSI/IEEE or IEC symbols.</p>\r\n\r\n<p><strong>Flip-flops:</strong><br />\r\nNeed to build something a little more complex? Logicly also offers pre-built SR, D, JK, and T flip-flops with preset and clear inputs.</p>\r\n\r\n<p><strong>Input and Output:</strong><br />\r\nToggle switches, clocks, and buttons change the state of the circuit, while light bulbs and 4-bit digits provide human-readable output.</p>\r\n\r\n<p>- Build and simulate basic logic circuits with just a few mouse clicks. Drag components into the editor.<br />\r\n- Control the Simulation<br />\r\n- Watch the simulator run in real time, or pause it to advance step by step at your own pace. Control clock components and drive signal propagation with a click of your mouse.<br />\r\n- When you are finished designing your circuit, you can save it to your hard drive. Great for handing in homework assignments and providing a starting point for lab activities.<br />\r\n- Cross-Platform</p>\r\n', 'Logicly ,MacOSX,Mac,OSX', '1', '0', 'http://www.youtube.com');
INSERT INTO `posts` VALUES ('11', '4', '3', ' ONEKEY PDF Convert to Word v3.0', 'maxresdefault.jpg', '2017-12-18', '1', '<p><strong>ONEKEY PDF Convert to Word</strong> is a powerful and easy-to-use software for intelligently converting pdf to easily editable word doc documents. With this software, simply drag and drop pdf files to the workspace, and then you can start the conversion. It does not require Adobe Acrobat, Acrobat Reader or any other third-party PDF reader or maker. All elements in pdfdocument are precisely replicated in the new document, including original text style, images, graphics, tables, hyperlinks, layout and formatting.</p>\r\n\r\n<p><strong>Reuse PDF Easily</strong><br />\r\nEasily convert your PDF files to MS Word Document, you need simply to click on Converter button. It works without Adobe Acrobat or Adobe Reader.<br />\r\n<br />\r\n<strong>Original Layouts And Formats</strong><br />\r\nAll elements in PDF document are precisely replicated in the new document, including original text style, images, graphics, tables, hyperlinks, layout and formatting.<br />\r\n<br />\r\n<strong>Supports Batch Conversion</strong><br />\r\nAutomate the conversion of hundreds of PDF documents. No need to manually supervise the process either. Just set up your queue, specify your output format, click on Convert.<br />\r\n<br />\r\n<strong>Supports Several Languages</strong><br />\r\nSupports almost all of the major languages including English, Spanish, Portuguese, German, French, Italian, Polish, Russian, Chinese, Chinese Traditional, Korean, Japanese, Hindi, Arabic,Turkish etc.<br />\r\n<br />\r\n<strong>Partial Conversion</strong><br />\r\nSelect a range of pages for flexible partial conversion option to save your precious time and fully meet your needs.<br />\r\n<br />\r\n<strong>Supports Password protected PDF</strong><br />\r\nConvert encrypted PDF files that are protected by owner (permission) password denying printing, editing, and copying to Word documents.</p>\r\n', 'convert pdf, easyappsoft, pdf to doc, pdf to word, pdf2doc, pdf2docx, pdf2word', '1', null, 'http://cdn.p30download.com/?b=p30dl-software&f=PDF.Convert.to.Word.v3.0_p30download.com.rar');

-- ----------------------------
-- Table structure for post_img
-- ----------------------------
DROP TABLE IF EXISTS `post_img`;
CREATE TABLE `post_img` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of post_img
-- ----------------------------

-- ----------------------------
-- Table structure for sub_categories
-- ----------------------------
DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE `sub_categories` (
  `sub_cat_id` int(20) NOT NULL AUTO_INCREMENT,
  `cat_id` int(20) NOT NULL,
  `sub_cat_name` varchar(255) NOT NULL,
  PRIMARY KEY (`sub_cat_id`),
  KEY `RK_Cat` (`cat_id`),
  CONSTRAINT `RK_Cat` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sub_categories
-- ----------------------------
INSERT INTO `sub_categories` VALUES ('1', '2', 'Design');
INSERT INTO `sub_categories` VALUES ('2', '2', 'Graphic');
INSERT INTO `sub_categories` VALUES ('3', '1', '3D Animation');
INSERT INTO `sub_categories` VALUES ('4', '1', 'Programming');
INSERT INTO `sub_categories` VALUES ('5', '1', 'Mobile Developer');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'kimhong', 'Hong', 'kimhonghengabc@gmail.com', 'Admin', '123456');
INSERT INTO `users` VALUES ('2', 'darakok', 'Dara Kok', 'kok@gmail.com', 'user', '123456');
INSERT INTO `users` VALUES ('3', 'long', 'Long', 'lykonglong@qq.com', 'Admin', '123456');
SET FOREIGN_KEY_CHECKS=1;
