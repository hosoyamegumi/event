<?php
require_once '../util.inc.php';
require_once '../../view/db.inc.php';

try {
	//--------------------
	// データベースの準備
	//--------------------
	$pdo = db_init();

	//ここでIDをGETする
	//$id=$_GET['id'];
	$id=1;

	//--------------------
	// 在庫リストの取得
	//--------------------
	$sql = "SELECT * FROM events WHERE id = ?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(array($id));
	$event = $stmt->fetch();

	var_dump($event);
}
catch (PDOException $e) {
	echo $e->getMessage();
	exit;
}




?>