<?php

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/Quiz.php');

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
        <h1>問題.1</h1>
        <h1>問題文</h1>
      </div>
      <ul>
        <li class="answer">答え</li>
        <li class="answer">答え</li>
        <li class="answer">答え</li>
        <li class="answer">答え</li>
      </ul>
      <div id="btn">次の問題へ</div>
    </div>
  </body>
</html>