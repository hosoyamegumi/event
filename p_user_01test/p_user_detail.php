<?php
require_once "../../php/user/f_user_detail.php";
?>


<!DOCTYPE html>
<html lang="ja">

<!-- head -->
  <head>
	<meta charset="utf-8">
	<title>ユーザ詳細｜EventManager</title>

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


	<!-- dl -->
		<dl>
		  <dt>ID</dt>
		  <dd><?php echo h($userId); ?></dd>
		  <dt>氏名</dt>
		  <dd><?php echo h($userName); ?></dd>
		  <dt>所属グループ</dt>
		  <dd><?php echo h($g_name); ?></dd>
		</dl>

	<!-- button -->
		<form action="" method="post">
		  <input type="submit" name="cancel" value="一覧に戻る" id="button_02">
		  <input type="submit" name="edit" value="編集" id="button_04">
		  <input type="submit" name="delete" value="削除" id="button_03" data-remodal-target="modal">
		</form>

	  </div>
	</div>

<!-- modal -->
	<div class="remodal" data-remodal-id="modal">
      <p class="comment">本当に削除してよろしいですか？</p>

	<!-- close_button -->
      <a data-remodal-action="close" class="remodal-close"></a>

	<!-- button -->
	  <form method="post">
		 <a data-remodal-action="close"><input type="submit" name="no" value="Cancel" id="buttom_03"></a>
		<input type="submit" name="ok" value="OK" id="button_01">
	  </form>
	</div>
  </body>
</html>
