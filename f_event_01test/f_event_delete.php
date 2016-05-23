<?php
require_once '../util.inc.php';
require_once '../db.inc.php';

//ここでidの取得を行う
//$id=$_GET["id"];

$id=11;

try {
	//--------------------
	// データベースの準備
	//--------------------
	$pdo = db_init();

	//--------------------
	// 在庫リストの取得
	//--------------------
	$sql = "SELECT * FROM events WHERE id = ".$id;
	$stmt = $pdo->query($sql);
	$events = $stmt->fetch();

	//--------------------
	// 在庫リストの削除
	//--------------------
// 	if($_SERVER["REQUEST_METHOD"]=="POST"){
		//「削除」が押されたとき

// 		if(isset($_POST["delete"])){
			$dbobj=$pdo->prepare("DELETE FROM events WHERE id = ?");
			$dbobj->execute(array($id));

			//デリート終了後に画面遷移する処理
			//header("Location: _delete_done.php");
			//exit;
// 		}
		//「キャンセル」が押されたとき
// 		if(isset($_POST["cancel"])){
// 			header("Location: carlist.php");
// 			exit;
// 		}
// 	}

	//--------------------
	// DB接続の解放
	//--------------------
	$pdo = null;
}
catch (PDOException $e) {
	echo $e->getMessage();
	exit;
}

?>