CREATE TABLE instituicao (
	numero INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(45) NOT NULL
);

CREATE TABLE vaga (
	id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(25) NOT NULL
);

CREATE TABLE resultado (
	id INTEGER NOT NULL PRIMARY KEY,
	empate BIT(1) NOT NULL DEFAULT FALSE
);

CREATE TABLE candidato (
	numero INTEGER NOT NULL PRIMARY KEY,
	nome VARCHAR(45) NOT NULL,
	data_nasc DATE NOT NULL,
	vaga_id INTEGER NOT NULL,
	instituicao_numero INTEGER NOT NULL,
	UNIQUE KEY  vaga_instituicao (vaga_id, instituicao_numero),
	FOREIGN KEY (vaga_id) REFERENCES vaga (id),
	FOREIGN KEY (instituicao_numero) REFERENCES instituicao (numero)
);

CREATE TABLE avaliacao (
	candidato_numero INTEGER NOT NULL,
	resultado_id INTEGER NOT NULL,
	pontuacao FLOAT(4) NOT NULL,
	PRIMARY KEY (candidato_numero, resultado_id),
	FOREIGN KEY (resultado_id) REFERENCES resultado (id),
	FOREIGN KEY (candidato_numero) REFERENCES candidato (numero)
)

