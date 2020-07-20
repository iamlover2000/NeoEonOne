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
            <!-- <div class="main_icon">
                
                <a href="index.php">
                    <img src="https://img.icons8.com/wired/64/000000/chrome.png"/>
                    <span>NeoEonOne</span> 
                </a>
            </div> -->
            
            <div class="user_info">
                <? if ($auth_user) {?>
                    <div>
                        <div class="user_name"><?=$auth_user['user_id']?>님</div>
                        <a href="buylist.php" class="" ><div class="btn bg-blue-200 hover:bg-blue-300"><?=number_format($auth_cash['cash'])?>p 보유</div></a>
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
                <a href="main.php" id="mainLogoLink">
                <!-- <img src="./NeoEonOne/images/harvestheaderlogo.png" > -->
                <span style="display: none;">메인로고</span>
            </a>
            <!-- <div class="main_menu">
                
                <div>
                    <div><a href="prod_list.php">상품목록</a></div>
                    <div><a href="./tip_list.php">팁게시판</a></div>
                    <div><a href="./tip_list.php?bid=2">거래게시판</a></div>
                </div>
                <div>
                    <div><a href="./tip_list.php?bid=3">직업게시판</a></div>
                    <div><a href="./tip_list.php?bid=4">빈게시판</a></div>
                </div>
            </div> -->
        </div>
            <ul class="fixed ul_menu">
                <li id="menu_first">
                    <a href="prod_list.php"><span>상품목록</span></a>
                    <div class="ul_menu dropDown" id="sub_menu_first">
                        <div></div>
                        <ul>
                            <li><a href="./tip_list.php"><span>팁게시판</span></a></li>
                            <li><a href="./tip_list.php?bid=2"><span>거래게시판</span></a></li>
                            <li><a href="./tip_list.php?bid=3"><span>직업게시판</span></a></li>
                            <li><a href="./tip_list.php?bid=4"><span>빈게시판</span></a></li>
                        </ul>
                        <!-- <div></div> -->
                    </div>
                </li>
                <li id="menu_second">
                    <a href="./tip_list.php"><span>팁게시판</span></a>
                    <div class="ul_menu dropDown" id="sub_menu_second">
                        <div></div>
                        <ul>
                            <li><a href="./tip_list.php"><span>팁게시판</span></a></li>
                            <li><a href="./tip_list.php?bid=2"><span>거래게시판</span></a></li>
                            <li><a href="./tip_list.php?bid=3"><span>직업게시판</span></a></li>
                            <li><a href="./tip_list.php?bid=4"><span>빈게시판</span></a></li>
                        </ul>
                        <!-- <div></div> -->
                    </div>
                </li>
                <li id="menu_third">
                    <a href="./tip_list.php?bid=2"><span>거래게시판</span></a>
                </li>
                <li id="menu_fourth">
                    <a href="./tip_list.php?bid=3"><span>직업게시판</span></a>
                </li>
                <li id="menu_fifth">
                    <a href="./tip_list.php?bid=4"><span>빈게시판</span></a>
                </li>
                <li id="menu_sixth">
                    <a href="main.php"><span>메인으로</span></a>
                </li>
                
            </ul>
        
    </div>