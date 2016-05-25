<?php
//require_once "../session.php";
require_once "../util.inc.php";
require_once "../db_inc.php";

$u_id=$_GET['id'];

//if($_SESSION["flag"]=TRUE){
	//header("Location:p_user_list");
	//exit;
	//}

$pdo=db_init();

//var_dump($pdo);

$stmt=$pdo->prepare("
								SELECT users.id AS u_id,
											users.name AS u_name,
											groups.name AS g_name
									FROM users
									LEFT JOIN groups
									ON users.group_id=groups.id
									WHERE users.id=?");
$stmt->execute(array($u_id));
$users=$stmt->fetch();

var_dump($users);

$userId=$users['u_id'];
$userName=$users['u_name'];
$g_name=$users['g_name'];




if(isset($_POST['cancel'])){
	header("Location:p_user_list.php");
}
if (isset($_POST['edit'])){
	header("Location:user_edit.php");
}
if(isset($_POST['no'])){
	header("Refresh:0; url=p_user_detail.php");
}


if (isset($_POST['ok'])){
	try {
		// データベースから削除
		$sql = "DELETE  FROM users
					  WHERE id=?";

		$stmt = $pdo->prepare($sql);
		$stmt->execute(array($id));
		// 完了画面へ移動
		$_SESSION['flag']=TRUE;
		header("Refresh:0; url=user_delete_done.php");
	}
	catch (PDOException $e) {
		echo $e->getMessage();
		exit;



}

}

?>
