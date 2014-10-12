<html>
	<head>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	</head>
	<body>
		<?php include 'helper.php' ?>
		<h1>Washed-Up</h1>
		<div id="info"></div>

		<div class="dropdown">
		    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
		        Dropdown
		        <span class="caret"></span>
		    </button>
		    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
		        <li role="presentation"><a role="menuitem" tabindex="1" click="make_map(0)">Action</a></li>
		        <li role="presentation"><a role="menuitem" tabindex="2" click="make_map(1)">Another action</a></li>
		        <li role="presentation"><a role="menuitem" tabindex="3" click="make_map(2)">Something else here</a></li>
		        <li role="presentation"><a role="menuitem" tabindex="4" click="make_map(4)">Separated link</a></li>
		        <li role="presentation"><a role="menuitem" tabindex="4" click="make_map(9)">Separated link</a></li>
		        <li role="presentation"><a role="menuitem" tabindex="4" click="make_map(20)">Separated link</a></li>
		    </ul>
		</div>

		<iframe width="600" height="600" id="map">
		</iframe>

		<?php
			$term = $_POST['business'];
			$location = $_POST['loc'];

			$result = json_encode(query_api($term, $location));
		?>

		<script type="text/javascript">
		  $(document).ready(function() {
		  	function make_map(meter) {
		  		var php_result = JSON.parse(<?php echo $result; ?>);
				var base = "http://flood.firetree.net/?ll=";
			  	var lon = php_result.location.coordinate.longitude;
			  	var comma = ",";
			  	var lat = php_result.location.coordinate.latitude;
			  	var and = "&";
			  	var zequal = "z=";
			  	var z = "1";
			  	var mequal = "m=";
			  	var m = "" + meter;
			  	var type = "type=hybrid";
			  	var url = base.concat(lat,comma,lon,and,zequal,z,and,mequal,meter,and,type);
				$("#map").attr("src", url);
			}

			make_map(10);
			$("#info").append(php_result.name);
			$("#info").append(php_result.location.cross_streets);
			$("#info").append("<img src=\"" + php_result.image_url + "\" />");
		  });
		</script>
		
	</body>
</html>
