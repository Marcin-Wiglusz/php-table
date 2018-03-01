<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PHP Table</title>
  <link rel = "stylesheet" type = "text/css" href = "./styles/styles.css">
</head>

<body>
  <div class = "container">
    <p>
      Select any date to display work schedule:
    </p>
    <form name = "calendar" action = "index.php" method = "GET">
      {html_select_date prefix = 'StartDate' time=$time start_year = '-10' end_year = '+10' display_days = false}
      <button type = "submit" id = "confirm">Select</button>
    </form>

    <table>
      <tr>
        <td></td>
        <td></td>
        {for $day = 1 to $days}
          <td class = "num-cell">{$day}</td>
        {/for}
      </tr>
      {foreach $users as $usersItem}
        <tr>
          <td class = "num-cell">{$usersItem["id"]}</td>
          <td class = "name-cell">{$usersItem["name"]}</td>

          {for $day = 1 to $days}
          <!-- title will show description on hover -->
            <td
              class = "num-cell"
              id = "{$usersItem["id"]}_{$day}"
              title = ""
              onclick = "showSelect({$usersItem["id"]}, {$day}, $(this).offset())">
                <span class = "symbol-name"></span>
            </td>
          {/for}

        </tr>
      {/foreach}
    </table>
  </div>

  <div id = "select-symbol">

    <!-- data for select onclick from showSelect() -->
    <select
    onchange = "cell(
      $(this).attr('data-userid'),
      $(this).attr('data-day'),
      $('#symbol-value-' + $(this).val()).attr('data-id'),
      $('#symbol-value-' + $(this).val()).attr('data-name'),
      $('#symbol-value-' + $(this).val()).attr('data-description')); hideSelect();"
    data-userid = ""
    data-day = "">
      <option id = "symbol-value-0" value = "0"></option>

      {foreach $symbols as $item}
      <!-- data for options from symbol table -->
      <option
        id = "symbol-value-{$item["id"]}"
        value = "{$item["id"]}"
        data-id = "{$item["id"]}"
        data-name = "{$item["name"]}"
        data-description = "{$item["description"]}">{$item["name"]}
      </option>
      {/foreach}

    </select>
  </div>

  <script src = "https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src = "./js/app.js"></script>

</body>
</html>
