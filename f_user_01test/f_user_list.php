<?php
//session_start;

require_once '../db_inc.php';
require_once '../util.inc.php';
//require_once '../session.php';

unset($_SESSION);//破棄


$pdo=db_init();


//ページの数を決めるための条件
$sql = "SELECT COUNT(*) AS hits FROM events";
$stmt = $pdo->query($sql);
$res=$stmt->fetch();
$hits = $res["hits"];


 //ページ数の計算
$numPages = ceil($hits / 5);

//GETでPが選択されたかチェックする
 if(isset($_GET["p"])){
	  	$currentPage=$_GET["p"];
	  }
	  else{
		 	$currentPage=1;
		 }

 //LIMITのオフセットを計算する
$offset=($currentPage-1)*5;
$prevPage = $currentPage - 1;
$nextPage = $currentPage + 1;

$stmt=$pdo->query(
		"SELECT users.id,users.name AS u_name,groups.name AS g_name
									FROM users
									LEFT JOIN groups
									ON users.group_id=groups.id
									LIMIT {$offset},5");

$users=$stmt->fetchAll();










?>
<?php
//require_once "../session.php";
 //require_once "../util.inc.php";
 //require_once "../db.inc.php";
 ?>

 <!-- html -->
 <!DOCTYPE html>
 <html lang="ja">

 <!-- head -->
   <head>
     <meta charset="utf-8">
     <title>ユーザ一覧｜EventManager</title>
<!--      <link href="../../css/reset.css" rel="stylesheet"> -->
<!--      <link href="../../css/layout.css" rel="stylesheet"> -->
   </head>

<!-- body -->
    <body>
       <div id="container">

<!-- header_include -->
<!--<//?php include "../header.php"; ?>-->

 <!-- main -->
 		<div id="main">
 		  <h1>ユーザ一覧</h1>

	<!-- pege -->
 		  <div id="page">
 		    <p>ページの表示</p>
  <p><?php

    if ($numPages > 1) {
      //--------------------
      // 前のページへのリンク
      //--------------------
      if ($currentPage == 1) {
        echo "前のページ | ";
      }
      else {
        echo '<a href="?p='.h($prevPage).'">前のページ</a> | ';
      }
      //--------------------
      // ページ番号のリンク
      //--------------------
      for ($p = 1; $p <= $numPages; $p++) {
        if ($p == $currentPage) {
          echo " ".h($p)." |";
        }
        else {
          echo ' <a href="?p='.h($p).'">'.h($p).'</a> |';
        }
      }
      //--------------------
      // 次のページへのリンク
      //--------------------
      if ($currentPage == $numPages) {
        echo " 次のページ";
      }
      else {
        echo ' <a href="?p='.h($nextPage).'">次のページ</a>';
      }
    }
    ?></p>
<!--  			<//?php echo $this->pagination->create_links(); ?> -->
 		  </div>

 	<!-- table -->
 		  <table>
 	    <tr>
 		      <th>ID</th>
 		      <th>氏名</th>
		      <th>所属グループ</th>
 		      <th>詳細</th>
 		    </tr>
 		    <?php foreach ($users as $user): ?>
 			<tr>
 			  <td><?php echo h($user["id"]); ?></td>
 			  <td><?php echo h($user["u_name"]); ?></td>
 			  <td><?php echo h($user["g_name"]); ?></td>
 			  <td>詳細></td>
 			  <td>
 			    <a href ="p_user_detail.php?id=<?php echo h($user["id"]); ?>"><input type="submit" name="detail" value="詳細" class="button_001"></a>
 			  </td>
 			</tr>
			<?php endforeach; ?>
 		  </table>

 	<!-- button -->
 		  <a href ="user_add.php"><input type="submit" name="add" value="ユーザーの登録" id="button_01"></a>
 		</div>
       </div>
    </body>
 </html>
