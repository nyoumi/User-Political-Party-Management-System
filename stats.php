<?php
include "includes/header.php";
//$arr = chart_data();
$chart_data = chart_data();
$array = $chart_data["status"]; //array(5,6,7,8,9,10);
$res = json_encode($array);

if (isset($_POST['view'])) {
	$province_id =  $_POST["province_id"];
	$cell = cell($province_id);
	$district = district($province_id);
	$branch = branch($province_id);
	$category = category($province_id);

	//district
	$array = $district["status"]; //array(5,6,7,8,9,10);
	$resd = json_encode($array);

	//cell
	$array = $cell["status"];
	$resc = json_encode($array);

	//branch
	$array = $branch["status"];
	$resb = json_encode($array);

	//departments
	$array = $category["status"];
	$resdep = json_encode($array);
} else {
	$province_id =  1;
	$cell = cell($province_id);
	$district = district($province_id);
	$branch = branch($province_id);
	$category = category($province_id);

	//district
	$array = $district["status"]; //array(5,6,7,8,9,10);
	$resd = json_encode($array);

	//cell
	$array = $cell["status"];
	$resc = json_encode($array);

	//branch
	$array = $branch["status"];
	$resb = json_encode($array);

	//departments
	$array = $category["status"];
	$resdep = json_encode($array);
}
?>
<!-- main content start-->
<div id="page-wrapper">
	<div class="main-page">
		<div class="row">
		</div>

		<div class="col-sm-12">
			<div class="tab-content">
				<div class="row  widgettable">
					<form class="form" action="stats.php" method="POST">
						<div class="col-sm-6 col-md-6 col-lg-6 content-top-2 card">
							<div class="agileinfo-cdr">
								<div class="form-group">
									<label for="Province">
										<h4>Province</h4>
									</label>
									<select class="form-control" name="province_id">
										<option value="#">Select Province</option>
										<?php
										$query = "SELECT * FROM provinces";
										$statement = $db->prepare($query);
										$statement->execute();
										$count = $statement->rowCount();
										$result = $statement->fetchAll();

										foreach ($result as $row) {
											echo "<option value='" . $row['province_id'] . "'>" . $row['province_name'] . "</option>";
										}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-sm-4 col-md-4 col-lg-4">
							<button type="submit" class="btn btn-lg btn-info" name="view">View</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="header-provinces card">
			<?php
			$query = "SELECT * FROM provinces where province_id=$province_id";
			$statement = $db->prepare($query);
			$statement->execute();
			$count = $statement->rowCount();
			$result = $statement->fetchAll();

			$province_name = $result[0]['province_name'];
			?>
			<br><br><br>
			<h1 align="center">Results for <?php echo $province_name; ?></h1>
			<br><br>
		</div>
		<div class="row">
			<div class="col-sm-6 col-md-6 col-lg-6">
				<canvas id="bar-chart1" width="800" height="450"></canvas>
			</div>
			<div class="col-sm-6 col-md-6 col-lg-6">
				<canvas id="bar-chart2" width="800" height="450"></canvas>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-md-6 col-lg-6s">
				<canvas id="bar-chart3" width="800" height="450"></canvas>
			</div>
			<div class="col-sm-6 col-md-6 col-lg-6">
				<canvas id="dhonanzi" width="800" height="450"></canvas>
			</div>
		</div>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<script type="text/javascript">
	new Chart(document.getElementById("bar-chart1"), {
		type: 'bar',
		data: {
			labels: ['District 1', 'District 2', 'District 3', 'District 4', 'District 5'],
			datasets: [{
				label: "People in District",
				backgroundColor: ["rgba(245, 171, 53, 1)", "rgba(245, 171, 53, 1)", "rgba(245, 171, 53, 1)", "rgba(245, 171, 53, 1)", "rgba(245, 171, 53, 1)"],
				data: <?php echo $resd;  ?>,
			}]
		},
		options: {
			legend: {
				display: true
			},
			title: {
				display: true,
				text: 'Bar Graph representing number of people in each District'
			}
		}
	});
</script>
<script type="text/javascript">
	new Chart(document.getElementById("bar-chart2"), {
		type: 'bar',
		data: {
			labels: ['Cell A', 'Cell B', 'Cell C', 'Cell D', 'Cell E'],
			datasets: [{
				label: "People in Cells",
				backgroundColor: ["rgba(245, 171, 53, 1)", "rgba(245, 171, 53, 1)", "rgba(245, 171, 53, 1)", "rgba(245, 171, 53, 1)", "rgba(245, 171, 53, 1)"],
				data: <?php echo $resc;  ?>,
			}]
		},
		options: {
			legend: {
				display: true
			},
			title: {
				display: true,
				text: 'Bar Graph representing number of people in each Cell'
			}
		}
	});
</script>
<script type="text/javascript">
	new Chart(document.getElementById("bar-chart3"), {
		type: 'bar',
		data: {
			labels: ['branch1', 'branch2', 'branch3', 'branch4', 'branch5'],
			datasets: [{
				label: "People in Branches",
				backgroundColor: ["rgba(245, 171, 53, 1)", "rgba(245, 171, 53, 1)", "rgba(245, 171, 53, 1)", "rgba(245, 171, 53, 1)", "rgba(245, 171, 53, 1)"],
				data: <?php echo $resb;  ?>,
			}]
		},
		options: {
			legend: {
				display: true
			},
			title: {
				display: true,
				text: 'Graph representing number of people in each branch'
			}
		}
	});
</script>
<script type="text/javascript">
	new Chart(document.getElementById("dhonanzi"), {
		type: 'pie',
		data: {
			labels: ['youth', 'women', 'men', 'PS', 'CC'],
			datasets: [{
				label: "People in Branches",
				backgroundColor: ["rgba(255, 203, 5, 1)", "rgba(255, 0, 0, 0.8)", "rgba(0,0,0, 0.8)", "rgba(0,255,0, 0.8)", "rgba(245, 171, 53, 1)", ],
				data: <?php echo $resdep;  ?>,
			}]
		},
		options: {
			legend: {
				display: true
			},
			title: {
				display: true,
				text: 'Graph representing number of people in each department'
			}
		}
	});
</script>

<!-- //Bootstrap Core JavaScript -->

<?php include "includes/footer.php"; ?>