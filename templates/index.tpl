<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PHP Table</title>
  <link rel="stylesheet" type="text/css" href="./styles/styles.css">
</head>

<body>
  <div class = "container">
    <p>
      Select any date to display work schedule:
    </p>
    <form name = "calendar" action = "index.php" method = "GET">
      {html_select_date prefix = 'StartDate' start_year = '-10' end_year = '+10' display_days = false}
      <button type = "submit" id = "confirm">Select</button>
    </form>

    <table>
      <tr class = "first-tr">
        <td></td>
        <td></td>
        {for $firstDay = 1 to $days}
          <td class = "num-cell">{$firstDay}</td>
        {/for}
      </tr>
      {foreach $users as $usersItem}
        <tr>
          <td class = "num-cell">{$usersItem["id"]}</td>
          <td class = "name-cell">{$usersItem["name"]}</td>
          {for $firstDay = 1 to $days}
            <td class = "num-cell symbols">
            </td>
          {/for}
        </tr>
      {/foreach}
    </table>
  </div>

</body>
</html>
