<?php
require_once '../session.php';
require_once '../util.inc.php';
require_once '../db.inc.php';
//ポスト処理が行われたとき
// if($_SERVER["REQUEST_METHOD"]=="POST"){
//--------------------
// 変数の初期化
//--------------------
$title="";
$start="";
$end="";
$place="";
$group_id="";
$detail="";
	//「追加」ボタンが押された場合の処理
	if(isset($_POST["add"])){
	//フラグを立てる
	$isValidated=TRUE;
	//各項目を入れる変数
 	$title=$_POST["title"];
	$start=$_POST["start"];
	$end=$_POST["end"];
	$place=$_POST["place"];
	$group_id=$_POST["group_id"];
	$detail=$_POST["detail"];
 	$registered_by=$_SESSION['u_id'];
	//$registered_by=1;
// 	$title='テスト';
// 	$start='2016-05-20 11:30:06';
// 	$end='2016-05-20 11:30:06';
// 	$place="秋葉原";
// 	$group=1;
// 	$detail="テスト";
// 	$registered_by=1;
 	//タイトルのバリデーション
	if($title === ""){
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
					(? ,? ,? ,? ,1 ,? ,? ,NOW() )");
			$eventAdd->execute(array($title, $start, $end, $place, $detail,$registered_by));

			header("Location: p_event_add_done.php");
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
//	}
	//キャンセルボタンが押されたときの処理
}
else{
	$isValidated=FALSE;
}
if(isset($_POST["cancel"])){
	header("Location: p_event_list.php");
	exit;
}
?>