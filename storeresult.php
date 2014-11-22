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

            <h1>Result</h1>

            <?php
            $team1score = $_GET["team1score"];
            $team2score = $_GET["team2score"];
            $gameid = $_GET["game"];
            $sql = "Update game set team1_score=$team1score, team2_score=$team2score where game_id=$gameid";
            $query = "Select team1_id, team2_id from game where game_id=$gameid";
            $result = mysql_query($sql) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $sql . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
            $gamequeryresult = mysql_query($query);
            while ($row = mysql_fetch_array($gamequeryresult)) {
                $team1 = $row['team1_id'];
                $team1statrow = getTeamStats($team1);
                $team1win = 0;
                $team1loss = 0;
                $team1draw = 0;
                if ($team1score > $team2score) {
                    $team1win = 1;
                } else if ($team1score < $team2score) {
                    $team1loss = 1;
                } else {
                    $team1draw = 1;
                }

                updateStats($team1statrow, $team1, $team1win, $team1loss, $team1draw);

                $team2 = $row['team2_id'];
                $team2statrow = getTeamStats($team2);
                $team2win = 0;
                $team2loss = 0;
                $team2draw = 0;
                if ($team1score < $team2score) {
                    $team2win = 1;
                } else if ($team1score > $team2score) {
                    $team2loss = 1;
                } else {
                    $team2draw = 1;
                }

                updateStats($team2statrow, $team2, $team2win, $team2loss, $team2draw);

            }

            function getTeamStats($team_id)
            {
                $teamstats = "Select * from stats where team_id=$team_id";
                $teamstatsresult = mysql_query($teamstats);
                while ($row = mysql_fetch_array($teamstatsresult)) {
                    return $row;
                }
                return null;
            }


            function updateStats($teamstatrow, $teamid, $win, $loss, $draw)
            {
                if (is_null($teamstatrow)) {
                    $querytoapply = "Insert into stats values($teamid,1, $win, $loss, $draw, 0)";
                } else {
                    $played = $teamstatrow['played'] + 1;
                    $wins = $teamstatrow['wins'] + $win;
                    $losses = $teamstatrow['losses'] + $loss;
                    $draws = $teamstatrow['draws'] + $draw;
                    $querytoapply = "Update stats set played =$played, wins=$wins,losses =$losses, draws =$draws where team_id = $teamid";

                }

                $updateresult = mysql_query($querytoapply) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $querytoapply . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
            }


            echo "Score entered successfully";
            ?>


            <br/><br/>
            <a class="myButton" href="uploadgameresult.php">Back</a>

        </div>
        <div id="site_content_bottom"></div>
    </div>
</div>
</body>