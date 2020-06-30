<?php include "./head.php"; 
include "./board_config.php";
?>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<div class="contents">
	<div class="title">
        <h2><?=$board_name[$bid]?></h2>
	</div>
	<div class="sub"></div>
	<div class="main_contents">
        <div>
            <form action="tip_write_insert.php" method="POST">
                <input type="hidden" name="bid" value="<?=$bid?>">
                <input type="text" class="form-control mb-3" name="title" required="true" placeholder="제목" value="">
                <textarea name="text" id="editor1" rows="10" cols="80" required="true"></textarea>
                <script>
                    // Replace the <textarea id="editor1"> with a CKEditor 4
                    // instance, using default configuration.
                    CKEDITOR.replace( 'editor1' );
                </script>
                <div class="mt-3 text-right">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i> 작성
                    </button>
                    <button type="button" class="btn btn-danger" onclick="history.back();">
                    <i class="fa fa-times" aria-hidden="true"></i> 취소
                    </button>
                </div>
            </form>
        </div>
		
	</div>
</div>
	

<?php include "./tail.php"; ?>