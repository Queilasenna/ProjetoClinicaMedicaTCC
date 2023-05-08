CREATE TABLE medicos (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nome varchar(100) NOT NULL,
  nascimento date NOT NULL,
  cpf varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  telefone varchar(100) NOT NULL,
  crm varchar(100) NOT NULL,
  situacao varchar(100) NOT NULL,
  especialidade varchar(100) NOT NULL,
  rua varchar(100) NOT NULL,
  bairro varchar(100) NOT NULL,
  cidade varchar(100) NOT NULL,
  estado varchar(100) NOT NULL,
  numero int(100) NOT NULL,
  cep varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE pacientes (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nome varchar(100) NOT NULL,
  nascimento date NOT NULL,
  cpf varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  telefone varchar(100) NOT NULL,
  rua varchar(100) NOT NULL,
  bairro varchar(100) NOT NULL,
  cidade varchar(100) NOT NULL,
  estado varchar(100) NOT NULL,
  numero int(100) NOT NULL,
  cep varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE login (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  usuario varchar(100) NOT NULL,
  senha varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE eventos (
  id int(200) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  descricao varchar(255) NOT NULL,
  dataAgendamento date NOT NULL,
  horaAgendamento time NOT NULL,
  medico_id INT NOT NULL,
  paciente_id INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE agenda (
  id int(200) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  vagas varchar(255) NOT NULL,
  dia varchar(2) NOT NULL,
  mes varchar(10) NOT NULL,
  ano varchar(4) NOT NULL,
  medico_id INT NOT NULL,
  especialidade varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
