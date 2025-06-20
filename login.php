<?php
require_once "db/config.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$errorMessage = '';
if($_SERVER['REQUEST_METHOD']=== 'POST'){
    $usernameOremail = $_POST['usernameoremail'];
    $password= $_POST['password'];

    $query= 'SELECT * FROM admin WHERE admin_name = :name OR admin_email = :email';
    $stmt=$conn->prepare($query);
    $stmt->bindParam(':name',$usernameOremail);
    $stmt->bindParam(':email',$usernameOremail);
    $stmt->execute();
    $user= $stmt->fetch(PDO::FETCH_ASSOC);

    if($user && password_verify($password, $user['admin_password'])){
        $_SESSION['user_id']= $user['admin_id'];
        header('Location: index.php');
        exit;
    }
    else{
        $errorMessage = 'Invalid Username or Email';
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
    <?php if(!empty($errorMessage)) : ?>
        <p style= 'color:red; text-align:center";'><?php echo $errorMessage; ?></p>
        <?php endif ?>
    
<div class="login">
<div class="login-box">

<form action="" method="POST">
    <div class="form">
        <h2>Simple Crud</h2>
        <p>Enter your login credentials</p>
    <div class="form-class">
        <label for="user">Username or Email</label>
        <input type="text" name="usernameoremail" placeholder="Username or Email">
        <img src="./assets/user.svg" alt="">
        
    </div>

     <div class="form-class">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password">
        <img src="./assets/password.svg" alt="">
       
    </div>
    <div class="form-class">
<input type="submit" class="submit-btn" value="Login">
    </div>
    <p>Don't have an account? <a href="register.php">Sign Up</a></p>
    </div>
</form>
</div>
</div>
</body>
</html>