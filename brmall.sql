CREATE TABLE `base_users` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`nickname` varchar(155) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '昵称',
`email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '邮箱',
`mobile` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '手机号',
`password` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '密码',
`pay_password` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '支付密码',
`avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '头像',
`sex` tinyint(1) NOT NULL DEFAULT 0 COMMENT '性别',
`birthday` int(10) NOT NULL DEFAULT 0 COMMENT '生日',
`introduction` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '自我介绍',
`status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '状态 1:正常 2:禁止 3删除',
`signature` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '签名',
`token` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'token',
`salt` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '用于密码加密',
`updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
`created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
PRIMARY KEY (`id`) ,
UNIQUE INDEX `id` (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
COMMENT='用户表';

CREATE TABLE `mall_distribution` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`uid` int(11) NOT NULL DEFAULT 0 COMMENT '用户id',
`first_leader` int(11) NOT NULL DEFAULT 0 COMMENT '一级分销用户',
`second_leader` int(11) NOT NULL DEFAULT 0 COMMENT '耳机分销用户',
`third_leader` int(11) NOT NULL DEFAULT 0 COMMENT '三级分销用户',
`points` decimal(10,2) NOT NULL DEFAULT 0 COMMENT '可用积分',
`points2` decimal(10,2) NOT NULL DEFAULT 0 COMMENT '7天冻结积分',
`points3` decimal(10,2) NOT NULL DEFAULT 0 COMMENT '冻结积分(消费所得积分)',
`points4` decimal(10,2) NOT NULL DEFAULT 0 COMMENT '冻结积分(购买所得积分)',
`points5` decimal(10,2) NOT NULL DEFAULT 0 COMMENT '累计积分',
`money` decimal(10,2) NOT NULL DEFAULT 0 COMMENT '可用余额',
`money2` decimal(10,2) NOT NULL DEFAULT 0 COMMENT '累计余额',
PRIMARY KEY (`id`) ,
UNIQUE INDEX `uid` (`uid`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
COMMENT='用户分销信息';

CREATE TABLE `base_security` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`uid` int(11) NOT NULL DEFAULT 0 COMMENT '用户id',
`mobile` tinyint(1) NOT NULL DEFAULT 0 COMMENT '手机号验证证 1:已验证',
`id_card` tinyint(1) NOT NULL DEFAULT 0 COMMENT '实名验证',
`email` tinyint(1) NOT NULL DEFAULT 0 COMMENT '邮箱验证',
`pay_password` tinyint(1) NOT NULL DEFAULT 0 COMMENT '支付密码验证',
PRIMARY KEY (`id`) ,
UNIQUE INDEX `uid` (`uid`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
COMMENT='用户账号安全验证';

CREATE TABLE `base_identity_card` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`uid` int(11) NOT NULL DEFAULT 0 COMMENT '用户id',
`name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '姓名',
`sex` tinyint(1) NOT NULL DEFAULT 0 COMMENT '性别',
`card_no` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '身份证号',
`address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '地址',
`expiry_date_start` int(10) NOT NULL DEFAULT 0 COMMENT '有效期开始日期',
`expiry_date_end` int(10) NOT NULL DEFAULT 0 COMMENT '有效期结束日期',
`photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '手持身份证照片',
`photo2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '身份证正面照',
`photo3` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '身份证反面照',
PRIMARY KEY (`id`) ,
UNIQUE INDEX `uid` (`uid`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
COMMENT='用户身份证信息';

CREATE TABLE `base_config` (
`key` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '键',
`value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '值',
`type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '类型',
PRIMARY KEY (`key`) ,
UNIQUE INDEX `key` (`key`),
UNIQUE INDEX `type` (`type`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
COMMENT='系统配置表';

CREATE TABLE `mall_address` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`uid` int(11) NOT NULL DEFAULT 0 COMMENT '用户id',
`name` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '姓名(昵称)',
`address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '地址',
`mobile` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '手机号',
`zipcode` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '邮政编码',
`country` int(11) NOT NULL DEFAULT 0 COMMENT '国家id',
`province` int(11) NOT NULL DEFAULT 0 COMMENT '省id',
`city` int(11) NOT NULL DEFAULT 0 COMMENT '城市id',
`district` int(11) NOT NULL DEFAULT 0 COMMENT '区域id',
`created_at` int(10) NOT NULL DEFAULT 0 COMMENT '创建时间',
`updated_at` int(10) NOT NULL DEFAULT 0 COMMENT '更新时间',
`is_default` tinyint(1) NOT NULL DEFAULT 0 COMMENT '收货地址 1默认',
PRIMARY KEY (`id`) ,
UNIQUE INDEX `uid` (`uid`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
COMMENT='用户收货地址';

CREATE TABLE `mall_user_log` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`uid` int(11) NOT NULL DEFAULT 0 COMMENT '用户id',
`from` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '来自',
`to` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '分配给',
`type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '类型 1:积分 2:余额',
`type2` tinyint(2) NOT NULL DEFAULT 0 COMMENT '1:注册获赠积分 2:购买获赠积分 3:',
`status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1:增加 2:减去',
`created_time` int(10) NOT NULL DEFAULT 0 COMMENT '创建时间',
PRIMARY KEY (`id`) ,
UNIQUE INDEX `uid` (`uid`),
UNIQUE INDEX `act_type` (`status`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
COMMENT='积分余额变动日志表';

CREATE TABLE `mall_user_points2_change` (
`id` int NOT NULL,
`uid` int(11) NOT NULL DEFAULT 0 COMMENT '用户id',
`points` decimal(10,2) NOT NULL DEFAULT 0 COMMENT '积分额度',
`from_uid` int(11) NOT NULL DEFAULT 0 COMMENT '来自用户的id',
`type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1:增加 2:减去',
`created_time` int(10) NOT NULL DEFAULT 0 COMMENT '创建时间',
`oid` int(11) NULL DEFAULT 0 COMMENT '订单id',
`status` tinyint NULL DEFAULT 0 COMMENT '1:未发货 2:已发货(可以开始计算7天时间)',
PRIMARY KEY (`id`) ,
UNIQUE INDEX `uid` (`uid`),
UNIQUE INDEX `from_uid` (`from_uid`),
UNIQUE INDEX `created_time` (`created_time`),
UNIQUE INDEX `oid` (`oid`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
COMMENT='7天冻结积分记录表';

CREATE TABLE `mall_user_points3_change` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1:购物赠送 2:购买的积分',
`uid` int(11) NOT NULL DEFAULT 0 COMMENT '用户id',
`update_time` int(10) NOT NULL DEFAULT 0 COMMENT '更新时间',
`created_time` int(10) NOT NULL DEFAULT 0 COMMENT '创建时间',
`points` decimal(10,2) NOT NULL DEFAULT 0 COMMENT '积分值',
PRIMARY KEY (`id`) ,
UNIQUE INDEX `update_time` (`update_time`),
UNIQUE INDEX `uid` (`uid`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
COMMENT='冻结积分(购物赠送积分与购买的积分)';

CREATE TABLE `mall_user_bank` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`uid` int(11) NOT NULL DEFAULT 0 COMMENT '用户id',
`type` int(1) NOT NULL DEFAULT 0 COMMENT '1:微信 2:支付宝 3:银行卡',
`bank_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '银行名称',
`bank_code` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '银行编码',
`card_no` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '卡号',
`user_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '卡主姓名',
`card_type_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '卡类型名 储值卡、信用卡等',
`card_type_code` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '卡类型编码',
`is_default` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1:默认',
PRIMARY KEY (`id`) ,
UNIQUE INDEX `uid` (`uid`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
COMMENT='用户收款账号';

CREATE TABLE `admin` (
`id` smallint(5) NOT NULL AUTO_INCREMENT,
`username` varchar(60) NOT NULL DEFAULT '' COMMENT '账号名',
`email` varchar(60) NOT NULL DEFAULT '' COMMENT '邮箱',
`realname` varchar(60) NOT NULL DEFAULT '' COMMENT '真实姓名',
`password` varchar(64) NOT NULL DEFAULT '' COMMENT '密码',
`last_login` int(11) NOT NULL DEFAULT 0 COMMENT '最后登录时间',
`last_ip` varchar(15) NOT NULL DEFAULT '' COMMENT '最后登录IP',
`remember_token` varchar(100) NOT NULL DEFAULT '' COMMENT '记住登录信息',
`created_at` timestamp NULL DEFAULT NULL,
`updated` timestamp NULL DEFAULT NULL,
PRIMARY KEY (`id`) ,
INDEX `username` (`username`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci;


ALTER TABLE `mall_distribution` ADD CONSTRAINT `fk_br_distribution_br_users_1` FOREIGN KEY (`uid`) REFERENCES `base_users` (`id`);
ALTER TABLE `base_security` ADD CONSTRAINT `fk_br_base_security_br_base_users_1` FOREIGN KEY (`uid`) REFERENCES `base_users` (`id`);
ALTER TABLE `base_identity_card` ADD CONSTRAINT `fk_br_base_identity_card_br_base_users_1` FOREIGN KEY (`uid`) REFERENCES `base_users` (`id`);
ALTER TABLE `mall_address` ADD CONSTRAINT `fk_mall_address_base_users_1` FOREIGN KEY (`uid`) REFERENCES `base_users` (`id`);
ALTER TABLE `mall_user_log` ADD CONSTRAINT `fk_mall_user_points_base_users_1` FOREIGN KEY (`uid`) REFERENCES `base_users` (`id`);
ALTER TABLE `mall_user_points2_change` ADD CONSTRAINT `fk_mall_user_points2_change_base_users_1` FOREIGN KEY (`uid`) REFERENCES `base_users` (`id`);
ALTER TABLE `mall_user_points3_change` ADD CONSTRAINT `fk_mall_user_points3_change_base_users_1` FOREIGN KEY (`id`) REFERENCES `base_users` (`id`);
ALTER TABLE `mall_user_bank` ADD CONSTRAINT `fk_mall_user_bank_base_users_1` FOREIGN KEY (`uid`) REFERENCES `base_users` (`id`);

