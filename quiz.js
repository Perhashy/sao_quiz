$(function() {
  'user strict';

  $('.answer').on('click', function(){
    var $selected = $(this);
    var answer = $selected.text();
    console.log(answer);

    $.post('/_answer.php', {
      
    }).done(function(res) {
      if (answer === res.correct_answer) {
        $selected.text(answer + ' ...正解！👍');
      } else {
      $selected.text(answer + ' ...不正解(´・ω・`)');
      }
    });
  });
});