<?php
// require_once "../session.php";
// require_once "../util.inc.php";
// require_once "../db.inc.php";
?>


<!DOCTYPE html>
<html lang="ja">

<!-- head -->
  <head>
	<meta charset="utf-8">
	<title>ユーザー詳細｜EventManager</title>

  <!-- css -->
	<link href="../../css/reset.css" rel="stylesheet">
	<link href="../../css/remodal.css" rel="stylesheet">
    <link href="../../css/remodal-default-theme.css" rel="stylesheet">
    <link href="../../css/layout.css" rel="stylesheet">

  <!-- js -->
	<script src="../../js/jquery-loader.js"></script>
	<script src="../../js/remodal.js"></script>
  </head>

<!-- body -->
  <body>
	<div id="containner">

<!-- header_include -->
<?php //include "../header.php"; ?>

<!-- main -->
	  <div id="main">
	    <h1>ユーザ詳細</h1>

	<!-- page -->
		<div id="page">
		  <p>ページの表示</p>
		  <?php //echo $this->pagination->create_links(); ?>
		</div>

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
		  <input type="submit" name="cancel" value="一覧に戻る" id="button_02">
		  <input type="submit" name="edit" value="編集" id="button_04">
		  <input type="submit" name="delete" value="削除" id="button_03" data-remodal-target="modal">
		</p>

	  </div>
	</div>

<!-- modal -->
	<div class="remodal" data-remodal-id="modal">
      <p class="comment">本当に削除してよろしいですか？</p>

	<!-- close_button -->
      <a data-remodal-action="close" class="remodal-close"></a>

	<!-- button -->
	  <form method="post">
		<input type="submit" name="cancel" value="Cancel" id="buttom_03">
		<input type="submit" name="ok" value="OK" id="button_01">
	  </form>
	</div>
  </body>
</html>