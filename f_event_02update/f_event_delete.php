<?php
require_once '../session.php';
require_once '../db.inc.php';

//ここでidの取得を行う
//$id=$_GET["id"];

// if(isset($_SESSION["flag"])){
// 	header("Location: p_event_list");
// }


try {
	//--------------------
	// データベースの準備
	//--------------------
	$pdo = db_init();

 		if(isset($_POST["ok"])){
			$dbobj=$pdo->prepare("DELETE FROM events WHERE id = ?");
			$dbobj->execute(array($id));

			$_SESSION["flag"]=TRUE;

			//デリート終了後に画面遷移する処理
			header("Location:p_event_delete_done.php");
			exit;
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