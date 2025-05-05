<?php

include("../database/connection.php");

if(isset($_POST['save_but'])){
    //Variables
    $prod_name = $_POST['prod_name'];
    $prod_descr = mysqli_real_escape_string($conn, $_POST['prod_descrip']);
    $prod_price = $_POST['prod_price'];
    $prod_img = $_FILES['file']['name'];
    $target_dir = "imagesDatabase/"; //directory where the file is going to be placed
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    
    // Select file type
    $img_file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Valid extensions
    $extensions_arr = array("jpg","jpeg","png","gif");
    // Check extension
    if (in_array($img_file_type,$extensions_arr)){
      // Convert to base64
      $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
      $image = 'data:image/'.$img_file_type.';base64,'.$image_base64;
      // Insert record
      $insert_prod = "INSERT into jushop.products (productName, description, price, image)
      VALUES ('$prod_name', '$prod_descr', '$prod_price', '".$image."')";
      // Upload file
      @move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

      if($conn->query($insert_prod)==TRUE) {
        echo "Product inserted";
      } else {
        echo "Product not inserted" . $conn->error;
      }
    }
  }
 ?>
<!--------->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/2a3ed7d0da.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../css/style.css">
  <title>JuShop - Admin</title>
</head>
<body>
  <nav class="navbar sticky-top navbar-expand-lg navbar-dark" id="shop-nav" style="background-color: rgb(63, 1, 1);">
	  <div class="container">
	    <a class="navbar-brand" href="index.php"><img src="../img/lily_white.png" class="d-inline-block align-top" alt=""> JuShop Adm</a>
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	      <span><i class="fas fa-bars"></i></span>
	    </button>
	    <div class="collapse navbar-collapse" id="ftco-nav">
	      <ul class="navbar-nav ml-auto">
	        <li class="nav-item"><a href="imginsert.php" class="nav-link">Admin</a></li>
        </ul>
	    </div>
	  </div>
  </nav>

  <section>
    <div class="col-xl-5 mx-auto form p-4">
      <h1>Insert new products</h1>
      <form method="post" action="<?php ($_SERVER["PHP_SELF"]);?>" enctype='multipart/form-data'>
        <label>Product Name</label>
        <input type="text" name="prod_name" required><br><br>
        <label>Description</label>
        <input type="text" name="prod_descrip" required><br><br>
        <label>Price</label>
        <input type="number" step=0.01 name="prod_price" required><br><br>
        <input type='file' name='file' required><br><br>
        <input type='submit' value='Save' name='save_but'>
      </form>
    </div>
  </section>
</body>
</html>

