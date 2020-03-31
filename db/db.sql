USE noteboard;

CREATE TABLE IF NOT EXISTS users (
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	username varchar(255) NOT NULL,
	password varchar(255) NOT NULL,
	email varchar(255) NOT NULL,
	firstname varchar(255) NOT NULL,
	lastname varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


create table sessions
(
	id int auto_increment,
	token int null,
	serial int null,
	column_4 int null,
	date varchar(10) null,
	constraint sessions_pk
		primary key (id)
);

