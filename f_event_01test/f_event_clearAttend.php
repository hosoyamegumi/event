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
	// 在庫リストの削除
	//--------------------
// 	if($_SERVER["REQUEST_METHOD"]=="POST"){
		//「削除」が押されたとき

		if(isset($_POST["clear"])){
			$dbobj=$pdo->prepare("DELETE FROM attends WHERE id = ?");
			$dbobj->execute(array($id));

			//デリート終了後に画面遷移する処理
			//header("Location: _delete_done.php");
			//exit;
 		}

 	}

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