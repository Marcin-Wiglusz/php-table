

function cell(userId, day, symbolId, symbolName, symbolDescription) {
  // console.log(arguments);
  var cell = $('#' + userId + '_' + day);
  // console.log(cell);
  var cellSymbolName = $('#' + userId + '_' + day + ' .symbol-name');
  // console.log(cellSymbolName);

  if (symbolId) {
  cellSymbolName
  .html(symbolName)

  cell
  .attr('title', symbolDescription)
  .attr('data-symbolid', symbolId);
  // console.log(symbolId);
  }
  else {
    cellSymbolName
    .html("")

    cell
    .attr('title', "")
    .attr('data-symbolid', "");
    // console.log(symbolId);

  }
}

function hideSelect() {
  var div = $('#select-symbol').hide().css("top",0).css("left",0);
}

function showSelect(userId, day, offset) {
  var cell = $('#' + userId + '_' + day);
  var value = cell.attr('data-symbolid');
  // console.log(value);
  var div = $('#select-symbol');
  var select = $('#select-symbol select');

  select
  .attr('data-userid', userId)
  .attr('data-day', day)
  .val(value);
  // console.log(select);

  div
  .offset(offset)
  .show();

}
