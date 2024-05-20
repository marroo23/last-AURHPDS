<?php
    include "header.php";
    $conn = mysqli_connect("localhost","root","","pms");

    if(isset($_POST['submit'])){
        $id = $_POST['cid'];
        $diff = 0;
        $sel = mysqli_query($conn, "SELECT * FROM patient_history WHERE come_id='$id' LIMIT 1");
        $row = mysqli_fetch_array($sel);
        $no = $row['no'];
        $dis_type = $row['dis_type'];
        $lab_test_type = $row['lab_test_type'];
        $lab_result = $row['lab_result'];
        $pat_id = $row['pat_id'];
        
        $delData = mysqli_query($conn, "DELETE FROM patient_history WHERE come_id='$id'");

        for($i = 0; $i<sizeof($_POST['drug_id']); $i++){
            $val = $_POST['drug_id'][$i];
            mysqli_query($conn, "INSERT INTO patient_history VALUES('$no','$dis_type','$lab_test_type','$lab_result','$pat_id','$val',2,1,'$id',0)");
        }
        ?>
        <script>
            alert("Successful");
            window.location.href = "order_drug.php";
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
                    <h2>Order Drug</h2>
                    <form method="POST">
                        <label>Select Patient: </label>
                        <select name="cid" class="form-control">
                            <option>--select--</option>
                            <?php
                                $sql = mysqli_query($conn, "SELECT DISTINCT come_id,pat_name FROM patient_history join patient_info WHERE patient_history.pat_id=patient_info.pat_id AND patient_history.lab_result!='' AND patient_history.lab_status=1 AND patient_history.drug_id IS NULL");
                                while($row = mysqli_fetch_array($sql)){
                                    ?>
                                    <option value="<?php echo $row['0']; ?>"><?php echo $row['1']; ?></option>
                                    <?php
                                }
                            ?>
                        </select><br><br>
                        <label for="dis" id="ldis">Order Drug</label>
                        <select name="drug_id[]" id="dis" style="width: 300px;" multiple="multiple" class="form-control">
                            <option>----select-----</option>
                            <?php
                                $sql = mysqli_query($conn, "SELECT * FROM drug");
                                while($row = mysqli_fetch_array($sql)){
                                    ?>
                                    <option value="<?php echo $row['drug_no']; ?>"><?php echo $row['drug_name']; ?></option>
                                    <?php
                                }
                            ?>
                        </select><br><br>
                        <input type="submit" name="submit" class="btn btn-primary">
                    </form>

                </div>
                <div class="col"></div>
            </div>
        </div>
    </body>
</html>