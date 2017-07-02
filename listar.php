<?php require_once 'includes/topo.php';?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bem Vindo</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>Produtos</strong>
                             <span class="pull-right">
                             </span>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>CÓDIGO</th>
                                        <th>DESCRIÇÃO</th>
                                        <th>ESTOQUE</th>
                                        <th>PREÇO CUSTO</th>
                                        <th>PREÇO VENDA</th>
                                        <th>CÓDIGO DE BARRAS</th>
                                        <th>DATA DE CADASTRO</th>
                                        <th>ORIGEM</th>
                                        <th><center>OPÇÕES</center></th>
                                    </tr>
                                </thead>
                                <tbody>

                                      <?php require_once 'control/listar.php';?>
                                 </tbody>
                                 </table>
                                    
                          
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morrisjs/morris.min.js"></script>
    <script src="data/morris-data.js"></script>

        <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
