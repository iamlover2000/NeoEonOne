<?php 
include "./header.php"; 

if (isset($_SESSION['userid'])) {

    $stmt = $pdo->prepare(" SELECT cash FROM user WHERE user_id =:user_id  ");
    $stmt->bindParam(':user_id', $_SESSION['userid']);
    $stmt->execute();
    $auth_cash = $stmt->fetch();
}
// dump($auth_cash);
?>

<div class="container">
    <div class="fixed">
    <div class="nav">
        <div class="main_icon">
            
            <a href="index.php">
                <img src="https://img.icons8.com/wired/64/000000/chrome.png"/>
                <span>NeoEonOne</span> 
            </a>
        </div>
        <div class="main_menu">
            <div><a href="prod_list.php">상품목록</a></div>
            <div><a href="./tip_list.php">팁게시판</a></div>
            <div><a href="./tip_list.php?bid=2">거래게시판</a></div>
            <div><a href="./tip_list.php?bid=3">직업게시판</a></div>
            <div><a href="./tip_list.php?bid=4">빈게시판</a></div>
        </div>
        <div class="user_info">
            <? if ($auth_user) {?>
                <div>
                    <div class="user_name"><?=$auth_user['user_id']?>님</div>
                    <div><?=number_format($auth_cash['cash'])?>p 보유</div>
                </div>
                <a href="credit.php" class="btn btn-primary" style="margin-left: 3px">충전</a>
                <a href='logout.php' class="btn btn-danger" style="margin-left: 3px">로그아웃</a>
            <?}else{?>
                <div class="btn">
                <a href="login.php">로그인</a>
                </div>
                <div class="btn">
                <a href="resist.php">회원가입</a>
                </div>
            <?}?>
        </div>
    </div>
    </div>
