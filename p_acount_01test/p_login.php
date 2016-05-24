<?php
session_start();

//require_once '../session.php';
require_once '../db_inc.php';

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
		else {
			$ErrorLogin="ログインIDまたはパスワードに誤りがあります。";
		}
	}
	catch (PDOException $e){
	echo $e->getMessage();
	exit;
}



}
}

?>


<html>
<head>
<title>ログイン｜Event Manager</title>

</head>
<body>

<form action="" method="post">

<?php if(isset($ErrorId)) :?>
<?php echo $ErrorId;?>
<?php endif;?>

<?php if(isset($ErrorLogin)):?>
<?php echo $ErrorLogin;?>
<?php endif;?>

<?php if(isset($ErrorPass)):?>
<?php echo $ErrorPass;?>
<?php endif;?>

<P><input type="text" name="login_id" value=""
placeholder="ログインID"></P>


<p><input type="password" name="login_pass" value=""
placeholder="パスワード"></p>
<input type="submit" value="ログイン">

</form>
</body>
</html>
