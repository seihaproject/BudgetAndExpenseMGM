<?php
require_once('../classes.php');
$db =new conn;
$newconn = $db->getConnection();
if(isset($_POST['startdateSent']) && isset($_POST['enddateSent'])){
    $startdate = $_POST['startdateSent'];
    $enddate = $_POST['enddateSent'];
    $sql = "select budgets.id, budgets.amount, categories.categoryName, budgets.dateCreated, budgets.remark from budgets inner join categories on budgets.categoryId = categories.id where budgets.dateCreated >= ? and budgets.dateCreated <=?";
    $stmt = mysqli_stmt_init($newconn);
    if(mysqli_stmt_prepare($stmt,$sql)){
        mysqli_stmt_bind_param($stmt,'ss',$startdate,$enddate);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    $table = "<table class='table table-bordered caption-top id='budgetreport'><thead>";
    $table.="<tr><th>#</th><th>Entry Datetime</th><th>Category</th><th>Amount</th><th>Remark</th></tr></thead><tbody>";
    while($row = mysqli_fetch_array($result)){
        $table.="<tr><td>".$row['id']."</td><td>".$row['dateCreated']."</td>";
        $table.="<td>".$row['categoryName']."</td><td>".$row['remark']."</td>";
        $table.="<td>".$row['amount']."</td></tr>";
     
        

    }
    $table.="</tbody></table>";
    echo $table;
  //  $test = "test";
  //  echo $test;
    }
   

    



}


?>

