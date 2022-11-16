<?php
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $data = json_decode(file_get_contents("php://input"),true);
    
    $Name=$data['Name'];
    $Quantity=$data['Quantity'];
    $Price=$data['Price'];
    $Category=$data['Category'];

    include('db.php');
 
    $sql = "INSERT INTO inventory(Name, Quantity, Price, Category) VALUES ('{$Name}',{$Quantity},{$Price},'{$Category}')";
        
    if(mysqli_query($con, $sql)){
        echo json_encode(array('message' => 'Record created successfully. ','status => true'));
    } else{
        echo json_encode(array('message' => 'Record Not created. ','status => false'));
    }
?>