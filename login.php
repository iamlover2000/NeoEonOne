
<?php
    $login_page = true;
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
                    <span class="title">id</span>
                    <input type="text" name="id">
                </div>
                <div>
                    <span class="title">pass</span>
                    <input type="password" name="pass">
                </div>
                <div>
                    <input type="submit" value="로그인">
                </div>
            </div>
        </form>
    </div>

<?php include "./tail.php"; ?>