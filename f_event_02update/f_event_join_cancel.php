<?php
//require_once '../util.inc.php';
require_once '../db.inc.php';


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
			$dbobj->execute(array($id,$u_id));

			//デリート終了後に画面遷移する処理
			header("Location:p_event_detail.php?id={$id}");
		exit;

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

if(isset($_POST["cancel"])){
	header("Location:p_event_list.php");
	exit;
}

if(isset($_POST["edit"])){
	//デリート終了後に画面遷移する処理
	header("Location:p_event_edit.php?id={$id}");
	exit;
}

if(isset($_POST["delete"])){
	//デリート終了後に画面遷移する処理
	header("Location: p_event_delete.php");
	exit;
}

?>

