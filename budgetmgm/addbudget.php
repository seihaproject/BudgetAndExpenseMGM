<?php
require_once('../classes.php');
require_once('../function/function.php');
$db = new conn;
$connnew = $db->getConnection();
extract($_POST);

if(isset($_POST['testSent']) && isset($_POST['valCatSent']) && isset($_POST['amtSent']) && isset($_POST['dateCreateSent'])){
$testSent = $_POST['testSent'];
$valCatSent = $_POST['valCatSent'];
$amtSent = $_POST['amtSent'];
$dateCreateSent = $_POST['dateCreateSent'];
//print_r($amtSent);

/*

$sql ="insert into budgets(categoryId,amount, dateCreated,remark)values(?,?,?,?)";
$stmt = mysqli_stmt_init($connnew);
mysqli_stmt_prepare($stmt,$sql);
mysqli_stmt_bind_param($stmt,'ssss',$valCatSent,$amtSent,'$dateCreateSent','$testSent');
$status = "add succesfully";
//$result = mysqli_stmt_get_result($stmt);
//$row = $result->num_rows;
$result= mysqli_stmt_execute($stmt);

*/
$sql ="insert into budgets(categoryId,amount, dateCreated,remark)values($valCatSent,$amtSent,'$dateCreateSent','$testSent')";
$result = mysqli_query($connnew,$sql);

//$status = "";
$status = "add succesfully";
if($result){
    echo $status;;
}

    
}



?>
<?php
showdata();

?>