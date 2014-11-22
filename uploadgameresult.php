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
	 <a class="myButton" href="viewgameschedule.php">View Schedule</a><br/><br/>
		
			<h1>Update Score</h1>
		
		<form method="get" action="storeresult.php">
       			
				<label for='typeInput'>Game:</label>
				<select name='game' id='game'>
		 <?php
		 
			$sql = "Select * from game where team1_score is null and team2_score is null";
			$result = mysql_query($sql);
			function findTeamName($id){
				$query = "Select team_name from team where team_id=$id";
				$result=mysql_query($query);
				while($row = mysql_fetch_array($result))
			{
					return $row['team_name'];
			}
				
				return "Not Found";
			}
			while($row = mysql_fetch_array($result))
			{
				$teamName1 = findTeamName($row['team1_id']);
				$teamName2 = findTeamName($row['team2_id']);
			    $value = $teamName1 ." vs. ".$teamName2 ." on " .$row['game_date'] .", " .$row['game_time'] ." @ " .$row['game_location'] ;
				echo "<option value='".$row['game_id']."'>".$value."</option>" ;
			}
	     ?>
		 </select><br />
		 <br>	
		    <label for='typeInput'>Score by Team1:</label>
			<input type="text" name="team1score" placeholder="Enter score"><br/><br/>
			<label for='typeInput'>Score by Team2:</label>
			<input type="text" name="team2score" placeholder="Enter score"><br/><br/>
            <input class="myButton" type="submit" name="submit" value="Update Score">
        </form>
		
		
		
      </div>
    <div id="site_content_bottom"></div>
    </div>
  </div>
</body>
</html>