<?php
include "includes/header.php"; 
$image = '<img class="avatar img-circle img-thumbnail my_avatar" src="images/'.$_SESSION['profile_picture'].'" alt=""></img>'; 
$avatar = '<img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">';
//update profile
if(isset($_POST['save_user'])) {    
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$gender = $_POST["gender"];
	$role = $_POST["role"];
	$is_active = 1;
	$password = "Default01";

	$user_exist = employee_exist($email);
	if($user_exist["status"] == 'ok'){
		$reso = "Employee already exist";
	}
	else{
		$create_user=create_employee($firstname,$lastname,$password,$gender,$email,$is_active,$role);
		$reso = "Employee created successifully";
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
				<form class="form" action="new_emp.php" method="POST" id="save_user">  
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
                              <label for="gender"><h4>Gender</h4></label>
                              <select class="form-control" name="gender">
								  <option value="Male">Male</option>
								  <option value="Female">Female</option>
								</select>
						</div>
                      </div> 
                       <div class="form-group">                         
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Email</h4></label>
                              <input type="email" class="form-control"  placeholder="email" title="enter email." name="email" required="required">
                          </div>
                      </div>  

                       <div class="form-group">
                          <div class="col-xs-6">
                              <label for="gender"><h4>Role</h4></label>
                              <select class="form-control" name="role">
								  <option value="admin">admin</option>
								  <option value="employee">employee</option>
								</select>
						</div>
                      </div> 
                      <div class="form-group">
                          <div class="col-xs-6">
							 <br>
							 <button type="submit" class="btn btn-lg btn-info" name="save_user" >Save Employee</button>
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