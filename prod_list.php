<?php include "./head.php";
include "./board_config.php";

$list = $pdo->query('select * from powerball
	order by id desc
	limit 10
' )->fetchAll();

?>
<style>
    .cart-wrap{
        width:200px;
        background:#eee;
    }
    .cart{
        text-align:center;
    }
    .cart-title{
        padding:3px;
        line-height:30px;
        background:#222;
        color:#eee;
    }
    .item{
        padding:10px;
        border-bottom:1px solid #ddd;
    }
</style>
<div class="flex">
    <div class="table-wrap flex-1">
        <table class="table w-full">
            <thead>
                <tr class="text-center">
                    <td>#</td>
                    <td>Date</td>
                    <td>Dround</td>
                    <td>홀</td>
                    <td>짝</td>
                    <td>언더</td>
                    <td>오버</td>
                </tr>
            </thead>
            <tbody>
            <? foreach ($list as $key => $value) {?>
                <tr class="text-center">
                    <td><?=$value['id']?></td>
                    <td><?=$value['reg_date']?></td>
                    <td><?=$value['date_round']?></td>
                    <td>
                        <span class="btn btn-xs btn-default item-add"
                            data-id="<?=$value['id']?>" 
                            data-date="<?=$value['reg_date']?>" 
                            data-round="<?=$value['date_round']?>" 
                            data-type="odd" 
                            >구매</span>
                    </td>
                    <td>
                        <span class="btn btn-xs btn-default item-add"
                            data-id="<?=$value['id']?>" 
                            data-date="<?=$value['reg_date']?>" 
                            data-round="<?=$value['date_round']?>" 
                            data-type="짝" 
                            >구매</span>
                    </td>
                    <td>
                        <span class="btn btn-xs btn-default item-add"
                            data-id="<?=$value['id']?>" 
                            data-date="<?=$value['reg_date']?>" 
                            data-round="<?=$value['date_round']?>" 
                            data-type="언더" 
                            >구매</span>
                    </td>
                    <td>
                        <span class="btn btn-xs btn-default item-add"
                            data-id="<?=$value['id']?>" 
                            data-date="<?=$value['reg_date']?>" 
                            data-round="<?=$value['date_round']?>" 
                            data-type="오버"" 
                            >구매</span>
                    </td>
                </tr>
            <?}?>
            
            </tbody>

        </table>
    </div>
    <div class="cart-wrap">
        <div class="cart">
            <form action="prod_list_process.php" method="POST" id="buyItemForm">
                
                <div class="cart-title">카트</div>
                <div class="cart-items">
                    <!-- 카트아이템 자리  -->
                </div>
                <div class="item-total"></div>
                <div class="button-wrap">
                    <span class="btn btn-danger buy-item-btn">구매</span>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.19/lodash.min.js"></script>
<script>
    var cart_items = [];
    $('.buy-item-btn').click(function(){
        //검증 
        if(cart_items.length === 1 ){
            alert('아이템을 선택해주세요');
        }else{
            $('#buyItemForm').submit()
        }
        
    })
    $('.item-add').click(function (e) { 
        var data = $(this).data();
        console.log(cart_items,data['id']+data['type']);
        var index_of = _.indexOf(cart_items,data['id']+data['type']);

        console.log(index_of);
        // if(배열에 id가 없으면){
        if(_.indexOf(cart_items,data['id']+data['type'])== -1){
            $(this).addClass('btn-primary')
            // console.log(data);

            cart_items.push(data['id']+data['type']);
            
            var item = 
            `<div class="item" id="item-${data['id']}${data['type']}">
                <input type="hidden" name="id[]" value="${data['id']}">
                <input type="hidden" name="type[]" value="${data['type']}">
                <div class="item-title">${data['id']}</div>
                <div class="item-type">${data['type']}</div>
                <div class="item-price">5000</div>
                <div class="item-count">1</div>
                <i class="fa fa-times"></i>
            </div>`;

            $('.cart-items').append(item);

        }else{
            $('#item-' + data['id']+data['type'] +'' ).remove();
            $(this).removeClass('btn-primary')
            _.pull(cart_items,data['id']+data['type']);
        }

        console.log(cart_items);

    });
</script>

<?php include "./tail.php"; ?>