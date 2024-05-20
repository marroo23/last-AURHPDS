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
		#contents{
			display: none;
		}
	</style>
<body>
	<div>
		<ul style="list-style-type: none;" id="ul">
			<li><h3><a href="hadmin.php" class="btn btn-info">Report</a></h3></li>
            <li><h3><a href="drug.php" class="btn btn-info">Drug</a></h3></li>
			<li><h3><a href="changeHadmin.php" class="btn btn-info">Change Account</a></h3></li>
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
			<div class="col-2"></div>
			<div class="col">
				<h3 class="form-group text-center">Drug Information</h3>
					<table class="table table-striped">
						<tr>
							<th>Drug Name</th>
							<th>Expired Date</th>
							<th>Description</th>
						</tr>
							<?php
	                        		$fetch_drug = $conn->query("SELECT * FROM `drug`");
									while($row = $fetch_drug->fetch_array()){
										?>
											
											<td><?php echo $row['drug_name']; ?></td>
											<td><?php echo $row['expired_date']; ?></td>
											<td><?php echo $row['description']; ?></td>
										<?php
										echo "</tr>";
									}
							?>
					</table>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function(){
			$(".search").on("keypress", function(){
				$.ajax({
					type: "POST",
					url: "search_drug.php",
					data:{
						name:$(".search").val(),
					},
					success:function(data){
						$("#contents").show();
						$("#output").html(data);
					}
				});
			});
		});
	</script>
</body>
</html>