<!-- {config_load file="test.conf" section="setup"} -->
<style type="text/css">
{literal}
table {
  border-collapse: collapse;
}

td {
  border: 1px solid #000;
  padding: 5px;
}
{/literal}
</style>

Testing Smarty index.tpl <br />
<br />

<table>
  {foreach from = $letters key = k item = p}
    <tr>
      <td>{$k}</td>
      <td>{$p}</td>
    </tr>
  {/foreach}
</table>
