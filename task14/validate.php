<?php
class validate{
public function validate($e_id)
        {

            if (isset($_POST['emails'])) {
                $e_id = $_POST['emails'];
                if(empty($e_id)){
                 $errMsg = "Enter Email id";
                 echo $errMsg;
                 return false;

                }
                else{
                    $e_id = $_POST['emails'];
                }

                if (!filter_var($e_id, FILTER_VALIDATE_EMAIL)) {
                    $errMsg = "Invalid email format";
                    echo $errMsg;
                    return false;


                  }
                  else{
                    $e_id = $_POST['emails'];                }
                // echo $return = $e_id; 
                //var_dump($query);
                
        }
    }
}
    $obj=new validate();
    $obj->validate($e_id)
?>

