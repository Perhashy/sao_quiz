<?php

function h($s) {
  return htmlspecialchars($s, ENT_GUOTES, 'utf-8');
}