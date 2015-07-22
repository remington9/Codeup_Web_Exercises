<?php

// Require or include statements are allowed here. All other code goes in the pageController function.

/**
 * The pageController function handles all processing for this page.
 * @return array An associative array of data to be used in rendering the html view.
 */
function pageController()
{
    // Initialize an empty data array.
    $data = [];

    // Add data to be used in the html view.
    $data['message'] = ['aliens','potatoes','ninjas','tacos','people','animals','elfs','dwarfs','dragons','goblins'];

    // Return the completed data array.
    return $data;    
}

// Call the pageController function and extract all the returned array as local variables.
extract(pageController());
// ======================================================
?>
<!DOCTYPE html>
<html>
<head>
	<title>Favorite things</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
</head>
<body>
	<table class="table table-bordered">
		<th style="text-align:center; font-size:35px;">List of Favorite Things</th>
		<? foreach ($message as $key => $value): ?> 
		<?php 
		$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
		$color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
		?>
			<tr><td style="text-align: center;background: <?= $color; ?>"> <?= $value; ?> </td></tr>
		<? endforeach; ?>
	</table>

	<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>