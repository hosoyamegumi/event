<?php

  require_once "../util.inc.php";
  require_once "../db_inc.php";
  //require_once '../session.php';

  $u_id=$_GET['id'];

  try{

  	//dbの接続
  	$pdo=db_init();

$stmt=$pdo->prepare("
								SELECT *
								FROM users WHERE id=?");
$stmt->execute(array($u_id));

$users=$stmt->fetch();
  //var_dump($users);

$u_name=$users['name'];
$login_id=$users['id'];
$login_pass=$users['login_pass'];
$group_id=$users['type_id'];


if(isset($_POST['save'])){
	$isValidated=TRUE;

	//$u_name=$_POST['u_name'];
	//$login_id=$_POST['login_id'];
	//$login_pass=$_POST['login_pass'];
	//$group_id=$_POST['group_id'];

	if($u_name===""){
		$u_nameError="氏名を入力してください";
		$isValidated=FALSE;
	}
	if ($login_id===""){
		$login_idError="IDを入力してください";
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
					$login_pass,
					$u_name,
					$group_id,
					$u_id)
					);


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
