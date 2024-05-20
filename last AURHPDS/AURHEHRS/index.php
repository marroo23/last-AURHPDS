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
        background: url(img/pms.png);
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
			background: blue;
			color: white;
			padding-bottom: 10px;
		}
	</style>
<body >
	<div class="container">
		<div class="row">
            <div class="col-4"></div>
            <div class="col-3"></div>
                <div class="col-lg-5 col-md-7 col-sm-11" id="frm">
                    <h4 class="form-group">Login for User Here</h4>
                    <form method="POST" action="cheack_user.php">
                        <div class="form-group">
                            <i class="fa fa-user"></i>
                            <label for="un" id="text" style="isolation: isolate;">Username</label>
                            <input type="text" id="un" name="username" required="" autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="enter your username" class="form-control">
                        </div>
                        <div class="form-group">
                            <i class="fa fa-lock"></i>
                            <label for="pwd" id="text " style="isolation: isolate;"> Password</label>
                            <input type="password" id="pwd" name="password" required="" autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="enter your password" class="form-control">
                        </div>
                        <div class="form-group col-sm-8 col-md-6 col-lg-5">
                            <input type="submit" id="smt" name="submit" class="form-control btn btn-sm btn-success" value="Sign in">
                        </div>
                    </form>
                        </div>
                </div>
		</div>
	</div>
<footer class="mainfooter" role="contentinfo">  
  <div class="footer-middle">  
    <div class="container">  
        
        <div class="row"> 
            <div class="col-4"></div> 
            <div class="col-4"></div> 
            <div class="col-3">  
            <p class="text-center"> Developed By Computer Science Student</p> <br /><a href="groupinfo.php" class="btn btn-info" title="Group">Group Member </a> 
            </div>  
        </div>  
    </div>  
  </div>  
</footer> 

</body>
</html>