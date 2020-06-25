<?php include "./header.php"; ?>

<style>

.container {
    border: 2px solid purple;
}

.nav {
    height: 150px;
    display: flex;
    border-radius: 5px;
    align-items: flex-end;
    border: 2px solid red;
    justify-content: space-between;
}

.main_icon {
    display: flex;
    flex-grow: 1;
    align-items: flex-end;
    border: 2px solid green;
    justify-content: center;
}

.main_menu {
    display: flex;
    flex-grow: 3;
    justify-content: space-around;
    border: 1px solid black;
}

.main_menu div {
    border:1px solid cyan;
}

.user_info {
    flex-grow: 1;
    display: flex;
    border: 2px solid navy;
    justify-content: center;
   
}

</style>

<div class="container">
    <div class="nav">
        <div class="main_icon"><img src="https://img.icons8.com/wired/64/000000/chrome.png"/>NeoEonOne</div>
        <div class="main_menu">
            <div>
                <span>메뉴1</span>
                <span>메뉴1</span>
            </div>
            <div>메뉴2</div>
            <div>메뉴3</div>
            <div>메뉴4</div>
        </div>
        <div class="user_info">
            <? if ($auth_user) {?>
                <span class="user_name"><?=$auth_user['user_id']?>님</span>
                <a href='logout.php'>로그아웃</a>
            <?}else{?>
                <a href="">로그인</a>
            <?}?>
        </div>
    </div>
</div>