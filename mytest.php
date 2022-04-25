<?php
require_once('classes.php');
$toyota = new car;
echo ($toyota::getcolor());
$db = new conn;
$conConnect = $db->getConnection();
$sql = "select * from categories";
$result = mysqli_query($conConnect,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
        <tr><th>My test</th></tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_array($result)){?> 
            
            <tr>
                <td><?php echo $row['id'] ; ?></td>
            </tr>
         <?php };?>
        </tbody>
    </table>
</body>
</html>