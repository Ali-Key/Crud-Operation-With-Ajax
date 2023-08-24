<?php

header("Content-type:  application/json");

// Function readall
// Function insert
// Function update
// Function delete

include "conn.php";


$action = $_POST['action'];


// read
function readAll($conn)
{

    $data = array();

    $message = array();

    $query = "SELECT * FROM student";
    $result = $conn->query($query);

    if ($result) {

        while ($row = $result->fetch_assoc()) {

            $data[] = $row;
        }

        $message = array("status" => true, "data" => $data);
    } else {
        $message = array("status" => false, "data" => $conn->error);

    }
    echo json_encode($message);


}

function fectch_single_student_info($conn)
{

    $data = array();

    $message = array();
    $id = $_POST['id'];


    $query = "SELECT * FROM student WHERE Id = '$id'"; 
    $result = $conn->query($query);

    if ($result) {
        while ($row = $result->fetch_assoc()) {

            $data []= $row;
        }

        $message = array("status" => true, "data" => $data);

    } else {

        $message = array("status" => false, "data" => $conn->error);

    }
    echo json_encode($message);


}



// insert 
function register_student_api($conn){
    extract($_POST);

    $message = array();

    $query = "Insert into student (Id,Name,Class) values ('$id','$name','$class')";

    $result = $conn->query($query);

    if($result){

        $message = array("status" => true, "data" => "Inserted successfully");
    }else{
        $message = array("status" => false, "data" => $conn->error);
    }
    echo json_encode($message);
}



function update_student_api($conn)
{


    $StudentId = $_POST['id']; 
    $StudentName = $_POST['name'];
    $StudentClass = $_POST['class'];
  

    $data = array();

    // $query = "UPDATE  student set  Name = '$StudentName', Class = '$StudentClass' where Id = '$StudentId'";
    $query = "UPDATE `student` SET `Name`='$StudentName',`Class`='$StudentClass'  WHERE `Id`='$StudentId'";


    $result = $conn->query($query);

    if ($result) {
        $data = array("status" => true, "data" => "Updated successfully");
    } else {
        $data = array("status" => false, "data" => $conn->error);
    }

    echo json_encode($data);
}

function delete_student_info($conn){
    $message = array();
    $id = $_POST['id'];
    $query = "DELETE FROM student WHERE Id = '$id'";

    $result = $conn->query($query);

    if($result){
        $message = array("status" => true, "data" => "Deleted successfully");
    }else{
        $message = array("status" => false, "data" => $conn->error);

    }

    echo json_encode($message);
}

if (isset($action)) {

    $action($conn);
} else {
    echo "Action is requird....";

}







?>