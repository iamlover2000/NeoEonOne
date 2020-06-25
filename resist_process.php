<?php
include_once('./common.php');

header("Content-Type: text/html; charset=UTF-8");


$stmt = $pdo->prepare(' insert into user set 
    user_id= :user_id,
    pass= :pass,
    nick= :nick,
    mail= :mail
');

$stmt->bindParam(':user_id',$_POST['id']);
$stmt->bindParam(':pass',$_POST['pass']);
$stmt->bindParam(':nick',$_POST['nick']);
$stmt->bindParam(':mail',$_POST['mail']);


try {
    $res = $stmt->execute();
} catch (\Throwable $e) {
    echo $e->getMessage().'<br>';
    echo $e->getCode().'<br>';
} 

$res  = $pdo->query(' select * from user ')->fetchAll();
dump($res);


?>