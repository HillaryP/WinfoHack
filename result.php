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
        <aside class="banner">
            <div class="text-vertical-center">
                <p class="tagline">INTERACTIVE MAP</p>
                <p class="heading3">Select a future time and check out the sea level. </p>
            </div>
        </aside>

    <!-- dropdown menu -->

    <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
            Dropdown
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu dropdown-styling" role="menu" aria-labelledby="dropdownMenu1">
            <li role="presentation"><a role="menuitem" tabindex="1" href="#">50 years</a></li>
            <li role="presentation"><a role="menuitem" tabindex="2" href="#">100 years</a></li>
            <li role="presentation"><a role="menuitem" tabindex="3" href="#">200 years</a></li>
            <li role="presentation"><a role="menuitem" tabindex="3" href="#">500 years</a></li>
        </ul>
    </div>


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


    <div class="container-fluid">
      <div class="row-fluid">
        <!-- column left & map --> 
        <div class="span10">
                <iframe class="results-map" width="600" height="600" id="map">
                </iframe>
        </div>


        <!-- column right --> 
    <div class="span2">
            <!-- tip side -->
            <div class="tips">
                <p class="tagline">Prevention Tips</p>
            </div>
            <!-- tip end--> 
        </div>
      </div>

    </div>


    </body>
</html>











