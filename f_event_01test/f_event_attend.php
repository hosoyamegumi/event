<?php
require_once '../util.inc.php';
require_once '../db.inc.php';

//ポスト処理が行われたとき
if($_SERVER["REQUEST_METHOD"]=="POST"){

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
			$eventAdd=$pdo->prepare("INSERT INTO events
					(title, start, end, place, group_id, detail, registered_by, created)
					VALUES
					(? ,? ,? ,? ,1 ,? ,1 ,NOW() )");
			$eventAdd->execute(array($title, $start, $end, $place, $detail));

			echo "ここまで";


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
//	}

else{
	$isValidated=FALSE;
}


?>