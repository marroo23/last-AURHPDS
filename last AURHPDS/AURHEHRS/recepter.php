<?php
include "header.php";
include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>AURHPDS</title>
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
			<li><h3><a href="recepter.php" class="btn btn-info">Register Patient</a></h3></li>
			<li><h3><a href="changeR.php" class="btn btn-info">Account Setting</a></h3></li>
			<li><h3><a href="logout.php" class="btn btn-danger">Logout</a></h3></li>
		</ul>
	</div>
	<div class="container">
			<div class="" style="width: 100%;">
		    <?php
		        if (isset($_GET['message'])) {?>
		        <br>

		        <section class="alert alert-success">
         		<span onclick="this.parentElement.style.display='none'" class="closebtn text-success" style="float: right;"><button type="button" class="button btn" style="font-weight: bolder;">&times;</button></span>
		        <?php 
		          echo "<h6>". $_GET['message']."</h6>";

		        }

		        ?>
		    </section>
        
         </div>
		<div class="row">
			<div class="col-lg-4 col-md-2 col-sm-12">
				<h3 class="">Patient Information</h3>
				<form method="POST" action="patient_info.php">
				<div class="form-group">
                        <i class="fa fa-user"></i>
                        <label for="un" id="text" style="isolation: isolate;">Patient ID</label>
                        <input type="text" id="un" name="patient_id" required="" autocomplete="off" placeholder="enter patient id here..." class="form-control">
                    </div>
					<div class="form-group">
                        <i class="fa fa-user"></i>
                        <label for="un" id="text" style="isolation: isolate;">Patient Name</label>
                        <input type="text" id="un" name="patient_name" required="" autocomplete="off" placeholder="enter patient name here..." class="form-control">
                    </div>
                    <div class="form-group">
						<i class="fa fa-day"></i>
                        <label for="un" id="text" style="isolation: isolate;">Age</label>
                        <input type="number" min="0" name="age" required="" autocomplete="off" class="form-control" placeholder="eg: 10">
                    </div>
                    <div class="form-group">
                        <i class="fa fa-day"></i>
                        <label for="un" id="text" style="isolation: isolate;">Sex</label>
                        <select class="form-control" name="sex">
                        	<option value="Male">Male</option>
                        	<option value="Female">Female</option>
                        </select>
                    </div>
					<div class="form-group">
						<i class="fa fa-user"></i>
						<label for="un" id="text" style="isolation: isolate;">Martal Status</label>
						<input type="text" id="un" name="martal_status" required="" autocomplete="off" placeholder="enter Martal Status..." class="form-control">
					</div>
					<div class="form-group">
						<i class="fa fa-user"></i>
						<label for="un" id="text" style="isolation: isolate;">Address</label>
						<input type="text" id="un" name="address" required="" autocomplete="off" placeholder="enter Address..." class="form-control">
					</div>
					<div class="form-group">
						<i class="fa fa-user"></i>
						<label for="un" id="text" style="isolation: isolate;">Phone</label>
						<input type="number" id="un" name="phone" required="" autocomplete="off" placeholder="enter Phone..." class="form-control">
					</div>
                    <div class="form-group col-sm-8 col-md-6 col-lg-5">
						<input type="submit" id="smt" name="submit" class="form-control btn btn-sm btn-success" value="Submit">
                    </div>
                </form>
			</div>
			<div class="col-lg-8 col-md-10 col-sm-12">
				<h3 class="form-group">Manage</h3>
				<table class="table">
						<tr>
							<th>Patient Id</th>
							<th>Patient Name</th>
							<th>Age</th>
							<th>Sex</th>
							<th>Martal Status</th>
							<th>Address</th>
							<th>Phone</th>
							<th colspan="2">Control</th>
						</tr>
							<?php
	                        		$fetch_patient = $conn->query("SELECT * FROM `patient_info`");
									while($row = $fetch_patient->fetch_array()){
										?>
										<form action="patient_info.php" method="POST">
											<input type="hidden" name="pat_id" value="<?php echo $row['pat_id']; ?>">
											<td><input class="form-control" type="text" name="patient_id" value="<?php echo $row['patient_id']; ?>"></td>
											<td><input class="form-control" type="text" name="pat_name" value="<?php echo $row['pat_name']; ?>"></td>
											<td><input class="form-control" type="number" name="age" value="<?php echo $row['age']; ?>"></td>
											<td><select class="form-control" name="sex">
												<?php
												if ($row['sex']=="Male") {
													?>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
													<?php
												}else if ($row['sex']=="Female") {
													?>
													<option value="Female">Female</option>
													<option value="Male">Male</option>
													<?php
												}
												?>
												<option value=""></option>
											</select></td>
											<td><input class="form-control" type="text" name="martal_status" value="<?php echo $row['martal_status']; ?>"></td>
											<td><input class="form-control" type="text" name="address" value="<?php echo $row['address']; ?>"></td>
											<td><input class="form-control" type="number" name="phone" value="<?php echo $row['phone']; ?>"></td>
											<td><input class="form-control btn-success" type="submit" value="Update" name="update" ></td>
											<td><input class="form-control btn-danger" type="submit" value="Delete" name="delete"></td>
										</form>
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