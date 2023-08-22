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





// insert 


function registerStudent($conn)
{


    $StudentId = $_POST['id']; 
    $StudentName = $_POST['name'];
    $StudentClass = $_POST['class'];
  

    $data = array();

    $query = "INSERT INTO student (id, name, class) VALUES ('$StudentId', '$StudentName', '$StudentClass')";


    $result = $conn->query($query);

    if ($result) {
        $data = array("status" => true, "data" => "Registrated successfully");
    } else {
        $data = array("status" => false, "data" => $conn->error);
    }

    echo json_encode($data);
}


if (isset($action)) {

    $action($conn);
} else {
    echo "Action is requird....";

}







?>