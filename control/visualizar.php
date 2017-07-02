<?php
require_once 'classes/api/Transaction.php';
require_once 'classes/api/Connection.php';
require_once 'classes/api/Expression.php';
require_once 'classes/api/Criteria.php';
require_once 'classes/api/Repository.php';
require_once 'classes/api/Record.php';
require_once 'classes/api/Filter.php';
require_once 'classes/api/Logger.php';
require_once 'classes/api/LoggerTXT.php';
require_once 'classes/model/Produto.php';


$id = $_GET['id'];
try
{
Transaction::open('config');
//Transaction::setLogger(new LoggerTXT('/tmp/log_novo.txt'));
//Transaction::log('Alterando uma PosVenda');

$produto = Produto::find($id);



                                echo'<label for="exampleInputName2">Id:</label><br/>
                                   <input type="text" class="form-control" id="id" name="id" readonly="readonly" value="'.$produto->id.'">
                                </div>
                               </span> 
                                <div class="form-group">
                                   <label for="exampleInputName2">Descricao:</label><br/>
                                   <input type="text" class="form-control" id="descricao" name="descricao" value="'.$produto->descricao.'">
                                </div><br/><br/>

                                <div class="form-group">
                                   <label for="exampleInputName2">Estoque:</label><br/>
                                    <input type="text" class="form-control" id="estoque" name="estoque" value="'.$produto->estoque.'">
                                </div>
                                <div class="form-group">
                                   <label for="exampleInputName2">Preco Custo:</label><br/>
                                    <input type="text" class="form-control" id="preco_custo" name="preco_custo" value="'.$produto->preco_custo.'">
                                </div><br/><br/>
                               

                                <div class="form-group">
                                   <label for="exampleInputName2">Preco Venda:</label><br/>
                                   <input type="text" class="form-control" id="preco_venda" name="preco_venda" value="'.$produto->preco_venda.'">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName2">Codigo Barras:</label><br/>
                                    <input type="text" class="form-control" id="codigo_barras" name="codigo_barras" value="'.$produto->codigo_barras.'">
                                </div></br></br>
                                   <div class="form-group">
                                   <label for="exampleInputName2">Data de Cadastro:</label><br/>
                                   <input type="date" class="form-control" id="data_cadastro" name="data_cadastro" value="'.$produto->data_cadastro.'">
                                </div>
                                    <div class="form-group">
                                   <label for="exampleInputName2">Origem</label><br/>
                                   <input type="text" class="form-control" id="origem" name="origem" value="'.$produto->origem.'">
                                
                                 
                                ';

Transaction::close();
}
catch (Exception $ex) {
    Transaction::rollback();
    print $ex->getMessage();
}