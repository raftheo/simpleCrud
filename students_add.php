<?php
require_once "db/config.php" ;
?>

<?php
$successMessage= '';
if($_SERVER['REQUEST_METHOD']==='POST'){

    $name = $_POST['name'];
    $lastname = $_POST['lastname'];

    $sqladdstudent='INSERT INTO students(name,lastname) VALUES(:name,:lastname)';
    $stmtaddstudent= $conn->prepare($sqladdstudent);
    $stmtaddstudent->bindParam(":name",$name);
    $stmtaddstudent->bindParam(":lastname",$lastname);
    $stmtaddstudent->execute();
    $successMessage = "Inserted";
}
?>
<?php  include_once "includes/header.php" ;?>

<div class="container">
   
    <div class="add">
           <?php if (!empty($successMessage)) : ?>
    <p style="color:green; text-align:center";> <?php  echo $successMessage; ?></p>
    <?php endif ?>
        
        <h2>Add Students</h2>
      
        <form action="" method="POST">
            <div class="form-class">
                <label for="name">Name</label>
                <input type="text" name="name">
            </div>
             <div class="form-class">
                <label for="lastname">Last name</label>
                <input type="text" name="lastname">
            </div>
            <div class="form-class">
                 <input type="submit" value="Add">

            </div>
           
        </form>
    </div>
</div>