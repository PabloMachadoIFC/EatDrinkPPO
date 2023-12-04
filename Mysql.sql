-- Banco de dados: `eatdrink`

-- --------------------------------------------------------

-- Estrutura da tabela `category`
CREATE TABLE `category` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) DEFAULT NULL,
  `establishment_id` INT(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `establishment_id` (`establishment_id`),
  CONSTRAINT `category_ibfk_1` FOREIGN KEY (`establishment_id`) REFERENCES `establishment` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `category` (`id`, `name`, `establishment_id`) VALUES
(22, 'Porções', 2),
(23, 'Pizza', 2),
(24, 'Bebida', 2);

-- --------------------------------------------------------

-- Estrutura da tabela `culinarystyles`
CREATE TABLE `culinarystyles` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `culinarystyles` (`id`, `name`) VALUES
(1, 'Bar & Petiscaria'),
(2, 'Bar & Restaurante'),
(3, 'Bistro'),
(4, 'Buffet'),
(5, 'Cafeteria'),
(6, 'Culinária Italiana');

-- --------------------------------------------------------

-- Estrutura da tabela `establishment`
CREATE TABLE `establishment` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `cnpj` VARCHAR(20) NOT NULL,
  `zip_code` VARCHAR(10) NOT NULL,
  `phone` VARCHAR(20) NOT NULL,
  `address` VARCHAR(150) NOT NULL,
  `culinary_style_id` INT(11) NOT NULL,
  `owner_id` INT(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_establishment_culinary_style` (`culinary_style_id`),
  KEY `fk_establishment_owner` (`owner_id`),
  CONSTRAINT `fk_establishment_culinary_style` FOREIGN KEY (`culinary_style_id`) REFERENCES `culinarystyles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_establishment_owner` FOREIGN KEY (`owner_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `establishment` (`id`, `name`, `cnpj`, `zip_code`, `phone`, `address`, `culinary_style_id`, `owner_id`) VALUES
(1, 'IFC A', '1111111111', '89160079', '4002-8922', 'Rua Manoel Livramento , Centro , Rio do Sul , SC', 4, 4),
(2, 'IFC Marcela', '123123', '89160101', '40028922', 'Rua Manoel José Teixeira , Centro , Rio do Sul , SC', 3, 5);

-- --------------------------------------------------------

-- Estrutura da tabela `ingredient`
CREATE TABLE `ingredient` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Estrutura da tabela `order`
CREATE TABLE `order` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `order_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Estrutura da tabela `order_product`
CREATE TABLE `order_product` (
  `order_id` INT(11) NOT NULL,
  `product_id` INT(11) NOT NULL,
  `quantity` INT(11) NOT NULL,
  PRIMARY KEY (`order_id`, `product_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Estrutura da tabela `password_recovery`
CREATE TABLE `password_recovery` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `start_date` DATETIME NOT NULL,
  `expiry_date` DATETIME NOT NULL,
  `token` VARCHAR(128) NOT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_user_id` (`user_id`),
  CONSTRAINT `password_recovery_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `password_recovery` (`id`, `start_date`, `expiry_date`, `token`, `user_id`) VALUES
(1, '2023-08-22 14:46:29', '2023-08-22 15:01:29', '952272', 5),
(2, '2023-09-05 14:40:04', '2023-09-05 14:55:04', '741792', 4);

-- --------------------------------------------------------

-- Estrutura da tabela `product`
CREATE TABLE `product` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `price` INT(11) NOT NULL,
  `img` VARCHAR(255) NOT NULL,
  `category_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `product` (`id`, `name`, `description`, `price`, `img`, `category_id`) VALUES
(25, 'Batata', 'Batata', 123, 'porcao2.jpg', 22),
(26, 'Porção Macarrão', 'Porção Macarrão', 123, 'porcao1.jpg', 22);

-- --------------------------------------------------------

-- Estrutura da tabela `product_ingredient`
CREATE TABLE `product_ingredient` (
  `product_id` INT(11) NOT NULL,
  `ingredient_id` INT(11) NOT NULL,
  PRIMARY KEY (`product_id`, `ingredient_id`),
  KEY `ingredient_id` (`ingredient_id`),
  CONSTRAINT `product_ingredient_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_ingredient_ibfk_2` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredient` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Estrutura da tabela `user`
CREATE TABLE `user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `registration_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(4, '', 'ifc@gmail.com', '123'),
(5, '', 'marcela@gmail.com', '321');

-- --------------------------------------------------------

-- AUTO_INCREMENT de tabelas despejadas

-- AUTO_INCREMENT de tabela `category`
ALTER TABLE `category` MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

-- AUTO_INCREMENT de tabela `culinarystyles`
ALTER TABLE `culinarystyles` MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

-- AUTO_INCREMENT de tabela `establishment`
ALTER TABLE `establishment` MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- AUTO_INCREMENT de tabela `ingredient`
ALTER TABLE `ingredient` MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT de tabela `order`
ALTER TABLE `order` MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT de tabela `password_recovery`
ALTER TABLE `password_recovery` MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- AUTO_INCREMENT de tabela `product`
ALTER TABLE `product` MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

-- AUTO_INCREMENT de tabela `user`
ALTER TABLE `user` MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

-- Restrições para despejos de tabelas

-- Limitadores para a tabela `category`
ALTER TABLE `category` ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`establishment_id`) REFERENCES `establishment` (`id`);

-- Limitadores para a tabela `establishment`
ALTER TABLE `establishment`
  ADD CONSTRAINT `fk_establishment_culinary_style` FOREIGN KEY (`culinary_style_id`) REFERENCES `culinarystyles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_establishment_owner` FOREIGN KEY (`owner_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

-- Limitadores para a tabela `order`
ALTER TABLE `order` ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- Limitadores para a tabela `order_product`
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

-- Limitadores para a tabela `password_recovery`
ALTER TABLE `password_recovery` ADD CONSTRAINT `password_recovery_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- Limitadores para a tabela `product_ingredient`
ALTER TABLE `product_ingredient`
  ADD CONSTRAINT `product_ingredient_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_ingredient_ibfk_2` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredient` (`id`) ON DELETE CASCADE;

COMMIT;
