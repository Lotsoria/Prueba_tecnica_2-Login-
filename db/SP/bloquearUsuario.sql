CREATE PROCEDURE `bloquearUsuario`(
	usuario int
)
BEGIN
	UPDATE users SET status='Bloqueado' WHERE userId= usuario;
END