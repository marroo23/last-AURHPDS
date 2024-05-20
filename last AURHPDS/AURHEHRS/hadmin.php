<?php
    include "header.php";
    include 'connection.php';   

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
            <li><h3><a href="hadmin.php" class="btn btn-info">Report</a></h3></li>
            <li><h3><a href="drug.php" class="btn btn-info">Drug</a></h3></li>
			<li><h3><a href="changeHadmin.php" class="btn btn-info">Change Account</a></h3></li>
			<li><h3><a href="logout.php" class="btn btn-danger">Logout</a></h3></li>
		</ul>
	</div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 class="text-center">Report by Patient</h3>
                    <table class="table table-striped">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                        </tr>
                            <?php
                            $count=1;
                                    $fetch_share_holder = $conn->query("SELECT * FROM `patient_info` WHERE 1");
                                    while($row = $fetch_share_holder->fetch_array()){
                                        ?>
                                            <td><?php echo $count++; ?></td>
                                            <td><?php echo $row['pat_name']; ?></td>
                                        <?php
                                        echo "</tr>";
                                    }
                            ?>
                            <?php
                                    $fetch_share_holder = $conn->query("SELECT count(`pat_name`) FROM `patient_info` WHERE 1");
                                    while($row = $fetch_share_holder->fetch_array()){
                                        ?>
                                            <td style="background-color: black; color: white;" ><?php echo "No of Patient: "; ?></td>
                                            <td style="background-color: black; color: white;"><?php echo $row[0]; ?></td>
                                        <?php
                                        echo "</tr>";
                                    }
                            ?>
                    </table>
                </div>
                <div class="col">
                    <h3 class="text-center">Report by Gender</h3>
                    <table class="table table-striped">
                        <tr>
                            <th>Gender</th>
                            <th></th>
                            
                            
                        </tr>
                            <?php
                            $count=1;
                            $fetch_share_holder = $conn->query("SELECT count(`sex`) FROM `patient_info` WHERE sex='Female'");
                            while($row = $fetch_share_holder->fetch_array()){
                                ?>
                                    <th>Male</th>
                                    <td style="background-color: black; color: white;"><?php echo $row[0]; ?></td>
                                <?php
                                echo "</tr>";
                            }
                            $fetch_share_holder = $conn->query("SELECT count(`sex`) FROM `patient_info` WHERE sex='Male'");
                            while($row = $fetch_share_holder->fetch_array()){
                                ?>
                                    <th>Female</th>
                                    <td style="background-color: black; color: white;"><?php echo $row[0]; ?></td>
                                <?php
                                echo "</tr>";
                            }
                            ?>
                            <?php
                                    $fetch_share_holder = $conn->query("SELECT count(`sex`) FROM `patient_info` WHERE 1");
                                    while($row = $fetch_share_holder->fetch_array()){
                                        ?>
                                            <td style="background-color: black; color: white;" ><?php echo "Total: "; ?></td>
                                            <td style="background-color: black; color: white;"><?php echo $row[0]; ?></td>
                                        <?php
                                        echo "</tr>";
                                    }
                            ?>
                    </table>

                </div>
            </div>
        </div>
    </body>
</html>