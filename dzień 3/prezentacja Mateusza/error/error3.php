<?php

error_reporting(E_ALL | E_NOTICE);

if (!isset($value)) {
    trigger_error('Brak zmiennej $value', E_USER_WARNING);
}

var_Dump($value['a']['b']);
