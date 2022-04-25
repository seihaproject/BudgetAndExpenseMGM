<?php
    function emptyInputstring($firstname,$lastname){
        $result = "";
        if (empty($firstname) || empty($lastname)){
            $result = true;
            
    
        }else{
    
            $result = false;
        }
        return $result;
    
    
    }
    

?>