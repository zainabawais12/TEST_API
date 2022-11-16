<?php
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: DELETE");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $data = json_decode(file_get_contents("php://input"),true);
    
    $Id=$data['Id'];

    include('db.php');
 
    $sql = "DELETE FROM inventory WHERE Id={$Id}";
        
    if(mysqli_query($con, $sql)){
        echo json_encode(array('message' => 'Record deleted successfully. ','status => true'));
    } else{
        echo json_encode(array('message' => 'Record Not deleted updated. ','status => false'));
    }
?>