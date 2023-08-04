<?php

header("Content-type: application/json");

include "conn.php";

$action = $_POST['action'];

function employeeRegistration($conn){
    $Employee_ID = $_POST['Employee_ID'];
    $Employee_Name = $_POST['Employee_Name'];
    $Employee_Phone = $_POST['Employee_Phone'];
    $Employee_Address = $_POST['Employee_Address'];
    $Employee_Date = $_POST['Employee_Date'];

    $data = array();

    $query = "insert into employee values('$Employee_ID','$Employee_Name','$Employee_Phone','$Employee_Address','$Employee_Date')";

    $result = $conn->query($query);
    if($result){
        $data = array("status" => true , "data" => "successfully added employee");
    }
    else{
        $data = array("status" => false , "data" => $conn->error);
    }

    echo json_encode($data);
}

function fetchEmployee($conn){

    $data = array();

    $message = array();

    $query = "select * from employee ";

    $result = $conn->query($query);

    if($result){
        while($row = $result->fetch_assoc()){
            $data  []= $row; 
        }
        $message = array("status" => true , "data" => $data );
    }else{
        $message = array("status" => false , "data" => $conn->error );
    }
    echo json_encode($message);
}

function deleteEmployee ($conn){

    $id = $_POST['id'];

    $data = array();

    $query = "delete from employee where id = '$id' ";

    $result = $conn->query($query);

    if($result){
        $data = array("status" => true , "data" => "successfully deleted employee");
    }else{
        $data = array("status" => false , "data" => $conn->error);
    }

    echo json_encode($data);
}

function singleEmployee($conn){
    $data = array();

    $message = array();

    $id = $_POST['id'];

    $query = "select * from employee where id = '$id' ";

    $result = $conn->query($query);

    if($result){
        while($row = $result->fetch_assoc()){
            $data []= $row;
        }
        $message = array("status" => true , "data" => $data);
    }else{
        $message = array("status" => true , "data" => $conn->error);
    }

    echo json_encode($message);
}

function updateEmployee($conn){
    $id = $_POST['Employee_ID'];
    $name = $_POST['Employee_Name'];
    $phone = $_POST['Employee_Phone'];
    $address = $_POST['Employee_Address'];
    $date = $_POST['Employee_Date'];

    $data = array();

    $query = "update employee set name = '$name' , phone = '$phone' , address = '$address' ,
    date = '$date'  where id = '$id' ";

    $result = $conn->query($query);

    if($result){
        $data = array("status" => true , "data" => "successfully updated employee");
    }else{
        $data = array("status" => true , "data" => $conn->error);
    }

    echo json_encode($data);
}

if(isset($action)){
    $action($conn);
}else{
    echo "Error: actions not required! " . $conn->error;
}

?>