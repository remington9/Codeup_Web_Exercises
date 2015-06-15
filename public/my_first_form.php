<?php
	var_dump($_GET);
	var_dump($_POST);
?>
<!DOCTYPE html>
<html>

<head>
	<title>My first html form</title>
</head>
<body>
	<h2>User Login</h2>
	<form method="POST" action="/my_first_form.php">
    <p>
        <label for="username">Username</label>
        <input id="username" name="username" type="text" placeholder="username" autofocus required>
    </p>
    <p>
        <label for="password">Password</label>
        <input id="password" name="password" type="password" placeholder="password" required>
    </p>
    <p>
        <button type="submit" name="submit button" value="Login">Log in!</button>
    </p>
</form>
<h2>Compose Email</h2>
<form action="MAILTO:someone@example.com" method="post" type="text">
To:<br>
<input type="email" name="to" placeholder="To"><br>
From:<br>
<input type="email" name="from" placeholder="your email"><br>
Subject:<br>
<input type="text" name="subject" placeholder="Subject" size="50"><br>
Body:<br>
<textarea id="email_body" name="email_body" rows="5" cols="40" placeholder="Content here"></textarea><br>
<input type="reset" value="Reset">
<input type="submit" value="Send">
<input type="checkbox" id="mailing_list" name="mailing_list" value="yes" checked>Save copy to sent folder?
</form>

<form method="POST" action="/my_first_form.php">
    <h2>Multiple Choice Test</h2>
    <p>1: If you start with 6 apples and eat 2 how many apples do you have left?</p>
      <label>
        <input type="radio" name="q1" value="4">
        4
      </label>
    <label>
        <input type="radio" name="q1" value="6">
        6
    </label>
    <label>
        <input type="radio" name="q1" value="3">
        3
    </label>
    <label>
        <input type="radio" name="q1" value="2">
        2
    </label>

       <p>2: If you start with 2 bananas and buy 6 how many bananas do you have now?</p>
      <label>
        <input type="radio" name="q2" value="4">
        4
      </label>
    <label>
        <input type="radio" name="q2" value="6">
        6
    </label>
    <label>
        <input type="radio" name="q2" value="8">
        8
    </label>
    <label>
        <input type="radio" name="q2" value="2">
        2
    </label>

    <p>3: What tools have you used?</p>
        <label><input type="checkbox" id="tool1" name="tool[]" value="screwdriver"> screwdriver</label>
        <label><input type="checkbox" id="tool2" name="tool[]" value="hammer"> hammer</label>
        <label><input type="checkbox" id="tool3" name="tool[]" value="saw"> saw</label>

        <br><br><label for="pets">4: What is your favorite type of pet? </label>
<select id="pets" name="pets">
    <option>Dogs</option>
    <option>Cats</option>
    <option>Fish</option>
    <option>Birds</option>
</select>

        <button>Submit</button>
</form>

<form method="POST" action="/my_first_form.php">
    <h2>Select Testing</h2>

    <label for="gender">Are you a Male? </label>
<select id="gender" name="Gender">
    <option value="1">Yes</option>
    <option value="0">No</option>
</select>

</form>

</body>
</html>


