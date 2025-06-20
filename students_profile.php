<?php
require_once 'db/config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
if(isset($_GET['id']))
{
$studentId = $_GET['id'];
$sqlStudent = "SELECT * FROM students WHERE id = :id";
$stmtStudents = $conn->prepare($sqlStudent);
$stmtStudents ->bindParam(":id",$studentId);
$stmtStudents ->execute();
$student= $stmtStudents->fetch();
}
?>

<?php include_once "includes/header.php" ; ?>

<div class="container">
    <div class="studentProfile">
        <h2>Student Profile</h2>
    
            <div class="form-class">
                <label for="name">Name</label>
                <input type="text" name="name" value="<?php echo $student['name']; ?>" disabled>
                 <label for="lastname">lastName</label>
                <input type="text" name="lastname" value="<?php echo $student['lastname']; ?>" disabled>
                <a href="edit_students.php">Edit</a>

            </div>

    </div>
</div>