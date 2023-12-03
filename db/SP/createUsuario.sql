CREATE DEFINER=`root`@`localhost` PROCEDURE `createUsuario`(
	username varchar(45),
	nombre varchar(45),
    apellido varchar(45),
    contraseña varchar(45)
)
BEGIN
	insert into users (roleId, user_name, firstName, lastName, password,status, createUser, createDate)
		values (1, username, nombre, apellido,contraseña, 'Activo',username, utc_timestamp());
END