<?php
require_once '../util.inc.php';
require_once '../../view/db.inc.php';

//ここでuser_idとevent_idの取得を行う
//$user_id=$_SESSION["user_id"];
//$event_id=$_POST["event_id"];

$user_id=1;
$event_id=1;
$isValidated=FALSE;

if(isset($_POST["clear"])){

	$isValidated=TRUE;

	if($isValidated==TRUE){

		try {
			//--------------------
			// データベースの準備
			//--------------------
			$pdo = db_init();
			//--------------------
			// 参加表明の削除
			//--------------------
			$dbobj=$pdo->prepare("DELETE FROM attends
				WHERE event_id = ?
				AND
				user_id= ?");
			$dbobj->execute(array($event_id,$user_id));

			//デリート終了後に画面遷移する処理
			//header("Location: _delete_done.php");
			//exit;
			$pdo = null;
		}//tryの終わり
		catch (PDOException $e) {
			echo $e->getMessage();
			exit;
		}//catchの終わり
	}
	else{
		$isValidated=FALSE;
	}
}//isValidated==TRUEの終わり


?>

<html>
<form action="" method="post">
<input type="submit" value="送信" name="clear">
</form>
</html>