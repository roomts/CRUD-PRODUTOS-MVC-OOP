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

try
{
    // inicia a transação com a base de dados
    Transaction::open('config');

    //define o aqrquivo para log
    //Transaction::setLogger(new LoggerTXT('/tmp/log_novo.txt'));

    // define o critério de seleção
    $criteria = new Criteria;
    //$criteria->add(new Filter('empresa ', 'like', '%C%'));
    //$criteria->add(new Filter('origem', '=', 'N'));

    //cria o repositório
    $repository = new Repository('Produto');
    // carrega os objetos, conforme o critério
    $produto = $repository->load($criteria);
    if($produto){
      	//pecorre todos objetos
    	foreach($produto as $produto){
    	    //echo '<tr class="odd gradeX">';
             echo "<td> {$produto->id}</td>";
             echo "<td> {$produto->descricao}</td>";
             echo "<td> {$produto->estoque}</td>";
             echo "<td> {$produto->preco_custo}</td>";
             echo "<td> {$produto->preco_venda}</td>";
             echo "<td> {$produto->codigo_barras}</td>";
             echo "<td> {$produto->data_cadastro}</td>";
             echo "<td> {$produto->origem}</td>";
             echo '<td><a class="btn btn-primary btn btn-default btn-sm" target="_blank" href="#'.$produto->id.'">Visualizar
             </a>';
             echo '<a type="button" class="btn btn-success btn-default btn-sm" href="editar.php?id='.$produto->id.'">Editar</a>';
             echo ' <a type="button" class="btn btn-danger btn-default btn-sm" href="javascript:func()"onclick="confirmacao'.'('.$produto->id.')">Excluir</a></center>';
             echo"</td>";
            echo"</tr>";
    	}
    }
    $totalproduto = $repository->count($criteria);
    Transaction::close(); // fecha a transação
}
catch(Excpetion $e){
	echo $e->getMessage();
	Transaction::rollback();
}