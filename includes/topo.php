<?php
echo'<!DOCTYPE html>
<html lang="pt">
</script>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CRUD PHP OOP:.</title>

   
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
     <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<script language="Javascript">
function confirmacao(id) {
     var resposta = confirm("Deseja remover esse registro?");
 
     if (resposta == true) {
          window.location.href = "control/delete.php?id="+id;
     }
}
</script>
</head>

<body>
    

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="listar.php">CRUD PHP OOP:.</a>
            </div>
            <!-- /.navbar-header -->

           

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="listar.php"><i class="fa fa fa-home fa-fw"></i> Inicio</a>
                        </li>
                       <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Produto<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="pesquisar.php">Pesquisar</a>
                                </li> 
                                <li>
                                    <a href="cadastrar.php">Cadastrar</a>
                                </li>
                                <li>
                                    <a href="listar.php">Listar</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                           <li>
                             <a href="#"><i class="fa fa fa-money fa-fw"></i> Pagamentos</a>
                           <li>
                            <a href="#"><i class="fa fa-cog fa-fw"></i> Opções<span class="fa arrow"></span></a>
                            <!-- /.nav-second-level -->
                            <ul class="nav nav-second-level">
                                 <li>
                                    <a href="#".php">Opções de Pagamentos</a>
                                </li> 
                                <li>
                                    <a href="#".php">Opções de Usuário</a>
                                </li> 
                        </li>
                        </ul>
                        <li>
                            <a href="tables.html"><i class="fa fa-arrow-circle-right fa-fw"></i> Sair</a>
                        </li>
            
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>';