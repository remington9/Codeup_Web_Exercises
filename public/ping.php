<?php
+require 'functions.php';
function pageController(){
	$data = array();
	$gameState = "In Play";
	if(inputHas('count')){
		$currentPossition =$_GET['count'];
		if(!empty($_GET)){
			if(inputGet('name') == 'hit'){
				$currentPossition++;
				$gameState = "In Play";
			}elseif(inputGet('name') == 'miss') {
				$currentPossition = 0;
				$gameState = "Game Over";
			}
		}
	}else{
		$currentPossition = 0;
	} 
	$data['currentPossition']= $currentPossition;
	$data['currentState']= $gameState;
	return $data;
}
extract(pageController());

?>
<html>
<head>
	<title>Ping</title>
	<style type="text/css">
		html{
			text-align: center;
		}
		button{
			height: 30px;
			width: 60px;
		}

	</style>
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

</head>
<body>
	<?php require 'navbar.php';?>
	<?php require 'header.php';?>
	<div class="page-header" style="margin-top: 90px;">
		<h1>Ping!</h1>
		<button><a href="pong.php?name=hit&count=<?=$currentPossition;?>">hit</a></button>
		<button><a href="?name=miss&count=<?=$currentPossition;?>">miss</a></button>
		<h2><?= $currentPossition?></h2>
		<h2><?= $currentState?></h2>
	</div>
	<?php require 'footer.php';?>
</body>
</html>