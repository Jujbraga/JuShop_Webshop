<?php
include("./database/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/2a3ed7d0da.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="./css/style.css">
  <title>JuShop - Golden Grass Jewels</title>
</head>
<body>
  <nav class="navbar sticky-top navbar-expand-lg navbar-dark" id="shop-nav" style="background-color: rgb(63, 1, 1);">
	  <div class="container">
	    <a class="navbar-brand" href="index.php"><img src="./img/lily_white.png" class="d-inline-block align-top" alt=""> JuShop</a>
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	      <span><i class="fas fa-bars"></i></span>
	    </button>
	    <div class="collapse navbar-collapse" id="ftco-nav">
	      <ul class="navbar-nav ml-auto">
	        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="products.php" class="nav-link">Products</a></li>
          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
          <?php if (isset($_SESSION["client"]["clientId"])): ?>
            <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
            </a></li>
            <?php else: ?>
	          <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
          <?php endif; ?>
	        <li class="nav-item cta cta-colored"><a href="bag.php" class="nav-link">
            <i class="fas fa-shopping-bag"></i><span class="icon-shopping_cart"></span></a></li>

              <?php if (isset($_SESSION['cart'])) :
                $items = $_SESSION['cart'];
                  if(count($items) > 0 )?>
                <span id="cart-count"><?php echo count($items); ?>
                  <?php else: ?>
                  </span>  </a>
            <?php endif; ?>
	      </ul>
	    </div>
	  </div>
  </nav>
