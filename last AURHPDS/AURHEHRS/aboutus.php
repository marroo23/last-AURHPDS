<?php
    include "header.php";
    if(isset($_GET['error'])){
        ?>
        <script>
            alert("Incorrect username or password");
        </script>
        <?php
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>AURHPDS</title>
</head>
<style type="text/css">
    body {
        /* background: url(img/pms.jpg); */
        background-size: cover;
    }
    #aboutus{
        /* background: rgba(0,0,0,0.3); */
        border: 1px solid white;
    }
</style>
<style>
		#ul{
			margin-left: 150px;
		}
		ul li{
			display: inline-block;
			padding: 0 20px 20px 20px;
		}
		a:hover{
			background: blue;
			color: white;
			padding-bottom: 10px;
		}
	</style>
<body>
    <div>
		<ul style="list-style-type: none;" id="ul">
			<li><h3><a href="index.php">Home</a></h3></li>
			<li><h3><a href="aboutus.php">About us</a></h3></li>
		</ul>
	</div>
	<div class="container">
		<div class="row">
			
        <div class="col-lg-2 col-md-1 col-sm-0" >
			</div><div class="col-lg-8 col-md-10 col-sm-12" id="aboutus">
                <h3>Welcome Gindeberet Hospital</h3>
                <p class="text-justify">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati illo expedita veniam amet magni, commodi quia distinctio sit dicta accusamus iure exercitationem saepe. Cumque nulla ut nihil consequuntur quas perferendis.</p>
                <p class="text-justify">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis nihil provident modi commodi molestias quaerat eius, ex suscipit, quidem aperiam placeat! Rerum, suscipit minus? Maiores minima provident cum vel quia!</p>
                <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas quidem quam blanditiis? Omnis sint nulla odit ex cumque perferendis rerum impedit. Quis voluptas, voluptates laborum vero ipsam rerum soluta corporis! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis nihil provident modi commodi molestias quaerat eius, ex suscipit, quidem aperiam placeat! Rerum, suscipit minus? Maiores minima provident cum vel quia!</p>
			</div>
            <div class="col-lg-2 col-md-1 col-sm-0">
			</div>
			</div>
		</div>
	</div>

</body>
</html>