<?php
include('connection.php');
  //Skapa 3 tabeller: Clients, Products och ClientsProducts
  $create_table_client = "CREATE TABLE Clients (
    clientId int AUTO_INCREMENT PRIMARY KEY,
    clientName varchar(30) NOT NULL,
    adress varchar(50) NOT NULL,
    city varchar(30) NOT NULL,
    mobile varchar(10) NOT NULL UNIQUE,
    email varchar(50) NOT NULL UNIQUE,
    password varchar(100) NOT NULL
  );";
  $create_table_product = "CREATE TABLE Products (
    productId int AUTO_INCREMENT PRIMARY KEY,
    prodtName varchar(50) NOT NULL UNIQUE,
    description varchar(300) NOT NULL,
    price decimal(10,2) NOT NULL,
    image varchar(255)
  );";
  $create_table_clientsproducts = "CREATE TABLE ClientsProducts (
    orderId int AUTO_INCREMENT PRIMARY KEY,
    clientId int NOT NULL,
    productId int NOT NULL,
    price decimal(10,2),
    dateOrder DateTime NOT NULL,
    FOREIGN KEY (clientId) REFERENCES Clients(clientId),
    FOREIGN KEY (productId) REFERENCES Products(productId)
  );";

  if ($conn->query($create_table_client) == TRUE) {
    echo "Table Clients created";
  } else {
    echo "Error creating table" . $conn->error;
  }
  if ($conn->query($create_table_product) == TRUE) {
    echo "Table Products created";
  }
  if ($conn->query($create_table_clientsproducts) == TRUE) {
    echo "Table ClientsProducts created";
  } else {
    echo "Error creating table" . $conn->error;
  }
 ?>
