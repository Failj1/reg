<?php 

require_once 'connect.php';
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);




if(isset($_GET['cid'])) {
    $id = $_GET['id'];
    $cid = $_GET['cid'];
    $sql = "SELECT * FROM `kit` WHERE id = $cid";
    $comp = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($comp);

    $id_list = $row['id_list'];

    $chars = [",$id", "$id,", "$id"]; 
    $id_list = str_replace($chars, '', "$id_list");


    $sql = "UPDATE `kit` SET `id_list`='$id_list' WHERE `kit`.`id` = '$cid';";

    

    $run = mysqli_query($connect, $sql);

    if($run) {
        header('location: ../component.php?id='.$cid.'');
    } else {
        print_r("error");
    }


};




if(isset($_POST['go'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $text = $_POST['text'];
    $kind = $_POST['kind'];
    $amount = $_POST['amount'];
    $storage = $_POST['storage'];
    $product_quantity = 10;
    $product_status = 1;

    $sql = "UPDATE `components` SET `name`='$name',`text`='$text',`kind`='$kind',`amount`='$amount',`storage`='$storage' ,`product_quantity`='10',
    `product_status`='1' WHERE `components`.`id` = '$id';";

    

    $run = mysqli_query($connect, $sql);

    if($run) {
        header('location: ../index.php');
    } else {
        print_r("error");
    }


};





?>