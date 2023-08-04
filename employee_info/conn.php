
<?php
$conn = new mysqli("localhost","root","","employee_management_system");
if($conn->connect_error){
    echo $conn->error;
}
?>