<?php 
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'phpcamp_pz';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM clients ORDER BY id DESC LIMIT 100";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo 'id: ' . $row['id']. 'imie: '.$row['surname'].'<br/>';
    }
} else {
    echo "0 results";
}
$conn->close();
?> 