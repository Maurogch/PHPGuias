#create database Practica2doParcial;

use Practica2doParcial;

/*create table categories(
    idCategory int auto_increment,
    categoryName varchar(50) not null,
    primary key (idCategory)
);*/

create table products(
    idProduct int auto_increment,
    productName varchar(50) not null,
    stock int default 0,
    price float not null,
    idCategory int,
    primary key (idProduct),
    foreign key (idCategory) references categories (idCategory)
);