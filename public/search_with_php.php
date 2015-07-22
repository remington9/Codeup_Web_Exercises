<?php
$search = isset($_POST['search']) ? $_POST['search'] : '';

$potatoe = urlencode("$search");
?>

<html>
<head>
	<title>Search</title>
</head>
<body>
	<h1>Search for:<?= $search ?></h1>
	<form method="POST">
        <label>Search for?</label>
        <input type="text" name="search"><br>
        <input type="submit">
    </form>
    <a href="https://duckduckgo.com/?q=<?= $potatoe?>">Go to search now!</a>
</body>
</html>
