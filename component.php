<?php require_once 'act/connect.php';
error_reporting(E_ERROR); 

$comp_id = $_GET['id'];
$comp_t = $_GET['t'];
$sql = "SELECT * FROM `$comp_t` WHERE id = $comp_id";
$comp = mysqli_query($connect, $sql);
$comp = mysqli_fetch_assoc($comp);
?>

<head>


    
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title><?=$comp['name']?></title>


<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/script.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href = "css/jquery-ui.css" rel = "stylesheet">


<!-- Custom CSS -->
<link href="css/style.css" rel="stylesheet">
</head>

<body>
<?php
    session_start();
    if($_SESSION['user'] == ''):
    ?>


    <?php else: ?>

    
    <?php endif;?>

    <?php include "./header.php"; ?>

    <div class="container">


    <h2>#<?=$comp['id']?> <?=$comp['name']?></h2><br>
    <p><?=$comp['text']?></p>
    <img src="<?=$comp['image']?>" alt=""> 



<?php


$res = mysqli_query($connect, $sql);
while ( $row = mysqli_fetch_assoc($res) ) {
    $idlist = $row['id_list'];
    $qe = explode(',', $idlist);
    $element = count($qe);

?>
<ul>

 
<?php
$comptk = $comp['typekit'];
for($i=0; $i < $element; $i++) {
    $sql = "SELECT * FROM `$comptk` WHERE id = '$qe[$i]'";
    while ( $row = mysqli_fetch_assoc(mysqli_query($connect, $sql)) ) {
        $id = $row['id'];
        $name = $row['name'];
        ?>
        <a href="component.php?id=<?=$id;?>"><li type="disc">- <?=$id;?> <?=$name;?> <a href="act/upd.php?id=<?=$id;?>&cid=<?=$comp_id;?>&<?=$comptk;?>">DELETE</a> </li></a>
        <?php
        break;
    }


};
};
?>
</ul>




    </div> 

<script src="./js/script.js"></script>
</body>
</html>