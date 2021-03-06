<?php include "./head.php";
include "./board_config.php";

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$page_count = 20;

$search = isset($_GET['search']) ? $_GET['search'] : false;
$kind = isset($_GET['kind']) ? $_GET['kind'] : 'title';

// dump($search);

$search_query = '';
if($search){
	$search_query = ' where '.$kind.' like "%'.$search.'%"  ' ;
}

$count =  $pdo->query('select count(*) as cnt 
	from '.$board.' left join user on '.$board.'.author_id = user.id 
	'.$search_query )->fetch();

$start_page = ($page - 1) * $page_count;

$total_page = ceil($count['cnt']/$page_count);

$page_nav_array = $Common->pageNav($total_page,$page);

// dump($count,$total_page,$page_nav_array);

$list = $pdo->query('
	select *,'.$board.'.id as board_id 
	from '.$board.' left join user on '.$board.'.author_id = user.id 
	'.$search_query.'
	order by board_id desc
	limit '.$start_page.', '.$page_count.'
' )->fetchAll();

//페이징을 할려면 전체갯수 , 페이지당 갯수 , 현재페이지 
// dump($list);
?>
<div class="contents">
	<div class="title">
		<h2><?=$board_name[$bid]?></h2>
	</div>
	<div class="sub"></div>
	<div class="main_contents">
		<p></p>
		<nav>
			<ul class="pagination">
				<?
				if($page_nav_array['pre'] == 0){?>
					<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>	
				<?}else{?>
					<li><a href="tip_list.php?page=<?=$page_nav_array['pre']?>&bid=<?=$bid?>&kind=<?=$kind?>&search=<?=$search?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>

				<?}?>
				
				<?foreach ($page_nav_array['nav'] as $key => $value) {?>
					<li <?= ($value == $page) ? 'class=active':'' ?>>
						<a href="tip_list.php?page=<?=$value?>&bid=<?=$bid?>&kind=<?=$kind?>&search=<?=$search?>"><?=$value?></a>
					</li>
				<?}
				if($page_nav_array['next'] == 0){?>
					<li class="disabled"><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>	
				<?}else{?>
					<li><a href="tip_list.php?page=<?=$page_nav_array['next']?>&bid=<?=$bid?>&kind=<?=$kind?>&search=<?=$search?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
				<?}?>
			</ul>
		</nav>
		<table class="table w-full ">
			<thead>
				<tr class="text-center">
					<td>#</td>
					<td class="">제목</td>
					<td>작성자</td>
					<td>작성일</td>
				</tr>
			</thead>
			<tbody>
				<? foreach ($list as $key => $value) {?>
					<tr class="text-center">
						<td width="80"><?=$value['board_id']?></td>
						<td>
							<a href="./tip_view.php?id=<?=$value['board_id']?>&bid=<?=$bid?>&kind=<?=$kind?>&search=<?=$search?>">
								<?=$value['title']?>
							</a>
						</td>
						<td width="120"><?=$value['nick']?></td>
						<td width="200"><?=$value['created_at']?></td>
					</tr>
				<?}?>
					<tr>
						<td colspan="4">
							
						</td>
                	</tr>
			</tbody>
		</table>
		<div class="listBtmNav">
			
			<nav>
				<ul class="pagination marginZero ">
					<?
					if($page_nav_array['pre'] == 0){?>
						<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>	
					<?}else{?>
						<li ><a href="tip_list.php?page=<?=$page_nav_array['pre']?>&bid=<?=$bid?>&kind=<?=$kind?>&search=<?=$search?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>	
					<?}?>
					
					<?foreach ($page_nav_array['nav'] as $key => $value) {?>
						<li <?= ($value == $page) ? 'class=active':'' ?>>
							<a href="tip_list.php?page=<?=$value?>&bid=<?=$bid?>&kind=<?=$kind?>&search=<?=$search?>"><?=$value?></a>
						</li>
					<?}
					if($page_nav_array['next'] == 0){?>
						<li class="disabled"><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>	
					<?}else{?>
						<li><a href="tip_list.php?page=<?=$page_nav_array['next']?>&bid=<?=$bid?>&kind=<?=$kind?>&search=<?=$search?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
					<?}?>
				</ul>
			</nav>
			<div >
				<form class="disFlex" action="tip_list.php" method="get">
					<input type="hidden" name="bid" value="<?=$bid?>">
					<select class="form-control searchWidth" name="kind">
						<option value="title"  <?= ($kind == 'title') ? 'selected':'' ?>>제목</option>
						<option value="nick" <?= ($kind == 'nick') ? 'selected':'' ?>>글쓴이</option>
						<option value="text" <?= ($kind == 'text') ? 'selected':'' ?>>내용</option>
					</select>
					<input class="form-control" type="text" size="45" name="search" value="<?=$search?>">
					<button class="btn btn-default" type="submit">찾기</button>

				</form>
			</div>
			<div>
				<form action="./tip_write.php">
					<input  class="btn btn-default " type='submit' value='글작성'/>
					<input type="hidden" name="bid" value="<?=$bid?>">
				</form>	
			</div>
		</div>
	</div>
</div>

	

<?php include "./tail.php"; ?>