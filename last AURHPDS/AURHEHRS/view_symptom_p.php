<?php
    session_start();
    include "header.php";
    $conn = mysqli_connect("localhost","root","","pms");
    
    $phy_id = $_SESSION['phy_id'];
    $pat_id = $_SESSION['pat_id'];
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
            <li><h3><a href="patient.php" class="btn btn-info">History</a></h3></li>
			<li><h3><a href="view_symptom_p.php" class="btn btn-info">Appontment Date</a></h3></li>
			<li><h3><a href="logout.php" class="btn btn-danger">Exit</a></h3></li>
		</ul>
	</div>
    <div class="container">
            <h2>Appontment Date</h2>
            <table  style="width: 1000px;" class="table">
                <tr>
                    <th>SN</th>
                    <th>Patient Name</th>
                    <th>Reason</th>
                    <th>Date</th>
                </tr>
                <?php
                    $sql = mysqli_query($conn , "SELECT * FROM symptom_req JOIN patient_info WHERE symptom_req.pat_id='{$pat_id}' AND symptom_req.pat_id=patient_info.pat_id ORDER BY symptom_req.datesss DESC");
                    $i = 0;
                    while($row = mysqli_fetch_array($sql)){
                        ?>
                        <tr>
                            <td><?php echo $i += 1; ?></td>
                            <td><?php echo $row['pat_name']; ?></td>
                            <td><?php echo $row['symptom_level']; ?></td>
                            <td><?php echo $row['datesss']; ?></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
    </body>
</html>