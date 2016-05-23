<?php
 require_once "../session.php";
 require_once "../util.inc.php";
 require_once "../db.inc.php";
?>


<!DOCTYPE html>
<html lang="ja">

<!-- head -->
  <head>
	<meta charset="utf-8">
	<title>ユーザー詳細｜EventManager</title>
	<link href="../../css/reset.css" rel="stylesheet">
	<link href="../../css/layout.css" rel="stylesheet">
  </head>

<!-- body -->
  <body>
	<div id="containner">

<!-- header_include -->
<?php //include "../header.php"; ?>

<!-- main -->
	  <div id="main">
	    <h1>ユーザ詳細</h1>

	<!-- dl -->
		<dl>
		  <dt>ID</dt>
		  <dd><?php echo h($u_id); ?></dd>
		  <dt>氏名</dt>
		  <dd><?php echo h($u_name); ?></dd>
		  <dt>所属グループ</dt>
		  <dd><?php echo h($g_name); ?></dd>
		</dl>

	<!-- button -->
		<p>
		  <a href="p_user_list.php"><input type="submit" name="cancel" value="一覧に戻る" id="button_02"></a>
		  <a href="p_user_edit.php"><input type="submit" name="edit" value="編集" id="button_04"></a>
		  <a href="p_user_delete.php"><input type="submit" name="delete" value="削除" id="button_03"></a>
		</p>

	  </div>
	</div>
  </body>
</html>
