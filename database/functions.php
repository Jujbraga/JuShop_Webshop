<?php
/* Execute the query and connect with the database */
function executeQuery($query, $data) {
    global $conn;
    $stmt = $conn->prepare($query);
    $values = array_values($data); // retorn the values in an array with numeric keys
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values);
    $stmt->execute();
    return $stmt;
}

function insertInfo($table, $data){
    global $conn;
    $query = "INSERT INTO $table SET ";
    $i = 0;
    foreach ($data as $key => $value) {
      if ($i === 0) {
        $query = $query . " $key=?";
      } else {
        $query = $query . ", $key=?";
      }
      $i++;
    }
    $stmt = executeQuery($query, $data);
    $id = $stmt->insert_id;
    return $id;
}

/* Function to get just one row from table */
function getOne($table, $data){
    global $conn;
    $query = "SELECT * FROM $table";
    $i = 0;
    foreach ($data as $key => $value) {
      if ($i === 0) {
      $query = $query . " WHERE $key=?";
      } else {
        $query = $query . " AND $key=?";
      }
      $i++;
    }
    $query = $query . " LIMIT 1";
    $stmt = executeQuery($query, $data);
    $result = $stmt->get_result()->fetch_assoc();
    return $result;
}

function getAll($table) {
    global $conn;
    $query = "SELECT * FROM $table";
    $stmt = mysqli_query($conn, $query);
    return $stmt;
}

/* Function to get the latest rows from a table */
function getLatest($table, $column, $limit) {
    global $conn;
    $query = "SELECT * FROM $table ORDER BY $column DESC LIMIT $limit";
    $stmt = mysqli_query($conn, $query);
    return $stmt;
}

/** Functions client pages (signin and login) **/
/* Function to validade information and return errors */
function validateNewClient($new_client) {
    $errors = array();
    // See if there is just letters
    if (!preg_match("/^[a-zA-Z ]+$/", $new_client['clientName'])) {
      array_push($errors, "Name must contain only alphabets and space");
    }
    // See if there is just numbers
    if (!preg_match("/^[0-9]*$/", $new_client['mobile'])) {
      array_push($errors, "Mobil must have just numbers");
    }
    //filter_var: send a variable throug a filter
    if (!filter_var($new_client['email'], FILTER_VALIDATE_EMAIL)) {
      array_push($errors, "Please writte a valid email");
    }
    if (strlen($new_client['password']) < 6) {
	     array_push($errors, "Password must at least 6 characters");
    }
    if ($_POST['password_2'] !== $_POST['password']){
      array_push($errors, "Password do not match");
    }
    //see if the e-mail already exist in database
    $is_client = getOne('clients', ['email' => $new_client['email']]);
    if (isset($is_client)) {
      array_push($errors, "E-mail already exists");
    }
    //see if the mobile number already exist in database
    $is_client = getOne('clients', ['mobile' => $new_client['mobile']]);
    if (isset($is_client)) {
      array_push($errors, "Mobile already exists");
    }
    return $errors;
}

/* Login client and get info in $_SESSION */
function loginClient($client){
    $_SESSION["client"]["clientId"] =$client["clientId"];
    $_SESSION["client"]["email"] = $client['email'];
    $_SESSION["client"]["clientName"] = $client['clientName'];
    $_SESSION["client"]["message"] = "You are now logged in";
    $_SESSION["client"]["type"] = "sucess";

    if(isset($_SESSION['cart']) & $_SESSION['cart'] > 0) {
      header('location: bag.php');
    } else {
      header('location: products.php');
    }
    exit();
}
?>
