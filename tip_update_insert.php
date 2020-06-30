<?php
include "./common.php";
include "./board_config.php";

try {

    $stmt = $pdo->prepare(' select *,'.$board.'.id as board_id from '.$board.' left join user 
        on '.$board.'.author_id = user.id
        where '.$board.'.id =:id');
    $stmt->bindParam(':id',$_GET['id']);
    $stmt->execute();
    $res = $stmt->fetch();
    
    if($_POST['title'] == '' || $_POST['text'] == '' ){
        throw new Exception("제목이나 내용이 없습니다.", 1);
    }
    
    if($res['author_id'] !== $auth_user['id']){
        throw new Exception("다른 사람의 글을 수정할 수 없습니다.", 1);
    }

    $stmt = $pdo->prepare(' update '.$board.' set 
        title=:title,
        text=:text,
        author_id=:author
        where id=:id
    ');
    $stmt->bindParam(':title',$_POST['title']);
    $stmt->bindParam(':text',$_POST['text']);
    $stmt->bindParam(':author',$auth_user['id']);
    $stmt->bindParam(':id',$_GET['id']);
    $res = $stmt->execute();

    echo "<script>alert('글이 수정되었습니다.');
        location.replace('./tip_list.php')
    </script> ";
    // throw new Exception("test error", 64654645);
    
} catch (\Throwable $e) {
    //throw $th;
    echo "<script>alert('글이 작성이 실패했습니다.\\n{$e->getMessage()} [{$e->getCode()}]');
        window.history.back()
    </script> ";
}
// dump($res);