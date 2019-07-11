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
    fetchDB();
    echo "\r\nGet method";
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
    $serverName = "prodserver.database.windows.net"; // update me
    $connectionOptions = array(
        "Database" => "student", // update me
        "Uid" => "adminuser", // update me
        "PWD" => "Password1" // update me
    );
    // Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    // Write your query here
    $tsql= "SELECT * from grade_one";
    // Fetch the data from the database
    $getResults= sqlsrv_query($conn, $tsql);
    echo ("Reading data from table\n" . PHP_EOL);
    // Handle server error 
    if ($getResults == FALSE)
        echo (sqlsrv_errors());
    // Print out the fetched data. 
    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
     echo ($row['id'] . " " . $row['firstname'] . " " . $row['age'] . PHP_EOL);
    }
    // Free all resources for the specified statment
    sqlsrv_free_stmt($getResults);
}
?>
