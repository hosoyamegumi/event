<?php
session_start();

require_once '../db.inc.php';
require_once '../util.inc.php';


$login_id="";
$login_pass="";

if($_SERVER['REQUEST_METHOD']==="POST"){

	$login_id=$_POST['login_id'];
	$login_pass=$_POST['login_pass'];

	$isValidated=TRUE;



	if($login_id===""){
		$ErrorId="ログインIDを入力してください";
		$isValidated=FALSE;
	}
	if($login_pass===""){
		$ErrorPass="パスワードを入力してください";
		$isValidated=FALSE;
	}
	if($isValidated==TRUE){
		try {
			$pdo=db_init();

			$sql= "SELECT * FROM users
						WHERE
							login_id=?
						AND
							login_pass=?";

			$stmt=$pdo->prepare($sql);
			$stmt->execute(array($login_id,sha1($login_pass."abc")));
			$info=$stmt->fetch();


			if($info !=FALSE){
				$_SESSION['authenticated']=TRUE;
				$_SESSION["name"]=$info["name"];
				$_SESSION["type_id"]=$info["type_id"];
				$_SESSION["u_id"]=$info["id"];

				var_dump($_SESSION);

				header("Location:../event/p_event_today.php");
				exit;
			}
		}
		catch (PDOException $e){
			echo $e->getMessage();
			exit;
		}
	}
}

?>
