CREATE PROCEDURE `desbloquearUsuario`(
	usuario int
)
BEGIN
	UPDATE users SET status='Activo', failedLoginAttempts=0 WHERE userId= usuario;
END