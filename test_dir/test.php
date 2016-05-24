<?php
// require_once "../session.php";
// require_once "../util.inc.php";
// require_once "../db.inc.php";

//もしセッションを持ってたら


if (isset($_POST["ok_2"])) {

	//データ消去の処理


	//セッションを発行


	header("Location:p_user_delete_done.php");
}
?>


<!DOCTYPE html>
<html lang="ja">

<!-- head -->
  <head>
	<meta charset="utf-8">
	<title>ユーザー詳細｜EventManager</title>

	<script src="../src/jquery-loader.js"></script>

    <link rel="stylesheet" href="../src/remodal.css">
    <link rel="stylesheet" href="../src/remodal-default-theme.css">
    <link rel="stylesheet" href="../src/test.css">

    <script src="../src/remodal.js"></script>


  <style>
      .remodal-overlay.without-animation.remodal-is-opening,
      .remodal-overlay.without-animation.remodal-is-closing,
      .remodal.without-animation.remodal-is-opening,
      .remodal.without-animation.remodal-is-closing,
      .remodal-bg.without-animation.remodal-is-opening,
      .remodal-bg.without-animation.remodal-is-closing { animation: none;}
  </style>
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
		  <dd><?php //echo h($u_id); ?>aaaa</dd>
		  <dt>氏名</dt>
		  <dd><?php //echo h($u_name); ?>山田</dd>
		  <dt>所属グループ</dt>
		  <dd><?php //echo h($g_name); ?>技術部</dd>
		</dl>

	<!-- button -->
		<p>
		  <input type="submit" name="cancel" value="一覧に戻る" id="button_02">
		  <input type="submit" name="edit" value="編集" id="button_04">
		  <input type="submit" name="delete" value="削除" id="button_03" data-remodal-target="modal">
		</p>

	  </div>
	</div>


<div class="remodal" data-remodal-id="modal">
<p class="comment">本当に削除してよろしいですか？</p>
  <a data-remodal-action="close" class="remodal-close"></a>

  <a data-remodal-action="cancel" class="remodal-cancel" href="p_user_detail.php">Cancel</a>
  <a data-remodal-action="" class="remodal-confirm" href="p_user_delete_done.php">OK</a>

<!-- button -->
<form method="post">
		<input type="submit" name="cancel" value="Cancel" id="buttom_03">
		<a data-remodal-action="" href="p_user_delete_done.php"><input type="submit" name="ok" value="OK" id="button_01"></a>
		<input type="submit" name="ok_2" value="OK_2" id="button_01">
</form>
</div>

  </body>
</html>