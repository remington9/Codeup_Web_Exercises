<?php

require_once '../includes/parks_config.php';
require_once '../db_connect.php';
require_once '../Input.php';

$limit = 4;
$offset = (($_GET['page']-1) * $limit);

if(empty($_GET)){
	header('location: ?page=1');
	exit();
}

$errorMessage = 'Add a Park';

$stmt = $dbc->prepare("SELECT * FROM national_parks LIMIT :limit OFFSET :offset");
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->execute();
$parks= $stmt->fetchAll(PDO::FETCH_ASSOC);

$count = $dbc->query('SELECT count(*) FROM national_parks');
$stmt1 = $count->fetchColumn();
$maxpage = ceil($stmt1 / $limit);

if(!empty($_POST)){
	if (Input::has('name') && 
		Input::has('location') && 
		Input::has('date_established') && 
		Input::has('area_in_acres') && 
		Input::has('description')
	){
		$newPost = $dbc->prepare("INSERT INTO national_parks(name, location, date_established, area_in_acres, description) 
		VALUES(:name,:location,:date_established,:area_in_acres,:description)");
	    $newPost->bindValue(':name', Input::getString('name'), PDO::PARAM_STR);
	    $newPost->bindValue(':location', Input::getString('location'), PDO::PARAM_STR);
	    $newPost->bindValue(':date_established', Input::getDate('date_established'), PDO::PARAM_STR);
	    $newPost->bindValue(':area_in_acres', Input::getNumber('area_in_acres'), PDO::PARAM_STR);
	    $newPost->bindValue(':description', Input::getString('description'), PDO::PARAM_STR);
	    $newPost->execute();
	}else{
		$errorMessage = 'To add a park please input all fields!';
	}
}

if($_GET['page'] > $maxpage || !is_numeric($_GET['page']) || $_GET['page'] < 1){	
	header("location: ?page=$maxpage");
	exit();
}
?>
<html>
<head>
	<title>National Parks</title>
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="/pickadate.js-3.5.6/lib/compressed/picker.js"></script>
	<script src="/pickadate.js-3.5.6/lib/compressed/picker.date.js"></script>
	<script rel="stylesheet" href="/pickadate.js-3.5.6/lib/compressed/themes/classic.css"></script>
	<script rel="stylesheet" href="/pickadate.js-3.5.6/lib/compressed/themes/classic.date.css"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<style type="text/css">
	#form{
		border: 1px solid #777;
	}
	#container{
		width: 900px;
		margin-right: auto;
		margin-left: auto;
	}
	#next_page{
		float: right;
	}
	#previous_page{
		float: left;
	}
	#container_parks{
		margin-left: auto;
		margin-right: auto;
		width: 650px;
	}
	h1, h2{
		text-align: center;
	}
	hr{
		border-color: black;
	}
	</style>
	
</head>
<body>
	<h1><u>Nation Parks</u></h1>
	<div id="container_parks">
		<div class="row">
			<? foreach ($parks as $key => $value): ?>
				<div class="col-sm-5">
					<ul><strong><u><?= $value['name'];?></strong></u>
						<li>State located in: <?= $value['location'];?></li>
						<li>Date established: <?= $value['date_established'];?></li>
						<li>Size in acres: <?= $value['area_in_acres'];?></li>
						<li>Description: <?= $value['description'];?></li>
					</ul>
				</div>
			<? endforeach;?>
		</div>
	</div>
	<div id="container">
		<h2><u><?= $errorMessage ?></u></h2>
		<div id="form">
			<form method="POST">
				<div class="input-group-lg">
				  <input type="text" class="form-control" placeholder="Park Name" name="name" id="name" aria-describedby="basic-addon1">
				</div>
				<div class="input-group-lg">
				  <input type="text" class="form-control" placeholder="State" name="location" aria-describedby="basic-addon1">
				</div>			
				<div class="input-group-lg">
				  <input type="text" class="form-control" placeholder="YYYY-MM-DD" name="date_established" aria-describedby="basic-addon1">
				</div>			
				<div class="input-group-lg">
				  <input type="text" class="form-control" placeholder="Area in Acres" name="area_in_acres" aria-describedby="basic-addon1">
				</div>			
				<div class="input-group-lg">
				  <input type="text" class="form-control" placeholder="Description" name="description" aria-describedby="basic-addon1">
				</div>
				<button class="btn btn-lg btn-info btn-block"type="submit">Submit</button>
			</form>
		</div>
		<hr>
		<ul class='pager'>
			<?php if($_GET['page'] != $maxpage):?>	
				<li id='next_page'><a href='national_parks.php?page=<?= $_GET['page'] + 1 ?>'>Next Page</a></li>
			<?php endif	?>
			<?php if($_GET['page'] >= 2): ?>	
				<li id='previous_page'><a href='national_parks.php?page=<?= $_GET['page'] - 1 ?>'>Previous Page</a></li>
			<?php endif ?>
		</ul>
	</div>


	<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


</body>
</html>