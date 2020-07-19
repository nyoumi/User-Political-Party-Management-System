<?php include "includes/header.php"; ?>
<?php
$query ="SELECT * FROM employees";
$statement = $db->prepare($query);
$statement->execute();
$count= $statement -> rowCount();
$result = $statement->fetchAll();
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel panel-heading">
                    <h3>All Employees</h3>
                </div>
                <div class="panel panel-body">
                    <table id="all_emps" class="table table-striped table-bordered" >
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th align="center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="search_into">
                            <?php foreach($result as $row) : ?>
                                <tr>
                                    <td><?php echo $row['id'] ?> </td>
                                    <td><?php echo $row['fname'] ?></td>
                                    <td><?php echo $row['lname'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['gender'] ?></td>
                                    <td><?php echo $row['role'] ?></td>
                                    <?php 
                                        if($row['is_active']==1){
                                            echo "<td><a href='' class='badge badge-success'>active</a></td>";
                                        }else{
                                            echo "<td><a href='' class='badge badge-warning'>deactivated</a></td>";
                                        } 
                                    ?>
                                    <td>
                                        <a href="edit_emp.php?id=<?php echo $row['id'] ?>" class="badge badge-primary">edit</a>
                                        <a href="delete_emp.php?id=<?php echo $row['id'] ?>" class="badge badge-danger">delete</a>
                                        <?php
                                            if($row['is_active']==1){
                                                echo '<a href="activate_emp.php?id='.$row['id'].'" class="badge badge-warning">deactivate</a>';
                                            }else{
                                                echo '<a href="activate_emp.php?id='.$row['id'].'" class="badge badge-success">activate</a>';
                                            } 
                                            
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>