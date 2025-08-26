CREATE DATABASE bibliotecaDuncker

USE bibliotecaDuncker

CREATE TABLE autores(
id_autor INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    nacionalidade VARCHAR(50),
    ano_nascimento INT
);

CREATE TABLE livros (
    id_livro INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100),
    genero VARCHAR(50),
    ano_publicacao INT,
    id_autor INT,
    FOREIGN KEY (id_autor) REFERENCES autores(id_autor)
);

CREATE TABLE leitores (
    id_leitor INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100),
    telefone VARCHAR(20)
);

CREATE TABLE emprestimos (
    id_emprestimo INT AUTO_INCREMENT PRIMARY KEY,
    id_livro INT,
    id_leitor INT,
    data_emprestimo DATE,
    data_devolucao DATE DEFAULT NULL,
    FOREIGN KEY (id_livro) REFERENCES livros(id_livro),
    FOREIGN KEY (id_leitor) REFERENCES leitores(id_leitor)
);