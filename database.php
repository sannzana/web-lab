<?php
$hostname="localhost:3302";
$dbuser="root";
$dbpass="";
$dbname="data";



$conn=mysqli_connect($hostname,$dbuser,$dbpass,$dbname);
if(!$conn)
{
    die("Something went wrong");
}
?>