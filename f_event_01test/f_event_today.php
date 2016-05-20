<?php
require_once '../util.inc.php';
require_once '../../view/db.inc.php';

try {

  //--------------------
  // データベースの準備
  //--------------------
  $pdo = db_init();

  //--------------------
  // 在庫リストの取得
  //--------------------
  $today=$_POST[''];

  //今日以降の表示は終了だけど，明日以降も表示されてます．
  $sql = "SELECT * FROM `events` WHERE start LIKE '%?%'";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array($today));
  $events = $stmt->fetchAll();

  var_dump($events);

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

