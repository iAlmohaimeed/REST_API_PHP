<?php 
// Hold HTTP request type
$request_method = $_SERVER['REQUEST_METHOD'];

switch($request_method){
    case "GET":
        // If HTTP request is GET.
        doGet();
        break;
    case "POST":
        /// If HTTP request is POST.
        doPost();
        break;
}

function doGet(){
    echo "Get method";
}

function doPost(){
    echo "Post method";
}
/* This function is responsible for fetching the data from the DB.
   @param:
        address: DB server address
        username: Username to access DB.
        password: Password to access DB.
        db_name: DB name. 
    @return 
*/
function fetchDB(){
    $dbconnect = mysqli_connect('localhost', 'root', 'password', "testStudent.sql");
    $query = mysqli_query($dbconnect, "USE testStudent;");
    $query = mysqli_query($dbconnect, "SELECT * FROM student;");
    $data = mysqli_fetch_assoc($query);
    print_r($data);
}
?>