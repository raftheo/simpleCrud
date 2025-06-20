<?php
require_once "db/config.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

$successMessage = '';
$errorMessageUsername ='';
$errorMessageEmail ='';
$errorMessagePassword ='';

function Isusernametaken($username, $conn){
    $sqlusername = 'SELECT * FROM admin WHERE admin_name = :username';
    $stmtusername= $conn->prepare($sqlusername);
    $stmtusername->bindParam(':username', $username);
    $stmtusername->execute();
    return $stmtusername->rowCount()>0;
}
function IsEmailTaken ($email, $conn){
    $sqlemail = 'SELECT * FROM admin WHERE admin_email = :email';
    $stmtemail= $conn->prepare($sqlemail);
    $stmtemail->bindParam(':email', $email);
    $stmtemail->execute();
    return $stmtemail->rowCount()>0;
}
if($_SERVER['REQUEST_METHOD']=== 'POST'){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    if(strlen($password)<0){
        $errorMessagePassword = 'Password is not longer than 8 characters';
        $_SESSION['errorMessagePassword'] = $errorMessagePassword;
        
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) || strpos($email, '@')===false || strpos($email,'.')===false){
        $errorMessageEmail = "Invalid form of email";
        $_SESSION['errorMessageEmail'] = $errorMessageEmail;
    }
    else{
        if(Isusernametaken($username,$conn)){
            $errorMessageUsername ='The username is taken';
            $_SESSION['errorMessageusername'] = $errorMessageUsername;
        }
        elseif(IsEmailTaken($email,$conn)){
            $errorMessageEmail = 'Email is taken';
            $_SESSION['erroremailmessage']= $errorMessageEmail;
        }
        else{
            $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
            $sql = "INSERT INTO admin(admin_name,admin_email,admin_password) VALUES (:username,:email,:password)";
            $stmt= $conn->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $hashedPassword);
            $stmt->execute();
            $successMessage = "Registration completed with success.";
            $_SESSION['successMessage']= $successMessage;
            header ('Location: index.php');
            exit;
        }
    
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
        <p style= 'color:red;'><?php echo $errorMessage; ?></p>
        <?php endif ?>
    
<div class="register">
<div class="register-box">

<form action="" method="POST">
    <div class="form">
        <h2>Simple Crud</h2>
        <p>Register</p>
    <div class="form-class">
        <label for="user">Username</label>
        <input type="text" name="username" placeholder="Username">
    </div>
     <div class="form-class">
        <label for="user">Email</label>
        <input type="text" name="email" placeholder="Email">
    </div>

     <div class="form-class">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="password">
    </div>
    <div class="form-class">
<input type="submit" class="submit-btn" value="Register">
    </div>
    </div>
</form>
</div>
</div>
</body>
</html>