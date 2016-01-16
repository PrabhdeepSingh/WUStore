<?php
session_start();
require("../includes/config.php");
require("../includes/functions.php");

if($application["mode"] == DEVELOPMENT)
{
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
}

if(!isset($_GET["server"]) && count($serverRMIConfigs) == 1)
{
	header("Location: ./?server=1");
	die();
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $application["siteTitle"]; ?> - WUStore</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <script src="<?php echo $application["rootPath"]; ?>/assets/vendors/jquery-2.2.0/jquery-2.2.0.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo $application["rootPath"]; ?>/assets/vendors/bootstrap-3.3.6-dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $application["rootPath"]; ?>/assets/vendors/font-awesome-4.5.0/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $application["rootPath"]; ?>/assets/css/style.css">

    <link rel="stylesheet" href="<?php echo $application["rootPath"]; ?>/assets/vendors/sweetalert-dist/sweetalert.css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	
		<div class="container">
		  <div class="row">
		    <div class="absolute-center is-responsive">
		      <div class="logo-container"><a href="#"><?php echo $application["siteTitle"]; ?> <b>WUStore</b></a></div>

		      <?php
		      if(isset($_GET["server"]))
		      {
	      	?>
			      <div class="text-center font-20px">Please enter your in-game player name</div>
			      <div class="col-sm-12 col-md-10 col-md-offset-1">
			        <form id="formPlayerSearch">
			          <div class="form-group input-group">
			            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			            <input class="form-control height-50px" type="text" name="playerName" id="playerName" placeholder="Player name"/>
			            <span class="input-group-btn"><button class="btn btn-primary height-50px">Continue</button></span>
			          </div>
			        </form>        
			      </div>

			      <input type="hidden" value="<?php echo $_GET["server"]; ?>" id="serverID" />

			      <script>
				      $(document).ready(function() {
				      	$('#formPlayerSearch').submit(function(e) {
				      		e.preventDefault();

				      		if($('#serverID').val() != '' && $('#playerName').val() != '') {

				      			// Will be adding ajax call here to check if the player exists / online.

				      			window.location.href = '../?server=' + $('#serverID').val() + '&player=' + $('#playerName').val();
				      		}
				      		else {
				      			swal('Error', 'You need to enter a player name before you can continue!', 'error');
				      		}

				      	})
				      });
			      </script>
		      <?php
		      }
		      else
		      {
		      ?>
						<div class="text-center font-20px">Please pick a server</div>
			      <div class="col-sm-12 col-md-10 col-md-offset-1">
			        <form id="formServerPicker">
			          <div class="form-group input-group">
			          	<select class="form-control height-50px" id="serverID">
										<option value="">Pick a server...</option>
										<?php
											for($i = 0; $i < count($serverRMIConfigs); $i++)
											{
												// Add 1 because (some) humans don't start counting at 0.
												$serverID = $i + 1;
												echo '<option value="' . $serverID . '">' . $serverRMIConfigs[$i]["serverName"] . '</option>';
											}
										?>
			          	</select>
			            <span class="input-group-btn"><button type="submit" class="btn btn-primary height-50px">Continue</button></span>
			          </div>
			        </form>        
			      </div>

			      <script>
				      $(document).ready(function() {
				      	$('#formServerPicker').submit(function(e) {
				      		e.preventDefault();

				      		if($('#serverID').val() != '') {

				      			// Will be adding ajax call here to check if the server is up / running before moving on.

				      			window.location.href = './?server=' + $('#serverID').val();
				      		}
				      		else {
				      			swal('Error', 'You need to pick a server before you can continue!', 'error');
				      		}

				      	})
				      });
			      </script>
		      <?php
		      }	
		      ?>
		    </div>    
		  </div>
		</div>

  </body>

  <script src="<?php echo $application["rootPath"]; ?>/assets/vendors/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
  <script src="<?php echo $application["rootPath"]; ?>/assets/js/app.js"></script>
  <script src="<?php echo $application["rootPath"]; ?>/assets/vendors/sweetalert-dist/sweetalert.min.js"></script>

</html>