<?php
include("templates/header.php");

/* Select all products's table */
$product = getAll('products');

/* To show the message that the productwas added */
$action = isset($_GET['action']);

/* Rows inserted into html to show all the products from the table
  while($prod = mysqli_fetch_assoc($product)){
    echo $prod['Image'];
    echo "SEK " . $prod['Price'];
    echo $prod['ProductName'];
    echo $prod['id'];
  };*/

?>

<section class="products">
  <h2>Products</h2>
  <div classe="container">
    <div class='col-md-12'>
        <?php if($action=='added') :  ?>
            <div class='alert alert-warning'>
                Product was added to your cart!
            </div>
        <?php endif ?>
    <div class="row justify-content-center">
      <?php while($prod = mysqli_fetch_assoc($product)) : ?>
  	    <div class="col-md-6 col-lg-3 ftco-animate">
  	      <div class="thumbnail">
  	        <a href="#" class="img-prod">
              <img class="img-fluid" src="<?php echo $prod['image']; ?>" alt="<?php echo $prod['ProductName'] ?>"></a>
  	        <div class="caption">
              <div class="text py-3 pb-4 px-3 text-center">
                <h6><?php echo "SEK " . $prod['price']; ?></h6>
  	            <p><?php echo $prod['productName']; ?></p>
  	            <p><a href="bag.php?add=tocart&id=<?php echo $prod['productId']; ?>" class="btn btn-secondary" role="button">
                <i class="fas fa-shopping-bag"></i><span> ADD TO BAG</span></a></p>
              </div>
  	        </div>
  	      </div>
  	    </div>
      <?php endwhile ?>
    </div>
  </div>
</section>

<?php include("templates/footer.php");?>
