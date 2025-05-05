<?php

include("./templates/header.php");

$table = "clientsproducts";

/* Get the info from POST in bag.php
** the productId are the keys from array $_SESSION["cart"]
** with array_keys() we can get it .
 */
if (isset($_POST["buy"]) & !empty($_POST["buy"])){
  $date = date("Y-m-d H:i:s");
  $total = $_POST["hidden_price"];
  $client = $_SESSION["client"];
  $cart = array_keys($_SESSION["cart"]);

  $prod_id = implode(", ", $cart);

  /* If the client isn't logged in, redirect to the login page */
  if(!isset($_SESSION["client"]) & empty($_SESSION["client"])){
    header('location: login.php');
  } else {
    $order = [
      'clientId' => $client['clientId'],
      'productId' => ($prod_id),
      'price' => $total,
      'dateOrder' => $date
    ];

    $insert = insertInfo($table, $order);

    unset($_SESSION['cart']);
  }
}
?>
<section>
  <div class="checkout">
    <h4>Thank you <?php echo  $client['clientName'];?> for buying with us!</h4>
    <div><a href="index.php" class="btn btn-secondary" role="button">Back to home</a></div>
  </div>
</section>

<?php include("./templates/footer.php"); ?>
