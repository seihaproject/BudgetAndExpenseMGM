
<?php
require_once('../classes.php');



function emptyInputstring($username,$password){
    $result = "";
    if (empty($username) || empty($password)){
        $result = true;
        

    }else{

        $result = false;
    }
    return $result;


}
function invalidUid($username){
    $result = "";
    if(!preg_match("/^[a-zA-Z0-9-']*$/",$username)){
        $result = true;

    }else{
        $result = false;
    }
    return $result;


}
/*
function userExist($conn, $username){
    $sql = "select * from users where username =?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header('location:login.php?error=DBerror');
        exit();

    }
        mysqli_stmt_bind_param($stmt,'s',$username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_array($result)){

            return $row;
        }else{
            $result = false;


        }
        return $result;


        
    }
  */  
    function login($conn, $username,$password){
       /*
        $check = userExist($conn,$username);

     //$password = md5($password);
     if($check === false){
       header('location:../Auth/login.php?error=Usernotexist');
       exit();

     }else{
         */
        
        $sql = "select * from users where username =? and password = ?";
        $stmt = mysqli_stmt_init($conn);
       // $stmt = mysqli_stmt_prepare($stmt,$sql);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header('location:../Auth/login.php?error=errorsqlLogin');
          exit();
  
        }
  
        mysqli_stmt_bind_param($stmt,'ss',$username,md5($password));
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)){;
        
          if ($row>0){
            header('location:../dashboard.php');
            $_SESSION['username'] = $row['username'];
            $_SESSION['photo'] = $row['photo'];
              
          }else{
              header('location:../Auth/login.php?error=wrongpassword');
              exit();
          }

        }

      

            


     }

     
    
function showdata(){
    $newdata = new fillData;
    $data = $newdata->data();
   
    $table = "<table id='tbl' class='col-12 table-bordered table-responsive-md'> 
            <thead>
                <tr>
                 <th>#</th>
                 <th>Category Name</th>
                 <th>Amount</th>
                 <th>Date Created</th>
                 <th>Remark</th>
                 <th>Action</th>
                 </tr>
            </thead>";
            $table .= "<tbody>";
      while($row=mysqli_fetch_assoc($data)){
        
            
               
        $table.="<tr class='text-center'>
        <td>".$row['id']."</td>
        <td>".$row['categoryName']."</td>
        <td>".$row['amount']."</td>
        <td>".$row['dateCreated']."</td>
        <td>".$row['remark']."</td>
        <td class='d-flex justify-content-center'><div class='btn-group' role='group'>
        <button class='btn btn-primary' onClick='editData(".$row['id'].")'><i class='fas fa-edit' style='font-size:24px'></i></button>
        <button class='btn btn-info'><i class='fa fa-eye' aria-hidden='true' style='font-size:24px'></i></button>
        <button onClick='deleteBudget(".$row['id'].")'  class='btn btn-danger'><i class='fa fa-trash' style='font-size:24px'></i></button>
        
        </td>

    </tr>";   
      };
       $table .= "</tbody>";
       echo $table;
    return $table;


}


if (isset($_POST['displaySent'])){
    showdata();
}  
  

function arrayBysql($conn,$sql){
    $stmt = mysqli_stmt_init($conn);
     mysqli_stmt_prepare($stmt,$sql);
     mysqli_stmt_execute($stmt);
     $result = mysqli_stmt_get_result($stmt);
     return $result;


    }

if(isset($_POST['expenseSent'])){
    getExpense();

}
function getExpense(){
//$db = new conn;
//$newconn = $db->getConnection();
//$data = new 

$resultArray =new expenseFill;
$res = $resultArray->getdataExpense();
$table = "<table id='datatbl' class='table table-bordered table-responsive-md'>
<thead>
    <tr>
        <th>#</th>
        <th>Category Name</th>
        <th>Amount</th>
        <th>Date Created</th>
        <th>
            Remark
        </th>
        <th>
            Action
        </th>
    </tr>
</thead><tbody>";

   


while($row=mysqli_fetch_assoc($res)){

$table.= "<tr><td>".$row['id']."</td><td>".$row['categoryName']."</td><td>". $row['amount']."</td><td>". $row['dateCreated']."</td><td>".$row['remark']."</td>";
$table.="<td><div class='btn-group role=group'>
<button class='btn btn-info'><i class='fa fa-trash' aria-hidden='true'></i></button>
<button class='btn btn-danger' onclick='deleteExpense(".$row['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button>
<button class='btn btn-secondary'><i class='fa fa-eye' aria-hidden='true'></i></button>
</div></td></tr>";


}



$table.="</tbody></table>";
echo $table;
return $table;




}
    

    




?>

    



