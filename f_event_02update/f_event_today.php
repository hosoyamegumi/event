<?php
require_once '../db.inc.php';
require_once '../util.inc.php';
require_once '../session.php';

try {

  //--------------------
  // データベースの準備
  //--------------------
  $pdo = db_init();

  //lile句用に作ってます．
  $today = '%'.date("Y-m-d").'%';

  //ページの数を決めるための条件
  $sql = "SELECT COUNT(*) AS hits FROM events WHERE start LIKE ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array($today));
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



  //--------------------
  // 今日のリストの取得
  //--------------------

  //今日の表示をしています．
  $stmt = $pdo->prepare(
  		"SELECT * FROM events
  		INNER JOIN groups
  		ON events.group_id = groups.id
  		WHERE start LIKE ?
  		ORDER BY start DESC
  		LIMIT {$offset},5");
  $stmt->execute(array($today));
  $events = $stmt->fetchAll();

  //--------------------
  // user_id=?さんの参加データの取得
  //--------------------
  $sql="SELECT * FROM attends
  		WHERE user_id=?";
  $stmt=$pdo->prepare($sql);
  $stmt->execute(array($u_id));
  $attends=$stmt->fetchAll();


  //--------------------
  // DB接続の解放
  //--------------------
  $pdo = null;
}
catch (PDOException $e) {
  echo $e->getMessage();
  exit;
}

?>

