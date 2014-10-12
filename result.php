<html>
	<head>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
	</head>
	<body>
		<?php include 'helper.php' ?>
		<h1>Washed-Up</h1>
		<div id="info"></div>
		<iframe width="600" height="600" id="map">
		</iframe>


		<?php
			$term = $_POST['business'];
			$location = $_POST['loc'];

			$result = json_encode(query_api($term, $location));
			echo $result;
		?>

		<script type="text/javascript">
		  $(document).ready(function() {
		  		var php_result = JSON.parse(<?php echo $result; ?>);
				var base = "http://flood.firetree.net/?ll=";
			  	var lon = php_result.location.coordinate.longitude;
			  	var comma = ",";
			  	var lat = php_result.location.coordinate.latitude;
			  	var and = "&";
			  	var zequal = "z=";
			  	var z = "1";
			  	var mequal = "m=";
			  	var m = "2";
			  	var type = "type=hybrid";
			  	var url = base.concat(lat,comma,lon,and,zequal,z,and,mequal,m,and,type)
				$("#map").attr("src", url)
				$("#info").append(php_result.name);
				$("#info").append(php_result.location.cross_streets);
				$("#info").append("<img src=\"" + php_result.image_url + "\" />");
		  });
		</script>
		
	</body>
</html>
