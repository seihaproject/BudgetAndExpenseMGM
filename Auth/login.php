<?php
session_start();
require_once('../classes.php');
require_once('../function/function.php');
$db = new conn;
$conn = $db->getConnection();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        

        $username = $password = "";
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(emptyInputstring($username,$password) == TRUE){
            header("location:login.php?error=emptyvalue");
            exit();

        }
        if(invalidUid($username) !== FALSE){
            header("location:login.php?error=invalidchar");
            exit();
        }
        /*
        if(userExist($conn,$username) == TRUE){
            header('location:login.php?error=userexist');
            exit();
        }
        */
        login($conn,$username,$password);
        
     
        //$login = new Login;
      //  $login->setlogin($username,$password);
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<?php include('../include/header.php');?>
<head>
    <style>
        body{margin: 0; padding: 0;background-color:grey}
#loginForm{background-color:whitesmoke;
    border-radius: 3px;
    padding:5px;
    margin: 2px;
    top:270px;
    width: 30%;
    height: auto;
    left:35%;
               position: absolute;
}


        </style>
</head>
<body>
    
    <div class="container" style="position:relative;">
   
   <?php
   /*
        if($_SESSION['add'] == "success"){
            echo $_SESSION['add'];
        }

   */ 
    ?>
    
    
   
        <form id="loginForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
     
        <div class="form-group p-2">
            
                <label></i>User Name</label>
                <input type="text" class="form-control" name="username" id="">
                
        </div>
            <div class="form-group p-2">
                <label><i class='fas fa-key' style='font-size:12px'></i>&nbsp;&nbsp;Password</label>
                <input type="password" class="form-control" name="password" id="">
                
            </div>
            <div class="form-group p-2">
                
                <button type="submit" class="btn btn-danger">Log in</button>
                <br>                
               
                
            </div>
            <span class="text-info">Do you have account</span>
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#registerModal">
                    Register
            </button>
            
            <?php
                if(isset($_GET['error'])){

                    if($_GET['error']=="emptyvalue"){

                        echo "<br><span class='text-danger'>You haven't the value in the field, put it</span>";
                    }
                    else if($_GET['error'] == "invalidchar"){

                        echo "<br><span class='text-danger'>You must right character</span>";
                    }
                    else if($_GET['error']== "userexist"){
                        echo "<br><span class='text-danger'>user exist already</span>";
                    }
                }
            ?>
            
        </form>

    <br>
    
</div>

<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" class="p-2" id="formRegister" action="">
                        <div class="form-group p-2">
                            <label>First Name</label>
                            <input type="text" id="firstname" name="firstname" placeholder="Put First Name" class="form-control"/>
                        </div>
                        <div class="form-group p-2">
                            <label>Last Name</label>
                            <input type="text" id="lastname" name="lastname" placeholder="Put Last Name" class="form-control"/>
                        </div>
                        <div class="form-group p-2">
                            <label>User Name</label>
                            <input type="text" id="username" name="username" placeholder="Put User Name" class="form-control"/>
                        </div>
                        <div class="form-group p-2">
                            <label>Password</label>
                            <input type="password" id="password" name="password" placeholder="Put Password" class="form-control"/>
                        </div> 

                        <div class="form-group p-2">
                            <label>Password</label>
                            <input type="password" id="repassword" name="repassword" placeholder="Put Password" class="form-control"/>
                        </div> 

                        <div class="form-group p-2">
                            <label>upload photo</label>
                            <input type="file" id="filephoto" name="filephoto" class="form-control">
                        </div>
                        <div class="form-group p-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <input type="hidden" name="operation" id="operation" />  
                        </div>

            </form>

      </div>
      
    </div>
  </div>
  <?php
    if(isset($_GET['errorRegister'])){
        if($_GET['errorRegister']){
            echo "<span class='text-danger'>Please complete the empty field</span>";

        }


    }
  ?>
</div>







   


</body>
</html>
<script>
    $(document).ready(function(){
      $('#title').text('Add User');
      $('#formRegister')[0].reset();
      $('#operation').val('add');

      



    });
    $(document).on('submit','#formRegister',function(){
        event.preventDefault();
        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        var username = $('#username').val();
        var password = $('#password').val();
        var repassword = $('#repassword').val();

       if( validfield(firstname,lastname,username,password,repassword)){
            
        //return false;
       }

        
        if(matchpassword(password,repassword)){
         //   return false;
        }
            

        var extention = $('#filephoto').val().split('.').pop().toLowerCase();
        if(extention != ""){
            if(jQuery.inArray(extention, ['gif','png','jpg','jpeg']) == -1)
            {
                alert("Invalid Image File");
                $('#filephoto').val('');
                return false;
            }


        }
        $.ajax({
            method:'post',
            url:'register.php',
            data: new FormData(this),
            contentType:false,
            processData:false,
            success: function(data,status){
                console.log('data insert');
                Swal.fire('You have insert successfully')
                
                
              
                $('#formRegister')[0].reset();
                $('#registerModal').modal('hide')

            }


        })
         

        




        })


</script>
