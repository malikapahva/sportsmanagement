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
          <li class="selected"><a href="leagues.php">Leagues</a></li>
		  <li><a href="getgameschedule.php">Game</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
	<div id="site_content">
      <div id="content">
	  <h1>Leagues</h1>
	  
	 
		
		<form method="get" action="registerleague.php" id="registerLeagueForm">
       			
				<label for='typeInput'>League:</label>
				<select name='leaguetype' id='leaguetype'>
		 <?php
		 
			$sql = "Select * from league";
			$result = mysql_query($sql);
			while($row = mysql_fetch_array($result))
			{
			    $value = $row['league_type'] ."-".$row['sport_name'];
				echo "<option value='".$row['league_id']."'>".$value."</option>" ;
			}
	     ?>
		 </select><br />
		 <br>
		 
			<label for ="teamInput">Team:</label>
			<select id="teamInput" name="team">
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
			
            <input class="myButton" type="submit" name="submit" value="Register">
        </form>
		
		
      </div>
    <div id="site_content_bottom"></div>
    </div>
  </div>
</body>