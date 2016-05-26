<?php
require_once '../util.inc.php';
require_once '../../php/event/f_event_detail.php';
require_once '../../php/event/f_event_join.php';
require_once '../../php/event/f_event_join_cancel.php';
require_once '../../php/event/f_event_delete.php';
require_once '../../php/event/f_event_edit.php';
//require_once 'session.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />
<title>イベント詳細｜EventManager</title>
<link href="../../css/reset.css" rel="stylesheet">
<link rel="stylesheet" href="../../css/remodal.css">
 <link rel="stylesheet" href="../../css/remodal-default-theme.css">
<link rel="stylesheet" type="text/css" href="../../css/layout.css" />

	<script src="../../js/jquery-loader.js"></script>
	<script src="../../js/remodal.js"></script>

</head>
<body>
<div id="containner">
<?php include "../header.php"; ?>
	<div id="main">
	<h1>イベント詳細</h1>
	<dl>
		<dt>タイトル</dt>
		<dd>
			<?php echo h($event["title"]);?>
			<?php if($attendCheck!=FALSE):?>
			<span>参加</span>
			<?php endif; ?>
		</dd>
		<dt>開催日時</dt>
		<dd><?php echo h($event["start"]);?></dd>
		<dt>終了日時</dt>
		<dd><?php echo h($event["end"]);?></dd>
		<dt>場所</dt>
		<dd><?php echo h($event["place"]);?></dd>
		<dt>対象グループ</dt>
		<dd><?php echo h($event["name"]);?></dd>
		<dt>詳細</dt>
		<dd><?php echo h($event["detail"]);?></dd>
		<dt>登録者</dt>
		<dd><?php echo h($regist["name"]);?></dd>
		<dt>参加者</dt>
		<dd><?php foreach ($attends as $user) echo $user["name"]." "; ?></dd>
	</dl>

	<form action="" method= "post">
	<a href="p_event_list.php"><input type="submit" name="cancel" value="一覧に戻る"></a>
		<?php if($attendCheck== FALSE): ?>
			<input type="submit" name="add" value="参加する">
		<?php elseif($attendCheck!=FALSE): ?>
			<input type="submit" name="clear" value="参加しない">
		<?php endif; ?>


	<?php if( $regist['registered_by']== $u_id || $users["type_id"] == 2 ): ?>
	<input type="submit" name="edit" value="編集">
	<input type="submit" name="delete" value="削除"  data-remodal-target="modal">
	<?php endif; ?>
	</form>
	</div>
</div>

<div class="remodal" data-remodal-id="modal">
<p class="comment">本当に削除してよろしいですか？</p>
  <a data-remodal-action="close" class="remodal-close"></a>

<!-- button -->
<form method="post">
		<input type="submit" name="cancel" value="Cancel" id="button_01">
		<input type="submit" name="ok" value="OK" id="button_01">
</form>
</div>

</body>
</html>