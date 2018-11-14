CREATE DATABASE file_upload_example;

USE file_upload_example;

CREATE TABLE images
(
	imageId INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(500) NOT NULL,
    PRIMARY KEY (imageId)
)Engine=InnoDB;

CREATE PROCEDURE file_upload_example.Image_Add(IN name NVARCHAR(500))
BEGIN
	INSERT INTO images
		(name)
	VALUES
		(name);
END
