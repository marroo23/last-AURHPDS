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
		<li><h3><a href="drug_store.php" class="btn btn-info">Home</a></h3></li>
            <li><h3><a href="view_drug_order.php" class="btn btn-info">View Drug Order</a></h3></li>
			<li><h3><a href="changeP.php" class="btn btn-info">Set Account</a></h3></li>
			<li><h3><a href="logout.php" class="btn btn-danger">Logout</a></h3></li>
			<li style="float: right; margin-right: 50px;"><input type="text" name="search" class="search" placeholder="search"></li>
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
				<h3 class="">Drug Information</h3>
				<form method="POST" action="store_drug.php">
                    <div class="form-group">
                        <i class="fa fa-user"></i>
                        <label for="un" id="text" style="isolation: isolate;">Drug Name</label>
                        <input type="text" id="un" name="drug_name" required="" autocomplete="off" placeholder="enter drug name here..." class="form-control">
                    </div>
                    <div class="form-group">
                        <i class="fa fa-day"></i>
                        <label for="un" id="text" style="isolation: isolate;">Expired Date</label>
                        <input type="date" id="un" name="expired_date" required="" autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                    	<i class="fa fa-user"></i>
                        <label for="un" id="text" style="isolation: isolate;">Description</label>
                    	<textarea  class="form-control" name="description"></textarea>
                    </div>
                    <div class="form-group col-sm-8 col-md-6 col-lg-5">
                        <input type="submit" id="smt" name="submit" class="form-control btn btn-sm btn-success" value="Submit">
                    </div>
                </form>
			</div>
			<div class="col-lg-8 col-md-10 col-sm-12">
				<div id="contents">
					<table border='1' style="width: 600px">
						<thead>
							<tr>
								<th>Drug Name</th>
								<th>Description</th>
								<th>Expiry Date</th>
							</tr>
						</thead>
						<tbody id="output">

						</tbody>
					</table>
				</div>
				<h3 class="form-group">Manage</h3>
					<table class="table">
						<tr>
							<th>Drug Name</th>
							<th>Expired Date</th>
							<th>Description</th>
							<th colspan="2">Control</th>
						</tr>
							<?php
	                        		$fetch_drug = $conn->query("SELECT * FROM `drug`");
									while($row = $fetch_drug->fetch_array()){
										?>
										<form action="store_drug.php" method="POST">
											<input type="hidden" name="drug_no" value="<?php echo $row['drug_no']; ?>">
											<td><input class="form-control" type="text" name="drug_name" value="<?php echo $row['drug_name']; ?>"></td>
											<td><input class="form-control" type="date" name="expired_date" value="<?php echo $row['expired_date']; ?>"></td>
											<td><textarea  class="form-control" name="description"><?php echo $row['description']; ?></textarea></td>
											<td><input class="form-control" type="submit" value="Update" name="update"></td>
											<td><input class="form-control" type="submit" value="Delete" name="delete"></td>
										</form>
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