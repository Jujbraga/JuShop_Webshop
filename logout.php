<?php
session_start();

unset($_SESSION['clientId']);
unset($_SESSION['clientName']);
unset($_SESSION['message']);
unset($_SESSION['type']);

session_destroy();

header('location: index.php');
 ?>
