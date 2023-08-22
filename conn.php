<?php 


$conn = new mysqli("localhost","root","","demo");
if($conn->connect_error){
    echo $conn->error;
}

?>