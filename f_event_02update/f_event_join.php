<?php
//require_once '../util.inc.php';
require_once '../db.inc.php';

	//「追加」ボタンが押された場合の処理
	if(isset($_POST["add"])){

	//フラグを立てる
	$isValidated=TRUE;

	if($isValidated==TRUE){
		try {
		//--------------------
		// データベースの準備
		//--------------------
		$pdo = db_init();

		//--------------------
		// 在庫リストの追加
		//--------------------
		$eventAdd=$pdo->prepare("INSERT INTO attends
				(user_id,event_id)
				VALUES (? ,?)");
		$eventAdd->execute(array($u_id, $id));

		header("Location:p_event_detail.php?id={$id}");
		exit;

		//--------------------
		// DB接続の解放
		//--------------------
		$pdo = null;
		}
		catch (PDOException $e) {
			echo $e->getMessage();
			exit;
		}
	}
	}
	else{
		$isValidated=FALSE;
	}
?>