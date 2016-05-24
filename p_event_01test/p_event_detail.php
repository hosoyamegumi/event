<?php
require_once "util.inc.php";
require_once "db.inc.php";
//require_once 'session.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />
<title>イベント詳細｜EventManager</title>
<link href="../../css/reset.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../../css/layout.css" />

	<script src="../js/jquery-loader.js"></script>

 	<link rel="stylesheet" href="../../css/remodal.css">
    <link rel="stylesheet" href="../../css/remodal-default-theme.css"><script src="../src/jquery-loader.js"></script>
    <script src="../js/remodal.js"></script>

    <style>
      .remodal-overlay.without-animation.remodal-is-opening,
      .remodal-overlay.without-animation.remodal-is-closing,
      .remodal.without-animation.remodal-is-opening,
      .remodal.without-animation.remodal-is-closing,
      .remodal-bg.without-animation.remodal-is-opening,
      .remodal-bg.without-animation.remodal-is-closing { animation: none;}
  </style>
</head>

<body>
<div id="containner">
<?php //include "../header.php"; ?>
	<div id="main">
	<h1>イベント詳細</h1>
	<!-- ページネーション挿入 -->
	<dl>
		<dt>タイトル</dt>
		<dd><?php echo h($title)?></dd>
		<dt>開催日時</dt>
		<dd><?php echo h($start)?></dd>
		<dt>終了日時</dt>
		<dd><?php echo h($end)?></dd>
		<dt>場所</dt>
		<dd><?php echo h($place)?></dd>
		<dt>対象グループ</dt>
		<dd><?php echo h($group_id)?></dd>
		<dt>詳細</dt>
		<dd><?php echo h($detail)?></dd>
		<dt>登録者</dt>
		<dd><?php echo h($registerd_by)?></dd>
		<dt>参加者</dt>
		<dd><?php echo h($u_name)?></dd>
	</dl>
	<p>
	<a href="p_event_list.php"><input type="submit" name="cancel" value="一覧に戻る"></a>
	<a href="p_event_detail.php"><input type="submit" name="add" value="参加する"></a>
	<a href="p_event_edit.php"><input type="submit" name="edit" value="編集"></a>
	<a href="p_event_delete.php" data-remodal-target="modal"><input type="submit" name="delete" value="削除"></a>
	</p>
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
