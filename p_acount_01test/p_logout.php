<?php
session_start();

$_SESSION=array();
$params=session_get_cookie_params();
setcookie(session_name(),"",time()-36000,
		$params['path'],$params['domain'],
		$params["secure"],$params["httponly"]);

session_destroy();





?>


<html>
<head>
<title>ログアウト完了｜Event Manager</title>

</head>
<body>

<h1>ログアウト</h1>

<p>ログアウトしました。</p
>
<p><a href="p_login.php">ログイン画面に戻る</a></p>

</body>
</html>
