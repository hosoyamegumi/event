<!-- header -->
<div id="header">

<!-- nav -->
	<div id="nav">
	  <ul>
		<li><a href="#">Event Manager</a></li>
		<li><a href="event/p_event_today.php">本日のイベント</a></li>
		<li><a href="event/p_event_list.php">イベント管理</a></li>
		<?php if ($type_id == 2) { echo "<li><a href='user/p_user_list.php'>ユーザー管理</a></li>";}; ?>
		<li><?php echo h($u_name); ?>ユーザー名</li>
		<li><a href="../acount/p_logout.php">ログアウト</a></li>
	  </ul>
	</div>
</div>