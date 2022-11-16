<?php
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: PUT");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $data = json_decode(file_get_contents("php://input"),true);
    
    $Id=$data['Id'];
    $Name=$data['Name'];
    $Quantity=$data['Quantity'];
    $Price=$data['Price'];
    $Category=$data['Category'];

    include('db.php');
 
    $sql = "UPDATE inventory SET Name= '{$Name}', Quantity= {$Quantity} , Price={$Price}, Category='{$Category}' WHERE Id=$Id";
        
    if(mysqli_query($con, $sql)){
        echo json_encode(array('message' => 'Record updated successfully. ','status => true'));
    } else{
        echo json_encode(array('message' => 'Record Not updated. ','status => false'));
    }
?>