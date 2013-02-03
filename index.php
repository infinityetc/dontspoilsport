<?php
require_once('include/header.php');
?>

<p>Select the teams you don't want to hear about</p>

<a class="jump" href="#AFC-N">AFC-North</a>
<a class="jump" href="#AFC-S">AFC-South</a>
<a class="jump" href="#AFC-E">AFC-East</a>
<a class="jump" href="#AFC-W">AFC-West</a>
<a class="jump" href="#NFC-N">NFC-North</a>
<a class="jump" href="#NFC-S">NFC-South</a>
<a class="jump" href="#NFC-E">NFC-East</a>
<a class="jump" href="#NFC-W">NFC-West</a>

<form action="all.php" method="get">

<div class="division">

<h2 id="AFC-N">AFC-North</h2>
	<input type="checkbox" name="nfl[]" id="BAL" value="BAL">
	<label for="BAL">Baltimore Ravens</label>
	<input type="checkbox" name="nfl[]" id="CIN" value="CIN">
	<label for="CIN">Cincinnati Bengals</label>
	<input type="checkbox" name="nfl[]" id="CLE" value="CLE">
	<label for="CLE">Cleveland Browns</label>
	<input type="checkbox" name="nfl[]" id="PIT" value="PIT">
	<label for="PIT">Pittsburgh Steelers</label>

<h2 id="AFC-S">AFC-South</h2>
	<input type="checkbox" name="nfl[]" id="HOU" value="HOU">
	<label for="HOU">Houston Texans</label>
	<input type="checkbox" name="nfl[]" id="IND" value="IND">
	<label for="IND">Indianapolis Colts</label>
	<input type="checkbox" name="nfl[]" id="JAC" value="JAC">
	<label for="JAC">Jacksonville Jaguars</label>
	<input type="checkbox" name="nfl[]" id="TEN" value="TEN">
	<label for="TEN">Tennesse Titans</label>

<h2 id="AFC-E">AFC-East</h2>
	<input type="checkbox" name="nfl[]" id="BUF" value="BUF">
	<label for="BUF">Buffalo Bills</label>
	<input type="checkbox" name="nfl[]" id="MIA" value="MIA">
	<label for="MIA">Miami Dolphins</label>
	<input type="checkbox" name="nfl[]" id="NE" value="NE">
	<label for="NE">New England Patriots</label>
	<input type="checkbox" name="nfl[]" id="NYJ" value="NYJ">
	<label for="NYJ">New York Jets</label>

<h2 id="AFC-W">AFC-West</h2>
	<input type="checkbox" name="nfl[]" id="DEN" value="DEN">
	<label for="DEN">Denver Broncos</label>
	<input type="checkbox" name="nfl[]" id="KC" value="KC">
	<label for="KC">Kansas City Chiefs</label>
	<input type="checkbox" name="nfl[]" id="OAK" value="OAK">
	<label for="OAK">Oakland Raiders</label>
	<input type="checkbox" name="nfl[]" id="SD" value="SD">
	<label for="SD">San Diego Chargers</label>

</div><!-- .division -->

<div class="division">

<h2 id="NFC-N">NFC-North</h2>
	<input type="checkbox" name="nfl[]" id="CHI" value="CHI">
	<label for="CHI">Chicago Bears</label>
	<input type="checkbox" name="nfl[]" id="DET" value="DET">
	<label for="DET">Detroit Lions</label>
	<input type="checkbox" name="nfl[]" id="GB" value="GB">
	<label for="GB">Green Bay Packers</label>
	<input type="checkbox" name="nfl[]" id="MIN" value="MIN">
	<label for="MIN">Minnesota Vikings</label>

<h2 id="NFC-S">NFC-South</h2>
	<input type="checkbox" name="nfl[]" id="ATL" value="ATL">
	<label for="ATL">Atlanta Falcons</label>
	<input type="checkbox" name="nfl[]" id="CAR" value="CAR">
	<label for="CAR">Carolina Panthers</label>
	<input type="checkbox" name="nfl[]" id="NO" value="NO">
	<label for="NO">New Orleans Saints</label>
	<input type="checkbox" name="nfl[]" id="TB" value="TB">
	<label for="TB">Tampa Bay Buccaneers</label>

<h2 id="NFC-E">NFC-East</h2>
	<input type="checkbox" name="nfl[]" id="DAL" value="DAL">
	<label for="DAL">Dallas Cowboys</label>
	<input type="checkbox" name="nfl[]" id="NYG" value="NYG">
	<label for="NYG">New York Giants</label>
	<input type="checkbox" name="nfl[]" id="PHI" value="PHI">
	<label for="PHI">Philadelphia Eagles</label>
	<input type="checkbox" name="nfl[]" id="WAS" value="WAS">
	<label for="WAS">Washington Redskins</label>

<h2 id="NFC-W">NFC-West</h2>
	<input type="checkbox" name="nfl[]" id="ARI" value="ARI">
	<label for="ARI">Arizona Cardinals</label>
	<input type="checkbox" name="nfl[]" id="SF" value="SF">
	<label for="SF">San Francisco 49ers</label>
	<input type="checkbox" name="nfl[]" id="SEA" value="SEA">
	<label for="SEA">Seattle Seahawks</label>
	<input type="checkbox" name="nfl[]" id="STL" value="STL">
	<label for="STL">St. Louis Rams</label>

</div><!-- .division -->

<input type="submit" value="Read Unspoiled News">

</form>

<?php
include_once('include/footer.php');
?>
