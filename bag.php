<?php
include("./templates/header.php");
include("./database/validationcart.php");

  /* Inserted into html to show the cart
  if (count($_SESSION['cart']) == 0) {
    echo "Your bag is empty";
  } else {
    foreach ($_SESSION['cart'] as $id_prod => $quantity) {
      $product = getOne($table, ['productId' => $id_prod]);
      echo $product['productName'];
      echo $product['price'];
    }
  }*/
?>

<section class="cart">
  <div class="container text-center">
    <h3>Order Details</h3>
    <table class="table border table-sm">
      <thead>
        <tr class="b">
          <th scope="col" width="15%">Image</th>
          <th scope="col" width="18%">Name</th>
          <th scope="col" width="16%">Price</th>
          <th scope="col" width="16%">Quantity</th>
          <th scope="col" width="16%">Total</th>
          <th scope="col" width="10%">Remove</th>
        </tr>
        <?php if (count($_SESSION['cart']) == 0) : ?>
            <div class="empty">Your bag is empty</div>
              <?php else :
                $total = 0;
                foreach ($_SESSION['cart'] as $id_prod => $quantity) :
                  $product = getOne($table, ['productId' => $id_prod]); ?>
                  <tr>
                    <td><img class="img-cart" src="<?php echo $product['image']; ?>"alt="<?php echo $product['ProductName'] ?>"></td>
                    <td><?php echo $product['productName']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><?php echo $quantity; ?></td>
                    <td><?php echo number_format($product['price'] * $quantity, 2, '.', ' '); ?></td>
                    <td><a href="bagremove.php?remove=item&id=<?php echo $id_prod; ?>"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a></td>
                  </tr>
                  <?php $total = $total + ($product['price'] * $quantity); ?>
                <?php endforeach;?>
                <tr>
                  <td colspan="4" align="right">Total</td>
                  <td align="center"> <?php echo number_format($total, 2); ?></td>
                  <td><a href="bagremove.php?remove=all&id=<?php echo $id_prod; ?>" class="btn btn-secondary" role="button">Remove all</td>
                </tr>
      </thead>
    </table>
    <form method="post" action="checkout.php">
      <input type="hidden" name="hidden_price"  value="<?php echo $total; ?>">
      <input type="submit" value="BUY" name="buy" class="btn btn-dark"/>
         <?php endif ?>
    </form>
  </div>
</section>
