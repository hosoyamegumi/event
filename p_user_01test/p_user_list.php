<!-- php -->
<?php
require_once "../session.php";
require_once "../util.inc.php";
require_once "../db.inc.php";
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
		    <p>ページの表示</p>
			<?php //echo $this->pagination->create_links(); ?>
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
			  <td><?php echo h($user["u_id"]); ?></td>
			  <td><?php echo h($user["start"]); ?></td>
			  <td><?php echo h($user["place"]); ?></td>
			  <td><?php echo h($user["g_name"]); ?></td>
			  <td>
			    <a href ="p_user_detail.php?id=<?php echo h($user["id"]); ?>"><input type="submit" name="detail" value="詳細" class="button_001"></a>
			  </td>
			</tr>
			<?php endforeach; ?>
		  </table>

	<!-- button -->
		  <a href ="p_user_add.php"><input type="submit" name="add" value="ユーザーの登録" id="button_01"></a>
		</div>
      </div>
    </body>
</html>
