<?php
//ログインチェックとユーザ情報の保持


//セッションの開始
session_start();

//ログイン認証済みでなければログインページへ移動
if ($_SESSION["authenticated"] != TRUE) {
  header("Location: ../view/acount/p_login.php");
  exit;
}