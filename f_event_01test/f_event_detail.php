<?php
//require_once '../util.inc.php';
require_once '../../php/db.inc.php';



try {
	//--------------------
	// データベースの準備
	//--------------------
	$pdo = db_init();

	//ここでIDをGETする
	//$id=$_GET['id'];
	$id=1;

	//--------------------
	// イベント詳細データの取得
	//--------------------
	$sql = "SELECT * FROM events WHERE id = ?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(array($id));
	$event = $stmt->fetch();
	//var_dump($event);

	//--------------------
	// イベント登録者の取得
	//--------------------
	$sql = "SELECT * FROM
			users LEFT JOIN events ON users.id = events.registered_by
			WHERE events.id= ?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(array($id));
	$regist = $stmt->fetch();
	var_dump($regist);

	//--------------------
	// イベント参加者の取得
	//--------------------

	$sql = "SELECT * FROM attends LEFT JOIN users
			ON attends.user_id = users.id";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(array());
	$attends = $stmt->fetchAll();
	//var_dump($attends);

	//--------------------
	// ユーザ種別の取得
	//--------------------

	$sql = "SELECT * FROM users WHERE id = ?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(array($id));
	$user = $stmt->fetch();
	//var_dump($user);
}

catch (PDOException $e) {
	echo $e->getMessage();
	exit;
}




?>