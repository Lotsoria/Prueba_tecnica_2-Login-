create database pruebatecnica_2;

use pruebatecnica_2;

create table roles(
	roleId int not null auto_increment primary key,
    roleName varchar(100),
    status tinyint(1)
);

create table users(
	userId int not null auto_increment primary key,
    roleId int not null,
    user_name varchar(45),
    firstName varchar(45),
    lastName varchar(45),
    password varchar(45),
    status varchar(45),
    failedLoginAttempts int default 0,
    createUser varchar(45),
    createDate datetime,
    modifiedUser varchar(45),
    modifiedDate datetime,  
	foreign key (roleId) references roles(roleId)
);

insert into roles (roleName, status)
values ('usuario', 1),
	('administrador', 1);

insert into users (roleId, user_name, firstName, lastName, password,status, createUser, createDate)
values (2, 'lotsoriadmin', 'Alberto', 'Ulin','123', 'Activo','Lotsoria', utc_timestamp());