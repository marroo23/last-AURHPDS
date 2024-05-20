<?php
@session_start();

    include "header.php";
    $conn = mysqli_connect("localhost","root","","pms");

    if(isset($_POST['submit'])){
        $id = $_POST['cid'];
        $reason = $_POST['reason'];
        $appt_date = $_POST['appt_date'];
        $Did=$_SESSION['phy_id'];

            mysqli_query($conn, "INSERT INTO symptom_req VALUES(default,'$reason','$Did','$id','$appt_date')");

        ?>
        <script>
            alert("Successful");
            window.location.href = "appontment.php";
        </script>
        <?php
    }

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
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
            <li><h3><a href="register_pmh.php" class="btn btn-info">Prescription</a></h3></li>
            <li><h3><a href="view_lab_result.php" class="btn btn-info">View Lab Result</a></h3></li>
            <li><h3><a href="order_drug.php" class="btn btn-info">Order Drug</a></h3></li>
            <li><h3><a href="appontment.php" class="btn btn-info">Appontment</a></h3></li>
            <li><h3><a href="view_symptom.php" class="btn btn-info">View Appontment Request</a></h3></li>
			<li><h3><a href="changeD.php" class="btn btn-info">Account Setting</a></h3></li>
			<li><h3><a href="logout.php" class="btn btn-danger">Logout</a></h3></li>
		</ul>
	</div>
        <div class="container">
            <div class="row">
                <div class="col-2"></div>
                <div class="col">
                    <h2>Appontment</h2>
                    <form method="POST">
                        <label>Select Patient: </label>
                        <select name="cid" class="form-control">
                            <option>--select--</option>
                            <?php
                                $sql = mysqli_query($conn, "SELECT * FROM `patient_info`");
                                while($row = mysqli_fetch_array($sql)){
                                    ?>
                                    <option value="<?php echo $row['0']; ?>"><?php echo $row['2']; ?></option>
                                    <?php
                                }
                            ?>
                        </select><br><br>
                        <label for="dis" id="ldis">Reason</label>
                        <textarea class="form-control" name="reason" cols="50" rows="5" placeholder="write disease type"></textarea><br>
                        <input type="date" name="appt_date" class="form-control"><br />

                        <input type="submit" name="submit" class="btn btn-primary">
                    </form>

                </div>
                <div class="col"></div>
            </div>
        </div>
    </body>
</html>