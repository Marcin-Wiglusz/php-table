<?php

// Create connection
$conn = new mysqli("localhost", "xx", "xx", "work_schedule")
or die("Connection failed");

require 'libs/Smarty.class.php';

$smarty = new Smarty;

$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 120;

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

$smarty->assign("usersRow", $usersRows);
$smarty->display('index.tpl');
$conn->close();
?>
