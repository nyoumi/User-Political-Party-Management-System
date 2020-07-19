<?php

include "includes/header.php";

try {
	$query = "SELECT * FROM people";
	$statement = $db->prepare($query);
	$statement->execute();
	$count = $statement->rowCount();
	$result = $statement->fetchAll();
	if ($count > 0) { } else {
		$result["status"] = "fail";
	}
} catch (Exception $ex) {
	$result["status"] = $ex->getMessage();
}

?>
<!-- main content start-->
<div id="page-wrapper">
	<div class="main-page">
		<div class="col_6">
			<div class="col-md-6 col-offset-4 widget widget1">
				<div class="r3_counter_box">
					<i class="pull-left fa fa-users icon-rounded"></i>
					<div class="stats">
						<h5 id="amount_deposited">
							<strong><?php echo $count; ?> </strong>
						</h5>
						<span>Users Registered</span>
					</div>
				</div>
			</div>
			<div class="col-md-6 widget widget1">
				<div class="r3_counter_box">
					<i class="pull-left fa fa-globe user2 icon-rounded"></i>
					<div class="stats">
						<h5 id="generated_revenue">
							<strong>10</strong>
						</h5>
						<span>Provinces</span>
					</div>
				</div>
			</div>

			<div class="clearfix"> </div>
		</div>

		<div class="row-one widgettable">
			<div class="col-md-12 content-top-2 card">
				<div class="agileinfo-cdr">
					<div class="card-header">
						<h3>All Users</h3>
						<a href="pdf/practice.php" class="btn btn-success btn-lg pull-left" >Create PDF</a>
					</div>
					<br><br><br>
					<div style="width: 98%; height: 350px">
						<table id="all_data" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>id_no</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Position</th>
									<th>Province</th>
									<th>District</th>
									<th>Branch</th>
									<th>Cell</th>
									<th align="center">Action</th>
								</tr>
							</thead>
							<tbody class="search_into">
								<?php foreach ($result as $row) : ?>
									<tr>
										<td><?php echo $row['id_no'] ?></td>
										<td><?php echo $row['firstname'] ?></td>
										<td><?php echo $row['lastname'] ?></td>
										<td><?php echo $row['department'] ?></td>
										<?php
											$query = "SELECT * FROM provinces where province_id=" . $row['province_id'];
											$statement = $db->prepare($query);
											$statement->execute();
											$count = $statement->rowCount();
											$result = $statement->fetchAll();

											$province = $result[0]['province_name'];
											?>
										<td><?php echo $province ?></td>

										<td><?php echo $row['district'] ?></td>
										<td><?php echo $row['branch'] ?></td>
										<td><?php echo $row['cell'] ?></td>
										<td><a href="edit_user.php?id=<?php echo $row['id'] ?>" class="badge badge-primary">edit</a><a href="delete_user.php?id=<?php echo $row['id'] ?>" class="badge badge-danger">delete</a></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<?php include "includes/footer.php"; ?>