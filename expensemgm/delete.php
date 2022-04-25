<?php
    require_once('../classes.php');
    require_once('../function/function.php');
    $db = new conn;
    $newconn = $db->getConnection();
    if(isset($_POST['idSent'])){
        $id = $_POST['idSent'];
        $sql = "delete from expenses where id =?";
        $stmt = mysqli_stmt_init($newconn);
        if(mysqli_stmt_prepare($stmt,$sql)){
            mysqli_stmt_bind_param($stmt,'s',$id);
            mysqli_stmt_execute($stmt);
         
         
           

        }
        mysqli_stmt_close($stmt);
    

    }

?>
<?php
  getExpense();
?>
