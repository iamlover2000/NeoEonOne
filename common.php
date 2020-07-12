<?php 
require 'vendor/autoload.php';
require 'lib/class.common.php';
include_once('./dbconfig.php');
session_start();


$Common = new Common;
// dump('session',$_SESSION);



$auth_user = false;


if (isset($_SESSION['userid'])) {

    $stmt = $pdo->prepare(" SELECT * FROM user WHERE user_id =:user_id  ");
    $stmt->bindParam(':user_id', $_SESSION['userid']);
    $stmt->execute();
    $auth_user = $stmt->fetch();
}
// dump('auth_user',$auth_user);
// login check
if(!$auth_user && !$guest_page) {
    echo '로그인 해주세요';
    header('Location: ./login.php');
}

?>