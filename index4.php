<?php
include('config.php'); //zawiera połączenie z pdo

$pdo = GetPDO();
$sql = 'SELECT * FROM `clients` LIMIT 10';
$c = GetPDO()->prepare($sql);
$c->execute();
$result = $c->fetchAll();

foreach($result as $row) {
    echo $row['name'].' '.$row['surname'].'<br>';
}


echo'<br>';

$cc = mysqli_connect('localhost','root','','phpcamp_hrzadzinski');

$sql = "SELECT * FROM `clients` LIMIT 10";
$result2 = $cc->query($sql); //obydwa działają
$result2 = mysqli_query($cc,$sql); //działa

foreach($result2 as $row2){
    echo $row2['name'].' '.$row2['surname'].'<br>';
    //echo var_dump($row2);
}

