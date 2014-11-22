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


            <h1>Schedule</h1>

            <?php
            $getscheduledata = "Select * from game";
            $result = mysql_query($getscheduledata) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $sql . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());

            echo "<table border='1'>
		<tr>
            <th>Team 1</th>
            <th>Team 2</th>
            <th>Games Location</th>
            <th>Date</th>
            <th>Time</th>
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
                $team1Name = getTeamName($row['team1_id']);
                $team2Name = getTeamName($row['team2_id']);
                echo "<td>" . $team1Name . "</td>";
                echo "<td>" . $team2Name . "</td>";
                echo "<td>" . $row['game_location'] . "</td>";
                echo "<td>" . $row['game_date'] . "</td>";
                echo "<td>" . $row['game_time'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            ?>
            <br/><br/>
            <a class="myButton" href="getgameschedule.php">Back</a>


        </div>
        <div id="site_content_bottom"></div>
    </div>
</div>
</body>
</html>