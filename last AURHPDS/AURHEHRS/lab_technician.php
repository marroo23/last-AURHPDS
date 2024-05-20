<?php
include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>AURHPDS</title>
</head>
<body>
	<div class="container">
			<div class="" style="width: 100%;">
		    <?php
		        if (isset($_GET['message'])) {?>
		        <br>

		        <section class="alert alert-success">
         		<span onclick="this.parentElement.style.display='none'" class="closebtn text-success" style="float: right;"><button type="button" class="button btn" style="font-weight: bolder;">&times;</button></span>
		        <?php 
		          echo "<h6>". $_GET['message']."</h6>";

		        }

		        ?>
		    </section>
        
         </div>
		<div class="row">
			<div class="col-lg-4 col-md-2 col-sm-12">
				<h3 class="">Create Account</h3>
			</div>
			<div class="col-lg-8 col-md-10 col-sm-12">
				<h3 class="">Create Account</h3>
			</div>
		</div>
	</div>
</body>
</html>