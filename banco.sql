CREATE DATABASE sistema_produtos;

USE sistema_produtos;

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descrecao TEXT,
    preco DECIMAL(10,2) NOT NULL
);