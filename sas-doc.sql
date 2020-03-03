/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : sas-doc

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 12/12/2019 12:00:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bitacora
-- ----------------------------
DROP TABLE IF EXISTS `bitacora`;
CREATE TABLE `bitacora`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_documento` int(11) NOT NULL DEFAULT 0,
  `id_usuario` int(11) NOT NULL DEFAULT 0,
  `id_evento` int(11) NOT NULL,
  `fecha_evento` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `bitacora_id_usuario_IDX`(`id_usuario`) USING BTREE,
  INDEX `bitacora_id_documento_IDX`(`id_documento`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for c_tipo_documento
-- ----------------------------
DROP TABLE IF EXISTS `c_tipo_documento`;
CREATE TABLE `c_tipo_documento`  (
  `id_tipo_documento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id_tipo_documento`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 27 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for catalogo_estatus
-- ----------------------------
DROP TABLE IF EXISTS `catalogo_estatus`;
CREATE TABLE `catalogo_estatus`  (
  `id_estatus` int(11) NOT NULL AUTO_INCREMENT,
  `estatus` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_estatus`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for catalogo_grupos
-- ----------------------------
DROP TABLE IF EXISTS `catalogo_grupos`;
CREATE TABLE `catalogo_grupos`  (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `siglas` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `id_tipo_documento` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_grupo`) USING BTREE,
  INDEX `catalogo_grupos_id_tipo_documento_IDX`(`id_tipo_documento`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for catalogo_privilegios
-- ----------------------------
DROP TABLE IF EXISTS `catalogo_privilegios`;
CREATE TABLE `catalogo_privilegios`  (
  `id_privilegios` int(11) NOT NULL AUTO_INCREMENT,
  `privilegios` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_privilegios`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for catalogo_usuarios
-- ----------------------------
DROP TABLE IF EXISTS `catalogo_usuarios`;
CREATE TABLE `catalogo_usuarios`  (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `password` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `id_grupo` int(11) NOT NULL DEFAULT 0,
  `id_privilegios` int(11) NOT NULL DEFAULT 0,
  `recibir_correo` int(11) NOT NULL DEFAULT 0,
  `alerta_pendientes` int(11) NOT NULL DEFAULT 0,
  `auto_refrescar` int(11) NOT NULL DEFAULT 1,
  `configurar_tabla` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_usuario`) USING BTREE,
  INDEX `catalogo_usuarios_id_grupo_IDX`(`id_grupo`) USING BTREE,
  INDEX `catalogo_usuarios_id_privilegios_IDX`(`id_privilegios`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 979 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for documento_turnado_a
-- ----------------------------
DROP TABLE IF EXISTS `documento_turnado_a`;
CREATE TABLE `documento_turnado_a`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_documento` int(11) NOT NULL DEFAULT 0,
  `id_turnado_a` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `documento_turnado_a_id_documento_IDX`(`id_documento`) USING BTREE,
  INDEX `documento_turnado_a_id_turnado_a_IDX`(`id_turnado_a`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 847668 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Table structure for documentos
-- ----------------------------
DROP TABLE IF EXISTS `documentos`;
CREATE TABLE `documentos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_documento` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `expediente` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `asunto` mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tipo_documento_id` int(11) NOT NULL,
  `fecha_documento` date NULL DEFAULT NULL,
  `fecha_limite` date NULL DEFAULT NULL,
  `id_remitente` int(11) NOT NULL DEFAULT 0,
  `id_destinatario` int(11) NOT NULL DEFAULT 0,
  `num_anexos` int(11) NOT NULL,
  `notas` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `id_archivo` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
