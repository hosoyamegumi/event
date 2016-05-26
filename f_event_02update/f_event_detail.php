<?php
require_once '../session.php';
require_once '../db.inc.php';

//var_dump($_SESSION);


if(isset($_SESSION["flag"])){
	header("Location:p_event_list.php");
	exit;
}

try {
	//--------------------
	// データベースの準備
	//--------------------
	$pdo = db_init();

	//ここでIDをGETする
	$id=$_GET['id'];
	//$id=1;
	//var_dump($id);

	//ここでuserのidを取得します
	//$u_id=$_SESSION["id"]
	//$u_id=1; //今は仮決めです！！！！！


	//--------------------
	// イベント詳細データの取得
	//--------------------
	$sql = "SELECT * FROM events LEFT JOIN groups ON events.group_id = groups.id WHERE events.id = ?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(array($id));
	$event = $stmt->fetch();
	//var_dump($event);

	//--------------------
	// イベント登録者の取得
	//--------------------
	$sql = "SELECT * FROM
			events LEFT JOIN users ON events.registered_by = users.id
			where events.id= ?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(array($id));
	$regist = $stmt->fetch();
	//var_dump($regist);
	//var_dump($_SESSION);

	//--------------------
	// イベント参加者の取得
	//--------------------
	$sql = "SELECT * FROM attends
			LEFT JOIN users
			ON attends.user_id = users.id
			WHERE attends.event_id= ?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(array($id));
	$attends = $stmt->fetchAll();
	//var_dump($attends);

	//--------------------
	// 参加・不参加の確認
	//--------------------
	$sql = "SELECT * FROM attends WHERE user_id= ? AND event_id= ?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(array($u_id, $id));
	$attendCheck = $stmt->fetch();
	//var_dump($attendCheck);

	//--------------------
	// ユーザ種別の取得
	//--------------------

	//最初に取得しておいてSESSIONに入れておいたほうがいい．
	//管理者かどうかもここで持ち回すと早いかも

	$sql = "SELECT * FROM users WHERE id = ?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(array($u_id));
	$users = $stmt->fetch();
	//var_dump($users);
}

catch (PDOException $e) {
	echo $e->getMessage();
	exit;
}

if(isset($_POST["cancel"])){
	header("Location:p_event_list.php");
	exit;
}

// if(isset($_POST["no"])){
// 	header("Refresh: 0; url=p_event_detail.php?id={$id}");
// 	exit;
// }

if(isset($_POST["edit"])){
	//デリート終了後に画面遷移する処理
	header("Location:p_event_edit.php?id={$id}");
	exit;
}

// if(isset($_POST["delete"])){
// 	//デリート終了後に画面遷移する処理
// 	header("Location: p_event_delete.php");
// 	exit;
// }


?>