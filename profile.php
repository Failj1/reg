<?php require_once 'act/connect.php';
error_reporting(E_ERROR | E_PARSE);


include('database_connection.php');

?>

<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Главная</title>

    
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

    
<!-- Проверка на авторизацию -->


<?php include "auth.php"; ?>

<?php else: ?>



    <?php include "header.php" ?>
    <!-- Page Content -->
    <div class="wrapper">
  <div class="container_card">
    <img src="<?= $_SESSION['user']['avatar'] ?>" alt="" class="profile-img">
    
    <div class="content_card">
      <div class="sub-content">
        <h1>Профиль</h1>
        <span></span>
        <span></span>
        <p>Логин - <?=$_SESSION['user']['login']?></p>
        <p>Имя - <?=$_SESSION['user']['full_name']?></p>
        
        <span class="location"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
        <a href=""></a>
      </div>
      <div class="data_card">
        <div class="inner-data">
          <span><i class="fa fa-users" aria-hidden="true"></i></span>
          <p></p>
        </div>
        <div class="inner-data">
          <span><i class="fa fa-twitter-square" aria-hidden="true"></i></span>
          <p></p>
        </div>
        <div class="inner-data">
          <span><i class="fa fa-user-plus" aria-hidden="true"></i></span>
          <p></p>
        </div>
      </div>
     
    </div>
  </div>
</div>



<script>




function submitAction() {
    document.data.submit();
}

function submitAction1() {
    document.exp.submit();
}


</script>

<?php endif;?>


</body>














