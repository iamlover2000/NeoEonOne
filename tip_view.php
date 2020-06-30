<?php include "./head.php"; 
include "./board_config.php";

$stmt = $pdo->prepare('select *,'.$board.'.id as board_id from '.$board.' left join user 
    on '.$board.'.author_id = user.id
    where '.$board.'.id =:id');
$stmt->bindParam(':id',$_GET['id']);
$stmt->execute();
$res = $stmt->fetch();

?>
<div class="contents">
	<div class="title">
        <h2><?=$board_name[$bid]?></h2>
	</div>
	<div class="sub"></div>
	<div class="main_contents">
		<table class="table w-full">
			<thead>
				<tr>
					<td>#</td>
					<td class="">제목</td>
					<td>작성자</td>
					<td>작성일</td>
				</tr>
			</thead>
			<tbody>
                <tr>
                    <td><?=$res['board_id']?></td>
                    <td>
                        <?=$res['title']?>
                      
                    </td>
                    <td><?=$res['nick']?></td>
                    <td><?=$res['created_at']?></td>
                </tr>
                
                <tr>
                    <td colspan="4">
                        <div class="board_text">
                            <?=$res['text']?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <div class="text-right">
                            <a class="btn btn-default" href="./tip_list.php">목록으로</a>
                       
                            <?if($_SESSION['userid'] == $res['user_id']){?>    
                            <a href="./tip_update.php?id=<?=$_GET['id']?>" class="btn btn-primary" >내용수정</a>
                            <a href="./tip_delete.php?id=<?=$_GET['id']?>" class="btn btn-danger">글삭제</a>
                             <?  } ?>
                        </div>
                    </td>
                </tr>
			</tbody>
		</table>
	</div>
</div>
	

<?php include "./tail.php"; ?>