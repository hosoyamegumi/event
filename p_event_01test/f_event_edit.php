<?php
require_once '../util.inc.php';
require_once '../../view/db.inc.php';

//ここでidの取得を行う
//$id=$_GET["id"];

//とりあえずベタ打ちでid
$id=10;

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

	if($_SERVER["REQUEST_METHOD"]=="POST"){
		//「更新」が押されたとき

		$isValidated=TRUE;

		$title=$_POST["title"];
		$start=$_POST["start"];
		$end=$_POST["end"];
		$place=$_POST["place"];
		$group_id=$_POST["group_id"];
		$detail=$_POST["detail"];

		//ヴァリデーションを組んでいません

		if($isValidated==TRUE){
			if(isset($_POST["save"])){
				$dbobj=$pdo->prepare
				("UPDATE events SET
						title=?, start=?, end=?, place=?, group_id=?, detail=?
						WHERE id=?");
				$dbobj->execute(array($title,$start,$end,$place,$group_id,$detail,$id));

				//編集後に移動するためのヘッダー
// 				header("Location:car_edit_done.php");
// 				exit;
			}
			//「キャンセル」が押されたとき
			if(isset($_POST["cancel"])){
				echo "キャンセルです";
// 				header("Location:carlist.php");
// 				exit;
			}
			$pdo = null;
		}
	}else{
		$isValidated=FALSE;
	}
}
catch (PDOException $e) {
	echo $e->getMessage();
	exit;
}




?>
