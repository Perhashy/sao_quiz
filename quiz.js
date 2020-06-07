$(function() {
  'user strict';

  $('.answer').on('click', function(){
    var $selected = $(this);
    $selected.addClass('selected');
    var answer = $selected.text();
    console.log(answer);

    $.post('/_answer.php', {
      
    }).done(function(res) {
      $('answer').each(function(){
        if ($(this).text() === res.correct_answer) {
          $(this).addClass('correct');
        } else {
          $(this).addClass('wrong');
        }
      });
      if (answer === res.correct_answer) {
        $selected.text(answer + ' ...正解！👍');
      } else {
      $selected.text(answer + ' ...不正解(´・ω・`)');
      }
    });
  });
});