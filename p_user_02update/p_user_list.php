<?php
require_once "../../php/user/f_user_list.php";
?>

<!-- html -->
<!DOCTYPE html>
<html lang="ja">

<!-- head -->
  <head>
    <meta charset="utf-8">
    <title>ユーザ一覧｜EventManager</title>
    <link href="../../css/reset.css" rel="stylesheet">
    <link href="../../css/layout.css" rel="stylesheet">
  </head>

<!-- body -->
    <body>
      <div id="container">

<!-- header_include -->
<?php include "../header.php"; ?>

<!-- main -->
		<div id="main">
		  <h1>ユーザ一覧</h1>

	<!-- pege -->
		  <div id="page">
		    <!--<p>ページの表示</p>  -->
			<?php

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
    ?>


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
			  <td><?php echo h($user["userId"]); ?></td>
			  <td><?php echo h($user["userName"]); ?></td>
			  <td><?php echo h($user["g_name"]); ?></td>
			  <td>
			    <a href ="p_user_detail.php?id=<?php echo h($user["userId"]); ?>"><input type="submit" name="detail" value="詳細" class="button_001"></a>
			  </td>
			</tr>
			<?php endforeach; ?>
		  </table>

	<!-- button -->
		  <a href="p_user_add.php"><input type="submit" name="add" value="ユーザーの登録" id="button_01"></a>
		</div>
      </div>
    </body>
</html>
