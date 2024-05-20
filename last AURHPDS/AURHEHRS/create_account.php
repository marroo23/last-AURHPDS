<?php
	include 'connection.php';
	if(isset($_POST['submit'])){
	    if(isset($_POST['username']) && isset($_POST['role'])){
	        $un = $_POST['username'];
	        $role = $_POST['role'];
	        $cheack = $conn->query("SELECT * FROM `user` WHERE `phy_name`='$un'");
	        if($cheack->num_rows==0){
	            $insert_user = $conn->query("INSERT INTO `user`(`phy_id`, `phy_name`) VALUES ('','$un')");
	            if($insert_user){
	            	$cheack_user = $conn->query("SELECT * FROM `user` WHERE `phy_name`='$un'");
	            	$row = $cheack_user->fetch_array();
					echo $row[0];
					$pass=md5($un);
	            	$create_account= $conn->query("INSERT INTO `login`(`no`, `username`, `password`, `role`, `phy_id`) VALUES ('','$un','$pass','$role','$row[0]')");
	            	if ($create_account) {
	            		$message="Account Created Successfully";
	        			header('location: admin.php?message='.$message);
	            	}
	            }
	        }
	        else{
	        	$message="the same name found in the List";
	        	header('location: admin.php?message='.$message);
	        }
	    }
	}

?>