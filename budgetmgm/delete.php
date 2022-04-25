<?php
require_once('../classes.php');
$db = new conn;
$newconn = $db->getConnection();
    if(isset($_POST['idSent'])){
        $id = $_POST['idSent'];
        $sql="delete from budgets where id= $id";
        $result = mysqli_query($newconn,$sql);
        $status = "delete success fully";
        if($result){
            echo $status;
        }

        
        
    }

?>
<?php
    
    showdata();
    
    
?>