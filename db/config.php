<?php
$host = 'localhost';
$dbname ='simpleCrud';
$username='root';
$password='';


try{
    $conn= new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // echo 'hi';
}

catch(PDOException){
 die("error" . $e->getMessage());
}
?>