<?php
include('dbconnect.php');

$headerOptions = array(
    "title" => "Leagues"
);
require_once "header.php";


?>


    <head>
        <title>simple_square template</title>
        <meta name="description" content="website description"/>
        <meta name="keywords" content="website keywords, website keywords"/>
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
        <link rel="stylesheet" type="text/css" href="style/style.css"/>

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
                <li class="selected"><a href="registerTeam.php">Team</a></li>
                <li><a href="viewRoster.php">View Rosters</a></li>
                <li><a href="leagues.php">Leagues</a></li>
                <li><a href="getgameschedule.php">Game</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <div id="site_content">
        <div id="content">
            <h1>Team Stats</h1>

            <?php
            $getstatdata = "Select * from stats";
            $result = mysql_query($getstatdata) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $sql . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());

            echo "<table border='1'>
		<tr>
		<th>Team</th>
		<th># Games Played</th>
		<th>Wins</th>
		<th>Losses</th>
		<th>Draws</th>
		<th>No Contests</th>
			</tr>";
            function getTeamName($teamid){
                $getteamname="Select team_name from team where team_id = $teamid";
                $teamnameresult = mysql_query($getteamname);
                while ($row = mysql_fetch_array($teamnameresult)) {
                    return $row['team_name'];
                }
            }

            while ($row = mysql_fetch_array($result)) {
                echo "<tr>";
                $teamName = getTeamName($row['team_id']);
                echo "<td>" . $teamName . "</td>";
                echo "<td>" . $row['played'] . "</td>";
                echo "<td>" . $row['wins'] . "</td>";
                echo "<td>" . $row['losses'] . "</td>";
                echo "<td>" . $row['draws'] . "</td>";
                echo "<td>" . $row['ncs'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            ?>
            <br/><br/>
           <!-- <a href="myTeams.php"><input type="button" value="Back" /></a>-->
            <a class="myButton" href="myTeams.php">Back</a>



        </div>
        <div id="site_content_bottom"></div>
    </div>
</div>
</body>