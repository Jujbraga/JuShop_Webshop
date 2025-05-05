<?php
session_start();
/* Remove item */
if (isset($_GET['remove']) && $_GET['remove'] == "item"){
	$id = $_GET['id'];
	unset($_SESSION['cart'][$id]);
	header('location: bag.php');
}

/* Remove all itens */
if (isset($_GET['remove']) && $_GET['remove'] == "all"){
  unset($_SESSION['cart']);
  header('location: bag.php');
}
?>
