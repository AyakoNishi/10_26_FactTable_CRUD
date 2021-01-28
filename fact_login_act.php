<?php
// var_dump($_POST);
// exit();

session_start();
include('functions.php');
check_session_id();

$pdo = connect_to_db();
$username = $_POST["username"];
$password = $_POST["password"];

$sql = 'SELECT * FROM users_table
        WHERE username = :username
        AND   password = :password
        AND   is_deleted = 0';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
}

$val = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$val) {
    echo "<p>ログイン情報に誤りがあります</p>";
    echo '<a href = "fact_login.php">login</a>';
    exit();
} else {
    $_SESSION = array();
    $_SESSION["session_id"] = session_id();
    $_SESSION["is_admin"] = $val["is_admin"];
    $_SESSION["username"] = $val["username"];
    if ($val["is_admin"] == 1) {
        header("Location:fact_read.php");
    } else {
        header("Location:fact_read_ippan.php");
    }
    exit();
}
