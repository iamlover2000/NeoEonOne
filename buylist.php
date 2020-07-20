<?php include "./head.php";
include "./board_config.php";

dump($auth_user['id']);

$stmt = $pdo->prepare('select * 
    from buy_list left join buy_total_list 
    on buy_list.cart_id = buy_total_list.cart_id
    where buy_list.user_id=:sesid
    order by buy_list.id desc

');
$stmt ->bindParam(':sesid',$auth_user['id']);
$stmt ->execute();
$list = $stmt->fetchAll();


// $list = $pdo->query('select * 
//     from buy_list left join buy_total_list 
//     on buy_list.cart_id = buy_total_list.cart_id
//     order by buy_list.id desc
//     where user_id = :sessionid
// ' )->fetchAll();

$list_total = [];

foreach ($list as $key => $value) {
    $list_total[$value['cart_id']][] = $value;
}

// dump($list_total);
// dump($list);
$gamekind = [
    0 => 'power',
    1 => 'fx1min'
];
// dump($gamekind[1]);

// die();

?>
<div class="flex">
    <div class="table-wrap flex-1">
        <table class="table w-full">
            <thead>
                <div class="text-center">
                    <div class="h1"><?=$_SESSION['userid']?> 님의 게임내역</div>
                </div>
                <tr class="text-center">
                    <td>구매번호</td>
                    <td>상품분류</td>
                    <td>구매가격</td>
                    <td>구매갯수</td>
                    <td>구매시간</td>
                
                </tr>
            </thead>
            <tbody>
            <? foreach ($list_total as $key => $value) {?>
                <tr class="text-center toggle_sibl" data-key="<?=$key?>">
                    <td><?=$value[0]['id']?></td>
                    <td><?=$gamekind[$value[0]['prod_name']]?></td>
                    <td><?=$value[0]['total_price']?></td>
                    <td><?=$value[0]['total_count']?></td>
                    <td><?=$value[0]['created_at']?></td>
                </tr>
                <? foreach ($value as $num => $val) {?>
                    <tr class="text-center hidden bg-gray-100 sibl-<?=$key?>">
                        <td><?=$num?></td>
                        <td><?=$val['prod_type']?></td>
                        <td><?=$val['price']?></td>
                        <td><?=$val['count']?></td>
                        <td><?=$val['created_at']?></td>
                    </tr>
                <?}?>
            <?}?>
            -
            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script>
    $('.toggle_sibl').click(function(){
        var this_key = $(this).data('key');
        $('.sibl-'+this_key).toggleClass('hidden')
        console.log(this_key);
    })
</script>