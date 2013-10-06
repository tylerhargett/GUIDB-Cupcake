CREATE DATABASE Cupcakes;
USE Cupcakes;

CREATE TABLE Customers
(
custId int,
fName varchar(256),
lName varchar(256),
email varchar(256),
password varchar(256),
address varchar(256),
city varchar(256),
state varchar(256),
telNumer varchar(256),
zipcode int,
onMailingList bool,
PRIMARY KEY (custId)
);

CREATE TABLE Cupcakes 
(
filling varchar(256),
picture varchar(256),
PRIMARY KEY (cupId)
);

CREATE TABLE Fillings
(
fName varchar(256),
rgb varchar(256),
PRIMARY KEY (fName)
);

CREATE TABLE Flavors
(
flName varchar(256),
picture varchar(256),
PRIMARY KEY (flName)
);

CREATE TABLE Frostings
(
frName varchar(256),
picture varchar(256),
PRIMARY KEY (frName)
);

CREATE TABLE Toppings
(
tName varchar(256),
tId int,
PRIMARY KEY (tName)
);

CREATE TABLE Orders
(
orderId int,
custId int,
PRIMARY KEY (orderId),
FOREIGN KEY (custId) REFERENCES Customers(custId)
);

CREATE TABLE Favorites
(
favId int,
custId int,
cupId int,
frID int,
fID int,
PRIMARY KEY (favId),
FOREIGN KEY (cupId) REFERENCES Cupcakes(cupId) 
);

CREATE TABLE Employees
(
empId int,
PRIMARY KEY (empId)
);

CREATE TABLE ToppingsBridge
(
tbId int,
favId int, 
tId int,
PRIMARY KEY (tbId),
FOREIGN KEY (tId) REFERENCES Toppings(tId),
FOREIGN KEY (favId) REFERENCES Favorites(favId)
);

CREATE TABLE SalesBridge
(
sbpId int,
empId int,
tName varchar(256),
amtSold int DEFAULT 0,
PRIMARY KEY (sbpId),
FOREIGN KEY (empId) REFERENCES Employees(empId),
FOREIGN KEY (tName) REFERENCES Toppings(tName)
);
