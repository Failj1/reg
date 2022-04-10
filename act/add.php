<?php require_once 'connect.php';
session_start();



if(isset($_POST['go'])) {
$name = $_POST['name'];
$text = $_POST['text'];
$kind = $_POST['kind'];
$nametype = $_POST['nametype'];
$id_list = $_POST['compid'];
$typekit = $_POST['typekit'];
$amount = $_POST['amount'];
$storage = $_POST['storage'];
$product_quantity = 10;
$product_status = 1;




$path = 'uploads/components/' . time() . $_FILES['imagec']['name'];
move_uploaded_file($_FILES['imagec']['tmp_name'], '../' . $path);


if($nametype != "") {
    $sql = "INSERT INTO `types` (`id`, `nametype`)
    VALUES (NULL, '$nametype')";
    mysqli_query($connect, $sql);
    $sql = "SELECT id_t FROM types WHERE nametype = '$nametype'";
    $res = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($res);
    $id_nametype = $row["id_t"];

} 

if ($nametype == "components") {
    $sql = "INSERT INTO `components` (`id`, `name`, `text`, `kind`, `amount`, `storage`, `image`, `id_types` , `product_quantity`, `product_status`)
    VALUES (NULL, '$name', '$text', '$kind', '$amount', '$storage', '$path', '$id_nametype', '$product_quantity', '$product_status')";
    mysqli_query($connect, $sql);
    
} 

if ($nametype == "device") {
    $sql = "INSERT INTO `device` (`id`, `name`, `text`, `kind`, `amount`, `storage`, `image`, `id_types` , `product_quantity`, `product_status`)
    VALUES (NULL, '$name', '$text', '$kind', '$amount', '$storage', '$path', '$id_nametype', '$product_quantity', '$product_status')";
    mysqli_query($connect, $sql);
}

if ($nametype == "kit") {
    $sql = "INSERT INTO `kit` (`id`, `name`, `text`, `storage`, `amount`, `image`, `id_list`, `typekit`, `product_quantity`, `product_status`)
    VALUES (NULL, '$name', '$text', '$storage', '$amount', '$path', '$id_list', '$typekit', '$product_quantity', '$product_status')";
    mysqli_query($connect, $sql);
}

header('location: ../index.php');

};




?>
