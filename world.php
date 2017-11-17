<?php

$host = 'localhost';
$username ='root';
$password = '';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);


if (!empty($_GET)) {

    if (array_key_exists("all", $_GET) && $_GET['all'] === 'true'){
        $stmt = $conn->query("SELECT * FROM countries");
    
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo '<div class="modal-content">
    <span class="close">&times;</span><h1>Search Results</h1>';
    
        echo '<ul>';
        foreach ($results as $row) {
          echo '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] . '</li>';
        }
        echo '</ul>';
        echo '</div>';
        
    }
    else if (array_key_exists("country", $_GET)){
        $country = '"' . $_GET['country'] . '"';
        $stmt = $conn->query("SELECT * FROM countries WHERE name = $country");
        
        echo '<div class="modal-content">
    <span class="close">&times;</span><h1>Search Results</h1>
    ';
    
        $data =  '<ul>';
        foreach ($stmt as $row) {
          $data.= '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] . '</li>';
        }
        $data .= '</ul>';
        $data.= '</div>';
        echo $data;
    }
    
}else{
    $data = '<div class="modal-content">
    <span class="close">&times;</span> No country was requested </div>';
    echo $data;
}
