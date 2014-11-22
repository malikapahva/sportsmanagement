<?php
include('dbconnect.php');

$headerOptions = array(
  "title" => "Leagues"
);
require_once "header.php";


?>


<head>
  <title>simple_square template</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
  
  <script type="text/javascript" src="scripts/jquery-1.7.2.min.js">
  </script>
 
</head>

<body>
  <div id="main">
    <div id="links"></div>
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="green", allows you to change the colour of the text - other classes are: "blue", "orange", "red", "purple" and "yellow" -->
          <h1>Recreational <span class="green">Sports Management System</span></h1>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="index.php">Home</a></li>
          <li><a href="registerTeam.php">Team</a></li>
          <li><a href="viewRoster.php">View Rosters</a></li>
          <li><a href="leagues.php">Leagues</a></li>
		  <li class="selected"><a href="getgameschedule.php">Game</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
	<div id="site_content">
      <div id="content">
	   <a class="myButton" href="getgameschedule.php">Schedule</a>&nbsp &nbsp
	 <a class="myButton" href="uploadgameresult.php">Update Score</a>&nbsp &nbsp
	 <a class="myButton" href="viewgameschedule.php">View Schedule</a>

	 <br/><br/>
	 <br/><br/>
		
		<?php
			$game_date=$_GET["date"];
			$game_time=$_GET["time"];
			$game_location=$_GET["location"];
			$team1_id=$_GET["team1"];
			$team2_id=$_GET["team2"];			
						
			$sql="INSERT INTO game (game_date, game_time, game_location, team1_id, team2_id) VALUES ('$game_date', '$game_time', '$game_location', $team1_id, $team2_id)"; 
			$result = mysql_query($sql) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $sql . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
			 echo "Game scheduled successfully";
		?>
          <br/><br/>
          <a class="myButton" href="getgameschedule.php">Back</a>
		
		
      </div>
    <div id="site_content_bottom"></div>
    </div>
  </div>
</body>