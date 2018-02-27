<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PHP Table</title>
  <link rel="stylesheet" type="text/css" href="./styles/styles.css">
</head>

<body>
  <form name = "calendar" action = "index.php" method = "GET">
    {html_select_date prefix = 'StartDate' start_year = '-10' end_year = '+10' display_days = false}
    <button type = "submit">Select</button>
  </form>

  <table>
    <tr>
      <td></td>
      <td></td>
      {for $firstDay = 1 to $days}
        <td class = "num-cell">{$firstDay}</td>
      {/for}
    </tr>
    {foreach $usersRow as $usersItem}
      <tr>
        <td class = "num-cell">{$usersItem["id"]}</td>
        <td class = "name-cell">{$usersItem["name"]}</td>
        {for $firstDay = 1 to $days}
          <td class = "num-cell"></td>
        {/for}
      </tr>
    {/foreach}
  </table>

</body>
</html>
