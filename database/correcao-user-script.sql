/*Erro: SQLSTATE[HY000] [2054] The server requested authentication method unknown to the client*/


CREATE USER 'usuario'@localhost IDENTIFIED WITH mysql_native_password BY 'senha';

GRANT ALL PRIVILEGES ON * . * TO 'will'@'localhost';