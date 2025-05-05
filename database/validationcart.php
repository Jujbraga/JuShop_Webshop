<?php

$table = 'products';

if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
}
  /* If client clicked in the link to add to bag */
  if (isset($_GET['add']) && $_GET['add'] == "tocart") {
    $id_prod = $_GET['id'];
    /* Add quantity 1, if product already have 1 add one more */
    if (!isset($_SESSION['cart'][$id_prod])) {
      $_SESSION['cart'][$id_prod] = 1;
    } else {
      $_SESSION['cart'][$id_prod] += 1;
    }
    if(array_key_exists($id_prod, $_SESSION['cart'])){
      /* redirect to product list and tell that product was added to bag */
      header('Location: products.php?action=added&id'. $id);
    }
  }


 ?>
