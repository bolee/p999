/*
Navicat PGSQL Data Transfer

Source Server         : 192.168.1.20
Source Server Version : 90201
Source Host           : 192.168.1.20:5432
Source Database       : p999
Source Schema         : public

Target Server Type    : PGSQL
Target Server Version : 90201
File Encoding         : 65001

Date: 2012-10-15 23:03:41
*/


-- ----------------------------
-- Sequence structure for "public"."answer_id_seq"
-- ----------------------------
DROP SEQUENCE "public"."answer_id_seq";
CREATE SEQUENCE "public"."answer_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for "public"."question_id_seq"
-- ----------------------------
DROP SEQUENCE "public"."question_id_seq";
CREATE SEQUENCE "public"."question_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 5
 CACHE 1;

-- ----------------------------
-- Sequence structure for "public"."supply_id_seq"
-- ----------------------------
DROP SEQUENCE "public"."supply_id_seq";
CREATE SEQUENCE "public"."supply_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for "public"."tag_id_seq"
-- ----------------------------
DROP SEQUENCE "public"."tag_id_seq";
CREATE SEQUENCE "public"."tag_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for "public"."user_id_seq"
-- ----------------------------
DROP SEQUENCE "public"."user_id_seq";
CREATE SEQUENCE "public"."user_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Table structure for "public"."answer"
-- ----------------------------
DROP TABLE "public"."answer";
CREATE TABLE "public"."answer" (
"id" int4 DEFAULT nextval('answer_id_seq'::regclass) NOT NULL,
"content" text NOT NULL,
"user_id" int4 NOT NULL,
"date" timestamp NOT NULL,
"best" bool DEFAULT false,
"useful" int4 DEFAULT 0,
"nouse" int4 DEFAULT 0,
"question_id" int2 NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of answer
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."question"
-- ----------------------------
DROP TABLE "public"."question";
CREATE TABLE "public"."question" (
"id" int4 DEFAULT nextval('question_id_seq'::regclass) NOT NULL,
"title" varchar(256) NOT NULL,
"user_id" int4 NOT NULL,
"date" timestamp NOT NULL,
"answer_num" int4 DEFAULT 0,
"click_num" int4 DEFAULT 0,
"content" text,
"useful" int2 DEFAULT 0,
"nouse" int2 DEFAULT 0
)
WITH (OIDS=FALSE)

;


-- ----------------------------
-- Table structure for "public"."supply"
-- ----------------------------
DROP TABLE "public"."supply";
CREATE TABLE "public"."supply" (
"id" int4 DEFAULT nextval('supply_id_seq'::regclass) NOT NULL,
"user_id" int4 NOT NULL,
"content" text NOT NULL,
"date" timestamp NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of supply
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."tag"
-- ----------------------------
DROP TABLE "public"."tag";
CREATE TABLE "public"."tag" (
"id" int4 DEFAULT nextval('tag_id_seq'::regclass) NOT NULL,
"name" varchar(16) NOT NULL,
"total" int4 DEFAULT 0,
"date" timestamp NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of tag
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."tag_relation"
-- ----------------------------
DROP TABLE "public"."tag_relation";
CREATE TABLE "public"."tag_relation" (
"question_id" int4 NOT NULL,
"tag_id" int4 NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of tag_relation
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."user"
-- ----------------------------
DROP TABLE "public"."user";
CREATE TABLE "public"."user" (
"id" int4 DEFAULT nextval('user_id_seq'::regclass) NOT NULL,
"display" varchar(32) NOT NULL,
"email" varchar(32) NOT NULL,
"password" char(32) NOT NULL,
"verify" bool DEFAULT false
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO "public"."user" VALUES ('1', '自己', 'a4@a.com', 'e10adc3949ba59abbe56e057f20f883e', 'f');

-- ----------------------------
-- Alter Sequences Owned By 
-- ----------------------------
ALTER SEQUENCE "public"."answer_id_seq" OWNED BY "answer"."id";
ALTER SEQUENCE "public"."question_id_seq" OWNED BY "question"."id";
ALTER SEQUENCE "public"."supply_id_seq" OWNED BY "supply"."id";
ALTER SEQUENCE "public"."tag_id_seq" OWNED BY "tag"."id";
ALTER SEQUENCE "public"."user_id_seq" OWNED BY "user"."id";

-- ----------------------------
-- Primary Key structure for table "public"."answer"
-- ----------------------------
ALTER TABLE "public"."answer" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table "public"."question"
-- ----------------------------
ALTER TABLE "public"."question" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table "public"."supply"
-- ----------------------------
ALTER TABLE "public"."supply" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table "public"."tag"
-- ----------------------------
ALTER TABLE "public"."tag" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table "public"."tag_relation"
-- ----------------------------
ALTER TABLE "public"."tag_relation" ADD PRIMARY KEY ("question_id", "tag_id");

-- ----------------------------
-- Primary Key structure for table "public"."user"
-- ----------------------------
ALTER TABLE "public"."user" ADD PRIMARY KEY ("id");
