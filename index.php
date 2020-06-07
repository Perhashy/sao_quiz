<?php

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/Quiz.php');

$quiz = new MyApp\Quiz();

$data = $quiz->getCurrentQuiz();
shuffle($data['a']);
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
      <div class="question">
        <h1>問題.<?= $_SESSION['current_question'] + 1; ?></h1>
        <h1><?= h($data['q']); ?></h1>
      </div>
      <ul>
        <?php foreach ($data['a'] as $a) : ?>
          <li class="answer"><?= h($a); ?></li>
        <?php endforeach ?>
      </ul>
      <div id="btn">次の問題へ</div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="quiz.js"></script>
  </body>
</html>