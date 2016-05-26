<!-- php -->
<?php
	require_once "../../php/account/f_login.php";
?>

<!-- html -->
<!DOCTYPE html>
<html lang="ja">

<!-- head -->
  <head>
	<meta charset="utf-8" />
	<title>ログイン｜Event Manager</title>

<!-- css -->
	<link href="../../css/reset.css" rel="stylesheet">
	<link href="../../css/layout.css" rel="stylesheet">

  </head>

<!-- body -->
  <body>
	<div id="containner">

<!-- header -->
	  <div id="header">
	    <div id="nav">
		  <div  id="logo"><a href="#">Event Manager</a></div>
		</div>
	  </div>

<!-- main -->
	  <div id="main">

	<!-- form -->
		<form action="" method="post" id="login">

		<!-- login_id -->
		  <?php if(isset($ErrorId)): ?>
		  <span class="error"><?php echo $ErrorId;?></span>
		  <?php endif;?>
		  <p><input type="text" name="login_id" value="<?php echo $login_id; ?>" placeholder="ログインID" class="login_f"></p>

		<!-- login_pass -->
		  <?php if(isset($ErrorPass)):?>
		  <span class="error"><?php echo $ErrorPass;?></span>
		  <?php endif;?>
		  <p><input type="password" name="login_pass" value="<?php echo $login_pass ?>" placeholder="パスワード" size="100" class="login_f"></p>

		<!-- lgin_button -->
		  <p><input type="submit" value="ログイン" id="button_login"></p>

		</form>
	  </div>
	</div>
  </body>
</html>
