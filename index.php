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

$year = $_GET['StartDateYear'];
$month = $_GET['StartDateMonth'];

//get number of days for selected months&year in tpl form
$numOfDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);

$users = [];
$symbols = [];

  $sql = "SELECT id, name FROM user";
  mysqli_query($conn, $sql) or die('Error querying database.');

  $result = mysqli_query($conn, $sql);
  if ($result->num_rows > 0) {
    // output data of each row
    //$row - each row in my user table
    while($row = mysqli_fetch_assoc($result)) {
      // creating assoc arr (key => val), key is ID, val is each row in user table
      $users[$row['id']] = $row;
    }
  }


  $sql = "SELECT id, name, description FROM symbol";
  mysqli_query($conn, $sql) or die('Error querying database.');

  $result = mysqli_query($conn, $sql);
  if ($result->num_rows > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $symbols[$row['id']] = $row;
    }
  }

$smarty->assign("users", $users);
$smarty->assign("symbols", $symbols);
$smarty->assign("days", $numOfDays);
$smarty->display('index.tpl');
$conn->close();
?>
