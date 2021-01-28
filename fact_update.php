<?php
session_start();
include("functions.php");
check_session_id();

$id = $_POST['id'];
$kind_cd = $_POST['kind_cd'];
$coffee_cd = $_POST['coffee_cd'];
$brend_cd = $_POST['brend_cd'];
$hot_cd = $_POST['hot_cd'];
$count_c = $_POST['count_c'];

// DB接続情報
$pdo = connect_to_db();

$id = $_POST['id'];

// idを指定して更新するSQLを作成（UPDATE文）
$sql = "UPDATE cafe_table SET kind_cd=:kind_cd, coffee_cd=:coffee_cd,
 brend_cd=:brend_cd, hot_cd=:hot_cd, count_c=:count_c WHERE id=:id";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':kind_cd', $kind_cd, PDO::PARAM_STR);
$stmt->bindValue(':coffee_cd', $coffee_cd, PDO::PARAM_STR);
$stmt->bindValue(':brend_cd', $brend_cd, PDO::PARAM_STR);
$stmt->bindValue(':hot_cd', $hot_cd, PDO::PARAM_STR);
$stmt->bindValue(':count_c', $count_c, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// fetch()で1レコード取得できる．
if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    header("Location:fact_read.php");
    exit();
}
