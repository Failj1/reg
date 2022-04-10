<?php
require_once 'act/connect.php';

$search_get = $_GET['search'];


?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Поиск</title>

    
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

<?php include "header.php"; ?>



<div class="container">


<h2>Результаты поиска: <?php echo $search_get ?></h2><br>



<ul>
<?php

$sql = "SELECT DISTINCT(nametype) FROM types";
$res = mysqli_query($connect, $sql);

$nt = array();
while ($row = mysqli_fetch_assoc($res) ) {
array_push($nt, $row["nametype"]);

};

$el = count($nt);

for($i=0; $i < $el; $i++) {
    $sql = "SELECT * FROM `$nt[$i]` WHERE `name` LIKE '%$search_get%'";
    while ( $row = mysqli_fetch_assoc(mysqli_query($connect, $sql)) ) {
       ?>
        <li><a href="component.php?id=<?=$row['id'];?>&t=<?=$nt[$i];?>"><?=$row['name'];?></a></li>

       <?php
       break;
};

};

?>

</ul>




</div>


<script src="js/script.js"></script>    
</body>
</html>