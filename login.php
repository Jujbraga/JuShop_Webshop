<?php include("templates/header.php"); ?>
<?php include("database/validationclient.php"); ?>


<section class="login">
  <div class="container">
    <div class="col-xl-5 col-lg-6 col-md-8 mx-auto text-center form p-4">
      <h2>Login</h2>
      <form method="post" action="login.php">
        <?php if(count($errors) > 0) : ?>
            <div class="errors">
                <?php foreach ($errors as $error) : ?>
                <li><?php echo $error; ?></li>
                <?php endforeach ?>
            </div>
        <?php endif ?>
        <div class="form-group row mx-auto">
          <label class="col-sm-3 col-form-label">E-mail:</label>
          <input type="text"  class="form-control" name="email" value="<?php echo $email ?>" placeholder="Name" required></input>
        </div>
        <div class="form-group row mx-auto">
          <label class="col-sm-3 col-form-label">Password:</label>
          <input type="password" class="form-control" name="password" placeholder="Must have at last 6 characters" required></input>
        </div>
        <div class="offset-sm-2 col-sm-8">
          <input type="submit" value="Login" name="login" class="btn btn-dark"/>
        </div>
        <p>You don't have a count. <a href="signin.php">Sign in</a></p>
      </form>
    </div>
  </div>
</section>

 <?php include("templates/footer.php"); ?>
