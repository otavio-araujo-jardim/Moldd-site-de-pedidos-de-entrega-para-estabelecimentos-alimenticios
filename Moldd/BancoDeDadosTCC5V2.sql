CREATE DATABASE dbtccV5
DEFAULT CHARACTER SET UTF8
DEFAULT COLLATE UTF8_GENERAL_CI;

USE dbtccV5;

CREATE TABLE IF NOT EXISTS `usuario` ( 
  `id_usuario` INT         NOT NULL AUTO_INCREMENT,
  `email`      VARCHAR(50) NOT NULL,
  `senha`      VARCHAR(50) NOT NULL,    
  
  CONSTRAINT `pk_usuario` PRIMARY KEY (`id_usuario`)
  )DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` INT		   NOT NULL,
  `nome`       VARCHAR(100) NOT NULL,
  `telefone`   VARCHAR(14)         NOT NULL,  
  
  CONSTRAINT `pk_cliente`              PRIMARY KEY (`id_cliente`),
  CONSTRAINT `fk_id_cliente_usuario`   FOREIGN KEY (`id_cliente`)   REFERENCES `usuario` (`id_usuario`)
  )DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS `estabelecimento` (
  `id_estabelecimento` 			   INT          NOT NULL,
  `nome` 				   VARCHAR(100)  NOT NULL,
  `telefone` 			   CHAR(14)      NOT NULL,
  `tipo` 				   VARCHAR(50)   NOT NULL,
  `cnpj` 				   CHAR(18)      NOT NULL,
  `estado` 				   CHAR(2)       NOT NULL,
  `endereco` 			   VARCHAR(100)  NOT NULL,
  `numero` 				   INT           NOT NULL,
  `cep` 				   CHAR(9)       NOT NULL,
  `complemento`  		   VARCHAR(150)  NOT NULL,
  `nome_representante`     VARCHAR(100)  NOT NULL,
  `email_representante`    VARCHAR(100)  NOT NULL,
  `telefone_representante` VARCHAR(14) 	 NOT NULL,  
  `frete`                  DECIMAL(10,2) NOT NULL,
  `hora_inicio_dom`        TIME,
  `hora_encerramento_dom`  TIME,
  `hora_inicio_seg`        TIME,
  `hora_encerramento_seg`  TIME,
  `hora_inicio_ter`        TIME,
  `hora_encerramento_ter`  TIME,
  `hora_inicio_qua`        TIME,
  `hora_encerramento_qua`  TIME,
  `hora_inicio_qui`        TIME,
  `hora_encerramento_qui`  TIME,
  `hora_inicio_sex`        TIME,
  `hora_encerramento_sex`  TIME,
  `hora_inicio_sab`        TIME,
  `hora_encerramento_sab`  TIME,

  

  CONSTRAINT `pk_estabelecimento` 					PRIMARY KEY (`id_estabelecimento`),
  CONSTRAINT `fk_estabelecimento_usuario`   FOREIGN KEY (`id_estabelecimento`)   REFERENCES `usuario` (`id_usuario`)
  )DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS `endereco` (
  `id_endereco` INT          NOT NULL AUTO_INCREMENT,
  `numero`      INT          NOT NULL,
  `endereco`    VARCHAR(100) NOT NULL,
  `estado`      CHAR(2) NOT NULL,
  `complemento` VARCHAR(150) NOT NULL,
  `cep`         CHAR(9)      NOT NULL,
  `id_cliente`  INT          NOT NULL,
  
  CONSTRAINT `pk_endereco`           PRIMARY KEY (`id_endereco`),
  CONSTRAINT `fk_endereco_cliente`   FOREIGN KEY (`id_cliente`)   REFERENCES `cliente` (`id_cliente`)
)DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS `produto` (
  `id_Produto`         INT           NOT NULL AUTO_INCREMENT,
  `nome`               VARCHAR(100)  NOT NULL,
  `preco`              DECIMAL(10,2) NOT NULL,
  `ativo` 			   BOOLEAN       NOT NULL,
  `excluido`		   BOOLEAN 		 NOT NULL,
  `id_estabelecimento` INT           NOT NULL,
  
  CONSTRAINT `pk_produto`                   PRIMARY KEY (`id_Produto`),
  CONSTRAINT `fk_produto_estabelecimento`   FOREIGN KEY (`id_estabelecimento`)   REFERENCES `estabelecimento` (`id_estabelecimento`)
  )DEFAULT CHARSET = utf8;
  
  CREATE TABLE IF NOT EXISTS `pedido` (
  `id_pedido`          INT  	NOT NULL AUTO_INCREMENT,
  `data_entrega`       DATETIME NOT NULL,
  `data_realizacao`    DATETIME NOT NULL,
  `finalizado` 		   BOOLEAN  NOT NULL,
  `id_endereco`        INT  	NOT NULL,
  `id_cliente`         INT  	NOT NULL,
  `id_estabelecimento` INT  	NOT NULL,
  
  CONSTRAINT `pk_pedido`                   PRIMARY KEY (`id_pedido`),  
  CONSTRAINT `fk_pedido_endereco`          FOREIGN KEY (`id_endereco`)          REFERENCES `endereco` (`id_endereco`),
  CONSTRAINT `fk_pedido_cliente`           FOREIGN KEY (`id_cliente`)           REFERENCES `cliente` (`id_cliente`),
  CONSTRAINT `fk_pedido_estabelecimento`   FOREIGN KEY (`id_estabelecimento`)   REFERENCES `estabelecimento` (`id_estabelecimento`)
)DEFAULT CHARSET = utf8;
  
  CREATE TABLE IF NOT EXISTS `item` (
  `id_produto`   INT           NOT NULL AUTO_INCREMENT,
  `id_pedido`    INT           NOT NULL,
  `quantidade`   INT           NOT NULL,
  `solicitacao`  VARCHAR(150)  NOT NULL,
  `preco`        DECIMAL(10,2) NOT NULL,
  
  CONSTRAINT `pk_produto_pedido` PRIMARY KEY (`id_produto`, `id_pedido`),
  CONSTRAINT `fk_item_pedido`    FOREIGN KEY (`id_pedido`)    REFERENCES `pedido` (`id_pedido`),
  CONSTRAINT `fk_item_produto`   FOREIGN KEY (`id_produto`)   REFERENCES `produto` (`id_produto`)
  )DEFAULT CHARSET = utf8;
  
  CREATE TABLE IF NOT EXISTS `comentario` (
  `id_comentario`      INT           NOT NULL AUTO_INCREMENT,
  `texto`              VARCHAR (400) NOT NULL,
  `id_estabelecimento` INT           NOT NULL,
  `id_cliente`         INT           NOT NULL,

  CONSTRAINT `pk_comentario`                   PRIMARY KEY (`id_comentario`),
  CONSTRAINT `fk_comentario_estabelecimento`   FOREIGN KEY (`id_estabelecimento`)   REFERENCES `estabelecimento` (`id_estabelecimento`),
  CONSTRAINT `fk_comentario_cliente`           FOREIGN KEY (`id_cliente`)           REFERENCES `cliente` (`id_cliente`)
  )DEFAULT CHARSET = utf8;
  
  
  CREATE TABLE `estrelas` (
  `id_cliente`      	INT           NOT NULL,
  `id_estabelecimento`  INT           NOT NULL,
  `num_estrelas`      	INT           NOT NULL,
  
  CONSTRAINT `id_cliente_estabelecimento`  		PRIMARY KEY (`id_cliente`,`id_estabelecimento`),
  CONSTRAINT `fk_estrelas_cliente`          	FOREIGN KEY (`id_cliente`)           					REFERENCES `cliente` (`id_cliente`),
  CONSTRAINT `fk_estrelas_estabelecimento`      FOREIGN KEY (`id_estabelecimento`)           			REFERENCES `estabelecimento` (`id_estabelecimento`)
  );


INSERT INTO `usuario` (`id_usuario`, `email`, `senha`) 
			   VALUES (NULL, 'cliente@pao.com', '123');

INSERT INTO `usuario` (`id_usuario`, `email`, `senha`) 
			   VALUES (NULL, 'estabelecimento@pao.com', '123');

INSERT INTO `cliente` (`id_cliente`, `nome`, `telefone`) 
			   VALUES ('1', 'Gordon Freeman', '(16)98888-8888');

INSERT INTO `estabelecimento` (`id_estabelecimento`, `nome`, `telefone`, `tipo`, `cnpj`, `estado`, `endereco`, `numero`, `cep`, `complemento`, `nome_representante`, `email_representante`, `telefone_representante`, `frete`, `hora_inicio_dom`, `hora_encerramento_dom`, `hora_inicio_seg`, `hora_encerramento_seg`, `hora_inicio_ter`, `hora_encerramento_ter`, `hora_inicio_qua`, `hora_encerramento_qua`, `hora_inicio_qui`, `hora_encerramento_qui`, `hora_inicio_sex`, `hora_encerramento_sex`, `hora_inicio_sab`, `hora_encerramento_sab`)
                       VALUES ('2', 'Sãbuei', '(16)97777-7777', 'Food Truck', '12.345.678/9100-01', 'SP', 'R.Pará', '100', '14600-000', 'Do lado do Méqui Donaldys', 'kleiner', 'kleiner@pao.com', '(16)96666-6666', '15.99', '13:00:00', '21:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

INSERT INTO `endereco` (`id_endereco`, `numero`, `endereco`, `estado`, `complemento`, `cep`, `id_cliente`) 
				VALUES (NULL, '266', 'R. Rio de Janeiro', 'SP', 'Do lado direito de uma casa', '14600-000', '1');
                
INSERT INTO `endereco` (`id_endereco`, `numero`, `endereco`, `estado`, `complemento`, `cep`, `id_cliente`) 
				VALUES (NULL, '2120', 'R. São Paulo', 'SP', 'Na frente de uma casa', '14600-000', '1');

INSERT INTO `endereco` (`id_endereco`, `numero`, `endereco`, `estado`, `complemento`, `cep`, `id_cliente`) 
				VALUES (NULL, '253', 'R. São Joaquim', 'SP', '''Do lado esquerdo de uma casa', '14600-000', '1');
                
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`,`id_estabelecimento`) 
			   VALUES (NULL, 'Pão', '99999.99', true, false, '2');
               
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			   VALUES (NULL, 'arroys', '2.59', false, false, '2');

INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			   VALUES (NULL, 'Ascóvy', '0.05', true, false, '2');
               
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			   VALUES (NULL, 'Rãfouz', '25.79', true, false, '2');
               
INSERT INTO `pedido` (`id_pedido`, `data_entrega`, `data_realizacao`, `finalizado`, `id_endereco`, `id_cliente`, `id_estabelecimento`) 
			  VALUES (NULL, '2017-04-07 15:00:00', '2017-03-31 13:00:00', false, '3', '1', '2');

INSERT INTO `item` (`id_produto`, `id_pedido`, `quantidade`, `solicitacao`, `preco`) 
			VALUES ('4', '1', '7', 'sem batata', '25.79');
            
INSERT INTO `item` (`id_produto`, `id_pedido`, `quantidade`, `solicitacao`, `preco`) 
			VALUES ('1', '1', '8001', 'Sem Veneno', '99999.99');
            
INSERT INTO `item` (`id_produto`, `id_pedido`, `quantidade`, `solicitacao`, `preco`) 
			VALUES ('3', '1', '1', 'Sem alcou', '0.05');
            
INSERT INTO `usuario` (`id_usuario`, `email`, `senha`) 
			VALUES (NULL, 'JFoodcomeudemais@pao.com', '123');
            
INSERT INTO `estabelecimento` (`id_estabelecimento`, `nome`, `telefone`, `tipo`, `cnpj`, `estado`, `endereco`, `numero`, `cep`, `complemento`, `nome_representante`, `email_representante`, `telefone_representante`, `frete`, `hora_inicio_dom`, `hora_encerramento_dom`, `hora_inicio_seg`, `hora_encerramento_seg`, `hora_inicio_ter`, `hora_encerramento_ter`, `hora_inicio_qua`, `hora_encerramento_qua`, `hora_inicio_qui`, `hora_encerramento_qui`, `hora_inicio_sex`, `hora_encerramento_sex`, `hora_inicio_sab`, `hora_encerramento_sab`)
			VALUES ('3', 'James Food', '(16)3831-0000', 'Fast-Food', '12.347.678/9100-02', 'SP', 'R. dos Bobos', '101', '14580-000', 'Em frente a porteira branca', 'James Bond', 'JamesBond@pao.com', '(16)99898-5862', '0', '00:00:00', '23:59:00', '00:00:00', '20:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			VALUES ('5', 'X-Tudo ', '45.65', true, false, '3');
            
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			VALUES ('6', 'X-Bacon ', '12.50', true, false, '3');

INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`)
			VALUES ('7', 'Cachorro quente ', '15.99', true, false, '3');

INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			VALUES ('8', 'Misto quente ', '6.99', false, false, '3');

INSERT INTO `usuario` (`id_usuario`, `email`, `senha`) 
			VALUES ('4', 'XablauzeraPJL@pao.com', '123');

INSERT INTO `cliente` (`id_cliente`, `nome`, `telefone`) 
			VALUES ('4', 'Kleberson', '(16)99300-2200');

INSERT INTO `endereco` (`id_endereco`, `numero`, `endereco`, `estado`, `complemento`, `cep`, `id_cliente`) 
			VALUES ('4', '71', 'R. Minas Gerais', 'SP', 'Em uma Rua', '14580-000', '4');
            
INSERT INTO `endereco` (`id_endereco`, `numero`, `endereco`, `estado`, `complemento`, `cep`, `id_cliente`) 
			VALUES ('5', '31', 'R. Ceara', 'SP', 'Em uma Calçada', '14580-000', '4');
            
INSERT INTO `endereco` (`id_endereco`, `numero`, `endereco`, `estado`, `complemento`, `cep`, `id_cliente`) 
			VALUES ('6', '156', 'R. Amazonas', 'SP', 'Na cidade de Deus', '14580-000', '4');
            
INSERT INTO `pedido` (`id_pedido`, `data_entrega`, `data_realizacao`, `finalizado`, `id_endereco`, `id_cliente`, `id_estabelecimento`) 
			VALUES ('2', '2017-04-12 10:36:19', '2017-04-04 03:31:37', false, '4', '4', '3');
            
INSERT INTO `pedido` (`id_pedido`, `data_entrega`, `data_realizacao`, `finalizado`, `id_endereco`, `id_cliente`, `id_estabelecimento`) 
			VALUES ('3', '2017-04-02 15:20:00', '2017-04-11 16:30:00', '0', '1', '1', '3');
            
INSERT INTO `pedido` (`id_pedido`, `data_entrega`, `data_realizacao`, `finalizado`, `id_endereco`, `id_cliente`, `id_estabelecimento`) 
			VALUES ('4', '2017-04-19 08:37:12', '2017-04-21 15:16:00', '0', '5', '4', '2');
            
INSERT INTO `item` (`id_produto`, `id_pedido`, `quantidade`, `solicitacao`, `preco`) 
			VALUES ('5', '2', '12', 'sem hamburguer', '45.65');

INSERT INTO `item` (`id_produto`, `id_pedido`, `quantidade`, `solicitacao`, `preco`) 
			VALUES ('6', '2', '1', 'sem Bacon', '12.50');
            
INSERT INTO `item` (`id_produto`, `id_pedido`, `quantidade`, `solicitacao`, `preco`) 
			VALUES ('7', '2', '5', 'sem Salsicha', '6.99');
            
INSERT INTO `item` (`id_produto`, `id_pedido`, `quantidade`, `solicitacao`, `preco`) 
			VALUES ('8', '2', '7', 'Frio', '15.99');
            
INSERT INTO `item` (`id_produto`, `id_pedido`, `quantidade`, `solicitacao`, `preco`) 
			VALUES ('6', '3', '2', '', '12.50');

INSERT INTO `item` (`id_produto`, `id_pedido`, `quantidade`, `solicitacao`, `preco`) 
			VALUES ('7', '3', '10', 'sem molho', '15.99');
            
INSERT INTO `item` (`id_produto`, `id_pedido`, `quantidade`, `solicitacao`, `preco`) 
			VALUES ('3', '4', '1', '', '0.05');
            
INSERT INTO `item` (`id_produto`, `id_pedido`, `quantidade`, `solicitacao`, `preco`) 
			VALUES ('4', '4', '7', 'com bastante ar', '25.79');
            
INSERT INTO `comentario` (`id_comentario`, `texto`, `id_estabelecimento`, `id_cliente`) 
			VALUES ('1', 'Chegou bem rápido, porém frio', '2', '1');
            
INSERT INTO `comentario` (`id_comentario`, `texto`, `id_estabelecimento`, `id_cliente`) 
			VALUES ('2', 'Meu Deus parece que jogou a comida no lixo, passou por cima e me trouxe', '3', '1');

INSERT INTO `comentario` (`id_comentario`, `texto`, `id_estabelecimento`, `id_cliente`) 
			VALUES ('3', 'Comida gostosa e saborosa, aprovei !!', '3', '4');
            
INSERT INTO `comentario` (`id_comentario`, `texto`, `id_estabelecimento`, `id_cliente`) 
			VALUES ('4', 'Meu Deus!! Encontrei cabelo aqui...', '2', '4');

INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('1', '2', '5');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('1', '3', '2');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('4', '2', '3');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('4', '3', '4');
            
            
            


-- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- 






INSERT INTO `usuario` (`id_usuario`, `email`, `senha`)
			VALUES (NULL, 'Hacker@pao.com', '123');
            
INSERT INTO `usuario` (`id_usuario`, `email`, `senha`)
			VALUES (NULL, 'Deleto@pao.com', '123');
            
INSERT INTO `usuario` (`id_usuario`, `email`, `senha`)
			VALUES (NULL, 'Digito@pao.com', '123');
            
INSERT INTO `usuario` (`id_usuario`, `email`, `senha`)
			VALUES (NULL, 'Bart@pao.com', '123');
            
INSERT INTO `usuario` (`id_usuario`, `email`, `senha`)
			VALUES (NULL, 'MComida@pao.com', '123');
            
INSERT INTO `usuario` (`id_usuario`, `email`, `senha`)
			VALUES (NULL, 'Jantaboa@pao.com', '123');
            
INSERT INTO `usuario` (`id_usuario`, `email`, `senha`)
			VALUES (NULL, 'Comeengorda@pao.com', '123');
            
INSERT INTO `usuario` (`id_usuario`, `email`, `senha`)
			VALUES (NULL, 'Almoçonoprato@pao.com', '123');
            
INSERT INTO `usuario` (`id_usuario`, `email`, `senha`)
			VALUES (NULL, 'Bomprato@pao.com', '123');
            
INSERT INTO `usuario` (`id_usuario`, `email`, `senha`)
			VALUES (NULL, 'Pratopronto@pao.com', '123');
            
INSERT INTO `usuario` (`id_usuario`, `email`, `senha`)
			VALUES (NULL, 'Pratofeito@pao.com', '123');

INSERT INTO `usuario` (`id_usuario`, `email`, `senha`)
			VALUES (NULL, 'Comeuencheu@pao.com', '123');

INSERT INTO `usuario` (`id_usuario`, `email`, `senha`)
			VALUES (NULL, 'Pediuchegou@pao.com', '123');
            
INSERT INTO `cliente` (`id_cliente`, `nome`, `telefone`) 
            VALUES ('5', 'Hacker', '(16)9435-5951');
            
INSERT INTO `cliente` (`id_cliente`, `nome`, `telefone`) 
            VALUES ('6', 'Deleto', '(16)9367-5951');

INSERT INTO `cliente` (`id_cliente`, `nome`, `telefone`) 
            VALUES ('7', 'Digito', '(16)9827-5951');

INSERT INTO `cliente` (`id_cliente`, `nome`, `telefone`) 
            VALUES ('8', 'Bart', '(16)9666-5951');

INSERT INTO `estabelecimento` (`id_estabelecimento`, `nome`, `telefone`, `tipo`, `cnpj`, `estado`, `endereco`, `numero`, `cep`, `complemento`, `nome_representante`, `email_representante`, `telefone_representante`, `frete`, `hora_inicio_dom`, `hora_encerramento_dom`, `hora_inicio_seg`, `hora_encerramento_seg`, `hora_inicio_ter`, `hora_encerramento_ter`, `hora_inicio_qua`, `hora_encerramento_qua`, `hora_inicio_qui`, `hora_encerramento_qui`, `hora_inicio_sex`, `hora_encerramento_sex`, `hora_inicio_sab`, `hora_encerramento_sab`)
			VALUES ('9', 'MComida', '(16)8888-6665', 'Restaurante', '12.347.678/9100-03', 'SP', 'R. José Rodrigues Sampaio', '265', '13560-710', 'Conteiner', 'Lucas', 'MComida@pao.com', '(16)8888-6664', '2.00', '07:09:00', '19:00:00', '07:00:00', '20:00:00', '07:00:00', '20:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
            
INSERT INTO `estabelecimento` (`id_estabelecimento`, `nome`, `telefone`, `tipo`, `cnpj`, `estado`, `endereco`, `numero`, `cep`, `complemento`, `nome_representante`, `email_representante`, `telefone_representante`, `frete`, `hora_inicio_dom`, `hora_encerramento_dom`, `hora_inicio_seg`, `hora_encerramento_seg`, `hora_inicio_ter`, `hora_encerramento_ter`, `hora_inicio_qua`, `hora_encerramento_qua`, `hora_inicio_qui`, `hora_encerramento_qui`, `hora_inicio_sex`, `hora_encerramento_sex`, `hora_inicio_sab`, `hora_encerramento_sab`)
			VALUES ('10', 'Janta boa', '(16)8888-1234', 'Delivery', '12.347.678/9100-04', 'SP', 'R. Nove de Julho', '1625', '13560-042', 'Conteiner', 'Marcelo', 'Jantaboa@pao.com', '(16)8954-6664', '0.00', '07:10:00', '20:00:00', '00:00:00', '20:00:00', '07:00:00', '20:00:00', '07:00:00', '20:00:00', NULL, NULL, NULL, NULL, NULL, NULL);
            
 INSERT INTO `estabelecimento` (`id_estabelecimento`, `nome`, `telefone`, `tipo`, `cnpj`, `estado`, `endereco`, `numero`, `cep`, `complemento`, `nome_representante`, `email_representante`, `telefone_representante`, `frete`, `hora_inicio_dom`, `hora_encerramento_dom`, `hora_inicio_seg`, `hora_encerramento_seg`, `hora_inicio_ter`, `hora_encerramento_ter`, `hora_inicio_qua`, `hora_encerramento_qua`, `hora_inicio_qui`, `hora_encerramento_qui`, `hora_inicio_sex`, `hora_encerramento_sex`, `hora_inicio_sab`, `hora_encerramento_sab`)
			VALUES ('11', 'Come engorda', '(16)8888-4321', 'Comida Congelada', '12.347.678/9100-05', 'SP', 'R. Riachuelo', '1201', '13560-110', 'Predio', 'Jonathan', 'Comeengorda@pao.com', '(16)8878-6664', '30.00', '07:30:00', '22:00:00', '07:30:00', '00:00:00', '07:30:00', '00:00:00', '07:30:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL);
            
INSERT INTO `estabelecimento` (`id_estabelecimento`, `nome`, `telefone`, `tipo`, `cnpj`, `estado`, `endereco`, `numero`, `cep`, `complemento`, `nome_representante`, `email_representante`, `telefone_representante`, `frete`, `hora_inicio_dom`, `hora_encerramento_dom`, `hora_inicio_seg`, `hora_encerramento_seg`, `hora_inicio_ter`, `hora_encerramento_ter`, `hora_inicio_qua`, `hora_encerramento_qua`, `hora_inicio_qui`, `hora_encerramento_qui`, `hora_inicio_sex`, `hora_encerramento_sex`, `hora_inicio_sab`, `hora_encerramento_sab`)
			VALUES ('12', 'Almoço no prato', '(16)5678-6665', 'Salgados e Doces P/ Festas', '12.347.678/9100-06', 'SP', 'Av. Trab. São-Carlense', '584', '13566-590', 'Predio', 'Lucas Cortez', 'Almoçonoprato@pao.com', '(16)9799-6664', '2.00', '07:20:00', '22:30:00', '00:00:00', '20:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
            
INSERT INTO `estabelecimento` (`id_estabelecimento`, `nome`, `telefone`, `tipo`, `cnpj`, `estado`, `endereco`, `numero`, `cep`, `complemento`, `nome_representante`, `email_representante`, `telefone_representante`, `frete`, `hora_inicio_dom`, `hora_encerramento_dom`, `hora_inicio_seg`, `hora_encerramento_seg`, `hora_inicio_ter`, `hora_encerramento_ter`, `hora_inicio_qua`, `hora_encerramento_qua`, `hora_inicio_qui`, `hora_encerramento_qui`, `hora_inicio_sex`, `hora_encerramento_sex`, `hora_inicio_sab`, `hora_encerramento_sab`)
			VALUES ('13', 'Bom prato', '(16)8765-6665', 'Bar ou Pub', '12.347.678/9100-07', 'SP', 'Av. Dr. Francisco Pereira Lopes', '2635', '13564-002', 'Conteiner', 'Otavio', 'Bomprato@pao.com', '(16)9006-6664', '700.00', '07:12:00', '19:45:00', '07:20:00', '00:30:00','07:20:00', '00:30:00', '07:20:00', '00:30:00', '07:20:00', '00:30:00', NULL, NULL, NULL, NULL);
            
INSERT INTO `estabelecimento` (`id_estabelecimento`, `nome`, `telefone`, `tipo`, `cnpj`, `estado`, `endereco`, `numero`, `cep`, `complemento`, `nome_representante`, `email_representante`, `telefone_representante`, `frete`, `hora_inicio_dom`, `hora_encerramento_dom`, `hora_inicio_seg`, `hora_encerramento_seg`, `hora_inicio_ter`, `hora_encerramento_ter`, `hora_inicio_qua`, `hora_encerramento_qua`, `hora_inicio_qui`, `hora_encerramento_qui`, `hora_inicio_sex`, `hora_encerramento_sex`, `hora_inicio_sab`, `hora_encerramento_sab`)
			VALUES ('14', 'Prato pronto', '(16)8888-9123', 'Cafeteria ou Lanches', '12.347.678/9100-08', 'SP', 'Av. Profº Luis Augusto de Oliveria', '385', '13566-340', 'Casa', 'Rogerio', 'Pratopronto@pao.com', '(16)9993-6664', '90.00', '08:09:00', '19:33:00', '07:20:00', '00:30:00', '07:20:00', '00:30:00', '07:20:00', '00:30:00', '07:20:00', '00:30:00', '07:20:00', '00:30:00', NULL, NULL);
            
INSERT INTO `estabelecimento` (`id_estabelecimento`, `nome`, `telefone`, `tipo`, `cnpj`, `estado`, `endereco`, `numero`, `cep`, `complemento`, `nome_representante`, `email_representante`, `telefone_representante`, `frete`, `hora_inicio_dom`, `hora_encerramento_dom`, `hora_inicio_seg`, `hora_encerramento_seg`, `hora_inicio_ter`, `hora_encerramento_ter`, `hora_inicio_qua`, `hora_encerramento_qua`, `hora_inicio_qui`, `hora_encerramento_qui`, `hora_inicio_sex`, `hora_encerramento_sex`, `hora_inicio_sab`, `hora_encerramento_sab`)
			VALUES ('15', 'Prato feito', '(16)3219-6665', 'Hotel', '12.347.678/9100-09', 'SP', 'R. Episcopal', '1661', '13560-160', 'Casa', 'Xinbinha', 'Pratofeito@pao.com', '(16)8888-7891', '1.99', '09:09:00', '19:59:59', '09:09:00', '20:30:00', '09:09:00', '20:30:00', '09:09:00', '20:30:00', '09:09:00', '20:30:00', '09:09:00', '20:30:00', '09:09:00', '20:30:00');
            
INSERT INTO `estabelecimento` (`id_estabelecimento`, `nome`, `telefone`, `tipo`, `cnpj`, `estado`, `endereco`, `numero`, `cep`, `complemento`, `nome_representante`, `email_representante`, `telefone_representante`, `frete`, `hora_inicio_dom`, `hora_encerramento_dom`, `hora_inicio_seg`, `hora_encerramento_seg`, `hora_inicio_ter`, `hora_encerramento_ter`, `hora_inicio_qua`, `hora_encerramento_qua`, `hora_inicio_qui`, `hora_encerramento_qui`, `hora_inicio_sex`, `hora_encerramento_sex`, `hora_inicio_sab`, `hora_encerramento_sab`)
			VALUES ('16', 'Comeu encheu', '(16)8888-1023', 'Praça de Alimentação', '12.347.678/9100-10', 'SP', 'Av. São Carlos', '3030', '13560-240', 'Loja', 'Evaldo', 'Comeuencheu@pao.com', '(16)8888-3215', '1.59', '06:09:00', '19:39:23', '06:09:00', '19:45:23', '06:09:00', '19:45:23', '06:09:00', '19:45:23', '06:09:00', '19:45:23', NULL, NULL, NULL, NULL);
            
INSERT INTO `estabelecimento` (`id_estabelecimento`, `nome`, `telefone`, `tipo`, `cnpj`, `estado`, `endereco`, `numero`, `cep`, `complemento`, `nome_representante`, `email_representante`, `telefone_representante`, `frete`, `hora_inicio_dom`, `hora_encerramento_dom`, `hora_inicio_seg`, `hora_encerramento_seg`, `hora_inicio_ter`, `hora_encerramento_ter`, `hora_inicio_qua`, `hora_encerramento_qua`, `hora_inicio_qui`, `hora_encerramento_qui`, `hora_inicio_sex`, `hora_encerramento_sex`, `hora_inicio_sab`, `hora_encerramento_sab`)
			VALUES ('17', 'Pediu chegou', '(16)8888-3201', 'Drive Thru', '12.347.678/9100-11', 'SP', 'R. Dom Pedro II', '1281', '13560-320', 'Loja', 'Andre', 'Pediuchegou@pao.com', '(16)8888-9872', '0.99', '12:09:00', '19:00:00', '00:00:00', '20:00:00', '06:09:00', '19:45:23', '06:09:00', '19:45:23', NULL, NULL, NULL, NULL, NULL, NULL);
            
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			VALUES ('9', 'Lanche', '15.50', true , false, '9');
            
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			VALUES ('10', 'X-Polenta', '15.90', true , false, '9');
            
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			VALUES ('11', 'Hamburgão de linguiça dichavada ', '18.50', true , false, '9');
            
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			VALUES ('12', 'PF', '19.50', true , false, '10');
            
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			VALUES ('13', 'X-capeta', '28.50', true , false, '10');
            
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			VALUES ('14', 'King Kong', '36.50', true , false, '10');
            
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			VALUES ('15', 'Apocalipse', '98.50', true , false, '11');
            
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			VALUES ('16', 'Excalibur ', '15.12', true , false, '11');
            
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			VALUES ('17', 'Super Contêiner', '15.25', true , false, '11');
            
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			VALUES ('18', 'Minha Carne Minha Vida', '15.99', true , false, '12');
            
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			VALUES ('19', 'Pizzaburguer', '32.50', true , false, '12');
            
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			VALUES ('20', 'Big Monstro', '22.50', true , false, '12');
            
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			VALUES ('21', 'Lanchinho básico', '36.50', true , false, '13');
            
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			VALUES ('22', 'Xis do Gelson', '27.50', true , false, '13');
            
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			VALUES ('23', 'Super Big Ignorância', '12.50', true , false, '13');
            
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			VALUES ('24', 'X-lombada', '1.50', true , false, '14');
            
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			VALUES ('25', 'X-calorta', '98.50', true , false, '14');
            
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			VALUES ('26', 'Febrão', '15.89', true , false, '14');
            
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			VALUES ('27', 'Lanchinho', '28.50', true , false, '15');
            
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			VALUES ('28', 'X-carga pesada ', '16.50', true , false, '15');
            
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			VALUES ('29', 'Escangalho', '25.50', true , false, '15');
            
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			VALUES ('30', 'Hot dog no… pote', '35.50', true , false, '16');
            
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			VALUES ('31', 'Alexandre, O Grande', '45.50', true , false, '16');
            
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			VALUES ('32', 'Ezequiel 25:17', '65.50', true , false, '16');
            
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			VALUES ('33', 'X-Hulk', '15.50', true , false, '17');
            
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			VALUES ('34', 'Negoção', '17.50', true , false, '17');
            
INSERT INTO `produto` (`id_Produto`, `nome`, `preco`, `ativo`, `excluido`, `id_estabelecimento`) 
			VALUES ('35', 'Pitbull', '19.50', true , false, '17');
            
INSERT INTO `endereco` (`id_endereco`, `numero`, `endereco`, `estado`, `complemento`, `cep`, `id_cliente`) 
			VALUES ('7', '73', 'R. Antonio Dias Telles', 'SP', 'Casa ', '14580-000', '5');
            
INSERT INTO `endereco` (`id_endereco`, `numero`, `endereco`, `estado`, `complemento`, `cep`, `id_cliente`) 
			VALUES ('8', '105', 'R. Geraldo Flauzino Gomes', 'SP', 'Casa ', '14580-000', '5');
            
INSERT INTO `endereco` (`id_endereco`, `numero`, `endereco`, `estado`, `complemento`, `cep`, `id_cliente`) 
			VALUES ('9', '322', 'R. josé de Freitas Barbosa', 'SP', 'Casa ', '14580-000', '5');
            
INSERT INTO `endereco` (`id_endereco`, `numero`, `endereco`, `estado`, `complemento`, `cep`, `id_cliente`) 
			VALUES ('10', '1918', 'R. Pará', 'SP', 'Casa ', '14600-000', '6');
            
INSERT INTO `endereco` (`id_endereco`, `numero`, `endereco`, `estado`, `complemento`, `cep`, `id_cliente`) 
			VALUES ('11', '1917', 'R. Pará', 'SP', 'Casa ', '14600-000', '6');
            
INSERT INTO `endereco` (`id_endereco`, `numero`, `endereco`, `estado`, `complemento`, `cep`, `id_cliente`) 
			VALUES ('12', '2024', 'R. Voluntário Geraldo', 'SP', 'Casa ', '14600-000', '6');
            
INSERT INTO `endereco` (`id_endereco`, `numero`, `endereco`, `estado`, `complemento`, `cep`, `id_cliente`) 
			VALUES ('13', '2062', 'R. Voluntário Geraldo', 'SP', 'Casa ', '14600-000', '7');
            
INSERT INTO `endereco` (`id_endereco`, `numero`, `endereco`, `estado`, `complemento`, `cep`, `id_cliente`) 
			VALUES ('14', '925', 'R. Belo Horizonte', 'SP', 'Casa ', '14600-000', '7');
            
INSERT INTO `endereco` (`id_endereco`, `numero`, `endereco`, `estado`, `complemento`, `cep`, `id_cliente`) 
			VALUES ('15', '1781', 'R. Belo Horizonte', 'SP', 'Casa ', '14600-000', '7');
            
INSERT INTO `endereco` (`id_endereco`, `numero`, `endereco`, `estado`, `complemento`, `cep`, `id_cliente`) 
			VALUES ('16', '1100', 'R. Rio de Janeiro', 'SP', 'Casa ', '14600-000', '8');
            
INSERT INTO `endereco` (`id_endereco`, `numero`, `endereco`, `estado`, `complemento`, `cep`, `id_cliente`) 
			VALUES ('17', '1159', 'R. Rio de Janeiro', 'SP', 'Casa ', '14600-000', '8');
            
INSERT INTO `endereco` (`id_endereco`, `numero`, `endereco`, `estado`, `complemento`, `cep`, `id_cliente`) 
			VALUES ('18', '1332', 'R. Rio de Janeiro', 'SP', 'Casa ', '14600-000', '8');
            
INSERT INTO `comentario` (`id_comentario`, `texto`, `id_estabelecimento`, `id_cliente`) 
			VALUES ('5', 'Muito boa comida caseira ambiente limpo cozinha de primeira, adoro o ovo frito e a carne na capa tudo de bom.', '9', '5');
            
INSERT INTO `comentario` (`id_comentario`, `texto`, `id_estabelecimento`, `id_cliente`) 
			VALUES ('6', 'Várias opções de estacionamento. O ambiente agradável. Muito bom o atendimento. Variedades de opções no cardápio. Recomendo.', '10', '5');
            
INSERT INTO `comentario` (`id_comentario`, `texto`, `id_estabelecimento`, `id_cliente`) 
			VALUES ('7', 'Estavamos em 5 amigos, e não queríamos parar em restaurante a de estrada, essa foi uma ótima pedida, comida de primeira, bem diversificada, atendimento top, além dos detalhes como a sobremesa que é cortesia com diversidade e sabores ótimos, e os banheiros que tem fio dental e listerine. Sem duvidas recomendo, pena não ter tirado fotos para colocar aqui. Ótimo!', '9', '6');
            
INSERT INTO `comentario` (`id_comentario`, `texto`, `id_estabelecimento`, `id_cliente`) 
			VALUES ('8', 'Gostamos muito da comida. ..dos proprietários e dos funcionários tb...almoçamos sempre aqui e estamos muitíssimo satisfeitos...a variedade da comida excelente tb...e feita com muito carinho...', '10', '6');
            
INSERT INTO `comentario` (`id_comentario`, `texto`, `id_estabelecimento`, `id_cliente`) 
			VALUES ('9', 'Comida boa, mas atendimento péssimo. Parece que todos estão com raiva dos clientes. Desde o garçom até os proprietários são mal humorados. Uma pena, porque a comida é boa e o local ótimo.', '11', '7');
            
INSERT INTO `comentario` (`id_comentario`, `texto`, `id_estabelecimento`, `id_cliente`) 
			VALUES ('10', 'Um restaurante com uma grande variedade de pratos quentes e frios, com um ambiente bem agradável e confortável !!!!!', '12', '7');
            
INSERT INTO `comentario` (`id_comentario`, `texto`, `id_estabelecimento`, `id_cliente`) 
			VALUES ('11', 'Almoço com self servisse boas opções para refeição, pessoal atencioso e preço justo , localização boa e fácil', '11', '8');
            
INSERT INTO `comentario` (`id_comentario`, `texto`, `id_estabelecimento`, `id_cliente`) 
			VALUES ('12', 'Local espaçoso, muito limpo, comida gostosa, e importantíssimo...sem moscas! Preço justo, muita variedade de comida!!', '12', '8');
            
INSERT INTO `comentario` (`id_comentario`, `texto`, `id_estabelecimento`, `id_cliente`) 
			VALUES ('13', 'O local é agradável, limpo e muito bonito. A comida muito boa, principalmente a costelinha com molho barbecue. Sobremesas boas e ótimo capucino.', '13', '5');
            
INSERT INTO `comentario` (`id_comentario`, `texto`, `id_estabelecimento`, `id_cliente`) 
			VALUES ('14', 'Ótimo lugar para frequentar com a família, ambiente tranquilo, confortável, ótimas opções de comida, pizzas, porções.', '14', '5');
            
INSERT INTO `comentario` (`id_comentario`, `texto`, `id_estabelecimento`, `id_cliente`) 
			VALUES ('15', 'Muito bom atendimento e qualidade top. Lugar aconchegante, simples, bem cidade do interior, porém nota 10. Valeu o jantar.', '13', '6');
            
INSERT INTO `comentario` (`id_comentario`, `texto`, `id_estabelecimento`, `id_cliente`) 
			VALUES ('16', 'Boa comida, mas fica um pouco fora quando se faz uma comparação custo x benefício... Poderiam colocar ingredientes de melhor qualidade.', '14', '6');
            
INSERT INTO `comentario` (`id_comentario`, `texto`, `id_estabelecimento`, `id_cliente`) 
			VALUES ('17', 'Pizzaria muito boa.....Porções generosas, com um chopp geladérrimo e ainda em dobro de terça a quinta...', '15', '7');
            
INSERT INTO `comentario` (`id_comentario`, `texto`, `id_estabelecimento`, `id_cliente`) 
			VALUES ('18', 'Local muito agradável para uma pizza ou encontro com família ou amigos, a batata receada é muito boa.', '16', '7');
            
INSERT INTO `comentario` (`id_comentario`, `texto`, `id_estabelecimento`, `id_cliente`) 
			VALUES ('19', 'boa variedade no cardapio. pizzas e porções muito boas. experimentei a batata recheada. humm. excelente. caprichada. garçons muito atenciosos e discretos. vale a pena.', '15', '8');
            
INSERT INTO `comentario` (`id_comentario`, `texto`, `id_estabelecimento`, `id_cliente`) 
			VALUES ('20', 'Excelente diversidade de pratos preparados com grande esmero. Atendimento cordial, ambiente familiar.', '16', '8');
            
INSERT INTO `comentario` (`id_comentario`, `texto`, `id_estabelecimento`, `id_cliente`) 
			VALUES ('21', 'Atendimento muito bom e pratos variados. Vale a pena o rodizio. O melhor da cidade.Tudo muito delicioso e de boa qualidade.', '17', '5');
            
INSERT INTO `comentario` (`id_comentario`, `texto`, `id_estabelecimento`, `id_cliente`) 
			VALUES ('22', 'Fui super bem atendido, mas foi difícil para achar lugar para estacionar, mas a comida é boa e fui bem atendido.', '17', '6');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('5', '9', '1');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('5', '10', '0');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('5', '11', '2');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('5', '12', '3');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('5', '13', '1');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('5', '14', '5');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('5', '15', '1');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('5', '16', '2');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('5', '17', '3');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('6', '9', '4');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('6', '10', '3');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('6', '11', '0');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('6', '12', '1');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('6', '13', '2');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('6', '14', '5');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('6', '15', '4');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('6', '16', '1');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('6', '17', '5');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('7', '9', '0');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('7', '10', '2');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('7', '11', '2');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('7', '12', '3');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('7', '13', '0');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('7', '14', '5');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('7', '15', '0');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('7', '16', '1');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('7', '17', '2');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('8', '9', '3');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('8', '10', '2');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('8', '11', '5');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('8', '12', '0');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('8', '13', '1');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('8', '14', '4');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('8', '15', '3');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('8', '16', '4');
            
INSERT INTO `estrelas` (`id_cliente`, `id_estabelecimento`, `num_estrelas`) 
			VALUES ('8', '17', '5');
            
INSERT INTO `pedido` (`id_pedido`, `data_entrega`, `data_realizacao`, `finalizado`, `id_endereco`, `id_cliente`, `id_estabelecimento`)
			VALUES ('5', '2017-05-17 10:08:30', '2017-05-17 08:24:07', '1', '7', '5', '9');
            
INSERT INTO `pedido` (`id_pedido`, `data_entrega`, `data_realizacao`, `finalizado`, `id_endereco`, `id_cliente`, `id_estabelecimento`)
			VALUES ('6', '2017-05-17 10:08:30', '2017-05-17 08:24:07', '0', '8', '5', '10');
            
INSERT INTO `pedido` (`id_pedido`, `data_entrega`, `data_realizacao`, `finalizado`, `id_endereco`, `id_cliente`, `id_estabelecimento`)
			VALUES ('7', '2017-05-17 10:08:30', '2017-05-17 08:24:07', '1', '9', '6', '11');
            
INSERT INTO `pedido` (`id_pedido`, `data_entrega`, `data_realizacao`, `finalizado`, `id_endereco`, `id_cliente`, `id_estabelecimento`)
			VALUES ('8', '2017-05-17 10:08:30', '2017-05-17 08:24:07', '0', '10', '6', '12');
		
INSERT INTO `pedido` (`id_pedido`, `data_entrega`, `data_realizacao`, `finalizado`, `id_endereco`, `id_cliente`, `id_estabelecimento`)
			VALUES ('9', '2017-05-17 10:08:30', '2017-05-17 08:24:07', '1', '11', '7', '13');
            
INSERT INTO `pedido` (`id_pedido`, `data_entrega`, `data_realizacao`, `finalizado`, `id_endereco`, `id_cliente`, `id_estabelecimento`)
			VALUES ('10', '2017-05-17 10:08:30', '2017-05-17 08:24:07', '0', '12', '7', '14');
            
INSERT INTO `pedido` (`id_pedido`, `data_entrega`, `data_realizacao`, `finalizado`, `id_endereco`, `id_cliente`, `id_estabelecimento`)
			VALUES ('11', '2017-05-17 10:08:30', '2017-05-17 08:24:07', '1', '13', '8', '15');
            
INSERT INTO `pedido` (`id_pedido`, `data_entrega`, `data_realizacao`, `finalizado`, `id_endereco`, `id_cliente`, `id_estabelecimento`)
			VALUES ('12', '2017-05-17 10:08:30', '2017-05-17 08:24:07', '0', '14', '8', '16');
            
INSERT INTO `item` (`id_produto`, `id_pedido`, `quantidade`, `solicitacao`, `preco`) 
            VALUES ('9', '5', '3', 'Sem Cebola', '100.00');
            
INSERT INTO `item` (`id_produto`, `id_pedido`, `quantidade`, `solicitacao`, `preco`) 
            VALUES ('10', '5', '6', 'Com Cebola', '200.00');
            
INSERT INTO `item` (`id_produto`, `id_pedido`, `quantidade`, `solicitacao`, `preco`) 
            VALUES ('11', '5', '2', 'Com Pimenta', '50.00');
            
INSERT INTO `item` (`id_produto`, `id_pedido`, `quantidade`, `solicitacao`, `preco`) 
            VALUES ('12', '6', '1', 'Sem Pimenta', '150.03');
            
INSERT INTO `item` (`id_produto`, `id_pedido`, `quantidade`, `solicitacao`, `preco`) 
            VALUES ('13', '6', '5', 'Com Salsicha', '199.10');
            
INSERT INTO `item` (`id_produto`, `id_pedido`, `quantidade`, `solicitacao`, `preco`) 
            VALUES ('14', '6', '10', 'Sem Salsicha', '110.10');
            
INSERT INTO `item` (`id_produto`, `id_pedido`, `quantidade`, `solicitacao`, `preco`) 
            VALUES ('15', '7', '99', 'Com Tomate', '160.90');
            
INSERT INTO `item` (`id_produto`, `id_pedido`, `quantidade`, `solicitacao`, `preco`) 
            VALUES ('16', '7', '11', 'Sem Tomate', '19.90');
            
INSERT INTO `item` (`id_produto`, `id_pedido`, `quantidade`, `solicitacao`, `preco`) 
            VALUES ('17', '7', '5', 'Com Maionese', '90.90');
            
INSERT INTO `item` (`id_produto`, `id_pedido`, `quantidade`, `solicitacao`, `preco`) 
            VALUES ('18', '8', '2', 'Sem Maionese', '350.00');
            
INSERT INTO `item` (`id_produto`, `id_pedido`, `quantidade`, `solicitacao`, `preco`) 
            VALUES ('19', '8', '3', 'Com Alface', '90.00');
            
INSERT INTO `item` (`id_produto`, `id_pedido`, `quantidade`, `solicitacao`, `preco`) 
            VALUES ('20', '8', '7', 'Sem Alface', '99.99');
            
            
            
            
            
-- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- 



-- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- -- @ -- 

            
            
/*


          
SELECT * 
  FROM ESTABELECIMENTO
 WHERE ID_ESTABELECIMENTO IN(SELECT ID_ESTABELECIMENTO
							   FROM ESTRELAS );
                               
  SELECT ID_ESTABELECIMENTO ,AVG(NUM_ESTRELAS)
    FROM ESTRELAS
GROUP BY ID_ESTABELECIMENTO;
                               
SELECT * 
  FROM ESTABELECIMENTO
 WHERE ID_ESTABELECIMENTO IN(SELECT ID_ESTABELECIMENTO
							   FROM ESTRELAS );



   SELECT ESTAB.ID_ESTABELECIMENTO,
	      AVG(NUM_ESTRELAS)
       
     FROM ESTABELECIMENTO ESTAB,
	      ESTRELAS ESTRE
       
   WHERE ESTAB.ID_ESTABELECIMENTO = ESTRE.ID_ESTABELECIMENTO
GROUP BY ID_ESTABELECIMENTO;






   SELECT ESTAB.ID_ESTABELECIMENTO,
	      AVG(NUM_ESTRELAS)
       
     FROM ESTABELECIMENTO ESTAB,
	      ESTRELAS ESTRE
       
   WHERE ESTAB.ID_ESTABELECIMENTO = ESTRE.ID_ESTABELECIMENTO
GROUP BY ID_ESTABELECIMENTO;





   SELECT ESTAB.ID_ESTABELECIMENTO,
	      AVG(NUM_ESTRELAS)
       
     FROM EASTABELECIMENTO ESTAB,
	      ESTRELAS ESTRE
       
   WHERE ESTAB.ID_ESTABELECIMENTO = ESTRE.ID_ESTABELECIMENTO
GROUP BY ID_ESTABELECIMENTO;


				SELECT * 
                  FROM (SELECT ESTAB.*,
                               AVG(NUM_ESTRELAS)  AS ESTRELAS

                          FROM ESTABELECIMENTO ESTAB,
                               ESTRELAS ESTRE
                         

                         WHERE ESTAB.ID_ESTABELECIMENTO = ESTRE.ID_ESTABELECIMENTO



                         GROUP BY 
                               ID_ESTABELECIMENTO

                         

                        ) A						
							WHERE A.ESTRELAS = "3"
                            LIMIT 1
							OFFSET 0;
                            
				SELECT *
                  FROM (SELECT ESTAB.*,
                               ROUND(AVG(NUM_ESTRELAS))  AS ESTRELAS

                          FROM ESTABELECIMENTO ESTAB,
                               ESTRELAS ESTRE
                         

                         WHERE ESTAB.ID_ESTABELECIMENTO = ESTRE.ID_ESTABELECIMENTO



                         GROUP BY 
                               ID_ESTABELECIMENTO                         

                        ) A  WHERE A.ESTRELAS = 3 
                        LIMIT 1
                        OFFSET 0;
		
        


   SELECT estab.* 

	 FROM pedido 		   AS pedid,        
		  estabelecimento AS estab
        
	WHERE estab.id_estabelecimento = pedid.id_estabelecimento
	  AND pedid.id_cliente = 1
 ORDER BY pedid.data_realizacao DESC
    LIMIT 5;
    
*/
            
        
        
        
            
            
           
            
       
       