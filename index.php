<?php

// Create connection
$conn = new mysqli("localhost", "xx", "xx", "work_schedule")
or die("Connection failed");

require 'libs/Smarty.class.php';

$smarty = new Smarty;

$smarty->debugging = true;
$smarty->caching = 1;
$smarty->cache_lifetime = 1;
$smarty->compile_check = true;

//get number of days for selected month$year in tpl form
$numOfDays = cal_days_in_month(CAL_GREGORIAN, $_GET["StartDateMonth"], $_GET["StartDateYear"]);

//testing
echo "Selected month has $numOfDays days";

$sql = "SELECT * FROM users";
mysqli_query($conn, $sql) or die('Error querying database.');
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
  // output data of each row
  //$usersRow is my users table
  while($usersRow = mysqli_fetch_assoc($result)) {
    //creating associative array (key => val)
    $usersRows[] = array(
      "name" => $usersRow["user_name"],
      "id" => $usersRow["user_id"]
    );
  }
}
else {
  echo "0 results";
}

$smarty->assign("days", $numOfDays);
$smarty->assign("year", $year);


$smarty->assign("months", $months);
$smarty->assign("usersRow", $usersRows);
$smarty->display('index.tpl');
$conn->close();
?>
