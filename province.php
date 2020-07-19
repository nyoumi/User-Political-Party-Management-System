<?php include "includes/header.php"; ?>
<?php
$id = $_GET['id'];

$query ="SELECT * FROM people where province_id=$id";
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
                    <h3>All Users By Province</h3>
                </div>
                <div class="panel panel-body">
                    <table id="all_users_by_p" class="table table-striped table-bordered" >
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
                        <?php foreach($result as $row) : ?>
                            <tr>
                                <td><?php echo $row['id_no'] ?></td>
                                <td><?php echo $row['firstname'] ?></td>
                                <td><?php echo $row['lastname'] ?></td>
                                <td><?php echo $row['department'] ?></td>
                                <?php
                                    $query ="SELECT * FROM provinces where province_id=".$row['province_id'];
                                    $statement = $db->prepare($query);
                                    $statement->execute();
                                    $count= $statement -> rowCount();
                                    $result = $statement->fetchAll();

                                    $province=$result[0]['province_name'];
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
    </div>
</div>
<?php include "includes/footer.php"; ?>