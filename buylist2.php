<?php include "./head.php";
include "./board_config.php";

$list = $pdo->query('select * 
    from buy_total_list 
    order by id desc
' )->fetchAll();


// dump($list_total);
// dump($list);

// die();

?>
<div class="flex">
    <div class="table-wrap flex-1">
        <table class="table w-full">
            <thead>
                <tr class="text-center">
                    <td>구매번호</td>
                    <td>구매상품</td>
                    <td>구매가격</td>
                    <td>구매갯수</td>
                    <td>구매시간</td>
                
                </tr>
            </thead>
            <tbody>
            <? foreach ($list as $key => $value) {?>
                <tr class="text-center toggle_sibl" 
                data-id="<?=$value['cart_id']?>" 
                data-key="<?=$key?>">
                    <td><?=$value['cart_id']?></td>
                    <td><?//=$value['prod_type']?></td>
                    <td><?=$value['total_price']?></td>
                    <td><?=$value['total_count']?></td>
                    <td><?=$value['created_at']?></td>
                </tr>
                <!-- <tr class="text-center hidden bg-gray-100 sibl-<?=$key?>">
                    <td><?=$num?></td>
                    <td><?=$val['prod_type']?></td>
                    <td><?=$val['price']?></td>
                    <td><?=$val['count']?></td>
                    <td><?=$val['created_at']?></td>
                </tr> -->
                
            <?}?>
            
            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.19/lodash.min.js"></script>
<script>
    $('.toggle_sibl').click(function(){
        var this_key = $(this).data();
        console.log(this_key);

        $.ajax({
            type: "post",
            url: "buylist_detail.php",
            data: {id:this_key.id},
            dataType: "json",
            success: function (d) {
                // console.log('res',d)
                _.forEach(d, function(v,i) {
                    console.log(v,i);
                });
            },error:function(e){
                console.log('error',e)
            }
        });
    })

    
</script>