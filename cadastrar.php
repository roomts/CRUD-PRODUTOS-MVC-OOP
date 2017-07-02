<?php require_once 'includes/topo.php';?>
<style type="text/css">
input {
  text-transform: uppercase;
}
</style>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Formulario de Cadastro </h1>
                </div>
       <div class="row">
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                        <div class="panel-body">
                            <div class="row">
                                <form class="form-inline" data-toggle="validator" method="post" action="control/cadastrar.php">
                                <div class="form-group">
                                   <label for="exampleInputName2">Código:</label><br/>
                                    <input type="text" class="form-control" id="id" name="id"  placeholder="Insira o Código" required>
                                     <div class="help-block with-errors"></div>
                                </div>
                               </span> 
                                <div class="form-group">
                                   <label for="exampleInputName2">Descricao:</label><br/>
                                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Insira a Descrição do Produto" required>
                                     <div class="help-block with-errors"></div>
                                </div><br/>

                                <div class="form-group">
                                   <label for="exampleInputName2">Estoque:</label><br/>
                                    <input type="text" class="form-control" id="estoque" name="estoque" placeholder="Insira a quantidade em estoque" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                   
                                <div class="form-group">
                                   <label for="exampleInputName2">Preço Custo:</label><br/>
                                    <input type="text" class="form-control" id="cnpj" name="preco_custo" placeholder="Insira o Preço Custo" required>
                                    <div class="help-block with-errors"></div>
                                </div><br/>

                                    <div class="form-group">
                                   <label for="exampleInputName2">Preço Venda:</label><br/>
                                    <input type="text" class="form-control" id="preco_venda" name="preco_venda" placeholder="Insira o Preço de Venda" required>
                                    <div class="help-block with-errors"></div>
                                 </div>

                                <div class="form-group">
                                   <label for="exampleInputName2">Data de Cadastro:</label><br/>
                                    <input type="date" class="form-control" id="data_cadastro" name="data_cadastro" placeholder="Insira a Data de Cadastro" required>
                                    <div class="help-block with-errors"></div>
                                 </div><br/>                     
                                    
                               

                                <div class="form-group">
                                   <label for="exampleInputName2" style="margin-top:10px;">Codigo de Barras:</label><br/>
                                    <input type="text" class="form-control" id="codigo_barras" name="codigo_barras" placeholder="Insira o Codigo de Barras" required>
                                     
                                </div>
                                                            
                                 <div class="form-group">
                                   <label for="exampleInputName2" style="margin-top:10px;">Origem:</label><br/>
                                    <input type="text" class="form-control" id="origem" name="origem" placeholder="Insira a Origem do Protudo" required>   
                                </div>                               
                               </div>
                               </div>
                            <span class="pull-left">
                             <input class="btn btn-primary btn-lg" type="submit" value="Cadastrar">
                             </span>

          
          
            
        </form>
            
            <!-- /.col-lg-6 (nested)   
        </div>
        <!-- /#wrapper -->
        
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="dist/js/validator.min.js"></script>

</body>

</html>
