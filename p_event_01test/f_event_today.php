<?php
require_once '../db.inc.php';
require_once '../util.inc.php';
//require_once '../session.php';

try {

  //--------------------
  // データベースの準備
  //--------------------
  $pdo = db_init();

  //--------------------
  // 在庫リストの取得
  //--------------------
  $today = '%'.date("Y-m-d").'%';


  //今日以降の表示は終了だけど，明日以降も表示されてます．
  $stmt = $pdo->prepare("SELECT * FROM events WHERE start LIKE ?");
  $stmt->execute(array($today));
  $events = $stmt->fetchAll();


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

