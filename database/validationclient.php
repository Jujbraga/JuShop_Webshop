<?php

$name = $adress = $city = $mobile = $email = $password = $password_2 = "";
$errors = array();
$table = 'clients';

/* Sign in validation */
/** Verify if there are errors and if it's not do the hash in the password and insert into table **/
if (isset($_POST["signin"])  & !empty($_POST)) {
  $errors = validateNewClient($_POST);
  if (count($errors) === 0) {
    unset($_POST['signin'], $_POST['password_2']);
    $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT); //kryptera password
    $client_id = insertInfo($table, $_POST);
    $client = getOne($table, ['clientId' => $client_id]);
    // Login clients
    loginClient($client);
    exit();
  } else {
    $name = $_POST['clientName'];
    $adress = $_POST['adress'];
    $city = $_POST['city'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_2 = $_POST['password_2'];
  }
}

/* Login validation */
/** Verify if the e-mail exist in table **
** compare the given password through the function password_verify **/
if (isset($_POST["login"])  & !empty($_POST)) {
  $client = getOne($table, ['email' => $_POST['email']]);
  if ($client && password_verify($_POST['password'], $client['password'])) {
    loginClient($client);
  } else {
    array_push($errors, "E-mail and password doesn't macth");
  }
  $email = $_POST['email'];
  $password = $_POST['password'];
}

 ?>
