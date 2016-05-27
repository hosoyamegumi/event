<?php
require_once '../session.php';
require_once '../util.inc.php';
require_once '../db.inc.php';
//ここでidの取得を行う
 $id=$_GET["id"];

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
	//var_dump($events);
	if(isset($_POST["save"])){
		//「更新」が押されたとき
		$isValidated=TRUE;
		$title=$_POST["title"];
		$start=$_POST["start"];
		$end=$_POST["end"];
		$place=$_POST["place"];
		$group_id=$_POST["group_id"];
		$detail=$_POST["detail"];
		//タイトルのバリデーション
		if($title === ""){
			$titleError="※タイトルを入力して下さい";
			$isValidated=FALSE;
		}

		if(preg_match("/[\s　]/", $title)){
			$titleError="※タイトルを入力して下さい";
			$isValidated=FALSE;
		}

	 	//開催日時のバリデーション
 		if($start === ""){
 			$startError="※開催日時を入力して下さい";
 			$isValidated=FALSE;
 		}
		elseif(!preg_match("/^\d{4}-\d{2}-\d{2}[\s　]\d{2}:\d{2}:\d{2}$/", $start)){
 			$startError="日付は「0000-00-00 00:00:00」の形式で入力してください。";
 			$isValidated=FALSE;
 		}
		//終了日時のバリデーション
		if(!preg_match("/^\d{4}-\d{2}-\d{2}[\s　]\d{2}:\d{2}:\d{2}$/", $end)){
			$endError="日付は「0000-00-00 00:00:00」の形式で入力してください。";
			$isValidated=FALSE;
		}
		//場所のバリデーション
		if($place === ""){
			$placeError="※場所を入力して下さい";
			$isValidated=FALSE;
		}

		if(preg_match("/[\s　]/", $place)){
			$placeError="※場所を入力して下さい";
			$isValidated=FALSE;
		}

		if($isValidated==TRUE){
			if(isset($_POST["save"])){
				$dbobj=$pdo->prepare
				("UPDATE events SET
						title=?, start=?, end=?, place=?, group_id=?, detail=?
						WHERE id=?");
				$dbobj->execute(array($title,$start,$end,$place,$group_id,$detail,$id));
				//編集後に移動するためのヘッダー
 				header("Location:p_event_edit_done.php?id={$id}");
				exit;
			}

			$pdo = null;
		}
	}else{
		$isValidated=FALSE;
	}
	//「キャンセル」が押されたとき
	if(isset($_POST["cancel"])){
		header("Location:p_event_detail.php?id={$id}");
		exit;
	}
}
catch (PDOException $e) {
	echo $e->getMessage();
	exit;
}
?>