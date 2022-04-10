<?php 

require_once 'connect.php';

$id = $_GET['id'];
$comp_t = $_GET['t'];


$sql = "DELETE FROM $comp_t WHERE `$comp_t`.`id` = '$id'";
mysqli_query($connect, $sql);

header("Location: ".$_SERVER['HTTP_REFERER']);