<?php
include "./common.php";

$stmt = $pdo->prepare('select * 
    from buy_list where cart_id=:id
    
' );
$stmt->bindParam(':id',$_POST['id']);
$stmt->execute();
$res = $stmt->fetchAll();
$json = json_encode($res);

echo $json;
?>