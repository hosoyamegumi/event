<?php
require_once "util.inc.php";
require_once "db.inc.php";
require_once 'session.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />
<title>本日のイベント｜EventManager</title>
<link href="../../css/reset.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/layout.css" />
</head>
<body>
<div id="containner">
	<?php include "../header.php"; ?>
	<div id="main">
	<h1>本日のイベント</h1>
	<!-- ページネーション挿入 -->
	<table border="1">
		<tr>
			<th>タイトル</th>
			<th>開始日時</th>
			<th>場所</th>
			<th>対象グループ</th>
			<th>詳細</th>
		</tr>
			<?php foreach ($events as $today): ?>
		<tr>
			<td><?php echo h($today["title"]);?></td>
			<td><?php echo h($today["start"]);?></td>
			<td><?php echo h($today["place"]);?></td>
			<td><?php echo h($today["group_id"]);?></td>
			<td>
			<a href ="p_event_detail.php?id=<?php echo h($today["detail"]);?>"><input type="submit" name="detail" value="詳細" class="button_001"></a>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	</div>
</div>
</body>
</html>
