<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PHP Table</title>
  <style>
  /*{literal}*/
  body {
    margin: 0;
  }

  table {
    border-collapse: collapse;
    margin: 40px;
  }

  td {
    border: 1px solid #000;
    padding: 5px;
  }


  /*{/literal}*/
  </style>
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
        <td>{$firstDay}</td>
      {/for}
    </tr>
    {foreach $usersRow as $usersItem}
      <tr>
        <td>{$usersItem["id"]}</td>
        <td>{$usersItem["name"]}</td>
      </tr>
    {/foreach}
  </table>

</body>
</html>
