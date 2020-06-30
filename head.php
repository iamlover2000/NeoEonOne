<?php include "./header.php"; ?>

<div class="container">
    <div class="nav">
        <div class="main_icon">
            
            <a href="index.php">
                <img src="https://img.icons8.com/wired/64/000000/chrome.png"/>
                <span>NeoEonOne</span> 
            </a>
        </div>
        <div class="main_menu">
            <div><a href="./tip_list.php">팁게시판</a></div>
            <div><a href="./tip_list.php?bid=2">거래게시판</a></div>
            <div><a href="./tip_list.php?bid=3">직업게시판</a></div>
            <div>메뉴4</div>
        </div>
        <div class="user_info">
            <? if ($auth_user) {?>
                <span class="user_name"><?=$auth_user['user_id']?>님</span>
                <a href='logout.php'>로그아웃</a>
            <?}else{?>
                <a href="login.php">로그인</a>
                <a href="resist.php">회원가입</a>
            <?}?>
        </div>
    </div>
