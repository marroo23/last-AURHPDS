<?php
	include 'connection.php';
	if(isset($_POST['submit'])){
	    if(isset($_POST['drug_name']) && isset($_POST['expired_date'])){
	        $drug_name = $_POST['drug_name'];
	        $expired_date = $_POST['expired_date'];
	        $description = $_POST['description'];
	        $cheack = $conn->query("SELECT * FROM `drug` WHERE `drug_name`='$drug_name'");
	        if($cheack->num_rows==0){
	            $insert_user = $conn->query("INSERT INTO `drug`(`drug_no`, `drug_name`, `expired_date`, `description`) VALUES ('','$drug_name','$expired_date','$description')");
	            if($insert_user){
            		$message="Drug name Store Successfully";
        			header('location: drug_store.php?message='.$message);
	            }
	        }
	        else{
	        	$message="the same name found in the List";
	        	header('location: drug_store.php?message='.$message);
	        }
	    }
	}
	if(isset($_POST['update'])){
	    if(isset($_POST['drug_name'])){
			$drug_no = $_POST['drug_no'];
	        $drug_name = $_POST['drug_name'];
	        $expired_date = $_POST['expired_date'];
	        $description = $_POST['description'];
	        $update_drug= $conn->query("UPDATE `drug` SET `drug_name`='$drug_name',`expired_date`='$expired_date',`description`='$description' WHERE `drug_no`='$drug_no'");
	            	if ($update_drug) {
	            		$message="Successfully Updated";
	        			header('location: drug_store.php?message='.$message);
	            	}
	    }
	}
	if(isset($_POST['delete'])){
	    if(isset($_POST['drug_name'])){
			$drug_no = $_POST['drug_no'];
	        $update_drug= $conn->query("DELETE FROM `drug` WHERE `drug_no`='$drug_no'");
	            	if ($update_drug) {
	            		$message="Successfully Deleted";
	        			header('location: drug_store.php?message='.$message);
	            	}
	    }
	}

?>