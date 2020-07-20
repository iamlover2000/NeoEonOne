<?php
include "./common.php";


if (isset($_SESSION['userid'])) {

    $stmt = $pdo->prepare(" SELECT cash FROM user WHERE user_id =:user_id  ");
    $stmt->bindParam(':user_id', $_SESSION['userid']);
    $stmt->execute();
    $auth_cash = $stmt->fetch();
}





$count = count($_POST['id']);


$cart_id = uniqid();
// dump($cart_id);
$totalprice = $count * 5000;

// $currentprice = $auth_cash - $totalprice;
//금액 확인 
// dump($count);

$array = [];
for ($i=0; $i <$count ; $i++) { 
    $array[] =[
       $_POST['id'][$i],
       $_POST['type'][$i]
    ];
}
// dump($array);

// foreach ($array as $key => $value) {
//     dump($value[0]);
// }
// dump($auth_user);

try {

    if(!isset($_POST['id'])){
        throw new Exception('아이템을 선택해주세요', 1);
        
    }

    if($auth_cash['cash'] < $totalprice){
        throw new Exception('금액을 확인해주세요', 1);
    }





} catch (\Throwable $th) {
    echo $th->getMessage();
    die();
}

dump($totalprice);
dump($auth_cash['cash']);
// die();

try {
    if(!isset($_SESSION['userid'])){
        throw new Exception("로그인상태를 확인해주세요");
    }

    /**
     * 
     * id 자동 
     * cart_id : post cart_id or unique_id
     * prod_id post id 
     * user_id 세션 user id 
     * prod_typ post type 
     * price  5000 // post price 
     * count 1  //post count 
     * status 0 
     */

    /**
     * buy_total = insert in to buy total list
     * 
     * id 자동
     * user_id 유저테이블 id
     * cart_id 유니크아이디
     * prod_name post prod_name 상품분류
     * total_price 5000 * 토탈카운트
     * total_count 장바구니총상품갯수
     * total_status  0 
     */

    // dump($auth_user['id']);
    //insert  money 차감 구매내역 페이지로 
        
        //총결제금액부분 
        $stmt = $pdo->prepare(' insert into buy_total_list set
            user_id = :user_id,
            cart_id = :cart_id,
            
            total_price = :total_price,
            total_count = :total_count
        ');

        $stmt->bindParam(':user_id',$auth_user['id']);
        $stmt->bindParam(':cart_id',$cart_id);
        // $stmt->bindParam(':prod_name',);
        $stmt->bindParam(':total_price',$totalprice);
        $stmt->bindParam(':total_count',$count);
        $stmt->execute();

        //유저캐쉬-총결제금액 업데이트부분
        $stmt = $pdo->prepare(' update user set
            
            cash = :currentcash - :totalprice
            
            where id = :user_id
        ');
        $stmt->bindParam(':user_id',$auth_user['id']);
        $stmt->bindParam(':totalprice',$totalprice);
        $stmt->bindParam(':currentcash',$auth_cash['cash']);
        
        $stmt->execute();



        // foreach ($array as $key => $value) {
            
        // 개별결제내역등록부분
    for ($i=0; $i < $count ; $i++) { 
        

        $stmt = $pdo->prepare(' insert into buy_list set
            cart_id = :cart_id,
            prod_id = :prod_id,
            user_id = :user_id,
            prod_type = :prod_type,
            price = 5000,
            count = 1
        ');

        $stmt->bindParam(':cart_id',$cart_id);
        $stmt->bindParam(':prod_id',$array[$i][0]);
        $stmt->bindParam(':user_id',$auth_user['id']);
        $stmt->bindParam(':prod_type',$array[$i][1]);
        // $stmt->bindValue(':price',5000);
        // $stmt->bindValue(':count',1);
        $stmt->execute();

    }
    echo "<script>alert('\-0-/');
        location.replace('./prod_list.php')
    </script> ";
} catch (\Throwable $e) {

    echo "<script>alert('-a-;;\\n{$e->getMessage()} [{$e->getCode()}]');
        window.history.back()
    </script> ";
}