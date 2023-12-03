CREATE PROCEDURE `findUser`(
	Id int 
)
BEGIN
select user_name, firstName, lastName, status from user where userId = Id;
END