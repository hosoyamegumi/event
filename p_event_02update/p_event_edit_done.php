<?php
require_once '../session.php';
require_once '../util.inc.php';
$id=$_GET["id"];
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
		<!-- ページネーション挿入 -->
	<h1>イベント編集</h1>
	<p>イベントの編集が完了しました。</p>
	<p><a href="p_event_detail.php?id=<?php echo $id; ?>">イベント詳細に戻る</a></p>
</div>
</div>
</body>
</html>