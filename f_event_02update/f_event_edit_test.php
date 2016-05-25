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

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />
<title>イベント編集｜EventManager</title>
<link href="../../css/reset.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/layout.css" />
</head>
<body>
<div id="containner">
	<div id="main">
	<h1>イベント編集</h1>
	<!-- ページネーション挿入 -->
	<form action="" method="post">

		<p>タイトル（必須）</p>
		<!-- もしエラーがあったら表示 -->
	   <?php if (isset($titleError)): ?>
          <div class="error"><?php echo h($titleError);?></div>
       <?php endif;?>
			<p><input type="text" name="title" value="<?php echo h($events["title"]);?>"></p>

		<p>開始日時（必須）</p>
		<!-- もしエラーがあったら表示 -->
		<?php if (isset($startError)): ?>
          <div class="error"><?php echo h($startError);?></div>
       <?php endif;?>
			<p><input type="text" name="start" value="<?php echo h($events["start"]);?>"></p>

		<p>終了日時</p>
			<p><input type="text" name="end" value="<?php echo h($events["end"]);?>"></p>

		<p>場所（必須）</p>
		<!-- もしエラーがあったら表示 -->
	  	<?php if (isset($placeError)): ?>
          <div class="error"><?php echo h($placeError);?></div>
       <?php endif;?>
			<p><input type="text" name="place" value="<?php echo h($events["place"]);?>"></p>

		<p>対象グループ</p>
		<p>
			<select name="group_id">
			<option >全員</option>
			<option>管理部</option>
			<option>総務部</option>
			<option>人事部</option>
		<!-- 	<option <?php // if($cars["maker"]=="トヨタ") {echo "Selected";} ?> >トヨタ</option> -->
			</select>
		</p>
		<p>詳細</p>
			<p><textarea name="detail"><?php echo h($events["detail"]);?></textarea></p>
		<p>
			<input type="submit" name="cancel" value="キャンセル">
			<input type="submit" name="save" value="保存">
		</p>
	</form>
	</div>
</div>
</body>
</html>
