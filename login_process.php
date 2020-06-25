<?php
include "./common.php";
$id = $_POST['id'];
$pass = $_POST['pass'];


$check = " SELECT * FROM user WHERE user_id = '$id' ";
$result = $pdo->query($check)->fetch();

if($result && $result['pass'] == $pass){
	$_SESSION['userid'] = $id;
	// dump($_SESSION);
	header('Location: ./main.php');

}else{
	echo "Wrong id of pw";
}

?>
