<?php
    $guest_page = true;
	include "./head.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        .wrap{
            position: absolute; 
            left: 50%; 
            top: 50%; 
            transform: translate(-50%, -50%);
        }
        .title {
            width: 45px;
            display: inline-block;
        }
        .wrap input{
            border: 1px solid #949494;
        }
    </style>
<div style="align-items: center; background-color: powderblue;">
    <form action="/resist_process.php" method="POST">
        <div class="wrap">
            <div class="">
                
                <input type="text" class=" form-control mb-3" name="id" placeholder="아이디">
            </div>
            <div>
                
                <input type="password" class=" form-control mb-3" name="pass" placeholder="비밀번호">
            </div>
            <div>
                
                <input type="text" class=" form-control mb-3" name="nick" placeholder="닉네임">
            </div>
            <div>
                
                <input type="email" class=" form-control mb-3" name="mail"  placeholder="메일주소">
            </div>
            <button type="submit" class="btn btn-primary">가입</button>
        </div>
        <div>
            <a href="index.php">메인으로</a>
        </div>
    </form>
</div>
  
</body>
</html>