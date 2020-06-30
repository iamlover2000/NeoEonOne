<?php include "./common.php";

dump($_GET['id']);

// $stmt = $pdo->prepare('select *,board1.id as board_id from board1 left join user 
//     on board1.author_id = user.id
//     where board1.id =:id');
// $stmt->bindParam(':id',$_GET['id']);
// $stmt->execute();
// $res = $stmt->fetch();

dump($res);



$stmt = $pdo->prepare(' DELETE FROM board1 Where
        id =:id
    ');
  
$stmt->bindParam(':id',$_GET['id']);
    
$res = $stmt->execute();
echo "<script>alert('글이 삭제되었습니다.');
    location.replace('./tip_list.php')
    </script> ";