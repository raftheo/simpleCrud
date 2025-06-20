<?php
require_once "db/config.php" ;
?>
<?php
$sqlviewstudents = 'SELECT  * FROM students';
$stmtstudents = $conn->prepare($sqlviewstudents);
$stmtstudents-> execute();
$students=$stmtstudents->fetchAll();
?>

<?php include_once "includes/header.php" ; ?>
  <div class="container">
    <h2>View Students</h2>
    <div class="students">
<a href="students_add.php">Add Student</a>
    </div>

            <div class="table">
                <table id="table">
                    <tr>
                        <th>Name</th>
                        <th>Last Name</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach($students as $student): ?>
                    <tr>
                        <td><?php echo $student['name']; ?></td>
                        <td><?php echo $student['lastname']; ?></td>
                        <td>
                            <a href="students_profile.php?id=<?php echo $student['id']; ?>"><img src="assets/view.svg" alt=""></a>
                            <a href="students_delete.php?id=<?php echo $student['id']; ?>"><img src="assets/delete.svg" alt=""></a>
                            <a href="edit_students.php?id=<?php echo $student['id']; ?>"><img src="assets/edit.svg" alt=""></a>


                        </td>
                    
                    </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
        </div>
        
   