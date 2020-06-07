<?php

namespace MyApp;

class Quiz {

  private $_quizSet = [];

  public function __construct() {
    $this->_setup();
    if (!isset($_SESSION['current_question'])) {
      $_SESSION['current_question'] = 0;
      $_SESSION['correct_count'] = 0;
    }
  }

  public function correctAnswer() {
    $correctAnswer = $this->_quizSet[$_SESSION['current_question']]['a'][0];
    if ($correctAnswer === $_POST['answer']) {
      $_SESSION['correct_count']++;
    }
    $_SESSION['current_question']++;
    return $correctAnswer;
  }

  public function isFinished($question_count) {
    return $question_count === $_SESSION['current_question'];
  }

  public function getScore($question_count) {
    return round($_SESSION['correct_count'] / $question_count * 100);
  }

  public function isLast($question_count) {
    return $question_count === $_SESSION['current_question'] + 1;
  }

  public function reset() {
    $_SESSION['current_question'] = 0;
    $_SESSION['correct_count'] = 0;
  }

  public function getCurrentQuiz() {
    return $this->_quizSet[$_SESSION['current_question']];
  }

  private function _setup() {
    $this->_quizSet[] = [
      'q' => 'キリトの代表的な16連撃のソードスキルの名前は？',
      'a' => ['スターバーストストリーム', 'スターバーストスクリーム', 'スターライトスプラッシュ', 'ジ・イクリプス']
    ];
    $this->_quizSet[] = [
      'q' => 'デスゲームであるSAOがクリアされた日時は？',
      'a' => ['2024年11月7日', '2024年7月7日', '2022年12月7日', '2024年11月8日']
    ];
    $this->_quizSet[] = [
      'q' => 'キリトとアスナが買ったログハウスは何層にある？',
      'a' => ['22層', '24層', '21層', '18層']
    ];
  }
}