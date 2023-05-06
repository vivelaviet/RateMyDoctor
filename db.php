<!-- Viet Nguyen wrote this part 
Simple php code to be included on most of the pages so that the connection to
SQL isn’t redundant.-->
<?php
    // Server name must be localhost
    $servername = "localhost";
    
    // In my case, user name will be root
    $username = "root";
    
    // Password is empty
    $password = "";

    $db="ratemydoctor";
    
    // Creating a connection
    $conn = new mysqli($servername, 
                $username, $password);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failure: " 
            . $conn->connect_error);
    } 

    $sql = "USE ratemydoctor";
    $try= $conn->query($sql);
    
    
    
?>