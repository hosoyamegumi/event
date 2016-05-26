<?php
//require_once '../session.php';
require_once '../db_inc.php';
require_once '../util.inc.php';


$u_name="";
$login_id="";
$login_pass="";
$group_id="";


if(isset($_POST['add'])){
	$isValidated=TRUE;

	$u_name=$_POST['u_name'];
	$login_id=$_POST['login_id'];
	$login_pass=$_POST['login_pass'];
	$group_id=$_POST['group_id'];

	if($u_name===""){
		$u_nameError="氏名を入力してください";
		$isValidated=FALSE;
	}
	if ($login_id===""){
		$login_idError="IDを入力してください";
		$isValidated=FALSE;
	}
	if($login_pass===""){
			$login_passError="パスワードを入力してください";
			$isValidated=FALSE;
	}
	var_dump($grou_id);
	if($isValidated==TRUE){

		try{

			//dbの接続
			$pdo=db_init();

			$sql="
			INSERT INTO users
				(login_id, login_pass,name,type_id,group_id,created)
			VALUES
				(?,?,?,1,?,now())";
			$stmt=$pdo->prepare($sql);
			$stmt->execute(array(
					$login_id,
					sha1($login_pass."abc"),
					$u_name,
					$group_id)
					);

			header("Location: user_add_done.php");
			exit;
		}
		catch (PDOException $e){
			echo $e->getMessage();
			exit;
			}
		}

		}
	if(isset($_POST["cancel"])){
	header("Location: p_user_list.php");

	}

?>
<!-- html -->
<!DOCTYPE html>
<html lang="ja">

<!-- head -->
  <head>
	<meta charset="utf-8">
	<title>ユーザー登録｜EventManager</title>
<!-- 	<link href="../../css/reset.css" rel="stylesheet"> -->
<!-- 	<link href="../../css/layout.css" rel="stylesheet"> -->
  </head>

<!-- body -->
  <body>
	<div id="containner">

<!-- header_include -->
<!-- <//?php include "../header.php"; ?> -->

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
			<dd><input type="text" name="u_name" value="<?php echo h($u_name); ?>" placeholder="氏名"></dd>

		<!-- login_id -->
			<dt>ログインID(必須)
		<!-- login_id_error -->
			  <?php if (isset($login_idError)): ?>
			  <span class="error"><?php echo h($login_idError); ?></span>
			  <?php endif; ?>
			</dt>
			<dd><input type="text" name="login_id" value="<?php echo h($login_id); ?>" placeholder="ログインID"></dd>

		<!-- login_pass -->
			<dt>パスワード(必須)
		<!-- logim_pass_error -->
			  <?php if (isset($login_passError)): ?>
			  <span class="error"><?php echo h($login_passError); ?></span>
			  <?php endif; ?>
			</dt>
			<dd><input type="password" name="login_pass" placeholder="パスワード"></dd>

		<!-- g_mane -->
			<dt>所属グループ(必須)

			</dt>
			<dd>
			  <select name="group_id">
			    <option value="1" <?php if ($group_id === "1")   echo 'selected="selected"'; ?>>管理部</option>
			    <option value="2" <?php if ($group_id === "2")   echo 'selected="selected"'; ?>>総務部</option>
			    <option value="3" <?php if ($group_id === "3")   echo 'selected="selected"'; ?>>人事部</option>
			    <option value="4" <?php if ($group_id === "4")   echo 'selected="selected"'; ?>>その他</option>
			  </select>
			</dd>
		  </dl>

		<!-- button -->
		  <p>
			<input type="submit" name="cancel" value="キャンセル" id="buttom_03">
			<input type="submit" name="add" value="登録" id="button_01">
		  </p>
		</form>
	  </div>
	</div>
  </body>
</html>