<!DOCTYPE html>
<html>
<head>
<title>Don't Spoil Sport</title>
<link rel="stylesheet" type="text/css" href="/style.css">
</head>

<body>

<header>
<h1>Don't Spoil Sport</h1>
</header>


<div class="wrapper">
<div class="main">

<p>Don't spoil their ending for me:</p>

<form action="score.php" method="get">

<h2>AFC-North</h2>
        <input type="checkbox" name="nfl[]" id="BAL" value="BAL">
	<label for="BAL">Baltimore Ravens</label>
        <input type="checkbox" name="nfl[]" value="CIN">Cincinnati Bengals
        <input type="checkbox" name="nfl[]" value="CLE">Cleveland Browns
        <input type="checkbox" name="nfl[]" value="PIT">Pittsburgh Steelers

<h2>AFC-South</h2>
        <input type="checkbox" name="nfl[]" value="HOU">Houston Texans
        <input type="checkbox" name="nfl[]" value="IND">Indianapolis Colts
        <input type="checkbox" name="nfl[]" value="JAC">Jacksonville Jaguars
        <input type="checkbox" name="nfl[]" value="TEN">Tennessee Titans

<h2>AFC-East</h2>
        <input type="checkbox" name="nfl[]" value="BUF">Buffalo Bills
        <input type="checkbox" name="nfl[]" value="MIA">Miami Dolphins
        <input type="checkbox" name="nfl[]" value="NE">New England Patriots
        <input type="checkbox" name="nfl[]" value="NYJ">New York Jets

<h2>AFC-West</h2>
        <input type="checkbox" name="nfl[]" value="DEN">Denver Broncos
        <input type="checkbox" name="nfl[]" value="KC">Kansas City Chiefs
        <input type="checkbox" name="nfl[]" value="OAK">Oakland Raiders
	<input type="checkbox" name="nfl[]" value="SD">San Diego Chargers

<input type="submit" value="See Everything Else">

</form>

</div><!-- .main -->

<footer>
<a href="about">About Us</a>
</footer>


</div><!-- .wrapper -->

</body>

</html>
