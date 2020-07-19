<?php
include "includes/header.php"; 
//require "db/DB.php"; 
$image = '<img class="avatar img-circle img-thumbnail my_avatar" src="images/'.$_SESSION['profile_picture'].'" alt=""></img>'; 
$avatar = '<img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">';
//update profile
if(isset($_POST['save_user'])) {    
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$id_number = $_POST["id_number"];
	$date_of_birth = $_POST["date_of_birth"];
	$gender = $_POST["gender"];
	$department = $_POST["department"];
	$district = $_POST["district"];
	$branch = $_POST["branch"];
	$cell = $_POST["cell"];
	$province_id =  $_POST["province_id"];
		

	$user_exist = user_exist($id_number);
	if($user_exist["status"] == 'ok'){
		$reso = "User already exist";
	}
	else{
		$create_user=create_user($firstname,$lastname,$id_number,$department,$date_of_birth,$gender,$district,$branch,$cell,$province_id);
		$reso = "User created successifully";
	}
}
?>
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
	<div class="row">
        </div><!--/col-3-->
		<br>
    	<div class="col-sm-9">		
			<div class="tab-content">
				<form class="form" action="new.php" method="POST" id="save_user">  
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4></label>
                              <input type="text" class="form-control" placeholder="first_name" title="enter first name." name="firstname" required="required">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input type="text" class="form-control"  placeholder=last_name" title="enter last name." name="lastname" required="required">
                          </div>
                      </div>
           
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="id_number"><h4>ID Number</h4></label>
                              <input type="text" class="form-control" placeholder="id_number" title="enter ID Number." name="id_number" required="required">
                          </div>
                      </div> 
                       <div class="form-group">
                          <div class="col-xs-6">
                              <label for="date_of_birth"><h4>Date of Birth</h4></label>
                              <input type="date" class="form-control" placeholder="date_of_birth" title="enter DOB." name="date_of_birth" required="required">
                          </div>
                      </div> 
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="gender"><h4>Gender</h4></label>
                              <select class="form-control" name="gender">
								  <option value="Male">Male</option>
								  <option value="Female">Female</option>
								</select>
						</div>
                      </div>   
                       <div class="form-group">
                          <div class="col-xs-6">
                              <label for="Position"><h4>Position</h4></label>
                               <select class="form-control" name="department">
								  <option value="Youth">Youth</option>
								  <option value="PS">PS</option>
								  <option value="CC">CC</option>
								  <option value="Women">Women</option>
								  <option value="men">Men</option>
								</select>
                          </div>
                      </div> 
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="Province"><h4>Province</h4></label>
                             <select class="form-control" name="province_id">
								 <?php
									$query ="SELECT * FROM provinces";
									$statement = $db->prepare($query);
									$statement->execute();
									$count= $statement -> rowCount();
									$result = $statement->fetchAll();

									foreach($result as $row){
										echo "<option value='".$row['province_id']."'>".$row['province_name']."</option>";
									}
								 ?>
								</select>
                          </div>
                      </div>   
                       <div class="form-group">
                          <div class="col-xs-6">
                              <label for="District"><h4>District</h4></label>
                              <select class="form-control" name="district">
								  <option value="dist1">Dist 1</option>
								  <option value="dist2">Dist 2</option>
								  <option value="dist3">Dist 3</option>
								  <option value="dist4">Dist 4</option>
								  <option value="dist5">Dist 5</option>
								</select>
                          </div>
                      </div>  
                       <div class="form-group">
                          <div class="col-xs-6">
                              <label for="Branch"><h4>Branch</h4></label>
                              <select class="form-control" name="branch">
                              <option value="branch1">branch 1</option>
								  <option value="branch2">Branch 2</option>
								  <option value="branch3">Branch 3</option>
								  <option value="branch4">Branch 4</option>
								  <option value="branch5">Branch 5</option>
								  </select>
                          </div>
                      </div>  
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="Cell"><h4>Cell</h4></label>
                             <select class="form-control" name="cell">
								  <option value="cellA">Cell A</option>
								  <option value="cellB">Cell B</option>
								  <option value="cellC">Cell C</option>
								  <option value="cellD">Cell D</option>
								  <option value="cellE">Cell E</option>
								</select>
                          </div>
                      </div>     
                      <div class="form-group">
                          <div class="col-xs-6">
							 <br>
							 <button type="submit" class="btn btn-lg btn-info" name="save_user" >Save User</button>
                          </div>
                    </div>
					<div class="form-group">
                          <div class="col-xs-6">
							 <br>
								<p>
								<?php
								if(isset($reso)){
										echo $reso;
									}
								?>
								</p>	
                          </div>
                    </div>
                </form>   
          </div>
    </div>
	</div>
		</div>
	</div>
	<!-- modals -->
	
	<!-- //Classie -->
	<!-- //for toggle left push menu script -->

	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->

	<!-- side nav js -->
	<script src='js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
		$('.sidebar-menu').SidebarNav()
	</script>
	<!-- //side nav js -->

	<!-- for index page weekly sales java script -->
	
	<!-- //for index page weekly sales java script -->


	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"> </script>
	<!-- //Bootstrap Core JavaScript -->

</body>

</html>