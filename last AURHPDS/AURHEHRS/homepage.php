<?php
    error_reporting(0);
    include "header.php";
    include 'connection.php'; 
    if(isset($_GET['error'])){
        ?>
        <script>
            alert("Incorrect username or password");
        </script>
        <?php
    }
    if(isset($_POST['patient'])){
        $id = $_POST['patient_id'];
        $diff = 0;
        $sel = mysqli_query($conn, "SELECT * FROM patient_info WHERE patient_id='$id'");
        $row = mysqli_fetch_array($sel);
        $pat_id = $row['pat_id'];
        if($pat_id==0){
            ?>
            <script>
                alert("Incorrect id");
            </script>
            <?php
        }else{
            $_SESSION['pat_id'] = $row['pat_id'];
            header("location: patient.php");
        }

    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>AURHPDS</title>
</head>
<style type="text/css">
    body {
        background-size: cover;
    }
    #frm{
        background: rgba(0,0,0,0.5);
        border: 1px solid white;
        color: white;
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
			color: white;
			padding-bottom: 10px;
		}
	</style>
<body >
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/aa.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
            <a href="index.php" class="btn btn-danger btn-lg">Login</a>
        </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/bb.jpg" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
            <a href="index.php" class="btn btn-danger btn-lg">Login</a>
        </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/cc.jpeg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
            <a href="index.php" class="btn btn-danger btn-lg">Login</a>
        </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<footer class="mainfooter" role="contentinfo">  
  <div class="footer-middle">  
    <div class="container">  
        
        <div class="row">  
            <div class="col">  
            <p class="text-center"> © Copyright 2024 - IT Student(<a href="groupinfo.php" class="icoFacebook" title="Group">Group Member </a> ).  All rights reserved. </p>
            </div>  
        </div>  
    </div>  
  </div>  
</footer> 

</body>
</html>