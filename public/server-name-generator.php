<?php
function generator($array){
	 $serverName = mt_rand(0, count($array)-1);
	 return $array[$serverName];
}
// Require or include statements are allowed here. All other code goes in the pageController function.

/**
 * The pageController function handles all processing for this page.
 * @return array An associative array of data to be used in rendering the html view.
 */
function pageController()
{
	$adj = ['fast','slow','easy','difficult','hot','cold','sweet','spicy','soft','hard','pink'];
	$noun = ['alien','potatoe','ninja','taco','people','animals','elfs','dwarfs','dragons','goblins'];
    // Initialize an empty data array.
    $data = [];

    // Add data to be used in the html view.
    $data['serverNames'] = generator($adj) . ' ' . generator($noun);

    // Return the completed data array.
    return $data;    
}

// Call the pageController function and extract all the returned array as local variables.
extract(pageController());
// ======================================================
$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
$color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
    

?>
<!DOCTYPE html>
<html>
<head>
	<title>server name generator</title>
	<style type="text/css">
	h1{
		text-align: center;
		background: <?= $color; ?>;
	}

	</style>
</head>
<body>
	<h1><?= $serverNames; ?></h1>
</body>
</html>