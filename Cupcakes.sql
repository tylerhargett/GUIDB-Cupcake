CREATE TABLE Cupcakes 
(
id int,
custId int,
flavor varchar(256),
filling varchar(256),
PRIMARY KEY (id)
)

CREATE TABLE Fillings
name varchar(256),
PRIMARY KEY name
)

CREATE TABLE Orders
(
orderId int,
custId int,
cost float,
PRIMARY KEY orderId,
FOREIGN KEY custId REFERENCES Customers(custId)
)

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
zipcode varchar(256),
PRIMARY KEY custId
)

CREATE TABLE Maillist
(
custId int,
PRIMARY KEY custId
)

CREATE TABLE Employees
(
empId int,
PRIMARY KEY empId
)