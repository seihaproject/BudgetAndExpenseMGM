<?php
    require_once('../../classes.php');
    $dbcon = new conn;
    $newcon = $dbcon->getConnection();
    if(isset($_POST['mode'])){
        if($_POST['mode'] === 'add'){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $created_at = $_POST['created_at'];
            $sql = "insert into usersnew(name,email,created_at) values('$name','$email','$created_at')";
            $result = mysqli_query($newcon,$sql);
            if($result){

                echo "insert success";
            }
            


        }
        if($_POST['mode']==='delete'){
            $id = $_POST['idSent'];
            $sql= "delete from usersnew where id =$id";
            $result = mysqli_query($newcon,$sql);
            if($result){
                echo "delete successfully";
            }

        }

        if($_POST['mode']==='edit'){

            $id = $_POST['idSent'];
            $sql = "select * from usersnew where id =$id";
            $result = mysqli_query($newcon,$sql);
          
               while ( $row = mysqli_fetch_array($result)){
                    $myresult = $row  ; 
               }
                echo json_encode($myresult);    
                

            
           
        
        }


    }




?>