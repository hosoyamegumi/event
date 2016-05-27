<?php
  require_once "../util.inc.php";
  require_once "../db.inc.php";
  require_once '../session.php';
  $u_id=$_GET['id'];
  try{
  	//dbの接続
  	$pdo=db_init();
  	$stmt=$pdo->prepare("
  			SELECT *
  			FROM users WHERE id=?");
  	$stmt->execute(array($u_id));
  	$users=$stmt->fetch();

  	$userName=$users['name'];
  	$login_id=$users['id'];
  	$login_pass=$users['login_pass'];
  	$group_id=$users['type_id'];

  	if(isset($_POST['save'])){

	$isValidated=TRUE;
	$userName=$_POST['userName'];
	$login_id=$_POST['login_id'];
	$login_pass=$_POST['login_pass'];
	$group_id=$_POST['group_id'];
var_dump($_POST);


	if(preg_match("/[\s　]/u", $userName)){
		$userNameError="氏名を入力してください";
		$isValidated=FALSE;
	}
	if ($userName ==""){
		$userNameError="氏名を入力してください";
		$isValidated=FALSE;
	}

	if (preg_match("/[\s　]/", $login_id)){
		$login_idError="IDを入力してください";
		$isValidated=FALSE;
	}
	if ($login_id ==""){
		$login_idError="IDを入力してください";
		$isValidated=FALSE;
	}

	if (preg_match("/[\s　]/", $login_pass)){
		$login_passError="パスワードを正しく入力してください";
		$isValidated=FALSE;
	}
	if($isValidated==TRUE){
			$sql="
			UPDATE users
				SET login_id=?, login_pass=?,name=?,
						type_id=2,group_id=?
			WHERE
				id=?";
			$stmt=$pdo->prepare($sql);
			$stmt->execute(array(
					$login_id,
					sha1($login_pass."abc"),
					$userName,
					$group_id,
					$u_id)
					);
			header("Location:p_user_edit_done.php?id={$u_id}");
			exit;
	}
		}
	}
	catch (PDOException $e){
		echo $e->getMessage();
		exit;
}
if(isset($_POST["cancel"])){
	header("Location: p_user_list.php");
}
?>