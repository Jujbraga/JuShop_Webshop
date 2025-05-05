<?php
include("templates/header.php");
include("database/validationclient.php");
 ?>

<section class="signin">
  <div class="container">
    <div class="col-xl-5 col-lg-6 col-md-8 mx-auto text-center form p-4">
      <h2>Sign in</h2>
      <form method="post" action="signin.php">
        <?php if(count($errors) > 0) : ?>
            <div class="errors">
                <?php foreach ($errors as $error) : ?>
                <li><?php echo $error; ?></li>
                <?php endforeach ?>
            </div>
        <?php endif ?>
        <div class="form-group row mx-auto">
          <label class="col-form-label">Name:</label>
          <input type="text"  class="form-control" name="clientName" value="<?php echo $name ?>" placeholder="Name" required></input>
          <label class="col-form-label">Adress:</label>
          <input type="text"  class="form-control" name="adress" value="<?php echo $adress ?>" placeholder="Adress" required></input>
          <label class="col-form-label">City:</label>
          <input type="text"  class="form-control" name="city" value="<?php echo $city ?>" placeholder="City" required></input>
          <label class="col-form-label">Mobile Number:</label>
          <input type="text"  class="form-control" name="mobile" value="<?php echo $mobile ?>" placeholder="0711111111" required></input>
          <label class="col-form-label">E-mail:</label>
          <input type="email" class="form-control" name="email" value="<?php echo $email ?>" placeholder="email@gmail.com" required></input>
          <label class="col-form-label">Password:</label>
          <input type="password" class="form-control" name="password" value="<?php echo $password; ?>" placeholder="Must have at last 6 characters" required></input>
          <label class="col-form-label">Confirm password:</label>
          <input type="password" class="form-control" name="password_2" value="<?php echo $password_2; ?>" placeholder="Repeat your password" required></input>
          <div class="offset-sm-5 col-sm-3" style="padding-top: 20px">
            <input type="submit" value="Sign in" name="signin" class="btn btn-dark"/>
          </div>
        </div>
        <p>Already have a count. <a href="login.php">Login</a></p>
      </form>
    </div>
    </section>
<?php include("templates/footer.php"); ?>
