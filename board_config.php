<?php 

$bid = isset($_REQUEST['bid']) ? $_REQUEST['bid'] : 1;
$board = 'board'.$bid;
$board_name = [
	1 => '팁게시판',
	2 => '거래게시판',
	3 => '직업게시판',
];

?>

