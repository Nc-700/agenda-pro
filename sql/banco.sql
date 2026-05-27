CREATE DATABASE agenda_pro;

USE agenda_pro;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    tipo ENUM('admin','usuario') DEFAULT 'usuario'
);

INSERT INTO usuarios(usuario, senha, tipo)
VALUES ('admin', 'admin123', 'admin');

CREATE TABLE agendamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    servico VARCHAR(50) NOT NULL,
    data DATE NOT NULL,
    hora TIME NOT NULL,

    status ENUM(
        'Pendente',
        'Confirmado',
        'Cancelado',
        'Finalizado'
    ) DEFAULT 'Pendente'
);