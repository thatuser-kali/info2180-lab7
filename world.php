<?php

$host = 'localhost';
$username ='root';
$password = '';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);


    if(isset($_GET)){
                
        if(array_key_exists("all", $_GET) && $_GET['all'] === 'true'){
            $stmt = $conn->query("SELECT * FROM countries");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                echo '<div class="modal-content"> <span class="off">&times;</span><h1>All Results</h1>';
                    
            
                echo '<ul>';
                foreach ($results as $row) {
                  echo '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] . '</li>';
                }
                echo '</ul>';
        
        }
        
        else if(array_key_exists("country", $_GET)){
            $country = $_GET['country'];
            $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%' ");

                echo '<div class="modal-content"><span class="off">&times;</span><h1>Search Results</h1>';

                echo '<ul>';
                foreach ($stmt as $row) {
                  echo '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] . '</li>';
                }
                echo '</ul>';
        }
        
    }
    if(!isset($_GET)){
        if(array_key_exists("country", $_GET)){
            $country = $_GET['country'];
            $stmt = $conn->query("SELECT null FROM countries");
            while (array_key_exists("all", $_GET) && $_GET['all'] !== 'true'){
                
                echo '<div class="modal-content"><span class="off">&times;</span>NO REULTS REQUESTED </div>' ;
                
            }
        }
    }
