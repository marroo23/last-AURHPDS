<?php
	include 'connection.php';
	if(isset($_POST['update'])){
	    if(isset($_POST['name'])){
	        $un = $_POST['name'];
	        $role=$_POST['role'];
	        $phy_id = $_POST['phy_id'];
	        $username=$_POST['username'];
			$password=$_POST['password'];
			$passwords=md5($_POST['password']);
	            $insert_user = $conn->query("UPDATE `user` SET `phy_name`='$un' WHERE `phy_id`='$phy_id'");
	            if($insert_user){
	            	$create_account= $conn->query("UPDATE `login` SET `username`='$username',`password`='$passwords',`role`='$role' WHERE `phy_id`='$phy_id'");
	            	if ($create_account) {
	            		$message="Account Updated Successfully";
	        			header('location: admin.php?message='.$message);
	            	}
	            }
	    }
	}
	if(isset($_POST['delete'])){
	    if(isset($_POST['name'])){
	        $un = $_POST['name'];
	        $phy_id = $_POST['phy_id'];
	        $username=$_POST['username'];
	        $password=$_POST['password'];
	            $insert_user = $conn->query("DELETE FROM `login` WHERE `phy_id`='$phy_id'");
	            if($insert_user){
	            	$create_account= $conn->query("DELETE FROM `login` WHERE `phy_id`='$phy_id'");
	            	if ($create_account) {
	            		$message="Account Deleted Successfully";
	        			header('location: admin.php?message='.$message);
	            	}
	            }
	    }
	}

	if(isset($_POST['updateP'])){
	    if(isset($_POST['name'])){
	        $un = $_POST['name'];
	        $role=$_POST['role'];
	        $phy_id = $_POST['pat_id'];
	        $username=$_POST['username'];
			$password=$_POST['password'];
			$passwords=md5($_POST['password']);
	            $insert_user = $conn->query("UPDATE `patient_info` SET `pat_name`='$un' WHERE `pat_id`='$phy_id'");
	            if($insert_user){
	            	$create_account= $conn->query("UPDATE `login` SET `username`='$username',`password`='$passwords',`role`='$role' WHERE `patient_id`='$phy_id'");
	            	if ($create_account) {
	            		$message="Account Updated Successfully";
	        			header('location: admin.php?message='.$message);
	            	}
	            }
	    }
	}
	if(isset($_POST['deleteP'])){
	    if(isset($_POST['name'])){
	        $phy_id = $_POST['pat_id'];
			$create_account= $conn->query("DELETE FROM `login` WHERE `patient_id`='$phy_id'");
			if ($create_account) {
				$message="Account Deleted Successfully";
				header('location: admin.php?message='.$message);
			}
	    }
	}
?>