<?php

$create_database = "CREATE DATABASE JShop";

if ($conn->query($create_database)==TRUE) {
    echo "DATABASE CREATED";
} else {
    echo "Error creating table" . $conn->error;
}

 ?>
