<?php
    include "header.php";
    $conn = mysqli_connect("localhost","root","","pms");
    
    if(isset($_POST['reg_pmh']))
    {
        $is_lab = $_POST['is_lab'];
        $dtype = $_POST['disease_type'];
        $pid = $_POST['patient_id'];
        $drid = 1;
        $phyid = 2;

        $selmax = mysqli_query($conn, "SELECT * FROM patient_history");
        $max = 0;
        if(mysqli_num_rows($selmax)>0){
            $selmax = mysqli_query($conn, "SELECT MAX(come_id) FROM patient_history");
            $r = mysqli_fetch_array($selmax);
            $max = $r[0];
        }
        
        $max +=1;

        if($is_lab=="yes"){
            for($i = 0; $i < sizeof($_POST['lab_type']); $i++){
                $ltype = $_POST['lab_type'][$i];

                $insert = mysqli_query($conn, "INSERT INTO patient_history(dis_type,lab_test_type,pat_id,phy_id,lab_status,come_id,drug_status) VALUES('$dtype','$ltype','$pid','$phyid',1,'$max',0)");
            }
            ?>
            <script>
                alert("Successful");
                window.location.href = "register_pmh.php";
            </script>
            <?php
        }elseif($is_lab=="no"){
            for($i = 0; $i < sizeof($_POST['drug_id']); $i++){
                $did = $_POST['drug_id'][$i];

                $insert = mysqli_query($conn, "INSERT INTO patient_history(dis_type,pat_id,drug_id,phy_id,lab_status,come_id,drug_status) VALUES('$dtype','$pid','$did','$phyid',0,'$max',0)");
            }
            ?>
            <script>
                alert("Successful");
                window.location.href = "register_pmh.php";
            </script>
            <?php
        }
    }
?>
<html>
    <head>
        <title>AURHPDS</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
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
    </head>
    <body>

    <div>
		<ul style="list-style-type: none;" id="ul">
            <li><h3><a href="register_pmh.php" class="btn btn-info">Prescription</a></h3></li>
            <li><h3><a href="view_lab_result.php" class="btn btn-info">View Lab Result</a></h3></li>
            <li><h3><a href="order_drug.php" class="btn btn-info">Order Drug</a></h3></li>
            <li><h3><a href="appontment.php" class="btn btn-info">Appontment</a></h3></li>
            <li><h3><a href="view_symptom.php" class="btn btn-info">View Appontment Request</a></h3></li>
			<li><h3><a href="changeD.php" class="btn btn-info">Change Account</a></h3></li>
			<li><h3><a href="logout.php" class="btn btn-danger">Logout</a></h3></li>
		</ul>
	</div>
        <div style="margin-left: 250px; width: 400px;" class="form-group">
            <h3>Write Prescription</h3>
            <form method="POST">
                <label>Select Patient: </label>
                <select class="form-control" name="patient_id" id="pid">
                    <option>--select--</option>
                    <?php
                        $sql = mysqli_query($conn, "SELECT * FROM patient_info");
                        while($row = mysqli_fetch_array($sql)){
                            ?>
                            <option value="<?php echo $row['pat_id']; ?>"><?php echo $row['pat_name']; ?></option>
                            <?php
                        }

                    ?>

                </select>
                <br />
                <textarea name="disease_type" cols="50" rows="5" placeholder="write disease type" class="form-control"></textarea><br>
                <!-- <input type="text" name="disease_type" class="form-control" placeholder="enter disease type"><br> -->
                <label for="">Lab Needed</label>: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="radio" name="is_lab" id="is_lab" value="yes"> Yes &nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="radio" name="is_lab" id="isnot_lab" value="no"> No <br>
                <!-- <input type="text" name="drug_id" class="form-control dis" placeholder="enter drug id"><br><br> -->
                <label for="dis" id="ldis">Order Drug</label>
                <select class="form-control" name="drug_id[]" id="dis" style="width: 300px;" multiple="multiple">
                    <option>----select-----</option>
                    <?php
                        $sql = mysqli_query($conn, "SELECT * FROM drug");
                        while($row = mysqli_fetch_array($sql)){
                            ?>
                            <option value="<?php echo $row['drug_no']; ?>"><?php echo $row['drug_name']; ?></option>
                            <?php
                        }
                    ?>
                </select><br><br>
                <label for="dis"  id="ltype">Order Lab Type</label>
                <select name="lab_type[]" class="form-control" id="type" style="width: 250px;" multiple="multiple">
                    <option>----select-----</option>
                    <option value="parasitology">Parasitology</option>
                    <option value="heamatology">Heamatology</option>
                </select><br><br>
                <input type="submit" class="btn btn-primary mb-2" name="reg_pmh"><br>
            </form>
        </div>

        <script>
            $(document).ready(function(){
                $("#isnot_lab").click(function(){
                    $("#dis").show();
                    $("#type").hide();
                    $("#ldis").show();
                    $("#ltype").hide();
                })
                $("#is_lab").click(function(){
                    $("#dis").hide();
                    $("#type").show();
                    $("#ldis").hide();
                    $("#ltype").show();
                }) 
            });
        </script>
    </body>
</html>