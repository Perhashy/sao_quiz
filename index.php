<?php

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/Quiz.php');
require_once(__DIR__ . '/Token.php');

$question_count = 2;

$quiz = new MyApp\Quiz();

if (!$quiz->isFinished($question_count)) {
  $data = $quiz->getCurrentQuiz();
  shuffle($data['a']);
}
?>


<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>SAOクイズ</title>
    <link rel="stylesheet" href="stylesheets/application.css">
  </head>
  <body>
    <div class="main">
      <div class="main-title">
        SAOクイズ！
      </div>
      <?php if ($quiz->isFinished($question_count)) : ?>
        <div class="result">
          正答率！
          <div class="score"><?= h($quiz->getScore($question_count)); ?>%</div>
        </div>
        <a href="" class="btn"><div id="btn">もう一度遊ぶ</div></a>
        <?php $quiz->reset(); ?>
      <?php else : ?>
        <div class="question">
          <h1>問題.<?= $_SESSION['current_question'] + 1; ?></h1>
          <h1><?= h($data['q']); ?></h1>
        </div>
        <ul>
          <?php foreach ($data['a'] as $a) : ?>
            <li class="answer"><?= h($a); ?></li>
          <?php endforeach ?>
        </ul>
        <div id="btn" class="disabled"><?= $quiz->isLast($question_count) ? '結果を見る' : '次の問題へ'; ?></div>
        <input type="hidden" id="token" value="<?= h($_SESSION['token']); ?>">
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="quiz.js"></script>
      <?php endif; ?>
  </body>
</html>