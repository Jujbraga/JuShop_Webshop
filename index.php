<?php include('templates/header.php'); ?>

<div class="intro">
  <h1 class="display-4 font-weight-normal">Golden Grass Jewels</h1>
  <p style="font-size:25px"> The vegetal golden, 100% natural from Brazil</p>
</div>

<!-- News Products start here -->
<section class="newest-product">
  <div class="container">
    <div class="tittle-products">
      <h2 class="mb-4">Our Newest Products</h2>
      <p>Far far away, behind the forest trees, in the heart of northern Brazil</p>
    </div>
  <!-- Show the last 3 products insert in product's table -->
    <?php $news_prod = getLatest('products', 'productId', '3'); ?>
    <div class="row justify-content-around">
      <?php while($prod = mysqli_fetch_assoc($news_prod)) : ?>
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
      <?php endwhile; ?>
    </div>
  </div>
</section>

    <!--About starts here-->
<section>
  <div class="index_about">
    <img id="abindex" src="./img/grass.jpg">
    <h2>About Golden Grass (Capim dourado)</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut tellus ut magna pharetra aliquam ac eu justo.
       Aenean nec luctus lorem. Etiam nec risus libero. Aenean eu magna semper, porta risus sit amet, maximus nulla.
       Nam sem quam, vulputate in risus quis, consectetur bibendum justo. Vivamus metus neque, dapibus sit amet malesuada
       ac, fermentum nec ex. Donec sit amet tristique metus.</p>
    <p>Consectetur adipiscing elit. Fusce ut tellus ut magna pharetra aliquam ac eu justo. Aenean nec luctus lorem.
       Aenean eu magna semper, porta risus sit amet. Fusce ut tellus ut magna pharetra aliquam ac eu justo. Etiam nec
       risus libero. Aenean eu magna semper, porta risus sit amet, maximus nulla.
       Nam sem quam, vulputate in risus quis, consectetur bibendum justo.</p>
  </div>
</section>

<?php include("templates/footer.php");?>
