<?php
    include 'header.php';
    $conn = mysqli_connect("localhost","root","","pms");

    if(isset($_POST['submit'])){
        if($_POST['pass']==$_POST['cpass']){
            $un = $_POST['username'];
            $pass = md5($_POST['pass']);
            $slq = mysqli_query($conn, "SELECT * FROM login WHERE role='Reception' AND username='$un'");
            if(mysqli_num_rows($slq)>0){
                $sql = mysqli_query($conn, "UPDATE login SET password='$pass' WHERE username='$un'");
                ?>
                <script>
                alert("Successful.");
                window.location.href = "changeR.php";
            </script>
                <?php
            }
            else{
                ?>
                <script>
                alert("Incorrect username.");
                window.location.href = "changeR.php";
            </script>
                <?php
            }
        }else{
            ?>
            <script>
                alert("Password do not match.");
                window.location.href = "changeR.php";
            </script>
            <?php
        }
        
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AURHPDS</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jquery-3.5.1.js"></script>

    <script src="js/bootstrap.min.js"></script>
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
</head>
<body>
    <div>
		<ul style="list-style-type: none;" id="ul">
        <li><h3><a href="recepter.php" class="btn btn-info">Register Patient</a></h3></li>
			<li><h3><a href="changeR.php" class="btn btn-info">Account Setting</a></h3></li>
			<li><h3><a href="logout.php" class="btn btn-danger">Logout</a></h3></li>
		</ul>
	</div>
    <div class="container" style="width: 700px;">
    <h3 class="">Change password</h3>
                <form method="POST">
                    <div class="form-group">
                        <i class="fa fa-user"></i>
                        <label for="un" id="text" style="isolation: isolate;">Current User Name</label>
                        <input type="text" id="un" name="username" required="" placeholder="enter username" class="form-control">
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <i class="fa fa-user"></i>
                                    <label for="un" id="text" style="isolation: isolate;">Password</label>
                                    <input type="password" id="un" name="pass" required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="enter password" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <i class="fa fa-user"></i>
                                    <label for="un" id="text" style="isolation: isolate;">Comfirm Password</label>
                                    <input type="password" id="un" name="cpass" required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="comfirm password" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-8 col-md-6 col-lg-5">
                        <input type="submit" id="smt" name="submit" class="form-control btn btn-sm btn-success" value="Submit">
                    </div>
                </form>
    </div>
</body>
</html>
