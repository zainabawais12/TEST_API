<?php
header("Content-Type:application/json");
if (isset($_GET['Id']) && $_GET['Id']!=""){
    include('db.php');
	$Id = $_GET['Id'];
	$result = mysqli_query(
	$con,
	"SELECT * FROM `inventory` WHERE Id=$Id");
	if(mysqli_num_rows($result)>0){
	$row = mysqli_fetch_array($result);
    $Id=$row['Id'];
    $Name=$row['Name'];
    $Quantity=$row['Quantity'];
    $Price=$row['Price'];
    $Category=$row['Category'];
	response($Id, $Name, $Quantity, $Price, $Category);
	mysqli_close($con);
}
}
else {
    include('db.php');
	$result = mysqli_query(
	$con,
	"SELECT * FROM `inventory`");
	if(mysqli_num_rows($result)>0){
	$row = mysqli_fetch_array($result);
    $Id=$row['Id'];
    $Name=$row['Name'];
    $Quantity=$row['Quantity'];
    $Price=$row['Price'];
    $Category=$row['Category'];
	response($Id, $Name, $Quantity, $Price, $Category);
	mysqli_close($con);
    }
}

function response($Id, $Name, $Quantity, $Price, $Category){
	$response['Id'] = $Id;
	$response['Name'] = $Name;
	$response['Quantity'] = $Quantity;
	$response['Price'] = $Price;
    $response['Category'] = $Category;
	
	$json_response = json_encode($response);
	echo $json_response;
}
?>