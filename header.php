<!-- header -->
<div id="header">

<!-- nav -->
	<div id="nav">
		<div id="logo"><a href="#">Event Manager</a></div>
	  <ul>
		<li><a href="event/p_event_today.php">本日のイベント</a></li>
		<li><a href="event/p_event_list.php">イベント管理</a></li>
		<?php //if ($type_id == 2) { echo "<li><a href='user/p_user_list.php'>ユーザー管理</a></li>";}; ?>
		<li><a href="event/p_user_list.php">ユーザ管理</a></li>
		<li id="dropDown"><a href="#"><?php //echo h($u_name); ?>お名前<span id="check">▼</span></a>
		  <ul>
		    <li id="dropDown_p"><a href="../acount/p_logout.php">ログアウト</a></li>
		  </ul>
		</li>
	  </ul>
	</div>
</div>

<!-- dropDown -->
<script>


    //クリック時
    $("#dropDown").click(function(){
       if ($("#dropDown_p",this).css('visibility') == "hidden") {
          $("#dropDown_p",this).css('visibility', 'visible');
       } else {
          $("#dropDown_p",this).css('visibility', 'hidden');
       }
    });

</script>
