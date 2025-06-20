<?php
require_once "db/config.php" ;
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();


if(isset($_GET['id'])){
    $studentId= $_GET['id'];
    $sqldelete = "DELETE from students where id = :id";
    $stmtdelete = $conn->prepare($sqldelete);
    $stmtdelete->bindParam(":id", $studentId);

    if($stmtdelete->execute()){
     $_SESSION['successMessage'] = 'Deleted';

    }
    else{
        $_SESSION['errorMessage'] = 'Error deleting ';

    }
}

    header('Location: students.php');
    exit;
?>
