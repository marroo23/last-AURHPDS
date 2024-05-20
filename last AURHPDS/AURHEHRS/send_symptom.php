<?php
include "header.php";
include "connection.php";
$pat_id = $_SESSION['pat_id'];

if(isset($_POST['submit'])){
    $symptom = $_POST['symptom'];
    $phy_id = $_POST['doc_id'];

    mysqli_query($conn, "INSERT INTO symptom_req VALUES(DEFAULT,'$symptom','$phy_id','$pat_id',NOW())");
    header("location: send_symptom.php?message=Successful");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Patient - PMS</title>
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
		#contents{
			display: none;
		}
	</style>
<body>
	<div>
		<ul style="list-style-type: none;" id="ul">
		<li><h3><a href="patient.php">My Health Record</a></h3></li>
            <li><h3><a href="send_symptom.php">Send Symptom</a></h3></li>
			<li><h3><a href="changePat.php">Set Account</a></h3></li>
			<li><h3><a href="logout.php">Logout</a></h3></li>
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
            <div class="col-lg-4 col-md-6 col-sm-12">
                <h2>Send Symptom Level</h2>
                <form method="POST">
                    <label for="doc_id">Select Doctor: </label>
                    <select name="doc_id" id="doc_id">
                        <option>--select--</option>
                        <?php
                            $sql = mysqli_query($conn, "SELECT user.phy_id, user.phy_name FROM login JOIN user WHERE login.role='physician' AND login.phy_id=user.phy_id");
                            while($row = mysqli_fetch_array($sql)){
                                ?>
                                <option value="<?php echo $row['0']; ?>"><?php echo $row['1']; ?></option>
                                <?php
                            }
                        ?>
                    </select><br><br>
                    <label for="symptom" id="symptom">Symptom</label>
                    <textarea name="symptom" id="symptom" class="form-control" placeholder="enter symptom level" cols="30" rows="10"></textarea>
                    <br><br>
                    <input type="submit" name="submit">
                </form>
            </div>
			<div class="col-lg-8 col-md-6 col-sm-12">
				<h3 class="form-group">Symptom Level Sent</h3>
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Doctor</th>
                        <th>Symptom</th>
                        <th>Date & Time</th>
                    </tr>
                        <?php
                            $fetch_drug = $conn->query("SELECT * FROM `symptom_req` JOIN `user` WHERE `symptom_req`.`pat_id`='{$pat_id}' AND `symptom_req`.`phy_id`=`user`.`phy_id` ORDER BY `symptom_req`.`s_id` DESC");
                            $i = 0;
                            while($row = $fetch_drug->fetch_array()){
                                ?>
                                <tr>
                                    <td><?php echo $i += 1; ?></td>
                                    <td><?php echo $row['phy_name']; ?></td>
                                    <td><?php echo $row['symptom_level']; ?></td>
                                    <td><?php echo $row['phy_id']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
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