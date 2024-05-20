<?php
    include "header.php";
    $conn = mysqli_connect("localhost","root","","pms");


?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
    </head>
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
            <li><h3><a href="view_order_lab.php" class="btn btn-info">Home</a></h3></li>
            <li><h3><a href="sendlab.php" class="btn btn-info">Send Lab</a></h3></li>
			<li><h3><a href="changeL.php" class="btn btn-info">Set Account</a></h3></li>
			<li><h3><a href="logout.php" class="btn btn-danger">Logout</a></h3></li>
		</ul>
	</div>
        <div class="container">
            <h2>Recent Lab Order</h2>
            <table class="table table-striped">
                <tr>
                    <th>Patient Name</th>
                    <th>Disease Type</th>
                    <th>Ordered Lab Type</th>
                </tr>
                <?php 
                    $pname = "";
                    $dtype = "";
                    $ltype = "";
                    
                    $sql = mysqli_query($conn , "SELECT DISTINCT come_id FROM patient_history WHERE lab_result='' AND lab_status=1");
                    while($row = mysqli_fetch_array($sql)){
                        $cid = $row[0];
                        $sqll = mysqli_query($conn, "SELECT * FROM patient_history JOIN patient_info WHERE patient_history.pat_id=patient_info.pat_id AND come_id='$cid'");
                        while($rrow = mysqli_fetch_array($sqll))
                        {
                            $pname=$rrow['pat_name'];
                            $dtype=$rrow['dis_type'];
                            $ltype.=$rrow['lab_test_type'].", ";
                        }
                        ?>
                        <tr>
                            <td><?php echo $pname; ?></td>
                            <td><?php echo $dtype; ?></td>
                            <td><?php echo $ltype; ?></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
    </body>
</html>