<?php
include "includes/header.php";
$genders = array('Male', 'Female');
$positions = array('Youth', 'PS', 'CC', 'Women', 'Men');
$provinces = array('Harare', 'Bulawayo', 'Mash East', 'Mash Central', 'Mash West', 'Masvingo', 'Midlands', 'Mat North', 'Mat South');
$dists = array('dist1', 'dist2', 'dist3', 'dist4', 'dist5', 'dist6');
$cells = array('cellA', 'cellB', 'cellC', 'cellD', 'cellE');
$branches = array('branch1', 'branch2', 'branch3', 'branch4', 'branch5', 'branch6');
$i=1;
$id = $_GET['id'];

$query = "SELECT * FROM people where id=$id";
$statement = $db->prepare($query);
$statement->execute();
$count = $statement->rowCount();
$result = $statement->fetchAll();

$firstname = $result[0]['firstname'];
$lastname = $result[0]['lastname'];
$id_no = $result[0]['id_no'];
$DOB = $result[0]['DOB'];
$gender = $result[0]['gender'];
$position = $result[0]['department'];
$district = $result[0]['district'];
$branch = $result[0]['branch'];
$cell = $result[0]['cell'];
$province_id = $result[0]['province_id'];

$query = "SELECT * FROM provinces where province_id=$province_id";
$statement = $db->prepare($query);
$statement->execute();
$count = $statement->rowCount();
$result = $statement->fetchAll();
$province = $result[0]['province_name'];
?>
<!-- main content start-->
<div id="page-wrapper">
    <div class="main-page">
        <div class="row">
        </div>
        <!--/col-3-->
        <br>
        <div class="col-sm-9">
            <div class="tab-content">
                <form class="form" action="includes/edit.php?id=<?php echo $id; ?>" method="POST" id="save_user">
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="first_name">
                                <h4>First name</h4>
                            </label>
                            <input type="text" class="form-control" placeholder="first_name" title="enter first name." name="firstname" value="<?php echo $firstname; ?>">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="last_name">
                                <h4>Last name</h4>
                            </label>
                            <input type="text" class="form-control" placeholder="last_name" title="enter last name." name="lastname" value="<?php echo $lastname; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="id_number">
                                <h4>ID Number</h4>
                            </label>
                            <input type="text" class="form-control" placeholder="id_number" title="enter ID Number." name="id_number"value="<?php echo $id_no; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="date_of_birth">
                                <h4>Date of Birth</h4>
                            </label>
                            <input type="date" class="form-control" placeholder="date_of_birth" title="enter DOB." name="date_of_birth" value="<?php echo $DOB; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="gender">
                                <h4>Gender</h4>
                            </label>
                            <select class="form-control" name="gender">
                                <?php foreach ($genders as $g) : ?>
                                    <?php if ($g == $gender) : ?>
                                        <option value="<?php echo $g; ?>" selected><?php echo $g; ?></option>
                                    <?php else : ?>
                                        <option value="<?php echo $g; ?>"><?php echo $g; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="Position">
                                <h4>Position</h4>
                            </label>
                            <select class="form-control" name="department">
                                <?php foreach ($positions as $p) : ?>
                                    <?php if ($p == $position) : ?>
                                        <option value="<?php echo $p; ?>" selected><?php echo $p; ?></option>
                                    <?php else : ?>
                                        <option value="<?php echo $p; ?>"><?php echo $p; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="Province">
                                <h4>Province</h4>
                            </label>
                            <select class="form-control" name="province_id">
                                
                                <?php foreach ($provinces as $p) : ?>
                                    <?php if ($p == $province) : ?>
                                        <option value="<?php echo $i; ?>" selected><?php echo $p; ?></option>
                                    <?php else : ?>
                                        <option value="<?php echo $i; ?>"><?php echo $p; ?></option>
                                    <?php endif; ?>

                                <?php $i++; endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="District">
                                <h4>District</h4>
                            </label>
                            <select class="form-control" name="district">
                                <?php foreach ($dists as $p) : ?>
                                    <?php if ($p == $district) : ?>
                                        <option value="<?php echo $p; ?>" selected><?php echo $p; ?></option>
                                    <?php else : ?>
                                        <option value="<?php echo $p; ?>"><?php echo $p; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="Branch">
                                <h4>Branch</h4>
                            </label>
                            <select class="form-control" name="branch">
                                <?php foreach ($branches as $p) : ?>
                                    <?php if ($p == $branch) : ?>
                                        <option value="<?php echo $p; ?>" selected><?php echo $p; ?></option>
                                    <?php else : ?>
                                        <option value="<?php echo $p; ?>"><?php echo $p; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="Cell">
                                <h4>Cell</h4>
                            </label>
                            <select class="form-control" name="cell">
                                <?php foreach ($cells as $p) : ?>
                                    <?php if ($p == $cell) : ?>
                                        <option value="<?php echo $p; ?>" selected><?php echo $p; ?></option>
                                    <?php else : ?>
                                        <option value="<?php echo $p; ?>"><?php echo $p; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <br>
                            <button type="submit" class="btn btn-lg btn-info" name="update_user">Update User</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <br>
                            <p>
                                <?php
                                if (isset($reso)) {
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