<?php 
require 'vendor/autoload.php';
include_once('./dbconfig.php');
session_start();

// dump('session',$_SESSION);
$auth_user = false;
// dump('auth_user',$auth_user);

if (isset($_SESSION['userid'])) {

    $stmt = $pdo->prepare(" SELECT * FROM user WHERE user_id =:user_id  ");
    $stmt->bindParam(':user_id', $_SESSION['userid']);
    $stmt->execute();
    $auth_user = $stmt->fetch();

    // dump('auth_user',$auth_user);
}

if(!$auth_user && !$login_page) {
    echo '로그인 해주세요';
    header('Location: ./login.php');

}




?>