<?php


$servername='https://www.000webhost.com/';
$user='id13935948_jbc_infoindex';
$pass='Rimpa@0702065';
$database='id13935948_jbcinfoindex';

$con = new mysqli($servername,$user,$pass,$database);
mysqli_set_charset($con,"utf8");
if($con->connect_error){
    die("Connection Failed".$con->connect_error);
}

$jbc_product = array();
$sql = "SELECT  pname,pdetails from jbc_product";

$stmt = $con->prepare($sql);
$stmt->execute();
$stmt->bind_result($pname,$pdetails);

while($stmt->fetch()){
    $temp =[
        'pname' => $pname,
        'pdetails' => $pdetails
    ];
    
    array_push($jbc_product,$temp);
}
echo json_encode($jbc_product,JSON_UNESCAPED_UNICODE);