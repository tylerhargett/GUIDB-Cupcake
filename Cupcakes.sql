CREATE TABLE Cupcakes 
(
cupId int,
custId int,
flavor varchar(256),
filling varchar(256),
PRIMARY KEY (id)
)

CREATE TABLE Fillings
(
fName varchar(256),
picture varchar(256),
PRIMARY KEY name
)

CREATE TABLE Flavors
(
flName varchar(256),
picture varchar(256),
PRIMARY KEY name
)

CREATE TABLE Frostings
(
frName varchar(256),
picture varchar(256),
PRIMARY KEY name
)

CREATE TABLE Toppings
(
tName varchar(256),
picture varchar(256),
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
onMailingList bool,
PRIMARY KEY custId
)

CREATE TABLE Favorites
(
favId int,
custId int,
cupId int,
frID int,
fID int,
PRIMARY KEY empId,
FOREIGN KEY cupId REFERENCES Cupcakes(cupId) 
)

CREATE TABLE Employees
(
empId int,
PRIMARY KEY empId
)

CREATE TABLE ToppingsBridge
(
tbId int,
favId int, 
tName int,
PRIMARY KEY empId,
FOREIGN KEY tName REFERENCES Toppings(tName)
)

CREATE TABLE SalesBridge
(
sbpId int,
empId int,
tName int,
amtSold int,
PRIMARY KEY empId,
FOREIGN KEY empId, tpId REFERENCES Employees(empId), Toppings(tId)
)