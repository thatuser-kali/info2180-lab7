<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'world';

$conn = mysqli_connect($host, $username, $password, $dbname);
   

if (!$conn){
    die ("Connection failed: " . mysqli_connect_error());
}


$country = $_GET['country'];

$sql = "SELECT * FROM countries WHERE name = '$country' ";
if($result = mysqli_query($conn, $sql)){
    while($get = mysqli_fetch_array($result)){
        echo '<ul>';
        $head_of_state = $get["head_of_state"];
        $name = $get["name"];
        echo '<li>' . $name . " is ruled by " . $head_of_state . '</li>';
        echo '</ul>';
    }
}

if
   
   mysqli_close($conn);
