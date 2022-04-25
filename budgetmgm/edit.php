<?php
require_once('../classes.php');
$db = new conn;
$newconn = $db->getConnection();
if(isset($_POST['idSent'])){
    $id = $_POST['idSent'];
    $sql = "select budgets.id, budgets.amount, categories.id as catid, categories.categoryName, budgets.dateCreated, budgets.remark from budgets inner join categories on budgets.categoryId = categories.id where budgets.id = $id";
    $result = mysqli_query($newconn,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $response = $row;
    }
    echo json_encode($response);

}


?>