<?php
function pageController(){

	if(isset($_GET['count'])){
		$currentPossition =$_GET['count'];
		if(!empty($_GET)){
			if($_GET['name'] == 'up'){
			$currentPossition++;
			}elseif($_GET['name'] == 'down') {
				$currentPossition-=1;
			}
		}
	}else{
		$currentPossition = 0;
	} 
	$data['currentPossition']= $currentPossition;
	return $data;
}
extract(pageController());
?>
<html>
<head>
	<title>Counter</title>
	<style type="text/css">
		html{
			text-align: center;
		}
		.button{
			border:2px solid black;
			padding: 5px;
		}
	</style>
</head>
<body>
	<h1>Counter with php</h1>
	<h2><?= $currentPossition;?></h2>
	<a href="?name=up&count=<?=$currentPossition;?>" class="button">up</a>
	<a href="?name=down&count=<?=$currentPossition;?>" class="button">down</a>
</html>