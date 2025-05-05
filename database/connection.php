<?php

  session_start();

  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "jushop";
  $use_db = "use jushop";

  $conn = new mysqli($servername, $username, $password, $database);

  if($conn->connect_error) {
    die("Connection failed" .$conn);
  }
  if($conn->query($use_db)==FALSE) {
    echo "Not possibel to connect.";
  }

  include("functions.php");
?>
