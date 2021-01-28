<?php
session_start();
include("functions.php");
check_session_id();

// DB接続情報
$pdo = connect_to_db();

// kind_table_access($pdo);
// SQL kind-table
$sql = 'SELECT * FROM kind_table ORDER BY kind_cd';
// table_access($pdo, $sql, $result);
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $output_k = "";
  // $input_k = "";
  foreach ($result as $record) {
    $output_k .= "<tr>";
    $output_k .= "<td class='table_id_s'>{$record["kind_cd"]}</td>";
    $output_k .= "<td class='table_nm_s'>{$record["kind_nm"]}</td>";
    $output_k .= "</tr>";
    // $input_k .= "<option value='" . $record["kind_nm"];
    // $input_k .= "'>" . "</option>";  }
  }
  unset($record);
}

//SQL coffee-table
$sql = 'SELECT * FROM coffee_table ORDER BY coffee_cd';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $output_c = "";
  foreach ($result as $record) {
    $output_c .= "<tr>";
    $output_c .= "<td class='table_id'>{$record["coffee_cd"]}</td>";
    $output_c .= "<td class='table_nm'>{$record["coffee_nm"]}</td>";
    $output_c .= "</tr>";
  }
  unset($record);
}

//SQL brend-table
$sql = 'SELECT * FROM brend_table ORDER BY brend_cd';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $output_b = "";
  foreach ($result as $record) {
    $output_b .= "<tr>";
    $output_b .= "<td class='table_id'>{$record["brend_cd"]}</td>";
    $output_b .= "<td class='table_nm_l'>{$record["brend_nm"]}</td>";
    $output_b .= "<td class='table_id'>{$record["brend_price"]}</td>";
    $output_b .= "</tr>";
  }
  unset($record);
}

//SQL hot-table
$sql = 'SELECT * FROM hot_table ORDER BY hot_cd';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $output_h = "";
  foreach ($result as $record) {
    $output_h .= "<tr>";
    $output_h .= "<td class='table_id_s'>{$record["hot_cd"]}</td>";
    $output_h .= "<td class='table_nm_s'>{$record["hot_nm"]}</td>";
    $output_h .= "</tr>";
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
    <button><a href="fact_read.php">一覧画面</a></button>
    <button><a href="login/fact_logout.php">ログアウト</a></button>
  </div>
  <div class="tab">
    <ul class="tab_menu">
      <li class="current"><a href="fact_read.php">実績表示</a></li>
      <li><a href="fact_input.php">実績入力</a></li>
      <li><a href="#">マスタ修正</a></li>
      <li><a href="fact_sum.php">集計</a></li>
    </ul>

    <!-- <div class="tabbox">
      <input type="radio" name="tabset" id="tabcheck1" checked><label for="tabcheck1" class="tab">実績表示</label>
      <input type="radio" name="tabset" id="tabcheck2"><label for="tabcheck2" class="tab">実績入力</label>
      <input type="radio" name="tabset" id="tabcheck3"><label for="tabcheck3" class="tab">マスタ修正</label>
      <input type="radio" name="tabset" id="tabcheck4"><label for="tabcheck4" class="tab">集計</label>
    </div> -->

    <form action="fact_create.php" method="POST">
      <br>
      <!-- <label>種類:
        <select name="kind_cd">
          <?php foreach ($result1 as $value) { ?>
            <option value="<?php echo htmlspecialchars($value["kind_nm"], ENT_QUOTES, "UTF-8"); ?>">
              <?php echo htmlspecialchars($value["kind_nm"], ENT_QUOTES, "UTF-8"); ?>
            </option>
          <?php } ?>
        </select>
      </label><br>
      <label>メニュー:
        <select name="coffee_cd">
          <?php foreach ($result2 as $value) { ?>
            <option value="<?php echo htmlspecialchars($value["coffee_nm"], ENT_QUOTES, "UTF-8"); ?>">
              <?php echo htmlspecialchars($value["coffee_nm"], ENT_QUOTES, "UTF-8"); ?>
            </option>
          <?php } ?>
        </select>
      </label><br>
      <label>アイテム:
        <select name="brend_cd">
          <?php foreach ($result3 as $value) { ?>
            <option value="<?php echo htmlspecialchars($value["brend_nm"], ENT_QUOTES, "UTF-8"); ?>">
              <?php echo htmlspecialchars($value["brend_nm"], ENT_QUOTES, "UTF-8"); ?>
            </option>
          <?php } ?>
        </select>
      </label><br>
      <label>HOT/ICE:
        <select name="hot_cd">
          <?php foreach ($result4 as $value) { ?>
            <option value="<?php echo htmlspecialchars($value["hot_nm"], ENT_QUOTES, "UTF-8"); ?>">
              <?php echo htmlspecialchars($value["hot_nm"], ENT_QUOTES, "UTF-8"); ?>
            </option>
          <?php } ?>
        </select>
      </label><br> -->
      <div>
        <label for="kind_list" class="textfield_label">種類:</label>
        <input type="text" name="kind_cd" id="kind_list" required>
      </div>
      <div>
        <label for="coffee_list" class="textfield_label">メニュー:</label>
        <input type="text" name="coffee_cd" id="coffee_list" required>
      </div>
      <div>
        <label for="brend_list" class="textfield_label">アイテム:</label>
        <input type="text" name="brend_cd" id="brend_list" required>
      </div>
      <div>
        <label for="hot_list" class="textfield_label">ICE/HOT:</label>
        <input type="text" name="hot_cd" id="hot_list" required>
      </div>
      <div>
        <label for="count_c_list" class="textfield_label">数量:</label>
        <input type="text" name="count_c" id="count_c_list" required>
      </div>
      <div>
        <button>送信</button>
      </div>
    </form>

    <div class="master">
      <div class="kind_t">
        <table>
          <thead>
            <tr>
              <th colspan="2">種類</th>
            </tr>
          </thead>
          <tbody>
            <?= $output_k ?>
          </tbody>
        </table>
      </div>
      <div class="coffee_t">
        <table>
          <thead>
            <tr>
              <th colspan="2">メニュー名</th>
            </tr>
          </thead>
          <tbody>
            <?= $output_c ?>
          </tbody>
        </table>
      </div>
      <div class="brend_t">
        <table>
          <thead>
            <tr>
              <th colspan="2">アイテム名</th>
              <th>単価</th>
            </tr>
          </thead>
          <tbody>
            <?= $output_b ?>
          </tbody>
        </table>
      </div>
      <div class="hot_t">
        <table>
          <thead>
            <tr>
              <th colspan="2">HOT/ICE</th>
            </tr>
          </thead>
          <tbody>
            <?= $output_h ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>