<?php
session_start();
$myArray = array();
$file1 = fopen("adminsample.txt", "r");
$line1 = "";
while (!feof($file1)) {
    $line1 = fgets($file1);
    if ($line1 != '') {
        array_push($myArray, $line1);
    }
}
