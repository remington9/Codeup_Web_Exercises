<?php
function pageController(){
	if(isset($_GET['count'])){
		$currentPossition =$_GET['count'];
		if(!empty($_GET)){
			if($_GET['name'] == 'hit'){
				$currentPossition++;
				$gameState = "In Play";
			}elseif($_GET['name'] == 'miss') {
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
</head>
<body>
	<h1>Ping!</h1>
	<button><a href="pong.php?name=hit&count=<?=$currentPossition;?>">hit</a></button>
	<button><a href="?name=miss&count=<?=$currentPossition;?>">miss</a></button>
	<h2><?= $currentPossition?></h2>
	<h2><?= $currentState?></h2>
</body>
</html>