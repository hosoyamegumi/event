 <?php
 require_once "util.inc.php";
 require_once "db.inc.php";
 require_once 'session.php';
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
	<?php include "../header.php"; ?>
	<div id="main">
	<h1>イベント編集</h1>
	<!-- ページネーション挿入 -->
	<form action="" method="post">

		<p>タイトル（必須）</p>
		<!-- もしエラーがあったら表示 -->
	   <?php if (isset($titleError)): ?>
          <div class="error"><?php echo h($titleError);?></div>
       <?php endif;?>
			<p><input type="text" name="title" value="<?php echo h($title);?>"></p>

		<p>開始日時（必須）</p>
		<!-- もしエラーがあったら表示 -->
		<?php if (isset($startError)): ?>
          <div class="error"><?php echo h($startError);?></div>
       <?php endif;?>
			<p><input type="text" name="start" value="<?php echo h($start);?>"></p>

		<p>終了日時</p>
			<p><input type="text" name="end" value="<?php echo h($end);?>"></p>

		<p>場所（必須）</p>
		<!-- もしエラーがあったら表示 -->
	  	<?php if (isset($placeError)): ?>
          <div class="error"><?php echo h($placeError);?></div>
       <?php endif;?>
			<p><input type="text" name="place" value="<?php echo h($place);?>"></p>

		<p>対象グループ</p>
		<p>
			<select name="group_id">
			<option>全員</option>
			<option>管理部</option>
			<option>総務部</option>
			<option>人事部</option>
			</select>
		</p>
		<p>詳細</p>
			<p><textarea name="detail" value="<?php echo h($detail);?>"></textarea></p>
		<p>
			<input type="submit" name="cancel" value="キャンセル">
			<input type="submit" name="save" value="保存">
		</p>
	</form>
	</div>
</div>
</body>
</html>