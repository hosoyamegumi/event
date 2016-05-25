<?php
//session_start;

require_once '../db_inc.php';
require_once '../util.inc.php';
//require_once '../session.php';

//unset($_SESSION['flag']);//破棄



$pdo=db_init();


//ページの数を決めるための条件
$sql = "SELECT COUNT(*) AS hits FROM users";
$stmt = $pdo->query($sql);
$res=$stmt->fetch();
$hits = $res["hits"];


 //ページ数の計算
$numPages = ceil($hits / 5);

//GETでPが選択されたかチェックする
 if(isset($_GET["p"])){
	  	$currentPage=$_GET["p"];
	  }
	  else{
		 	$currentPage=1;
		 }

 //LIMITのオフセットを計算する
$offset=($currentPage-1)*5;
$prevPage = $currentPage - 1;
$nextPage = $currentPage + 1;

$stmt=$pdo->query(
		"SELECT users.id AS userId,users.name AS userName,groups.name AS g_name
									FROM users
									LEFT JOIN groups
									ON users.group_id=groups.id
									LIMIT {$offset},5");

$users=$stmt->fetchAll();





if(isset($_POST['detail'])){
	header("Location:p_user_datail.php?id={$id}");
	exit;
}







?>
