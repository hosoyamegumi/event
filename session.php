<?php
//ログインチェックとユーザ情報の保持
//セッションの開始
session_start();

//チェック
$aaa = $_SESSION["authenticated"];

//ログイン認証済みでなければログインページへ移動
if ($aaa != TRUE) {
  header("Location:../account/p_login.php");
  exit;
}

//ユーザ名
$u_name = $_SESSION["name"];
//管理者・一般
$type_id = $_SESSION["type_id"];
//id
$u_id = $_SESSION["u_id"];
