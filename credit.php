<?php include "./head.php"; ?>

<div>
    <form class="creditBox" id="creditForm" action="credit_process.php" method="post">
        <div class="">
            <div class="">
                <input type="text" class="form-control mb-3" id="inputMoney" name="money" value="0">
                <!-- <input type="hidden" name="chkid" value="<?=$_SESSION['id']?>" method="post"> -->
            </div>
            <div class="">
                <span class="btn btn-default btn-money" data-money="1000">1,000</span>
                <span class="btn btn-default btn-money" data-money="5000">5,000</span>
                <span class="btn btn-default btn-money" data-money="10000">10,000</span>
                <span class="btn btn-default btn-money" data-money="50000">50,000</span>
            </div>
        </div>
        <div class="p-3">
            <span type="" id="formSubmit" class="btn btn-default">승인</span>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/df-number-format/2.1.6/jquery.number.min.js" integrity="sha512-3z5bMAV+N1OaSH+65z+E0YCCEzU8fycphTBaOWkvunH9EtfahAlcJqAVN2evyg0m7ipaACKoVk6S9H2mEewJWA==" crossorigin="anonymous"></script>
<script>

    //넘버형식으로 변경 
    $('#inputMoney').number( true, 0 );
    //버튼 클릭시 숫자합 
    var input_money = 0
    $('.btn-money').click(function(){
        input_money = parseInt( $('#inputMoney').val() );
        input_money += parseInt($(this).data('money'));
        
        $('#inputMoney').val(input_money);
        
    });
    //금액 초기화 
    $('#inputMoney').on('focus', function () {
        $('#inputMoney').val(0);
    });
    
    //체크용
    $('#formSubmit').click(function(){
        // $('#inputMoney').val(input_money)
        // console.log($('#inputMoney').val());
        $('#creditForm').submit();
    });


    


</script>