CREATE PROCEDURE `actualizarIntentos`(
	failedAttempts int,
    usuario varchar(45)
)
BEGIN
	UPDATE users SET failedLoginAttempts = failedAttempts WHERE user_name = usuario;
END