<!doctype html>
<html id="html5">
<head>
<link rel="stylesheet" href="stylesheet.css" type="text/css">
<meta charset="utf-8">
<title>Search Query</title>
<?php
	$searchQuery = $_GET['fieldText'];
	
	if (isset($searchQuery) && !empty($searchQuery)) {
		require('includes/dbconx.php');
		
		$searchq = mysqli_real_escape_string($con, $searchQuery);
		
		$sql = mysqli_query($con, "SELECT * FROM music WHERE album LIKE '%$searchq%' OR artist LIKE '%$searchq%' OR genre LIKE '%$searchq%' OR year LIKE '%$searchq%'");
	}
	
	else{
		require('includes/dbconx.php');
		$searchq = mysqli_real_escape_string($con, $searchQuery);
		$sql = mysqli_query($con, "SELECT * FROM music");
	}
	?>
</head>
<header id="header1">
<img src="images/musicOnline-logo---master-png.png" alt="headLogo" id="headLogo">
	<button type="submit" id="jesusismydad">
	<a href="form.html" id="textLink">Click to register</a>
	</button>
	<form action="music-display.php" method="get" id="searchBar">
	<input type="text" name="fieldText" size="21" maxlength="120" id="searchQuery">
	<input type="submit" name="submit" id="submit" value="Search">
	</form>
	</header>
<div class="navbar" id="navbar">
	<button type="submit" class="buttons">
	<a href="index.html" class="textLink">Home</a>
	</button>
	<button type="submit" class="buttons">
	<a href="comesoon.html" class="textLink">Coming Soon</a>
	</button>
	<button type="submit" class="buttons">
	<a href="DJSchool.html" class="textLink">DJ School</a>
	</button>
	<button type="submit" class="buttons">
	<a href="Recording.html" class="textLink">Recording</a>
	</button>
</div>
<body>
<section id="pers"></section>
<div id="sect2">
     <div id="searchre">
<?php
	while($row = mysqli_fetch_array($sql)) {
		echo '<tr>';
		echo '<td>';
		echo "<img src=".'"'.$row['play'].'"'." width='500px'><br>";
		echo '</td>';
		echo '<td>'.'Album:&nbsp;'.$row['album'].'</td>&nbsp;&nbsp;&nbsp;';
		echo '<td>'.'Artist:&nbsp;'.$row['artist'].'</td>&nbsp;&nbsp;&nbsp;';
		echo '<td>'.'type:&nbsp;'.$row['genre'].'</td>&nbsp;&nbsp;&nbsp;';
		echo '<td>'.'Year:&nbsp;'.$row['year'].'</td><br><br>';
		echo '</tr>';
	}
	?>
	</div>
</div>
</body>
    <footer id="footer"><p>MusicOnline@yahoo.ca</p><p>01698-255-019</p></footer>
	</html>
