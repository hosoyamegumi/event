<?php
//require_once '../util.inc.php';
require_once '../../view/db.inc.php';

	//「追加」ボタンが押された場合の処理
	if(isset($_POST["add"])){

		echo "ここまで";

	//フラグを立てる
	$isValidated=TRUE;

	$user_id=1;
	$event_id=1;

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
		$eventAdd->execute(array($user_id, $event_id));


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

<html>
<form action="" method="post">
<input type="submit" value="送信" name="add">
</form>
</html>