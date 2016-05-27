 <?php
 require_once "../../php/event/f_event_edit.php";
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />
<title>イベント編集｜EventManager</title>
	<link href="../../css/reset.css" rel="stylesheet">
	<link href="../../css/layout.css" rel="stylesheet">
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
			<p><input type="text" name="title" value="<?php echo h($events["title"]);?>"></p>

		<p>開始日時（必須）</p>
		<!-- もしエラーがあったら表示 -->
		<?php if (isset($startError)): ?>
          <div class="error"><?php echo h($startError);?></div>
       <?php endif;?>
			<p><input type="text" name="start" value="<?php echo h($events["start"]);?>"></p>

		<p>終了日時</p>
		<!-- もしエラーがあったら表示 -->
		<?php if (isset($endError)): ?>
          <div class="error"><?php echo h($endError);?></div>
       <?php endif;?>
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
			    <option value="1">管理部</option>
			    <option value="2">総務部</option>
			    <option value="3">人事部</option>
			    <option value="4">その他</option>
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