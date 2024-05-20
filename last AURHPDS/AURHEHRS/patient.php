<?php
include "header.php";
include "connection.php";
$pat_id = $_SESSION['pat_id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Patient - AURHPDS</title>
</head>
<style>
            body{
                background: aliceblue;
            }
            #dis, #type, #ldis, #ltype{
                display: none;
            }
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
    <li><h3><a href="patient.php" class="btn btn-info" class="btn btn-info">History</a></h3></li>
			<li><h3><a href="view_symptom_p.php" class="btn btn-info" class="btn btn-info">Appontment Date</a></h3></li>
			<li><h3><a href="logout.php" class="btn btn-danger" class="btn btn-danger">Exit</a></h3></li>
		</ul>
	</div>
	<div class="container">
			<div class="" style="width: 100%;">
		    <?php
		        if (isset($_GET['message'])) {
                    ?>
		        <br>

		        <?php 
		          echo "<h6>". $_GET['message']."</h6>";

		        }
		        ?>
         </div>
		<div class="row">
			<div class="col-lg-8 col-md-10 col-sm-12">
				<div id="contents">

				</div>
				<h3 class="form-group">Medical Record</h3>
                <table class="table">
                    <tr>
                        <th>SNo</th>
                        <th>Patient Name</th>
                        <th>Disease Type</th>
                        <th>Lab Test Type</th>
                        <th>Lab Result</th>
                        <th>Doctor Name</th>
                    </tr>
                        <?php
                            $fetch_drug = $conn->query("SELECT * FROM `patient_history` JOIN `user` WHERE `patient_history`.`pat_id`='{$pat_id}' AND `patient_history`.`phy_id`=`user`.`phy_id` ORDER BY `patient_history`.`no` DESC");
                            $i = 0;
                            while($row = $fetch_drug->fetch_array()){
                                ?>
                                <tr>
                                    <td><?php echo $i += 1; ?></td>
                                    <td><?php echo $_SESSION['pat_name']; ?></td>
                                    <td><?php echo $row['dis_type']; ?></td>
                                    <td><?php echo $row['lab_test_type']; ?></td>
                                    <td><?php echo $row['lab_result']; ?></td>
                                    <td><?php echo $row['phy_name']; ?></td>
                                </tr>
                                <?php
                            }
                        ?>
                </table>
			</div>
		</div>
	</div>
</body>
</html>