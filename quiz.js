$(function() {
  'user strict';

  $('.answer').on('click', function(){
    var $selected = $(this);
    var answer = $selected.text()
    console.log(answer);
  });
});