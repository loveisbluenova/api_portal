-- MySQL dump 10.13  Distrib 5.5.59, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: product_maintenance
-- ------------------------------------------------------
-- Server version	5.5.59-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2017_04_10_000000_create_users_table',1),(2,'2017_04_10_000001_create_password_resets_table',1),(3,'2017_04_10_000002_create_social_accounts_table',1),(4,'2017_04_10_000003_create_roles_table',1),(5,'2017_04_10_000004_create_users_roles_table',1),(6,'2017_06_16_000005_create_protection_validations_table',1),(7,'2017_06_16_000006_create_protection_shop_tokens_table',1),(8,'2018_05_06_032053_create_product_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codpro` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coduni` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codprv` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_pro` tinyint(4) NOT NULL DEFAULT '0',
  `umb` int(11) DEFAULT NULL,
  `ean13` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `net_weight_base_pro` decimal(8,3) DEFAULT '0.000',
  `gross_weight_base_pro` decimal(8,3) DEFAULT '0.000',
  `long_base_pro` decimal(5,1) DEFAULT '0.0',
  `width_base_pro` decimal(5,1) DEFAULT '0.0',
  `height_base_pro` decimal(5,1) DEFAULT '0.0',
  `volume_base_pro` decimal(10,1) DEFAULT '0.0',
  `manage_inner_pack` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `umb_inner_pack` int(11) DEFAULT NULL,
  `dun_inner_pack` int(11) DEFAULT NULL,
  `net_weight_inner_pack` decimal(8,3) DEFAULT '0.000',
  `gross_weight_inner_pack` decimal(8,3) DEFAULT '0.000',
  `long_inner_pack` decimal(5,1) DEFAULT NULL,
  `width_inner_pack` decimal(5,1) DEFAULT '0.0',
  `height_inner_pack` decimal(5,1) DEFAULT '0.0',
  `volume_inner_pack` decimal(10,1) DEFAULT '0.0',
  `handle_master_box` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `umb_manage_box` int(11) DEFAULT NULL,
  `dun_manage_box` int(11) DEFAULT NULL,
  `net_weight_manage_box` decimal(8,3) DEFAULT '0.000',
  `gross_weight_manage_box` decimal(8,3) DEFAULT '0.000',
  `long_manage_box` decimal(5,1) DEFAULT '0.0',
  `width_manage_box` decimal(5,1) DEFAULT '0.0',
  `height_manage_box` decimal(5,1) DEFAULT '0.0',
  `volume_manage_box` decimal(10,1) DEFAULT '0.0',
  `handle_layer` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `umb_layer` int(11) DEFAULT NULL,
  `dun_layer` int(11) DEFAULT NULL,
  `net_weight_layer` decimal(5,1) DEFAULT '0.0',
  `gross_weight_layer` decimal(5,1) DEFAULT '0.0',
  `long_layer` decimal(5,1) DEFAULT '0.0',
  `width_layer` decimal(5,1) DEFAULT '0.0',
  `height_layer` decimal(5,1) DEFAULT '0.0',
  `volume_layer` decimal(10,1) DEFAULT '0.0',
  `handle_pallet` tinyint(3) unsigned DEFAULT '0',
  `umb_pallet` int(11) DEFAULT NULL,
  `dun_pallet` int(11) DEFAULT NULL,
  `net_weight_pallet` decimal(5,1) DEFAULT '0.0',
  `gross_weight_pallet` decimal(5,1) DEFAULT '0.0',
  `long_pallet` decimal(5,1) DEFAULT '0.0',
  `width_pallet` decimal(5,1) DEFAULT '0.0',
  `height_pallet` decimal(5,1) DEFAULT '0.0',
  `volume_pallet` decimal(10,1) DEFAULT '0.0',
  `ump` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transport_group` text COLLATE utf8mb4_unicode_ci,
  `lead_time` int(11) DEFAULT NULL,
  `main_supplier` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workweek` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_with_expiration` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `lifetime_product_base` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_storage_of_product` int(11) DEFAULT NULL,
  `sun_exposure` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `temperature` int(11) DEFAULT NULL,
  `humidity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'DS459037','459037','VG2439SMH','MT VWS VG2439SMH 24\'\' HDMI/VGA',1,223,'234234234',21.000,22.000,32.0,21.0,32.0,42122.0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'master_box',NULL,1234,NULL,'L-S',1,NULL,8,1,NULL,1);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `protection_shop_tokens`
--

DROP TABLE IF EXISTS `protection_shop_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `protection_shop_tokens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `success_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cancel_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `success_url_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cancel_url_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pst_unique` (`user_id`,`success_url`,`cancel_url`),
  KEY `protection_shop_tokens_number_index` (`number`),
  KEY `protection_shop_tokens_expires_index` (`expires`),
  CONSTRAINT `pst_foreign_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `protection_shop_tokens`
--

LOCK TABLES `protection_shop_tokens` WRITE;
/*!40000 ALTER TABLE `protection_shop_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `protection_shop_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `protection_validations`
--

DROP TABLE IF EXISTS `protection_validations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `protection_validations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `ttl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `validation_result` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_user` (`user_id`),
  KEY `protection_validations_ttl_index` (`ttl`),
  CONSTRAINT `pv_foreign_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `protection_validations`
--

LOCK TABLES `protection_validations` WRITE;
/*!40000 ALTER TABLE `protection_validations` DISABLE KEYS */;
/*!40000 ALTER TABLE `protection_validations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'administrator',0),(2,'authenticated',0);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_accounts`
--

DROP TABLE IF EXISTS `social_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `provider` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `social_accounts_user_id_provider_provider_id_index` (`user_id`,`provider`,`provider_id`),
  CONSTRAINT `social_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_accounts`
--

LOCK TABLES `social_accounts` WRITE;
/*!40000 ALTER TABLE `social_accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `social_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `confirmation_code` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rut` int(11) NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_rut_unique` (`rut`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@admin.com','$2y$10$TPxlrbsxAkSAZuGhD54UjeYHZXToO34avDOdbxZ77RCKl/vxdYvse',1,'ca9cfe71-001e-45da-a088-118562af118c',76124329,1,NULL,'2018-05-08 12:58:02','2018-05-08 12:58:02',NULL),(2,'Demo','demo@admin.com','$2y$10$iWnmaGowoTmkkxaRwXVspOngcHCT5GYXlDa.K0tC.0c0/AjbJZMOW',1,'addd0b69-1b04-4e95-ac2b-c1b001c068d6',76072001,1,NULL,'2018-05-08 12:58:02','2018-05-08 12:58:02',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_roles`
--

DROP TABLE IF EXISTS `users_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_roles` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  UNIQUE KEY `users_roles_user_id_role_id_unique` (`user_id`,`role_id`),
  KEY `foreign_role` (`role_id`),
  CONSTRAINT `foreign_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `foreign_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_roles`
--

LOCK TABLES `users_roles` WRITE;
/*!40000 ALTER TABLE `users_roles` DISABLE KEYS */;
INSERT INTO `users_roles` VALUES (1,1),(2,1),(1,2),(2,2);
/*!40000 ALTER TABLE `users_roles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-08 17:34:29
