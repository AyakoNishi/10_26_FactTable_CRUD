<?php

function connect_to_db()
{
    $dbn = 'mysql:dbname=gsacf_d07_26;charset=utf8;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';

    try {
        // ここでDB接続処理を実行する
        return new PDO($dbn, $user, $pwd);
    } catch (PDOException $e) {
        // DB接続に失敗した場合はここでエラーを出力し，以降の処理を中止する
        echo json_encode(["db error" => "{$e->getMessage()}"]);
        exit();
    }
}

// ログイン状態のチェック関数
function check_session_id()
{
    // 失敗時はログイン画面に戻る
    if (
        !isset($_SESSION['session_id']) || // session_idがない
        $_SESSION['session_id'] != session_id() // idが一致しない
    ) {
        // echo "<p>ログインに失敗しました。アカウントのない方は新規登録をお願いします。</p>";
        header('Location: login/fact_login.php'); // ログイン画面へ移動
    } else {
        session_regenerate_id(true); // セッションidの再生成
        $_SESSION['session_id'] = session_id(); // セッション変数上書き
        // ここで exit() を書かない！  まだ後に処理が続くから！！
    }
}

// ログイン状態のチェック関数（一般）
// function check_session_id_ippan($pdo)
// {
//     $user_id = $_SESSION['session_id'];
//     // 管理ユーザでない場合、ログイン画面へ
//     $sql = 'SELECT is_admin FROM users_table WHERE $user_id=users_table.id';
//     // table_access($pdo, $sql, $result);
//     $stmt = $pdo->prepare($sql);
//     $status = $stmt->execute();

//     if ($status == false) {
//         $error = $stmt->errorInfo();
//         echo json_encode(["error_msg" => "{$error[2]}"]);
//         exit();
//     } else {
//         $is_admin = $stmt;
//     }
//     if (
//         $is_admin != "1" // 管理ユーザでない
//     ) {
//         echo "<p>管理者以外の閲覧は出来ません。</p>";
//         header('Location: login/fact_login.php'); // ログイン画面へ移動
//     }
// }

// // テーブルアクセス
// function table_access($pdo, $sql, $result)
// {
//     $stmt = $pdo->prepare($sql);
//     $status = $stmt->execute();

//     if ($status == false) {
//         $error = $stmt->errorInfo();
//         echo json_encode(["error_msg" => "{$error[2]}"]);
//         // exit();
//         return $access_f = 1;
//     } else {
//         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//         return $access_f = 0;
//     }
// }

// 種類  kind_table access
// function kind_table_access($pdo)
// {
//     // SQL kind-table
//     $sql = 'SELECT * FROM kind_table ORDER BY kind_cd';
//     // table_access($pdo, $sql, $result);
//     $stmt = $pdo->prepare($sql);
//     $status = $stmt->execute();

//     if ($status == false) {
//         $error = $stmt->errorInfo();
//         echo json_encode(["error_msg" => "{$error[2]}"]);
//         exit();
//     } else {
//         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//         $output_k = "";
//         foreach ($result as $record) {
//             $output_k .= "<tr>";
//             $output_k .= "<td class='table_id_s'>{$record["kind_cd"]}</td>";
//             $output_k .= "<td class='table_nm_s'>{$record["kind_nm"]}</td>";
//             $output_k .= "</tr>";
//         }
//         unset($record);
//         return $output_k;
//     }
// }

function master_read($pdo)
{
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
        return $output_k;
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
        return $output_c;
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
        return $output_b;
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
        return $output_h;
        unset($record);
    }
}
