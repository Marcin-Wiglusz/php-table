<?php


// val for connection
include 'dbaccess.php';

// Create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_SCHEME)
or die("Connection failed");

require 'libs/Smarty.class.php';

$smarty = new Smarty;

$smarty->debugging = true;
$smarty->caching = 1;
$smarty->cache_lifetime = 1;
$smarty->compile_check = true;

//get number of days for selected months&year in tpl form
$numOfDays = cal_days_in_month(CAL_GREGORIAN, $_GET["StartDateMonth"], $_GET["StartDateYear"]);

$users = [];
$symbols = [];
$users_symbols = [];

if ($numOfDays != 0) {

  $sql = "SELECT id, name FROM user";
  mysqli_query($conn, $sql) or die('Error querying database.');

  $result = mysqli_query($conn, $sql);
  if ($result->num_rows > 0) {
    // output data of each row
    //$row is my user table
    while($row = mysqli_fetch_assoc($result)) {
      $users[] = $row;
    }
  }

  $sql = "SELECT id, name, description FROM symbol";
  mysqli_query($conn, $sql) or die('Error querying database.');

  $result = mysqli_query($conn, $sql);
  if ($result->num_rows > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $symbols[] = $row;
    }
  }
  //backtick to avoid php name
  $sql = "SELECT user_id, `date`, symbol_id FROM user_symbol";
  mysqli_query($conn, $sql) or die('Error querying database.');

  $result = mysqli_query($conn, $sql);
  if ($result->num_rows > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $users_symbols[] = $row;
    }
  }
}

$smarty->assign("users", $users);
$smarty->assign("users_symbols", $users_symbols);
$smarty->assign("symbols", $symbols);
$smarty->assign("days", $numOfDays);
$smarty->display('index.tpl');
$conn->close();
?>
