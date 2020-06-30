<?php include "./head.php";
include "./board_config.php";

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$page_count = 20;



$count =  $pdo->query('select count(*) as cnt from '.$board )->fetch();

$start_page = ($page - 1) * $page_count;

$total_page = ceil($count['cnt']/$page_count);

$page_nav_array = $Common->pageNav($total_page,$page);

// dump($count,$total_page,$page_nav_array);

$list = $pdo->query('
	select *,'.$board.'.id as board_id 
	from '.$board.' left join user on '.$board.'.author_id = user.id 
	where 1 
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
					<li ><a href="tip_list.php?page=<?=$page_nav_array['pre']?>&bid=<?=$bid?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>	
				<?}?>
				
				<?foreach ($page_nav_array['nav'] as $key => $value) {?>
					<li <?= ($value == $page) ? 'class=active':'' ?>>
						<a href="tip_list.php?page=<?=$value?>&bid=<?=$bid?>"><?=$value?></a>
					</li>
				<?}
				if($page_nav_array['next'] == 0){?>
					<li class="disabled"><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>	
				<?}else{?>
					<li><a href="tip_list.php?page=<?=$page_nav_array['next']?>&bid=<?=$bid?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
				<?}?>
			</ul>
		</nav>
		<table class="table w-full">
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
							<a href="./tip_view.php?id=<?=$value['board_id']?>">
								<?=$value['title']?>
							</a>
						</td>
						<td width="120"><?=$value['nick']?></td>
						<td width="200"><?=$value['created_at']?></td>
					</tr>
				<?}?>
					<tr>
						<td colspan="4">
							<div class="text-right">
								<form action="./tip_write.php">
									<input  class="btn btn-default" type='submit' value='글작성'/>
									<input type="hidden" name="bid" value="<?=$bid?>">
								</form>
								
							</div>
						</td>
                	</tr>
			</tbody>
		</table>
		<nav>
			<ul class="pagination">
				<?
				if($page_nav_array['pre'] == 0){?>
					<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>	
				<?}else{?>
					<li ><a href="tip_list.php?page=<?=$page_nav_array['pre']?>&bid=<?=$bid?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>	
				<?}?>
				
				<?foreach ($page_nav_array['nav'] as $key => $value) {?>
					<li <?= ($value == $page) ? 'class=active':'' ?>>
						<a href="tip_list.php?page=<?=$value?>&bid=<?=$bid?>"><?=$value?></a>
					</li>
				<?}
				if($page_nav_array['next'] == 0){?>
					<li class="disabled"><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>	
				<?}else{?>
					<li><a href="tip_list.php?page=<?=$page_nav_array['next']?>&bid=<?=$bid?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
				<?}?>
			</ul>
		</nav>
	</div>
</div>

	

<?php include "./tail.php"; ?>