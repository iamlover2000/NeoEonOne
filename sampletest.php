<?php
    $guest_page = true;
    include "./head.php";

    $board_list_data = [
        [1,'팁게시판','board1'],
        [2,'거래게시판','board2'],
        [3,'직업게시판','board3'],
        [4,'빈게시판','board4'],
    ];
    
    $list = [];

    foreach ($board_list_data as $key => $value) {
        $list[] = [
            'id'=>$value[0],
            'name'=>$value[1],
            'data'=> $pdo->query('select id, title from '.$value[2].' order by id desc limit 1')->fetchAll(),
        ];
    }

//페이징을 할려면 전체갯수 , 페이지당 갯수 , 현재페이지 
// dump($list);
?>
<style>
    .sample {
        display: -webkit-box;
        display: -ms-flexbox;
        overflow: hidden;
        margin-top: 4px;
        font-size: 14px;
        line-height: 19px;
        color: #666;
        vertical-align: top;
        word-break: break-all;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
    }

    .top-box {
        max-width: 1100px;
        display: flex;
        margin-top: 20px;
        border: 2px solid #ddd;
        border-radius: 10px;
        padding: 10px;
    }

    a{ 
        text-decoration: none;
        align-items: center;
    }

    .img-box {
        width: 200px;
        height: 150px;
        margin-left: 40px;
        float: right;
        background-image: url(./tistorytest.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: 50% 50%;
    }
</style>
<div>
    <div class="top-box">
        <a href="">
        <div class="img-box" >
        
        </div>
            <div class="">
                <strong>환영합니다</strong>
                <p class="sample">
                
                <span><?=$list['data']?></span>
                
                </p>
                <p>
                    <span style="float: left">카테고리없음</span>
                    <span>2020.07.02</span>
                </p>

            </div>
        </a>
    </div>
    <div class="top-box">
        <a href="">
        <div class="img-box" >
        
        </div>
            <div class="">
                <strong>환영합니다</strong>
                <p class="sample">
                #1 글을 작성해 보세요.


                NeoEonOne님의 회원 가입을 진심으로 축하합니다. 이 글은 비공개로 작성돼 있습니다.
                '편집'으로 내용을 바꾸시거나, 삭제 후 '새 글을 작성'하셔도 됩니다.
                블로그를 간단하게 소개하는 글로 편집해보는 것도 좋겠네요.

                </p>
                <p>
                    <span style="float: left">카테고리없음</span>
                    <span>2020.07.02</span>
                </p>

            </div>
        </a>
    </div>
</div>