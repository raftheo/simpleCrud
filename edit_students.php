<?php
session_start();
require_once 'db/config.php';

$student = null;

if (isset($_GET['id'])) {
    $studentId = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newName = $_POST['new_name'];
        $newLastName = $_POST['lastname'];

        $updateQuery = "UPDATE students SET name = :new_name, lastname = :lastname WHERE id = :id";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bindParam(':new_name', $newName);
        $updateStmt->bindParam(':lastname', $newLastName);
        $updateStmt->bindParam(':id', $studentId);

        if ($updateStmt->execute()) {
            $_SESSION['successMessage'] = 'Student updated successfully!';
        } else {
            $_SESSION['errorMessage'] = 'Error updating student.';
        }

        header("Location: edit_students.php?id=$studentId");
        exit;
    }

    $sql = "SELECT * FROM students WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $studentId);
    $stmt->execute();
    $student = $stmt->fetch();

    if (!$student) {
        $_SESSION['errorMessage'] = 'Student not found.';
        header("Location: students.php");
        exit;
    }

} else {
   
    header("Location: students.php");
    exit;
}
?>

<?php include_once "includes/header.php"; ?>

<div class="container">
    <h2>Edit Student</h2>


    <?php if (!empty($_SESSION['errorMessage'])) : ?>
        <p style="color: red;"><?php echo $_SESSION['errorMessage']; ?></p>
        <?php unset($_SESSION['errorMessage']); ?>
    <?php endif; ?>

    <?php if (!empty($_SESSION['successMessage'])) : ?>
        <p style="color: green;"><?php echo $_SESSION['successMessage']; ?></p>
        <?php unset($_SESSION['successMessage']); ?>
    <?php endif; ?>

 
    <form method="POST" action="edit_students.php?id=<?php echo $student['id']; ?>">
        <input type="hidden" name="id" value="<?php echo $student['id']; ?>">

        <label for="name">Name:</label>
        <input type="text" name="new_name" value="<?php echo htmlspecialchars($student['name']); ?>" required>

        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" value="<?php echo htmlspecialchars($student['lastname']); ?>" required>

        <button type="submit">Update</button>
    </form>
</div>
