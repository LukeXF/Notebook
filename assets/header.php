<?php 

	$brand = "notebook";
	$url = "http://localhost/notebook/";

	error_reporting(E_ALL);
	ini_set('display_errors', 1);


	function ago($time)	{
		$time = strtotime($time);

		$periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
		$lengths = array("60","60","24","7","4.35","12","10");

		$now = time();

		$difference     = $now - $time;
		$tense         = "ago";

		for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
			$difference /= $lengths[$j];
		}

		$difference = round($difference);

		if($difference != 1) {
			$periods[$j].= "s";
		}

		return "$difference $periods[$j] 'ago' ";
	}

	function debug($array) {
		echo "<pre>";
		print_r($array);
		echo "</pre>";
	}

	function seoUrl($string) {
		//Lower case everything
		$string = strtolower($string);
		//Make alphanumeric (removes all other characters)
		$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
		//Clean up multiple dashes or whitespaces
		$string = preg_replace("/[\s-]+/", " ", $string);
		//Convert whitespaces and underscore to dash
		$string = preg_replace("/[\s_]/", "-", $string);
		return $string;
	}

	function normalUrl($string) {
		//Lower case everything
		$string = strtolower($string);
		//Make alphanumeric (removes all other characters)
		$string = preg_replace("/[\s-]/", " ", $string);
		return $string;
	}

	function sqlProject($sql, $displayResults = false)
	{
		
		$servername = "localhost";
		$username = "commissions";
		$password = "commissions";
		$dbname = "commissions";

		try {
		    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $stmt = $conn->prepare($sql); 
		    $stmt->execute();

		    // set the resulting array to associative
		    $result = $stmt->fetchAll();

		    if ($displayResults == true) {
			    echo "<pre>";
		    	print_r($result);
		    	echo "</pre>";
		    }

		    echo '<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Project Name</th>
					<th>Project Date</th>
					<th>Project Status</th>
				</tr>
			</thead>
			<tbody>';

			$count = count($result);
			$i = 0;

			while ( $count > $i) {
				echo "<tr>
					<th scrope='row'>" . $result[$i]['project_id'] . "</th>
					<td><a href='view.php/?project=" . $result[$i]['project_id'] .  "&name=" . seoUrl($result[$i]['project_name']) . "'>" . $result[$i]['project_name'] . "</a></td>
					<td>" . ago($result[$i]['project_date']) . "</td>
					<td>" . $result[$i]['project_status'] . "</td>
					</tr>
				";

				$i++;
			}

			if ($count == 0) {
				echo "<tr><th colspan='4'>No projects founds</th></tr>";
			}

			echo '

	
			</tbody>
		</table>';

		}
		catch(PDOException $e) {
		    echo "Error: " . $e->getMessage();
		}
		$conn = null;

		return $result;

	}

	function sqlComment($sql, $displayResults = false)
	{
		
		$servername = "localhost";
		$username = "commissions";
		$password = "commissions";
		$dbname = "commissions";

		try {
		    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $stmt = $conn->prepare($sql); 
		    $stmt->execute();

		    // set the resulting array to associative
		    $result = $stmt->fetchAll();

		    if ($displayResults == true) {
			    echo "<pre>";
		    	print_r($result);
		    	echo "</pre>";
		    }

		    echo '<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Comment Name</th>
					<th>Comment Date</th>
				</tr>
			</thead>
			<tbody>';

			$count = count($result);
			$i = 0;

			while ( $count > $i) {
				echo "<tr>
					<th scrope='row'>" . $result[$i]['comment_id'] . "</th>
					<td>" . $result[$i]['comment_name'] . "</td>
					<td>" . ago($result[$i]['comment_date']) . "</td>
					</tr>
				";

				$i++;
			}

			if ($count == 0) {
				echo "<tr><th colspan='4'>No comments founds</th></tr>";
			}

			echo '

	
			</tbody>
		</table>';

		}
		catch(PDOException $e) {
		    echo "Error: " . $e->getMessage();
		}
		$conn = null;

		return $result;

	}



?>
<html>
	<head>
	    <meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="<?php echo $brand; ?>">
		<meta name="author" content="me@luke.sx">

	    <title><?php echo $brand; ?></title>

		<link rel="stylesheet" type="text/css"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400|Raleway:400,300' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Nunito:400,300,700' rel='stylesheet' type='text/css'>
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


		<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>assets/css/style.css">
		<link rel="icon" type="image/ico" href="<?php echo $url; ?>assets/img/favicon.ico">


		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	</head><body>
	<!-- Fixed navbar -->
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand animate" href="<?php echo $url; ?>"><?php echo $brand; ?></a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
									</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class=''><a class='animate' href='register'>Register</a></li><li class=''><a class='animate' href='login'>Login</a></li>				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
