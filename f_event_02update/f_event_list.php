<?php
require_once '../db.inc.php';
require_once '../util.inc.php';
require_once '../session.php';

unset($_SESSION["flag"]);

//日本語の曜日を出力する用の配列
$weekday=array("日","月","火","水","木","金","土");


try {

  //--------------------
  // データベースの準備
  //--------------------
  $pdo = db_init();

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


  //--------------------
  // リストの取得
  //--------------------
  $sql = "SELECT * FROM events
  INNER JOIN groups
  ON events.group_id = groups.id
  ORDER BY start DESC LIMIT {$offset},5";

  $stmt = $pdo->query($sql);
  $events = $stmt->fetchAll();
  //var_dump($events);

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

