<?php

    $dataconnection = array(
        'server' => 'localhost',
        'user' => 'root',
        'password'=>'',
        'db'=>'bmgm',


    );
    $table = 'usersnew';
    $primarykey = 'id';
    $columns = array(
        array('db'=>'id','dt'=>0),
        array('db'=>'name','dt'=>1),
        array('db'=>'email','dt'=>2),
        array( 
            'db' => 'created_at', 
            'dt' => 3, 
            'formatter' => function( $d, $row ) { 
            return date( 'jS M Y', strtotime($row['created_at'])); 
            } 
            ), 
            array( 
                'db'        => 'id',
                'dt'        => 4, 
                'formatter' => function( $d, $row ) { 
                return '<a href="javascript:void(0)" class="btn btn-primary btn-edit" data-id="'.$row['id'].'"> Edit </a> <a href="javascript:void(0)" class="btn btn-danger btn-delete ml-2" data-id="'.$row['id'].'"> Delete </a>'; 
                } 
            ), 
                

        );

    include('ssp.php'); 
// Output data as json format 
echo json_encode(SSP::simple( $_GET, $dataconnection, $table, $primarykey, $columns ));

/*
require_once('../../classes.php');
$db = new conn;
$newcon = $db->getConnection();
$columns = array('name','email','created_at');
$query = "SELECT * FROM usersnew ";
$number_filter_row = mysqli_num_rows(mysqli_query($newcon, $query));
$result = mysqli_query($newcon, $query);

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

function get_all_data($newcon)
{
 $query = "SELECT * FROM usersnew";
 $result = mysqli_query($newcon, $query);
 return mysqli_num_rows($result);
}
$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="name">' . $row["name"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="email">' . $row["email"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="created_at">' . $row["created_at"] . '</div>';
 
 $data[] = $sub_array;
}




$output = array(
    "draw"    => intval($_POST["draw"]),
    "recordsTotal"  =>  get_all_data($connect),
    "recordsFiltered" => $number_filter_row,
    "data"    => $data
   );
   
   echo json_encode($output);
   */

?>