<?php

$camp = array();

$camp[1] = "Gabriela";
$camp['1'] = "Woronowska";
$camp[1.99] = "Szczecin";
$camp[true] = "Gniewko";

$camp[4] = "Cztery";
$camp[5] = 'Kot ma Alę';
unset($camp[5]);
$camp[] = "Ala też zawsze ma 'jakieś ale'";

for($i=1;$i<=5;$i++)
{
  $camp[] = $i;
}

echo var_dump($camp);

?>