<!-- php -->
<?php
// require_once "../session.php";
// require_once "../util.inc.php";
// require_once "../db.inc.php";
?>

<!-- html -->
<!DOCTYPE html>
<html lang="ja">

<!-- head -->
  <head>
	<meta charset="utf-8">
	<title>ユーザー登録｜EventManager</title>
	<link href="../../css/reset.css" rel="stylesheet">
	<link href="../css/layout.css" rel="stylesheet">
  </head>

<!-- body -->
  <body>
	<div id="containner">

<!-- header_include -->
<?php include "../header.php"; ?>

<!-- main -->
	  <div id="main">
		<h1>ユーザ登録</h1>

	<!-- form -->
		<form action="" method="post">

	<!-- dl -->
		  <dl>

		<!-- u_name -->
		    <dt>氏名(必須)
		<!-- u_name_error -->
			  <?php if (isset($u_nameError)): ?>
			  <span class="error"><?php echo h($u_nameError); ?></span>
			  <?php endif; ?>
			</dt>
			<dd><input type="text" name="u_name" value="<?php echo h($u_name); ?>"></dd>

		<!-- login_id -->
			<dt>ログインID(必須)
		<!-- login_id_error -->
			  <?php if (isset($login_idError)): ?>
			  <span class="error"><?php echo h($login_idError); ?></span>
			  <?php endif; ?>
			</dt>
			<dd><input type="text" name="login_id" value="<?php echo h($login_id); ?>"></dd>

		<!-- login_pass -->
			<dt>パスワード(必須)
		<!-- logim_pass_error -->
			  <?php if (isset($login_passError)): ?>
			  <span class="error"><?php echo h($login_passError); ?></span>
			  <?php endif; ?>
			</dt>
			<dd><input type="text" name="login_pass" value="<?php echo h($login_pass); ?>"></dd>

		<!-- g_mane -->
			<dt>所属グループ(必須)
		<!-- g_name_error -->
			  <?php if (isset($g_nameError)): ?>
			  <span class="error"><?php echo h($g_nameError); ?></span>
			  <?php endif; ?>
			</dt>
			<dd>
			  <select name="group_id">
			    <option value="1">管理部</option>
			    <option value="2">総務部</option>
			    <option value="3">人事部</option>
			    <option value="4">その他</option>
			  </select>
			</dd>
		  </dl>

		<!-- button -->
		  <p>
			<a href="p_user_list.php"><input type="submit" name="cancel" value="キャンセル" id="buttom_03"></a>
			<a href="p_user_add_done.php"><input type="submit" name="add" value="登録" id="button_01"></a>
		  </p>
		</form>
	  </div>
	</div>
  </body>
</html>
