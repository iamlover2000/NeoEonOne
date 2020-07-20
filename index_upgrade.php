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
            'data'=> $pdo->query('select id, title from '.$value[2].' order by id desc limit 5')->fetchAll(),
        ];
    }
    
    // $list[] = [
    //     'id'=>1,
    //     'name'=>'1게시판',
    //     'data'=> $pdo->query('select id, title from board1 order by id desc limit 5')->fetchAll()
    // ];
    // $list[] = [
    //     'id'=>2,
    //     'name'=>'2게시판',
    //     'data'=> $pdo->query('select id, title from board2 order by id desc limit 5')->fetchAll()
    // ];
    // $list[] = [
    //     'id'=>3,
    //     'name'=>'3게시판',
    //     'data'=> $pdo->query('select id, title from board3 order by id desc limit 5')->fetchAll()
    // ];
    // $list[] = [
    //     'id'=>4,
    //     'name'=>'4게시판',
    //     'data'=> $pdo->query('select id, title from board4 order by id desc limit 5')->fetchAll()
    // ];
    

    // dump($list)
    
   

?>
<style>
    /* .index_box_wrap{
        
    } */
    .index_box{
        min-height:100px;
        width:48%;
    }
    .index_box:nth-child(odd){
        margin-right: 20px;
    }
    .box-link a{
        color:inherit;
        /* text-decoration: none; */
    }
</style>

<div class="contents">
    <div class="title">
        <h1>NeoEonOne's hideout </h1>
    </div>
    <div class="sub"></div>
    <div class="main_contents">
        <div style="margin-bottom: 20px">
        Game, Coding, Tips for any kind ...</p>
        </div>
        <div class="index_box_wrap">
            <div class="flex flex-wrap">
                <? foreach ($list as  $board_list) {?>
                    <div class="index_box flex-auto">
                        <div class="panel panel-primary">
                            <!-- Default panel contents -->
                            <div class="panel-heading">
                                <span class="box-title"><?=$board_list['name']?></span>  
                                <span class="box-link pull-right">
                                    <a href="tip_list.php?bid=<?=$board_list['id']?>">more  <i class="fa fa-plus"></i></a>
                                </span>    
<!-- <?=dump($board_list);?> -->
                            </div>
                            <!-- <div class="panel-body">
                                <p>팁 게시판입니다.</p>
                            </div> -->
                            <!-- List group -->
                            <ul class="list-group">
                                <? foreach ($board_list['data'] as $value) {?>
                                    <li class="list-group-item">
                                        <a href="tip_view.php?bid=1&id=<?=$value['id']?>"><?=$value['title']?></a>
                                    </li>
                                <?}?>
                                
                            </ul>
                        </div>
                    </div>
                <?}?>
                
            </div>
        </div>
    </div>
</div>

<?php include "./tail.php"; ?>