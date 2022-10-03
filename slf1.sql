/*
 Navicat Premium Data Transfer

 Source Server         : new_local
 Source Server Type    : PostgreSQL
 Source Server Version : 100022
 Source Host           : localhost:5433
 Source Catalog        : slf_tabg_pertelaan
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 100022
 File Encoding         : 65001

 Date: 03/10/2022 13:03:56
*/


-- ----------------------------
-- Table structure for slf
-- ----------------------------
DROP TABLE IF EXISTS "public"."slf";
CREATE TABLE "public"."slf" (
  "gid" int4 NOT NULL,
  "no_sk_slf" varchar(255) COLLATE "pg_catalog"."default",
  "tgl_slf" date,
  "jenis_slf" varchar(255) COLLATE "pg_catalog"."default",
  "nama_bangunan" varchar(255) COLLATE "pg_catalog"."default",
  "no_persetujuan_teknis" varchar(255) COLLATE "pg_catalog"."default",
  "nama_pemohon_slf" varchar(255) COLLATE "pg_catalog"."default",
  "peruntukan" varchar(255) COLLATE "pg_catalog"."default",
  "kelurahan" varchar(255) COLLATE "pg_catalog"."default",
  "kecamatan" varchar(255) COLLATE "pg_catalog"."default",
  "no_imb" varchar(255) COLLATE "pg_catalog"."default",
  "tgl_imb" date,
  "atas_nama" varchar(255) COLLATE "pg_catalog"."default",
  "nama_pemohon_imb" varchar(255) COLLATE "pg_catalog"."default",
  "alamat_persil_imb" varchar(255) COLLATE "pg_catalog"."default",
  "penggunaan_bangunan" varchar(255) COLLATE "pg_catalog"."default",
  "luas_bangunan" varchar(255) COLLATE "pg_catalog"."default",
  "jumlah_lantai" varchar(255) COLLATE "pg_catalog"."default",
  "file_sk_slf" varchar(255) COLLATE "pg_catalog"."default",
  "file_surat_pernyataan" varchar(255) COLLATE "pg_catalog"."default",
  "file_imb" varchar(255) COLLATE "pg_catalog"."default",
  "file_gambar_as_build" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of slf
-- ----------------------------
INSERT INTO "public"."slf" VALUES (1, 'tes', '2022-10-03', 'tes', 'tes', 'tes', 'tes', 'tes', 'tes', 'tes', 'tes', '2022-10-03', 'tes', 'tes', 'tes', 'tes', 'tes', 'tes', 'tes.pdf', 'tes.pdf', 'tes.pdf', 'tes.jpg');

-- ----------------------------
-- Primary Key structure for table slf
-- ----------------------------
ALTER TABLE "public"."slf" ADD CONSTRAINT "slf_pkey" PRIMARY KEY ("gid");
