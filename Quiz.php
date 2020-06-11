<?php

namespace MyApp;

class Quiz {

  private $_quizSet = [];

  public function __construct() {
    $this->_setup();
    Token::create();
    if (!isset($_SESSION['current_question'])) {
      $this->_initSession();
    }
  }

  private function _initSession() {
    $_SESSION['current_question'] = 0;
    $_SESSION['correct_count'] = 0;
  }

  private function questionRandom() {
    $question_num = random_int(0, 2);
    $_SESSION['question_num'] = $question_num;
  }

  public function random() {
    $this->questionRandom();
  }

  public function correctAnswer() {
    Token::validate('token');
    $correctAnswer = $this->_quizSet[$_SESSION['question_num']]['a'][0];
    if (!isset($_POST['answer'])) {
      throw new \Exception('answer not set!');
    }
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
    $this->_initSession();
  }

  public function getCurrentQuiz() {
    return $this->_quizSet[$_SESSION['question_num']];
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