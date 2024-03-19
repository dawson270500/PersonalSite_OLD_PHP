<!doctype HTML>
<html>
<head>
        <title>Bailey Dawson</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="icon" type="image/x-icon" href="../../img/favicon.ico">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <link rel="stylesheet" href="../../css/main.css">
		<style>
			.codeholder{
				border: 1px solid black; 
				border-radius: 5px;
				overflow-x: scroll;
				overflow-y: scroll;
				width:475px;
				text-align:left;
				height:600px;
			}
		</style>
    </head>
	<body><!--Logo-->
	<div class="container">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-sm-8">
                    <h1>Bailey-Tyreese Dawson</h1>
                    </div>
                    <div class="col-sm-4" style=" position: absolute; right: 0px;">
                    <img class="mobileHide" src="../../img/propic.jpg" alt="My Profile Picture" style="border-radius: 50%;">
                    </div>
                </div>
				<br>
				<p>This is a recreation of the game space invaders, I wrote this a long time ago when I was 17. 
					The code is available to view just below next to the game. <br>This game did used to upload high scores to a database, but I have had to remove that from
					 this upload as it crashed my server. I will eventually rewrite that.</p>
				<p>I plan to do a full rewrite of this game, not using any of my original code, mainly to compare how I have changed as a developer over the years.
					 This rewrite may include new features that I never implemented originally like sound</p>
            </div>
        </div>
		<div class="container">
            <ul class="navbar">
                <li class="navbar"><a href="../../viewers/projview.php?id=5">Go back</a></li>
            </ul>
        </div>

		<div class="container" style="text-align: center;">
			<p>This page will not function correctly on mobile and Im afraid there is little I can do about that</p>
			<div class="row">
				<div class="col-sm-7" style="padding:1%;">
					<button onclick="location.reload();">Reset game</button>
					<button onclick="alert('Left - Left Arrow\nRight - Right Arrow\nShoot - Control\nPause/Unpause - P');">Display Controls</button>
					<p>Game Starts Paused</p>
					<br><canvas id="myCanvas"></canvas>
				</div>
				<div class="col-sm-5" style="padding:1%;">
					<p>Below you will be able to see the Javascript code for the space invaders game. As I plan to do a full rewrite of the game in future I will put a side by side here for comparison</p>
					<pre class="codeholder"><?php 
					$handle = fopen("code.js", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        echo($line);
    }

    fclose($handle);
} ?></pre>
				</div>
			</div>
		</div>
		<!--Game Logic Script-->
		<script src="code.js"></script>
		<script type="text/javascript">
			//Start game
			var loop = setInterval(move, mSpeed);
		</script>
	</body>
</html>
