<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title>Results</title>
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
         <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    </head>
 
    <body>
    	<?php include 'helper.php' ?>
        <aside class="top_banner">
            <div class="text-vertical-center">
                <p class="tagline">INTERACTIVE MAP</p>
                <p class="heading3">Select a future time and check out the sea level. </p>
            </div>
        </aside>

        <?php
            $term = $_POST['business'];
            $location = $_POST['loc'];

            $result = json_encode(query_api($term, $location));
        ?>

        <script type="text/javascript">
          $(document).ready(function() {
                

	            make_map(10);
                $("#info").append(php_result.name);
                $("#info").append(php_result.location.cross_streets);
                $("#info").append("<img src=\"" + php_result.image_url + "\" />");
          });
          function make_map(meter) {
	                var php_result = JSON.parse(<?php echo $result; ?>);
	                var base = "http://flood.firetree.net/?ll=";
	                if(php_result.location.coordinate !== undefined) {
	                	var lon = php_result.location.coordinate.longitude;
		                var comma = ",";
		                var lat = php_result.location.coordinate.latitude;
		                var and = "&";
		                var zequal = "z=";
		                var z = "1";
		                var mequal = "m=";
		                var m = "" + meter;
		                var type = "type=hybrid";
		                var url = base.concat(lat,comma,lon,and,zequal,z,and,mequal,m,and,type);
		                $("#map").attr("src", url);
	                } else {
	                	alert("This business has opted out of making coordinate information available");
		                var lon = "-122.3331";
		                var comma = ",";
		                var lat = "47.6097";
		                var and = "&";
		                var zequal = "z=";
		                var z = "3";
		                var mequal = "m=";
		                var m = "" + meter;
		                var type = "type=hybrid";
		                var url = base.concat(lat,comma,lon,and,zequal,z,and,mequal,m,and,type);
		                $("#map").attr("src", url);

	                }

	            }
        </script>


    	<!-- dropdown menu -->

	    <div class="dropdown">
	        <button class="btn btn-default dropdown-toggle dropdown-styling" type="button" id="dropdownMenu1" data-toggle="dropdown">
	            Select a future time below
	            <span class="caret"></span>
	        </button>
	        <ul class="dropdown-menu dropdown-styling2" role="menu" aria-labelledby="dropdownMenu1">
	            <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:make_map(0);">50 years</a></li>
	            <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:make_map(1);">100 years</a></li>
	            <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:make_map(2);">200 years</a></li>
	            <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:make_map(4);">300 years</a></li>
	            <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:make_map(9);">400 years</a></li>
	            <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:make_map(20);">500 years</a></li>

	        </ul>
	    </div>

        <iframe class="results-map" width="1200" height="700" id="map">
        </iframe>

         <aside class="callout">
	            
	            <div class="causes" style="margin-left:20px; margin-right: 20px; padding:50px;">
	            <p style="font-size: 35px; font-weight: bold;" class="heading3">Causes of Rising Sea Levels</p>
		        <p style="font-size: 25px;">Several things have contributed to the rising sea, but the two most important have to do with climate change. Thanks to heat-trapping greenhouse gases, especially carbon dioxide (CO2) pumped into the atmosphere by the burning of fossil fuels, global temperatures are more than one degree F higher than they were 100 years ago. Since water expands as it warms, the oceans take up more space than they once did, and the only direction they can expand are up and out. </p>
		        <p style="font-size: 25px;"> Warmer temperatures also make glaciers and land-based ice sheets melt, and make tidewater glaciers — glaciers that reach the ocean — slide more rapidly into the sea and calve more icebergs. In both cases, water that had been trapped on land enters the ocean, in either solid or liquid form, making sea level rise even more. </p>
				<br>
				<br>
				<br>
				<p style="font-size: 15px;"> - See more at: http://sealevel.climatecentral.org/basics/causes#sthash.JLtYCdpK.dpuf</p>
				<p style="font-size: 15px;">Data leveraged from Alex Tingle </p>
			 	<p style="font-size: 15px;">Causes cited from http://sealevel.climatecentral.org/</p>
			</div>
        </aside>
    </body>
</html>











