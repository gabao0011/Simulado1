CREATE DATABASE IF NOT EXISTS `almoxarifado_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `almoxarifado_db`;

CREATE TABLE IF NOT EXISTS `users` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `remember_token` VARCHAR(100) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `users_email_unique` (`email` ASC)
);

CREATE TABLE IF NOT EXISTS `produtos` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `prazo_validade` DATE NOT NULL,
  `caracteristicas` TEXT NULL DEFAULT NULL,
  `valor` DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
  `qtd_estoque` INT NOT NULL DEFAULT 0,
  `qtd_minima` INT NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `movimentacoes` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_produto` BIGINT UNSIGNED NOT NULL,
  `tipo` ENUM('entrada', 'saida') NOT NULL,
  `quantidade_movimentada` INT NOT NULL,
  `data_movimentacao` DATE NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_movimentacoes_produtos`
    FOREIGN KEY (`id_produto`)
    REFERENCES `produtos` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) 
VALUES (
  1, 
  'Administrador', 
  'admin@admin.com', 
  '\$2y\$12\$6pXoD.gZk4G1hM3j0O3hHeN9rI6R0Z8FvH88Rz5hG5hG5hG5hG5hG', 
  NOW(), 
  NOW()
) ON DUPLICATE KEY UPDATE `id`=`id`;

INSERT INTO `produtos` (`id`, `nome`, `prazo_validade`, `caracteristicas`, `valor`, `qtd_estoque`, `qtd_minima`, `created_at`, `updated_at`)
VALUES (
  1, 
  'Cimento', 
  '2031-02-20', 
  'Acabamento, Peso: 5Kg', 
  30.00, 
  15, 
  10, 
  NOW(), 
  NOW()
) ON DUPLICATE KEY UPDATE `id`=`id`;
