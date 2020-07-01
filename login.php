<?php
    $guest_page = true;
	include "./header.php";
?>
    <style>
        .title {
                width: 45px;
                display: inline-block;
            }
    </style>
    <div style="display: flex; justify-content: center;height: 100vh; align-items: center; ">
        <form action="login_process.php" method="POST">
        <!-- <form action="login_ok.php" method="POST"> -->
            <div>
                <div>
                    
                    <input type="text" class=" form-control mb-3" name="id" placeholder="ID">
                </div>
                <div>
                    
                    <input type="password" class=" form-control mb-3" name="pass" placeholder="PW">
                </div>
                <div>
                    <input type="submit" class="btn btn-primary" value="로그인">
                </div>
            </div>
        </form>
    </div>

<?php include "./tail.php"; ?>