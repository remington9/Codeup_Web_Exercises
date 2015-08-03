<?php

require_once '../includes/parks_config.php';
require_once '../db_connect.php';
require_once '../Input.php';
$offset = (($_GET['page']-1) * 4);

if(empty($_GET)){
	header('location: ?page=1');
	exit();
}

    $parks = $dbc->query("SELECT * FROM national_parks LIMIT 4 OFFSET $offset")->fetchAll(PDO::FETCH_ASSOC);
    $stmt = $dbc->query('SELECT count(*) FROM national_parks');
    $stmt1 = $stmt->fetchColumn();
    $maxpage = ceil($stmt1 / 4);
?>
<html>
<head>
	<title>National Parks</title>
</head>
<body>
	<h1>Nation Parks</h1>
	<? foreach ($parks as $key => $value): ?>
		<h2><?= $value['name'];?></h2>
		<p>
			State located in: <?= $value['location'];?><br>
			Date established: <?= $value['date_established'];?><br>
			Size in acres: <?= $value['area_in_acres'];?><br>
		</p>

	<? endforeach;?>
	<? if($_GET['page'] >= 1 && $_GET['page'] != $maxpage){	
		echo "<a href='national_parks.php?page=". ($_GET['page'] + 1). "'>Next Page</a>";
		}
	?>
	<br>
	<?
		if($_GET['page'] >= 2){	
		echo "<a href='national_parks.php?page=". ($_GET['page'] - 1). "'>Previous Page</a>";
		}
	?>
	<?
		if($_GET['page'] > $maxpage || !is_numeric($_GET['page'])){	
		header("location: ?page=$maxpage");
		exit();
		}
	?>
	
	<!-- 	<? if($_GET['page'] >= 0 && $_GET['page'] <= ($stmt1 / 5)): ?>	
		 <a href="national_parks.php?page=<? ($_GET['page'] + 1)?>" >Next Page</a>
	<? endif ?>
	<br>
	
	<?if($_GET['page'] >= 1):	?>
		<a href="national_parks.php?page=<? ($_GET['page'] - 1)?>" >Previous Page</a>
	<? endif ?> -->

</body>
</html>