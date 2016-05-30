<?php
require_once '../session.php';
require_once '../db.inc.php';
require_once '../util.inc.php';
$userName="";
$login_id="";
$login_pass="";
$group_id="";

if(isset($_POST['add'])){
	$isValidated=TRUE;
	$userName=$_POST['userName'];
	$login_id=$_POST['login_id'];
	$login_pass=$_POST['login_pass'];
	$group_id=$_POST['group_id'];
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
	if($login_pass===""){
			$login_passError="パスワードを入力してください";
			$isValidated=FALSE;
	}
	if (preg_match("/[\s　]/", $login_pass)){
		$login_passError="パスワードを正しく入力してください";
		$isValidated=FALSE;
	}

	if(isset($login_id)){
		$pdo=db_init();

		$stmt = $pdo -> query("SELECT * FROM users");
		while($item = $stmt->fetch()) {
			if($item['login_id'] == $login_id){
				$login_idError= "ご希望のIDは既に使用されています。";
				$isValidated=FALSE;
			}else{
				$login_id = $login_id;
			}
		}
	}

	//var_dump($group_id);
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
					$userName,
					$group_id)
					);



			header("Location:p_user_add_done.php");
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