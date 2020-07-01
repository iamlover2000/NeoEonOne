<?php
include "./common.php";
include "./board_config.php";

// dump($_POST);
// dump($auth_user);

try {
    $stmt = $pdo->prepare(' insert into '.$board.' set 
        title=:title,
        text=:text,
        author_id=:author
    ');
    $stmt->bindParam(':title',$_POST['title']);
    $stmt->bindParam(':text',$_POST['text']);
    $stmt->bindParam(':author',$auth_user['id']);
    $res = $stmt->execute();
       
    echo "<script>alert('글이 작성되었습니다.');
        location.replace('./tip_list.php?bid=$bid')
    </script> ";
    // throw new Exception("test error", 64654645);
    
} catch (\Throwable $e) {
    //throw $th;
    echo "<script>alert('글이 작성이 실패했습니다.\\n{$e->getMessage()} [{$e->getCode()}]');
        window.history.back()
    </script> ";
}


// dump($res);