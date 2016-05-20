<?php
//ログインチェックとユーザ情報の保持
//セッションの開始
session_start();

$u_name = $_SESSION["name"];
$type_id = $_SESSION["type_id"];
$aaa = $_SESSION['authenticated'];

//ログイン認証済みでなければログインページへ移動
if ($aaa != TRUE) {
	exit;

  header("Location: acount/p_login.php");

}