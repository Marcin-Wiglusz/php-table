<style type="text/css">

{literal}
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
{/literal}
</style>

<table>
  {foreach $usersRow as $usersItem}
    <tr>
      <td>{$usersItem["id"]}</td>
      <td>{$usersItem["name"]}</td>
    </tr>
  {/foreach}
</table>
