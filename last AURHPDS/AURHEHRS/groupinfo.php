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
			<div class="col-lg-8 col-md-10 col-sm-12">
				<h3 class="form-group text-center">Group Member</h3>
					<table class="table table-striped">
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>ID</th>
						</tr>
						<tr>
							<td>1</td>
							<td>Merera Tesfaye</td>
							<td>UGR/53893/13</td>
						</tr>
						<tr>
							<td>2</td>
							<td>Galatom Yadeta</td>
							<td>UGR/51448/13</td>
						</tr>
						<tr>
							<td>3</td>
							<td>Solomon Amanu</td>
							<td>UGR/51446/13</td>
						</tr>
						<tr>
							<td>4</td>
							<td>Abdi Fayera </td>
							<td>UGR/51467/13</td>
						</tr>
						<tr>
							<td>5</td>
							<td>Dandi Tsegaye </td>
							<td>UGR/51668/13</td>
						</tr>
					</table>
			</div>
		</div>
	</div>
	<div class="text-center">
		<ul style="list-style-type: none;" id="ul">
			<li><h3><a href="logout.php" class="btn btn-danger">Exit</a></h3></li>
		</ul>
	</div>
</body>
</html>