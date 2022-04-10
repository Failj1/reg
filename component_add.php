<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Добавить</title>


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

<?php require_once 'act/connect.php'; ?>


<?php
    session_start();
    if($_SESSION['user'] == ''):
    ?>

<?php include "auth.php"; ?>

<?php else: ?>


<?php include "header.php" ?>


<div class="container">


<h2 class="hcomp_add">Создать компонент</h2>

<form action="act/add.php" method="post" enctype="multipart/form-data">

<div class="wrp_add">

<p class="pcomp_add">Название</p>
<input class="nameinp_add" type="text" name="name" required placeholder="">

<p class="pcomp_add">Описание</p>
<textarea class="textinp_add" name="text" placeholder=""></textarea>



<p class="pcomp_add">Количество</p>
<input class="sinp_add" type="number" name="amount" placeholder="">

<p class="pcomp_add">Место</p>
<input required class="sinp_add" name="storage" type="text" list="stor" />
<datalist id="stor">
<?php
$sql = "SELECT DISTINCT(storage) FROM components";
$res = mysqli_query($connect, $sql);
while ( $row = mysqli_fetch_assoc($res) ) {
$storage = $row['storage'];
?>
<option value="<?=$storage?>"><?=$storage?></option>
	<?php 
	}
    ?>
</datalist>




<p class="pcomp_add">Изображение</p>
<input class="img_add" type="file" name="imagec" placeholder="">

<p class="pcomp_add">Выбери тип</p>

<input placeholder="Тип детали" class="ksel_add" name="kind" type="text" list="kinds" />
<datalist id="kinds">
<?php
$sql = "SELECT DISTINCT(kind) FROM components";
$res = mysqli_query($connect, $sql);
while ( $row = mysqli_fetch_assoc($res) ) {
$kind = $row['kind'];
?>
<option value="<?=$kind?>"><?=$kind?></option>
	<?php 
	}
    ?>
</datalist>


<input placeholder="Структура" value="<?=$comp['nametype']?>" class="ksel_add" name="nametype" type="text" list="tp" />
<datalist id="tp">
<?php
$sql = "SELECT DISTINCT(nametype) FROM types";
$res = mysqli_query($connect, $sql);
while ( $row = mysqli_fetch_assoc($res) ) {
$nametype = $row['nametype'];
?>
<option value="<?=$nametype?>"><?=$nametype?></option>
	<?php 
	}
    ?>
</datalist>


<input type="hidden" name="typekit" value="<?php echo $_GET['tnm'] ?>">
<?php

if($_GET['kit'] != "") {
    $end = "text";
    $qe = $_GET['kit'];
    $ii = implode(',', $qe);
} else {
    $end = "hidden";
}




?>
<input class="ksel_add" type="<?=$end;?>" name="compid" value="<?=$ii;?>">





<div><input class="btn_add" type="submit" name="go" value="Создать"></div>

</div>

</div>

<?php endif;?>

<script src="./js/script.js"></script>
</body>
</html>