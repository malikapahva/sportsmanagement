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
            <h1>League</h1>

            <?php
            $leaguetype = $_GET['leaguetype'];

            $sql="SELECT team_id, team_name, league_id, league_type, sport_name FROM Team NATURAL JOIN contest NATURAL JOIN League WHERE league_id=$leaguetype";

            $result = mysql_query($sql) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());


            echo "<table border='1'>
				<tr>
					<th>League</th>
					<th>Team ID</th>
					<th>Team Name</th>
					<th>Action</th>
				</tr>";

            //echo "<h1><a href='".$web."'>" . $leagueid . ". " . $leaguetype . " " . $sport . "</a></h1>";
            $lid = NULL;

            while($row = mysql_fetch_array($result))
            {
                $leaguetype_sport = $row['league_type']."-".$row['sport_name'];
                $tid = $row['team_id'];
                $lid = $row['league_id'];
                echo "<tr>";
                echo "<td>" . $leaguetype_sport . "</td>";
                echo "<td>" . $tid . "</td>";

                $ba = "getteam.php?teamname=";
                $ke = $ba . $row['team_name'];

                echo "<td><a href='".$ke."'>" . $row['team_name'] . "</a></td>";

                if ($_SESSION['admin'] != '1') {
                    echo "<td>" . "<a href='joinTeam.php?tid=".$tid."&lid=".$lid."'>Join</a>" . "</td>";
                }
                else {
                    echo "<td>" . "<a href='deleteteam.php?tid=".$tid."&lid=".$lid."'>Remove</a>" . "</td>";
                }

                echo "</tr>";
            }
            echo "</table>";


            ?>
            <a class="myButton" href="getschedule.php">Back</a>
        </div>
        <div id="site_content_bottom"></div>
    </div>
</div>
</body>