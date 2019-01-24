<?php

include "dbConnect.php";

$page=$_GET['page'];
$option=$_GET['option'];
if($page=="")$page=1;
$from=($page-1)*9;

$query="select * from content where options='$option' order by num limit $from,9";
$result=$conn->query($query);
?>
<div class="clearfix">
<?php
while($row=$result->fetch_assoc()){
	
?>

	<div class='col-4 newincontent'>
			<div class='gall' style='background:url("<?= $row['gall']?>") no-repeat 50%; background-size:cover'>
			</div>
			<div class='txt'>
				<p class='maintxt'><?=$row['name']?></p>
				<p class='subtxt'><?= $row['price'] ?>원</p>
			</div>
		</div>
		<?php 
		}
?>
</div>
<div class="pages">
	<span style="cursor:pointer;" onclick="get_page('1')" >1</span> <span style="cursor:pointer;" onclick="get_page('2')" >2</span> <span style="cursor:pointer;" onclick="get_page('3')" >3</span>
	</div>