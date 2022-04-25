<?php
require_once('../classes.php');
require_once('../function/function.php');
$db =new conn;
$newcon = $db->getConnection();
extract($_POST);
if( isset($_POST['txtcatSent']) && isset($_POST['txtAmountSent']) && isset($_POST['dateCreateSent']) && isset($_POST['textnoteSent'])){
    $txtcat = $_POST['txtcatSent'];
    $txtamt = $_POST['txtAmountSent'];
    $datecreate = $_POST['dateCreateSent'];
    $txtnote = $_POST['textnoteSent'];
$sql ="insert into expenses(categoryId,amount,dateCreated,remark)values(?,?,?,?)";
$stmt = mysqli_stmt_init($newcon);
            if(mysqli_stmt_prepare($stmt,$sql)){ 

                mysqli_stmt_bind_param($stmt,'ssss',$txtcat,$txtamt,$datecreate,$txtnote);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                echo "add successfully";


            }




}



?>
<?php
    getExpense();
?>
