<?php
session_start();
require_once('../function/registerFunction.php');
require_once('../function/functionImg.php');
require_once('../classes.php');
$db = new conn;
$conn = $db->getConnection();
    if(isset($_POST['operation'])){
        if($_POST['operation'] == "add"){
            $image = "";
            if($_FILES['filephoto']['name'] != ""){

                $image = getimage();
            }
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            $sql = "insert into users(firstName,lastName,username,password,photo) values('$firstname','$lastname','$username','$password','$image')";
            //$stmt = mysqli_stmt_init($conn);
           // $stmt = mysqli_stmt_prepare($stmt,$sql);
            //$password = md5($password);
            //mysqli_stmt_bind_param($stmt,"sssss",$firstname,$lastname,$username,$password,$image);
            //mysqli_stmt_bind_param($stmt,"sssss",$firstname,$lastname,$username,$password,$image);
            $result = mysqli_query($conn,$sql);
            if($result){
               // $_SESSION['add'] = "Add successfully";
                header('location:login.php?add=success');
               

            }

        
            
            


        }
       


    }

?>