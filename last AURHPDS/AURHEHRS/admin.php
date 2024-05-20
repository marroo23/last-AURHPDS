<?php
include "header.php";
include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>AURHPDS</title>
	<style>
		body{
			background: aliceblue;
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
</head>
<body>
	<div>
		<ul style="list-style-type: none;" id="ul">
			<li><h3><a href="admin.php" class="btn btn-info">Manage Account</a></h3></li>
			<li><h3><a href="changeA.php" class="btn btn-info">Change Password</a></h3></li>
			<li><h3><a href="logout.php" class="btn btn-danger">Logout</a></h3></li>
		</ul>
	</div>
	<div class="container">
			<div class="" style="width: 100%;">
		    <?php
		        if (isset($_GET['message'])) {?>
					<br>
					<?php 
					echo "<h6>". $_GET['message']."</h6>";

				}

		    ?>
         </div>
		<div class="row">
			<div class="col-lg-4 col-md-2 col-sm-12">
				<h3 class="">Create Account</h3>
                <form method="POST" action="create_account.php">
                    <div class="form-group">
                        <i class="fa fa-user"></i>
                        <label for="un" id="text" style="isolation: isolate;">User Name</label>
                        <input type="text" id="un" name="username" required="" autocomplete="off" placeholder="enter your user full name" class="form-control">
                    </div>
                    <div class="form-group">
                        <i class="fa fa-lock"></i>
                        <label for="pwd" id="text " style="isolation: isolate;"> User Type</label>
                        <select class="form-control" name="role">
                        	<option class="form-control">Select User</option>
                        	<option value="physician">Physician</option>
                        	<option value="lab technician">Lab Technician</option>
                        	<option value="Reception">Reception</option>
                        	<option value="drug_store">Pharmacist</option>
                        </select>
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
							<th>Name</th>
							<th>Username</th>
							<th>Password</th>
							<th>Type</th>
							<th colspan="2">Control</th>
						</tr>
							<?php
	                        		$fetch_user = $conn->query("SELECT * FROM `user` JOIN `login` WHERE `user`.`phy_id`=`login`.`phy_id` AND `login`.`role`!='admin' AND `login`.`role`!='patient'");
									while($row = $fetch_user->fetch_array()){
										?>
										<form action="manage_account.php" method="POST">
											<input type="hidden" name="phy_id" value="<?php echo $row['phy_id']; ?>">
											<td><input class="form-control" type="text" name="name" value="<?php echo $row['phy_name']; ?>"></td>
											<td><input class="form-control" type="text" name="username" value="<?php echo $row['username']; ?>"></td>
											<td><input class="form-control" type="text" name="password" value="<?php echo $row['password']; ?>"></td>
											<td>
												<select class="form-control" name="role">
													<?php
													$querysuser = $conn->query("SELECT * FROM `login` WHERE `phy_id`='".$row['phy_id']."'");
													$rowss= $querysuser->fetch_array();
													?>
													<option value"<?php echo $rowss[3]; ?>" class="form-control"><?php echo $rowss[3]; ?></option>
													<?php
														$querys = $conn->query("SELECT DISTINCT `role` FROM `login` WHERE `role`!='admin'");
														while($rows = $querys->fetch_array()){
															?><option value"<?php echo $rows['role']; ?>" class="form-control"><?php echo $rows['role']; ?></option><?php
														}
													?>
                        						</select>
											</td>
											<td><input class="form-control btn-success" type="submit" value="Update" name="update"></td>
											<td><input class="form-control btn-danger" type="submit" value="Delete" name="delete"></td>
										</form>
										<?php
										echo "</tr>";
									}
									$fetch_user = $conn->query("SELECT * FROM `patient_info` JOIN `login` WHERE `patient_info`.`pat_id`=`login`.`patient_id` AND `login`.`role`='patient'");
									while($row = $fetch_user->fetch_array()){
										?>
										<form action="manage_account.php" method="POST">
											<input type="hidden" name="pat_id" value="<?php echo $row['pat_id']; ?>">
											<td><input class="form-control" type="text" name="name" value="<?php echo $row['pat_name']; ?>"></td>
											<td><input class="form-control" type="text" name="username" value="<?php echo $row['username']; ?>"></td>
											<td><input class="form-control" type="text" name="password" value="<?php echo $row['password']; ?>"></td>
											<td>
												<select class="form-control" name="role">
													<?php
													$querysuser = $conn->query("SELECT * FROM `login` WHERE `patient_id`='".$row['pat_id']."'");
													$rowss= $querysuser->fetch_array();
													?>
													<option value"<?php echo $rowss[3]; ?>" class="form-control"><?php echo $rowss[3]; ?></option>
													<?php
														$querys = $conn->query("SELECT DISTINCT `role` FROM `login` WHERE `role`='patient'");
														while($rows = $querys->fetch_array()){
															?><option value"<?php echo $rows['role']; ?>" class="form-control"><?php echo $rows['role']; ?></option><?php
														}
													?>
                        						</select>
											</td>
											<td><input class="form-control btn-success" type="submit" value="Update" name="updateP"></td>
											<td><input class="form-control btn-danger" type="submit" value="Delete" name="deleteP"></td>
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
