<?php
require_once "../../php/event/f_event_add.php";
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />
<title>イベント登録｜EventManager</title>
<link href="../../css/reset.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/layout.css" />
</head>
<body>
<div id="containner">
	<?php include "../header.php"; ?>
	<div id="main">
	<h1>イベント登録</h1>
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
			<p><input type="text" name="start" value="<?php echo h($start);?>" placeholder="0000-00-00 00:00:00"></p>

		<p>終了日時</p>
		<!-- もしエラーがあったら表示 -->
		<?php if (isset($endError)): ?>
			<div class="error"><?php echo h($endError);?></div>
		<?php endif;?>
			<p><input type="text" name="end" value="<?php echo h($end);?>" placeholder="0000-00-00 00:00:00"></p>

		<p>場所（必須）</p>
		<!-- もしエラーがあったら表示 -->
	  	<?php if (isset($placeError)): ?>
          <div class="error"><?php echo h($placeError);?></div>
       <?php endif;?>
			<p><input type="text" name="place" value="<?php echo h($place);?>"></p>

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
			<p><textarea name="detail" value="<?php echo h($detail);?>"></textarea></p>
		<p>
			<input type="submit" name="no" value="キャンセル">
			<input type="submit" name="add" value="登録">
		</p>
	</form>
	</div>
</div>
</body>
</html>