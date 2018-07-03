<?php 
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'phpcamp_pz';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
#Wyświetlanie klienta start
$sql = "SELECT COUNT(id) AS rekordow FROM clients";
$result = $conn->query($sql);
$liczba_klientow = $result->fetch_assoc();
$liczba_klientow = $liczba_klientow['rekordow'];
$na_stronie = 100;
$liczba_stron = ceil($liczba_klientow / $na_stronie);
for($i=1; $i<=$liczba_stron; $i++)
{
	echo '<a href="?strona='.$i.'">Strona '.$i.'</a> | ';
}

if (isset($_GET['strona']))
{
	if ($_GET['strona'] < 1 || $_GET['strona'] > $liczba_stron){
		$strona = 1;
	}
	else{
		$strona = $_GET['strona'];
	}
}
else{
	$strona = 1;
}

$od = $na_stronie * ($strona - 1);
$sql = "SELECT * FROM clients ORDER BY id DESC LIMIT $od , $na_stronie";
$result = $conn->query($sql);
echo '<h2>Strona '.$strona.' - rekordów '.$na_stronie.'</h2>';
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo 'id: ' . $row['id']. ' imie: ' .$row['name']. ' nazwisko: ' .$row['surname']. ' płeć: ' .$row['gender']. ' data urodzenia: ' .$row['date_of_birth']. '<br/>';
    }
} else {
    echo "0 results";
}
#Wyświetlanie klienta end
$conn->close();
?>