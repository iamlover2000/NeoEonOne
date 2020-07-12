<?php include "./head.php";
include "./board_config.php";

$psublist = $pdo->query( 'select * from powerball
    order by id desc
    limit 10,5
')->fetchall();

dump($psublist);
?>
<style>
    .cart-items{
        display: flex;
    }
    
    .item{
        text-align: center;
        margin-left: 5px;
    }
   
</style>

<div class="flex" style="flex-direction: column">
    <div class="table-wrap flex-1">
        <table class="table w-full">
            <thead>
                <tr>
                    <td>Date</td>
                    <td>Dround</td>
                    <td>ID</td>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                </tr>
            </thead>
            <tbody>
            <? foreach ($psublist as $key => $value) {?>
                <tr>
                    <td><?=$value['reg_date']?></td>
                    <td><?=$value['date_round']?></td>
                    <td><?=$value['id']?></td>
                    <td>
                        <span class="btn btn-xs btn-default item-add"
                            data-id="<?=$value['id']?>"
                            data-round="<?=value['date_round']?>"
                            data-type="홀"
                        >구매</span>
                    </td>
                    <td>
                        <span class="btn btn-xs btn-default item-add"
                            data-id="<?=$value['id']?>"
                            data-round="<?=value['date_round']?>"
                            data-type="짝"
                        >구매</span>
                    </td>
                    <td>
                        <span class="btn btn-xs btn-default item-add"
                            data-id="<?=$value['id']?>"
                            data-round="<?=value['date_round']?>"
                            data-type="오버"
                        >구매</span>
                    </td>
                    <td>
                        <span class="btn btn-xs btn-default item-add"
                            data-id="<?=$value['id']?>"
                            data-round="<?=value['date_round']?>"
                            data-type="언더"
                        >구매</span>
                    </td>
            <?}?>
            </tbody>
        </table>
    </div>
    <div class=" flex-1" style="padding :8px; margin : 1px">
    구매창
    </div>
    <div class="cart-wrap">
        <div class="cart-items"></div>
        <div class="cart-total"></div>
        <div class="cart-submit"></div>
        <div></div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.19/lodash.min.js"></script>
<script>
    var cart_items = [];
    $('.item-add').click(function (e) {
        var data = $(this).data();

        if(_.indexOf(cart_items,data['id']+data['type'])== -1){
            $(this).addClass('btn-primary')
            // console.log(data);

            cart_items.push(data['id']+data['type']);

            var item =
            `<div class="item" id="item-${data['id']}${data['type']}">
                <div class="item-title">${data['id']}</div>
                <div class="item-type">${data['type']}</div>
                <div class="item-price">5000</div>
                <div class="tem-count">1</div>
            </div>`;

            $('.cart-items').append(item);

        }else{
            $('#item-' + data['id']+data['type'] +'').remove();
            $(this).removeClass('btn-primary')
            _.pull(cart_items,data['id']+data['type']);
        }


    });
</script>