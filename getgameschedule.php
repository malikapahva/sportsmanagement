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

	 <a class="myButton" href="uploadgameresult.php"> Update Score</a>&nbsp &nbsp
	 <a class="myButton" href="viewgameschedule.php">View Schedule</a><br/><br/>
	 
			<h1>Schedule</h1>
		
		<form method="get" action="schedulegame.php">
       			
				<label for='typeInput'>Game Location:</label>
				<input type="text" name="location" placeholder="Enter location">
				 </input><br />
		 <br>
		 
		 <label for='typeInput'>Game Date:</label>
				<input type="date" name="date">
				 </input><br />
		 <br>
		 <label for='typeInput'>Game Time:</label>
				<input type="time" name="time">
				 </input><br />
		 <br>
		 
		 		 
			<label for ="teamInput">Team 1:</label>
			<select id="team1Input" name="team1">
			<?php
		 
			$sql = "Select * from team";
			$result = mysql_query($sql);
			while($row = mysql_fetch_array($result))
			{
			    $value = $row['team_name'];
				echo "<option value='".$row['team_id']."'>".$value."</option>" ;
			}
	     ?>
			</select>
			
			<br><br>
			
			<label for ="teamInput">Team 2:</label>
			<select id="team2Input" name="team2">
			<?php
		 
			$sql = "Select * from team";
			$result = mysql_query($sql);
			while($row = mysql_fetch_array($result))
			{
			    $value = $row['team_name'];
				echo "<option value='".$row['team_id']."'>".$value."</option>" ;
			}
	     ?>
			</select>
			
			<br><br>
			
            <input class="myButton" type="submit" name="submit" value="Submit"/>
        </form>
		
		
      </div>
    <div id="site_content_bottom"></div>
    </div>
  </div>
</body>
</html>