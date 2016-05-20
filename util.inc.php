<?php
/**
 * XSS対策用関数
 */
function h($string)
{
  return htmlspecialchars($string, ENT_QUOTES);
}