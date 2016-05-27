<?php
require_once "../session.php";
require_once '../../php/event/f_event_list.php';

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />
<title>イベント一覧｜EventManager</title>
	<link href="../../css/reset.css" rel="stylesheet">
	<link href="../../css/layout.css" rel="stylesheet">
</head>
<body>
<div id="containner">
<?php include "../header.php"; ?>
	<div id="main">
	<h1>イベント一覧</h1>
	<!-- ページネーション挿入 -->
	<div id="page">
	 <?php
    if ($numPages > 1) {
      //--------------------
      // 前のページへのリンク
      //--------------------
      if ($currentPage == 1) {
        echo "&lt&lt  ";
      }
      else {
        echo '<a href="?p='.h($prevPage).'">&lt&lt</a>  ';
      }
      //--------------------
      // ページ番号のリンク
      //--------------------
      for ($p = 1; $p <= $numPages; $p++) {
        if ($p == $currentPage) {
          echo " ".h($p)." ";
        }
        else {
          echo ' <a href="?p='.h($p).'">'.h($p).'</a> ';
        }
      }
      //--------------------
      // 次のページへのリンク
      //--------------------
      if ($currentPage == $numPages) {
        echo " &gt&gt";
      }
      else {
        echo ' <a href="?p='.h($nextPage).'">&gt&gt</a>';
      }
    }
    ?>
	</div>

	<table>
		<tr>
			<th>タイトル</th>
			<th>開始日時</th>
			<th>場所</th>
			<th>対象グループ</th>
			<th>詳細</th>
		</tr>
		<?php foreach ($events as $list): ?>
		<tr>
			<td>
				<?php echo h($list["title"]);?>
				<?php foreach ($attends as $attend): ?>
				<?php if($list[0]==$attend["event_id"]) echo "<span>参加</span>";?>
				<?php endforeach; ?>
			</td>
			<td>
				<?php
				$date=new DateTime(h($list["start"]));
				$w = $weekday[$date->format('w')];
				echo $date->format('Y年m月d日')."({$w})";
				?>
			</td>
			<td><?php echo h($list["place"]);?></td>
			<td><?php echo h($list["name"]);?></td>
			<td>
			<a href ="p_event_detail.php?id=<?php echo h($list[0]);?>"><input type="submit" name="detail" value="詳細"></a>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<a href ="p_event_add.php"><input type="submit" name="add" value="イベントの登録"></a>
	</div>
</div>
</body>
</html>
