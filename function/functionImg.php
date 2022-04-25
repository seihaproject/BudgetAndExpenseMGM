<?php
function getimage(){
    if(isset($_FILES['filephoto'])){
        $imagename = $_FILES['filephoto']['name'];
        $extension = explode('.',$imagename);
        $newimagename = rand().'.'.$extension[1];
        $destination = "../public/image/".$newimagename;
        move_uploaded_file($_FILES['filephoto']['tmp_name'],$destination);

        return $newimagename;

    }


}


?>