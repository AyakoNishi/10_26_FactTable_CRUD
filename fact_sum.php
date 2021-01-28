<?php
// session_start();
include("functions.php");
// check_session_id();

// DB接続情報
$pdo = connect_to_db();
// check_session_id_ippan($pdo);

//SQL Fact-table
$sql = 'SELECT E.id, A.kind_cd, A.kind_nm, B.coffee_cd, B.coffee_nm,
sum(E.count_c) sum_count, sum(E.count_c *  C.brend_price) sum_price
FROM cafe_table E, kind_table A, coffee_table B, brend_table C
WHERE (E.kind_cd = A.kind_cd) 
AND (E.coffee_cd = B.coffee_cd) 
AND (E.brend_cd = C.brend_cd) 
group by A.kind_cd, B.coffee_cd
ORDER BY A.kind_cd, B.coffee_cd';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $output_sum = "";
  foreach ($result as $record) {
    $output_sum .= "<tr>";
    $output_sum .= "<td>{$record["kind_cd"]}</td>";
    $output_sum .= "<td>{$record["kind_nm"]}</td>";
    $output_sum .= "<td>{$record["coffee_cd"]}</td>";
    $output_sum .= "<td>{$record["coffee_nm"]}</td>";
    $output_sum .= "<td>{$record["sum_count"]}</td>";
    $output_sum .= "<td>{$record["sum_price"]}</td>";
    $output_sum .= "</tr>";
  }
  unset($record);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>カフェ売り上げ実績</title>
</head>

<body>
  <div class="head-title">
    <h1>カフェ売り上げ実績（ファクトテーブル実践）</h1>
  </div>
  <div class="button_area">
    <button><a href="fact_input.php">入力画面</a></button>
    <button><a href="login/fact_logout.php">ログアウト</a></button>
  </div>
  <div class="tab">
    <ul class="tab_menu">
      <li class="current"><a href="fact_read.php">実績表示</a></li>
      <li><a href="fact_input.php">実績入力</a></li>
      <li><a href="#">マスタ修正</a></li>
      <li><a href="fact_sum.php">集計</a></li>
    </ul>
  </div>

  <h2> 集計</h2>
  <div class="sum_t">
    <table>
      <thead>
        <tr>
          <th colspan="2">種類</th>
          <th colspan="2">メニュー</th>
          <th>数量合計</th>
          <th>金額合計</th>
        </tr>
      </thead>
      <tbody>
        <?= $output_sum ?>
      </tbody>
    </table>
</body>

</html>