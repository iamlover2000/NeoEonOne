<?php include "./header.php"; ?>

<style>

/*
div {
    border: 1px solid blue;
    border-radius: 3px;

}
*/

.container {
    border: 2px solid purple;
    
}

.nav {
    /*
    background-image: url("./image-navback2.jpg");
    background-position: center;
    background-size: cover;
    background-color: #324890;
    */
    border: 2px solid red;
    border-radius: 5px;
    height: 150px;
    
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
   
}

.main_icon {
    border: 2px solid green;
    
    display: flex;
    flex-grow: 1;
    justify-content: center;
    align-items: flex-end;
}

.main_menu {
    
    /*display: inline-block;*/
    /*text-align: center;*/
    border: 1px solid black;
    
    display: flex;
    justify-content: space-around;
    flex-grow: 3;
}

.main_menu div {
    border:1px solid cyan;
    
}

.user_info {
    border: 2px solid navy;
    
    display: flex;
    flex-grow: 1;
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