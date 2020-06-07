<?php

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/Quiz.php');

$quiz = new MyApp\Quiz();

try {
  $correctAnswer = $quiz->correctAnswer();
} catch (Exception $e) {
  header($_SERVER['SERVER_PROTOCOL'] . '403 Forbidden', true, 403);
  echo $e->getMessage();
  exit;
}

header('content-type: application/json; charset=UTF-8');
echo json_encode([
  'correct_answer' => $correctAnswer
]);
