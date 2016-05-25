<?php
//require_once '../session.php';
require_once '../db.inc.php';
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
