<?php include "./head.php";
include "./board_config.php";
// dump($_GET['id']);

$stmt = $pdo->prepare('select *,'.$board.'.id as board_id from '.$board.' left join user 
    on '.$board.'.author_id = user.id
    where '.$board.'.id =:id');
$stmt->bindParam(':id',$_GET['id']);
$stmt->execute();
$res = $stmt->fetch();

if($res['author_id'] !== $auth_user['id']){
    echo "<script>alert('다른 사람의 글을 수정할 수 없습니다.');
        window.history.back()
    </script> ";
}
// dump($res);

?>

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<div class="contents">
	<div class="title">
        <h2><?=$board_name[$bid]?></h2>
	</div>
	<div class="sub"></div>
	<div class="main_contents">
        <div>
            <form action="tip_update_insert.php?id=<?=$_GET['id']?>" method="POST">
                <input type="text" name="title" required="true" value="<?=$res['title']?>">
                <textarea name="text" id="editor1" rows="10" cols="80" required="true"><?=$res['text']?></textarea>
                <script>
                    // Replace the <textarea id="editor1"> with a CKEditor 4
                    // instance, using default configuration.
                    CKEDITOR.replace( 'editor1' );
                </script>
                <button type="submit">수정</button>
                <button type="button" onclick="history.back();">취소</button>
            </form>
        </div>
		
	</div>
</div>
	

<?php include "./tail.php"; ?>