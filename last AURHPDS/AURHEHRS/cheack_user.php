<?php
include 'connection.php'; 
if(isset($_POST['submit'])){
    if(isset($_POST['username']) && isset($_POST['password'])){
        $un = $_POST['username'];
        $ps = md5($_POST['password']);
        $login = $conn->query("SELECT * FROM `login` JOIN `user` WHERE `login`.`username`='$un' AND `login`.`password`='$ps' AND `login`.`role`='physician' AND `login`.`phy_id`=`user`.`phy_id`");
        if($login->num_rows>0){
            while($row = $login->fetch_array()){
            $_SESSION['phy_id'] = $row['phy_id'];
            $_SESSION['phy_name'] = $row['phy_name'];
            $_SESSION['logged_in'] = true;
            $_SESSION['user_type'] = "Doctor";
            header("location: register_pmh.php");
            }
        }else{
            $login = $conn->query("SELECT * FROM `login` JOIN `user` WHERE `login`.`username`='$un' AND `login`.`password`='$ps' AND `login`.`role`='lab technician' AND `login`.`phy_id`=`user`.`phy_id`");
            if($login->num_rows>0){
                while($row = $login->fetch_array()){
                $_SESSION['phy_id'] = $row['phy_id'];
                $_SESSION['phy_name'] = $row['phy_name'];
                $_SESSION['logged_in'] = true;
                $_SESSION['user_type'] = "Lab Assistance";
                header("location: view_order_lab.php");
                }
            }else{
            $login = $conn->query("SELECT * FROM `login` JOIN `user` WHERE `login`.`username`='$un' AND `login`.`password`='$ps' AND `login`.`role`='Reception' AND `login`.`phy_id`=`user`.`phy_id`");
                if($login->num_rows>0){
                    while($row = $login->fetch_array()){
                    $_SESSION['phy_id'] = $row['phy_id'];
                    $_SESSION['phy_name'] = $row['phy_name'];
                    $_SESSION['logged_in'] = true;
                    $_SESSION['user_type'] = "Recepter";
                    header("location: recepter.php");
                    }
                }else{
                    $login = $conn->query("SELECT * FROM `login` JOIN `user` WHERE `login`.`username`='$un' AND `login`.`password`='$ps' AND `login`.`role`='drug_store' AND `login`.`phy_id`=`user`.`phy_id`");
                        if($login->num_rows>0){
                            while($row = $login->fetch_array()){
                            $_SESSION['phy_id'] = $row['phy_id'];
                            $_SESSION['phy_name'] = $row['phy_name'];
                            $_SESSION['logged_in'] = true;
                            $_SESSION['user_type'] = "Pharmacist";
                            header("location: drug_store.php");
                            }
                        }else{
                            $login = $conn->query("SELECT * FROM `login` JOIN `user` WHERE `login`.`username`='$un' AND `login`.`password`='$ps' AND `login`.`role`='admin' AND `login`.`phy_id`=`user`.`phy_id`");
                            if($login->num_rows>0){
                                while($row = $login->fetch_array()){
                                $_SESSION['phy_id'] = $row['phy_id'];
                                $_SESSION['phy_name'] = $row['phy_name'];
                                $_SESSION['logged_in'] = true;
                                $_SESSION['user_type'] = "Admin";
                                header("location: admin.php");
                                }
                            }
                            else{
                                $login = $conn->query("SELECT * FROM `login` JOIN `patient_info` WHERE `login`.`username`='$un' AND `login`.`password`='$ps' AND `login`.`role`='patient' AND `login`.`patient_id`=`patient_info`.`pat_id`");
                                if($login->num_rows>0){
                                    while($row = $login->fetch_array()){
                                        $_SESSION['pat_id'] = $row['pat_id'];
                                        $_SESSION['pat_name'] = $row['pat_name'];
                                        $_SESSION['logged_in'] = true;
                                        $_SESSION['user_type'] = "Patient";
                                        header("location: patient.php");
                                    }
                                }
                                else{
                                    $login = $conn->query("SELECT * FROM `login` WHERE `login`.`username`='$un' AND `login`.`password`='$ps' AND `login`.`role`='hadmin' ");
                                    if($login->num_rows>0){
                                        while($row = $login->fetch_array()){
                                            $_SESSION['logged_in'] = true;
                                            $_SESSION['user_type'] = "HAdmin";
                                            header("location: hadmin.php");
                                        }
                                    }
                                    else{
                                        header("location: index.php?error=error");
                                    }
                                }
                            }
                        }
                }
        }
    }

    }
}

?>
