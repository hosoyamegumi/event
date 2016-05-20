<?php
require_once '../../php/db.inc.php';

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
  // 在庫リストの取得
  //--------------------
  $sql = "SELECT * FROM events
  ORDER BY
  created DESC
  LIMIT {$offset},5";

  $stmt = $pdo->query($sql);
  $events = $stmt->fetchAll();

  //var_dump($events);

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

