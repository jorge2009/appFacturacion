<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="estilo/app.css">
   
    <!-- CSS only -->
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
      <script src="js/menu.js"></script>
      <script src="js/usuario.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<?php 

include("clases/conexion.php");

$con = new Mysql();
$tabla2="menu";
$sql2="SELECT * FROM `menu` WHERE `cod_estado`=1 and cod_empresa=1;";

 $r2=$con->buscar3($tabla2,$sql2);
 if($r2){
  foreach ($r2 as $value){
     $cmenu=$value['cod_menu'];
    }
  }



$tabla3="submenu";


?>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">DESINSEG</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">INICIO</a>
              </li>
              
             <?php
             if($r2){
              foreach ($r2 as $value){
                 $menu=$value['menu'];
                 $cmenu=$value['cod_menu'];
                 //echo $menu;
                    $sql3="SELECT * FROM `submenu` WHERE `cod_estado`=1 and cod_menu='$cmenu';";
                   // echo $sql3;
                    $r3=$con->buscar3($tabla3,$sql3);
             
               echo '

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                '.$menu.'
                </a>
                 ';
                 
                   
                echo '
                <ul class="dropdown-menu">
                ';
                if($r3){
                  foreach ($r3 as $value){
                     $smenu=$value['submenu'];
                     $smlink=$value['cod_submenu'];
                     //$smlink="$smlink";
                    // echo $smlink;
                  echo "<li><a class='dropdown-item'  onclick='submenu($smlink)' href=#>$smenu</a></li>";
                  
                }
              }
              echo '
                </ul>
                </li>
             ';

             
                  }
                }
              ?>
              
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
      
      <div id="resultado"></div>

     
</body>

</html>