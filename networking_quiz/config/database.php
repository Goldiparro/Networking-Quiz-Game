<?php
/**
 * Database Configuration
 */

$servername = 'localhost';
$username   = 'root';
$password   = '';
$dbname     = 'networking';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die('DB CONNECTION FAILED: ' . $conn->connect_error);

    $sql = "DELETE FROM results WHERE created_at <NOW() - INTERVAL 1 DAY";
    if ($conn->query($sql)== TRUE){
        echo "Old records deleted successfully";
    }else{
        echo "Error deleting records:".
            $conn->error;
    }
}