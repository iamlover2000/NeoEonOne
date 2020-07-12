<?php
include "./common.php";

// dump($_POST);
// dump($auth_user);
$money = intval(str_replace(',','',$_POST['money']) );
// dump($money);

try {

if($_POST['money'] == '' || $_POST['money'] <='0' ){
    throw new Exception("금액값을 다시 입력해주세요", 1);
}


// if($_POST['chkid'] !== $auth_user['id']){
//     throw new Exception("로그인상태를 확인해주세요");
// }

$stmt = $pdo->prepare(' insert into credit set
    money =:money,
    name =:user_id
');
$stmt->bindParam(':money',$money);
$stmt->bindParam(':user_id',$auth_user['user_id']);
$stmt->execute();

echo "<script>alert('신청이 진행되었습니다.');
        location.replace('./credit.php')
    </script> ";

} catch (\Throwable $e) {

    echo "<script>alert('신청이 실패했습니다.\\n{$e->getMessage()} [{$e->getCode()}]');
        window.history.back()
    </script> ";
}

?>