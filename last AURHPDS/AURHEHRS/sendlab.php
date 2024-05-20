<?php
    include "header.php";
    $conn = mysqli_connect("localhost","root","","pms");

    if(isset($_POST['submit'])){
        $res = $_POST['lab_result'];
        $id = $_POST['cid'];
        $sql = mysqli_query($conn, "UPDATE patient_history SET lab_result='$res' WHERE come_id='$id'");
        ?>
        <script>
            alert("Successful");
            window.location.href = "sendlab.php";
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
			<li><h3><a href="view_order_lab.php" class="btn btn-info">Home</a></h3></li>
            <li><h3><a href="sendlab.php" class="btn btn-info">Send Lab</a></h3></li>
			<li><h3><a href="changeL.php" class="btn btn-info">Set Account</a></h3></li>
			<li><h3><a href="logout.php" class="btn btn-danger">Logout</a></h3></li>
		</ul>
	</div>
        <div class="container">
            <div class="row">
                <div class="col-1"></div>
                <div class="col">
                    <h2 class="text-center">Send Lab Result</h2>
                    <form method="POST">
                        <label>Select Patient: </label>
                        <select name="cid" class="form-control">
                            <option>--select--</option>
                            <?php
                                $sql = mysqli_query($conn, "SELECT DISTINCT come_id,pat_name FROM patient_history join patient_info WHERE patient_history.pat_id=patient_info.pat_id AND patient_history.lab_result='' AND patient_history.lab_status=1");
                                while($row = mysqli_fetch_array($sql)){
                                    ?>
                                    <option value="<?php echo $row['0']; ?>"><?php echo $row['1']; ?></option>
                                    <?php
                                }
                            ?>
                        </select><br><br>
                        <textarea class="form-control" name="lab_result" cols="50" rows="10" placeholder="enter lab result"></textarea><br><br>
                        <input type="submit" name="submit" class="btn btn-primary">
                    </form>

                </div>
                <div class="col"></div>
            </div>
        </div>
    </body>
</html>