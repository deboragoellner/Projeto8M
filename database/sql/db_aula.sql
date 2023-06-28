-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para db_pweb2_2023_1
CREATE DATABASE IF NOT EXISTS `db_pweb2_2023_1` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_pweb2_2023_1`;

-- Copiando estrutura para tabela db_pweb2_2023_1.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_pweb2_2023_1.categoria: ~3 rows (aproximadamente)
INSERT INTO `categoria` (`id`, `nome`, `created_at`, `updated_at`) VALUES
	(2, 'Masculino', NULL, NULL),
	(3, 'Feminino', NULL, NULL),
	(4, 'Outros', NULL, NULL);

-- Copiando estrutura para tabela db_pweb2_2023_1.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_pweb2_2023_1.failed_jobs: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_pweb2_2023_1.locais_acolhimento
CREATE TABLE IF NOT EXISTS `locais_acolhimento` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_pweb2_2023_1.locais_acolhimento: ~0 rows (aproximadamente)
INSERT INTO `locais_acolhimento` (`id`, `nome`, `latitude`, `longitude`, `telefone`, `endereco`, `created_at`, `updated_at`) VALUES
	(8, 'Delegacia de Proteção à Criança, Adolescente, Mulher e Idoso', '-27.1043492', '-52.6339925', '332265465', 'Centro', '2023-06-29 01:12:28', '2023-06-29 01:12:28'),
	(9, 'Rede Feminina de Combate Ao Câncer', '-27.112431', '-52.6146057', '99561465', 'Centro', '2023-06-29 01:13:13', '2023-06-29 01:13:13'),
	(10, 'Clínica da Mulher Chapecoense', '-27.1043102', '-52.6339925', '335265354', 'Centro', '2023-06-29 01:14:00', '2023-06-29 01:14:00'),
	(11, 'Abrigo da mulher', '-27.1090126', '-52.6144833', '654635213', 'Centro', '2023-06-29 01:15:12', '2023-06-29 01:15:12');

-- Copiando estrutura para tabela db_pweb2_2023_1.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_pweb2_2023_1.migrations: ~0 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_04_14_165129_create_usuario', 1),
	(6, '2023_04_28_175149_create_categorias_table', 1),
	(7, '2023_06_07_175245_create_locais_acolhimento', 1),
	(8, '2023_06_07_175307_create_noticias', 1);

-- Copiando estrutura para tabela db_pweb2_2023_1.noticias
CREATE TABLE IF NOT EXISTS `noticias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conteudo` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `informacoes` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_pweb2_2023_1.noticias: ~1 rows (aproximadamente)
INSERT INTO `noticias` (`id`, `titulo`, `imagem`, `conteudo`, `informacoes`, `created_at`, `updated_at`) VALUES
	(6, '8M Chapecó: “o empoderamento feminino é empoderamento da sociedade”', 'imagem/20230628220558.jpeg', 'A importância do empoderamento feminino', 'Ações para que mulheres se sintam empoderadas', '2023-06-29 01:05:58', '2023-06-29 01:05:58'),
	(7, '8M EM CHAPECÓ (SC): MULHERES NA RUA, NA RESISTÊNCIA E NA LUTA POR DIREITOS', 'imagem/20230628220711.jpg', 'Atos em Chapecó', 'Em Chapecó, mulheres dos mais diversos setores se reuniram às 9h na praça central. Faixas, lenços e cartazes com frases de resistência e de reivindicação, compunham o cenário. Após as falas das representantes dos blocos, foi realizada uma caminhada na principal avenida da cidade.', '2023-06-29 01:07:11', '2023-06-29 01:07:11'),
	(8, '8M: mulheres de SC irão às ruas contra Bolsonaro, por democracia e fim da violência', 'imagem/20230628220848.jpg', 'Atos nas ruas', 'Mais uma vez, o Dia Internacional da Mulher, celebrado no dia 8 de março (#8M), será marcado por protestos em todo país. Neste ano, o “grito” das mulheres será contra Jair Bolsonaro.', '2023-06-29 01:08:48', '2023-06-29 01:08:48');

-- Copiando estrutura para tabela db_pweb2_2023_1.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_pweb2_2023_1.password_resets: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_pweb2_2023_1.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_pweb2_2023_1.personal_access_tokens: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_pweb2_2023_1.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_pweb2_2023_1.users: ~1 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@admin.com', NULL, '$2y$10$OR4U0xSnSMK7oJcVz4VGGOnN9yTSASjqKSUrsZn4R6NrxFlsWLgeW', NULL, '2023-06-28 23:42:38', '2023-06-28 23:42:38');

-- Copiando estrutura para tabela db_pweb2_2023_1.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categoria_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `usuario_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_pweb2_2023_1.usuario: ~0 rows (aproximadamente)
INSERT INTO `usuario` (`id`, `nome`, `telefone`, `email`, `imagem`, `created_at`, `updated_at`, `categoria_id`) VALUES
	(4, 'Vitória', '49 985858747', 'vivi@vivi.com', NULL, '2023-06-29 01:10:34', '2023-06-29 01:10:34', 3),
	(5, 'Manueli', '49 855635464', 'manu@manu.com', NULL, '2023-06-29 01:10:55', '2023-06-29 01:10:55', 3),
	(6, 'Débora', '49 55255695', 'deb@deb.com', NULL, '2023-06-29 01:11:15', '2023-06-29 01:11:15', 3),
	(7, 'Manoela', '49 9695656354', 'manu@manu.com', NULL, '2023-06-29 01:11:29', '2023-06-29 01:11:29', 3);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
