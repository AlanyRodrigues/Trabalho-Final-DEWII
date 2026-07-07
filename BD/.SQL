create database sistema_passagens;
use sistema_passagens;

CREATE TABLE usuarios(
	id INT AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(100) NOT NULL,	
	email VARCHAR(100) NOT NULL,
	senha VARCHAR(200) not null,
	token_recuperacao VARCHAR(200) NOT NULL
);

CREATE TABLE passageiros(
	id INT AUTO_INCREMENT PRIMARY KEY,
	usuario_id INT NOT NULL,
	nome_completo VARCHAR(100) NOT NULL,
	documento_cpf VARCHAR(14) NOT NULL,
	data_nascimento DATE NOT NULL,
	FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE voos(
	id INT AUTO_INCREMENT PRIMARY KEY,
	numero_voos VARCHAR(10) NOT NULL,
	origem VARCHAR(50) NOT NULL,
	destino VARCHAR(50) NOT NULL,
	data_partida DATETIME NOT NULL,
	data_chegada  datetime not null,
	preco decimal not null,
	assentos_disponiveis int not null
);

CREATE TABLE assentos(
    id INT AUTO_INCREMENT PRIMARY KEY,
    voo_id INT NOT NULL,
    numero VARCHAR(5) NOT NULL,
    tipo ENUM('Janela','Centro','Corredor') NOT NULL,
    ocupado BOOLEAN DEFAULT FALSE,

    FOREIGN KEY (voo_id) REFERENCES voos(id)
);

CREATE TABLE reservas(
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    passageiro_id INT NOT NULL,
    voo_id INT NOT NULL,
	assento_id INT NOT NULL,
    codigo_localizador VARCHAR(8) NOT NULL UNIQUE,
    status VARCHAR(20) DEFAULT 'confirmado',
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),     
    FOREIGN KEY (passageiro_id) REFERENCES passageiros(id),
    FOREIGN KEY (voo_id) REFERENCES voos(id),
	FOREIGN KEY(assento_id) REFERENCES assentos(id)
);



USE sistema_passagens;

-- 1. Populando a tabela de USUÁRIOS (Quem faz o login no sistema)
-- As senhas e tokens são exemplos fictícios (geralmente seriam hashes)
INSERT INTO usuarios (nome, email, senha, token_recuperacao) VALUES
('Carlos Silva', 'carlos.silva@email.com', 'senhaCriptografada123', 'tok_abc123xyz'),
('Ana Beatriz Souza', 'ana.souza@email.com', 'senhaSegura456', 'tok_def456uvw'),
('Marcos Oliveira', 'marcos.oli@email.com', 'marcos@2026', 'tok_ghi789rst'),
('Mariana Costa', 'mari.costa@email.com', 'mariana#987', 'tok_jkl012opq');


-- 2. Populando a tabela de PASSAGEIROS (Quem vai viajar de fato)
INSERT INTO passageiros (usuario_id, nome_completo, documento_cpf, data_nascimento) VALUES
(1, 'Carlos Silva', '111.222.333-44', '1988-05-12'),       -- O próprio usuário 1
(1, 'Julia Silva', '222.333.444-55', '2015-08-20'),         -- Filha/Dependente do usuário 1
(2, 'Ana Beatriz Souza', '333.444.555-66', '1995-11-02'),   -- O próprio usuário 2
(3, 'Marcos Oliveira', '444.555.666-77', '1982-03-25'),     -- O próprio usuário 3
(4, 'Mariana Costa', '555.666.777-88', '1991-07-14'),       -- O próprio usuário 4
(4, 'Roberto Costa', '666.777.888-99', '1965-01-30');       -- Pai/Dependente do usuário 4


-- 3. Populando a tabela de VOOS
-- Nota: datas e horários coerentes de partida e chegada
INSERT INTO voos
(numero_voos, companhia, origem, destino, data_partida, data_chegada, preco, classe, assentos_disponiveis)
VALUES

('G3-1234','Gol',
'São Paulo (GRU)',
'Rio de Janeiro (GIG)',
'2026-08-10 08:30:00',
'2026-08-10 09:45:00',
350.00,
'Econômica',
120),

('G3-1235','Gol',
'São Paulo (GRU)',
'Rio de Janeiro (GIG)',
'2026-08-10 15:20:00',
'2026-08-10 16:35:00',
620.00,
'Executiva',
28),

('AD-4321','Azul',
'Belo Horizonte (CNF)',
'Brasília (BSB)',
'2026-08-12 14:15:00',
'2026-08-12 15:40:00',
420.50,
'Econômica',
85),

('AD-4322','Azul',
'Belo Horizonte (CNF)',
'Brasília (BSB)',
'2026-08-12 19:30:00',
'2026-08-12 20:55:00',
780.00,
'Executiva',
24),

('LA-9876','LATAM',
'São Paulo (CGH)',
'Salvador (SSA)',
'2026-08-15 21:00:00',
'2026-08-16 00:15:00',
680.00,
'Econômica',
150),

('LA-9877','LATAM',
'São Paulo (CGH)',
'Salvador (SSA)',
'2026-08-15 10:40:00',
'2026-08-15 13:55:00',
1190.00,
'Executiva',
30),

('G3-5555','Gol',
'Curitiba (CWB)',
'Porto Alegre (POA)',
'2026-08-20 11:00:00',
'2026-08-20 12:10:00',
290.99,
'Econômica',
40),

('AD-7777','Azul',
'Campinas (VCP)',
'Recife (REC)',
'2026-08-18 09:15:00',
'2026-08-18 12:30:00',
890.00,
'Econômica',
95),

('LA-4410','LATAM',
'Brasília (BSB)',
'Fortaleza (FOR)',
'2026-08-19 07:45:00',
'2026-08-19 10:30:00',
760.00,
'Econômica',
80),

('LA-4411','LATAM',
'Brasília (BSB)',
'Fortaleza (FOR)',
'2026-08-19 17:20:00',
'2026-08-19 20:05:00',
1340.00,
'Executiva',
18);

-- 4. Populando a tabela de ASSENTOS
INSERT INTO assentos (voo_id, numero, tipo, ocupado) VALUES

-- ====== VOO 1 ======
(1,'1A','Janela',TRUE),
(1,'1B','Centro',FALSE),
(1,'1C','Corredor',FALSE),
(1,'2A','Janela',FALSE),
(1,'2B','Centro',FALSE),
(1,'2C','Corredor',FALSE),
(1,'3A','Janela',FALSE),
(1,'3B','Centro',FALSE),
(1,'3C','Corredor',FALSE),
(1,'4A','Janela',FALSE),

-- ====== VOO 2 ======
(2,'1A','Janela',FALSE),
(2,'1B','Centro',FALSE),
(2,'1C','Corredor',FALSE),
(2,'2A','Janela',FALSE),
(2,'2B','Centro',FALSE),
(2,'2C','Corredor',FALSE),
(2,'3A','Janela',FALSE),
(2,'3B','Centro',FALSE),
(2,'3C','Corredor',FALSE),
(2,'4A','Janela',FALSE),

-- ====== VOO 3 ======
(3,'1A','Janela',TRUE),
(3,'1B','Centro',FALSE),
(3,'1C','Corredor',FALSE),
(3,'2A','Janela',FALSE),
(3,'2B','Centro',FALSE),
(3,'2C','Corredor',FALSE),
(3,'3A','Janela',FALSE),
(3,'3B','Centro',FALSE),
(3,'3C','Corredor',FALSE),
(3,'4A','Janela',FALSE),

-- ====== VOO 4 ======
(4,'1A','Janela',FALSE),
(4,'1B','Centro',FALSE),
(4,'1C','Corredor',FALSE),
(4,'2A','Janela',FALSE),
(4,'2B','Centro',FALSE),
(4,'2C','Corredor',FALSE),
(4,'3A','Janela',FALSE),
(4,'3B','Centro',FALSE),
(4,'3C','Corredor',FALSE),
(4,'4A','Janela',FALSE),

-- ====== VOO 5 ======
(5,'1A','Janela',TRUE),
(5,'1B','Centro',FALSE),
(5,'1C','Corredor',FALSE),
(5,'2A','Janela',FALSE),
(5,'2B','Centro',FALSE),
(5,'2C','Corredor',FALSE),
(5,'3A','Janela',FALSE),
(5,'3B','Centro',FALSE),
(5,'3C','Corredor',FALSE),
(5,'4A','Janela',FALSE),

-- ====== VOO 6 ======
(6,'1A','Janela',FALSE),
(6,'1B','Centro',FALSE),
(6,'1C','Corredor',FALSE),
(6,'2A','Janela',FALSE),
(6,'2B','Centro',FALSE),
(6,'2C','Corredor',FALSE),
(6,'3A','Janela',FALSE),
(6,'3B','Centro',FALSE),
(6,'3C','Corredor',FALSE),
(6,'4A','Janela',FALSE),

-- ====== VOO 7 ======
(7,'1A','Janela',TRUE),
(7,'1B','Centro',TRUE),
(7,'1C','Corredor',FALSE),
(7,'2A','Janela',FALSE),
(7,'2B','Centro',FALSE),
(7,'2C','Corredor',FALSE),
(7,'3A','Janela',FALSE),
(7,'3B','Centro',FALSE),
(7,'3C','Corredor',FALSE),
(7,'4A','Janela',FALSE),

-- ====== VOO 8 ======
(8,'1A','Janela',FALSE),
(8,'1B','Centro',FALSE),
(8,'1C','Corredor',FALSE),
(8,'2A','Janela',FALSE),
(8,'2B','Centro',FALSE),
(8,'2C','Corredor',FALSE),
(8,'3A','Janela',FALSE),
(8,'3B','Centro',FALSE),
(8,'3C','Corredor',FALSE),
(8,'4A','Janela',FALSE),

-- ====== VOO 9 ======
(9,'1A','Janela',FALSE),
(9,'1B','Centro',FALSE),
(9,'1C','Corredor',FALSE),
(9,'2A','Janela',FALSE),
(9,'2B','Centro',FALSE),
(9,'2C','Corredor',FALSE),
(9,'3A','Janela',FALSE),
(9,'3B','Centro',FALSE),
(9,'3C','Corredor',FALSE),
(9,'4A','Janela',FALSE),

-- ====== VOO 10 ======
(10,'1A','Janela',FALSE),
(10,'1B','Centro',FALSE),
(10,'1C','Corredor',FALSE),
(10,'2A','Janela',FALSE),
(10,'2B','Centro',FALSE),
(10,'2C','Corredor',FALSE),
(10,'3A','Janela',FALSE),
(10,'3B','Centro',FALSE),
(10,'3C','Corredor',FALSE),
(10,'4A','Janela',FALSE);

-- 5. Populando a tabela de RESERVAS
-- Vinculando corretamente quem comprou (usuario_id), quem viaja (passageiro_id) e o voo (voo_id)
INSERT INTO reservas
(usuario_id, passageiro_id, voo_id, assento_id, codigo_localizador, status)
VALUES
(1,1,1,1,'LOCX78A1','confirmado'),
(1,2,1,2,'LOCX78A2','confirmado'),
(2,3,3,21,'LOCY34B9','confirmado'),
(3,4,5,41,'LOCZ90C4','cancelado'),
(4,5,7,61,'LOCW12D5','confirmado'),
(4,6,7,62,'LOCW12D6','confirmado');
