

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
  //console.log(cell);
  }
  else {
    cellSymbolName
    .html("")
    
    cell
    .attr('title', "")
    .attr('data-symbolid', "");

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

  div
  .offset(offset)
  .show();
}
