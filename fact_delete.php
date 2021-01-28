<?php
$id = $_GET['id'];
// var_dump($_GET);
// exit();

session_start();
include("functions.php");
check_session_id();

// DB接続情報
$pdo = connect_to_db();

$alert = "
    <script type='text/javascript'>alert('DELETE してよろしいですか');
//     var btn = document.getElementById('btn');
//     btn.addEventListener('click', function() {
//     var result = window.confirm('ボタンをクリック！');
    
//     if( result ) {
//         console.log('OKがクリックされました');
//     }
//     else {
//         console.log('キャンセルがクリックされました');
//     }
// })
    </script>";

// idを指定して更新するSQLを作成 -> 実行の処理
$sql = 'DELETE FROM cafe_table WHERE id=:id';

$stmt = $pdo->prepare($sql);
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
