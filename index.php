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
    <div class="container">
    <div class="btn_panel">
        <input name="btnSubmit" id="btn_panel" onclick="submitAction1()" type="button" value="Создать отчёт"></input>
        <input name="btnSubmit" id="btn_panel" onclick="submitAction()" type="button" value="Создать компонент"></input>
    </div>

        <div class="row">
            
            <div class="col-md-3"> 
            <form action="" method="GET">
            <div class="list-group">
					<h3>Тип</h3>
					<?php
                    $query = "SELECT DISTINCT(nametype) FROM types WHERE nametype <> '' ORDER BY nametype DESC";
                    $statement = $connectnew->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    if(isset($_GET['types']))
                    {
                        $checked = $_GET['types'];
                    }
                    $type = implode("", $_GET['types']);
                    ?>
                    <div class="list-group-item checkbox">
                        <label id="lblradio"><input onclick='this.form.submit()' name="types[]" type="radio" class="common_selector nametype" value="<?php echo $row['nametype']; ?>"
                        <?php if(in_array($row['nametype'], $checked)){ echo "checked"; } ?>> <?php echo $row['nametype']; ?></label>
                    </div>
                    <?php
                    }
                    ?>	
            </div>    
                   
				<div class="list-group">
					<h3>Количество</h3>
                    <?php

                    ?>


                <input onblur='this.form.submit()' type="text" name="minimum_price" value="<?php if(isset($_GET['minimum_price'])){echo $_GET['minimum_price']; }else{echo "0";} ?>" class="form-control">


                <input onblur='this.form.submit()' id="mpform" type="text" name="maximum_price" value="<?php if(isset($_GET['maximum_price'])){echo $_GET['maximum_price']; }else{echo "1000";} ?>" class="form-control">
                </div>

                <div class="list-group">
					<h3>Разновидность</h3>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
					<?php

                    $query = "SELECT DISTINCT(kind) FROM `$type` WHERE product_status = '1' AND kind <> '' ORDER BY id DESC";
                    $statement = $connectnew->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    if(isset($_GET['kind']))
                    {
                        $checked = $_GET['kind'];
                    }
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input onclick='this.form.submit()' name="kind[]" type="checkbox" class="common_selector kind" value="<?php echo $row['kind']; ?>"
                        <?php if(in_array($row['kind'], $checked)){ echo "checked"; } ?>> <?php echo $row['kind']; ?></label>
                    </div>
                    <?php
                    }
                    ?>
                    </div>
                </div>
                
				<div class="list-group">
                   
					<h3>Место хранения</h3>
					<?php
                    $query = "SELECT DISTINCT(storage) FROM `$type` WHERE product_status = '1' AND storage <> '' ORDER BY storage DESC";
                    $statement = $connectnew->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    if(isset($_GET['storage']))
                    {
                        $checked = $_GET['storage'];
                    }
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input onclick='this.form.submit()' name="storage[]" type="checkbox" class="common_selector storage" value="<?php echo $row['storage']; ?>"
                        <?php if(in_array($row['storage'], $checked)){ echo "checked"; } ?>> <?php echo $row['storage']; ?></label>
                    </div>
                    <?php
                    }
                    ?>	
                </div>
            </form> 
            </div>  

            <div class="col-md-9">
            	<br />

<?php

if(isset($_GET['types']))
{
    $typ_filter = join('', $_GET["types"]);
    $query = "SELECT * FROM `$typ_filter` WHERE product_status = '1'";
}


if(isset($_GET["minimum_price"], $_GET["maximum_price"]) && !empty($_GET["minimum_price"]) && !empty($_GET["maximum_price"]))
{
    $query .= "
     AND amount BETWEEN '".$_GET["minimum_price"]."' AND '".$_GET["maximum_price"]."'
    ";
}
if(isset($_GET['kind']))
{
    $kind_filter = implode("','", $_GET["kind"]);
    $query .= "
     AND kind IN('".$kind_filter."')
    ";
}

if(isset($_GET['storage']))
{
    $storage_filter = implode("','", $_GET["storage"]);
    $query .= "
     AND storage IN('".$storage_filter."')
    ";
}

$statement = $connectnew->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();
if($total_row > 0) {
    ?>	
        <form name="exp" action="export.php?q=<?php echo $query; ?>" method="post" enctype="multipart/form-data">
        </form>
        <form name="data" action="component_add.php?q=<?php echo $query; ?>" method="get" enctype="multipart/form-data">
        <input type="hidden" name="tnm" value="<?php echo $type;?>">
        <table id="table">
        <tr>
        <th class="reph"></th>
        <th class="reph">ID</th>
        <th class="reph">Название</th>	
        <th class="reph">Количество</th>
        <th class="reph">Тип</td>
        <th class="reph">Место Хранения</th>
        <th class="reph">Действия</th>

        <a href="component.php?id=<?=$id;?>"></a>
        </tr>

        <?php
        foreach($result as $row) {
        ?>            
            <tr class="uy">
            <td class="rep"><input type="checkbox" name="kit[]" value="<?=$row['id'];?>"></td>
            <td class="rep"><?=$row['id'];?></td>
            <td class="rep"><a href="component.php?id=<?=$row['id'];?>&t=<?=$typ_filter;?>"><?=$row['name'];?></a></td>
            <td class="rep"><?=$row['amount'];?></td>
            <td class="rep"><?=$row['kind'];?></td>
            <td class="rep"><?=$row['storage'];?></td>
            <td class="rep"><a href="comp_upd.php?id=<?=$row['id'];?>&t=<?=$typ_filter;?>"><img class="ind_svg" src="./uploads/svg/mdi_pencil.svg" alt=""> </a>
            <a href="act/del.php?id=<?=$row['id'];?>&t=<?=$typ_filter;?>"> <img class="ind_svg" src="./uploads/svg/mdi_delete.svg" alt=""> </a></td>

            </tr>
            
    <?php
        }

    } else {
        $output = '<h3>Не найдено</h3>';
    }

    
    



?>


                <div class="row filter_data">

                </div>



                </table>   

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

</html>