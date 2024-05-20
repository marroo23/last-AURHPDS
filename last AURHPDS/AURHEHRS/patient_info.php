<?php
	include 'connection.php';
	if(isset($_POST['submit'])){
	    if(isset($_POST['patient_name']) && isset($_POST['age'])){
			$patient_name = $_POST['patient_name'];
			$patient_id = $_POST['patient_id'];
	        $age = $_POST['age'];
	        $sex = $_POST['sex'];
	        $martal_status = $_POST['martal_status'];
	        $address = $_POST['address'];
	        $phone = $_POST['phone'];
			$date=date('Y/m/d');
			
			$sel = mysqli_query($conn , "SELECT * FROM  patient_info WHERE patient_id='$patient_id'");
			if(mysqli_num_rows($sel)>0){
				$message="Patient id already exists.";
        			header('location: recepter.php?message='.$message);
			}else{
	            $insert_user = $conn->query("INSERT INTO `patient_info`(`pat_id`,`patient_id`, `pat_name`, `age`, `sex`, `date`, `martal_status`, `address`, `phone`) VALUES ('','$patient_id','$patient_name','$age','$sex','$date','$martal_status','$address','$phone')");
	            if($insert_user){
					$id = $conn->insert_id;
					$password = md5($patient_id);
            		$insert_user = $conn->query("INSERT INTO `login`(`no`,`username`, `password`, `role`, `phy_id`, `patient_id`) VALUES (DEFAULT,'$patient_id','$password','patient',NULL,'$id')");
					if($insert_user){
						$message="Patient Information Store Successfully";
						header('location: recepter.php?message='.$message);
					}
	            }
			}
	    }
	}
	if(isset($_POST['update'])){
	    if(isset($_POST['pat_id'])){
			$patient_id = $_POST['patient_id'];
			$pat_id = $_POST['pat_id'];
	        $patient_name = $_POST['pat_name'];
	        $age = $_POST['age'];
	        $sex = $_POST['sex'];
			$martal_status = $_POST['martal_status'];
	        $address = $_POST['address'];
	        $phone = $_POST['phone'];
	        $update_patient= $conn->query("UPDATE `patient_info` SET `patient_id`='$patient_id', `pat_name`='$patient_name',`age`='$age',`sex`='$sex', `martal_status`='$martal_status',`address`='$address',`phone`='$phone' WHERE `pat_id`='$pat_id'");
	            	if ($update_patient) {
	            		$message="Successfully Updated";
	        			header('location: recepter.php?message='.$message);
	            	}
	    }
	}
	if(isset($_POST['delete'])){
	    if(isset($_POST['pat_id'])){
			$pat_id = $_POST['pat_id'];
	        $delete_patient= $conn->query("DELETE FROM `patient_info` WHERE `pat_id`='$pat_id'");
	            	if ($delete_patient) {
	            		$message="Successfully Deleted";
	        			header('location: recepter.php?message='.$message);
	            	}
	    }
	}

?>