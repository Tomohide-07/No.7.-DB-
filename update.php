<?php

$name   = $_POST["book_name"];
$email  = $_POST["url"];
$content = $_POST["review"];
$id = $_POST["id"];


require_once('funcs.php');
$pdo = db_conn();

$stmt = $pdo->prepare('UPDATE
                        gs_bm_table
                    SET 
                        book_name = :book_name,
                        url = :url,
                        review = :review,
                        indate = sysdate()
                    WHERE
                        id = :id;'
                        );


$stmt->bindValue(':book_name', $book_name, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':review', $review, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); 

if ($status == false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}

?>